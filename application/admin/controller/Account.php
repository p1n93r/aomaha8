<?php
	namespace app\admin\controller;


	/**
	 * 
	 */
	class Account extends Base
	{
		
		public function add(){
			if(request()->isPost()){
				$data=input('post.');
				$validate=\think\Loader::validate('Account');
				if($validate->check($data)){
					$Data=[
						'name'=>$data['name'],
						'password'=>md5($data['password']),
					];
					$res=\think\Db::name('user')->insert($Data);
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
				return $this->fetch('Account/add');		
		}



		public function show(){
				$res=\think\Db::name('user')->select();
				$this->assign('user',$res);
				//var_dump($res);
				return $this->fetch('Account/show');

		}


		public function edit(){
			$data=input('post.');
			$validate=\think\Loader::validate('Account');
			if($validate->check($data)){
				$user=\think\Db::name('user')->where('id',$data['id'])->select();
				if(!empty($user)){
					$Data=[
						'name'=>$data['name'],
						'password'=>md5($data['password']),
					];
					$edit=\think\Db::name('user')->where('id',$data['id'])->update($Data);
					if($edit){
						 return $this->success('修改成功了耶~~');
						}
					else{
						  return $this->error('修改失败=-=');
					}	
				}
				else{
					return $this->error('数据异常！！！');
				}
			}
			else{
				return $this->error($validate->getError());
			}
		}



		public function delete(){
			$id=input('id');
			$res=\think\Db::name('user')->where('id',$id)->find();
			//var_dump($res);
			if(!empty($res)){
				$del=\think\Db::name('user')->where('id',$res['id'])->delete();
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