<!DOCTYPE html>
<html lang="en">
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

    <!-- GLOBAL STYLES - Include these on every page. -->
    <link href="<?php echo base_url(); ?>assets/css/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href='//fonts.googleapis.com/css?family=Ubuntu:300,400,500,700,300italic,400italic,500italic,700italic' rel="stylesheet" type="text/css">
    <link href='//fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel="stylesheet" type="text/css">
    <link href="<?php echo base_url(); ?>assets/icons/font-awesome/css/font-awesome.min.css" rel="stylesheet">

    <!-- PAGE LEVEL PLUGIN STYLES -->
    <link href="<?php echo base_url(); ?>assets/css/plugins/bootstrap-timepicker/bootstrap-timepicker.min.css" rel="stylesheet">
    <link href="//code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" type="text/css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/css/plugins/bootstrap-tokenfield/tokenfield-typeahead.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/css/plugins/bootstrap-tokenfield/bootstrap-tokenfield.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/css/plugins/bootstrap-datepicker/datepicker3.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/css/animate.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/css/normalize.css" rel="stylesheet">

    <!-- THEME STYLES - Include these on every page. -->
    <link href="<?php echo base_url(); ?>assets/css/style.css" rel="stylesheet">
    <!--<link href="<?php echo base_url(); ?>assets/css/plugins.css" rel="stylesheet">
	<link href="<?php echo base_url(); ?>assets/css/plugins/dropzone/css/dropzone.css" rel="stylesheet">
	<link href="<?php echo base_url(); ?>assets/css/prettify.css" rel="stylesheet">-->
	<link href="<?php echo base_url(); ?>assets/css/custom.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/css/quiz.css" rel="stylesheet">
    <?php if(isset($theme) && $theme != ''){ ?>
    <link href="<?php echo base_url(); ?>application/views/themes/<?php echo $theme; ?>/assets/theme.css" rel="stylesheet">
	<?php } ?>
    <!--[if lt IE 9]>
      <script src="js/html5shiv.js"></script>
      <script src="js/respond.min.js"></script>
    <![endif]-->
    <style>
	#page-wrapper{min-height:300px; background:none !important;}
	</style>
</head>
<body>
	<div id="header">
	<?php 
	//if(isset($this->session->userdata ["cart_contents"]['customer']) && $this->session->userdata ["cart_contents"]['customer']){
		$redirect	= $this->User_model->is_logged_in();
 		if ($redirect)
		{
		// $this->load->view('admin/navtop');
	}?>
	<?php // $this->load->view('admin/navside'); ?>
	</div>

	<div id="content">
    <div class="top"></div>
	        <div id="page-wrapper" class="container" style="margin-left: auto; margin-right: auto; border: medium none; background: none repeat scroll 0% 0% rgb(255, 255, 255);">
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
    <?php if(isset($orderform_details) && !empty($orderform_details)){
	//var_dump($orderform_details); exit(0);
	$bg_img = $orderform_details->footer_image;
	$src= base_url('uploads').'/'.$bg_img;
	$styleBg = 'background:url(\''.$src.'\') center top no-repeat;';
} 
if(isset($styleBg)){
	echo '<div class="" style="background:#FFF;padding:20px 0;"><img src="'.$src.'" alt="" class="orderform_headerImg" style="display:table; margin: 0 auto;position: static;" /></div>';
} ?>
	</div>
    <!-- GLOBAL SCRIPTS -->
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <!-- jQuery UI added before Bootstrap on this page for no interference -->
    <script src="//code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/plugins/bootstrap/bootstrap.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/plugins/slimscroll/jquery.slimscroll.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/plugins/popupoverlay/jquery.popupoverlay.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/plugins/popupoverlay/defaults.js"></script>
    <?php $currentParent = $this->router->fetch_class();
$currentChild = $this->router->fetch_method(); ?>
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
    <script type="text/javascript">var tagInputtext = '';</script>
    <script src="<?php echo base_url(); ?>assets/js/demo/advanced-form-demo.js"></script>
	<script src="<?php echo base_url(); ?>assets/js/jquery.bootstrap.wizard.js"></script>
	<script src="<?php echo base_url(); ?>assets/js/prettify.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/plugins/validate/jquery.validate.min.js"></script>
    <!-- flex slider -->
