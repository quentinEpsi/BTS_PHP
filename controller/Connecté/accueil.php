<?php

require_once ('../../model/CategorieManager.php');
require_once ('../../model/MarqueManager.php');
require_once ('../../model/ProduitManager.php');
require_once ('../../model/UtilisateurManager.php');
require_once ('../../model/RechercheManager.php');


if ($_GET['action'] == 'accueil')
{
    $categorieManager = new CategorieManager();
    $marqueManager = new MarqueManager();
    $produitManager = new ProduitManager();
    $utilisateurManager = new UtilisateurManager();

    $data = $utilisateurManager->selectUserByMail($_SESSION['mail_user']);
    $user = $data->fetch(PDO::FETCH_ASSOC);

    $categories = $categorieManager->selectAllCategories();

    $marques = $marqueManager->selectALlMarques();

    $produits = $produitManager->selectAllProduitDispo();
}


if($_GET['action'] == 'rechercher')
{
    $rechercheManager = new RechercheManager();
    $_POST['categorie'] = (int) $_POST['categorie'];
    $recherchebyCategorie = $rechercheManager->rechercheByCategorie($_POST['categorie']);

}


if ($_GET['action'] == 'voirProduit')
{
    $produitManager = new ProduitManager();
    $produit = $produitManager->selectProduitById($_GET['idProduit'])
    ->fetch(PDO::FETCH_ASSOC);
}

