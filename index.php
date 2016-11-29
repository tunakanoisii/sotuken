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
	<div id="infos">
		<div id="form">

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
		if($data[3]=='良かった点'){
			echo '<div class="own_info_1">';
		echo '<p>' . $data[2] . '</p><br>';//日付
		echo '<p>' . $data[3] . '</p><br>';//良かった点、改善点、その他
		echo '<p>[内容]<br>' . $data[1] . '</p>';
		echo '<div class="name_link">' . $data[0] . '</div></div>';
	}else if($data[3]=='改善点'){
		echo '<div class="own_info_2">';
		echo '<p>' . $data[2] . '</p><br>';//日付
		echo '<p>' . $data[3] . '</p><br>';//良かった点、改善点、その他
		echo '<p>[内容]<br>' . $data[1] . '</p>';
		echo '<div class="name_link">' . $data[0] . '</div></div>';
	}else if($data[3]==''){
		echo '<div class="own_info_3">';
		echo '<p>' . $data[2] . '</p><br>';//日付
		echo '<p>' . $data[3] . '</p><br>';//良かった点、改善点、その他
		echo '<p>[内容]<br>' . $data[1] . '</p>';
		echo '<div class="name_link">' . $data[0] . '</div></div>';
	}
}

$db->close();
?>

</div>
</body>
</html>