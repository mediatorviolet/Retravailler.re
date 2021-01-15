<?php
function connexion()
{
    if ($_SERVER["REQUEST_METHOD"] == "POST" and isset($_POST["connexion"])) {
        if ($_POST["email_connect"] == "test@test.fr" and $_POST["password_connect"] == "test") {
            $_SESSION["user"] = true;
        }
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST" and isset($_POST["deconnexion"])) {
        $_SESSION["user"] = false;
        session_destroy();
        header("Location: index.php");
    }
}
