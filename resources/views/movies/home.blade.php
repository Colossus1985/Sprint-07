<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Edit Film Form</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" >
        <link
          href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"
          rel="stylesheet"
          integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3"
          crossorigin="anonymous"
        />
        <script
          src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
          integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
          crossorigin="anonymous"
        ></script>
    </head>
    <body>
        <nav class="navbar navbar-expand-md navbar-dark bg-info px-md-5 ">
            <div class="container-fluid ps-md-0">
                <div>
                    <button
                        class="navbar-toggler"
                        type="button"
                        data-bs-toggle="collapse"
                        data-bs-target="#navbarNavAltMarkup"
                        aria-controls="navbarNavAltMarkup"
                        aria-expanded="false"
                        aria-label="Toggle navigation"
                    >
                        <span class="navbar-toggler-icon"></span>
                    </button>
                </div>
                <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                    <div class="mt-1 d-flex justify-content-start">
                        <!-- <a class="navbar-brand text-white" href="viewStock.php">Movies</a> -->
                        <a class="nav-link dropdown-toggle navbar-brand text-white ms-3"
                        href="#" id="dropdownFilm" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Movies
                        </a>
                            <ul class="dropdown-menu" aria-labelledby="dropdownFilm">
                                <li><a class="dropdown-item" href="#">Action</a></li>
                                <li><a class="dropdown-item" href="#">Scienc-Fiction</a></li>
                                <li><a class="dropdown-item" href="#">Fantastic</a></li>
                                <li><a class="dropdown-item" href="#">Romantic</a></li>
                                <li><a class="dropdown-item" href="#">Comedie</a></li>
                                <li><a class="dropdown-item" href="#">Documentair</a></li>
                            </ul>
                        <!-- <a class="navbar-brand text-white ms-3" href="modifProd.php">Series</a> -->
                        <a class="nav-link dropdown-toggle navbar-brand text-white ms-3" 
                        href="#" id="dropdownSerie" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Series
                        </a>
                            <ul class="dropdown-menu" aria-labelledby="dropdownSerie">
                                <li><a class="dropdown-item" href="#">Action</a></li>
                                <li><a class="dropdown-item" href="#">Scienc-Fiction</a></li>
                                <li><a class="dropdown-item" href="#">Fantastic</a></li>
                                <li><a class="dropdown-item" href="#">Romantic</a></li>
                                <li><a class="dropdown-item" href="#">Comedie</a></li>
                                <li><a class="dropdown-item" href="#">Documentair</a></li>
                            </ul>
                        <!-- <a class="navbar-brand text-white ms-3" href="recepProd.php">Mangas</a> -->
                        <a class="nav-link dropdown-toggle navbar-brand text-white ms-3" 
                        href="#" id="dropdownManga" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Mangas
                        </a>
                            <ul class="dropdown-menu" aria-labelledby="dropdownManga">
                                <li><a class="dropdown-item" href="#">Action</a></li>
                                <li><a class="dropdown-item" href="#">Scienc-Fiction</a></li>
                                <li><a class="dropdown-item" href="#">Fantastic</a></li>
                                <li><a class="dropdown-item" href="#">Romantic</a></li>
                                <li><a class="dropdown-item" href="#">Comedie</a></li>
                                <li><a class="dropdown-item" href="#">Documentair</a></li>
                            </ul>
                    </div>
                </div>
                <div class="d-flex flex-row">
                    @auth
                        <a class = "btn btn-primary me-3" href="{{ route('changePersoInfos') }}"><b>{{ Auth::user()->pseudo }}</b></a>
                        <a class = "btn btn-primary me-3" href="{{ route('changePersoInfos') }}">Change Informations</a>
                        <a class = "btn btn-danger me-3" href="{{ route('logout') }}">Logout</a>
                    @endauth
                    @guest
                        <a class = "btn btn-primary me-3" href="{{ route('login') }}"><b>Visitor</b></a>
                        <a class = "btn btn-primary me-3" href="{{ route('login') }}">Login</a>
                        <a class = "btn btn-info me-3" href="{{ route('register') }}">Register</a>
                    @endguest
                </div>
            </div>
        </nav>
        <div class="container">
            @yield('content')
        </div>
    </body>
</html>