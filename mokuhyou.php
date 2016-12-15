<?php
session_start();
require('db_connect.php');
?>

<!DOCTYPE html>
<html lang="ja">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="css/index.css">
	<title>目標の変更</title>
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
		<h2>目標を変更する</h2>

		<form action="mokuhyou_add.php" method="post">
		<?php
			echo '<div class="contents">' . $_SESSION['name'] . 'さんの今の目標</div>';
			
			$db = new SQLite3('/Applications/MAMP/db/sqlite/test_db.db');

			$results = $db->query("SELECT * FROM mokuhyou WHERE name='" . $_SESSION['name'] . "'order by date desc");
			$data = $results->fetchArray();

			echo '<p>' . $data["mokuhyou"] . '</p></br>' ;
			$db->close();
			?>
			<div class="contents">新しい目標</div>
			<textarea name="mokuhyou" cols="70" rows="5"></textarea><br/>
			<input type="hidden" name="your_name" value="<?php echo $_SESSION['name']; ?>">
			<input type ="submit" value="変更">
		</form>

	</div>
</body>

</html>