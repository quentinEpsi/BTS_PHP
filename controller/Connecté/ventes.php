<?php
require ('../../model/CategorieManager.php');
require ('../../model/MarqueManager.php');
require ('../../model/ProduitManager.php');

if(isset($_GET['action'])&& $_GET['action'] == 'addProduit')
{
    $categorieManager = new CategorieManager();
    $categories = $categorieManager->selectAllCategories();

    $marqueManager = new MarqueManager();
    $marques = $marqueManager->selectALlMarques();

    $produitManager = new ProduitManager();

    $infosfichier = pathinfo($_FILES['image_produit']['name']);
    $extension_upload = $infosfichier['extension'];
    $exentions_autorisees = array('jpg', 'jpeg', 'gif', 'png');
    if(in_array($extension_upload,$exentions_autorisees))
    {
        move_uploaded_file($_FILES['image_produit']['tmp_name'],'../../img/' . basename($_FILES['image_produit']['name']));
        $produit = $produitManager->insertProduit($_POST['etat_produit'],(int)$_POST['prix_produit'],$_POST['description_produit'],$_POST['nom_produit'],(int)$_POST['categorie'],(int)$_POST['marque'],(int)$_GET['id'],$_FILES['image_produit']['name']);
        if ($produit)
        {
            echo 'bravo';
            header('Location: ../../view/Connecté/ventes.php?action=voirMesVentes');
        }
    }else{
        echo 'Pas le bon format d\'image';
    }

}
elseif (isset($_GET['action']) && $_GET['action'] == 'voirMesVentes'){
    $produitManager = new ProduitManager();
    $ventesEnCours = $produitManager->selectProduitVente($_SESSION['id_user']);
    $ventesAttentes = $produitManager->selectProduitVenteAttente($_SESSION['id_user']);
    $ventesHistoriques = $produitManager->selectProduitVenteHistorique($_SESSION['id_user']);
}
elseif (isset($_GET['action']) && $_GET['action'] == 'supprimerProduit')
{
    $produitManager = new ProduitManager();
    $produitManager->deleteProduit($_GET['idProduit']);
    header('Location: ../../view/Connecté/ventes.php?action=voirMesVentes');
}
else
    {
    $categorieManager = new CategorieManager();
    $categories = $categorieManager->selectAllCategories();

    $marqueManager = new MarqueManager();
    $marques = $marqueManager->selectALlMarques();

    $produitManager = new ProduitManager();
}