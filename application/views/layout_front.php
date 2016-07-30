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

    <!-- PACE LOAD BAR PLUGIN - This creates the subtle load bar effect at the top of the page. -->
    <link href="<?php echo base_url(); ?>assets/css/plugins/pace/pace.css" rel="stylesheet">
    <script src="<?php echo base_url(); ?>assets/js/plugins/pace/pace.js"></script>

    <!-- GLOBAL STYLES - Include these on every page. -->
    <link href="<?php echo base_url(); ?>assets/css/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url(); ?>application/views/themes/default/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Roboto:400,300,700">
    <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Roboto+Slab:700">

    <link rel="stylesheet" href="<?php echo base_url(); ?>application/views/themes/default/css/style.css">
    <!-- THEME STYLES - Include these on every page. -->
    <!--<link href="<?php echo base_url(); ?>assets/css/style.css" rel="stylesheet">-->
	<link href="<?php echo base_url(); ?>assets/css/custom.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>application/views/themes/default/css/quiz.css" rel="stylesheet">
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
<?php $home_banner=0;if(isset($_GET['banner'])){$home_banner = $_GET['banner'];} ?>
<body class="<?php if($home_banner == 1) { echo 'home_banner';} ?>">
<?php $currentParent = $this->router->fetch_class();
$currentChild = $this->router->fetch_method();

$container_cls = "container";
if(($currentParent == "users" && $currentChild == "pricing") || ($currentParent == "index" && $currentChild == "index")){
	$container_cls = '';
}

if(($currentParent == "index" && $currentChild == "index") || ($currentParent == "cart" && $currentChild == "register_payment") || ($currentParent == "users" && $currentChild == "is_info") || ($currentParent == "users" && $currentChild == "login") || ($currentParent == "users" && $currentChild == "register_home")){ ?>
	<!-- Header -->
            <header class="" id="header">
                <div class="container">
                    <div class="row">
                        <div class="col-md-8 col-sm-6 col-xs-8">
                            <div class="logo">
                                <h1><a href="<?php echo base_url(); ?>admin">
                        <img src="<?php echo base_url(); ?>assets/img/quench.png" class="logo" style="margin: 0px 0px 0px 0px;" alt="">
                    </a></h1>
                    <!--<i class="fa fa-magic"></i> BizWizards-->
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-6 col-xs-4 text-right">
                            <div class="header-btn-group">

                            <?php $redirect	= $this->User_model->is_logged_in();
		if(!$redirect){ ?>
                                <a href="#" class="btn btn-primary" data-target="#loginModal" data-toggle="modal"><i class="fa fa-lock"></i> Log In</a>
                                <?php } else { ?>
                                <a href="<?php echo base_url().'users/logout';?>" class="btn btn-primary"><i class="fa fa-lock"></i> Logout</a>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </header>
            <!-- End header -->

            <div id="content">
    <div class="top"></div>
	        <div id="page-wrapper" class="<?php echo $container_cls; ?>" style="margin-left: auto; margin-right: auto; border: medium none; background: none repeat scroll 0% 0% rgb(255, 255, 255);">
<?php }else{ ?>
	<div id="content">
    <div class="top"></div>
	        <div id="page-wrapper" class="<?php echo $container_cls; ?>" style="margin-left: auto; margin-right: auto; border: medium none; background: none repeat scroll 0% 0% rgb(255, 255, 255);">
            <?php } ?>
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

<?php if(($currentParent == "index" && $currentChild == "index") || ($currentParent == "cart" && $currentChild == "register_payment") || ($currentParent == "cart" && $currentChild == "checkout") || ($currentParent == "users" && $currentChild == "is_info") || ($currentParent == "users" && $currentChild == "login") || ($currentParent == "users" && $currentChild == "register_home")){ ?>
	<!-- Footer -->
            <footer id="footer">
            <?php if(isset($orderform_details) && !empty($orderform_details)){
	//var_dump($orderform_details); exit(0);
	$bg_img = $orderform_details->footer_image;
	$src= base_url('uploads').'/'.$bg_img;
	$styleBg = 'background:url(\''.$src.'\') center top no-repeat;';
}
if(isset($styleBg)){
	echo '<div class="" style="background:#FFF;padding:20px 0;"><img src="'.$src.'" alt="" class="orderform_headerImg" style="display:table; margin: 0 auto;position: static;" /></div>';
} ?>
                <div class="container">
                    <div class="row">
                        <div class= "col-sm-12 text-center">
                            <div class="footer-note">
                                Copyright &copy; 2015 BuyQuench. All rights reserved. <a href="javascript:void(0)" data-toggle="modal" data-target="#privacy">Privacy policy</a> | <a href="javascript:void(0)" data-toggle="modal" data-target="#terms_use">Terms of Use</a>
                            </div>
                        </div>
                    </div>
                </div>
            </footer>
            <!-- End footer -->
<?php } ?>
    <!-- GLOBAL SCRIPTS -->
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <!-- jQuery UI added before Bootstrap on this page for no interference -->
    <script src="//code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/plugins/bootstrap/bootstrap.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/plugins/slimscroll/jquery.slimscroll.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/plugins/popupoverlay/jquery.popupoverlay.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/plugins/popupoverlay/defaults.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>application/views/themes/default/js/modernizr.min.js"></script>
    <!-- Logout Notification Box -->
    <div id="logout">
        <div class="logout-message">
            <!-- <img class="img-circle img-logout" src="img/profile-pic.jpg" alt=""> -->
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

    <!-- Privacy Modal -->
<div class="modal fade" id="privacy" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="privacyLabel">Privacy policy</h4>
      </div>
      <div class="modal-body">
        <p>We do not share personal information with third-parties nor do we store information we collect about your visit to this blog for use other than to analyze content performance through the use of cookies, which you can turn off at anytime by modifying your Internet browser's settings.</p>
        <br>
        <p>We are not responsible for the republishing of the content found on in questions or answers for other websites using services. We do not allow any media used without our permission. This privacy policy is subject to change without notice.</p>
      </div>
      <!--<div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>-->
    </div>
  </div>
</div>
 <!-- /#Privacy Modal -->

     <!-- Terms Modal -->
<div class="modal fade" id="terms_use" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="termsLabel">Terms of Use</h4>
      </div>
      <div class="modal-body">
        <p>All content provided on this website is for informational purposes only. The owner of this service makes no representations as to the accuracy or completeness of any information on this site or found by following any link on this site. The owner will not be liable for any errors or omissions in this information nor for the availability of this information. The owner will not be liable for any losses, injuries, or damages from the display or use of this information. These terms and conditions of use are subject to change at anytime and without notice</p>
      </div>
      <!--<div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>-->
    </div>
  </div>
</div>
 <!-- /#Terms Modal -->

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

    <script src="<?php echo base_url(); ?>application/views/themes/default/js/jquery.fitvids.js"></script>
	<script src="<?php echo base_url(); ?>application/views/themes/default/js/jquery.easing.1.3.min.js"></script>
    <script src="<?php echo base_url(); ?>application/views/themes/default/js/jquery.scrollto.js"></script>
    <script src="<?php echo base_url(); ?>application/views/themes/default/js/waypoints.js"></script>
    <script src="<?php echo base_url(); ?>application/views/themes/default/js/scripts.js"></script>

<script type="text/javascript">
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
