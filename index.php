<meta charset="utf-8">
<script src="//code.jquery.com/jquery-3.3.1.min.js"></script>
<style>
    
@import url(//fonts.googleapis.com/earlyaccess/hanna.css);
    .search{
        width:1000px;
        height: 50px;
        color: #666;
        border-radius: 7px;
    }
</style>
<div>
    <div style=" text-align: center;">
        <img src="./mumuk.png" style="width: 400px;height: 400px;">
    </div>
    <div style=" text-align: center;">
        <text style="color: #666;font-weight: bold; font-size: 25px;font-family: 'Hanna', sans-serif;">랜덤 키워드</text>
        <text style="color: #666;  font-family: 'Hanna', sans-serif;">&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;맵다&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;짜다&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp; 알알하다&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;시다&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp; 국물이있다&nbsp;&nbsp;&nbsp;|</text>
    </div>
    <div style=" text-align: center;margin-top: 50px;">
        <input class="search" type="text" placeholder="Search" onkeypress="if( event.keyCode == 13 ){searchFood();}">
    </div>
    <div style=" text-align: center;margin-top: 50px;">
        <img src="./wordc.png" style="width: 400px;height: 400px;">
    </div>
</div>
<script>
    function searchFood(){
        window.location = "searchfood.php?temp=" + $(".search").val();
    }
</script>