<?php
$db = new SQLite3('/Applications/MAMP/db/sqlite/test.sqlite');

$sql_result = $db->query("SELECT * FROM thread WHERE id =3");

$data = $sql_result->fetchArray();
print $data["id"].":".$data["name"];

$db->close();

	?>