<?php if(isset($quiz_details)){
	$quizId = $quiz_details[0]->id;
	$quizName = $quiz_details[0]->name;
	$quizDesc = $quiz_details[0]->desc;
	$quizUrl = $quiz_details[0]->url;
	$res_top = $quiz_details[0]->res_top;
	$res_bot = $quiz_details[0]->res_bot;
	$shared_text = $quiz_details[0]->shared_text;
} else {	$quizId = '';$quizName = '';$quizDesc = '';$quizUrl = ''; $res_top=''; $res_bot ='';$shared_text = '';}

?>
<style>
.dropzone{min-height: 150px;}
.more_cat{display:none; margin-top:15px;}
.more_node{display:none;}
.appened_subnode{margin-left: 10%;}
.margin_right10{margin-right:10px;}
.child{margin-left:20px;}
</style>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="page-title">
                            <h1>Quiz categories
                                <small></small>
                            </h1>
                            <ol class="breadcrumb">
                                <li><i class="fa fa-dashboard"></i>  <a href="index.html">Quiz</a>
                                </li>
                                <li class="active">categories</li>
                            </ol>
                        </div>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
				<div class="row">

                    <div class="col-lg-12">
					    <div id="rootwizard">
    <div class="navbar">
    <div class="navbar-inner">
    <div class="container1">
    <ul>
    <li><a onClick="setFormNext(this)" form_num = "1" href="#tab1" data-toggle="tab">Create Quiz</a></li>
    <li><a onClick="setFormNext(this)" href="#tab2" form_num = "2" data-toggle="tab">Create Catagory</a></li>
    <li><a onClick="setFormNext(this)" href="#tab3" form_num = "3" data-toggle="tab">Decision Node</a></li>
    <li><a onClick="setFormNext(this)" href="#tab4" form_num = "4" data-toggle="tab">Determine Questions</a></li>
    <li><a onClick="setFormNext(this)" href="#tab5" form_num = "5" data-toggle="tab">Apply Form Actions</a></li>
    <li><a onClick="setFormNext(this)" href="#tab6" form_num = "6" data-toggle="tab">Complete Quiz</a></li>
    </ul>
    </div>
    </div>
    </div>
	<div id="bar" class="progress progress-striped active">
