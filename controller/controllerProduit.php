<?php

require ('model/ProduitManager.php');

function getAllProduits()
{
    $produitManager = new ProduitManager();
    $produits = $produitManager->selectAllProduit();

    //require ('view/Connecté/accueil.php');
}