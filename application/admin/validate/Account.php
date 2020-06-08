<?php
	namespace app\admin\validate;
	use think\Validate;


	/**
	 * 
	 */
	class Account extends Validate
	{
		
		protected $rule=[
			'name'=>'require|max:20|unique:user',
			'password'=>'require|max:20|alphaDash|min:8|confirm:repassword',
		];

		protected $message=[
			'name.require'=>'用户名都没填，你是认真的吗？？',
			'name.max'=>'都说了用户名最多20个字符(6个汉字)~~',
			'name.unique'=>'此用户名已存在~',
			'password.alphaDash'=>'是字符的啦（字母,数字,下(中)划线',
			'password.require'=>'不要密码的啊！',
			'password.max'=>'密码最长20个字符的啦~',
			'password.min'=>'密码最短8个字符的啦~',
			'password.confirm'=>'两次输入的密码不一致耶~~',
		];
	}