<style>
</style>
<div class="web_form">
	<h4>Thank you</h4>
    <p>Thanks for your order</p>
    <p>Your details are following...</p>
    <?php $values = $_GET;
	foreach($values as $key=>$value){
		echo '<label>'.$key.': </label><span>'.$value.'</span><br>';
	}?>
</div>
