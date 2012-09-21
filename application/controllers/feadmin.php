<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Feadmin extends CI_Controller {
	
    function __construct() {
        parent::__construct();
        $this->load->model('fe_model');
		//$this->load->helper(array('form', 'url'));
    }
	
    function postsList() {
		$data['posts'] = $this->fe_model->page('posts', 'feadmin/index?',  @$_GET['per_page'], 3, 'id desc','category','posts.category = category.cid ');
		//$data['posts'] = $this->fe_model->pageJoin('posts', 'feadmin/index', 3, 3, 'posts.id desc','','');
		//print_r($data['posts']);
		$data['category'] = $this->fe_model->selectCate();
        $data['title_for_layout'] = 'My Posts';
		
        $this->layout->view('admin/postsView', $data);
    }
	
	
	function postsCreate(){
		// echo @$_POST['image'];
		// if(@$_POST['image'] != ""){	
			// $_POST['image'] = $this->fileUpdate();
		// }
		$_POST['image'] = $this->fileUpdate();
		$this->form_validation->set_rules('title','标题','required');
		$this->form_validation->set_rules('category','分类','required');
		//$this->form_validation->set_rules('content','内容','required');
		$this->form_validation->set_rules('addtime','时间','required');

		if($this->form_validation->run()==FALSE){
			
			//$data['class'] = $this->fe_model->p_select_order('plan_class', 'sort desc, cid asc');

			$this->load->view('admin/postsView');

		}else{
			$_POST['content'] = $_POST['editorValue'];
			unset($_POST['editorValue']);
			//print_r($_POST);
			$this->fe_model->insertForm('posts', $_POST);
			$this->success(POSTS.'添加成功', 'yes');
		
		}
	}
	
	
	function posts() {
		$where['id'] = $this->uri->segment(3,0);
		$num=$this->fe_model->numFormWhere('posts', $where);
		if($num == 0){
			$this->success('没有这篇文章', 'no');
		}
	
		$data['postsOne'] = $this->fe_model->selectFormWhere('posts',array('id'=>$this->uri->segment(3)));
		$data['category'] = $this->fe_model->selectCate();
        $data['title_for_layout'] = 'My Posts';
		
        $this->layout->view('admin/posts', $data);
    }
	
	
	function postsUpdate(){

		$where['id'] = $this->uri->segment(3,0);
		$num=$this->fe_model->numFormWhere('posts', $where);
		if($num!=0){

			$this->form_validation->set_rules('title','标题','required');
			$this->form_validation->set_rules('category','分类','required');
			$this->form_validation->set_rules('addtime','时间','required');
			
			if($this->form_validation->run()==FALSE){

				// $data['postsOne'] = $this->fe_model->selectFormWhere('posts',array('id'=>$this->uri->segment(3)));
				// $data['category'] = $this->fe_model->selectCate();
				// $data['title_for_layout'] = 'My Posts';
				$this->load->view('admin/postVews');

			}else{
				$postsOne = $this->fe_model->selectFormWhere('posts',$where);
				if($postsOne->image != ""){
					$file_path = 'uploads/img/'.$postsOne->image;
					unlink($file_path);
				}
				$_POST['image'] = $this->fileUpdate();
				$_POST['content'] = $_POST['editorValue'];
				unset($_POST['editorValue']);
				//print_r($_POST);
				$this->fe_model->updateForm('posts', $where, $_POST);
				$this->success(POSTS.'修改成功', 'yes');

			}	
		}
	
	}
	
	
	function postsDelete(){
		$where['id'] = $this->uri->segment(3,0);
		$num=$this->fe_model->numFormWhere('posts', $where);
		
		if($num != 0){
			$postsOne = $this->fe_model->selectFormWhere('posts',$where);
			if($postsOne->image != ""){
				$file_path = 'uploads/img/'.$postsOne->image;
				unlink($file_path);
			}
			$this->fe_model->deleteForm('posts',$where);
			
			$this->success(POSTS.'删除成功','yes');
		}
	
	}
	function postsDeletes(){
		
		print_r($delete = $_POST['checkbox']);
		if(isset($_POST['checkbox'])){
			while(list($key,$value)=each($delete)){
				$where['id']=$value;
				$postsOne = $this->fe_model->selectFormWhere('posts',$where);
				if($postsOne->image != ""){
					echo $file_path = 'uploads/img/'.$postsOne->image;
					unlink($file_path);
				}
				$this->fe_model->deleteForm('posts',$where);
			}
			$this->success(POSTS.'删除成功','yes');
		}
	
	}
	
	function postsSearch() {
		//echo $where['where']['category'] = $this->uri->segment(3,0);
		if($_GET['category'] != 0){
			$where['where']['category'] = $_GET['category'];
		}
		$where['like']['title'] = @$_GET['title'];
		$data['posts'] = $this->fe_model->pageWhere('posts', 'feadmin/postsSearch/?category='.$_GET['category'].'&title='.@$_GET['title'], @$_GET['per_page'], 2, $where, 'id desc','category','posts.category = category.cid ');
		//$data['posts'] = $this->fe_model->pageWhere('posts', 'feadmin/postsSearch/'.$this->uri->segment(3,0), 4, 2, $where, 'id desc','category','posts.category = category.cid ');
		//$data['posts'] = $this->fe_model->pageJoin('posts', 'feadmin/index', 3, 3, 'posts.id desc','','');
		//print_r($data['posts']);
		$data['category'] = $this->fe_model->selectCate();
		$data['categoryOne'] = $this->fe_model->selectFormWhere('category',array('cid'=>$this->uri->segment(3)));
        $data['title_for_layout'] = 'My Posts';
		
        $this->layout->view('admin/postsView', $data);
    }
	
	
	function categoryList() {
		
        $data['category'] = $this->fe_model->selectCate();

		//print_r($data['category']);
        $data['title_for_layout'] = 'My Ueditor';
		
        $this->layout->view('admin/categoryList', $data);
    
	}
	
	function categoryCreate(){

		$this->form_validation->set_rules('name','导航名称','required');

		if($this->form_validation->run()==FALSE){
			//$data['class'] = $this->fe_model->p_select_order('plan_class', 'sort desc, cid asc');
			$this->load->view('admin/categoryList');
		}else{
			if($_POST['cid'] != 0){
				// print_r($_POST);
				// echo $_POST['id'];
				$category = $this->fe_model->selectFormWhere('category',array('cid'=>$_POST['cid']));
				$_POST['pid'] = $category->cid;
				$_POST['path'] = $category->path.'-'.$_POST['cid'];
				$_POST['cid'] = '';
				
			}else{
				$_POST['pid']  = 0;
				$_POST['path']  = 0;
			}

			$this->fe_model->insertForm('category', $_POST);
			$this->success(CATEGORY.'添加成功', 'yes');

		}


	}
	
	function category(){
		
		$data['title_for_layout'] = 'My Ueditor';
		$data['category'] = $this->fe_model->selectCate();
		$data['categoryOne'] = $this->fe_model->selectFormWhere('category',array('cid'=>$this->uri->segment(3)));
		
        $this->layout->view('admin/category', $data);
	
	}
	
	function categoryUpdate(){
	
		$where['cid'] = $this->uri->segment(3,0);
		$num=$this->fe_model->numFormWhere('category', $where);
		if($num!=0){

			$this->form_validation->set_rules('name','导航名称','required');
			
			if($this->form_validation->run()==FALSE){

				// $data['class'] = $this->p_model->p_select_order('plan_class', 'sort desc, cid asc');
				$data['category'] = $this->fe_model->selectCate();
				$data['categoryOne'] = $this->fe_model->selectFormWhere('category',array('cid'=>$this->uri->segment(3)));
				$this->load->view('admin/categoryList');

			}else{
				
				if($_POST['cid'] != 0){
					// print_r($_POST);
					// echo $_POST['id'];
					$category = $this->fe_model->selectFormWhere('category',array('cid'=>$_POST['cid']));
					$_POST['pid'] = $category->cid;
					$_POST['path'] = $category->path.'-'.$_POST['cid'];
					$_POST['cid'] = $this->uri->segment(3,0);
				
				}else{
					$_POST['pid']  = 0;
					$_POST['path']  = 0;
				}
				
				//array_splice($_POST, 0, 1);
				
				$this->fe_model->updateForm('category', $where, $_POST);
				//$this->fe_model->insertForm('category', $_POST);
				$this->success(CATEGORY.'修改成功', 'yes');

			}	
		}
	
	}
	
	function categoryDelete(){
		$where['cid'] = $this->uri->segment(3,0);
		$num=$this->fe_model->numFormWhere('category', $where);
		
		if($num != 0){
		
			$category = $this->fe_model->selectFormWhere('category',$where);
			$path = '-'.$this->uri->segment(3,0);
			$num1=$this->fe_model->numFormLikeIn('category', 'path', $path,'before');
			
			if($num1 == 0){
			
				$this->fe_model->deleteForm('category',$where);
				$this->success(CATEGORY.'删除成功','yes');
			
			}else{
			
				$this->success(CATEGORY.'删除失败,请先删除子栏目导航','no');	
			
			}
		}
	
	}
	
	
	
	
	
	
	function form(){
		
		 $this->layout->view('admin/form');
	}
	
	
	
	
	 function success($title, $status){

		$success['title']=$title;
		$success['status']=$status;
		
		$this->load->view('admin/success',$success);			

	}
	
	//上传图片
	function fileUpdate(){
		$config['upload_path'] = './uploads/img/';//绝对路径  
        $config['allowed_types'] = 'gif|jpg|png';//文件支持类型  
        $config['max_size'] = '0';
        $config['encrypt_name'] = true;//重命名文件  
        $this->load->library('upload',$config);  
  
        if ($this->upload->do_upload('image')) {  
            $upload_data = $this->upload->data();  
            return $upload_data['file_name'];  
        }  
        // else {
            // $this->upload->display_errors();  
            // $this->success('上传图片失败,请重新上传','no');	
        // }  
	}
	
	
	
}