<?php
session_start(); // Initialisation de la session

if (!isset($_SESSION["user"])) {
    $_SESSION["user"] = false;
}
if (!isset($_SESSION["admin"])) {
    $_SESSION["admin"] = false;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        Retravailler.re | 
        <?php
        $title = array( // Array contenant tous les titres des pages
            'accueil' => 'Accueil',
            'espace_perso' => 'Espace Personel',
            'atelier_conseil' => 'Atelier Conseil',
            'evolution_professionnelle' => 'Conseil en Evolution Professionnelle',
            'acceler_emploi' => 'Accélèr\'Emploi',
            'atelier_conseil_atelier' => 'Atelier Conseil - Atelier',
            'evolution_professionnelle_atelier' => 'Conseil en Evolution Professionnelle - Atelier',
            'acceler_emploi_atelier' => 'Accélèr\'Emploi - Atelier'
        );
        
        if (isset($_GET['page']) and isset($title[$_GET['page']])) { // Si la page possède un titre dans l'array on echo le titre
            $page = $_GET['page'];
            echo $title[$page];
        } else { // Sinon on echo 'Accueil' (cas de index.php qui renvoie sur la page d'accueil)
            echo 'Accueil';
        }
        ?>
    </title>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA==" crossorigin="anonymous" />
    <!-- Google Font -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
</head>

<body>
    <?php include 'src/includes/header.php'; ?>

    <?php
    $page_ok = array( // Array contenant toutes les pages valides
        'accueil' => 'homepage.php',
        'espace_perso' => 'espace-perso.php',
        'atelier_conseil' => 'atelier-conseil.php',
        'evolution_professionnelle' => 'evolution-pro.php',
        'acceler_emploi' => 'acceler-emploi.php',
        'evolution_professionnelle_atelier' => 'evolution-pro-atelier.php',
        'acceler_emploi_atelier' => 'acceler-emploi-atelier.php',
        'atelier_conseil_atelier' => 'atelier-conseil-atelier.php'
    );

    if (isset($_GET["page"]) and isset($page_ok[$_GET['page']])) {
        // On inclut la page correspondante
        $page = $_GET['page'];
        include('src/pages/' . $page_ok[$page]);
    } else {
        include 'src/pages/homepage.php';
    } ?>

    <?php include 'src/includes/footer.php'; ?>
</body>

</html>