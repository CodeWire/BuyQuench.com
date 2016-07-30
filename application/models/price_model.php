<?php
Class Price_model extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
	
	function savePrice($save)
	{
		if ($save['id'])
		{
			$this->db->where('id', $save['id']);
			$this->db->update('pricing', $save);
			$id	= $save['id'];
		}
		else
		{
			$this->db->insert('pricing', $save);
			$id	= $this->db->insert_id();
		}
		return $id;
	}
	function getPrice($sSearch,$iDisplayStart,$iDisplayLength,$iSortCol_0,$sSortDir_0){
		$this->db->select('*'); 
		$this->db->from('pricing');
		if($sSearch != ''){
		$this->db->where("(`id` LIKE '%$sSearch%' OR `name` LIKE '%$sSearch%' OR `duration` LIKE '%$sSearch%' OR `desc` LIKE '%$sSearch%' OR `price` LIKE '%$sSearch%')", NULL, FALSE);
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
				$sortColumn = 'price';
			} else if($iSortCol_0 == 3){
				$sortColumn = 'duration';
			} else if($iSortCol_0 == 4){
				$sortColumn = 'desc';
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
	function getPriceById($id = NULL){
		$this->db->select('*'); 
		$this->db->from('pricing');
		if($id){
		$this->db->where('id',$id);
		}
		$query = $this->db->get();
		$res_array = $query->result();
		return $res_array;
	}
	function getPriceDetailArray($id){
		$this->db->select('*'); 
		$this->db->from('pricing');
		$this->db->where('id',$id);
		$query = $this->db->get();
		$res_array = $query->row();
		return (array) $res_array;
	}
	function deletePrice($id=''){
		if($id!=''){
			$this->db->where('id',$id); 
			$this->db->delete('pricing');
		
		}
	}
	function getPriceOfPurchase($id){
		
	}
	
	function getActiveOrderForm(){
		$this->db->select('*');
		$this->db->from('order_form');
		$this->db->where('active',1);
		$query = $this->db->get();  
		return $query->result();
	}
	function selectcount()
	{
	$this->load->database();
			$this->db->select('COUNT(*) AS total');
			$this->db->from('pricing');
			$query = $this->db->get(); 	
			return $query->result();
	}
}