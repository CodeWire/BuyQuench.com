<?php if(isset($sales_details)){
	$id = $sales_details[0]->id;
	$user_id = $sales_details[0]->user_id;
	$first_name = $sales_details[0]->first_name;
	$last_name = $sales_details[0]->last_name;
	$email = $sales_details[0]->email;
	$cat_id = $sales_details[0]->cat_id;
	$address1 = $sales_details[0]->address1;
	$address2 = $sales_details[0]->address2;
	$city = $sales_details[0]->city;
	$state = $sales_details[0]->state;
	$zip = $sales_details[0]->zip;
	$country = $sales_details[0]->country;
	$phone = $sales_details[0]->phone;
	$company = $sales_details[0]->company;
	$created_date = $sales_details[0]->created_date;
	$amount = $sales_details[0]->amount;
	$status = strtolower($sales_details[0]->status);
} else {$id='';$user_id = '';$first_name='';$last_name='';$email = ''; $cat_id = ''; $address1=1; $address2= '';$city = '';$city = ''; $state = '';$zip='';$country = '';$phone = '';$company = '';$created_date = '';$amount = '';$status = '';} ?>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="page-title">
                            <h1>Sales
                                <small></small>
                            </h1>
                            <ol class="breadcrumb">
                                <li><i class="fa fa-dashboard"></i>  <a href="index.html">Home</a>
                                </li>
                                <li class="active"><?php if($func){ echo $func;} ?> Sales</li>
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
                                            <h4><?php if($func){ echo $func;} ?> Order</h4>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                    <div class="portlet-body clearfix">
                                    <div class="col-sm-6">
                                    <h3>Billing Address</h3>
                                    <form method="post" action="<?php echo base_url().'admin/sales/edit';?>">
                <div class="form-group">
                <label for="first_name">First Name</label>
                <input type="text" value="<?php echo $first_name;?>" name="first_name" id="first_name" class="form-control">
                </div>
                <div class="form-group">
                <label for="last_name">Last Name</label>
                <input type="text" value="<?php echo $last_name;?>" name="last_name" id="last_name" class="form-control">
                </div>
                <div class="form-group">
                <label for="email">Email</label>
                <input type="text" value="<?php echo $email;?>" name="email" id="email" class="form-control">
                </div>
                <div class="form-group">
                <label for="address1">Address1</label>
                <input type="text" value="<?php echo $address1;?>" name="address1" id="address1" class="form-control">
                </div>
                <div class="form-group">
                <label for="address2">Address2</label>
                <input type="text" value="<?php echo $address2;?>" name="address2" id="address2" class="form-control">
                </div>
                <div class="form-group">
                <label for="city">City</label>
                <input type="text" value="<?php echo $city;?>" name="city" id="city" class="form-control">
                </div>
                <div class="form-group">
                <label for="state">State</label>
                <input type="text" value="<?php echo $state;?>" name="state" id="state" class="form-control">
                </div>
                <div class="form-group">
                <label for="zip">Zip</label>
                <input type="text" value="<?php echo $zip;?>" name="zip" id="zip" class="form-control">
                </div>
                <div class="form-group">
                <label for="country">Country</label>
                <input type="text" value="<?php echo $country;?>" name="country" id="country" class="form-control">
                </div>
                <div class="form-group">
                <label for="first_name">Phone</label>
                <input type="text" value="<?php echo $phone;?>" name="phone" id="phone" class="form-control">
                </div>
                <div class="form-group">
                <label for="first_name">Company</label>
                <input type="text" value="<?php echo $company;?>" name="company" id="company" class="form-control">
                </div>
                <div class="form-group">
                <label for="first_name">Amount</label>
                <input type="text" value="<?php echo $amount;?>" name="amount" id="amount" class="form-control">
                </div>
                <div class="form-group">
                <label for="first_name">Status</label>
                <select class="form-control" name="status"><option <?php if($status=='pending'){ echo 'selected="selected"';}?>>Pending</option><option <?php if($status=='processing'){ echo 'selected="selected"';}?>>Processing</option><option <?php if($status=='paid'){ echo 'selected="selected"';}?>>Paid</option></select>
                </div>
                                 <input type="hidden" value="<?php echo $id;?>" class="" name="id" id="id">
                                 <input type="submit" class="btn btn-primary pull-right" value="Save" />
                                 </form>
                                 </div>
                                 	<div class="col-sm-6">
                                    <?php $categoryDetails = $this->Sales_model->getWinTagByCatId($cat_id);
									if(!empty($categoryDetails)){
										$categoryDetail = $categoryDetails[0] ?>
                     <h3>Wining Category details</h3>
                    <div class="form-group">
                    <label for="first_name">Category Name</label>
                    <input type="text" readonly value="<?php echo $categoryDetail->name;?>" name="cat_name" id="cat_name" class="form-control">
                    </div>
                    <div class="form-group">
                    <label for="first_name">Win Tag</label>
                    <input type="text" readonly value="<?php echo $categoryDetail->win_tag;?>" name="cat_tag" id="cat_tag" class="form-control">
                    </div>
                    <div class="form-group">
                    <img src="<?php echo base_url().'uploads/'.$categoryDetail->image;?>" name="cat_image" id="cat_image">
                    </div>
                    				<?php } ?>
                                    </div>
                                      </div>
                                </div>
								<!-- Form */ -->
			        </div>
                </div>

<script type="text/javascript" charset="utf-8">
</script>