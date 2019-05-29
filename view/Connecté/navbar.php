<?php session_start();


?>
<!doctype html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <title>TrocInfo</title>

    <!-- FONT AWESOME-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">

    <!-- BOOTSTRAP CDN CSS-->

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <!-- PERSO CSS-->
    <link rel="stylesheet" href="../../css/index.css">

</head>
<body>

<!-- Navigation -->
<nav class="navbar navbar-expand-sm  navbar-dark" style="background : linear-gradient(to right, #ffc04a, #ff6347)">
    <div class="container ">
        <a class="navbar-brand" href="accueil.php?action=accueil"><img src="../../img/logo.png" alt="Logo du Site Web" style="width : 80px"></a>
        <h2 class="text-light text-center">Bienvenue sur Troc Info !</h2>
        <div class="dropdown">
            <a class="" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-user" style="color : black; font-size: 40px"></i>
            </a>

            <div class="dropdown-menu dropdown-menu-right">
                <h6 class="dropdown-header"><?= $_SESSION['prenom_user'] ?> <?= $_SESSION['nom_user'] ?></h6>
                <a class="dropdown-item" href="achats.php?action=voirMesAchats&amp;id=<?= $_SESSION['id_user']?>">Mes achats</a>
                <a class="dropdown-item" href="ventes.php?action=voirMesVentes&amp;id=<?= $_SESSION['id_user']?>">Mes ventes</a>
                <a class="dropdown-item" href="compte.php?action=voirMonCompte">Mon compte</a>
                <a class="dropdown-item" href="../../controller/Connecté/deconnexion.php"><span class="text-danger">Déconnexion</span></a>

            </div>
        </div>


    </div>
</nav>
