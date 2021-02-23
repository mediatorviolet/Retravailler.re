<?php

$error_login = '';
function connexion()
{
    global $error_login;
    if ($_SERVER['REQUEST_METHOD'] == 'POST' and isset($_POST['connexion'])) { // On vérifie si le serveur reçoit un POST et si on a cliqué sur le bouton de connexion
        try { // Connexion à la BDD
            $bdd = new PDO('mysql:host=127.0.0.1;dbname=retravailler_final;charset=utf8', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
            error_log(date('l jS \of F Y h:i:s A') . ": Connexion à la base de données réussie\r\n", 3, 'src/var/log.txt');
        } catch (Exception $e) { // Si erreur, on renvoi un message d'erreur
            error_log(date('l jS \of F Y h:i:s A') . ": Connexion à la base de données impossible\r\n", 3, 'src/var/log.txt');
            header('Location: login-page.php');
            die('Erreur : ' . $e->getMessage());
        }

        // On selectionne la ligne dans la table 'utilisateur' où l'email correspond à notre $_POST["email_connect"]
        $req = $bdd->prepare('SELECT * FROM user WHERE email = :email');

        $req->execute(array(
            'email' => $_POST['email_connect']
        ));

        $resultat = $req->fetch();


        // On vérifie si le password du $_POST correspond au password hashé dans la BDD
        $isPasswordCorrect = password_verify($_POST["password_connect"], $resultat["password"]);
        if (!$resultat or !$isPasswordCorrect) { // Si un des deux input ne correspond pas, on renvoi un message
            $error_login = 'Mauvais identifiant ou mot de passe';
            error_log(date('l jS \of F Y h:i:s A') . ": Mot de passe ou identifiant incorrect, échec de la connexion\r\n", 3, 'src/var/log.txt');
        } else {
            if ($isPasswordCorrect) { // Si le password correspond on lance la session user
                $_SESSION['user'] = $resultat;
                error_log(date('l jS \of F Y h:i:s A') . ": Identifiants corrects, connexion réussie\r\n", 3, 'src/var/log.txt');
                header('Location: index.php?page=accueil'); // Redirection vers la page d'accueil
                die;
            }
        }
    }

    if ($_SERVER['REQUEST_METHOD'] == 'POST' and isset($_POST['deconnexion'])) { // Quand user clique sur btn deconnexion on détruit sa session et on reviens à l'accueil
        $_SESSION['user'] = false;
        session_destroy();
        error_log(date('l jS \of F Y h:i:s A') . ": Déconnexion réussie\r\n", 3, 'src/var/log.txt');
        header('Location: index.php?page=accueil');
        die;
    } else {
        error_log(date('l jS \of F Y h:i:s A') . ": Echec de la déconnexion\r\n", 3, 'src/var/log.txt');
    }
}
