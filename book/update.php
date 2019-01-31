<?php
//1.POSTでParamを取得
$id = $_POST["id"];
$name = $_POST["name"];
$bookurl = $_POST["bookurl"];
$comment = $_POST["comment"];

//2.DB接続など
include("funcs.php");
$pdo = db_conn();

//3.UPDATE gs_an_table SET ....; で更新(bindValue)
//基本的にinsert.phpの処理の流れです。
$update = $pdo->prepare('UPDATE gs_bm_table SET name=:name,bookurl=:bookurl,comment=:comment WHERE id=:id');
$update->bindValue(':name',    $name,    PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$update->bindValue(':bookurl', $bookurl, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$update->bindValue(':comment', $comment, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$update->bindValue(':id',      $id,      PDO::PARAM_INT);  //Integer（数値の場合 PDO::PARAM_INT)

//SQL実行
$status = $update->execute();

//次のページへリダイレクト
header("Location:select.php");

?>
