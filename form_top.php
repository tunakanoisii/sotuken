<?php
session_start();
require('db_connect.php');
?>

<!DOCTYPE html>
<html lang="ja">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="css/index.css">
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
		<h1>フォームデータの送信</h1>

		<form action="form_1.php" method="post">
			<?php 
			echo '<div class="contents">[名前]<br/>'.$_SESSION['name'].'</div>'
			?>
			<br/>
			<div class="contents">[内容]</div>
			<textarea name="comment" cols="70" rows="10"></textarea><br/>
			<input type ="submit" value="確認画面へ">
		</form>

	</div>
</body>

</html>