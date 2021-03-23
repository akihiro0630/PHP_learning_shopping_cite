<?php
@session_start();
/**
 * SC211OrderHistoryView.php
 * 商品検索画面：注文履歴を見る(SC211OrderHistoryConfirm)押下
 */

$loginCustomer = unserialize($_SESSION["loginCustomer"]);
?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>注文履歴</title>
</head>

<body>
	<?=$loginCustomer->getMail()?>
	<?=$loginCustomer->getName()?>様
	<!-- 見出し -->
	<div align="center">
		<h2>注文履歴</h2>

		<table border="1">
			<tr>
				<td width = "40">カート数量</td>

				<td width = "100" align="right"><?php $cart = unserialize($_SESSION['cart']);
				      echo $cart ->getSumQuantity();
				?>
				</td>
				<td width = "40">カート金額</td>
				<td width = "100" align="right"><?php
				      echo $cart ->getSumMoney();
				?>
				</td>

			</tr>

		</table>

		<form action="../controller/Go.php" method="POST">
		<!-- ボタンID用フィールド -->
		<input type="hidden" name="buttonID" value="">
		<!-- 送信用商品フィールド -->
		<input type="hidden" name="productGroupCode" value="">
		<input type="hidden" name="productItemCode" value="">
		<input type="hidden" name="productItemName" value="">
		<input type="hidden" name="productItemPrice" value="">

		<input type="submit" value="注文を続ける"
			 onclick="this.form.buttonID.value='SC211Buy'; this.form.submit();">
		<input type="submit" value="カートを見る"
			 onclick="this.form.buttonID.value='SC211CartFind'; this.form.submit();">
		<input type="submit" value="ログアウト"
			 onclick="this.form.buttonID.value='SC211Logout'; this.form.submit();">





	<table border="1">
		<tr>
			<td align="center" width="80">
				注文日
			</td>
			<td align="center" width="80">
				商品コード
			</td>
			<td align="center">
				商品名
			</td>
			<td align="center" width="50">
				単価
			</td>
			<td align="center" width="60">
				カートに入れる
			</td>
		</tr>

	<?php

	  $loginCustomer = unserialize($_SESSION["loginCustomer"]);
	  $customerMail = $loginCustomer->getMail();
	  $con = DBConnection::getConnection();
	  $orders = new OrdersDAO($con);
	  $vOrdersList = $orders->findAnyCustomer($customerMail);

	foreach($vOrdersList as $vOrders){ ?>
				<tr>
					<td align="center">
						<?= $vOrders->getOrderDate(); ?>
					</td>
					<td align="center">
						<?= $vOrders->getProductGroupCode().$vOrders->getProductItemCode(); ?>
					</td>
					<td>
						<?= $vOrders->getProductItemName(); ?>
					</td>
					<td align="right">
						<?= $vOrders->getProductItemPrice(); ?>
					</td>
					<?php $disabled = "";
					if(($vOrders -> getOrdersNo())== '0'){
					    $disabled ="disable";
					}
					?>
					<td align="center">
						<input type = "button" value="＋"
						<?=$disabled?>
						onclick="this.form.buttonID.value='SC211CartAdd';
							 this.form.productGroupCode.value='<?=$vOrders->getProductGroupCode()?>';
							 this.form.productItemCode.value='<?=$vOrders->getProductItemCode()?>';
							 this.form.productItemName.value='<?=$vOrders->getProductItemName()?>';
							 this.form.productItemPrice.value='<?=$vOrders->getProductItemPrice()?>';
							 this.form.submit();">
					</td>

				</tr>
			<?php }?>
			</table>
	</form>

	</div>
</body>