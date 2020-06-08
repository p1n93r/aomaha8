<?php
	namespace app\admin\controller;
	/**
	 * 
	 */
	class Cate extends Base{
		
	  public function index()
		{	
			$index=input('index');
			$res=\think\Db::name('category')->select();			
			if($index=='0'){
				foreach ($res as $key => $value) {
					if($value['pid']=='-1'||$value['pid']=='-2'||$value['pid']=='-3'){
						$art=\think\Db::name('article')->where('cid',$value['cid'])->select();
						if(!empty($art)){
							$res[$key]['show']='0';
						}else{
							$res[$key]['show']='1';
						}
					}
				}
				$this->assign("res",$res);			//模板赋值cate			 
				return $this->fetch('Cate/add');
			}elseif($index=='1') {
				foreach ($res as $key => $value) {
					$parent_id=$value['pid'];
					if($parent_id=='-1'){
						$res[$key]['son']['cname']="WEB开发";
					}elseif ($parent_id=='-2') {
						$res[$key]['son']['cname']="WEB渗透";
					}elseif ($parent_id=='-3') {
						$res[$key]['son']['cname']="其他技术";
					}else{
						$son=\think\Db::name('category')->where(['cid'=>$parent_id,])->find();
						$res[$key]['son']=$son;
					}
				}
				
				$this->assign("res",$res);			//模板赋值
				return $this->fetch('Cate/show');
			}
		}

		public function add(){
			if(request()->isPost()){
				//接受传来的数据
				$data=[
					'cname'=>input('name'),
					'sort'=>input('sort'),
					'pid'=>input('parent_id'),
				];	
				//实例化验证器			
				$validate=\think\Loader::validate('Cate');
				//首先调用验证器进行数据的验证，通过了才存入数据库
				if($validate->check($data)){
					$res=\think\Db::name('category')->insert($data);
					if($res){
						return $this->success('添加分类成功~');
					}else{
						return $this->error('添加栏目失败~');
					}
				}else{
					return $this->error($validate->getError());
				}
			}else{
					//如果不是post传过来的数据，可能是异常数据
					header("HTTP/1.0  404  Not Found");
					return $this->fetch(APP_PATH.'404.html');
			}		
		}

		public function delete(){
			if(request()->isPost()){
					$tag=input('data');	//接受传来的数据
					$res=\think\Db::name('category')->where('cid',$tag)->find();
					//数据集不为空时(表示存在此栏目)
					if(!empty($res)){
						$res1=\think\Db::name('category')->where('pid',$res['cid'])->select();
						if(!empty($res1)){
							foreach ($res1 as $key => $value) {
								//先删除二级栏目及栏目下的文章
									  $del_info=\think\Db::name('article')->where('cid',$value['cid'])->select();
									  foreach ($del_info as $key_c => $value_c) {
									  		//循环删除评论
									  		\think\Db::name('comment')->where('aid',$value_c['aid'])->delete();
									  }
								      \think\Db::name('article')->where('cid',$value['cid'])->delete();
								      \think\Db::name('category')->where('cid',$value['cid'])->delete();
								foreach($del_info as $k=>$v){      
								  if(preg_match_all('/<img.*?src=[\"|\']?(.*?)[\"|\']?\s.*?>/i', $v['content'], $matches)) {
									    foreach ($matches[1] as $key => $value) {
									    	$edit_pic=ROOT_PATH.'public/'.$value;
									    	unlink($edit_pic);
									    	}
									}
									$del_path=ROOT_PATH.'public/'.$v['title_pic'];
									unlink($del_path);
								}
							}
						}
						//接下来删除一级栏目
						\think\Db::name('category')->where('cid',$res['cid'])->delete();
						$del_info=\think\Db::name('article')->where('cid',$res['cid'])->select();
						foreach ($del_info as $key_c1 => $value_c1) {
								//循环删除评论
								\think\Db::name('comment')->where('aid',$value_c1['aid'])->delete();
						}
						if (!empty($del_info)) {
							 \think\Db::name('article')->where('cid',$res['cid'])->delete();
							 foreach($del_info as $k=>$v){      
								  if(preg_match_all('/<img.*?src=[\"|\']?(.*?)[\"|\']?\s.*?>/i', $v['content'], $matches)) {
									    foreach ($matches[1] as $key => $value) {
									    	$edit_pic=ROOT_PATH.'public/'.$value;
									    	unlink($edit_pic);
									    	}
									}
									$del_path=ROOT_PATH.'public/'.$v['title_pic'];
									unlink($del_path);
								}
						}
						//返回提示信息
						return $msg="栏目删除成功！";
					}else{
						//不存在栏目输出提示
						return $msg="不存在待删除栏目！";
					}
										
			}else{
				//如果不是post传过来的数据，可能是异常数据
					return $msg="数据异常！";
			}
		}

		public function edit(){
				//接受传来的数据
				$data=[
					'cname'=>input('cname'),
					'sort'=>input('sort'),
					'pid'=>input('pid'),
				];
				//实例化验证器			
				$validate=\think\Loader::validate('Cate');
				//首先调用验证器进行数据的验证
				if($validate->check($data)){
						$tag=input('cid');
						$res=\think\Db::name('category')->where('cid',$tag)->find();
						//数据集不为空时(表示存在此栏目)
					    if(!empty($res)){
					    	if($data['pid']=='-1'||$data['pid']=='-2'||$data['pid']=='-3'){
					    		$add=\think\Db::name('category')->where('cid',$res['cid'])->update($data);
						    	if($add){return $msg="修改成功";}else{return $msg="修改失败";}
					    	}else{
						    	$res1=\think\Db::name('category')->where('cid',$data['pid'])->select();
						    	if(empty($res1)||$res['cid']==$data['pid']){
						    		return $msg="修改所属分类的id不存在或者与本栏目的id重合！";
						    	}
						    	else{
						    		$add=\think\Db::name('category')->where('cid',$res['cid'])->update($data);
						    		if($add){return $msg="修改成功";}else{return $msg="修改失败";}
						    	}
						    }
					    }
						else{
							return $msg="数据异常！";
						}
						
				}else{
					return $msg="请检查修改的数据是否符合格式要求!!!";
				}
		



		}





	}