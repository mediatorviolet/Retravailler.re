<?php

$signup_success_msg = $signup_success_class = '';
function ajout_user()
{
    global $signup_success_msg, $signup_success_class;
    if (isset($_POST['inscription'])) {
        $serveur = "localhost";
        $dbname = "retravailler_final";
        $user = "root";
        $password = "";

        // $pass = ($_POST['pass']);
        // if (!preg_match("#^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[-+!*$@%_])([-+!*$@%_\w]{8,15})$#", $pass))
        // {
        //     echo 'erreur mot de passe';
        // }
        $role1 = 1;
        $pass = password_hash($_POST["pass"], PASSWORD_DEFAULT);
        $etat = 1;

        $nom = htmlentities(trim($_POST['nom']));
        $prenom = htmlentities(trim($_POST['prenom']));
        $telephone = htmlentities(trim($_POST['tel']));
        $email = htmlentities(trim($_POST['email']));

        /*Si les champs requis ne sont pas vides et si les donnees ont
            bien la forme attendue*/
        if (
            !empty($nom) && !empty($prenom) && !empty($telephone) && !empty($email) && !empty($pass)
            && strlen($nom) <= 30
            && strlen($prenom) <= 30
            && preg_match("#^[A-Za-z '-]+$#", $nom)
            && preg_match("#^[A-Za-z '-]+$#", $prenom)
            && preg_match("#(01|02|03|04|05|06|07|08|09)[ \.\-]?[0-9]{2}[ \.\-]?[0-9]{2}[ \.\-]?[0-9]{2}[ \.\-]?[0-9]{2}#", $telephone)
            && filter_var($email, FILTER_VALIDATE_EMAIL)
        ) {

            try {
                //On se connecte à la BDD
                $bdd = new PDO("mysql:host=$serveur;dbname=$dbname", $user, $password);
                $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                echo 'Erreur : ' . $e->getMessage();
            }

            //On insère les données reçues
            $insertion = $bdd->prepare("INSERT INTO user (prenom, nom, email, password, telephone, role, etat) VALUES (:prenom, :nom, :email, :password, :telephone, :role, :etat)");

            $insertion->execute(array(
                'prenom' => $prenom,
                'nom' => $nom,
                'email' => $email,
                'password' => $pass,
                'telephone' => $telephone,
                'role' => $role1,
                'etat' => $etat
            ));

            //On renvoie l'utilisateur vers la page de login
            header('Location: login-page.php');

            // Voir pourquoi ça ne fonctionne pas
            $signup_success_msg = 'Votre compte a bien été créé';
            $signup_success_class = 'alert alert-success';
        } else {
            echo 'error wutwut';
        }
    }
}
