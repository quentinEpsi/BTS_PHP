<?php
require ('../../model/ConnexionManager.php');


$ConnexionManager = new ConnexionManager();
$user = $ConnexionManager->getUser($_POST['mail'],$_POST['mdp']);
$u = $user->fetch(PDO::FETCH_ASSOC);
$find = $user->rowCount();




if($find>0)
{
    session_start();
    $_SESSION['mail_user'] = $_POST['mail'];
    header('Location: ../../view/Connecté/accueil.php?action=accueil');
}
else
{
    echo 'Mauvais identifiants';
}
