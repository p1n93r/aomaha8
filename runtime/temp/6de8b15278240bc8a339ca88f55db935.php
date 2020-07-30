<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:68:"/www/wwwroot/public/../application/index/view/Public/local_list.html";i:1596032528;}*/ ?>
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
                    <div class="hidden-xs hidden-sm">
                      <span class="label label-default" style="float: right;margin-top: -20px;margin-right:10px;line-height: 15px;">
                          <?php echo $vo['addtime']; ?>
                      </span>
                      <span class="label label-default" style="float: right;margin-top: -20px;margin-right:10px;line-height: 15px;">作者：<?php echo $vo['author']; ?></span>
                    </div>
                  </div>
                  <div class="panel-body" style="background-color:#DBDBDB;">
                      <div class="row">
                          <div class="hidden-xs hidden-sm col-md-2 col-lg-2">
                                <a href="#" onclick="return false;" class="thumbnail read_all" value="<?php echo $vo['aid']; ?>">
                                    <img src="<?php echo $vo['title_pic']; ?>"
                                         alt="标题图片" style="height:110px;">
                                </a>
                          </div>
                          <div class="col-xs-12 col-sm-12 col-md-10 col-lg-10 c-list">
                              <?php echo mb_substr(strip_tags($vo['content']),0,300,'utf8'); ?>
                          </div>
                          <span class="label label-info read_all" style="float: right;margin-top: 3px;margin-right: 20px;cursor:pointer;" value="<?php echo $vo['aid']; ?>">阅读全文</span>
                      </div>
                  </div>
              </div>
          </div>
      </div>
      <?php endforeach; endif; else: echo "" ;endif; ?>
      <!--随机文章list结束-->

    <script type="text/javascript">
        $(document).ready(function(){

          $('.read_all').click(function(){        
              var aid=$(this).attr('value');
              //alert(aid[0]);
              $('#show-article').empty();
              $('#show-article').load("<?php echo url('index/Index/small_show'); ?>",{'aid':aid});
          });

        });
    </script>