<div class="bar" style="width: 14.2857%;"></div>
</div>
    <div class="tab-content">
    <div class="tab-pane" id="tab1">
		<div class="row">
					<div class="col-lg-12">

                                <div class="portlet portlet-default">
                                    <div class="portlet-heading">
                                        <div class="portlet-title">
                                            <h4>Quiz</h4>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                    <div class="portlet-body">
									<form role="form" method="post" class="submit_form" action="<?php echo base_url(); ?>admin/questions/quiz_details">
                                        <div class="form-group">
										  <label for="quiz_uname">Give your quiz a unique name</label>
										  <input type="text" class="form-control" id="quiz_uname" placeholder="Enter Name" name="quiz_uname" value="<?php echo $quizName; ?>">
									   </div>
									   <div class="form-group">
										  <label for="quiz_desc">Create a friendly description</label>
										  <textarea id="quiz_desc" class="form-control" name="quiz_desc" ><?php echo $quizDesc; ?></textarea>
									   </div>
                                       <div class="form-group">
										  <label for="res_top">Result page top content</label>
										  <textarea id="res_top" class="form-control" name="res_top" ><?php echo $res_top; ?></textarea>
									   </div>
                                       <div class="form-group">
										  <label for="res_bot">Result page bottom content</label>
										  <textarea id="res_bot" class="form-control" name="res_bot" ><?php echo $res_bot; ?></textarea>
									   </div>
                                       <div class="form-group">
										  <label for="shared_text">Shared text</label>
										  <textarea id="shared_text" class="form-control" name="shared_text" ><?php echo $shared_text; ?></textarea>
									   </div>
                                       <input type="hidden" id="quiz_id" name="quiz_id" class="quiz_id" value="<?php echo $quizId; ?>" />
									 </form>
                                    </div>
                                </div>
                                <!-- /.portlet -->

                            </div>
		</div>
    </div>
					<div class="tab-pane" id="tab2">
                            <div class="row">

                            <div class="col-lg-12">

                                <div class="portlet portlet-default">
                                    <div class="portlet-heading">
                                        <div class="portlet-title">
                                            <h4>Add Categories</h4>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                    <div class="portlet-body">
                                    <form role="form" method="post" class="submit_form" action="<?php echo base_url(); ?>admin/questions/category_save">
                                        <div class="form-group">
                                        <label>Choose how many Categories</label>
                                        <?php if(!empty($created_categories) && isset($created_categories)){
											$selected =count($created_categories);
										} else{
											$selected =1;
										} ?>
										<select name="num_cate" id="num_cate" class="form-control" onclick="selectNumCategory(this)">
                                        <?php for($i=1; $i<=5; $i++){ 
										$select = '';
										if($selected == $i){ $select = 'selected = selected';}
											echo '<option '.$select.' value="'.$i.'">'.$i.'</option>';
										} ?>
										</select>
                                        </div>
										<div id="append_category">
                                        <?php 
										for($i=1; $i<=5; $i++){ 
										if(!empty($created_categories) && isset($created_categories[$i-1])){
											$curCategory = $created_categories[$i-1];
											$catId = $curCategory->id;
											$catName = $curCategory->name;
											$catDesc = $curCategory->desc;
											$catImage = $curCategory->image;
										} else {
											$catId = '';
											$catName = '';
											$catDesc = '';
											$catImage = '';
										}
										?>
                                        <div class="category_con<?php echo $i; ?> more_cat" <?php if($i<=$selected){ echo 'style="display:block;"'; } ?>>
                                        <div class="form-group">
										  <label for="quiz_uname">Category <?php echo $i; ?></label>
										  <input type="text" class="form-control" id="cat_name<?php echo $i; ?>" name="cat_name<?php echo $i; ?>" placeholder="Enter Name" value="<?php echo $catName; ?>" />
									   </div>
									   <div class="form-group">
										  <label for="inputfile">Description</label>
										  <textarea id="cat_desc<?php echo $i; ?>" class="form-control" name="cat_desc<?php echo $i; ?>" ><?php echo $catDesc; ?></textarea>
									   </div>
                                       <label for="inputfile">Image</label>
                                       <?php if($catImage != ''){
										   echo '<div class="cat_image"><img src="'.base_url('uploads').'/'.$catImage.'" alt="'.$catName.'" /></div>';
									   }?>
										<div id="my-dropzone<?php echo $i; ?>" class="dropzone"></div>
                                        <input type="hidden" class="uploaded_img" name="uploaded_img<?php echo $i; ?>" value="<?php echo $catImage; ?>" />
                                        <input type="hidden" id="cat_id<?php echo $i; ?>" name="cat_id<?php echo $i; ?>" class="cat_id" value="<?php echo $catId; ?>" />
                                        </div>
                                        <?php } ?>
										</div>
                                        <input type="hidden" id="quiz_id" name="quiz_id" class="quiz_id" value="<?php echo $quizId; ?>" />
                                        </form>
                                    </div>
                                </div>
                                <!-- /.portlet -->

                            </div>
                            <!-- /.col-lg-12 (nested) -->
						</div>
    </div>
    <div class="tab-pane" id="tab3">
    <div class="row">

                            <div class="col-lg-12">

                                <div class="portlet portlet-default">
                                    <div class="portlet-heading">
                                        <div class="portlet-title">
                                            <h4>Add Decision Node</h4>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                    <div class="portlet-body">
                                       <form role="form" method="post" class="submit_form" action="<?php echo base_url(); ?>admin/questions/node_details">
                                        <div class="form-group">
                                        <label>Choose how many Decision Node</label>
                                        <?php if(!empty($created_nodes) && isset($created_nodes)){
											$selected =count($created_nodes);
										} else{
											$selected =2;
										} ?>
										<select name="num_node" id="num_node" class="form-control" onclick="selectNumNode(this)">
                                        <?php for($i=2; $i<=12; $i++){ 
										$select = '';
										if($selected == $i){ $select = 'selected = selected';}
											echo '<option '.$select.' value="'.$i.'">'.$i.'</option>';
										} ?>
										</select>
                                        </div>
									<div id="append_node">
                                    	<?php for($i=1; $i<=12; $i++){ 
										if(!empty($created_nodes) && isset($created_nodes[$i-1])){
											$curNode = $created_nodes[$i-1];
											$nodeId = $curNode->id;
											$nodeNameJson = $curNode->name;
											$nodeArray = json_decode($nodeNameJson);
											var_dump($nodeArray);
											$nodeName = $nodeArray[0][0];
										} else {
											$nodeName = '';
											$nodeId = '';
											$nodeArray = '';
										}
										?>
										<div class="node_con<?php echo $i; ?> more_node" <?php if($i<=$selected){ echo 'style="display:block;"'; } ?>>
                                            <div class="form-group">
                                              <label for="note_name<?php echo $i; ?>">Node <?php echo $i; ?></label>
                                              <input type="text" onKeyUp="change_btn_txt(this,'<?php echo $i; ?>')" class="form-control" id="note_name<?php echo $i; ?>" name="note_name<?php echo $i; ?>[0][]" placeholder="Enter Node" value="<?php echo $nodeName; ?>" /><input type="hidden" name="node_hid_id<?php echo $i; ?>" id="node_hid_id<?php echo $i; ?>" value="<?php echo $nodeId;?>" /></div>
                                           <div class="form-group">
                                           <input type="button" class="node_btn<?php echo $i; ?> btn btn-primary margin_right10" value="<?php echo $nodeName; ?>" /><a level="0" node_id="<?php echo $i; ?>" cur_node="" href="javascript:void(0)" class="margin_right10" onClick="addSubNode(this)"><i class="fa fa-plus"></i> Sub Node</a><a level="0" node_id="<?php echo $i; ?>" cur_node="" href="javascript:void(0)" class="margin_right10" onClick="removeSubNode(this)"><i class="fa fa-minus"></i> Remove Child Node</a>
                                           </div>
                                           <div class="appened_subnode">
                                           <?php if($i<=$selected && count($nodeArray)>1){
											   foreach($nodeArray[1] as $nodeArr){
												   echo '<div class="form-group"><input type="text" class="form-control" name="note_name'.$i.'['.$i.'][]" placeholder="Enter Node" value="'.$nodeArr.'"></div><div class="appened_subnode"></div>';
											   }
										   }?>
                                           </div>
                                       </div>	
										<?php } ?>
									</div>
                                    <input type="hidden" name="quiz_id" class="quiz_id" value="<?php echo $quizId; ?>" />
                              </form>
                                    </div>
                                </div>
                                <!-- /.portlet -->

                            </div>
						</div>
    </div>
    <div class="tab-pane" id="tab4">
    <div class="row">

                            <div class="col-lg-8">

                                <div class="portlet portlet-default">
                                    <div class="portlet-heading">
                                        <div class="portlet-title">
                                            <h4>Add Questions</h4>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                    <div class="portlet-body">
										<form action="<?php echo base_url(); ?>admin/questions/questions_paper" id="questionsForm" class="" method="post" role="form">
										<div class="form-group">
										<label>Questions</label>
                                        <input type="text" class="form-control" maxlength="50" placeholder="Enter Questions" id="questions" name="questions" />
										</div>
                                        <div class="form-group">
										<label>Select Category</label>
                                        <select id="creaded_category" name="creaded_category" class="form-control">
                                        <?php if(isset($created_categories) && $created_categories != ''){
											echo '';
											foreach($created_categories as $cate){
											echo '<option value="'.$cate->id.'">'.$cate->name.'</option>';
											}
											echo '';
										}; ?>
                                        </select>
										</div>
                                        
                                        <div class="form-group">
										<label>Select Node</label>
                                        <div id="creaded_node">
                                        <?php if(isset($created_nodes) && $created_nodes != ''){
											echo '';
											foreach($created_nodes as $node){
												$nodeNameJson = $node->name;
												$nodeArray = json_decode($nodeNameJson);
												$nodeName = $nodeArray[0][0];
											echo '<input type="radio" name="ques_nodes_parent" value="'.$node->id.'" onclick="parentNodeClick()" />'.$nodeName;
											if(count($nodeArray)>1){
												$child = 0;
												echo '<div class="prarent_con">';
										   foreach($nodeArray[1] as $nodeArr){ $child++;
											echo '<div class="child"><input type="radio" name="ques_nodes_child" id="child_node_'.$node->id.'_'.$child.'" value="'.$node->id.'_'.$child.'" onclick="selectNodeRadio(this)" />'.$nodeArr.'</div>';
											   }
												echo '</div>';
											}
											}
											echo '';
										};  ?>
                                        </div>
										</div>
                                        
										<label>Options</label>
										<div class="form-group">
										  <h4>Option1</h4>
										  <input type="text" class="form-control question_options" id="option1" placeholder="Enter option1" name="option[]">
									   </div>
										<div class="form-group">
										  <h4>Option2</h4>
										  <input type="text" class="form-control question_options" id="option2" placeholder="Enter option2" name="option[]">
									   </div>
                                       <div id="added_options">
                                       </div>
                                       <div class="form-group">
                                       <a href="javascript:void(0);" onClick="addMoreOptions()"><i class="fa fa-plus"></i> More Options</a>
                                       </div>
                                       		<input type="hidden" id="num_option" name="num_option" value="2" />
										<div class="form-group">
										  <label>Answer</label>
											<select name="answer" id="answer" class="form-control" >
											<option value="1">1</option>
											<option value="2">2</option>
											<option value="3">3</option>
											<option value="4">4</option>
											</select>
										</div>
										<input type="button" class="btn btn-primary" name="more_question" onclick="questionsFormSubmit()" value="Add another Question" id="more_question" />
                                        <input type="hidden" name="quiz_id" class="quiz_id" value="<?php echo $quizId; ?>" />
										</form>
                                    </div>
                                </div>
                                <!-- /.portlet -->

                            </div>
                            <!-- /.col-lg-12 (nested) -->
							<div class="col-lg-4">
                            <div id="qustions_category_wise"></div>
                            <?php if(isset($created_categories) && $created_categories != ''){
											foreach($created_categories as $cate){
												$categoyquiz = $this->Quiz_model->getQuestionByCatId($cate->id); ?>
								<div class="portlet portlet-default">
                                    <div class="portlet-heading">
                                        <div class="portlet-title">
                                            <h4><?php echo $cate->name; ?></h4>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                    <div class="portlet-body">
										<ul id="creaded_questions" class="">
                                        	<?php foreach($categoyquiz as $cat_quiz){
												echo '<li><a href="javascript:void(0)" onClick="editQuestions('.$cat_quiz->id.')">'.$cat_quiz->questions.'</a></li>';
											} ?>
										</ul>
									</div>
							</div>
                            
                            <?php }}; ?>

                        </div>
						</div>
    </div>
    <div class="tab-pane" id="tab5">
    <div class="row">

                            <div class="col-lg-12">

                                <div class="portlet portlet-default">
                                    <div class="portlet-heading">
                                        <div class="portlet-title">
                                            <h4>Form Actions</h4>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                    <div class="portlet-body">
                                    <form role="form" method="post" class="submit_form" action="<?php echo base_url(); ?>admin/questions/form_actions">
                                        <div class="form-group">
                                        <label>how many questions will be displayed per page</label>
										<select name="ques_per_page" class="form-control">
											<?php 
											if(isset($quiz_form_actions[0])){
												$form_action_id = $quiz_form_actions[0]->id;
												$npp = $quiz_form_actions[0]->num_per_page;
												$pass_by = $quiz_form_actions[0]->passed_by;
												} else{ $npp = '';$pass_by = '';$form_action_id='';}
											for($i=1; $i<=5; $i++){ 
											$select = '';
											if($npp == $i){ $select = 'selected = selected';}
												echo '<option '.$select.' value="'.$i.'">'.$i.'</option>';
											} ?>
										</select>
                                        </div>
                                        
                                        <div class="form-group">
                                        <label>Passed by</label>
										<select name="passed_by" class="form-control" onclick="selectNumCategory(this)">
											<option <?php if($pass_by == 'Questions answered correctly'){ echo 'selected=selected';} ?> value="Questions answered correctly">Questions answered correctly </option>
											<option <?php if($pass_by == 'Catagory chosen'){ echo 'selected=selected';} ?> value="Catagory chosen">Catagory chosen</option>
										</select>
                                        </div>
                                        <div class="form-group">
                                        <label>Animation</label>
                                        <select class="input input--dropdown js--animations form-control" name="animation" id="animation">
        <optgroup label="Bouncing">
          <option value="bounceIn,bounceOut">bounceIn</option>
          <option value="bounceInDown,bounceOutDown">bounceInDown</option>
          <option value="bounceInLeft,bounceOutLeft">bounceInLeft</option>
          <option value="bounceInRight">bounceInRight</option>
          <option value="bounceInUp,bounceOutUp">bounceInUp</option>
        </optgroup>
        <optgroup label="Fading">
          <option value="fadeIn,fadeOut">fadeIn</option>
          <option value="fadeInDown,fadeOutDown">fadeInDown</option>
          <option value="fadeInDownBig,fadeOutDownBig">fadeInDownBig</option>
          <option value="fadeInLeft,fadeOutLeft">fadeInLeft</option>
          <option value="fadeInLeftBig,fadeOutLeftBig">fadeInLeftBig</option>
          <option value="fadeInRight,fadeOutRight">fadeInRight</option>
          <option value="fadeInRightBig,fadeOutRightBig">fadeInRightBig</option>
          <option value="fadeInUp,fadeOutUp">fadeInUp</option>
          <option value="fadeInUpBig,fadeOutUpBig">fadeInUpBig</option>
        </optgroup>

        <optgroup label="Flippers">
          <option value="flipInX,flipOutX">flipInX flipOutX</option>
          <option value="flipInY,flipOutY">flipInY, flipOutY</option>
        </optgroup>

        <optgroup label="Lightspeed">
          <option value="lightSpeedIn,lightSpeedOut">lightSpeedIn</option>
        </optgroup>

        <optgroup label="Rotating">
          <option value="rotateIn,rotateOut">rotateIn</option>
          <option value="rotateInDownLeft,rotateOutDownLeft">rotateInDownLeft</option>
          <option value="rotateInDownRight,rotateOutDownRight">rotateInDownRight</option>
          <option value="rotateInUpLeft,rotateOutUpLeft">rotateInUpLeft</option>
          <option value="rotateInUpRight,rotateOutUpRight">rotateInUpRight</option>
        </optgroup>

        <optgroup label="Sliders">
          <option value="slideInDown,slideOutUp">slideInDown</option>
          <option value="slideInLeft,slideOutLeft">slideInLeft</option>
          <option value="slideInRight,slideOutRight">slideInRight</option>
        </optgroup>

        <optgroup label="Specials">
          <option value="rollIn,rollOut">rollIn</option>
        </optgroup>
      </select>
                                        </div>
                                        <!--<div class="form-group">
                                        <label>Sharing default text</label>
                                        <input type="text" name="sharing_text" />
                                        </div>-->
                                        <input type="hidden" name="quiz_id" class="quiz_id" value="<?php echo $quizId; ?>" />
                                        <input type="hidden" name="form_action_id" class="form_action_id" value="<?php echo $form_action_id; ?>" />
                                        </form>
                                    </div>
                                </div>
                                <!-- /.portlet -->

                            </div>
						</div>
    </div>
    <div class="tab-pane" id="tab6">
    	<div class="portlet portlet-default">
                                    <div class="portlet-heading">
                                        <div class="portlet-title">
                                            <h4>Url</h4>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                    <div class="portlet-body">
                     <form role="form" method="post" class="submit_form" action="<?php echo base_url(); ?>admin/questions/quiz_url">
                                        <div class="form-group"><?php echo base_url('quiz/index/'); ?>        
        <input type="text" name="quiz_url" id="quiz_url" value="<?php echo $quizUrl; ?>" /><a href="javascript:void(0);" form_num="4" class="btn btn-primary" onclick="submitformurl()">Save</a>
        <input type="hidden" name="quiz_id" class="quiz_id" value="<?php echo $quizId; ?>" /><div id="url_save" class="url_save"></div></div>
			        </form>
        							</div>
        </div>
    </div>
    <ul class="pager wizard">
    <li class="previous first" style="display:none;"><a href="#">First</a></li>
    <li id="form_prev" class="previous"><a href="javascript:void(0);" form_num="1" onclick="prevform()">Previous</a></li>
    <li class="next last" style="display:none;"><a href="javascript:void(0);">Last</a></li>
    <li id="form_next" class="next"><a href="javascript:void(0);" form_num="1" onclick="submitform()">Next</a></li>
    </ul>
    </div>	
    </div>
                        <!-- /.row (nested) -->

                    </div>
                    <!-- /.col-lg-6 -->
                </div>
