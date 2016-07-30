<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Checkout extends CI_Controller {

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
		$this->load->helper('url');
	}
	public function index()
	{
		redirect('cart');
	}
	public function success(){
		$session = $this->session->all_userdata();
		var_dump($session);
		var_dump($_POST); exit(0);
		$order_id = $this->sale_questions->save_order();
		
		$data['order_id']			= $order_id;
		//$data['shipping']			= $this->bse_tec->shipping_method();
		$data['payment']			= $this->sale_questions->payment_method();
		$data['customer']			= $this->sale_questions->customer();
		
//		 remove the cart from the session 
		$this->sale_questions->destroy();
		$data['body']			= 'success';
		$this->load->view('layout_front',$data);
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */