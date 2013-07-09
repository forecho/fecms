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
		$data['excel'] = $this->fe_model->page('excel', 'excel/excel_list?',  @$_GET['per_page'], 20, 'addtime desc','category','excel.category = category.cid ','excel.*,category.name as cname');
		$data['category'] = $this->fe_model->select_cate();
		
		
        $data['title_for_layout'] = 'Excel列表';
		//print_r($data['excel']);
       $this->layout->view('admin/excel_list', $data);
	}

	function excel_create_one()
	{
		$data['category'] = $this->fe_model->select_cate();
		$data['title_for_layout'] = '添加Excel数据';
		$this->layout->view('admin/excel_create_one', $data);
	}
	
	function excel_create_one_ok()
	{
		$this->form_validation->set_rules('name','名称','required');
		$this->form_validation->set_rules('material','材质','required');
		$this->form_validation->set_rules('thickness','厚度','required');
		$this->form_validation->set_rules('width','宽度','required');
		$this->form_validation->set_rules('length','长度','required');
		$this->form_validation->set_rules('stock','库存','required');
		$this->form_validation->set_rules('weight','重量','required');
		$this->form_validation->set_rules('price','单价','required');
		$this->form_validation->set_rules('place','产地','required');
		$this->form_validation->set_rules('location','存放地','required');

		if($this->form_validation->run() == FALSE)
		{
			//$data['class'] = $this->fe_model->p_select_order('plan_class', 'sort desc, cid asc');
			echo $this->upload->display_errors(); 
			//$this->success('文章添加失败', 'no');
		}
		else
		{
			$this->fe_model->insert_form('excel', $_POST);
			$this->success('数据添加成功', 'yes');
		}
	}
	
	function excel_create()
	{
		$_POST['excel'] = $this->file_update();
		$this->form_validation->set_rules('category','分类','required');
		$this->form_validation->set_rules('addtime','时间','required');
		
		$this->load->helper('my_excel');
        $excel = excel();
		$excel->read('uploads/excel/'.$_POST['excel']);
		
		for ($i = 3; $i <= $excel->sheets[0]['numRows']; $i++) {
			$excel_datas[] = $excel->sheets[0]['cells'][$i];
		}
		
		$where['cid'] = $_POST['category'];
		$category = $this->fe_model->select_form_where('category',$where);
		$data['category_name'] = $category->name;
		
		$data['excel_post'] = $_POST;
		$data['excel_rows'] = $excel->sheets[0]['numRows'];
		$data['excel_datas'] = $excel_datas;
		$data['excel_path'] = 'uploads/excel/'.$_POST['excel'];
		$data['title_for_layout'] = 'Excel表格数据';
		$this->layout->view('admin/excel_update', $data);

	}

	function excel_create_ok()
	{
		
		$this->load->helper('my_excel');
        $excel = excel();
		$excel->read($_POST['excel_path']);
		
		for ($i = 4; $i <= $excel->sheets[0]['numRows']; $i++) {
			$form_data = array('name', 'material', 'thickness','width','length','stock','weight','price','place','location','remark','category','addtime');
			$excel_data = $excel->sheets[0]['cells'][$i];
			array_push($excel_data,$_POST['category'],$_POST['addtime']);
			$data = array_combine($form_data, $excel_data);
			$this->fe_model->insert_form('excel', $data);
		}
		$this->success('Excel文档添加成功', 'yes','excel/excel_list');
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

			$this->form_validation->set_rules('category','分类','required');
			$this->form_validation->set_rules('addtime','时间','required');
			
			if($this->form_validation->run() == FALSE)
			{
				$this->excel_edit();
			}
			else
			{
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
		$where['like']['fe_excel.name'] = @$_GET['name'];
		$data['excel'] = $this->fe_model->page_where('excel', 'excel/excel_search/?category='.$_GET['category'].'&name='.@$_GET['name'], @$_GET['per_page'], 20, $where, 'id desc','category','excel.category = category.cid','excel.*,category.name as cname');
		
		$data['category'] = $this->fe_model->select_cate();
		$data['category_one'] = $this->fe_model->select_form_where('category',array('cid'=>$this->uri->segment(3)));
        $data['title_for_layout'] = '查询'.@$_GET['name'].'的结果';
		
        $this->layout->view('admin/excel_list', $data);
    }
	
	function excel_delete()
	{
		$where['id'] = $this->uri->segment(3,0);
		$num=$this->fe_model->num_form_where('excel', $where);
		
		if($num != 0)
		{
			$this->fe_model->delete_form('excel',$where);
			
			$this->success('Excel删除成功','yes');
		}
	
	}


	function excel_deletes()
	{
		
		//print_r($delete = $_POST['checkbox']);
		$delete = $_POST['checkbox'];
		switch ($_POST['act'])
		{
			case '删除选中':
				while(list($key,$value)=each($delete))
				{
					$where['id']=$value;
					$this->fe_model->delete_form('excel',$where);
				}
				$success = 'Excel删除成功';
			break;
			case '更新时间':
				while(list($key,$value)=each($delete))
				{
					$data['addtime'] = date('Y-m-d H:i:s');
					$where['id']=$value;
					$this->fe_model->update_form('excel', $where, $data);
				}
				$success = 'Excel时间更新成功';
			break;
		}
		$this->success($success,'yes');
	
	}


	
	function success($title, $status,$url='')
	{
		$success['title']=$title;
		$success['status']=$status;
		$success['url']=$url;
		
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