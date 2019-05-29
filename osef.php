<?php
require('controller/controllerUser.php');
require('controller/controllerConnexion.php');
require ('controller/controllerProduit.php');


if(isset($_GET['action']))
{
    if($_GET['action']== 'addUser')
    {
        if(!empty($_POST['nom']) && !empty($_POST['prenom']) && !empty($_POST['adresse'])&& !empty($_POST['tel'])&& !empty($_POST['dateNaiss'])&& !empty($_POST['mail']) && !empty($_POST['mdp']))
        {
            addUser($_POST['nom'],$_POST['prenom'],$_POST['adresse'],$_POST['dateNaiss'],$_POST['mail'],$_POST['mdp'],$_POST['tel']);
        }
    }elseif ($_GET['action']== 'connexion'){
        if(!empty($_POST['mail']) && !empty($_POST['mdp']))
        {
            checkConnection($_POST['mail'],$_POST['mdp']);

        }else{
            echo 'Veuillez remplir les champs';
        }
    }
    elseif ($_GET['action'] == 'modifUser')
    {
        updateUserById($_GET['id'],$_POST['nom'],$_POST['prenom'],$_POST['adresse'],$_POST['dateNaiss'],$_POST['mail'],$_POST['mdp'],$_POST['tel']);
    }
    elseif ($_GET['action'] == 'compte')
    {
        header('Location: view/Connecté/compte.php');
    }
    elseif ($_GET['action'] == 'accueil')
    {
        getAllProduits();
    }
    elseif ($_GET['action'] == 'deconnection')
    {
        deconnection();
        header('Location: view/nonConnecté/accueil.php');
    }
}
else{
    header('Location: view/nonConnecté/accueil.php');
}