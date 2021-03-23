<?php
@session_start();
/**
 * SC202CartSubstractLogic.php
 * カート画面：-ボタン(SC201CartSubstract)押下
 */

$productGroupCode = $_REQUEST["productGroupCode"];
$productItemCode = $_REQUEST["productItemCode"];
$productItemName = $_REQUEST["productItemName"];
$productItemPrice = $_REQUEST["productItemPrice"];

//  echo $productGroupCode;
//  echo $productItemCode;
//  echo $productItemName;
//  echo $productItemPrice;


//$productItem = new ProductItem($productGroupCode,$productItemCode,$productItemName,$productItemPrice,1,0,"");

$productItem = new ProductItem($productGroupCode,$productItemCode,$productItemName,$productItemPrice,-1,0,"");

$cart = unserialize($_SESSION["cart"]);

$cart->addProduct($productItem);

$_SESSION["cart"] = serialize($cart);

$loginCustomer = unserialize($_SESSION["loginCustomer"]);
$cart = unserialize($_SESSION["cart"]);
require_once ("/SC001ProductListCreate.php");


$nextView = "SC202CartUpdateView"; // 次画面は「カート画面」
?>