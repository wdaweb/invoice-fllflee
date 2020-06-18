<!-- 連結mysql -->
<?php

function num1($year1,$mon1,$tmp1){

	include "conn2.php";//引入資料庫操作類 
        //內容

  $sql="Select * from lottery where year = ".$year1." AND  month1 = ".$mon1 ;
	$result=$db->query($sql);
	$row=$result->fetch(PDO::FETCH_OBJ);

  if($tmp1=="year"){
	  	echo $row->year; 
	  }
  	if($tmp1=="month"){
        echo $row->month1;
        echo "~";
        echo ($row->month1)+1;
    }
    if($tmp1=="sp1"){
	  	echo $row->specialprize; 
    }
    if($tmp1=="gp1"){
	  	echo $row->grandprize; 
    }
    if($tmp1=="fp1"){
	  	echo $row->firstprize1; 
    }
    if($tmp1=="fp2"){
  		echo $row->firstprize2; 
    }
    if($tmp1=="fp3"){
	  	echo $row->firstprize3; 
    }
    if($tmp1=="fpb"){
  		echo $row->firstprizebk; 
    }
    if($tmp1=="6p1"){
  		echo $row->sixthprize1; 
  	}
    if($tmp1=="6p2"){
	  	echo $row->sixthprize2; 
    }
    if($tmp1=="6p3"){
	  	echo $row->sixthprize3; 
    }
    if($tmp1=="6pb"){
  		echo $row->sixthprizebk; 
    }

   $db=null; //結束與資料庫連線 
}

?>