<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:66:"/www/wwwroot/public/../application/index/view/Public/read_all.html";i:1596032528;s:65:"/www/wwwroot/public/../application/index/view/Public/top_nav.html";i:1596032529;s:71:"/www/wwwroot/public/../application/index/view/Public/comment_reply.html";i:1596032528;}*/ ?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf8">
<meta name="keywords" content="Aomaha|个人博客|技术博客|WEB渗透测试">
<meta name="description" content="这是记录一些学习过程的个人博客">
<meta name="author" content="Aomaha">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<!--引入bootstrap和jquery(= =')-->
<link rel="stylesheet" href="https://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://cdn.bootcss.com/jquery/2.1.1/jquery.min.js"></script>
<script src="https://cdn.bootcss.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<!--引入bootstrap和jquery结束-->　
<title>Aomaha</title>
<link rel="icon" href="__STATIC__/pic/logo.jpg" sizes="32x32">
<link rel="stylesheet" href="__CSS__/basic.css">
<link rel="stylesheet" href="__CSS__/index_must.css">
<link rel="stylesheet" type="text/css" href="__CSS__/comment.css">
<script type="text/javascript" src="__JS__/basic.js"></script>
<script type="text/javascript" src="__JS__/index_must.js"></script>
<script type="text/javascript" src="__JS__/comment.js"></script>
<style type="text/css">
#the_content{
	margin-top:15px;
	overflow:hidden;
}
#the_content img{
	max-width:100%;
  	height:auto;
}

</style>
</head>

<body>


<!--引入top导航栏开始-->
<!--顶部导航栏开始-->
<header class="navbar navbar-inverse navbar-fixed-top" id="c-header">
<div class="container">
    <div class="navbar-header">
      <a  href="<?php echo url('Index/index'); ?>">
        <img src="__STATIC__/pic/logo1.png" style="width:50px;">
      </a>
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#c-nav" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
    </div>
    <div class="collapse navbar-collapse" id="c-nav">
    <ul class="nav navbar-nav" id="c-moblie">
        <!--添加一个滑块，用于导航栏hover的滑动效果-->
        <div class="hidden-xs  c-mobile-nav"></div>
        <li id="index" class="<?php if($top_name == 'index'): ?>c-active<?php endif; ?>"><a href="<?php echo url('Index/index'); ?>" >首页</a></li>
        <li class="<?php if($top_name == 'doWeb'): ?>c-active<?php endif; ?>"><a href="<?php echo url('Index/category',array('top_name'=>'doWeb')); ?>">WEB开发</a></li>
        <li class="<?php if($top_name == 'inWeb'): ?>c-active<?php endif; ?>"><a href="<?php echo url('Index/category',array('top_name'=>'inWeb')); ?>">WEB渗透</a></li>
        <li class="<?php if($top_name == 'other'): ?>c-active<?php endif; ?>"><a href="<?php echo url('Index/category',array('top_name'=>'other')); ?>">其他技术</a></li>
        <li class="<?php if($top_name == 'thought'): ?>c-active<?php endif; ?>"><a href="<?php echo url('Index/category',array('top_name'=>'thought')); ?>">碎念</a></li>
    </ul>

    <ul class="nav navbar-nav navbar-right" id="c-aa">
        <li><a href="<?php echo url('User/login'); ?>"><span class="glyphicon glyphicon-log-in"></span> 登陆</a></li>
    </ul>
    <!--登陆显示用户名-->
    <span style="list-style: none;float: right;margin-top: 15px" class="hidden-xs hidden-sm">
        <span style="color:#00C5CD" id="c-session"><?php echo \think\Session::get('name'); ?></span>
        <a id="tuichu" href="<?php echo url('User/out'); ?>">&nbsp;退出</a>
    </span>
    <form class="navbar-form navbar-right" role="search" method="post" action="<?php echo url('index/Index/search'); ?>">
          <div class="hidden-sm input-group">
            <input class="form-control input-sm" type="text" name="search">
            <span class="input-group-btn"><button class="btn btn-info btn-sm" >Search</button></span>
          </div>
    </form>
  </div>
</div>
</header>
<!--顶部导航栏结束-->
<!--引入top导航栏结束-->

<!--首页主体部分开始-->
<div class="container" id="show_all">

<div class="col-xs-12" style="background-color:#DBDBDB;border-radius:15px;margin-bottom:50px;padding-bottom:10px;">
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


</div>
<!--首页主体部分结束-->
<script type="text/javascript">
	
	

</script>

</body>
</html>