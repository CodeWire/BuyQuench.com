<?php if(isset($price_details)){
	$price_id = $price_details[0]->id;
	$price_name = $price_details[0]->name;
	$price_desc = $price_details[0]->desc;
	$price = $price_details[0]->price;
	$duration = $price_details[0]->duration;
	$featured = $price_details[0]->featured;
} else {$price_name = '';$price_desc='';$price='';$duration='';$price_id='';$featured='';} ?>
<style>
</style>
                <div class="row">
                    <div class="col-lg-12">
                    <div class="page-title">
                            <h1>Price
                                <small></small>
                            </h1>
                            <ol class="breadcrumb">
                                <li><i class="fa fa-dashboard"></i>  <a href="index.html">Home</a>
                                </li>
                                <li class="active">Price</li>
                            </ol>
                        </div>
                        <div class="portlet portlet-default">
                            <div class="portlet-heading">
                                <div class="portlet-title">
                                    <h4>Price</h4>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <div class="portlet-body">
                            <form role="form" method="post" class="submit_form" action="<?php echo base_url(); ?>admin/pricing/">
                                <div class="form-group">
                                  <label for="price_name">Give your Price unique name</label>
                                  <input type="text" class="form-control" id="price_name" placeholder="Enter Name" name="price_name" value="<?php echo $price_name; ?>">
                               </div>
                               <div class="form-group">
                                  <label for="price">Price</label>
                                  <input id="price" type="text" class="form-control" name="price" placeholder="Price" value="<?php echo $price; ?>">
                               </div>
                               <div class="form-group">
                                  <label for="inputfile">Duration</label>
                                  <input id="duration" type="text" class="form-control" name="duration" placeholder="Duration" value="<?php echo $duration; ?>">
                               </div>
                               <div class="form-group">
                                  <label for="price_desc">Create a friendly description</label>
                                  <textarea id="price_desc" class="form-control" name="price_desc" placeholder="Description" ><?php echo $price_desc; ?></textarea>
                               </div>
                               <div class="checkbox">
                                  <label for="featured"><input type="checkbox" id="featured" value="1" <?php if($featured){ echo 'checked="checked"';} ?> class="form-control" name="featured" />Featured</label>
                               </div>
                               <div class="form-group">
                               <input type="submit" class="btn btn-primary" value="Save" />
                               </div>
                               <input type="hidden" id="price_id" name="price_id" class="price_id" value="<?php echo $price_id; ?>" />
                             </form>
                            </div>
                        </div>
                        <!-- /.portlet -->
                    </div>
                </div>
<script type="text/javascript">

</script>