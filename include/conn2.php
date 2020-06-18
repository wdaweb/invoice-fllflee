<?php
/* 
*連線資料庫 
*/
        include('config.php'); //引入連接資料庫必要資訊
        try{   
            $dsn = "mysql:host=".$hostname.";dbname=".$db_name;
            $db=new PDO($dsn, $username, $password,
               array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
                        //PDO::MYSQL_ATTR_INIT_COMMAND 設定編碼           
            //echo '連線成功';
            $db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION); //錯誤訊息提醒
        }catch(PDOException $e){ 
            echo '資料庫連線失敗:'.$e->getMessage(); 
            exit(); 
        } 


 
?>