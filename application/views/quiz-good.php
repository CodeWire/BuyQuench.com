<div class="col-lg-12">
 <div id="rootwizard">
    <div class="tab-content_no">
   							 <div class="tab-pane tab-pane_no" id="tab1">
                                <div class="portlet1 portlet-default1">
                                    <div class="portlet-heading">
                                        <div class="portlet-title">
                                        <ul class="category_images" style="list-style:none;">
                                        <?php 
										$totalCat = count($quiz_categories);
										$perWidth = 100/$totalCat;
										foreach($quiz_categories as $category){
                                            echo '<li style="width:'.$perWidth.'%;float:left;"><img src="'.base_url('uploads').'/'.$category->image.'" alt="'.$category->name.'" /></li>';
                                        }?>
                                        </ul>
                                                  <!-- <h3 class="quiz_title"><?php //echo '— '.$quiz_details[0]->name.' —'; ?></h3> -->
                                        <div class="point_arrow"><img src="<?php echo base_url().'assets/img/image_5.png'; ?>" alt=""></div>
                                        <div class="clickhere">

                                            <h4 class="start"><img src="<?php echo base_url().'assets/img/image_6.png'; ?>" alt="" class="click_img"><a href="javascript:void(0);" class="animated rotateIn" onClick="start(this)">Click here to begin</a></h4>
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
                              <?php if(isset($webform_details[0]) && $webform_details[0]->form != '' && strpos($quiz_details[0]->webform_pos,'node') !== false){ ?>
                              <div class="tab-pane tab_form" id="" style="display:none;">
			<div class="animated form-group lead_form"><div class="leadformcontainer"><?php echo trim(preg_replace('/\s+/', ' ', $webform_details[0]->form)); ?><div class="form_image"><img src="<?php echo base_url().'uploads/'.$webform_details[0]->icon; ?>" alt="" /></div></div><input type="hidden" id="lead_title" name="lead_title" value="<?php echo $webform_details[0]->name; ?>" /><input type="hidden" name="lead_desc" id="lead_desc" value="<?php echo $webform_details[0]->desc; ?>" /><input type="hidden" name="lead_id" id="lead_id" value="<?php echo $webform_details[0]->id; ?>" /></div>
            	</div>
			<?php } ?>
                              <div class="tab-pane" id="tab2" style="display:none;">
                                   		 <div id="nodes" class="nodes">
                                        <div class="form-group">
                                        <div id="creaded_node">
                                        <!--<select name="node" onChange="selectNode(this)" class="form-control">-->
                                        <?php /*foreach($quiz_node as $note){
                                            echo '<input class="btn btn-primary margin_right10" type="button" real-value="'.$note->id.'" value="'.$note->name.'" onclick="selectNode(this)">';
                                        }*/?>
                                        <?php
										$node_html ='';
											if(!empty($created_ParentNodes)){
												$tagCount=0;
			foreach($created_ParentNodes as $curParentNode){$tagCount++;
				$tagLookId = $curParentNode->id;
				$tagLookName = $curParentNode->name;
				$tagParent = $curParentNode->parent_id;
				$tagId = $curParentNode->tag_id;
				$tagTitle = $curParentNode->tag_title;
				$subnodeDetails = $this->Quiz_model->getSubNodes($quiz_id, $tagLookId);
				//$node_html .= '<div class="">';
				if($tagCount == 1){
				$node_html .= '<h3 class="quiz_title">'.$tagTitle.'</h3><div class="align_center">'; }
				$node_html .= '<input type="button" class="btn btn-primary margin_right10 parentnode" name="ques_nodes_parent" real-value="'.$tagLookId.'" value="'.$tagLookName.'" onclick="parentNodeClick(this)" />';
				$node_html .= '<div class="prarent_con">';
				if(!empty($subnodeDetails)){
					$tagChildCount = 0;
					foreach($subnodeDetails as $subnodeDetail){$tagChildCount++;
					if($tagChildCount == 1){
						$node_html .= '<h3 class="quiz_title" style="display:none;">'.$subnodeDetail->tag_title.'</h3>';}
						$node_html .= '<div class="child">';
						$node_html .= '<input type="button" class="btn btn-primary margin_right10" onClick="selectNode(this)" name="ques_nodes_child" real-value="'.$subnodeDetail->id.'" value="'.$subnodeDetail->name.'" /></div>';
					}
				}
				$node_html .= '</div>';
			}
										}
								        echo $node_html.'</div>'; ?>
                                        </div>
                                        </div>
                                        </div>
                               </div>
                                        
										<?php foreach($quiz_form_actions as $form_action){
                                            $num_per_page = $form_action->num_per_page;
                                            $passed_by = $form_action->passed_by;
											$animation = explode(',',$form_action->animation);
											if($form_action->animation==''){
												$entranceAnimation = 'slideInRight';
												$exitAnimation = 'slideOutLeft';
											} else {
												$entranceAnimation = $animation[0];
												$exitAnimation = $animation[1];
											}
                                        } ?>
                                  <div class="tab-pane" id="tab4">
                                        <div class="questions hide">
                                            <div class="form-group">
                                            <!--<label>Answer your Questions</label>-->
                                            <form action="<?php echo base_url(); ?>/quiz/get_answers" id="questionsForm" class="" method="post" role="form">
                                            <div id="creaded_questions" class="clearfix">
                                            
                                            </div>
                                            <input type="hidden" name="passed_by" value="<?php echo $passed_by; ?>" />
                                            <input type="hidden" name="quiz_id" value="<?php echo $quiz_id; ?>" />
                                            </form>
                                        </div>
                                     </div>
                               </div>
                               <?php if(isset($webform_details[0]) && $webform_details[0]->form != '' && strpos($quiz_details[0]->webform_pos,'formresults') !== false){ ?>
                              <div class="tab-pane tab_form" id="" style="display:none;">
			<div class="animated form-group lead_form"><div class="leadformcontainer"><?php echo trim(preg_replace('/\s+/', ' ', $webform_details[0]->form)); ?><div class="form_image"><img src="<?php echo base_url().'uploads/'.$webform_details[0]->icon; ?>" alt="" /></div></div><input type="hidden" id="lead_title" name="lead_title" value="<?php echo $webform_details[0]->name; ?>" /><input type="hidden" name="lead_desc" id="lead_desc" value="<?php echo $webform_details[0]->desc; ?>" /><input type="hidden" name="lead_id" id="lead_id" value="<?php echo $webform_details[0]->id; ?>" /></div>
            	</div>
			<?php } ?>
                               <div class="tab-pane" id="tab5" style="display:none;">
                                        <div class="completed">
                                        <div name="question">
                                            <div class="form-group">
                                            <div id="complete_quiz">
                                            	Quiz result loading..
                                            </div> 
                                        </div>
                                        </div>
                                     </div>
                                     <?php if(isset($webform_details[0]) && $webform_details[0]->form != '' && strpos($quiz_details[0]->webform_pos,'salesform') !== false){ ?>
                                     <a id="nextSlider" href="javascript:void(0)" onClick="start(this)"  class="Next flex-next btn btn-primary pull-right">Submit your details</a><?php } ?>
                               </div>
                               <?php if(isset($webform_details[0]) && $webform_details[0]->form != '' && strpos($quiz_details[0]->webform_pos,'salesform') !== false){ ?>
                              <div class="tab-pane tab_form" id="" style="display:none;">
			<div class="animated form-group lead_form"><div class="leadformcontainer"><?php echo trim(preg_replace('/\s+/', ' ', $webform_details[0]->form)); ?><div class="form_image"><img src="<?php echo base_url().'uploads/'.$webform_details[0]->icon; ?>" alt="" /></div></div><input type="hidden" id="lead_title" name="lead_title" value="<?php echo $webform_details[0]->name; ?>" /><input type="hidden" name="lead_desc" id="lead_desc" value="<?php echo $webform_details[0]->desc; ?>" /><input type="hidden" name="lead_id" id="lead_id" value="<?php echo $webform_details[0]->id; ?>" /></div>
            	</div>
			<?php } ?>
  </div>
