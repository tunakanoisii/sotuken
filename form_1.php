<?php
session_start();
?>

<!DOCTYPE html>
<html lang="ja">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="css/index.css">
	<title>投稿画面</title>
</head>

<header>
	<div id="top">
		<a href="index.php">トップページに戻るよ！</a>
	</div>
	<?php
	if(!isset($_SESSION['name'])){
		echo '<div class="menu">新規登録</div>';
		echo '<div class="menu">ログイン</div>';
	}else{
		echo '<div class="menu">ログアウト</div>';
		echo '<div class="menu"><a href="mypage.php">マイページ</a></div>';
		echo '<div class="menu"><a href="form_top.php">投稿する</a></div>';
	}
	?>
</header>

<body>
	<div id="mainform">
		<h1>確認画面</h1>
		<?php
		$your_name=$_SESSION['name'];
		$state = $_POST['state'];
		$comment = $_POST['comment'];

		//$_SESSION['your_name']= $_POST['your_name'];
		//$_SESSION['comment']= $_POST['comment'];
		$comment = nl2br($comment);

		$data = "<hr>\r\n";
		$data = $data . "[名前]<br />\r\n" . $your_name . "<br />\r\n";
		$data = $data . "<br />\r\n[ジャンル]<br />\r\n" . $state . "<br />\r\n";
		$data = $data . "<br />\r\n[内容]" . "<br />\r\n";
		$data = $data . $comment . "<br />\r\n";

		echo $data;
		echo "<br>" . "以上の内容で間違いないですか？"

		?>

		<form action="form_2.php" method="POST">
			<input type="hidden" name="all_data" value="<?php echo $data; ?>">
			<input type="hidden" name="your_name" value="<?php echo $your_name; ?>">
			<input type="hidden" name="state" value="<?php echo $state; ?>">
			<input type="hidden" name="comment" value="<?php echo $comment; ?>">
			<input type="submit" value="送信">
		</form>

	</div>
</body>