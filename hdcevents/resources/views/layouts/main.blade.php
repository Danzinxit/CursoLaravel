<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title> <!-- muda dinamicamente--> {{-- --}}
    <link rel="icon" type="image/x-icon" href="/img/cruzeiro.svg">
    <link rel="stylesheet" href="/css/styles.css">
    <script src="/js/scripts.js"></script>

    <!-- FONTE GOOGLE--> {{-- --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Roboto"
rel="stylesheet">

<!-- bootstrap--> {{-- --}}
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
</head>
<body>
<header>
<nav class="navbar navbar-expand-lg navbar-light">
    <div class="collapse navbar-collapse" id="navbar">
        <a href="/" class="navbar-brand">
            <img src="/img/cruzeiro.svg" alt="">
        </a>
        <ul class="navbar-nav">
            <li class="nav-item">
               <a href="/" class="nav-link">Home</a>
            </li>
            <li>
                <a href="/events/create" class="nav-link" >Criar Eventos</a>
            </li>
            <li>
                <a href="/login"class="nav-link">Entrar</a>
            </li>
             <li>
                <a href="/login"class="nav-link">Entrar</a>
            </li>
        </ul>
    </div>
</nav>
</header>
   @yield('content') <!--area de conteudo de todas as paginas--> {{-- --}}
    <footer>
        <p>DANZIN EVENTS &copy; 2025


        </p>
    </footer>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>
</html>
