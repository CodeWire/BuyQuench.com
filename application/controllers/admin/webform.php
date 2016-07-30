<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once(APPPATH.'libraries/infusionsoft/isdk.php');
class Webform extends CI_Controller {

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
		$this->load->model(array('Web_model','Is_model'));
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
	
	public function save_form(){
		$rendered_form = $this->input->post('rendered_form');
		$webform_uname = $this->input->post('webform_uname');
		$webform_desc = $this->input->post('webform_desc');
		$icon = $this->input->post('icon');
		$tagCategory = $this->input->post('tagCategory');
		$tags = $this->input->post('tags');
		$webform_active = $this->input->post('webform_active');
		$webform_id = $this->input->post('webform_id');
		if($webform_active == 1){
			$resetwebform = $this->Web_model->resetwebformActive();
		} else {
			$checkwebform = $this->Web_model->checkwebformActive();
			if(empty($checkwebform)){
				/*echo '<span class="has-error"><span class="help-block"><i class="fa fa-warning"></i>There is no active form please click the checkbox of "Make the form to active"</span></span>';
				exit(0);*/
			}
		}
		if($webform_id==''){
		$savewebform['id'] = '';
		} else {
			$savewebform['id'] = $webform_id;
		}
		$savewebform['name'] = $webform_uname;
		$savewebform['desc'] = $webform_desc;
		$savewebform['active'] = $webform_active;
		$savewebform['form'] = $rendered_form;
		$savewebform['icon'] = $icon;
		$savewebform['tag_category'] = $tagCategory;
		$savewebform['tags'] = $tags;
		$customerId = $this->data['customerId'];
		$savewebform['user_id'] = $customerId;
		$saveOrderFromId = $this->Web_model->save_webform($savewebform);
			echo '<span class="has-success"><span class="help-block"><i class="fa fa-check"></i>Form saved Successfully</span></span>';
	}
	
	public function webform_list()
	{
		//$cat_id = $_GET['id'];
		$data['body']			= 'admin/webform_list';
		$this->load->view('layout',$data);
	}
	
	public function get_webforms()
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
		$webforms = $this->Web_model->getwebforms($sSearch,$iDisplayStart,$iDisplayLength,$iSortCol_0,$sSortDir_0,$customerId);
		foreach($webforms as $key=>$webform){
			$curactive = $webform['active'];
			if($curactive){
				$webforms[$key]['active'] = 'Enabled';
			} else {
				$webforms[$key]['active'] = 'Disabled';
			}
			$webforms[$key]['edit'] = '<a class="icons" href="'.base_url().'admin/webform/edit/'.$webform['id'].'"><i class="fa fa-edit"></i>Edit</a>';
			$webforms[$key]['delete'] = '<a class="icons" href="'.base_url().'admin/webform/delete/'.$webform['id'].'"><i class="fa fa-times"></i>Delete</a>';
		}
		$totalRegards=$this->Web_model->selectcount($customerId);
		//$totalRegards=count($webforms);
		$filterRegards = count($webforms);
		$webform_result = array(
		"sEcho" => intval($_GET['sEcho']),
		"iTotalRecords" => $filterRegards,
		"iTotalDisplayRecords" =>(int)$totalRegards[0]->total,
		//"iTotalDisplayRecords" =>$totalRegards,
		"aaData" => array()
		
		
	);
		$webform_result['aaData'] = $webforms;
		echo json_encode($webform_result);
	}
	
	public function edit()
	{
		$customerId = $this->data['customerId'];
		if($customerId == 1){ $customerId = NULL; }
		$segments	= $this->uri->total_segments();
		$base_url	= $this->uri->segment_array();
		//var_dump($segments); exit;	
		$data['ISTags'] = $this->Is_model->getTags();
	
		if($segments){
		$webformId = $base_url[$segments];
		$data['webform_details'] = $webform_details	= $this->Web_model->getwebformById($webformId, $customerId);
			if(empty($webform_details)){
				redirect('errors');
			} else {
				$data['body']			= 'admin/webform';
				$this->load->view('layout',$data);
			}
		} else {
			redirect('admin/webform/webform_list');
		}
		
	}
	
		public function delete()
	{
		$segments	= $this->uri->total_segments();
		$base_url	= $this->uri->segment_array();
		if($segments){
		$webformId = $base_url[$segments];
		$result = $this->Web_model->delete($webformId);
		}
		if (condition == TRUE) {
		   redirect('admin/webform/webform_list');
		}
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */