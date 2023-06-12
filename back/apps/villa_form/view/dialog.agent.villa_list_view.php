<?php
	session_start();
	include_once "../../../config/define.php";
	include_once "../../../libs/class/db.php";
	
	@ini_set('display_errors',DEBUG_MODE?1:0);
	date_default_timezone_set(DEFAULT_TIMEZONE);
	
	$dbc = new dbc;
	$dbc->Connect();
	
	$agent = $dbc->GetRecord("agent","*","id=".$_REQUEST['id']);
	//$photo = json_decode($agent['icon'],true);
?>
<style>
#tb_adm > thead > tr > td,#tb_adm > tbody > tr > td
{
	padding: 5px 5px !important;
}
</style>
<div class="modal fade" id="dialog_edit_group" data-backdrop="static">
  	<div class="modal-dialog modal-lg" >
		<form id="form_edit_agent_villa_list" class="form-horizontal" role="form" onsubmit="fn.app.agent.agent.save_change_villa_list();return false;">
		<input type="hidden" name="txtID" value="<?php echo $agent['id'];?>">
    	<div class="modal-content">
      		<div class="modal-header">
        		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4>Villa list</h4>
      		</div>
		    <div class="modal-body">
            	
                
                <div class="col-sm-6">
                	
                </div>
                 <div class="col-sm-12">
                    <?php
					$sql_des = $dbc->Query("select * from destinations where status > 0 and parent is null");
					while($desti = $dbc->Fetch($sql_des))
					{
						$ar_add_cou_1 = json_decode($agent['villa'],true);
						$id_des = 0;
						foreach($ar_add_cou_1 as $arr_1)
						{
							$sq_villas_1= $dbc->GetRecord("properties","*","id = '".$arr_1."'");
							if($desti['id']==$sq_villas_1['destination'])
							{
								$id_des++;
							}
						}
						
						//echo '----'.$id_des;
						echo '<div class="col-sm-12" style="margin-top: 30px;">';
						echo '<h3>'.$desti['name'].' <span class="label label-info">'.$id_des.' Villas</span></h3>';
						echo '<br>';
						echo '</div>';
						
						$ar_add_cou = json_decode($agent['villa'],true);
						foreach($ar_add_cou as $arr)
						{
							$sq_villas= $dbc->GetRecord("properties","*","id = '".$arr."'");
							$photo = json_decode($sq_villas['photo'],true);
							if($desti['id']==$sq_villas['destination'])
							{
								//echo $sq_villas['name'].'-------------------'.$desti['name'].'<br>';
								
								echo '<div class="alert alert-default chk_adm" role="alert">';
									echo '<div class="col-sm-12" style="padding:5px 0px;">';
										echo '<div class="col-md-3">';
											echo '<img src="'.$photo[0]['img'].'" width="100%">';
										echo '</div>';
										echo '<div class="col-md-8">';
											echo '<strong>Name : </strong>'.$sq_villas['name'].'<br>';
											echo '<strong>Email : </strong>'.$sq_villas['email'];
										echo '</div>';
									echo '</div>';
								echo '</div>';
							}
							
							//echo '<div class="col-sm-12">';
//						echo '<br>';
//						//echo '<hr/>';
//						echo '</div>';
							
						}
						
						
						
						
						
						
						
						
						
						
						
						
						//$sql_villas= $dbc->Query("select * from properties where status > 0 and destination = '".$desti['id']."' ");
//						$id_des = 0;//$desti['id'];
//						while($add_r_cou = $dbc->Fetch($sql_villas))
//						{
//							$ar_add_cou = json_decode($agent['villa'],true);
//							if(in_array($add_r_cou['id'],$ar_add_cou))
//							{
//								
//								$id_des++;
//							}
//						}
//						
//						echo '<div class="col-sm-12">';
//						echo '<h3>'.$desti['name'].' <span class="label label-info">Villas</span></h3>';
//						echo '<br>';
//						echo '</div>';
//					
//						
//						while($add_r = $dbc->Fetch($sql_villas))
//						{
//							$ar_add = json_decode($agent['villa'],true);
//							$photo = json_decode($add_r['photo'],true);
//							if(in_array($add_r['id'],$ar_add))
//							{
//								$idadm = $add_r['id'];
//								echo '<div class="alert alert-default chk_adm" role="alert">';
//									echo '<div class="col-sm-12" style="padding:5px 0px;">';
//										echo '<div class="col-md-4">';
//											echo '<img src="'.$photo[0]['img'].'" width="100%">';
//										echo '</div>';
//										echo '<div class="col-md-8">';
//											echo '<strong>Name : </strong>'.$add_r['name'].'<br>';
//											echo '<strong>Email : </strong>'.$add_r['email'];
//										echo '</div>';
//									echo '</div>';
//								echo '</div>';
//							}
//						}
//						echo '<div class="col-sm-12">';
//						echo '<br>';
//						//echo '<hr/>';
//						echo '</div>';
					}
					?>
                        
                    
                 </div>
                                 
               
                
		    </div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			</div>
	  	</div><!-- /.modal-content -->
		</form>
        
        <?php /*?><form id="form_edit_photo" class="hidden">
            <input id="f_Photo_edit" name="file" type="file">
            <button type="button" id="btn_upp2" onClick="fn.app.agent.agent.upload_photo_file_edit()">UP</button>
        </form><?php */?>
       
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<script tyle="text/javascript">
$(function(){
	$('#dialog_edit_group').on('shown.bs.modal', function () {
		$("#txtName").focus();
	});
	$("#dialog_edit_group").on("hidden.bs.modal",function(){
		$(this).remove();
	});
	$("#dialog_edit_group").modal('show');
});	

	
</script>