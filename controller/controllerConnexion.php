<?php


require_once ('model/Manager.php');
require_once ('model/ConnexionManager.php');

function checkConnection($mailUser,$mdpUser)
{
    $ConnexionManager = new ConnexionManager();
    $check = $ConnexionManager->getUser($mailUser, $mdpUser);
    $result = $check->rowCount();

    if ($result === 0)
    {
        die('Identifiant Incorrect');
    }
    else
    {
        connexion();
        $user = $check->fetch();
        $_SESSION['id'] = (int)$user['id_user'];
        $_SESSION['nom'] = $user['nom_user'];
        $_SESSION['prenom'] = $user['prenom_user'];
        $_SESSION['adresse'] = $user['adresse_user'];
        $_SESSION['solde'] = $user['solde_user'];
        $_SESSION['naissance'] = $user['naissance_user'];
        $_SESSION['mail'] = $user['mail_user'];
        $_SESSION['telephone'] = $user['tel_user'];
        $_SESSION['mdp'] = $user['mdp_user'];
        header('Location: ../view/Connecté/accueil.php');

    }
}

function connexion()
{
    session_start();
}


function deconnection()
{
    session_destroy();

}