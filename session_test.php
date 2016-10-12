<!DOCTYPE html>
<html lang="ja">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="css/index.css"  />
	<title>フォームからデータを受け取る</title>
</head>

<?php
session_start();
$_SESSION['username'] = "yamada";
echo $_SESSION['username'];
?>

</html>