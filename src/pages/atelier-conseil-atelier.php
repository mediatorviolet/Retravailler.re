<?php
include 'src/functions/inscription_atelier.php';
inscriptionAtelier(); //Fonction qui gère l'inscription des utilisateurs à un atelier
?>

<link rel="stylesheet" href="src/style/atelier.css">

<div class="container-fluid p-lg-5 p-md-3 main">
    <?php
    /**
     * Affiche un message de réussite ou  d'échec en fonction de la valeur de $count_err (défini dans la fonction
     * inscriptionAtelier())
     */
    if (isset($_POST['inscription_atelier']) && $count_err == 0) {
        echo '<div class="alert alert-success alert-dismissible fade show col-6 mx-auto mb-5 text-center fw-bold shadow" role="alert">';
        echo '<span>Inscription réussie</span>';
        echo '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>';
        echo '</div>';
    } else if ($count_err > 0) {
        echo '<div class="alert alert-danger alert-dismissible fade show col-6 mx-auto mb-5 text-center fw-bold shadow" role="alert">';
        echo '<span>Veuillez choisir une date</span>';
        echo '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>';
        echo '</div>';
    }
    ?>
    <h2 class="display-4 text-center px-lg-5 py-lg-4 p-md-3 py-3">NOS ATELIERS</h2>
    <div class="row row-cols-1 row-cols-md-2 g-4">
        <?php
        include 'src/functions/connexion_bdd.php'; // Connexion à la BDD

        // On sélectionne tous les ateliers liés à la prestation 3 (Atelier Conseil)
        $req = $bdd->query('SELECT * FROM atelier WHERE id_prestation = 3');
        $donnees = $req->fetchAll(); // fectAll() renvoie un tableau
        if (empty($donnees)) { // Si le tableau est vide (il n'y a pas d'ateliers), on affiche le message qui suit
            echo "<div class='w-100 my-5 py-5'>";
            echo "<h5 class='text-center'>Aucun atelier pour le moment</h5>";
            echo "</div>";
        }
        
        // On parcours le tableau retourné par la fonction fetchAll() pour afficher les données dans la page
        foreach ($donnees as $donnee) { ?>
            <div class="col">
                <div class="card h-100">
                    <form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST">
                        <div class="card-body">
                            <h5 class="card-title"><?= $donnee['nom'] ?></h5>
                            <p class="card-text" style="text-align: justify;">
                                <?= $donnee['description'] ?>
                            </p>
                            <select name="date" class="form-select" aria-label="Default select example">
                                <option value="false" selected>Choisissez une date</option>
                                <?php
                                // On sélectionne toutes les dates liées à la prestation 2, à l'atelier et dont l'état = 1 (activé)
                                $req2 = $bdd->query('SELECT * FROM date_atelier WHERE id_prestation = 3 AND id_atelier = "' . $donnee['id_atelier'] . '" AND etat = 1');
                                $data = $req2->fetchAll();

                                /**
                                 * On sélectionne `id_dateAtelier` dans la table `association_user_date` lié à l'utilisateur
                                 * connecté.
                                 * Cela servira à désactiver la possibilité de s'inscrire une date à laquelle il serait déjà 
                                 * inscrit.
                                 */
                                $req3 = $bdd->query('SELECT id_dateAtelier FROM association_user_date WHERE id_user = "' . $_SESSION['user']['id_user'] . '"');
                                $r = $req3->fetchAll();

                                for ($i = 0; $i < count($data); $i++) {
                                ?>
                                    <option value="<?= $data[$i]['id_dateAtelier'] ?>" <?php
                                                                                        foreach ($r as $s) {
                                                                                            if ($s['id_dateAtelier']  == $data[$i]['id_dateAtelier']) {
                                                                                                echo 'disabled';
                                                                                            } else {
                                                                                                echo '';
                                                                                            }
                                                                                        }
                                                                                        // Fermeture la requête en cours
                                                                                        $req3->closeCursor();
                                                                                        ?>>
                                        <?= $data[$i]['date_atelier'] . ' - ' . $data[$i]['nb_place'] . ' places restantes' ?>
                                    </option>
                                <?php }
                                // Fermeture la requête en cours
                                $req2->closeCursor();
                                ?>
                            </select>
                        </div>
                        <div class="card-footer text-end">
                            <button type="submit" class="btn btn-primary btn-green-nav" name="inscription_atelier">
                                S'inscrire
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        <?php }
        // Fermeture la requête en cours
        $req->closeCursor();
        ?>
    </div>
</div>