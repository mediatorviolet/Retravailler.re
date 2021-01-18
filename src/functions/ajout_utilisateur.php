<?php

function ajout_user()
{
  if (isset($_POST['inscription']))

  {
          try
          {
              $bdd = new PDO('mysql:host=localhost;dbname=retravailler;charset=utf8', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
          
          }
          catch(Exception $e)
          {
                  die('Erreur : '.$e->getMessage());
          }
  
  
          
          // creation des variables pour l'ajout d'utilisateur
          $role1 = 1;
          $nom = $_POST['nom'];
          $prenom = $_POST['prenom'];
          $telephone = $_POST['tel'];
          $email = $_POST['email'];
<<<<<<< HEAD
          $pass = password_hash($_POST['pass'], PASSWORD_DEFAULT);
=======
          $pass = $_POST['pass'];
>>>>>>> bf6b4b5bc6c4a142551fe9bf7605d05ba5353f76
          $etat = 1;    
  
  
          // creation d'une variable qui appelle la methode prepare() sur la variable objet bdd
          // la demande SQL est entrée en parametre, et les placeholder ecrit avec :nom_du_placeholder
          $my_Insert_Statement = $bdd->prepare("INSERT INTO utilisateur (role, nom, prenom, telephone, email, motDePasse, etat) VALUES (:role1, :nom, :prenom, :tel, :email, :pass, :etat)");
          
          // on utilise la methode bindparam pour lier les placeholder au variable
          // premier parametre le placeholder, deuxieme la variable qui doit s'y referer
          $my_Insert_Statement->bindParam(':role1', $role1);
          $my_Insert_Statement->bindParam(':nom', $nom);
          $my_Insert_Statement->bindParam(':prenom', $prenom);
          $my_Insert_Statement->bindParam(':email', $email);
          $my_Insert_Statement->bindParam(':tel', $telephone);
          $my_Insert_Statement->bindParam(':pass', $pass);
          $my_Insert_Statement->bindParam(':etat', $etat);
  
          
  
          if ($my_Insert_Statement->execute()) {
            echo "Nouveau enregistrement créé avec succès";
          } else {
            echo "Impossible de créer l'enregistrement";
          }
          
          header("Location: index.php");
          }
        }
        ajout_user();
          
   

     
          

    


?>