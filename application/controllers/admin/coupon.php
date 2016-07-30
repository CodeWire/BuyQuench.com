<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Coupon extends CI_Controller {

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
	
	public function index()
	{
		$data['body']			= 'admin/coupon';
		$coupon_name = $this->input->post('coupon_name');
		if($coupon_name){
			$coupon_code = $this->input->post('coupon_code');
			$start_date = explode('/',$this->input->post('start_date'));
			if(isset($start_date[2])){
				$cur_start_date = $start_date[2].'-'.$start_date[0].'-'.$start_date[1].' 00:00:00';
			} else {
				$cur_start_date = '';
			}
			$end_date = explode('/',$this->input->post('end_date'));
			if(isset($start_date[2])){
				$cur_end_date = $end_date[2].'-'.$end_date[0].'-'.$end_date[1].' 00:00:00';
			} else {
				$cur_end_date = '';
			}
			$status = $this->input->post('enabled');
			$coupon_desc = $this->input->post('coupon_desc');
			$type = $this->input->post('type');
			$amount = $this->input->post('amount');
			$coupon_id = $this->input->post('coupon_id');
			if($coupon_id != ''){
			$save['id'] = $coupon_id;
			} else{
				$save['id'] = '';
			}
			$save['name'] = $coupon_name;
			$save['code'] = $coupon_code;
			$save['start_date'] = $cur_start_date;
			$save['end_date'] = $cur_end_date;
			$save['status'] = $status;
			$save['desc'] = $coupon_desc;
			$save['type'] = $type;
			$save['amount'] = $amount;
			$coupon_id = $this->Coupon_model->saveCoupon($save);
			$data['message'] = 'Coupon saved successfully';
			if($coupon_id){
			redirect('admin/coupon/edit/'.$coupon_id);
			}
		}
		$this->load->view('layout',$data);
	}
	
	public function coupon_list()
	{
		//$cat_id = $_GET['id'];
		$data['body']			= 'admin/coupon_list';
		$this->load->view('layout',$data);
	}
	
	public function get_coupons()
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
		$coupons = $this->Coupon_model->getCoupon($sSearch,$iDisplayStart,$iDisplayLength,$iSortCol_0,$sSortDir_0);
		foreach($coupons as $key=>$coupon){
			$coupons[$key]['edit'] = '<a class="icons" href="'.base_url().'admin/coupon/edit/'.$coupon['id'].'"><i class="fa fa-edit"></i>Edit</a>';
			$coupons[$key]['delete'] = '<a class="icons" href="'.base_url().'admin/coupon/delete/'.$coupon['id'].'"><i class="fa fa-times"></i>Delete</a>';
		}
		$totalRegards=$this->Coupon_model->selectcount();
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
		$couponId = $base_url[$segments];
		$data['coupon_details'] = $coupon_details	= $this->Coupon_model->getCouponById($couponId);
			if(empty($coupon_details)){
				throw new Exception();
			} else {
			$data['body']			= 'admin/coupon';
			}
		} else {
			redirect('admin/coupon/coupon_list');
		}
		$this->load->view('layout',$data);
	}
	public function delete()
	{
		$segments	= $this->uri->total_segments();
		$base_url	= $this->uri->segment_array();
		if($segments){
		$couponId = $base_url[$segments];
		$result = $this->Coupon_model->deleteCoupon($couponId);
		}
		if (condition == TRUE) {
		   redirect('admin/coupon/coupon_list');
		}
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */