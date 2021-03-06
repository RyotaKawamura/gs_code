<?php
//1. POSTデータ取得
// $name = filter_input(INPUT_GET, "name" ); //こういうのもあるよ
// $email = filter_input( INPUT_POST, "email" ); //こういうのもあるよ
$name = h($_POST["name"]);
$bookurl = h($_POST["bookurl"]);
$comment = h($_POST["comment"]);

//2. DB接続します
include("funcs.php");
$pdo = db_conn();

//３．データ登録SQL作成
$stmt = $pdo->prepare("INSERT INTO gs_bm_table(name,bookurl,comment,indate)VALUES(:name,:bookurl,:comment,sysdate())
");
$stmt->bindValue(':name', $name, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':bookurl', $bookurl, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':comment', $comment, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
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