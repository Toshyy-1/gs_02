<?php

//共通に使う関数を記述

//XSS対応(echoする場所で使用!それ以外はNG)
function h($str){
  return htmlspecialcharas($str, ENT_QUOTES);
}


//1.  DB接続文
function db_conn(){

  try {
    //Password:MAMP='root',XAMPP=''
    return new PDO('mysql:dbname=gs_book_db;charset=utf8;host=localhost','root','root');
  } catch (PDOException $e) {
    exit('DBConnectError:'.$e->getMessage());
  }

}



//SQLエラー
function sql_error($stmt){
  //execute(SQL実行時にエラーがある場合)
  $error = $stmt->errorInfo();
  exit("SQLError:".$error[2]);
}


//リダイレクト
function redirect($file_name){
  header("Location: ".$file_name);
  exit();
}



// //２．データ登録SQL作成
// $stmt = $pdo->prepare("SELECT * FROM bookinfo");
// $status = $stmt->execute();

// //３．データ表示
// $view="";
// if($status==false) {
//     //execute（SQL実行時にエラーがある場合）
//   $error = $stmt->errorInfo();
//   exit("ErrorQuery:".$error[2]);

// }else{
//   //Selectデータの数だけ自動でループしてくれる
//   //FETCH_ASSOC=http://php.net/manual/ja/pdostatement.fetch.php
// 	 $result = $stmt->fetch(PDO::FETCH_ASSOC);
// }

?>



