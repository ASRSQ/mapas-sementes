@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h4>Cadastrar Nova Casa de Sementes</h4>
                </div>
                <div class="card-body">
                    <p class="card-text">Preencha o formulário abaixo. As informações serão revisadas antes de aparecerem no mapa.</p>
                    
                    <p class="text-center fw-bold"><strong>Clique no mapa abaixo para definir a localização exata do ponto.</strong></p>
                    <div id="map-selector" style="height: 300px; width: 100%; margin-bottom: 20px; border: 1px solid #ccc;"></div>

                    <form action="{{ route('mapa.store') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="latitude" class="form-label">Latitude</label>
                                <input type="text" class="form-control @error('latitude') is-invalid @enderror" id="latitude" name="latitude" readonly required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="longitude" class="form-label">Longitude</label>
                                <input type="text" class="form-control @error('longitude') is-invalid @enderror" id="longitude" name="longitude" readonly required>
                            </div>
                        </div>
                        
                        <div class="mb-3">
                            <label for="nome" class="form-label">Nome da Casa de Sementes</label>
                            <input type="text" class="form-control @error('nome') is-invalid @enderror" id="nome" name="nome" required>
                        </div>

                        <div class="mb-3">
                            <label for="descricao" class="form-label">Descrição (atividades, história, tipos de sementes)</label>
                            <textarea class="form-control @error('descricao') is-invalid @enderror" id="descricao" name="descricao" rows="3" required></textarea>
                        </div>
                         <div class="mb-3">
                            <label class="form-label">Quais cultivos principais?</label>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="cultivos_principais[]" value="Milho" id="cultivo_milho">
                                <label class="form-check-label" for="cultivo_milho">Milho</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="cultivos_principais[]" value="Feijão" id="cultivo_feijao">
                                <label class="form-check-label" for="cultivo_feijao">Feijão</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="cultivos_principais[]" value="Arroz" id="cultivo_arroz">
                                <label class="form-check-label" for="cultivo_arroz">Arroz</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="cultivos_principais[]" value="Hortaliças" id="cultivo_hortalicas">
                                <label class="form-check-label" for="cultivo_hortalicas">Hortaliças</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="cultivos_principais[]" value="Frutíferas" id="cultivo_frutiferas">
                                <label class="form-check-label" for="cultivo_frutiferas">Frutíferas</label>
                            </div>
                        </div>
                        
                        <div class="mb-3">
                            <label for="responsavel" class="form-label">Pessoa ou Grupo Responsável</label>
                            <input type="text" class="form-control" id="responsavel" name="responsavel">
                        </div>

                        <div class="mb-3">
                            <label for="contato" class="form-label">Contato (Telefone/Email/Rede Social)</label>
                            <input type="text" class="form-control" id="contato" name="contato">
                        </div>

                        <button type="submit" class="btn btn-primary w-100">Enviar Cadastro para Aprovação</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
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
</script>
@endpush