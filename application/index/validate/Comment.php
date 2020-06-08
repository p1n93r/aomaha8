<?php
	namespace app\index\validate;
	use think\Validate;

	/**
	 * 
	 */
	class Comment extends Validate
	{
		protected $rule=[
			'user'=>'require|max:20',
			'co_time'=>'require|date',
			'content'=>'require|max:150',
			'aid'=>'require|number',
			'level'=>'require|number',
			'pid'=>'require|number',
		];
		
		protected $message=[
			'user.require'=>'请登录后进行评论ヽ(｀⌒´)ノ',
			'user.max'=>'评论用户信息异常',
			'co_time.require'=>'评论时间数据异常',
			'co_time.date'=>'评论时间数据异常',
			'content.require'=>'评论内容不能为空',
			'content.max'=>'评论内容字数超出限制',
			'aid.require'=>'非法操作001',
			'aid.number'=>'非法操作002',
			'level.require'=>'非法操作003',
			'level.number'=>'非法操作004',
			'pid.require'=>'非法操作005',
			'pid.number'=>'非法操作006',
		];
	}