

  <form action="?tmp=6" method="post">
		<table>
			<tr>
				<td>年月份</td>
        <td><input class="input1" type="text" name="year" maxlength="4" oninput = "value=value.replace(/[^\d]/g,'')"> 年 
            <select name="month" >
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
										<option value="7">7</option>
                    <option value="8">8</option>
                    <option value="9">9</option>
                    <option value="10">10</option>
                    <option value="11">11</option>
                    <option value="12">12</option>
            </select>月
				<input class="input2" type="text" name="day"  maxlength="2" oninput = "value=value.replace(/[^\d]/g,'')"> 日 
			</tr>
			<tr>
			  <td>發票號碼:</td>
  			<td>英文<input class="input2" type="text" name="eng1"  maxlength="2" oninput = "value=value.replace(/[^A-Za-z]/g,'') " >
				號碼<input class="input4" type="text" name="nm1"  maxlength="8" oninput = "value=value.replace(/[^\d]/g,'')"></td>
			</tr>
			<tr>	
			  <td>金額:</td>
  			<td><input class="input4" type="text" name="money1" maxlength="8"  oninput = "value=value.replace(/[^\d]/g,'')"></td>
			</tr>
			<tr>
			  <td>類別:</td>
  			<td>
				  <select name="note" >
						<option value="1" selected>無</option>
						<option value="2">食</option>
            <option value="3">衣</option>
            <option value="4">住</option>
            <option value="5">行</option>
            <option value="6">育</option>
            <option value="7">樂</option>

          </select>
				</td>
			</tr>		
<tr ><td colspan="2" >
			<input type="submit" value="送出表單">
		<input type="reset" value="reset" >
</tr>
	  </table>

  </form>
