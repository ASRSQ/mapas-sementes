@extends('layouts.app')

@section('content')
    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
     <section class="slide">
        <div class="slide-content">
            <h1>Lutar, Construir Reforma Agrária Popular!</h1>
            <p>Conheça o movimento que há décadas transforma a paisagem social e produtiva do Brasil.</p>
        </div>
    </section>
    
        <div class="container">

            <section id="sobre-mst">
                <h2>Sobre o Movimento</h2>
                <p>
                    O Movimento dos Trabalhadores Rurais Sem Terra (MST) é um movimento social popular brasileiro que luta pela reforma agrária, justiça social e por um projeto de agricultura que garanta soberania alimentar para o povo. Nascido oficialmente em 1984, o MST organiza trabalhadores e trabalhadoras do campo para a conquista da terra, através de ocupações e acampamentos.
                </p>
                <p>
                    Além da luta pela terra, o movimento atua em diversas frentes, como na produção de alimentos saudáveis através da agroecologia, na educação popular com escolas em acampamentos e assentamentos, na defesa dos direitos humanos e na construção de uma sociedade mais justa e igualitária para todos. A cor vermelha de nossa bandeira simboliza o sangue derramado na luta e a esperança de uma nova sociedade.
                </p>
            </section>


    <div class="text-center mb-4">
        <h2>Mapa Interativo das Casas de Sementes</h2>
        <p class="lead">Navegue pelo mapa e clique nos pontos verdes para ver mais detalhes sobre cada casa.</p>
    </div>

    <div id="map" class="map" data-url="{{ url('/api/pontos') }}"></div>
    
    <div id="popup" class="ol-popup">
        <div id="popup-content"></div>
    </div>
@endsection

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
  window.assetBase = "{{ asset('') }}".replace(/\/$/, '');
    </script>
    <script src="{{ asset('js/map-display.js') }}"></script>
@endpush