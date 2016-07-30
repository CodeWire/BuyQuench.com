<style>
</style>
<div class="col-lg-12">
<!--<div class="page-title">
                            <h1>Login
                                <small></small>
                            </h1>
                            <ol class="breadcrumb">
                                <li><i class="fa fa-dashboard"></i>  <a href="index.html">Home</a>
                                </li>
                                <li class="active">login</li>
                            </ol>
                        </div>-->
	<div class="col-lg-6">
    	<div class="portlet portlet-blue">
                                    <div class="portlet-heading">
                                        <div class="portlet-title">
                                            <h4>Login</h4>
                                        </div>
                                        <div class="portlet-widgets">
                                            <a href="#loginForm" data-parent="#accordion" data-toggle="collapse"><i class="fa fa-chevron-down"></i></a>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                    <div class="panel-collapse collapse in" id="loginForm">
                                        <div class="portlet-body">
                                            <form role="form" class="form-horizontal" action="<?php echo base_url().'users/login'?>" method="post">
                                                <div class="form-group">
                                                    <label class="col-sm-2 control-label" for="email">Email</label>
                                                    <div class="col-sm-10">
                                                        <input type="email" placeholder="Email" id="email" name="email" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-sm-2 control-label" for="password">Password</label>
                                                    <div class="col-sm-10">
                                                        <input type="password" placeholder="Password" id="password" name="password" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-sm-offset-2 col-sm-10">
                                                        <div class="checkbox">
                                                            <label>
                                                                <input type="checkbox" name="remember">Remember me
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-sm-offset-2 col-sm-10">
                                                        <button class="btn btn-default" type="submit" name="login_form" value="login_form">Sign in</button><a href="#" data-target="#standardModal" data-toggle="modal" class="col-sm-offset-1">Forgot Password</a>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
    </div>
    <div class="col-lg-6">
    	<div class="portlet portlet-blue">
                                    <div class="portlet-heading">
                                        <div class="portlet-title">
                                            <h4>Register</h4>
                                        </div>
                                        <div class="portlet-widgets">
                                            <a href="#registerForm" data-parent="#accordion" data-toggle="collapse"><i class="fa fa-chevron-down"></i></a>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                    <div class="panel-collapse collapse in" id="registerForm">
                                        <div class="portlet-body">
                                            <form role="form" class="form-horizontal" action="<?php echo base_url().'users/register'?>" method="post">
                                            	<div class="form-group">
                                                    <label class="col-sm-2 control-label" for="FirstName">First Name</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" placeholder="First Name" id="FirstName" name="first_name" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-sm-2 control-label" for="FirstName">Last Name</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" placeholder="Last Name" id="LastName" name="last_name" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-sm-2 control-label" for="regemail">Email</label>
                                                    <div class="col-sm-10">
                                                        <input type="email" placeholder="Email" id="regemail" name="regemail" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-sm-2 control-label" for="regphone">Phone</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" placeholder="Phone" id="regphone" name="regphone" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-sm-2 control-label" for="regpassword">Password</label>
                                                    <div class="col-sm-10">
                                                        <input type="password" placeholder="Password" id="regpassword" name="regpassword" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-sm-2 control-label" for="regconfirmpassword">Confirm Password</label>
                                                    <div class="col-sm-10">
                                                        <input type="password" placeholder="Confirm Password" id="regconfirmpassword" name="regconfirmpassword" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-sm-offset-2 col-sm-10">
                                                        <button class="btn btn-default" type="submit">Register</button>
                                                    </div>
                                                </div>
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