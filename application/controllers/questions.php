<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Questions extends CI_Controller {

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
		$this->load->model(array('Quiz_model'));
	}
	public function index()
	{
		$data['body']			= 'questions';
		$this->load->view('layout',$data);
	}
	public function get_nodes_by_cat()
	{
		$cat_id = $_GET['id'];
		$data['body']			= 'questions';
		//$node_cat = $this->Quiz_model->get_nodes_by_cat($cat_id);
		//$this->load->view('layout',$data);
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */