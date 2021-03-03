<?php

/**
 * Vérifie que l'utilisateur est bien connecté et qu'il est autorisé à visiter la page (role)
 * Sinon il est redirigé vers la page de connexion
 */
require 'src/functions/auth.php';
if (!Auth::isLogged() && $_SESSION['user']['role'] != 2) {
    header('Location: login-page.php');
}

// Fonctions qui gèrent la desactivation et la modification des ateliers
include 'src/functions/admin_functions.php';
desactiver();
modifier();
?>

<div class="container-fluid p-lg-5 p-md-3">
    <h2 class="display-4 text-center px-lg-5 py-lg-5 p-md-3 py-3">Administrateur</h2>

    <div class="d-flex justify-content-center mb-5">
        <a href="index.php?page=creation_atelier" class="btn btn-primary btn-green-nav">
            Créer un atelier
        </a>
    </div>
    <hr>
    <?php
    // Affiche un message d'alerte en fonction de la valeur de $count_crea (défini dans la fonction creationAtelier())
    if (isset($_POST['modifier'])) {
        if ($count_modif > 0) { ?>
            <div class="alert alert-danger alert-dismissible fade show col-6 mx-auto mb-5 text-center fw-bold shadow" role="alert">
                <span>Une erreur est survenue</span>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php
        } else { ?>
            <div class="alert alert-success alert-dismissible fade show col-6 mx-auto mb-5 text-center fw-bold shadow" role="alert">
                <span>La date a bien été modifiée</span>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
    <?php
        }
    }
    ?>
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

                include 'src/functions/connexion_bdd.php'; // Connexion à la BDD

                /**
                 * Jointure des tables `atelier` et `date_atelier` où correspond la valeur de `id_atelier`
                 * Le but est d'afficher chaque date
                 * Les dates sont classées par ordre croissant
                 */
                $sql = 'SELECT a.id_atelier, a.nom, a.description, d.id_dateAtelier, d.id_atelier, d.date_atelier, d.nb_place, d.id_prestation, d.etat FROM atelier a RIGHT JOIN date_atelier d ON a.id_atelier = d.id_atelier ORDER BY d.date_atelier';
                $req = $bdd->query($sql);
                $datas = $req->fetchAll(); // fetchAll() renvoi un tableau avec toutes les correspondances
                foreach ($datas as $data) { // On parcours le tableau pour afficher les informations
                ?>
                    <tr>
                        <td>
                            <?php
                            // On change l'affichage en fonction de la valeur de `id_prestation`
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
                        <td>
                            <!-- On affiche que les 16 premiers caractères pour ne pas afficher les secondes -->
                            <?= substr($data['date_atelier'], 0, 16) ?>
                        </td>
                        <td>
                            <?= $data['nom'] ?>
                        </td>
                        <td>
                            <!-- On affiche que les 20 premiers caractères de la description -->
                            <?= substr($data['description'], 0, 20) ?>...
                        </td>
                        <td>
                            <?= $data['nb_place'] ?>
                        </td>
                        <td>
                            <!-- Button trigger modal -->
                            <a href="#" data-bs-toggle="modal" data-bs-target="#modal<?= $data['id_dateAtelier'] ?>">Voir</a>
                            <!-- Modal -->
                            <div class="modal fade" id="modal<?= $data['id_dateAtelier'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title text-light" id="exampleModalLabel">Liste des inscrits</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <ul class="list-group">
                                                <?php
                                                /**
                                                 * Jointure de la table `association_user_date` et `user` afin d'afficher
                                                 * la liste des utilisateurs inscrit à une date spécifique
                                                 */
                                                $sql = 'SELECT * FROM association_user_date a JOIN user u ON a.id_user = u.id_user WHERE id_dateAtelier = "' . $data['id_dateAtelier'] . '"';
                                                $req = $bdd->query($sql);
                                                $results = $req->fetchAll();

                                                // On parcours le tableau obtenu
                                                foreach ($results as $result) {
                                                ?>
                                                    <li class="list-group-item">
                                                        <?= $result['prenom'] . ' ' . $result['nom'] ?>
                                                    </li>
                                                <?php }
                                                // Fermeture de la requête en cours ( non nécessaire mais utile si changement de SGBD )
                                                $req->closeCursor();
                                                ?>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
                        <td>
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-primary btn-green-nav" data-bs-toggle="modal" data-bs-target="#modif<?= $data['id_dateAtelier'] ?>">
                                Modifier
                            </button>
                            <!-- Modal -->
                            <div class="modal fade" id="modif<?= $data['id_dateAtelier'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title text-light" id="exampleModalLabel">Modification</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
                                            <div class="modal-body">
                                                <div id="div0" class="mt-5">
                                                    <div class="input-group col-md-6">
                                                        <span class="input-group-text">Date et heure</span>
                                                        <!-- On prend les 10 premiers caractères pour avoir uniquement la date -->
                                                        <input type="date" aria-label="First name" class="form-control" name="date" value="<?= substr($data['date_atelier'], 0, 10) ?>" required autofocus>
                                                        <!-- On affiche à partir du 11e caractère afin d'avoir uniquement l'heure -->
                                                        <input type="time" aria-label="Last name" class="form-control" name="heure" value="<?= substr($data['date_atelier'], 11) ?>" required>
                                                    </div>
                                                    <div class="col-md-6 mt-4">
                                                        <label for="nb_place1" class="form-label">Nombre de places</label>
                                                        <!-- On ne peut pas mettre un nombre de places inférieur au nombre d'utilisateurs déjà inscrit -->
                                                        <input type="number" class="form-control" name="nb_place" min="<?= count($results) ?>" value="<?= $data['nb_place'] ?>" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <input type="hidden" name="id_date" value="<?= $data['id_dateAtelier'] ?>">
                                                <button type="submit" name="modifier" class="btn btn-primary btn-green-nav">Modifier</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </td>
                        <td>
                            <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
                                <input type="hidden" value="<?= $data['id_dateAtelier'] ?>" name="id_date_desactiver">
                                <!-- On change le texte du bouton en fonction de l'état de la date (active ou inactive) -->
                                <button type="submit" class="btn btn-primary btn-green-nav" name="desactiver">
                                    <?= $data['etat'] == 1 ? 'Désactiver' : 'Activer' ?>
                                </button>
                            </form>
                        </td>
                    </tr>
                <?php }
                $req->closeCursor();
                ?>
            </tbody>
        </table>
    </div>
</div>