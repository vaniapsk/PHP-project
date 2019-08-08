<?php

class Cart{
    //Add a product id to the cart slot in the session. If the item is new to the cart, set quantity to 1. Increase by 1 otherwise. - SANL July 28, 2018
    static function addProduct($pid){
        $inCart = false;

        if(count($_SESSION['cart']) != 0){
            foreach($_SESSION['cart'] as &$prod){ //prod is the 2 element array with the product id and its quantity. - SANL July 28, 2018
                if($prod[0] == $pid){
                    $prod[1]++;
                    $inCart = true;
                    break;
                }
            }
            if(!$inCart) array_push($_SESSION['cart'], array($pid, 1));

        } else {
            array_push($_SESSION['cart'], array($pid, 1));
        }

        return $_SESSION['cart'];
    }

    //Remove the cart slot in the session corresponding to the given product id. - SANL July 28, 2018
    static function removeProduct($pid){
        for($i = 0; $i < count($_SESSION['cart']); ++$i){
            if($_SESSION['cart'][$i][0] == $pid){
                unset($_SESSION['cart'][$i]);
                break;
            }
        }
    }

    //Updates the cart table with all the products ordered. - SANL July 28, 2018
    static function submitCart($addrs){ 
        $query = "INSERT INTO cart VALUES (:buyer, :product, :address, :quantity );";
        $pdo = new PDOAgent("mysql", DBUSER, DBPASSWORD, "localhost", DB);
        $pdo->connect();

        foreach($_SESSION['cart'] as $prod){
            $bindParams = ['buyer'=>$_SESSION['username'], 'product'=>$prod[0], 'address'=>$addrs, 'quantity'=>$prod[1]];
            $pdo->query($query, $bindParams);
        }
        $pdo->disconnect();

        //$_SESSION['cart'] = array(); empties the cart after the order is placed.
    }

}

?>