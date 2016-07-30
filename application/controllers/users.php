<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once(APPPATH.'libraries/infusionsoft/isdk.php');  
class Users extends CI_Controller {

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
		redirect('users/pricing');
	}
	
	public function login(){
		/*$session = $this->session->flashdata('message');
		var_dump($session);*/
		$data['body']			= 'login';
		$redirect	= $this->User_model->is_logged_in();
 		if ($redirect)
		{	
			redirect('admin/questions/quiz_list');
		}
		
		$login_form = $this->input->post('login_form');
		if ($login_form == 'login_form')
		{	
			$email		= $this->input->post('email');
			$password	= $this->input->post('password');
			$remember   = $this->input->post('remember');
			$login		= $this->User_model->login($email, $password, $remember);
			if($login){
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
				redirect('admin/questions/quiz_list');
			} else
				{
					$this->session->set_flashdata('redirect', 'users/pricing');
					$this->session->set_flashdata('error', 'Login failed, Check user email and password');
					
					redirect('');
				}
		} else {
			redirect('');
				//$this->load->view('layout_front',$data);
		}
		
	}
	
	function logout()
	{
		$this->User_model->logout();
		redirect('');
	}
	public function register_home(){
		$data['body']	= 'price';
		if($this->input->post()){
			$first_name = $this->input->post('first_name');
			$last_name = $this->input->post('last_name');
			$regemail = $this->input->post('regemail');
			$this->load->library('form_validation');
		$this->form_validation->set_rules('first_name', 'First Name', 'trim|required|max_length[32]');
		$this->form_validation->set_rules('last_name', 'Last Name', 'trim|required|max_length[32]');
		$this->form_validation->set_rules('regemail', 'Email', 'trim|required|valid_email|max_length[128]|callback_check_email');
		if ($this->form_validation->run() == FALSE)
		{
			$this->load->helper('directory');
			$data['error'] = validation_errors();	
			$this->session->set_flashdata('error', $data['error']);
		}
		else
		{
				$activation = md5(uniqid(rand(), true));
				$save['id'] = '';
				$save['first_name'] = $first_name;
				$save['last_name'] = $last_name;
				$save['email'] = $regemail;
				
				$length = 10;
		$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
			$randomString = '';
			for ($i = 0; $i < $length; $i++) {
				$randomString .= $characters[rand(0, strlen($characters) - 1)];
			}
			$password = $randomString;
		$activation = md5($password);
		$save['password'] = $activation;

				$save['active'] = 0;
				$save['verify_link'] = $activation;
				$savedUserId = $this->User_model->saveUser($save);
			$this->load->library('email');
			$config['mailtype'] = 'html';
			$this->email->initialize($config);
			$this->email->from('support@peoriawebdevelopment.com', 'peoriawebdevelopment');
			$this->email->to($regemail);
			$this->email->subject('Sales Question password');
			$this->email->message(' your password is: '.$password.'');
			$this->email->send();
			//$data['message'] = 'Thank you for registering! Password has been sent to ' . $regemail .'';
			$this->session->set_flashdata('message', 'Thank you for	registering! Password has been sent to ' . $regemail .'');
		}
				
		}
		redirect('');
		//$this->load->view('layout_front', $data);
	}
	public function register(){
		$data['body']			= 'login';
		if($this->input->post()){
			$first_name = $this->input->post('first_name');
			$last_name = $this->input->post('last_name');
			$regemail = $this->input->post('regemail');
			$regphone = $this->input->post('regphone');
			$regpassword = $this->input->post('regpassword');
			$regconfirmpassword = $this->input->post('regconfirmpassword');
		
		$this->load->library('form_validation');
		$this->form_validation->set_rules('first_name', 'First Name', 'trim|required|max_length[32]');
		$this->form_validation->set_rules('last_name', 'Last Name', 'trim|required|max_length[32]');
		$this->form_validation->set_rules('regemail', 'Email', 'trim|required|valid_email|max_length[128]|callback_check_email');
		$this->form_validation->set_rules('regphone', 'Phone', 'trim|required|max_length[32]');
		$this->form_validation->set_rules('regpassword', 'Password', 'required|min_length[6]|sha1');
		$this->form_validation->set_rules('regconfirmpassword', 'Confirm Password', 'required|matches[regpassword]');

		if ($this->form_validation->run() == FALSE)
		{
			$this->load->helper('directory');
			$data['error'] = validation_errors();	
		}
		else
		{
				$activation = md5(uniqid(rand(), true));
				$save['id'] = '';
				$save['first_name'] = $first_name;
				$save['last_name'] = $last_name;
				$save['email'] = $regemail;
				$save['phone'] = $regphone;
				$save['password'] = md5($regpassword);
				$save['active'] = 0;
				$save['verify_link'] = $activation;
				$savedUserId = $this->User_model->saveUser($save);
			$this->load->library('email');
			$config['mailtype'] = 'html';
			$config['protocol'] = 'sendmail';
$config['mailpath'] = '/usr/sbin/sendmail';
$config['charset'] = 'iso-8859-1';
$config['wordwrap'] = TRUE;
			$this->email->initialize($config);
			/*$config = Array(
  'protocol' => 'smtp',
  'smtp_host' => 'smtp.gmail.com',
  'smtp_port' => 465,
  'smtp_user' => 'akv.venkatesh@gmail.com', // change it to yours
  'smtp_pass' => '19850203', // change it to yours
  'mailtype' => 'html',
  'charset' => 'iso-8859-1',
  'wordwrap' => TRUE
);
			$this->load->library('email', $config);*/
			$this->email->from('support@peoriawebdevelopment.com', 'peoriawebdevelopment');
			$this->email->to($regemail);
			$this->email->subject('Email Verification');
			$this->email->message('Click below link to verify your email address.. <a href="'.base_url().'/user/verify_email/?email='.$regemail.'&key='.$activation.'">Click here</a>');
			if($this->email->send()){
			} else {
				show_error($this->email->print_debugger());
			};
			$this->session->set_flashdata('message', 'Thank you for	registering! A confirmation email	has been sent to ' . $regemail .' Please click on the Activation Link to Activate your account ');	
			/*$ci =& get_instance();
		$ci->config->load('email', true);
		$config = $ci->config->item('email');
require_once APPPATH.'/libraries/PHPMailer-master/class.phpmailer.php';
$mail = new PHPMailer;
$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = $config['email_host'];  
$mail->SMTPAuth = $config['email_smtp_auth'];
$mail->Username = $config['email_username'];
$mail->Password = $config['email_password'];
$mail->Port = $config['email_port'];
$mail->SMTPSecure = $config['email_smtp_secure'];
$mail->From = $config['email_from'];
$mail->FromName = $config['email_fromName'];
$mail->addReplyTo($config['email_from'], $config['email_fromName']);
$mail->WordWrap = $config['email_wordWrap'];
$mail->isHTML($config['email_is_html']);

$mail->Subject = 'Registration';
$mail->addAddress($regemail,  $first_name.' '.$last_name);
				$mail->Body    = 'Click below link to verify your email address.. <a href="'.base_url().'/user/verify_email/?email='.$regemail.'&key='.$activation.'">Click here</a>';
				if(!$mail->send()) {
   echo 'Message could not be sent.';
   echo 'Mailer Error: ' . $mail->ErrorInfo;
   exit;
} else {
echo 'Message has been sent';
}*/
			}
		}
		$this->load->view('layout_front', $data);
	}
	
	function send_email(){
		/*$to      = 'venkatesh.sou@gmail.com';
$subject = 'the subject';
$message = 'hello';
$headers = 'From: webmaster@example.com' . "\r\n" .
    'Reply-To: webmaster@example.com' . "\r\n" .
    'X-Mailer: PHP/' . phpversion();

$result = mail($to, $subject, $message, $headers);
if($result){
	echo 'send';
} else {
	echo 'not send';
}*/
		/*$ci = get_instance();
$ci->load->library('email');
$config['starttls'] = TRUE;
$config['protocol'] = "smtp";
$config['smtp_host'] = "smtp.gmail.com";
$config['smtp_port'] = 587;
//
$config['smtp_user'] = "venkatesh.sou@gmail.com"; 
$config['smtp_pass'] = "june141987";
$config['charset'] = "utf-8";
$config['mailtype'] = "html";
$config['newline'] = "\r\n";

$ci->email->initialize($config);

$ci->email->from('test@gmail.com', 'Blabla');
$list = array('venkatesh.sou@gmail.com');
$ci->email->to($list);
$this->email->reply_to('test@gmail.com', 'Explendid Videos');
$ci->email->subject('This is an email test');
$ci->email->message('It is working. Great!');
if($ci->email->send()){
	echo 'Email send';
			} else {
				show_error($this->email->print_debugger());
			};*/
/*require_once APPPATH.'/libraries/PHPMailer-master/class.phpmailer.php';
$mail = new PHPMailer;
$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'smtp.gmail.com';  // Specify main and backup server
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'akv.venkatesh@gmail.com';                            // SMTP username
$mail->Password = '19850203';                           // SMTP password
$mail->Port = 587;
$mail->SMTPSecure = 'tls';                            // Enable encryption, 'ssl' also accepted
$mail->From = 'test@test.com';
$mail->FromName = 'test';

$mail->addReplyTo('test@test.com', 'test');
//$mail->addCC('cc@example.com');
//$mail->addBCC('bcc@example.com');
//$mail->SMTPDebug = 1;

$mail->WordWrap = 50;                                 // Set word wrap to 50 characters
//$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
//$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
$mail->isHTML(true);                                  // Set email format to HTML

$mail->Subject = 'test mail';
//$mail->AltBody = '';

//$mail->addAddress('avidproducers@gmail.com', 'Travis');
$mail->addAddress('venkatesh.sou@gmail.com', 'venkatesh');
				
				$mail->Body    = 'Test message';
				if(!$mail->send()) {
   echo 'Message could not be sent.';
   echo 'Mailer Error: ' . $mail->ErrorInfo;
   exit;
} else {
echo 'Message has been sent';
}*/
	}
	function check_email($regemail)
	{
		$checkEmailAlready = $this->User_model->checkUserEmailExists($regemail);
        if ($checkEmailAlready)
       	{
			$this->form_validation->set_message('check_email', 'Email Aleady Exists');
			return FALSE;
		}
		else
		{
			return TRUE;
		}
	}
	
	public function verify_email(){
		if (isset($_GET['key']) && (strlen($_GET['key']) == 32)){//The Activation key will always be 32 since it is MD5 Hash
		 $key = $_GET['key'];
		}
			if (isset($email) && isset($key)) {
				$result = $this->User_model->activateUser($email,$key);
				if($result){
					$this->session->set_flashdata('message', 'Your account is now active. You may now <a href="'.base_url('users/login').'">Log in</a>' );
					redirect('users/is_info');
				} else {
					$this->session->set_flashdata('message', 'Oops !Your account could not be activated. Please recheck the link or contact the system administrator.');
				}
			}
	}
	
	public function pricing(){
		/*$session = $this->session->all_userdata();
		var_dump($session);*/
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
	public function is_info(){
		$app = new iSDK;
		$data['body'] = 'is_info';
		$redirect	= $this->User_model->is_logged_in();
 		if (!$redirect)
		{
			redirect('users/login');	
		}
		if($this->session->userdata ["cart_contents"]['customer']){
					$customer = $this->session->userdata ["cart_contents"]['customer']; 
					$checkCustomerPurchase = $this->User_model->checkCustomerPurchase($customer['id']);
					if(empty($checkCustomerPurchase)){
						redirect('users/pricing');
					}
		}
		$app_name = $this->input->post('app_name');
		$app_key = $this->input->post('app_key');
		$user_id = $this->input->post('user_id');
		if($app_name){
			$app_parse = parse_url($app_name);
			if(isset($app_parse['host'])){
			$appdomain = explode('.',$app_parse['host']);
				if(!empty($appdomain[0])){
				if ($app->cfgCon($appdomain[0],$app_key)){
					$save['id'] = $user_id;
					$save['is_app_name'] = $app_name;
					$save['is_app_key'] = $app_key;
					$saveId = $this->User_model->saveAppDetails($save);
					redirect('admin/questions/quiz_list');
				} else {
					$this->session->set_flashdata('error', 'App details not correct.');
					redirect('users/is_info');	
				}
				}
			}else{
				$this->session->set_flashdata('message', 'Your app name should like http://mh218.infusionsoft.com');	
				redirect('users/is_info');
			}
		}
		if($this->session->userdata ["cart_contents"]['customer']){
			$customer = $this->session->userdata ["cart_contents"]['customer']; 
			$data['user_details'] = $this->User_model->getUserDatails($customer['id']);
										} 
		$this->load->view('layout_front',$data);
	}
	public function coupon(){
			$coupon_code = $this->input->post('coupon_code');
			if($coupon_code){
				  $validateCoupon = $this->User_model->validateCoupon($coupon_code);
				  if($validateCoupon){
					$this->User_model->applyCoupon($coupon_code);
					redirect('users/pricing');
				  }
			}
	}
	
	public function removecoupon(){
		/*$session = $this->session->all_userdata();
		var_dump($session); exit(0);*/
		$this->session->unset_userdata('coupon');
		$this->sale_questions->destroy(false);
		redirect('users/pricing');
	}
	
	public function forgot_password(){
		$email = $this->input->post('email');
		if($email){
			$userDetails = $this->User_model->getUserByEmail($email);
			$activation = md5(uniqid(rand(), true));
				$save['id'] = $userDetails->id;
				$save['verify_link'] = $activation;
				$savedUserId = $this->User_model->saveUser($save);
				
			$config = array();
	        $config['mailtype'] = 'html';
			$this->load->library('email');
			$this->email->initialize($config);
			$this->email->from('support@peoriawebdevelopment.com', 'peoriawebdevelopment');
			$this->email->to($email);
			$this->email->subject('Password');
			$this->email->message('Click below link to change your password.. <a href="'.base_url().'/users/change_password/?email='.$email.'&verify_link='.$activation.'">Click here</a>');
			if($this->email->send()){
			} else {
				show_error($this->email->print_debugger());
			};
			$this->session->set_flashdata('message', 'We sent a link to your email(' . $email .'), you can change your password through the link.');	
		}
		redirect('');
	}
	public function change_password(){
		if($this->input->post('change_pass_form')){
			$password = $this->input->post('password');
			$confirm_password = $this->input->post('confirm_password');
			$email = $this->input->post('email');
			$verify_link = $this->input->post('verify_link');
			if($password !='' && $password == $confirm_password){
				$save['email'] = $email;
				$save['verify_link'] = $verify_link;
				$save['password'] = md5($password);
				$saveId = $this->User_model->changePassword($save);
				if($saveId){
				$this->session->set_flashdata('message', 'Your password has been changed');
				$data['message'] = 'Your password has been changed';
				$data['body'] = 'login';
				} else {
					$this->session->set_flashdata('message', 'Your password Not changed, Please try again');
					redirect('users/login');
				}
			}
		} else {
			if(isset($_GET['email']) && isset($_GET['verify_link'])){
				$data['verify_link'] = $_GET['verify_link'];
				$data['email'] = $_GET['email'];
				$check_verify_link = $this->User_model->check_verify_link($data['email'],$data['verify_link']);
			if(empty($check_verify_link)){
				redirect('users/login');
			}
				$data['body'] = 'change_password';
			} else {
				redirect('users/login');
			}
		}
		$this->load->view('layout_front',$data);
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */