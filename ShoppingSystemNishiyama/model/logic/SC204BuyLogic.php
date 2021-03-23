<?php
@session_start();
/**
 * SC204BuyLogic.php
 * 注文完了画面：再度注文をするボタン(SC204Buy)押下
 */

unset($_SESSION["cart"]);//カートを削除

$cart = new ProductStorage();//カートの生成
$_SESSION["cart"] = serialize($cart);

$loginCustomer = unserialize($_SESSION["loginCustomer"]);
$cart = unserialize($_SESSION["cart"]);

require_once ('/SC001ProductListCreate.php');

$nextView = "SC201ProductSaleslistView"; // 次画面は「商品メニュー画面」

?>