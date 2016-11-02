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

<body>
	<div id="mainform">
		<h1>フォームデータの送信</h1>

		<form action="form_1.php" method="post">
			<?php 
			echo '<div class="contents">[名前]<br/>'.$_SESSION['name'].'</div>'
			?>
			<br/>
			<div class="contents">[内容]</div>
			<textarea name="comment" cols="50" rows="5"></textarea><br/>
			<input type ="submit" value="確認画面へ">
		</form>

	</div>
</body>

</html>