<html>
<head>
<meta http-equiv="Content-Style-Type" content="text/css">    
<title>ただのMySQL表示スクリプト</title>
<link rel="stylesheet" href="admin_screen_1.css" type="text/css">
</head>
<body>
<?php 
	//接続に必要な情報を羅列してみた
	$server = "localhost";
	$dbname = "test_db";
	$user = "dbuser";
	$pass = "password";
	
	//表示用とDBの文字コードを設定
	$enc_disp = "EUC-JP";
	$enc_db = "EUC-JP";
	
	//データの文字コードを変換する用の関数
	function cnv_enc($string, $to, $from) {
		$det_enc = mb_detect_encoding($string, $from . "," . $to);
		if ($det_enc and $det_enc != $to) {
			return mb_convert_encoding($string, $to, $det_enc);
		}
		else {
			return $string;
		}
	}
	
	//データベースに接続スクリプト
	$conn = mysql_connect($sv, $user, $pass) or die("コネクション取得時のエラー");
	mysql_select_db($dbname) or die("データベース接続エラー");
	
	//データの取り出し
	$sql = "select * from log order by id";
	$res = mysql_query($sql, $conn);
?>
<table border="1" align="center">
	<tr>
		<td>ID</td>
		<td>日付</td>
		<td>時刻</td>
		<td>エリアID</td>
		<td>ラズパイID</td>
		<td>db値</td>
	</tr>
<?php 
	while($row = mysql_fetch_array($res, MYSQL_ASSOC)) {
		echo "<tr>";
		echo "<td>" . $row["id"] . "</td>";
		echo "<td>" . cnv_enc($row["day"], $enc_disp, $enc_db)."</td>";
		echo "<td>" . cnv_enc($row["time"], $enc_disp, $enc_db)."</td>";
		echo "<td>" . $row["area"] ."</td>";
		echo "<td>" . $row["rp"] ."</td>";
		echo "<td>" . $row["db"] ."</td>";
		echo "</tr>";
	}
?>
</table>
<?php 
mysql_close($conn);
?>
</body>
</html>