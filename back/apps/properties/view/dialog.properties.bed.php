<?php
	session_start();
	include_once "../../../config/define.php";
	include_once "../../../libs/class/db.php";
	
	@ini_set('display_errors',DEBUG_MODE?1:0);
	date_default_timezone_set(DEFAULT_TIMEZONE);
	
	$dbc = new dbc;
	$dbc->Connect();
	
	
?> 
<div class="modal fade" id="dialog_add_bed" data-backdrop="static">
  	<div class="modal-dialog  modal-lg" > 
		<form id="form_edit_bed" class="form-horizontal" role="form" >
		<input type="hidden" id="txtID" name="txtID" value="<?php echo $_REQUEST['id'];?>">
    	<div class="modal-content">
      		<div class="modal-header">
        		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4>Bedroom Configuration</h4>
      		</div>
		    <div class="modal-body">
                <div class="col-md-12">
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Add</label>
                        <div class="col-sm-10">
                            <button type="button" class="btn btn-info" onClick="fn.app.properties.properties.addbed()"><i class="fa fa-plus" aria-hidden="true"></i></button>
                        </div>
                    </div>
                    <div class="tbed">
                    <?php 
					$sql = $dbc->GetRecord("properties","*","id =".$_REQUEST['id']);
					$bed = json_decode($sql['bed'],true);
					if($bed!='')
					{
						foreach($bed as $val)
						{
							echo '<div class="form-group groups">';
								echo '<div class="col-sm-1">';
									echo '<button type="button" class="btn btn-danger" onClick="$(this).parent().parent().remove();"><i class="fa fa-minus" aria-hidden="true"></i></button>';
								echo '</div>';
								echo '<label for="txtName" class="col-sm-1 control-label">Title</label>';
								echo '<div class="col-sm-4">';
									echo '<input type="text" class="form-control" id="t_Title" name="t_Title"  value="'.$val['title'].'">';
								echo '</div>';
								echo '<label for="txtName" class="col-sm-1 control-label">Detail</label>';
								echo '<div class="col-sm-5">';
									echo '<input type="text" class="form-control" id="t_Detail" name="t_Detail" value="'.$val['detail'].'">';
								echo '</div>';
							echo '</div>';
						}
					}
					?>
                        
                    </div>
                </div>
		    </div>
			<div class="modal-footer">
				<!--<button type="button" class="btn btn-info pull-left" onClick="fn.app.properties.properties.viewrate('<?php echo $_REQUEST['id'];?>');">View all</button>-->
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				<button type="button" class="btn btn-primary" onClick="fn.app.properties.properties.save_bed();">Save</button>
			</div>
	  	</div><!-- /.modal-content -->
		</form>
        
       
       
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<script tyle="text/javascript">
$(function(){
	$('#dialog_add_bed').on('shown.bs.modal', function () {
		$("#txtName").focus();
	});
	$("#dialog_add_bed").on("hidden.bs.modal",function(){
		$(this).remove();
	});
	$("#dialog_add_bed").modal('show');
});	

	
</script>
