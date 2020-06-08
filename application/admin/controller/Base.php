<?php
	 namespace app\admin\controller;
	 use think\Controller;

	 /**
	  * 
	  */
	 class Base extends Controller
	 {
	 	
	 	public	function _initialize()
	 	{
	 		if(session('admin')!=='true'){
            return $this->error('请先登录系统',url('index/User/login'));
       		}
	 	}




	 }