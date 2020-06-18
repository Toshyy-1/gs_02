<?php

 	//GET送信データを取得する
	 $id = $_GET["id"];

	 // DBに接続
	 require "funcs.php";
	 $pdo = db_conn();
	 


	//書籍データを取得するSQL文を用意
	// $sql = "SELECT * FROM bookinfo WHERE isbn ='{$isbn}'";
	$stmt = $pdo->prepare("SELECT * FROM gs_bool_db WHERE id=:id");
	$stmt ->bindvalue(":id",$id,PDO::PARAM_INT);//PDO::PARAM_STR


	$status = $stmt->execute();
	
	// $stmt = $pdo->prepare("UPDATE bookinfo SET isbn=:a1, title=:a2, price=:a3 WHERE id=:id");
	// $stmt->bindValue(':a1',$isbn , PDO::PARAM_INT); //Integer(数値の場合　PDO::PARAM_INT)
	// $stmt->bindValue(':a2',$title , PDO::PARAM_STR);
	// $stmt->bindValue(':a3',$price , PDO::PARAM_INT);
	// $stmt->bindValue(':id',$id , PDO::PARAM_INT);
	// $status = $stmt->execute();


	if ($status == false) { 
		//SQLエラー関数
		sql_error($stmt);
	
	}else{
		$result = $stmt->fetch();
	}


	//SQL文を発行し、結果セットを取得
	// $result = executeQuery($sql);

	//結果セットから書籍情報を取得
	// $row = mysql_fetch_array($result);

	// //変更完了ボタンが押されたら
	// if (isset($_POST["isbn"])) {
	// 	//POSTデータを取得
	// 	$isbn = $_POST["isbn"];
	// 	$title = $_POST["title"];
	// 	$price = $_POST["price"];

	// 	//書籍情報を更新するSQL文を用意
	// 	// $sql = "UPDATE bookinfo SET title ='{$title}', price='{$price}' WHERE isbn ='{$isbn}'";

	// 	//SQL文を発行
	// 	// executeQuery($sql);

	// 	//書籍一覧ページに遷移
	// 	header("Location: list.php");
	// 	exit;
	// }
?>
<!DOCTYPE html>
<html lang="ja">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="css/reset.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
	<title>書籍変更ページ | 書籍管理システム</title>
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

		<h2>書籍変更</h2>
		<div id="update">
			<form action="update.php" method="post">

				<table>
					<tr>
						<th width="150"></th>
						<th width="200">変更前情報</th>
						<th width="200">変更後情報</th>
					</tr>
					<tr>
						<th>ISBN</th>
						<td><?php echo $result['isbn']; ?></td>
						<td><input type="text" name="isbn" value="<?=$result['isbn']?>"></td>
					</tr>
					<tr>
						<th>TITLE</th>
						<td><?php echo $result['title']; ?></td>
						<td><input type="text" name="title" value="<?php echo $result['title']; ?>"></td>
					</tr>
					<tr>
						<th width="150">著者</th>
						<td><?php echo $result['author']; ?></td>
						<td><input type="text" name="author" value="<?=$result['author']?>"></td>
					</tr>
					<tr>
						<th>ジャンル</th>
						<td><?php echo $result['genre']; ?></td>
						<td><input type="text" name="genre" value="<?php echo $result['genre']; ?>"></td>
					</tr>
					<tr>
						<th width="150">点</th>
						<td><?php echo $result['evaluation']; ?>点</td>
						<td><input type="text" name="evaluation" value="<?=$result['evaluation']?>"></td>
					</tr>
					<th width="150">コメント</th>
						<td><?php echo $result['comment']; ?></td>
						<td><input type="text" name="comment" value="<?=$result['comment']?>"></td>
					</tr>
					<tr>
						<th>回数</th>
						<td><?php echo $result['number_times']; ?>回</td>
						<td><input type="text" name="number_times" value="<?php echo $result['number_times']; ?>"></td>
					</tr>


				</table>
				<input type="hidden" name="id" value="<?=$result['id']?>">
				<input type="submit" value="変更完了" class="button">
			</form>
		</div>


		<footer>
			<p class="copyright">Copyright &copy; all rights reserved.</p>
		</footer>
	</div>
</body>
</html>