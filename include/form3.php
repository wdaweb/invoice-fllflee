<?php include "query1.php";?>
<?php include "query2.php";?>


    <form action="?tmp=5" method="post">
		<table>
			<tr>
				<td>年月份</td>
                <td><input class="input1" type="text" name="year" maxlength="4" oninput = "value=value.replace(/[^\d]/g,'')"> 年 
                <select name="month" >
                    <option value="1">1,2</option>
                    <option value="3">3,4</option>
                    <option value="5">5,6</option>
                    <option value="7">7,8</option>
                    <option value="9">9,10</option>
                    <option value="11">11,12</option>
                </select>月</td>
			</tr>
			<tr>
  			<td rowspan="2"><?php award1("name","1");?></td>
  			<td><input type="text" name="sp1" maxlength="8" oninput = "value=value.replace(/[^\d]/g,'')"></td>
			</tr>
			<tr>
  			<td>同期統一發票收執聯8位數號碼與特別獎號碼相同者獎金<?php award1("money","1");?>元</td>
			</tr>
			<tr>
  			<td rowspan="2"><?php award1("name","2");?></td>
  			<td><input type="text" name="gp1" maxlength="8" oninput = "value=value.replace(/[^\d]/g,'')"></td>
			</tr>
			<tr>
			<td>同期統一發票收執聯8位數號碼與特獎號碼相同者獎金<?php award1("money","2");?>元</td>
			</tr>
			<tr>
  			<td rowspan="4"><?php award1("name","3");?></td>
  			<td><input type="text" name="fp1" maxlength="8" oninput = "value=value.replace(/[^\d]/g,'')"></td>
			</tr>
			<tr>
  			<td><input type="text" name="fp2" maxlength="8" oninput = "value=value.replace(/[^\d]/g,'')"></td>
			</tr>
			<tr>
  			<td><input type="text" name="fp3" maxlength="8" oninput = "value=value.replace(/[^\d]/g,'')"></td>
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
				<td><input type="text" name="6p1" maxlength="3" oninput = "value=value.replace(/[^\d]/g,'')">
				<input type="text" name="6p2" maxlength="3" oninput = "value=value.replace(/[^\d]/g,'')">
				<input type="text" name="6p3" maxlength="3" oninput = "value=value.replace(/[^\d]/g,'')"></td>
			</tr>	
			<tr ><td colspan="2" >
			<input type="submit" value="送出表單">
</tr>			
        </table>

    </form>
