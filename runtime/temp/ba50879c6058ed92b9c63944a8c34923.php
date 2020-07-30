<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:65:"/www/wwwroot/public/../application/admin/view/NoticeInfo/add.html";i:1596032524;}*/ ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf8">
	<meta name="author" content="Aomaha">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">	
	<title>后台管理系统(通知管理)</title>
</head>
<body>
<!--主体设计开始-->	
<div class="container-fluid">
	<div class="row">
		<div class="col-xs-4 col-xs-offset-4" style="margin-top:150px">
			<form role="form" action="<?php echo url('NoticeInfo/add'); ?>" method="post" name="add_notice">
				<div class="form-group">
					<label for="password1">请输入网站通知</label>
					<input type="text" class="form-control" name="content" 
						   placeholder="请输入通知( ˘ ³˘)">
					<p class="help-block">最多30个字(圈起来，要考的)</p>
				</div>
				<div class="form-group">
					<label for="password1">请输入网站通知排序(直接影响到是否显示当前通知)</label>
					<input type="text" class="form-control" name="sort" 
						   placeholder="请输入排序">
					<p class="help-block">是数字哦~~</p>
				</div>
				<button type="submit" class="btn btn-primary">提交</button>
			</form>
		</div>
	</div>
</div>
<!--主体设计结束-->	
</body>
</html>