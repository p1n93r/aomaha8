<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:43:"/www/wwwroot/public/../application/404.html";i:1596032521;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>404页面-Aomaha</title>
<style>
    #box{
        margin: 0 auto;
        width: 540px;
        height: 540px;
    }
    p{
        margin-bottom: 60px;
        width: 540px;
        height: 20px;
        text-align: center;
        line-height: 20px;
    }
    #mes{
        font-size: 30px;
        color: red;
    }
    .hint{
        color: #999;
    }
    a{
        color: #259AEA;
    }
    #top{
        text-align: center;
        margin:0 auto;
    }
</style>
<script>
    var i = 5;
    var intervalid;
    intervalid = setInterval("fun()", 1000);
    function fun() {
        if (i == 0) {
            window.location.href = "__ROOT__/";
            clearInterval(intervalid);
        }
        document.getElementById("mes").innerHTML = i;
        i--;
    }
</script>
</head>
<body>
<div id="box">
    <h1 id="top">404 NOT FOUND</h1>
    <img src="__STATIC__/error/404.jpg" alt="404">
    <p>将在 <span id="mes">5</span> 秒钟后返回<a href="__ROOT__/">Aomaha</a>首页</p>
    <p class="hint">不要乱输入地址嘛~~</p>
</div>
</body>
</html>
