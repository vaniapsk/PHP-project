<?php
//TODO: Temporary search class. Will replase with Ajax. 
class ProductMapper{

    //Search the product table using the given search term(s) 
    static function prodSearch($searchTerm){
        $query = "SELECT * FROM products;";
        $products = array();
        $bindParams = array();
        $pdo = new PDOAgent("mysql", DBUSER, DBPASSWORD, "localhost", DB);
        $pdo->connect();

        if(isset($searchTerm)){
            $searchTerm = explode(" ", $searchTerm);
            foreach($searchTerm as $term){
                $query = "SELECT * FROM products WHERE pname LIKE '%$term%' OR type LIKE '%$term%' OR pdescription LIKE '%$term%';";
                $products = array_merge($products, $pdo->query($query, $bindParams));
            }
        } else {
            $products = $pdo->query($query, $bindParams);
        }
        $pdo->disconnect();

        return $products;
    }

    //Get the info of a specific product based on its id 
    static function getProdById($id){
        $query = "SELECT * FROM products WHERE pid='$id';";
        $bindParams = array();
        $pdo = new PDOAgent("mysql", DBUSER, DBPASSWORD, "localhost", DB);
        $pdo->connect();
        $prod = $pdo->query($query, $bindParams);
        $pdo->disconnect();
        return $prod[0];
    }

    //Fetch the products corresponding to the given manufacturer administrator. 
    static function getProdsByManu($manu){
        $query = "SELECT * FROM products WHERE manufacturer=:manu;";
        $bindParams = ['manu'=>$manu];
        $pdo = new PDOAgent("mysql", DBUSER, DBPASSWORD, "localhost", DB);
        $pdo->connect();
        $products = $pdo->query($query, $bindParams);
        $pdo->disconnect();
        return $products;
    }

    static function addProd($name, $type, $description, $price, $manufacturer){
        $query = "INSERT INTO products (pname, type, pdescription, price, manufacturer) VALUES (:name, :type, :description, :price, :manufacturer);";
        $bindParams = ['name'=>$name, 'type'=>$type, 'description'=>$description, 'price'=>$price, 'manufacturer'=>$manufacturer];
        $pdo = new PDOAgent("mysql", DBUSER, DBPASSWORD, "localhost", DB);
        $pdo->connect();
        $products = $pdo->query($query, $bindParams);
        $pdo->disconnect();
    }

    static function deleteProdById($pid){
        $query = "DELETE FROM products WHERE pid=:id;";
        $bindParams = ['id'=>$pid];
        $pdo = new PDOAgent("mysql", DBUSER, DBPASSWORD, "localhost", DB);
        $pdo->connect();
        $products = $pdo->query($query, $bindParams);
        $pdo->disconnect();
    }
}

?>