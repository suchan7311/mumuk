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
    div{
      font-family: 'BinggraeSamanco';
      font-size:large;
    }
    #Add_btn{
      background-color:oldlace;
      border-color:oldlace;
      margin-top:10px;
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
    <div id="search" style="height: 100px;">
    

    <div style=" text-align: center;justify-content: center;display: flex;border-bottom:2px solid #DCDCDC;">
        <img src="./mumuklogo.png" style="width: 200px;height: 150px;" id='homepage'>
        <input style="margin-top:30px;height:50px;font-family:'BinggraeSamanco'" class="search" type="text" placeholder="Search"
            onkeypress="if( event.keyCode == 13 ){searchFood();}">
    </div>
    </div>
    <div id="Main" style="width: 800; display: grid; grid-template-rows: 100px auto; margin: auto">
      <div id="Review_Title" style="margin-top: auto; font-size: xx-large; border-bottom: 2px solid gray; padding-bottom: 5px;">
        리뷰추가
      </div>
      <div id="Add_Review">
        닉네임 : <input id- = "Reviewer" type="text" style="margin: 20px 0 0 0;font-family:'BinggraeSamanco';"></input> 비밀번호 : <input id- = "Password" type="password" style="margin: 20px 0 0 0;font-family:'BinggraeSamanco';"></input>
        <span style="color:tomato; margin-left:20px">※비밀번호는 평가삭제시 사용됩니다.</span>
        <div>
          <textarea id- = "Review"style="margin: 20px 0 0 0; width: 800px; height: 300px; overflow: hidden; word-break; break-all; font-family:'BinggraeSamanco';"></textarea>
        </div>
        <button id="Add_btn" style="font: 1em 'BinggraeSamanco';">
          등록하기
        </button>
      </div>
      
    </div>
  </body>
</html>

<script>
  $('#Add_btn').click(function(){
    alert('현재 리뷰 작성기능은 막아놓았습니다');
    
    window.location = "./index.php";
  });
  $("#homepage").click(function () {
        window.location = "./index.php";
    });
</script>