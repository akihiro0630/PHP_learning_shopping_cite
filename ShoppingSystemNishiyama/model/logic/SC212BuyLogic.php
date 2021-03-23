<?php

@session_start();
/**
 * SC212BuyLogic.php
 * お気に入り画面：注文を続ける(SC212Buy)押下
 */


$loginCustomer = unserialize($_SESSION["loginCustomer"]);
$cart = unserialize($_SESSION["cart"]);
require_once ("/SC001ProductListCreate.php");

$nextView = "SC201ProductSalesListView"; // 次画面は「商品検索画面」

?>