<div class="margintop10">
<div class="page-title">
                            <h1>Cart
                                <small></small>
                            </h1>
                            <ol class="breadcrumb">
                                <li><i class="fa fa-dashboard"></i>  <a href="index.html">Home</a>
                                </li>
                                <li class="active">Cart</li>
                            </ol>
                        </div>
	<?php if($this->sale_questions->total_items()==0){ echo 'Cart is empty'; } else{ ?>
            <table class="table table-striped table-bordered">
            <thead>
                <thead>
                    <tr>
                        <th style="width:20%;"><?php echo 'Name';?></th>
                        <th style="width:10%;"><?php echo 'Duration';?></th>
                        <th style="width:10%;"><?php echo 'Price';?></th>
                        <th class="hidden-phone"><?php echo 'Description';?></th>
                        <th style="width:20%;"><?php echo 'Total';?></th>
                    </tr>
                </thead>
            </thead>
            
            <tfoot>
                <?php
                /**************************************************************
                Subtotal Calculations
                **************************************************************/
                ?>
                            
                <?php if($this->sale_questions->coupon_discount() > 0) {?>
                <tr>
                    <td colspan="2"><strong><?php echo 'Coupon_discount';?></strong></td>
                    <td class="hidden-phone"></td>
                    <td id="gc_coupon_discount">-<?php echo '$'.$this->sale_questions->coupon_discount();?></td>
                </tr>
                <?php } 
                /**************************************************************
                 Custom charges
                **************************************************************/
                $charges = $this->sale_questions->get_custom_charges();
                if(!empty($charges))
                {
                    foreach($charges as $name=>$price) : ?>
                        
                <tr>
                    <td colspan="2"><strong><?php echo $name?></strong></td>
                    <td class="hidden-phone"></td>
                    <td><?php echo $price; ?></td>
                </tr>	
                        
                <?php endforeach;
                }	?>
    
                
                <tr>
                    <td colspan="3"><strong><?php echo 'Grand Total';?></strong></td>
                    <td class="hidden-phone"></td>
                    <td><?php echo '$'.$this->sale_questions->total(); ?></td>
                </tr>
            </tfoot>
            
            <tbody>
                <?php
                $subtotal = 0;
    
                foreach ($this->sale_questions->contents() as $cartkey=>$product):?>
                    <tr>
                        <td><a class="additemimg" href="#"><?php echo $product['name']; ?></a></td>
                        <td><?php echo $product['duration'];?></td>
                        <td><?php echo '$'.$product['price'];?></td>
                        <td class="hidden-phone">
                            <?php echo $product['desc']; ?>
                        </td>
                        <td><?php echo '$'.$product['price']; ?>
        <button class="btn btn-danger" type="button" onclick="if(confirm('<?php echo 'remove_item';?>')){window.location='<?php echo site_url('cart/remove_item/'.$cartkey);?>';}"><i class="icon-remove icon-white"></i></button>
                        </td>
                    </tr>
                <?php endforeach;?>
            </tbody>
        </table>
        <a href="<?php echo base_url('cart/place_order'); ?>" class="btn btn-primary">Place order</a>
    <?php	} ?>
</div>