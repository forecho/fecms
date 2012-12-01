<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Excel extends CI_Controller 
{

    function __construct() 
    {
        parent::__construct();
		$this->load->model('fe_model');
		$this->load->library('session');
		date_default_timezone_set('PRC');
    }
	
	
	function excel_list()
	{
		$data['excel'] = $this->fe_model->page('excel', 'excel/excel_list?',  @$_GET['per_page'], 2, 'id desc','category','excel.category = category.cid ');
		$data['category'] = $this->fe_model->select_cate();
		
        $data['title_for_layout'] = 'Excel列表';
		//print_r($data['excel']);
       $this->layout->view('admin/excel_list', $data);
	}

	
	function excel_create()
	{
		$_POST['excel'] = $this->file_update();
		$this->form_validation->set_rules('title','标题','required');
		$this->form_validation->set_rules('category','分类','required');
		$this->form_validation->set_rules('addtime','时间','required');

		if($this->form_validation->run() == FALSE OR $_POST['excel'] == '')
		{
			
			//$data['class'] = $this->fe_model->p_select_order('plan_class', 'sort desc, cid asc');
			echo $this->upload->display_errors(); 
			$this->success('Excel文档添加失败', 'no');

		}
		else
		{
			//print_r($_POST);
			$this->fe_model->insert_form('excel', $_POST);
			$this->success('Excel文档添加成功', 'yes');
		
		}
	}

	
	function excel_edit()
	{
		$where['id'] = $this->uri->segment(3,0);
		$num=$this->fe_model->num_form_where('excel', $where);
		if($num == 0)
		{
			redirect('excel/excel_list');
		}
	
		$data['excel_one'] = $this->fe_model->select_form_where('excel',array('id'=>$this->uri->segment(3)));
		$data['category'] = $this->fe_model->select_cate();
        $data['title_for_layout'] = '修改Excel表格';
		
        $this->layout->view('admin/excel_edit', $data);
	
	}
	
	function excel_view()
	{
		// 读取 excel 内容
		$excel_name = $this->uri->segment(3,0);
		$this->load->helper('my_excel');
		$excel = excel();
		//$excel->read('themes/default/demo.xls');
		$excel->read('uploads/excel/'.$excel_name);
		$data['excel_datas'] = $excel->sheets[0]['cells'];
		//$data['excel_rows'] = $excel->sheets[0]['numRows'];//表的行数
		$data['excel_cols'] = $excel->sheets[0]['numCols'];//表的列数

		$data['title_for_layout'] = $excel_name."表格";
		// 加载视图输出
		$this->layout->view('admin/excel_view', $data);
	}
	
	
	function excel_update()
	{

		$where['id'] = $this->uri->segment(3,0);
		$num=$this->fe_model->num_form_where('excel', $where);
		if($num!=0)
		{

			$this->form_validation->set_rules('title','文档标题','required');
			$this->form_validation->set_rules('category','分类','required');
			$this->form_validation->set_rules('addtime','时间','required');
			
			if($this->form_validation->run() == FALSE)
			{
				$this->excel_edit();
			}
			else
			{
				$file = $this->file_update();				
				$excel_one = $this->fe_model->select_form_where('excel',$where);
				if($file != "")
				{
					if($excel_one->excel != "")
					{
						$file_path = 'uploads/excel/'.$excel_one->excel;
						unlink($file_path);
					}
					$_POST['excel'] = $file;
				}
					
				//print_r($_POST);
				$this->fe_model->update_form('excel', $where, $_POST);
				$this->success('Excel修改成功', 'yes');

			}	
		}
	
	}
	
	function excel_search() 
	{
		//echo $where['where']['category'] = $this->uri->segment(3,0);
		if($_GET['category'] != 0)
		{
			$where['where']['category'] = $_GET['category'];
		}
		$where['like']['title'] = @$_GET['title'];
		$data['excel'] = $this->fe_model->page_where('excel', 'excel/excel_search/?category='.$_GET['category'].'&title='.@$_GET['title'], @$_GET['per_page'], 2, $where, 'id desc','category','excel.category = category.cid ');

		$data['category'] = $this->fe_model->select_cate();
		$data['category_one'] = $this->fe_model->select_form_where('category',array('cid'=>$this->uri->segment(3)));
        $data['title_for_layout'] = '查询'.@$_GET['title'].'的结果';
		
        $this->layout->view('admin/excel_list', $data);
    }
	
	function excel_delete()
	{
		$where['id'] = $this->uri->segment(3,0);
		$num=$this->fe_model->num_form_where('excel', $where);
		
		if($num != 0)
		{
			$excel_one = $this->fe_model->select_form_where('excel',$where);
			if($excel_one->excel != "")
			{
				$file_path = 'uploads/excel/'.$excel_one->excel;
				unlink($file_path);
			}
			$this->fe_model->delete_form('excel',$where);
			
			$this->success('Excel删除成功','yes');
		}
	
	}


	function excel_deletes()
	{
		
		print_r($delete = $_POST['checkbox']);
		if(isset($_POST['checkbox']))
		{
			while(list($key,$value)=each($delete))
			{
				$where['id']=$value;
				$excel_one = $this->fe_model->select_form_where('excel',$where);
				if($excel_one->excel != "")
				{
					$file_path = 'uploads/excel/'.$excel_one->excel;
					unlink($file_path);
				}
				$this->fe_model->delete_form('excel',$where);
			}
			$this->success('Excel删除成功','yes');
		}
	
	}







	
	function success($title, $status)
	{

		$success['title']=$title;
		$success['status']=$status;
		
		$this->load->view('admin/success',$success);			

	}
	
	//上传图片
	function file_update()
	{
		$config['upload_path'] = './uploads/excel/';//绝对路径  
        $config['allowed_types'] = 'xls';//文件支持类型  
        $config['max_size'] = '0';
        $config['encrypt_name'] = false;//重命名文件  
        $this->load->library('upload',$config);  
  
        if ($this->upload->do_upload('excel')) 
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

/* End of file demo.php */
/* Location: ./application/controllers/demo.php */