<?php
/**
 * Created by PhpStorm.
 * User: utiisateur
 * Date: 29/05/2019
 * Time: 01:40
 */
require_once 'Manager.php';
class PropositionAchatManager extends Manager
{
    function faireUnePropositionAchat($idUser,$idProduit)
    {
        $db = $this->dbConnect();

        $req = $db->prepare('INSERT INTO proposition_achat(date_proposition_achat,id_user,id_produit,validation_achat) VALUES (:date,:idUser,:idProduit,:validation_achat)');

        $req->execute(array(
            'date' => (new DateTime('now'))->format('Y-m-d'),
            'idUser' => $idUser,
            'idProduit' => $idProduit,
            'validation_achat' => 0
        ));
        return $req;
    }

    function confirmerPropositionAchat($idProduit, $idUser)
    {
        $db = $this->dbConnect();

        $req = $db->prepare('UPDATE proposition_achat SET validation_achat = 1 WHERE id_produit = :idProduit AND id_user = :idUser');
        $req->execute(array(
           'idProduit' => $idProduit,
           'idUser' => $idUser
        ));
        return $req;
    }

    function refuserPropositionAchat($idProduit, $idUser)
    {
        $db = $this->dbConnect();

        $req = $db->prepare('DELETE FROM proposition_achat WHERE id_produit = :idProduit AND id_user = :idUser');
        $req->execute(array(
            'idProduit' => $idProduit,
            'idUser' => $idUser
        ));
        return $req;
    }


}