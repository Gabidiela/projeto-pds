<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <title>@yield('title', 'Conexão Musical - Home')</title>
</head>

<body>
    {{-- sidebar --}}
    <div class="main-container d-flex">
        <div class="sidebar" id="side_nav">
            <div class="header px-2 pt-3 pb-2">
                <a class="navbar-brand" href="{{ route('home') }}">
                    <img src="{{ asset('img/cm-logo.png') }}" alt="Logo" width="45" height="40"
                        class="d-inline-block align-text-top"> 
                        <span class="logo-texto c">Conexão</span> 
                        <span class="logo-texto m"> Musical</span>
                </a>
                <hr class="h-color mx-8">
            </div>
            <ul class="list-unstyled px-3">
                <li class="p-1 mb-2 @if (Route::is('home')) active @endif"><a href="{{ route('home') }}" class="text-decoration-none d-block">
                        <span class="material-symbols-outlined icon">
                            home
                        </span> Home</a></li>
                <li class="p-1 mb-2"><a class="text-decoration-none d-block"><span
                            class="material-symbols-outlined icon">
                            local_library
                        </span> Gerenciar Alunos</a></li>
                <li class="p-1 mb-2 @if (Route::is('professor.list')) active @endif"><a href="{{ route('professor.list') }}"
                        class="text-decoration-none d-block"><span class="material-symbols-outlined icon">
                            person
                        </span> Gerenciar Professores</a></li>
                <li class="p-1 mb-2"><a class="text-decoration-none d-block"><span
                            class="material-symbols-outlined icon">
                            event
                        </span> Gerenciar Agendamento</a></li>
                <li class="p-1 mb-2"><a class="text-decoration-none d-block"><span
                            class="material-symbols-outlined icon">
                            payment
                        </span> Gerenciar Pagamento</a></li>
                <li class="p-1 mb-2"><a class="text-decoration-none d-block"><span
                            class="material-symbols-outlined icon">
                            feedback
                        </span> Gerenciar Feedback</a></li>
            </ul>
            <ul class="list-unstyled px-3" style="position: fixed; bottom: 0; left: 0; width: 318px">
                <li><a href="#" class="text-decoration-none d-block base">
                    <span class="material-symbols-outlined icon">
                            settings
                    </span> Configurações</a></li>
                 <li>@if (Route::has('login'))
                    @auth
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                                <a href="#" onclick="event.preventDefault();
                                    this.closest('form').submit();" class="text-decoration-none d-block base">
                                    <span class="material-symbols-outlined icon">
                                        logout
                                    </span> Log Out</a></li></form>
                    @endauth
                 @endif
            </ul>
        </div>
        <div class="navbar-cima">
            <nav class="navbar navbar-expand-lg" style="background-color:#1E1E1E">
                <div class="container-fluid">
                    <a class="nav-link text-white" href="#"><span class="material-symbols-outlined">
                        notifications_active
                    </span></a>
                    <a class="nav-link text-white" href="#"><span class="material-symbols-outlined">
                        contact_support
                    </span></a>
                    <a class="nav-link text-white" href="#"><span class="material-symbols-outlined">
                        text_increase
                    </span></a>
                </div>
            </nav>

            {{-- Conteúdo principal --}}
            @yield('content')


        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous">
    </script>
    <script src="{{ asset('js/jquery.mask.min.js') }}"></script>
    <script src="{{ asset('js/app.js') }}"></script>
    <script>
        $('.sidebar ul li').on('click', function() {
            $('.sidebar ul li.active').removeClass('active');
            $(this).addClass('active');
        })
    </script>
</body>

</html>
