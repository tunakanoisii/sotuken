<?php
session_start();
require('db_connect.php');

if(!empty($_POST)){

	if($_POST['comment'] == ''){
		$error['comment'] = 'blank';
	}

	if(empty($error)){
		$_SESSION['id_comment']  = $_POST;
		header('Location: comment_check.php');
		exit();
	}
}
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
		$state_arr = array(
			"良かった点" => "comment_info_1",
			"問題点" => "comment_info_2",
			"次年度したい" => "comment_info_3"
			);
		$db = new SQLite3('/Applications/MAMP/db/sqlite/test_db.db');
		$r = $db->query("SELECT * from info where id='" . $_GET['id'] . "'");

		while($d = $r->fetchArray()) {
		echo '</br><p>' . $d[3] . '</p></br>';//日付
		echo '<p>[名前]<br>' . $d[1] . '</p>';
		echo '<p>[内容]<br>' . $d[2] . '</p></br>';
	}
	$db->close();
	?>

	<p>私ならこうする！</p>
	<form action="comments.php" method="post">
	<textarea name="comment" cols="80" rows="10"></textarea><br/>
		<?php if(!empty($error['comment']) && $error['comment'] == 'blank'): ?>
				<p><font color="red">内容を入力してください</font></p>
			<?php endif; ?>
		<input type="hidden" name="id" value="<?php echo $_GET['id']; ?>">
		<input type ="submit" value="コメントする">
	</form>
	
</div>
</body>

</html>