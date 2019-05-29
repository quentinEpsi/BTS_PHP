<?php

require_once ('Manager.php');
class ConnexionManager extends Manager{
    public function getUser($mailUser, $mdpUser)
    {
        $bdd = $this->dbConnect();

        $req = $bdd->prepare('SELECT * FROM user WHERE mail_user = ? AND mdp_user = ?');
        $req->execute(array(
            $mailUser,
            $mdpUser
        ));
        return $req;
    }
}
