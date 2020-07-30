<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:62:"/www/wwwroot/public/../application/admin/view/Article/add.html";i:1596032524;}*/ ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf8">
	<meta name="author" content="Aomaha">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">	
	<title>后台管理系统(文章管理)</title>
<style type="text/css">
.first-col{
	width:100px;
	text-align:center;
	font-size:16px;
}
</style>	
</head>
<body>
<!--添加文章主体开始-->
<div class="container-fluid" style="height: 600px;overflow: auto;">
	
<form enctype="multipart/form-data" action="<?php echo url('Article/add'); ?>" method="post" name="article">
	<table class="table table-bordered">
	  <caption style="color:#00868B;">文章编辑</caption>
	  <thead>
	    <tr>
	      <th colspan="2">文章属性</th>
	      <th>文章内容</th>
	    </tr>
	  </thead>
	  <tbody>
	    <tr>
	      <td class="first-col">标题</td>
	      <td style="width:60px;"><input type="text" name="title" placeholder="最多16汉字" size="30"></td>
	      <td rowspan="8">
	      		<textarea id="content" name="content">请开始写文章</textarea>
	      		<button type="submit" class="btn btn-primary" style="float:right;margin-top:5px;margin-right:15px;">提交</button>
	  	  </td>
	    </tr>
	    <tr>
	      <td class="first-col">作者</td>
	      <td style="width:60px;"><input type="text" name="author" placeholder="最多6汉字" size="30"></td>	      
	    </tr>
	    <tr>
	      <td class="first-col">关键词</td>
	      <td style="width:60px;"><input type="text" name="keywords" placeholder="最多16汉字" size="30"></td>	      
	    </tr>
	    <tr>
	      <td class="first-col">排序</td>
	      <td style="width:60px;"><input type="text" name="sort" placeholder="填个数字~" size="30"></td>	      
	    </tr>
	    <tr>
	      <td class="first-col">是否置顶</td>
	      <td style="width:60px;padding-left:100px;">
	      	<select name="is_top">
	      		<option value="0">否</option>
	      		<option value="1">是</option>
	      	</select>
	      </td>	      
	    </tr>
	    <tr>
	      <td class="first-col">标题图片</td>
	      <td style="width:60px;"><input type="file" name="title_pic"></td>	      
	    </tr>
	    <tr>
	      <td class="first-col">文章分类</td>
	      <td style="width:60px;">
	      	<select name="cid" style="width:210px" id="sel">
	      		<option value="-4">碎念</option>
	      		<?php if(is_array($cate) || $cate instanceof \think\Collection): $i = 0; $__LIST__ = $cate;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;if($vo['show'] == '1'): ?>
		      		<option value="<?php echo $vo['cid']; ?>">
		      			<?php if(empty($vo['son']['pid']) || ($vo['son']['pid'] instanceof \think\Collection && $vo['son']['pid']->isEmpty())): ?>					
		      					<?php echo $vo['son']['cname']; ?>--<?php echo $vo['cname']; else: switch($vo['son']['pid']): case "-1": ?>WEB开发--<?php echo $vo['son']['cname']; ?>--<?php echo $vo['cname']; break; case "-2": ?>WEB渗透--<?php echo $vo['son']['cname']; ?>--<?php echo $vo['cname']; break; case "-3": ?>其他技术--<?php echo $vo['son']['cname']; ?>--<?php echo $vo['cname']; break; endswitch; endif; ?>
		      		</option>
		      		<?php endif; endforeach; endif; else: echo "" ;endif; ?>
	      	</select>
	      </td>	      
	    </tr>
	    <tr>
	      <td class="first-col">所属大类</td>
	      <td style="width:60px;"><input type="text" name="big_cid" size="30" readonly="readonly" id="hid"></td>	      
	    </tr>
	  </tbody>
	</table>
</form>
</div>
<!--添加文章主体结束-->

<script type="text/javascript">
	//jq开始
	$(document).ready(function(){
		//实例化编辑器开始
		UE.delEditor('content');
		var ue = UE.getEditor('content',{
					initialFrameHeight:360,
					initialFrameWidth:740,
					toolbars: [
						['fullscreen', 'source', 'undo', 'redo', 'indent','bold','italic','blockquote','underline','strikethrough','formatmatch','fontfamily','fontsize',],
						['horizontal','simpleupload','link','emotion','searchreplace','forecolor','music',],
					],
				});
		//实例化编辑器结束
		//获取所选文章的大类开始
		var first_test=$('#sel option:selected').text().trim().split('--');
		$('#hid').val(first_test[0]);
		$('#sel').change(function(){
			var str=$('#sel option:selected').text().trim().split('--');
			$('#hid').val(str[0]);
		});
		
		
		//获取所选文章的大类结束

	});
    //jq结束    		
</script>
</body>
</html>