<link rel="stylesheet" href="src/style/atelier.css">

<div class="container-fluid p-lg-5 p-md-3 main">
    <h2 class="display-4 text-center px-lg-5 py-lg-4 p-md-3 py-3">NOS ATELIERS</h2>
    <div class="row row-cols-1 row-cols-md-2 g-4">
        <?php
        try {
            $bdd = new PDO('mysql:host=localhost;dbname=retravailler_final;charset=utf8', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        } catch (Exception $e) {
            die('Erreur : ' . $e->getMessage());
        }

        $reponse = $bdd->query('SELECT * FROM atelier WHERE id_prestation = 3');
        $donnees = $reponse->fetch();
        if (empty($donnees)) {
            echo "<div class='w-100 my-5 py-5'>";
            echo "<h5 class='text-center'>Aucun atelier pour le moment</h5>";
            echo "</div>";
        }
        while ($donnees) { ?>
            <div class="col">
                <div class="card h-100">
                    <div class="card-body">
                        <h5 class="card-title"><?= $donnees['nom'] ?></h5>
                        <p class="card-text" style="text-align: justify;">
                            <?= $donnees['description'] ?>
                        </p>
                        <p></p>
                        <select class="form-select" aria-label="Default select example">
                            <option selected>Choisissez une date</option>
                            <?php
                            $response = $bdd->query('SELECT * FROM date_atelier WHERE id_prestation = 3');
                            while ($donnees = $response->fetch()) {
                            ?>
                                <option value="<?= $donnees['date_atelier'] ?>"><?= $donnees['date_atelier'] ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="card-footer text-end">
                        <button type="submit" class="btn btn-primary btn-green-nav">S'inscrire</button>
                    </div>
                </div>
            </div>
        <?php }
        $reponse->closeCursor();
        ?>
    </div>
</div>
</div>