<!DOCTYPE HTML>
<html lang="en-US">
<?php $this->load->helper('url'); ?>
<head>
<meta charset="utf-8">
	<title>Sales Questions</title>
	
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Flex Admin - Responsive Admin Theme</title>
	
    <!-- PACE LOAD BAR PLUGIN - This creates the subtle load bar effect at the top of the page. -->
    <link href="<?php echo base_url(); ?>assets/css/plugins/pace/pace.css" rel="stylesheet">
    <script src="<?php echo base_url(); ?>assets/js/plugins/pace/pace.js"></script>

    <!--<link href="<?php echo base_url(); ?>assets/css/lib/bootstrap.min.css" rel="stylesheet">-->
    <link href="<?php echo base_url(); ?>assets/css/plugins/bootstrap/css/bootstrap.css" rel="stylesheet" media="screen">
    <!--<link href="<?php echo base_url(); ?>assets/css/lib/bootstrap-responsive.min.css" rel="stylesheet">-->
    
    <link href="<?php echo base_url(); ?>assets/css/form.css" rel="stylesheet">
    <link href='//fonts.googleapis.com/css?family=Ubuntu:300,400,500,700,300italic,400italic,500italic,700italic' rel="stylesheet" type="text/css">
    <link href='//fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel="stylesheet" type="text/css">
    <link href="<?php echo base_url(); ?>assets/icons/font-awesome/css/font-awesome.min.css" rel="stylesheet">

    <!-- PAGE LEVEL PLUGIN STYLES -->
    <link href="<?php echo base_url(); ?>assets/css/plugins/bootstrap-timepicker/bootstrap-timepicker.min.css" rel="stylesheet">
    <link href="//code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" type="text/css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/css/plugins/bootstrap-tokenfield/tokenfield-typeahead.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/css/plugins/bootstrap-tokenfield/bootstrap-tokenfield.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/css/plugins/bootstrap-datepicker/datepicker3.css" rel="stylesheet">

    <!-- THEME STYLES - Include these on every page. -->
    <link href="<?php echo base_url(); ?>assets/css/style.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/css/plugins.css" rel="stylesheet">
	<link href="<?php echo base_url(); ?>assets/css/plugins/dropzone/css/dropzone.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/css/plugins/datatables/datatables.css" rel="stylesheet">
	<link href="<?php echo base_url(); ?>assets/css/prettify.css" rel="stylesheet">
	<link href="<?php echo base_url(); ?>assets/css/custom.css" rel="stylesheet">
  </head>

  <body>
    <div id="header">
	<?php $this->load->view('admin/navtop'); ?>
	<?php $this->load->view('admin/navside'); ?>
	</div>

	<div id="content">
	        <div id="page-wrapper">
            <?php if ($this->session->flashdata('message')):?>
			<div class="alert alert-info">
				<a class="close" data-dismiss="alert">×</a>
				<?php echo $this->session->flashdata('message');?>
			</div>
		<?php endif;?>
        <?php if (!empty($message)):?>
			<div class="alert alert-info">
				<a class="close" data-dismiss="alert">×</a>
				<?php echo $message;?>
			</div>
		<?php endif;?>
		<?php if ($this->session->flashdata('error')):?>
			<div class="alert alert-error">
				<a class="close" data-dismiss="alert">×</a>
				<?php echo $this->session->flashdata('error');?>
			</div>
		<?php endif; ?>
		<?php if (!empty($error)):?>
			<div class="alert alert-error">
				<a class="close" data-dismiss="alert">×</a>
				<?php echo $error;?>
			</div>
		<?php endif;?>
			<div class="page-content page-content-ease-in">
      <?php $this->load->view($body); ?>
			</div>
</div>
</div>
<div id="footer">
	<?php // $this->load->view('books_footer'); ?>
	</div>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/bootstrap/bootstrap.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jqueryui/ui/minified/jquery-ui.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/handlebars/handlebars.js"></script>
<script src="<?php echo base_url(); ?>assets/js/plugins/slimscroll/jquery.slimscroll.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/plugins/popupoverlay/jquery.popupoverlay.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/plugins/popupoverlay/defaults.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/plugins/popupoverlay/logout.js"></script>
    <!-- HISRC Retina Images -->
    <script src="<?php echo base_url(); ?>assets/js/plugins/hisrc/hisrc.js"></script>

    <!-- PAGE LEVEL PLUGIN SCRIPTS -->
    <script src="<?php echo base_url(); ?>assets/js/plugins/bootstrap-tokenfield/bootstrap-tokenfield.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/plugins/bootstrap-tokenfield/scrollspy.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/plugins/bootstrap-tokenfield/affix.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/plugins/bootstrap-tokenfield/typeahead.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/plugins/bootstrap-maxlength/bootstrap-maxlength.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/plugins/bootstrap-timepicker/bootstrap-timepicker.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/plugins/bootstrap-datepicker/bootstrap-datepicker.js"></script>
	    <!-- PAGE LEVEL PLUGIN SCRIPTS -->
    <script src="<?php echo base_url(); ?>assets/js/plugins/dropzone/dropzone.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/flex.js"></script>
	<script src="<?php echo base_url(); ?>assets/js/jquery.bootstrap.wizard.js"></script>
	<script src="<?php echo base_url(); ?>assets/js/prettify.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/plugins/datatables/jquery.dataTables.js"></script>
    
    <?php $currentParent = $this->router->fetch_class();
