<?php
/**
 * Created by PhpStorm.
 * User: utiisateur
 * Date: 27/05/2019
 * Time: 19:28
 */

require_once ('Manager.php');
class CategorieManager extends Manager
{
    public function selectAllCategories()
    {
        $db = $this->dbConnect();

        $req = $db->query('SELECT * FROM categorie');

        return $req;
    }
}