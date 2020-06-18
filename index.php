<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>統一發票管理系統</title>
    <link rel="stylesheet" href="./css/main1.css">
    <link rel="stylesheet" href="./css/menu2.css">
</head>
<body>
<div class="menu">
<?php include "./include/menu2.php";//載入選單?> 
</div>

<?php 
if(is_array($_GET)&&count($_GET)>0)//先判斷是否有值   
{   
    if(isset($_GET["tmp"]))//是否存在這個參數   
    {   
        $tmp1=$_GET["tmp"];//存在   

        if($tmp1=="1")
        {    
            echo '<div class="main1">';
            include "./include/main1.php";
            echo '<div class="search1">';
            include "./include/search1.php";
            echo '</div></div>';
        }
        elseif($tmp1==2)
        {
            echo '<div class="main1">';
            include "./include/listreceipts3.php";
            echo '</div>';
        }
        elseif($tmp1==3)
        {
            echo '<div class="main1">';
            include "./include/form3.php";
            echo '</div>';
        }
        elseif($tmp1==4)
        {
            echo '<div class="main1">';
            include "./include/form4.php";
            echo '</div>';
        }
        elseif($tmp1==5)
        {
            echo '<div class="write1">';
            include "./include/write1.php";
            echo '</div>';
        }
        elseif($tmp1==6)
        {
            echo '<div class="write1">';
            include "./include/write2.php";
            echo '</div>';
        }
        elseif($tmp1==7)
        {
            echo '<div class="main1">';
            include "./include/form5.php";
            echo '</div>';
        }
        elseif($tmp1==8)
        {
            echo '<div class="main1">';
            include "./include/delre1.php";
            echo '</div>';
        }
        elseif($tmp1==9)
        {
            echo '<div class="main1">';
            include "./include/updatere1.php";
            echo '</div>';
        }
        else
        {
            echo '<div class="main1">';
            echo $tmp1;
            echo "...";
            echo "wrong1";
            echo '</div>';
        }
    } 
    else
    {
        echo '<div class="main1">';
        echo "wrong2";
        echo '</div>';
    }
}  
else
{
    echo '<div class="main1">';
    include "./include/main1.php";
    echo '<div class="search1">';
    include "./include/search1.php";
    echo '</div></div>';
}

?>




</body>
</html>