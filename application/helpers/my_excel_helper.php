<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
 * Author : Lensic
 * Blog   : http://lensic.sinaapp.com/
 */
 
/*
 * excel 导入
 * 
 * read : 读取文件
 * sheets[0]['cells'] : 第一个工作表的数据
 *
 * 示例：
 * $excel->read('uploads/test.xls')
 * $excel->sheets[0]['cells']
 */
function excel()
{
	$CI = &get_instance();
	if(!isset($CI->excel))
	{
		require_once $CI->config->item('web_resource') . '/phpexcelreader/reader.php';
		$CI->excel = new Spreadsheet_Excel_Reader();
		$CI->excel->setOutputEncoding('utf-8');
	}
	return $CI->excel;
}

/* End of file my_excel_helper.php */
/* Location: ./application/helpers/my_excel_helper.php */