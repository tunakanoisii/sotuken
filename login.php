<?php
session_start();
require('db_connect.php');

if(!empty($_POST)){
	if($_POST['name'] != '' && $_POST['pass'] != ''){
		$sql = sprintf('SELECT * FROM datas WHERE name="%s" AND pass="%s"', 
			htmlspecialchars($_POST['name']),
			sha1(htmlspecialchars($_POST['pass']))
			); 
		$record = $db->query($sql) or die(sqlite_error($db));

		if($table = $record->fetchArray()){
			//ログイン出来たら
			$_SESSION['name']=$_POST['name'];
			header('Location: index.php');
			exit();
		}else{
			$error['login'] = 'failed';
		}
	}else{
		$error['login'] = 'blank';
	}
}
?>

<!DOCTYPE html>
<html lang="ja">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="css/index.css">
	<title>ログイン画面</title>
</head>
<header>
	<div id="top">
		<a href="index.php">トップページに戻るよ！</a>
	</div>
	<?php
	if(!isset($_SESSION['name'])){
		echo '<div class="menu">新規登録</div>';
		echo '<div class="menu"><a href="login.php">ログイン</a></div>';
	}else{
		echo '<div class="menu"><a href="logout.php">ログアウト</div>';
		echo '<div class="menu"><a href="mypage.php">マイページ</a></div>';
		echo '<div class="menu"><a href="form_top.php">投稿する</a></div>';
	}
	?>
</header>
<body>
	<div id="mainform">
		<p>新規登録は<a href="new_person.php">こちら</a>から</p>
		<form action="" method="post" accept-charset="utf-8">
			<dl>
				<dt>名前</dt>
				<dd>
					<input type="text" name="name" size="20" maxlength="255">
				</dd>
				<dt>パスワード</dt>
				<dd>
					<input type="password" name="pass" size="20" maxlength="255">
				</dd>
			</dl>
			<input type="submit" value="ログインする">
		</form>
	</div>
</body>
</html>
<?php
//うぇい