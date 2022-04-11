<nav class="navbar navbar-expand-md navbar-dark bg-dark px-md-5 fixed-top">
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
        <div>
            
        </div>
    </div>
</nav>

<?php 
// echo "  🏡  "; 
?><?php 
// echo $_SESSION['username']; 
?> 