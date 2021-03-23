<?php
@session_start();
/**
 * SC102RegistLogic.php
 * 会員情報登録画面：登録ボタン(SC102Regist)押下
 */

/** セッションを取得 */
$mail = $_REQUEST["mail"];
$password1 = $_REQUEST["password1"];
$password2 = $_REQUEST["password2"];
$kana = $_REQUEST["kana"];
$name = $_REQUEST["name"];
$telNo = $_REQUEST["telNo"];
$postCode = $_REQUEST["postCode"];
$adress = $_REQUEST["address"];
$birthday = $_REQUEST["birthday"];

/**関数*/
function mailCheck($mail){
        $boolean = preg_match("/^([a-zA-Z0-9])+([a-zA-Z0-9\._-])*@([a-zA-Z0-9_-])+([a-zA-Z0-9\._-]+)+$/", $mail);
        return $boolean;
    }

function postCodeCheck($postCode){
        $boolean = preg_match('/^([0-9]{7})$/', $postCode);
        return $boolean;
    }

function telNoCheck($telNo){
        $boolean = preg_match("/^([0-9-]{10,13})$/", $telNo);
        return $boolean;
    }


/** OKフラグ */
$ok = true;

/** 入力チェック */

if($mail == null || $mail == ""){
    $ok = false;
    $message = "メールアドレスは入力が必須です。";
}elseif($password1 == null || $password1 == "" || $password2 == null || $password2 ==""){
    $ok = false;
    $message = "会員パスワードは入力が必須です。";
}elseif($password1 != $password2){
    $ok = false;
    $message = "パスワードが一致していません。";
}elseif($kana == null || $kana == ""){
    $ok = false;
    $message = "会員名(かな)は入力が必須です。";
}elseif($name == null || $name == ""){
    $ok = false;
    $message = "会員名は入力が必須です。";
}elseif($telNo == null || $telNo == ""){
    $ok = false;
    $message = "電話番号は入力が必須です。";
}elseif($postCode == null || $postCode == ""){
    $ok = false;
    $message = "郵便番号は入力が必須です。";
}elseif($adress == null || $adress == ""){
    $ok = false;
    $message = "住所は入力が必須です。";
}elseif($birthday == null || $birthday == ""){
    $ok = false;
    $message = "生年月日は入力が必須です。";
}elseif(mailCheck($mail) == 0){
    $ok = false;
    $message = "メールアドレスの入力形式が不正です。正しい形式で入力してください。";
}elseif(telNoCheck($telNo) == 0){
    $ok = false;
    $message = "電話番号の入力形式が不正です。正しい形式で入力してください。";

}elseif(postCodeCheck($postCode) == 0){
    $ok = false;
    $message = "郵便番号の入力形式が不正です。正しい形式で入力してください。";

}



/**論理チェック*/

if($ok){
    $con = DBConnection::getConnection();
    $customerDAO = new CustomerDAO($con);

    $mailSeach = $customerDAO -> findOne($mail);
    $telNoSeach = $customerDAO -> findOneTelNo($telNo);

    if(isset($mailSeach)){
        $ok = false;
        $message = "入力いただいたメールアドレスはすでに登録済みです。";
    }elseif(isset($telNoSeach)){
        $ok = false;
        $message = "入力いただいた電話番号は他の会員で登録済みです。";
    }
}

/** データベース：顧客テーブルに追加**/

if($ok){

    $con = DBConnection::getConnection();
    $customerDAO = new CustomerDAO($con);
    $customer = new Customer($mail,$password1,$kana,$name,$telNo,$postCode,$adress,$birthday);
    $result = $customerDAO->insertOne($customer);
    $con = null;

}

/** チェック状態により処理を振り分ける */
if($ok){
    $_SESSION["loginCustomer"] = serialize($customer); // ログイン情報をセッションに格納
    $loginCustomer = unserialize($_SESSION["loginCustomer"]);
    $nextView = "SC111CustomerWelcomeView"; // 次画面は「ようこそ」
}else{
    $nextView = "SC102CustomerRegistView"; // 次画面は「会員登録」
}


?>

<!--エラー画面遷移時に入力情報の保持 -->

<form action="../view/SC102Customerregistview.php" method="post" >

    <input type="hidden" name="mail" value="<?php echo $_REQUEST["mail"]; ?>">
    <input type="hidden" name="password1" value="<?php echo $_REQUEST["password1"]; ?>">
    <input type="hidden" name="password2" value="<?php echo $_REQUEST["password2"]; ?>">
    <input type="hidden" name="kana" value="<?php echo $_REQUEST["kana"]; ?>">
    <input type="hidden" name="name" value="<?php echo $_REQUEST["name"]; ?>">
    <input type="hidden" name="telNo" value="<?php echo $_REQUEST["telNo"]; ?>">
    <input type="hidden" name="postCode" value="<?php echo $_REQUEST["postCode"]; ?>">
    <input type="hidden" name="address" value="<?php echo $_REQUEST["address"]; ?>">
    <input type="hidden" name="birthday" value="<?php echo $_REQUEST["birthday"]; ?>">

</form>
