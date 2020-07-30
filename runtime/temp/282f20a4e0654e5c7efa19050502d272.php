<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:68:"/www/wwwroot/public/../application/index/view/Public/small_show.html";i:1596032528;s:71:"/www/wwwroot/public/../application/index/view/Public/comment_reply.html";i:1596032528;}*/ ?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf8">
<meta name="keywords" content="Aomaha|个人博客|技术博客|WEB渗透测试">
<meta name="description" content="这是记录一些学习过程的个人博客">
<meta name="author" content="Aomaha">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Aomaha</title>
<link rel="stylesheet" type="text/css" href="__CSS__/comment.css">
<script type="text/javascript" src="__JS__/jquery.nicescroll.min.js"></script>
<script type="text/javascript" src="__JS__/comment.js"></script>
<style type="text/css">
#the_content{
	margin-top:15px;
}
#the_content img{
	max-width:100%;
  	height:auto;
}
</style>
</head>

<body>
	
<!--首页主体部分开始-->
<div class="col-xs-12" style="background-color:#DBDBDB;border-radius:15px;height:1135px;margin-bottom: 15px;overflow:auto;" id="c-scroll">
	<!--文章标题-->
	<div style="text-align:center;color:#2F4F4F;"><h2><?php echo $art['title']; ?></h2></div>

	<!--文章附属信息展示-->
	<div style="height:25px;border-bottom:1px #2F4F4F dashed;padding-left:25px;" class="hidden-xs">
		<i class="glyphicon glyphicon-user"></i> <?php echo $art['author']; ?>
		<i class="glyphicon glyphicon-th-list" style="margin-left:25px;"></i> <?php echo $cid_name; ?>
		<i class="glyphicon glyphicon-eye-open" style="margin-left:25px;"></i> <?php echo $art['click']; ?>
		<i class="glyphicon glyphicon-time" style="margin-left:25px;"></i> <?php echo $art['addtime']; ?>
		<i class="glyphicon glyphicon-search" style="margin-left:25px;"></i> 搜索关键词:<?php echo $art['keywords']; ?>
	</div>

	<!--文章内容展示-->
	<div id="the_content">
		<?php echo $art['content']; ?>
	</div>
	<!--引入评论模板-->
		<!--水平分割线开始-->
<div style="width:100%;height:0;border-bottom:#000000 1px dashed;" class="hidden-xs hidden-sm"></div>
<!--水平分割线开始-->


<div style="margin-left:auto;margin-right:auto;width:800px;">
	<!--评论界面开始-->
	<form action="<?php echo url('index/Index/comment'); ?>" method="post">
	<div style="margin-bottom:15px;width:800px;height:175px;" class="hidden-xs hidden-sm">
		<h3>文章留言( ˘ ³˘)</h3>
		<!--隐藏域开始-->
		<input type="text" name="aid" hidden="hidden" value="<?php echo $art['aid']; ?>">
		<input type="text" name="level" hidden="hidden" value="0">
		<input type="text" name="pid" hidden="hidden" value="0">
		<input type="text" name="co_time" hidden="hidden" value="<?php echo date('Y-m-d'); ?>">
		<input type="text" name="user" hidden="hidden" value="<?php echo \think\Session::get('name'); ?>">
		<!--隐藏域结束-->
		<textarea class="c_comment" name="content" <?php if(\think\Session::get('name') == null): ?>readOnly="readOnly"<?php endif; ?>>请登录后进行评论(最多150字符)</textarea>
		<button class="btn btn-primary" style="float:right;">评论</button>
	</div>
	</form>
	<!--评论界面结束-->
</div>



	<!--评论显示开始-->
	<div class="hidden-xs hidden-sm" style="margin:10px auto;width:800px;">
		
		<?php if(!(empty($comment) || ($comment instanceof \think\Collection && $comment->isEmpty()))): ?>
			<h3 class="hidden-xs hidden-sm">评论区</h3>
		<?php endif; if(is_array($comment) || $comment instanceof \think\Collection): $i = 0; $__LIST__ = $comment;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;if($vo['level'] == 0): ?>
		<!--主楼评论开始-->
		<div class="comment-list">
			<h4 style="color:#008B8B"><?php echo $vo['user']; ?><small>&emsp;<?php echo $vo['co_time']; ?></small></h4>
			<p style="margin-bottom:5px;">
				<?php echo $vo['content']; ?>
			</p>	
			<span style="margin-left:670px;">
				<span class="has_son" style="cursor:pointer;" value="<?php echo $vo['coid']; ?>">
					<i class="glyphicon glyphicon-eye-open"></i>&nbsp;隐显&emsp;
				</span>
				<span style="cursor:pointer;" data-toggle="modal" data-target="#son_reply" class="reply_main" value="<?php echo $vo['coid']; ?>">
					<i class="glyphicon glyphicon-comment"></i>&nbsp;回复
				</span>
			</span>
		</div>
		<!--主楼评论结束-->
		<?php else: ?>
		<!--楼中楼开始-->
		<div class="son-<?php echo $vo['pid']; ?>" style="display:none;">
		<div class="comment-son">
			<span style="color:#00688B;"><?php echo $vo['user']; ?></span>：
			<?php echo $vo['content']; ?>
			<span style="margin-left:725px;">
				<span style="cursor:pointer;" data-toggle="modal" data-target="#son_reply" class="reply" value="<?php echo $vo['user']; ?>">
					<i class="glyphicon glyphicon-comment" style="color:#636363"></i>&nbsp;回复
				</span>
			</span>
		</div>
		</div>
		<!--楼中楼结束-->
		<?php endif; endforeach; endif; else: echo "" ;endif; ?>
	</div>	
	<!--评论显示结束-->


<!--模态框开始-->
<form action="<?php echo url('index/Index/comment'); ?>" method="post">
<div class="modal fade" id="son_reply" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">请输入回复信息</h4>
            </div>
            <div class="modal-body">
            	<!--隐藏域开始-->
				<input type="text" name="aid" hidden="hidden" value="<?php echo $art['aid']; ?>">
				<input type="text" name="level" hidden="hidden" value="1">
				<input type="text" name="pid" hidden="hidden" value="0" id="change_pid">
				<input type="text" name="co_time" hidden="hidden" value="<?php echo date('Y-m-d'); ?>">
				<input type="text" name="user" hidden="hidden" value="<?php echo \think\Session::get('name'); ?>">
				<!--隐藏域结束-->
				<textarea class="form-control" rows="3" name="content" id="reply_content"></textarea>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
                <button type="submit" class="btn btn-primary">提交评论</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal -->
</div>
</form>
<!--模态框结束-->
	<!--引入评论模板-->

</div>
<!--首页主体部分结束-->

<script type="text/javascript">

$(document).ready(function(){
	//滚动条
	$("#c-scroll").niceScroll({cursorcolor:"#008B8B",
							   hwacceleration: true,
													});


});

</script>


</body>
</html>