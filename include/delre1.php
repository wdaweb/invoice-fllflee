<?php
if(isset($_GET["sn"]))//是否存在這個參數   
{   
  $sn1=$_GET["sn"];//存在   
  include "conn2.php";//引入資料庫 
  
  $sql1 = "DELETE FROM receipt WHERE sn=".$sn1;
  //刪除sn為sn1的這筆資料
  $db->exec($sql1);
  echo "資料刪除完成.";
  echo "<br>";

  $db=null; //結束與資料庫連線 
}
?>