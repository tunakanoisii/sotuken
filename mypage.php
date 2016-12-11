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
		<form method="post" action="form_1.php">
			<?php 
			echo '<div class="contents">[名前]<br/>'.$_SESSION['name'].'</div>'
			?>

			<br/>
			<div class="contents">[状態]</div>
			<input type="radio" name="state" value="良かった点">良かった点
			<input type="radio" name="state" value="問題点">問題点
			<input type="radio" name="state" value="次年度したい">次年度したい
			<br/>
			<br/>
			<div class="contents">[関連項目]</div>

			<?php
			$db = new SQLite3('/Applications/MAMP/db/sqlite/test_db.db');
			$query = "SELECT * from info";
			$results = $db->query($query);

			$arr = array("スケジュール","物品","広報");

			while($data = $results->fetchArray()){
				if(!in_array($data["genre"], $arr)) {
					array_push($arr, $data["genre"]);
				}
			}

			foreach ($arr as $v) {
				echo '<input type="radio" name="genre" value="'.$v.'">'.$v;
			}
			?>

			<!--
			<p><input type="text" name="new_genre" size="30"></p>
			<p><input type="submit" name="add" value="追加"></p>
			-->

		</br>
		<div class="contents">[内容]</div>
		<textarea name="comment" cols="45" rows="10"></textarea><br/>
		<input type ="submit" name="kakunin" value="確認画面へ">
	</form>
</div>

<?php
/*
if(isset($_POST['add'])){
	while($data = $results->fetchArray()){
		if(!in_array($_POST['add'], $arr)) {
			array_push($arr, $_POST['add']);
		}
	}
	echo '追加するよー';
}else if(isset($_POST['kakunin'])){
	header('Location: index.php');
  exit;
}
*/
?>

<div id="mypage_toukou">
	<?php
	echo '<h1>' . $_SESSION['name'] . 'さんの投稿</h1>';
	$db = new SQLite3('/Applications/MAMP/db/sqlite/test_db.db');

	$query = "SELECT * FROM info WHERE name='" . $_SESSION['name'] . "' order by date desc";
	$results = $db->query($query);
	//セッションデータと照らし合わせ

	while($data = $results->fetchArray()){
		if($data[3]=='良かった点'){
			echo '<div class="own_info_1">';
		echo '<p>' . $data[2] . '</p><br>';//日付
		echo '<p>' . $data[3] . '</p><br>';//良かった点、改善点、その他
		echo '<p>[内容]<br>' . $data[1] . '</p>';
		echo '<div class="name_link">' . $data[0] . '</div></div>';
	}else if($data[3]=='問題点'){
		echo '<div class="own_info_2">';
		echo '<p>' . $data[2] . '</p><br>';//日付
		echo '<p>' . $data[3] . '</p><br>';//良かった点、改善点、その他
		echo '<p>[内容]<br>' . $data[1] . '</p>';
		echo '<div class="name_link">' . $data[0] . '</div></div>';
	}else if($data[3]=='次年度したい'){
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

</div>
</body>
</html>