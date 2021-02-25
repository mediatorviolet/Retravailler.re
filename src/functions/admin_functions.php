<?php

function creationAtelier()
{
    $count_crea = 0;
    if (isset($_POST['creer_atelier'])) {
        global $count_crea;
        include 'src/functions/connexion_bdd.php';

        extract($_POST);
        $requiredInput = array(
            $prestation,
            $titre,
            $description,
            $date0,
            $heure0,
            $nb_place0
        );

        foreach ($requiredInput as $input) {
            htmlentities(trim($input));
            if (empty($input)) {
                $count_crea++;
            }
        }

        if ($count_crea == 0) {
            $sql_atelier = 'INSERT INTO atelier (id_prestation, nom, description) VALUES (:id_prestation, :nom, :description)';
            $req_atelier = $bdd->prepare($sql_atelier);

            $req_atelier->execute(array(
                'id_prestation' => $prestation,
                'nom' => $titre,
                'description' => $description
            ));

            $sql_date = 'INSERT INTO date_atelier (id_atelier, date_atelier, nb_place, id_prestation) VALUES (:id_atelier, :date_atelier, :nb_place, :id_prestation)';
            $req_date = $bdd->prepare($sql_date);

            $sql_idAtelier = 'SELECT MAX(id_atelier) FROM atelier';
            $req_idAtelier = $bdd->query($sql_idAtelier);
            $data = $req_idAtelier->fetchColumn();
            if (count($_POST) == 7) {
                $req_date->execute(array(
                    'id_atelier' => $data,
                    'date_atelier' => $date0 . ' ' . $heure0,
                    'nb_place' => $nb_place0,
                    'id_prestation' => $prestation
                ));
            } else {
                for ($i = 0; $i < (count($_POST) - 8); $i++) {
                    $req_date->execute(array(
                        'id_atelier' => $data,
                        'date_atelier' => $_POST['date' . $i] . ' ' . $_POST['heure' . $i],
                        'nb_place' => $_POST['nb_place' . $i],
                        'id_prestation' => $prestation
                    ));
                }
            }
        }
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

function modifier()
{
    $count_modif = 0;
    if (isset($_POST['modifier'])) {
        global $count_modif;
        extract($_POST);
        if (!empty($date) && !empty($heure) && !empty($nb_place)) {
            htmlentities($date);
            htmlentities($heure);
            htmlentities($nb_place);
            include 'src/functions/connexion_bdd.php';

            $sql = 'UPDATE date_atelier SET date_atelier = "' . $date . ' ' . $heure . '", nb_place = "' . $nb_place . '" WHERE id_dateAtelier = "' . $id_date . '"';
            $bdd->query($sql);
        } else {
            $count_modif++;
        }
    }
}
