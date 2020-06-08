<?php
	namespace app\admin\controller;

		class Index extends Base
	{
		
		function index(){	
			return $this->fetch('Index/index');
		}




	}