<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:61:"/www/wwwroot/public/../application/index/view/User/login.html";i:1596032529;}*/ ?>
<!DOCTYPE html>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="keywords" content="Aomaha|个人博客|技术博客|WEB渗透测试">
	<meta name="description" content="这是记录一些学习过程的个人博客">
	<meta name="author" content="Aomaha">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!--引入bootstrap和jquery(用的cdn)-->
	<link rel="stylesheet" href="https://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://cdn.bootcss.com/jquery/2.1.1/jquery.min.js"></script>
	<script src="https://cdn.bootcss.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<!--引入bootstrap和jquery结束-->　
	<title>Aomaha_login</title>
	<link rel="icon" href="__STATIC__/pic/logo.jpg" sizes="32x32">
<style type="text/css">
body{
	background:url('__STATIC__/pic/login.jpg') no-repeat center fixed;
	width:100%;

}
#login{
	
	width:250px;
	margin:150px auto;
}
#login #tip{
	width:250;
	font-size: 16px;
	margin-bottom:20px;
	text-align: center;
}
#login .c-login{
	width:250px;
	background-color:#66CDAA;
	color: #E0EEEE;
	margin-bottom:5px; 
}

</style>

</head>
<body>
<!--主体开始-->
<div class="container">

<!--表单开始-->
<div id="login">
	<form role="form" method="post" action="<?php echo url('index/User/checkPass'); ?>">
		<div id="tip">欢迎登陆</div>
		<div class="form-group">
			<input class="form-control" type="text" name="userName" placeholder="请输入用户名" />
		</div>
		<div class="form-group">
			<input class="form-control" type="password" name="password" placeholder="请输入密码" />
		</div>
		<div class="form-group">
			<input class="form-control" type="text" name="code" placeholder="请输入验证码" style="float: left;width:110px;" />
			<img onclick="this.src='<?php echo captcha_src(); ?>?'+Math.random()" src="<?php echo captcha_src(); ?>" alt="captcha" style="width:130px;margin-left: 10px;" />
		</div>	
		<button type="submit" class="btn c-login">登陆</button>
		<a type="button" class="btn c-login"  data-toggle="modal" href="#myModal">注册</a>
		<a type="button" class="btn c-login" href="<?php echo url('index/Index/index'); ?>">返回首页</a>
	</form>
</div>
<!--表单结束-->

<!--模态框开始-->
<form role="form" action="<?php echo url('index/User/create'); ?>" method="post">
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">欢迎注册ヾ(*´∀｀*)ﾉ</h4>
            </div>
            <div class="modal-body">
            	<label name="name">用户名</label>
            	<input type="text" name="name" class="form-control">
            	<p class="help-block">最多20个字符(即6个汉字)</p>
            	<label name="password">密码</label>
            	<input type="password" name="password" class="form-control">
            	<p class="help-block">最多20个字符(字符:数字,字母,下划线,破折号)</p>
            	<label name="repassword">确认密码</label>
            	<input type="password" name="repassword" class="form-control">
            	<p class="help-block">最多20个字符(字符:数字,字母,下划线,破折号)</p>
        	</div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
                <button type="submit" class="btn btn-primary">提交更改</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal -->
</div>
</form>
<!--模态框结束-->

</div>
<!--主体结束-->
</body>
</html>