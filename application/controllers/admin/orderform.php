<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once(APPPATH.'libraries/infusionsoft/isdk.php'); 
class Orderform extends CI_Controller {

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
		$this->load->model(array('Order_model','User_model','Price_model','Is_model'));
		$this->load->helper('url');
		$redirect	= $this->User_model->is_logged_in();
		if(!$redirect){
			redirect('users/login');
		}
		if($this->session->userdata ["cart_contents"]['customer']){
		$customer = $this->session->userdata ["cart_contents"]['customer']; 
		$userDetails = $this->User_model->getUserDatails($customer['id']);
			if($userDetails[0]->is_admin != 1){
				$this->data['customerId'] = $customer['id'];
			} else {
				$this->data['customerId'] = 1;
			}
		$checkCustomerPurchase = $this->User_model->checkCustomerPurchase($customer['id']);
		if(!empty($checkCustomerPurchase)){
			if($customer['is_app_name'] == '' || $customer['is_app_key'] == ''){
				redirect('users/is_info');
			}
			if($userDetails[0]->plan == 1 || $userDetails[0]->plan == 2){
				redirect('admin/questions/quiz_list');
			}
		} else {
			redirect('users/pricing');
		}
		}
	}
	
	public function index()
	{
		$data['body']			= 'admin/orderform';
		/*$price_name = $this->input->post('price_name');
		if($price_name){
			$price = $this->input->post('price');
			$duration = $this->input->post('duration');
			$price_desc = $this->input->post('price_desc');
			$price_id = $this->input->post('price_id');
			$featured = $this->input->post('featured');
			if($price_id != ''){
			$save['id'] = $price_id;
			} else{
				$save['id'] = '';
			}
			$save['name'] = $price_name;
			$save['price'] = $price;
			$save['duration'] = $duration;
			$save['desc'] = $price_desc;
			$save['featured'] = $featured;
			$this->Price_model->savePrice($save);
			$data['message'] = 'Price saved successfully';
			if($price_id){
			redirect('admin/pricing/edit/'.$price_id);
			}
		}*/
		$this->load->view('layout',$data);
	}
	
	public function save_form(){
		$rendered_form = $this->input->post('rendered_form');
		$orderform_uname = $this->input->post('orderform_uname');
		$orderform_desc = $this->input->post('orderform_desc');
		$orderform_price = $this->input->post('orderform_price');
		$orderform_active = $this->input->post('orderform_active');
		$tagCategory = $this->input->post('tagCategory');
		$tagvalues = $this->input->post('tagvalues');
		$uploaded_img1 = $this->input->post('uploaded_img1');
		$uploaded_img2 = $this->input->post('uploaded_img2');
		$orderform_id = $this->input->post('orderform_id');
		if($orderform_active == 1){
			$resetOrderForm = $this->Order_model->resetOrderFormActive();
		} else {
			$checkOrderForm = $this->Order_model->checkOrderFormActive();
			if(empty($checkOrderForm)){
				/*echo '<span class="has-error"><span class="help-block"><i class="fa fa-warning"></i>There is no active form please click the checkbox of "Make the form to active"</span></span>';
				exit(0);*/
			}
		}
		if($orderform_id==''){
		$saveOrderForm['id'] = '';
		} else {
			$saveOrderForm['id'] = $orderform_id;
		}
		$saveOrderForm['name'] = $orderform_uname;
		$saveOrderForm['desc'] = $orderform_desc;
		$saveOrderForm['price'] = $orderform_price;
		$saveOrderForm['active'] = $orderform_active;
		$saveOrderForm['form'] = $rendered_form;
		$saveOrderForm['tag_category'] = $tagCategory;
		$saveOrderForm['tags'] = $tagvalues;
		$saveOrderForm['header_image'] = $uploaded_img1;
		$saveOrderForm['footer_image'] = $uploaded_img2;
		$customerId = $this->data['customerId'];
		//var_dump($customerId); exit;
		$saveOrderForm['user_id'] = $customerId;
		$saveOrderFromId = $this->Order_model->save_orderform($saveOrderForm);
			echo $saveOrderFromId;
	}
	
	public function orderform_list()
	{
		//$cat_id = $_GET['id'];
		$data['body']			= 'admin/orderform_list';
		$this->load->view('layout',$data);
	}
	
	public function get_orderforms()
	{
		$customerId = $this->data['customerId'];
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
		if($customerId == 1){ $customerId = NULL; }
		$orderforms = $this->Order_model->getOrderForms($sSearch,$iDisplayStart,$iDisplayLength,$iSortCol_0,$sSortDir_0,$customerId);
		foreach($orderforms as $key=>$orderform){
			$curactive = $orderform['active'];
			if($curactive){
				$orderforms[$key]['active'] = 'Enabled';
			} else {
				$orderforms[$key]['active'] = 'Disabled';
			}
			$orderforms[$key]['url'] = '<a class="" target="_blank" href="'.base_url('cart/checkout').'?id='.$orderform['id'].'">'.base_url('cart/checkout').'?id='.$orderform['id'].'</a>';
			$orderforms[$key]['edit'] = '<a class="icons" href="'.base_url().'admin/orderform/edit/'.$orderform['id'].'"><i class="fa fa-edit"></i>Edit</a>';
			$orderforms[$key]['delete'] = '<a class="icons" href="'.base_url().'admin/orderform/delete/'.$orderform['id'].'"><i class="fa fa-times"></i>Delete</a>';
		}
		$totalRegards=$this->Order_model->selectcount($customerId);
		
		//$totalRegards=count($orderforms);
		$filterRegards = count($orderforms);
		$orderform_result = array(
		"sEcho" => intval($_GET['sEcho']),
		"iTotalRecords" => $filterRegards,
		"iTotalDisplayRecords" => (int)$totalRegards[0]->total,
		//"iTotalDisplayRecords" =>$totalRegards,
		"aaData" => array()
		
		
	);
		$orderform_result['aaData'] = $orderforms;
		echo json_encode($orderform_result);
	}
	
	public function edit()
	{
		//var_dump($data); exit(0);
		$customerId = $this->data['customerId'];
		if($customerId == 1){ $customerId = NULL; }
		$data['ISCustomerFields'] = $this->Is_model->ISBasicFields();
		$data['ISTags'] = $this->Is_model->getTags();
		$data['custom_fields'] = $this->Is_model->ISCustomFields();
		$segments	= $this->uri->total_segments();
		$base_url	= $this->uri->segment_array();
		if($segments){
		$orderformId = $base_url[$segments];
		$data['orderform_details'] = $orderform_details	= $this->Order_model->getOrderFormById($orderformId, $customerId);
			if(empty($orderform_details)){
				redirect('errors');
			} else {
			$data['body']			= 'admin/orderform';
			$this->load->view('layout',$data);
			}
		} else {
			redirect('admin/orderform/orderform_list');
		}
		
	}
	
	public function delete()
	{
		$segments	= $this->uri->total_segments();
		$base_url	= $this->uri->segment_array();
		if($segments){
		$orderformId = $base_url[$segments];
		$result = $this->Order_model->delete($orderformId);
		}
		if (condition == TRUE) {
		   redirect('admin/orderform/orderform_list');
		}
	}
	
	public function merchant(){
		$posetedValues = $this->input->post();
		foreach($posetedValues as $key=>$posetedValue){
			if($key!='orderform_id'){
			$paymentvalues[$key] = $posetedValue;
			} else {
				$id = $posetedValue;
			}
		}
		if(!isset($id)){$id='';}
		$saveOrderForm['id'] = $id;
		$saveOrderForm['merchant'] = json_encode($paymentvalues);
		$saveOrderFromId = $this->Order_model->save_orderform($saveOrderForm);
		echo $saveOrderFromId;
	}
	public function thankurl(){
		$thankurl = $this->input->post('thankurl');
		$id = $this->input->post('orderform_id');
		$saveOrderForm['id'] = $id;
		$saveOrderForm['thank_url'] = $thankurl;
		$saveOrderFromId = $this->Order_model->save_orderform($saveOrderForm);
		echo $saveOrderFromId;
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */