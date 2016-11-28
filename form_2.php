<!DOCTYPE html>
<html lang="ja">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="css/index.css"  />
	<title>フォームからデータを受け取る</title>
</head>

<header>
	<div id="top">
		<a href="index.php">トップページに戻るよ！</a>
	</div>
	<?php
	if(!isset($_SESSION['name'])){
		echo '<div class="menu">新規登録</div>';
		echo '<div class="menu">ログイン</div>';
	}else{
		echo '<div class="menu">ログアウト</div>';
		echo '<div class="menu"><a href="mypage.php">マイページ</a></div>';
		echo '<div class="menu"><a href="form_top.php">投稿する</a></div>';
	}
	?>
</header>

<body>
	<div id="mainform">
		<?php
		session_start();
		$db = new SQLite3('/Users/tunattu/test_db.db');
		$all_data= $_POST['all_data'];
		$your_name=$_POST['your_name'];
		$comment = $_POST['comment'];

		$date = date('Y/m/d H:i:s');

		$stmt = $db->prepare("INSERT INTO info(name, own_text, date) VALUES(?, ?, ?)");
		$stmt->bindParam(1, $your_name);
		$stmt->bindParam(2, $comment);
		$stmt->bindParam(3, $date);
		$stmt->execute();

		//echo $_SESSION["your_name"];
		//echo $_SESSION["comment"];
		?>

		<h1>内容が送信されました</h1>
		<?php
		echo $date;
		echo $all_data;
		?>
 
		<p>他にも内容を追加しますか？</p>
		<form action="form_top.html" method="post">
			<input type ="submit" value="続けて入力する">
		</form>
		<form action="index.php" method="post">
			<input type ="submit" value="TOPページに戻る">
		</form>
	</div>
</body>

</html>
