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
		
		$all_data=$_GET['all_data'];
		$date = date('Y/m/d H:i:s');

		$form_file = 'form.txt';

		$fp = fopen($form_file, 'ab');

		if ($fp){
			if (flock($fp, LOCK_EX)){
				if (fwrite($fp,  $all_data) === FALSE){
					print('ファイル書き込みに失敗しました');
				}

				flock($fp, LOCK_UN);
			}else{
				print('ファイルロックに失敗しました');
			}
		}

		fclose($fp);
		?>

		<h1>内容が送信されました</h1>
		<?php
		echo $date;
		echo $all_data;
		?>
	</div>
</body>

</html>
