<?php
session_start();
require('db_connect.php');

if(!isset($_SESSION['join'])){
  header('Location: new_person.php');
  exit;
}

?>

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" type="text/css" href="css/index.css">
  <title>会員登録確認画面</title>
</head>

<body>
  <div id="mainform">
   <form action="check_test.php" method="post" name="check_ok">
     <dl>
       <dt>ユーザー名</dt>
       <dd><?php echo htmlspecialchars($_SESSION['join']['name'], ENT_QUOTES, 'UTF-8'); ?></dd>
       <dt>パスワード</dt>
       <dd>[表示されません]</dd>
     </dl>
     <div>
       <a href="new_person.php?action=rewrite">&laquo;&nbsp;訂正する</a>
       <input type="submit" value="登録する">
     </div>
   </form>
 </div>
</body>
</html>