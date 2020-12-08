<meta charset="utf-8">
<script src="//code.jquery.com/jquery-3.3.1.min.js"></script>
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

    .keywordbox {
        font-family: "BinggraeSamanco";

        margin-left: 20px;
    }
    .line{
        margin-left:10px;
        border-right: 3px solid lightgray;
    }
    .keywordbox:hover{
        cursor: pointer;
    }
</style>

<title> MUMUK </title>
<div>

    <div style=" text-align: center;">
        <img src="./mumuklogo.png" style="width: 400px;height: 300px;">
    </div>
    <div style=" text-align: center;">
        <div
            style="color: #666;font-weight: bold; font-size: 25px;font-family: 'BinggraeSamanco', sans-serif;display:flex;justify-content:center">
            랜덤 키워드:
            <div class='keywordbox' onclick="clickKeyword(this);">매운</div>
            <div class='line'></div>
            <div class='keywordbox' onclick="clickKeyword(this);">국물</div>
            
            <div class='line'></div>
            <div class='keywordbox' onclick="clickKeyword(this);">면</div>
            
            <div class='line'></div>
            <div class='keywordbox' onclick="clickKeyword(this);">바삭한</div>
            <div class='line'></div>
            <div class='keywordbox' onclick="clickKeyword(this);">맥주</div>
            <div class='line'></div>
            <div class='keywordbox' onclick="clickKeyword(this);">소주</div>
            <div class='line'></div>
            <div class='keywordbox' onclick="clickKeyword(this);">얼큰한</div>
        </div>
    </div>
    <div style=" text-align: center;margin-top: 50px;">
        <input class="search" type="text" placeholder="ex) 맥주에 어울리는 음식, 얼큰한 국물" onkeypress="if( event.keyCode == 13 ){searchFood();}">
        
    </div>
    <div style=" text-align: center;margin-top: 50px;">
        <img src="./wordc.png" style="width: 400px;height: 400px;">
    </div>
</div>
<script>
    function searchFood() {
        window.location = "searchfood.php?temp=" + $(".search").val();
    }

    function clickKeyword(val) {
        var save = $('.search').val();
        $('.search').val(save + ' ' + val.innerHTML + '');
    }
</script>