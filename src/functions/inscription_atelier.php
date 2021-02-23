<?php
function inscriptionAtelier()
{
    if (isset($_POST['inscription_atelier'])) {
        echo 'AAAAAAAAAA';
        try {
            $bdd = new PDO('mysql:host=127.0.0.1;dbname=retravailler_final;charset=utf8', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        } catch (Exception $e) {
            die('Erreur : ' . $e->getMessage());
        }
    
        $req = $bdd->prepare("INSERT INTO association_user_date (id_user, id_dateAtelier) VALUES (:id_user, :id_dateAtelier)");
    
        $req->execute(array(
            'id_user' => $_SESSION['user']['id_user'],
            'id_dateAtelier' => $_POST['date']
        ));
    }
}
