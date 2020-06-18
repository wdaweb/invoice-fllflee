<?php
$year=$_POST["year"];
$month=$_POST["month"];
$month2=$month+1;
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

  $sql1="select count(1) from receipt where eng = '".$eng1."' AND number = '".$num1."'";
  //echo $sql1;
  //echo "<br>";
  $result=$db->prepare($sql1);
  $result->execute();
  $rowCount=$result->fetchColumn();

    if ($rowCount>0){
      echo "發票重複,請修改.";
      echo "<br>";
    }
    else {
      $sql2="insert into receipt (year,month,day,eng,number,money,note) ";
      $sql2.="values('$year','$month','$day','$eng1','$num1','$money1','$note1')";
      $db->exec($sql2);
      echo "資料新增完成.";
      echo "<br>";
    }
    $db=null; //結束與資料庫連線 
}

?>