<?php
$dataArr = array();
include "./dbconnection.php";
$_foodname=$_POST["foodname"];



 
$sql = "SELECT * FROM food_list WHERE food_name='$_foodname'";   
$result = mysqli_query($conn,$sql);
$n=0;
while($row[$n] = mysqli_fetch_array($result)){
array_push($dataArr,$row[$n]);
$n++;
} 
echo json_encode($dataArr,JSON_UNESCAPED_UNICODE);
?>