<?php
require ('../../model/UtilisateurManager.php');


$UtilisateurManager = new UtilisateurManager();

$check = $UtilisateurManager->checkMail($_POST['mail']);

if($check == true)
{
    $req = $UtilisateurManager->insertUser($_POST['nom'],$_POST['prenom'],$_POST['adresse'],$_POST['dateNaiss'],$_POST['mail'],$_POST['mdp'],$_POST['tel']);
    session_start();
    $_SESSION['mail_user'] = $_POST['mail'];
    header('Location: ../../view/Connecté/accueil.php?action=accueil');
}else
{
    echo 'Cette adresse mail est déjà utilisé';
}
