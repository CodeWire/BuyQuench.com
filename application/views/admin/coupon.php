<?php if(isset($coupon_details)){
	$coupon_id = $coupon_details[0]->id;
	$coupon_name = $coupon_details[0]->name;
	$coupon_code = $coupon_details[0]->code;
	
	$start_date_exp_time = explode(' ',$coupon_details[0]->start_date);
	$start_date_ymd = explode('-',$start_date_exp_time[0]);
	$start_date = $start_date_ymd[1].'/'.$start_date_ymd[2].'/'.$start_date_ymd[0];
	
	$end_date_exp_time= explode(' ',$coupon_details[0]->end_date);
	$end_date_ymd = explode('-',$end_date_exp_time[0]);
	$end_date = $end_date_ymd[1].'/'.$end_date_ymd[2].'/'.$end_date_ymd[0];
	
	$status = $coupon_details[0]->status;
	$coupon_desc = $coupon_details[0]->desc;
	$type = $coupon_details[0]->type;
	$amount = $coupon_details[0]->amount;
} else {$coupon_id = '';$coupon_name='';$coupon_code='';$start_date='';$end_date='';$status=1;$coupon_desc='';$type='';$amount='';} ?>
<style>
</style>
                <div class="row">
                    <div class="col-lg-12">
                    <div class="page-title">
                            <h1>Coupon
                                <small></small>
                            </h1>
                            <ol class="breadcrumb">
                                <li><i class="fa fa-dashboard"></i><a href="index.html">Home</a></li>
                                <li class="active">Coupon</li>
                            </ol>
                        </div>
                        <div class="portlet portlet-default">
                            <div class="portlet-heading">
                                <div class="portlet-title">
                                    <h4>Coupon</h4>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <div class="portlet-body">
                            <form role="form" method="post" class="submit_form" action="<?php echo base_url(); ?>admin/coupon/">
                                <div class="form-group">
                                  <label for="coupon_name">Give your coupon name</label>
                                  <input type="text" class="form-control" id="coupon_name" placeholder="Enter Coupon Name" name="coupon_name" value="<?php echo $coupon_name; ?>">
                               </div>
                               <div class="form-group">
                                  <label for="coupon_code">Give your coupon unique code</label>
                                  <input id="coupon_code" type="text" class="form-control" name="coupon_code" placeholder="Enter Coupon Code" value="<?php echo $coupon_code; ?>">
                               </div>
                               <div class="form-group">
                                  <label for="coupon_desc">Description</label>
                                  <textarea id="coupon_desc" type="text" class="form-control" name="coupon_desc" placeholder="Enter Coupon Description"><?php echo $coupon_desc; ?></textarea>
                               </div>
                               <div class="form-group">
                               	  <label for="type">Discount type</label>
                                  <select id="type" name="type" class="form-control"><option <?php if($type == 'fixed'){ echo 'selected="selected"';}?> value="fixed">Fixed</option><option <?php if($type == 'percent'){ echo 'selected="selected"';}?> value="percent">Percentage</option></select>
                               </div>
                               <div class="form-group">
                                  <label for="amount">Fixed/Percentage Amount</label>
                                  <input type="text" id="amount" class="form-control" name="amount" value="<?php echo $amount; ?>" />
                               </div>
                               <div class="form-group">
                                  <label for="start_date">Start Date</label>
                                  <input id="start_date" type="text" class="form-control datepicker" name="start_date" value="<?php echo $start_date; ?>">
                               </div>
                               <div class="form-group">
                                  <label for="end_date">End Date</label>
                                  <input type="text" id="end_date" class="form-control datepicker" name="end_date" value="<?php echo $end_date; ?>" />
                               </div>
                               <div class="form-group">
                               	  <label for="enabled">Status</label>
                                  <select id="enabled" name="enabled" class="form-control"><option <?php if($status == 1){ echo 'selected="selected"';}?> value="1">Enabled</option><option <?php if($status == 0){ echo 'selected="selected"';}?> value="0">Disabled</option></select>
                               </div>
                               <div class="form-group">
                               <input type="submit" class="btn btn-primary" value="Save" />
                               </div>
                               <input type="hidden" id="coupon_id" name="coupon_id" class="coupon_id" value="<?php echo $coupon_id; ?>" />
                             </form>
                            </div>
                        </div>
                        <!-- /.portlet -->
                    </div>
                </div>
<script type="text/javascript">

</script>