<?php
	session_start();
	include_once "../../../config/define.php";
	include_once "../../../libs/class/db.php";
	
	@ini_set('display_errors',DEBUG_MODE?1:0);
	date_default_timezone_set(DEFAULT_TIMEZONE);
	
	$dbc = new dbc;
	$dbc->Connect();
	
	$prop = $dbc->GetRecord("properties","*","id=".$_REQUEST['id']);	
?> 
<div class="modal fade" id="dialog_add_ggc" data-backdrop="static">
  	<div class="modal-dialog  modal-lg" > 
		<form id="form_edit_ggc" class="form-horizontal" role="form" >
		<input type="hidden" id="txtID" name="txtID" value="<?php echo $_REQUEST['id'];?>">
    	<div class="modal-content">
      		<div class="modal-header">
        		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4>Google Calendar</h4>
      		</div>
		    <div class="modal-body">
                <div class="col-md-12">
                    <div class="form-group">
                    	Example
                       <br>
                       <img src="../../../../upload/ggc2.jpg" width="100%" alt="">
                    	<textarea type="text" class="form-controla" rows="5" readonly style="width:100%;border: 1px solid #f1f1f1;padding: 10px;background: #eeeeee;">
                        <iframe src="https://calendar.google.com/calendar/embed?height=600&wkst=1&bgcolor=%23ffffff&ctz=Asia%2FBangkok&src=dGgudGgjaG9saWRheUBncm91cC52LmNhbGVuZGFyLmdvb2dsZS5jb20&color=%230B8043&showTitle=0" style="border-width:0" width="800" height="600" frameborder="0" scrolling="no"></iframe>
                        </textarea><br><br>
                        <label class="col-sm-2 control-label">Google Code</label>
                        <div class="col-sm-10">
                            <textarea type="text" class="form-control" rows="6" id="tx_ggc" name="tx_ggc"><?php echo base64_decode($prop['ggc'],true); ?></textarea><br>
                            <?php /*?><textarea type="text" class="form-control" rows="6" id="tx_ggc" name="tx_ggc"><?php echo "**".$prop['ggc']."**"; ?></textarea><br><?php */?>
                            <button type="button" class="btn btn-info" onClick="fn.app.properties.properties.saveggc('<?php echo $_REQUEST['id'];?>');">Save</button>
                            <br><br><br>
                           
                        </div>
                        
                        
                    </div>
                </div> 
				<?php echo base64_decode($prop['ggc'],true); ?>
		    </div>
			<div class="modal-footer">
				<!--<button type="button" class="btn btn-info pull-left" >View all</button>-->
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				
			</div>
	  	</div><!-- /.modal-content -->
		</form>
        
       
       
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<script tyle="text/javascript">
$(function(){
	$('#dialog_add_ggc').on('shown.bs.modal', function () {
		$("#txtName").focus();
	});
	$("#dialog_add_ggc").on("hidden.bs.modal",function(){
		$(this).remove();
	});
	$("#dialog_add_ggc").modal('show');
});	

	
</script>
<script>
setTimeout(function(){
	$("iframe").addClass("ggcalendar").css({"width":"100%"});
},300);
</script>
<!--<script>
function copyToClipboard(element) {
  $("#tx_Link_review").select();
  document.execCommand("copy");
  $temp.remove();
}
</script>-->


