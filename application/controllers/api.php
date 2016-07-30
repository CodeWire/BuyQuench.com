<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Api extends CI_Controller {

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
		$this->load->model(array('Quiz_model','User_model','Price_model'));
		$this->load->library('session');
		$this->load->helper('url');
	}
	public function index()
	{
		redirect('users/pricing');
	}
	
	public function quiz(){
		if(isset($_GET['email']) && isset($_GET['key'])){
			$user_details	= $this->Quiz_model->getUserId($_GET['email'], $_GET['key']);
			if(!empty($user_details)){
				$quiz_details	= $this->Quiz_model->getQuizByAPIKey($user_details[0]->id);
				if(!empty($quiz_details)){
					foreach($quiz_details as $quiz_detail){
						$quiz_detail->url = base_url().'quiz/index/'.$quiz_detail->url;
					}
					echo json_encode($quiz_details);
				} else {
					echo 'There is no quiz';
				}
			} else {
				echo 'Invalid Email or API Key';
			}
		}else {
			echo 'Parameters Required';
		}
	} 
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */