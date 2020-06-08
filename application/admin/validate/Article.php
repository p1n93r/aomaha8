<?php
	namespace app\admin\validate;
	use think\Validate;

	/**
	 * 
	 */
	class Article extends Validate{
		protected $rule=[
			'title'=>'require|max:50',
			'author'=>'require|max:20',
			'keywords'=>'require|max:50',
			'is_top'=>'number|require|between:0,1',
			'cid'=>'require|number|between:-4,127',
			'big_cid'=>'require|max:12',
			'sort'=>'require|max:9|number',
			'content'=>'require',
			
		];
		protected $message=[
			'title.require'=>'你还没写标题的呢=-=',
			'title.max'=>'你写的标题太长了=-=',
			'author.require'=>'你还没写作者是谁呢=-=',
			'author.max'=>'就没见过这么长的作者=-=',
			'keywords.max'=>'关键词也不要这么详细啊=-=',
			'keywords.require'=>'关没写关键词的呢=-=',
			'is_top.require'=>'数据异常(っ °Д °;)っ',
			'is_top.number'=>'数据异常(っ °Д °;)っ',
			'is_top.between'=>'数据异常(っ °Д °;)っ',
			'cid.between'=>'数据异常(っ °Д °;)っ',
			'cid.require'=>'数据异常(っ °Д °;)っ',
			'cid.number'=>'数据异常(っ °Д °;)っ',
			'big_cid.require'=>'数据异常(っ °Д °;)っ',
			'big_cid.max'=>'数据异常(っ °Д °;)っ',
			'sort.number'=>'排序是数字呢=-=',
			'sort.require'=>'排序也是必须的呢',
			'sort.max'=>'排序是天文数字了呢=-=',
			'content.require'=>'你还没写文章内容的呢=-=',
		];

		protected $scene=[
			'edit'=>['title','author','keywords','is_top','cid','big_cid','sort'],
		];
		
	}