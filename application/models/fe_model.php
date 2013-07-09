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
	function insert_form($form,$values){
	
		$this->db->insert($form,$values);
	
	}
	
	//查询
	function select_form($form){

		return $this->db->get($form)->result();

	}
	
	function select_cate(){

		return $this->db->query("SELECT cid, path, name, type, CONCAT( path,  '-', cid ) AS bpath FROM  `fe_category` ORDER BY bpath")->result();

	}
	
	
	function select_form_where($form,$where){

		return $this->db->get_where($form, $where)->row();

	}
	
	//更新
	function update_form($form,$where,$value){

		$this->db->where($where);
		$this->db->update($form,$value);	

	}

	//删除
	function delete_form($form,$where){

		$this->db->delete($form,$where);

	}

	function num_form_where($form,$where){

		$this->db->where($where);
		return $this->db->get($form)->num_rows();

	}
	// function num_form_like($form,$like){

		// $this->db->like($like);
		// return $this->db->get($form)->num_rows();

	// }
	
	function num_form_like_in($form, $key, $value ,$in){

		$this->db->like($key, $value ,$in);
		return $this->db->get($form)->num_rows();

	}
	
	function select_posts_date(){
		return $this->db->query("select left(addtime,7) as timeget from fe_posts group by timeget")->result();
	}
	
	
	
	//分页
	function page($form, $url, $offset, $size, $order, $join, $join_array,$select = ''){

		$fy['url'] = $url;
		$fy['total'] = $data['total'] = $this->fy_n($form);
		$fy['size'] = $data['size'] = $info['size'] = $size;
		//$fy['uri'] = $offset;
		$this->load->library('page', $fy);
		$data['fy'] = $this->page->fy();
		//print_r($data['fy']);
		//$info['start'] = $data['start'] = $this->uri->segment($offset, 0);
		$info['start'] = $data['start'] = $offset;
		$info['order'] = $order;
		$data['admin'] = $this->fy_info($form, $info, $join, $join_array,$select);
		
		return $data;

	}
	
	function fy_n($form){
	
		return $this->db->get($form)->num_rows();

	}
	
	function fy_info($form,$value,$join,$join_array,$select){
		
		$this->db->order_by($value['order']);
		$this->db->limit($value['size'],$value['start']);
		if($join != ""){
			$this->db->join($join,$join_array);
		}
		if($select !== ''){
		   $this->db->select($select);
		}
		return $this->db->get($form)->result();

	}
	
	function page_where($form, $url, $offset, $size, $where, $order, $join, $join_array,$select = ""){

			$fy['url'] = $url;
			$fy['total'] = $data['total'] = $this->p_num_where($form, $where);
			$fy['size'] = $data['size'] =$info['size'] = $size;
			//$fy['uri'] = $offset;
			$this->load->library('page', $fy);
			$data['fy'] = $this->page->fy();
			//print_r($data['fy']);
			//$info['start'] = $data['start'] = $this->uri->segment(offset, 0);
			$info['start'] = $data['start'] = $data['start'] = $offset;
			$info['order'] = $order;
			$data['admin'] = $this->fy_info_where($form, $where, $info, $join, $join_array,$select);

			return $data;

	}
	function p_num_where($form, $where){

		if(isset($where['where'])){
			$this->db->where($where['where']);
		}
		if(isset($where['like'])){
			$this->db->like($where['like'])	;
		}

		return $this->db->get($form)->num_rows();

	}
	
	function fy_info_where($form, $where, $value, $join, $join_array,$select){

		if(isset($where['where'])){
			$this->db->where($where['where']);
		}
		if(isset($where['like'])){
			$this->db->like($where['like']);
		}
		if($select !== ''){
		   $this->db->select($select);
		}
		
		$this->db->order_by($value['order']);
		$this->db->limit($value['size'],$value['start']);
		if($join != ""){
			$this->db->join($join,$join_array);
		}

		return $this->db->get($form)->result();

	}
	
	
	
	
}

?>