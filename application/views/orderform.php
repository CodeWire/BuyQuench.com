<style>
</style>
<div class="order_form">
	<?php 
	if(isset($orderform_details)){
		foreach($orderform_details as $orderform_detail){
	$id = $orderform_detail->id;
	$name = $orderform_detail->name;
	$desc = $orderform_detail->desc;
	$form = $orderform_detail->form;
	$active = $orderform_detail->active;
	echo $form;
	echo '<br><br>';
			}
}
?>
</div>
