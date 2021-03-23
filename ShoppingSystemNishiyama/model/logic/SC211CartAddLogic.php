
<?php
@session_start();
/**
 * SC211CartAddLogic.php
 * 注文履歴画面：+ボタン(SC211CartAdd)押下
 */

 $productGroupCode = $_REQUEST["productGroupCode"];
 $productItemCode = $_REQUEST["productItemCode"];
 $productItemName = $_REQUEST["productItemName"];
 $productItemPrice = $_REQUEST["productItemPrice"];

 //  echo $productGroupCode;
 //  echo $productItemCode;
 //  echo $productItemName;
 //  echo $productItemPrice;


$productItem = new ProductItem($productGroupCode,$productItemCode,$productItemName,$productItemPrice,1,0,"");

$cart = unserialize($_SESSION["cart"]);

$cart->addProduct($productItem);

$_SESSION["cart"] = serialize($cart);
//echo var_dump($_SESSION["cart"]);



//cart=ProductStorage;

//  echo $productGroupCode;
//  echo $productItemCode;
//  echo $productItemName;
//  echo $productItemPrice;

// $loginCustomer = unserialize($_SESSION["loginCustomer"]);
// $cart = unserialize($_SESSION["cart"]);
// require_once ("/SC001ProductListCreate.php");

//echo $productGroupCode,$productItemCode,$productItemName,$productItemPrice
$nextView = "SC211OrderHistoryView"; // 次画面は「商品検索画面」
?>


