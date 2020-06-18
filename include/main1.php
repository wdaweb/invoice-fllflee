<?php include "query1.php";?>
<?php include "query2.php";?>
<?php

$nopdata1=0;//設定代表無上一筆資料的變數
$nondata1=0;//設定代表無下一筆資料的變數
if(@$_POST["year"] && @$_POST["month"]){
	$year=$_POST["year"];
	$month=$_POST["month"];
	if($year > date("Y") || ($year == date("Y") && $month > date("n")) ){
		echo "<p>未來人喔?請確認日期.目前是最新一筆資料<br></p>";
		$year= date("Y");
		$month=date("n");
	}
} elseif(@$_GET["year"] && @$_GET["month"]){
	$year=$_GET["year"];
	$month=$_GET["month"];
	if($year > date("Y") || ($year == date("Y") && $month > date("n")) ){
		echo "<p>未來人喔?請確認日期.目前是最新一筆資料<br></p>";
		$year= date("Y");
		$month=date("n");
	}
} else {
	$year= date("Y");
	$month=date("n");
}

include "conn2.php";//引入資料庫



$sql1="select count(1) from lottery where year = '".$year."' AND month1 = '".$month."'";
$result=$db->prepare($sql1);
$result->execute();
$rowCount=$result->fetchColumn();
	
	if ($rowCount==0){
		if(($year!=date("Y")) || ($month!=date("n")))
		{
			 echo "無此筆資料,以最新一筆資料代替";
		}
		$sqly1="SELECT MAX(year+0) FROM `lottery`";
		$rs = $db->query($sqly1);
		$year = $rs->fetchColumn();

		$sqlm1="SELECT MAX(month1+0) FROM `lottery` WHERE year = (SELECT MAX(year+0) FROM `lottery`)";
		$rs = $db->query($sqlm1);
		$month = $rs->fetchColumn();
	}
// ---------------------------------------------------------------------------

$sql1="select count(1) from lottery where year = '".$year."' AND month1+0 < '".$month."'";
$result=$db->prepare($sql1);
$result->execute();
$rowCount=$result->fetchColumn();
//echo $rowCount;


if ($rowCount==0)
{
	$sql1="select count(1) from lottery where year+0 < '".$year."'";
	$result=$db->prepare($sql1);
	$result->execute();
	$rowCount=$result->fetchColumn();
	if ($rowCount>0)
	{
		$sqlm1="SELECT MAX(year+0) FROM `lottery` WHERE year+0 < '".$year."'";
		$rs = $db->query($sqlm1);
		$pyear = $rs->fetchColumn();
		$sqlm1="SELECT MAX(month1+0) FROM `lottery` WHERE year+0 = '".$pyear."'";
		$rs = $db->query($sqlm1);
		$pmonth = $rs->fetchColumn();
	}
	else 
	{
		$nopdata1=1;
		$nyear= $year;
		$nmonth= $month;
	}
}
else
{
	$pyear = $year;
	$sqlm1="SELECT MAX(month1+0) FROM `lottery` WHERE year = '".$pyear."' AND month1+0 < '".$month."'";
	$rs = $db->query($sqlm1);
	$pmonth = $rs->fetchColumn();
}

$sql1="select count(1) from lottery where year = '".$year."' AND month1+0 > '".$month."'";
$result=$db->prepare($sql1);
$result->execute();
$rowCount=$result->fetchColumn();

if ($rowCount==0)
{
	$sql1="select count(1) from lottery where year+0 > '".$year."'";
	$result=$db->prepare($sql1);
	$result->execute();
	$rowCount=$result->fetchColumn();

	if ($rowCount>0)
	{
		$sqlm1="SELECT MIN(year+0) FROM `lottery` WHERE year+0 > '".$year."'";
		$rs = $db->query($sqlm1);
		$nyear = $rs->fetchColumn();
		$sqlm1="SELECT MIN(month1+0) FROM `lottery` WHERE year+0 = '".$nyear."'";
		$rs = $db->query($sqlm1);
		$nmonth = $rs->fetchColumn();
	}
	else 
	{

		$nondata1=1;
		$nyear= $year;
		$nmonth= $month;
	}
}
else
{
	$nyear = $year;
	$sqlm1="SELECT MIN(month1+0) FROM `lottery` WHERE year = '".$nyear."' AND month1+0 > '".$month."'";
	$rs = $db->query($sqlm1);
	$nmonth = $rs->fetchColumn();
}



