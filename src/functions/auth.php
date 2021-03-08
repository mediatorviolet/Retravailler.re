<?php

/**
 * 
 * Authentification des utilisateurs
 * Cette class sera appelée sur chaque page nécessitant une authentification
 * 
 */
class Auth
{
    static function isLogged()
    {
        // On vérifie l'existence de la variable $_SESSION et qu'un 'email' et un 'password' y sont associés
        if (isset($_SESSION['user']) && isset($_SESSION['user']['email']) && isset($_SESSION['user']['password'])) {
            extract($_SESSION['user']);
            include 'src/functions/connexion_bdd.php'; // Connexion à la BDD

            // On vérifie que l'email et le password présent dans la variable $_SESSION correspondent à ceux dans la BDD
            $req = $bdd->query("SELECT id_user FROM user WHERE email = '$email' AND password = '$password'");
            $res = $req->fetch();

            if ($res) { // Si les identifiants correspondent, on renvoie true
                return true;
            } else { // Sinon on renvoit false
                return false;
            }
        }
    }
}
