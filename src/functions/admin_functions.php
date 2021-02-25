<?php

function creationAtelier()
{
    if (isset($_POST['creer_atelier'])) {

        include 'src/functions/connexion_bdd.php';

        extract($_POST);
        $sql_atelier = 'INSERT INTO atelier (id_prestation, nom, description) VALUES (:id_prestation, :nom, :description)';
        $req_atelier = $bdd->prepare($sql_atelier);

        $req_atelier->execute(array(
            'id_prestation' => $_POST['prestation'],
            'nom' => $_POST['titre'],
            'description' => $_POST['description']
        ));

        $sql_date = 'INSERT INTO date_atelier (id_atelier, date_atelier, nb_place, id_prestation) VALUES (:id_atelier, :date_atelier, :nb_place, :id_prestation)';
        $req_date = $bdd->prepare($sql_date);

        $sql_idAtelier = 'SELECT MAX(id_atelier) FROM atelier';
        $req_idAtelier = $bdd->query($sql_idAtelier);
        $data = $req_idAtelier->fetchColumn();
        if (count($_POST) == 7) {
            $req_date->execute(array(
                'id_atelier' => $data,
                'date_atelier' => $_POST['date0'] . ' ' . $_POST['heure0'],
                'nb_place' => $_POST['nb_place0'],
                'id_prestation' => $_POST['prestation']
            ));
        } else {
            for ($i = 0; $i < (count($_POST) - 8); $i++) {
                $req_date->execute(array(
                    'id_atelier' => $data,
                    'date_atelier' => $_POST['date' . $i] . ' ' . $_POST['heure' . $i],
                    'nb_place' => $_POST['nb_place' . $i],
                    'id_prestation' => $_POST['prestation']
                ));
            }
        }
        header('Location: index.php?page=admin');
    }
}

function desactiver()
{
    if (isset($_POST['desactiver'])) {
        include 'src/functions/connexion_bdd.php';

        $sql = 'UPDATE date_atelier SET etat = CASE WHEN etat = 1 THEN 0 ELSE 1 END WHERE id_dateAtelier = "' . $_POST['id_date_desactiver'] . '"';
        $bdd->query($sql);        
    }
}
