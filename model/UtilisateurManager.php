<?php

require_once ('Manager.php');

class UtilisateurManager extends Manager{


    public function insertUser($nomUser, $prenomUser, $adresseUser, $naissanceUser, $mailUser,$mdpUser,$telephoneUser)
    {
        $bdd = $this->dbConnect();
        $req = $bdd->prepare('INSERT INTO user(nom_user, prenom_user, adresse_user,solde_user, naissance_user, mail_user,mdp_user,tel_user) VALUES (?, ?, ?, 0, ?,?,?,?)');
        $req->execute(array(
            $nomUser,
            $prenomUser,
            $adresseUser,
            $naissanceUser,
            $mailUser,
            $mdpUser,
            $telephoneUser

        ));

        return $req;
    }

    public function checkMail($mailUser)
    {
        $bdd = $this->dbConnect();
        $req = $bdd->prepare('SELECT * from user WHERE mail_user = :mailUser');
        $req->execute(array(
            'mailUser' => $mailUser
        ));
        $check = $req->rowCount();
        if($check>0)
        {
            return false;
        }
        return true;
    }

    public function selectAllUser()
    {
        $bdd = $this->dbConnect();
        $req = $bdd->prepare('SELECT * FROM user');
        $req->execute();

        return $req;
    }

    public function updateUser($idUser,$nomUser, $prenomUser, $adresseUser, $naissanceUser, $mailUser, $telephoneUser, $mdpUser)
    {
        $bdd = $this->dbConnect();
        $req = $bdd->prepare('UPDATE user SET nom_user = :nvNom, prenom_user = :nvPrenom, adresse_user = :nvAdresse, naissance_user = :nvNaissance, mail_user = :nvMail, mdp_user = :nvMdp,tel_user = :nvTel 
WHERE id_user = :idUser');
        $req->execute(array(
            'nvNom' => $nomUser,
            'nvPrenom' => $prenomUser,
            'nvAdresse' => $adresseUser,
            'nvNaissance' => $naissanceUser,
            'nvMail' => $mailUser,
            'nvTel' => $telephoneUser,
            'nvMdp' => $mdpUser,
            'idUser' => $idUser
        ));
        return $req;
    }
    public function selectUserByMail($mailUser)
    {
        $bdd = $this->dbConnect();
        $req = $bdd->prepare('SELECT * FROM user WHERE mail_user = ?');
        $req->execute(array(
            $mailUser
        ));

        return $req;
    }

    public function selectUserId($idUser)
    {
        $bdd = $this->dbConnect();
        $req = $bdd->prepare('SELECT * FROM user WHERE id_user = ?');
        $req->execute(array(
            $idUser
        ));

        return $req;
    }
    public function updateSoldeAcheteur($idAcheteur)
    {
        $bdd = $this->dbConnect();
        $req = $bdd->prepare('UPDATE user SET solde_user =');
    }

    public function deleteUser($idUser)
    {
        $bdd = $this->dbConnect();
        $req = $bdd->prepare('DELETE FROM user WHERE id_user = :idUser ');
        $req->execute(array(
            'idUser' => $idUser
        ));
    }

    public function addCredit($solde,$idUser)
    {
        $bdd = $this->dbConnect();
        $req = $bdd->prepare('UPDATE user SET solde_user = solde_user + :nvSolde WHERE id_user = :idUser');
        $req->execute(array(
            'nvSolde' => $solde,
            'idUser' => $idUser
        ));
    }
    public function enleverCredit($solde,$idUser)
    {
        $bdd = $this->dbConnect();
        $req = $bdd->prepare('UPDATE user SET solde_user = solde_user - :nvSolde WHERE id_user = :idUser');
        $req->execute(array(
            'nvSolde' => $solde,
            'idUser' => $idUser
        ));
    }



    public function checkJeton($idUser)
    {
        $bdd = $this->dbConnect();
        $req = $bdd->prepare('SELECT solde_user from user WHERE id_user = :idUser');
        $req->execute(array(
            'idUser' => (int)$idUser
        ));
        return $req;
    }



}