$currentChild = $this->router->fetch_method(); ?>
<?php if(($currentParent == 'webform' && $currentChild == 'index') || ($currentParent == 'webform' && $currentChild == 'edit') || ($currentParent == 'orderform' && $currentChild == 'index') || ($currentParent == 'orderform' && $currentChild == 'edit')){ ?>
    <script data-main="<?php echo base_url(); ?>assets/js/main-built.js" src="<?php echo base_url(); ?>assets/js/lib/require.js" ></script>
    <?php 
if($this->session->userdata ["cart_contents"]['customer']){
 if(isset($webform_details)){
	 $saved_form = $webform_details[0]->form;
 } elseif(isset($orderform_details)){
	 $saved_form = $orderform_details[0]->form;
 } else {
	 $saved_form = '';
 }
$customer = $this->session->userdata ["cart_contents"]['customer'];
$app_name = $customer['is_app_name'];
$appKey = $customer['is_app_key'];	
require_once(APPPATH.'libraries/infusionsoft/isdk.php'); 
//require_once(APPPATH.'libraries/infusionsoft/infusionsoft/infusionsoft.php'); 
$app = new iSDK;
if($app_name){
			$app_parse = parse_url($app_name);
			$appdomain = explode('.',$app_parse['host']);
				if(!empty($appdomain[0])){	
if ($app->cfgCon($appdomain[0],$appKey))
	{
		$ISCustomerFields = array('Address1Type','Address2Street1','Address2Street2','Address2Type','Address3Street1','Address3Street2','Address3Type','Anniversary','AssistantName','AssistantPhone','BillingInformation','Birthday','City','City2','City3','Company','AccountId','CompanyID','ContactNotes','ContactType','Country','Country2','Country3','CreatedBy','DateCreated','Email','EmailAddress2','EmailAddress3','Fax1','Fax1Type','Fax2','Fax2Type','FirstName','Groups','Id','JobTitle','LastName','LastUpdated','LastUpdatedBy','Leadsource','LeadSourceId','MiddleName','Nickname','OwnerID','Password','Phone1','Phone1Ext','Phone1Type','Phone2','Phone2Ext','Phone2Type','Phone3','Phone3Ext','Phone3Type','Phone4','Phone4Ext','Phone4Type','Phone5','Phone5Ext','Phone5Type','PostalCode','PostalCode2','PostalCode3','ReferralCode','SpouseName','State','State2','State3','StreetAddress1','StreetAddress2','Suffix','Title','Username','Validated','Website','ZipFour1','ZipFour2','ZipFour3');
		
		$data['ISCustomerFields'] = $ISCustomerFields;

foreach($ISCustomerFields as $ISCustomerField){
	if($ISCustomerField == 'FirstName'){
		$ISFields[] = array('label' => $ISCustomerField, 'value' => $ISCustomerField, 'selected' => true);
	} else {
		$ISFields[] = array('label' => $ISCustomerField, 'value' => $ISCustomerField, 'selected' => false);
	}
	if($ISCustomerField == 'LastName'){
		$ISFieldsLName[] = array('label' => $ISCustomerField, 'value' => $ISCustomerField, 'selected' => true);
	} else {
		$ISFieldsLName[] = array('label' => $ISCustomerField, 'value' => $ISCustomerField, 'selected' => false);
	}
	if($ISCustomerField == 'Company'){
		$ISFieldsCompany[] = array('label' => $ISCustomerField, 'value' => $ISCustomerField, 'selected' => true);
	} else {
		$ISFieldsCompany[] = array('label' => $ISCustomerField, 'value' => $ISCustomerField, 'selected' => false);
	}
	if($ISCustomerField == 'StreetAddress1'){
		$ISFieldsAd1[] = array('label' => $ISCustomerField, 'value' => $ISCustomerField, 'selected' => true);
	} else {
		$ISFieldsAd1[] = array('label' => $ISCustomerField, 'value' => $ISCustomerField, 'selected' => false);
	}
	if($ISCustomerField == 'StreetAddress2'){
		$ISFieldsAd2[] = array('label' => $ISCustomerField, 'value' => $ISCustomerField, 'selected' => true);
	} else {
		$ISFieldsAd2[] = array('label' => $ISCustomerField, 'value' => $ISCustomerField, 'selected' => false);
	}
	if($ISCustomerField == 'City'){
		$ISFieldsCity[] = array('label' => $ISCustomerField, 'value' => $ISCustomerField, 'selected' => true);
	} else {
		$ISFieldsCity[] = array('label' => $ISCustomerField, 'value' => $ISCustomerField, 'selected' => false);
	}
	if($ISCustomerField == 'State'){
		$ISFieldsState[] = array('label' => $ISCustomerField, 'value' => $ISCustomerField, 'selected' => true);
	} else {
		$ISFieldsState[] = array('label' => $ISCustomerField, 'value' => $ISCustomerField, 'selected' => false);
	}
	if($ISCustomerField == 'PostalCode'){
		$ISFieldsPostalCode[] = array('label' => $ISCustomerField, 'value' => $ISCustomerField, 'selected' => true);
	} else {
		$ISFieldsPostalCode[] = array('label' => $ISCustomerField, 'value' => $ISCustomerField, 'selected' => false);
	}
	if($ISCustomerField == 'Country'){
		$ISFieldsCountry[] = array('label' => $ISCustomerField, 'value' => $ISCustomerField, 'selected' => true);
	} else {
		$ISFieldsCountry[] = array('label' => $ISCustomerField, 'value' => $ISCustomerField, 'selected' => false);
	}
	if($ISCustomerField == 'Phone1'){
		$ISFieldsPhone1[] = array('label' => $ISCustomerField, 'value' => $ISCustomerField, 'selected' => true);
	} else {
		$ISFieldsPhone1[] = array('label' => $ISCustomerField, 'value' => $ISCustomerField, 'selected' => false);
	}
	if($ISCustomerField == 'Email'){
		$ISFieldsEmail[] = array('label' => $ISCustomerField, 'value' => $ISCustomerField, 'selected' => true);
	} else {
		$ISFieldsEmail[] = array('label' => $ISCustomerField, 'value' => $ISCustomerField, 'selected' => false);
	}
	
	$ISFieldsAllFalse[] = array('label' => $ISCustomerField, 'value' => $ISCustomerField, 'selected' => false);
}
		
		$returnFields = array('Id','GroupId','Name','Label','Values','ListRows');
		$query = array('FormId' => '%');
		$Lists = $app->dsQuery('DataFormField',1000,0,$query,$returnFields);
		$totalcount = count($Lists);
		foreach($Lists as $List){
			$ISFields[] = array('label' => ucwords(str_replace('_',' ',$List['Label'])), 'value' => $List['Name'], 'selected' => false);
			$ISFieldsEmail[] = array('label' => ucwords(str_replace('_',' ',$List['Label'])), 'value' => $List['Name'], 'selected' => false);
			$ISFieldsAllFalse[] = array('label' => ucwords(str_replace('_',' ',$List['Label'])), 'value' => $List['Name'], 'selected' => false);
		}
		
		$returnFields = array('Id','CategoryName');
$query = array('Id' => '%');
$result = $app->dsQuery('ContactGroupCategory',1000,0,$query,$returnFields);
$tagCategory[] = array('label' => '--Select--', 'value' => '', 'selected' => true);
$tagCategoryOptions = '<option value="" selected=selected>--Select--</option>';
foreach($result as $res){
	$tagCategory[] = array('label' => $res['CategoryName'], 'value' => $res['Id'], 'selected' => false);
	$tagCategoryOptions .= '<option value="'.$res['Id'].'">'.$res['CategoryName'].'</option>';
}
		$returnFields = array('Id','GroupName');
$query = array('GroupCategoryId' => '%');
$result = $app->dsQuery('ContactGroup',1000,0,$query,$returnFields);
$tagName[] = array('label' => '--Select--', 'value' => '', 'selected' => true);

foreach($result as $res){
	if(!isset($res['GroupName'])){$res['GroupName'] = ''; }
	$tagName[] = array('label' => $res['GroupName'], 'value' => $res['Id'], 'selected' => false);
	$tagInputText[] = $res['GroupName'];
}
//$tagInputText = substr($tagInputText,0,-1);
$tagInputText = json_encode($tagInputText);
for($num=1; $num<=5; $num++){
	if($num == 2){
		$numoptions[] = array('label' => $num, 'value' => $num, 'selected' => true);
	} else {
		$numoptions[] = array('label' => $num, 'value' => $num, 'selected' => false);
	}
	if($num == 3){
		$numoptionsCC[] = array('label' => $num, 'value' => $num, 'selected' => true);
	} else {
		$numoptionsCC[] = array('label' => $num, 'value' => $num, 'selected' => false);
	}
}

	} else {
		echo 'Not connected';
	}
				}
}

$InputSizeOptions[] = array('label' => 'Mini', 'value' => 'input-mini', 'selected' => false);
$InputSizeOptions[] = array('label' => 'Small', 'value' => 'input-small', 'selected' => false);
$InputSizeOptions[] = array('label' => 'Medium', 'value' => 'input-medium', 'selected' => false);
$InputSizeOptions[] = array('label' => 'Large', 'value' => 'form-control', 'selected' => false);
$InputSizeOptions[] = array('label' => 'Xlarge', 'value' => 'form-control', 'selected' => true);
$InputSizeOptions[] = array('label' => 'Xxlarge', 'value' => 'input-xxlarge', 'selected' => false);

$ButtonOptions[] = array('label' => 'Default', 'value' => 'btn-default', 'selected' => false);
$ButtonOptions[] = array('label' => 'Primary', 'value' => 'btn-primary', 'selected' => true);
$ButtonOptions[] = array('label' => 'Info', 'value' => 'btn-info', 'selected' => false);
$ButtonOptions[] = array('label' => 'Success', 'value' => 'btn-success', 'selected' => false);
$ButtonOptions[] = array('label' => 'Warning', 'value' => 'btn-warning', 'selected' => false);
$ButtonOptions[] = array('label' => 'Danger', 'value' => 'btn-danger', 'selected' => false);
$ButtonOptions[] = array('label' => 'Inverse', 'value' => 'btn-inverse', 'selected' => false);

$fields = json_encode($ISFields);
$ISFieldsName = $fields;
$fieldsEmail = json_encode($ISFieldsEmail);
$fieldsInputSizeOptions = json_encode($InputSizeOptions);
$fieldsButtonOptions = json_encode($ButtonOptions);



/*$LoadedForm[] = array('title' => 'Text Input', 'fields' => array(
'inputsize' => array('label' => 'Input Size', 'type' => 'select', 'value' => $InputSizeOptions),
'label' => array('label' => 'Label Text', 'type' => 'input', 'value' => 'Tags'),
'helptext' => array('label' => 'Help Text', 'type' => 'input', 'value' => ''),
'placeholder' => array('label' => 'Placeholder', 'type' => 'input', 'value' => 'Start typing!'),
'required' => array('label' => 'Required', 'type' => 'checkbox', 'value' => 'red,green,blue'),
'id' => array('label' => 'ID / Name', 'type' => 'input', 'value' => 'tokenfield-typeahead')));*/

if($saved_form == ''){
	
if($currentParent == 'orderform'){
$LoadedForm[] = array('title' => 'Form Name', 'fields' => array('name' => array('label' => 'Form Name', 'type' => 'input', 'value' => 'Form Name')));
$LoadedForm[] = array('title' => 'Text Input', 'fields' => array(
'inputsize' => array('label' => 'Input Size', 'type' => 'select', 'value' => $InputSizeOptions),
'label' => array('label' => 'Label Text', 'type' => 'input', 'value' => 'First Name'),
'helptext' => array('label' => 'Help Text', 'type' => 'input', 'value' => ''),
'placeholder' => array('label' => 'Placeholder', 'type' => 'input', 'value' => 'First Name'),
'required' => array('label' => 'Required', 'type' => 'checkbox', 'value' => 0),
'id' => array('label' => 'ID / Name', 'type' => 'select', 'value' => $ISFields)));

$LoadedForm[] = array('title' => 'Text Input', 'fields' => array(
'inputsize' => array('label' => 'Input Size', 'type' => 'select', 'value' => $InputSizeOptions),
'label' => array('label' => 'Label Text', 'type' => 'input', 'value' => 'Last Name'),
'helptext' => array('label' => 'Help Text', 'type' => 'input', 'value' => ''),
'placeholder' => array('label' => 'Placeholder', 'type' => 'input', 'value' => 'Last Name'),
'required' => array('label' => 'Required', 'type' => 'checkbox', 'value' => 0),
'id' => array('label' => 'ID / Name', 'type' => 'select', 'value' => $ISFieldsLName)));

$LoadedForm[] = array('title' => 'Text Input', 'fields' => array(
'inputsize' => array('label' => 'Input Size', 'type' => 'select', 'value' => $InputSizeOptions),
'label' => array('label' => 'Label Text', 'type' => 'input', 'value' => 'Company Name'),
'helptext' => array('label' => 'Help Text', 'type' => 'input', 'value' => ''),
'placeholder' => array('label' => 'Placeholder', 'type' => 'input', 'value' => 'Company Name'),
'required' => array('label' => 'Required', 'type' => 'checkbox', 'value' => 0),
'id' => array('label' => 'ID / Name', 'type' => 'select', 'value' => $ISFieldsCompany)));

$LoadedForm[] = array('title' => 'Text Input', 'fields' => array(
'inputsize' => array('label' => 'Input Size', 'type' => 'select', 'value' => $InputSizeOptions),
'label' => array('label' => 'Label Text', 'type' => 'input', 'value' => 'Address-Line 1'),
'helptext' => array('label' => 'Help Text', 'type' => 'input', 'value' => ''),
'placeholder' => array('label' => 'Placeholder', 'type' => 'input', 'value' => 'Address-Line 1'),
'required' => array('label' => 'Required', 'type' => 'checkbox', 'value' => 0),
'id' => array('label' => 'ID / Name', 'type' => 'select', 'value' => $ISFieldsAd1)));

$LoadedForm[] = array('title' => 'Text Input', 'fields' => array(
'inputsize' => array('label' => 'Input Size', 'type' => 'select', 'value' => $InputSizeOptions),
'label' => array('label' => 'Label Text', 'type' => 'input', 'value' => 'Address-Line 2'),
'helptext' => array('label' => 'Help Text', 'type' => 'input', 'value' => ''),
'placeholder' => array('label' => 'Placeholder', 'type' => 'input', 'value' => 'Address-Line 2'),
'required' => array('label' => 'Required', 'type' => 'checkbox', 'value' => 0),
'id' => array('label' => 'ID / Name', 'type' => 'select', 'value' => $ISFieldsAd2)));

$LoadedForm[] = array('title' => 'Text Input', 'fields' => array(
'inputsize' => array('label' => 'Input Size', 'type' => 'select', 'value' => $InputSizeOptions),
'label' => array('label' => 'Label Text', 'type' => 'input', 'value' => 'City'),
'helptext' => array('label' => 'Help Text', 'type' => 'input', 'value' => ''),
'placeholder' => array('label' => 'Placeholder', 'type' => 'input', 'value' => 'City'),
'required' => array('label' => 'Required', 'type' => 'checkbox', 'value' => 0),
'id' => array('label' => 'ID / Name', 'type' => 'select', 'value' => $ISFieldsCity)));

$LoadedForm[] = array('title' => 'Text Input', 'fields' => array(
'inputsize' => array('label' => 'Input Size', 'type' => 'select', 'value' => $InputSizeOptions),
'label' => array('label' => 'Label Text', 'type' => 'input', 'value' => 'State'),
'helptext' => array('label' => 'Help Text', 'type' => 'input', 'value' => ''),
'placeholder' => array('label' => 'Placeholder', 'type' => 'input', 'value' => 'State'),
'required' => array('label' => 'Required', 'type' => 'checkbox', 'value' => 0),
'id' => array('label' => 'ID / Name', 'type' => 'select', 'value' => $ISFieldsState)));

$LoadedForm[] = array('title' => 'Text Input', 'fields' => array(
'inputsize' => array('label' => 'Input Size', 'type' => 'select', 'value' => $InputSizeOptions),
'label' => array('label' => 'Label Text', 'type' => 'input', 'value' => 'Zip Code'),
'helptext' => array('label' => 'Help Text', 'type' => 'input', 'value' => ''),
'placeholder' => array('label' => 'Placeholder', 'type' => 'input', 'value' => 'Zip Code'),
'required' => array('label' => 'Required', 'type' => 'checkbox', 'value' => 0),
'id' => array('label' => 'ID / Name', 'type' => 'select', 'value' => $ISFieldsPostalCode)));

$LoadedForm[] = array('title' => 'Text Input', 'fields' => array(
'inputsize' => array('label' => 'Input Size', 'type' => 'select', 'value' => $InputSizeOptions),
'label' => array('label' => 'Label Text', 'type' => 'input', 'value' => 'Country'),
'helptext' => array('label' => 'Help Text', 'type' => 'input', 'value' => ''),
'placeholder' => array('label' => 'Placeholder', 'type' => 'input', 'value' => 'Country'),
'required' => array('label' => 'Required', 'type' => 'checkbox', 'value' => 0),
'id' => array('label' => 'ID / Name', 'type' => 'select', 'value' => $ISFieldsCountry)));

$LoadedForm[] = array('title' => 'Text Input', 'fields' => array(
'inputsize' => array('label' => 'Input Size', 'type' => 'select', 'value' => $InputSizeOptions),
'label' => array('label' => 'Label Text', 'type' => 'input', 'value' => 'Phone Number'),
'helptext' => array('label' => 'Help Text', 'type' => 'input', 'value' => ''),
'placeholder' => array('label' => 'Placeholder', 'type' => 'input', 'value' => 'Phone Number'),
'required' => array('label' => 'Required', 'type' => 'checkbox', 'value' => 0),
'id' => array('label' => 'ID / Name', 'type' => 'select', 'value' => $ISFieldsPhone1)));

$LoadedForm[] = array('title' => 'Text Input', 'fields' => array(
'inputsize' => array('label' => 'Input Size', 'type' => 'select', 'value' => $InputSizeOptions),
'label' => array('label' => 'Label Text', 'type' => 'input', 'value' => 'Email Address'),
'helptext' => array('label' => 'Help Text', 'type' => 'input', 'value' => ''),
'placeholder' => array('label' => 'Placeholder', 'type' => 'input', 'value' => 'Email AddressAddress'),
'required' => array('label' => 'Required', 'type' => 'checkbox', 'value' => 0),
'id' => array('label' => 'ID / Name', 'type' => 'select', 'value' => $ISFieldsEmail)));

$LoadedForm[] = array('title' => 'Select Basic', 'fields' => array(
'label' => array('label' => 'Label Text', 'type' => 'input', 'value' => 'Credit Card Type'),
'numoptions' => array('label' => '#of Options', 'type' => 'select', 'value' => $numoptionsCC),
'options' => array('label' => 'Options', 'type' => 'input', 'value' => $tagName),
'option1' => array('label' => 'Options', 'type' => 'input', 'value' => 'American Express'),
'tagcat1' => array('label' => 'Tag Category', 'type' => 'select', 'value' => $tagCategory),
'tagapply1' => array('label' => 'Apply Tag', 'type' => 'select', 'value' => $tagName),
'option2' => array('label' => 'Options', 'type' => 'input', 'value' => 'MasterCard'),
'tagcat2' => array('label' => 'Tag Category', 'type' => 'select', 'value' => $tagCategory),
'tagapply2' => array('label' => 'Apply Tag', 'type' => 'select', 'value' => $tagName),
'option3' => array('label' => 'Options', 'type' => 'input', 'value' => 'Visa'),
'tagcat3' => array('label' => 'Tag Category', 'type' => 'select', 'value' => $tagCategory),
'tagapply3' => array('label' => 'Apply Tag', 'type' => 'select', 'value' => $tagName),
'option4' => array('label' => 'Options', 'type' => 'input', 'value' => ''),
'tagcat4' => array('label' => 'Tag Category', 'type' => 'select', 'value' => $tagCategory),
'tagapply4' => array('label' => 'Apply Tag', 'type' => 'select', 'value' => $tagName),
'option5' => array('label' => 'Options', 'type' => 'input', 'value' => ''),
'tagcat5' => array('label' => 'Tag Category', 'type' => 'select', 'value' => $tagCategory),
'tagapply5' => array('label' => 'Apply Tag', 'type' => 'select', 'value' => $tagName),
'inputsize' => array('label' => 'Input Size', 'type' => 'select', 'value' => $InputSizeOptions),
'id' => array('label' => 'ID / Name', 'type' => 'input', 'value' => 'cardType', 'class' => 'hide')));

$LoadedForm[] = array('title' => 'Text Input', 'fields' => array(
'inputsize' => array('label' => 'Input Size', 'type' => 'select', 'value' => $InputSizeOptions),
'label' => array('label' => 'Label Text', 'type' => 'input', 'value' => 'Cart Number'),
'helptext' => array('label' => 'Help Text', 'type' => 'input', 'value' => ''),
'placeholder' => array('label' => 'Placeholder', 'type' => 'input', 'value' => 'Cart Number'),
'required' => array('label' => 'Required', 'type' => 'checkbox', 'value' => 0),
'id' => array('label' => 'ID / Name', 'type' => 'input', 'value' => 'card-number')));

$LoadedForm[] = array('title' => 'Text Input', 'fields' => array(
'inputsize' => array('label' => 'Input Size', 'type' => 'select', 'value' => $InputSizeOptions),
'label' => array('label' => 'Label Text', 'type' => 'input', 'value' => 'CCV Number'),
'helptext' => array('label' => 'Help Text', 'type' => 'input', 'value' => ''),
'placeholder' => array('label' => 'Placeholder', 'type' => 'input', 'value' => 'CCV Number'),
'required' => array('label' => 'Required', 'type' => 'checkbox', 'value' => 0),
'id' => array('label' => 'ID / Name', 'type' => 'input', 'value' => 'card-cvc')));

$LoadedForm[] = array('title' => 'Text Input', 'fields' => array(
'inputsize' => array('label' => 'Input Size', 'type' => 'select', 'value' => $InputSizeOptions),
'label' => array('label' => 'Label Text', 'type' => 'input', 'value' => 'Expiration Month'),
'helptext' => array('label' => 'Help Text', 'type' => 'input', 'value' => ''),
'placeholder' => array('label' => 'Placeholder', 'type' => 'input', 'value' => 'MM'),
'required' => array('label' => 'Required', 'type' => 'checkbox', 'value' => 0),
'id' => array('label' => 'ID / Name', 'type' => 'input', 'value' => 'card-expiry-month')));

$LoadedForm[] = array('title' => 'Text Input', 'fields' => array(
'inputsize' => array('label' => 'Input Size', 'type' => 'select', 'value' => $InputSizeOptions),
'label' => array('label' => 'Label Text', 'type' => 'input', 'value' => 'Expiration Year'),
'helptext' => array('label' => 'Help Text', 'type' => 'input', 'value' => ''),
'placeholder' => array('label' => 'Placeholder', 'type' => 'input', 'value' => 'YYYY'),
'required' => array('label' => 'Required', 'type' => 'checkbox', 'value' => 0),
'id' => array('label' => 'ID / Name', 'type' => 'input', 'value' => 'card-expiry-year')));

/*$LoadedForm[] = array('title' => 'Single Button', 'fields' => array(
'label' => array('label' => 'Label Text', 'type' => 'input', 'value' => ''),
'buttontype' => array('label' => 'Button Type', 'type' => 'select', 'value' => $ButtonOptions),
'buttonlabel' => array('label' => 'Button Labe', 'type' => 'input', 'value' => 'Submit'),
'id' => array('label' => 'ID / Name', 'type' => 'input', 'value' => 'button')));*/

} else{
	$LoadedForm[] = array('title' => 'Form Name', 'fields' => array('name' => array('label' => 'Form Name', 'type' => 'input', 'value' => 'Form Name')));
$LoadedForm[] = array('title' => 'Text Input', 'fields' => array(
'inputsize' => array('label' => 'Input Size', 'type' => 'select', 'value' => $InputSizeOptions),
'label' => array('label' => 'Label Text', 'type' => 'input', 'value' => 'Name'),
'helptext' => array('label' => 'Help Text', 'type' => 'input', 'value' => ''),
'placeholder' => array('label' => 'Placeholder', 'type' => 'input', 'value' => 'Name'),
'required' => array('label' => 'Required', 'type' => 'checkbox', 'value' => 0),
'id' => array('label' => 'ID / Name', 'type' => 'select', 'value' => $ISFields)));

$LoadedForm[] = array('title' => 'Text Input', 'fields' => array(
'inputsize' => array('label' => 'Input Size', 'type' => 'select', 'value' => $InputSizeOptions),
'label' => array('label' => 'Label Text', 'type' => 'input', 'value' => 'Email'),
'helptext' => array('label' => 'Help Text', 'type' => 'input', 'value' => ''),
'placeholder' => array('label' => 'Placeholder', 'type' => 'input', 'value' => 'Email'),
'required' => array('label' => 'Required', 'type' => 'checkbox', 'value' => 0),
'id' => array('label' => 'ID / Name', 'type' => 'select', 'value' => $ISFieldsEmail)));

$LoadedForm[] = array('title' => 'Single Button', 'fields' => array(
'label' => array('label' => 'Label Text', 'type' => 'input', 'value' => ''),
'buttontype' => array('label' => 'Button Type', 'type' => 'select', 'value' => $ButtonOptions),
'buttonlabel' => array('label' => 'Button Labe', 'type' => 'input', 'value' => 'Submit'),
'id' => array('label' => 'ID / Name', 'type' => 'input', 'value' => 'button')));

}
} else {
require_once(APPPATH.'libraries/simple_html_dom.php'); 
$html = str_get_html($saved_form);
$e = $html->find('legend',0);
$formTitle = $e->innertext;
$LoadedForm[] = array('title' => 'Form Name', 'fields' => array('name' => array('label' => 'Form Name', 'type' => 'input', 'value' => $formTitle)));
$totalElements = count($html->find('div[class=control-group]'));
for($i=0;$i<$totalElements;$i++){
$e = $html->find('div[class=control-group]',$i);
$labelVal = $e->children(0)->innertext;
$labelFieldtype = $e->children(0)->fieldtype;
$inputId = $e->children(1)->children(0)->id;
$inputTag = $e->children(1)->children(0)->tag;

	if($inputTag == 'input'){
		$inputType = $e->children(1)->children(0)->type;
	} else {
		$inputType = $e->children(1)->children(0)->tag;
	}
	if($inputTag != 'button' && $inputTag != 'textarea' && $inputTag != 'select'){
	$inputPlaceholder = $e->children(1)->children(0)->placeholder;
	$inputRequired = $e->children(1)->children(0)->required;
	} else {
		if($inputTag == 'select'){
			$inputPlaceholder = '';
			$inputPlaceholderOptions = count($e->children(1)->children(0)->children());
			unset($numoptions);
			for($num=1; $num<=5; $num++){
				if($num == $inputPlaceholderOptions){
					$numoptions[] = array('label' => $num, 'value' => $num, 'selected' => true);
				} else {
					$numoptions[] = array('label' => $num, 'value' => $num, 'selected' => false);
				}
			}

			for($countOptions=0; $countOptions<$inputPlaceholderOptions; $countOptions++){
				$inputPlaceholder[] = $e->children(1)->children(0)->children($countOptions)->innertext;
				$inputPlaceholderValue[] = $curTagCatString = $e->children(1)->children(0)->children($countOptions)->value;
				$curTagCat = explode(',',$curTagCatString);
				foreach($tagCategory as $tagCateg){
					if($tagCateg['value'] == $curTagCat[0]){
						$tagCategoryAllOptions[$countOptions][] = array('label' => $tagCateg['label'], 'value' => $tagCateg['value'], 'selected' => true);
					} else {
						$tagCategoryAllOptions[$countOptions][] = array('label' => $tagCateg['label'], 'value' => $tagCateg['value'], 'selected' => false);
					}
				}
				foreach($tagName as $tagNa){
					if($tagNa['value'] == $curTagCat[1]){
						$tagApplyAllOptions[$countOptions][] = array('label' => $tagNa['label'], 'value' => $tagNa['value'], 'selected' => true);
					} else {
						$tagApplyAllOptions[$countOptions][] = array('label' => $tagNa['label'], 'value' => $tagNa['value'], 'selected' => false);
					}
				}
			}
			for($setAllOptions=$countOptions;$setAllOptions<5;$setAllOptions++){
				if(!isset($inputPlaceholder[$setAllOptions])){
					$inputPlaceholder[$setAllOptions] = '';
					$inputPlaceholderValue[$setAllOptions] = '';
					$tagCategoryAllOptions[$setAllOptions] = $tagCategory;
					$tagApplyAllOptions[$setAllOptions] = $tagName;
				}
			}
		} else {
			$inputPlaceholder = $e->children(1)->children(0)->innertext;
		}
		$inputRequired = '';
	}
unset($ISSelectedFields);
foreach($ISFieldsAllFalse as $ISFieldsAll){
		$ISFieldsAllLabel = $ISFieldsAll['label'];
		if($ISFieldsAllLabel == $inputId){
			$ISSelectedFields[] = array('label' => $ISFieldsAllLabel, 'value' => $ISFieldsAllLabel, 'selected' => true);
		} else {
			$ISSelectedFields[] = array('label' => $ISFieldsAllLabel, 'value' => $ISFieldsAllLabel, 'selected' => false);
		}
	}
if($labelFieldtype == "Text input" || $labelFieldtype == "Password input"){
	if($inputId == 'card-number' || $inputId == 'card-cvc' || $inputId == 'card-expiry-month' || $inputId == 'card-expiry-year'){
		$LoadedForm[] = array('title' => $labelFieldtype, 'fields' => array(
'inputsize' => array('label' => 'Input Size', 'type' => 'select', 'value' => $InputSizeOptions),
'label' => array('label' => 'Label Text', 'type' => 'input', 'value' => $labelVal),
'helptext' => array('label' => 'Help Text', 'type' => 'input', 'value' => ''),
'placeholder' => array('label' => 'Placeholder', 'type' => 'input', 'value' => $inputPlaceholder),
'required' => array('label' => 'Required', 'type' => 'checkbox', 'value' => $inputRequired),
'id' => array('label' => 'ID / Name', 'type' => 'input', 'value' => $inputId)));
	} else {
$LoadedForm[] = array('title' => $labelFieldtype, 'fields' => array(
'inputsize' => array('label' => 'Input Size', 'type' => 'select', 'value' => $InputSizeOptions),
'label' => array('label' => 'Label Text', 'type' => 'input', 'value' => $labelVal),
'helptext' => array('label' => 'Help Text', 'type' => 'input', 'value' => ''),
'placeholder' => array('label' => 'Placeholder', 'type' => 'input', 'value' => $inputPlaceholder),
'required' => array('label' => 'Required', 'type' => 'checkbox', 'value' => $inputRequired),
'id' => array('label' => 'ID / Name', 'type' => 'select', 'value' => $ISSelectedFields)));
}
	}

if($labelFieldtype == "Single Button"){
	
	$LoadedForm[] = array('title' => $labelFieldtype, 'fields' => array(
'label' => array('label' => 'Tag Id ( , seperated)', 'type' => 'input', 'value' => $labelVal),
'buttontype' => array('label' => 'Button Type', 'type' => 'select', 'value' => $ButtonOptions),
'buttonlabel' => array('label' => 'Button Label', 'type' => 'input', 'value' => $inputPlaceholder),
'id' => array('label' => 'ID / Name', 'type' => 'input', 'value' => 'button')));
}

if($labelFieldtype == "Select Basic"){
	if($inputId == 'cardType'){
		$LoadedForm[] = array('title' => $labelFieldtype, 'fields' => array(
'label' => array('label' => 'Label Text', 'type' => 'input', 'value' => $labelVal),
'numoptions' => array('label' => '#of Options', 'type' => 'select', 'value' => $numoptions),
'options' => array('label' => 'Options', 'type' => 'input', 'value' => $inputPlaceholder),
'option1' => array('label' => 'Options', 'type' => 'input', 'value' => $inputPlaceholder[0]),
'tagcat1' => array('label' => 'Tag Category', 'type' => 'select', 'value' => $tagCategoryAllOptions[0]),
'tagapply1' => array('label' => 'Apply Tag', 'type' => 'select', 'value' => $tagApplyAllOptions[0]),
'option2' => array('label' => 'Options', 'type' => 'input', 'value' => $inputPlaceholder[1]),
'tagcat2' => array('label' => 'Tag Category', 'type' => 'select', 'value' => $tagCategoryAllOptions[1]),
'tagapply2' => array('label' => 'Apply Tag', 'type' => 'select', 'value' => $tagApplyAllOptions[1]),
'option3' => array('label' => 'Options', 'type' => 'input', 'value' => $inputPlaceholder[2]),
'tagcat3' => array('label' => 'Tag Category', 'type' => 'select', 'value' => $tagCategoryAllOptions[2]),
'tagapply3' => array('label' => 'Apply Tag', 'type' => 'select', 'value' => $tagApplyAllOptions[2]),
'option4' => array('label' => 'Options', 'type' => 'input', 'value' => $inputPlaceholder[3]),
'tagcat4' => array('label' => 'Tag Category', 'type' => 'select', 'value' => $tagCategoryAllOptions[3]),
'tagapply4' => array('label' => 'Apply Tag', 'type' => 'select', 'value' => $tagApplyAllOptions[3]),
'option5' => array('label' => 'Options', 'type' => 'input', 'value' => $inputPlaceholder[4]),
'tagcat5' => array('label' => 'Tag Category', 'type' => 'select', 'value' => $tagCategoryAllOptions[4]),
'tagapply5' => array('label' => 'Apply Tag', 'type' => 'select', 'value' => $tagApplyAllOptions[4]),
'inputsize' => array('label' => 'Input Size', 'type' => 'select', 'value' => $InputSizeOptions),
'id' => array('label' => 'ID / Name', 'type' => 'input', 'value' => 'cardType', 'class' => 'hide')));
	} else {
	$LoadedForm[] = array('title' => $labelFieldtype, 'fields' => array(
'label' => array('label' => 'Label Text', 'type' => 'input', 'value' => $labelVal),
'numoptions' => array('label' => '#of Options', 'type' => 'select', 'value' => $numoptions),
'options' => array('label' => 'Options', 'type' => 'input', 'value' => $inputPlaceholder),
'option1' => array('label' => 'Options', 'type' => 'input', 'value' => $inputPlaceholder[0]),
'tagcat1' => array('label' => 'Tag Category', 'type' => 'select', 'value' => $tagCategoryAllOptions[0]),
'tagapply1' => array('label' => 'Apply Tag', 'type' => 'select', 'value' => $tagApplyAllOptions[0]),
'option2' => array('label' => 'Options', 'type' => 'input', 'value' => $inputPlaceholder[1]),
'tagcat2' => array('label' => 'Tag Category', 'type' => 'select', 'value' => $tagCategoryAllOptions[1]),
'tagapply2' => array('label' => 'Apply Tag', 'type' => 'select', 'value' => $tagApplyAllOptions[1]),
'option3' => array('label' => 'Options', 'type' => 'input', 'value' => $inputPlaceholder[2]),
'tagcat3' => array('label' => 'Tag Category', 'type' => 'select', 'value' => $tagCategoryAllOptions[2]),
'tagapply3' => array('label' => 'Apply Tag', 'type' => 'select', 'value' => $tagApplyAllOptions[2]),
'option4' => array('label' => 'Options', 'type' => 'input', 'value' => $inputPlaceholder[3]),
'tagcat4' => array('label' => 'Tag Category', 'type' => 'select', 'value' => $tagCategoryAllOptions[3]),
'tagapply4' => array('label' => 'Apply Tag', 'type' => 'select', 'value' => $tagApplyAllOptions[3]),
'option5' => array('label' => 'Options', 'type' => 'input', 'value' => $inputPlaceholder[4]),
'tagcat5' => array('label' => 'Tag Category', 'type' => 'select', 'value' => $tagCategoryAllOptions[4]),
'tagapply5' => array('label' => 'Apply Tag', 'type' => 'select', 'value' => $tagApplyAllOptions[4]),
'inputsize' => array('label' => 'Input Size', 'type' => 'select', 'value' => $InputSizeOptions),
'id' => array('label' => 'ID / Name', 'type' => 'select', 'value' => $ISSelectedFields, 'class' => 'hide')));
	}
}

}
}

$fieldsLoadedForm = json_encode($LoadedForm);
//echo $saved_form;
}?>
<script type="text/javascript">
/*var ISFields = '[{  "label": "First Name",  "value": "FirstName",  "selected": false},{  "label": "Last Name",  "value": "LastName",  "selected": false},{  "label": "Email",  "value": "email",  "selected": false},{  "label": "Phone",  "value": "form-control",  "selected": false},{  "label": "Xlarge",  "value": "form-control",  "selected": true},{  "label": "Xlarge",  "value": "form-control",  "selected": true},{  "label": "Xlarge",  "value": "form-control",  "selected": true},{  "label": "Xlarge",  "value": "form-control",  "selected": true},{  "label": "Xlarge",  "value": "form-control",  "selected": true},{  "label": "Xlarge",  "value": "form-control",  "selected": true},{  "label": "Xlarge",  "value": "form-control",  "selected": true},{  "label": "Xlarge",  "value": "form-control",  "selected": true},{  "label": "Xlarge",  "value": "form-control",  "selected": true},{  "label": "Xlarge",  "value": "form-control",  "selected": true},{  "label": "Xlarge",  "value": "form-control",  "selected": true}\n        ]';*/
var ISFields = '<?php echo $fields; ?>';
var ISFieldsName = <?php echo $fields; ?>;
var ISFieldsEmail = <?php echo $fieldsEmail; ?>;
var InputSizeOptions = <?php echo $fieldsInputSizeOptions; ?>;
var ButtonOptions = <?php echo $fieldsButtonOptions; ?>;
var loadedForm = <?php echo $fieldsLoadedForm; ?>;
var numoptions = '<?php echo json_encode($numoptions); ?>';
var tagCategory = '<?php echo json_encode($tagCategory); ?>';
var tagName = '<?php echo json_encode($tagName); ?>';
var tagCategoryOptions = '<?php echo $tagCategoryOptions; ?>';
<?php 
$tagCatOptions = '';
foreach($tagCategory as $tagCat){
	$tagCatOptions .= '<option value="'.$tagCat['value'].'">'.$tagCat['label'].'</option>';
}
$tagNamOptions = '';
foreach($tagName as $tagNam){
	$tagNamOptions .= '<option value="'.$tagNam['value'].'">'.$tagNam['label'].'</option>';
}
?>
var tagCatOptions = '<?php echo $tagCatOptions; ?>';
var tagNamOptions = '<?php echo $tagNamOptions; ?>';
function showButtonOptions(e){
	var numopt = $(e).val();
//	alert(numopt);
	$('.tagGroup').hide();
	for(var i=1; i<=numopt; i++){
		$('.tagGroup_tagcat'+i).show();
		$('.tagGroup_tagapply'+i).show();
		$('.tagGroup_option'+i).show();
	}
}
function showTagCatAppy(e){
	var num = $(e).attr('id');
	var numopt = num.split('option');
	numopt = numopt[1];
	//alert($('#option'+numopt).val());
	if($( "#tagcat"+numopt+" option:selected" ).val() == ''){
		$( "#tagcat"+numopt+" option:selected" ).val('0');
		$( "#tagapply"+numopt+" option:selected" ).val('0');
	}
}
</script>
<style>
.tagGroup{display:none;}
#formFieldTypeModal.modal{z-index: 1050 !important;}
.form_added_contents{z-index:1 !important;}
.form-group{clear:both;}
.btn.pull-left.form-group{clear:none;}
.selectbasic_popup .tagGroup_id, .id_options_tag{display:none;}
.popover.fade.right.in.selectbasic_popup {max-width: none;width: 450px;}
.popover.fade.right.in.selectbasic_popup form.form{width: 100%;}
.tagFloat {float: left;margin-left: 10px;width: 130px;margin-bottom: 10px;}
.tagoption{margin-left:0;float: left;width: 130px;margin-bottom: 10px;}
.tagcatappy1, .tagGroup_option1{margin-top:10px;}
.tagGroup_options, .tagGroup_inputsize, .tagGroup_helptext{clear:both; display:none;}
.nav > li.tab_rendered{display:none;}
#formtabs li:last-child{display:none;}
#formtabs.nav-pills{background-color: #ECF0F1;}
</style>
    <?php } ?>
   
    <!-- Logout Notification Box -->
    <div id="logout">
        <div class="logout-message">
            <img class="img-circle img-logout" src="img/profile-pic.jpg" alt="">
            <h3>
                <i class="fa fa-sign-out text-green"></i> Ready to go?
            </h3>
            <p>Select "Logout" below if you are ready<br> to end your current session.</p>
            <ul class="list-inline">
                <li>
                    <a href="<?php echo base_url().'users/logout'; ?>" class="btn btn-green">
                        <strong>Logout</strong>
                    </a>
                </li>
                <li>
                    <button class="logout_close btn btn-green">Cancel</button>
                </li>
            </ul>
        </div>
    </div>
    <!-- /#logout -->
    <!-- Logout Notification jQuery -->

    <!-- PAGE LEVEL PLUGIN SCRIPTS -->
	    <!-- PAGE LEVEL PLUGIN SCRIPTS -->
        <script type="text/javascript">
		var tagInputtext;
		<?php if(isset($tagInputText) && $tagInputText != ''){ ?>
		tagInputtext = <?php echo $tagInputText; ?>;
		<?php }else { ?>
		tagInputtext = '';
		<?php  } ?>
		</script>
        <script src="<?php echo base_url(); ?>assets/js/demo/advanced-form-demo.js"></script>
        <script type="text/javascript">
