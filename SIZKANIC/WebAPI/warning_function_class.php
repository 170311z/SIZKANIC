<?php
class WF{
	var $wfr;
	public function on() {
		$this->wfr = 1;
		//echo "wfrを1にしました";
		$link = mysql_connect('localhost', 'root', 'password');
		$db_selected = mysql_selectdb('sw', $link);
		mysql_set_charset('utf8');
		$sql = sprintf("UPDATE warning SET wfr = 1");
		$result_flag = mysql_query($sql);
	}
	public function off() {
		$this->wfr = 0;
		//echo "wfrを0にしました";
		$link = mysql_connect('localhost', 'root', 'password');
		$db_selected = mysql_selectdb('sw', $link);
		mysql_set_charset('utf8');
		$sql = sprintf("UPDATE warning SET wfr = 0");
		$result_flag = mysql_query($sql);
	}
}

class SC{
	var $count = 0;
	public function plus() {
		$this->count += 1;
	}
}

//$a = new WF;
//$b = new SC;
?>
