<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Feadmin extends CI_Controller {
	
    function __construct() 
	{
        parent::__construct();
        $this->load->model('fe_model');
		$this->load->library('session');
		date_default_timezone_set('PRC');
    }
	
	
	function index() 
	{	
        $this->load->view('admin/login');
    }
	
	
	//登陆
	function login()
	{
		$this->form_validation->set_rules('username', 'Username', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');

		//echo $this->input->post('username');
		//echo $this->input->post('password');

		if ($this->form_validation->run()!= false)
		{
			$_POST['password'] = md5($_POST['password']);
			$res = $this->fe_model->num_form_where('admin', $_POST);
			//echo $this->input->post('username');
			//echo $this->input->post('password');
			if ($res!="")
			{
				$this->session->set_userdata('username',$this->input->post('username'));
				redirect('feadmin/posts_list');
			}
			else
			{
				$data["error"] = "密码或用户名错误。";
			}
		}
		$this->load->view('admin/login',@$data);
	}

	//退出
	function logout($error = '') 
	{
		$this->session->sess_destroy();
		$data["error"] = $error;
		$this->load->view('admin/login',$data);
	}

	//修改密码

	function pwd_change()
	{
		$data['title_for_layout'] = '修改密码';
		$this->layout->view('admin/pwd_change', $data);
	
	}
	function pwd_change_ok() 
	{ 
		$where['username'] = $this->session->userdata('username');
		$where['password'] = md5($_POST['pwd']);

		$res = $this->fe_model->num_form_where('admin', $where);
		
		if ($res!="")
		{
			$where_user['username'] = $this->session->userdata('username');
			$row['password'] = md5($_POST['pwd1']);
			$this->fe_model->update_form('admin',$where_user, $row);
			$this->logout('密码修改成功，请重新登录');
		}
		else
		{
			$this->success('密码修改失败，你输入的密码不正确', 'no');
		}
	}
	
    function posts_list() 
	{
		$data['posts'] = $this->fe_model->page('posts', 'feadmin/posts_list?',  @$_GET['per_page'], 10, 'id desc','category','posts.category = category.cid ');
		//print_r($data['posts']);
		$data['category'] = $this->fe_model->select_cate();
		//$data['category1'] = $this->fe_model->select_form_where('category',);
		//print_r($data['category1']);
        $data['title_for_layout'] = '文章列表';
		
        $this->layout->view('admin/posts_list', $data);
    }
	
	
	function posts_create()
	{
		// echo @$_POST['image'];
		// if(@$_POST['image'] != ""){	
			// $_POST['image'] = $this->file_update();
		// }
		$_POST['image'] = $this->file_update();
		$this->form_validation->set_rules('title','标题','required');
		$this->form_validation->set_rules('category','分类','required');
		//$this->form_validation->set_rules('content','内容','required');
		$this->form_validation->set_rules('addtime','时间','required');

		if($this->form_validation->run() == FALSE OR $_POST['image'] == '')
		{
			//$data['class'] = $this->fe_model->p_select_order('plan_class', 'sort desc, cid asc');
			echo $this->upload->display_errors(); 
			//$this->success('文章添加失败', 'no');
		}
		else
		{
			//print_r($_POST);
			$this->fe_model->insert_form('posts', $_POST);
			$this->success(POSTS.'添加成功', 'yes');
		
		}
	}
	
	
	function posts() 
	{
		$where['id'] = $this->uri->segment(3,0);
		$num=$this->fe_model->num_form_where('posts', $where);
		if($num == 0)
		{
			redirect('feadmin/posts_list');
		}
	
		$data['posts_one'] = $this->fe_model->select_form_where('posts',array('id'=>$this->uri->segment(3)));
		$data['category'] = $this->fe_model->select_cate();
        $data['title_for_layout'] = '修改文章';
		
        $this->layout->view('admin/posts', $data);
    }
	
	
	function posts_update()
	{

		$where['id'] = $this->uri->segment(3,0);
		$num=$this->fe_model->num_form_where('posts', $where);
		if($num!=0)
		{

			$this->form_validation->set_rules('title','标题','required');
			$this->form_validation->set_rules('category','分类','required');
			$this->form_validation->set_rules('addtime','时间','required');
			
			if($this->form_validation->run()==FALSE)
			{
				$this->posts();
			}
			else
			{
				$image = $this->file_update();				
				$posts_one = $this->fe_model->select_form_where('posts',$where);
				if($image != "")
				{
					if($posts_one->image != "")
					{
						$file_path = 'uploads/img/'.$posts_one->image;
						unlink($file_path);
					}
					$_POST['image'] = $image;
				}
					
				//print_r($_POST);
				$this->fe_model->update_form('posts', $where, $_POST);
				$this->success(POSTS.'修改成功', 'yes');

			}	
		}
	
	}
	
	
	function posts_delete()
	{
		$where['id'] = $this->uri->segment(3,0);
		$num=$this->fe_model->num_form_where('posts', $where);
		
		if($num != 0)
		{
			$posts_one = $this->fe_model->select_form_where('posts',$where);
			if($posts_one->image != "")
			{
				$file_path = 'uploads/img/'.$posts_one->image;
				unlink($file_path);
			}
			$this->fe_model->delete_form('posts',$where);
			
			$this->success(POSTS.'删除成功','yes');
		}
	
	}
	function posts_deletes()
	{
		
		print_r($delete = $_POST['checkbox']);
		if(isset($_POST['checkbox']))
		{
			while(list($key,$value)=each($delete))
			{
				$where['id']=$value;
				$posts_one = $this->fe_model->select_form_where('posts',$where);
				if($posts_one->image != "")
				{
					$file_path = 'uploads/img/'.$posts_one->image;
					unlink($file_path);
				}
				$this->fe_model->delete_form('posts',$where);
			}
			$this->success(POSTS.'删除成功','yes');
		}
	
	}
	
	function posts_search() 
	{
		//echo $where['where']['category'] = $this->uri->segment(3,0);
		if($_GET['category'] != 0)
		{
			$where['where']['category'] = $_GET['category'];
		}
		$where['like']['title'] = @$_GET['title'];
		$data['posts'] = $this->fe_model->page_where('posts', 'feadmin/posts_search/?category='.$_GET['category'].'&title='.@$_GET['title'], @$_GET['per_page'], 2, $where, 'id desc','category','posts.category = category.cid ');
		//$data['posts'] = $this->fe_model->page_where('posts', 'feadmin/posts_search/'.$this->uri->segment(3,0), 4, 2, $where, 'id desc','category','posts.category = category.cid ');
		//$data['posts'] = $this->fe_model->pageJoin('posts', 'feadmin/index', 3, 3, 'posts.id desc','','');
		//print_r($data['posts']);
		$data['category'] = $this->fe_model->select_cate();
		$data['category_one'] = $this->fe_model->select_form_where('category',array('cid'=>$this->uri->segment(3)));
        $data['title_for_layout'] = 'My Posts';
		
        $this->layout->view('admin/posts_list', $data);
    }
	
	
	function category_list() 
	{
		
        $data['category'] = $this->fe_model->select_cate();

		//print_r($data['category']);
        $data['title_for_layout'] = '分类导航';
		
        $this->layout->view('admin/category_list', $data);
    
	}
	
	function category_create()
	{

		$this->form_validation->set_rules('name','导航名称','required');

		if($this->form_validation->run()==FALSE)
		{
			//$data['class'] = $this->fe_model->p_select_order('plan_class', 'sort desc, cid asc');
			$this->load->view('admin/category_list');
		}
		else
		{
			if($_POST['cid'] != 0)
			{
				// print_r($_POST);
				// echo $_POST['id'];
				$category = $this->fe_model->select_form_where('category',array('cid'=>$_POST['cid']));
				$_POST['pid'] = $category->cid;
				$_POST['path'] = $category->path.'-'.$_POST['cid'];
				$_POST['cid'] = '';
				
			}
			else
			{
				$_POST['pid']  = 0;
				$_POST['path']  = 0;
			}

			$this->fe_model->insert_form('category', $_POST);
			$this->success(CATEGORY.'添加成功', 'yes');

		}


	}
	
	function category()
	{
		$where['cid'] = $this->uri->segment(3,0);
		$num=$this->fe_model->num_form_where('category', $where);
		if($num == 0)
		{
			redirect('feadmin/category_list');
		}
		
		$data['title_for_layout'] = '修改分类导航';
		$data['category'] = $this->fe_model->select_cate();
		$data['category_one'] = $this->fe_model->select_form_where('category',array('cid'=>$this->uri->segment(3)));
		
        $this->layout->view('admin/category', $data);
	
	}
	
	function category_update()
	{
	
		$where['cid'] = $this->uri->segment(3,0);
		$num=$this->fe_model->num_form_where('category', $where);
		if($num!=0)
		{

			$this->form_validation->set_rules('name','导航名称','required');
			
			if($this->form_validation->run()==FALSE)
			{

				// $data['class'] = $this->p_model->p_select_order('plan_class', 'sort desc, cid asc');
				$data['category'] = $this->fe_model->select_cate();
				$data['category_one'] = $this->fe_model->select_form_where('category',array('cid'=>$this->uri->segment(3)));
				$this->load->view('admin/category_list');

			}
			else
			{
				
				if($_POST['cid'] != 0)
				{
					// print_r($_POST);
					// echo $_POST['id'];
					$category = $this->fe_model->select_form_where('category',array('cid'=>$_POST['cid']));
					$_POST['pid'] = $category->cid;
					$_POST['path'] = $category->path.'-'.$_POST['cid'];
				
				}
				else
				{
					$_POST['pid']  = 0;
					$_POST['path']  = 0;
				}
					$_POST['cid'] = $this->uri->segment(3,0);
				//array_splice($_POST, 0, 1);
				
				$this->fe_model->update_form('category', $where, $_POST);
				//$this->fe_model->insert_form('category', $_POST);
				$this->success(CATEGORY.'修改成功', 'yes');

			}	
		}
	
	}
	
	function category_delete()
	{
		$where['cid'] = $this->uri->segment(3,0);
		$row['category'] = $this->uri->segment(3,0);
		$num=$this->fe_model->num_form_where('category', $where);
		
		if($num != 0)
		{
		
			$category = $this->fe_model->select_form_where('category',$where);
			$path = '-'.$this->uri->segment(3,0);
			$num1=$this->fe_model->num_form_like_in('category', 'path', $path,'before');
			
			if($num1 == 0)
			{
			
				$this->fe_model->delete_form('category',$where);
				
				$post['category'] = 1;
				$this->fe_model->update_form('posts', $row, $post);
				
				$this->success(CATEGORY.'删除成功','yes');
			
			}
			else
			{
			
				$this->success(CATEGORY.'删除失败,请先删除子栏目导航','no');	
			
			}
		}
	
	}
	
	
	//网站的配置信息
	function options_list()
	{
		$data['options'] = $this->fe_model->select_form('options');
		
		//print_r($data['options']);
		$data['title_for_layout'] = '网站信息';
		$this->layout->view('admin/options_list',$data);
		
	}
	
	function options_create()
	{
		$this->form_validation->set_rules('option_name','信息名称','required');
		
		$this->fe_model->insert_form('options', $_POST);
		$this->success('信息名称成功', 'yes');

	}
	
	
	// function options_update(){

		// $where['id'] = $this->uri->segment(3,0);
		
		// $this->form_validation->set_rules('name','名称','required');
		// $this->form_validation->set_rules('material','导材质','required');
		// $this->form_validation->set_rules('specification','规格','required');
		// $this->form_validation->set_rules('weight','重量','required');
		// $this->form_validation->set_rules('place','导产地','required');
		// $this->form_validation->set_rules('unit','单位','required');
		// $this->form_validation->set_rules('location','存放地','required');
		
		// $this->form_validation->set_rules('species','种类','required');

		// if($this->form_validation->run()==FALSE){
			////$data['class'] = $this->fe_model->p_select_order('plan_class', 'sort desc, cid asc');
			// $this->load->view('admin/options_list/'.$this->uri->segment(3));
		// }else{
		
			// $this->fe_model->update_form('options', $where, $_POST);
			// $this->success('资源更新成功', 'yes');

		// }
	// }
	
	
	
	// function options_delete(){
		// $where['id'] = $this->uri->segment(3,0);
		// $num=$this->fe_model->num_form_where('options', $where);
		
		// if($num != 0){
		
			// $this->fe_model->delete_form('options',$where);
			// $this->success('资源删除成功','yes');
		
		// }else{
		
			// $this->success('资源删除失败,请检查之后重新操作','no');	
		
		// }
	
	// }
	
	
	
	
	
	 function success($title, $status)
	 {

		$success['title']=$title;
		$success['status']=$status;
		
		$this->load->view('admin/success',$success);			

	}
	
	//上传图片
	function file_update()
	{
		$config['upload_path'] = './uploads/img/';//绝对路径  
        $config['allowed_types'] = 'gif|jpg|png|jpeg';//文件支持类型  
        $config['max_size'] = '0';
        $config['encrypt_name'] = false;//重命名文件  
        $this->load->library('upload',$config);  
  
        if ($this->upload->do_upload('image'))
		{  
            $upload_data = $this->upload->data();  
            return $upload_data['file_name'];  
        }  
        else
        {
            return $upload_data['file_name'] = '';
        }
	}
	
	
	
}