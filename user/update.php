<?php
//1.POSTでParamを取得
$id = $_POST["id"];
$name = $_POST["name"];
$lid = $_POST["lid"];
$lpw = $_POST["lpw"];
$kanri_flg = $_POST["kanri_flg"];


//2.DB接続など
include("funcs.php");
$pdo = db_conn();

//3.UPDATE gs_an_table SET ....; で更新(bindValue)
//基本的にinsert.phpの処理の流れです。
$update = $pdo->prepare('UPDATE gs_user_table SET name=:name,lid=:lid,lpw=:lpw,kanri_flg=:kanri_flg WHERE id=:id');
$update->bindValue(':name', $name, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$update->bindValue(':lid',  $lid,  PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$update->bindValue(':lpw',  $lpw,  PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$update->bindValue(':kanri_flg',  $kanri_flg,  PDO::PARAM_INT);  //Integer（数値の場合 PDO::PARAM_INT)
$update->bindValue(':id',   $id,   PDO::PARAM_INT);  //Integer（数値の場合 PDO::PARAM_INT)

//SQL実行
$status = $update->execute();

//次のページへリダイレクト
header("Location:select.php");

?>