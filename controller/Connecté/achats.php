<?php
require_once ('../../model/AchatManager.php');

if($_GET['action'] == 'voirMesAchats')
{
    $achatManager = new AchatManager();
    $achatAttentes = $achatManager->selectProduitAchatAttente($_GET['id']);
    $achatHistoriques = $achatManager->selectProduitAchatHistorique($_GET['id']);
}