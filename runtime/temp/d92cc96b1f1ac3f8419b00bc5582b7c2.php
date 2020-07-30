<?php if (!defined('THINK_PATH')) exit(); /*a:6:{s:67:"/www/wwwroot/public/../application/index/view/Index/cate_index.html";i:1596032527;s:65:"/www/wwwroot/public/../application/index/view/Public/top_nav.html";i:1596032529;s:73:"/www/wwwroot/public/../application/index/view/Public/cate_index_main.html";i:1596032528;s:66:"/www/wwwroot/public/../application/index/view/Public/top_code.html";i:1596032529;s:70:"/www/wwwroot/public/../application/index/view/Public/article_list.html";i:1596032527;s:64:"/www/wwwroot/public/../application/index/view/Public/buttom.html";i:1596032528;}*/ ?>
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
<link rel="stylesheet" href="__CSS__/cate_index.css">
<script type="text/javascript" src="__JS__/basic.js"></script>
<script type="text/javascript" src="__JS__/cate_index.js"></script>
<script type="text/javascript" src="__JS__/jquery.nicescroll.min.js"></script>
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


<!--引入主体开始-->
<!--主体部分开始-->
<div class="container">
	<!--顶部特效开始-->
	<!--栏目顶部开始-->
	<?php if($top_name == 'doWeb'): ?>
		<div class="c-cate-top hidden-xs">
			<div id="c-cate-top-one">
				<p>1</p><p>2</p><p>3</p>
			</div>
			<div id="c-cate-top-two">
	        	<p>
		        	<span style="color:#FF4040">&lt;</span>?<span style="color:#7B51B2">php</span></br>
		        	&emsp;&emsp;<span style="color:#56D8EF">echo</span><span style="color:#B8860B"> 'The quieter you become,</br>
		        	&emsp;&nbsp;&emsp;&emsp;&nbsp;&emsp;the more you are able to hear.'</span>;
	            </p>
	       	</div>
	    </div>
    <?php endif; if($top_name == 'inWeb'): ?>
		<div class="c-cate-top hidden-xs">
			<div id="c-cate-top-one">
				<p>1</p><p>2</p><p>3</p>
			</div>
			<div id="c-cate-top-two">
	        	<p>
		        	<span style="color:#FF4040">&lt;</span>?<span style="color:#7B51B2">php</span></br>
		        	&emsp;&emsp;<span style="color:#FF4040">@</span><span style="color:#56D8EF">eval</span>($_POST[
		        	<span style="color:#B8860B">'What you see is just what others want you see.'</span>]);</br>
		        	&nbsp;&nbsp;&nbsp;?<span style="color:#FF4040">&gt;</span>
	            </p>
	       	</div>
	    </div>
    <?php endif; if($top_name == 'other'): ?>
		<div class="c-cate-top hidden-xs">
			<div id="c-cate-top-one">
				<p>1</p><p>2</p><p>3</p>
			</div>
			<div id="c-cate-top-two">
	        	<p>
		        	#include<span style="color:#FF4040"> &lt;iostream&gt;</span></br>
		        	<span style="color:#7CCD7C">using </span>namespace<span style="color:#56D8EF"> std</span><span style="color:#858585">;</span></br>
		        	int<span style="color:#56D8EF"> main</span><span style="color:#B8860B">(){</span><span>&emsp;&nbsp;&emsp;&emsp;&nbsp;&emsp;后面都不会了&nbsp;&nbsp;︿(￣︶￣)～</span>
	            </p>
	       	</div>
	    </div>
    <?php endif; ?>
	<!--栏目顶部结束-->
	<!--顶部特效开始-->
	
	
	
	
		<div class="row">
			<!--左侧导航栏开始-->
			
				<div class="col-lg-2 col-md-2 col-sm-3 hidden-xs" >			
						<div id="left-nav">
								<div class="col-md-12 col-lg-12" style="padding-left: 0;padding-right: 0" id="list_srcoll">
									<ul id=left-list>
										<?php if(is_array($cate) || $cate instanceof \think\Collection): $i = 0; $__LIST__ = $cate;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
										<li>
											<a <?php if(!(empty($vo['son']) || ($vo['son'] instanceof \think\Collection && $vo['son']->isEmpty()))): ?>href="#show<?php echo $vo['cid']; ?>" data-toggle="collapse"
											<?php else: ?>style="cursor:pointer"<?php endif; ?> id="local--<?php echo $vo['cid']; ?>">
												<i class="glyphicon glyphicon-leaf"></i>
												<?php echo $vo['cname']; if(!(empty($vo['son']) || ($vo['son'] instanceof \think\Collection && $vo['son']->isEmpty()))): ?>
												<i class="glyphicon glyphicon-chevron-down pull-right" style="margin-right: 15px;margin-top: 15px;">
												</i>
												<!--这只是一个标记（方便选择器）-->
												<span><span>
												<?php endif; ?>
											</a>
										</li>
												<?php if(!(empty($vo['son']) || ($vo['son'] instanceof \think\Collection && $vo['son']->isEmpty()))): ?>
												<li id="show<?php echo $vo['cid']; ?>" class="collapse">
													<?php if(is_array($vo['son']) || $vo['son'] instanceof \think\Collection): $i = 0; $__LIST__ = $vo['son'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo1): $mod = ($i % 2 );++$i;?>
													<a style="cursor:pointer" data-toggle="collapse" class="collapse c-son" id="local--<?php echo $vo1['cid']; ?>">
														<i class="glyphicon glyphicon-flash"></i>
														<?php echo $vo1['cname']; ?>
													</a>
													<?php endforeach; endif; else: echo "" ;endif; ?>
												</li>
												<?php endif; endforeach; endif; else: echo "" ;endif; ?>
									</ul>
							    </div>		
						</div>
				</div>
			
			<!--左侧导航栏结束-->

			<!--右侧显示区域开始-->
				<div class="col-lg-10 col-md-10 col-sm-9 col-xs-12" id="show-article" style="">
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
				</div>
			<!--右侧显示区域结束-->
		</div>
</div>
<!--主体部分结束-->

<!--引入主体结束-->
<div style="text-align:center;margin-bottom:0">
  <p style="font-size:12px;padding-top:5px;color:#939393;margin-bottom:0">备案号:&nbsp;<a  target="_blank" href="http://www.miibeian.gov.cn" style="display:inline-block;text-decoration:none;color:#939393;">津ICP备18007905号-1</a></p>
  <p style="height:20px;line-height:20px;margin-top:3px;"><a target="_blank" href="http://www.beian.gov.cn/portal/registerSystemInfo?recordcode=12011102000379" style="display:inline-block;text-decoration:none;color:#939393;"><img src="__STATIC__/pic/gov.png"/>&nbsp;津公网安备 12011102000379号</a></p>
</div>


<!--js部分开始-->
<script language="javascript" type="text/javascript">
//此部分与模板渲染冲突，不便放置他处

		//阅读全文开始
   		$('.read_all').click(function(){  			
   			var aid=$(this).attr('value').split("--");
   			//alert(aid[0]);
   			$('#show-article').empty();
			$('#show-article').load("<?php echo url('index/Index/small_show'); ?>",{'aid':aid[0]});
   		});
   		//阅读全文结束
   		//侧边导航栏list开始
   		$("[id^='local']:not(:has(span))").click(function(){
   			var cid=$(this).attr("id").split("--")[1];
   			$('#show-article').empty();
			$('#show-article').load("<?php echo url('index/Index/local_list'); ?>",{'cid':cid});
   		});
   		//侧边导航栏list结束
     
   //滚动条  
   $(document).ready(function(){

     $("#show-article").niceScroll({cursorcolor:"#008B8B",
                                    hwacceleration: true,
                                                         });


   });

</script>

</body>
</html>