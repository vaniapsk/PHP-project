<?php
//TODO: Temporary search class. Will replase with Ajax. 
class ManufacturertMapper{

    //Search the product table using the given search term(s)
    static function manufacturers($manufacturer){
            $query = "SELECT * FROM manufacturers WHERE admin='$manufacturer';";
            $bindParams = array();
            $pdo = new PDOAgent("mysql", DBUSER, DBPASSWORD, "localhost", DB);
            $pdo->connect();
            $man = $pdo->query($query, $bindParams);
            $pdo->disconnect();
            return $man[0];
        }
}
?>