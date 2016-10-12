<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" type="text/css" href="css/index.css">
  <title>会員登録</title>
</head>

<?php
session_start();

if(!isset($_SESSION['join'])){
  header('Location: login.php');
  exit();
}
?>

<body>
  <div id="mainform">
    <form action="" method="post">
      <dl>
        <dt>ユーザー名</dt>
        <dd>
         <?php echo htmlspecialchars($_SESSION['join']['name'], ENT_QUOTES, 'UTF-8'); ?>
       </dd>
       <dt>メールアドレス</dt>
       <dd>
       </dd>
       <dt>パスワード</dt>
       <dd>
        【表示されません】
      </dd>
    </dl>
    <div><a href="login.php?action=rewrite">&laquo;&nbsp;書き直す</a>
      <input type="submit" value="登録する"></div>
    </form>
  </div>
</body>
</html>