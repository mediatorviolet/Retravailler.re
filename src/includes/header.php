<link rel="stylesheet" href="src/style/header.css">

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-light bg-white shadow fixed-top">
    <div class="container-fluid col-md-8 mx-auto">
        <a class="navbar-brand" href="#"><img class="nav-logo img-fluid" style="width: 7rem;" src="src/ressources/img/logo-RW-reunion.png" alt="logo-RW-reunion"></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto me-3 mb-2 mb-lg-0 flex-end">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#">Accueil</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Nos prestations
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="#">Conseil en Evolution Professionnelle</a></li>
                        <li><a class="dropdown-item" href="#">Accélèr'Emploi</a></li>
                        <li><a class="dropdown-item" href="#">Atelier Conseil</a></li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Contactez-Nous</a>
                </li>
            </ul>

            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary btn-green-nav" data-bs-toggle="modal" data-bs-target="#connexion" data-bs-backdrop="false">
                Connexion
            </button>

            <!-- Modal connexion -->
            <div class="modal fade" id="connexion" tabindex="-1" aria-labelledby="connexionLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="connexionLabel">Connexion</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form>
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Email</label>
                                    <input type="email" class="form-control" id="exampleInputEmail1">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputPassword1" class="form-label">Mot de passe</label>
                                    <input type="password" class="form-control" id="exampleInputPassword1">
                                </div>
                                <button type="submit" class="btn btn-primary btn-green-nav">Connexion</button>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <a class="text-muted" href="#" data-bs-dismiss="modal" data-bs-toggle="modal" data-bs-target="#inscription" data-bs-backdrop="false">
                                Pas encore de compte ? Inscrivez-vous
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Modal inscription -->
            <div class="modal fade" id="inscription" tabindex="-1" aria-labelledby="inscriptionLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="inscriptionLabel">Inscription</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form>
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
                                <button type="submit" class="btn btn-primary btn-green-nav">Inscription</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</nav>