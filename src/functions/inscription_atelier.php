<?php

/**
 * 
 * Fonction qui gère l'inscription d'un utilisateur à un atelier
 * 
 */
$count_err = 0;
function inscriptionAtelier()
{
    if (isset($_POST['inscription_atelier'])) { // On vérifie que l'utilisateur à cliqué sur le bouton 'inscription_atelier'
        global $count_err;

        // On vérifie que le $_POST['date'] n'est pas vide et qu'il n'est pas égal à 'false'
        if (!empty($_POST['date']) && $_POST['date'] != 'false') {
            include 'src/functions/connexion_bdd.php'; // Connexion à la BDD

            // Inutile
            // $bdd->query('SELECT id_user FROM association_user_date WHERE id_user = "' . $_SESSION['user']['id_user'] . '" AND id_dateAtelier = "' . $_POST['date'] . '"');

            $req = $bdd->prepare("INSERT INTO association_user_date (id_user, id_dateAtelier) VALUES (:id_user, :id_dateAtelier)");

            $req->execute(array(
                'id_user' => $_SESSION['user']['id_user'],
                'id_dateAtelier' => $_POST['date']
            ));

            // Quand un utilisateur s'inscrit, le nombre de place diminue
            $bdd->query('UPDATE date_atelier SET nb_place = nb_place - 1 WHERE id_dateAtelier = "' . $_POST['date'] . '"');
        } else {
            $count_err++;
        }
    }
}

/**
 * 
 * Fonction qui gère la désinscription à un atelier
 * 
 */
function desinscriptionAtelier()
{
    if (isset($_POST['desinscription'])) { // On vérifie que l'utilisateur clique sur le btn 'desinscription'
        include 'src/functions/connexion_bdd.php'; // Connexion à la BDD

        // Suppression de la ligne correspondante dans la table `association_user_date`
        $sql_desinscription = 'DELETE FROM association_user_date WHERE id_dateAtelier = "' . $_POST['id_date'] . '" AND id_user = "' . $_SESSION['user']['id_user'] . '"';
        $bdd->query($sql_desinscription);

        // Mise à jour du nombre de places disponibles
        $sql_nbplace = 'UPDATE date_atelier SET nb_place = nb_place + 1 WHERE id_dateAtelier = "' . $_POST['id_date'] . '"';
        $bdd->query($sql_nbplace);
    }
}
