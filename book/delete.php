<?php
//1. GET値取得
$id = $_GET["id"];

//2. DB接続します
include("funcs.php");
$pdo = db_conn();

//３．DELETEのSQL作成
$update = $pdo->prepare('DELETE FROM gs_bm_table WHERE id=:id');
$update->bindValue(':id', $id, PDO::PARAM_INT);

//SQL実行
$status = $update->execute();

//４．データ登録処理後
if($status==false){
  //SQL実行時にエラーがある場合（エラーオブジェクト取得して表示）
  sqlerror($stmt);
}else{
  //５．index.phpへリダイレクト
  redirect("select.php");
}
?>