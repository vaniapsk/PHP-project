<?php

class Clean{
    //a function to clean input term and remove any additional spaces
    static function cleanTerm($term){
        $cleanTerm = trim($term," ");
        $cleanTerm = htmlentities($cleanTerm);
        $arr = explode(" ", $cleanTerm);
        for($i = 0; $i < count($arr); ++$i){
            if($i == 0){
                $cleanTerm = trim($arr[0]," ");
            } elseif($arr[$i]!=="") {
                $cleanTerm = $cleanTerm." ".trim($arr[$i]," ");
            }
        }
        return $cleanTerm;
    }
}

?>