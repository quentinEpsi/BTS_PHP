<?php
class Manager
{
    protected function dbConnect()
    {
        $db = new PDO('mysql:host=localhost;dbname=trocinfo','root','root');
        return $db;
    }

    protected function stringToInt($string)
    {
        $int = (int) $string;
        return $int;
    }
}
