<!DOCTYPE html>
<html lang="ja">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="css/index.css">
	<title>フォームからデータを受け取る</title>
</head>

<body>
	<div id="mainform">
		<h1>確認画面</h1>
		<?php
		$your_name=$_POST['your_name'];
		$comment = $_POST['comment'];
		$comment = nl2br($comment);

		$data = "<hr>\r\n";
		$data = $data . "[名前]<br />\r\n" . $your_name . "<br />\r\n";
		$data = $data . "<br />\r\n[内容]" . "<br />\r\n";
		$data = $data . $comment . "<br />\r\n";

		echo $data;
		echo "<br>" . "以上の内容で間違いないですか？"
		?>

		<form action="form_2.php" method="get">
		<input type="hidden" name="all_data" value="<?php echo $data; ?>">
		<input type="submit" value="送信">
		</form>

	</div>
</body>