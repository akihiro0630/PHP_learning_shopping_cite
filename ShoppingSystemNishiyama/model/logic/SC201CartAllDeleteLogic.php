<?php
@session_start();
/**
 * SC201CartAllDeleteLogic.php
 * 商品検索画面：カートを空にするボタン(SC201CartAllDelete)押下
 */


// $productGroupCode = $_REQUEST["productGroupCode"];
// $productItemCode = $_REQUEST["productItemCode"];
// $productItemName = $_REQUEST["productItemName"];
// $productItemPrice = $_REQUEST["productItemPrice"];


unset($_SESSION["cart"]);//カートを削除

$cart = new ProductStorage();//カートの生成
$_SESSION["cart"] = serialize($cart);


$loginCustomer = unserialize($_SESSION["loginCustomer"]);
$cart = unserialize($_SESSION["cart"]);

require_once ('/SC001ProductListCreate.php');

$nextView = "SC201ProductSalesListView"; // 次画面は「商品検索画面」

?>
