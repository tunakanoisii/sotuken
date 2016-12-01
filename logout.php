<?php
session_start();

//ボタンが押されたあとの処理
if(isset($_SESSION["name"])){
	$errorMessage = "ログアウトしました";
}else{
	$errorMessage = "セッションがタイムアウトしました";
}

//セッション変数の初期化
$_SESSION = array();

/*
//クッキーの破棄
if(ini_get("session.use_cookies")){
	$params = session_get_cookie_params();
	setcookie(session_name()), '', time() - 42000, 
	$params["path"], $params["domain"], $params["secure"], $params["httponly"]
	);
}
*/

//セッションクリア
session_destroy();
header('Location: index.php');
exit();
?>

<!DOCTYPE html>
<html lang="ja">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="css/index.css">
	<title>ログアウト</title>
</head>
<body>
	<div id="mainform">
		<?php
		echo $errorMessage;
		?>
		<a href="index.php">トップに戻る</a>
	</div>
</body>
</html>
<?php
//うぇい