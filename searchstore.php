<?php
include "./dbconnection.php";
$foodname=$_GET['temp'];
$sql = "SELECT * FROM food_store WHERE food_name='$foodname'";   
$result = mysqli_query($conn,$sql);
$n=0;
  
while($row[$n] = mysqli_fetch_array($result)){
  $storeimg[$n]=$row[$n]['image'];
  $storename[$n]=$row[$n]['store_name'];
  $address[$n]=$row[$n]['address'];
  $phone[$n]=$row[$n]['phone'];
  $holiday[$n]=$row[$n]['holiday'];
  $link[$n]=addslashes($row[$n]['link']);   
  $n++;
}

?>
<html lang="en" dir="ltr">
<script src="//code.jquery.com/jquery-3.3.1.min.js"></script>
<head>
    <meta charset="utf-8">
    <title> MUMUK </title>
</head>
<style>

@font-face {
        font-family: "BinggraeSamanco";
        src: url('BinggraeSamanco.otf');
        format('opentype');
    }
    .search {
        width: 1000px;
        color: #666;
        border-radius: 15px;
        font-family: 'BinggraeSamanco';
        font-size:30px;

    }

    .search:focus {
        outline: none;
    }
    .Rest_Content {
        width: 95%;
        height: 200px;
        background-color: oldlace;
        margin: 20px 20px 0px 0px;
        padding: 10px 0px 10px 10px;
        display: grid;
        grid-template-columns: 5fr 5fr 1fr;
        border-radius:15px;
    }

    .Rest_img {
        height: 200px;
        width: 200px;
        border-radius:15px;
    }

    .Rest_text {
        display: grid;
        height: 100%;
        grid-template-rows: 2fr 1fr 1fr 1fr;
        margin-left: 20px;
    }

    .Rest_name {
        font-family: 'BinggraeSamanco';
        font-weight:bold;
        font-size: 25px;
    }

    .Rest_loc {
        font-family: 'BinggraeSamanco';
        margin: auto auto auto 0;
        font-size: large;
    }

    .Rest_cont {
        font-family: 'BinggraeSamanco';
        margin: auto auto auto 0;
        font-size: large;
    }

    .Rest_fdlist {
        font-family: 'BinggraeSamanco';
        margin: auto auto auto 0;
        font-size: large;
        display: flex;
    }

    .Rest_food {
        
        font-family: 'BinggraeSamanco';
        font-size: large;
        margin: auto auto auto 0px;
    }
    .more_detail {
        background-color: oldlace;
        width: 100%;
        height: 20px;
        font-family: 'BinggraeSamanco';
        font-size: medium;
        color: burlywood;
        text-align: center;
    }
</style>

<body style="margin:auto; ">
    <div id="search" style="height: 100px; background-color: white;">
    <div style=" text-align: center;justify-content: center;display: flex;border-bottom:2px solid #DCDCDC;">
        <img src="./mumuklogo.png" style="width: 200px;height: 150px;" id='homepage'>
        <input style="margin-top:30px;height:50px;font-family:'BinggraeSamanco'" class="search" type="text" placeholder="Search"
            onkeypress="if( event.keyCode == 13 ){searchFood();}">
    </div>
    <div id="Main" style="width: 1000; display: grid; grid-template-rows: 100px auto; margin: auto">
        <div id="Review_Title"
            style="font-family: 'BinggraeSamanco';margin-top: auto; width: 100%; font-size: xx-large; border-bottom: 2px solid gray; padding-bottom: 5px;">
            음식점
        </div>
        <div id="Rest_List"
            style="background-color: white; width: 100%; display: grid; grid-template-columns: 1fr 1fr; column-gap: 10px;">
            <?php
            for($i=0;$i<$n;$i++){
            echo '<div class="Rest_content">';
            echo    '<img class="Rest_img" src="'.$storeimg[$i].'"></img>';
            echo    '<div class="Rest_text">';
            echo        '<div class="Rest_name">'.$storename[$i].' </div>';
            echo       '<div class="Rest_loc"> 위치 : '.$address[$i].' </div>';
            echo       '<div class="Rest_cont"> 연락처 : '.$phone[$i].' </div>';
            echo       '<div class="Rest_food"> 휴무일 : '.$holiday[$i].' </div>';
            echo     '</div>';
            echo     '<div class="more_detail" onclick="window.open(\''.$link[$i].'\');"> 상세보기 &nbsp </div>';
            echo '</div>';
            }
            ?>
        </div>
    </div>
</body>
<script>

function searchFood() {
        window.location = "./searchfood.php?temp=" + $(".search").val();

    }
    
    $("#homepage").click(function () {
        window.location = "./index.php";
    });
</script>
</html>