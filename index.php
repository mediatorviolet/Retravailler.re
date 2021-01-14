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
    <?php include 'src/includes/header.php'; ?>

    <section class="main">
        <div class="container-fluid d-flex flex-column align-items-center">
            <img id="logo-main" src="src/ressources/img/logo-RW-reunion.png" alt="logo-RW-reunion">
            <h2 class="slogan mt-5">orientation | formation | emploi | conseil</h2>
            <button type="button" class="btn-lg btn-primary rounded-pill mt-5 py-3 px-5 btn-green">Nos prestations<i class="fas fa-angle-down ms-2"></i></button>
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
            <div class="col-3 mx-auto d-flex flex-row">
                <i class="fas fa-cannabis me-5"></i>
                <h2 class="title-presta">Nos prestations</h2>
            </div>
            <div class="col-6">
                <!-- <h2>Conseil en évolution professionnelle</h2> -->
            </div>
            <div class="container d-flex mt-5 mb-5 justify-content-center">
                <div class="col-3 img-cep ms-5">
                </div>
                <div class="col-6 ms-5">
                    <h2>Conseil en évolution professionnelle</h2>
                    <p>
                        Un temps pour vous, pour parler de vos envies et clarifier vos besoins. <br>
                        Un espace pour parler formation, compétences et certifications professionnelles. <br>
                        L’occasion d’évoquer la mobilité ou la reconversion professionnelle, la création / reprise d’entreprise. <br>
                        Vous apporter des réponses à la diversité de vos besoins. <br>
                        Construire votre projet avec le conseiller qui vous accompagne tout au long de sa mise en œuvre.
                    </p>
                    <button type="button" class="btn btn-primary btn-decouvrir">Découvrir</button>
                </div>
            </div>
            <div class="container d-flex mt-5 mb-5 justify-content-center">
                <div class="col-6 ms-5">
                    <h2>Accélèr'Emploi</h2>
                    <p>
                        La prestation <strong>Accélèr’Emploi</strong> a pour objectif le retour rapide à l’emploi grâce :
                    </p>
                    <ul>
                        <li>au renforcement de la maîtrise des outils et techniques de recherche d’emploi</li>
                        <li>à la mise sous tension des démarches favorisée par la dynamique de groupe</li>
                        <li>à un accompagnement et un soutien intensif</li>
                    </ul>
                    <button type="button" class="btn btn-primary btn-decouvrir">Découvrir</button>
                </div>
                <div class="col-3 img-ae ms-5">
                </div>
            </div>
            <div class="container d-flex mt-5 justify-content-center">
                <div class="col-3 img-atc ms-5">
                </div>
                <div class="col-6 ms-5">
                    <h2>Atelier conseil</h2>
                    <p>
                        La prestation <strong>Atelier Conseil</strong> s’inscrit dans l’offre de services prestations de Pôle Emploi.
                        Elle s’adresse à tous les actifs, qu’ils soient demandeurs d’emploi inscrits ou non, quel que soit leur niveau
                        d’expression écrite et / ou orale et leur aisance à utiliser les outils numériques.
                    </p>
                    <button type="button" class="btn btn-primary btn-decouvrir">Découvrir</button>
                </div>
            </div>
        </div>
    </section>

    <section class="contact">
        <div class="container-fluid">
            <h2 class="text-center text-white">Contactez-nous</h2>
            <div class="d-flex justify-content-center">
                <button type="button" class="btn btn-primary rounded-pill mt-3 py-3 px-5 btn-green"><i class="fas fa-phone-alt me-2"></i>Contact</button>
            </div>
            <div class="d-flex justify-content-center mt-5">
                <iframe class="col-8" src="https://www.google.com/maps/d/embed?mid=1StIVoLvuiMLhf3bpTaFzscL6xdWNtN4a&hl=fr" width="640" height="520"></iframe>
            </div>
        </div>
    </section>

    <?php include 'src/includes/footer.php'; ?>
</body>

</html>