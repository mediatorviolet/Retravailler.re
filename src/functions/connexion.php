<?php

$error_login = '';

/**
 * 
 * Fonction de connexion
 * 
 */
function connexion()
{
    global $error_login;
    // On vérifie si le serveur reçoit un POST et si on a cliqué sur le bouton de connexion
    if ($_SERVER['REQUEST_METHOD'] == 'POST' and isset($_POST['connexion'])) {

        include 'src/functions/connexion_bdd.php'; // Connexion à la BDD

        // On selectionne la ligne dans la table 'utilisateur' où l'email correspond à notre $_POST["email_connect"]
        $req = $bdd->prepare('SELECT * FROM user WHERE email = :email');

        $req->execute(array(
            'email' => $_POST['email_connect']
        ));

        $resultat = $req->fetch();

        // On vérifie si le password du $_POST correspond au password hashé dans la BDD
        $isPasswordCorrect = password_verify($_POST["password_connect"], $resultat["password"]);
        if (!$resultat or !$isPasswordCorrect) { // Si un des deux input ne correspond pas, on renvoi un message d'erreur
            $error_login = 'Mauvais identifiant ou mot de passe';
            error_log(date('l jS \of F Y h:i:s A') . ": Mot de passe ou identifiant incorrect, échec de la connexion\r\n", 3, 'src/var/logError.txt');
        } else {
            if ($isPasswordCorrect) { // Si le password correspond on lance la session user
                $_SESSION['user'] = $resultat;
                error_log(date('l jS \of F Y h:i:s A') . ": Identifiants corrects, connexion réussie\r\n", 3, 'src/var/logSuccess.txt');
                header('Location: index.php?page=accueil'); // Redirection vers la page d'accueil
                die;
            }
        }
    }

    // Quand l'utilisateur clique sur btn deconnexion on détruit sa session et on reviens à l'accueil
    if ($_SERVER['REQUEST_METHOD'] == 'POST' and isset($_POST['deconnexion'])) {
        $_SESSION['user'] = false;
        session_destroy();
        error_log(date('l jS \of F Y h:i:s A') . ": Déconnexion réussie\r\n", 3, 'src/var/logSuccess.txt');
        header('Location: index.php?page=accueil');
        die;
    }
}
