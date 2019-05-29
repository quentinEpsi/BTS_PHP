<?php
require ('model/CategorieManager.php');

function getAllCategories()
{
    $categorieManager = new CategorieManager();
    $categories = $categorieManager->selectAllCategories();

    require ('view/Connecté/accueil.php');
}
