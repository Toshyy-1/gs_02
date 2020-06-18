<?php

 	//POST送信データを取得する
	 $id = $_POST["id"];
	 $isbn  = $_POST["isbn"];
	 $title = $_POST["title"];
	 $author = $_POST["author"];
	 $genre  = $_POST["genre"];
	 $evaluation = $_POST["evaluation"];
	 $comment = $_POST["comment"];
	 $number_times = $_POST["number_times"];

	 // DBに接続
	 require "funcs.php";
	 $pdo = db_conn();
	 


	//書籍データを取得するSQL文を用意
	// $sql = "SELECT * FROM bookinfo WHERE isbn ='{$isbn}'";
	$stmt = $pdo->prepare("UPDATE gs_bool_db SET isbn=:a1, title=:a2, author=:a3, genre=:a4, evaluation=:a5, comment,=:a6, number_times=:a7  WHERE id=:id");

	$stmt = $pdo->prepare("INSERT INTO gs_bool_db(id,isbn,title,author,genre,evaluation,comment,number_times,indate)VALUES(NULL,:a1,:a2,:a3,:a4,:a5,:a6,:a7,sysdate())");
	$stmt->bindValue(':a1', $isbn, PDO::PARAM_INT);  //Integer（数値の場合 PDO::PARAM_INT)
	$stmt->bindValue(':a2', $title, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
	$stmt->bindValue(':a3', $author, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
	$stmt->bindValue(':a4', $genre, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
	$stmt->bindValue(':a5', $evaluation, PDO::PARAM_INT);  //Integer（数値の場合 PDO::PARAM_INT)
	$stmt->bindValue(':a6', $comment, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
	$stmt->bindValue(':a7', $number_times, PDO::PARAM_INT);  //Integer（数値の場合 PDO::PARAM_INT)



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
   //一覧ページへ戻す
   redirect('list.php');
		
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
			<form action="list.php" method="post">

				<table>
					<tr>
						<th width="150"></th>
						<th width="200">変更前情報</th>
						<th width="200">変更後情報</th>
					</tr>
					<tr>
						<th>ISBN</th>
						<td><?php echo $result['isbn']; ?></td>
						<td><?= $result['isbn']?></td>
					</tr>
					<tr>
						<th>TITLE</th>
						<td><?php echo $result['title']; ?></td>
						<td><input type="text" name="title" value="<?php echo $result['title']; ?>"></td>
					</tr>
					<tr>
						<th width="150">価格</th>
						<td><?php echo $result['price']; ?>円</td>
						<td><input type="text" name="price" value="<?=$result['price']?>"></td>
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