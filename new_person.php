<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" type="text/css" href="css/index.css">
  <title>会員登録</title>
</head>

<?php
session_start();

if(!empty($_POST)){
  if($_POST['name']) == ''){
  $error['name'] = 'blank';
}
if(strlen($_POST['pass']) < 4){
  $error['pass'] = 'length';
}
if($_POST['pass']) == ''){
  $error['pass'] = 'blank';
}

if(empty($error)){
  $_SESSION['join'] = $_POST;
  header('Location: new_person_check.php');
  exit();
}

if($_REQUEST['action'] == 'rewrite'){
  $_POST = $_SESSION['join'];
}
}
?>

<body>
  <div id="mainform">
    <p>新規登録</p>
    <form action="" method="post" enctype="multipart/form-data">
      <dl>

        <dt>ユーザー名<font color="red"> ※必須</font></dt>
        <dd>
          <input type="text" name="name" size="25" maxlength="100" value="<?php echo htmlspecialchars($_POST['name'], ENT_QUOTES, 'UTF-8'); ?>">
          <?php if(!empty($error['name']) && $error['name'] == 'blank'): ?>
            <p><font color="red">ユーザー名を入力してください</font></p>
          <?php endif; ?>
        </dd>

        <dt>パスワード<font color="red"> ※必須</font></dt>
        <dd>
          <input type="password" name="password" size="10" maxlength="20" value="<?php echo htmlspecialchars($_POST['pass'], ENT_QUOTES, 'UTF-8'); ?>">
          <?php if(!empty($error['pass']) && $error['pass'] == 'blank'): ?>
            <p><font color="red">パスワードを入力してください</font></p>
            <?php if(!empty($error['pass']) && $error['pass'] == 'length'): ?>
              <p><font color="red">パスワードは4文字以上で入力してください</font></p>
            <?php endif; ?>
          </dd>
        </dl>
        <div>
          <input type="submit" value="入力内容を確認"></div>  
        </div>
      </form>
    </div>
  </body>
  </html>