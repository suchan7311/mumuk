<script src="//code.jquery.com/jquery-3.3.1.min.js"></script>
<style>
    @font-face {
        font-family: "BinggraeSamanco";
        src: url('BinggraeSamanco.otf');
        format('opentype');
    }
    #sidebox { background-color:oldlace; position:absolute;  top:210px; left:50px; padding: 30px 0 30px 0 }

    .myButton {
        margin: 5px;
        width: 90px;
        height: 25px;
        background-color: #FBCEB1;
        border-radius: 28px;
        border: 1px solid #F5F5DC;
        display: inline-block;
        cursor: pointer;
        color: #36454F;
        font-family: Arial;
        font-size: 17px;
        padding: 16px 31px;
        text-decoration: none;
        text-shadow: 0px 1px 0px #F5F5DC;
    }
    .search{
        width:1000px;
        height: 50px;
        color: #666;
        border-radius: 15px;
    }
    
    .search:focus{
        outline:none;
    }
    .myButton:hover {
        background-color: #FCA973;
    }

    .myButton:active {
        position: relative;
        top: 1px;
    }
    .menucard{
        width:100px;
        height:100px;
        border-radius:15px;
        margin:5px;
        background-color:oldlace;
    }
    .review {
        margin: 5px;
        width: 90px;
        height: 25px;
        background-color: #FFC57C;
        border-radius: 28px;
        border: 1px solid #FFE5B4;
        display: inline-block;
        cursor: pointer;
        color: #36454F;
        font-family: Arial;
        font-size: 17px;
        padding: 16px 31px;
        text-decoration: none;
        text-shadow: 0px 1px 0px #FFE5B4;
    }

    .review:hover {
        background-color: #FDA330;
    }

    .review:active {
        position: relative;
        top: 1px;
    }

    div {
        font-family: "BinggraeSamanco";
    }
</style>
<meta charset="utf-8">

<title> MUMUK </title>
<html lang="en" dir="ltr">
<body style="margin:auto;">
<div style="text-align: center;width:1630px; margin:auto;">
    <div style=" text-align: center;justify-content: center;display: flex;border-bottom:2px solid #DCDCDC;">
        <img src="./mumuklogo.png" style="width: 200px;height: 150px; font-family:'BinggraeSamanco'" id='homepage'>
        <input style="margin-top:30px;height:50px" class="search" type="text" placeholder="Search"
            onkeypress="if( event.keyCode == 13 ){searchFood();}">
    </div>
    <div
        style="text-align:center;justify-content: space-evenly;display:flex;background-color:white;padding-bottom:300px;">
        <div>
        <div style="width:300px;border-radius:15px;color:white;" id='sidebox'>
            <div style="font-size:40px;;font-family:'BinggraeSamanco'; color:black">오늘의 추천 테마</div>
            <div style='color:red;font-size:40px;font-weight:bold;margin-top:20px'>'국물'</div>
            <div style="margin-top:20px;font-size:25px;justify-content:space-evenly;">
            <div style='display:flex;justify-content:center'>
                <div class="menucard" style="background-image:url('./images/7.jpg');background-repeat: no-repeat;background-size : cover;">국밥</div>
                <div class="menucard" style="background-image:url('./images/50.jpg');background-repeat: no-repeat;background-size : cover;">마라탕</div>
                </div>
                <div style='display:flex;justify-content:center'>
                <div class="menucard" style="background-image:url('./images/56.jpg');background-repeat: no-repeat;background-size : cover;">짬뽕</div>
                <div class="menucard" style="background-image:url('./images/6.jpg');background-repeat: no-repeat;background-size : cover;">감자탕</div>
                </div>
                <div style='display:flex;justify-content:center'>
                <div class="menucard" style="background-image:url('./images/63.jpg');background-repeat: no-repeat;background-size : cover;">우동</div>
                <div class="menucard" style="background-image:url('./images/52.jpg');background-repeat: no-repeat;background-size : cover;">훠궈/샤브샤브</div>
                </div>
            </div>
        </div>
        
        </div>
        <div id='test' ></div>
    </div>
</div>
</body>
</html>
<script>
    const foodjson= reqFood();
    const userList = reqUserList(); // 함수 선언 전 변수 선언은 호이스팅에 의해 허락됨 
    

    $(document).ready(function () {
        
        var urlParams = new URLSearchParams(window.location.search);
        
        render();
        $('.search').val(urlParams.get('temp'));
    });

    function reqFood() {
        
        var urlParams = new URLSearchParams(window.location.search);

        var obj = new Object();
        obj.content = urlParams.get('temp');
        var jsonData = JSON.stringify(obj);
        
        var save;
        $.ajax({
            type: "POST",
            url: "http://15.164.105.78:8000/pybo/test/",
            async: false,
            dataType: "json",
            data: jsonData,
            success: function (response) {
                save=response;
            },
            error: function (request, error) {
                console.log(error);
                alert("머신러닝 서버가 꺼져있습니다");
            }
        });
        
        return save;
    }
    
