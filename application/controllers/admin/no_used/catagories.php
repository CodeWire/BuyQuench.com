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
    <li><a href="#tab1" data-toggle="tab">Create Quiz</a></li>
    <li><a href="#tab2" data-toggle="tab">Create Catagory</a></li>
    <li><a href="#tab3" data-toggle="tab">Determine Questions</a></li>
    <li><a href="#tab4" data-toggle="tab">Apply Form Actions</a></li>
    <li><a href="#tab5" data-toggle="tab">Complete Quiz</a></li>
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
										  <input type="text" class="form-control" id="quiz_uname" placeholder="Enter Name" name="quiz_uname">
									   </div>
									   <div class="form-group">
										  <label for="inputfile">Create a friendly description</label>
										  <textarea id="quiz_desc" class="form-control" name="quiz_desc" ></textarea>
									   </div>
									 </form>
                                    </div>
                                </div>
                                <!-- /.portlet -->

                            </div>
		</div>
    </div>
					<div class="tab-pane" id="tab2">
                            <div class="row">

                            <div class="col-lg-8">

                                <div class="portlet portlet-default">
                                    <div class="portlet-heading">
                                        <div class="portlet-title">
                                            <h4>Add Categories</h4>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                    <div class="portlet-body">
                                        <!--<form action="<?php echo base_url(); ?>admin/add_category" class="" method="post">
										<h4>Name</h4>
                                        <input type="text" class="form-control" maxlength="50" id="cat_name" name="cat_name" />
                                        <h4>Image</h4>
										<div id="myId" class="dropzone"></div>  
										<input type="submit" name="add" value="Add" />
										</form> -->
										<form action="<?php echo base_url(); ?>admin/file_upload" class="dropzone" id="my-awesome-dropzone" method="post">
										<h4>Name</h4>
                                        <input type="text" class="form-control" maxlength="50" id="cat_name" name="cat_name" />
                                        <h4>Image</h4>
										</form>
                                    </div>
                                </div>
                                <!-- /.portlet -->

                            </div>
                            <!-- /.col-lg-12 (nested) -->
							<div class="col-lg-4">
								<div class="portlet portlet-default">
                                    <div class="portlet-heading">
                                        <div class="portlet-title">
                                            <h4>Created Categories</h4>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                    <div class="portlet-body">
									</div>
							</div>

                        </div>
						</div>
    </div>
    <div class="tab-pane" id="tab3">
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
										<label>Options</label>
										<div class="form-group">
										  <h4>Option1</h4>
										  <input type="text" class="form-control" id="option1" placeholder="Enter option1" name="option1">
									   </div>
										<div class="form-group">
										  <h4>Option2</h4>
										  <input type="text" class="form-control" id="option2" placeholder="Enter option2" name="option2">
									   </div>
									   <div class="form-group">
										  <h4>Option3</h4>
										  <input type="text" class="form-control" id="option3" placeholder="Enter option3" name="option3">
									   </div>
									   <div class="form-group">
										  <h4>Option4</h4>
										  <input type="text" class="form-control" id="option4" placeholder="Enter option2" name="option4">
									   </div>
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
										</form>
                                    </div>
                                </div>
                                <!-- /.portlet -->

                            </div>
                            <!-- /.col-lg-12 (nested) -->
							<div class="col-lg-4">
								<div class="portlet portlet-default">
                                    <div class="portlet-heading">
                                        <div class="portlet-title">
                                            <h4>Created Questions</h4>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                    <div class="portlet-body">
										<div id="creaded_questions" class="">
										<?php if(isset($created_questions) && $created_questions != ''){
											echo '<ul>';
											foreach($created_questions as $ques){
											echo '<li>'.$ques->questions.'</li>';
											}
											echo '</ul>';
										}; ?>
										</div>
									</div>
							</div>

                        </div>
						</div>
    </div>
    <div class="tab-pane" id="tab4">
    4
    </div>
    <div class="tab-pane" id="tab5">
    5
    </div>
    <ul class="pager wizard">
    <li class="previous first" style="display:none;"><a href="#">First</a></li>
    <li class="previous"><a href="#">Previous</a></li>
    <li class="next last" style="display:none;"><a href="javascript:void(0);">Last</a></li>
    <li class="next"><a href="javascript:void(0);" onclick="submitform()">Next</a></li>
    </ul>
    </div>	
    </div>
                        <!-- /.row (nested) -->

                    </div>
                    <!-- /.col-lg-6 -->
                </div>
<script type="text/javascript">
function submitform(){
if($('.tab-pane.active form.submit_form').length){
 var url = $('.tab-pane.active form.submit_form').attr('action');
 	$.ajax({
	type: "POST",
	url: url,
	data: $('.tab-pane.active form').serialize(),
	success: function( msg ) {
	alert( "Data Saved: " + msg );
	}
	});
	}
}
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
		$('#creaded_questions').empty();
		$('#creaded_questions').append(questions_html);
		$('#questionsForm').trigger('reset');
	}
	});
}
</script>