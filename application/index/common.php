<?php
	function comment_search($aid,$pid){
		$comment_list=array();
		$first_list=\think\Db::name('comment')->where('aid',$aid)->where('pid',$pid)->select();
		foreach ($first_list as $key => $value) {
			$comment_list[]=$value;		//主级评论赋值
			$res=\think\Db::name('comment')->where('aid',$aid)->where('pid',$value['coid'])->select();
			//var_dump($res);die;
			if (!empty($res)) {
				$son=comment_search($aid,$value['coid']);
				foreach ($son as $key1 => $value1) {
					$comment_list[]=$value1;
				}
			}
		}
		return $comment_list;
	}