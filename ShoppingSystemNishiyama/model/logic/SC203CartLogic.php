<?php

@session_start();
/**
 * SC203CartLogic.php
 * 注文確認画面：カートに戻る(SC203CartLogic)押下
 */


$loginCustomer = unserialize($_SESSION["loginCustomer"]);
$cart = unserialize($_SESSION["cart"]);
require_once ("/SC001ProductListCreate.php");

$nextView = "SC202CartUpdateView"; // 次画面は「カート画面」

?>