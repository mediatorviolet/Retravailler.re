<?php


function ajout_user()
{
    
    $_SESSION['class'] = "d-none";
    $_SESSION['message'] = "";
    if (isset($_POST['inscription'])) {
        $role1 = 1;
        $pass = password_hash($_POST["pass"], PASSWORD_DEFAULT);
        $etat = 1;

        $nom = htmlentities(trim($_POST['nom']));
        $prenom = htmlentities(trim($_POST['prenom']));
        $telephone = htmlentities(trim($_POST['tel']));
        $email = htmlentities(trim($_POST['email']));

        //Si les champs requis ne sont pas vides et si les donnees ont bien la forme attendue
        if (
            !empty($nom) && !empty($prenom) && !empty($telephone) && !empty($email) && !empty($pass)
            && strlen($nom) <= 30
            && strlen($prenom) <= 30
            && preg_match("#^[A-Za-z '-]+$#", $nom)
            && preg_match("#^[A-Za-z '-]+$#", $prenom)
            && preg_match("#(01|02|03|04|05|06|07|08|09)[ \.\-]?[0-9]{2}[ \.\-]?[0-9]{2}[ \.\-]?[0-9]{2}[ \.\-]?[0-9]{2}#", $telephone)
            && filter_var($email, FILTER_VALIDATE_EMAIL)
        ) {

            include 'src/functions/connexion_bdd.php'; // Connexion à la BDD

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


           
           
           
            

            $_SESSION['class'] = "alert-success";
            $_SESSION['message'] = "Le compte a bien été créé";
         
            
            error_log(date('l jS \of F Y h:i:s A') . ": compte créé avec succès\r\n", 3, 'src/var/log.txt');
            
        } else {
            error_log(date('l jS \of F Y h:i:s A') . ": échec de la création du compte\r\n", 3, 'src/var/log.txt');

            
            

        }
    }
}
