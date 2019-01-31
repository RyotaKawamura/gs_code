<?php
//共通に使う関数を記述

function h($a)
{
    return htmlspecialchars($a, ENT_QUOTES);
}

function db_conn(){
    try {
        $pdo = new PDO('mysql:dbname=gs_db;charset=utf8;host=localhost','root','');//さくらのサーバをもらえたらhost＝のところを変える、ID、PWD(zampはなし、rampはroot)
        return $pdo;
    } catch (PDOException $e) {
        exit('DB-Connection-Error:'.$e->getMessage());
      }
}

function redirect($page){
    header("Location: ".$page);
    exit;
    }

function sqlerror($stmt){
  $error = $stmt->errorInfo();
  exit("ErrorSQL:".$error[2]);
  }