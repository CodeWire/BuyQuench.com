<?php
Class Web_model extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
	
	function save_webform($save)
	{
		if ($save['id'])
		{
			$this->db->where('id', $save['id']);
			$this->db->update('web_form', $save);
			$id	= $save['id'];
		}
		else
		{
			$this->db->insert('web_form', $save);
			$id	= $this->db->insert_id();
		}
		return $id;
	}
	
	function getWebForms($sSearch,$iDisplayStart,$iDisplayLength,$iSortCol_0,$sSortDir_0,$userId=NULL){
		$customer = $this->session->userdata ["cart_contents"]['customer'];
		
		$this->db->select('*'); 
		$this->db->from('web_form');
		if($userId){
		$this->db->where("user_id",$userId);
		}

		if($sSearch != ''){
		$this->db->where("(`id` LIKE '%$sSearch%' OR `user_id` LIKE '%$sSearch%' OR `name` LIKE '%$sSearch%' OR `desc` LIKE '%$sSearch%' OR `form` LIKE '%$sSearch%' OR `active` LIKE '%$sSearch%')", NULL, FALSE);
		}
		if($iDisplayLength!='' && $iDisplayStart!=''){
		   $this->db->limit($iDisplayLength, $iDisplayStart);
		   }
		if($iSortCol_0 != ''){
			if($iSortCol_0 == 0){
				$sortColumn = 'id';
			} else if($iSortCol_0 == 1){
				$sortColumn = 'user_id';
			} else if($iSortCol_0 == 2){
				$sortColumn = 'name';
			} else if($iSortCol_0 == 3){
				$sortColumn = 'desc';
			} else if($iSortCol_0 == 4){
				$sortColumn = 'form';
			} else if($iSortCol_0 == 5){
				$sortColumn = 'active';
			} else{
				$sortColumn = 'id';
			}
			if($sSortDir_0 != ''){
				$direction = $sSortDir_0;
			} else {
				$direction = 'asc';
			}
		   $this->db->order_by($sortColumn, $sSortDir_0);
		}
		$query = $this->db->get();
		$res_array = $query->result_array();
		return $res_array;
	}
	
	function getWebFormById($id = NULL, $customerId = NULL){
		$this->db->select('*');
		$this->db->from('web_form');
		if($id){
			$this->db->where('id',$id);
		}
		if($customerId){
			$this->db->where('user_id',$customerId);
		}
		$query = $this->db->get();  
		return $query->result();
	}
	
	function resetWebFormActive(){
		$save['active'] = 0;
		$this->db->update('web_form', $save);
	}
	function selectcount($customerId)
	{
	$this->load->database();
			$this->db->select('COUNT(*) AS total');
			$this->db->from('web_form');
			if($customerId){
		$this->db->where("user_id",$customerId);
		}
			$query = $this->db->get(); 	
			return $query->result();
	}
	
	function checkWebFormActive($userId = NULL){
		$this->db->select('*');
		$this->db->from('web_form');
		$this->db->where('active',1);
		if($userId){
			$this->db->where('user_id',$userId);
		}
		$query = $this->db->get();  
		return $query->result();
	}
	function delete($id=''){
		if($id!=''){
			$this->db->where('id',$id); 
			$this->db->delete('web_form');
		
		}
	}
}