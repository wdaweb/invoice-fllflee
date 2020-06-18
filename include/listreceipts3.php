<?php
include "conn2.php";//引入資料庫

$sql1="select count(*) as total from receipt";//查詢總筆數
$result=$db->prepare($sql1);
$result->execute();
$total=$result->fetchColumn();
$num=12;//每頁顯示條數 
$totalpage=ceil($total/$num);//計算頁數 
$totlep=0;//預設本頁中獎金額0

if(!isset($_GET['mode']))
{
	$mode=1;
}
else
{
	$mode=$_GET['mode'];
}

if(isset($_GET['page']) && $_GET['page']<=$totalpage){
	//這裡做了一個判斷，若get到資料並且該資料小於總頁數情況下才付給當前頁引數，//否則跳轉到第一頁 
	$thispage=$_GET['page']; 
}else{ 
	$thispage=1; 
} 
//通過計算來確定從第幾條資料開始取出，當前頁數減去1後再乘以每頁顯示資料條數 


$sql='select * from receipt ORDER BY year DESC, month DESC, day DESC, eng limit '.($thispage-1)*$num.','.$num; 
//排序
$result=$db->query($sql);
$data=$result->fetchAll(PDO::FETCH_ASSOC);
?>


<table>
					<tr>
						<td>年</td>
						<td>月</td>
						<td>日</td>
						<td>英文</td>
						<td>號碼</td>
						<td>金額</td>
						<td>獎金</td>
						<td>修改</td>
						<td>刪除</td>
					</tr>				
					<?php
						foreach($data as $k=>$v){

							//echo $data->month;
					?>
					<?php
							$prize="尚未輸入獎號";
							$awardtmp=0;
							$monthf=$v['month'];
						if($v['month']%2==0){
							$monthf=$v['month']-1;
						}


						$sql1="select COUNT(*) from lottery where year = '".$v['year']."' AND month1 = '".$monthf."'";
						$result=$db->prepare($sql1);
						$result->execute();
						$rowCount=$result->fetchColumn();
						if($rowCount>0){$awardtmp=0;$prize="機會在下一張";}
						/*
						echo $v['year'];
						echo $v['month'];
						echo ":";
						echo $rs;
						echo "-";
						//echo $rs[1];
						echo "--";
						*/
						$sql="Select specialprize from lottery where year = ".$v['year']." AND  month1 = ".$monthf ;
						//$sql1="Select specialprize from lottery where year = ".$v['year']." AND  month1 = 3" ;
						$result=$db->prepare($sql);
						$result->execute();
						$rs=$result->fetchColumn();
						if($rs==$v['number']){$awardtmp=1;$prize="特別獎一千萬";$totlep+=10000000;}//如果中獎標記起來,金額加總
						$sql="Select grandprize from lottery where year = ".$v['year']." AND  month1 = ".$monthf ;
						$result=$db->prepare($sql);
						$result->execute();
						$rs=$result->fetchColumn();
						if($rs==$v['number']){$awardtmp=1;$prize="特獎兩百萬";$totlep+=2000000;}
						$sql="Select firstprize1 from lottery where year = ".$v['year']." AND  month1 = ".$monthf ;
						$result=$db->prepare($sql);
						$result->execute();
						$rs=$result->fetchColumn();
						if($rs==$v['number']){$awardtmp=1;$prize="頭獎二十萬";$totlep+=200000;}	
						$sql="Select firstprize2 from lottery where year = ".$v['year']." AND  month1 = ".$monthf ;
						$result=$db->prepare($sql);
						$result->execute();
						$rs=$result->fetchColumn();
						if($rs==$v['number']){$awardtmp=1;$prize="頭獎二十萬";$totlep+=200000;}		
						$sql="Select firstprize3 from lottery where year = ".$v['year']." AND  month1 = ".$monthf ;
						$result=$db->prepare($sql);
						$result->execute();
						$rs=$result->fetchColumn();
						if($rs==$v['number']){$awardtmp=1;$prize="頭獎二十萬";$totlep+=200000;}		
						//echo $rs['specialprize'];
						//用substring()來判斷是否符合獎項
						$sql="Select SUBSTRING(firstprize1,-7) from lottery where year = ".$v['year']." AND  month1 = ".$monthf ;				
						$result=$db->prepare($sql);
						$result->execute();
						$rs=$result->fetchColumn();
						if($rs==substr($v['number'],-7)){$awardtmp=1;$prize="二獎四萬";$totlep+=40000;}	
						$sql="Select SUBSTRING(firstprize2,-7) from lottery where year = ".$v['year']." AND  month1 = ".$monthf ;
						$result=$db->prepare($sql);
						$result->execute();
						$rs=$result->fetchColumn();
						if($rs==substr($v['number'],-7)){$awardtmp=1;$prize="二獎四萬";$totlep+=40000;}		
						$sql="Select SUBSTRING(firstprize3,-7) from lottery where year = ".$v['year']." AND  month1 = ".$monthf ;
						$result=$db->prepare($sql);
						$result->execute();
						$rs=$result->fetchColumn();
						if($rs==substr($v['number'],-7)){$awardtmp=1;$prize="二獎四萬";$totlep+=40000;}		
						$sql="Select SUBSTRING(firstprize1,-6) from lottery where year = ".$v['year']." AND  month1 = ".$monthf ;
						$result=$db->prepare($sql);
						$result->execute();
						$rs=$result->fetchColumn();
						if($rs==substr($v['number'],-6)){$awardtmp=1;$prize="三獎一萬";$totlep+=10000;}	
						$sql="Select SUBSTRING(firstprize2,-6) from lottery where year = ".$v['year']." AND  month1 = ".$monthf ;
						$result=$db->prepare($sql);
						$result->execute();
						$rs=$result->fetchColumn();
						if($rs==substr($v['number'],-6)){$awardtmp=1;$prize="三獎一萬";$totlep+=10000;}		
						$sql="Select SUBSTRING(firstprize3,-6) from lottery where year = ".$v['year']." AND  month1 = ".$monthf ;
						$result=$db->prepare($sql);
						$result->execute();
						$rs=$result->fetchColumn();
						if($rs==substr($v['number'],-6)){$awardtmp=1;$prize="三獎一萬";$totlep+=10000;}		
						$sql="Select SUBSTRING(firstprize1,-5) from lottery where year = ".$v['year']." AND  month1 = ".$monthf ;
						$result=$db->prepare($sql);
						$result->execute();
						$rs=$result->fetchColumn();
						if($rs==substr($v['number'],-5)){$awardtmp=1;$prize="四獎四千";$totlep+=4000;}	
						$sql="Select SUBSTRING(firstprize2,-5) from lottery where year = ".$v['year']." AND  month1 = ".$monthf ;
						$result=$db->prepare($sql);
						$result->execute();
						$rs=$result->fetchColumn();
						if($rs==substr($v['number'],-5)){$awardtmp=1;$prize="四獎四千";$totlep+=4000;}		
						$sql="Select SUBSTRING(firstprize3,-5) from lottery where year = ".$v['year']." AND  month1 = ".$monthf ;
						$result=$db->prepare($sql);
						$result->execute();
						$rs=$result->fetchColumn();
						if($rs==substr($v['number'],-5)){$awardtmp=1;$prize="四獎四千";$totlep+=4000;}		
						$sql="Select SUBSTRING(firstprize1,-4) from lottery where year = ".$v['year']." AND  month1 = ".$monthf ;
						$result=$db->prepare($sql);
						$result->execute();
						$rs=$result->fetchColumn();
						if($rs==substr($v['number'],-4)){$awardtmp=1;$prize="五獎一千";$totlep+=1000;}	
						$sql="Select SUBSTRING(firstprize2,-4) from lottery where year = ".$v['year']." AND  month1 = ".$monthf ;
						$result=$db->prepare($sql);
						$result->execute();
						$rs=$result->fetchColumn();
						if($rs==substr($v['number'],-4)){$awardtmp=1;$prize="五獎一千";$totlep+=1000;}		
						$sql="Select SUBSTRING(firstprize3,-4) from lottery where year = ".$v['year']." AND  month1 = ".$monthf ;
						$result=$db->prepare($sql);
						$result->execute();
						$rs=$result->fetchColumn();
						if($rs==substr($v['number'],-4)){$awardtmp=1;$prize="五獎一千";$totlep+=1000;}		
						$sql="Select SUBSTRING(firstprize1,-3) from lottery where year = ".$v['year']." AND  month1 = ".$monthf ;
						$result=$db->prepare($sql);
						$result->execute();
						$rs=$result->fetchColumn();
						if($rs==substr($v['number'],-3)){$awardtmp=1;$prize="六獎兩百";$totlep+=200;}	
						$sql="Select SUBSTRING(firstprize2,-3) from lottery where year = ".$v['year']." AND  month1 = ".$monthf ;
						$result=$db->prepare($sql);
						$result->execute();
						$rs=$result->fetchColumn();
						if($rs==substr($v['number'],-3)){$awardtmp=1;$prize="六獎兩百";$totlep+=200;}		
						$sql="Select SUBSTRING(firstprize3,-3) from lottery where year = ".$v['year']." AND  month1 = ".$monthf ;
						$result=$db->prepare($sql);
						$result->execute();
						$rs=$result->fetchColumn();
						if($rs==substr($v['number'],-3)){$awardtmp=1;$prize="六獎兩百";$totlep+=200;}
						$sql="Select sixthprize1 from lottery where year = ".$v['year']." AND  month1 = ".$monthf ;
						$result=$db->prepare($sql);
						$result->execute();
						$rs=$result->fetchColumn();
						if($rs==$v['number']){$awardtmp=1;$prize="增開六獎兩百";$totlep+=200;}
						$sql="Select sixthprize2 from lottery where year = ".$v['year']." AND  month1 = ".$monthf ;
						$result=$db->prepare($sql);
						$result->execute();
						$rs=$result->fetchColumn();
						if($rs==$v['number']){$awardtmp=1;$prize="增開六獎兩百";$totlep+=200;}
						$sql="Select sixthprize3 from lottery where year = ".$v['year']." AND  month1 = ".$monthf ;
						$result=$db->prepare($sql);
						$result->execute();
						$rs=$result->fetchColumn();
						if($rs==$v['number']){$awardtmp=1;$prize="增開六獎兩百";$totlep+=200;}

						if($awardtmp==1 && $mode==2) //有中獎上色,沒中獎一般
						{
							include "./include/listtable.php";
						}
						elseif($awardtmp==1 && $mode==1)
						{
							echo "<tr class='award1'>";
							include "./include/listtable.php";
						}elseif($awardtmp==0 && $mode==1)
						{
							echo "<tr>";
							include "./include/listtable.php";
						}

						echo '<td><a href="?tmp=7&sn='.$v['sn'].'">修改</a></td> ';
						echo '<td><a href="?tmp=8&sn='.$v['sn'].'">刪除</a></td> ';
					?>
				
					</tr>

					<?php	} //end foreach ?> 
				
					<tr>
						<td>
							本頁中獎金額:
						</td>
						<td>
							<?php	echo $totlep;?>
						</td>
					</tr>
		<?php	
		$db=null; //結束與資料庫連線 
		?>
	<?php	//echo '<a href="?tmp=2&mode=1">模式一</a> ';  ?>
	<?php	//echo '<a href="?tmp=2&mode=2">模式二</a> ';  ?>
</table>

<?php
//$totalpage計算頁數 
echo "<BR>";//顯示分頁數字列表 
echo '<div class="link22">';
for($i=1;$i<=$totalpage;$i++){ 
	echo '<a href="?tmp=2&mode='.$mode.'&page='.$i.'">'.$i.'</a> ';  
}
echo '</div>';
?>


