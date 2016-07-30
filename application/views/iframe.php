<?php
//echo '<iframe id="" src="'.$url.'" frameborder="0" style="width:100%;></iframe>';
//echo file_get_contents($url);
 ?>
 <style>
 body{margin:0;}
 </style>
<iframe id="quizFrameURL" src="<?php echo $url; ?>" frameborder="0" style="width:100%;" ></iframe>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script type="text/javascript">
$(document).ready(function() {
	setInterval(function(){ checkheight();}, 1000);
});
function checkheight(){
	//alert($("#quizframeHome").contents().find("body").height());
	if($("#quizFrameURL").height() !=  $("#quizFrameURL").contents().find("body").height()+50){
		$("#quizFrameURL").height( $("#quizFrameURL").contents().find("body").height()+50);
	}
}
</script>