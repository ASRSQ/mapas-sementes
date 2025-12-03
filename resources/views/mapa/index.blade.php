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

   <div class="container my-5">

        <section id="topicos-carousel" class="mb-5">
            
            <div id="carouselConteudo" class="carousel carousel-dark slide p-4 border rounded shadow-sm bg-light" data-bs-ride="carousel">
                
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#carouselConteudo" data-bs-slide-to="0" class="active" aria-current="true"></button>
                    <button type="button" data-bs-target="#carouselConteudo" data-bs-slide-to="1"></button>
                    <button type="button" data-bs-target="#carouselConteudo" data-bs-slide-to="2"></button>
                    <button type="button" data-bs-target="#carouselConteudo" data-bs-slide-to="3"></button>
                    <button type="button" data-bs-target="#carouselConteudo" data-bs-slide-to="4"></button>
                    <button type="button" data-bs-target="#carouselConteudo" data-bs-slide-to="5"></button>
                    <button type="button" data-bs-target="#carouselConteudo" data-bs-slide-to="6"></button>
                </div>

                <div class="carousel-inner">
                    
                    <div class="carousel-item active" data-bs-interval="15000">
                        <div class="row justify-content-center">
                            <div class="col-10 col-lg-9"> <div class="text-center mb-4">
                                    <h2 class="fw-bold text-success">Informação</h2>
                                    <h3 class="text-muted fs-4">Sementes Crioulas</h3>
                                </div>
                                <p>As sementes crioulas, cultivadas e preservadas por gerações de camponeses, são expressões vivas da biodiversidade e da relação equilibrada entre seres humanos e natureza. Elas representam a continuidade de práticas agrícolas que respeitam os ciclos naturais, garantindo diversidade cultural, alimentos saudáveis e a possibilidade de adaptação frente às mudanças que afetam o ambiente.</p>
                            </div>
                        </div>
                    </div>

                    <div class="carousel-item" data-bs-interval="15000">
                        <div class="row justify-content-center">
                            <div class="col-10 col-lg-9">
                                <div class="text-center mb-4">
                                    <h2 class="fw-bold text-success">Informação</h2>
                                    <h3 class="text-muted fs-4">Casas de Sementes</h3>
                                </div>
                                <p>As Casas de Sementes são espaços criados pelas comunidades para guardar, multiplicar e partilhar sementes crioulas. Mais do que simples depósitos, elas funcionam como verdadeiros guardiões da memória coletiva, pois preservam a diversidade agrícola construída ao longo do tempo.</p>
                                <div class="text-center mt-3">
                                    <img src="{{ asset('images/Casa de semente.webp') }}" class="img-fluid rounded" style="max-height: 200px;" alt="Casa de Sementes">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="carousel-item" data-bs-interval="20000">
                        <div class="row justify-content-center">
                            <div class="col-10 col-xl-10"> <div class="text-center mb-4">
                                    <h2 class="fw-bold text-primary">Ação</h2>
                                    <h3 class="text-muted fs-5">Formação no Assentamento Conceição</h3>
                                </div>
                                <div class="row align-items-center">
                                    <div class="col-lg-5 mb-3 mb-lg-0 text-center">
                                        <img src="{{ asset('images/conceicao.jpg') }}" class="img-fluid rounded shadow" alt="Foto Ação 1">
                                    </div>
                                    <div class="col-lg-7 text-start">
                                        <p>No dia 06 de agosto de 2025, realizou-se, na sede do Assentamento Conceição, localizado no distrito de Salitre, em Canindé, um encontro com os assentados da reforma agrária da região. A atividade teve como objetivo promover uma formação com os educandos da Escola do Campo Javan Rodrigues de Sousa sobre Sementes Crioulas e, na ocasião, apresentar o projeto Mapeamento Digital Interativo de Sementes Crioulas.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="carousel-item" data-bs-interval="20000">
                        <div class="row justify-content-center">
                            <div class="col-10 col-xl-10">
                                <div class="text-center mb-4">
                                    <h2 class="fw-bold text-primary">Ação</h2>
                                    <h3 class="text-muted fs-5">Integração Escola e Comunidade</h3>
                                </div>
                                <div class="row align-items-center">
                                    <div class="col-lg-5 mb-3 mb-lg-0 text-center">
                                        <img src="{{ asset('images/logradouro.jpg') }}" class="img-fluid rounded shadow" alt="Foto Ação 2">
                                    </div>
                                    <div class="col-lg-7 text-start">
                                        <p>No dia 06 de agosto de 2025, realizou-se, na sede do Assentamento Conceição, localizado no distrito de Salitre, em Canindé, um encontro com os assentados da reforma agrária da região. A atividade reforçou o compromisso com a educação do campo, promovendo a troca de saberes entre os educandos da Escola Javan Rodrigues de Sousa e a comunidade.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="carousel-item" data-bs-interval="20000">
                        <div class="row justify-content-center">
                            <div class="col-10 col-xl-10">
                                <div class="text-center mb-4">
                                    <h2 class="fw-bold text-primary">Ação</h2>
                                    <h3 class="text-muted fs-5">Encontro no Assentamento Roseli Nunes</h3>
                                </div>
                                <div class="row align-items-center">
                                    <div class="col-lg-5 mb-3 mb-lg-0 text-center">
                                        <img src="{{ asset('images/roseli.jpg') }}" class="img-fluid rounded shadow" alt="Foto Ação 3">
                                    </div>
                                    <div class="col-lg-7 text-start">
                                        <p>No dia 17 de agosto de 2025, realizou-se, na sede do Assentamento Roseli Nunes, localizado no distrito de Valparaíso, em Santa Quitéria–CE, um encontro com os assentados da reforma agrária. A atividade teve como objetivo promover uma formação com os educandos da Escola do Campo Javan Rodrigues de Sousa sobre Sementes Crioulas.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="carousel-item" data-bs-interval="20000">
                        <div class="row justify-content-center">
                            <div class="col-10 col-xl-10">
                                <div class="text-center mb-4">
                                    <h2 class="fw-bold text-primary">Ação</h2>
                                    <h3 class="text-muted fs-5">Intercâmbio na EFA Dom Fragoso</h3>
                                </div>
                                <div class="row align-items-center">
                                    <div class="col-lg-5 mb-3 mb-lg-0 text-center">
                                        <img src="{{ asset('images/efa.jpg') }}" class="img-fluid rounded shadow" alt="Foto Ação 4">
                                    </div>
                                    <div class="col-lg-7 text-start">
                                        <p>Os educandos Eduardo e Juliano, juntamente com o educador Alex Ramos e a gestora Sillania Santos, realizaram uma visita à Casa de Sementes da Escola Família Agrícola Dom Fragoso, em Independência–CE. A atividade visou conhecer a estrutura e o funcionamento da Casa de Sementes, fortalecendo o repertório técnico e conceitual dos participantes.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="carousel-item" data-bs-interval="20000">
                        <div class="row justify-content-center">
                            <div class="col-10 col-xl-10">
                                <div class="text-center mb-4">
                                    <h2 class="fw-bold text-primary">Ação</h2>
                                    <h3 class="text-muted fs-5">Encontro Formativo e Diálogo</h3>
                                </div>
                                <div class="row align-items-center">
                                    <div class="col-lg-5 mb-3 mb-lg-0 text-center">
                                        <img src="{{ asset('images/curso.jpg') }}" class="img-fluid rounded shadow" alt="Foto Ação 5">
                                    </div>
                                    <div class="col-lg-7 text-start">
                                        <p>No dia 19 de novembro de 2025, realizou-se um encontro formativo com a presença da educadora e militante Karla Rodrigues, do representante do Setor Estadual de Educação do MST, Vivaldo, do coletivo da Escola Javan Rodrigues de Sousa e agricultores dos assentamentos. O momento teve como objetivo oferecer um curso introdutório sobre os temas centrais do projeto.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div> <button class="carousel-control-prev" type="button" data-bs-target="#carouselConteudo" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Anterior</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselConteudo" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Próximo</span>
                </button>
            </div>
        </section>
        <div class="text-center mb-4 mt-5">
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
    </div> <div id="popup" class="ol-popup">
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