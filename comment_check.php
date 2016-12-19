<?php
session_start();
require('db_connect.php');

if(!isset($_SESSION['id_comment'])){
	header('Location: mypage.php');
	exit;
}

if(isset($_SESSION['id_comment']['comment'])){
	$db = new SQLite3('/Applications/MAMP/db/sqlite/test_db.db');

	$sql = $db->prepare("INSERT INTO comments(id, toukou_id, comment) VALUES(?, ?, ?)");
	$sql->bindParam(2, $_SESSION['id_comment']['id']);
	$sql->bindParam(3, $_SESSION['id_comment']['comment']);
	$sql->execute();

	header('Location: index.php');
	exit();
}
?>