</div>
<script type="text/javascript">
function leadFormValidation(){
	$('.leadformcontainer form fieldset legend').before('<div class="leadFormTit"><h3>'+$('#lead_title').val()+'</h3><p>'+$('#lead_desc').val()+'</p><input type="hidden" name="lead_id" id="lead_hid_id" value="'+$('#lead_id').val()+'" /></div>');
	$('.leadformcontainer form .control-group').each(function(index, element) {
        $(this).addClass('form-group');
    });
	$('.leadformcontainer form').validate({
    rules: {
        FirstName: {
            required: true
        },Email: {
            required: true
        }
    },
    messages: {
        textArea: "<i class='fa fa-warning'></i> This field is required."
    },
    highlight: function(element) {
        $(element).closest('.form-group').addClass('has-error');
    },
    unhighlight: function(element) {
        $(element).closest('.form-group').removeClass('has-error');
    },
    errorElement: 'span',
    errorClass: 'help-block',
});
}
function start(e){
	leadFormValidation();
	//$('#nodes').removeClass('hide');
	if($(e).closest('.tab-pane').next('.tab-pane').hasClass('tab_form')){
		$('.leadformcontainer form').attr('onSubmit','return validateWebForm(event);');
		$('#button').attr('type','submit');
	}
	$(e).closest('.tab-pane').hide();
	$(e).closest('.tab-pane').next('.tab-pane').show();
	//$('#tab1').hide();
}
function validateWebForm(e){
	$.ajax({
		type: "POST",
		url: "<?php echo base_url(); ?>quiz/lead_submit",
		data: $('.leadformcontainer form').serialize(),
		success: function( data ) {
			if($('#FirstName').val() != '' && $('#Email').val() != ''){
		$('.tab_form').hide();
		$('.tab_form').next('.tab-pane').show();
		if($('.tab_form').next('.tab-pane').attr('id') == 'tab5'){
			checkAnswer();
		}
			if($('.lead_form').hasClass('active')){
					$('.lead_form').hide();
					if($('.lead_form').next('li.form-group').length){
					//$('.lead_form').next('li.form-group').show();
					$('#nextSlider, #prevSlider').show();
					
jQuery('.head.slides .active').removeClass('<?php echo $entranceAnimation; ?>').addClass('<?php echo $exitAnimation;?>').addClass('completed');
jQuery('.head.slides .active').next('li').removeClass('<?php echo $exitAnimation;?> notcompleted').addClass('<?php echo $entranceAnimation; ?>').addClass('active');
jQuery('.head.slides .active.completed').removeClass('active');
if(jQuery('.flexbannerslider ul.head li:last-child').hasClass('active')){
$('#nextSlider').html('Finish').attr('onClick','questionCompleted(this)');
} else {
$('#nextSlider').show();
}
					} else {
						checkAnswer();
						$('#tab4').hide();
						$('#tab5').show();
					}
					$('.lead_form').removeClass('active');
				} else {
						if($('#tab4 .lead_form').length){
							if($('.lead_form').next('li.form-group').length){
							} else{
								checkAnswer();
								$('#tab4').hide();
								$('#tab5').show();
							}
						}
					}
			}
		}
	});
	return false;
}
function selectNode(e){
	var node_id = $(e).attr('real-value');
	getQuestions(node_id);
}
function getQuestions(node_id){
		$.ajax({
		type: "POST",
		url: "<?php echo base_url('quiz/get_ques_by_nodes');?>?node_id="+node_id,
		success: function( data ) {
		 //alert( "Data Saved: " + data );
			var json = JSON.parse(data);
			var node_html ='';
			var num_per_page = <?php echo $num_per_page;?>;
			var num_slide = Math.round((json.length / num_per_page))+2;
			var $formpos = '<?php echo $quiz_details[0]->webform_pos; ?>';
			var questionPosNo, webformquesAdded = 0;
				node_html += '<div class="pro_bar_small"><div id="bar" cur_slide="0" num_slide="'+ num_slide +'" class="progress progress-striped active"><div class="bar"></div></div></div>';
			node_html += '<div class="form-inline clear" role="form"><div class="flexbannerslider"><ul class="head slides">';
			var $options;
			node_html += '<li class="animated form-group active <?php echo $entranceAnimation; ?>"><label class="title">Getting Started</label><div class="span8">';
			node_html += '<?php echo $quiz_details[0]->desc; ?>';
			node_html += '</div></li>';

			if(json == ''){
				node_html += '<li class="animated form-group">There is no questions</li>';
			} else{
			for(var i=0; i< json.length; ){
				<?php if(isset($webform_details[0]) && $webform_details[0]->form != ''){ ?>
				//if($formpos.trim() == 'question'+parseInt(parseInt(i)+1)){
					if($formpos.trim().indexOf('question')>=0){
						questionPosNo = $formpos.trim().split('question');
						if(questionPosNo[1] <= i+1 && webformquesAdded == 0){
							webformquesAdded = 1;
			node_html += '<li class="animated form-group lead_form"><div class="leadformcontainer"><?php echo trim(preg_replace('/\s+/', ' ', $webform_details[0]->form)); ?><div class="form_image"><img src="<?php echo base_url().'uploads/'.$webform_details[0]->icon; ?>" alt="" /></div></div><input type="hidden" id="lead_title" name="lead_title" value="<?php echo $webform_details[0]->name; ?>" /><input type="hidden" name="lead_desc" id="lead_desc" value="<?php echo $webform_details[0]->desc; ?>" /><input type="hidden" name="lead_id" id="lead_id" value="<?php echo $webform_details[0]->id; ?>" /></li>';
						}
				}
			<?php } ?>
				if(i%num_per_page == 0){
					node_html += '<li class="animated form-group">';
				}
				node_html += '<div class="questions_wrapper"><label class="title ques'+json[i].id+'">'+json[i].questions+'</label>';
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
			<?php if(isset($webform_details[0]) && $webform_details[0]->form != ''){ ?>
				//if($formpos.trim() == 'question'+parseInt(parseInt(i)+1)){
					if($formpos.trim().indexOf('question')>=0){
						questionPosNo = $formpos.trim().split('question');
						if(webformquesAdded == 0){
			node_html += '<li class="animated form-group lead_form"><div class="leadformcontainer"><?php echo trim(preg_replace('/\s+/', ' ', $webform_details[0]->form)); ?><div class="form_image"><img src="<?php echo base_url().'uploads/'.$webform_details[0]->icon; ?>" alt="" /></div></div><input type="hidden" id="lead_title" name="lead_title" value="<?php echo $webform_details[0]->name; ?>" /><input type="hidden" name="lead_desc" id="lead_desc" value="<?php echo $webform_details[0]->desc; ?>" /><input type="hidden" name="lead_id" id="lead_id" value="<?php echo $webform_details[0]->id; ?>" /><input type="hidden" name="lead_id" id="lead_id" value="<?php echo $webform_details[0]->id; ?>" /></li>';
						}
				}
			<?php } ?>
			node_html += '</ul></div></div><input type="hidden" name="total_ques" value="'+json.length+'" />';
			
			$('#creaded_questions').empty();
			$('#creaded_questions').append(node_html);
			
			if(json != ''){
			if(jQuery('.flexbannerslider ul.head li:last-child').hasClass('active')){
				$('#creaded_questions').append('<a id="nextSlider" href="javascript:void(0)" onClick="questionCompleted(this)"  class="Next flex-next btn btn-primary">Finish</a>');
			} else {
				$('#creaded_questions').append('<a id="prevSlider" href="javascript:void(0)" onClick="prevSlider()" class="previous flex-prev btn btn-primary margin_right10" style="display:none;">Previous</a><a id="nextSlider" href="javascript:void(0)" onClick="nextSlider()"  class="Next flex-next btn btn-primary">Next</a>');
				
			}
			}
			
			$('#tab2').hide();
			$('.questions').removeClass('hide');
			$('#form_next a').click();
			
			/*$('.flexbannerslider').flexslider({
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
		  });*/
	  
		}
		});
}
function nextSlider(){
	var check_checked = validation();
	var webformpos;
	if(check_checked){
		//jQuery('.flexbannerslider').flexslider('next');
        //webformpos = <?php //$webform_details[0]->desc; ?>
		//alert(webformpos);
		jQuery('.head.slides .active').removeClass('<?php echo $entranceAnimation; ?>').addClass('<?php echo $exitAnimation;?>').addClass('completed');
		jQuery('.head.slides .active').next('li').removeClass('<?php echo $exitAnimation;?> notcompleted').addClass('<?php echo $entranceAnimation; ?>').addClass('active');
		jQuery('.head.slides .active.completed').removeClass('active');
		$('#prevSlider').show();
		if($('.flexbannerslider .active').hasClass('lead_form')){
			//$('.leadformcontainer form fieldset legend').before('<h3>'+$('#lead_title').val()+'</h3><p>'+$('#lead_desc').val()+'</p>');
			$('#prevSlider , #nextSlider').hide();
			leadFormValidation();
			$('.leadformcontainer form').attr('onSubmit','return validateWebForm(event);');
			$('#button').attr('type','submit');
		} 

		if(jQuery('.flexbannerslider ul.head li:last-child').hasClass('active')){
			$('#nextSlider').html('Finish').attr('onClick','questionCompleted(this)');
		} else {
			$('#nextSlider').show();
		}
		var num_slide = parseInt($('#bar').attr('num_slide'));
		var cur_slide = parseInt($('#bar').attr('cur_slide'));
		$('#bar').attr('cur_slide',cur_slide + 1);
		var increase = 100/num_slide;
		$('#bar .bar').css('width',(cur_slide + 1)*increase+'%').text(Math.round((cur_slide + 1)*increase)+'%');
	} else {
		alert('Select your answer');
	}
}
function prevSlider(){
	//jQuery('.flexbannerslider').flexslider('prev');
	jQuery('.head.slides .active').removeClass('<?php echo $entranceAnimation; ?>').addClass('<?php echo $exitAnimation;?>').addClass('notcompleted');
	jQuery('.head.slides .active').prev('li').removeClass('<?php echo $exitAnimation;?> completed').addClass('<?php echo $entranceAnimation; ?>').addClass('active').show();
	jQuery('.head.slides .active.notcompleted').removeClass('active');
		if($('.flexbannerslider .active').hasClass('lead_form')){
			$('#prevSlider , #nextSlider').hide();
			$('.leadformcontainer form').attr('onSubmit','return validateWebForm(event);');
			$('#button').attr('type','submit');
		} else {
			$('#prevSlider').show();
		}
	if(jQuery('.flexbannerslider ul li:first-child').hasClass('active')){
		$('#prevSlider').hide();
	}
	
	$('#nextSlider').html('Next').attr('onClick','nextSlider()');
	var num_slide = parseInt($('#bar').attr('num_slide'));
	var cur_slide = parseInt($('#bar').attr('cur_slide'));
	$('#bar').attr('cur_slide',cur_slide - 1);
	var increase = 100/num_slide;
	$('#bar .bar').css('width',(cur_slide - 1)*increase+'%').text(Math.round((cur_slide - 1)*increase)+'%');
}
function questionCompleted(e){
	var check_checked = validation();
	if(check_checked){
		$('#tab4').hide();
		//$('.completed').removeClass('hide');
		if($(e).closest('.tab-pane').next('.tab-pane').hasClass('tab_form')){
			$('.leadformcontainer form').attr('onSubmit','return validateWebForm(event);');
			$('#button').attr('type','submit');
		} else {
			checkAnswer();
		}
		$(e).closest('.tab-pane').hide();
		$(e).closest('.tab-pane').next('.tab-pane').show();
		
	} else {
		alert('Select your answer');
	}
}
function checkAnswer(){
	$.ajax({
		type: "POST",
		url: "<?php echo base_url(); ?>quiz/get_answers",
		data: $('#questionsForm').serialize()+'&FirstName='+$('.leadformcontainer #FirstName').val()+'&Email='+$('.leadformcontainer #Email').val(),
		success: function( data ) {
			$('#complete_quiz').empty();
			$('#complete_quiz').append(data);
		}
	});
}
function validation(){
	if($('.flexbannerslider .active input[type="radio"]').length){
	var checked = false, countChecked = 0;
	$('.flexbannerslider .active input[type="radio"]').each(function(){
		if($(this).is(':checked')){
			checked = true;
			countChecked++;
		}
	});

		if($('.flexbannerslider .active .questions_wrapper').length == countChecked){
			return checked;
		} else {
			return false;
		}
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
	$(e).parent().prev('h3.quiz_title').hide();
	$(e).next('.prarent_con').show();
	$(e).next('.prarent_con').children('h3').show();
	if($(e).next('.prarent_con').children('.child').length){
		$(e).next('.prarent_con').children('.child').each(function() {
			$(this).show();
		});
	} else{
		var node_id = $(e).attr('real-value');
		getQuestions(node_id);
	}
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