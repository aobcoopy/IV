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
  	<div class="modal-dialog" style="width:90%;">
		<form id="form_edit_agent_villa_list" class="form-horizontal" role="form" onsubmit="fn.app.agent.agent.save_change_villa_list();return false;">
		<input type="hidden" name="txtID" value="<?php echo $agent['id'];?>">
    	<div class="modal-content">
      		<div class="modal-header">
        		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4>Villa list</h4>
      		</div>
		    <div class="modal-body">
            	
                
                <div class="col-sm-6">
                	<?php /*?><div class="form-group">
                        <label for="txtName" class="col-sm-2 control-label">Destination</label>
                        <div class="col-sm-10">
                            <select class="form-control " id="cbb_des" name="cbb_des">
                            	<?php 
								$sql_des= $dbc->Query("select * from destinations where status > 0 and parent IS NULL order by name asc");
								while($row_des = $dbc->Fetch($sql_des))
								{
									echo '<option value="'.$row_des['id'].'">'.$row_des['name'].'</option>';
								}
								?>
                            </select>
                        </div>
                    </div><?php */?>  
                    
                    <table id="tb_adm" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                            <th>#</th>
                            <th>ID</th>
                            <th>Villa Name</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php 
                        $sql_add= $dbc->Query("select * from properties where status > 0 order by name asc");
                        while($villa_r = $dbc->Fetch($sql_add))
                        {
                            ?>
                            <tr>
                                <td>
                                <?php
                                $ar_villa = json_decode($agent['villa'],true);
                                if(in_array($villa_r['id'],$ar_villa))
                                {
                                    ?>
                                    <button type="button" disabled class="btn btn-info b-<?php echo $villa_r['id'];?>" onClick="add_adm_to_box(this,'<?php echo $villa_r['id'];?>','<?php echo $villa_r['name'];?>')">
                                    <i class="fa fa-plus"></i>
                                    </button>
                                    <?php
                                }
                                else
                                {
                                    ?>
                                    <button type="button" class="btn btn-info b-<?php echo $villa_r['id'];?>" onClick="add_adm_to_box(this,'<?php echo $villa_r['id'];?>','<?php echo $villa_r['name'];?>')">
                                    <i class="fa fa-plus"></i>
                                    </button>
                                    <?php
                                }
                                ?>
                                
                                </td>
                                <td><?php echo $villa_r['id'];?></td>
                                <td><?php echo $villa_r['name'];?></td>
                            </tr>
                            <?php
                        }
                        ?>
                        </tbody>
                    </table>  
                </div>
                 <div class="col-sm-6 ">
                    <div class="alert alert-default chk_adm" role="alert">
                        <h3>Villas <span class="label label-info">Selected</span></h3>
                        <?php 
						$sql_villas= $dbc->Query("select * from properties where status > 0 ");
						while($add_r = $dbc->Fetch($sql_villas))
						{
							$ar_add = json_decode($agent['villa'],true);
							if(in_array($add_r['id'],$ar_add))
							{
								$idadm = $add_r['id'];
								echo '<div class="col-sm-12" style="padding:5px 0px;">';
								echo '<input type="checkbox" class="hidden" name="chk_add[]" value="'.$idadm.'" checked>';
								echo '<button type="button" class="btn btn-danger" onClick="remove_adm_from_box(this,'.$idadm.')"><i class="fa fa-minus"></i></button>&nbsp;&nbsp;&nbsp;'.$add_r['name'];
								echo '</div>';
							}
						}
						?>
                        
                    </div>
                 </div>
                                 
               
                
		    </div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				<button type="submit" class="btn btn-primary">Save</button>
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

function add_adm_to_box(me,vall,names)
{
	var ss = '';
	//var names = $(me).parent('td').find('input[name:in_adm]').val();
	$(me).attr('disabled',true);
	ss+='<div class="col-sm-12" style="padding:5px 0px;">';
	ss+='<input type="checkbox" class="hidden" name="chk_add[]" value="'+vall+'" checked>   ';
	ss+='<button type="button" class="btn btn-danger" onClick="remove_adm_from_box_add(this,'+vall+')"><i class="fa fa-minus"></i></button>&nbsp&nbsp'+names;
	ss+='</div>';
	$(".chk_adm").append(ss);
	
}

function remove_adm_from_box(me,valu)
{
	$(me).parent().remove();
	$(".b-"+valu).attr('disabled',false);
}


$(function(){
	var ii = 1;
	$("#tb_adm").data( "selected", [] );
	$("#tb_adm").DataTable({
		
	});
	//fn.engine.datatable.add_selectable('tblSlide','chk_group');
	
});
	
</script>