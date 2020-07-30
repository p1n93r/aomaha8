<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:63:"/www/wwwroot/public/../application/admin/view/Article/show.html";i:1596032524;}*/ ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf8">
	<meta name="author" content="Aomaha">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">	
	<script src="https://cdn.bootcss.com/jquery/2.1.1/jquery.min.js"></script>
	<title>后台管理系统(文章列表)</title>
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
				  <caption style="color:#00868B;">文章信息展示及操作</caption>
				  <thead>
				    <tr>
				      <th>标题</th>
				      <th>作者</th>
				      <th>关键词</th>
				      <th>标题图片</th>
				      <th>置顶</th>
					  <th>排序</th>
					  <th>所属分类</th>
					  <th>所属大类</th>
					  <th>操作</th>
				    </tr>
				  </thead>
				  <tbody>
				  	<?php if(is_array($res) || $res instanceof \think\Collection): $i = 0; $__LIST__ = $res;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
				    <tr>
				      <td><?php echo $vo['title']; ?></td>
				      <td><?php echo $vo['author']; ?></td>
				      <td><?php echo $vo['keywords']; ?></td>
				      <td><img src="<?php echo $vo['title_pic']; ?>" style="height:50px;width:50px;"></td>
				      <td><?php if($vo['is_top'] == '0'): ?>否<?php else: ?>是<?php endif; ?></td>
				      <td><?php echo $vo['sort']; ?></td>
				      <td><?php echo $vo['cid']; ?></td>
				      <td>
				      	<?php switch($vo['big_cid']): case "-1": ?>WEB开发<?php break; case "-2": ?>WEB渗透<?php break; case "-3": ?>其他技术<?php break; case "-4": ?>碎念<?php break; endswitch; ?>
				      </td>
				      <td>
				      	<button type="button" class="cate_edit btn btn-warning" value="<?php echo $vo['aid']; ?>" data-toggle="modal" data-target="#edit">修改</button>
				      	<a type="button" class="btn btn-danger" href="<?php echo url('Article/delete',['aid'=>$vo['aid']]); ?>" onclick="if(confirm('小骚年可想清楚了？？')==false)return false;">删除</a>
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

						<form enctype="multipart/form-data" role="form" action="<?php echo url('Article/edit'); ?>" method="post">
							<input type="text" id="hidden_aid" name="aid" hidden="hidden" value="">
							<div class="form-group">
							    <label for="title">标题</label>
							    <input type="text" class="form-control" name="title" placeholder="请输入修改后的标题">
							    <p class="help-block">最多50字符哦</p>
							 </div>
							 <div class="form-group">
							    <label for="author">作者</label>
							    <input type="text" class="form-control" name="author" placeholder="请输入修改后的作者">
							    <p class="help-block">最多20个字符哦</p>
							 </div>
							 <div class="form-group">
							    <label for="keywords">关键词</label>
							    <input type="text" class="form-control" name="keywords" placeholder="请输入修改后的关键词">
							    <p class="help-block">最多50字符哦</p>
							 </div>
							 <div class="form-group">
							    <label for="sort">文章排序</label>
							    <input type="text" name="sort" class="form-control">
							    <p class="help-block">请输入一个数字</p>
							 </div>
							 <div class="form-group">
							    <label class="sr-only" for="title_pic">标题图片</label>
							    <input type="file" name="title_pic">
							    <p class="help-block">请选择修改的标题图片</p>
							 </div>
							 <div class="form-group">
							    <label for="title">是否置顶</label>
							    <select name="is_top">
									<option value="1">是</option>
									<option value="0">否</option>
							    </select>
							    <p class="help-block">最多50字符哦</p>
							 </div>
							 <div class="form-group">
							    <label class="sr-only" for="cid">所属分类</label>
							    <select name="cid" style="width:210px" id="sel">
						      		<option value="-4">碎念</option>
                                      <?php if(is_array($cate) || $cate instanceof \think\Collection): $i = 0; $__LIST__ = $cate;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;if($vo['show'] == '1'): ?>
                                          <option value="<?php echo $vo['cid']; ?>">
                                              <?php if(empty($vo['son']['pid']) || ($vo['son']['pid'] instanceof \think\Collection && $vo['son']['pid']->isEmpty())): ?>					
                                                      <?php echo $vo['son']['cname']; ?>--<?php echo $vo['cname']; else: switch($vo['son']['pid']): case "-1": ?>WEB开发--<?php echo $vo['son']['cname']; ?>--<?php echo $vo['cname']; break; case "-2": ?>WEB渗透--<?php echo $vo['son']['cname']; ?>--<?php echo $vo['cname']; break; case "-3": ?>其他技术--<?php echo $vo['son']['cname']; ?>--<?php echo $vo['cname']; break; endswitch; endif; ?>
                                          </option>
                                          <?php endif; endforeach; endif; else: echo "" ;endif; ?>
						      	</select>
							    <p class="help-block">请选择修改的标题图片</p>
							 </div>
							 <input type="text" id="hidden_big_cid" name="big_cid" readonly="readonly" value="">
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
//获取所选文章的大类开始
		var first_test=$('#sel option:selected').text().trim().split('--');
		$('#hidden_big_cid').val(first_test[0]);
		$('#sel').change(function(){
			var str=$('#sel option:selected').text().trim().split('--');
			$('#hidden_big_cid').val(str[0]);
		});
		
		
//获取所选文章的大类结束
//将隐藏域的id赋值开始
	$('.cate_edit').click(function(){
		var id=$(this).val();
		$('#hidden_aid').val(id);
	});
//将隐藏域的id赋值结束
</script>

</body>
</html>