<?php

 	//POSTデータを取得する


	//データベース接続用ファイルを読み込む
	require "funcs.php";
	$pdo = db_conn();




//3. データ削除SQLを準備
// $sql = 'DELETE FROM bookinfo WHERE id=:id';
// $stmt = $pdo->prepare($sql);
// $stmt->bindValue(':id',$id,PDO::PARAM_INT);//PARAM_STR

//書籍を全て削除
$delete = $pdo->prepare("DELETE FROM gs_bool_db");

	//SQL文を発行
	// executeQuery($sql);
	

//4. SQL実行
$status = $delete->execute();

//5. データ登録処理後
if ($status == false) { 
		//SQLエラー関数
	// 	$error = $stmt->errorInfo();
	// 	exit("QueryError:".$error[2]);

  // }else{
	// 	//リダイレクト
	// 	header("Location: list.php");
	// 	exit;
  // }


	    //SQLエラー関数
			sql_error($delete);

		}else{
			// redirect('list.php');
		}

?>






<!DOCTYPE html>
<html lang="ja">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="css/reset.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
	<title>書籍削除情報ページ | 書籍管理システム</title>
	<meta http-equiv="refresh" content=" 2; url=./list.php">
</head>
<body>
	<div id="container">
		<header class="clearfix">
			<div class="title">
				<h1>書籍管理システム</h1>
			</div>
			<div class="search">
				<form action="list.php">
					<p class="keyword">
						<input type="text" name="title" placeholder="検索したい書籍タイトルを入力" value="">
					</p>
					<p class="submit">
						<input type="submit" value="検索">
					</p>
				</form>
			</div>
		</header>

		<nav id="menu">
			<ul class="clearfix">
				<li><a href="list.php">書籍一覧</a></li>
				<li><a href="index.php">書籍登録</a></li>
			</ul>
		</nav>

		<h2>書籍削除</h2>
		<div id="delete">
			<p>管理情報を全て削除しました。</p>
		</div>

		<footer>
			<p class="copyright">Copyright &copy; all rights reserved.</p>
		</footer>
	</div>
</body>
</html>