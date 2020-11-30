<script src="//code.jquery.com/jquery-3.3.1.min.js"></script>
<style>
    @import url(//fonts.googleapis.com/earlyaccess/hanna.css);

    .search {
        width: 1000px;
        height: 50px;
        color: #666;
        border-radius: 7px;
    }

    .myButton {
        margin: 5px;
        width: 90px;
        height: 25px;
        background-color: #44c767;
        border-radius: 28px;
        border: 1px solid #18ab29;
        display: inline-block;
        cursor: pointer;
        color: #ffffff;
        font-family: Arial;
        font-size: 17px;
        padding: 16px 31px;
        text-decoration: none;
        text-shadow: 0px 1px 0px #2f6627;
    }

    .myButton:hover {
        background-color: #5cbf2a;
    }

    .myButton:active {
        position: relative;
        top: 1px;
    }

    .review {
        margin: 5px;
        width: 90px;
        height: 25px;
        background-color: #ff0000;
        border-radius: 28px;
        border: 1px solid #ff0505;
        display: inline-block;
        cursor: pointer;
        color: #ffffff;
        font-family: Arial;
        font-size: 17px;
        padding: 16px 31px;
        text-decoration: none;
        text-shadow: 0px 1px 0px #c21820;
    }

    .review:hover {
        background-color: #e01b1b;
    }

    .review:active {
        position: relative;
        top: 1px;
    }
</style>
<meta charset="utf-8">
<div style="text-align: center;">
    <div style=" text-align: center;justify-content: center;margin-top: 50px;display: flex;border-bottom:2px solid #DCDCDC;">
        <img src="./mumuk.png"  style="width: 100px;height: 80px;" id='homepage'>
        <input class="search" type="text" placeholder="Search" onkeypress="if( event.keyCode == 13 ){searchFood();}">
    </div>
    <div style="text-align: center;">
        <div id='test' style="margin-top: 20px;"></div>
    </div>
    <div>
    </div>
</div>
<script>
    const userList = reqUserList(); // 함수 선언 전 변수 선언은 호이스팅에 의해 허락됨 


    $(document).ready(function () {
        reqFood();
        render();
    });
    function reqFood(){
        var obj = new Object();
        obj.content='부드러운 고기';
        var jsonData = JSON.stringify(obj);
        console.log(jsonData);
        $.ajax({
            type: "POST",
            url: "http://15.164.105.78:8000/pybo/test/",
            async:false,
            dataType: "json",
            data: jsonData,
            success: function (data) {
                console.log(data);
            },
            error: function () {
                console.log('ajax error');
            }
        });
    }
    function reqUserList() {
        // ajax를 통해 데이터를 불러왔다고 
        var urlParams = new URLSearchParams(window.location.search);
        var foodname = urlParams.get('temp');
        
        var resultArr = [];
        $.ajax({
            type: "POST",
            url: "./dbsearchfood.php",
            async:false,
            data: {
                foodname: foodname
            },
            success: function (data) {
                const obj=JSON.parse(data);
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
    }




    function makeListToDom(list) {
        const dom = list.map(elem => `
        <div style='margin: 50px auto;border-bottom:2px solid;width:1000px;display:flex;'>
            <div>
                <img src="${elem.image}" style="width: 100px;height: 80px;">
                <div style="font-family: 'Hanna', sans-serif;">${elem.foodname}</div>
            </div>
            <div style="margin:10px;width:800px;font-family: 'Hanna', sans-serif;">${elem.description}</div>
            <div>
                
        <a href="#" class="review" style="font-family: 'Hanna', sans-serif;">리뷰</a>
        <a href="#" class="myButton" style="font-family: 'Hanna', sans-serif;">맛집</a>

            </div>
        </div>
        `);

        return dom;
    }

    function renderList(dom) {
        const d = dom.join('');

        document.getElementById("test").innerHTML = d;
    }

    function render() {
        const userListDom = makeListToDom(userList);
        renderList(userListDom);
    }

    function searchFood() {
        window.location = "./searchfood.php?temp=" + $(".search").val();

    }
    $("#homepage").click(function() {
        window.location = "./index.php";
    });
</script>