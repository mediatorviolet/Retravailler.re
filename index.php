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
        if ($_GET['page'] == 'accueil') {
            echo 'Accueil';
        } if ($_GET['page'] == 'espace_perso') {
            echo 'Espace Personnel';
        } if ($_GET['page'] == 'atelier_conseil') {
            echo 'Atelier Conseil';
        } if ($_GET['page'] == 'evolution_professionnelle') {
            echo 'Conseil en Evolution Professionnelle';
        } if ($_GET['page'] == 'acceler_emploi') {
            echo 'Accélèr\'Emploi';
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
        'acceler_emploi' => 'acceler-emploi.php'
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