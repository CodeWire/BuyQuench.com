<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once(APPPATH.'libraries/infusionsoft/isdk.php');  
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
	public function __construct()
	{
		parent::__construct();
		$this->load->model(array('User_model','Price_model'));
		$this->load->library('session');
		$this->load->helper('url');
		$this->customer = $this->sale_questions->customer();
	}
	public function index()
	{
		$data['body']			= 'price';
		$redirect	= $this->User_model->is_logged_in();
 		if ($redirect)
		{	
			//redirect('admin/questions/quiz_list');
			$data['login']=true;
			if($this->session->userdata ["cart_contents"]['customer']){
			$customer = $this->session->userdata ["cart_contents"]['customer']; 
			$checkCustomerPurchase = $this->User_model->checkCustomerPurchase($customer['id']);
			
				if(!empty($checkCustomerPurchase)){
					if($customer['is_app_name'] == '' || $customer['is_app_key'] == ''){
						redirect('users/is_info');
					} else {
						redirect('admin/questions/quiz_list');
					}
				}
			}
		} else {
			$data['login']=false;
		}
		$ci =& get_instance();
		$ci->config->load('stripe', true);
		$config = $ci->config->item('stripe');
		
		$data['publishable_key'] = $config['publishable_key'];
		$data['price_details'] = $price_details	= $this->Price_model->getPriceById();
		$data['orderform'] = $this->Price_model->getActiveOrderForm();
		$this->load->view('layout_front',$data);
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */