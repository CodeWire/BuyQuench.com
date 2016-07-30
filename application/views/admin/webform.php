<?php if(isset($webform_details)){
	$id = $webform_details[0]->id;
	$name = $webform_details[0]->name;
	$desc = $webform_details[0]->desc;
	$form = $webform_details[0]->form;
	$tag_category = $webform_details[0]->tag_category;
	$tags = $webform_details[0]->tags;
	$formImage = $webform_details[0]->icon;
	$active = $webform_details[0]->active;
} else {$id='';$name = '';$desc='';$form='';$active=1; $tag_category = ''; $tags=''; $formImage='';} ?>
<style>
.web_form .col-lg-12, .web_form .col-lg-6{position:static;}
.web_form .form-horizontal .radio, .web_form .form-horizontal .checkbox{min-height:20px;}
textarea {display: block;width: 100%;height: 34px;padding: 6px 12px;font-size: 14px;line-height: 1.428571429;color: #555;background-color: #fff;background-image: none;border: 1px solid #ccc;border-radius: 4px;-webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075);box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075);-webkit-transition: border-color ease-in-out .15s, box-shadow ease-in-out .15s;transition: border-color ease-in-out .15s, box-shadow ease-in-out .15s;}textarea:focus {border-color: #66afe9;outline: 0;-webkit-box-shadow: inset 0 1px 1px rgba(0,0,0,.075), 0 0 8px rgba(102, 175, 233, .6);box-shadow: inset 0 1px 1px rgba(0,0,0,.075), 0 0 8px rgba(102, 175, 233, .6);}
textarea{height:auto;}
.component{margin-bottom: 15px;}
.nav-pills {background-color: #ECF0F1;}
</style>
<div class="web_form">
 <div class="row">
                    <div class="col-lg-12">
                        <div class="page-title">
                            <h1>Web Form
                                <small></small>
                            </h1>
                            <ol class="breadcrumb">
                                <li><i class="fa fa-dashboard"></i>  <a href="<?php echo base_url(); ?>">Home</a>
                                </li>
                                <li class="active">Web Form</li>
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
                                            <h4>Web Form</h4>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                    <div class="portlet-body">
                                    <div class="form-group">
										  <label for="webform_name">Name</label>
                                         <input type="text" value="<?php echo $name;?>" name="webform_uname" placeholder="Enter Name" id="webform_uname" class="form-control">
									   </div>
                                   <div class="form-group">
										  <label for="webform_desc">Description</label>
										  <textarea name="webform_desc" class="form-control" id="webform_desc"><?php echo $desc;?></textarea>
									   </div>
                                       <div class="form-group">
                                       <label for="webform_icon">Form Image</label>
                                       <?php if($formImage != ''){
										   echo '<div class="form_icon"><img src="'.base_url('uploads').'/'.$formImage.'" alt="'.$formImage.'" /></div>';
									   }?>
                                       <div id="my-dropzone1" class="dropzone"></div>
                                        <input type="hidden" class="uploaded_img" name="uploaded_img1" value="<?php echo $formImage; ?>" />
                                        </div>
                                  <div class="form-group">
										  <input type="checkbox" id="webform_active" <?php if($active){echo 'checked = "checked"';};?> value="<?php echo $active;?>" name="webform_active">Make the form to active
									   </div>
                                       <input type="hidden" value="<?php echo $id;?>" class="" name="webform_id" id="webform_id">
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
            <a class="btn btn-primary pull-right" onClick="savewebform()" style="margin-top:15px">Save</a>
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
            </ul>
            <form class="form-horizontal" id="components" style="clear:both;">
              <fieldset>
                <div class="tab-content">
                  <!-- Tabs of snippets go here -->
                </div>
              </fieldset>
            </form>
            <div class="tab-content2" style="clear:both;">
                <div class="tab-pane" id="tagsinput" style="display:none;"><label>Category</label><select class="form-control" id="tagCategory" name="tag_category"><?php foreach($ISTags as $ISTag){ 
				if($tag_category == $ISTag['value']){
					$selectedCat = 'selected = "selected"';
				} else {
					$selectedCat = '';
				}
				echo '<option '.$selectedCat.' value="'.$ISTag['value'].'">'.$ISTag['label'].'</option>'; } ?></select><label>Form Tags</label><input type="text" class="form-control" id="tokenfield-typeahead" value="<?php echo $tags; ?>" placeholder="Start typing!" /></div>
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
function savewebform(){
	var url_form = "<?php echo base_url(); ?>admin/webform/save_form";
			 var dataval = '';
			 var activeCheck;
			if($("#webform_active").is(':checked')){
			 	activeCheck = '&webform_active='+1;
			} else {
				activeCheck = '';
			}
			var icon = $('.uploaded_img').val();
			var tags = $('#tokenfield-typeahead').val();
			var tagCategory = $('#tagCategory').val();
			 dataval = '&rendered_form='+$('#render').val()+'&webform_uname='+$('#webform_uname').val()+'&webform_desc='+$('#webform_desc').val()+activeCheck+'&webform_id='+$('#webform_id').val()+'&icon='+icon+'&tagCategory='+tagCategory+'&tags='+tags;
 	$.ajax({
	type: "POST",
	url: url_form,
	data: dataval,
	success: function( msg ) {
		$('#save_msg').html(msg);
	}
	});
}
</script>