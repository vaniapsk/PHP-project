<?php
require_once('inc\Config.inc.php');
require_once('inc\PDOAgent.class.php');
require_once('inc\ProductMapper.class.php');
require_once('inc\Page.class.php');
require_once('inc\Cart.class.php');

session_start();
Page::header();
Page::logout();
Page::orderSubmitted();
if(isset($_GET['action']) == 'logout'){
    session_destroy();
    header('location:Login.php');
}

session_destroy();
Page::footer();

?>