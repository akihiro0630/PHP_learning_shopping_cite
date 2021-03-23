<?php
@session_start();
/**
 * SC202BuyConfirmView.php
 * カート画面：注文確認ボタン(SC202Confirm)押下
 */

$loginCustomer = unserialize($_SESSION["loginCustomer"]);
?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>カート</title>
</head>

<body>
	<?=$loginCustomer->getMail()?>
	<?=$loginCustomer->getName()?>様
	<!-- 見出し -->
	<div align="center">
		<h2>注文確認</h2>
		<h3><font color="#ff0000">この内容で注文してもよろしいですか?</font></h3>
		<form action="../controller/Go.php" method="POST">
		<!-- ボタンID用フィールド -->
		<input type="hidden" name="buttonID" value="">
		<!-- 送信用商品フィールド -->
		<input type="hidden" name="productGroupCode" value="">
		<input type="hidden" name="productItemCode" value="">
		<input type="hidden" name="productItemName" value="">
		<input type="hidden" name="productItemPrice" value="">

		<input type="submit" value="注文を続ける"
			 onclick="this.form.buttonID.value='SC203Buy'; this.form.submit();">
		<input type="submit" value="カートに戻る"
			 onclick="this.form.buttonID.value='SC203Cart'; this.form.submit();">
		<input type="submit" value="注文確定"
			 onclick="this.form.buttonID.value='SC203Result'; this.form.submit();">
		<input type="submit" value="ログアウト"
			 onclick="this.form.buttonID.value='SC203Logout'; this.form.submit();">





	<table border="1">
		<tr>
			<td align="center">
				商品コード
			</td>
			<td align="center">
				商　品　名
			</td>
			<td align="center">
				単　価
			</td>
			<td align="center">
				数　量
			</td>
			<td align="center">
				金　額
			</td>
		</tr>

	<?php $cart = unserialize($_SESSION["cart"]);
	  $productItems = $cart->getProductItemList();

	foreach($productItems as $vProduct){ ?>
				<tr>
					<td>
						<?= $vProduct->getProductGroupCode().$vProduct->getCode(); ?>
					</td>
					<td>
						<?= $vProduct->getName(); ?>
					</td>
					<td>
						<?= $vProduct->getPrice(); ?>
					</td>
					<?php
			 				$disabled = "";
			 				if($vProduct->getStock() <= 0){
			 				    $disabled = "disabled";
			 				}
			 				?>
					<td>
						<?= $vProduct->getStock(); ?>
					</td>
					<td>
						<?= ($vProduct->getPrice())*($vProduct->getStock()); ?>
					</td>

				</tr>
			<?php }?>
				<tr>
					<td colspan="3" align="center">
						合計
					</td>
					<td>
						<?php $cart = unserialize($_SESSION['cart']);
						   $sumQuantity = $cart->getSumQuantity();
						   echo $sumQuantity;
						 ?>
					</td>
					<td>
						<?php
						$sumMoney = $cart->getSumMoney();
						   echo $sumMoney;
						 ?>
					</td>
				</tr>
			</table>
	</form>

	</div>
</body>