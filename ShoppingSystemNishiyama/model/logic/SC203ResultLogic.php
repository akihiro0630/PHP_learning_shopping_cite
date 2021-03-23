<?php
@session_start();
/**
 * SC203resultLogic.php
 * 注文確認画面：注文確定(SC203Result)押下
 */

$loginCustomer = unserialize($_SESSION["loginCustomer"]);

$con = DBConnection::getConnection();
$orders = new OrdersDAO($con);
$cart = unserialize($_SESSION["cart"]);
$result = $orders->insertOrder($loginCustomer, $cart);

require_once ('/SC001ProductListCreate.php');


$nextView = "SC204BuyResultView"; // 次画面は「注文完了画面」
?>
