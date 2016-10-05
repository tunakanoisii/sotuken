<!DOCTYPE html>
<html lang="ja">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="css/index.css">
	<title>フォームからデータを受け取る</title>
</head>
<body>
<div id="infos">
<<<<<<< HEAD
<div id="form"><p>入力フォームは<a href="form_top.html">こちら</p></a></div>
	<?php
	$db = new SQLite3('/Users/tunattu/test_db.db');

	$results = $db->query('SELECT * FROM info order by date desc');//DBのデータを降順にする

	while($data = $results->fetchArray()){
		echo '<div class="own_info">';
		echo '<p>' . $data[2] . '</p><br>';
		echo '<p>[名前]' . $data[0] . '</p>';
		echo '<p>[内容]<br>' . $data[1] . '</p>';
=======

	<?php
	$db = new SQLite3('/Users/tunattu/test_db.db');

>>>>>>> master
	$results = $db->query('SELECT * FROM info');

	while($data = $results->fetchArray()){
		echo '<div class="own_info">';
		echo '<p>名前:' . $data[0] . '</p>';
		echo '<p>内容:' . $data[1] . '</p>';
		echo '</div>';
	}

		$db->close();
	?>
	
	</div>

</body>
</html>