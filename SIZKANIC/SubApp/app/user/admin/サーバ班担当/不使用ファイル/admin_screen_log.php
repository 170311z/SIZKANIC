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
        <link rel="stylesheet" href="admin_screen_1.css" type="text/css">
  </head>                                                                
  <body>                                                                 
        <div id="d1">                                                    
          <h1>管理者画面</h1>                                            
          <h2>ログ情報の管理</h2>                                        
        </div>                                                           
        <div id="d2">                                                    
          <form action="cgi-bin/formsample.cgi" method="post">           
          <p>ログ情報を表示させたい時間帯を入力してください。</p>        
          <p>                               
	   <select name="month">
                  <option value="1">1</option>                          
                  <option value="2">2</option>                          
                  <option value="3">3</option>                          
                  <option value="4">4</option>                          
                  <option value="5">5</option>                          
                  <option value="6">6</option>                          
                  <option value="7">7</option>                          
                  <option value="8">8</option>                          
                  <option value="9">9</option>                          
                  <option value="10">10</option>                        
                  <option value="11">11</option>                        
                  <option value="12">12</option> 
	   </select>
		月
	<select name="day">
                  <option value="1">01</option>                         
                  <option value="2">02</option>                         
                  <option value="3">03</option>                         
                  <option value="4">04</option>                         
                  <option value="5">05</option>                         
                  <option value="6">06</option>                         
                  <option value="7">07</option>                         
                  <option value="8">08</option>                         
                  <option value="9">09</option>                         
                  <option value="10">10</option>                        
                  <option value="11">11</option>                        
                  <option value="12">12</option>                        
                  <option value="13">13</option>                        
                  <option value="14">14</option>                        
                  <option value="15">15</option>                        
                  <option value="16">16</option>                        
                  <option value="17">17</option>                        
                  <option value="18">18</option>                        
                  <option value="19">19</option>                        
                  <option value="20">20</option>                        
                  <option value="21">21</option>                        
                  <option value="22">22</option>                        
                  <option value="23">23</option>                        
                  <option value="24">24</option>                        
                  <option value="25">25</option>                        
                  <option value="26">26</option>                        
                  <option value="27">27</option>                        
                  <option value="28">28</option>                        
                  <option value="29">29</option>                        
                  <option value="30">30</option                         
                  <option value="31">31</option>
	   </select>
		日
                <select name="hour">                                        
                  <option value="0">0</option>                          
                  <option value="1">1</option>                          
                  <option value="2">2</option>                          
                  <option value="3">3</option>                          
                  <option value="4">4</option>                          
                  <option value="5">5</option>                          
                  <option value="6">6</option>                          
                  <option value="7">7</option>                          
                  <option value="8">8</option>                          
                  <option value="9">9</option>                          
                  <option value="10">10</option>                        
                  <option value="11">11</option>                        
                  <option value="12">12</option>                        
                  <option value="13">13</option>                        
                  <option value="14">14</option>                        
                  <option value="15">15</option>                        
                  <option value="16">16</option>                        
                  <option value="17">17</option>                        
                  <option value="18">18</option>                        
                  <option value="19">19</option>                        
                  <option value="20">20</option>                        
                  <option value="21">21</option>                        
                  <option value="22">22</option>                        
                  <option value="23">23</option>                        
                </select>                                                
                時〜
                  <select name="month">
                  <option value="1">1</option>                          
                  <option value="2">2</option>                          
                  <option value="3">3</option>                          
                  <option value="4">4</option>                          
                  <option value="5">5</option>                          
                  <option value="6">6</option>                          
                  <option value="7">7</option>                          
                  <option value="8">8</option>                          
                  <option value="9">9</option>                          
                  <option value="10">10</option>                        
                  <option value="11">11</option>                        
                  <option value="12">12</option> 
	   </select>
		月
	<select name="day">
                  <option value="1">01</option>                         
                  <option value="2">02</option>                         
                  <option value="3">03</option>                         
                  <option value="4">04</option>                         
                  <option value="5">05</option>                         
                  <option value="6">06</option>                         
                  <option value="7">07</option>                         
                  <option value="8">08</option>                         
                  <option value="9">09</option>                         
                  <option value="10">10</option>                        
                  <option value="11">11</option>                        
                  <option value="12">12</option>                        
                  <option value="13">13</option>                        
                  <option value="14">14</option>                        
                  <option value="15">15</option>                        
                  <option value="16">16</option>                        
                  <option value="17">17</option>                        
                  <option value="18">18</option>                        
                  <option value="19">19</option>                        
                  <option value="20">20</option>                        
                  <option value="21">21</option>                        
                  <option value="22">22</option>                        
                  <option value="23">23</option>                        
                  <option value="24">24</option>                        
                  <option value="25">25</option>                        
                  <option value="26">26</option>                        
                  <option value="27">27</option>                        
                  <option value="28">28</option>                        
                  <option value="29">29</option>                        
                  <option value="30">30</option                         
                  <option value="31">31</option>
	   </select>
		日
                <select name="hour">                                        
                  <option value="0">0</option>                          
                  <option value="1">1</option>                          
                  <option value="2">2</option>                          
                  <option value="3">3</option>                          
                  <option value="4">4</option>                          
                  <option value="5">5</option>                          
                  <option value="6">6</option>                          
                  <option value="7">7</option>                          
                  <option value="8">8</option>                          
                  <option value="9">9</option>                          
                  <option value="10">10</option>                        
                  <option value="11">11</option>                        
                  <option value="12">12</option>                        
                  <option value="13">13</option>                        
                  <option value="14">14</option>                        
                  <option value="15">15</option>                        
                  <option value="16">16</option>                        
                  <option value="17">17</option>                        
                  <option value="18">18</option>                        
                  <option value="19">19</option>                        
                  <option value="20">20</option>                        
                  <option value="21">21</option>                        
                  <option value="22">22</option>                        
                  <option value="23">23</option>                        
                </select>
	時                   
          </p>
          <p>ログ情報を表示させたい場所を入力してください。</p>
          <p>
                <select name="choice2">
                  <option value="s1">1Fメディア学習室</option>
                  <option value="s2">2F学習スペース①</option>
                  <option value="s3">2F学習スペース②</option>
                  <option value="s4">図書館全体</option>
                </select>
          </p>
          <p>
                <input type="submit" value="表示する">
          </p>
          </form>
        </div>
	<div align="center">
	<h2><a href="logout.php">ログアウト</a></h2>
	</div>
	</body>
</html>
