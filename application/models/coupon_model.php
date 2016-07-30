<?php
Class Coupon_model extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
	
	function saveCoupon($save)
	{
		if ($save['id'])
		{
			$this->db->where('id', $save['id']);
			$this->db->update('coupon', $save);
			$id	= $save['id'];
		}
		else
		{
			$this->db->insert('coupon', $save);
			$id	= $this->db->insert_id();
		}
		return $id;
	}
	function getCoupon($sSearch,$iDisplayStart,$iDisplayLength,$iSortCol_0,$sSortDir_0){
		$this->db->select('*'); 
		$this->db->from('coupon');
		if($sSearch != ''){
		$this->db->where("(`id` LIKE '%$sSearch%' OR `name` LIKE '%$sSearch%' OR `code` LIKE '%$sSearch%' OR `desc` LIKE '%$sSearch%' OR `start_date` LIKE '%$sSearch%' OR `end_date` LIKE '%$sSearch%' OR `status` LIKE '%$sSearch%')", NULL, FALSE);
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
				$sortColumn = 'code';
			} else if($iSortCol_0 == 3){
				$sortColumn = 'desc';
			} else if($iSortCol_0 == 4){
				$sortColumn = 'start_date';
			} else if($iSortCol_0 == 5){
				$sortColumn = 'end_date';
			} else if($iSortCol_0 == 6){
				$sortColumn = 'status';
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
	function getCouponById($id = NULL){
		$this->db->select('*'); 
		$this->db->from('coupon');
		if($id){
		$this->db->where('id',$id);
		}
		$query = $this->db->get();
		$res_array = $query->result();
		return $res_array;
	}
	function getCouponDetailArray($id){
		$this->db->select('*'); 
		$this->db->from('coupon');
		$this->db->where('id',$id);
		$query = $this->db->get();
		$res_array = $query->row();
		return (array) $res_array;
	}
	function deleteCoupon($id=''){
		if($id!=''){
			$this->db->where('id',$id); 
			$this->db->delete('coupon');
		
		}
	}
	function getPriceByCouponCode($code){
		$this->db->select('*'); 
		$this->db->from('coupon');
		$this->db->where('code',$code);
		$query = $this->db->get();
		$res_array = $query->row();
		return (array) $res_array;
	}
	function selectcount()
	{
	$this->load->database();
			$this->db->select('COUNT(*) AS total');
			$this->db->from('coupon');
			$query = $this->db->get(); 	
			return $query->result();
	}
}