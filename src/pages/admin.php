<div class="container-fluid p-lg-5 p-md-3">
    <h2 class="display-4 text-center px-lg-5 py-lg-5 p-md-3 py-3">Administrateur</h2>

    <div class="d-flex justify-content-center mb-5">
        <a href="index.php?page=creation_atelier" class="btn btn-primary btn-green-nav">
            Créer un atelier
        </a>
    </div>
    <hr>
    <h3 class="display-5 text-center px-lg-5 p-md-3 py-3">Ateliers crées :</h3>
    <div class="row row-cols-1 row-cols-md-2 g-4">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">Prestation</th>
                    <th scope="col">Date</th>
                    <th scope="col">Titre</th>
                    <th scope="col">Description</th>
                    <th scope="col">Places restantes</th>
                    <th scope="col">Liste utilisateurs</th>
                    <th scope="col">Modifier</th>
                    <th scope="col">Désactiver</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    
                    include 'src/functions/connexion_bdd.php';

                $sql = 'SELECT a.id_atelier, a.nom, a.description, d.id_dateAtelier, d.id_atelier, d.date_atelier, d.nb_place, d.id_prestation FROM atelier a RIGHT JOIN date_atelier d ON a.id_atelier = d.id_atelier ORDER BY d.date_atelier';
                $req = $bdd->query($sql);
                $datas = $req->fetchAll();
                foreach ($datas as $data) {
                ?>
                    <tr>
                        <td>
                            <?php
                            switch ($data['id_prestation']) {
                                case 1:
                                    echo 'Conseil en Evolution Professionnelle';
                                    break;
                                case 2:
                                    echo 'Accélèr\'Emploi';
                                    break;
                                case 3:
                                    echo 'Atelier Conseil';
                                    break;
                            }
                            ?>
                        </td>
                        <td><?= $data['date_atelier'] ?></td>
                        <td><?= $data['nom'] ?></td>
                        <td><?= substr($data['description'], 0, 20) ?>...</td>
                        <td><?= $data['nb_place'] ?></td>
                        <td>
                            <!-- Button trigger modal -->
                            <a href="#" data-bs-toggle="modal" data-bs-target="#modal<?= $data['id_dateAtelier'] ?>">Voir</a>
                            <!-- Modal -->
                            <div class="modal fade" id="modal<?= $data['id_dateAtelier'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <ul>
                                                <?php
                                                $sql = 'SELECT * FROM association_user_date a JOIN user u ON a.id_user = u.id_user WHERE id_dateAtelier = "' . $data['id_dateAtelier'] . '"';
                                                $req = $bdd->query($sql);
                                                $results = $req->fetchAll();
                                                foreach ($results as $result) {
                                                ?>
                                                    <li><?= $result['prenom'] . ' ' . $result['nom'] ?></li>
                                                <?php } ?>
                                            </ul>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            <button type="button" class="btn btn-primary btn-green-nav">Save changes</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
                        <td>
                            <button type="submit" class="btn btn-primary btn-green-nav" name="inscription_atelier">
                                Modifier
                            </button>
                        </td>
                        <td>
                            <button type="submit" class="btn btn-primary btn-green-nav" name="inscription_atelier">
                                Désactiver
                            </button>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>