<?php
session_start();
require('db_connect.php');

$db = new SQLite3('/Applications/MAMP/db/sqlite/test_db.db');
$name = $_POST['your_name'];
$mokuhyou= $_POST['mokuhyou'];
$date = date('Y/m/d H:i:s');

$stmt = $db->prepare("INSERT INTO mokuhyou(name, mokuhyou, date) VALUES(?, ?, ?)");
$stmt->bindParam(1, $name);
$stmt->bindParam(2, $mokuhyou);
$stmt->bindParam(3, $date);
$stmt->execute();

header('Location: mypage.php');
  exit;
?>