<?php
@session_start();
/**
 * SC111CustomerLogoutView.php
 * 会員ログアウト画面を出力する
 */

//$name =$_REQUEST['name'];
//echo $name;
$loginCustomer = unserialize($_SESSION["loginCustomer"]);


?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>ログアウト</title>
</head>

<body>
    <!-- 見出し -->
    <div align="center">
        <h2>
            <?=$loginCustomer->getName()?>様
            <br>
            ログアウトしました。
            <br>
            またのお越しをお待ちしております。
        </h2>
    </div>
    <div align="center" style="color: red;">
            </div>
    <!-- フォーム -->
    <form action="../controller/Go.php" method="POST">
    <div align="center">
        <!-- ボタンID用フィールド -->
        <input type="hidden" name="buttonID" value="" >
        <input type="submit" value="ログイン"
        onClick="this.form.buttonID.value='SC190Login';"
        >
    </div>
    </form>
</body>
</html>