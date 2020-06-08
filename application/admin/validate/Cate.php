<?php
	namespace app\admin\validate;
	use think\Validate;

	/**
	 * 
	 */
	class Cate extends Validate
	{
		
		protected $rule=[
				'cname'=>'require|max:30|unique:category',
				'sort'=>'require|number|between:0,99',
				'pid'=>'require|number|between:-3,127',
		  ];

		protected $message=[
			'cname.require'=>'还没写分类名称的哦~',
			'cname.max'=>'你填的名称太长啦~',
			'cname.unique'=>'此分类已经存在了哦~',
			'sort.require'=>'排序也是必须的啦~',
			'sort.number'=>'排序当然是数字啊┻━┻︵╰(‵□′)╯︵┻━┻',
			'sort.between'=>'都说了排序范围0~99！(估计是没看小字部分ヽ(｀⌒´)ノ)',
			
		  ];

	}
