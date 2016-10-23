<?php
session_start();
require('db_connect.php');

if(!empty($_POST)){
	if($_POST['pass'] != ''){
		$sql = sprintf('SELECT * FROM datas WHERE pass="%s"', sqlite_escape_string($db, sha1($_POST['pass']))
			); 
		$record = sqlite_query($db, $sql);
		if($table = sqlite_fetch_assoc($record)){
			//ログイン出来たら
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
<body>
	<div id="mainform">
		<p>新規登録はこちらから</p>
		<form action="" method="post" accept-charset="utf-8">
			<dl>
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