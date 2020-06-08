<?php 		
	namespace app\index\controller;
	use think\Controller;
	use app\admin\model\User as Users;


	
	class User extends Controller
	{
		
		public function login(){
			
			return $this->fetch('User/login');
		}

		public function checkPass(){
			  $login=new Users;
			  $status=$login->login(input('userName'),md5(input('password')),input('code'));
			  //var_dump($status);
			  if($status=='0'){
			  	return $this->error('账号或密码有误！');
			  }elseif ($status=='1') {
			  	return $this->success('欢迎登陆Aomaha后台系统！',url('admin/Index/index'));
			  }elseif($status=='2'){
			  	return $this->success('欢迎登陆！正在跳转到首页',url('index/Index/index'));
			  }elseif($status=='4'){
			  	return $this->error('验证码为空');
			  }else{
			  	return $this->error('验证码错误');
			  }
		}


		public function out(){
			  session(null);//退出清空session
			  return $this->success('退出成功~',url('index/User/login'));//跳转到登录页面
		}

		//create开始
		public function create(){
			$data=input('post.');
				$validate=\think\Loader::validate('admin/Account');
				if($validate->check($data)){
					$Data=[
						'name'=>$data['name'],
						'password'=>md5($data['password']),
					];
					$res=\think\Db::name('user')->insert($Data);
					if($res){
				  		return $this->success('添加成功！',url('index/User/login'));
				  	}else{
				  		return $this->error('添加失败！');
				  	}
				}
				else{
					return $this->error($validate->getError());
				}
		}
		//create结束

	}
