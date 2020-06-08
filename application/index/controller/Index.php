<?php
	namespace app\index\controller;
	use think\Controller;



	class Index extends Controller{
		//首页操作
		public function index(){
			//随机查询文章（设计分页）
			$art=\think\Db::name('article')->order('sort asc')->paginate(5);
			//查询置顶文章
			$top=\think\Db::name('article')->where('is_top','1')->order('sort asc')->limit(3)->select();
			//通知
			$notice=\think\Db::name('notice')->order('sort desc')->limit(1)->find();
			//var_dump($top);
			$assign=array(
				'top_name'=>'index',//进入的栏目名称	
				'art'=>$art,	
				'top'=>$top,
				'notice'=>$notice,
			);
			$this->assign($assign);

			return $this->fetch('Index/index');
		}

		//其他栏目的操作
		public function category(){
				//接受栏目名称信息
				$top_name=input('top_name');
				//
				//查询cate信息及对应文章开始
				if ($top_name=='doWeb') {
					$big_cid='-1';
				}elseif($top_name=='inWeb'){
					$big_cid='-2';
				}elseif($top_name=='other'){
					$big_cid='-3';
				}elseif ($top_name=='thought') {
					$big_cid='-4';
					$art=\think\Db::name('article')->order('sort asc')->where('big_cid',$big_cid)->paginate(5);
					$this->assign('art',$art);
					$this->assign('top_name','thought');
					return $this->fetch('Index/thought');
				}else{
					//抛出404页面
					abort(404);
				}
				
					$cate=\think\Db::name('category')->where('pid',$big_cid)->order('sort asc')->select();
					foreach ($cate as $key => $value) {
						$son=\think\Db::name('category')->where('pid',$value['cid'])->select();
						$cate[$key]['son']=$son;
					}
					$this->assign('cate',$cate);
					$art=\think\Db::name('article')->order('sort asc')->where('big_cid',$big_cid)->select();
			
				//查询cate信息及对应文章结束
				//
				$assign=array(
					'top_name'=>$top_name,//进入的栏目名称
					'art'=>$art,
				);
				$this->assign($assign);
				return $this->fetch("Index/cate_index");

		}


		public function big_read(){
			$aid=input('aid');
			$res=\think\Db::name('article')->where('aid',$aid)->find();
			if(empty($res)){
				abort(404);
			}
			//调用公评论查询函数
			$comment_info=comment_search($aid,0);

			//游览量加一
			\think\Db::name('article')->where('aid',$aid)->setInc('click');
			$cid=$res['cid'];
			if($cid=='-4'){
				$cid_name['cname']='碎念';
			}else{
				$cid_name=\think\Db::name('category')->where('cid',$cid)->find();
			}
			$top_name=input('top_name');
			if ($top_name!='index'&&$top_name!='thought') {
				abort(404);
			}
			$assign=[
				'top_name'=>$top_name,
				'art'=>$res,
				'cid_name'=>$cid_name['cname'],
				'comment'=>$comment_info,
			];
			$this->assign($assign);
			return $this->fetch('Public/read_all');
			 
		}


		public function small_show(){
			$aid=input('aid');
			$res=\think\Db::name('article')->where('aid',$aid)->find();
			if(empty($res)){
				abort(404);
			}
			//调用公评论查询函数
			$comment_info=comment_search($aid,0);

			//游览量加一
			\think\Db::name('article')->where('aid',$aid)->setInc('click');
			$cid=$res['cid'];
			if($cid=='-4'){
				$cid_name['cname']='碎念';
			}else{
				$cid_name=\think\Db::name('category')->where('cid',$cid)->find();
			}
			$assign=[
				'art'=>$res,
				'cid_name'=>$cid_name['cname'],
				'comment'=>$comment_info,
			];
			$this->assign($assign);
			return $this->fetch('Public/small_show');
			
		}



		//local_list开始
		public function local_list(){
			$cid=input('cid');
			$list_cate=\think\Db::name('category')->where('cid',$cid)->find();
			if (empty($list_cate)) {
				abort(404);
			}
			else{
				$art=\think\Db::name('article')->order('sort asc')->where('cid',$cid)->select();
				$this->assign('art',$art);
				return $this->fetch('Public/local_list');
			}
		}
		//local_list结束

		public function search(){
			$key=input('search');
			$art=\think\Db::name('article')->order('sort asc')->where('keywords','like','%'.$key.'%')->select();
			if(empty($art)){
				return $this->error('咩有耶=-=');
			}
			else{
				$this->assign('top_name','index');
				$this->assign('art',$art);
				return $this->fetch('Index/search');
			}
			
		}

		public function comment(){
			$data=input('post.');
			//var_dump($data);die;
			$validate=\think\Loader::validate('index/Comment');
			if ($validate->check($data)) {
				$res=\think\Db::name('comment')->insert($data);
				if (empty($res)) {
					return $this->error('意外评论失败Σ(●ﾟдﾟ●)');
				}else{
					return $this->success('评论成功');
				}
			}
			else{
				return $this->error($validate->getError());
			}





		}






	}
	//finnal_end