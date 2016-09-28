<!DOCTYPE html>
<html lang="ja">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="css/index.css"  />
	<title>フォームからデータを受け取る</title>
</head>

<body>
	<div id="mainform">
		<?php
		$db = new SQLite3('/Users/tunattu/test_db.db');
		$your_name=$_POST['your_name'];
		$all_data= $_POST['all_data'];
		
		$all_data=$_GET['all_data'];
		$date = date('Y/m/d H:i:s');
		$db->query("INSERT INTO test VALUES (" . $your_name . "," . $all_data . " ;)");
		}

		?>

		<h1>内容が送信されました</h1>
		<?php
		echo $date;
		echo $all_data;
		?>
	</div>
</body>

</html>
