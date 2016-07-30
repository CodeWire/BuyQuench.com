<?php 
$currentParent = $this->router->fetch_class();
$currentChild = $this->router->fetch_method();
?>
                        <?php  if(isset($this->session->userdata ["cart_contents"]) && $this->session->userdata["cart_contents"]['customer']){
							$customer = $this->session->userdata["cart_contents"]['customer']; 
							?>
                                <!-- begin SIDE NAVIGATION -->
        <nav class="navbar-side" role="navigation">
            <div class="navbar-collapse sidebar-collapse collapse">
                <ul id="side" class="nav navbar-nav side-nav">
                    <!-- begin SIDE NAV USER PANEL -->
                    <li class="side-user hidden-xs">
                        <!--<img class="img-circle" src="<?php echo base_url(); ?>assets/img/profile-pic.jpg" alt="">-->
                        <p class="welcome">
                            <i class="fa fa-key"></i> Logged in as
                        </p>
                        <p class="name tooltip-sidebar-logout">
                            <?php echo $customer['first_name']; ?>
                            <span class="last-name"><?php echo $customer['last_name']; ?></span> <a style="color: inherit" class="logout_open" href="#logout" data-toggle="tooltip" data-placement="top" title="Logout"><i class="fa fa-sign-out"></i></a>
                        </p>
                        <div class="clearfix"></div>
                    </li>
                    <!-- end SIDE NAV USER PANEL -->
                    <!-- begin SIDE NAV SEARCH -->
                    <li class="nav-search">
                        <form role="form">
                            <input type="search" class="form-control" placeholder="Search...">
                            <button class="btn">
                                <i class="fa fa-search"></i>
                            </button>
                        </form>
                    </li>
                    <!-- end SIDE NAV SEARCH -->
					<!-- begin Quiz LINK -->
                    <li class="panel">
                        <a href="javascript:;" data-parent="#side" data-target="#quiz" data-toggle="collapse" class="accordion-toggle">
                            <i class="fa fa-dashboard"></i> Quiz
                        </a>
                        <ul class="collapse nav <?php if($currentParent == 'questions'){ echo 'in';} ?>" id="quiz">
                            <li>
                                <a class="<?php if($currentChild == 'index'){ echo 'active';} ?>" href="<?php echo base_url(); ?>admin/questions">
                                    <i class="fa fa-angle-double-right"></i> New Quiz
                                </a>
                            </li>
                            <li>
                                <a class="<?php if($currentChild == 'quiz_list'){ echo 'active';} ?>" href="<?php echo base_url(); ?>admin/questions/quiz_list">
                                    <i class="fa fa-angle-double-right"></i> Quiz List
                                </a>
                            </li>
                        </ul>
                    </li>
                    <!-- end Quiz LINK -->
                    
                    <!-- begin Web form LINK -->
                    <?php $userDetails = $this->User_model->getUserDatails($customer['id']);
					if($customer['is_admin'] || $userDetails[0]->plan == 3 || $userDetails[0]->plan == 2){?>
                    <li class="panel">
                        <a href="javascript:;" data-parent="#side" data-target="#webform" data-toggle="collapse" class="accordion-toggle">
                            <i class="fa fa-dashboard"></i> Web Form
                        </a>
                        <ul class="collapse nav <?php if($currentParent == 'webform'){ echo 'in';} ?>" id="webform">
                            <li>
                                <a class="<?php if($currentChild == 'index'){ echo 'active';} ?>" href="<?php echo base_url(); ?>admin/webform">
                                    <i class="fa fa-angle-double-right"></i> New Web form
                                </a>
                            </li>
                            <li>
                                <a class="<?php if($currentChild == 'webform_list'){ echo 'active';} ?>" href="<?php echo base_url(); ?>admin/webform/webform_list">
                                    <i class="fa fa-angle-double-right"></i> Web form List
                                </a>
                            </li>
                        </ul>
                    </li>
                    <?php } ?>
                    <!-- end web form LINK -->
                    
                    <!-- begin Order Form LINK -->
                    <?php if($customer['is_admin'] || $userDetails[0]->plan == 3){?>
                    <li class="panel">
                        <a href="javascript:;" data-parent="#side" data-target="#orderform" data-toggle="collapse" class="accordion-toggle">
                            <i class="fa fa-dashboard"></i> Order Form
                        </a>
                        <ul class="collapse nav <?php if($currentParent == 'orderform'){ echo 'in';} ?>" id="orderform">
                            <li>
                                <a class="<?php if($currentChild == 'index'){ echo 'active';} ?>" href="<?php echo base_url(); ?>admin/orderform">
                                    <i class="fa fa-angle-double-right"></i> Add New
                                </a>
                            </li>
                            <li>
                                <a class="<?php if($currentChild == 'orderform_list'){ echo 'active';} ?>" href="<?php echo base_url(); ?>admin/orderform/orderform_list">
                                    <i class="fa fa-angle-double-right"></i> List
                                </a>
                            </li>
                        </ul>
                    </li>
                    <?php } ?>
                    <!-- end Order Form LINK -->
                    
                    <!-- begin Sales LINK -->
                    <li class="panel">
                        <a href="javascript:;" data-parent="#side" data-target="#sales" data-toggle="collapse" class="accordion-toggle">
                            <i class="fa fa-dashboard"></i> Sales
                        </a>
                        <ul class="collapse nav <?php if($currentParent == 'sales'){ echo 'in';} ?>" id="sales">
                            <!--<li>
                                <a class="<?php if($currentChild == 'index'){ echo 'active';} ?>" href="<?php echo base_url(); ?>admin/webform">
                                    <i class="fa fa-angle-double-right"></i> New Web form
                                </a>
                            </li>-->
                            <li>
                                <a class="<?php if($currentChild == 'sales_list'){ echo 'active';} ?>" href="<?php echo base_url(); ?>admin/sales/sales_list">
                                    <i class="fa fa-angle-double-right"></i> Sales List
                                </a>
                            </li>
                        </ul>
                    </li>
                    <!-- end Sales LINK -->
                    
                    <!-- begin Theme LINK -->
                    <!--<li class="panel">
                        <a href="javascript:;" data-parent="#side" data-target="#theme" data-toggle="collapse" class="accordion-toggle">
                            <i class="fa fa-dashboard"></i> Themes
                        </a>
                        <ul class="collapse nav <?php if($currentParent == 'theme'){ echo 'in';} ?>" id="theme">
                            <li>
                                <a class="<?php if($currentChild == 'index'){ echo 'active';} ?>" href="<?php echo base_url(); ?>admin/theme">
                                    <i class="fa fa-angle-double-right"></i> Themes
                                </a>
                            </li>
                        </ul>
                    </li>-->
                    <!-- end Theme LINK -->
                    
                    <!-- begin Leads form LINK -->
                    <?php if($customer['is_admin'] || $userDetails[0]->plan == 3 || $userDetails[0]->plan == 2){?>
                    <li class="panel">
                        <a href="javascript:;" data-parent="#side" data-target="#leads" data-toggle="collapse" class="accordion-toggle">
                            <i class="fa fa-dashboard"></i> Leads
                        </a>
                        <ul class="collapse nav <?php if($currentParent == 'leads'){ echo 'in';} ?>" id="leads">
                            <!--<li>
                                <a class="<?php if($currentChild == 'index'){ echo 'active';} ?>" href="<?php echo base_url(); ?>admin/webform">
                                    <i class="fa fa-angle-double-right"></i> New Web form
                                </a>
                            </li>-->
                            <li>
                                <a class="<?php if($currentChild == 'leads_list'){ echo 'active';} ?>" href="<?php echo base_url(); ?>admin/leads/leads_list">
                                    <i class="fa fa-angle-double-right"></i> Leads List
                                </a>
                            </li>
                        </ul>
                    </li>
                    <?php } ?>
                    <!-- end leads form LINK -->
                    
                    <?php if($customer['is_admin']){ ?>
                    <!-- begin Price LINK -->
                    <li class="panel">
                        <a href="javascript:;" data-parent="#side" data-target="#price" data-toggle="collapse" class="accordion-toggle">
                            <i class="fa fa-dashboard"></i> Pricing
                        </a>
                        <ul class="collapse nav <?php if($currentParent == 'pricing'){ echo 'in';} ?>" id="price">
                            <li>
                                <a class="<?php if($currentChild == 'index'){ echo 'active';} ?>" href="<?php echo base_url(); ?>admin/pricing">
                                    <i class="fa fa-angle-double-right"></i> New Price
                                </a>
                            </li>
                            <li>
                                <a class="<?php if($currentChild == 'price_list'){ echo 'active';} ?>" href="<?php echo base_url(); ?>admin/pricing/price_list">
                                    <i class="fa fa-angle-double-right"></i> Price List
                                </a>
                            </li>
                        </ul>
                    </li>
                    <!-- end Price LINK -->
                                        
                    <!-- begin Coupon LINK -->
                    <li class="panel">
                        <a href="javascript:;" data-parent="#side" data-target="#coupon" data-toggle="collapse" class="accordion-toggle">
                            <i class="fa fa-dashboard"></i> Coupon
                        </a>
                        <ul class="collapse nav <?php if($currentParent == 'coupon'){ echo 'in';} ?>" id="coupon">
                            <li>
                                <a class="<?php if($currentChild == 'index'){ echo 'active';} ?>" href="<?php echo base_url(); ?>admin/coupon">
                                    <i class="fa fa-angle-double-right"></i> Create New Coupon
                                </a>
                            </li>
                            <li>
                                <a class="<?php if($currentChild == 'coupon_list'){ echo 'active';} ?>" href="<?php echo base_url(); ?>admin/coupon/coupon_list">
                                    <i class="fa fa-angle-double-right"></i> Coupon List
                                </a>
                            </li>
                        </ul>
                    </li>
                    <!-- end Coupon LINK -->
                    
                    <!-- begin Customers LINK -->
                    <li class="panel">
                        <a href="javascript:;" data-parent="#side" data-target="#customers" data-toggle="collapse" class="accordion-toggle">
                            <i class="fa fa-dashboard"></i> Customers
                        </a>
                        <ul class="collapse nav <?php if($currentParent == 'customers'){ echo 'in';} ?>" id="customers">
                            <li>
                                <a class="<?php if($currentChild == 'index'){ echo 'active';} ?>" href="<?php echo base_url(); ?>admin/customers">
                                    <i class="fa fa-angle-double-right"></i> Create New Customer
                                </a>
                            </li>
                            <li>
                                <a class="<?php if($currentChild == 'customers_list'){ echo 'active';} ?>" href="<?php echo base_url(); ?>admin/customers/customer_list">
                                    <i class="fa fa-angle-double-right"></i> Customers List
                                </a>
                            </li>
                        </ul>
                    </li>
                    <!-- end Customers LINK -->
                    <?php } ?>
                    
                    <!-- begin Profile LINK -->
                    <li class="panel">
                        <a href="javascript:;" data-parent="#side" data-target="#profile" data-toggle="collapse" class="accordion-toggle">
                            <i class="fa fa-dashboard"></i> Profile
                        </a>
                        <ul class="collapse nav <?php if($currentParent == 'profile'){ echo 'in';} ?>" id="profile">
                            <li>
                                <a class="<?php if($currentChild == 'index'){ echo 'active';} ?>" href="<?php echo base_url(); ?>admin/customers/profile">
                                    <i class="fa fa-angle-double-right"></i> Edit Profile
                                </a>
                            </li>
                        </ul>
                    </li>
                    <!-- end Profile LINK -->
                </ul>
                <!-- /.side-nav -->
            </div>
            <!-- /.navbar-collapse -->
        </nav>
        <!-- /.navbar-side -->
        <!-- end SIDE NAVIGATION -->
        <?php	} ?>