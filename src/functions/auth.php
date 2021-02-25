<?php

class Auth
{
    static function isLogged()
    {
        if (isset($_SESSION['user']) && isset($_SESSION['user']['email']) && isset($_SESSION['user']['password'])) {
            extract($_SESSION['user']);
            include 'src/functions/connexion_bdd.php';

            $req = $bdd->query("SELECT id_user FROM user WHERE email = '$email' AND password = '$password'");
            $res = $req->fetch();

            if ($res) {
                return true;
            } else {
                return false;
            }
        }
    }
}
