<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Quiz extends CI_Controller {

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
		$this->load->model(array('Quiz_model','User_model','Order_model','Web_model', 'Leads_model'));
		$this->load->library('session');
		$this->load->helper('url');
	}
	public function index()
	{
		$segments	= $this->uri->total_segments();
		$base_url	= $this->uri->segment_array();
		$this->session->unset_userdata('lead');
		if($segments){
		$quiz_slug = $base_url[$segments];
		$data['quiz_details'] = $quiz_details	= $this->Quiz_model->getQuizByUrl($quiz_slug);
			if(!empty($quiz_details)){
				foreach($quiz_details as $quiz){
					$quizId= $quiz->id;
					$user_id= $quiz->user_id;
				}
				$data['quiz_id'] = $quizId;
				if(isset($_GET['theme'])){
					$data['theme'] = $_GET['theme'];
				} else {
					$quizTheme = $quiz_details[0]->theme;
					if($quizTheme != ''){
						$data['theme'] = $quizTheme;
					} else {
					$data['theme'] = '';
					}
				}
				$data['webform_details'] = $webform_details	= $this->Web_model->getWebFormById($quiz_details[0]->webform_id);
				$data['quiz_categories']	= $this->Quiz_model->getCategories($quizId);
				//$data['quiz_questions']	= $this->Quiz_model->getQuestions($quizId);
				$data['quiz_form_actions']	= $this->Quiz_model->getFormActions($quizId);
				$data['created_ParentNodes']	= $this->Quiz_model->getParentNodes($quizId,0);
			} else {
				redirect('users/pricing');
			}
		} else {
			redirect('users/pricing');
		}
		$data['body']			= 'quiz';
		$this->load->view('layout_front',$data);
	}
	public function get_nodes_by_cat()
	{
		$cat_id = $_GET['id'];
		$node_cat = $this->Quiz_model->get_nodes_by_cat($cat_id);
		echo json_encode($node_cat);
	}
	public function get_ques_by_nodes_cat(){
		$cat_id = $_GET['cat_id'];
		$node_id = $_GET['node_id'];
		$questions = $this->Quiz_model->get_ques_by_nodes_cat($cat_id, $node_id);
		echo json_encode($questions);
	}
	public function get_ques_by_nodes(){
		//$cat_id = $_GET['cat_id'];
		$node_id = $_GET['node_id'];
		$questions = $this->Quiz_model->get_ques_by_nodes($node_id);
		echo json_encode($questions);
	}
	public function get_answers(){
		$quiz_id = $this->input->post('quiz_id');
		$quizDetails = $this->Quiz_model->getQuizById($quiz_id);
		$quizCategories = $this->Quiz_model->getCategories($quiz_id);
		$totalCategory = count($quizCategories);
		$quesion_ids = $this->input->post('quesion_ids');
		$ques = $this->input->post('ques');
		$total_ques = $this->input->post('total_ques');
		$passed_by = $this->input->post('passed_by');
		
		$FirstName = $this->input->post('FirstName');
		$Email = $this->input->post('Email');
		
		$correctAns = 0;$result_html='';
		if($passed_by == 'Questions answered correctly'){
			foreach($quesion_ids as $quesion_id)
			{
				$getQuestionAnswer = $this->Quiz_model->getQuestions($quesion_id);
				if($getQuestionAnswer){
					foreach($getQuestionAnswer as $getQuestionAns){
						$currentCorrectAns = $getQuestionAns->answer;
					}
					$currentGivenAns = $this->input->post('ques'.$quesion_id);
					if($currentCorrectAns == $currentGivenAns){
						$correctAns++;
					}
				}			
			}
			$result_html = '';
			$persentage = $correctAns/$total_ques*100;
			$sepValue = 100/$totalCategory;
			for($i=1; $i<=$totalCategory;$i++){
				if($persentage <= ($sepValue*$i)){
					$category = $quizCategories[$totalCategory-$i]->id;
					break;
				}
			}
			
			$this->load->helper('url');
			$result_html .= '<div class="col-lg-3 sidebar"><h3 class="title">Quiz completed</h3><ul>';
			foreach($quizCategories as $quizCate){
				if($quizCate->id == $category){
					$highlight = 'highlight';
					$selected_category = $quizCate->name;
					$youHere = '<span class="you_are_here"></span>';
				} else {
					$highlight = '';$youHere = '';
				}
				$result_html .= '<li class="'.$highlight.'">'.$quizCate->name.$youHere.'</li>';
			}
			$siteName = 'http://peoriawebdevelopment.com';
			//$shared_text = 'My love language is '.$selected_category.'. What\'s yours?&amp;url='.$siteName;
			$shared_text = $quizDetails[0]->shared_text;
			$shared_text = str_replace('+selected_category+',$selected_category,$shared_text);
			$result_html .= '</ul><div class="social_sharing"><a class="facebook" href="https://www.facebook.com/sharer/sharer.php?u='.$siteName.'" target="_blank">Share on Facebook</a>
			
			<div class="twitter-share-profile share-profile-module"><a target="_blank" title="Share your profile with someone via email and invite them to discover their language!" href="http://twitter.com/share?text='.$shared_text.'" class="twiiter submit-twitter">Tweet your Profile</a></div>
			
<a class="email" href="javascript:void(0);" onClick="mainContent()">Share via Email</a>
<div id="email_content" class="email_content" style="display:none;"><form id="share_email" action="'.base_url('quiz/mail').'">
<div class="form-group"><input type="text" required name="name" placeholder="Name" class="form-control"></div>
<div class="form-group"><input type="email" required name="email" placeholder="Email" class="form-control"></div>
<div class="form-group"><input type="text" name="subject" placeholder="Subject" class="form-control"></div>
<div class="form-group"><input type="button" value="Send" name="send" onClick="shareEmail()"  class="btn btn-primary"/></div>
<input type="hidden" name="share_content" value="'.$shared_text.'" />
<div id="return_message"></div></form></div>
<a class="print" onclick="window.print(); return false;" href="#" class="">Print</a>
</div></div>';
			$result_html .= '<div class="col-lg-9">'.$quizDetails[0]->res_top;
			foreach($quizCategories as $quizCate){
				$quizCateId = $quizCate->id;
				if($quizCateId == $category){
					$result_html .= '<div class="clear listing_cat clearfix"><div class="col-lg-4"><img src="'.base_url('uploads').'/'.$quizCate->image.'" alt="'.$quizCate->name.'"/></div><div class="col-lg-8"><h4>'.$quizCate->name.'</h4><p>'.$quizCate->desc.'</p>';
					/*<a class="btn btn_primary make_order_btn" href="'.base_url('cart/checkout').'?id='.$quizCate->id.'">Order Now!</a>*/
					if($quizCate->offer_btn != '' && $quizCate->offer_url != ''){
						if($this->session->userdata ["cart_contents"]['lead']){
			$leadFormDetails = $this->session->userdata ["cart_contents"]['lead']; 
			$leadPra = '';
			foreach($leadFormDetails as $key=>$leadFormDetail){
				$leadPra .= '&'.$key.'='.$leadFormDetail;
			}
						} else {
							$leadPra = '';
						}
					$result_html .= '<a class="btn btn_primary offer_btn" href="'.$quizCate->offer_url.'&win_id='.$quizCate->id.$leadPra.'">'.$quizCate->offer_btn.'</a>';
					}
					$result_html .= '</div></div>';
				}
			}
			$result_html .= '<div class="clear"><span class="top_border_line"></span><span class="bot_border_line"></span></div><div class="not_selected">';
			foreach($quizCategories as $quizCate){
				$quizCateId = $quizCate->id;
				if($quizCateId != $category){
					$result_html .= '<div class="clear listing_cat clearfix"><div class="col-lg-4"><img src="'.base_url('uploads').'/'.$quizCate->image.'" alt="'.$quizCate->name.'"/></div><div class="col-lg-8"><h4>'.$quizCate->name.'</h4><p>'.$quizCate->desc.'</p>';
					if($quizCate->offer_btn != '')
					$result_html .= '</div></div><div class="clear"><span class="top_border_line"></span><span class="bot_border_line"></span></div>';
				}
			}
			$result_html .= '</div>';
		} else if($passed_by == 'Catagory chosen'){
			
		}
		
		$result_html .= '<div class="clear">'.$quizDetails[0]->res_bot.'</div>';
					
					echo $result_html;
					
		$clientName = $this->input->post('name');
		$clientEmail = $this->input->post('email');
		$saveClient['id'] ='';
		$saveClient['name'] = $clientName;
		$saveClient['email'] = $clientEmail;
		$saveClient['quiz_id'] = $quiz_id;
		$this->Quiz_model->saveClients($saveClient);
	}
	
	public function share_mail(){
		$name = $this->input->post('name');
		$email = $this->input->post('email');
		$share_content = $this->input->post('share_content');
		$subject = $this->input->post('subject');
		
		$result = mail($email, $subject, $share_content);
		if($result){
			echo 'Mail sent';
		} else {
			echo 'Mail not sent, Please try again..';
		}
		
	}
	
	public function webform(){
		if(isset($_GET['id'])){
		$id=$_GET['id'];
		} else {
			$id='';
		}
		$data['webform_details'] = $webform_details = $this->Web_model->getWebFormById($id);
		if(empty($webform_details)){
			echo 'There is no web form';
		} else  {
		$data['body']			= 'webform';
		$this->load->view('layout_front',$data);
		}
	}
	public function orderform(){
		if(isset($_GET['id'])){
		$id=$_GET['id'];
		} else {
			$id='';
		}
		$data['orderform_details'] = $orderform_details = $this->Order_model->getOrderFormById($id);
		if(empty($orderform_details)){
			echo 'There is no order form';
		} else  {
		$data['body']			= 'orderform';
		$this->load->view('layout_front',$data);
		}
	}
	public function lead_submit(){
		 $posted = $this->input->post();
		 if($this->input->post('lead_id') != ''){
				 $saveLead['id'] = '';
				 $saveLead['web_form_id'] = $this->input->post('lead_id');
				 $leadFormId = $this->Leads_model->save($saveLead);
$webFormDetails = $this->Web_model->getWebFormById($saveLead['web_form_id']);
					
				 $saveLeadDetails['id'] = '';
				 $saveLeadDetails['lead_id'] = $leadFormId;
			 foreach($posted as $key => $post){
				 if($key != 'lead_id'){
				 $saveLeadDetails['field'] = $key;
				 $saveLeadDetails['value'] = $post;
				 if($key == 'Email'){
					 $leadFrom = $post;
				 }
				 $leadFormDetailsId = $this->Leads_model->saveLeadFields($saveLeadDetails);
				 }
					$saveNoti['id'] = '';
					$saveNoti['user_id'] = $webFormDetails[0]->user_id;
					$saveNoti['title'] = 'Lead #'.$leadFormId.' Received from '.$leadFrom;
					$saveNoti['url'] = 'admin/leads/leads_list';
					$saveNoti['date_created'] = date('Y-m-d h:i:s');
					$saveNoti['active'] = 1;
					$saveNoti['group'] = 'lead';
					$saveNotiId = $this->Notification_model->save($saveNoti);
			 }
		 }
		 $sessions = $this->sale_questions->save_lead($posted);
		 /*$session = $this->session->all_userdata();
		var_dump($session);*/
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */