<?php

function ajout_user()
{
  if (isset($_POST['inscription'])) {
    try {
      $bdd = new PDO('mysql:host=localhost;dbname=retravailler;charset=utf8', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    } catch (Exception $e) {
      die('Erreur : ' . $e->getMessage());
    }



    // creation des variables pour l'ajout d'utilisateur
    $role1 = 1;
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $telephone = $_POST['tel'];
    $email = $_POST['email'];
    $pass = password_hash($_POST['pass'], PASSWORD_DEFAULT);
    $etat = 1;


    // creation d'une variable qui appelle la methode prepare() sur la variable objet bdd
    // la demande SQL est entrée en parametre, et les placeholder ecrit avec :nom_du_placeholder

    if(!empty($nom) && !empty($prenom)  && !empty($telephone) && !empty($email) && !empty($pass))
    {
      $insertion = $bdd->prepare("INSERT INTO utilisateur (role, nom, prenom, telephone, email, motDePasse, etat) VALUES (:role1, :nom, :prenom, :tel, :email, :pass, :etat)");

      // on utilise la methode bindparam pour lier les placeholder au variable
      // premier parametre le placeholder, deuxieme la variable qui doit s'y referer
      $insertion->bindParam(':role1', $role1);
      $insertion->bindParam(':nom', $nom);
      $insertion->bindParam(':prenom', $prenom);
      $insertion->bindParam(':email', $email);
      $insertion->bindParam(':tel', $telephone);
      $insertion->bindParam(':pass', $pass);
      $insertion->bindParam(':etat', $etat);
      $insertion->execute();
      header("Location: login-page.php");
      die;
    }



   
  }
}
