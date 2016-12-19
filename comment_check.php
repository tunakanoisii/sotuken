<?php
session_start();
require('db_connect.php');

if(isset($_SESSION['comment'])){
$toukou_id = 2;
  $sql = $db->prepare("INSERT INTO comments(id, toukou_id, comment) VALUES(?, ?, ?)");

  $sql->bindParam(2, $toukou_id);
  $sql->bindParam(3, $_SESSION['comment']);
  $sql->execute();

  header('Location: index.php');
  exit();
}
?>