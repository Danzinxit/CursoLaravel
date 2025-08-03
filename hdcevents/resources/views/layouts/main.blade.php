<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-bs-theme="light">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title', 'DANZIN EVENTS')</title>
    <link rel="icon" type="image/svg+xml" href="/img/cruzeiro.svg">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <link rel="stylesheet" href="/css/styles.css">
</head>
<body class="d-flex flex-column min-vh-100"> {{-- Corpo com Flexbox para o sticky footer --}}

    <header>
        {{-- Navbar moderna, responsiva e com sombra para elevação --}}
        <nav class="navbar navbar-expand-lg bg-body-tertiary shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="/">
                    <img src="/img/cruzeiro.svg" alt="DANZIN EVENTS Logo" style="height: 40px;">
                </a>

                {{-- Botão "Hambúrguer" para telas pequenas --}}
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarNav">
                    {{-- Links principais alinhados à esquerda --}}
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link {{ request()->is('/') ? 'active' : '' }}" href="/">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->is('events/create') ? 'active' : '' }}" href="/events/create">Criar Eventos</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->is('contact') ? 'active' : '' }}" href="/contact">Contato</a>
                        </li>
                    </ul>

                    {{-- Links de autenticação alinhados à direita --}}
                    <ul class="navbar-nav ms-auto">
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="/login">Entrar</a>
                            </li>
                            <li class="nav-item">
                                <a class="btn btn-primary btn-sm" href="/register">Registrar</a>
                            </li>
                        @endguest

                        @auth
                            <li class="nav-item dropdown">
                                {{-- Dropdown para o usuário logado --}}
                                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    <ion-icon name="person-circle-outline" class="me-1"></ion-icon>
                                    {{ Auth::user()->name }}
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end">
                                    <li><a class="dropdown-item" href="/dashboard">Meus Eventos</a></li>
                                    <li><hr class="dropdown-divider"></li>
                                    <li>
                                        {{-- Formulário de Logout dentro do dropdown --}}
                                        <form action="/logout" method="POST">
                                            @csrf
                                            <a class="dropdown-item" href="#" onclick="event.preventDefault(); this.closest('form').submit();">
                                                <ion-icon name="log-out-outline" class="me-1"></ion-icon>Sair
                                            </a>
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endauth
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <main class="flex-grow-1">
        {{-- O container-fluid foi removido daqui para dar mais flexibilidade às suas views --}}
        @if(session('msg'))
            {{-- A classe 'msg-popup' do seu CSS será usada aqui --}}
            <div class="alert alert-success msg-popup" role="alert">
                <ion-icon name="checkmark-circle-outline"></ion-icon>
                {{ session('msg') }}
            </div>
        @endif

        @yield('content')
    </main>

    {{-- Footer moderno e com mais informações --}}
    <footer class="bg-dark text-white mt-auto py-4">
        <div class="container text-center text-md-start">
            <div class="row gy-4">

                <div class="col-lg-4 col-md-6">
                    <h5 class="text-uppercase text-primary fw-bold">DANZIN EVENTS</h5>
                    <p class="small text-muted">A sua plataforma completa para criar e participar dos melhores eventos da região.</p>
                </div>

                <div class="col-lg-2 col-md-6">
                    <h5 class="text-uppercase small">Links</h5>
                    <ul class="list-unstyled">
                        <li><a href="/" class="footer-link">Home</a></li>
                        <li><a href="/events/create" class="footer-link">Criar Eventos</a></li>
                        <li><a href="/dashboard" class="footer-link">Meus Eventos</a></li>
                        <li><a href="/contact" class="footer-link">Contato</a></li>
                    </ul>
                </div>

                <div class="col-lg-3 col-md-6">
                    <h5 class="text-uppercase small">Legal</h5>
                     <ul class="list-unstyled">
                        <li><a href="#" class="footer-link">Política de Privacidade</a></li>
                        <li><a href="#" class="footer-link">Termos de Uso</a></li>
                    </ul>
                </div>

                <div class="col-lg-3 col-md-6">
                    <h5 class="text-uppercase small">Siga-nos</h5>
                    <div class="d-flex justify-content-center justify-content-md-start">
                        <a href="#" class="social-icon me-3"><ion-icon name="logo-instagram"></ion-icon></a>
                        <a href="#" class="social-icon me-3"><ion-icon name="logo-facebook"></ion-icon></a>
                        <a href="#" class="social-icon"><ion-icon name="logo-linkedin"></ion-icon></a>
                    </div>
                </div>
            </div>

            <div class="text-center text-muted border-top border-secondary-subtle pt-3 mt-4">
                <p class="small mb-0">&copy; {{ date('Y') }} DANZIN EVENTS. Todos os direitos reservados.</p>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <script src="/js/scripts.js"></script>
</body>
</html>
