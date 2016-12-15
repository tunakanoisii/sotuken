<?php
session_start();
require('db_connect.php');

if(!empty($_POST)){

	if($_POST['state'] == ''){
		$error['state'] = 'blank';
	}

	if($_POST['event'] == ''){
		$error['event'] = 'blank';
	}

	if($_POST['genre'] == ''){
		$error['genre'] = 'blank';
	}

	if($_POST['comment'] == ''){
		$error['comment'] = 'blank';
	}

	if(empty($error)){
		$_SESSION['join'] = $_POST;
		header('Location: form_1.php');
		exit();
	}
}
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

		<form action="form_top.php" method="post">
			<?php 
			echo '<div class="contents">[名前]<br/>'.$_SESSION['name'].'</div>'
			?>
			<br/>
			<div class="contents">[状態]</div>
			<input type="radio" name="state" value="良かった点">良かった点
			<input type="radio" name="state" value="問題点">問題点
			<input type="radio" name="state" value="次年度したい">次年度したい
			<?php if(!empty($error['state']) or $error['state'] == 'blank'): ?>
					<p><font color="red">1つ選択してください</font></p>
				<?php endif; ?>
			<br/>
			<br/>

			<div class="contents">[イベント名]</div>
				<?php
				$db = new SQLite3('/Applications/MAMP/db/sqlite/test_db.db');
				$query = "SELECT * from info";
				$results = $db->query($query);

				$event_arr = array("");

				while($data = $results->fetchArray()){
					if(!in_array($data["event"], $event_arr)) {
						array_push($event_arr, $data["event"]);
					}
				}

				for($i =1; $i < count($event_arr); $i++){
					echo '<input type="radio" name="event" value="'.$event_arr[$i].'">'.$event_arr[$i] . '</br>';
				}
				?>
				<p><input type="radio" name="event" value="">その他<input type="text" name="new_event" size="30"></p>
				<?php if(!empty($error['event']) && $error['event'] == 'blank'): ?>
					<p><font color="red">1つ選択してください</font></p>
				<?php endif; ?>

			<div class="contents">[関連項目]</div>
				<?php
				$db = new SQLite3('/Applications/MAMP/db/sqlite/test_db.db');
				$query = "SELECT * from info";
				$results = $db->query($query);

				$genre_arr = array("スケジュール","物品","広報");

				while($data = $results->fetchArray()){
					if(!in_array($data["genre"], $genre_arr)) {
						array_push($genre_arr, $data["genre"]);
					}
				}

				foreach ($genre_arr as $v) {
					echo '<input type="radio" name="genre" value="'.$v.'">'.$v;
				}
				?>

				<p><input type="radio" name="genre" value="">その他<input type="text" name="new_genre" size="30"></p>
				<?php if(!empty($error['genre']) && $error['genre'] == 'blank'): ?>
					<p><font color="red">1つ選択してください</font></p>
				<?php endif; ?>
		<br/>
		<br/>
		<div class="contents">[内容]</div>
		<textarea name="comment" cols="70" rows="10"></textarea><br/>
		<?php if(!empty($error['comment']) && $error['comment'] == 'blank'): ?>
				<p><font color="red">内容を入力してください</font></p>
			<?php endif; ?>
		<input type ="submit" value="確認画面へ">
	</form>

</div>
</body>

</html>