<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pricing extends CI_Controller {

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
		$this->load->model(array('Quiz_model','User_model','Price_model'));
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
		$data['body']			= 'admin/pricing';
		$price_name = $this->input->post('price_name');
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
		}
		$this->load->view('layout',$data);
	}
	
	public function price_list()
	{
		//$cat_id = $_GET['id'];
		$data['body']			= 'admin/price_list';
		$this->load->view('layout',$data);
	}
	
	public function get_prices()
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
		$prices = $this->Price_model->getPrice($sSearch,$iDisplayStart,$iDisplayLength,$iSortCol_0,$sSortDir_0);
		foreach($prices as $key=>$price){
			$prices[$key]['edit'] = '<a class="icons" href="'.base_url().'admin/pricing/edit/'.$price['id'].'"><i class="fa fa-edit"></i>Edit</a>';
			$prices[$key]['delete'] = '<a class="icons" href="'.base_url().'admin/pricing/delete/'.$price['id'].'"><i class="fa fa-times"></i>Delete</a>';
		}
		
		$totalRegards=$this->Price_model->selectcount();
		$filterRegards = count($prices);
		$price_result = array(
		"sEcho" => intval($_GET['sEcho']),
		"iTotalRecords" => $filterRegards,
		"iTotalDisplayRecords" => (int)$totalRegards[0]->total,
		"aaData" => array()
		
	);
		$price_result['aaData'] = $prices;
		echo json_encode($price_result);
	}
	public function edit()
	{
		$segments	= $this->uri->total_segments();
		$base_url	= $this->uri->segment_array();
		if($segments){
		$priceId = $base_url[$segments];
		$data['price_details'] = $price_details	= $this->Price_model->getPriceById($priceId);
			if(empty($price_details)){
				throw new Exception();
			} else {
			$data['body']			= 'admin/pricing';
			}
		} else {
			redirect('admin/pricing/price_list');
		}
		$this->load->view('layout',$data);
	}
	public function delete()
	{
		$segments	= $this->uri->total_segments();
		$base_url	= $this->uri->segment_array();
		if($segments){
		$priceId = $base_url[$segments];
		$result = $this->Price_model->deletePrice($priceId);
		}
		if (condition == TRUE) {
		   redirect('admin/pricing/price_list');
		}
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */