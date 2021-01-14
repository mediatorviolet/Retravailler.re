<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA==" crossorigin="anonymous" />
    <!-- Google Font -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
    <!-- Main CSS -->
    <link rel="stylesheet" href="src/style/style.css">
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white shadow fixed-top">
        <div class="container-fluid col-md-8 mx-auto">
            <a class="navbar-brand" href="#"><img id="logo_nav" src="src/resources/img/logo-RW-reunion.png" alt="logo-RW-reunion"></a>
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
                <button type="button" class="btn btn-primary">Connexion</button>
            </div>
        </div>
    </nav>

    <section class="main">
        <div class="container-fluid d-flex flex-column align-items-center">
            <img id="logo-main" src="src/resources/img/logo-RW-reunion.png" alt="logo-RW-reunion">
            <h2 class="slogan mt-5">orientation | formation | emploi | conseil</h2>
            <button type="button" class="btn-lg btn-primary rounded-pill mt-5 py-3 px-5">Nos prestations<i class="fas fa-angle-down ms-2"></i></button>
        </div>
    </section>

    <section class="infos">
        <div class="container-fluid d-flex justify-content-center">
            <div class="col d-flex justify-content-end me-5">
                <i class="fas fa-book-open"></i>
            </div>
            <div class="col-4 me-5">
                <h2 class="mb-5 infos-title">Qui sommes-nous ?</h2>
                <p class="text-infos">
                    Le Réseau National Retravailler est né en 1974 sur l’impulsion d’Evelyne SULLEROT, sociologue, afin d’accompagner les femmes qui souhaitaient reprendre une activité professionnelle.
                </p>
                <p class="text-infos">
                    A cette occasion, Retravailler développe les premiers outils d’aide à l’orientation des adultes, en France, en s’appuyant sur une approche psychosociale et le développement d’une méthode innovante. Ces travaux seront à l’origine de la méthodologie du Bilan de Compétences.
                </p>
                <p class="text-infos">
                    Depuis Retravailler a élargi son action pour le public à l’ensemble des actifs : jeunes, adultes, hommes, femmes… Son cœur de métiers reste centré sur l’accompagnement et la sécurisation des trajectoires professionnelles.
                </p>
            </div>
            <div class="col-4 side-infos">
            </div>
            <div class="col"></div>
        </div>
    </section>

    <section class="prestation">
        <div class="container-fluid row">
            <div class="col-2">
                <i class="fas fa-cannabis"></i>
                <h2>Nos prestations</h2>
            </div>
            <div class="col-6">
                <h2>Conseil en évolution professionnelle</h2>
            </div>
        </div>
    </section>
</body>

</html>