 <!-- Main CSS -->
 <link rel="stylesheet" href="src/style/espace-perso.css">

 <div class="container-fluid main-perso">
     <h2 class="text-uppercase text-white text-center">votre espace personnel</h2>
     <h4 class="text-white text-center mt-5">Bienvenue <?php echo $_SESSION['user']['prenom'] ?></h4>
 </div>

 <div class="container-fluid atelier-perso">
     <div class="col-md-6 px-5 mb-5">
         <h2>Voici la liste de vos ateliers :</h2>
     </div>
     <div class="accordion accordion-flush px-5" id="accordionFlushExample">
         <?php
            include 'src/functions/connexion_bdd.php';

            $sql = 'SELECT association_user_date.*, date_atelier.*, atelier.* FROM association_user_date JOIN date_atelier ON association_user_date.id_dateAtelier = date_atelier.id_dateAtelier JOIN atelier ON date_atelier.id_atelier = atelier.id_atelier WHERE association_user_date.id_user = "' . $_SESSION['user']['id_user'] . '"';
            $req = $bdd->query($sql);
            $datas = $req->fetchAll();
            foreach ($datas as $data) {
            ?>
             <div class="accordion-item">
                 <h2 class="accordion-header" id="flush-headingOne">
                     <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#id_<?= $data['id_dateAtelier'] ?>" aria-expanded="false" aria-controls="<?= $data['id_dateAtelier'] ?>">
                         <?= $data['nom'] ?> -
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
                     </button>
                 </h2>
                 <div id="id_<?= $data['id_dateAtelier'] ?>" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                     <div class="accordion-body">
                         <p><?= $data['description'] ?></p>
                         <p><b><?= $data['date_atelier'] ?></b></p>
                     </div>
                 </div>
             </div>
         <?php } ?>
     </div>
 </div>