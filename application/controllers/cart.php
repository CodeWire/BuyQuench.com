<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once(APPPATH.'libraries/stripe/lib/Stripe.php');
require_once(APPPATH.'libraries/infusionsoft/isdk.php');  
class Cart extends CI_Controller {

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
		$this->load->model(array('User_model','Price_model','Order_model','Coupon_model','Is_model'));
		$this->load->library('session');
		$this->load->helper('url');
		$this->customer = $this->sale_questions->customer();
	$ci =& get_instance();
		$ci->config->load('stripe', true);
		$config = $ci->config->item('stripe');
  Stripe::setApiKey($config['secret_key']);  
	}
	public function index()
	{
		$data['body']			= 'cart';
		$this->load->view('layout_front',$data);
	}
	public function add_to_cart(){
		$product_id		= $this->input->post('price_id');
		$productDetails = $this->Price_model->getPriceDetailArray($product_id);
		$productDetails['quantity'] = 1;
		$this->sale_questions->insert($productDetails);
		redirect('cart');
	}
	
	public function place_order(){
		$this->load->add_package_path(APPPATH.'packages/payment/paypal_standard/');
			$this->load->library('paypal_standard');
		
			// Is payment bypassed? (total is zero, or processed flag is set)
			if($this->sale_questions->total() > 0) {
				$order_id = $this->sale_questions->save_order();
				$data['id'] = $order_id;
				$sessions = $this->sale_questions->save_order_id($data);
				//run the payment
				$error_status	= $this->paypal_standard->process_payment();
				if($error_status !== false)
				{
					//var_dump($error_status); exit(0);
					// send them back to the payment page with the error
					$this->session->set_flashdata('error', $error_status);
				}
			} else {
				 redirect('cart');
			}
		
		/*$data['order_id']			= $order_id;
		//$data['shipping']			= $this->bse_tec->shipping_method();
		$data['payment']			= $this->sale_questions->payment_method();
		$data['customer']			= $this->sale_questions->customer();
		
//		 remove the cart from the session 
		$this->sale_questions->destroy();
		$data['body']			= 'checkout';
		$this->load->view('layout_front',$data);*/
	}
	
	public function payment(){
		if ($_POST) {
			$purchasedPlan  = $_GET['id'];
    $planDetails = $this->Price_model->getPriceById($purchasedPlan);
	if(!empty($planDetails)){
	if(isset($this->session->userdata ["cart_contents"]['coupon']) && $this->session->userdata ["cart_contents"]['coupon']){
			$coupon_details = $this->session->userdata ["cart_contents"]['coupon'];
			$correctCouponDetails = $this->Coupon_model->getPriceByCouponCode($coupon_details['code']);
			$correctType = $correctCouponDetails['type'];
			$correctAmount = $correctCouponDetails['amount'];
								if($correctType == 'fixed'){
									$finalprice = $planDetails[0]->price - $correctAmount;
								} else {
									$finalprice = $planDetails[0]->price - ($correctAmount/100 *$planDetails[0]->price);
								}
	} else {
		$finalprice = $planDetails[0]->price;
	}
	$error = NULL;
    try {
    $charge = Stripe_Charge::create(array(
      'card'     => $_POST['stripeToken'],
      'amount'   => $finalprice * 100,
      'currency' => 'usd'
    ));
	}
    catch (Exception $e) {
      $error = $e->getMessage();
    }
	if ($error == NULL) {
	if($this->session->userdata ["cart_contents"]['customer']){
		$customer = $this->session->userdata["cart_contents"]['customer'];
		$save['id'] = '';
		$save['user_id'] = $customer['id'];
		$save['email'] = $customer['email'];
		$save['coupon_discount'] = '';
		$save['subtotal'] = '';
		$save['total'] = $planDetails[0]->price;
		$save['ordered_on'] = date('Y-m-d H:i:s');
		$save['status'] = 'Complete';
		$order_id = $this->Order_model->save_order($save);
		$data['order_id'] = $order_id;
		$data['body'] = 'is_info';
		$this->load->view('layout_front',$data);
	} else {
			redirect('users/pricing');
		}
	}
	}
		} else {
			redirect('users/pricing');
		}
	}
	
	public function register_payment(){
		if ($_POST) {
			$purchasedPlan  = $this->input->post('submitted_form_id');
    $planDetails = $this->Price_model->getPriceById($purchasedPlan);
	if(!empty($planDetails)){
		$email  = $this->input->post('email');
		$checkEmailAlready = $this->User_model->checkUserEmailExists($email);
		if(!$checkEmailAlready){
		$first_name  = $this->input->post('first_name');
		$last_name  = $this->input->post('last_name');
		$phone  = $this->input->post('phone');
		$coupon_code  = $this->input->post('coupon_code');
		if($coupon_code != ''){
			$couponDetails = $this->Coupon_model->getPriceByCouponCode($coupon_code);
		}
		
		if($coupon_code == '' || (isset($couponDetails) && !empty($couponDetails))){
			if(isset($couponDetails) && !empty($couponDetails)){
					$correctType = $couponDetails['type'];
					$correctAmount = $couponDetails['amount'];
						if($correctType == 'fixed'){
							$discount = $correctAmount;
						} else {
							$discount = $correctAmount/100 *$planDetails[0]->price;
						}
						$finalprice = $planDetails[0]->price - $discount;
			} else {
				$finalprice = $planDetails[0]->price;
				$discount = 0;
			}
		$save['id'] ='';
		$save['email'] = $email;
		//$password = uniqid(rand(), true);
		$length = 10;
		$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
			$randomString = '';
			for ($i = 0; $i < $length; $i++) {
				$randomString .= $characters[rand(0, strlen($characters) - 1)];
			}
			$password = $randomString;
		$activation = md5($password);
		$save['password'] = $activation;
		//$save['password'] = '123456789'; //local
		$save['first_name'] = $first_name;
		$save['last_name'] = $last_name;
		$save['phone'] = $phone;
		$save['active'] = 1;
		$save['verify_link'] = $activation;
		$save['plan'] = $purchasedPlan;
		$save['discount'] = $discount;
		$save['amount'] = $finalprice;
		
		$savedUserId = $this->User_model->saveUserAndLogin($save);
		$this->load->library('email');
			
			$config['mailtype'] = 'html';
			$this->email->initialize($config);
			$this->email->from('support@peoriawebdevelopment.com', 'peoriawebdevelopment');
			$this->email->to($email);
			$this->email->subject('Sales Question password');
			$this->email->message(' your password is: '.$password.' Click below link to Change your password <a href="'.base_url().'/user/change_password/?email='.$email.'&key='.$activation.'">Click here</a>');
			$this->email->send();
	
	$error = NULL;
	try {
    $charge = Stripe_Charge::create(array(
      'card'     => $_POST['stripeToken'],
      'amount'   => $finalprice * 100,
      'currency' => 'usd'
    ));
	}
    catch (Exception $e) {
      $error = $e->getMessage();
    }
	if ($error == NULL) {
	unset($save);
	if($this->session->userdata ["cart_contents"]['customer']){
		$customer = $this->session->userdata["cart_contents"]['customer'];
		$save['id'] = '';
		$save['user_id'] = $customer['id'];
		$save['email'] = $customer['email'];
		$save['coupon_discount'] = '';
		$save['subtotal'] = '';
		$save['total'] = $planDetails[0]->price;
		$save['ordered_on'] = date('Y-m-d H:i:s');
		$save['status'] = 'Complete';
		$order_id = $this->Order_model->save_order($save);
		$data['order_id'] = $order_id;
		$data['body'] = 'is_info';
		$this->load->view('layout_front',$data);
	} else {
			redirect('users/pricing');
		}
	}
	
	} // Check valid Coupon
		} // Check Email Already Found
		else{
			echo 'You already Registered, Please Login..';
			redirect('users/pricing');
		}
	} // Check Valid Plan
		} else {
			redirect('users/pricing');
		}
	
	}
	
	public function checkout(){
		if($_GET['id']!=''){
			$getOrderForm = $this->Order_model->checkOrderFormActive();
			if(empty($getOrderForm)){
			} else {
				$data['orderform_details'] = $getOrderForm[0];
			}
			$data['body'] = 'order_form';
			$this->load->view('layout_front',$data);
		} else {
			redirect('users/pricing');
		}
	}
	
	public function post_checkout(){
		$app = new iSDK;
		$posted_values = $this->input->post();
		if(!empty($posted_values)){
			//var_dump($posted_values); exit(0);
			$quiz_cat = $this->input->post('quiz_cat');
			$orderform = $this->input->post('orderform');
			//var_dump($orderform); exit(0);
			$itemDetails = $this->Order_model->getProductDetails($quiz_cat);
$getQuiz = $this->Order_model->get_quiz_by_cat($quiz_cat);
$mechantIsDetails = $this->Order_model->getUserIsDetailsById($getQuiz[0]['user_id']);
//var_dump($mechantIsDetails); exit(0);
			if(!isset($mechantIsDetails[0]->is_app_name)){
				echo 'You are not able to order because of Merchant Infusionsoft App details are not found';
				exit(0);
			}
			$getOrderForm = $this->Order_model->getOrderFormById($orderform);
			if(!empty($getOrderForm)){
				$price = $getOrderForm[0]->price;
				$thank_url = $getOrderForm[0]->thank_url;
				$error = NULL;
				try {
				$charge = Stripe_Charge::create(array(
				  'card'     => $_POST['stripeToken'],
				  'amount'   => $price * 100,
				  'currency' => 'usd'
				));
				}
				catch (Exception $e) {
				  $error = $e->getMessage();
				}
if ($error == NULL) {
			$currentOrderAppName = $mechantIsDetails[0]->is_app_name;
			$app_key = $mechantIsDetails[0]->is_app_key;
			//var_dump($currentOrderAppName); var_dump($currentOrderAppKey); exit(0);
			if($currentOrderAppName){
			$app_parse = parse_url($currentOrderAppName);
			$appdomain = explode('.',$app_parse['host']);
				if(!empty($appdomain[0])){
				if ($app->cfgCon($appdomain[0],$app_key)){
					foreach($posted_values as $key=>$posted_val){
						if($key != 'quiz_cat' &&  $key != 'cardType' && $key != 'card_number' && $key != 'card_cvc' && $key != 'card_expiry_month' && $key != 'card_expiry_year' && $key != 'tags' && $key != 'stripeToken' && $key != 'totalPriceAmt' && $key != 'orderform'){
							$fields[$key] = $posted_val;
							if($key=='FirstName'){
								$saveProductOrder['first_name'] = $posted_val;
							} else if($key=='LastName'){
								$saveProductOrder['last_name'] = $posted_val;
							} else if($key=='Company'){
								$saveProductOrder['company'] = $posted_val;
							} else if($key=='StreetAddress1'){
								$saveProductOrder['address1'] = $posted_val;
							} else if($key=='StreetAddress2'){
								$saveProductOrder['address2'] = $posted_val;
							} else if($key=='City'){
								$saveProductOrder['city'] = $posted_val;
							} else if($key=='State'){
								$saveProductOrder['state'] = $posted_val;
							} else if($key=='PostalCode'){
								$saveProductOrder['zip'] = $posted_val;
							} else if($key=='Country'){
								$saveProductOrder['country'] = $posted_val;
							} else if($key=='Phone1'){
								$saveProductOrder['phone'] = $posted_val;
							} else if($key=='Email'){
								$saveProductOrder['email'] = $posted_val;
							}
						}
						if($key == 'tags'){
							$tagsNames = $posted_val;
						}
					}
					
					$saveProductOrder['id'] = '';
					$saveProductOrder['cat_id'] = $quiz_cat;
					$save['user_id'] = $mechantIsDetails[0]->id;
					$saveProductOrder['created_date'] = date('Y-m-d h:i:s');
					$saveProductOrder['amount'] = $price;
					$saveProductOrder['status'] = 'paid';
					//var_dump($saveProductOrder); exit(0);
					$saveProductOrderId = $this->Order_model->save_product_order($saveProductOrder);
					$saveNoti['id'] = '';
					$saveNoti['user_id'] = $mechantIsDetails[0]->id;
					$saveNoti['title'] = 'Order #'.$saveProductOrderId.' Received. Sale for $'.$price;
					$saveNoti['url'] = 'admin/sales/sales_list';
					$saveNoti['date_created'] = date('Y-m-d h:i:s');
					$saveNoti['active'] = 1;
					$saveNoti['group'] = 'order';
					$saveOrderNotiId = $this->Notification_model->save($saveNoti);
					
					$tagsNames = explode(',',$tagsNames);
					//var_dump($tagsNames); exit(0);
					foreach($tagsNames as $tagName){
							//$tagId[] = $tagsName;
							$tagExists = $app->dsQuery("ContactGroup",1,0,array('GroupName' => $tagName),array('Id'));
							$tagGroupIdFin = (int) $tagExists[0]['Id'];
							if(!empty($tagExists))
							{
								$tagIds[] = $tagGroupIdFin;
							}
							else
							{
							// Add the tag to infusionsoft
								$id = $app->dsAdd('ContactGroup',array('GroupName' => $tagName,'GroupCategoryId' => 1));
								$tagIds[] = $id;
							}
					}

					$returnFields = array('Id');
					$data = $app->findByEmail($fields['Email'], $returnFields); 
					$test_id = '';
					foreach ($data as $value)
					{
						$test_id =$value['Id'];
					}
					
					if($test_id) 
					{
						$conID = $app->updateCon($test_id, $fields);
						//echo $test_id;
						foreach($tagIds as $tagid){
								$app->grpAssign($conID, (int)$tagid);
						}
						/*echo $tagGroupIdFin;
						$result = $app->grpAssign($test_id, $tagGroupIdFin);*/
						//var_dump($result);
					}else{
						$conID = $app->addCon($fields);
						foreach($tagIds as $tagid){
								$app->grpAssign($conID, (int)$tagid);
						}
						//echo $conID;
						/*$result = $app->grpAssign($conID, $tagGroupIdFin); 
						var_dump($result);*/
					}
					//var_dump($conID); exit(0);
					$orderFields['JobTitle'] = 'Quiz Order';
					$orderFields['ContactId'] = $conID;
					$orderFields['StartDate'] = date('Y-m-d');
					$orderFields['ProductId'] = $quiz_cat;
					$orderFields['DateCreated'] = date('Y-m-d');
					$orderFields['OrderStatus'] = 2;
					$orderFields['ShipFirstName'] = $fields['FirstName'];
					$orderFields['ShipLastName'] = $fields['LastName'];
					$orderFields['ShipCompany'] = $fields['Company'];
					$orderFields['ShipPhone'] = $fields['Phone1'];
					$orderFields['ShipStreet1'] = $fields['StreetAddress1'];
					//$orderFields['ShipStreet2'] = $fields['StreetAddress2'];
					$orderFields['ShipCity'] = $fields['City'];
					$orderFields['ShipState'] = $fields['State'];
					$orderFields['ShipZip'] = $fields['PostalCode'];
					$orderFields['ShipCountry'] = $fields['Country'];
					
					$orderID = $app->dsAdd("Job", $orderFields);
					
					$orderItem['OrderId'] = $orderID;
					$orderItem['ProductId'] = $quiz_cat;
					$orderItem['ItemName'] = $itemDetails[0]->name;
					$orderItem['Qty'] = 1;
					$orderItem['ItemDescription'] = $itemDetails[0]->desc;
					$orderItem['ItemType'] = 4;
					
					$orderItemID = $app->dsAdd("OrderItem", $orderItem);
					
					
					$orderInvoice['ContactId'] = $conID;
					$orderInvoice['JobId'] = $orderID;
					$orderInvoice['DateCreated'] = date('Y-m-d');
					$orderInvoice['InvoiceTotal'] = $price;
					$orderInvoice['TotalPaid'] = $price;
					$orderInvoice['TotalDue'] = 0;
					$orderInvoice['PayStatus'] = 1;
					$orderInvoice['InvoiceType'] = 'Stripe';
					
					$orderInvoiceID = $app->dsAdd("Invoice", $orderInvoice);
					
					$ISBasicFields = $this->Is_model->ISBasicFields();
					$ISCustomFields = $this->Is_model->ISCustomFields($appdomain[0],$app_key);
					foreach($ISCustomFields as $index=>$ISCustomField){
						$custom_fields[] = '_'.$index;
						$custom_fields_noun[] = $index;
					}
					$returnStoredFields = $ISBasicFields;
					$returnStoredFields = array_merge($ISBasicFields,$custom_fields);
//var_dump($custom_fields); exit(0);
					$StoredContact = $app->dsQuery("Contact",1,0,array('Id' => $conID),$returnStoredFields);
					//var_dump($StoredContact); exit(0);
					$StoredContact = $StoredContact[0];
					foreach($ISBasicFields as $value){
						if(isset($StoredContact[$value])){
							$replaceVlaue = $StoredContact[$value].'&';
						} else {
							$replaceVlaue = '&';
						}
						$thank_url = str_replace('{contact.'.$value.'}',$replaceVlaue,$thank_url);
					}
					foreach($custom_fields_noun as $value){
						if(isset($StoredContact['_'.$value])){
							$replaceVlaue = $StoredContact['_'.$value].'&';
						} else {
							//if($value == '_AppointmentDate'){ echo $StoredContact[$value]; exit(0);}
							$replaceVlaue = '&';
						}
						$thank_url = str_replace('{contact.'.$value.'}',$replaceVlaue,$thank_url);
					}
					redirect($thank_url);
					/*var_dump($orderFields); echo '<br><br>';
					var_dump($orderID);
					echo '<br><br>';echo '<br><br>';
					var_dump($orderItem);echo '<br><br>';
					var_dump($orderItemID);*/

				}
				}
			}
			}
			}
		} else {
			redirect('users/pricing');
		}
	}
	
	public function thankyou(){
			$data['body'] = 'thankyou';
			$this->load->view('layout_front',$data);
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */