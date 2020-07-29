## 项目介绍
- 前端基于bootstrap开发，页面全是自己手写的，没有用到前端模板。
- 后台基于thinkptp5开发完成。
- 此项目是一个开源个人博客项目，经测试后上线运行。
- 此项目是本人大一写的，当初刚了解mvc以及web开发等，可能项目结构或者代码有诸多不优雅的地方~
- 项目体验地址：<a target="_blank" href="http://106.13.6.229/index.php">http://106.13.6.229/index.php</a>

**Notice:** 由于这个网站停服了一年多（现在又拿出来啦~），然后备份出了一些问题，网站中很多文章的图片已经丢失，所以打开网站很多图片看不到了~~

## 主要目录及文件
~~~
www  WEB部署目录（或者子目录）
├─application           应用目录
│  ├─admin        		后台管理目录
│  │  ├─validate		验证器目录
│  │  ├─controller      控制器目录
│  │  ├─model           模型目录
│  │  └─view            视图目录
│  │
│  ├─index        		前台展示模块目录
│  │  ├─validate		验证器目录
│  │  ├─controller      控制器目录
│  │  ├─view            视图目录
│  │  └─common.php		存放本模块公告函数（一个评论查询函数）
│  │
│  ├─config.php         公共配置文件
│  └─database.php       数据库配置文件
│
├─public                WEB目录（对外访问目录）
│  ├─upload          	文件上传目录
│  ├─index.php          入口文件
│  └─.htaccess          用于apache的重写
├─Data.sql				本网站的数据库
├─README.md             README 文件
~~~

## 注意
- 如果想在自己的服务器运行本项目，需要导入sql文件到你的数据库服务器，并且修改application/database.php文件。
- 后台用户名：Aomaha，密码：1234567890

## 运行截图
![首页][p0]  

<center><strong>首页</strong></center>

![栏目下][p1]  

<center><strong>栏目下</strong></center>

![后台登录页][p2]  

<center><strong>后台登录页</strong></center>

![后台添加文章页面][p3]  

<center><strong>后台添加文章页面</strong></center>

![后台管理文章页面][p4]  

<center><strong>后台管理文章页面</strong></center>

![404页面][p5]  

<center><strong>404页面</strong></center>




[p0]:./readme/首页.png
[p1]:./readme/类别下.png
[p2]:./readme/后台登录页.png
[p3]:./readme/后台添加文章页面.png
[p4]:./readme/后台管理文章页面.png
[p5]:./readme/404页面.png
