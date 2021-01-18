<?php

function connexion()
{
    if ($_SERVER['REQUEST_METHOD'] == 'POST' and isset($_POST['connexion'])) {
        try {
            $bdd = new PDO('mysql:host=localhost;dbname=retravailler;charset=utf8', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        } catch (Exception $e) {
            die('Erreur : ' . $e->getMessage());
        }
        $req = $bdd->prepare('SELECT * FROM utilisateur WHERE email = :email');
        $req->execute(array(
            'email' => $_POST['email_connect']
        ));
        $resultat = $req->fetch();

        $isPasswordCorrect = password_verify($_POST["password_connect"], $resultat["motDePasse"]);

        if (!$resultat) {
            echo 'Mauvais identifiant ou mot de passe';
        } else {
            if ($isPasswordCorrect) {
                // session_start();
                $_SESSION['user'] = $resultat;
            }
        }
        header('Location: index.php?page=accueil');
        die;
    }

    if ($_SERVER['REQUEST_METHOD'] == 'POST' and isset($_POST['deconnexion'])) {
        $_SESSION['user'] = false;
        session_destroy();
        header('Location: index.php?page=accueil');
    }
}
