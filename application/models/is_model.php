<?php
Class Is_model extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
	
	function ISBasicFields(){
		return array('Address1Type','Address2Street1','Address2Street2','Address2Type','Address3Street1','Address3Street2','Address3Type','Anniversary','AssistantName','AssistantPhone','BillingInformation','Birthday','City','City2','City3','Company','AccountId','CompanyID','ContactNotes','ContactType','Country','Country2','Country3','CreatedBy','DateCreated','Email','EmailAddress2','EmailAddress3','Fax1','Fax1Type','Fax2','Fax2Type','FirstName','Groups','Id','JobTitle','LastName','LastUpdated','LastUpdatedBy','Leadsource','LeadSourceId','MiddleName','Nickname','OwnerID','Password','Phone1','Phone1Ext','Phone1Type','Phone2','Phone2Ext','Phone2Type','Phone3','Phone3Ext','Phone3Type','Phone4','Phone4Ext','Phone4Type','Phone5','Phone5Ext','Phone5Type','PostalCode','PostalCode2','PostalCode3','ReferralCode','SpouseName','State','State2','State3','StreetAddress1','StreetAddress2','Suffix','Title','Username','Validated','Website','ZipFour1','ZipFour2','ZipFour3');
	}
	
	function ISCustomFields($app_name=NULL,$app_key=NULL){
		if($app_name==NULL || $app_key == NULL){
				$customer = $this->session->userdata ["cart_contents"]['customer'];
$app_name = $customer['is_app_name'];
$app_key = $customer['is_app_key'];	
$app_parse = parse_url($app_name);
			$appdomain = explode('.',$app_parse['host']);
				if(!empty($appdomain[0])){
					$app_name = $appdomain[0];
				}
		}

$app = new iSDK;
				if(!empty($app_name)){	
if ($app->cfgCon($app_name,$app_key))
	{
		$returnFields = array('Id','GroupId','Name','Label','Values','ListRows');
		$query = array('FormId' => '%');
		$Lists = $app->dsQuery('DataFormField',1000,0,$query,$returnFields);
		$totalcount = count($Lists);
		foreach($Lists as $List){
			$custom_fields[$List['Name']] = $List['Label'];
		}
		return $custom_fields;
	}
				}
	}
	
	function getTags(){
		$customer = $this->session->userdata ["cart_contents"]['customer'];
$app_name = $customer['is_app_name'];
$appKey = $customer['is_app_key'];	

$app = new iSDK;
if($app_name){
			$app_parse = parse_url($app_name);
			$appdomain = explode('.',$app_parse['host']);
				if(!empty($appdomain[0])){	
if ($app->cfgCon($appdomain[0],$appKey))
	{
		$returnFields = array('Id','CategoryName');
$query = array('Id' => '%');
$result = $app->dsQuery('ContactGroupCategory',1000,0,$query,$returnFields);
$tagCategory[] = array('label' => '--Select--', 'value' => '', 'selected' => true);
foreach($result as $res){
	if(isset($res['CategoryName'])){
		$tagCategory[] = array('label' => $res['CategoryName'], 'value' => $res['Id'], 'selected' => false);
	}
	//$tagCategoryOptions .= '<option value="'.$res['Id'].'">'.$res['CategoryName'].'</option>';
}
	return $tagCategory;
	}
				}
}
	}
}