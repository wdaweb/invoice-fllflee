<!-- 連結mysql -->
<?php
$year=$_POST["year"];
$month=$_POST["month"];
$month2=$month+1;
$sp1=$_POST["sp1"];
$gp1=$_POST["gp1"];
$fp1=$_POST["fp1"];
$fp2=$_POST["fp2"];
$fp3=$_POST["fp3"];
$sixp1=$_POST["6p1"];
$sixp2=$_POST["6p2"];
$sixp3=$_POST["6p3"];

if($year > date("Y") || ($year == date("Y") && $month > date("n")) ){
  echo "未來人喔?請確認日期.";
}else if(!$year || !$month || !$sp1 || !$gp1 || !$fp1 || !$fp2 || !$fp3 || !$sixp1 ) {
  echo "資料欠缺,請補充.";
} else if(strlen($sp1) != 8 || strlen($gp1) != 8  || strlen($fp1) != 8  || strlen($fp2) != 8  || strlen($fp3) != 8  || strlen($sixp1) != 3 ) {
  echo "獎號有誤,請確認.";
} else {


include "conn2.php";//引入資料庫
 

  $sql1="select count(1) from lottery where year = '".$year."' AND month1 = '".$month."'";
  //echo $sql1;
  //echo "<br>";
  $result=$db->prepare($sql1);
  $result->execute();
  $rowCount=$result->fetchColumn();

    if ($rowCount>0){
      echo "資料重複,請修改.";
      echo "<br>";
    }
    else {
      $sql2="insert into lottery (year,month1,specialprize,grandprize,firstprize1,firstprize2,firstprize3,sixthprize1,sixthprize2,sixthprize3) ";
      $sql2.="values('$year','$month','$sp1','$gp1','$fp1','$fp2','$fp3','$sixp1','$sixp2','$sixp3')";
      $db->exec($sql2);
      echo "資料新增完成.";
      echo "<br>";
    }
    $db=null; //結束與資料庫連線 
}

?>