<?php

@session_start();
/**
 * SC102CustomerRegistView.php
 * 会員情報入力画面を表示する
 */
$loginCustomer = unserialize($_SESSION["loginCustomer"]);
echo $loginCustomer->getMail()."　".$loginCustomer->getName();

$mail = $loginCustomer->getMail();
$kana = $loginCustomer->getKana();
$name = $loginCustomer->getName();
$telNo = $loginCustomer->getTelNo();
$postCode = $loginCustomer->getPostCode();
$address = $loginCustomer->getAddress();
$birthday = $loginCustomer->getBirthday();

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>会員登録</title>

        <script type="text/javascript">
			function pushExecuteButton(){
    			var result = confirm("この内容でよろしいですか？");
    			return result;
			}
		</script>
    </head>
<body>
    <!-- 見出し -->
    <div align="center">
    	<h2>会員更新</h2>
    </div>
    <div align="center" style="color: red;">
    	<?=$message?>

    </div>

    <!-- フォーム -->
    <form action="../controller/Go.php" method="POST">

        <input type="hidden" name="buttonID" value="" >
        <div align="center">
            <table border=1>
                <tr>
                    <th>メールアドレス</th>
                    <td align="left" width="300" >
                        <?=$mail ?>
                    </td>
                </tr>

                <tr>
                    <th>旧会員パスワード</th>
                    <td align="left" width="300">
                        <input type="password" name="password1" size="100" maxlength="30">
                    </td>
                </tr>
                <tr>
                    <th>新会員パスワード</th>
                    <td align="left" width="300">
                        <input type="password" name="password2" size="100" maxlength="30">
                    </td>
                </tr>
                <tr>
                    <th>新会員パスワード(再)</th>
                    <td align="left" width="300">
                        <input type="password" name="password3" size="100" maxlength="30">
                    </td>
                </tr>

                <tr>
                    <th>会員名（かな）</th>
                    <td align="left" width="300">
                        <input type="text" name="kana" size="100" maxlength="40" value="<?= $kana?>">
                    </td>
                </tr>
                <tr>
                    <th>会員名</th>
                    <td align="left" width="300">
                          <input type="text" name="name" size="100" maxlength="40" value="<?= $name?>">
                    </td>
                </tr>
                <tr>
                    <th>電話番号</th>
                    <td align="left" width="300">
                        <input type="text" name="telNo" size="100" maxlength="13" value="<?= $telNo?>">
                    </td>
                </tr>
                <tr>
                    <th>郵便番号</th>
                    <td align="left" width="300">
                        <input type="text" name="postCode" size="100" maxlength="7" value="<?= $postCode?>">
                    </td>
                </tr>
                <tr>
                    <th>住所</th>
                    <td align="left" width="300">
                        <input type="text" name="address" size="100" maxlength="50" value="<?= $address?>">
                    </td>
                </tr>
                <tr>
                    <th>生年月日</th>
                    <td align="left" width="300">
                        <input type="text" name="birthday" size="100" maxlength="8" value="<?= $birthday?>">
                    </td>
                </tr>

            </table>
        </div><br><br>
        <div align="center">
            <input type="submit" value="更新"
             onClick="this.form.buttonID.value='SC103Modify';
             return pushExecuteButton();"
            >
             <input type="submit" value="戻る"
             onClick="this.form.buttonID.value='SC103Return';"
             >
            <input type="reset" value="クリア">

            <input type="submit" value="ログアウト"
             onClick="this.form.buttonID.value='SC111Logout';"
             >
            </div>
	 </form>

</html>
