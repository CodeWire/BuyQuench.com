<?php if(isset($quiz_details)){
	$quizId = $quiz_details[0]->id;
	$quizName = $quiz_details[0]->name;
	$quizDesc = $quiz_details[0]->desc;
	$quizUrl = $quiz_details[0]->url;
	$res_top = $quiz_details[0]->res_top;
	$res_bot = $quiz_details[0]->res_bot;
	$shared_text = $quiz_details[0]->shared_text;
	$webform_id = $quiz_details[0]->webform_id;
	$webform_pos = $quiz_details[0]->webform_pos;
	$quizTheme = $quiz_details[0]->theme;
} else {	$quizId = '';$quizName = '';$quizDesc = '';$quizUrl = ''; $res_top=''; $res_bot ='';$shared_text = '';$webform_id = '';$quizTheme = '';}

?>
<style>
.dropzone{min-height: 150px;}
.more_cat{display:none; margin-top:15px;}
.more_node{display:none;}
.appened_subnode{margin-left: 10%;}
.margin_right10{margin-right:10px;}
.child{margin-left:20px;}
.quiz_page .col-lg-12, .quiz_page .col-lg-6{position:static;}
.quiz_page .form-horizontal .radio, .quiz_page .form-horizontal .checkbox{min-height:20px;}
textarea {display: block;width: 100%;height: 34px;padding: 6px 12px;font-size: 14px;line-height: 1.428571429;color: #555;background-color: #fff;background-image: none;border: 1px solid #ccc;border-radius: 4px;-webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075);box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075);-webkit-transition: border-color ease-in-out .15s, box-shadow ease-in-out .15s;transition: border-color ease-in-out .15s, box-shadow ease-in-out .15s;}textarea:focus {border-color: #66afe9;outline: 0;-webkit-box-shadow: inset 0 1px 1px rgba(0,0,0,.075), 0 0 8px rgba(102, 175, 233, .6);box-shadow: inset 0 1px 1px rgba(0,0,0,.075), 0 0 8px rgba(102, 175, 233, .6);}
textarea{height:auto;}
.component{margin-bottom: 15px;}
.nav > li.tab_rendered{display:none;}

.preview_btn{margin-right:15px;}
.themesContainer h3{text-transform: capitalize;}
.themesContainer img{max-width:100%;}
.themesContainer ul:after{clear:both; content:"."; display:block; visibility:hidden; height:0;}
.themesContainer ul{list-style:none; padding:0;}
.themesContainer form{border:1px solid transparent;}
.themesContainer form.active{border:1px solid #3276B1;}
#update_theme h3{text-transform:capitalize;}
@media (min-width: 1200px) { .flexbannerslider .lead_form .tags_button label{display:block;}
#themeModal .modal-dialog{ width:1000px;} }

/* Sortable items */
.sortable-list_forms, .sortable-list_tags, .sortable-list {list-style: none;margin: 0;min-height: 60px;padding: 0px;border: 1px solid #8E8E8E;}
/*.sortable-list{border-top:none;}.sortable-list_tags{border-bottom:none;}*/
.sortable-list_forms{border:none; min-height:400px;}.sortable-list_forms .sortable-item{background:none; padding:50px 0 0 0; border:none;}
.formsContent:first-child {margin-right: 30px;}
.formsContent h3, .formsContent p{ font:"Gill Sans", "Gill Sans MT", "Myriad Pro", "DejaVu Sans Condensed", Helvetica, Arial, sans-serif 25px; color:#384a6d;}
.formsContent p{font-size:14px;}

.sortable-item {background: #f0efef; /* Old browsers */
background: -moz-linear-gradient(top,  #f0efef 0%, #ffffff 48%, #f0efef 100%); /* FF3.6+ */
background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,#f0efef), color-stop(48%,#ffffff), color-stop(100%,#f0efef)); /* Chrome,Safari4+ */
background: -webkit-linear-gradient(top,  #f0efef 0%,#ffffff 48%,#f0efef 100%); /* Chrome10+,Safari5.1+ */
background: -o-linear-gradient(top,  #f0efef 0%,#ffffff 48%,#f0efef 100%); /* Opera 11.10+ */
background: -ms-linear-gradient(top,  #f0efef 0%,#ffffff 48%,#f0efef 100%); /* IE10+ */
background: linear-gradient(to bottom,  #f0efef 0%,#ffffff 48%,#f0efef 100%); /* W3C */
filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#f0efef', endColorstr='#f0efef',GradientType=0 ); /* IE6-9 */
border-bottom: 1px solid #d9d7d7;cursor: move;display: block;font-weight: bold;margin-bottom: 0px;padding: 7px 20px;}
.placeholder {background-color: #F3F2F2;border: 1px dashed #ccc;height: 32px;margin-bottom: 5px;}
.web_form_container form, .web_form_container input, .web_form_container button{cursor:move;}
.hide_edit{position:absolute; left:0; top:0; width:100%; height:100%; z-index:5; cursor:move;}
.sortable-item > span {display: block; background:url("<?php echo base_url().'/assets/img/move.png'; ?>") no-repeat  scroll right 0 rgba(0, 0, 0, 0);line-height: 23px;}
.web_form_container{color:384a6d;}
.sortable-list_forms .lead_title, .sort_order_forms .formsContent{display:none;}
.sort_order_forms .sortable-item.lead_capture_form{background: #344960; /* Old browsers */
background: -moz-linear-gradient(top,  #344960 0%, #395a7f 48%, #344960 100%); /* FF3.6+ */
background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,#344960), color-stop(48%,#395a7f), color-stop(100%,#344960)); /* Chrome,Safari4+ */
background: -webkit-linear-gradient(top,  #344960 0%,#395a7f 48%,#344960 100%); /* Chrome10+,Safari5.1+ */
background: -o-linear-gradient(top,  #344960 0%,#395a7f 48%,#344960 100%); /* Opera 11.10+ */
background: -ms-linear-gradient(top,  #344960 0%,#395a7f 48%,#344960 100%); /* IE10+ */
background: linear-gradient(to bottom,  #344960 0%,#395a7f 48%,#344960 100%); /* W3C */
filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#344960', endColorstr='#344960',GradientType=0 ); /* IE6-9 */
}
.sort_order_forms .sortable-item.lead_capture_form span{color: #FFFFFF;background:url("<?php echo base_url().'/assets/img/move_white.png'; ?>") no-repeat  scroll right 0 rgba(0, 0, 0, 0);}
/*.selectbasic_popup .controls label:first-child, .selectbasic_popup .controls #id{ display:none;}*/
</style>
<div class="quiz_page">
 
 <div class="row">
                    <div class="col-lg-12">
                        <div class="page-title">
                            <h1>Quiz categories
                                <small></small>
                            </h1>
                            <ol class="breadcrumb">
                                <li><i class="fa fa-dashboard"></i>  <a href="<?php echo base_url(); ?>">Quiz</a>
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
    <li><a onClick="setFormNext(this)" href="#tab7" form_num = "7" data-toggle="tab">Select Theme</a></li>
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
											$offerUrl = $curCategory->offer_url;
											$offerBtnTxt = $curCategory->offer_btn;
											$winTag = $curCategory->win_tag;
											$catDesc = $curCategory->desc;
											$catImage = $curCategory->image;
										} else {
											$catId = '';
											$catName = '';
											$catDesc = '';
											$offerUrl = '';
											$offerBtnTxt = '';
											$winTag = '';
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
                                       <div class="form-group">
										  <label for="inputfile">Offer Page(optional)</label>
                                          <input type="text" class="form-control" id="offer_url<?php echo $i; ?>" name="offer_url<?php echo $i; ?>" placeholder="Enter Offer Url" value="<?php echo $offerUrl; ?>" />
                                       </div>
                                       <div class="form-group">
                                       		<label for="inputfile">Offer Button Text</label>
                                            <input type="text" class="form-control" id="offer_btn_txt<?php echo $i; ?>" name="offer_btn_txt<?php echo $i; ?>" placeholder="Enter Offer Button Text" value="<?php echo $offerBtnTxt; ?>" />
                                       </div>
                                       <div class="form-group">
                                       		<label for="inputfile">Wining Tag</label>
                                            <input type="text" class="form-control" id="win_tag<?php echo $i; ?>" name="win_tag<?php echo $i; ?>" placeholder="Enter Wining Tag" value="<?php echo $winTag; ?>" />
                                       </div>
                                       <!--<div class="form-group">
                                       		<label for="inputfile">Select your Order Form</label>
                                            <select class="form-control" id="order_form<?php echo $i; ?>" name="order_form<?php echo $i; ?>">
                                            <?php /*foreach($orderforms as $orderform){
												echo '<option value="'.$orderform->id.'">'.$orderform->Name.'</option>';
											}*/ ?>
                                            
                                            </select>
                                       </div>-->
                                       
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
                                        <?php if(!empty($created_ParentNodes) && isset($created_ParentNodes)){
											$selected =count($created_ParentNodes);
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
                                        <?php 
										if(!empty($created_nodes) && isset($created_nodes)){
											$curNode = $created_nodes[0];
											$nodeId = $curNode->id;
											$nodeTitle = $curNode->name;
										} else {
											$nodeId = '';
											$nodeTitle = '';
										}
										?>
                                        <div class="form-group">
                                              <label for="note_title1">Node Title</label>
                                              <input type="text" class="form-control" id="note_title1" name="note_title1" placeholder="Enter Node title" value="<?php echo $nodeTitle; ?>" /><input type="hidden" name="cur_node_id" id="cur_node_id" value="<?php echo $nodeId; ?>" />
                                              </div>
                                              
									<div id="append_node">
                                    	<?php for($i=1; $i<=12; $i++){ 
										/*if(!empty($created_nodes) && isset($created_nodes[$i-1])){
											$curNode = $created_nodes[$i-1];
											$nodeId = $curNode->id;
											$nodeNameJson = $curNode->name;
											$nodeArray = json_decode($nodeNameJson);
											$nodeName = $nodeArray[0][0];
										} else {
											$nodeName = '';
											$nodeId = '';
											$nodeArray = '';
										}*/
										//var_dump($created_ParentNodes);
										if(isset($created_ParentNodes[$i-1]) && !empty($created_ParentNodes)){
											$curParentNode = $created_ParentNodes[$i-1];
											$tagLookId = $curParentNode->id;
											$tagLookName = $curParentNode->name;
											$tagParent = $curParentNode->parent_id;
											$tagId = $curParentNode->tag_id;
										} else {
											$tagLookId = '';
											$tagLookName = '';
											$tagParent = '';
											$tagId = '';
										}
										?>
										<div class="node_con<?php echo $i; ?> more_node" <?php if($i<=$selected){ echo 'style="display:block;"'; } ?>>
                                              <div class="form-group">
                                              <label for="note_name<?php echo $i; ?>">Node <?php echo $i; ?></label>
                                              <input type="text" onKeyUp="change_btn_txt(this,'<?php echo $i; ?>')" class="form-control" id="note_name<?php echo $i; ?>" name="note_name<?php echo $i; ?>" placeholder="Enter Node" value="<?php echo $tagLookName; ?>" />
                                              <input type="hidden" name="node_hid_id<?php echo $i; ?>" id="node_hid_id<?php echo $i; ?>" value="<?php  echo $tagLookId;?>" /></div>
                                           <div class="form-group">
                                           <input type="button" class="node_btn<?php echo $i; ?> btn btn-primary margin_right10" value="<?php echo $tagLookName; ?>" />
                                           <a level="0" node_id="<?php echo $i; ?>" cur_node="" href="javascript:void(0)" class="margin_right10" onClick="addSubNode(this)"><i class="fa fa-plus"></i> Sub Node</a><a level="0" node_id="<?php echo $i; ?>" cur_node="" href="javascript:void(0)" class="margin_right10" onClick="removeSubNode(this)"><i class="fa fa-minus"></i> Remove Child Node</a>
                                           </div>
                                           <div class="appened_subnode"><?php 
										   $subnodeDetails = $this->Quiz_model->getSubNodes($quizId, $tagLookId);
										   //var_dump($subnodeDetails); exit(0);
										   if($i<=$selected && !empty($subnodeDetails)){
											   $subCount =0;
											   foreach($subnodeDetails as $subnodeDetail){
												   $subCount++;
												   if($subCount == 1){
													   echo '<div class="form-group subform"><label>SubNode Title</label><input type="text" class="form-control" name="subnode_title'.$i.'" value="'.$subnodeDetail->tag_title.'"><input type="hidden" id="tot_subnode'.$i.'" name="tot_subnode'.$i.'" value="'.count($subnodeDetails).'" /><input type="hidden" value="'.$subnodeDetail->tag_id.'" id="cur_subnode_id'.$i.'" name="cur_subnode_id'.$i.'" /></div>';
												   }
												   echo '<div class="form-group"><input type="text" placeholder="Enter Node" name="subnote_name'.$i.'_'.$subCount.'" value="'.$subnodeDetail->name.'" class="form-control"></div><input type="hidden" id="cur_subnode_hid_id'.$i.'_'.$subCount.'" name="cur_subnode_hid_id'.$i.'_'.$subCount.'" value="'.$subnodeDetail->id.'" /><div class="appened_subnode"></div>';
											   }
										   } ?></div>
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
                                        <?php if(isset($created_ParentNodes) && $created_ParentNodes != ''){
											echo '';
											foreach($created_ParentNodes as $curParentNode){
												/*$nodeNameJson = $node->name;
												$nodeArray = json_decode($nodeNameJson);
												$nodeName = $nodeArray[0][0];*/
												$tagLookId = $curParentNode->id;
											$tagLookName = $curParentNode->name;
											$tagParent = $curParentNode->parent_id;
											$tagId = $curParentNode->tag_id;
											
											echo '<input type="radio" name="ques_nodes_parent" id="parent_node_'.$tagLookId.'" value="'.$tagLookId.'" onclick="parentNodeClick()" />'.$tagLookName;
											$subnodeDetails = $this->Quiz_model->getSubNodes($quizId, $tagLookId);
											if(isset($subnodeDetails) && !empty($subnodeDetails)){
												$child = 0;
												echo '<div class="prarent_con">';
										       foreach($subnodeDetails as $subnodeDetail){ $child++;
											echo '<div class="child"><input type="radio" name="ques_nodes_child" id="child_node_'.$subnodeDetail->id.'" value="'.$subnodeDetail->id.'" onclick="selectNodeRadio(this)" />'.$subnodeDetail->name.'</div>';
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
                                        <input type="hidden" name="ques_id" id="ques_id" class="ques_id" value="" />
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
												$categoyquiz = $this->Quiz_model->getQuestionByCatId($cate->id);
												$allQuestions[] = $categoyquiz;
												 ?>
								<div class="portlet portlet-default">
                                    <div class="portlet-heading">
                                        <div class="portlet-title">
                                            <h4><?php echo $cate->name; ?></h4>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                    <div class="portlet-body">
                                        	<?php if(!empty($categoyquiz)){
												echo '<ul id="creaded_questions<?php echo $cate->id; ?>" class="">';
												foreach($categoyquiz as $cat_quiz){
													echo '<li><a href="javascript:void(0)" onClick="editQuestions('.$cat_quiz->id.')">'.$cat_quiz->questions.'</a></li>';
												} echo '</ul>';
											} else {
												echo 'There is no questions for this category';
											}?>
									</div>
							</div>
                            
                            <?php }} ?>

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
                                        <?php if(isset($this->session->userdata ["cart_contents"]) && $this->session->userdata["cart_contents"]['customer']){
							$customer = $this->session->userdata["cart_contents"]['customer'];
							$userDetails = $this->User_model->getUserDatails($customer['id']);
					if($customer['is_admin'] || $userDetails[0]->plan == 3 || $userDetails[0]->plan == 2){ ?>
                                        <div class="row clearfix" id="quiz_order">
                                        <!-- Building Form. -->
                                        <div class="sort_order_forms col-lg-6">
                                          <div class="clearfix">
                                            <h3>Drag Your Form Into Place</h3>
                                            <!--<ul class="sortable-list sortable-list_tags">
                                            </ul>-->
                                            <ul class="sortable-list">
                                            <?php if(isset($created_ParentNodes) && $created_ParentNodes != ''){
												$nodeCount =0;
												foreach($created_ParentNodes as $curParentNode){
													$nodeCount++;
											$tagLookId = $curParentNode->id;
											$tagLookName = $curParentNode->name;
											$tagParent = $curParentNode->parent_id;
											$tagId = $curParentNode->tag_id;
											if($webform_pos == 'node'.$nodeCount){
												$getWebForm = $this->Quiz_model->getWebforms($webform_id);
												echo '<li class="sortable-item clearfix lead_capture_form">
                                            	<div class="formsContent pull-left">
                                                	<img src="'.base_url().'assets/img/drag-to-place.png" alt="Drag to Place">
                                                </div>
                                                <div class="formsContent pull-left">
                                                <h3>'.$getWebForm[0]->name.'</h3>
                                                <p>'.$getWebForm[0]->desc.'</p>
                                                <input type="hidden" class="clientform" name="clientform[]" value="'.$getWebForm[0]->id.'" />
                                                </div>
                                                <span class="lead_title">Lead Capture Form</span>
                                                </li>';
											}
											 echo '<li after_web_form="node'.$nodeCount.'" class="sortable-item"><span>Design Node '.$nodeCount.'</span><input type="hidden" name="tagspos[]" value="'.$tagLookId.'" /></li>';
												}
											} ?>
                                            <?php 
											if(isset($allQuestions) && !empty($allQuestions) && $allQuestions !=''){
												$quesCount = 0;
												foreach($allQuestions as $allquestion){
													if(!empty($allquestion)){
													foreach($allquestion as $question){
														if(!empty($question)){
														$quesCount++;
														if($webform_pos == 'question'.$quesCount){
												$getWebForm = $this->Quiz_model->getWebforms($webform_id);
												echo '<li class="sortable-item clearfix lead_capture_form">
                                            	<div class="formsContent pull-left">
                                                	<img src="'.base_url().'assets/img/drag-to-place.png" alt="Drag to Place">
                                                </div>
                                                <div class="formsContent pull-left">
                                                <h3>'.$getWebForm[0]->name.'</h3>
                                                <p>'.$getWebForm[0]->desc.'</p>
                                                <input type="hidden" class="clientform" name="clientform[]" value="'.$getWebForm[0]->id.'" />
                                                </div>
                                                <span class="lead_title">Lead Capture Form</span>
                                                </li>';
											}
											
													echo '<li after_web_form="question'.$quesCount.'" class="sortable-item"><span>Question '.$quesCount.'</span><input type="hidden" name="quespos[]" value="'.$question->id.'" /></li>';
														}}}
												}
											}
											if(isset($webform_pos) && $webform_pos == 'formresults'){
												$getWebForm = $this->Quiz_model->getWebforms($webform_id);
												echo '<li class="sortable-item clearfix lead_capture_form">
                                            	<div class="formsContent pull-left">
                                                	<img src="'.base_url().'assets/img/drag-to-place.png" alt="Drag to Place">
                                                </div>
                                                <div class="formsContent pull-left">
                                                <h3>'.$getWebForm[0]->name.'</h3>
                                                <p>'.$getWebForm[0]->desc.'</p>
                                                <input type="hidden" class="clientform" name="clientform[]" value="'.$getWebForm[0]->id.'" />
                                                </div>
                                                <span class="lead_title">Lead Capture Form</span>
                                                </li>';
											}
											if(isset($question) && !empty($question)){
											echo '<li after_web_form="formresults" class="sortable-item"><span>Final Results</span><input type="hidden" name="finalresults[]" value="'.$question->id.'" /></li>';
											}
											if(isset($webform_pos) && $webform_pos == 'salesform'){
												$getWebForm = $this->Quiz_model->getWebforms($webform_id);
												echo '<li class="sortable-item clearfix lead_capture_form">
                                            	<div class="formsContent pull-left">
                                                	<img src="'.base_url().'assets/img/drag-to-place.png" alt="Drag to Place">
                                                </div>
                                                <div class="formsContent pull-left">
                                                <h3>'.$getWebForm[0]->name.'</h3>
                                                <p>'.$getWebForm[0]->desc.'</p>
                                                <input type="hidden" class="clientform" name="clientform[]" value="'.$getWebForm[0]->id.'" />
                                                </div>
                                                <span class="lead_title">Lead Capture Form</span>
                                                </li>';
											}
											if(isset($question) && !empty($question)){
											echo '<li after_web_form="salesform" class="sortable-item"><span>Sales Form</span><input type="hidden" name="salesform[]" value="'.$question->id.'" /></li>';
											}
											if(isset($webform_pos) && $webform_pos == 'final'){
												$getWebForm = $this->Quiz_model->getWebforms($webform_id);
												echo '<li class="sortable-item clearfix lead_capture_form">
                                            	<div class="formsContent pull-left">
                                                	<img src="'.base_url().'assets/img/drag-to-place.png" alt="Drag to Place">
                                                </div>
                                                <div class="formsContent pull-left">
                                                <h3>'.$getWebForm[0]->name.'</h3>
                                                <p>'.$getWebForm[0]->desc.'</p>
                                                <input type="hidden" class="clientform" name="clientform[]" value="'.$getWebForm[0]->id.'" />
                                                </div>
                                                <span class="lead_title">Lead Capture Form</span>
                                                </li>';
											}
											echo '<li after_web_form="final" class="sortable-item final_li_webform" style="display:none;"></li>';
											?>
                                            </ul>
                                          </div>
                                        </div>
                                        <!-- / Building Form. -->
                                        <!-- Components -->
                                        <div class="col-lg-6">
                                          <h3>Select Form</h3>
                                          <div class="form-group">
                                          <select class="form-control" onChange="showWebform()" id="showWebForm">
                                          <option>Please select the form you created</option>
                                          <?php if($this->session->userdata ["cart_contents"]['customer']){
		$customer = $this->session->userdata ["cart_contents"]['customer']; ?>
                                          <?php $getWebForm = $this->Quiz_model->getWebforms(NULL,$customer['id']);
										  if(!empty($getWebForm)){
										  foreach($getWebForm as $webForm){
											  if($webform_id == $webForm->id){ $selectedForm = 'selected="selected"';
											  } else { $selectedForm = '';}
											  echo '<option '.$selectedForm.' value="'.$webForm->id.'">'.$webForm->name.'</option>';
										  }}
										  } 
										  ?>
                                          </select>
                                          <div class="web_form_container">
                                          <?php 
										  if(!empty($getWebForm)){
										  foreach($getWebForm as $webForm){ ?>
                                          	<div class="comwebformcls webform<?php echo $webForm->id; ?>" <?php if($webform_id != $webForm->id){ ?>style="display:none;"<?php } ?>>
                                            <ul class="sortable-list sortable-list_forms">
                                            <li class="sortable-item clearfix lead_capture_form">
                                            <?php if($webform_id != $webForm->id){ ?>
                                            	<div class="formsContent pull-left">
                                                	<img src="<?php echo base_url().'assets/img/drag-to-place.png'; ?>" alt="Drag to Place">
                                                </div>
                                                <div class="formsContent pull-left">
                                                <h3><?php echo $webForm->name; ?></h3>
                                                <p><?php echo $webForm->desc; ?></p>
                                                <input type="hidden" class="clientform" name="clientform[]" value="<?php echo $webForm->id; ?>" />
                                                </div>
                                                <span class="lead_title">Lead Capture Form</span>
                                                <!--<div class="form" style="position:relative;">
                                                <?php //echo $webForm->form; ?>
                                                <div class="hide_edit"></div>
                                                </div>-->
                                                <?php } else {
													echo '<p>Drag here to you can remove the old form</p>';
												}?>
                                                </li>
                                            </ul>
                                            </div>
                                            <?php }} ?>
                                          </div>
                                          </div>
                                        </div>
                                        <!-- / Components -->
                                      </div>
                                      <?php }} ?>
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
                                        <div class="form-group"><?php echo base_url('quiz/index/'); ?><span id="quiz_url"><?php echo '/'.$quizUrl; ?></span>       
        <!--<input type="text" name="quiz_url" id="quiz_url" value="" /><a href="javascript:void(0);" form_num="4" class="btn btn-primary" onclick="submitformurl()">Save</a>-->
        <input type="hidden" name="quiz_id" class="quiz_id" value="<?php echo $quizId; ?>" /><div id="url_save" class="url_save"></div></div>
			        </form>
        							</div>
        </div>
    </div>
    
    <div class="tab-pane" id="tab7">
                            <div class="row">

                            <div class="col-lg-12">

                                <div class="portlet portlet-default">
                                    <div class="portlet-heading">
                                        <div class="portlet-title">
                                            <h4>Themes</h4>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                    <div class="portlet-body">
                                    <div class="form-group">
										  <label for="quiz_theme">Choose your theme</label>
										  <button data-target="#themeModal" onClick="setPreviewLink()" data-toggle="modal" class="btn btn-primary">Themes</button>
									   </div>
                                       <div id="update_theme">
                                       <?php if($quizTheme != ''){
										   $filename    = APPPATH.'views/themes/'.$quizTheme;
										   if(file_exists($filename))
										   echo 'Applied Theme:<br><img src="'.base_url().'/application/views/themes/'.$quizTheme.'/'.'screen_shot.jpg'.'" alt="" /><h3>'.$quizTheme.'</h3>';
									   }?>
                                       </div>
                                    </div>
                                 </div></div></div></div>
    <ul class="pager wizard">
    <li class="previous first" style="display:none;"><a href="#">First</a></li>
    <li id="form_prev" class="previous"><a href="javascript:void(0);" form_num="1" onclick="prevform()">Previous</a></li>
    <li class="next last" style="display:none;"><a href="javascript:void(0);">Last</a></li>
    <li id="form_next" class="next"><a href="javascript:void(0);" form_num="1" onclick="submitform()">Save &amp; Next</a></li>
    </ul>
    </div>	
    </div>
                        <!-- /.row (nested) -->

                    </div>
                    <!-- /.col-lg-6 -->
                </div>   
            <!-- /.row (nested) -->
                        
<div class="modal fade" id="themeModal" tabindex="-1" role="dialog" aria-labelledby="themeModalLabel" aria-hidden="true">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
<button class="close" aria-hidden="true" data-dismiss="modal" type="button">×</button>
<h4 id="themeModalLabel" class="modal-title">Choose your Themes</h4>
</div>
<div class="modal-body themesContainer">
	<?php 
	$dir    = APPPATH.'views/themes/';
$themeFiles = scandir($dir);
unset($themeFiles[0]);
unset($themeFiles[1]);
//var_dump($themeFiles); 

echo  '<ul class="clearfix">';
									foreach($themeFiles as $file){
										$files1 = scandir($dir.$file);
										if(!empty($files1)){
										foreach($files1 as $filename){
											if($filename == 'screen_shot.jpg'){
												$themeName = $file;
												echo '<li class="col-lg-3"><form class="form-inline" id="'.$file.'" method="post">';
												echo '<img src="'.base_url().'application/views/themes/'.$file.'/'.$filename.'" alt="'.$themeName.'"/><h3>'.$themeName.'</h3>';
												echo '<div class="form-group preview_btn"><a target="_blank" href="?theme='.$file.'" class="btn btn-primary">Preview</a></div>';
												echo '<div class="form-group"><a href="javascript:void(0)" data-dismiss="modal" class="btn btn-primary" theme_name="'.$file.'" onClick="setTheme(this)">Select</a></div>';
												echo '</form></li>';
											}
										}
										}
									}
									echo '</ul>';
									
	?>
</div>
<div class="modal-footer">
<button class="btn btn-default" data-dismiss="modal" type="button">Close</button>
</div>

</div>
</div>
</div>
<script type="text/javascript">
function prevform(){
	$('html, body').animate({
        'scrollTop' : $("#rootwizard").position().top
    });
	var cur_form_num = $('#form_next a').attr('form_num');
	$('#form_next a').attr('form_num',parseInt(cur_form_num)-1);
}
function submitform(){
	$('html, body').animate({
        'scrollTop' : $("#rootwizard").position().top
    });
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
		var json = JSON.parse(msg);
		$('#cur_node_id').val(json.tag_id);
		var selected_num = $('#num_node').val();
			for(var $i = selected_num; $i<=12; $i++){
				$('#node_hid_id'+$i).val('');
			}
			var resultParent = json.parent_id;
			var resultchild = json.child_id;
			var k=0;
			for(var $i=1; $i<=resultParent.length; $i++){
			$('#node_hid_id'+$i).val(resultParent[$i-1]);
			k=0;
			if($('#cur_subnode_id'+$i).length && $('#cur_subnode_id'+$i).val() != ''){
				$('#cur_subnode_id'+$i).val(json.child_tag_id[$i-1]);
				for(var $j=1; $j<=resultchild[resultParent[$i-1]].length; $j++){
				$('#cur_subnode_hid_id'+$i+'_'+$j).val(resultchild[resultParent[$i-1]][k]);
				k++;
				}
			}
			}
		loadnodes();
		} else if(cur_form_num == 5){
			 if(msg != 'url_saved'){
				 var json = JSON.parse(msg);
				$('#quiz_url').text('/'+json.url);
			 }
			 
			 var url_form = "<?php echo base_url(); ?>admin/questions/save_form";
			 var dataval = '';
			 var webformpos = $('.lead_capture_form').next().attr('after_web_form');
			 var webformid = $('.sort_order_forms  .lead_capture_form .clientform').val();
			 dataval = '&quiz_id='+$('#quiz_id').val()+'&webformpos='+webformpos+'&webformid='+webformid;
 	$.ajax({
	type: "POST",
	url: url_form,
	data: dataval,
	success: function( msg ) {
	}
	});
			 
		} 
	}
	});
	}
	if(cur_form_num == 4){
		if($('#quiz_order').length){
			var url = '<?php echo base_url().'admin/questions/sort_default';?>';
			$.ajax({
			type: "POST",
			url: url,
			data: 'quiz_id='+$('#quiz_id').val(),
			success: function( data ) {
				$('.sort_order_forms ul').empty();
				$('.sort_order_forms ul').append(data);
			}
			});
		}
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
	var cur_subnode_id;
	if($('#tot_subnode'+cur_id).length){
	 	cur_subnode_id = parseInt($('#tot_subnode'+cur_id).val())+1;
		$('#tot_subnode'+cur_id).val(cur_subnode_id+1);
	} else {
		cur_subnode_id = 1;
	}
	if($(e).parent('.form-group').next('.appened_subnode').is(':empty'))
	{
		$(e).parent('.form-group').next('.appened_subnode').append('<div class="form-group subform"><label>SubNode Title</label><input type="text" class="form-control" name="subnode_title'+cur_id+'"><input type="hidden" id="tot_subnode'+cur_id+'" name="tot_subnode'+cur_id+'" value="2" /><input type="hidden" num_sub_node="2" id="cur_subnode_id'+cur_id+'" name="cur_subnode_id'+cur_id+'" /></div>');
	}
	$(e).parent('.form-group').next('.appened_subnode').append('<div class="form-group"><input type="text" placeholder="Enter Node" name="subnote_name'+cur_id+'_'+cur_subnode_id+'" class="form-control"></div><input type="hidden" id="cur_subnode_hid_id'+cur_id+'_'+cur_subnode_id+'" name="cur_subnode_hid_id'+cur_id+'_'+cur_subnode_id+'" /><div class="appened_subnode"></div><div class="form-group"><input type="text" placeholder="Enter Node" name="subnote_name'+cur_id+'_'+ parseInt(parseInt(cur_subnode_id) + 1) +'" class="form-control"><input type="hidden" id="cur_subnode_hid_id'+cur_id+'_'+ parseInt(parseInt(cur_subnode_id) + 1) +'" name="cur_subnode_hid_id'+cur_id+'_'+ parseInt(parseInt(cur_subnode_id) + 1) +'" /></div><div class="appened_subnode"></div>');
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
			$('#parent_node_'+json[i].node_id).attr('checked','checked');
			$('#child_node_'+json[i].node_id).attr('checked','checked');
			$('#answer').val(json[i].answer);
			$('#ques_id').val(json[i].id);
		}
	}
	});
}
function setPreviewLink(){
	var quizLink = '<?php echo base_url('quiz/index/'); ?>'+$('#quiz_url').text();
	var themeName;
	$('.themesContainer li .preview_btn a').each(function(index, element) {
       themeName = $(this).attr('href');
	   $(this).attr('href',quizLink+themeName);
    });
}
function setTheme(e){
	var theme_name = $(e).attr('theme_name');
	var url = '<?php echo base_url(); ?>admin/questions/quiz_theme';
 	$.ajax({
	type: "POST",
	url: url,
	data: 'theme_name='+theme_name+'&quiz_id='+$('#quiz_id').val(),
	success: function( data ) {
		$('#update_theme').html(data);
		$('#'+theme_name).addClass('active');
	}
	});
}
function showWebform(){
	var selectedForm = $('#showWebForm').val();
	$('.comwebformcls').hide();
	$('.webform'+selectedForm).show();
}
</script>
</div>