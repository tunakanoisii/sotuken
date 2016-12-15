<?php
session_start();
require('db_connect.php');
?>

<!DOCTYPE html>
<html lang="ja">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="css/index.css">
	<title>コメントページ</title>
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
		<h1>コメントを付ける</h1>
	<?php
	$query = "SELECT * from info";
	$results = $db->query('SELECT * FROM info order by date desc');//DBのデータを降順にする

	$genre_arr = array("スケジュール","物品","広報");
	$event_arr = array("");

	while($genre_data = $results->fetchArray()){
		if(!in_array($genre_data["genre"], $genre_arr)) {
			array_push($genre_arr, $genre_data["genre"]);
		}
	}

	while($event_data = $results->fetchArray()){
		if(!in_array($event_data["event"], $event_arr)) {
			array_push($event_arr, $event_data["event"]);
		}
	}

	$state_arr = array(
		"良かった点" => "own_info_1",
		"問題点" => "own_info_2",
		"次年度したい" => "own_info_3"
		);

	$r = $db->query("SELECT * from info where genre='" . $genre_arr[$_SESSION['genre_arr_i']] . "' and event='" . $event_arr[$_SESSION['event_arr_j']] . "'");

	while($d = $r->fetchArray()) {
		echo '<div class="'.$state_arr[$d[3]].'">';
		echo '<p>' . $d[2] . '</p><br>';//日付
		echo '<p>[内容]<br>' . $d[1] . '</p>';
		echo '<div class="name_link">' . $d[0] . '</div></br></br></div>';
	}
				?>

				<form action="form_1.php" method="post">
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
					<br/>
					<br/>
					<div class="contents">[内容]</div>
					<textarea name="comment" cols="70" rows="10"></textarea><br/>
					<input type ="submit" value="確認画面へ">
				</form>

			</div>
		</body>

		</html>