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
    <link rel="stylesheet" href="src/style/atc.css">
</head>

<body>
    <?php include 'src/includes/header.php'; ?>
    <div class="container-fluid main-atc">
        <h2 class="text-white text-uppercase text-center">Atelier conseil</h2>
        <div class="bg-white w-25 mx-auto mt-4 separator"></div>
    </div>

    <div class="presentation container-fluid d-flex justify-content-center">
        <div class="col-4 me-4">
            <p class="text-presentation">
                La prestation « Atelier conseil » s’inscrit dans l’offre de services prestations de Pôle Emploi.
                Elle s’adresse à tous les actifs, qu’ils soient demandeurs d’emploi inscrits (toutes catégories confondues)
                ou non, quel que soit leur niveau d’expression écrite et/ou orale et leur aisance à utiliser les
                outils numériques. <br>
                17 ateliers sont proposés. Chaque atelier est une prestation collective en présentiel physique
                d’une durée pouvant varier d’une demi-journée (3 heures) à une journée (6 heures) hors temps de restauration.
            </p>
        </div>
        <div class="img-presentation col-4 ms-4"></div>
    </div>

    <div class="infos container-fluid d-flex justify-content-center">
        <div class="infos-box col-4 me-4 shadow">
            <h2 class="text-center text-uppercase mb-4">L'objectif</h2>
            <p>
                Les ateliers permettent aux bénéficiaieres de progresser dans l'acquisition :
            </p>
            <ul>
                <li>
                    De compétences : communication orale, numériques, capacités rédactionnelles, rigueur, prise de recul, 
                    autonomie.
                </li>
                <li>
                    De méthodologies : stratégies et techniques de recherche d'emploi, élaboration de projet professionnel, 
                    construction d'un parcours de formation, etc.
                </li>
                <li>
                    D'outils nécessaires à la stragtégie de recherche d'emploi et au suivi de son parcours professionnel 
                    tout au long de sa vie.
                </li>
            </ul>
        </div>
        <div class="infos-box col-4 ms-4 shadow">
            <h2 class="text-center text-uppercase mb-4">Déclenchement de la prestation</h2>
            <p>
                L'inscription sur la prestation peut être mobilisée à tout moment du parcours de retour vers l'emploi du 
                demandeur d'emploi et elle est possible selon deux modalités :
            </p>
            <ul>
                <li>
                    Le conseiller Pôle Emploi, avec l'accord du bénéficiaire, inscrit celui-ci depuis le système d'information 
                    en fonction des ses besoins et de sa disponibilité.
                </li>
                <li>Le bénéficiaire s'auto-inscrit depuis son espace personnel.</li>
                <li>Un atelier est confirmé à partir d'un numbre minimum de 3 inscrits et pour un maximum de 12 participants.</li>
            </ul>
        </div>
    </div>

    <div class="zoom container-fluid">
        <h2 class="text-center text-uppercase text-white">Zoom sur les 17 ateliers conseil</h2>
        <div class="bg-white w-25 mx-auto mt-4 separator"></div>
        <div class="d-flex justify-content-center mt-5 bg-white mx-5">
            <img src="src/ressources/img/schemaAtelierConseil.png" alt="" class="img-fluid col-6">
        </div>
    </div>

    <?php include 'src/includes/footer.php'; ?>
</body>

</html>