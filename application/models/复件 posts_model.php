<?php

class Posts_model extends CI_Model{
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

	//分页
	function p_fy($form,$fy){

		if(isset($fy['where'])):
			$this->db->where($fy['where']);
		endif;

		$this->db->order_by($fy['order'],$fy['by']);
		$this->db->limit($fy['size'],$fy['start']);

		return $this->db->get($form)->result();   

	}

}

?>