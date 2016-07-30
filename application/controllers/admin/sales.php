<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once(APPPATH.'libraries/infusionsoft/isdk.php');
class Sales extends CI_Controller {

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
		$this->load->model(array('Web_model','Is_model','Sales_model'));
		$this->load->model(array('User_model'));
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
		} else {
			redirect('users/pricing');
		}
		}
	}
	public function index()
	{
		$data['func'] = 'New';
		$data['body']			= 'admin/sales_list';
		/*$session = $this->session->all_userdata();
		var_dump($session);*/
		$this->load->view('layout',$data);
	}
	
	public function save_form(){}
	
	public function sales_list()
	{
		//$cat_id = $_GET['id'];
		$data['body']			= 'admin/sales_list';
		$this->load->view('layout',$data);
	}
	
	public function get_sales()
	{
		$customerId = $this->data['customerId'];
		if($customerId == 1){ $customerId = NULL; }
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
		$salesforms = $this->Sales_model->getSales($sSearch,$iDisplayStart,$iDisplayLength,$iSortCol_0,$sSortDir_0, $customerId);
		foreach($salesforms as $key=>$salesform){
			$catId = $salesform['cat_id'];
			$catDetails = $this->Sales_model->getWinTagByCatId($catId);
			if(!empty($catDetails)){
				$salesforms[$key]['cat_id'] = $catDetails[0]->win_tag;
			}
			/*$curactive = $salesform['active'];
			if($curactive){
				$salesforms[$key]['active'] = 'Enabled';
			} else {
				$salesforms[$key]['active'] = 'Disabled';
			}*/
			$salesforms[$key]['edit'] = '<a class="icons" href="'.base_url().'admin/sales/edit/'.$salesform['id'].'"><i class="fa fa-edit"></i>Edit</a>';
			$salesforms[$key]['delete'] = '<a class="icons" href="'.base_url().'admin/sales/delete/'.$salesform['id'].'"><i class="fa fa-times"></i>Delete</a>';
		}
		$totalRegards=$this->Sales_model->selectcount();
		$filterRegards = count($salesforms);
		$salesform_result = array(
		"sEcho" => intval($_GET['sEcho']),
		"iTotalRecords" => $filterRegards,
		"iTotalDisplayRecords" => (int)$totalRegards[0]->total,
		"aaData" => array()
		
	);
		$salesform_result['aaData'] = $salesforms;
		
		echo json_encode($salesform_result);
	}
	
	public function edit()
	{
		if($this->input->post() == ''){
			$data['func'] = 'Edit';
			$segments	= $this->uri->total_segments();
			$base_url	= $this->uri->segment_array();
			if($segments){
			$salesId = $base_url[$segments];
			$data['sales_details'] = $sales_details	= $this->Sales_model->getSalesById($salesId);
				if(empty($sales_details)){
					redirect('errors');
				} else {
					$data['body']			= 'admin/sales';
					$this->load->view('layout',$data);
				}
			} else {
				redirect('admin/sales/sales_list');
			}
		} else {
			$save = $this->input->post();
			$saveId = $this->Sales_model->save_sales($save);
			redirect('admin/sales/edit/'.$saveId);
		}
	}
	
	public function delete()
	{
		$segments	= $this->uri->total_segments();
		$base_url	= $this->uri->segment_array();
		if($segments){
		$salesformId = $base_url[$segments];
		$result = $this->Sales_model->delete($salesformId);
		}
		if (condition == TRUE) {
		   redirect('admin/salesform/salesform_list');
		}
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */