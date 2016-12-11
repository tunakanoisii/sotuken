<?php
	$db = new SQLite3('/Applications/MAMP/db/sqlite/test_db.db');
	if (!$db) {
		die('データベースへの接続に失敗しました。');
	}

	if (isset($_POST["add"])) {
        $nm = $_POST["name"];
        $tx = $_POST["text"];
        $st = $_POST["state"];
        $ge = $_POST["genre"];
        $ev = $_POST["event"];
        $sql = "insert into info(name, own_text, date, state, genre ,event) values('".$nm."','".$tx."','".date('Y/m/d H:i:s')."','".$st."','".$ge."','".$ev."')";
        $db->query($sql);
        header("Location: db.php");
    }
?>
<!DOCTYPE html>
<html lang="ja">
<head>
<title>DB Admin - Web ICAS</title>
<meta charset="UTF-8">
<link rel="stylesheet" href="./lib/tablesorter/themes/blue/style.css">
<script src="./lib/tablesorter/jquery-latest.js" type="text/javascript"></script> 
<script src="./lib/tablesorter/jquery.tablesorter.min.js" type="text/javascript"></script>
<script type="text/javascript">
$(document).ready(function() { 
	$(".tablesorter").tablesorter();
}); 
</script>
<link rel="stylesheet" href="./style.css">
</head>
<body>
<div class="cont">
<?php
    $sql = "select * from info";
    $res = $db->query($sql);
    echo "<table class='list tablesorter'>";
    echo "<thead>";
    echo "<tr>";
    echo "<th>名前</th>";
    echo "<th>テキスト</th>";
    echo "<th>日付</th>";
    echo "<th>state</th>";
    echo "<th>ジャンル</th>";
    echo "<th>イベント名</th>";
    echo "</tr>";
    echo "</thead>";
    echo "<tbody>";
    while($data = $res->fetchArray()) {
        echo "<tr>";
        print "<td>".$data["name"]."</td>";
        print "<td>".$data["own_text"]."</td>";
        print "<td>".$data["date"]."</td>";
        print "<td>".$data["state"]."</td>";
        print "<td>".$data["genre"]."</td>";
        print "<td>".$data["event"]."</td>";
        print "</tr>";
    }
    echo "</tbody>";
    echo "</table>";
?>


	<form id="add" name="add" action="<?php print($_SERVER['PHP_SELF']) ?>" method="POST">
		<fieldset>
		<label for="name">なまえ</label>
		<input type="text" id="name" name="name" value="">
		<br>
		<label for="text">テキスト</label>
		<input type="text" id="text" name="text" value="">
		<br>
		<label for="state">state</label>
		<input type="text" id="state" name="state" value="">
		<br>
        <label for="genre">ジャンル</label>
        <input type="text" id="genre" name="genre" value="">
        <br>
        <label for="genre">イベント名</label>
        <input type="text" id="event" name="event" value="">
        <br>
		<input type="submit" id="add" name="add" value="追加">
		</fieldset>
	</form>
</div>
</body>
</html>
<?php
	$db->close();
?>