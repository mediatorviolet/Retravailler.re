<?php
include 'src/functions/ajout_utilisateur.php';
//ajout_utilisateur();
// ajout utilisateur dans la base de données
?>

<form action="" method="post">
    <div class="mb-3">
        <label for="nom" class="form-label">Nom</label>
        <input type="text" class="form-control" name="nom" id="nom">
    </div>
    <div class="mb-3">
        <label for="prenom" class="form-label">Prenom</label>
        <input type="text" class="form-control" name="prenom" id="prenom">
    </div>
    <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="email" class="form-control" name="email" id="email">
    </div>
    <div class="mb-3">
        <label for="tel" class="form-label">Téléphone</label>
        <input type="tel" class="form-control" name="tel" id="tel">
    </div>
    <div class="mb-3">
        <label for="pass" class="form-label">Mot de passe</label>
        <input type="password" class="form-control" name="pass" id="pass">
    </div>
    <div class="mb-3">
        <label for="passConfirmation" class="form-label">Confirmez le mot de passe</label>
        <input type="password" class="form-control" name="passConfirmation" id="passConfirmation">
    </div>
    <button type="submit" class="btn btn-primary btn-green-nav" name="inscription">Inscription</button>
</form>

