<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class File_upload extends CI_Controller {

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
	public function index()
	{
	/*var_dump($this->input->post()); 
	echo '<br/>';
	$upload_data = $this->upload->data();
	$file_name = $upload_data['file_name'];
	var_dump($file_name);
	exit(0);*/
	//$cat_name = $this->input->post('cat_name');
		$this->load->helper('url'); 
		
		if( $_FILES['file']['name'] != "" )
		{
		 $targetPath = $_SERVER['DOCUMENT_ROOT'].'/uploads/';
		 
		 $path_parts = pathinfo($_FILES['file']['name']);

		 $name = $path_parts['filename'];
		 $extension = $path_parts['extension'];
$increment = ''; //start with no suffix

while(file_exists($targetPath.$name . $increment . '.' . $extension)) {
    $increment++;
}
$basename = $name . $increment . '.' . $extension;

		   copy( $_FILES['file']['tmp_name'], $targetPath.$basename) or 
				   die( "Could not copy file!");
		}
		else
		{
			die("No file specified!");
		}
		echo $basename;
		/*$this->load->model('Quiz_model');
		
		$save['id'] = '';
		$save['name'] = $cat_name;
		$save['image'] = $basename;
		
		$this->Quiz_model->saveCategory($save);*/
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */