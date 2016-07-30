<?php
Class Quiz_model extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
	
	function save($save)
	{
		if ($save['id'])
		{
			$this->db->where('id', $save['id']);
			$this->db->update('quiz', $save);
			$id	= $save['id'];
		}
		else
		{
			$this->db->insert('quiz', $save);
			$id	= $this->db->insert_id();
		}
		return $id;
	}
	function deleteQuiz($id=''){
		if($id!=''){
			$quizCategories = $this->getCategories($id);
			foreach($quizCategories as $quizCategory){
				$catId = $quizCategory->id;
				$this->db->where('cat_id',$catId); 
				$this->db->delete('questions');
			}
			
			$this->db->where('quiz_id',$id); 
			$this->db->delete('tags');
			
			$this->db->where('quiz_id',$id); 
			$this->db->delete('categories');
			
			$this->db->where('quiz_id',$id); 
			$this->db->delete('clients');
			
			$this->db->where('quiz_id',$id); 
			$this->db->delete('clients');
			
			$this->db->where('id',$id); 
			$this->db->delete('quiz');
			
			return true;
		
		}
	}
	function saveCategory($save)
	{
	$this->load->database();
		if ($save['id'])
		{
			$this->db->where('id', $save['id']);
			$this->db->update('categories', $save);

			$id	= $save['id'];
		}
		else
		{
			$this->db->insert('categories', $save);
			$id	= $this->db->insert_id();
		}
		return $id;
	}
	function deleteCategory($id){
		$this->db->where('id',$id); 
		$this->db->delete('categories');
	}
	function saveQuestions($save)
	{
	$this->load->database();
		if ($save['id'])
		{
			$this->db->where('id', $save['id']);
			$this->db->update('questions', $save);

			$id	= $save['id'];
		}
		else
		{
			$this->db->insert('questions', $save);
			$id	= $this->db->insert_id();
		}
		return $id;
	}
	
	function saveNode($save)
	{
	$this->load->database();
		if ($save['id'])
		{
			$this->db->where('id', $save['id']);
			$this->db->update('tags', $save);

			$id	= $save['id'];
		}
		else
		{
			$this->db->insert('tags', $save);
			$id	= $this->db->insert_id();
		}
		return $id;
	}
	
	function saveTagNames($save)
	{
	$this->load->database();
		if ($save['id'])
		{
			$this->db->where('id', $save['id']);
			$this->db->update('tags_lookup', $save);

			$id	= $save['id'];
		}
		else
		{
			$this->db->insert('tags_lookup', $save);
			$id	= $this->db->insert_id();
		}
		return $id;
	}
	
	function deleteNode($id){
		$this->db->where('id',$id); 
		$this->db->delete('tags');
	}
	
	function deleteChildNode($id){
		$this->db->where('id',$id); 
		$this->db->delete('tags_lookup');
	}
	
	function deleteAllChildNodeByParent($id){
		$this->db->where('parent_id',$id); 
		$this->db->delete('tags_lookup');
	}
	
	function getQuestions($id = NULL){
		$this->db->select('*');
		$this->db->from('questions');
		if($id){
		$this->db->where('id',$id); 
		}
		$query = $this->db->get(); 
		return $query->result();
	}
	
	function getCategories($quiz_id = NULL){
		$this->load->database();
		$this->db->select('*');
		$this->db->from('categories');
		if($quiz_id){
		$this->db->where('quiz_id',$quiz_id); 
		}
		$query = $this->db->get(); 
		return $query->result();
	}
	
	function getNodes($quiz_id = NULL){
		$this->db->select('*');
		$this->db->from('tags');
		if($quiz_id){
			$this->db->where('quiz_id',$quiz_id); 
		}
		$query = $this->db->get();  
		return $query->result();
	}
	
	function getParentNodes($quiz_id = NULL, $parent_id = NULL){
		$this->db->select('a.*, b.name AS tag_title, b.quiz_id'); 
		$this->db->from('tags_lookup a');
		$this->db->join('tags b', 'a.tag_id = b.id', 'left'); 
		$this->db->where('b.quiz_id',$quiz_id);
		$this->db->where('a.parent_id',$parent_id); 
		
		$query = $this->db->get();  
		return $query->result();
	}
	
	function getSubNodes($quiz_id = NULL, $tagId = NULL){
		$this->db->select('a.*, b.name AS tag_title, b.quiz_id'); 
		$this->db->from('tags_lookup a');
		$this->db->join('tags b', 'a.tag_id = b.id','left'); 
		$this->db->where('b.quiz_id',$quiz_id);
		$this->db->where('a.parent_id',$tagId); 
		
		$query = $this->db->get();  
		return $query->result();
	}
	
	function getQuestionByCatId($catId){
		$this->load->database();
		$this->db->select('*');
		$this->db->from('questions');
		$this->db->where('cat_id',$catId);
		$query = $this->db->get();  
		return $query->result();
	}
	
	function saveFormActions($save){
		if ($save['id'])
		{
			$this->db->where('id', $save['id']);
			$this->db->update('form_actions', $save);

			$id	= $save['id'];
		}
		else
		{
			$this->db->insert('form_actions', $save);
			$id	= $this->db->insert_id();
		}
	}
	
	function saveClients($save){
		if ($save['id'])
		{
			$this->db->where('id', $save['id']);
			$this->db->update('clients', $save);

			$id	= $save['id'];
		}
		else
		{
			$this->db->insert('clients', $save);
			$id	= $this->db->insert_id();
		}
	}
	
	function getFormActions($quiz_id = NULL){
		$this->db->select('*');
		$this->db->from('form_actions');
		if($quiz_id){
		$this->db->where('quiz_id',$quiz_id); 
		}
		$query = $this->db->get(); 
		return $query->result();
	}
	
	function getQuizByUrl($url){
		$this->db->select('*');
		$this->db->from('quiz');
		$this->db->where('url',$url);
		$query = $this->db->get();  
		return $query->result();
	}
	function getQuizById($id = NULL){
		$this->db->select('*');
		$this->db->from('quiz');
		if($id){
		$this->db->where('id',$id);
		}
		$query = $this->db->get();  
		return $query->result();
	}
	function getQuizByAPIKey($userId = NULL){
		if($userId){
		$this->db->select('id,name,desc,url'); 
		$this->db->from('quiz');
		$this->db->where('user_id',$userId);
		$query = $this->db->get();  
		return $query->result();
		}
	}
	function getUserId($email = NULL, $apiKey = NULL){
		if($email && $apiKey){
			$this->db->select('*');
			$this->db->from('users');
			$this->db->where('email',$email);
			$this->db->where('api_key',$apiKey);
			$query = $this->db->get();  
			return $query->result();
		}
	}
	function get_nodes_by_cat($id){
		 $this->db->select('a.*,b.*'); 
		$this->db->from('categories a');
		$this->db->join('tags b', 'b.quiz_id = a.quiz_id', 'left'); 
		$this->db->where('a.id',$id);
		$query = $this->db->get();
		$res_array = $query->result_array();
		//var_dump($res); exit(0);
		return $res_array;
	}
	function get_ques_by_nodes_cat($cat_id, $node_id){
		$this->db->select('*'); 
		$this->db->from('questions');
		$this->db->where('cat_id',$cat_id);
		$this->db->where('node_id',$node_id);
		$query = $this->db->get();
		$res_array = $query->result_array();
		//var_dump($res); exit(0);
		return $res_array;
	}
	function get_ques_by_nodes($node_id){
		$this->db->select('*'); 
		$this->db->from('questions');
		$this->db->where('node_id',$node_id);
		$query = $this->db->get();
		$res_array = $query->result_array();
		return $res_array;
	}
	function getQuiz($sSearch,$iDisplayStart,$iDisplayLength,$iSortCol_0,$sSortDir_0,$userId=NULL){
		$customer = $this->session->userdata ["cart_contents"]['customer'];
		
		$this->db->select('*'); 
		$this->db->from('quiz');
		if($userId){
		$this->db->where("user_id",$userId);
		}
		if($sSearch != ''){
		$this->db->where("(`id` LIKE '%$sSearch%' OR `name` LIKE '%$sSearch%' OR `desc` LIKE '%$sSearch%' OR `url` LIKE '%$sSearch%')", NULL, FALSE);
		}
		if($iDisplayLength!='' && $iDisplayStart!=''){
		   $this->db->limit($iDisplayLength, $iDisplayStart);
		   }
		if($iSortCol_0 != ''){
			if($iSortCol_0 == 0){
				$sortColumn = 'id';
			} else if($iSortCol_0 == 1){
				$sortColumn = 'name';
			} else if($iSortCol_0 == 2){
				$sortColumn = 'desc';
			} else if($iSortCol_0 == 3){
				$sortColumn = 'url';
			} else{
				$sortColumn = 'id';
			}
			if($sSortDir_0 != ''){
				$direction = $sSortDir_0;
			} else {
				$direction = 'asc';
			}
		   $this->db->order_by($sortColumn, $sSortDir_0);
		}
		$query = $this->db->get();
		$res_array = $query->result_array();
		return $res_array;
	}
	
	function getWebforms($id = NULL, $customerId = NULL){
		$this->db->select('*');
		$this->db->from('web_form');
		if($id){
			$this->db->where('id',$id);
		}
		if($customerId){
			$this->db->where('user_id',$customerId);
		}
		$query = $this->db->get();  
		return $query->result();
	}
	function selectcount($customerId)
	{
	$this->load->database();
			$this->db->select('COUNT(*) AS total');
			$this->db->from('quiz');
			if($customerId){
			$this->db->where('user_id',$customerId);
		}
			$query = $this->db->get(); 	
			return $query->result();
	}
}