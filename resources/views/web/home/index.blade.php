@extends('templates.web.main')
@section('styles')
    <link rel="stylesheet" href="{{ asset('web/css/home.css') }}">
@endsection

@section('scripts')
    <script src="{{ asset('web/js/hero-slider.js') }}"></script>
@endsection
@section('content')
    <section id="about" class="container-fluid mb-5 mt-5">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="about-image">
                        <img src="{{ asset('web/images/about-us.png') }}" alt="About Image" class="img-fluid">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="about-content">
                        <h2>Sobre o Paet License</h2>
                        <p>O Paet License é uma plataforma web desenvolvida para facilitar o gerenciamento eficiente de
                            licenças de software. Esta ferramenta centraliza o controle das licenças, oferecendo acesso
                            rápido a dados cruciais como datas de vencimento e a quantidade disponível, entre outros
                            detalhes relevantes.</p>
                        <ul>
                            <li><span class="img-file pr-2"><img src="{{ asset('web/images/11_icon.png') }}"
                                        alt=""></span>
                                <div>
                                    <h4>100% Seguro e Confiável</h4>
                                    <p>O Paet License é 100% seguro e confiável, garantindo a segurança das informações
                                        sobre as licenças de software.</p>
                                </div>
                            </li>
                            <li><span class="img-file"><img src="{{ asset('web/images/12_icon.png') }}"
                                        alt=""></span>
                                <div>
                                    <h4>Selo de Qualidade</h4>
                                    <p>O Paet License possui um selo de qualidade, garantindo a eficiência e qualidade
                                        do sistema.</p>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="features" class="container-fluid mb-5 mt-5">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="features-content">
                        <h1>Funcionalidades</h1>
                        <p>Paet License oferece um conjunto de funcionalidades projetadas para simplificar e otimizar o
                            gerenciamento de licenças de software. Aqui estão algumas das principais características que
                            você pode esperar.</p>
                        <div class="row mt-3">
                            <div class="col-md-4">
                                <div class="feature-item">
                                    <i class="fas fa-cogs"></i>
                                    <h3>Gerenciamento de Licenças</h3>
                                    <p>Centralize o controle de suas licenças de software, facilitando o monitoramento e a gestão eficaz.</p>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="feature-item">
                                    <i class="fas fa-chart-line"></i>
                                    <h3>Relatórios</h3>
                                    <p> Obtenha relatórios detalhados para uma análise precisa do uso e do status das
                                        licenças.</p>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="feature-item">
                                    <i class="fas fa-user-cog"></i>
                                    <h3>Visualização de Informações</h3>
                                    <p>Consulte informações essenciais das licenças, como validade e quantidade disponível,
                                        de maneira clara e acessível.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="contact" class="container-fluid">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="contact-content">
                        <h2>Contato</h2>
                        <p>Entre em contato conosco para saber mais sobre o Paet License.</p>
                        <a href="#" class="btn default-btn">Contato</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
