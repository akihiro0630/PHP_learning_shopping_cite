<?php
@session_start();
/**
 * SC201FavoriteLogic.php
 * 商品検索画面：お気に入りボタン(SC201Favorite)押下
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
$nextView = "SC201ProductSalesListView"; // 次画面は「商品一覧画面」
?>