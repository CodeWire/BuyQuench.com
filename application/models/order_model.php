<?php
Class Order_model extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
	
	function save_order($save)
	{
		if ($save['id'])
		{
			$this->db->where('id', $save['id']);
			$this->db->update('order', $save);
			$id	= $save['id'];
		}
		else
		{
			$this->db->insert('order', $save);
			$id	= $this->db->insert_id();
		}
		return $id;
	}
	
	function save_orderform($save)
	{
		if ($save['id'])
		{
			$this->db->where('id', $save['id']);
			$this->db->update('order_form', $save);
			$id	= $save['id'];
		}
		else
		{
			$this->db->insert('order_form', $save);
			$id	= $this->db->insert_id();
		}
		return $id;
	}
	
	
	function save_product_order($save)
	{
		if ($save['id'])
		{
			$this->db->where('id', $save['id']);
			$this->db->update('product_order', $save);
			$id	= $save['id'];
		}
		else
		{
			$this->db->insert('product_order', $save);
			$id	= $this->db->insert_id();
		}
		return $id;
	}
	
	function getOrderForms($sSearch,$iDisplayStart,$iDisplayLength,$iSortCol_0,$sSortDir_0,$userId=NULL){
		$customer = $this->session->userdata ["cart_contents"]['customer'];
		$this->db->select('*'); 
		$this->db->from('order_form');
		if($userId){
		$this->db->where("user_id",$userId);
		}

		if($sSearch != ''){
		$this->db->where("(`id` LIKE '%$sSearch%' OR `name` LIKE '%$sSearch%' OR `desc` LIKE '%$sSearch%' OR `form` LIKE '%$sSearch%' OR `active` LIKE '%$sSearch%')", NULL, FALSE);
		}
		if($iDisplayLength!='' && $iDisplayStart!=''){
		   $this->db->limit($iDisplayLength, $iDisplayStart);
		   }
		if($iSortCol_0 != ''){
			if($iSortCol_0 == 0){
				$sortColumn = 'id';
			} else if($iSortCol_0 == 1){
				$sortColumn = 'name';
			} else if($iSortCol_0 == 2){
				$sortColumn = 'desc';
			} else if($iSortCol_0 == 3){
				$sortColumn = 'form';
			} else if($iSortCol_0 == 4){
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
	
	function getOrderFormById($id = NULL, $customerId = NULL){
		$this->db->select('*');
		$this->db->from('order_form');
		if($id){
		$this->db->where('id',$id);
		}
		if($customerId){
			$this->db->where('user_id',$customerId);
		}
		$query = $this->db->get();  
		return $query->result();
	}
	
	function resetOrderFormActive(){
		$save['active'] = 0;
		$this->db->update('order_form', $save);
	}
	
	function checkOrderFormActive(){
		$this->db->select('*');
		$this->db->from('order_form');
		$this->db->where('active',1);
		$query = $this->db->get();  
		return $query->result();
	}
	
	function delete($id=''){
		if($id!=''){
			$this->db->where('id',$id); 
			$this->db->delete('order_form');
		
		}
	}
	
	function getUserIsDetailsById($id = NULL){
		if($id){
			$this->db->select('*');
			$this->db->from('users');
			$this->db->where('id',$id);
			$query = $this->db->get();  
			return $query->result();
		}
	}
	
	function get_quiz_by_cat($id){
		 $this->db->select('a.*,b.*'); 
		$this->db->from('categories a');
		$this->db->join('quiz b', 'b.id = a.quiz_id', 'left'); 
		$this->db->where('a.id',$id);
		$query = $this->db->get();
		$res_array = $query->result_array();
		//var_dump($res); exit(0);
		return $res_array;
	}
	
	function getProductDetails($productId = NULL){
			$this->db->select('*');
			$this->db->from('categories');
			if($productId){
				$this->db->where('id',$productId);
			}
			$query = $this->db->get();
			return $query->result();
	}
	function selectcount($userId)
	{
	$this->load->database();
			$this->db->select('COUNT(*) AS total');
			$this->db->from('order_form');
			if($userId){
		$this->db->where("user_id",$userId);
		}
			$query = $this->db->get(); 	
			return $query->result();
	}
}