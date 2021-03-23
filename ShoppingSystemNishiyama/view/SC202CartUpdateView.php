<?php

@session_start();
/**
 * SC201CartUpdateView.php
 * 商品メニュー画面を出力する
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
		<h2>カート</h2>
		<form action="../controller/Go.php" method="POST">
		<!-- ボタンID用フィールド -->
		<input type="hidden" name="buttonID" value="">
		<!-- 送信用商品フィールド -->
		<input type="hidden" name="productGroupCode" value="">
		<input type="hidden" name="productItemCode" value="">
		<input type="hidden" name="productItemName" value="">
		<input type="hidden" name="productItemPrice" value="">

		<input type="submit" value="注文を続ける"
			 onclick="this.form.buttonID.value='SC202Buy'; this.form.submit();">
		<input type="submit" value="注文確認"
			 onclick="this.form.buttonID.value='SC202Confirm'; this.form.submit();">
		<input type="submit" value="ログアウト"
			 onclick="this.form.buttonID.value='SC202Logout'; this.form.submit();">





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
			<td align="center">
				削除
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
					<?php $disabled = "";
			 				if($vProduct->getStock() <= 0){
			 				    $disabled = "disabled";
			 				}
			 				?>
					<td>
						<input type = "button" value="＋"
						<?=$disabled?>
						onclick="this.form.buttonID.value='SC202CartAdd';
							 this.form.productGroupCode.value='<?=$vProduct->getProductGroupCode()?>';
							 this.form.productItemCode.value='<?=$vProduct->getCode()?>';
							 this.form.productItemName.value='<?=$vProduct->getName()?>';
							 this.form.productItemPrice.value='<?=$vProduct->getPrice()?>';
							 this.form.submit();">
						<input type = "button" value="－"
						<?=$disabled?>
						onclick="this.form.buttonID.value='SC202CartSubtract';
							 this.form.productGroupCode.value='<?=$vProduct->getProductGroupCode()?>';
							 this.form.productItemCode.value='<?=$vProduct->getCode()?>';
							 this.form.productItemName.value='<?=$vProduct->getName()?>';
							 this.form.productItemPrice.value='<?=$vProduct->getPrice()?>';
							 this.form.submit();">
						<?= $vProduct->getStock(); ?>
					</td>
					<td>
						<?= ($vProduct->getPrice())*($vProduct->getStock()); ?>
					</td>
					<td>
						<input type = "button" value="カートから削除"
						<?=$disabled?>
						onclick="this.form.buttonID.value='SC202CartDelete';
							 this.form.productGroupCode.value='<?=$vProduct->getProductGroupCode()?>';
							 this.form.productItemCode.value='<?=$vProduct->getCode()?>';
							 this.form.productItemName.value='<?=$vProduct->getName()?>';
							 this.form.productItemPrice.value='<?=$vProduct->getPrice()?>';
							 this.form.submit();">
					</td>

				</tr>
			<?php }?>
				<tr>
					<td colspan="3" align="center">
						合計
					</td>
					<td  align="center">
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
					<td>
						<input type = "button" value="カートを空にする"
						onclick="this.form.buttonID.value='SC202CartAllDelete';
							 this.form.submit();">

					</td>
				</tr>
			</table>
	</form>

	</div>
</body>