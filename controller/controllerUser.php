<?php

require_once ('model/UtilisateurManager.php');


function addUser($nomUser, $prenomUser, $adresseUser,$naissanceUser,$mailUser,$mdpUser,$telephoneUser)
{
    $UtilisateurManager = new UtilisateurManager();
    $affectedLines = $UtilisateurManager->insertUser($nomUser,$prenomUser,$adresseUser,$naissanceUser,$mailUser,$mdpUser,$telephoneUser);
    if ($affectedLines === false){
        die('Impossible d\'ajouter l\'utilisateur');
    }else
    {
        header('Location: index.php?action=accueil');
    }
}

function updateUserById($idUser, $nomUser, $prenomUser, $adresseUser,$naissanceUser,$mailUser,$mdpUser,$telephoneUser)
{
    $UtilisateurManager = new UtilisateurManager();
    $affectedLines = $UtilisateurManager->updateUser($idUser,$nomUser,$prenomUser, $adresseUser,$naissanceUser,$mailUser,$mdpUser,$telephoneUser);
    var_dump($_POST);

    if ($affectedLines)
    {
        header('Location: index.php?action=compte');
    }
}

function accueil()
{
    require ('view/nonConnecté/accueil.php');
}

function delUser($idUser)
{
    $UtilisateurManager = new UtilisateurManager();

    $UtilisateurManager->deleteUser($idUser);

    echo 'Utilisateur' . $idUser . 'Supprimé';


}