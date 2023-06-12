<?php
	session_start();
	include_once "../../../config/define.php";
	include_once "../../../libs/class/db.php";
	
	@ini_set('display_errors',DEBUG_MODE?1:0);
	date_default_timezone_set(DEFAULT_TIMEZONE);
	
	$dbc = new dbc;
	$dbc->Connect();
	
	if($dbc->HasRecord("metatag","property=".$_REQUEST['id']))
	{
		$meta = $dbc->GetRecord("metatag","*","property=".$_REQUEST['id']);
		$prop = $dbc->GetRecord("properties","*","id=".$_REQUEST['id']);
	}
	
?> 
<div class="modal fade" id="dialog_add_meta" data-backdrop="static">
  	<div class="modal-dialog  modal-lg" > 
		<form id="form_edit_meta" class="form-horizontal" role="form" >
		<input type="hidden" id="txtID" name="txtID" value="<?php echo $_REQUEST['id'];?>">
    	<div class="modal-content">
      		<div class="modal-header">
        		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4>Villa Link</h4>
      		</div>
		    <div class="modal-body">
                <div class="col-md-12">
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Review</label>
                        <div class="col-sm-10">
                            <?php /*?><input type="text" class="form-control" id="tx_Link" name="tx_Link" value="<?php echo 'https://www.inspiringvillas.com/'.$prop['ht_link'].'.html'; ?>"><br><?php */?>
                            <a href="<?php echo '/villa-review-'.$_REQUEST['id'].'.html#preview'; ?>" target="_blank"><button type="button" class="btn btn-danger" >Review Villa</button></a>
                            <br><br><br>
                        </div>
                        
                        <label class="col-sm-2 control-label">Link</label>
                        <div class="col-sm-10">
                        	<?php 
							if($prop['status']>0)
							{
								?>
                                <input type="text" class="form-control" id="tx_Link" name="tx_Link" value="<?php echo 'https://www.inspiringvillas.com/'.$prop['ht_link'].'.html'; ?>"><br>
                            	<a href="<?php echo 'https://www.inspiringvillas.com/'.$prop['ht_link'].'.html'; ?>" target="_blank"><button type="button" class="btn btn-info" >View Listing</button></a>
								<?php
							}
							else
							{
								?><button type="button" class="btn btn-default" >Offline</button><?php
							}
							?>
                            
                            <br><br><br>
                        </div>
                        
                        
                        <label class="col-sm-2 control-label">Private Link</label>
                        <div class="col-sm-10">
                        	<?php
							$PV_Link = '';
							$apvl = '#';
							$dis = 'disabled';
                            if($prop['pv_link']!='')
							{
								$PV_Link = $prop['pv_link'];
								$apvl = '/villa-private/'.$PV_Link.'.html';//https://www.inspiringvillas.com
								$dis = '';
							}
							?>
                            	EX. xxxx-xxxxx-xxxxx
                                <input type="text" class="form-control" id="tx_PVLink" name="tx_PVLink" value="<?php echo $prop['pv_link']; ?>"><br>
                            	<a class="pvl apvl" href="<?php echo $apvl; ?>" target="_blank" <?php echo $dis;?>><button type="button" class="btn btn-info pvl" <?php echo $dis;?>>View Listing</button></a>
								<button type="button" class="btn btn-success sav" onClick="savePVLink();">Save</button>
                                <button type="button" class="btn btn-danger pvl" <?php echo $dis;?> onClick="delPVLink();">Delete</button>
                            <br><br><br>
                        </div>
                        <?php /*?><label class="col-sm-2 control-label">Customer review</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="tx_Link_review" name="tx_Link_review" value="<?php echo 'https://www.inspiringvillas.com/'.$prop['ht_link'].'.html?review=true'; ?>"><br>
                            <button type="button" class="btn btn-info" onClick="copyToClipboard();" >Copy link</button>
                        </div><?php */?>
                    </div>
                </div>
		    </div>
			<div class="modal-footer">
				<!--<button type="button" class="btn btn-info pull-left" onClick="fn.app.properties.properties.viewrate('<?php echo $_REQUEST['id'];?>');">View all</button>-->
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				
			</div>
	  	</div><!-- /.modal-content -->
		</form>
        
       
       
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<script tyle="text/javascript">
$(function(){
	$('#dialog_add_meta').on('shown.bs.modal', function () {
		$("#txtName").focus();
	});
	$("#dialog_add_meta").on("hidden.bs.modal",function(){
		$(this).remove();
	});
	$("#dialog_add_meta").modal('show');
});	

function savePVLink()
{
	if($("#tx_PVLink").val()=='')
	{
		alert("Please fill data");
		$("#tx_PVLink").focus();
		return false;
	}
	else
	{
		$.ajax({
			url:"apps/properties/xhr/action-savePVLink.php",
			type:"POST",
			dataType:"json",
			data:{
				txtID:$("#txtID").val(),
				tx_PVLink:$("#tx_PVLink").val()
			},
			success: function(res){
				if(res.success==true)
				{
					fn.engine.alert("Alert",res.msg);
					$(".pvl").attr('disabled',false);
					//$(".sav").attr('disabled',true);
					$(".apvl").attr('href','/villa-private/'+res.pvlink+'.html');//https://www.inspiringvillas.com
				}
				else
				{
					fn.engine.alert("Alert",res.msg);
				}
			}
		});
	}
}

function delPVLink()
{
	$.ajax({
		url:"apps/properties/xhr/action-savePVLink.php",
		type:"POST",
		dataType:"json",
		data:{
			txtID:$("#txtID").val(),
			tx_PVLink:''
		},
		success: function(res){
			if(res.success==true)
			{
				$("#dialog_add_meta").modal('hide');
				$(".pvl").attr('disabled',true);
			}
			else
			{
				fn.engine.alert("Alert",res.msg);
			}
		}
	});
}
	
</script>

<script>
function copyToClipboard(element) {
  $("#tx_Link_review").select();
  document.execCommand("copy");
  $temp.remove();
}
</script>


