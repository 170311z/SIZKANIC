<?php
if(isset($_GET['dev_id'])){
$dev_id = $_GET['dev_id'];
//print("$dev_id\n");
}
if(isset($_GET['level'])){
$level = $_GET['level'];
//print("$level\n");
}
if(isset($_GET['area_id'])){
$area_id = $_GET['area_id'];
//print("$area_id\n");
}
if(isset($_GET['day'])){
$day = $_GET['day'];
//print("$day\n");
}
if(isset($_GET['time'])){
$time = $_GET['time'];
//print("$time\n");
}



define('DB_DATABASE', 'sw');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', 'password');
define('PDO_DSN', 'mysql:dbhost=localhost;dbname=' . DB_DATABASE);


//カウントする値の更新および抽出
require 'count.php';
require 'warning_function_class.php';
//$on_or_off = new WF();
$count_num = new Count();

//$on_off = $on_or_off->wfr;

//connect
$link = mysql_connect('localhost', 'root', 'password');
if(!$link){
	die('接続失敗です．' .mysql_error());
}

//print('接続に成功しました．');

$db_selected = mysql_select_db('sw', $link);
if(!$db_selected){
	die('データベース選択失敗です．' .mysql_error());
}

//print('swデータベースを選択しました．');
mysql_set_charset('utf8');
$result = mysql_query('SELECT num FROM count');
if(!$result){
	die('クエリーが失敗しました．'.mysql_error());
}

$on_off2 = mysql_query('SELECT wfr FROM warning');
while($row = mysql_fetch_assoc($on_off2)) {
	$on_off = $row['wfr'];
}
//$on_off = $on_off + 1;

while($row = mysql_fetch_assoc($result)) {
	$num = $row['num'];
	$num = (int) $num;
	if($num !== 4){
		$array[$num] = $level;
		$count_num->plus();
		print $num;
	} else {
		$count_num->initialization();
		$result2 = mysql_query('SELECT level FROM 5min_create ');
		if(!$result2) {
			die('クエリーが失敗しました．' .mysql_error());
		}
		$count = 0;
		while($row = mysql_fetch_assoc($result2)){
			$array[$count] = $row['level'];
			$count++;
		} 
		$total = array_sum($array);
		$average = round($total / 5);
		$result3 = mysql_query('DELETE FROM 5min_create');
		$close_flag = mysql_close($link);
		try{
			//connect
			$db = new PDO(PDO_DSN, DB_USERNAME, DB_PASSWORD);
			$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$stmt = $db->prepare("insert into 5min_sound_info (day, time, level, area_id) values(?,?,?,?)");
			$stmt->execute([$day, $time, $average, $area_id]);
			echo "inserted:" .$db->lastInsertId();
		} catch (PDOException $e){
			echo $e->getMessage();
			exit;
		}
	}

}


try {
	// connect
	$db = new PDO(PDO_DSN, DB_USERNAME, DB_PASSWORD);
	$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	//insert prepare(): 結果を返す，安全対策が必要，複数回実行されるSQL

	$stmt = $db->prepare("insert into 1min_sound_info (dev_id, day, time, level, area_id) values (?, ?, ?, ?, ?)");
	$stmt->execute([$dev_id, $day, $time, $level, $area_id]);
	echo "inserted: " . $db->lastInsertId();
	$stmt = $db->prepare("insert into 5min_create (dev_id, level) values (?, ?)");
	$stmt->execute([$dev_id, $level]);
	echo "inserted: " . $db->lastInsertId();

} catch (PDOException $e) {
	echo $e->getMessage();
	exit;
}

if($level > 5 && $on_off != 0){
#データを準備します．
$arr = array('a' => 'go');
echo json_encode($arr[a]);
echo $level;
echo $on_off;
//print($on_off['wfr']);
} else {
$arr = array('a' => 'no_go');
echo json_encode($arr[a]);
echo $level;
echo $on_off;
//print($on_off['wfr']);
}

?>


