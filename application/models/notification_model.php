<?php
Class Notification_model extends CI_Model
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
			$this->db->update('notifications', $save);
			$id	= $save['id'];
		}
		else
		{
			$this->db->insert('notifications', $save);
			$id	= $this->db->insert_id();
		}
		return $id;
	}
	
	function delete($id=''){
		if($id!=''){
			$this->db->where('id',$id); 
			$this->db->delete('notifications');
		
		}
	}
	
	function getNotification($active=0, $group = NULL, $customerId = NULL){
		$this->db->select('*');
		$this->db->from('notifications');
		if($active){
		$this->db->where('active',1); 
		}
		if($group){
			$this->db->where('group',$group); 
		}
		if($customerId){
			$this->db->where('user_id',$customerId); 
		}
		$this->db->order_by('id', 'desc');
		$query = $this->db->get();  
		return $query->result();
	}
	
	function readNoti($id){
		$save['active'] = 0;
			$this->db->where('id', $id);
			$this->db->update('notifications', $save);
	}
	
}