/*     function reqUserList() {
        // ajax를 통해 데이터를 불러왔다고 
        var urlParams = new URLSearchParams(window.location.search);
        var foodname = urlParams.get('temp');

        var resultArr = [];
        $.ajax({
            type: "POST",
            url: "./dbsearchfood.php",
            async: false,
            data: {
                foodjson: foodjson
            },
            success: function (data) {
                const obj = JSON.parse(data);
                //console.log(obj);
                for (i = 0; i < obj.length; i++) {
                    resultArr.push({
                        foodname: obj[i].food_name,
                        description: obj[i].description,
                        image: obj[i].image
                    });
                }
            },
            error: function () {
                console.log('ajax error');
            }
        });

        return resultArr;
    } */
    function reqUserList() {
        
        var resultArr = [];
        for(k=0;k<foodjson[0].num;k++){
            $.ajax({
                type: "POST",
                url: "./dbsearchfood.php",
                async: false,
                data: {
                    foodname: foodjson[k+1].content
                },
                success: function (data) {
                    const obj = JSON.parse(data);
                    //console.log(obj);
                    for (i = 0; i < obj.length; i++) {
                        resultArr.push({
                            foodname: obj[i].food_name,
                            description: obj[i].description,
                            image: obj[i].image
                        });
                    }
                },
                error: function () {
                    console.log('ajax error');
                }
            });
        }
        return resultArr;
    }
/* 

    <div style="font-size:30px;width:70px;height:100px;"><div>${'추천'+' '+(index+1)}</div></div>
                <div>
                 */

    function makeListToDom(list) {
        
        var dom;
        var imglist=["./1111.png","./2222.png","./3333.png","","","","",""];
        if(foodjson[0].num!=0)
        dom = list.map((elem, index) => `
        <div style='margin: 50px auto;background-color:oldlace;border:1px solid #F0F8FF;border-radius:15px;width:1000px;height:200px;display:flex;font-family: 'BinggraeSamanco', sans-serif;align-items: center;justify-content:center'>
            <div style='display:flex;margin: auto'>
                <div style="font-size:30px;width:70px;height:100px;"><div><img src="${imglist[index]}" onerror="this.parentNode.style.display='none'" style="width: 50px;height: 70px;border-radius:15px"></div></div>
                <div>
                <img src="${elem.image}" style="width: 150px;height: 120px;border-radius:15px">
                <div >${elem.foodname}</div>
                </div>
            </div>
            <div style="margin:auto;padding:0 20 0 20;width:800px;line-height: 1.6;
font-size: 18px;font-family: 'BinggraeSamanco', sans-serif; text-align:left;">${elem.description}
            </div>
            <div style="margin:auto;display:flex;justify-content:space-evenly;height:200px;align-items:center">
                <div>
                <a href="javascript:void(0);" onclick="callReview('${elem.foodname}');" class="review" style="font-family: 'Hanna', sans-serif;" value='${elem.foodname}'>리뷰</a>
                
                <a href="javascript:void(0);" onclick="callStore('${elem.foodname}');" class="myButton" style="font-family: 'Hanna', sans-serif;" value='${elem.foodname}'>맛집</a>
                </div>
            </div>
        </div>
        `);
        else{
            dom=`
            <div><img src="11.png" style="width: 400px;height: 300px; padding: 100px;border-radius:15px">
                </div>
            `
        }
        return dom;
    }

    function renderList(dom) {
        if(foodjson[0].num!=0){
        var d = dom.join('');
        }
        else{
        var d=dom;
        }
        document.getElementById("test").innerHTML = d;
    }

    function render() {
        const userListDom = makeListToDom(userList);
        renderList(userListDom);
    }

    function searchFood() {
        window.location = "./searchfood.php?temp=" + $(".search").val();

    }
    $("#homepage").click(function () {
        window.location = "./index.php";
    });
    function callReview(obj){
        window.location = "searchreview.php?temp=" + obj;
    }
    function callStore(obj){
        window.location = "searchstore.php?temp=" + obj;
    }
    var currentPosition = parseInt($("#sidebox").css("top")); $(window).scroll(function() { var position = $(window).scrollTop(); $("#sidebox").stop().animate({"top":position+currentPosition+"px"},600); });

</script>