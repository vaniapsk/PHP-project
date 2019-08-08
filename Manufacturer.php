<?php

require_once('inc\Config.inc.php');
require_once('inc\PDOAgent.class.php');
require_once('inc\ProductMapper.class.php');
require_once('inc\Page.class.php');
require_once('inc\Cart.class.php');

session_start();

Page::header();
Page::logout();
Page::prodAddForm();

//check credentials
if(!empty($_POST['name']) && !empty($_POST['type']) && !empty($_POST['description']) && !empty($_POST['price'])){
    ProductMapper::addProd($_POST['name'], $_POST['type'], $_POST['description'], $_POST['price'], $_SESSION['username']);
}

//delete product
if(isset($_GET['action']) == 'delete' && isset($_GET['id'])){
    ProductMapper::deleteProdById($_GET['id']);
}

//logout
else if(isset($_GET['action']) == 'logout'){
    session_destroy();
    header('location:Login.php');
}

Page::manufacturerProds($_SESSION['username']);
Page::footer();

?>