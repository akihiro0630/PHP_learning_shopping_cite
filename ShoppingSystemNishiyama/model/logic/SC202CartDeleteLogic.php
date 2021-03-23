<?php
@session_start();
/**
 * SC202CartDeleteLogic.php
 * カート画面：×ボタン(SC202CartDelete)押下
 */


$productGroupCode = $_REQUEST["productGroupCode"];
$productItemCode = $_REQUEST["productItemCode"];
// $productItemName = $_REQUEST["productItemName"];
// $productItemPrice = $_REQUEST["productItemPrice"];

$cart = unserialize($_SESSION["cart"]);

$cart->deleteProduct($productGroupCode, $productItemCode);

$_SESSION["cart"] = serialize($cart);
//echo var_dump($_SESSION["cart"]);



$loginCustomer = unserialize($_SESSION["loginCustomer"]);
$cart = unserialize($_SESSION["cart"]);
require_once ('/SC001ProductListCreate.php');

$nextView = "SC202CartUpdateView"; // 次画面は「カート画面」

?>

