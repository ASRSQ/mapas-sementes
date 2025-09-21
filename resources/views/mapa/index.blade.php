@extends('layouts.app')

@section('content')
    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
        <div class="slide">
        <img src="{{ asset('images/slide.png') }}" alt="Slide" class="slide-img">
        <div class="slide-content">
            <h1>Bem-vindo</h1>
        </div>
        </div>


    
        <div class="container">

          <section id="sobre-mst">
    <h2>Sementes Crioulas</h2>
    <p>As sementes crioulas, cultivadas e preservadas por gerações de camponeses, são expressões vivas da biodiversidade e da relação equilibrada entre seres humanos e natureza. Elas representam a continuidade de práticas agrícolas que respeitam os ciclos naturais, garantindo diversidade cultural, alimentos saudáveis e a possibilidade de adaptação frente às mudanças que afetam o ambiente. Cuidar dessas sementes significa também manter vivos os saberes tradicionais e fortalecer modos de vida em sintonia com a terra.</p>

    <p>Ao refletirmos sobre o futuro, as sementes crioulas apontam caminhos para sociedades mais conscientes e responsáveis. Elas inspiram a formação de novas gerações com valores de respeito à vida e incentivo a práticas coletivas que buscam alternativas para superar os desafios do nosso tempo. Preservar, cultivar e compartilhar essas sementes abre espaço para transformações profundas, capazes de gerar equilíbrio entre produção de alimentos, qualidade de vida e proteção do planeta.</p>
</section>
<section id="sobre-mst">
    <h2>Casas de Sementes</h2>
    <p>As Casas de Sementes são espaços criados pelas comunidades para guardar, multiplicar e partilhar sementes crioulas. Mais do que simples depósitos, elas funcionam como verdadeiros guardiões da memória coletiva, pois preservam a diversidade agrícola construída ao longo do tempo e garantem que cada grão carregue histórias, identidades e modos de vida. Esses lugares fortalecem a autonomia das famílias camponesas e mantêm vivas as possibilidades de produzir alimentos sem dependência de pacotes industriais.</p>

    <p>Ao reunir diferentes variedades e estimular a troca entre agricultores, as Casas de Sementes se tornam centros de aprendizado e solidariedade. Nelas, a prática do cultivo vai além da colheita, transformando-se em ato de cuidado com a terra e com as futuras gerações. Esses espaços expressam a importância de construir alternativas locais, capazes de assegurar diversidade, saúde e equilíbrio nas formas de conviver e produzir.</p>

    <figure style="text-align: center;">
        <img src="{{ asset('images/Casa de semente.webp') }}" 
             alt="Amostras de sementes crioulas organizadas em caixas de madeira"
             style="max-width: 30%; height: auto; margin: 0 auto; display: block;">
        <figcaption style="font-size: 0.85em; margin-top: 5px;">
            Amostras de sementes ficam guardadas em um armazém. — Foto: Fetraece/Divulgação
        </figcaption>
    </figure>
</section>




    <div class="text-center mb-4">
        <h2>Mapa Interativo das Casas de Sementes</h2>
        <p class="lead">O nosso mapa interativo tem como objetivo divulgar de forma aberta os locais das Casas de Sementes, 
        começando pela região dos Assentamentos: Conceição, Logradouro, Saco do Belém e Roseli Nunes. 
        A ideia é tornar visível essa rede de preservação e partilha, fortalecendo a memória e o cuidado coletivo. 
        Veja o mapa abaixo e, caso conheça algum outro espaço, contribua cadastrando novas Casas de Sementes.</p>
    </div>

    <div id="map" class="map" data-url="{{ url('/api/pontos') }}"></div>
    <div class="map-legend text-center mt-3">
    <h5>Legenda do Mapa</h5>
    <ul class="list-inline">
        <li class="list-inline-item mx-3">
            <img src="{{ asset('images/icons/casa.png') }}" alt="Ícone Casa de Sementes" style="width: 40px; height: 40px;">
            <span>Casa de Sementes</span>
        </li>
        <li class="list-inline-item mx-3">
            <img src="{{ asset('images/icons/milho.png') }}" alt="Milho" style="width: 28px; height: 28px;">
            <span>Milho</span>
        </li>
        <li class="list-inline-item mx-3">
            <img src="{{ asset('images/icons/feijao.png') }}" alt="Feijão" style="width: 28px; height: 28px;">
            <span>Feijão</span>
        </li>
        <li class="list-inline-item mx-3">
            <img src="{{ asset('images/icons/arroz.png') }}" alt="Arroz" style="width: 28px; height: 28px;">
            <span>Arroz</span>
        </li>
        <li class="list-inline-item mx-3">
            <img src="{{ asset('images/icons/hortalicas.png') }}" alt="Hortaliças" style="width: 28px; height: 28px;">
            <span>Hortaliças</span>
        </li>
        <li class="list-inline-item mx-3">
            <img src="{{ asset('images/icons/frutiferas.png') }}" alt="Frutíferas" style="width: 28px; height: 28px;">
            <span>Frutíferas</span>
        </li>
    </ul>
</div>

    
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