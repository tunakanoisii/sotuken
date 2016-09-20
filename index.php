<!DOCTYPE html>
<html lang="ja">
<head>
	<meta charset="UFT-8">
	<link rel="stylesheet" type="text/css" href="css/index.css"  />
	<title>フォームからデータを受け取る</title>
</head>

<body>
	<div id="mainform">
		<?php
		$date = date('Y/m/d H:i:s');
		$your_name = $_GET['your_name'];
		$comment = $_GET['comment'];
		$comment = nl2br($comment);

		$data = "<hr>\r\n";
		$data = $data . "名前:" . $your_name . "<br />\r\n";
		$data = $data . "内容:" . "<br />\r\n";
		$data = $data . $comment . "<br />\r\n";

		$form_file = 'form.txt';

		$fp = fopen($form_file, 'ab');

		if ($fp){
			if (flock($fp, LOCK_EX)){
				if (fwrite($fp,  $data) === FALSE){
					print('ファイル書き込みに失敗しました');
				}

				flock($fp, LOCK_UN);
			}else{
				print('ファイルロックに失敗しました');
			}
		}

		fclose($fp);

		echo $data;
		?>
	</div>
</body>

</html>
