<!DOCTYPE html>
<html lang="ja">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="css/index.css">
	<title>フォームからデータを受け取る</title>
</head>
<body>
<div id="infos">

	<?php
	$db = new SQLite3('/Users/tunattu/test_db.db');

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