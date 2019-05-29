<?php
require ('model/MarqueManager.php');

function getAllCategories()
{
    $marqueManager = new MarqueManager();
    $categories = $marqueManager->selectALlMarques();

    require ('view/Connecté/accueil.php');
}