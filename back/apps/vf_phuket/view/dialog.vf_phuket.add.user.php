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
	
	$villa = $dbc->GetRecord("properties","*","id=".$_REQUEST['vid']);
	//$photo = json_decode($blog['photo'],true);
	
?>
<script>
	$(document).ready(function(e) {
       $( 'textarea.editor' ).ckeditor();
    });
</script>
<!--<script src="http://cdn.ckeditor.com/4.6.2/standard-all/ckeditor.js"></script>-->

<div class="modal fade" id="dialog_edit_group" data-backdrop="static">
  	<div class="modal-dialog  modal-lg" >
		<form id="form_add_customer_data" class="form-horizontal" role="form" onsubmit="fn.app.vf_phuket.save_customer_data();return false;">
		<input type="hidden" name="txtID" value="<?php echo $_REQUEST['id'];?>">
        <input type="hidden" name="txtVillaID" value="<?php echo $_REQUEST['vid'];?>">
    	<div class="modal-content">
      		<div class="modal-header">
        		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4>Add User</h4><?php //echo $_SESSION['b_name'];?>
      		</div>
		    <div class="modal-body"><br><br>
            <!-- Nav tabs -->
                <ul class="nav nav-tabs" role="tablist">
                    <li role="presentation" class="active"><a href="#Information_e" aria-controls="Information_e" role="tab" data-toggle="tab">Information</a></li>
                    <!--<li role="presentation"><a href="#Photo_e" aria-controls="Photo_e" role="tab" data-toggle="tab">Photo</a></li>-->
                </ul>
            	
                <!-- Tab panes -->
                <div class="tab-content"><br>
                    <div role="tabpanel" class="tab-pane active" id="Information_e">
                    	<div class="col-md-12">
                        	<div class="form-group">
                                <label for="txtName" class="col-sm-2 control-label">Villa Name</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="txName_e" name="txName_e" value="<?php echo $villa['name'];?>" readonly>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="txtName" class="col-sm-2 control-label">Customer Name</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="txCustomer" name="txCustomer"  >
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="txtName" class="col-sm-2 control-label">Invoice</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="txInvoice" name="txInvoice"  onKeyUp="setValue(this)">
                                </div>
                            </div>
                            <?php 
							$actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]";
							$f_link = $actual_link.'/villaform-customer-';
							?>
                            <div class="form-group">
                                <label for="txtName" class="col-sm-2 control-label">Link Name</label>
                                <div class="col-sm-10">
                                    <!--Ex1. <?php echo $f_link;?>name-123 <br> Ex2. <?php echo $f_link;?><span class="t_link"></span>-->
                                    <input type="text" class="form-control" id="txLink" name="txLink"  onKeyUp="setValue_inv(this)">
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            
                
                
		    </div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				<button type="submit" class="btn btn-primary">Save</button>
			</div>
	  	</div><!-- /.modal-content -->
		</form>
        
       
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<script>
  $(function() {
	$( ".thumbs_photo_edit" ).sortable();
	$( ".thumbs_photo_edit" ).disableSelection();
  });
</script>
<script tyle="text/javascript">
$(function(){
	$('#dialog_edit_group').on('shown.bs.modal', function () {
		$("#txtName").focus();
		<?php $_SESSION['b_name'] = $blog['name'];?>
	});
	$("#dialog_edit_group").on("hidden.bs.modal",function(){
		$(this).remove();
	});
	$("#dialog_edit_group").modal('show');
});	

function setValue(me)
{
	var tname = $("#txCustomer").val();
	$("#txLink").val(tname+'-'+$(me).val());
	$(".t_link").text($(me).val());
}
function setValue_inv(me)
{
		$(".t_link").text($(me).val());
}

	
</script>
<!--<script>
	CKEDITOR.replace( 'txDetail_e', {
	  height: 300,
	  filebrowserUploadUrl: "apps/blog/upload.php"
 });
</script>-->