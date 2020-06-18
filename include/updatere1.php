<!-- 連結mysql -->
<?php
$sn=$_POST["sn"];
$year=$_POST["year"];
$month=$_POST["month"];
$day=$_POST["day"];
$eng1=$_POST["eng1"];
$eng1=strtoupper($eng1);
$num1=$_POST["nm1"];
$money1=@$_POST["money1"];
$note1=@$_POST["note"];

if($year > date("Y") || ($year == date("Y") && $month > date("n")) ){
  echo "未來人喔?請確認日期.";
}else if(!$year || !$month || !$eng1 || !$num1 ) {
  echo "資料欠缺,請補充.";
} else if(!checkdate($month,$day,$year)) {
  echo "日期有誤,請確認.";
} else if(strlen($eng1) != 2 || strlen($num1) != 8 ) {
  echo "發票有誤,請確認.";
} else {
  
  include "conn2.php";//引入資料庫

    $sql = "UPDATE receipt SET year=?,month=?,day=?,eng=?,number=?,money=?,note=? WHERE sn=?";
    $result = $db->prepare($sql);
    $result->execute(array($year,$month,$day,$eng1,$num1,$money1,$note1,$sn));


    
      echo "資料更新完成.";
      echo "<br>";

    $db=null; //結束與資料庫連線 
}

?>