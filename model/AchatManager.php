<?php
/**
 * Created by PhpStorm.
 * User: utiisateur
 * Date: 29/05/2019
 * Time: 09:35
 */
require_once ('Manager.php');
class AchatManager extends Manager
{
    function selectProduitAchatAttente($idUser)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT P.nom_produit, P.prix_produit, A.date_proposition_achat FROM produits P JOIN proposition_achat A on P.id_produit = A.id_produit WHERE A.id_user = :idUser AND validation_achat=0');
        $req->execute(array(
            'idUser' => $idUser
        ));
        return $req;
    }

    function selectProduitAchatHistorique($idUser){
        $db = $this->dbConnect();
        $req = $db->query('SELECT P.nom_produit, P.prix_produit, A.date_proposition_achat FROM produits P JOIN proposition_achat A on P.id_produit = A.id_produit WHERE A.id_user = ('.$idUser.') AND validation_achat=1');
        return $req;
    }

}