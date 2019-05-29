<?php
/**
 * Created by PhpStorm.
 * User: utiisateur
 * Date: 29/05/2019
 * Time: 00:05
 */

require_once ('Manager.php');
class RechercheManager extends Manager
{
    public function rechercheByCategorie($idCategorie)
    {
        $db = $this->dbConnect();

        $req = $db->prepare('SELECT * FROM produits WHERE id_categorie = :idCategorie');
        $req->execute(array(
            'idCategorie' => $idCategorie
        ));

        return $req;
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
}