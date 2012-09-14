<?php

class Fe_model extends CI_Model{
	function __construct(){
		parent::__construct();
	}


    function get_posts($limit = NULL, $offset = NULL) {
	
        $this->db->limit ($limit, $offset);
        return $this->db->get('posts');
    
	}
    
    function count_posts() {
	
        return $this->db->count_all_results('posts');
    
	}

	
	//创建
	function insertForm($form,$values){
	
		$this->db->insert($form,$values);
	
	}
	
	//查询
	function selectForm($form){

		return $this->db->get($form)->result();

	}
	
	function selectCate(){

		return $this->db->query("SELECT id, path, name, CONCAT( path,  '-', id ) AS bpath FROM  `category` ORDER BY bpath")->result();

	}
	
	
	function selectFormWhere($form,$where){

		return $this->db->get_where($form, $where)->row();

	}
	
	//更新
	function updateForm($form,$where,$value){

		$this->db->where($where);
		$this->db->update($form,$value);	

	}

	//删除
	function deleteForm($form,$where){

		$this->db->delete($form,$where);

	}

	function numFormWhere($form,$where){

		$this->db->where($where);
		return $this->db->get($form)->num_rows();

	}
	function numFormLike($form,$like){

		$this->db->like($like);
		return $this->db->get($form)->num_rows();

	}
	
	
	
	
	//分页
	function page($form, $url, $uri, $size, $order){

		$fy['url'] = $url;
		$fy['total'] = $data['total'] = $this->fy_n($form);
		$fy['size'] = $data['size'] = $info['size'] = $size;
		$fy['uri'] = $uri;
		$this->load->library('page', $fy);
		$data['fy'] = $this->page->fy();
		//print_r($data['fy']);
		$info['start'] = $data['start'] = $this->uri->segment(3, 0);
		$info['order'] = $order;
		$data['admin'] = $this->fy_info($form, $info);

		return $data;

	}
	
	
	function fy_n($form){
	
		return $this->db->get($form)->num_rows();

	}

	function fy_info($form,$value){

		$this->db->order_by($value['order']);
		$this->db->limit($value['size'],$value['start']);
		return $this->db->get($form)->result();

	}
}

?>