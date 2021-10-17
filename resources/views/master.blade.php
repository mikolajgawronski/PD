<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Fonts -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css" rel='stylesheet' type='text/css'>
    <link href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700&subset=latin,latin-ext" rel='stylesheet' type='text/css'>

    <!-- Styles -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <link href="{{ URL::asset("custom.css") }}" rel="stylesheet">

    <style>
        body {
            font-family: 'Lato';
        }
    </style>
</head>

<body id="app-layout">
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container-fluid">
        <a class="navbar-brand" href="/posts">Bastion Głogów</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
                <a class="nav-link active" aria-current="page" href="/posts">Aktualności</a>
                <a class="nav-link active" aria-current="page" href="/about">O nas</a>
                <a class="nav-link active" aria-current="page" href="/games">Gry</a>
                <a class="nav-link active" aria-current="page" href="/meetings">Spotkania</a>
                <a class="nav-link active" aria-current="page" href="/tournaments">Turnieje</a>

                <div class="d-flex align-items-end">
                @auth
                    <li class="nav-item dropdown">
                        <a id="navbarDropdownMenuLink" class="nav-link dropdown-toggle text-white" href="#" role="button" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            {{ Auth::user()->username }}
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('home') }}">
                                Zarządzaj
                            </a>

                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                Wyloguj
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endauth
                </div>
            </div>
        </div>
    </div>
</nav>

<!-- wrapper -->
<div class="site-wrappper">

    <!-- .container -->
    <div class="container site-content">

        @yield("meetings")
        @yield("rooms")
        @yield("games")
        @yield("post")
        @yield("posts")
        @yield("game")
        @yield("addGame")
        @yield("addMeeting")
        @yield("addTournament")
        @yield("addRoom")
        @yield("tournaments")
        @yield("tournament")
        @yield("about")

    </div><!-- end of .container -->

</div><!-- end of wrapper -->


<!-- JavaScripts -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>
