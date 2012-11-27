<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Excel extends CI_Controller {

    function __construct() {
        parent::__construct();
		$this->load->library('session');
    }
	
	function excelList()
	{
		// 读取 excel 内容
		$this->load->helper('my_excel');
		$excel = excel();
		//$excel->read('themes/default/demo.xls');
		$excel->read('uploads/excel/2.xls');
		$data['excel_datas'] = $excel->sheets[0]['cells'];
		//$data['excel_rows'] = $excel->sheets[0]['numRows'];//表的行数
		$data['excel_cols'] = $excel->sheets[0]['numCols'];//表的列数

		$data['title_for_layout'] = "Excel表格";
		// 加载视图输出
		$this->layout->view('admin/excelList', $data);
	}
	

}

/* End of file demo.php */
/* Location: ./application/controllers/demo.php */