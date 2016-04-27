<?php
// セッションスタート                                          
session_start();
// クラス呼び出し
require '../../../../WebAPI/warning_function_class.php';
$on_or_off = new WF();                               
// ログイン状態のチェック
if (!isset($_SESSION["USERID"])) {
  header("Location: admin_screen_login.php"); 
  exit;                           
}
// ON/OFFの設定によりクラス内の変数の値を変更
if (isset($_POST["on_off"])) {
	if ($_POST["on_off"] == 1) {
		$on_or_off->on();
		$on_off = $on_or_off->wfr;
		$_SESSION["on_off"] = $on_off;
	} else {
		$on_or_off->off();
		$on_off = $on_or_off->wfr;
		$_SESSION["on_off"] = $on_off;
	}
} else {
	if (isset($_SESSION["on_off"])) {
	$on_off = $_SESSION["on_off"];
	}
}
/*保留
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$on_off = $_SESSION["ONOFF"];                           
        //$on_off = $_POST["on_off"];                                   
} 
else {                                                              
   echo "フォームからアクセスして";                                   
   exit(1);                                                           
}
*/
?>

<!DOCTYPE html>

<html lang="ja">
  <head>
        <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
        <meta http-equiv="Content-Style-Type" content="text/css">
        <meta http-equiv="Content-Script-Type" content="text/javascript">
        <title>SIZKANIC 管理者用ページ</title>
        <link rel="stylesheet" href="admin_screen_1.css" type="text/css">
  </head>
  <body>
	<form action="admin_screen_change.php" method="post">
        <div id="d1">
          <h1>管理者画面</h1>
          <h2>システムのON/OFF設定</h2>
        </div>
        <div id="d2">
	         <h2>ただいまシステムは
	<?php
	if ((isset($_SESSION["on_off"])) and (!isset($_POST["on_off"]))) {
		$on_off = $_SESSION["on_off"];
		if ($on_off == 0) echo "停止しています";
		if ($on_off == 1) echo "稼働しています";
	}
	if (isset($_POST["on_off"])) {
		if ($on_off == 0) echo "停止しています";
		if ($on_off == 1) echo "稼働しています";
		$_SESSION["on_off"]=$on_off;
	}
	?>
	</h2>                                    
          <p>                                                            
                <input type="radio" name="on_off" value="0" checked />OFFにする                                                                   
                <input type="radio" name="on_off" value="1" checked />ON にする<br />                                                             
                <input type="submit" value="送信" />                     
          </p>                                                           
        </div>
	</form>
	<form id="wc" name="wc" action="admin_screen_1.php" method="post">
	<div align="center">
	<h2><a href="admin_screen_1.php">管理者TOP画面へ</a><h2>
	</form>
        <h2><a href="logout.php">ログアウト</a></h2>
        </div>                                                                              	
</body>
</html>

