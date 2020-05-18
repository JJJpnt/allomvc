<?php

abstract class Model
{
    private static $_bdd;

    private static function setBdd()
    {
        $dbname = "allosimplon";
        $dbpass = "";
        $dbuser = "root";
        $dbhost = "localhost";

        self::$_bdd = new PDO('mysql:host='.$dbhost.'; dbname='.$dbname, $dbuser, $dbpass);
        self::$_bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
    }

    protected function getBdd()
    {
        if(self::$_bdd == null) $this->setBdd();
        return self::$_bdd;
    }

    protected function getAll($table, $obj)
    {
        $results = [];
        $stmt = $this->getBdd()->prepare('SELECT * FROM '.$table); //.' ORDER BY id_article desc');
        $stmt->execute();
        while($data = $stmt->fetch(PDO::FETCH_ASSOC))
        {
            // var_dump($data);
            $var[] = new $obj($data);
        }
        // var_dump($var);
        return $var;
        $stmt->closeCursor();
    }

}


?>