<?php
Class User_model extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
	
	function saveUser($save)
	{
		if ($save['id'])
		{
			$this->db->where('id', $save['id']);
			$this->db->update('users', $save);
			$id	= $save['id'];
		}
		else
		{
			$this->db->insert('users', $save);
			$id	= $this->db->insert_id();
		}
		return $id;
	}
	
	function autoLogin($id){
		if(!empty($id)){
			$this->db->select('*');
			$this->db->where('id',$id);
			$this->db->limit(1);
			$result = $this->db->get('users');
			$customer	= $result->row_array();
			if($customer){
			$sessions = $this->sale_questions->save_customer($customer);
			}
		}
	}
	
	function saveUserAndLogin($save){
		if ($save['id'])
		{
			$this->db->where('id', $save['id']);
			$this->db->update('users', $save);
			$id	= $save['id'];
		}
		else
		{
			$this->db->insert('users', $save);
			$id	= $this->db->insert_id();
		}
		$this->db->select('*');
		$this->db->where('id',$id);
		$this->db->limit(1);
		$result = $this->db->get('users');
		$customer	= $result->row_array();
		if($customer){
		$sessions = $this->sale_questions->save_customer($customer);
		}
	}
	
	function checkUserEmailExists($email){
		$this->db->select('*');
		$this->db->from('users');
		if($email){
		$this->db->where('email',$email);
		}
		$query = $this->db->get();  
		return $query->result();
	}
	
	function activateUser($email, $key){
		$this->db->where('email', $email);
		$this->db->where('verify_link', $key);
			$id	= $this->db->update('users', $save);
			return $id;
	}
	
	function is_logged_in(){
		$customer = $this->sale_questions->customer();
		if (isset($customer['id']))
		{
				//redirect($redirect);
				return true;
		} else {
			return false;
		}
	}
	
	function login($email, $password, $remember){
		$this->db->select('*');
		$pass = md5($password);
	   $where = "(email='$email' AND password='$pass')";
		$this->db->where($where);
		$this->db->limit(1);
		$result = $this->db->get('users');
		$customer	= $result->row_array();
		if($customer){
		$sessions = $this->sale_questions->save_customer($customer);
		//$sessions = $this->session->set_userdata($customer);
		//$this->session->set_flashdata('customer', $customer);
			return true;
		} else{
			return false;
		}
	}
	
	function logout()
	{
		$this->session->unset_userdata('customer');
		$this->session->unset_userdata('coupon');
		$this->session->unset_userdata('lead');
		$this->sale_questions->destroy(false);
	}
	
	function saveAppDetails($save){
		if ($save['id'])
		{
			$this->db->where('id', $save['id']);
			$this->db->update('users', $save);

			$id	= $save['id'];
		}
		else
		{
			$this->db->insert('users', $save);
			$id	= $this->db->insert_id();
		}
		if($this->session->userdata ["cart_contents"]['customer']){
			$customer = $this->session->userdata ["cart_contents"]['customer'];
			$customer['is_app_name'] = $save['is_app_name'];
			$customer['is_app_key'] = $save['is_app_key'];
			$sessions = $this->sale_questions->save_customer($customer);
			}
		return $id;
	}
	
	function getUserDatails($id){
		$this->db->select('*');
		$this->db->from('users');
		if($id){
		$this->db->where('id',$id);
		}
		$query = $this->db->get();  
		return $query->result();
	}
	
	function getUserByEmail($email){
		$this->db->select('*');
		$this->db->from('users');
		if($email){
		$this->db->where('email',$email);
		}
		$query = $this->db->get();  
		return $query->row();
	}
	
	function checkCustomerPurchase($id){
		$this->db->select('*');
		$this->db->from('order');
		if($id){
		$this->db->where('user_id',$id);
		}
		$query = $this->db->get();  
		return $query->result();
		/*$this->db->select('a.*,b.*');
		$this->db->from('order a');
		$this->db->join('users b', 'b.id = a.user_id', 'left');
		if($id){
		$this->db->where('a.user_id',$id);
		}
		$query = $this->db->get();
		return $query->result();*/
	}
	
	function validateCoupon($code){
		$this->db->select('*');
		$this->db->from('coupon');
		$this->db->where('code',$code);
		$query = $this->db->get();  
		return $query->result();
	}
	
	function applyCoupon($code){
		$this->db->select('*');
		$this->db->from('coupon');
		$this->db->where('code',$code);
		$query = $this->db->get();  
		$coupon = $query->row_array();
		$sessions = $this->sale_questions->save_coupon($coupon);
	}
	
	function getSearchUser($sSearch,$iDisplayStart,$iDisplayLength,$iSortCol_0,$sSortDir_0){
		$this->db->select('*'); 
		$this->db->from('users');
		if($sSearch != ''){
		$this->db->where("(`id` LIKE '%$sSearch%' OR `first_name` LIKE '%$sSearch%' OR `last_name` LIKE '%$sSearch%' OR `email` LIKE '%$sSearch%' OR `phone` LIKE '%$sSearch%')", NULL, FALSE);
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
				$sortColumn = 'phone';
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
	function deleteUser($id=''){
		if($id!=''){
			$this->db->where('id',$id); 
			$this->db->delete('users');
		
		}
	}
	
	function checkAdminUser($id){
		$this->db->select('*');
		$this->db->from('users');
		$this->db->where("(`id` != $id AND `is_admin` = 1)", NULL, FALSE);
		$query = $this->db->get();  
		return $query->result();
	}
	function changePassword($save){
			$this->db->where('email', $save['email']);
			$this->db->where('verify_link', $save['verify_link']);
			$save['verify_link'] = '';
			$saveId = $this->db->update('users', $save);
			return $saveId;
	}
	function check_verify_link($email, $verify_link){
		$this->db->select('*');
		$this->db->from('users');
		$this->db->where('email', $email);
		$this->db->where('verify_link', $verify_link);
		$query = $this->db->get();  
		return $query->result();
	}
	function selectcount()
	{
	$this->load->database();
			$this->db->select('COUNT(*) AS total');
			$this->db->from('users');
			$query = $this->db->get(); 	
			return $query->result();
	}
}