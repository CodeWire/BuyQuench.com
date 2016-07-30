<?php
Class Leads_model extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
	
	function save($save)
	{
		if ($save['id'])
		{
			$this->db->where('id', $save['id']);
			$this->db->update('lead_form', $save);
			$id	= $save['id'];
		}
		else
		{
			$this->db->insert('lead_form', $save);
			$id	= $this->db->insert_id();
		}
		return $id;
	}
	
	function saveLeadFields($save)
	{
		if ($save['id'])
		{
			$this->db->where('id', $save['id']);
			$this->db->update('lead_form_lookup', $save);
			$id	= $save['id'];
		}
		else
		{
			$this->db->insert('lead_form_lookup', $save);
			$id	= $this->db->insert_id();
		}
		return $id;
	}
	
	function delete($id=''){
		if($id!=''){
			$this->db->where('id',$id); 
			$this->db->delete('lead_form');
		
		}
	}
	
	function getLeads($sSearch,$iDisplayStart,$iDisplayLength,$iSortCol_0,$sSortDir_0){
		$customer = $this->session->userdata ["cart_contents"]['customer'];
		
		$this->db->select('a.id AS lead_base_id, a.web_form_id, b.*'); 
		$this->db->from('lead_form a');
		$this->db->join('lead_form_lookup b', 'a.id = b.lead_id', 'left');

		if($sSearch != ''){
		$this->db->where("(`a.lead_base_id` LIKE '%$sSearch%' OR `b.value` LIKE '%$sSearch%')", NULL, FALSE);
		}
		if($iDisplayLength!='' && $iDisplayStart!=''){
		   $this->db->limit($iDisplayLength, $iDisplayStart);
		   }
		if($iSortCol_0 != ''){
			if($iSortCol_0 == 0){
				$sortColumn = 'a.lead_base_id';
			} else if($iSortCol_0 == 1){
				$sortColumn = 'b.value';
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
	
	function getBaseLeads($customerId=NULL){
		$this->db->select('a.*');
		$this->db->from('lead_form a');
		if($customerId){
			$this->db->join('web_form b', 'a.web_form_id = b.id', 'left'); 
			$this->db->where('b.user_id',$customerId);
		}
		$this->db->group_by('web_form_id');
		//$this->db->order_by('id', 'desc');
		$query = $this->db->get();  
		return $query->result();
	}
	
	function getLeadsByWebForm($id = NULL){
		$this->db->select('*');
		$this->db->from('lead_form');
		if($id){
			$this->db->where('web_form_id',$id);
		}
		$query = $this->db->get();  
		return $query->result();
	}
	
	function getLeadsList($id){
		$this->db->select('*');
		$this->db->from('lead_form_lookup');
		 $this->db->where('lead_id',$id);
		$query = $this->db->get();  
		return $query->result();
	}
	function selectcount()
	{
	$this->load->database();
			$this->db->select('COUNT(*) AS total');
			$this->db->from('lead_form');
			$query = $this->db->get(); 	
			return $query->result();
	}
}