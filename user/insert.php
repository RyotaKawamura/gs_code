<?php
//1. POSTデータ取得
// $name = filter_input(INPUT_GET, "name" ); //こういうのもあるよ
// $email = filter_input( INPUT_POST, "email" ); //こういうのもあるよ
include("funcs.php");
$name = h($_POST["name"]);
$lid = h($_POST["lid"]);
$lpw = h($_POST["lpw"]);
$kanri_flg = h($_POST["kanri_flg"]);


//2. DB接続します
$pdo = db_conn();

//３．データ登録SQL作成
$stmt = $pdo->prepare("INSERT INTO gs_user_table(name,lid,lpw,kanri_flg)VALUES(:name,:lid,:lpw,:kanri_flg)");
$stmt->bindValue(':name', $name, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':lid', $lid, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':lpw', $lpw, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':kanri_flg', $lpw, PDO::PARAM_INT);  //Integer（数値の場合 PDO::PARAM_INT)
$status = $stmt->execute();

//４．データ登録処理後
if($status==false){
  //SQL実行時にエラーがある場合（エラーオブジェクト取得して表示）
  sqlerror($stmt);
}else{
  //５．index.phpへリダイレクト
  redirect("index.php");
}
?>