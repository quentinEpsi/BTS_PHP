<?php
/**
 * Created by PhpStorm.
 * User: utiisateur
 * Date: 27/05/2019
 * Time: 19:47
 */
require_once ('Manager.php');
class MarqueManager extends Manager
{
    public function selectALlMarques()
    {
        $db = $this->dbConnect();

        $req = $db->query('SELECT * FROM marque');

        return $req;
    }
}