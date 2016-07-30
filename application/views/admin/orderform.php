<?php if(isset($orderform_details)){
	$id = $orderform_details[0]->id;
	$name = $orderform_details[0]->name;
	$desc = $orderform_details[0]->desc;
	$form = $orderform_details[0]->form;
	$tags = $orderform_details[0]->tags;
	$tag_category = $orderform_details[0]->tag_category;
	$active = $orderform_details[0]->active;
	$price = $orderform_details[0]->price;
	$merchant = json_decode($orderform_details[0]->merchant);
	$thank_url = $orderform_details[0]->thank_url;
	$formImageHeader = $orderform_details[0]->header_image;
	$formImageFooter = $orderform_details[0]->footer_image;
} else {$id='';$name = '';$desc='';$form='';$tags = ''; $tag_category = ''; $active=1; $price= '';$merchant = '';$thank_url = ''; $formImageFooter = '';$formImageHeader='';} ?>
<style>
.order_form .col-lg-12, .order_form .col-lg-6{position:static;}
.order_form .form-horizontal .radio, .order_form .form-horizontal .checkbox{min-height:20px;}
.textarea {display: block;width: 100%;height: 34px;padding: 6px 12px;font-size: 14px;line-height: 1.428571429;color:#555; background-color: #fff;background-image: none;border: 1px solid #ccc;border-radius: 4px;-webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075);box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075);-webkit-transition: border-color ease-in-out .15s, box-shadow ease-in-out .15s;transition: border-color ease-in-out .15s, box-shadow ease-in-out .15s;}textarea:focus {border-color: #66afe9;outline: 0;-webkit-box-shadow: inset 0 1px 1px rgba(0,0,0,.075), 0 0 8px rgba(102, 175, 233, .6);box-shadow: inset 0 1px 1px rgba(0,0,0,.075), 0 0 8px rgba(102, 175, 233, .6);}
textarea{height:auto;}
.component{margin-bottom: 15px;}
.tags_popup .tagGroup_id , .tagGroup_buttontype, .tagGroup_buttonlabel, .tab_tags{display:none;}
.nav-pills {background-color: #ECF0F1;}
.tokenfield.form-control{width:90% !important;}
.tab-content2{clear:both;}
.inner_fields{max-height: 200px;overflow-x: hidden;overflow-y: auto; margin-bottom:15px;margin-left: 500px; height:0;position: absolute; top:0; display:none;}
.show .inner_fields{height:auto; display:block;position: relative;}
.show a.inner_fields{margin-bottom: 0px; margin-top: -20px;}
.ISFields{overflow:hidden;margin-top: 15px;}
.order_form .nav > li > a{padding: 10px 8px;}
.form_icon img{max-width:100%;}
</style>
<div class="order_form">
 <div class="row">
                    <div class="col-lg-12">
                        <div class="page-title">
                            <h1>Order Form
                                <small></small>
                            </h1>
                            <ol class="breadcrumb">
                                <li><i class="fa fa-dashboard"></i>  <a href="<?php echo base_url(); ?>">Home</a>
                                </li>
                                <li class="active">Order form</li>
                            </ol>
                        </div>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
				<div class="row">

                    <div class="col-lg-12">
<!-- /* Form -->
                                <div class="portlet portlet-default">
                                    <div class="portlet-heading">
                                        <div class="portlet-title">
                                            <h4>Order Form</h4>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                    <div class="portlet-body">
                                    <div class="form-group">
										  <label for="orderform_name">Name</label>
                                         <input type="text" value="<?php echo $name;?>" name="orderform_uname" placeholder="Enter Name" id="orderform_uname" class="form-control">
									   </div>
                                   <div class="form-group">
										  <label>Description</label>
										  <textarea name="orderform_desc" class="form-control" id="orderform_desc"><?php echo $desc;?></textarea>
									   </div>
                                   <div class="form-group">
                                       <label for="webform_icon">Form Header Image</label>
                                       <?php if($formImageHeader != ''){
										   echo '<div class="form_icon"><img src="'.base_url('uploads').'/'.$formImageHeader.'" alt="'.$formImageHeader.'" /></div>';
									   }?>
                                       <div id="my-dropzone1" class="dropzone"></div>
                                        <input type="hidden" class="uploaded_img" id="uploaded_img1" name="uploaded_img1" value="<?php echo $formImageHeader; ?>" />
                                        </div>
                                    <div class="form-group">
                                       <label for="webform_icon">Form Footer Image</label>
                                       <?php if($formImageFooter != ''){
										   echo '<div class="form_icon"><img src="'.base_url('uploads').'/'.$formImageFooter.'" alt="'.$formImageFooter.'" /></div>';
									   }?>
                                       <div id="my-dropzone2" class="dropzone"></div>
                                        <input type="hidden" class="uploaded_img" id="uploaded_img2" name="uploaded_img2" value="<?php echo $formImageFooter; ?>" />
                                        </div>
                                   <div class="form-group">
                                      <label>Price</label>
                                      <input type="text" name="orderform_price" class="form-control" id="orderform_price" value="<?php echo $price;?>">
                                   </div>
                                  <div class="form-group">
										  <input type="checkbox" id="orderform_active" <?php if($active){echo 'checked = "checked"';};?> value="<?php echo $active;?>" name="orderform_active">Make the form to active
									   </div>
                                       <input type="hidden" value="<?php echo $id;?>" class="" name="orderform_id" id="orderform_id">
  <div class="row clearfix">
        <!-- Building Form. -->
        <div class="col-lg-6">
          <div class="clearfix">
            <h3>Your Form</h3>
            <div id="build">
              <form id="target" class="form-horizontal">
              </form>
            </div>
            <span id="save_msg"></span>
            <a class="btn btn-primary pull-right" onClick="saveOrderForm()" style="margin-top:15px">Save</a>
          </div>
        </div>
        <!-- / Building Form. -->
        <!-- Components -->
        <div class="col-lg-6">
          <h3>Drag & Drop components</h3>
          <div class="tabbable">
            <ul class="nav nav-pills" id="formtabs" style="float:left;">
              <!-- Tab nav -->
            </ul>
            <ul class="nav nav-pills" id="formtab2" style="float:left;">
              <li class="tab_tagsinput"><a data-toggle="tab" href="#tagsinput">Tags</a></li>
              <li class="tab_tagsinput"><a data-toggle="tab" href="#merchants">Merchants</a></li>
              <li class="tab_tagsinput"><a data-toggle="tab" href="#thankyou">Thank you</a></li>
            </ul>
            <form class="form-horizontal" id="components" style="clear:both;">
              <fieldset>
                <div class="tab-content">
                  <!-- Tabs of snippets go here -->
                  <!--<div class="tab-pane" id="tags">
                  		<div class="form-group">
            <label>Form Tags</label>
              <input type="text" class="form-control" id="tokenfield-typeahead" value="red,green,blue" placeholder="Start typing!" />
             </div>
                  </div>-->
                </div>
                
              </fieldset>
            </form>
            
            <div class="tab-content2">
                <div class="tab-pane" id="tagsinput" style="display:none;"><!--<label>Category</label><select class="form-control" id="tagCategory" name="tag_category"><?php foreach($ISTags as $ISTag){ 
				if($tag_category == $ISTag['value']){
					$selectedCat = 'selected = "selected"';
				} else {
					$selectedCat = '';
				}
				echo '<option '.$selectedCat.' value="'.$ISTag['value'].'">'.$ISTag['label'].'</option>'; } ?></select>--><label>Form Tags</label><input type="text" class="form-control" id="tokenfield-typeahead" value="<?php echo $tags; ?>" placeholder="Start typing!" /></div>
                <div class="tab-pane" id="merchants" style="display:none;">
                <div class="form-group"><select class="form-control" id="selectedAccount" onChange="selectedAccount(this)"><option value="">Add Merchant Account</option><option <?php if(isset($merchant->paymethod) && $merchant->paymethod=='authorize'){ echo 'selected="selected"';} ?> value="authorize">Authorize.NET</option><option <?php if(isset($merchant->paymethod) && $merchant->paymethod=='paypal'){ echo 'selected="selected"';} ?> value="paypal">PayPal</option>
                <option <?php if(isset($merchant->paymethod) && $merchant->paymethod=='stripe'){ echo 'selected="selected"';} ?> value="stripe">Stripe</option></select></div>
                <div class="merchant_account">
                <form action="<?php echo base_url().'admin/orderform/merchant';?>" method="post" id="authorize_form">
                	<div id="authorize" class="payment_method" style=" <?php if(!isset($merchant->paymethod) ||$merchant->paymethod!='authorize'){ echo 'display:none;';} ?> ">
                   			<div class="form-group">
                              <label>Name</label>
                              <input type="text" name="authorize_name" class="form-control" id="authorize_name" value="<?php if(isset($merchant->authorize_name)){echo $merchant->authorize_name;}?>">
                           </div>
                           <div class="form-group">
                              <label>Login ID</label>
                              <input type="text" name="authorize_login_id" class="form-control" id="authorize_login_id" value="<?php if(isset($merchant->authorize_login_id)){echo $merchant->authorize_login_id;}?>">
                           </div>
                           <div class="form-group">
                              <label>Transaction Key</label>
                              <input type="text" name="authorize_transation_key" class="form-control" id="authorize_transation_key" value="<?php if(isset($merchant->authorize_transation_key)){echo $merchant->authorize_transation_key;}?>">
                           </div>
                           <div class="form-group">
                              <label>Account Limit</label>
                              <input type="text" name="authorize_account_limit" class="form-control" id="authorize_account_limit" value="<?php if(isset($merchant->authorize_account_limit)){echo $merchant->authorize_account_limit;}?>">
                           </div>
                           <div class="form-group">
                              <label>Test Mode</label>
                              <select class="form-control" name="test_mode"><option <?php if(isset($merchant->test_mode)){ if($merchant->test_mode == 'test'){ echo 'selected="selected"';}}?> value="test">Test Mode</option><option <?php if(isset($merchant->test_mode)){ if($merchant->test_mode == 'live'){ echo 'selected="selected"';}}?> value="live">Live</option></select>
                           </div>
                           <div class="form-group">
                              <label>Send Transaction Email</label>
                              <div class="radio"><input type="radio" <?php if(isset($merchant->authorize_send_transaction_email)){ if($merchant->authorize_send_transaction_email == '1'){ echo 'checked="checked"';}}?> name="authorize_send_transaction_email" class="form-control" value="1">Yes</div>
                              <div class="radio"><input type="radio" <?php if(isset($merchant->authorize_send_transaction_email)){ if($merchant->authorize_send_transaction_email == '0'){ echo 'checked="checked"';}}?> name="authorize_send_transaction_email" class="form-control" value="0">No</div>
                           </div>
                           <div class="form-group">
                           		<input type="button" class="btn btn-primary" name="save_merchant" onClick="savePaymentForm('authorize_form');" value="Save" />
                           </div>
                    </div>
                </form>
                <form action="<?php echo base_url().'admin/orderform/merchant';?>" method="post" id="paypal_form">
                    <div id="paypal" class="payment_method" style=" <?php if(!isset($merchant->paymethod) || $merchant->paymethod!='paypal'){ echo 'display:none;';} ?> ">
                   			<div class="form-group">
                              <label>Name</label>
                              <input type="text" name="paypal_name" class="form-control" id="paypal_name" value="<?php if(isset($merchant->paypal_name)){echo $merchant->paypal_name;}?>">
                           </div>
                           <div class="form-group">
                              <label>User</label>
                              <input type="text" name="paypal_user" class="form-control" id="paypal_user" value="<?php if(isset($merchant->paypal_name)){echo $merchant->paypal_name;}?>">
                           </div>
                           <div class="form-group">
                              <label>Vendor</label>
                              <input type="text" name="paypal_vendor" class="form-control" id="paypal_vendor" value="<?php if(isset($merchant->paypal_vendor)){echo $merchant->paypal_vendor;}?>">
                           </div>
                           <div class="form-group">
                              <label>Partner</label>
                              <input type="text" name="paypal_partner" class="form-control" id="paypal_partner" value="<?php if(isset($merchant->paypal_partner)){echo $merchant->paypal_partner;}?>">
                           </div>
                           <div class="form-group">
                              <label>Password</label>
                              <input type="password" name="paypal_password" class="form-control" value="<?php if(isset($merchant->paypal_password)){echo $merchant->paypal_password;}?>" />
                           </div>
                           <div class="form-group">
                              <label>Account limit</label>
                              <input type="text" name="paypal_account_limit" class="form-control" id="paypal_account_limit" value="<?php if(isset($merchant->paypal_account_limit)){echo $merchant->paypal_account_limit;}?>">
                           </div>
                           <div class="form-group">
                              <label>Currency</label>
                              <select class="form-control" name="currency"><option <?php if(isset($merchant->currency)){ if($merchant->currency == 'doller'){ echo 'selected="selected"';}}?> value="doller">Doller</option><option <?php if(isset($merchant->currency)){ if($merchant->currency == 'euro'){ echo 'selected="selected"';}}?> value="euro">Euro</option></select>
                           </div>
                           <div class="form-group">
                              <label>Test Mode</label>
                              <select class="form-control" name="test_mode"><option <?php if(isset($merchant->test_mode)){ if($merchant->test_mode == 'test'){ echo 'selected="selected"';}}?> value="test">Test Mode</option><option <?php if(isset($merchant->test_mode)){ if($merchant->test_mode == 'live'){ echo 'selected="selected"';}}?> value="live">Live</option></select>
                           </div>
                           <div class="form-group">
                           		<input type="button" class="btn btn-primary" name="save_merchant" onClick="savePaymentForm('paypal_form');" value="Save" />
                           </div>
                    </div>
                </form>
                <form action="<?php echo base_url().'admin/orderform/merchant';?>" method="post" id="stripe_form">
                    <div id="stripe" class="payment_method" style=" <?php if(!isset($merchant->paymethod) || $merchant->paymethod!='stripe'){ echo 'display:none;';} ?> ">
                   			<div class="form-group">
                              <label>Name</label>
                              <input type="text" name="stripe_name" class="form-control" id="stripe_name" value="<?php if(isset($merchant->stripe_name)){echo $merchant->stripe_name;}?>">
                           </div>
                           <div class="form-group">
                              <label>Secret Key</label>
                              <input type="text" name="stripe_secret_key" class="form-control" id="stripe_secret_key" value="<?php if(isset($merchant->stripe_secret_key)){echo $merchant->stripe_secret_key;}?>">
                           </div>
                           <div class="form-group">
                              <label>Publishable Key</label>
                              <input type="text" name="stripe_publishable_key" class="form-control" id="stripe_publishable_key" value="<?php if(isset($merchant->stripe_publishable_key)){echo $merchant->stripe_publishable_key;}?>">
                           </div>
                           <div class="form-group">
                              <label>Currency</label>
                              <select class="form-control" name="currency"><option <?php if(isset($merchant->currency)){ if($merchant->currency == 'usd'){ echo 'selected="selected"';}}?> value="doller">USD</option><option <?php if(isset($merchant->currency)){ if($merchant->currency == 'euro'){ echo 'selected="selected"';}}?> value="euro">Euro</option></select>                              
                           </div>
                           <div class="form-group">
                              <label>Test Mode</label>
                              <select class="form-control" name="test_mode"><option <?php if(isset($merchant->test_mode)){ if($merchant->test_mode == 'test'){ echo 'selected="selected"';}}?> value="test">Test Mode</option><option <?php if(isset($merchant->test_mode)){ if($merchant->test_mode == 'live'){ echo 'selected="selected"';}}?> value="live">Live</option></select>
                           </div>
                           <div class="form-group">
                           		<input type="button" class="btn btn-primary" name="save_merchant" onClick="savePaymentForm('stripe_form');" value="Save" />
                           </div>
                    </div>
                </form>
                <div class="payment_update_txt"></div>
                </div>
                </div>
                <div class="tab-pane" id="thankyou" style="display:none;">
                <input type="text" id="thankyouurl" value="<?php echo $thank_url; ?>" class="form-control" />
	                <div class="ISFields">
                    	<ul class="fields_list">
                        	<li><a class="base_field" href="javascript:void(0)">Basic Fields</a>
                            	<a class="inner_fields" href="javascript:void(0)">Back</a>
                            	<ul class="inner_fields">
                                <?php foreach($ISCustomerFields as $key=>$ISCustomerField){
									echo '<li onClick="setCustomField(this)" id="'.$ISCustomerField.'" class="addtourl"><a href="javascript:void(0);">'.$ISCustomerField.'</a></li>';
								} ?>
                                </ul>
                            </li>
                            <li><a class="base_field" href="javascript:void(0)">Custom Fields</a>
                            <a class="inner_fields" href="javascript:void(0)">Back</a>
                            	<ul class="inner_fields">
                                <?php foreach($custom_fields as $key=>$custom_field){
									echo '<li onClick="setCustomField(this)" id="'.$key.'" class="addtourl"><a href="javascript:void(0);">'.$custom_field.'</a></li>';
								} ?>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <input type="button" class="btn btn-primary" name="save_merchant" onClick="saveThankUrl();" value="Save" />
                    <div class="thankurl_update_txt"></div>
                </div>
                </div>
          </div>
        </div>
        <!-- / Components -->
      </div>
                                    </div>
                                </div>
								<!-- Form */ -->
			        </div>
		      </div>
</div>
<script type="text/javascript">
function saveThankUrl(){
	var data='';
	var url = '<?php echo base_url().'admin/orderform/thankurl';?>';
	data += '&thankurl='+$('#thankyouurl').val()+'&orderform_id='+$('#orderform_id').val();
	$.ajax({
		type:"POST",
		url:url,
		data:data,
		success: function(data){
			$('#orderform_id').val(data);
			$('.thankurl_update_txt').html('<span class="has-success"><span class="help-block"><i class="fa fa-check"></i>saved Successfully</span></span>');
		}
	});
}
function savePaymentForm(form){
	var data = $('#'+form).serialize();
	var url = $('#'+form).attr('action');
	data += '&paymethod='+$('#selectedAccount').val()+'&orderform_id='+$('#orderform_id').val();
	$.ajax({
		type:"POST",
		url:url,
		data:data,
		success: function(data){
			$('#orderform_id').val(data);
			$('.payment_update_txt').html('<span class="has-success"><span class="help-block"><i class="fa fa-check"></i>saved Successfully</span></span>');
		}
	});
}
function setCustomField(e) {
    var el = $('#thankyouurl').get(0);
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
    var insertext = $(e).attr('id');
	var content = $('#thankyouurl').val();
	var newContent = content.substr(0, pos) + insertext +'={contact.'+insertext+'}'+ content.substr(pos);
$('#thankyouurl').val(newContent);
$('#thankyouurl').focus();
}
function saveOrderForm(){
	var url_form = "<?php echo base_url(); ?>admin/orderform/save_form";
			 var dataval = '';
			 var activeCheck, tagsvalues, tagCategory;
			 var uploaded_img1 = $('#uploaded_img1').val();
			 var uploaded_img2 = $('#uploaded_img2').val();
			if($("#orderform_active").is(':checked')){
			 	activeCheck = '&orderform_active='+1;
			} else {
				activeCheck = '';
			}
			tagvalues = $('#tokenfield-typeahead').val();
			tagCategory = $('#tagCategory').val();
			 dataval = '&rendered_form='+$('#render').val()+'&orderform_uname='+$('#orderform_uname').val()+'&orderform_desc='+$('#orderform_desc').val()+activeCheck+'&orderform_id='+$('#orderform_id').val()+'&orderform_price='+$('#orderform_price').val()+'&tagCategory='+tagCategory+'&tagvalues='+tagvalues+'&uploaded_img1='+uploaded_img1+'&uploaded_img2='+uploaded_img2;
 	$.ajax({
	type: "POST",
	url: url_form,
	data: dataval,
	success: function( msg ) {
		$('#orderform_id').val(msg);
		$('#save_msg').html('<span class="has-success"><span class="help-block"><i class="fa fa-check"></i>Form saved Successfully</span></span>');
	}
	});
}
function selectedAccount(e){
	$('.payment_method').hide();
	var selectedAccount = $(e).val();
	$('#'+selectedAccount).show();
}
</script>