<?php
session_start();                                   
// ログイン状態のチェック                          
if (!isset($_SESSION["USERID"])) {                 
  header("Location: logout.php");                  
  exit;                                            
}
                                                                           

//DB情報
$db['host'] = "localhost";  // DBサーバのurl
$db['user'] = "root";                        
$db['pass'] = "password";                     
$db['dbname'] = "sw";                      

//エラーメッセージの初期化
$errorMessage = "";       
/*                          
if (isset($_POST["display"])) {
        if (empty($_POST["month"])) {
                $errorMessage = "月が未入力です。";
        } else if (empty($_POST["day"])) {         
                $errorMessage = "日が未入力です。";
        } else if (empty($_POST["hour"])) {        
                $errorMessage = "時間が未入力です。";
        } else if (empty($_POST["choice2"])) {       
                $errorMessage = "エリアが未入力です。";
        }                                              
}
*/                                                      
/*                                                     
        if (!empty($_POST["month"]) && !empty($_POST["day"]) && !empty($_POST["hour"]) && !empty($_POST["choice2"])) {                                    
                //mysqlへの接続                                              
                $mysqli = new mysqli($db['host'], $db['user'], $db['pass']); 
                if ($mysqli->connect_errno) {                                
                print('<p>データベースへの接続に失敗しました。</p>' . $musqli->connect_error);                                                            
                exit();                                                      
                }                                                            

                //データベースの選択
                $mysqli->select_db($db['dbname']);

                //クエリの実行
                $query = "SELECT * FROM 1min_sound_info WHERE area_id = '" . $choice2 ."'";                                                               
                $result = $mysqli->query($query);                            
                if (!$result) {                                              
                        print('クエリが失敗しました。' . $mysqli->error);    
                        $mysqli->close();                                    
                        exit();                                              
                }                                                            

                $mysqli->close();

        }
        header("Location: admin_screen_log_result.php");
        exit;                                           
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
        <div id="d1">                                                        
          <h1>管理者画面</h1>                                                
          <h2>ログ情報の管理</h2>                                            
        </div>                                                               
        <div id="d2">                                                        
          <form action="admin_screen_log_result.php" method="post">               
          <p>ログ情報を表示させたい時間帯を入力してください。</p>            
          <p>                                                                
           <select name="month">                                             
                  <option value="01">1</option>                               
                  <option value="02">2</option>                               
                  <option value="03">3</option>                               
                  <option value="04">4</option>                               
                  <option value="05">5</option>                               
                  <option value="06">6</option>                               
                  <option value="07">7</option>                               
                  <option value="08">8</option>                               
                  <option value="09">9</option>                               
                  <option value="10">10</option>                             
                  <option value="11">11</option>                             
                  <option value="12">12</option>                             
           </select>                                                         
                月                                                           
        <select name="day">                                                  
                  <option value="01">01</option>                              
                  <option value="02">02</option>                              
                  <option value="03">03</option>                              
                  <option value="04">04</option>                              
                  <option value="05">05</option>                              
                  <option value="06">06</option>                              
                  <option value="07">07</option>                              
                  <option value="08">08</option>                              
                  <option value="09">09</option>                              
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
                  <option value="00">0</option>                               
                  <option value="01">1</option>                               
                  <option value="02">2</option>                               
                  <option value="03">3</option>                               
                  <option value="04">4</option>                               
                  <option value="05">5</option>                               
                  <option value="06">6</option>                               
                  <option value="07">7</option>                               
                  <option value="08">8</option>                               
                  <option value="09">9</option>                               
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
                  <select name="month2">                                      
                  <option value="01">1</option>                               
                  <option value="02">2</option>                               
                  <option value="03">3</option>                               
                  <option value="04">4</option>                               
                  <option value="05">5</option>                               
                  <option value="06">6</option>                               
                  <option value="07">7</option>                               
                  <option value="08">8</option>                               
                  <option value="09">9</option>                               
                  <option value="10">10</option>                             
                  <option value="11">11</option>                             
                  <option value="12">12</option>                             
           </select>                                                         
                月                                                           
        <select name="day2">                                                  
                  <option value="01">01</option>                              
                  <option value="02">02</option>                              
                  <option value="03">03</option>                              
                  <option value="04">04</option>                              
                  <option value="05">05</option>                              
                  <option value="06">06</option>                              
                  <option value="07">07</option>                              
                  <option value="08">08</option>                              
                  <option value="09">09</option>                              
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
                <select name="hour2">                                         
                  <option value="00">0</option>                               
                  <option value="01">1</option>                               
                  <option value="02">2</option>                               
                  <option value="03">3</option>                               
                  <option value="04">4</option>                               
                  <option value="05">5</option>                               
                  <option value="06">6</option>                               
                  <option value="07">7</option>                               
                  <option value="08">8</option>                               
                  <option value="09">9</option>                               
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
                  <option value="1f">1Fメディア学習室</option>
                  <option value="2a">2F学習スペース①</option>
                  <option value="2b">2F学習スペース②</option>
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

