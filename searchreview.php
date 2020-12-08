<?php
include "./dbconnection.php";
$foodname=$_GET['temp'];


$sql = "SELECT * FROM food_list WHERE food_name='$foodname'";   
$result = mysqli_query($conn,$sql);
$row = mysqli_fetch_array($result);
$food_img=$row['image'];
$food_des=$row['description'];

$sql = "SELECT * FROM food_review WHERE food_name='$foodname'";   
$result = mysqli_query($conn,$sql);

$n=0;
  
while($row[$n] = mysqli_fetch_array($result)){
  $nickname[$n]=$row[$n]['nickname'];
  $review[$n]=$row[$n]['review'];
  $star[$n]=$row[$n]['stars'];
  $n++;
}

?>
<script src="//code.jquery.com/jquery-3.3.1.min.js"></script>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title> MUMUK </title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">

  </head>
  <style>
    
    @font-face {
        font-family: "BinggraeSamanco";
        src: url('BinggraeSamanco.otf');
        format('opentype');
    }
    .Review_content {
      height: fit-content;
      margin: 10px 0 10px 0;
      padding: 10px 10px 10px 10px;
      border-radius: 15px;
      background-color: linen;
      display: grid;
      grid-template-rows: 1fr auto;
    }
    .Review_head {
      width: 100%;
      display: grid;
    }
    .Reviewer {
      margin: auto 0 auto 0;
      padding: 1px 1px 1px 1px;
      font-weight: bold;
      font-family: 'BinggraeSamanco';
      display:flex;
      justify-content:space-between;
    }
    .Review {
      height: inherit;
      margin: 10px 0 10px 0;
      padding: 1px 1px 1px 1px;
      line-height: 1.5;
      overflow: auto;
      word-wrap: break-word;
      font-family: 'BinggraeSamanco';
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
  </style>

  <body style="margin:auto;">
    <div id="search">
    <div style=" text-align: center;justify-content: center;display: flex;border-bottom:2px solid #DCDCDC;">
        <img src="./mumuklogo.png" style="width: 200px;height: 150px; font-family:'BinggraeSamanco'" id='homepage'>
        <input style="margin-top:30px;height:50px" class="search" type="text" placeholder="Search"
            onkeypress="if( event.keyCode == 13 ){searchFood();}">
    </div>
    </div>
    <div id="Main" style="width: 800; display: grid; grid-template-rows: 300px auto auto; margin: auto">
      <div id= "food_content" style = "display: grid; grid-template-columns: 1fr 3fr;margin: auto; ">
        <div style="margin:auto 1 auto 1;">
          <img id = "food_img" src="<?=$food_img?>" style="width: 100%; border-radius: 10px;"></img> 
        </div>
        <div style="display: grid; grid-template-rows: 1fr 3fr ;margin-left: 20px;">
          <div id = "food_name" style="font-family: 'BinggraeSamanco'; font-size: 50px;"><?=$foodname?></div>
          <div id = "food_desc" style=" font-family: 'BinggraeSamanco';font-size : 20px;width:100%; overflow: auto;word-wrap: break-word; margin-top: 20px; line-height: 1.6;">
            <?=$food_des?>
          </div>
        </div>
      </div>
      <div id="Review_Title" style="font-family: 'BinggraeSamanco';margin-top: auto; font-size: xx-large; border-bottom: 2px solid gray; padding-bottom: 5px;">
        평가
      </div>
      <button id="Add_Review" style="margin: 10px 0 auto auto;font-family:'BinggraeSamanco'; border-radius: 5px; border: none; background-color:#FCA973;font-size:25px">
        리뷰추가
      </button>
      <div id="Review_List">
        <?php
        for($i=0;$i<$n;$i++){
        echo '<div class = "Review_content">';
        echo '<div class = "Review_head">';
        echo  '<div class= "Reviewer">';
        echo '<div>';
        echo $nickname[$i];
        echo '</div>';
        echo '<div>';
        echo ' ';
        echo '</div>';
        echo '<div>';
         for($t=0;$t<$star[$i];$t++){
         echo ❤️;
         }
        echo '</div>';
        echo '</div>';
        echo '</div>';
        echo '<div class= "Review">';
        echo    $review[$i];;
        echo '</div>';
        echo '</div>';
        }
        ?>
      </div>
    </div>
  </body>
</html>
<script>

function searchFood() {
        window.location = "./searchfood.php?temp=" + $(".search").val();

    }
    
    $(document).ready(function () {
        
        var urlParams = new URLSearchParams(window.location.search);
        

        $('.search').val(urlParams.get('temp'));
    });
    
    $("#homepage").click(function () {
        window.location = "./index.php";
    });
    $("#Add_Review").click(function(){
        
      window.location = "./addreview.php?temp=" + $(".search").val();

    });
</script>
