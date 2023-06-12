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
	
	$form = $dbc->GetRecord("villa_form_mapping","*","id=".$_REQUEST['id']);
	$villa = $dbc->GetRecord("properties","*","id=".$form['villa']);
	$v_name_1 = explode("|",$villa['name']);
	$ex_v_name = ''.str_replace(" ","",$v_name_1[0]);
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
		<form id="form_ed_customer_data" class="form-horizontal" role="form" onsubmit="fn.app.vf_phuket.save_edit_customer_data();return false;">
		<input type="hidden" name="txtID" value="<?php echo $_REQUEST['id'];?>">
        <input type="hidden" name="txtVillaID" value="<?php echo $villa['id'];?>">
    	<div class="modal-content">
      		<div class="modal-header">
        		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4>Link Detail</h4><?php //echo $_SESSION['b_name'];?>
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
                                    <input type="text" class="form-control" id="txCustomer_ed" name="txCustomer_ed"  value="<?php echo $form['cus_name'];?>" >
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="txtName" class="col-sm-2 control-label">Invoice</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="txInvoice" name="txInvoice_ed"   value="<?php echo $form['invoice'];?>"><!--onKeyUp="setValue(this)" -->
                                </div>
                            </div>
                            <?php 
							$actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]";
							$f_link = $actual_link.'/villaform-'.$ex_v_name.'-';
							?>
                            <div class="form-group">
                                <label for="txtName" class="col-sm-2 control-label">Link Name</label>
                                <div class="col-sm-10">
                                    <!--Ex1. <?php echo $f_link;?>name-123.html <br> -->
									Ex. <?php echo $f_link;?><span class="t_link"><?php echo $form['links'];?></span>.html
                                    <input type="text" class="form-control" id="txLink" name="txLink_ed"  onKeyUp="setValue_inv(this)"  value="<?php echo $form['links'];?>">
                                </div>
                            </div>
							<div class="form-group">
                                <label for="txtName" class="col-sm-2 control-label">Customer Link </label>
                                <div class="col-sm-10">
									<?php $f_link_2 = $actual_link.'/villaform-customer-'.$ex_v_name.'-'.$form['links'].'.html';?>
									<input type="text"   class="tx_my_link form-control" value="<?php echo $f_link_2;?>">
								</div>
                            </div>
                            <div class="form-group">
                                <label for="txtName" class="col-sm-2 control-label"></label>
								<div class="col-sm-4">
            						<button type="button" class="btn btn-success btn-block" onClick="copylink()"><i class="fa   fa-files-o" aria-hidden="true"></i> Copy Link</button>
                                </div>
                                <div class="col-sm-6">
            						<a href="<?php echo $f_link_2;?>" target="_blank"><button type="button" class="btn btn-info btn-block"><i class="fa fa-pencil" aria-hidden="true"></i> Edit Form Detail</button></a>
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
	function copylink()
	{
		$(".tx_my_link").select();
		document.execCommand("copy");
	}
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
		$("#txLink").val($(me).val());
		$(".t_link").text($(me).val());
}
function setValue_inv(me)
{
		$(".t_link").text($(me).val());
		var ll = '<?php echo $actual_link.'/villaform-customer-'.$ex_v_name.'-';?>'+$(me).val()+'.html';
		$(".tx_my_link").val(ll);
}

	
</script>
<!--<script>
	CKEDITOR.replace( 'txDetail_e', {
	  height: 300,
	  filebrowserUploadUrl: "apps/blog/upload.php"
 });
</script>-->