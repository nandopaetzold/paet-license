<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" type="image/png" href="{{ asset('web/images/favicon.ico') }}" type="image/x-icon">
        <title>Paet License</title>
        <script src="https://kit.fontawesome.com/0331aa4ef6.js" crossorigin="anonymous"></script>
        @vite(['resources/sass/app.scss', 'resources/js/app.js'])
        <link rel="stylesheet" href="{{ mix('resources/sass/web/app.scss') }}">
        @yield('styles')
</head>

<body>
    <header id="header-sticky" class="container-fluid">
        <div class="container">
            <nav class="navbar navbar-expand-lg header-area-1">
                <div class="container-fluid p-2">
                    <a class="navbar-brand" href="#">
                        <img src="{{ asset('web/images/logo-white.png') }}" alt="Logo" class="img-fluid">
                    </a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link" aria-current="page" href="#">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" aria-current="page" href="#">Documentação API</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" aria-current="page" href="#">Parceiros</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" aria-current="page" href="#">Planos de Serviço</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" aria-current="page" href="https://paetservices.com">Paet
                                    Services</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="d-adjust"><a href="#" class="btn default-btn btn-sm menu-acess-btn"> Acessar</a>
                </div>
            </nav>
        </div>
    </header>
    @yield('content')

    @yield('scripts')
</body>

</html>
