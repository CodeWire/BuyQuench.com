<?php if(isset($customer_details)){
	$id = $customer_details[0]->id;
	$first_name = $customer_details[0]->first_name;
	$last_name = $customer_details[0]->last_name;
	$email = $customer_details[0]->email;
	$phone = $customer_details[0]->phone;
	$app_name = $customer_details[0]->is_app_name;
	$app_key = $customer_details[0]->is_app_key;
	$apikey = $customer_details[0]->api_key;
} else {$id='';$first_name = '';$last_name='';$email='';$phone='';$app_name='';$app_key='';$apikey='';} ?>
<style>
</style>
<div class="row">
                    <div class="col-lg-12">
                    <div class="page-title">
                            <h1>Profile
                                <small></small>
                            </h1>
                            <ol class="breadcrumb">
                                <li><i class="fa fa-dashboard"></i><a href="index.html">Home</a></li>
                                <li class="active">Profile</li>
                            </ol>
                        </div>
                        <div class="portlet portlet-default">
                            <div class="portlet-heading">
                                <div class="portlet-title">
                                    <h4>Profile</h4>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <div class="portlet-body">
                            <form role="form" method="post" class="submit_form" action="<?php echo base_url(); ?>admin/customers/profile">
                                <div class="form-group">
                                  <label for="first_name">First Name</label>
                                  <input type="text" class="form-control" id="first_name" placeholder="Enter First Name" name="first_name" value="<?php echo $first_name; ?>">
                               </div>
                               <div class="form-group">
                                  <label for="last_name">Last Name</label>
                                  <input id="last_name" type="text" class="form-control" name="last_name" placeholder="Enter Last Name" value="<?php echo $last_name; ?>">
                               </div>
                               <div class="form-group">
                                  <label for="email">Email</label>
                                  <input id="email" type="text" class="form-control" name="email" placeholder="Enter Email" value="<?php echo $email; ?>">
                               </div>
                               <div class="form-group">
                               	  <label for="phone">Phone</label>
                                  <input id="phone" type="text" class="form-control" name="phone" placeholder="Enter Phone" value="<?php echo $phone; ?>">
                               </div>
                               <div class="form-group">
                               	  <label for="app_name">App Name</label>
                                  <input id="app_name" type="text" class="form-control" name="app_name" placeholder="Enter App Name" value="<?php echo $app_name; ?>">
                               </div>
                               <div class="form-group">
                               	  <label for="app_key">App Key</label>
                                  <input id="app_key" type="password" class="form-control" name="app_key" placeholder="Enter App Key" value="<?php echo $app_key; ?>">
                               </div>
                               <div class="form-group">
                                  <label for="amount">Change Password</label>
                                  <input type="password" id="password" class="form-control" name="password" value="" />
                               </div>
                               <div class="form-group">
                                  <label for="confirm_password">Confirm password</label>
                                  <input id="confirm_password" type="password" class="form-control" name="confirm_password" value="">
                               </div>
                               <div class="form-group">
                                  <label for="confirm_password">API Key</label>
                                  <input id="api_key" type="text" class="form-control" name="api_key" value="<?php echo $apikey;?>">
                               </div>
                               <div class="form-group">
                               <input type="submit" class="btn btn-primary" value="Save" />
                               </div>
                               <input type="hidden" id="profile_id" name="profile_id" class="profile_id" value="<?php echo $id; ?>" />
                             </form>
                            </div>
                        </div>
                        <!-- /.portlet -->
                    </div>
                </div>
<script type="text/javascript">
</script>