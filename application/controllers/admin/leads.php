<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once(APPPATH.'libraries/infusionsoft/isdk.php');
class Leads extends CI_Controller {

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
		$this->load->model(array('Web_model','Is_model','Leads_model'));
		$this->load->model(array('User_model'));
		$this->load->helper('url');
		$redirect	= $this->User_model->is_logged_in();
		if(!$redirect){
			redirect('users/login');
		}
		if($this->session->userdata ["cart_contents"]['customer']){
		$customer = $this->session->userdata ["cart_contents"]['customer']; 
		$checkCustomerPurchase = $this->User_model->checkCustomerPurchase($customer['id']);
		$userDetails = $this->User_model->getUserDatails($customer['id']);
			if($userDetails[0]->is_admin != 1){
				$this->data['customerId'] = $customer['id'];
			} else {
				$this->data['customerId'] = 1;
			}
		if(!empty($checkCustomerPurchase)){
			if($customer['is_app_name'] == '' || $customer['is_app_key'] == ''){
				redirect('users/is_info');
			}
			if($userDetails[0]->plan == 1){
				redirect('admin/questions/quiz_list');
			}
		} else {
			redirect('users/pricing');
		}
		}
	}
	public function index()
	{
		$data['body']			= 'admin/webform';
		/*$session = $this->session->all_userdata();
		var_dump($session);*/
		$this->load->view('layout',$data);
	}
	
	public function save_form(){}
	
	public function leads_list()
	{
		//$cat_id = $_GET['id'];
		$customerId = $this->data['customerId'];
		if($customerId == 1){ $customerId = NULL; }
		$allLeads = $this->Leads_model->getBaseLeads($customerId);
		if(!empty($allLeads)){
			$data['allLeads'] = $allLeads;
			/*foreach($allLeads as $allLead){
				$data['leads_details'][] = $this->Leads_model->getLeadsList($allLead->id);
			}*/
		} else {
			$data['allLeads'] = '';
		}
		$data['body']			= 'admin/leads_list';
		$this->load->view('layout',$data);
	}
	
	public function get_leads()
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
		$webforms = $this->Leads_model->getLeads($sSearch,$iDisplayStart,$iDisplayLength,$iSortCol_0,$sSortDir_0);
		
		foreach($webforms as $key=>$webform){
			$catId = $webform['lead_base_id'];
			$catDetails = $this->Sales_model->getWinTagByCatId($catId);
			if(!empty($catDetails)){
				$webforms[$key]['cat_id'] = $catDetails[0]->win_tag;
			}
		}
		$totalRegards=$this->Leads_model->selectcount();
		$filterRegards = count($webforms);
		$webform_result = array(
		"sEcho" => intval($_GET['sEcho']),
		"iTotalRecords" => $filterRegards,
		"iTotalDisplayRecords" => (int)$totalRegards[0]->total,
		"aaData" => array()
		
		
	);
		$webform_result['aaData'] = $webforms;
		echo json_encode($webform_result);
	}
	
	public function edit()
	{}
	
		public function delete()
	{}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */