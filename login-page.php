<?php session_start() ?>
<?php
include 'src/functions/connexion.php';
include 'src/functions/ajout_utilisateur.php';

connexion(); // Fonction qui gère la connexion
ajout_user(); // Fonction qui gère l'ajout d'utilisateur dans la base de données
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Retravailler.re | Connexion</title>
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
        <a href="index.php?page=accueil" class="text-white position-absolute mt-2">
            <i class="fas fa-angle-left me-2"></i>Retour à l'accueil
        </a>
        <div class="d-flex vh-100 align-items-center justify-content-center flex-column">
            <div class="<?= $signup_success_class; ?> text-center col-3" role="alert">
                <?= $signup_success_msg; ?>
            </div>
            <div class="modal-dialog w-75">
                <div class="modal-content shadow border-0">
                    <div class="modal-header">
                        <h5 class="modal-title text-white" id="connexionLabel">Connexion</h5>
                    </div>
                    <div class="modal-body">
                        <span class="alert-danger"><?= $error_login ?></span>
                        <form action="<?= connexion() ?>" method="POST">
                            <div class="mb-3">
                                <label for="email_connect" class="form-label">Email</label>
                                <input type="email" class="form-control" name="email_connect" id="email_connect" required>
                            </div>
                            <div class="mb-3">
                                <label for="password_connect" class="form-label">Mot de passe</label>
                                <input type="password" class="form-control" name="password_connect" id="password_connect" required>
                            </div>
                            <button type="submit" name="connexion" class="btn btn-primary btn-green-nav">
                                Connexion<i class="fas fa-sign-in-alt ms-2"></i>
                            </button>
                        </form>
                    </div>
                    <div class="modal-footer">
                        Pas encore de compte ?
                        <a href="signup-page.php">
                            Inscrivez-vous<i class="fas fa-user-plus ms-2"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>