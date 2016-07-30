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
    <script src="<?php echo base_url(); ?>assets/js/demo/advanced-form-demo.js"></script>
	<script src="<?php echo base_url(); ?>assets/js/jquery.bootstrap.wizard.js"></script>
	<script src="<?php echo base_url(); ?>assets/js/prettify.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/plugins/datatables/jquery.dataTables.js"></script>
    <script data-main="<?php echo base_url(); ?>assets/js/main-built_no_min.js" src="<?php echo base_url(); ?>assets/js/lib/require.js" ></script>
    
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
//Dropzone.autoDiscover = false;
                $(document).ready(function() 
                {
					$('#example').dataTable( {
					"bProcessing": true,
					"bServerSide": true,
					"sAjaxSource": "<?php echo base_url();?>admin/questions/get_quiz",
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
<script type="text/javascript">
/*$(window).load(function() {
     //loadScript();  // NB: parentheses
	 $('#target .component').each(function(){
		 alert($(this).attr('data-content'));;
	 });
})*/
</script>
  </body>
</html>
