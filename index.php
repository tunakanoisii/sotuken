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
		<div id="form">

			<?php
			$db = new SQLite3('/Applications/MAMP/db/sqlite/test_db.db');
			if(isset($_SESSION['name'])) {
				echo "ようこそ".$_SESSION['name']."さん";
			} else {
				echo "ログインはこちら";
			}?>
		</div>


		<?php
		$query = "SELECT * from info";
	$results = $db->query('SELECT * FROM info order by date desc');//DBのデータを降順にする

	$arr = array("スケジュール","物品","広報");

	while($data = $results->fetchArray()){
		if(!in_array($data["genre"], $arr)) {
			array_push($arr, $data["genre"]);
		}
	}

	foreach ($arr as $v) {
		echo '<table border="1" width="740" cellspacing="0" cellpadding="5" bordercolor="#000">';
		echo '<tr>';
		echo '<td bgcolor="#FFF" width="120" align="center"><font color="#000">' . $v . '</font></td>';
		echo '<td bgcolor="#FFF" width="620">';
		while($data = $results->fetchArray()){
			if($data[4]== $v){
				if($data[3]=='良かった点'){
					echo '<div class="own_info_1">';
				echo '<p>' . $data[2] . '</p><br>';//日付
				echo '<p>[内容]<br>' . $data[1] . '</p>';
				echo '<div class="name_link">' . $data[0] . '</div></div>';
			}else if($data[3]=='問題点'){
				echo '<div class="own_info_2">';
				echo '<p>' . $data[2] . '</p><br>';//日付
				echo '<p>[内容]<br>' . $data[1] . '</p>';
				echo '<div class="name_link">' . $data[0] . '</div></div>';
			}else if($data[3]=='次年度したい'){
				echo '<div class="own_info_3">';
				echo '<p>' . $data[2] . '</p><br>';//日付
				echo '<p>[内容]<br>' . $data[1] . '</p>';
				echo '<div class="name_link">' . $data[0] . '</div></div>';
			}
		}
	}
	echo '</td>';
	echo '</tr>';
}
echo '</table>';

$db->close();
?>

</div>
</body>
</html>