//--------------------------------------------------------------------------

$db=null; //結束與資料庫連線 

/*
echo "無";
echo $year;
echo "年";
echo $month;
echo "月";
echo "資料.<br>";
*/
?>

		<table>
			<tr>
				<td>年月份</td>
				<td><?php num1($year,$month,"year");?>年 <?php num1($year,$month,"month");?> 月</td>
			</tr>
			<tr>
  			<td rowspan="2"><?php award1("name","1");?></td>
  			<td><?php num1($year,$month,"sp1");?></td>
			</tr>
			<tr>
  			<td>同期統一發票收執聯8位數號碼與<?php award1("name","1");?>號碼相同者獎金<?php award1("money","1");?>元</td>
			</tr>
			<tr>
  			<td rowspan="2"><?php award1("name","2");?></td>
  			<td><?php num1($year,$month,"gp1");?></td>
			</tr>
			<tr>
			<td>同期統一發票收執聯8位數號碼與特獎號碼相同者獎金<?php award1("money","2");?>元</td>
			</tr>
			<tr>
  			<td rowspan="4"><?php award1("name","3");?></td>
  			<td><?php num1($year,$month,"fp1");?></td>
			</tr>
			<tr>
  			<td><?php num1($year,$month,"fp2");?></td>
			</tr>
			<tr>
  			<td><?php num1($year,$month,"fp3");?></td>
			</tr>
			<tr>
  			<td>同期統一發票收執聯8位數號碼與頭獎號碼相同者獎金<?php award1("money","3");?>元</td>
			</tr>
			<tr>
				<td><?php award1("name","4");?></td>
				<td>同期統一發票收執聯末7 位數號碼與頭獎中獎號碼末7 位相同者各得獎金<?php award1("money","4");?>元</td>
			</tr>
			<tr>
				<td><?php award1("name","5");?></td>
				<td>同期統一發票收執聯末6 位數號碼與頭獎中獎號碼末6 位相同者各得獎金<?php award1("money","5");?>元</td>
			</tr>
			<tr>
				<td><?php award1("name","6");?></td>
				<td>同期統一發票收執聯末5 位數號碼與頭獎中獎號碼末5 位相同者各得獎金<?php award1("money","6");?>元</td>
			</tr>
			<tr>
				<td><?php award1("name","7");?></td>
				<td>同期統一發票收執聯末4 位數號碼與頭獎中獎號碼末4 位相同者各得獎金<?php award1("money","7");?>元</td>
			</tr>
			<tr>
				<td><?php award1("name","8");?></td>
				<td>同期統一發票收執聯末3 位數號碼與頭獎中獎號碼末3 位相同者各得獎金<?php award1("money","8");?>元</td>
			</tr>	
			<tr>
				<td><?php award1("name","9");?></td>
				<td>
					<?php num1($year,$month,"6p1");?>　
					<?php num1($year,$month,"6p2");?>　
					<?php num1($year,$month,"6p3");?>			
			</td>
			</tr>				
		</table>

<div class="link22">
<?php

//$pyear="1999";
//$pmonth="5";
//$nyear="2020";
//$nmonth="1";
//echo "<BR>";//上下頁 
//echo '<div class="list1">';

if($nopdata1==0 ){	echo '<a href="?tmp=1&year='.$pyear.'&month='.$pmonth.'">上一筆</a> ';  }
if($nondata1==0 ){	echo '<a href="?tmp=1&year='.$nyear.'&month='.$nmonth.'">下一筆</a> ';   }

//echo '</div>';
?>
</div>
<?php include "word1.php";//載入格言 ?> 
