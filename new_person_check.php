<?php
session_start();
$db = new SQLite3('/Users/tunattu/own_data.db');

if(!isset($_SESSION['join'])){
  header('Location: new_person.php');
  exit;
}

/* 明日はここから
if(isset($_POST)){
  $sql = $db->prepare("INSERT INTO datas(id, name, pass) VALUES(?, ?, ?)");

  $result=sqlite_query($db, 'select * from datas');
  $handle=sqlite_num_rows($result);
  $id_count= $handle ++;

  $sql->bindParam(1, $id_count);
  $sql->bindParam(2, sqlite_escape_string($db, $_SESSION['join']['name']));
  $sql->bindParam(3, sqlite_escape_string($db, sha1($_SESSION['join']['pass'])));
  $sql->execute();

  unset($_SESSION['join']);

  header('Location: new_person_ok.php');
  exit();
}
*/

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
   <form action="" method="post">
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