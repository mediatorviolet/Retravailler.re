<?php

include 'src/functions/ajout_utilisateur.php';
// function doublonEmail()
// {

//     $nouvelle_adresse = "SELECT id FROM utilisateur WHERE email='" . $adresse . "'";
//     $resultat = mysql_query($nouvelle_adresse);
//     $nombre_adresse = mysql_num_rows($resultat);
//     if ($nombre_adresse < 1) {
//         echo 'email ok';
//     } else {
//         echo 'error';
//     }
// }
$Nom = $Prenom = $Email = $Telephone = $Password = $Confirmation_Pass = "";
$Nom_Err = $Prenom_Err = $Email_Err = $Telephone_Err = $Password_Err = $Confirmation_Pass_Err = "";
function validation_form()
{
    global $Nom, $Prenom, $Email, $Telephone, $Password, $Confirmation_Pass, $Nom_Err, $Prenom_Err, $Email_Err, $Telephone_Err, $Password_Err,  $Confirmation_Pass_Err,  $class_alert;


    if (isset($_POST['inscription'])) {
        $count = 0;
        $required_input = ['nom', 'prenom', 'email', 'tel', 'pass', 'passConfirmation'];

        //renvoi un message d'erreur spécifique à chaque champs si vide
        foreach ($required_input as $input) {
            if (empty($_POST[$input])) {
                $count++;
                $Nom_Err = "Veuillez entrer un nom.";
                $Prenom_Err = "Veuillez entrer un prénom";
                $Email_Err = "Veuillez entrer un email.";
                $Telephone_Err = "Veuillez rentrer un numéro de téléphone";
                $Password_Err = "Veuillez entrer un mot de passe";
                $Confirmation_Pass_Err = "Veuillez confirmer votre mot de passe.";
                $class_alert = "alert-danger";
            }




            // verifier si le mot de passe et sa confirmation correspond
            if ($_POST["pass"] != $_POST["passConfirmation"]) {
                $count++;
                $Password_Err = "Les mots de passes sont différents.";
                $Confirmation_Pass_Err = "Les mots de passes sont différents.";
                $class_alert = "alert-danger";
            }

            // doublonEmail();
            // if (doublonEmail() == false) { // appelle la fonction doublonEmail et si retourne faux, indique un message d'erreur
            //     $count ++;
            //     $Email_Err = "Cet email est déjà utilisé.";
            // }

        }
        if ($count > 0) {
            $class_alert = "alert-danger";
            error_log(date('l jS \of F Y h:i:s A') . ": échec de la validation du formulaire\r\n", 3, 'src/var/log.txt');
            $_SESSION['class'] = "alert-danger";
            $_SESSION['message'] = "Un problème est survenu lors de la création du compte";
            // chaque erreur incrémente le compteur, si le compteur n'est pas à 0, le formulaire n'est pas envoyé et un message d'erreur apparait
        } else {
            ajout_user();
            error_log(date('l jS \of F Y h:i:s A') . ": validation du formulaire OK\r\n", 3, 'src/var/log.txt');
        }
    }
}
