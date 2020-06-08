<?php
	namespace app\admin\validate;
	use think\Validate;


	/**
	 * 
	 */
	class NoticeInfo extends Validate
	{
		
		protected $rule=[
			'content'=>'require|max:90',
			'sort'=>'require|number',
		];

		protected $message=[
			'content.require'=>'没写内容也ヽ(｀⌒´)ノ',
			'content.max'=>'都说了30个汉字~~',
			'sort.require'=>'排序没写的啦∠( ﾟωﾟ)／',
			'sort.number'=>'排序是数字的啦∠( ﾟωﾟ)／',
		];
	}