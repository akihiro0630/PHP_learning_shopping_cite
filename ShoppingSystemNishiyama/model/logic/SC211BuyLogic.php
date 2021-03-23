<?php

@session_start();
/**
 * SC211BuyLogic.php
 * 注文履歴画面：注文を続ける(SC203Buy)押下
 */


$loginCustomer = unserialize($_SESSION["loginCustomer"]);
$cart = unserialize($_SESSION["cart"]);
require_once ("/SC001ProductListCreate.php");

$nextView = "SC201ProductSalesListView"; // 次画面は「商品検索画面」

?>