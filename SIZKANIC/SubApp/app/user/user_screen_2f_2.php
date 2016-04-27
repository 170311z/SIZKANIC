<!--
	図書館二階②の騒音状況を確認する。
	騒音情報は、DBから5分おきに出された平均値を12個使用しグラフ化する。
	同値を使用し、騒音情報を指標としてあらわす画像を表示する。
-->
<!DOCTYPE html>

<html lang="ja">
  <head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
	<meta http-equiv="Content-Style-Type" content="text/css">
	<meta http-equiv="Content-Script-Type" content="text/javascript">
	<title>SIZKANIC</title>
	<link rel="stylesheet" href="user_screen.css" type="text/css">
	<script type="text/javascript" src="index_image.js"></script>
  </head>
  <body>
	<div id="header">
	  <h1><a href="user_screen_initial.html">SIZKANIC</a></h1>
	</div>
	<div id="navigation">
	  <ul id="dropmenu">
	    <li><a href="user_screen_initial.html">ホーム</a>
	       <li><a>エリア選択</a>
		<ul>
		       <li><a href="./user_screen_1f.php">1Fメディア学習室</a>
		       <li><a href="./user_screen_2f_1.php">2F学習スペース①</a>
	          　<li><a href="./user_screen_2f_2.php">2F学習スペース②</a>
		</ul>
	      <li><a>リンク</a>
		<ul>
		       <li><a href="http://www.kochi-tech.ac.jp/library/.html">高知工科大学</br>付属図書館</a>
		</ul>
	</ul>
	</div>

	<div id="contents">
	<h2 class="top_t">■2F学習スペース②の騒音レベル</h2>	
	<?php
	 $_GET['area']='2b';
 	 include("./user_graph.html");
	?>
	
	<h2 class="top_t">■比較騒音レベル</h2>	
	ただ今の騒音レベルは
	<script type="text/javascript">
	showImage();
	</script>
	</div>

	<div id="navigation">
	<h4>Divea株式会社</h4>
	</div>
	
	<div id="tale">
	</div>
  </body>
</html>
