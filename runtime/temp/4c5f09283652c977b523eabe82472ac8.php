<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:63:"/www/wwwroot/public/../application/admin/view/Account/show.html";i:1596032523;}*/ ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf8">
	<meta name="author" content="Aomaha">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">	
	<script src="https://cdn.bootcss.com/jquery/2.1.1/jquery.min.js"></script>
	<title>后台管理系统(账户管理)</title>
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
				  <caption style="color:#00868B;">账户信息展示及操作</caption>
				  <thead>
				    <tr>
				      <th>账户id</th>
				      <th>账户名称</th>
				      <th>是否是admin</th>
				      <th>操作</th>
				    </tr>
				  </thead>
				  <tbody>
				  	<?php if(is_array($user) || $user instanceof \think\Collection): $i = 0; $__LIST__ = $user;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
				    <tr>
				      <td><?php echo $vo['id']; ?></td>
				      <td><?php echo $vo['name']; ?></td>
				      <td><?php if($vo['is_admin'] == '1'): ?>是<?php else: ?>否<?php endif; ?></td>
				      <td>
				      	<button type="button" class="user_edit btn btn-warning" value="<?php echo $vo['id']; ?>" data-toggle="modal" data-target="#edit">修改</button>
				      	<?php if($vo['is_admin'] != '1'): ?>
				      	<a type="button" class="btn btn-danger" onclick="if(confirm('小骚年可想清楚了？？')==false)return false;" href="<?php echo url('Account/delete',['id'=>$vo['id']]); ?>">删除</a>
				      	<?php endif; ?>
				      </td>
				    </tr>
				    <?php endforeach; endif; else: echo "" ;endif; ?>
				  </tbody>
				</table>
				
			</div>
	  </div>
	  <!--模态框开始-->
		<div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		    <div class="modal-dialog">
		        <div class="modal-content">
		            <div class="modal-header">
		                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
		                <h4 class="modal-title" id="myModalLabel">请输入修改后信息</h4>
		            </div>
		            <div class="modal-body">

						<form role="form" action="<?php echo url('Account/edit'); ?>" method="post">
							<input type="text" id="hidden_id" name="id" hidden="hidden" value="">
							<div class="form-group">
							    <label for="name">账户名称</label>
							    <input type="text" class="form-control" name="name" placeholder="请输入修改后账户名称">
							    <p class="help-block">最多6个汉字哦(20个字符)</p>
							 </div>
							 <div class="form-group">
							    <label for="password">账户密码</label>
							    <input type="password" class="form-control" name="password" placeholder="请输入所属分类的id">
							    <p class="help-block">最多20个字符，最少8个字符(字符圈起来，要考的)</p>
							 </div>
							 <div class="form-group">
							    <label for="password">再次输入账户密码</label>
							    <input type="password" class="form-control" name="repassword" placeholder="请输入所属分类的id">
							    <p class="help-block">最多20个字符，最少8个字符(字符圈起来，要考的)</p>
							 </div>
							 <div class="modal-footer">
				                <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
				                <button type="submit" class="btn btn-primary">提交更改</button>
				            </div>
						</form>						 
		            </div>		            
		        </div>
		    </div>
		</div>
<!--模态框结束-->

	</div>
<!--show主体结束-->

<script type="text/javascript">

$(document).ready(function(){

//将隐藏域的id赋值开始
	$('.user_edit').click(function(){
		var id=$(this).val();
		$('#hidden_id').val(id);
	});
//将隐藏域的id赋值结束


});
</script>

</body>
</html>