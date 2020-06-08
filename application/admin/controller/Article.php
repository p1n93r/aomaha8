<?php
	namespace app\admin\controller;

	/**
	 * 
	 */
	class Article extends Base
	{
		//add开始
		public function add(){
			if(!request()->isPost()){
					//查询所有栏目
					$res=\think\Db::name('category')->select();
					//二级栏目
					foreach ($res as $key => $value) {
							$parent_id=$value['pid'];
							if ($parent_id=='-1'||$parent_id=='-2'||$parent_id=='-3') {
								$has=\think\Db::name('category')->where('pid',$value['cid'])->select();
								if (!empty($has)) {
									$res[$key]['show']='0';
								}else{
									$res[$key]['show']='1';
								}
							}
							if($parent_id=='-1'){
								$res[$key]['son']['cname']="WEB开发";
							}elseif ($parent_id=='-2') {
								$res[$key]['son']['cname']="WEB渗透";
							}elseif ($parent_id=='-3') {
								$res[$key]['son']['cname']="其他技术";
							}else{
								$son=\think\Db::name('category')->where(['cid'=>$parent_id,])->find();
								$res[$key]['son']=$son;
								$res[$key]['show']='1';
							}
						}
					//var_dump($res);
					$this->assign('cate',$res);
					return $this->fetch('Article/add');
				}
			else{
				$data=input('post.');
				$data['content']=$_POST['content'];
				$validate=\think\Loader::validate('Article');
				//var_dump($data);
				if($validate->check($data)){
						if($_FILES['title_pic']['tmp_name']){
			    			//获取表单上传的文件
			    			$file = request()->file('title_pic');
						    $info = $file->validate(['size'=>3145728,'ext'=>'jpg,png,gif'])->move(ROOT_PATH.'public/upload/image/');
						    if($info){
						        $data['title_pic'] = '/upload/image/'.date('Ymd').'/'.$info->getFilename();
						        $judge=trim($data['big_cid']);
						 		if ($judge=='WEB开发') {
						 			$data['big_cid']='-1';
						 		}elseif ($judge=='WEB渗透') {
						 			$data['big_cid']='-2';
						 		}elseif ($judge=='其他技术') {
						 			$data['big_cid']='-3';
						 		}elseif ($judge=='碎念') {
						 			$data['big_cid']='-4';
						 		}
						        $data['addtime']=date("Y/m/d");
						        //var_dump($data);
						        //开始上传数据库咯
						        $res=\think\Db::name('article')->insert($data);
						        if($res){

						        	return $this->success('添加文章成功！＼(^ω^＼)');
						        }
						        else{
						        	return $this->error('意外添加失败｡･ﾟ･(ﾉД`)･ﾟ･｡');
						        }

						    }else{
						        // 上传失败返回错误信息
						        return $this->error($file->getError());
						    }
			    		}
						else{
							return $this->error('没选图片或者图片有点问题~ヽ(●-`Д´-)ノ');
						}
				}
				else{
					return $this->error($validate->getError());
				}

			}

		}
		//add结束


			//show开始
			public function show(){
				$res=\think\Db::name('Article')->select();
				foreach ($res as $key => $value) {
					if($value['cid']!='-4'){
						$cid_name=\think\Db::name('category')->where('cid',$value['cid'])->find();
						$res[$key]['cid']=$cid_name['cname'];
					}
					else{
						$res[$key]['cid']='碎念';
					}
				}
				//查询所有栏目
					$cate=\think\Db::name('category')->select();
					//二级栏目
					foreach ($cate as $key => $value) {
							$parent_id=$value['pid'];
							if ($parent_id=='-1'||$parent_id=='-2'||$parent_id=='-3') {
								$has=\think\Db::name('category')->where('pid',$value['cid'])->select();
								if (!empty($has)) {
									$cate[$key]['show']='0';
								}else{
									$cate[$key]['show']='1';
								}
							}
							if($parent_id=='-1'){
								$cate[$key]['son']['cname']="WEB开发";
							}elseif ($parent_id=='-2') {
								$cate[$key]['son']['cname']="WEB渗透";
							}elseif ($parent_id=='-3') {
								$cate[$key]['son']['cname']="其他技术";
							}else{
								$son=\think\Db::name('category')->where(['cid'=>$parent_id,])->find();
								$cate[$key]['son']=$son;
								$cate[$key]['show']='1';
							}
						}
				$this->assign('cate',$cate);
				$this->assign('res',$res);
				return $this->fetch('Article/show');
				
			}
			//show结束


			//edit开始
			public function edit(){
				$data=input('post.');
				$validate=$validate=\think\Loader::validate('Article');
				if ($validate->scene('edit')->check($data)) {
					if(!$_FILES['title_pic']['tmp_name']){
						return $this->error('你还没选标题图片的呢(｀ﾛ´)');
					}
					else{
						//获取原数据
						$edit=\think\Db::name('article')->where('aid',$data['aid'])->find();
						if(!empty($edit)){
							//先删除原来的标题图片
							$del_path=ROOT_PATH.'public/'.$edit['title_pic'];
							if(file_exists($del_path)){
						        unlink($del_path);
						        $file = request()->file('title_pic');
						    	$info = $file->validate(['size'=>3145728,'ext'=>'jpg,png,gif'])->move(ROOT_PATH.'public/upload/image/');
						    	if($info){
						    		$data['title_pic'] = '/upload/image/'.date('Ymd').'/'.$info->getFilename();
						    		$judge=trim($data['big_cid']);
							 		if ($judge=='WEB开发') {
							 			$data['big_cid']='-1';
							 		}elseif ($judge=='WEB渗透') {
							 			$data['big_cid']='-2';
							 		}elseif ($judge=='其他技术') {
							 			$data['big_cid']='-3';
							 		}elseif ($judge=='碎念') {
							 			$data['big_cid']='-4';
							 		}
							 		//开始更新数据咯
							 		$res=\think\Db::name('article')->update($data);
							        if($res){
							        	return $this->success('更新成功！＼(^ω^＼)');
							        }
							        else{
							        	return $this->error('意外更新失败｡･ﾟ･(ﾉД`)･ﾟ･｡');
							        }
						    	}
						    	else{
						    		return $this->error($file->getError());
						    	}
						    }
						    else{
						        return $this->error('原来的标题图片不见了Σ(●ﾟдﾟ●)');
						    }
							return $this->success('修改成功！( ˘ ³˘)');
						}
						else{
							return $this->error('数据异常Σ(●ﾟдﾟ●)');
						}
					}
				}
				else{
					return $this->error($validate->getError());
				}

			}
			//edit结束
			
			//delete开始
			public function delete(){
				$aid=input('aid');
				$res=\think\Db::name('article')->where('aid',$aid)->find();
				if (empty($res)) {
					return $this->error('数据异常Σ(●ﾟдﾟ●)');
				}
				else{
					$del_info=\think\Db::name('article')->where('aid',$aid)->find();
					$del=\think\Db::name('article')->where('aid',$aid)->delete();
					//删除评论
					$del_comment=\think\Db::name('comment')->where('aid',$aid)->delete();
					if ($del) {
						if (preg_match_all('/<img.*?src=[\"|\']?(.*?)[\"|\']?\s.*?>/i', $del_info['content'], $matches)) {
						    foreach ($matches[1] as $key => $value) {
						    		$edit_pic=ROOT_PATH.'public/'.$value;
						    		if (file_exists($edit_pic)) {
						    			unlink($edit_pic);
						    		}						
							    								    	
						    	}
						}
						$del_path=ROOT_PATH.'public/'.$del_info['title_pic'];
						unlink($del_path);
						return $this->success('删除成功ヾ(*´∀｀*)ﾉ');
					}
					else{
						return $this->error('意外删除失败｡･ﾟ･(ﾉД`)･ﾟ･｡');
					}
				}
			}
			//delete结束














	}