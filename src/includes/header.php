<?php
include 'src/functions/connexion.php';
include 'src/functions/ajout_utilisateur.php';

connexion(); // Fonction qui gère la connexion
ajout_user(); // Fonction qui gère l'ajout d'utilisateur dans la base de données
?>

<link rel="stylesheet" href="src/style/header.css">

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-light bg-white shadow fixed-top">
    <div class="container-fluid col-md-8 mx-auto">
        <a class="navbar-brand" href="index.php?page=accueil">
            <img class="nav-logo img-fluid" style="width: 7rem;" src="src/ressources/img/logo-RW-reunion.png" alt="logo-RW-reunion">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto me-3 mb-2 mb-lg-0 flex-end">
                <li class="nav-item">
                    <a class="nav-link 
                    <?php // Lien actif si url = 'index.php', 'index.php#' ou 'index.php?page=accueil'.
                    if ($_GET['page'] == 'accueil' or $_GET['page'] == '#' or $_GET['page'] == '') {
                        echo 'active';
                    } else {
                        echo '';
                    }
                    ?>" aria-current="page" href="index.php?page=accueil">Accueil</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle 
                    <?php // Lien actif si url = 'index.php?page=evolution_personnelle', 'index.php?page=atelier_conseil'.
                    if ($_GET['page'] == 'evolution_professionnelle' or $_GET['page'] == 'atelier_conseil' or $_GET['page'] == 'acceler_emploi') {
                        echo 'active';
                    } else {
                        echo '';
                    }
                    ?>" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Nos prestations
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item <?= $_GET['page'] == 'evolution_professionnelle' ? 'active' : '' ?>" href="index.php?page=evolution_professionnelle">Conseil en Evolution Professionnelle</a></li>
                        <li><a class="dropdown-item <?= $_GET['page'] == 'acceler_emploi' ? 'active' : '' ?>" href="index.php?page=acceler_emploi">Accélèr'Emploi</a></li>
                        <li><a class="dropdown-item <?= $_GET['page'] == 'atelier_conseil' ? 'active' : '' ?>" href="index.php?page=atelier_conseil">Atelier Conseil</a></li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?= $_GET['page'] == 'contact' ? 'active' : '' ?>" href="index.php?page=contact">Contactez-Nous</a>
                </li>
                <!-- Si aucun utilisateur n'est connecté, on affiche ce qui suit -->
                <?php if ($_SESSION["user"] == false) { ?>
            </ul>

            <a class="btn btn-primary btn-green-nav" href="login-page.php">
                Connexion<i class="fas fa-sign-in-alt ms-2"></i>
            </a>
            <!-- Si 'user' est connecté, on affiche ce qui suit -->
        <?php } else if ($_SESSION["user"]['role'] == 1) { ?>
            <li class="nav-item">
                <a class="nav-link <?= $_GET['page'] == 'espace_perso' ? 'active' : '' ?>" href="index.php?page=espace_perso">Espace personnel</a>
            </li>
            </ul>
            <form action="<?= connexion() ?>" method="POST">
                <button class="btn btn-primary btn-green-nav" type="submit" name="deconnexion">Déconnexion</button>
            </form>
            <!-- Si admin est connecté, on affiche ce qui suit -->
        <?php } else if ($_SESSION['user']['role'] == 2) { ?>
            <li class="nav-item">
                <a class="nav-link <?= $_GET['page'] == 'admin' ? 'active' : '' ?>" href="index.php?page=admin">
                    Espace administrateur
                </a>
            </li>
            </ul>
            <form action="<?= connexion() ?>" method="POST">
                <button class="btn btn-primary btn-green-nav" type="submit" name="deconnexion">Déconnexion</button>
            </form>
        <?php } ?>
        </div>
    </div>
</nav>