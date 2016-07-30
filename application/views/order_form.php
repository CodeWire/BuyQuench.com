  <?php if(isset($orderform_details) && !empty($orderform_details)){
	//var_dump($orderform_details); exit(0);
	$bg_img = $orderform_details->header_image;
	$src= base_url('uploads').'/'.$bg_img;
	$styleBg = 'background:url(\''.$src.'\') center top no-repeat;';
} 
if(isset($styleBg)){
	echo '<img src="'.$src.'" alt="" class="orderform_headerImg" />';
} ?>
<style>
.tags_button{display:none;}
.payment-errors {color: #F00;}
.orderform_headerImg{position: absolute; left: 0px; top: 20px; max-width: 100%;}
.selc_header { text-transform: uppercase;} .control-label_no { color: #768082; font-family: open sans; font-size: 16px; font-weight: 400; }
.grid_left.col-lg-6 input, .grid_left.col-lg-6 select { border-color: #E3E4E8; border-radius: 4px; min-height: 45px; width: 100%;}
.viewCart ul{list-style:none; padding:0; margin:0;border-radius: 0 0 5px 5px;}
.viewCart ul li{padding:0;}
/*.tb1{ background:#43026a;margin: 0 -1px !important;}*/
.tb1 th{ background:#43026a;}
.tb1 li{ color:#FFF; font:"Gill Sans", "Gill Sans MT", "Myriad Pro", "DejaVu Sans Condensed", Helvetica, Arial, sans-serif 14px;}
.tb1 th.priceCol{background: none repeat scroll 0 0 #A27EAB;color: #43026A;border-radius: 0 5px 5px 0;}
.bor_right{border-right: 1px solid #E1E1E1;}
.bor_top{border-top: 1px solid #E1E1E1;}
.tb_padd{padding:10px 0% 10px 20px;}
.tb_padd2{padding:0px 0 0px 5px;}
.pro_con p{margin:0;}
.pro_con img{float:left; margin-right:10px;}
.pro_con h4{ font:21px "Gill Sans", "Gill Sans MT", "Myriad Pro", "DejaVu Sans Condensed", Helvetica, Arial, sans-serif; color:#43026a; margin:0;}
.tb_padd2 .pro_con {margin-left: 20px;}
.col-lg-3 .tb_padd2 .minCon{}
.totalPrice{display: block; text-align: right; padding-right: 20px; text-transform: uppercase; padding-top: 10px;}
.tot_price{display:block; padding-top: 10px;}
.viewCart {margin-top:16%;}
</style>
<div class="col-lg-12">
  <!--<div class="page-title">
    <h1>Checkout <small></small> </h1>
    <ol class="breadcrumb">
      <li><i class="fa fa-dashboard"></i> <a href="index.html">Home</a> </li>
      <li class="active">Checkout</li>
    </ol>
  </div>-->
  <?php $price = $orderform_details->price; ?>
  <input type="hidden" value="<?php echo $price; ?>" name="orderform_price" id="orderform_price" />
  <div class="order_form_details">
  <!--<h3><?php echo $orderform_details->name; ?></h3>
  <p><?php echo $orderform_details->desc; ?></p>-->
  <div class="viewCart procart mar_bot15">
<table class="tabular ">
<tbody>
<tr class="clearfix tb1">
<th class=""><div class="tb_padd">Product</div></th>
<th class="mobile_hide">&nbsp;</th>
<th class="priceCol"><div class="tb_padd">Price</div></th>
</tr>
<tr class="clearfix">
<td class="mobile_hide" rowspan="2" style="width: 7%; vertical-align: middle; height: 180px;">
<img class="" src="<?php echo base_url().'/assets/img/product.png'; ?>" alt="product" style="max-width: 87px; padding:0px 0 0 0;margin-left: 20px;">
</td>
<td class="bor_right">
<div class="tb_padd2">
<div class="pro_con">
<div class=""><div class="minCon">
<h4>How to be a power connector</h4><p>5 + 50 + 100 RULE for turrning your business into profits<br><br>
How to Be a Power Connector brings together real-world examples from a variety of power connectors in multiple industries, 
helping you replicate and apply the critical connection skills that will get you results.</p></div>
</div>
</div>
</div>
</td>
<!--<li class="rightAlign priceCell form-inline"><span class="price alignCentertable"><span class="price_sym">$</span><?php echo $price ; ?></span><input type="hidden" value="1" id="qty" name="qty" class=""></li>
-->
<td class="col-lg-3"><div class="tb_padd2"><div class="minCon"><span class="alignCentertable"> <span class="price_sym">$</span><span id="priceAmt3"><?php echo $price ; ?></span></span></div></td>
</tr>
<tr>
<td class="">&nbsp;</td>
<td class="bor_right"><div class="bor_top"><span class="totalPrice">Subtotal</span></div></td>
<td><div class="bor_top tot_price"><span class="tb_padd price_sym">$</span><span class="change_price"><?php echo $price ; ?></span></span></div></div></td>
</tbody>
</table></div>
  <input type="hidden" id="tagsInput" name="tagsInput" value="<?php echo $orderform_details->tags; ?>" />
  <div class="form-group loaded_form">
  <?php echo $orderform_details->form; ?>
  </div>
  <div class="form-group gform_wrapper_2">
  	
  </div>
  <div class="form-group">
  <input type="submit" name="order_form_btn" id="order_form_btn" onClick="submit_order_form()" class="btn btn-primary" value="Place Order" />
  </div>
  </div>
</div>
<script type="text/javascript">
function submit_order_form(){
	$('form#payment-form').validate({
    rules: {
        FirstName: {
            required: true
        },
        LastName: {
            required: true
        },StreetAddress1: {
            required: true
        },City: {
            required: true
        },State: {
            required: true
        },PostalCode: {
            required: true
        },Country: {
            required: true
        },Phone1: {
            required: true
        },Email: {
            required: true
        }, card_number: {
            required: true
        }, card_expiry_month: {
            required: true
        }, card_expiry_year: {
            required: true
        }, card_cvc: {
            required: true
        }
    },
    messages: {
        textArea: "<i class='fa fa-warning'></i> This field is required."
    },
    highlight: function(element) {
        $(element).closest('.form-group').addClass('has-error');
    },
    unhighlight: function(element) {
        $(element).closest('.form-group').removeClass('has-error');
    },
    errorElement: 'span',
    errorClass: 'help-block',
});
	 $('.order_form_details form').submit();
	/*var passdata = $('.order_form_details form').serialize();
	//passdata += '&producct_id='+$('#quiz_cat').val();
	$.ajax({
		type:"POST",
		URL: "<?php echo base_url('cart/post_checkout');?>",
		data: passdata,
		success: function(data){
			alert(data);
		}
	});*/
}
var specialKeys = new Array();
specialKeys.push(8);
specialKeys.push(9); 
specialKeys.push(13);
specialKeys.push(37);
specialKeys.push(39);
specialKeys.push(46);
specialKeys.push(36);
specialKeys.push(35);
function check16digit(e){
	var keyCode = e.which ? e.which : e.keyCode;
	var length = $('#card_number').val().length;
	var ret = ((keyCode >= 48 && keyCode <= 57 && length<16) || specialKeys.indexOf(keyCode) != -1);
	//document.getElementById("error").style.display = ret ? "none" : "inline";
	return ret;
}
</script>