<?php
function connexion()
{
    if ($_SERVER["REQUEST_METHOD"] == "POST" and isset($_POST["connexion"])) { // On vérifie si le serveur envoie une requête 'POST' et qu'on à cliqué sur le bouton connexion
        if ($_POST["email_connect"] == "test@test.fr" and $_POST["password_connect"] == "test") { // On vérifie les infos saisies par l'utilisateur
            // 'user' est connecté, ses infos sont stockées dans $_SESSION
            $_SESSION["user"] = true;
        }
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST" and isset($_POST["deconnexion"])) {
        // Lorsque l'utilisateur clique sur le btn de déconnexion, on détruit sa session et on le ramène sur la page d'accueil
        $_SESSION["user"] = false;
        session_destroy();
        header("Location: index.php");
    }
}
