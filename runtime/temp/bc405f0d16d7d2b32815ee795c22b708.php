<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:66:"/www/wwwroot/public/../application/admin/view/NoticeInfo/show.html";i:1596032525;}*/ ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf8">
	<meta name="author" content="Aomaha">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">	
	<script src="https://cdn.bootcss.com/jquery/2.1.1/jquery.min.js"></script>
	<title>后台管理系统(通知管理)</title>
<style type="text/css">
#show{
	height: 600px;
	overflow:auto;
}
</style>
</head>
<body>
<!--show主体开始-->
	<div class="container-fluid">	
	   <div class="row">	
	   	<div class="col-xs-12" id="show">
				<table class="table ">
				  <caption style="color:#00868B;">通知信息展示及操作</caption>
				  <thead>
				    <tr>
				      <th>内容</th>
				      <th>排序</th>
				      <th>操作</th>
				    </tr>
				  </thead>
				  <tbody>
				  	<?php if(is_array($notice) || $notice instanceof \think\Collection): $i = 0; $__LIST__ = $notice;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
				    <tr>
				      <td><?php echo $vo['content']; ?></td>
				      <td><?php echo $vo['sort']; ?></td>
				      <td>
				      	<a type="button" class="btn btn-danger" onclick="if(confirm('小骚年可想清楚了？？')==false)return false;" href="<?php echo url('NoticeInfo/delete',['id'=>$vo['noid']]); ?>">删除</a>
				      </td>
				    </tr>
				    <?php endforeach; endif; else: echo "" ;endif; ?>
				  </tbody>
				</table>
				
			</div>
	  </div>
	

	</div>
<!--show主体结束-->

<script type="text/javascript">

$(document).ready(function(){




});
</script>

</body>
</html>