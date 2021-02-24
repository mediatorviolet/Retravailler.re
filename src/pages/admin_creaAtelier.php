<?php
include 'src/functions/admin_functions.php';
creationAtelier()
?>

<div class="container-fluid p-lg-5 p-md-3">
    <h2 class="display-4 text-center px-lg-5 py-lg-5 p-md-3 py-3">Création atelier</h2>
    <div>
        <form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST" class="row g-3 col-md-10 mx-auto">
            <div class="col-12">
                <label for="prestation" class="form-label">Prestation</label>
                <select name="prestation" id="" class="form-select">
                    <option value="" selected>Choisir une prestation</option>
                    <option value="1">Conseil en Evolution Professionnelle</option>
                    <option value="2">Accélèr'Emploi</option>
                    <option value="3">Atelier Conseil</option>
                </select>
            </div>
            <div class="col-12">
                <label for="titre" class="form-label">Titre</label>
                <input type="text" class="form-control" id="titre" name="titre">
            </div>
            <div class="col-12">
                <label for="description" class="form-label">Description</label>
                <textarea name="description" id="description" class="form-control" cols="30" rows="10"></textarea>
            </div>
            <div id="div0" class="mt-5">
                <div class="input-group col-md-6">
                    <span class="input-group-text">Date et heure</span>
                    <input type="date" aria-label="First name" class="form-control" name="date0">
                    <input type="time" aria-label="Last name" class="form-control" name="heure0">
                </div>
                <div class="col-md-6">
                    <label for="nb_place1" class="form-label">Nombre de places</label>
                    <input type="number" class="form-control" name="nb_place0" min="1">
                </div>
            </div>
            <div>
                <p id="ajout_date" class="d-inline">Ajouter une date</p>
            </div>
            <div class="col-12 text-end">
                <button type="submit" class="btn btn-primary btn-green-nav" name="creer_atelier">Créer</button>
            </div>
        </form>
    </div>
</div>

<script src="src/functions/form.js"></script>