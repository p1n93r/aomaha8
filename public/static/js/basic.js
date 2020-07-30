  //0-开始
  $(document).ready(function(){
    
    //1-导航栏的动态改变高度
        $(window).scroll(function(e) {
            //若滚动条离顶部大于100元素
            if($(window).scrollTop()>100){
                $('#c-header').stop().animate({'padding-top':'5px','padding-bottom':'5px'},100);
                $('.c-mobile-nav').stop().animate({'height':'61px'},100)
            }else{
                $('#c-header').stop().animate({'padding-top':'0px','padding-bottom':'0px'},100);
                $('.c-mobile-nav').stop().animate({'height':'51px'},100)
            }
        });
    //1-结束
    //2-导航栏的滑块效果
        $('#c-moblie li').hover(function(){
               var m_width=$(this).width();
               var m_left=$(this).position().left;
               $('.c-mobile-nav').stop().animate({'left':m_left,'width':m_width},300);            
        },function(){
                /*移开时滑块回到有c-active的位置*/
                var index_width=$('.c-active').width();
                var index_left=$('.c-active').position().left;    
                $('.c-mobile-nav').stop().animate({'left':index_left,'width':index_width},300);
        });
    //2-结束
    //3-为有c-active类的导航项添加特殊样式(用css貌似会被bs的样式覆盖)
        $('.c-active a').css('color','#fff');
        var index_width=$('.c-active').width();
        var index_left=$('.c-active').position().left;
        $('.c-mobile-nav').css({'width':index_width,'left':index_left});
    //3-结束
    //4-背景特效
       !function () {
                function o(w, v, i) {
                    return w.getAttribute(v) || i
                }

                function j(i) {
                    return document.getElementsByTagName(i)
                }

                function l() {
                    var i = j("script"),
                        w = i.length,
                        v = i[w - 1];
                    return {
                        l: w,
                        z: o(v, "zIndex", -1),
                        o: o(v, "opacity", 0.8),
                        c: o(v, "color", "72,118,255"),
                        n: o(v, "count", 99)
                    }
                }

                function k() {
                    r = u.width = window.innerWidth || document.documentElement.clientWidth || document.body.clientWidth, n = u.height = window.innerHeight || document.documentElement.clientHeight || document.body.clientHeight
                }

                function b() {
                    e.clearRect(0, 0, r, n);
                    var w = [f].concat(t);
                    var x, v, A, B, z, y;
                    t.forEach(function (i) {
                        i.x += i.xa, i.y += i.ya, i.xa *= i.x > r || i.x < 0 ? -1 : 1, i.ya *= i.y > n || i.y < 0 ? -1 : 1, e.fillRect(i.x - 0.5, i.y - 0.5, 1, 1);
                        for (v = 0; v < w.length; v++) {
                            x = w[v];
                            if (i !== x && null !== x.x && null !== x.y) {
                                B = i.x - x.x, z = i.y - x.y, y = B * B + z * z;
                                y < x.max && (x === f && y >= x.max / 2 && (i.x -= 0.03 * B, i.y -= 0.03 * z), A = (x.max - y) / x.max, e.beginPath(), e.lineWidth = A / 2, e.strokeStyle = "rgba(" + s.c + "," + (A + 0.2) + ")", e.moveTo(i.x, i.y), e.lineTo(x.x, x.y), e.stroke())
                            }
                        }
                        w.splice(w.indexOf(i), 1)
                    }), m(b)
                }
                var u = document.createElement("canvas"),
                    s = l(),
                    c = "c_n" + s.l,
                    e = u.getContext("2d"),
                    r, n, m = window.requestAnimationFrame || window.webkitRequestAnimationFrame || window.mozRequestAnimationFrame || window.oRequestAnimationFrame || window.msRequestAnimationFrame || function (i) {
                        window.setTimeout(i, 1000 / 45)
                    },
                    a = Math.random,
                    f = {
                        x: null,
                        y: null,
                        max: 20000
                    };
                u.id = c;
                u.style.cssText = "position:fixed;top:0;left:0;z-index:" + s.z + ";opacity:" + s.o;
                j("body")[0].appendChild(u);
                k(), window.onresize = k;
                window.onmousemove = function (i) {
                    i = i || window.event, f.x = i.clientX, f.y = i.clientY
                }, window.onmouseout = function () {
                    f.x = null, f.y = null
                };
                for (var t = [], p = 0; s.n > p; p++) {
                    var h = a() * r,
                        g = a() * n,
                        q = 2 * a() - 1,
                        d = 2 * a() - 1;
                    t.push({
                        x: h,
                        y: g,
                        xa: q,
                        ya: d,
                        max: 6000
                    })
                }
                setTimeout(function () {
                    b()
                }, 100)
            }();
    //4-结束  
    //5-body的背景颜色设定
          $('body').css('background-color','#3B3B3B'); 
    //5-结束
    //判断登陆状态开始
          var name=$('#c-session').html();
          if(name!==""){
            $('#c-aa').hide();
          }else{
            $('#tuichu').hide();
          }
    //判断登陆状态结束
    
//0-结束
  });