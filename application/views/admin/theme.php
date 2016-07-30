<style>
.preview_btn{margin-right:15px;}
.themesContainer h3{text-transform: capitalize;}
.themesContainer img{max-width:100%;}
.themesContainer ul:after{clear:both; content:"."; display:block; visibility:hidden; height:0;}
.themesContainer ul{list-style:none; padding:0;}
</style>
<div class="Themes">
 <div class="row">
                    <div class="col-lg-12">
                        <div class="page-title">
                            <h1>Themes
                                <small></small>
                            </h1>
                            <ol class="breadcrumb">
                                <li><i class="fa fa-dashboard"></i>  <a href="<?php echo base_url(); ?>">Home</a>
                                </li>
                                <li class="active">Themes</li>
                            </ol>
                        </div>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
				<div class="row">

                    <div class="col-lg-12">
<!-- /* Form -->
                                <div class="portlet portlet-default">
                                    <div class="portlet-heading">
                                        <div class="portlet-title">
                                            <h4>Themes</h4>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                    <div class="portlet-body themesContainer">
                                    <?php 
									$dir    = APPPATH.'views/themes/';
									echo  '<ul>';
									foreach($files as $file){
										$files1 = scandir($dir.$file);
										if(!empty($files1)){
										foreach($files1 as $filename){
											if($filename == 'screen_shot.jpg'){
												$themeName = $file;
												echo '<li class="col-lg-3"><form class="form-inline" action="" method="post">';
												echo '<img src="'.base_url().'/application/views/themes/'.$file.'/'.$filename.'" alt="'.$themeName.'"/><h3>'.$themeName.'</h3>';
												echo '<div class="form-group preview_btn"><a href="#" class="btn btn-primary">Preview</a></div>';
												echo '<div class="form-group"><input type="submit" class="btn btn-primary" name="Save" value="Select"></div>';
												echo '</form></li>';
											}
										}
										}
									}
									echo '</ul>';
									?>
                                    </div>
                                </div>
								<!-- Form */ -->
			        </div>
		      </div>
</div>
<script type="text/javascript">
</script>