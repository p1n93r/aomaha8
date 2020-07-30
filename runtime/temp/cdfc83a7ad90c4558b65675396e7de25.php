<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:62:"/www/wwwroot/public/../application/admin/view/Index/index.html";i:1596032524;s:66:"/www/wwwroot/public/../application/admin/view/Public/left_nav.html";i:1596032525;}*/ ?>
<!DOCTYPE html>
<html>
<head>
	<meta name="author" content="Aomaha">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!--引入bootstrap和jquery(= =')-->
	<link rel="stylesheet" href="https://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://cdn.bootcss.com/jquery/2.1.1/jquery.min.js"></script>
	<script src="https://cdn.bootcss.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="__CSS__/admin_nav.css">
	<title>后台管理系统</title>
	<!--引入编辑器配置文件-->
	<script type="text/javascript" src="__JS__/ueditor/ueditor.config.js"></script>
	<script type="text/javascript" src="__JS__/ueditor/ueditor.all.min.js"></script>
	<script type="text/javascript" charset="utf-8" src="__JS__/ueditor/lang/zh-cn/zh-cn.js"></script>
<style type="text/css">
#big{
	position:absolute;
	margin-left:8px;
}
#right-content{
	width:1150px;
	height: 600px;
	background-color:#CDCDB4;
	position: absolute;
	top: 0;
	margin-left:200px;
}

</style>
</head>
<body>

<div id="big">
	<!--引入左侧导航栏开始-->
	<!--导航栏开始-->
	<div style="padding-left: 0;padding-right: 0;width:200px;" id="left-nav">	
		<ul id=left-list>
			<li>
				<a href="#show1" data-toggle="collapse">
					<i class="glyphicon glyphicon-leaf"></i>
					文章管理
					<i class="glyphicon glyphicon-chevron-down pull-right" style="margin-right: 15px;margin-top: 15px;"></i>
				</a>
			</li>
					<li id="show1" class="collapse">
						<a href="#" data-toggle="collapse" class="collapse c-son">
							<i class="glyphicon glyphicon-flash"></i>
							添加文章
						</a>
						<a href="#" data-toggle="collapse" class="collapse c-son">
							<i class="glyphicon glyphicon-flash"></i>
							查看文章
						</a>
					</li>
			<li>
				<a href="#show2" data-toggle="collapse">
					<i class="glyphicon glyphicon-leaf"></i>
					分类管理
					<i class="glyphicon glyphicon-chevron-down pull-right" style="margin-right: 15px;margin-top: 15px;"></i>
				</a>
			</li>	
					<li id="show2" class="collapse">
						<a href="#" data-toggle="collapse" class="collapse c-son">
							<i class="glyphicon glyphicon-flash"></i>
							添加分类
						</a>
						<a href="#" data-toggle="collapse" class="collapse c-son">
							<i class="glyphicon glyphicon-flash"></i>
							查看分类
						</a>
					</li>	
			<li>
				<a href="#show3" data-toggle="collapse">
					<i class="glyphicon glyphicon-leaf"></i>
					账户管理
					<i class="glyphicon glyphicon-chevron-down pull-right" style="margin-right: 15px;margin-top: 15px;"></i>
				</a>
			</li>	
					<li id="show3" class="collapse">
						<a href="#" data-toggle="collapse" class="collapse c-son">
							<i class="glyphicon glyphicon-flash"></i>
							添加账户
						</a>
						<a href="#" data-toggle="collapse" class="collapse c-son">
							<i class="glyphicon glyphicon-flash"></i>
							查看账户
						</a>
					</li>
			<!--评论管理开始-->
			<li>
				<a href="#show4" data-toggle="collapse">
					<i class="glyphicon glyphicon-leaf"></i>
					通知管理
					<i class="glyphicon glyphicon-chevron-down pull-right" style="margin-right: 15px;margin-top: 15px;"></i>
				</a>
			</li>	
					<li id="show4" class="collapse">
						<a href="#" data-toggle="collapse" class="collapse c-son">
							<i class="glyphicon glyphicon-flash"></i>
							添加通知
						</a>
						<a href="#" data-toggle="collapse" class="collapse c-son">
							<i class="glyphicon glyphicon-flash"></i>
							查看通知
						</a>
					</li>
			<!--评论管理开始-->
			<li>
				<a href="#">
					<i class="glyphicon glyphicon-leaf"></i>
					数据备份
				</a>
			</li>
			<li>
				<a href="#">
					<i class="glyphicon glyphicon-leaf"></i>
					数据还原
				</a>
			</li>
	</div>	
	<!--导航栏开始-->
	<!--引入左侧导航栏结束-->


<!--右侧内容开始-->	
	<div id="right-content">


	</div>
<!--右侧内容结束-->




</div>


<script language="javascript" type="text/javascript">




$(document).ready(function(){
	//分类管理的局部刷新开始
	$('#show2 a').click(function(){
		//Config::set('default_ajax_return','html');
		index=$(this).index();
		$("#right-content").load("<?php echo url('admin/Cate/index'); ?>",{'index':index});
	});
	//分类管理的局部刷新结束
	//
	//账户管理的局部刷新开始
	$('#show3 a').click(function(){
		index=$(this).index();
		if(index==0){
			$("#right-content").load("<?php echo url('admin/Account/add'); ?>");
		}else{
			$("#right-content").load("<?php echo url('admin/Account/show'); ?>");
		}
	});
	//账户管理的局部刷新结束
	////		
	//文章管理的局部刷新开始
	$('#show1 a').click(function(){
		index=$(this).index();
		if(index==0){
				$("#right-content").load("<?php echo url('admin/Article/add'); ?>");
		}else{
			$("#right-content").load("<?php echo url('admin/Article/show'); ?>");
		}
	});
	//文章管理的局部刷新结束
	//
	//通知管理的局部刷新开始
	$('#show4 a').click(function(){
		index=$(this).index();
		if(index==0){
				$("#right-content").load("<?php echo url('admin/NoticeInfo/add'); ?>");
		}else{
			$("#right-content").load("<?php echo url('admin/NoticeInfo/show'); ?>");
		}
	});
	//通知管理的局部刷新结束
	

	



});

</script>


</body>
</html>