<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:62:"/www/wwwroot/public/../application/admin/view/Account/add.html";i:1596032523;}*/ ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf8">
	<meta name="author" content="Aomaha">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">	
	<title>后台管理系统(账户管理)</title>
</head>
<body>
<!--主体设计开始-->	
<div class="container-fluid">
	<div class="row">
		<div class="col-xs-4 col-xs-offset-4" style="margin-top:150px">
			<form role="form" action="<?php echo url('Account/add'); ?>" method="post" name="add_user">
				<div class="form-group">
					<label for="userName">账户名称</label>
					<input type="text" class="form-control" name="name" 
						   placeholder="请输入账户名称">
					<p class="help-block">最多6个汉字或者20个字符哦</p>
				</div>
				<div class="form-group">
					<label for="password0">账户密码</label>
					<input type="password" class="form-control" name="password" 
						   placeholder="请输入账户密码">
					<p class="help-block">最多20个字符(字符圈起来，要考的)</p>
				</div>
				<div class="form-group">
					<label for="password1">再次确认账户密码</label>
					<input type="password" class="form-control" name="repassword" 
						   placeholder="请再次输入账户密码">
					<p class="help-block">最多20个字符(字符圈起来，要考的)</p>
				</div>
				<button type="submit" class="btn btn-primary">提交</button>
			</form>
		</div>
	</div>
</div>
<!--主体设计结束-->	
</body>
</html>