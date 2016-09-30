<!DOCTYPE html>
<html lang="ja">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="css/index.css">
	<title>フォームからデータを受け取る</title>
</head>
<body>

	<?php
	$db = new SQLite3('/Users/tunattu/test_db.db');

	$results = $db->query('SELECT * FROM info');
	$row=$results->fetchArray();
	/*while($i=0; $i< sqlite_num_rows($results); $i++){
		$rows = swlite_fetch_array($results,  SQLITE_ASSOC);
		printf ('<div id="infos"><div class="own_info">');
		echo '<p>名前</p>';
		echo $rows["name"];
		echo '</div></div>';
	}*/
	echo '<div id="infos"><div class="own_info">';
	echo '<p>名前:';
	echo $row["name"] . '</p><br>';
	echo '<p>内容:</p>';
	echo $row["own_text"];
	echo '</div></div>';
	?>

	<div id="infos"><div class="own_info">
		<p>名前</p>
		<p>内容</p>
	</div>

	<div class="own_info">
	</div>
</div>

</body>