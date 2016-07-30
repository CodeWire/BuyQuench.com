<style>
</style>
<div class="col-lg-12">
<div class="page-title">
                            <h1>Change Password
                                <small></small>
                            </h1>
                            <ol class="breadcrumb">
                                <li><i class="fa fa-dashboard"></i>  <a href="index.html">Home</a>
                                </li>
                                <li class="active">Change Password</li>
                            </ol>
                        </div>
	<div class="col-lg-12">
    	<div class="portlet portlet-blue">
                                    <div class="portlet-heading">
                                        <div class="portlet-title">
                                            <h4>Change Password</h4>
                                        </div>
                                        <div class="portlet-widgets">
                                            <a href="#loginForm" data-parent="#accordion" data-toggle="collapse"><i class="fa fa-chevron-down"></i></a>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                    <div class="panel-collapse collapse in" id="loginForm">
                                        <div class="portlet-body">
                                            <form role="form" class="form-horizontal" action="<?php echo base_url().'users/change_password'?>" method="post">
                                                <div class="form-group">
                                                    <label class="col-sm-2 control-label" for="password">Enter your Password</label>
                                                    <div class="col-sm-10">
                                                        <input type="password" placeholder="Password" id="password" name="password" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-sm-2 control-label" for="confirm_password">Confirm Password</label>
                                                    <div class="col-sm-10">
                                                        <input type="password" placeholder="Password" id="confirm_password" name="confirm_password" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-sm-offset-2 col-sm-10">
                                                        <button class="btn btn-default" type="submit" name="change_pass_form" value="change_pass_form">Submit</button>
                                                    </div>
                                                </div>
                                                <input type="hidden" name="email" value="<?php echo $email; ?>">
                                                <input type="hidden" name="verify_link" value="<?php echo $verify_link; ?>">
                                            </form>
                                        </div>
                                    </div>
                                </div>
    </div>
</div>

<div class="modal fade" id="standardModal" tabindex="-1" role="dialog" aria-labelledby="standardModalLabel" aria-hidden="true">
<div class="modal-dialog">
<div class="modal-content">
 <form action="<?php echo base_url().'users/forgot_password';?>" method="POST" id="forgotpassword-form">
<div class="modal-header">
<button class="close" aria-hidden="true" data-dismiss="modal" type="button">×</button>
<h4 id="standardModalLabel" class="modal-title">Enter your details</h4>
</div>
<div class="modal-body">
<span class="payment-errors"></span>
		<div class="form-group">
            <label>Email</label>
                <input type="text" size="20" name="email" class="email form-control" />
        </div>
</div>
<div class="modal-footer">
<button class="btn btn-default" data-dismiss="modal" type="button">Close</button>
<button type="submit" class="btn btn-green">Submit</button>
</div>
</form>
</div>
</div>
</div>
<script type="text/javascript">

</script>