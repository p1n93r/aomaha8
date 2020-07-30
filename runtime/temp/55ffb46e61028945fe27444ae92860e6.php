<?php if (!defined('THINK_PATH')) exit(); /*a:5:{s:62:"/www/wwwroot/public/../application/index/view/Index/index.html";i:1596032527;s:65:"/www/wwwroot/public/../application/index/view/Public/top_nav.html";i:1596032529;s:69:"/www/wwwroot/public/../application/index/view/Index/index_spread.html";i:1596032527;s:70:"/www/wwwroot/public/../application/index/view/Public/article_list.html";i:1596032527;s:64:"/www/wwwroot/public/../application/index/view/Public/buttom.html";i:1596032528;}*/ ?>
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
<script type="text/javascript" src="__JS__/basic.js"></script>
<script type="text/javascript" src="__JS__/index_must.js"></script>
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
<div class="container">

<!--应引入首页的推文开始-->
      <!--公告栏开始-->
	  <?php if(!(empty($notice) || ($notice instanceof \think\Collection && $notice->isEmpty()))): ?>
      <div class="row">
          <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
              <div class="alert alert-info alert-success">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true"><span class="glyphicon glyphicon-remove-circle"></span></button>
                      <span class="glyphicon glyphicon-bullhorn">&nbsp;</span><?php echo $notice['content']; ?>
              </div>
          </div>
      </div>
	  <?php endif; ?>
      <!--公告结束-->

      <!--置顶文章开始-->
      <div class="row">
        <!--轮播开始-->
          <div class="hidden-xs hidden-sm col-md-4 col-lg-4">              
                <div id="myCarousel" class="carousel slide" data-ride="carousel">
                      <!-- 轮播（Carousel）指标 -->
                      <ol class="carousel-indicators">
                        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                        <li data-target="#myCarousel" data-slide-to="1"></li>
                        <li data-target="#myCarousel" data-slide-to="2"></li>
                      </ol>   
                      <!-- 轮播（Carousel）项目 -->
                      <div class="carousel-inner">
                        <?php if(is_array($top) || $top instanceof \think\Collection): $i = 0; $__LIST__ = $top;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo1): $mod = ($i % 2 );++$i;?>
                        <div class="item <?php if($key == 0): ?>active<?php endif; ?>">
                          <a class="read_all" value="<?php echo $vo1['aid']; ?>--<?php echo $top_name; ?>" style="cursor:pointer">
                            <img src="<?php echo $vo1['title_pic']; ?>" alt="First slide" style="height:160px;">
                          </a>
                          <div class="carousel-caption"><?php echo $vo1['title']; ?></div>
                        </div>
                       <?php endforeach; endif; else: echo "" ;endif; ?>
                        
                      </div>
                      <!-- 轮播（Carousel）导航 -->
                      <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
                        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                      </a>
                      <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
                        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                      </a>
                </div>
          </div>
          <!--轮播结束-->

          <!--置顶的right开始-->
          <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
                <div class="panel panel-primary" style="border:0">
                    <div class="panel-heading" style="border:0;background-color:#080808">
                        <h3 class="panel-title"><span class="glyphicon glyphicon-fire"></span>&nbsp;推荐文章</h3>
                    </div>
                    <ul class="list-group" id="c-top-left" >
                      <?php if(is_array($top) || $top instanceof \think\Collection): $i = 0; $__LIST__ = $top;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                          <li class="list-group-item">
                            <div class="c-top"><?php echo $key+1; ?></div>
                            <span class="read_all" value="<?php echo $vo['aid']; ?>--<?php echo $top_name; ?>" style="cursor:pointer"><?php echo $vo['title']; ?></span>
                            <span class="label" style="float:right;background-color:#878787;"><?php echo $vo['addtime']; ?></span>
                          </li>
                      <?php endforeach; endif; else: echo "" ;endif; ?> 
                    </ul>
                </div>
          </div>
          <!--置顶的right结束-->
      </div>
      <!--置顶文章结束-->
<!--应引入首页的推文结束-->

<!--引入文章显示开始-->
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
<?php echo $art->render(); ?>
<!--引入文章显示结束-->
</div>
<!--首页主体部分结束-->
<div style="text-align:center;margin-bottom:0">
  <p style="font-size:12px;padding-top:5px;color:#939393;margin-bottom:0">备案号:&nbsp;<a  target="_blank" href="http://www.miibeian.gov.cn" style="display:inline-block;text-decoration:none;color:#939393;">津ICP备18007905号-1</a></p>
  <p style="height:20px;line-height:20px;margin-top:3px;"><a target="_blank" href="http://www.beian.gov.cn/portal/registerSystemInfo?recordcode=12011102000379" style="display:inline-block;text-decoration:none;color:#939393;"><img src="__STATIC__/pic/gov.png"/>&nbsp;津公网安备 12011102000379号</a></p>
</div>




<script type="text/javascript">
	//index页面的list的阅读全文开始
	$('.read_all').click(function(){
		var aid=$(this).attr('value').split("--");
		var url="<?php echo url('index/Index/big_read',['aid'=>'re_aid','top_name'=>'re_top']); ?>";
		var true_url=url.replace("re_aid",aid[0]);
		//alert(aid[1]);
		var true_url=true_url.replace("re_top",aid[1]);
		window.open(true_url);
	});
	//index页面的list的阅读全文结束
</script>

</body>
</html>