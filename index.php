<?php
session_start();
require('db_connect.php');
?>

<!DOCTYPE html>
<html lang="ja">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="css/index.css">
	<title>継承システム</title>
</head>

<header>
	<div id="top">
		<a href="index.php">トップページに戻るよ！</a>
	</div>
	<?php
	if(!isset($_SESSION['name'])){
		echo '<div class="menu"><a href="new_person.php">新規登録</a></div>';
		echo '<div class="menu"><a href="login.php">ログイン</a></div>';
	}else{
		echo '<div class="menu"><a href="logout.php">ログアウト</div>';
		echo '<div class="menu"><a href="mypage.php">マイページ</a></div>';
		echo '<div class="menu"><a href="form_top.php">投稿する</a></div>';
	}
	?>
</header>

<body>
	<div id="infos">
		<?php
		$db = new SQLite3('/Applications/MAMP/db/sqlite/test_db.db');
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

	echo '<div class="state_all">';
	echo '<div class="state_color_1"></div>';
	echo '<div class="state_text">良かった点</div>';
	echo '</div>';
	echo '<div class="state_all">';
	echo '<div class="state_color_2"></div>';
	echo '<div class="state_text">問題点</div>';
	echo '</div>';
	echo '<div class="state_all">';
	echo '<div class="state_color_3"></div>';
	echo '<div class="state_text">来年やりたいこと</div>';
	echo '</div>';

	echo '<table border="1"  cellspacing="0" cellpadding="5" bordercolor="#000">';
	echo '<tr>';
	foreach ($event_arr as $t) {
		echo '<th bgcolor="#FFF" width="1000"><font color="#000">' . $t . '</font></th>';
	}
	echo '</tr>';

	for($i = 0; $i < count($genre_arr); $i++) {
		echo '<tr height="100px">';
		echo '<td bgcolor="#FFF" width="150px" align="center"><font color="#000">';
		echo $genre_arr[$i];
		echo '</font></td>';
		for($j = 1; $j < count($event_arr); $j++) {
			$r = $db->query("SELECT * from info where genre='".$genre_arr[$i]."' and event='".$event_arr[$j]."' order by date desc");
			echo '<td>';
			while($d = $r->fetchArray()) {
				echo '<a href="./comments.php?id='.$d[0].'"';
				echo '<div class="'.$state_arr[$d[4]].'">';
				echo '<p>' . $d[3] . '</p><br>';//日付
				echo '<p>[内容]<br>' . $d[2] . '</p></br>';
				echo '<p>[コメント]</p>';

				$c = $db->query("SELECT * from comments where toukou_id='" . $d[0] . "'order by date desc");

				while($o = $c->fetchArray()) {
					echo '<p>' . $o[2]. '/' . $o[3] . '</p></br>';
				}
				echo '<div class="name_link">' . $d[1] . '</div></br></br>';
				echo '</div></a>';
			}
			echo '</td>';
		}
		echo '</tr>';
	}

	echo '</table>';

	$db->close();
	?>

</div>
</body>
</html>