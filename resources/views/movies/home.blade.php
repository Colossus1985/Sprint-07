<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Edit Film Form</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
    <link href="{{ url('css/main.css') }}" rel="stylesheet" type="text/css">

</head>

<body>
    <nav class="navbar navbar-expand-md navbar-dark bg-info px-md-5 ">
        <div class="container-fluid ps-md-0">
            <div>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </div>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="mt-1 d-flex justify-content-start">
                    <a class="nav-link dropdown-toggle navbar-brand text-white ms-3" href="#" id="dropdownFilm"
                        role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Movies
                    </a>
                    <ul class="dropdown-menu ms-4 px-4 bg-info " aria-labelledby="dropdownFilm">
                        <li class="list-inline-item"><a class="dropdown-item"
                                href="{{ route('home', 'Action') }}">Action</a></li>
                        <li class="list-inline-item"><a class="dropdown-item"
                                href="{{ route('home', 'Scienc-Fiction') }}">Science-Fiction</a></li>
                        <li class="list-inline-item"><a class="dropdown-item"
                                href="{{ route('home', 'Fantasy') }}">Fantasy</a></li>
                        <li class="list-inline-item"><a class="dropdown-item"
                                href="{{ route('home', 'Romance') }}">Romance</a></li>
                        <li class="list-inline-item"><a class="dropdown-item"
                                href="{{ route('home', 'Comedy') }}">Comedy</a></li>
                        <li class="list-inline-item"><a class="dropdown-item"
                                href="{{ route('home', 'Docu') }}">Docu</a></li>
                        <li class="list-inline-item"><a class="dropdown-item"
                                href="{{ route('home', 'Anime') }}">Anime</a></li>
                        <li class="list-inline-item"><a class="dropdown-item"
                                href="{{ route('home', 'Horreur') }}">Horreur</a></li>
                    </ul>

                    <a class="nav-link dropdown-toggle navbar-brand text-white ms-3" href="#" id="dropdownSerie"
                        role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Series
                    </a>
                    <ul class="dropdown-menu ms-4 px-4 bg-info" aria-labelledby="dropdownSerie">
                        <li class="list-inline-item">
                            <p>in work, be patient ;p</p>
                        </li>
                    </ul>

                    <a class="nav-link dropdown-toggle navbar-brand text-white ms-3" href="#" id="dropdownManga"
                        role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Mangas
                    </a>
                    <ul class="dropdown-menu ms-4 px-4 bg-info" aria-labelledby="dropdownManga">
                        <li class="list-inline-item">
                            <p>in work, be patient ;p</p>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="d-flex flex-row">
                <form class="d-flex me-3" action="{{ route('search') }}" method="GET">
                    @csrf
                    <div class="input-group d-flex flex-nowrap">
                        <input class="form-control me-1" name="inputSearchMovie" placeholder="Search..."
                            aria-label="Search...">
                        <button class="btn btn-outline-success ms-1" type="submit">🔎</button>
                    </div>
                </form>
                @auth
                <a class="btn btn-primary ms-3 me-3 text-nowrap" href="{{ route('changePersoInfos') }}">
                    <b>@if (Auth::user()->admin == 1) 👑 @endif
                        {{ Auth::user()->pseudo }}</b></a>
                <a class="btn btn-danger me-3" href="{{ route('logout') }}">Logout</a>
                @endauth
                @guest
                <a class="btn btn-primary mx-3" href="{{ route('login') }}"><b>Visitor</b></a>
                <a class="btn btn-primary me-3" href="{{ route('login') }}">Login</a>
                <a class="btn btn-info me-3" href="{{ route('register') }}">Register</a>
                @endguest
            </div>
        </div>
    </nav>
    <div class="container">
        @yield('content')
    </div>
</body>

</html>
<script type="text/javascript" src="{{ url('js/main.js') }}"></script>