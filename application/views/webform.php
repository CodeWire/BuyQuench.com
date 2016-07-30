<style>
</style>
<div class="web_form">
	<?php if(isset($webform_details)){
		foreach($webform_details as $webform_detail){
	$id = $webform_detail->id;
	$name = $webform_detail->name;
	$desc = $webform_detail->desc;
	$form = $webform_detail->form;
	$active = $webform_detail->active;
	echo $form;
			}
}
?>
</div>
