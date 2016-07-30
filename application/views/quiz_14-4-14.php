<style>
.flex-direction-nav, .hide, .child{display:none;}
input.form-control:focus{outline:none !important;}
.category_images img{max-width:100%;}
.category_images.nav-pills > li + li{margin:0;}
.start {text-align:center; font-style:italic;}
.margin_right10{margin-right:10px;}
.pro_bar_small{width:200px;float: right;margin-top: 20px;}
.flexbannerslider .radio{clear:both; margin-bottom:15px;display: block;}
.flexbannerslider .radio input[type="radio"]{ margin-right:5px;}
.highlight{color:#00F;}
.not_selected{opacity:0.4;}
.social_sharing a{display:block;}
#complete_quiz img {max-width: 100%;float: left;}
.parentnode, .child {float: left;margin-right: 15px;}
.clear {clear: both;}
.head .form-group{display:block;margin-bottom: 20px;}
</style>
<div class="col-lg-12">
 <div id="rootwizard">
    <div class="navbar">
    <div class="navbar-inner">
    <div class="container1">
    <!--<ul>
    <li><a form_num = "1" href="#tab1" data-toggle="tab">Start</a></li>
    <li><a href="#tab2" form_num = "2" data-toggle="tab">Choose Catagory</a></li>
    <li><a href="#tab3" form_num = "3" data-toggle="tab">Choose Node</a></li>
    <li><a href="#tab4" form_num = "4" data-toggle="tab">Choose Questions</a></li>
    <li><a href="#tab5" form_num = "5" data-toggle="tab">Complete Quiz</a></li>
    </ul>-->
    </div>
    </div>
    </div>
	<!--<div id="bar" class="progress progress-striped active">
    <div class="bar"></div>
</div>-->
    <div class="tab-content_no">
   							 <div class="tab-pane_no" id="tab1">
                                <div class="portlet portlet-default">
                                    <div class="portlet-heading">
                                        <div class="portlet-title">
                                        <ul class="category_images">
                                        <?php foreach($quiz_categories as $category){
                                            echo '<li><img src="'.base_url('uploads').'/'.$category->image.'" alt="'.$category->name.'" /></li>';
                                        }?>
                                        </ul>
                                            <h4 class="start"><a href="javascript:void(0);" onClick="start()">Click here to begin</a></h4>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                    </div>
                              </div>
                              <!--<div class="getting_stared">
                              <?php /*foreach($quiz_details as $quiz_detail){
								  echo '<h3>Getting Started</h3>';
								  echo '<div class="span8">'.$quiz_details[0]->desc.'</div>';
							  }*/ ?>
                              </div>-->
                              <div class="tab-pane" id="tab2">
                                   		 <div id="nodes" class="nodes hide">
                                        <div class="form-group">
                                        <label>Select your Decision Node</label>
                                        <div id="creaded_node">
                                        <!--<select name="node" onChange="selectNode(this)" class="form-control">-->
                                        <?php /*foreach($quiz_node as $note){
                                            echo '<input class="btn btn-primary margin_right10" type="button" real-value="'.$note->id.'" value="'.$note->name.'" onclick="selectNode(this)">';
                                        }*/?>
                                        <?php
										$node_html ='';
										if(!empty($quiz_node)){
			foreach($quiz_node as $current_node){
				if($current_node){
					$cur_node_id = $current_node->id;
				$curNodeArray = json_decode($current_node->name);
				if(!empty($curNodeArray)){
				foreach($curNodeArray as $curNode){
					if(!empty($curNode)){
						//
						if(is_object($curNode)){
							$curNode =  (array) $curNode;
						}
						if(count($curNode) >1){ // check first level
						$node_html .= '<div class="prarent_con">';
						$child =0;
							foreach($curNode as $level1){$child++;
								if(!empty($level1)){
									if(count($level1) >1){ 
									} else {
										$node_html .= '<div class="child">';
										//var_dump($level1);
											if(is_array($level1)){
												if($level1[0] != '')
											$node_html .= '<input type="button" class="btn btn-primary margin_right10" onClick="selectNode(this)" name="ques_nodes_child" value="'.$level1[0].'" real-value="'.$cur_node_id.'_'.$child.'" />';
												if(count($level1) >1){
													//var_dump($level1);
													/*foreach($level1 as $level2){
														if(count($level2) >1){ 
														} else {
															//var_dump($level2);
															//if($level2[0] != '')
//															$node_html .= '<input type="radio" name="ques_nodes" value="'.$current_node->id.'" />'.$level1[0];
//															}
													}
												}*/
											}
											} else {
												if($level1 != '')
											$node_html .= '<input type="button" class="btn btn-primary margin_right10" onClick="selectNode(this)" name="ques_nodes_child" value="'.$level1.'" real-value="'.$cur_node_id.'_'.$child.'" />';
											}
											
										$node_html .= '</div>';
									}
								}
							}
							$node_html .= '</div>';
						} else {
							if($curNode[0] != ''){
								//$node_html .= '<div class="child">';
							$node_html .= '<input type="button" class="btn btn-primary margin_right10 parentnode" onClick="parentNodeClick(this)" name="ques_nodes_parent" value="'.$curNode[0].'"  real-value="'.$cur_node_id.'" />';
							//$node_html .= '</div>';
							}
						}
					}
				}
				}
				}
			}
		}
		 echo $node_html; ?>
                                        </div>
                                        </div>
                                        </div>
                               </div>
                                        <?php foreach($quiz_form_actions as $form_action){
                                            $num_per_page = $form_action->num_per_page;
                                            $passed_by = $form_action->passed_by;
                                        } ?>
                                  <div class="tab-pane" id="tab4">
                                        <div class="questions hide">
                                            <div class="form-group">
                                            <label>Answer your Questions</label>
                                            <form action="<?php echo base_url(); ?>/quiz/get_answers" id="questionsForm" class="" method="post" role="form">
                                            <div id="creaded_questions" class="clearfix">
                                            
                                            </div>
                                            <input type="hidden" name="passed_by" value="<?php echo $passed_by; ?>" />
                                            <input type="hidden" name="quiz_id" value="<?php echo $quiz_id; ?>" />
                                            </form>
                                        </div>
                                     </div>
                               </div>
                               <div class="tab-pane" id="tab5">
                                        <div class="completed hide">
                                        <div name="question">
                                            <div class="form-group">
                                            <label>Quiz completed</label>
                                            <div id="complete_quiz">
                                            	Quiz result loading..
                                            </div> 
                                        </div>
                                        </div>
                                     </div>
                               </div>
  </div>
</div>
<script type="text/javascript">
function start(){
	$('#nodes').removeClass('hide');
	$('#tab1').hide();
}
function selectNode(e){
	var node_id = $(e).attr('real-value');
	$.ajax({
		type: "POST",
		url: "<?php echo base_url('quiz/get_ques_by_nodes');?>?node_id="+node_id,
		success: function( data ) {
		 //alert( "Data Saved: " + data );
			var json = JSON.parse(data);
			var node_html = '<div class="form-inline" role="form"><div class="flexbannerslider"><ul class="head slides">';
			var $options;
			var num_per_page = <?php echo $num_per_page;?>;
			node_html += '<li class="form-group"><h3>Getting Started</h3><div class="span8">';
			node_html += '<?php echo $quiz_details[0]->desc; ?>';
			node_html += '</div></li>';
			node_html += '<li class="form-group"><p>Provide your contact information below and you will receive your personal Love Language profile emailed to you.</p><div class="form-group"><label for="name">Your Name</label><input type="text" name="name" class="form-control"></div><div class="form-group"><label for="email">Your Email</label><input type="text" name="email" class="form-control"></div></li>';
			if(json == ''){
				node_html += '<li class="form-group">There is no questions</li>';
			} else{
			for(var i=0; i< json.length; ){
				if(i%num_per_page == 0){
					node_html += '<li class="form-group">';
				}
				node_html += '<div><label class="ques'+json[i].id+'">'+json[i].questions+'</label>';
				$options = json[i].options.split(',');
				for(var j=0; j<$options.length; j++){
					if($options[j] != '')
					//+'_'+j
				node_html += '<div class="radio"><label><input class="" value="'+ ( j + 1 )+'" name="ques'+json[i].id+'" type="radio" />'+$options[j]+'</label></div>';
				}
				node_html += '<input type="hidden" name="quesion_ids[]" value="'+json[i].id+'"  /></div>';
				i++;
				if(i%num_per_page == 0 || i== json.length){
					node_html += '</li>';
				}
			}
			}
			node_html += '</ul></div></div><input type="hidden" name="total_ques" value="'+json.length+'" />';
			if(json != ''){
			if(json.length == num_per_page){
				node_html += '<a id="nextSlider" href="javascript:void(0)" onClick="questionCompleted()"  class="Next flex-next btn btn-primary">Finish</a>';
			} else {
				node_html += '<a id="prevSlider" href="javascript:void(0)" onClick="prevSlider()" class="previous flex-prev btn btn-primary margin_right10" style="display:none;">Previous</a><a id="nextSlider" href="javascript:void(0)" onClick="nextSlider()"  class="Next flex-next btn btn-primary">Next</a>';
				var num_slide = (json.length / num_per_page);
				node_html += '<div class="pro_bar_small"><div id="bar" cur_slide="0" num_slide="'+ num_slide +'" class="progress progress-striped active"><div class="bar"></div></div></div>';
			}
			}
			$('#creaded_questions').empty();
			$('#creaded_questions').append(node_html);
			$('#tab2').hide();
			$('.questions').removeClass('hide');
			$('#form_next a').click();
			
			$('.flexbannerslider').flexslider({
			animation: "slide",
			controlNav: 0,
			pauseOnHover: 0,
			animationLoop: 0,
			slideshow: 0,
			direction: "horizontal",
			reverse: 0,
			slideshowSpeed: 3000,
			animationSpeed: 600,
			smoothHeight: 1,
			start: function(slider){
			  $('body').removeClass('loading');
			}
		  });
	  
		}
		});
}
function nextSlider(){
	var check_checked = validation();
	if(check_checked){
		jQuery('.flexbannerslider').flexslider('next');
		$('#prevSlider').show();
		if(jQuery('.flexbannerslider ul.head li:last-child').hasClass('flex-active-slide')){
			$('#nextSlider').html('Finish').attr('onClick','questionCompleted()');
			}
		var num_slide = parseInt($('#bar').attr('num_slide'));
		var cur_slide = parseInt($('#bar').attr('cur_slide'));
		$('#bar').attr('cur_slide',cur_slide + 1);
		var increase = 100/num_slide;
		$('#bar .bar').css('width',(cur_slide + 1)*increase+'%');
	} else {
		alert('Select your answer');
	}
}
function prevSlider(){
	jQuery('.flexbannerslider').flexslider('prev');
	if(jQuery('.flexbannerslider ul li:first-child').hasClass('flex-active-slide')){
		$('#prevSlider').hide();
	}
	$('#nextSlider').html('Next').attr('onClick','nextSlider()');
	var num_slide = parseInt($('#bar').attr('num_slide'));
	var cur_slide = parseInt($('#bar').attr('cur_slide'));
	$('#bar').attr('cur_slide',cur_slide - 1);
	var increase = 100/num_slide;
	$('#bar .bar').css('width',(cur_slide - 1)*increase+'%');
}
function questionCompleted(){
	var check_checked = validation();
	if(check_checked){
		checkAnswer();
		$('#tab4').hide();
		$('.completed').removeClass('hide');
	} else {
		alert('Select your answer');
	}
}
function checkAnswer(){
	$.ajax({
		type: "POST",
		url: "<?php echo base_url(); ?>quiz/get_answers",
		data: $('#questionsForm').serialize(),
		success: function( data ) {
			$('#complete_quiz').empty();
			$('#complete_quiz').append(data);
		}
	});
}
function validation(){
	if($('.flexbannerslider .flex-active-slide input[type="radio"]').length){
	var checked = false;
	$('.flexbannerslider .flex-active-slide input[type="radio"]').each(function(){
		if($(this).is(':checked')){
			checked = true;
		}
	});
	return checked;
	} else{
		return true;
	}
}
function parentNodeClick(e){
	$('.parentnode').each(function() {
        $(this).next('.prarent_con').hide();
    });
	$('.parentnode').hide();
	//$(e).hide();
	$(e).next('.prarent_con').show();
	$(e).next('.prarent_con').children('.child').each(function() {
        $(this).show();
    });
}
function shareEmail(){
	$.ajax({
		type: "POST",
		url: "<?php echo base_url(); ?>quiz/share_mail",
		data: $('#share_email').serialize(),
		success: function( data ) {
			$('#return_message').empty();
			$('#return_message').append(data);
		}
	});
}
function mainContent(){
	$('#email_content').toggle();
}
</script>