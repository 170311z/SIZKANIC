<?php

class Count {
	public function plus()
	{

		$link = mysql_connect('localhost', 'root', 'password');

		$db_selected = mysql_selectdb('sw', $link);

		mysql_set_charset('utf8');

		$sql = sprintf("UPDATE count SET num = num + 1");

		$result_flag = mysql_query($sql);
	}


	public function initialization()
	{
		$link = mysql_connect('localhost', 'root', 'password');
		if(!$link){
			die('接続失敗です．' .mysql_error());
		}

		$db_selected = mysql_selectdb('sw', $link);
		if(!$db_selected){
			die('データベース選択失敗です．' .mysql_error());
		}

		mysql_set_charset('utf8');

		$sql = sprintf("UPDATE count SET num = 0");

		$result_flag = mysql_query($sql);

		if (!$result_flag){
			die('UPDATEクエリーが失敗しました．' .mysql_error());
		}
	}

	
}
?>
