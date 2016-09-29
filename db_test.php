	<!DOCTYPE html>
	<html lang="ja">
	<head>
		<meta charset="UTF-8">
	</head>
	<body>

		<?php
//DBへ接続
		$db = new SQLite3('/Users/tunattu/test_db.db');

	//実行結果を返すクエリ
		$results = $db->query('SELECT * FROM test');

	//結果を1行ずつ処理する
		while ($row = $results->fetchArray()){
			echo $row[0] . "\n";
			echo $row[1] . "\n";
		}
	//接続を終了
		$db->close();

		?>
		<h1>sqlite</h1>
	</body>
	</html>