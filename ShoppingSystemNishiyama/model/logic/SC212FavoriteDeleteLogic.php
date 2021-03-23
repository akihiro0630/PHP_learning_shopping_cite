<?php
@session_start();
/**
 * SC212FavoriteLogic.php
 * お気に入り画面：お気に入りボタン(SC212FavoriteDelete)押下
 */

$productGroupCode = $_REQUEST["productGroupCode"];
$productItemCode = $_REQUEST["productItemCode"];
$productItemName = $_REQUEST["productItemName"];
$productItemPrice = $_REQUEST["productItemPrice"];

$loginCustomer = unserialize($_SESSION["loginCustomer"]);
$customerMail = $loginCustomer ->getMail();
$customerName = $loginCustomer -> getName();
$today = date("Ymd");


$con = DBConnection::getConnection();
$orderFavorite = new OrderFavoriteDAO($con);
$vOrderFavorite = new VOrderFavorite($customerMail,$customerName,$productGroupCode,"","",$productItemCode,$productItemName,$productItemPrice,$today);
$orderFavorite ->insertDeleteOrder($vOrderFavorite);



$cart = unserialize($_SESSION["cart"]);
require_once ("/SC001ProductListCreate.php");

/** 次画面 */
$nextView = "SC212FavoriteListView"; // 次画面は「お気に入り画面」
?>