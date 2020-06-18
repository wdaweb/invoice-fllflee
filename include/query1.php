<!-- 連結mysql -->

<?php

function award1($id1,$id2){
	//phpinfo();
include "conn2.php";//引入資料庫操作類 
	//內容
	$sql="Select * from award where id = ".$id2;
	$result=$db->query($sql);
	$row=$result->fetch(PDO::FETCH_OBJ);

	if($id1=="name"){
		echo $row->name; 
	}
	if($id1=="money"){
		echo $row->prize; 
	}
	$db=null; //結束與資料庫連線
}
				

?>