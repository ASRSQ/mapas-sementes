document.addEventListener('DOMContentLoaded', function() {
    const mapElement = document.getElementById('map');
    if (!mapElement) return;

    const apiUrl = mapElement.dataset.url;
    if (!apiUrl) {
        console.error('API URL não encontrada no atributo data-url do mapa.');
        return;
    }

    // Ícones
    const base = window.assetBase; // ex: http://localhost/mapa-sementes/public
    const iconMap = {
        'Milho': `${base}/images/icons/milho.png`,
        'Feijão': `${base}/images/icons/feijao.png`,
        'Arroz': `${base}/images/icons/arroz.png`,
        'Hortaliças': `${base}/images/icons/hortalicas.png`,
        'Frutíferas': `${base}/images/icons/frutiferas.png`,
        'casa': `${base}/images/icons/casa.png`,
        'default': `${base}/images/icons/default.png`,
    };

    // Cache de estilos
    const styleCache = {};

    // =========================================================================
    // FUNÇÃO DE ESTILO AVANÇADA
    // =========================================================================
    function getAdvancedStyle(feature, resolution) {
        const cultivos = feature.get('cultivos_principais') || [];
        const featureId = feature.getId() || JSON.stringify(feature.getProperties());

        // cache
        const cacheKey = `${featureId}_${resolution}_${cultivos.join('|')}`;
        if (styleCache[cacheKey]) return styleCache[cacheKey];

        // escala
        let scale = 1.0;
        if (resolution < 20)       scale = 0.5;
        else if (resolution < 100) scale = 0.2;
        else if (resolution < 500) scale = 0.05;
        else                       scale = 0.05;

        // raio em pixels
        const baseRadiusPx = 34;
        const minRadiusPx  = 22;
        const maxRadiusPx  = 60;
        const dynamicBonus = Math.max(0, Math.min(18, 300 / Math.max(1, resolution)));
        const radiusPx = Math.max(minRadiusPx, Math.min(maxRadiusPx, baseRadiusPx + dynamicBonus));

        // converter px -> unidades do mapa
        let radiusMu = radiusPx * resolution;
        if (radiusMu < 500) {
            radiusMu = 500; // distância mínima para não colar na casa
        }

        const styles = [];

        // 1) Ícone da casa
        styles.push(new ol.style.Style({
            image: new ol.style.Icon({
                anchor: [0.5, 0.5],
                src: iconMap.casa,
                scale: scale * 0.7// casa maior
            }),
            zIndex: 10
        }));

        // 2) Ícones dos cultivos
        const total = cultivos.length || 1;
        cultivos.forEach((cultivo, index) => {
            const iconSrc = iconMap[cultivo] || iconMap.default;

            const angle = (index / total) * 2 * Math.PI;
            const dx = radiusMu * Math.sin(angle);
            const dy = -radiusMu * Math.cos(angle);

            styles.push(new ol.style.Style({
                image: new ol.style.Icon({
                    anchor: [0.5, 0.5],
                    src: iconSrc,
                    scale: scale * 0.1// sementes menores que a casa
                }),
                geometry: function(f) {
                    const c = f.getGeometry().getCoordinates();
                    return new ol.geom.Point([c[0] + dx, c[1] + dy]);
                },
                zIndex: 11
            }));
        });

        styleCache[cacheKey] = styles;
        return styles;
    }

    const vectorSource = new ol.source.Vector();

    const vectorLayer = new ol.layer.Vector({
        source: vectorSource,
        style: getAdvancedStyle
    });

    const cearaCenter = ol.proj.fromLonLat([-39.57, -5.49]);
    const map = new ol.Map({
        target: 'map',
        layers: [
            new ol.layer.Tile({ source: new ol.source.OSM() }),
            vectorLayer
        ],
        view: new ol.View({ center: cearaCenter, zoom: 7.5 })
    });

    fetch(apiUrl)
        .then(response => response.json())
        .then(geojsonData => {
            const features = new ol.format.GeoJSON().readFeatures(geojsonData, {
                dataProjection: 'EPSG:4326',
                featureProjection: 'EPSG:3857'
            });
            vectorSource.addFeatures(features);
            console.log('Pontos carregados com sucesso no mapa!');
        })
        .catch(error => console.error('Falha ao carregar os pontos no mapa:', error));

    // Popup
    const popupContainer = document.getElementById('popup');
    const popupContent = document.getElementById('popup-content');
    const overlay = new ol.Overlay({
        element: popupContainer,
        autoPan: { animation: { duration: 250 } }
    });
    map.addOverlay(overlay);

   map.on('click', function (evt) {
        const feature = map.forEachFeatureAtPixel(evt.pixel, function (feature) {
            return feature;
        });
        
        overlay.setPosition(undefined);

        if (feature) {
            const coordinates = feature.getGeometry().getCoordinates();
            const properties = feature.getProperties();
            
            popupContent.innerHTML = `
                <h5 class="mb-2"><strong>${properties.nome}</strong></h5>
                <p style="font-size: 0.9em;">${properties.descricao}</p>
                <hr class="my-2">
                <p style="font-size: 0.8em;" class="mb-1">
                    <strong>Responsável:</strong> ${properties.responsavel || 'Não informado'}
                </p>
                <p style="font-size: 0.8em;" class="mb-0">
                    <strong>Contato:</strong> ${properties.contato || 'Não informado'}
                </p>
            `;
            overlay.setPosition(coordinates);
        }
    });
});
