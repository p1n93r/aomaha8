<?php
	namespace app\admin\controller;

	/**
	 * 
	 */
	class NoticeInfo extends Base
	{
		
		public function add()
		{
			if(request()->isPost()){
				$data=input('post.');
				$validate=\think\Loader::validate('NoticeInfo');
				if($validate->check($data)){
					$Data=[
						'content'=>$data['content'],
						'sort'=>$data['sort'],
					];
					$res=\think\Db::name('notice')->insert($Data);
					if($res){
				  		return $this->success('添加成功！');
				  	}else{
				  		return $this->error('添加失败！');
				  	}
				}
				else{
					return $this->error($validate->getError());
				}

			}//if(request()->isPost())--end
				return $this->fetch('NoticeInfo/add');		
		}
		//add结束



		public function show(){
			$res=\think\Db::name('notice')->order('sort desc')->select();
				$this->assign('notice',$res);
				//var_dump($res);
				return $this->fetch('NoticeInfo/show');
		}
		//show结束
		//
		public function delete(){
			$id=input('id');
			$res=\think\Db::name('notice')->where('noid',$id)->find();
			//var_dump($res);
			if(!empty($res)){
				$del=\think\Db::name('notice')->where('noid',$res['noid'])->delete();
				if($del){
					return $this->success('删除成功！~');
				}
				else{
					return $this->error('删除失败=-=');
				}
			}
			else{
				return $this->error('数据异常！！！');
			}

		}


	}
	//notice控制器结束