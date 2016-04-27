<!-- 管理者メニューの表示を行う。
　　　　　ページ移行時、セッション確認を行い管理者であるかを確認する。
　　　　　管理者メニューでは、「システムのON/OFF設定確認機能」、「ログ情報確認機能」、「ログアウト」があり
　　　　　それぞれ、クリックされると指定されたリンクへジャンプする。
  -->
<?php
session_start();
// ログイン状態のチェック
if (!isset($_SESSION["USERID"])) {
  header("Location: logout.php");
  exit;
}
?>

<!DOCTYPE html>
<html lang="ja">
  <head>
        <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
        <meta http-equiv="Content-Style-Type" content="text/css">
        <meta http-equiv="Content-Script-Type" content="text/javascript">
        <title>SIZKANIC 管理者用ページ</title>
        <link rel="stylesheet" href="admin_screen_initial.css" type="text/css">
  </head>
  <body>
	<form id="loginform" name="loginform" action="admin_screen_change.php" method="post">
        <div id="d1">
          <h1>管理者メニュー</h1>
        </div>
        <div id="d2">
          <h2 id="d4"><a href="./admin_screen_change.php">システムのON/OFF設定</a></h2>
          <h2 id="d4"><a href="./admin_screen_log.php">ログ情報の管理</a></h2>
        </div>
	<div align="center">
        <h2><a href="logout.php">ログアウト</a></h2>
	</div>
	</form>
	</body>
</html>

