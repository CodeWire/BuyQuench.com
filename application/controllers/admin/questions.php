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
		$this->load->model(array('Quiz_model','Order_model'));
		$this->load->model(array('User_model'));
		$this->load->helper('url');
		$redirect	= $this->User_model->is_logged_in();
		if(!$redirect){
			redirect('users/login');
		}
		if($this->session->userdata ["cart_contents"]['customer']){
		$customer = $this->session->userdata ["cart_contents"]['customer']; 
		$userDetails = $this->User_model->getUserDatails($customer['id']);
			if($userDetails[0]->is_admin != 1){
				$this->data['customerId'] = $customer['id'];
			} else {
				$this->data['customerId'] = 1;
			}
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
		$data['body']			= 'admin/catagories';
		/*$session = $this->session->all_userdata();
		var_dump($session);*/
		$this->load->view('layout',$data);
	}
	
	public function quiz_details()
	{
		$this->load->model('Quiz_model');
		$quiz_uname = $this->input->post('quiz_uname');
		$quiz_desc = $this->input->post('quiz_desc');
		$res_top = $this->input->post('res_top');
		$res_bot = $this->input->post('res_bot');
		$quiz_id = $this->input->post('quiz_id');
		$shared_text = $this->input->post('shared_text');
		if($quiz_id != ''){
		$save['id'] = $quiz_id;
		} else {
		$save['id'] = '';
		}
		$save['name'] = $quiz_uname;
		$save['desc'] = $quiz_desc;
		$save['res_top'] = $res_top;
		$save['res_bot'] = $res_bot;
		$save['shared_text'] = $shared_text;
		$customer = $this->session->userdata ["cart_contents"]['customer'];
		$save['user_id'] = $customer['id'];
		$saveId = $this->Quiz_model->save($save);
		echo $saveId;
	}
	
	public function node_details()
	{
		//var_dump($this->input->post()); exit(0);
		$this->load->model('Quiz_model');
		$saveTag['quiz_id'] = $quiz_id = $this->input->post('quiz_id');
		$saveTag['name'] = $this->input->post('note_title1');
		if($this->input->post('cur_node_id')){
		$cur_node_id = $this->input->post('cur_node_id');
		} else {
			$cur_node_id = '';
		}		
		$saveTag['id'] = $cur_node_id;
		$savedNodeId = $this->Quiz_model->saveNode($saveTag);
		
		$result['tag_id'] = $savedNodeId;
		$num_node = $this->input->post('num_node');
		for($i=1; $i<=$num_node; $i++){
			if($this->input->post('note_name'.$i) != ''){
				$note_name = $this->input->post('note_name'.$i);
				//$cur_posted_node = array_filter($cur_posted_node);
				//var_dump($cur_posted_node);
		if($note_name != ''){
		if($this->input->post('node_hid_id'.$i)){
		$node_hid_id = $this->input->post('node_hid_id'.$i);
		} else {
			$node_hid_id = '';
		}
		$saveParent['id'] = $node_hid_id;
		$saveParent['name'] = $note_name;
		$saveParent['parent_id'] = 0;
		$saveParent['tag_id'] = $savedNodeId;
		$saveParentId = $this->Quiz_model->saveTagNames($saveParent);
		
		$result['parent_id'][] = $saveParentId;
			if($this->input->post('tot_subnode'.$i) != ''){
				$totalSubNode = $this->input->post('tot_subnode'.$i);
				$subnodeTitle = $this->input->post('subnode_title'.$i);
				if($subnodeTitle != ''){
				if($this->input->post('cur_subnode_id'.$i)){
				$cur_subnode_id = $this->input->post('cur_subnode_id'.$i);
				} else {
					$cur_subnode_id = '';
				}
				$saveChildTag['id'] = $cur_subnode_id;
				$saveChildTag['name'] = $subnodeTitle;
				$saveChildTag['quiz_id'] = $quiz_id;
				$savedChildNodeId = $this->Quiz_model->saveNode($saveChildTag);
				
				$result['child_tag_id'][] = $savedChildNodeId;
				
				for($subnode=1; $subnode<=$totalSubNode; $subnode++){
				
							if($this->input->post('cur_subnode_hid_id'.$i.'_'.$subnode)){
								$cur_subnode_hid_id = $this->input->post('cur_subnode_hid_id'.$i.'_'.$subnode);
							} else{
								$cur_subnode_hid_id = '';
							}
							$subnodeName = $this->input->post('subnote_name'.$i.'_'.$subnode);
					if($subnodeName == '' && $cur_subnode_hid_id != ''){
						$saveChildName['id'] = $cur_subnode_hid_id;
						$this->Quiz_model->deleteChildNode($cur_subnode_hid_id);
					} else {
							$saveChildName['id'] = $cur_subnode_hid_id;
							$saveChildName['name'] = $subnodeName;
							$saveChildName['parent_id'] = $saveParentId;
							$saveChildName['tag_id'] = $savedChildNodeId;
							$saveChildParentId = $this->Quiz_model->saveTagNames($saveChildName);
							$result['child_id'][$saveParentId][] = $saveChildParentId;
					}	
				} //Sub node End
				} // Sub node Title not empty
			} // Tot Sub node Not empty
			else{ 
				$this->Quiz_model->deleteAllChildNodeByParent($saveParentId);
			}
				} // Node Name not empty
			}
		}
		
		/*for($i=1; $i<=$num_node; $i++){
			if($this->input->post('subnote_name'.$i) != ''){
				
			}
		}*/
		for($i=$num_node+1; $i<=12; $i++){
			$delete_node_id = $this->input->post('node_hid_id'.$i);
				$this->Quiz_model->deleteNode($delete_node_id);
		}
		echo json_encode($result);
	}
	
	public function category_save()
	{
		$this->load->model('Quiz_model');
		$save['quiz_id'] = $this->input->post('quiz_id');
		$num_cate = $this->input->post('num_cate');
		for($i=1; $i<=$num_cate; $i++){
			if($this->input->post('cat_name'.$i) != ''){
				if($this->input->post('cat_id'.$i) != ''){
				$save['id'] = $this->input->post('cat_id'.$i);
				} else {
					$save['id'] = '';
				}
			$save['name'] = $this->input->post('cat_name'.$i);
			$save['desc'] = $this->input->post('cat_desc'.$i);
			$save['offer_url'] = $this->input->post('offer_url'.$i);
			$save['offer_btn'] = $this->input->post('offer_btn_txt'.$i);
			$save['win_tag'] = $this->input->post('win_tag'.$i);
			$save['image'] = $this->input->post('uploaded_img'.$i);
			$savedCatId[] = $this->Quiz_model->saveCategory($save);
			}
		}
		for($i=$num_cate+1; $i<=5; $i++){
			$deleteCategoryId = $this->input->post('cat_id'.$i);
				$this->Quiz_model->deleteCategory($deleteCategoryId);
		}
		echo json_encode($savedCatId);
	}
	
	public function questions_paper()
	{
		$this->load->model('Quiz_model');
		//var_dump($this->input->post());
		$questions = $this->input->post('questions');
		$creaded_category = $this->input->post('creaded_category');
		$ques_nodes = $this->input->post('ques_nodes_child');
		if($ques_nodes == ''){
			$ques_nodes = $this->input->post('ques_nodes_parent');
		}
		$option = $this->input->post('option');
		$options ='';
		foreach($option as $opt){
			$options .= $opt.',';
		}
		$options = substr($options,0,-1);
		$answer = $this->input->post('answer');
		if($this->input->post('ques_id') != ''){
		$ques_id = $this->input->post('ques_id');
		} else {
			$ques_id = '';
		}
		
		$save['id'] = $ques_id;
		$save['questions'] = $questions;
		$save['cat_id'] = $creaded_category;
		$save['node_id'] = $ques_nodes;
		$save['options'] = $options;
		$save['answer'] = $answer;
		$this->Quiz_model->saveQuestions($save);
		$this->db->select('*');
		$this->db->from('questions');
		$query = $this->db->get();  
		//var_dump($query->result()); exit(0);
		echo json_encode($query->result());
	}
	
	public function get_categories(){
		$this->load->model('Quiz_model');
		$quiz_id = $_GET['quiz_id'];
		echo json_encode($this->Quiz_model->getCategories($quiz_id));
	}
	public function get_nodes(){
		$this->load->model('Quiz_model');
		$quiz_id = $_GET['quiz_id'];
		$node_html = '';
		$created_ParentNodes = $this->Quiz_model->getParentNodes($quiz_id,0);
		if(!empty($created_ParentNodes)){
			foreach($created_ParentNodes as $curParentNode){
				$tagLookId = $curParentNode->id;
				$tagLookName = $curParentNode->name;
				$tagParent = $curParentNode->parent_id;
				$tagId = $curParentNode->tag_id;
				$subnodeDetails = $this->Quiz_model->getSubNodes($quiz_id, $tagLookId);
				$node_html .= '<div class="prarent_con">';
				$node_html .= '<input type="radio" class="" name="ques_nodes_parent" value="'.$tagLookId.'" />'.$tagLookName;
				if(!empty($subnodeDetails)){
					foreach($subnodeDetails as $subnodeDetail){
						$node_html .= '<div class="child"><input type="radio" class="child_radio" onClick="selectNodeRadio(this)" name="ques_nodes_child" value="'.$subnodeDetail->id.'" />'.$subnodeDetail->name.'</div>';
					}
				}
				$node_html .= '</div>';
			}
										}
		echo $node_html;
	}
	public function form_actions(){
		$ques_per_page = $this->input->post('ques_per_page');
		$passed_by = $this->input->post('passed_by');
		$quiz_id = $this->input->post('quiz_id');
		$animation = $this->input->post('animation');
		$form_action_id = $this->input->post('form_action_id');
		if($form_action_id != ''){
			$save['id'] = $form_action_id;
		} else {
			$save['id'] = '';
		}
		$save['num_per_page'] = $ques_per_page;
		$save['passed_by'] = $passed_by;
		$save['animation'] = $animation;
		$save['quiz_id'] = $quiz_id;
		$this->Quiz_model->saveFormActions($save);
		
		$saveQuizUrl['id'] = $quiz_id;
		$quiz_details = $this->Quiz_model->getQuizById($quiz_id);
		if($quiz_details[0]->url==''){
			$randomurl = md5(uniqid(rand(), true));
		$saveQuizUrl['url'] = $quiz_id.$randomurl;
		$saveQuizUrlId = $this->Quiz_model->save($saveQuizUrl);
		echo json_encode($saveQuizUrl);
		} else {
			echo 'url_saved';
		}
	}
	
	public function save_form(){
		$webformpos = $this->input->post('webformpos');
		$quiz_id = $this->input->post('quiz_id');
		$webformid = $this->input->post('webformid');
		$saveQuizForm['id'] = $quiz_id;
		$saveQuizForm['webform_id'] = $webformid;
		$saveQuizForm['webform_pos'] = $webformpos;
		$saveQuizFromId = $this->Quiz_model->save($saveQuizForm);
			echo 'form saved';
	}
	
	public function quiz_url(){
		$quiz_url = $this->input->post('quiz_url');
		$quiz_id = $this->input->post('quiz_id');
		$quiz_details = $this->Quiz_model->getQuizById();
		$checkUrl=false;
		foreach($quiz_details as $quiz){
			if($quiz->url == $quiz_url ){
				$checkUrl = true;
				$checkId = $quiz->id;
			}
		}
		if($checkUrl){
			if($checkId == $quiz_id){
				echo 'Saved';
			} else {
			echo 'In this name, Quiz already exists';
			}
		} else{
		$saveQuizUrl['id'] = $quiz_id;
		$saveQuizUrl['url'] = $quiz_url;
		$saveQuizUrlId = $this->Quiz_model->save($saveQuizUrl);
			echo 'Quiz saved';
		}
	}
	
	public function quiz_list()
	{
		//$cat_id = $_GET['id'];
		$data['body']			= 'admin/quiz_list';
		$this->load->view('layout',$data);
	}
	public function get_quiz()
	{
		$customerId = $this->data['customerId'];
		$sSearch = '';
		$iDisplayStart = '';
		$iDisplayLength = '';
		$iSortCol_0 = '';
		$sSortDir_0 = '';
		if(isset( $_GET['sSearch'] )){
		$sSearch = $_GET['sSearch'];
		}
		if(isset( $_GET['iDisplayStart'] ) && $_GET['iDisplayLength'] != '-1'){
		$iDisplayStart = $_GET['iDisplayStart'];
		$iDisplayLength = $_GET['iDisplayLength'];
		}
		if(isset( $_GET['iSortCol_0'] )){
		$iSortCol_0 = $_GET['iSortCol_0'];
		}
		if(isset( $_GET['sSortDir_0'] )){
		$sSortDir_0 = $_GET['sSortDir_0'];
		}
		$quizes = $this->Quiz_model->getQuiz($sSearch,$iDisplayStart,$iDisplayLength,$iSortCol_0,$sSortDir_0,$customerId);
		foreach($quizes as $key=>$quiz){
			$currentUrl = $quiz['url'];
			$quizes[$key]['url'] = '<a href="'.base_url().'quiz/index/'.$currentUrl.'" target="_blank">'.base_url().'quiz/index/'.$currentUrl.'</a>';
			$quizes[$key]['edit'] = '<a class="icons" href="'.base_url().'admin/questions/edit/'.$quiz['id'].'"><i class="fa fa-edit"></i>Edit</a>';
			$quizes[$key]['delete'] = '<a class="icons" href="'.base_url().'admin/questions/delete/'.$quiz['id'].'"><i class="fa fa-times"></i>Delete</a>';
		}
		//$totalRecords = count($this->Quiz_model->getQuizById());
		$totalRegards=$this->Quiz_model->selectcount($customerId);
		$filterRegards = count($quizes);
		$quiz_result = array(
		"sEcho" => intval($_GET['sEcho']),
		"iTotalRecords" => $filterRegards,
		"iTotalDisplayRecords" => (int)$totalRegards[0]->total,
		"aaData" => array()
		
		);
		$quiz_result['aaData'] = $quizes;
		echo json_encode($quiz_result);
	}
	public function edit()
	{
		$segments	= $this->uri->total_segments();
		$base_url	= $this->uri->segment_array();
		if($segments){
		$quizId = $base_url[$segments];
		$data['quiz_details'] = $quiz_details	= $this->Quiz_model->getQuizById($quizId);
			if(empty($quiz_details)){
				throw new Exception();
			} else {
			$data['quiz_form_actions']	= $this->Quiz_model->getFormActions($quizId);
			//$data['created_questions'] = $this->Quiz_model->getQuestions();
			$data['created_categories'] = $this->Quiz_model->getCategories($quizId);
			$data['created_nodes'] = $this->Quiz_model->getNodes($quizId);
			$data['created_ParentNodes'] = $this->Quiz_model->getParentNodes($quizId,0);
			$data['orderforms'] = $this->Order_model->getOrderFormById();
			$data['body']			= 'admin/catagories';
			$this->load->view('layout',$data);
			}
		} else {
			redirect('admin/questions/quiz_list');
		}
		
	}
	public function delete()
	{
		$segments	= $this->uri->total_segments();
		$base_url	= $this->uri->segment_array();
		if($segments){
		$quizId = $base_url[$segments];
		$result = $this->Quiz_model->deleteQuiz($quizId);
		}
		if ($result == TRUE) {
		   redirect('admin/questions/quiz_list');
		}
	}
	public function edit_question(){
		$cat_no = $this->input->post('cat_no');
		$questionDetails = $this->Quiz_model->getQuestions($cat_no);
		echo json_encode($questionDetails);
	}
	public function quiz_theme(){
		$save['theme'] = $this->input->post('theme_name');
		if($this->input->post('quiz_id') != ''){
		$save['id'] = $this->input->post('quiz_id');
		} else {
		$save['id'] = ''; }
		$this->Quiz_model->save($save);
		
		echo 'Applied Theme:<br><img src="'.base_url().'/application/views/themes/'.$save['theme'].'/'.'screen_shot.jpg'.'" alt="" /><h3>'.$save['theme'].'</h3>';
		//echo 'Theme Saved successfully';
	}
	public function sort_default(){
		$quizId = $this->input->post('quiz_id');
		$quiz_details	= $this->Quiz_model->getQuizById($quizId);
		$webform_pos = $quiz_details[0]->webform_pos;
		$webform_id = $quiz_details[0]->webform_id;
		$created_categories = $this->Quiz_model->getCategories($quizId);
		$created_ParentNodes = $this->Quiz_model->getParentNodes($quizId,0);
		$html = '';
		if(isset($created_ParentNodes) && $created_ParentNodes != ''){
			$nodeCount =0;
			foreach($created_ParentNodes as $curParentNode){
				$nodeCount++;
				$tagLookId = $curParentNode->id;
				$tagLookName = $curParentNode->name;
				$tagParent = $curParentNode->parent_id;
				$tagId = $curParentNode->tag_id;
				if($webform_pos == 'node'.$nodeCount){
					$getWebForm = $this->Quiz_model->getWebforms($webform_id);
					echo '<li class="sortable-item clearfix lead_capture_form">
					<div class="formsContent pull-left">
						<img src="'.base_url().'assets/img/drag-to-place.png" alt="Drag to Place">
					</div>
					<div class="formsContent pull-left">
					<h3>'.$getWebForm[0]->name.'</h3>
					<p>'.$getWebForm[0]->desc.'</p>
					<input type="hidden" class="clientform" name="clientform[]" value="'.$getWebForm[0]->id.'" />
					</div>
					<span class="lead_title">Lead Capture Form</span>
					</li>';
				}
				$html .= '<li after_web_form="node'.$nodeCount.'" class="sortable-item"><span>Design Node '.$nodeCount.'</span><input type="hidden" name="tagspos[]" value="'.$tagLookId.'" /></li>';
			}
		}
		
		if(isset($created_categories) && $created_categories != ''){
			foreach($created_categories as $cate){
				$categoyquiz = $this->Quiz_model->getQuestionByCatId($cate->id);
				$allQuestions[] = $categoyquiz;
			}
			if(isset($allQuestions) && !empty($allQuestions) && $allQuestions !=''){
				$quesCount = 0;
				foreach($allQuestions as $allquestion){
					if(!empty($allquestion)){
					foreach($allquestion as $question){
						if(!empty($question)){
						$quesCount++;
						if($webform_pos == 'question'.$quesCount){
							$getWebForm = $this->Quiz_model->getWebforms($webform_id);
							echo '<li class="sortable-item clearfix lead_capture_form">
							<div class="formsContent pull-left">
								<img src="'.base_url().'assets/img/drag-to-place.png" alt="Drag to Place">
							</div>
							<div class="formsContent pull-left">
							<h3>'.$getWebForm[0]->name.'</h3>
							<p>'.$getWebForm[0]->desc.'</p>
							<input type="hidden" class="clientform" name="clientform[]" value="'.$getWebForm[0]->id.'" />
							</div>
							<span class="lead_title">Lead Capture Form</span>
							</li>';
						}
						$html .= '<li after_web_form="question'.$quesCount.'" class="sortable-item"><span>Question '.$quesCount.'</span><input type="hidden" name="quespos[]" value="'.$question->id.'" /></li>';
						}}}
				}
			}
		}
		if(isset($webform_pos) && $webform_pos == 'formresults'){
			$getWebForm = $this->Quiz_model->getWebforms($webform_id);
			echo '<li class="sortable-item clearfix lead_capture_form">
			<div class="formsContent pull-left">
				<img src="'.base_url().'assets/img/drag-to-place.png" alt="Drag to Place">
			</div>
			<div class="formsContent pull-left">
			<h3>'.$getWebForm[0]->name.'</h3>
			<p>'.$getWebForm[0]->desc.'</p>
			<input type="hidden" class="clientform" name="clientform[]" value="'.$getWebForm[0]->id.'" />
			</div>
			<span class="lead_title">Lead Capture Form</span>
			</li>';
		}
		$html .= '<li after_web_form="formresults" class="sortable-item"><span>Final Results</span><input type="hidden" name="finalresults[]" value="'.$question->id.'" /></li>';
		if(isset($webform_pos) && $webform_pos == 'salesform'){
			$getWebForm = $this->Quiz_model->getWebforms($webform_id);
			echo '<li class="sortable-item clearfix lead_capture_form">
			<div class="formsContent pull-left">
				<img src="'.base_url().'assets/img/drag-to-place.png" alt="Drag to Place">
			</div>
			<div class="formsContent pull-left">
			<h3>'.$getWebForm[0]->name.'</h3>
			<p>'.$getWebForm[0]->desc.'</p>
			<input type="hidden" class="clientform" name="clientform[]" value="'.$getWebForm[0]->id.'" />
			</div>
			<span class="lead_title">Lead Capture Form</span>
			</li>';
		}
		$html .= '<li after_web_form="salesform" class="sortable-item"><span>Sales Form</span><input type="hidden" name="salesform[]" value="'.$question->id.'" /></li>';
		if(isset($webform_pos) && $webform_pos == 'final'){
			$getWebForm = $this->Quiz_model->getWebforms($webform_id);
			echo '<li class="sortable-item clearfix lead_capture_form">
			<div class="formsContent pull-left">
				<img src="'.base_url().'assets/img/drag-to-place.png" alt="Drag to Place">
			</div>
			<div class="formsContent pull-left">
			<h3>'.$getWebForm[0]->name.'</h3>
			<p>'.$getWebForm[0]->desc.'</p>
			<input type="hidden" class="clientform" name="clientform[]" value="'.$getWebForm[0]->id.'" />
			</div>
			<span class="lead_title">Lead Capture Form</span>
			</li>';
		}
		$html .= '<li after_web_form="final" class="sortable-item final_li_webform" style="display:none;"></li>';
		echo $html;
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */