<?php

require_once("inc/Config.inc.php");
require_once("inc/Page.class.php");
require_once("inc/PDOAgent.class.php");
require_once("inc/UserMapper.class.php");



Page::$title = "Shopping Cart";

if (isset($_POST['submit'])) {
    //Instantiate the loginMapper
    $lm = new UserMapper(); 
    $password = $_POST['password'];
    $cPassword = $_POST['cPassword'];

    echo $password;
    echo $cPassword;

    if ($password != $cPassword){
        echo "The passwords you entered do not match"; 
    }else{       
        $check = $lm->checkUser($_POST);
        if($check){
            echo "User name already in use";
        } else{
            $bool = $lm->insertUser($_POST);
            //If the inserrtion is successful then redirect to login page.
            if($bool){  
                header("location:Login.php");
            } 
        }
    }
}


Page::header();

Page::showSignUp();

Page::footer();

?>