<?php
Class Sales_model extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
	
	function save_sales($save)
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
	
	function getSales($sSearch,$iDisplayStart,$iDisplayLength,$iSortCol_0,$sSortDir_0, $customerId = NULL){
		$customer = $this->session->userdata ["cart_contents"]['customer'];
		
		$this->db->select('*'); 
		$this->db->from('product_order');
		if($customerId){
			$this->db->where('user_id',$customerId);
		}
		if($sSearch != ''){
		$this->db->where("(`id` LIKE '%$sSearch%' OR `first_name` LIKE '%$sSearch%' OR `last_name` LIKE '%$sSearch%' OR `email` LIKE '%$sSearch%' OR `address1` LIKE '%$sSearch%' OR `city` LIKE '%$sSearch%' OR `state` LIKE '%$sSearch%' OR `zip` LIKE '%$sSearch%' OR `country` LIKE '%$sSearch%' OR `phone` LIKE '%$sSearch%' OR `company` LIKE '%$sSearch%' OR `created_date` LIKE '%$sSearch%')", NULL, FALSE);
		}
		if($iDisplayLength!='' && $iDisplayStart!=''){
		   $this->db->limit($iDisplayLength, $iDisplayStart);
		   }
		if($iSortCol_0 != ''){
			if($iSortCol_0 == 0){
				$sortColumn = 'id';
			} else if($iSortCol_0 == 1){
				$sortColumn = 'first_name';
			} else if($iSortCol_0 == 2){
				$sortColumn = 'last_name';
			} else if($iSortCol_0 == 3){
				$sortColumn = 'email';
			} else if($iSortCol_0 == 4){
				$sortColumn = 'address1';
			} else if($iSortCol_0 == 5){
				$sortColumn = 'cat_id';
			} else if($iSortCol_0 == 6){
				$sortColumn = 'city';
			} else if($iSortCol_0 == 7){
				$sortColumn = 'state';
			} else if($iSortCol_0 == 8){
				$sortColumn = 'zip';
			} else if($iSortCol_0 == 9){
				$sortColumn = 'country';
			} else if($iSortCol_0 == 10){
				$sortColumn = 'phone';
			} else if($iSortCol_0 == 11){
				$sortColumn = 'company';
			} else if($iSortCol_0 == 12){
				$sortColumn = 'created_date';
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
	
	function getSalesById($id = NULL){
		$this->db->select('*');
		$this->db->from('product_order');
		if($id){
		$this->db->where('id',$id);
		}
		$query = $this->db->get();  
		return $query->result();
	}
	
	function delete($id=''){
		if($id!=''){
			$this->db->where('id',$id); 
			$this->db->delete('product_order');
		
		}
	}
	
	function getWinTagByCatId($id){
		if($id){
			$this->load->database();
			$this->db->select('*');
			$this->db->from('categories');
			$this->db->where('id',$id); 
			$query = $this->db->get(); 
			return $query->result();
		}
	}
	function selectcount()
	{
	$this->load->database();
			$this->db->select('COUNT(*) AS total');
			$this->db->from('product_order');
			$query = $this->db->get(); 	
			return $query->result();
	}
}