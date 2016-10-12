<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" type="text/css" href="css/index.css">
  <title>会員登録確認画面</title>
</head>

<?php
session_start();

if(!isset($_SESSION['join'])){
  header('Location: new_person.php');
  exit();
}
?>

<body>
  <div id="mainform">
   <form action="" method="post">
     <dl>
       <dt>ユーザー名</dt>
       <dd><?php echo htmlspecialchars($_SESSION['join']['name'], ENT_QUOTES, 'UTF-8'); ?>"
         <dt>パスワード</dt>
         <dd>[表示されません]</dd>
       </dl>
       <div>
        <a href="login.php?action=rewrite">&laquo;&nbsp;訂正する</a>
        <input type="submit" value="登録する"></div>
      </div>
    </form>
  </body>
  </html>