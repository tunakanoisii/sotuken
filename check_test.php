<?php
session_start();
require('db_connect.php');

if(!isset($_SESSION['join'])){
  header('Location: new_person.php');
  exit;
}

if(isset($_POST)){
  $sql = $db->prepare("INSERT INTO datas(name, pass) VALUES(?, ?)");

  $sql->bindParam(1, $_SESSION['join']['name']);
  $sql->bindParam(2, sha1($_SESSION['join']['pass']));
  $sql->execute();

  unset($_SESSION['join']);

  header('Location: new_person_ok.php');
  exit();
}
?>