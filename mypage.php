<?php
session_start();
require('db_connect.php');
?>

<!DOCTYPE html>
<html lang="ja">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="css/index.css">
	<title>マイページ</title>
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
	}
	?>
</header>

<body>
	<div class="mypage_form">
		<form action="form_1.php" method="post">
			<?php 
			echo '<div class="contents">[名前]<br/>'.$_SESSION['name'].'</div>'
			?>
			<br/>
			<div class="contents">[内容]</div>
			<textarea name="comment" cols="45" rows="10"></textarea><br/>
			<input type ="submit" value="確認画面へ">
		</form>
	</div>

	<div id="mypage_toukou">
		<?php
		echo '<h1>' . $_SESSION['name'] . 'さんの投稿</h1>';
		$db = new SQLite3('/Users/tunattu/test_db.db');

		$query = "SELECT * FROM info WHERE name='" . $_SESSION['name'] . "' order by date desc";
		$results = $db->query($query);
	//セッションデータと照らし合わせ

		while($data = $results->fetchArray()){
			echo '<div class="own_info">';
			echo '<p>' . $data[2] . '</p><br>';
			echo '<p>[内容]<br>' . $data[1] . '</p>';
			echo '<div class="name_link">' . $data[0] . '</div></div>';

		}

		$db->close();
		?>
	</div>

</div>
</body>
</html>