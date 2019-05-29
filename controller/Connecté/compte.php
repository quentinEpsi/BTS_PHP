<?php
require ('../../model/UtilisateurManager.php');


if($_GET['action'] == 'voirMonCompte' )
{
    $UtilisateurManager = new UtilisateurManager();
    $data = $UtilisateurManager->selectUserId($_SESSION['id_user']);
$user = $data->fetch(PDO::FETCH_ASSOC);
}



if($_GET['action'] == 'modifCompte')
{
    $UtilisateurManager = new UtilisateurManager();
    $UtilisateurManager->updateUser($_GET['id'],$_POST['nom'],$_POST['prenom'],$_POST['adresse'],$_POST['dateNaiss'],$_POST['mail'],$_POST['tel'],$_POST['mdp']);
    header('Location: ../../view/Connecté/compte.php?action=voirMonCompte');

}

if($_GET['action'] == 'addJeton')
{
    $UtilisateurManager = new UtilisateurManager();
    $UtilisateurManager->addCredit($_POST['solde'], $_GET['id']);
    header('Location: ../../view/Connecté/compte.php?action=voirMonCompte');
}
