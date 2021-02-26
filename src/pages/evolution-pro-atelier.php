<?php
include 'src/functions/auth.php';
include 'src/functions/inscription_atelier.php';
inscriptionAtelier();
?>

<link rel="stylesheet" href="src/style/atelier.css">

<div class="container-fluid p-lg-5 p-md-3 main">
    <h2 class="display-4 text-center px-lg-5 py-lg-4 p-md-3 py-3">NOS ATELIERS</h2>
    <div class="row row-cols-1 row-cols-md-2 g-4">
        <?php
        include 'src/functions/connexion_bdd.php';

        $reponse = $bdd->query('SELECT * FROM atelier WHERE id_prestation = 1');
        $donnees = $reponse->fetchAll();
        if (empty($donnees)) {
            echo "<div class='w-100 my-5 py-5'>";
            echo "<h5 class='text-center'>Aucun atelier pour le moment</h5>";
            echo "</div>";
        }
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
                                <option selected>Choisissez une date</option>
                                <?php
                                $response = $bdd->query('SELECT * FROM date_atelier WHERE id_prestation = 1 AND id_atelier = "' . $donnee['id_atelier'] . '" AND etat = 1');
                                $data = $response->fetchAll();

                                $request = $bdd->query('SELECT id_dateAtelier FROM association_user_date WHERE id_user = "' . $_SESSION['user']['id_user'] . '"');
                                $r = $request->fetchAll();

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
                                                                                        ?>>
                                        <?= $data[$i]['date_atelier'] . ' - ' . $data[$i]['nb_place'] . ' places restantes' ?>
                                    </option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="card-footer text-end">
                            <button type="submit" class="btn btn-primary btn-green-nav" name="inscription_atelier" <?= !Auth::isLogged() ? 'disabled' : '' ?>>
                                S'inscrire
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        <?php }
        $reponse->closeCursor();
        ?>
    </div>
</div>