<script type="text/javascript">
function prevform(){
	var cur_form_num = $('#form_next a').attr('form_num');
	$('#form_next a').attr('form_num',parseInt(cur_form_num)-1);
}
function submitform(){
	var cur_form_num = $('#form_next a').attr('form_num');
	$('#form_next a').attr('form_num',parseInt(cur_form_num)+1);
if($('.tab-pane.active form.submit_form').length){
 var url = $('.tab-pane.active form.submit_form').attr('action');
 	$.ajax({
	type: "POST",
	url: url,
	data: $('.tab-pane.active form').serialize(),
	success: function( msg ) {
	 //alert( "Data Saved: " + msg );
	 	if(cur_form_num == 1){
		addQuizId(msg);
		} else if(cur_form_num == 2){
			var selected_num = $('#num_cate').val();
			for(var $i = selected_num; $i<=5; $i++){
				$('#cat_id'+$i).val('');
			}
			var json = JSON.parse(msg);
			for(var $i=1; $i<=json.length; $i++){
			$('#cat_id'+$i).val(json[$i-1]);
			}
	 	loadcategories();
		//loadnodes();
		} else if(cur_form_num == 3){
	 	//loadcategories();
		var selected_num = $('#num_node').val();
			for(var $i = selected_num; $i<=12; $i++){
				$('#node_hid_id'+$i).val('');
			}
			var json = JSON.parse(msg);
			for(var $i=1; $i<=json.length; $i++){
			$('#node_hid_id'+$i).val(json[$i-1]);
			}
		loadnodes();
		}
		 else if(cur_form_num == 5){
			 if(msg != 'url_saved'){
				 var json = JSON.parse(msg);
				$('#quiz_url').val(json.url);
			 }
		} 
	}
	});
	}
}
function submitformurl(){
	var cur_form_num = $('#form_next a').attr('form_num');
if($('.tab-pane.active form.submit_form').length){
 var url = $('.tab-pane.active form.submit_form').attr('action');
	$.ajax({
	type: "POST",
	url: url,
	data: $('.tab-pane.active form').serialize(),
	success: function( msg ) {
		$('#url_save').empty();
		$('#url_save').append(msg);
		}
	});
}
}
function loadcategories(){
	var $quiz_id = $('#quiz_id').val();
	if($quiz_id != ''){
	$.ajax({
		type: "POST",
		url: "<?php echo base_url('admin/questions/get_categories?quiz_id=');?>"+$quiz_id,
		success: function( data ) {
		 //alert( "Data Saved: " + msg );
			var json = JSON.parse(data);
			var category_html = '';
			for(var i=0; i< json.length; i++){
				category_html += '<option value="'+json[i].id+'">'+json[i].name+'</option>';
			}
			$('#creaded_category').empty();
			$('#creaded_category').append(category_html);
		}
		});
	}
}
function loadnodes(){
	var $quiz_id = $('#quiz_id').val();
	if($quiz_id != ''){
	$.ajax({
		type: "POST",
		url: "<?php echo base_url('admin/questions/get_nodes?quiz_id=');?>"+$quiz_id,
		success: function( data ) {
		 //alert( "Data Saved: " + msg );
			/*var json = JSON.parse(data);
			var node_html = '';
			for(var i=0; i< json.length; i++){
				var arry_node = getKeys(json[i].name);
				alert(arry_node);
				node_html += '<input type="radio" name="ques_nodes" value="'+json[i].id+'" />'+arry_node;
			}*/
			$('#creaded_node').empty();
			$('#creaded_node').append(data);
		}
		});
	}
}
var getKeys = function(arr) {
  var key, keys = [];
  for (i=0; i<arr.length; i++) {
    for (key in arr[i]) {
      keys.push(key);
    }
  }
  return keys;
};

