<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Customers extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	 function __construct()
	{
		parent::__construct();
		$this->load->model(array('Quiz_model','User_model','Coupon_model'));
		$this->load->helper('url');
		$redirect	= $this->User_model->is_logged_in();
		if(!$redirect){
			redirect('users/login');
		}
		$currentChild = $this->router->fetch_method();
		if($currentChild != 'profile'){
		if($this->session->userdata ["cart_contents"]['customer']){
		$customer = $this->session->userdata ["cart_contents"]['customer']; 
		$checkCustomerPurchase = $this->User_model->checkCustomerPurchase($customer['id']);
		if(!empty($checkCustomerPurchase)){
			if($customer['is_app_name'] == '' || $customer['is_app_key'] == ''){
				redirect('users/is_info');
			}
			$userDetails = $this->User_model->getUserDatails($customer['id']);
			if($userDetails[0]->is_admin != 1){
				redirect('admin/questions/quiz_list');
			}
		} else {
			redirect('users/pricing');
		}
		}
		}
	}
	
	public function index()
	{
		$data['body']			= 'admin/customers';
		$first_name = $this->input->post('first_name');
		if($first_name){
			$last_name = $this->input->post('last_name');
			$email = $this->input->post('email');
			$phone = $this->input->post('phone');
			$password = $this->input->post('password');
			$confirm_password = $this->input->post('confirm_password');
			$customer_id = $this->input->post('customer_id');
			$user_is_admin = $this->input->post('user_is_admin');
			
			$app_name = $this->input->post('app_name');
			$app_key = $this->input->post('app_key');
			
			if($customer_id != ''){
			$save['id'] = $customer_id;
			} else{
				$save['id'] = '';
			}
			$save['first_name'] = $first_name;
			$save['last_name'] = $last_name;
			$save['email'] = $email;
			$save['phone'] = $phone;
			
			$save['is_app_name'] = $app_name;
			$save['is_app_key'] = $app_key;
			
			if($password != '' && $password == $confirm_password){
			$save['password'] = md5($password);
			}
			if($user_is_admin == 1){
				$save['is_admin'] = $user_is_admin;
			} else {
				$adminUsers = $this->User_model->checkAdminUser($save['id']);
				if(!empty($adminUsers)){
					$save['is_admin'] = 0;
				} else{
					$data['error'] = 'Admin is required. There is no other admin';
				}
			}
			$customer_id = $this->User_model->saveUser($save);
			$data['message'] = 'Customer saved successfully';
			if($customer_id){
			redirect('admin/customers/edit/'.$customer_id);
			}
		}
		$this->load->view('layout',$data);
	}
	
	public function customer_list()
	{
		//$cat_id = $_GET['id'];
		$data['body']			= 'admin/customer_list';
		$this->load->view('layout',$data);
	}
	
	public function get_customers()
	{
		$sSearch = '';
		$iDisplayStart = '';
		$iDisplayLength = '';
		$iSortCol_0 = '';
		$sSortDir_0 = '';
		if(isset( $_GET['sSearch'] )){
		$sSearch = $_GET['sSearch'];
		}
		if(isset( $_GET['iDisplayStart'] ) && $_GET['iDisplayLength'] != '-1'){
		$iDisplayStart = $_GET['iDisplayStart'];
		$iDisplayLength = $_GET['iDisplayLength'];
		}
		if(isset( $_GET['iSortCol_0'] )){
		$iSortCol_0 = $_GET['iSortCol_0'];
		}
		if(isset( $_GET['sSortDir_0'] )){
		$sSortDir_0 = $_GET['sSortDir_0'];
		}
		$coupons = $this->User_model->getSearchUser($sSearch,$iDisplayStart,$iDisplayLength,$iSortCol_0,$sSortDir_0);
		foreach($coupons as $key=>$coupon){
			$coupons[$key]['edit'] = '<a class="icons" href="'.base_url().'admin/customers/edit/'.$coupon['id'].'"><i class="fa fa-edit"></i>Edit</a>';
			$coupons[$key]['autologin'] = '<a class="icons" href="'.base_url().'admin/customers/autologin/'.$coupon['id'].'"><i class="fa fa-sign-in"></i>Auto login</a>';
			$coupons[$key]['delete'] = '<a class="icons" href="'.base_url().'admin/customers/delete/'.$coupon['id'].'"><i class="fa fa-times"></i>Delete</a>';
		}
		$totalRegards=$this->User_model->selectcount();
		$filterRegards = count($coupons);
		$coupon_result = array(
		"sEcho" => intval($_GET['sEcho']),
		"iTotalRecords" => $filterRegards,
		"iTotalDisplayRecords" => (int)$totalRegards[0]->total,
		"aaData" => array()
		
	);
		$coupon_result['aaData'] = $coupons;
		echo json_encode($coupon_result);
	}
	public function edit()
	{
		$segments	= $this->uri->total_segments();
		$base_url	= $this->uri->segment_array();
		if($segments){
		$customerId = $base_url[$segments];
		$data['customer_details'] = $customer_details	= $this->User_model->getUserDatails($customerId);
			if(empty($customer_details)){
				throw new Exception();
			} else {
			$data['body']			= 'admin/customers';
			}
		} else {
			redirect('admin/customers/customer_list');
		}
		$this->load->view('layout',$data);
	}
	public function backtoadmin()
	{
		if($this->session->userdata('temp_login')){
			if($this->session->userdata('main_login')){
				$customerId = $this->session->userdata('main_login');
				$this->User_model->autoLogin($customerId);
				redirect('admin/customers/customer_list');
			}
		}
	}
	public function autologin()
	{
		$segments	= $this->uri->total_segments();
		$base_url	= $this->uri->segment_array();
		if($segments){
		$customerId = $base_url[$segments];
		
		if($this->session->userdata ["cart_contents"]['customer']){
					$customer = $this->session->userdata ["cart_contents"]['customer']; 
					$super_admin = $customer['is_admin'];
					if($super_admin){
						$this->session->set_userdata('main_login', $customer['id']);
						$this->User_model->autoLogin($customerId);
						$this->session->set_userdata('temp_login', $customerId);
						redirect('admin');
					}
		}
		
		/*$data['customer_details'] = $customer_details	= $this->User_model->getUserDatails($customerId);
			if(empty($customer_details)){
				throw new Exception();
			} else {
			$data['body']			= 'admin/customers';
			}*/
		} else {
			redirect('admin/customers/customer_list');
		}
		$this->load->view('layout',$data);
	}
	public function delete()
	{
		$segments	= $this->uri->total_segments();
		$base_url	= $this->uri->segment_array();
		if($segments){
		$couponId = $base_url[$segments];
		$result = $this->User_model->deleteUser($couponId);
		}
		if (condition == TRUE) {
		   redirect('admin/customers/customer_list');
		}
	}
	public function profile(){
		if($this->session->userdata ["cart_contents"]['customer']){
			$customer = $this->session->userdata ["cart_contents"]['customer'];
			$data['body']			= 'admin/profile';
			$first_name = $this->input->post('first_name');
			if($first_name){
				$last_name = $this->input->post('last_name');
				$email = $this->input->post('email');
				$phone = $this->input->post('phone');
				$password = $this->input->post('password');
				$confirm_password = $this->input->post('confirm_password');
				$phone = $this->input->post('phone');
				$api_key = $this->input->post('api_key');
				
				$app_name = $this->input->post('app_name');
				$app_key = $this->input->post('app_key');
			
			
				$save['id'] = $customer['id'];
				$save['first_name'] = $first_name;
				$save['last_name'] = $last_name;
				$save['email'] = $email;
				$save['phone'] = $phone;
				$save['api_key'] = $api_key;
				
				$save['is_app_name'] = $app_name;
				$save['is_app_key'] = $app_key;
				if($password != '' && $password == $confirm_password){
				$save['password'] = md5($password);
				}
				$this->User_model->saveUser($save);
			}
			$data['customer_details'] = $this->User_model->getUserDatails($customer['id']);
			$this->load->view('layout',$data);
		} else {
			redirect('users/login');
		}
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */