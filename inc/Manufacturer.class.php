<?php

class Manufacturer{

    //Add a product to the array of products offered by this manufacturer. If the item is already in the array, do not included it. - SANL July 26, 2018
    function addProduct(Product $product){
        $inArray = false;

        if(count($this->_products) != 0){
            foreach($this->_products as $prod){
                if($prod->_id == $product->_id){
                    $inArray = true;
                    break;
                }
            }
            if(!$inArray) array_push($this->_products, $product);

        } else {
            array_push($this->_products, $product);
        }
    }
}

?>