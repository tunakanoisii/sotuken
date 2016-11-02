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
<?php
if(!isset($_SESSION['name'])){
	echo '<div class="menu">新規登録</div>';
	echo '<div class="menu">ログイン</div>';
}else{
	echo '<div class="menu">ログアウト</div>';
	echo '<div class="menu">マイページ</div>';
}
?>
</header>

<body>
	<div id="infos">
		<div id="form"><p>入力フォームは<a href="form_top.php">こちら</p></a>

			<?php
			$db = new SQLite3('/Users/tunattu/test_db.db');
			if(isset($_SESSION['name'])) {
				echo "ようこそ".$_SESSION['name']."さん";
			} else {
				echo "ログインはこちら";
			}?>
		</div>


		<?php
	$results = $db->query('SELECT * FROM info order by date desc');//DBのデータを降順にする

	while($data = $results->fetchArray()){
		echo '<div class="own_info">';
		echo '<p>' . $data[2] . '</p><br>';
		echo '<p>[内容]<br>' . $data[1] . '</p>';
		echo '<div class="name_link">' . $data[0] . '</div></div>';

	}

	$db->close();
	?>

</div>
</body>
</html>