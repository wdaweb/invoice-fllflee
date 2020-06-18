<form action="./index.php" method="post">
<div>
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
								<td>
								  <input type="submit" value="送出表單">
								</td>
			</tr>				
		</table>
</div>
</form>
