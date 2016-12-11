<?php
session_start();
require('db_connect.php');


if(isset($_POST['add'])){
	
	echo '追加するよー';
}else if(isset($_POST['kakunin'])){
	header('Location: form_1.php');
	exit;
}
?>