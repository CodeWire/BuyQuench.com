<style>
.description ul{list-style:none;}
.pricing-circle .plan li #standardModal{ color:#333333; text-align:left;}
.payment-errors{ color:#F00;}
#standardModal .modal-dialog {margin: 0 auto;max-width: 302px;}
.form-group.col-lg-8, .form-group.col-lg-4{ padding:0;}
fieldset{border:none; padding:0;}
</style>
<div class="col-lg-12">
<div class="page-title">
                            <h1>Prices
                                <small></small>
                                <?php $loggedin	= $this->User_model->is_logged_in();
								if(!$loggedin){ ?>
                                <a href="<?php echo base_url().'users/login'?>" class="pull-right">Login</a>
                                <?php } else { ?>
                                <a href="<?php echo base_url().'users/logout'?>" class="pull-right">Logout</a>
                                <?php } ?>
                            </h1>
                            <ol class="breadcrumb">
                                <li><i class="fa fa-dashboard"></i>  <a href="<?php echo base_url(); ?>">Home</a>
                                </li>
                                <li class="active">Price</li>
                            </ol>
                        </div>
<?php if(isset($price_details)){?>
                        <div class="row pricing-circle">
                        <?php foreach($price_details as $price_detail){ 
						if(isset($this->session->userdata ["cart_contents"]['coupon']) && $this->session->userdata ["cart_contents"]['coupon']){
			$coupon_details = $this->session->userdata ["cart_contents"]['coupon'];
			 $old_price = $price_detail->price;
							//if($coupon_details['id'] == $price_detail->id){
								if($coupon_details['type'] == 'fixed'){
									$price_detail->price = $price_detail->price - $coupon_details['amount'];
								} else {
									$price_detail->price = $price_detail->price - ($coupon_details['amount']/100 *$price_detail->price);
								}
							//}
						} else{
							$old_price = '';
						}
						?>
                            <div class="col-md-3">
                                <ul class="plan plan1 <?php if( $price_detail->featured == 1){ echo 'featured';} ?>">
                                    <li class="plan-name">
                                        <h3><?php echo $price_detail->name; ?></h3>
                                    </li>
                                    <li class="plan-price">
                                        <div>
                                            <span class="price"><sup>$</sup><?php echo number_format((float)round($price_detail->price,0),0); ?></span>
                                            <small><?php echo $price_detail->duration; ?></small>
                                        </div>
                                    </li>
                                    <?php if($old_price != ''){ ?>
                                    <li class="old_price">
                                    	Without Coupon: <span class="price" style="text-decoration:line-through;"><sup>$</sup><?php echo number_format((float)round($old_price,2),2); ?></span>
                                    </li>
                                    <?php } ?>
                                    <li class="description">
                                        <?php echo $price_detail->desc; ?>
                                    </li>
                                    <?php if($login){ ?>
                                    <li class="plan-action">
                                    <!--<form action="<?php echo base_url('cart/add_to_cart'); ?>" name="purchase" method="post">
                                    <input type="hidden" value="<?php echo $price_detail->id; ?>" name="price_id" />
                                        <input type="submit" class="btn <?php if( $price_detail->featured == 1){ echo ' btn-green ';} else { echo ' btn-default ';} ?> btn-md" value="Buy" />
                                    </form>-->
                                    <form action="<?php echo base_url('cart/payment').'?id='.$price_detail->id; ?>" method="post">
      <script src="https://button.stripe.com/v1/button.js" class="stripe-button"
        data-key="<?php echo $publishable_key; ?>"
        data-amount=<?php echo $price_detail->price * 100; ?>
        data-description=<?php echo $price_detail->name; ?>
        data-label="Buy"></script>
    </form>
    <!--<span class="payment-errors"></span>
    <form action="<?php echo base_url('cart/payment').'?id='.$price_detail->id; ?>" method="POST" id="payment-form">
        <div class="form-row">
            <label>Card Number</label>
                <input type="text" size="20" autocomplete="off" class="card-number" />
        </div>
        <div class="form-row">
            <label>CVC</label>
            <input type="text" size="4" autocomplete="off" class="card-cvc" />
        </div>
        <div class="form-row">
            <label>Expiration (MM/YYYY)</label>
            <input type="text" size="2" class="card-expiry-month"/>
            <span> / </span>
            <input type="text" size="4" class="card-expiry-year"/>
        </div>
        <button type="submit" class="submit-button">Buy!</button>
    </form>-->
                                    </li>
                                     <?php }else{ ?>
                                     <li class="plan-action">
                                        <!--<a class="btn <?php if( $price_detail->featured == 1){ echo ' btn-green ';} else { echo ' btn-default ';} ?> btn-md" href="<?php echo base_url('users/login').'?id='.$price_detail->id; ?>">Signup</a>-->
                                        <button data-target="#standardModal" onClick="submitted_pay_form(<?php echo $price_detail->id; ?>)" submitted_form_id="<?php echo $price_detail->id; ?>" data-toggle="modal" class="btn <?php if( $price_detail->featured == 1){ echo ' btn-green ';} else { echo ' btn-default ';} ?>">Buy</button>
                                    </li>
                                     <?php } ?>
                                </ul>
                            </div>
                            <!--/.col-md-3-->
                            <?php } ?>
                        </div>
                        <div class="modal fade" id="standardModal" tabindex="-1" role="dialog" aria-labelledby="standardModalLabel" aria-hidden="true">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
<button class="close" aria-hidden="true" data-dismiss="modal" type="button">×</button>
<h4 id="standardModalLabel" class="modal-title">Enter your details</h4>
</div>
<div class="modal-body">
<span class="payment-errors"></span>
 <form action="<?php echo base_url('cart/register_payment'); ?>" method="POST" id="payment-form">
		<div class="form-group">
            <label>Email</label>
                <input type="text" size="20" name="email" class="email form-control" />
        </div>
        <div class="form-group">
            <label>First Name</label>
                <input type="text" size="20" name="first_name" class="name form-control" />
        </div>
        <div class="form-group">
            <label>Last Name</label>
                <input type="text" size="20" name="last_name" class="name form-control" />
        </div>
        <div class="form-group">
            <label>Phone</label>
                <input type="text" size="20" name="phone" class="phone form-control" />
        </div>
        <div class="form-group">
            <label>Card Number</label>
                <input type="text" size="20" autocomplete="off" class="card-number form-control" />
        </div>
        <div class="form-inline clearfix">
        	<div class="form-group col-lg-8">
            <label style="display:block;">Expiration (MM/YYYY)</label>
            <input type="text" size="2" class="card-expiry-month form-control"/>
            <span> / </span>
            <input type="text" size="4" class="card-expiry-year form-control"/>
            </div>
            <div class="form-group col-lg-4">
            <label style="display:block;">CVC</label>
            <input type="text" size="4" autocomplete="off" class="card-cvc form-control" />
        </div>
        </div>
        </form>
        <!--<button type="submit" class="submit-button">Buy!</button>-->
<span class="payment-errors"></span>
</div>
<div class="modal-footer">
<button class="btn btn-default" data-dismiss="modal" type="button">Close</button>
<!--<button class="btn btn-green" type="button">Save changes</button>-->
<button type="button" onClick="placeOrder()" class="btn btn-green">Place order</button>
</div>

</div>
</div>
</div>
                        <!--/.pricing-circle-->
                        <?php //if($login){ 
						if(!isset($this->session->userdata ["cart_contents"]['coupon']) || (isset($this->session->userdata ["cart_contents"]['coupon']) && !($this->session->userdata ["cart_contents"]['coupon']))){ ?>
                        <div class="portlet portlet-default">
                            <div class="portlet-heading">
                                <div class="portlet-title">
                                    <h4>Enter Coupon</h4>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <div class="portlet-body">
                        <form role="form" action="<?php echo base_url('users/coupon'); ?>" method="post">
                        <div class="form-group">
                          <label for="coupon_name">Give your coupon code</label>
                          <input type="text" name="coupon_code" id="coupon_code" class="form-control" placeholder="Enter coupon code" />
                        </div>
                        <div class="form-group">
	                       <input type="submit" class="btn btn-primary" value="Save" />
                       </div>
                        </form>
                        </div>
                        </div>
                        <?php } else { ?>
							 <div class="portlet-body">
                        <form role="form" action="<?php echo base_url('users/removecoupon'); ?>" method="post">
                        <div class="form-group">
	                       <input type="submit" class="btn btn-primary" value="Remove Coupon" />
                       </div>
                        </form>
                        </div>
						<?php } //} ?>

<?php } else { 
echo 'There is no pricing available';
}?>
</div>
<script type="text/javascript">
function submitted_pay_form(id){
//$('#submitted_form_id').val(id);
$('#submitted_form_id').remove();
$('#payment-form').append('<input type="hidden" id="submitted_form_id" name="submitted_form_id" value="'+id+'" />');	
}
function placeOrder(){
	$('#payment-form').submit();
}
</script>