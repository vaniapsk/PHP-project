<?php
require_once('inc\Config.inc.php');
require_once('inc\PDOAgent.class.php');
require_once('inc\ProductMapper.class.php');
require_once('inc\Page.class.php');
require_once('inc\Cart.class.php');
require_once('inc\ManufacturerMapper.class.php');

session_start();

Page::header();
Page::logout();
Page::SubmitOrder();

if(!empty($_POST['address'])){
    Cart::submitCart($_POST['address']);
    header('location:SubmittedOrder.php');
}

if(isset($_GET['action']) == 'delete' && isset($_GET['id'])){
    Cart::removeProduct($_GET['id']);
}
else if(isset($_GET['action']) == 'logout'){
    session_destroy();
    header('location:Login.php');
}

Page::printCart($_SESSION['cart']);
Page::footer();

?>