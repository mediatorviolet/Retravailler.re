<?php

function ajout_user()
{
    if (isset($_POST['inscription']))
    {
        $serveur = "localhost"; $dbname = "retravailler"; $user = "root"; $password = "";
    
    
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
        if (!empty($nom) && !empty($prenom) && !empty($telephone) && !empty($email) && !empty($pass)
            && strlen($nom) <= 30
            && strlen($prenom) <= 30
            && preg_match("#^[A-Za-z '-]+$#",$nom)
            && preg_match("#^[A-Za-z '-]+$#",$prenom)
            && preg_match("#(01|02|03|04|05|06|07|08|09)[ \.\-]?[0-9]{2}[ \.\-]?[0-9]{2}[ \.\-]?[0-9]{2}[ \.\-]?[0-9]{2}#",$telephone)
            && filter_var($email, FILTER_VALIDATE_EMAIL))
            
            {             
        
            try{
                //On se connecte à la BDD
                $bdd = new PDO("mysql:host=$serveur;dbname=$dbname",$user,$password);
                $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                //On insère les données reçues
            
               
                
            }
            catch(PDOException $e){
                echo 'Erreur : '.$e->getMessage();
                
            }
            $insertion = $bdd->prepare("INSERT INTO utilisateur (role, nom, prenom, telephone, email, motDePasse, etat) VALUES (:role1, :nom, :prenom, :tel, :email, :pass, :etat)");
            $insertion->bindParam(':role1',$role1);
            $insertion->bindParam(':nom',$nom);
            $insertion->bindParam(':prenom',$prenom);
            $insertion->bindParam(':email',$email);
            $insertion->bindParam(':tel',$telephone);
            $insertion->bindParam(':pass',$pass);
            $insertion->bindParam(':etat',$etat);
            $insertion->execute();
            //On renvoie l'utilisateur vers la page de login
            echo 'success';
        }
        else {
            echo 'error wutwut';
        }
    }
}

?>