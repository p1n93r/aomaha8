<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:64:"/www/wwwroot/public/../application/index/view/Index/thought.html";i:1596032527;s:65:"/www/wwwroot/public/../application/index/view/Public/top_nav.html";i:1596032529;s:70:"/www/wwwroot/public/../application/index/view/Public/article_list.html";i:1596032527;}*/ ?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf8">
<meta name="keywords" content="Aomaha|个人博客|技术博客|WEB渗透测试">
<meta name="description" content="这是记录一些学习过程的个人博客">
<meta name="author" content="Aomaha">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<!--引入bootstrap和jquery(用的cdn)-->
<link rel="stylesheet" href="https://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://cdn.bootcss.com/jquery/2.1.1/jquery.min.js"></script>
<script src="https://cdn.bootcss.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<!--引入bootstrap和jquery结束-->　
<title>Aomaha</title>
<link rel="icon" href="__STATIC__/pic/logo.jpg" sizes="32x32">
<link rel="stylesheet" href="__CSS__/basic.css">
<script type="text/javascript" src="__JS__/basic.js"></script>
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




<!--主体部分开始-->
<div class="container">

<!--引入文章list开始-->
     <!--随机文章list开始-->
     <?php if(is_array($art) || $art instanceof \think\Collection): $i = 0; $__LIST__ = $art;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
      <div class="row">
          <div class="col-xs-12">
              <div class="panel panel-primary" style="border:0;">
                  <div class="panel-heading" style="background-color:#212121;border:0">
                      <h3 class="panel-title" ><span class="glyphicon glyphicon-book">&nbsp;</span><?php echo $vo['title']; ?></h3>                      
                      <span class="label label-default" style="float: right;margin-top: -20px;line-height: 15px;">
                        <?php switch($vo['big_cid']): case "-1": ?>WEB开发<?php break; case "-2": ?>WEB渗透<?php break; case "-3": ?>其他技术<?php break; case "-4": ?>碎念<?php break; endswitch; ?>
                      </span>
                    <div class=" hidden-xs hidden-sm">
                      <span class="label label-default" style="float: right;margin-top: -20px;margin-right:10px;line-height: 15px;">
                          <?php echo $vo['addtime']; ?>
                      </span>
                      <span class="label label-default" style="float: right;margin-top: -20px;margin-right:10px;line-height: 15px;">作者：<?php echo $vo['author']; ?></span>
                    </div>
                  </div>
                  <div class="panel-body" style="background-color:#DBDBDB;">
                      <div class="row">
                          <div class="hidden-xs hidden-sm col-md-2 col-lg-2">
                                <a href="#" onclick="return false;" class="thumbnail read_all" value="<?php echo $vo['aid']; ?>--<?php echo $top_name; ?>">
                                    <img src="<?php echo $vo['title_pic']; ?>"
                                         alt="标题图片" style="height:110px;">
                                </a>
                          </div>
                          <div class="col-xs-12 col-sm-12 col-md-10 col-lg-10 c-list">
                              <?php echo mb_substr(strip_tags($vo['content']),0,300,'utf8'); ?>
                          </div>
                          <span class="label label-info read_all" style="float: right;margin-top: 3px;margin-right: 20px;cursor:pointer;" value="<?php echo $vo['aid']; ?>--<?php echo $top_name; ?>">阅读全文</span>
                      </div>
                  </div>
              </div>
          </div>
      </div>
      <?php endforeach; endif; else: echo "" ;endif; ?>
      <!--随机文章list结束-->
<!--引入文章list结束-->
<?php echo $art->render(); ?>


</div>
<!--主体部分结束-->



<script type="text/javascript">
	//thought页面的list的阅读全文开始
	$('.read_all').click(function(){
		var aid=$(this).attr('value').split("--");
		var url="<?php echo url('index/Index/big_read',['aid'=>'re_aid','top_name'=>'re_top']); ?>";
		var true_url=url.replace("re_aid",aid[0]);
		var true_url=true_url.replace("re_top",aid[1]);
		window.open(true_url);
	});
	//thought页面的list的阅读全文结束
</script>

</body>
</html>