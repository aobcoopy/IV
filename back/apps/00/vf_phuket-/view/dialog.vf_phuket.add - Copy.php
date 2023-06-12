<script>
	$(document).ready(function(e) {
       $( 'textarea.editor' ).ckeditor();
    });
</script>
<div class="modal fade" id="dialog_add_vf_phuket" data-backdrop="static">
  	<div class="modal-dialog" style="width:70%;">
		<form id="form_add_vf_phuket" class="form-horizontal" role="form" onsubmit="fn.app.vf_phuket.vf_phuket.add();return false;">
    	<div class="modal-content">
      		<div class="modal-header">
        		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4>Add Villa Form Phuket</h4>
      		</div>
		    <div class="modal-body">
            
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
                        $sql_add= $dbc->Query("select * from properties where destination = '38' and status > 0 order by name asc");
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
                                    <button type="button" disabled class="btn btn-info b-<?php echo $villa_r['id'];?>" onClick="add_adm_to_box(this,'<?php echo $villa_r['id'];?>')">
                                    <i class="fa fa-plus"></i>
                                    </button>
                                    <?php
                                }
                                else
                                {
                                    ?>
                                    <button type="button" class="btn btn-info b-<?php echo $villa_r['id'];?>" onClick="add_adm_to_box(this,'<?php echo $villa_r['id'];?>')">
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
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				<!--<button type="submit" class="btn btn-primary">Save</button>-->
			</div>
	  	</div><!-- /.modal-content -->
		</form>
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<style>
#tb_adm > thead > tr > td,#tb_adm > tbody > tr > td
{
	padding: 5px 5px !important;
}
</style>
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

function add_adm_to_box(me,vid,names)
{
	/*var encode = btoa(vid);
	window.location = '../villaform-admin-'+encode+'.html';*/
	
	$.ajax({
		url: "apps/vf_phuket/xhr/action-add-villa-form.php",
		type: "POST",
		dataType:"json",
		data: {vid:vid},
		success : function(response)
		{
			if(response.status){
				$("#tblSlide").DataTable().draw();
				$("#dialog_add_vf_phuket").modal('hide');
			}else{
				fn.engine.alert("Alert",response.msg);
			}
		}
	});
		
	//var ss = '';
//	//var names = $(me).parent('td').find('input[name:in_adm]').val();
//	$(me).attr('disabled',true);
//	ss+='<div class="col-sm-12" style="padding:5px 0px;">';
//	ss+='<input type="checkbox" class="hidden" name="chk_add[]" value="'+vall+'" checked>   ';
//	ss+='<button type="button" class="btn btn-danger" onClick="remove_adm_from_box_add(this,'+vall+')"><i class="fa fa-minus"></i></button>&nbsp&nbsp'+names;
//	ss+='</div>';
//	$(".chk_adm").append(ss);
	
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
