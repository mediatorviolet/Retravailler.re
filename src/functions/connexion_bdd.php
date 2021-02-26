<?php
/**
 * 
 * Connexion à la BDD
 * Cette page est appelée à chque fois qu'on à besoin de se connecter à la BDD
 * 
 */

if ($_SERVER["REMOTE_ADDR"] == "127.0.0.1") { // Si on est en local on utilise ces identifiants
    $serveur = "127.0.0.1";
    $dbname = "retravailler_final";
    $user = "root";
    $password = "";
} else { // Sinon on utilise les identifiants de la BDD Heroku
    $serveur = "us-cdbr-east-03.cleardb.com";
    $dbname = "heroku_7c2ac3a00a455e9";
    $user = "be460bc87bab43";
    $password = "2fe501de";
}

try {
    //On se connecte à la BDD
    $bdd = new PDO("mysql:host=$serveur;dbname=$dbname", $user, $password);
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    error_log(date('l jS \of F Y h:i:s A') . ": Connexion à la base de données réussie\r\n", 3, 'src/var/logSuccess.txt');
} catch (PDOException $e) { // Si erreur, on renvoi un message d'erreur
    error_log(date('l jS \of F Y h:i:s A') . ": Connexion à la base de données impossible\r\n", 3, 'src/var/logError.txt');
    echo 'Erreur : ' . $e->getMessage();
}
