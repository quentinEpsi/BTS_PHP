<?php


require('../../model/PropositionAchatManager.php');
require('../../model/UtilisateurManager.php');
require('../../model/ProduitManager.php');
if($_GET['action']=='proposition')
{
    $ProduitManager = new ProduitManager();
    $prixProduit = $ProduitManager->checkPrix($_GET['idProduit'])->fetch(PDO::FETCH_ASSOC);
    $prixProduit = (int) $prixProduit['prix_produit'];
    $UtilisateurManager= new UtilisateurManager();
    $nombreJetons = $UtilisateurManager->checkJeton($_GET['idUser'])->fetch(PDO::FETCH_ASSOC);
    $soldeUser = (int)$nombreJetons['solde_user'];

    if($soldeUser>= $prixProduit)
    {
        $PropositionAchatManager = new PropositionAchatManager();
        $PropositionAchatManager->faireUnePropositionAchat($_GET['idUser'],$_GET['idProduit']);
        header('Location: ../../view/Connecté/accueil.php?action=accueil');
    }
    else
    {
        echo'Désolé vous n\'avez pas assez de jetons';
    }




}

if($_GET['action'] == 'accepter')
{
    $produitManager = new ProduitManager();
    $produitManager->updateProduitVente($_GET['idProduit']);
    $produit = $produitManager->selectProduitById($_GET['idProduit'])->fetch(PDO::FETCH_ASSOC);
    $PropositionAchatManager = new PropositionAchatManager();
    $utilisateurManager = new UtilisateurManager();
    $proprietaire = $utilisateurManager->selectUserId($produit['id_user'])->fetch(PDO::FETCH_ASSOC);
    $utilisateurManager->addCredit($produit['prix_produit'],$proprietaire['id_user']);
    $utilisateurManager->enleverCredit($produit['prix_produit'], $_GET['idUser']);

    $PropositionAchatManager->confirmerPropositionAchat($_GET['idProduit'],$_GET['idUser']);
    $produit = $produitManager->selectProduitById($_GET['idProduit'])->fetch();

    $produit = (int)$produit;
    header('Location: ../../view/Connecté/ventes.php?action=voirMesVentes');

}
if($_GET['action'] == 'refuser')
{
    $PropositionAchatManager = new PropositionAchatManager();
    $PropositionAchatManager->refuserPropositionAchat($_GET['idProduit'], $_GET['idUser']);
    $produitManager = new ProduitManager();
    $produitManager->updateDispoProduit($_GET['idProduit']);
    header('Location: ../../view/Connecté/ventes.php?action=voirMesVentes');
}