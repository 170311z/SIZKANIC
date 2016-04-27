<?php
class WF{
	var $wfr;
	public function on() {
		$this->wfr = 1;
		//echo "wfrを1にしました";
	}
	public function off() {
		$this->wfr = 0;
		//echo "wfrを0にしました";
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
