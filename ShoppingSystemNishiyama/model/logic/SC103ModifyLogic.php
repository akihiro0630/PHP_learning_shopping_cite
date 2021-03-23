<?php
@session_start();
/**
 * SC103ModifyLogic.php
 * 会員情報更新画面：更新ボタン(SC103Modify)押下
 */

/** セッションを取得 */
$loginCustomer = unserialize($_SESSION["loginCustomer"]);
$mail = $loginCustomer ->getMail();
$password1 = $_REQUEST["password1"];
$password2 = $_REQUEST["password2"];
$password3 = $_REQUEST["password3"];
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

/**password2が入力されていないとき*/
if(!isset($password2)){

    if($kana == null || $kana == ""){
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
    }elseif(telNoCheck($telNo) == 0){
        $ok = false;
        $message = "電話番号の入力形式が不正です。正しい形式で入力してください。";

    }elseif(postCodeCheck($postCode) == 0){
        $ok = false;
        $message = "郵便番号の入力形式が不正です。正しい形式で入力してください。";

    }
}else{
    if($password1 == null || $password1 == "" ){
        $ok = false;
        $message = "旧会員パスワードは入力が必須です。";
    }elseif($password2 == null || $password2 == "" || $password3 == null || $password3 == "" ){
        $ok = false;
        $message = "新会員パスワードは入力が必須です。";
    }elseif($password2 != $password3){
        $ok = false;
        $message = "新会員パスワードが一致していません。";
    }elseif($password1 == $password2){
        $ok = false;
        $message = "旧会員パスワードと新会員パスワードが同一です。";
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
    }elseif(telNoCheck($telNo) == 0){
        $ok = false;
        $message = "電話番号の入力形式が不正です。正しい形式で入力してください。";

    }elseif(postCodeCheck($postCode) == 0){
        $ok = false;
        $message = "郵便番号の入力形式が不正です。正しい形式で入力してください。";

    }

}

/**論理チェック*/

if( !($password1 == $loginCustomer ->getPassword())){
    $ok = false;
    $message = "旧パスワードが違います。";

}

// if($ok){
//     $con = DBConnection::getConnection();
//     $customerDAO = new CustomerDAO($con);

//     //$mailSeach = $customerDAO -> findOne($mail);
//     $telNoSeach = $customerDAO -> findOneTelNo($telNo);

// //    if(isset($mailSeach)){
// //        $ok = false;
// //        $message = "入力いただいたメールアドレスはすでに登録済みです。";
//     if(isset($telNoSeach)){
//         $ok = false;
//         $message = "入力いただいた電話番号は他の会員で登録済みです。";
//     }
// }

/** データベース：顧客テーブルを更新**/

if($ok){

    $con = DBConnection::getConnection();
    $customerDAO = new CustomerDAO($con);
    $customer = new Customer($mail,$password2,$kana,$name,$telNo,$postCode,$adress,$birthday);
    $result = $customerDAO->modifyOne($customer);
    $_SESSION["loginCustomer"] = serialize($customer);
    $con = null;


}


/** チェック状態により処理を振り分ける */
if($ok){
    $nextView = "SC111CustomerWelcomeView"; // 次画面は「ようこそ」
}else{
    $nextView = "SC103CustomerModifyView"; // 次画面は「会員登録」
}

