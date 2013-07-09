<?php

class Page
{ 
	protected $url;
	protected $total;
	protected $size;
	protected $segment;
	protected $CI;
	  
	function __construct($value){
		  
		$this->url=$value['url'];
		$this->size=$value['size'];
		$this->total=$value['total'];
		//$this->segment=$value['uri'];
		  
		$this->CI=& get_instance();
		  
		$this->CI->load->library('pagination');
		  
	}
	  
	function fy(){
		  
		return $this->page();
		  
	}
	  
	protected function page(){
		  
		$config['base_url']=base_url($this->url);
		$config['total_rows']=$this->total;
		$config['per_page']=$this->size;
		//$config['uri_segment']=$this->segment;
		//GET分页 传参
		$config['page_query_string'] = TRUE;
		
		$config['num_links']=3;
		$config['first_link']='首页';
		$config['last_link']='末页';
		$config['prev_link']='上一页';
		$config['next_link']='下一页';
		$config['cur_tag_open'] = ' <a class="current">'; // 当前页开始样式  
		$config['cur_tag_close'] = '</a>'; // 当前页结束样式  
					  
//      $this->CI->load->library('pagination', $config);
		  
		$this->CI->pagination->initialize($config);
		  
		return $this->CI->pagination->create_links();
		  
	}
	  
}

?>