(function ($, undefined) {
    $.fn.getCursorPosition = function () {
        var el = $(this).get(0);
        var pos = 0;
        if ('selectionStart' in el) {
            pos = el.selectionStart;
        } else if ('selection' in document) {
            el.focus();
            var Sel = document.selection.createRange();
            var SelLength = document.selection.createRange().text.length;
            Sel.moveStart('character', -el.value.length);
            pos = Sel.text.length - SelLength;
        }
        return pos;
    }
})(jQuery);
</script>
        <script type="text/javascript">
//Dropzone.autoDiscover = false;
                $(document).ready(function() 
                {
					$('#quiz_order .sortable-list').sortable({
						connectWith: '#quiz_order .sortable-list',
						placeholder: 'placeholder',
					});	
					/*$('.sortable-list_tags').sortable({
						connectWith: '#quiz_order .sortable-list_forms, #quiz_order .sortable-list',
						placeholder: 'placeholder',
					});
					$('.sortable-list_forms').sortable({
						connectWith: '#quiz_order .sortable-list_tags, #quiz_order .sortable-list',
						placeholder: 'placeholder',
					});*/
					$('.fields_list li a.base_field').on('click',function(){
						$('.fields_list li').removeClass('show');
						$('.fields_list').animate({marginLeft: '-=500px'}, 500,function(){
							});
						$(this).parent().addClass('show');
					});
					$('.fields_list li a.inner_fields').on('click',function(){
						$('.fields_list li').removeClass('show');
						$('.fields_list').animate({marginLeft: '+=500px'}, 500,function(){
							});
					});
$('#formtabs').on('click',function(){
	$('#components').show();
	$('#formtab2 li').each(function(){
		$(this).removeClass('active');
	});
	$('#tagsinput').hide();
});

$('#formtab2 li a').on('click',function(){
	$('#components').hide();
	$('#formtabs li').each(function(){
		$(this).removeClass('active');
	});
	$('#components .tab-content .tab-pane').each(function(){
		$(this).removeClass('active');
	});
	//$('#tagsinput').show();
	$('.tab-content2 .tab-pane').each(function(){
		$('.tab-content2 .tab-pane').removeClass('active').hide();
	});
	var tab_id = $(this).attr('href');
	$(tab_id).addClass('active').show();
});
				$('#example').dataTable( {
					"bProcessing": true,
					"bServerSide": true,
					"sAjaxSource": "<?php echo base_url();?>admin/questions/get_quiz",
					"iDisplayLength": 5,
					//"bJQueryUI": true,
					"aoColumns":[
										{ "mDataProp": "id"},
										{ "mDataProp": "name" },
										{ "mDataProp": "desc" },
										{ "mDataProp": "url" },
										{ "bSortable": false, "mDataProp": "edit" },
										{ "bSortable": false, "mDataProp": "delete" }
										]
				} );
				$('#price_table').dataTable( {
					"bProcessing": true,
					"bServerSide": true,
					"sAjaxSource": "<?php echo base_url();?>admin/pricing/get_prices",
					"aoColumns":[
										{ "mDataProp": "id"},
										{ "mDataProp": "name" },
										{ "mDataProp": "price" },
										{ "mDataProp": "duration" },
										{ "mDataProp": "desc" },
										{ "bSortable": false, "mDataProp": "edit" },
										{ "bSortable": false, "mDataProp": "delete" }
										]
				} );
				$('#coupon_table').dataTable( {
					"bProcessing": true,
					"bServerSide": true,
					"sAjaxSource": "<?php echo base_url();?>admin/coupon/get_coupons",
					"aoColumns":[
										{ "mDataProp": "id"},
										{ "mDataProp": "name" },
										{ "mDataProp": "code" },
										{ "mDataProp": "desc" },
										{ "mDataProp": "start_date" },
										{ "mDataProp": "end_date" },
										{ "mDataProp": "status" },
										{ "bSortable": false, "mDataProp": "edit" },
										{ "bSortable": false, "mDataProp": "delete" }
										]
				} );
				
				$('#customer_table').dataTable( {
					"bProcessing": true,
					"bServerSide": true,
					"sAjaxSource": "<?php echo base_url();?>admin/customers/get_customers",
					"aoColumns":[
										{ "mDataProp": "id"},
										{ "mDataProp": "first_name" },
										{ "mDataProp": "last_name" },
										{ "mDataProp": "email" },
										{ "mDataProp": "phone" },
										{ "mDataProp": "is_app_name" },
										{ "bSortable": false, "mDataProp": "edit" },
										{ "bSortable": false, "mDataProp": "delete" }
										]
				} );
				
				$('#orderform_table').dataTable( {
					"bProcessing": true,
					"bServerSide": true,
					"sAjaxSource": "<?php echo base_url();?>admin/orderform/get_orderforms",
					"aoColumns":[
										{ "mDataProp": "id"},
										{ "mDataProp": "name" },
										{ "mDataProp": "desc" },
										{ "mDataProp": "active" },
										{ "bSortable": false, "mDataProp": "edit" },
										{ "bSortable": false, "mDataProp": "delete" }
										]
				} );
				
				$('#webform_table').dataTable( {
					"bProcessing": true,
					"bServerSide": true,
					"sAjaxSource": "<?php echo base_url();?>admin/webform/get_webforms",
					"aoColumns":[
										{ "mDataProp": "id"},
										{ "mDataProp": "name" },
										{ "mDataProp": "desc" },
										{ "mDataProp": "active" },
										{ "bSortable": false, "mDataProp": "edit" },
										{ "bSortable": false, "mDataProp": "delete" }
										]
				} );
					
					 $('#rootwizard').bootstrapWizard({onTabShow: function(tab, navigation, index) {
var $total = navigation.find('li').length;
var $current = index+1;
var $percent = ($current/$total) * 100;
$('#rootwizard').find('.bar').css({width:$percent+'%'});
}});

Dropzone.autoDiscover = false;
			$("#my-dropzone1").dropzone({
				url: "<?php echo base_url(); ?>admin/file_upload",
				addRemoveLinks : true,
				//maxFilesize: 0.5,
				dictResponseError: 'Error uploading file!',
				success: function(file, response){
					$('#my-dropzone1').next('input').val(response);
				},
				removedfile: function(file) {  
				//alert('remove');      
				/*$.ajax({
				type: 'POST',
				url: 'delete.php',
				data: "id="+ add_your_filename_here,
				dataType: 'html'
				});*/   
var _ref;
return (_ref = file.previewElement) != null ? _ref.parentNode.removeChild(file.previewElement) : void 0;     
              }
			});
			
			$("#my-dropzone2").dropzone({
				url: "<?php echo base_url(); ?>admin/file_upload",
				addRemoveLinks : true,
				//maxFilesize: 0.5,
				dictResponseError: 'Error uploading file!',
				success: function(file, response){
					$('#my-dropzone2').next('input').val(response);
				},
				removedfile: function(file) {  
				//alert('remove');      
				/*$.ajax({
				type: 'POST',
				url: 'delete.php',
				data: "id="+ add_your_filename_here,
				dataType: 'html'
				});*/   
var _ref;
return (_ref = file.previewElement) != null ? _ref.parentNode.removeChild(file.previewElement) : void 0;     
              }
			});
			
			$("#my-dropzone3").dropzone({
				url: "<?php echo base_url(); ?>admin/file_upload",
				addRemoveLinks : true,
				//maxFilesize: 0.5,
				dictResponseError: 'Error uploading file!',
				success: function(file, response){
					$('#my-dropzone3').next('input').val(response);
				},
				removedfile: function(file) {  
				//alert('remove');      
				/*$.ajax({
				type: 'POST',
				url: 'delete.php',
				data: "id="+ add_your_filename_here,
				dataType: 'html'
				});*/   
var _ref;
return (_ref = file.previewElement) != null ? _ref.parentNode.removeChild(file.previewElement) : void 0;     
              }
			});
			
			$("#my-dropzone4").dropzone({
				url: "<?php echo base_url(); ?>admin/file_upload",
				addRemoveLinks : true,
				//maxFilesize: 0.5,
				dictResponseError: 'Error uploading file!',
				success: function(file, response){
					$('#my-dropzone4').next('input').val(response);
				},
				removedfile: function(file) {  
				//alert('remove');      
				/*$.ajax({
				type: 'POST',
				url: 'delete.php',
				data: "id="+ add_your_filename_here,
				dataType: 'html'
				});*/   
var _ref;
return (_ref = file.previewElement) != null ? _ref.parentNode.removeChild(file.previewElement) : void 0;     
              }
			});
			
			$("#my-dropzone5").dropzone({
				url: "<?php echo base_url(); ?>admin/file_upload",
				addRemoveLinks : true,
				//maxFilesize: 0.5,
				dictResponseError: 'Error uploading file!',
				success: function(file, response){
					$('#my-dropzone5').next('input').val(response);
				},
				removedfile: function(file) {  
				//alert('remove');      
				/*$.ajax({
				type: 'POST',
				url: 'delete.php',
				data: "id="+ add_your_filename_here,
				dataType: 'html'
				});*/   
var _ref;
return (_ref = file.previewElement) != null ? _ref.parentNode.removeChild(file.previewElement) : void 0;     
              }
			});

                });

</script>
    <!-- PAGE LEVEL PLUGIN SCRIPTS -->
    <!--<script src=""></script>
    <script src="js/plugins/bootstrap-tokenfield/scrollspy.js"></script>
    <script src="js/plugins/bootstrap-tokenfield/affix.js"></script>
    <script src=""></script>-->

<script type="text/javascript">
$(window).load(function() {
     //loadScript();  // NB: parentheses
	 /*$('#target .component').each(function(){
		 alert($(this).attr('data-content'));;
	 });*/
});
</script>
  </body>
</html>