<!--<link type="text/css" href="<?php echo base_url('assets/css/flexslider.css');?>" rel="stylesheet" />
<script type="text/javascript" src="<?php echo base_url('assets/js/flex/flexslider.js') ?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/js/flex/shCore.js') ?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/js/flex/shBrushXml.js') ?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/js/flex/shBrushJScript.js') ?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/js/flex/jquery.mousewheel.js') ?>"></script>-->
<script type="text/javascript">
//Dropzone.autoDiscover = false;
/*$(window).load(function(){
$('.flexbannerslider').flexslider({
        animation: "slide",
		controlNav: 0,
		pauseOnHover: 0,
        animationLoop: 0,
		slideshow: 0,
		direction: "horizontal",
		reverse: 0,
		slideshowSpeed: 3000,
		animationSpeed: 600,
		smoothHeight: 0,
		start: function(slider){
          $('body').removeClass('loading');
        }
	  });
});*/
                $(document).ready(function() 
                {
					        <?php if(($currentParent == 'users' && $currentChild == 'pricing')){?>
							var formaction = $('.modal form.form-horizontal').attr('action');
							if(typeof formaction === 'undefined'){
								$('.modal form.form-horizontal').attr('action','<?php echo base_url('cart/register_payment'); ?>');
								$('.modal form.form-horizontal').attr('id','payment-form');
								$('.modal form.form-horizontal').attr('method','post');
								$('#card-expiry-year').addClass('card-expiry-year');
								$('#card-expiry-month').addClass('card-expiry-month');
								$('#card-cvc').addClass('card-cvc');
								$('#card-number').addClass('card-number');
								$('#Email').addClass('email');
							}
							<?php }?>

				//$("div#myId").dropzone({ url: "/file/post" });
					 $('#rootwizard').bootstrapWizard({onTabShow: function(tab, navigation, index) {
var $total = navigation.find('li').length;
var $current = index+1;
var $percent = ($current/$total) * 100;
$('#rootwizard').find('.bar').css({width:$percent+'%'});
}});
/*var $total_cat_img = $('.category_images').find('li').length;
$('.category_images li').css('width', 100/$total_cat_img+'%');*/
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
  	<script type="text/javascript" src="https://js.stripe.com/v1/"></script>
    <script type="text/javascript">
    // this identifies your website in the createToken call below
	<?php $ci =& get_instance();
		$ci->config->load('stripe', true);
		$config = $ci->config->item('stripe'); ?>
		<?php if(isset($orderform_details) && $orderform_details->merchant){
			$merchantDetails = json_decode($orderform_details->merchant);
			?>
		Stripe.setPublishableKey("<?php echo $merchantDetails->stripe_publishable_key; ?>");
		<?php } else {?>
    Stripe.setPublishableKey("<?php echo $config['publishable_key']; ?>");
	<?php } ?>

    function stripeResponseHandler(status, response) {
    	if (response.error) {
            // re-enable the submit button
            $('.submit-button').removeAttr("disabled");
            // show the errors on the form
            $(".payment-errors").html(response.error.message);
        } else {
            var form$ = $("#payment-form");
            // token contains id, last4, and card type
            var token = response['id'];
            // insert the token into the form so it gets submitted to the server
            form$.append("<input type='hidden' name='stripeToken' value='" + token + "' />");
                    // and submit
            form$.get(0).submit();
        }
    }

    $(document).ready(function() {
		var tagtxt;
		tagtxt = $("#tagsInput").val();
		<?php if(isset($_GET['id'])){ ?>
		$('.order_form_details form').attr('method','POST').attr('action','<?php echo base_url('cart/post_checkout');?>').attr('id','payment-form').append('<input type="hidden" name="quiz_cat" id="quiz_cat" value="<?php echo $_GET['id']; ?>"><input type="hidden" value="'+tagtxt+'" name="tags">');
		$('#card_expiry_month').addClass('card-expiry-month');
		$('#card_expiry_year').addClass('card-expiry-year');
		$('#card_cvc').addClass('card-cvc');
		$('#card_number').addClass('card-number').attr('onkeypress','return  check16digit(event);');;
		
		$('#cardType').parent().parent().addClass('cart_type_group');
		$('#card_expiry_month').parent().parent().addClass('cart_month_group');
		$('#card_expiry_year').parent().parent().addClass('cart_year_group');
		$('#card_cvc').parent().parent().addClass('cart_cvc_group');
		$('#card_number').parent().parent().addClass('cart_num_group');
		
		var orderform_price = $('#orderform_price').val();
	jQuery('.gform_wrapper_2').append('<form id="payment-form" class="form-inline" method="POST" action="<?php echo base_url('cart/post_checkout');?>"><div class="billing_container clearfix"><div class="selc_header">Billing Information</div><div class="grid_left col-lg-6" style=""><div class="billing_info col-lg-12 padd_bot15"></div></div><div class="make_one_time col-lg-6"><div class="orderSummary"><table class="tabular"><tbody><tr><th class="leftAlign pro_con" colspan="2"> <h4>How to be a power connector</h4> </th><th class="rightAlign"></th></tr><tr><td class="listCell" rowspan="2"><img class="" src="<?php echo base_url().'/assets/img/product.png'; ?>" alt="product" style="max-width: 87px; padding:0;" /></td><td class="rightAlign" colspan="2">5 + 50 + 100 RULE for turrning your business into profits<br><br>How to Be a Power Connector brings together real-world examples from a variety of power connectors in multiple industries, helping you replicate and apply the critical connection skills that will get you results.</td></tr><tr><td class="subtotal bor_top  bor_right"><span class="totalPrice">SUBTOTAL</span></td><td class="subtotal bor_top"><span class="alignCentertable tot_price"><span class="price_sym" style="padding-left: 10px;">$</span><span class="change_price">'+orderform_price+'</span></span><input type="hidden" value="25.00" id="totalPriceAmt" name="totalPriceAmt" class="no_bor checkoutShortest numfld" readonly=""></td></tr></tbody></table></div><div class="form-inline clear bor_full mar_top15"><div class="lock_img"> <h4>Secure credit card payment</h4> <p>This is secure 128-bit SSL encrypted payment.</p></div><div class="form-group"><span class="payment-errors"></span></div><div class="checkout_options_filed"></div></div></div></div><input type="hidden" name="quiz_cat" id="quiz_cat" value="<?php echo $_GET['win_id']; ?>"><input type="hidden" name="orderform" id="orderform" value="<?php echo $_GET['id']; ?>"><input type="hidden" value="'+tagtxt+'" name="tags"></form>');

var billOdd = 1, clearCls;
$('#payment-form .control-group').each(function(index, element) {
	var className =  $(this).children('.controls').children().attr('id');
    if($(this).hasClass('cart_type_group') || $(this).hasClass('cart_month_group') || $(this).hasClass('cart_year_group') || $(this).hasClass('cart_cvc_group') || $(this).hasClass('cart_num_group')){
		$('.checkout_options_filed').append('<div class="control-group cls'+className+'">'+$(this).html()+'</div>');
	} else {
		if(billOdd == 1){ clearCls = 'clear';billOdd=0} else { clearCls = '';billOdd=1;}
		$('.billing_info').append('<div class="form-group '+clearCls+' col-lg-6 cls'+className+'">'+$(this).html()+'</div>');
	}
	$(this).remove();
	<?php $getAllParams = $_GET;
	foreach($getAllParams as $key=>$getAllParam){?>
		$('#<?php echo $key; ?>').val('<?php echo $getAllParam; ?>');
	<?php } ?>
});

validateOrderForm();

$('.loaded_form').remove();
		
		<?php } ?>
		
		$('.leadformcontainer .tags_button').on('click',function(){
			nextSlider();
		});
		
        $("#payment-form").submit(function(event) {
            // disable the submit button to prevent repeated clicks
            $('.submit-button').attr("disabled", "disabled");
            // createToken returns immediately - the supplied callback submits the form if there are no errors
            Stripe.createToken({
                number: $('.card-number').val(),
                cvc: $('.card-cvc').val(),
                exp_month: $('.card-expiry-month').val(),
                exp_year: $('.card-expiry-year').val()
            }, stripeResponseHandler);
            return false; // submit from callback
        });
    });

    </script>
<script type="text/javascript">
function validateOrderForm(){

}
</script>
</body>
</html>