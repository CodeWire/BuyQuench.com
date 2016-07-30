<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Notification extends CI_Controller {

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
		$data['body']			= 'admin/notification';
		/*$session = $this->session->all_userdata();
		var_dump($session);*/
		$this->load->view('layout',$data);
	}
	
	public function read(){
		$notiIds = explode(',',$this->input->post('noti_id'));
		if(is_array($notiIds)){
		foreach($notiIds as $notiId){
			$this->Notification_model->readNoti($notiId);
		}} else {
			$this->Notification_model->readNoti($notiIds[0]);
		}
	}
	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */