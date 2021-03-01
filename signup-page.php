<?php session_start() ?>
<?php
include 'src/functions/connexion.php';
include 'src/functions/validation_formulaire.php';
// include 'src/functions/ajout_utilisateur.php';



connexion(); // Fonction qui gère la connexion
validation_form(); // Fonction qui gère l'ajout d'utilisateur dans la base de données
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Retravailler.re | Inscription</title>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA==" crossorigin="anonymous" />
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
    <!-- Main CSS -->
    <link rel="stylesheet" href="src/style/login.css">
    <link rel="stylesheet" href="src/style/header.css">
</head>

<body>
    <div class="container-fluid main-background">
        <a href="index.php?page=accueil" class="text-white position-relative mt-2">
            <i class="fas fa-angle-left me-2"></i>Retour à l'accueil
        </a>
        <div class="<?=  $_SESSION['class'] ?> alert  alert-dismissible fade show col-6 mx-auto mb-5 text-center fw-bold shadow" role="alert">
            <span><?=  $_SESSION['message'] ?></span>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>

        <div class="d-flex align-items-center justify-content-center">
            <div class="modal-dialog w-75">
                <div class="modal-content shadow border-0">
                    <div class="modal-header">
                        <h5 class="modal-title text-white" id="connexionLabel">Inscription</h5>
                    </div>
                    <div class="modal-body">
                        <form action="<?php 'src/functions/validation_formulaire.php' ?>" method="POST">
                            <div class="mb-3">
                                <label for="nom" class="form-label">Nom</label>
                                <input type="text" class="form-control" name="nom" id="nom" required>
                                <span class="<?= $class_alert ?>"><?= $Nom_Err ?></span>
                            </div>
                            <div class="mb-3">
                                <label for="prenom" class="form-label">Prenom</label>
                                <input type="text" class="form-control" name="prenom" id="prenom" required>
                                <span class="<?= $class_alert ?>"><?= $Prenom_Err ?></span>
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" name="email" id="email" required>
                                <span class="<?= $class_alert ?>"><?= $Email_Err ?></span>
                            </div>
                            <div class="mb-3">
                                <label for="tel" class="form-label">Téléphone</label>
                                <input type="tel" class="form-control" name="tel" id="tel" required>
                                <span class="<?= $class_alert ?>"><?= $Telephone_Err ?></span>
                            </div>
                            <div class="mb-3">
                                <label for="pass" class="form-label">Mot de passe</label>
                                <input type="password" class="form-control" name="pass" id="pass" required>
                                <span class="<?= $class_alert ?>"><?= $Password_Err ?></span>
                            </div>
                            <div class="mb-3">
                                <label for="passConfirmation" class="form-label">Confirmez le mot de passe</label>
                                <input type="password" class="form-control" name="passConfirmation" id="passConfirmation" required>
                                <span class="<?= $class_alert ?>"><?= $Confirmation_Pass_Err ?></span>
                            </div>
                            <button type="submit" class="btn btn-primary btn-green-nav" name="inscription">
                                Inscription<i class="fas fa-user-plus ms-2"></i>
                            </button>
                        </form>
                    </div>
                    <div class="modal-footer">
                        Déjà inscrit ?
                        <a href="login-page.php">
                            Connectez-vous<i class="fas fa-sign-in-alt ms-2"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>