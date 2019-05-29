<?php
/**
 * Created by PhpStorm.
 * User: utiisateur
 * Date: 27/05/2019
 * Time: 19:18
 */

require_once ('Manager.php');
class ProduitManager extends Manager
{
    public function insertProduit($etatProduit, $prixProduit, $descriptionProduit, $nomProduit, $idCategorie, $idMarque, $idUser, $imageProduit)
    {
        $bdd = $this->dbConnect();
        $produit = $bdd->prepare('INSERT INTO produits(etat_produit, prix_produit, description_produit, nom_produit, disponibilite_produit,
id_categorie, id_marque,id_user,validation_transaction, date_confirmation_transaction,image_produit)
VALUES (:etat_produit,:prix_produit,:description_produit,:nom_produit,1,:id_categorie,:id_marque,:id_user,0,NULL,:image_produit)');

        $produit->execute(array(
            'etat_produit' => $etatProduit,
            'prix_produit' => $prixProduit,
            'description_produit' => $descriptionProduit,
            'nom_produit' => $nomProduit,
            'id_categorie' => $idCategorie,
            'id_marque' => $idMarque,
            'id_user' => $idUser,
            'image_produit' => $imageProduit
        ));
        return $produit;
    }

    public function selectAllProduitDispo()
    {
        $db = $this->dbConnect();

        $req = $db->prepare('SELECT * FROM produits WHERE disponibilite_produit = 1');
        $req->execute();

        return $req;
    }

    public function updateProduitVente($idProduit)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('UPDATE produits SET disponibilite_produit = 0, validation_transaction = 1, date_confirmation_transaction = :dateConf WHERE id_produit = :idProduit');
        $req->execute(array(
            ':dateConf' => (new DateTime('now'))->format('Y-m-d'),
            'idProduit' => $idProduit
        ));
    }

    public function selectProduitById($idProduit)
    {
        $bdd = $this->dbConnect();
        $req = $bdd->prepare('SELECT * FROM produits WHERE id_produit = ?');
        $req->execute(array(
            $idProduit
        ));

        return $req;
    }

    public function deleteProduit($idProduit)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('DELETE from produits WHERE id_produit = :idProduit');
        $req->execute(array(
            'idProduit' => $idProduit
        ));
        return $req;
    }

    public function selectProduitVenteAttente($idUser)
    {
        $db = $this->dbConnect();
        $ventesAttentes = $db->query('SELECT P.id_produit, P.nom_produit, P.prix_produit, A.id_user FROM produits P JOIN proposition_achat A ON P.id_produit = A.id_produit WHERE P.id_user = (' . $idUser . ') AND P.validation_transaction = 0 AND A.validation_achat = 0 ');
        return $ventesAttentes;
    }

    function selectProduitVente($idUser)
    {
        $db = $this->dbConnect();
        $ventes = $db->query('SELECT id_produit, nom_produit, prix_produit FROM produits WHERE id_user = (' . $idUser . ') AND validation_transaction = 0');
        return $ventes;
    }

    function selectProduitVenteHistorique($idUser)
    {
        $db = $this->dbConnect();
        $ventes = $db->query('SELECT id_produit, nom_produit, prix_produit, date_confirmation_transaction FROM produits WHERE id_user = (' . $idUser . ') AND validation_transaction = 1');
        return $ventes;
    }

    function updateSoldeVente($prix, $idUser)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('UPDATE user SET solde_user = solde_user + :prix WHERE id_user = :idUser');
        $req->execute(array(
            'prix' => $prix,
            'idUser' => $idUser
        ));
        return $req;
    }

    function updateDispoProduit($idProduit)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('UPDATE produits SET disponibilite_produit = 1 WHERE id_produit = :idProduit');
        $req->execute(array(
            'idProduit' => $idProduit
        ));
        return $req;
    }

    function checkPrix($idProduit)
    {
        $bdd = $this->dbConnect();
        $req = $bdd->prepare('SELECT prix_produit from produits WHERE id_produit = :idProduit');
        $req->execute(array(
            'idProduit' => $idProduit
        ));
        return $req;
    }
}