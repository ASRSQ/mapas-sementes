document.addEventListener('DOMContentLoaded', function() {
    const mapSelectorElement = document.getElementById('map-selector');
    if (!mapSelectorElement) return; // Se não houver seletor de mapa, não faz nada

    const cearaCenter = ol.proj.fromLonLat([-39.57, -5.49]);
    const latInput = document.getElementById('latitude');
    const lonInput = document.getElementById('longitude');

    const map = new ol.Map({
        target: 'map-selector',
        layers: [ new ol.layer.Tile({ source: new ol.source.OSM() }) ],
        view: new ol.View({ center: cearaCenter, zoom: 7 })
    });

    // Camada para o marcador que o usuário vai clicar
    const marker = new ol.layer.Vector({
        source: new ol.source.Vector(),
        style: new ol.style.Style({
            image: new ol.style.Icon({
                anchor: [0.5, 1],
                src: 'https://openlayers.org/en/latest/examples/data/icon.png' // Ícone padrão do OpenLayers
            })
        })
    });
    map.addLayer(marker);

    // Evento de clique no mapa para pegar coordenadas
    map.on('click', function(evt) {
        const coords = ol.proj.toLonLat(evt.coordinate);
        const lon = coords[0];
        const lat = coords[1];

        // Atualiza os campos do formulário
        latInput.value = lat.toFixed(8);
        lonInput.value = lon.toFixed(8);

        // Adiciona/move o marcador no mapa
        const markerSource = marker.getSource();
        markerSource.clear();
        markerSource.addFeature(new ol.Feature(new ol.geom.Point(evt.coordinate)));
    });
});