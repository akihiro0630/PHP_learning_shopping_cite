<?php
@session_start();
/**
 * SC201FindLogic.php
 * 商品検索画面：検索ボタン(SC201Find)押下
 */

$findKeyword = $_REQUEST["keyword"];
$findProductGroupCode = $_REQUEST["productGroup"];

$loginCustomer = unserialize($_SESSION["loginCustomer"]);
$cart = unserialize($_SESSION["cart"]);
require_once ('/SC001ProductListCreate.php');

$nextView = "SC201ProductSalesListView"; // 次画面は「商品検索画面」

?>

