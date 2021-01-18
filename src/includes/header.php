<?php
include 'src/functions/connexion.php';
include 'src/functions/ajout_utilisateur.php';
<<<<<<< HEAD
=======
// ajout_user(); // ajout utilisateur dans la base de données
>>>>>>> bf6b4b5bc6c4a142551fe9bf7605d05ba5353f76

connexion(); // Fonction qui gère la connexion
ajout_user(); // Fonction qui gère l'ajout d'utilisateur dans la base de données
?>

<link rel="stylesheet" href="src/style/header.css">

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-light bg-white shadow fixed-top">
    <div class="container-fluid col-md-8 mx-auto">
        <a class="navbar-brand" href="#"><img class="nav-logo img-fluid" style="width: 7rem;" src="src/ressources/img/logo-RW-reunion.png" alt="logo-RW-reunion"></a>
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
                    <a class="nav-link" href="#">Contactez-Nous</a>
                </li>
                <!-- Si aucun utilisateur n'est connecté, on affiche ce qui suit -->
                <?php if ($_SESSION["user"] == false and $_SESSION["admin"] == false) { ?>
            </ul>
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary btn-green-nav" data-bs-toggle="modal" data-bs-target="#connexion" data-bs-backdrop="false">
                Connexion
            </button>

            <!-- Modal connexion -->
            <div class="modal fade" id="connexion" tabindex="-1" aria-labelledby="connexionLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="connexionLabel">Connexion</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="<?= connexion() ?>" method="POST">
                                <div class="mb-3">
                                    <label for="email_connect" class="form-label">Email</label>
                                    <input type="email" class="form-control" name="email_connect" id="email_connect">
                                </div>
                                <div class="mb-3">
                                    <label for="password_connect" class="form-label">Mot de passe</label>
                                    <input type="password" class="form-control" name="password_connect" id="password_connect">
                                </div>
                                <button type="submit" name="connexion" class="btn btn-primary btn-green-nav">Connexion</button>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <a class="text-muted text-decoration-none" href="#" data-bs-dismiss="modal" data-bs-toggle="modal" data-bs-target="#inscription" data-bs-backdrop="false">
                                Pas encore de compte ? Inscrivez-vous <i class="fas fa-sign-in-alt"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Modal inscription -->
            <div class="modal fade" id="inscription" tabindex="-1" aria-labelledby="inscriptionLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="inscriptionLabel">Inscription</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="<?php 'src/functions/ajout_utilisateur.php' ?>" method="POST">
                                <div class="mb-3">
                                    <label for="nom" class="form-label">Nom</label>
                                    <input type="text" class="form-control" name="nom" id="nom">
                                </div>
                                <div class="mb-3">
                                    <label for="prenom" class="form-label">Prenom</label>
                                    <input type="text" class="form-control" name="prenom" id="prenom">
                                </div>
                                <div class="mb-3">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" class="form-control" name="email" id="email">
                                </div>
                                <div class="mb-3">
                                    <label for="tel" class="form-label">Téléphone</label>
                                    <input type="tel" class="form-control" name="tel" id="tel">
                                </div>
                                <div class="mb-3">
                                    <label for="pass" class="form-label">Mot de passe</label>
                                    <input type="password" class="form-control" name="pass" id="pass">
                                </div>
                                <div class="mb-3">
                                    <label for="passConfirmation" class="form-label">Confirmez le mot de passe</label>
                                    <input type="password" class="form-control" name="passConfirmation" id="passConfirmation">
                                </div>
                                <button type="submit" class="btn btn-primary btn-green-nav" name="inscription">Inscription</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Si 'user' est connecté, on affiche ce qui suit -->
        <?php } else if ($_SESSION["user"] == true) { ?>
            <li class="nav-item">
                <a class="nav-link <?= $_GET['page'] == 'espace_perso' ? 'active' : '' ?>" href="index.php?page=espace_perso">Espace personnel</a>
            </li>
            </ul>
            <form action="<?= connexion() ?>" method="POST">
                <button class="btn btn-primary btn-green-nav" type="submit" name="deconnexion">Déconnexion</button>
            </form>
        <?php } ?>
        </div>
    </div>
</nav>