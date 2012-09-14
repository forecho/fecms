<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Feadmin extends CI_Controller {
	
    function __construct() {
        parent::__construct();
        $this->load->model('fe_model');
		
    }
	
    function index() {
		$data['posts'] = $this->fe_model->page('posts', 'feadmin/index', 3, 3, 'id desc');
		//print_r($data['posts']);
		//print_r($data['posts']['admin']);
		//echo count($data['posts']['admin']);
		$data['category'] = $this->fe_model->selectCate();
		//$data['categoryOne'] = $this->fe_model->selectFormWhere('category',array('id'=>$data['posts']['category']));
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
			if($_POST['id'] != 0){
				// print_r($_POST);
				// echo $_POST['id'];
				$category = $this->fe_model->selectFormWhere('category',array('id'=>$_POST['id']));
				$_POST['pid'] = $category->id;
				$_POST['path'] = $category->path.'-'.$_POST['id'];
				$_POST['id'] = '';
				
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
		$data['categoryOne'] = $this->fe_model->selectFormWhere('category',array('id'=>$this->uri->segment(3)));
		
        $this->layout->view('admin/category', $data);
	
	}
	
	function categoryUpdate(){
	
		$where['id'] = $this->uri->segment(3,0);
		$num=$this->fe_model->numFormWhere('category', $where);
		if($num!=0){

			$this->form_validation->set_rules('name','导航名称','required');
			
			if($this->form_validation->run()==FALSE){

				// $data['class'] = $this->p_model->p_select_order('plan_class', 'sort desc, cid asc');
				$data['category'] = $this->fe_model->selectCate();
				$data['categoryOne'] = $this->fe_model->selectFormWhere('category',array('id'=>$this->uri->segment(3)));
				$this->load->view('admin/categoryList');

			}else{
				
				if($_POST['id'] != 0){
					// print_r($_POST);
					// echo $_POST['id'];
					$category = $this->fe_model->selectFormWhere('category',array('id'=>$_POST['id']));
					$_POST['pid'] = $category->id;
					$_POST['path'] = $category->path.'-'.$_POST['id'];
					$_POST['id'] = $this->uri->segment(3,0);
				
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
		$where['id'] = $this->uri->segment(3,0);
		$num=$this->fe_model->numFormWhere('category', $where);
		
		if($num != 0){
		
			$category = $this->fe_model->selectFormWhere('category',$where);
			$path = $category->path.'-';
			$num1=$this->fe_model->numFormLike('category', array('path'=>$path));
			
			if($num1 == 0){
			
				$category = $this->fe_model->deleteForm('category',$where);
				$this->success(CATEGORY.'删除成功','yes');
			
			}else{
			
				$this->success(CATEGORY.'删除失败,请先删除子栏目导航','no');	
			
			}
		}
	
	}
	
	
	
	function postsCreate(){
	
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
	
	
	function form(){
		
		 $this->layout->view('admin/form');
	}
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	function post() {

//        $this->output->enable_profiler(TRUE);
        
//        $this->load->helper('url');
        $this->load->model('fe_model');
        $per_page = 3;
        $total = $this->fe_model->count_posts();
        $data['posts'] = $this->fe_model->get_posts($per_page, $this->uri->segment(3));

        $base_url = site_url('feadmin/post');
        $config['base_url']    = $base_url;
        $config['total_rows']  = $total;
        $config['per_page']    = $per_page;
        $config['uri_segment'] = '3';
        
		$config['first_link'] = '首页'; // 第一页显示  
		$config['last_link'] = '末页'; // 最后一页显示  
		$config['next_link'] = '下一页 >'; // 下一页显示  
		$config['prev_link'] = '< 上一页'; // 上一页显示  
		$config['cur_tag_open'] = ' <a class="current">'; // 当前页开始样式  
		$config['cur_tag_close'] = '</a>'; // 当前页结束样式  
		$config['num_links'] = 2;// 当前连接前后显示页码个数  
        
        $this->pagination->initialize($config);
        
        $data['title_for_layout'] = 'My Posts';
        $this->layout->view('admin/post', $data);
    }

	 function success($title, $status){

		$success['title']=$title;
		$success['status']=$status;
		
		$this->load->view('admin/success',$success);			

	}
	
}