document.addEventListener('DOMContentLoaded', function() {
    // Pega o elemento do mapa e a URL da API a partir do atributo data-url
    const mapElement = document.getElementById('map');
    if (!mapElement) return; // Se não houver mapa nesta página, não faz nada

    const apiUrl = mapElement.dataset.url;
    if (!apiUrl) {
        console.error('API URL não encontrada no atributo data-url do mapa.');
        return;
    }

    // Coordenadas aproximadas do Ceará para centralizar o mapa
    const cearaCenter = ol.proj.fromLonLat([-39.57, -5.49]);

    // **MUDANÇA 1: Criamos a fonte de dados VAZIA primeiro.**
    // Isso nos dá mais controle para adicionar os pontos depois.
    const vectorSource = new ol.source.Vector();

    const vectorLayer = new ol.layer.Vector({
        source: vectorSource, // A fonte ainda está vazia aqui
        style: new ol.style.Style({
            image: new ol.style.Circle({
                radius: 7,
                fill: new ol.style.Fill({color: 'green'}),
                stroke: new ol.style.Stroke({color: 'white', width: 2})
            })
        })
    });

    const map = new ol.Map({
        target: 'map',
        layers: [
            new ol.layer.Tile({
                source: new ol.source.OSM()
            }),
            vectorLayer // Adicionamos a camada de pontos ao mapa
        ],
        view: new ol.View({
            center: cearaCenter,
            zoom: 7.5
        })
    });
    
    // **MUDANÇA 2: Usamos fetch para carregar os dados e fazer a conversão.**
    fetch(apiUrl)
        .then(function(response) {
            // Verifica se a requisição à API foi bem sucedida
            if (!response.ok) {
                throw new Error('Erro na rede ou na API: ' + response.statusText);
            }
            return response.json(); // Converte a resposta para JSON
        })
        .then(function(geojsonData) {
            // **A CORREÇÃO PRINCIPAL ESTÁ AQUI**
            const format = new ol.format.GeoJSON();
            
            // Lemos os dados do GeoJSON e dizemos ao OpenLayers para converter as coordenadas
            const features = format.readFeatures(geojsonData, {
                dataProjection: 'EPSG:4326',    // Projeção dos dados de origem (GeoJSON)
                featureProjection: 'EPSG:3857'  // Projeção do mapa de destino (OpenLayers View)
            });

            // Adicionamos os pontos (features) convertidos à nossa fonte de dados
            vectorSource.addFeatures(features);
            console.log('Pontos carregados com sucesso no mapa!');
        })
        .catch(function(error) {
            // Captura e exibe qualquer erro que tenha ocorrido no processo
            console.error('Falha ao carregar os pontos no mapa:', error);
        });


    // Lógica para o Popup de informações (NÃO MUDA NADA AQUI)
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

    // Mudar o cursor para "mãozinha" ao passar sobre um ponto (NÃO MUDA NADA AQUI)
    map.on('pointermove', function (e) {
        const pixel = map.getEventPixel(e.originalEvent);
        const hit = map.hasFeatureAtPixel(pixel);
        map.getTarget().style.cursor = hit ? 'pointer' : '';
    });
});