<?php
	namespace app\admin\model;
	use think\Model;

	/**
	 * 
	 */
	class User extends Model
	{
		//如果密码或者用户名不对就返回0；登陆成功，为admin返回1，普通用户返回2,验证码错误返回3，验证码空返回4
		public function login($name,$password,$code)
		{	
			if(empty($code)){
				return 4;
			}
			$captcha = new \think\captcha\Captcha();
	        if(!$captcha->check($code)){
	            return 3;
	        }
			$res=\think\Db::name('user')->where('name',$name)->where('password',$password)->find();
			if(empty($res)){
				return 0;
			}
			else{
					//登陆成功设置session
					\think\Session::set('id',$res['id']);
                	\think\Session::set('name',$res['name']);
				if($res['is_admin']){
					\think\Session::set('admin','true');
					return 1;
				}else{
					return 2;
				}
			}
		}





	}