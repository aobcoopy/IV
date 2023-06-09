<?php
	include_once "apps/accctrl/view/dialog.group.add.php";
?>
<script style="text/javascript">
	fn.app.accctrl.group.add = function(){
		$.post('apps/accctrl/xhr/action-add-group.php',$('#form_addgroup').serialize(),function(response){
			if(response.success){
				$("#tblGroup").DataTable().draw();
				$("#dialog_add_group").modal('hide');
				$("#form_addgroup")[0].reset();
			}else{
				fn.engine.alert("Alert",response.msg);
			}
		},'json');
		return false;
	};

	$("#panel-heading-group").append('<button id="btnAddGroup" type="button" class="btn btn-primary pull-right">Add</button>');
	$("#btnAddGroup").click(function(){
		$("#dialog_add_group").modal('show');
	});
	$('#dialog_add_group').on('shown.bs.modal', function () {
		$("#txtName").focus();
	});
</script>
