<?php if(isset($user_details)){
	$app_name = $user_details[0]->is_app_name;
	$app_key = $user_details[0]->is_app_key;
} else{
	$app_name = '';
	$app_key = '';
}
?>
<div class="col-lg-12">
<div class="page-title">
                            <h1>Infusionsoft Information
                                <small></small>
                            </h1>
                            <!--<ol class="breadcrumb">
                                <li><i class="fa fa-dashboard"></i>  <a href="index.html">Home</a>
                                </li>
                                <li class="active">login</li>
                                <li class="active">IS</li>
                            </ol>-->
                        </div>
<div class="col-lg-12">
    	<div class="portlet portlet-blue">
                                    <!--<div class="portlet-heading">
                                        <div class="portlet-title">
                                            <h4>IS</h4>
                                        </div>
                                        <div class="portlet-widgets">
                                            <a href="#loginForm" data-parent="#accordion" data-toggle="collapse"><i class="fa fa-chevron-down"></i></a>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>-->
                                    <div class="panel-collapse collapse in" id="loginForm">
                                        <div class="portlet-body">
                                            <form role="form" class="form-horizontal" action="<?php echo base_url().'users/is_info'?>" method="post">
                                                <div class="form-group">
                                                    <label class="col-sm-2 control-label" for="app_name">App Url</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" placeholder="App Name" id="app_name" name="app_name" value="<?php echo $app_name; ?>" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-sm-2 control-label" for="password">API Key</label>
                                                    <div class="col-sm-10">
                                                        <input type="password" placeholder="App Key" id="app_key" name="app_key" value="<?php echo $app_key; ?>" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-sm-offset-2 col-sm-10">
                                                        <button class="btn btn-default" type="submit" name="is_form" value="is_form">Save</button>
                                                    </div>
                                                </div>
                                                <?php  if($this->session->userdata ["cart_contents"]['customer']){
										$customer = $this->session->userdata ["cart_contents"]['customer']; } ?>
                                                <input type="hidden" name="user_id" id="user_id" value="<?php echo $customer['id']; ?>" />
                                            </form>
                                        </div>
                                    </div>
                                </div>
    </div>
                    </div>