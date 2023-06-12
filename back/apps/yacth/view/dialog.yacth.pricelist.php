<?php
	session_start();
	include_once "../../../config/define.php";
	include_once "../../../libs/class/db.php";
    include_once "../../../inc/functions.inc.php";
	include_once "../../../inc/format_photo.php";
	@ini_set('display_errors',DEBUG_MODE?1:0);
	date_default_timezone_set(DEFAULT_TIMEZONE);
	
	$dbc = new dbc;
	$dbc->Connect();
	
	$yacth = $dbc->GetRecord("yacht","*","id=".$_REQUEST['id']);
	$list = json_decode($yacth['pricelists'],true);
?>
<script>
	$(document).ready(function(e) {
       $( 'textarea.editor' ).ckeditor();
    });
</script>
<div class="modal fade" id="dialog_pricelist" data-backdrop="static">
  	<div class="modal-dialog modal-lg" style="width:70%;">
		<form id="form_edit_pricelist" class="form-horizontal" role="form"  onsubmit="fn.app.yacth.yacth.save_pricelist(this);return false;">
		<input type="hidden" id="txtID" name="txtID" value="<?php echo $yacth['id'];?>">
        <input type="hidden" id="txtyname" name="txtyname" value="<?php echo $yacth['name'];?>">
    	<div class="modal-content">
      		<div class="modal-header">
        		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4>Price list -  <?php echo $yacth['name'];?></h4>
      		</div>
		    <div class="modal-body">
            
            	<div class="cover_pricelist">
                <?php
				if(!empty($list))
				{
					foreach($list as $price)
					{
						echo '<div class="form-group">';
							echo '<label class="col-sm-1 control-label"></label>';
							echo '<div class="col-sm-3">';
								echo '<input type="text" class="form-control" maxlength="39" id="tx_1" name="tx_1" placeholder="Text" value="'.$price['tx_1'].'">';
						   echo ' </div>';
							echo '<div class="col-sm-3">';
								echo '<input type="text" class="form-control" maxlength="39" id="tx_2" name="tx_2" placeholder="Text" value="'.$price['tx_2'].'">';
							echo '</div>';
							echo '<div class="col-sm-3">';
								echo '<input type="number" class="form-control" id="tx_3" name="tx_3" placeholder="Price" value="'.$price['tx_3'].'">';
							echo '</div>';
							echo '<div class="col-sm-2">';
								echo '<button type="button" class="btn btn-danger" onClick="$(this).parent().parent().remove();"><i class="fa fa-times" aria-hidden="true"></i></button>';
							echo '</div>';
						echo '</div>';
					}
				}
				else
				{
					echo '<div class="form-group">';
                        echo '<label class="col-sm-1 control-label"></label>';
                        echo '<div class="col-sm-3">';
                            echo '<input type="text" class="form-control" maxlength="39" id="tx_1" name="tx_1" placeholder="Text">';
                       echo ' </div>';
                        echo '<div class="col-sm-3">';
                            echo '<input type="text" class="form-control" maxlength="39" id="tx_2" name="tx_2" placeholder="Text">';
                        echo '</div>';
                        echo '<div class="col-sm-3">';
                            echo '<input type="number" class="form-control" id="tx_3" name="tx_3" placeholder="Price">';
                        echo '</div>';
                        echo '<div class="col-sm-2">';
                            echo '<button type="button" class="btn btn-danger" onClick="$(this).parent().parent().remove();"><i class="fa fa-times" aria-hidden="true"></i></button>';
                        echo '</div>';
                    echo '</div>';
				}
				?>
                    
                </div>
                
		    </div>
			<div class="modal-footer">
				<button type="button" class="btn btn-info pull-left" onClick="fn.app.yacth.yacth.add_box();"><i class="fa fa-plus" aria-hidden="true"></i></button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				<button type="submit" class="btn btn-primary">Save</button>
			</div>
	  	</div><!-- /.modal-content -->
		</form>
        
       
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<script tyle="text/javascript">
$(function(){
	$('#dialog_pricelist').on('shown.bs.modal', function () {
		//$("#txtName").focus();
	});
	$("#dialog_pricelist").on("hidden.bs.modal",function(){
		$(this).remove();
	});
	$("#dialog_pricelist").modal('show');
});	

	
</script>