<?php
@session_start();
/**
 * SC212FavoriteListView.php
 * 商品検索画面：お気に入りを見る(SC201FavoriteFind)押下
 */

$loginCustomer = unserialize($_SESSION["loginCustomer"]);
?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>お気に入り</title>
</head>

<body>
	<?=$loginCustomer->getMail()?>
	<?=$loginCustomer->getName()?>様
	<!-- 見出し -->
	<div align="center">
		<h2>お気に入り</h2>

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
			 onclick="this.form.buttonID.value='SC212Buy'; this.form.submit();">
		<input type="submit" value="カートを見る"
			 onclick="this.form.buttonID.value='SC212CartFind'; this.form.submit();">
		<input type="submit" value="ログアウト"
			 onclick="this.form.buttonID.value='SC212Logout'; this.form.submit();">





	<table border="1">
		<tr>
			<td align="center" width="80">
				登録日
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
			<td align="center" width="60">
				お気に入り
			</td>
		</tr>

	<?php

	  $loginCustomer = unserialize($_SESSION["loginCustomer"]);
	  $customerMail = $loginCustomer->getMail();
	  $con = DBConnection::getConnection();
	  $orderFavorite = new OrderFavoriteDAO($con);
	  $vOrderFavoriteList = $orderFavorite->findAnyCustomer($customerMail);

	  foreach($vOrderFavoriteList as $vOrderFavorite){ ?>
				<tr>
					<td align="center">
						<?= $vOrderFavorite->getRegistDate(); ?>
					</td>
					<td align="center">
						<?= $vOrderFavorite->getProductGroupCode().$vOrderFavorite->getProductItemCode(); ?>
					</td>
					<td>
						<?= $vOrderFavorite->getProductItemName(); ?>
					</td>
					<td align="right">
						<?= $vOrderFavorite->getProductItemPrice(); ?>
					</td>
					<?php $disabled = "";
					if(empty($vOrderFavoriteList)){
					    $disabled ="disable";
					}
					?>
					<td align="center">
						<input type = "button" value="＋"
						<?=$disabled?>
						onclick="this.form.buttonID.value='SC212CartAdd';
							 this.form.productGroupCode.value='<?=$vOrderFavorite->getProductGroupCode()?>';
							 this.form.productItemCode.value='<?=$vOrderFavorite->getProductItemCode()?>';
							 this.form.productItemName.value='<?=$vOrderFavorite->getProductItemName()?>';
							 this.form.productItemPrice.value='<?=$vOrderFavorite->getProductItemPrice()?>';
							 this.form.submit();">
					</td>
					<td align="center">
						<input type = "button" value="×"
						<?=$disabled?>
						onclick="this.form.buttonID.value='SC212FavoriteDelete';
							 this.form.productGroupCode.value='<?=$vOrderFavorite->getProductGroupCode()?>';
							 this.form.productItemCode.value='<?=$vOrderFavorite->getProductItemCode()?>';
							 this.form.productItemName.value='<?=$vOrderFavorite->getProductItemName()?>';
							 this.form.productItemPrice.value='<?=$vOrderFavorite->getProductItemPrice()?>';
							 this.form.submit();">
					</td>

				</tr>
			<?php }?>
			</table>
	</form>

	</div>
</body>