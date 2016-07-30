<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Index extends CI_Controller {

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
		$this->load->model(array('Quiz_model','Order_model'));
		$this->load->model(array('User_model'));
		$this->load->helper('url');
		$redirect	= $this->User_model->is_logged_in();
		if($redirect){
			redirect('questions/index');
		}
		if(isset($this->session->userdata ["cart_contents"]['customer']) && $this->session->userdata ["cart_contents"]['customer']){
		$customer = $this->session->userdata ["cart_contents"]['customer']; 
		$checkCustomerPurchase = $this->User_model->checkCustomerPurchase($customer['id']);
		if(!empty($checkCustomerPurchase)){
			if($customer['is_app_name'] == '' || $customer['is_app_key'] == ''){
				redirect('users/is_info');
			}
		} /*else {
			redirect('users/pricing');
		}*/
		}
	}
	public function index()
	{
		$data['body']			= 'admin/index';
		/*$session = $this->session->all_userdata();
		var_dump($session);*/
		$this->load->view('layout',$data);
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */