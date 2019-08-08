<?php
    require_once('Page.class.php');
    if(isset($_POST['action']) && !empty($_POST['action'])) {
        $action = $_POST['action'];
        switch($action) {
            case 'show' : 
            Page::showManufForm();
            break;
        }
    }
    else{
        
    }

?>