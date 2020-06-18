<!-- 連結mysql -->
<?php


if(isset($_GET["sn"]))//是否存在這個參數   
{   
    $sn1=$_GET["sn"];//存在   
	  include "conn2.php";//引入資料庫操作類 

  
		$sql1="select * from receipt where sn = ".$sn1;
		//echo $sql1;
		//echo "<br>";
		$result=$db->query($sql1);
		$row=$result->fetch(PDO::FETCH_OBJ);
	//	echo $row->number;
	$sn=$row->sn;
	$year=$row->year;
	$month=$row->month;
	$day=$row->day;
	$eng=$row->eng;
	$number=$row->number;
	$money=$row->money;
	$note=$row->note;

	$db=null; //結束與資料庫連線 
?>

<?php //echo $note;?>
  <form action="?tmp=9" method="post">
		<table>
			<tr>
				<td>年月份</td>
        <td><input class="input1" type="text" name="year" maxlength="4" value="<?php echo $year;?>" oninput = "value=value.replace(/[^\d]/g,'')"> 年 
            <select name="month">
						<?php 
							 for($i=1;$i<=12;$i++)
							 {
									if($i==$month)
									{
										echo '<option value="'.$i.'" selected >'.$i.'</option>';
									}
									else
									{
                    echo '<option value="'.$i.'">'.$i.'</option>';
									}

							 }
						?>
            </select>月
				</td>
				<td><input class="input2" type="text" name="day"  maxlength="2" value="<?php echo $day;?>" oninput = "value=value.replace(/[^\d]/g,'')"> 日 
			</tr>
			<tr>
			  <td>發票號碼:</td>
  			<td>英文<input class="input2" type="text" name="eng1"  maxlength="2" value="<?php echo $eng;?>" oninput = "value=value.replace(/[^A-Za-z]/g,'') " ></td>
				<td>號碼<input class="input4" type="text" name="nm1"  maxlength="8" value="<?php echo $number;?>" oninput = "value=value.replace(/[^\d]/g,'')"></td>
			</tr>
			<tr>	
			  <td>金額:</td>
  			<td><input class="input4" type="text" name="money1" maxlength="8" value="<?php echo $money;?>" oninput = "value=value.replace(/[^\d]/g,'')"></td>
			</tr>
			<tr>
			  <td>類別:</td>
  			<td>
				  <select name="note" >

					<?php 
							if(empty($note)){
								$note=1;
							}
					?>

						<option value="1" <?php if($note==1){echo ' selected '; } ?>>無</option>
						<option value="2" <?php if($note==2){echo ' selected '; } ?>>食</option>
						<option value="3" <?php if($note==3){echo ' selected '; } ?>>衣</option>
						<option value="4" <?php if($note==4){echo ' selected '; } ?>>住</option>
						<option value="5" <?php if($note==5){echo ' selected '; } ?>>行</option>
						<option value="6" <?php if($note==6){echo ' selected '; } ?>>育</option>
						<option value="7" <?php if($note==7){echo ' selected '; } ?>>樂</option>

          </select>
					<input class="input4" type="hidden" name="sn"  maxlength="8" value="<?php echo $sn;?>">
				</td>
		  </tr>	
	  </table>
    <input type="submit" value="送出修改">

  </form>


	<?php


$db=null; //結束與資料庫連線 
}
?>