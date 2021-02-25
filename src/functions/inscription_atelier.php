<?php
function inscriptionAtelier()
{
    if (isset($_POST['inscription_atelier'])) {
        include 'src/functions/connexion_bdd.php';

        $request = $bdd->query('SELECT id_user FROM association_user_date WHERE id_user = "' . $_SESSION['user']['id_user'] . '" AND id_dateAtelier = "' . $_POST['date'] . '"');
        if (empty($request)) {
            $req = $bdd->prepare("INSERT INTO association_user_date (id_user, id_dateAtelier) VALUES (:id_user, :id_dateAtelier)");

            $req->execute(array(
                'id_user' => $_SESSION['user']['id_user'],
                'id_dateAtelier' => $_POST['date']
            ));

            $bdd->query('UPDATE date_atelier SET nb_place = nb_place - 1 WHERE id_dateAtelier = "' . $_POST['date'] . '"');
        }
    }
}

function desinscriptionAtelier() {
    if (isset($_POST['desinscription'])) {
        include 'src/functions/connexion_bdd.php';

        $sql_desinscription = 'DELETE FROM association_user_date WHERE id_dateAtelier = "' . $_POST['id_date'] . '" AND id_user = "' . $_SESSION['user']['id_user'] . '"';
        $bdd->query($sql_desinscription);

        $sql_nbplace = 'UPDATE date_atelier SET nb_place = nb_place + 1 WHERE id_dateAtelier = "' . $_POST['id_date'] . '"';
        $bdd->query($sql_nbplace);
    }
}