<!--
  ログアウト処理を行う。
  セッションを切断した後、ログアウトに成功、またはセッションのタイムアウトを表示する。
-->
<?php
session_start();

if (isset($_SESSION["USERID"])) {
  $errorMessage = "ログアウトしました。";
}
else {
  $errorMessage = "セッションがタイムアウトしました。";
}
// セッション変数のクリア
$_SESSION = array();
@session_destroy();
?>

<!doctype html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>SIZKANIC　管理者用ページ</title>
  </head>
  <body>
  <h1>ログアウト</h1>
  <div><?php echo $errorMessage; ?></div>
  <ul>
  <li><a href="admin_screen_login.php">ログイン画面に戻る</a></li>
  </ul>
  </body>
</html>