function questionsFormSubmit(){
 var url = $('#questionsForm').attr('action');
 	$.ajax({
	type: "POST",
	url: url,
	data: $('#questionsForm').serialize(),
	success: function( data ) {
		var json = JSON.parse(data);
		var questions_html = '<ul>';
		for(var i=0; i< json.length; i++){
			questions_html += '<li class="ques'+i+'">'+json[i].questions+'</li>';
		}
		questions_html += '</ul>';
		/*$('#creaded_questions').empty();
		$('#creaded_questions').append(questions_html);*/
		$('#questionsForm').trigger('reset');
	}
	});
}
function selectNumCategory(e){
	var num = $(e).val();
	$('.more_cat').hide();
	for(var i=1; i<=num; i++){
		$('.category_con'+i).show();
	}
}
function selectNumNode(e){
	var num = $(e).val();
	$('.more_node').hide();
	for(var i=1; i<=num; i++){
		$('.node_con'+i).show();
	}
}
function change_btn_txt(e,num){
	var value = $(e).val();
	$('.node_btn'+num).val(value);
}
function setFormNext(e){
	var getFormNum = $(e).attr('form_num');
	$('#form_next a').attr('form_num',getFormNum);
}
function addQuizId(id){
	$('.quiz_id').each(function(){
		$(this).val(id);
	});
}
function addMoreOptions(){
	var current_option = parseInt($('#num_option').val())+1;
	$('#added_options').append('<div class="form-group"><h4>Option'+current_option+'</h4><input class="form-control question_options" id="option'+current_option+'"  type="text" name="option[]" placeholder="Enter option'+current_option+'"></div>');
	$('#answer').append('<option value="'+current_option+'">'+current_option+'</option>');
	$('#num_option').val(current_option);
}
function addSubNode(e){
	var cur_level = parseInt($(e).attr('level'))+1;
	var cur_id = parseInt($(e).attr('node_id'));
	$(e).parent('.form-group').next('.appened_subnode').append('<div class="form-group"><input type="text" placeholder="Enter Node" name="note_name'+cur_id+'['+cur_level+'][]" class="form-control"></div><div class="appened_subnode"></div><div class="form-group"><input type="text" placeholder="Enter Node" name="note_name'+cur_id+'['+cur_level+'][]" class="form-control"></div><div class="appened_subnode"></div>');
	/*<a onclick="addSublevel2Node(this)" class="margin_right10" href="javascript:void(0)" cur_node="" node_id="'+cur_id+'" level="'+cur_level+'"  level2="0"><i class="fa fa-plus"></i>Sub Node</a><a level="1" level2="0" node_id="<?php echo $i; ?>" cur_node="" href="javascript:void(0)" onClick="removeSubNode(this)"><i class="fa fa-minus"></i> Remove Child Node</a>*/
}
function addSublevel2Node(e){
	var cur_level = parseInt($(e).attr('level'))+1;
	var cur_level2 = parseInt($(e).attr('level2'))+1;
	var cur_id = parseInt($(e).attr('node_id'));
	$(e).parent('.form-group').next('.appened_subnode').append('<div class="form-group"><input type="text" placeholder="Enter Node" name="note_name'+cur_id+'['+cur_level2+']['+cur_level+'][]" class="form-control">');
	/*<a onclick="addSublevel3Node(this)" class="margin_right10" href="javascript:void(0)" cur_node="" node_id="'+cur_id+'" level="'+cur_level+'" level2="'+cur_level2+'"  level3="0" ><i class="fa fa-plus"></i>Sub Node</a><a level="1" level2="'+cur_level2+'" level3="0" node_id="<?php echo $i; ?>" cur_node="" href="javascript:void(0)" onClick="removeSubNode(this)"><i class="fa fa-minus"></i> Remove Child Node</a></div><div class="appened_subnode"></div>*/
}
function addSublevel3Node(e){
	var cur_level = parseInt($(e).attr('level'))+1;
	var cur_level2 = parseInt($(e).attr('level2'))+1;
	var cur_level3 = parseInt($(e).attr('level3'))+1;
	var cur_id = parseInt($(e).attr('node_id'));
	$(e).parent('.form-group').next('.appened_subnode').append('<div class="form-group"><input type="text" placeholder="Enter Node" name="note_name'+cur_id+'['+cur_level+']['+cur_level2+']['+cur_level3+'][]" class="form-control"></div>');
}
function removeSubNode(e){
	$(e).parent('.form-group').next('.appened_subnode').empty();
}
function selectNodeRadio(e){
	/*$('.child_radio').each(function() {
        $(this).removeAttr('checked');
    });
	$(e).attr('checked','checked');
	$(e).parent('.child').parent('.prarent_con').prev('input').attr('checked','checked');*/
}
function parentNodeClick(e){
	/*$('#creaded_node input').each(function(){
		$(this).removeAttr('checked');
	});	
	$(e).children('.prarent_con:first-child').children('.child:first-child').children('input').attr('checked','checked');*/
}
function editQuestions(cat_no){
 	$.ajax({
	type: "POST",
	url: "<?php echo base_url('admin/questions/edit_question');?>",
	data: 'cat_no='+cat_no,
	success: function( data ) {
		var json = JSON.parse(data);
		for(var i=0; i< json.length; i++){
			$('#questions').val(json[i].questions);
			<!-- set Options -->
			var ques_opt = json[i].options.split(',');
			var ques_opt_count = ques_opt.length;
			var totalOptions = $('.question_options').length;
			if(ques_opt_count >= totalOptions){
				var pos=0;
				for(var $i=1; $i<=totalOptions; $i++){
					$('#option'+$i).val(ques_opt[pos]);
					pos++;
				}
				for(var $i=totalOptions+1; $i<=ques_opt_count; $i++){
					var current_option = parseInt($('#num_option').val())+1;
	$('#added_options').append('<div class="form-group"><h4>Option'+current_option+'</h4><input class="form-control question_options" id="option'+current_option+'"  type="text" name="option[]" placeholder="Enter option'+current_option+'" value="'+ques_opt[pos]+'"></div>');
					$('#num_option').val(current_option);
					pos++;
				}
			} else {
				for(var $i=ques_opt_count+1; $i<=totalOptions; $i++){
					var current_option = parseInt($('#num_option').val())-1;
					$('#option'+$i).parent('.form-group').remove();
					$('#num_option').val(current_option);
				}
			}
			<!-- /set Options -->
			
			$('#creaded_category').val(json[i].cat_id);
			$('#child_node_'+json[i].node_id).attr('checked','checked');
			$('#answer').val(json[i].answer);
		}
	}
	});
}
</script>
<script>
  // myDropzone is the configuration for the element that has an id attribute
  // with the value my-dropzone (or myDropzone)

</script>