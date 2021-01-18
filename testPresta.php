    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
            <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA==" crossorigin="anonymous" />
    <!-- Google Font -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
    </head>
    <body>
        
    </body>
    </html>
    <?php
include 'src/functions/connexion.php';


connexion(); // Fonction qui gère la connexion

?>


           <!-- Si aucun utilisateur n'est connecté, on affiche ce qui suit -->
           <?php if ($_SESSION["user"] == false and $_SESSION["admin"] == false) { ?>
   <!-- Button trigger modal -->
   <button type="button" class="btn btn-lg btn-outline-light" data-bs-toggle="modal" data-bs-target="#connexion" data-bs-backdrop="false">
                Connexion
            </button>

            <!-- Modal si utilisateur non connecté -->
            <div class="modal fade" id="connexion" tabindex="-1" aria-labelledby="connexionLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="connexionLabel">Connexion</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="" method="POST">
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
            <?php } ?>