<?php

require_once("inc/Config.inc.php");
require_once("inc/Page.class.php");
require_once("inc/PDOAgent.class.php");
require_once("inc/UserMapper.class.php");
require_once("inc/ManufacturerMapper.class.php");

Page::$title = "Shopping Cart";

session_start();

if (isset($_POST['submit'])) {
    //Instantiate the loginMapper
    $lm = new UserMapper(); 
    
    //Validate the login
    $result = $lm->validateLogin($_POST);
    //If the login is successful then queue a message indicating that the login was successful.
    if(isset($result)){
        $userType = $result[0]->type;
        $_SESSION['username'] = $result[0]->username;

        if($userType == "customer"){
            $_SESSION['cart'] = array();//Create a "cart" slot in the session to store product id's and quantities 
            header("location:Customer.php");
        } else{
            header("location:Manufacturer.php");
        }
    }        
    //Otherwise queue a message telling the user to enter a valid username/password
    else{
        echo 'something went wrong';
    }
}

Page::header();
Page::showLogin();
Page::footer();
?>