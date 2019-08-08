<?php

require_once('inc\Config.inc.php');
require_once('inc\Clean.class.php');
require_once('inc\PDOAgent.class.php');
require_once('inc\ProductMapper.class.php');
require_once('inc\Page.class.php');
require_once('inc\Cart.class.php');
require_once('inc\ManufacturerMapper.class.php');
session_start();
//TODO: Movie this back from the Login.php to hear once we have the POST Add button ---> $_SESSION['cart'] = array();//Create a "cart" slot in the session to store product id's and quantities - SANL 28, July 2018.

Page::header();
Page::logout();
Page::instructionsCustomer($_SESSION['username']);
Page::searchForm();
Page::checkoutBtn();

if(isset($_GET['action']) == 'add' && isset($_GET['id'])){
    $product = ProductMapper::getProdById($_GET['id']);
    $itemsIntheCart = Cart::addProduct($product->pid);
    Page::prodAddMessage($product);
}
else if(isset($_GET['action']) == 'logout'){
    session_destroy();
    header('location:Login.php');
}

if(!empty($_POST["search"])){
    $searchTerm = Clean::cleanTerm($_POST["search"]);
    Page::offeredProd($searchTerm);
} else{
    Page::offeredProd();
}

Page::footer();

?>