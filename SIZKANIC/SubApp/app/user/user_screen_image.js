/%
現在の騒音レベルによって、どの指標画像を表示させるかの判定を行う．

%/

function showImage() {
//user_graph.htmlで送信された値（現在のdb値）を受信する．
	var val = window.localStorage.getItem("result");
	if (val>90) {
		document.writeln("きわめてうるさい状態で、おおよそ『飛行機のエンジン音』相当です。");	
		document.writeln("<pre>");
		document.writeln("<img src='./gazou/90.jpg' width='500' >");
	} else if (val>70) {
		document.writeln("うるさい状態で、おおよそ『ボウリング場内』相当です。");
		document.writeln("<pre>");
		document.writeln("<img src='./gazou/70.jpg' width='500' >");
	} else if (val>50) {
		document.writeln("普通状態で、おおよそ『人の会話』相当です。");
		document.writeln("<pre>");
		document.writeln("<img src='./gazou/50.jpg' width='500' >");
	} else if (val>30) {
		document.write("静かな状態で、おおよそ『ささやき声』相当です。");
		document.writeln("<pre>");
		document.writeln("<img src='./gazou/30.jpg' width='500' >");
	} else{
		document.writeln("きわめて静かな状態で、おおよそ『木の葉の触れ合う音』相当です。");
		document.writeln("<pre>");
		document.writeln("<img src='./gazou/10.jpg' width='500'>");
	}	
	
	document.writeln("</pre>");
	document.close();
}
