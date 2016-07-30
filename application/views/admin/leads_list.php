<style>
.icons{font-size:0;}
.icons i{font-size:20px;}
</style>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="page-title">
                            <h1>Leads List
                                <small></small>
                            </h1>
                            <ol class="breadcrumb">
                                <li><i class="fa fa-dashboard"></i>  <a href="index.html">Leads</a>
                                </li>
                                <li class="active">List</li>
                            </ol>
                        </div>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
				<div class="row">

                    <div class="col-lg-12">
                    <div class="portlet portlet-default">
                            <div class="portlet-heading">
                                <div class="portlet-title">
                                    <h4>Leads</h4>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <div class="portlet-body">
                                <div class="table-responsive">
<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered table-hover table-green" id="leads_table_no" width="100%">
	<thead>
		<tr>
			<th width="5%">Id</th>
			<th width="20%">Web Form Name</th>
            <th data-hide="phone,tablet" width="75%">User Fields</th>
		</tr>
	</thead>
	<tbody>
    <?php  if(!empty($allLeads)){
		foreach($allLeads as $allLead){
				$leadInfo = '';
				$webform_details = $this->Web_model->getWebFormById($allLead->web_form_id);
				echo '<tr><td>'.$allLead->id.'</td><td>'.$webform_details[0]->name.'</td>';
				$allLeadWebForms = $this->Leads_model->getLeadsByWebForm($allLead->web_form_id);
				if(!empty($allLeadWebForms)){
					echo '<td><table class="table table-striped table-bordered table-hover ">';
					$firstRow = 1;
					foreach($allLeadWebForms as $allLeadWebForm){
						$leads_details = $this->Leads_model->getLeadsList($allLeadWebForm->id);
						if(!empty($leads_details)){
						if($firstRow){
						echo '<tr>';
						foreach($leads_details as $key=>$leads_detail){
								echo '<th><p><label>'.$leads_detail->field.'</label></th>';
						}
						echo '</tr>';
						$firstRow = 0;
						}
						echo '<tr>';
						//var_dump($leads_details);
						foreach($leads_details as $key=>$leads_detail){
								echo '<td><p><span>'.$leads_detail->value.'</span></p></td>';
						}
						echo '</tr>';
						}
					}
					echo '</table></td>';
				} else {
					echo '<td>&nbsp;</td>';
				}
				echo '</tr>';
	}
	} else {
		echo '<tr><td colspan="3">There is no leads Available</td></tr>';
	}?>
		<!--<tr>
			<td colspan="5" class="dataTables_empty">Loading data from server</td>
		</tr>-->
	</tbody>
	<!--<tfoot>
		<tr>
			<th>Id</th>
			<th>Web Form Name</th>
            <th>User Fields</th>
		</tr>
	</tfoot>-->
</table>
								</div>
                                <!-- /.table-responsive -->
                            </div>
                            <!-- /.portlet-body -->
                        </div>
                        <!-- /.portlet -->
                    </div>
                </div>

<script type="text/javascript" charset="utf-8">
</script>