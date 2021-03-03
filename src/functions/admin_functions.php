<?php

/**
 * 
 * Fonction admin pour créer un atelier
 * 
 */
function creationAtelier()
{
    $count_crea = 0; // Compteur d'erreur
    if (isset($_POST['creer_atelier'])) { // On vérifie que l'admin à cliqué sur le btn 'creer_atelier'
        global $count_crea;
        include 'src/functions/connexion_bdd.php'; // Connexion à la BDD

        extract($_POST); // Extraction des variables présentes dans le tableau POST
        $requiredInput = array(
            $prestation,
            $titre,
            $description,
            $date0,
            $heure0,
            $nb_place0
        );


        // Pour chaque éléments dans le tableau $requiredInput, on passe les fonctions htmlentities() et trim()
        foreach ($requiredInput as $input) {
            htmlentities(trim($input));
            if (empty($input)) { // Si un champ est vide, le compteur d'erreur augmente
                $count_crea++;
            }
        }

        if ($count_crea == 0) { // Si le compteur d'erreur est à 0, on crée l'atelier
            // Dans la table `atelier`, on insère `id_prestation`, `nom` et `description`
            $sql_atelier = 'INSERT INTO atelier (id_prestation, nom, description) VALUES (:id_prestation, :nom, :description)';
            $req_atelier = $bdd->prepare($sql_atelier);

            $req_atelier->execute(array(
                'id_prestation' => $prestation,
                'nom' => $titre,
                'description' => $description
            ));

            $sql_date = 'INSERT INTO date_atelier (id_atelier, date_atelier, nb_place, id_prestation) VALUES (:id_atelier, :date_atelier, :nb_place, :id_prestation)';
            $req_date = $bdd->prepare($sql_date);

            $sql_idAtelier = 'SELECT MAX(id_atelier) FROM atelier'; // On sélection la dernière entrée de la table `atelier`
            $req_idAtelier = $bdd->query($sql_idAtelier);
            $data = $req_idAtelier->fetchColumn();

            if (count($_POST) == 7) { // Si la longueur du tableau POST == 7, alors on a ajouté aucun champ supplémentaire
                $req_date->execute(array(
                    'id_atelier' => $data,
                    'date_atelier' => $date0 . ' ' . $heure0,
                    'nb_place' => $nb_place0,
                    'id_prestation' => $prestation
                ));
            } else { // Sinon, on a ajouté des champs supplémentaires
                for ($i = 0; $i < (count($_POST) - 8); $i++) { // (count($_POST) - 8) permet d'obtenir le nombre de champs supplémentaires
                    $req_date->execute(array(
                        'id_atelier' => $data,
                        'date_atelier' => $_POST['date' . $i] . ' ' . $_POST['heure' . $i],
                        'nb_place' => $_POST['nb_place' . $i],
                        'id_prestation' => $prestation
                    ));
                }
            }
        }
        error_log(date('l jS \of F Y h:i:s A') . ": l'atelier a été créé avec succès\r\n", 3, 'src/var/log.txt');
    }
}

/**
 * 
 * Fonction pour désactiver une date
 *  
 */
function desactiver()
{
    if (isset($_POST['desactiver'])) { // Si l'admin clique sur le btn 'desactiver'
        include 'src/functions/connexion_bdd.php'; // Connexion à la BDD

        // Màj dans la table `date_atelier`, si `etat` = 1 alors il sera égal à 1, sinon 0
        $sql = 'UPDATE date_atelier SET etat = CASE WHEN etat = 1 THEN 0 ELSE 1 END WHERE id_dateAtelier = "' . $_POST['id_date_desactiver'] . '"';
        $bdd->query($sql);
        error_log(date('l jS \of F Y h:i:s A') . ": date desactivée avec succès\r\n", 3, 'src/var/log.txt');
    }
}

/**
 * 
 * Fonction pour la modification d'une date
 * 
 */
function modifier()
{
    $count_modif = 0; // Compteur d'erreur
    if (isset($_POST['modifier'])) { // Si l'admin clique sur le bouton 'modifier'
        global $count_modif;
        extract($_POST); // Extraction des variables présentes dans le tableau POST
        if (!empty($date) && !empty($heure) && !empty($nb_place)) { // On vérifie que les champs ne sont pas vides
            // On passe la fonction htmlentities() aux différents champs
            htmlentities($date);
            htmlentities($heure);
            htmlentities($nb_place);
            include 'src/functions/connexion_bdd.php'; // Connexion à la BDD

            // Mise à jour de la date, l'heure et le nombre de places
            $sql = 'UPDATE date_atelier SET date_atelier = "' . $date . ' ' . $heure . '", nb_place = "' . $nb_place . '" WHERE id_dateAtelier = "' . $id_date . '"';
            $bdd->query($sql);
            error_log(date('l jS \of F Y h:i:s A') . ": date modifiée avec succès\r\n", 3, 'src/var/log.txt');
        } else { // Si des champs sont vides, le compteur d'erreurs s'incrémente
            $count_modif++;
            error_log(date('l jS \of F Y h:i:s A') . ": erreur lors de la modification de la date\r\n", 3, 'src/var/log.txt');
        }
    }
}
