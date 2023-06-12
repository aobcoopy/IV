<?php
	include_once "apps/rooms/view/dialog.rooms.add.php";
?>
<script style="text/javascript">

	$("#panel-heading-group").append('<button id="btnAddGroup" type="button" class="btn btn-primary pull-right">Add</button>');
	$("#btnAddGroup").click(function(){
		$("#dialog_add_rooms").modal('show');
	});
	$('#dialog_add_rooms').on('shown.bs.modal', function () {
		$("#txtName").focus();
	});
	
	
	fn.app.rooms.rooms.add = function(){
		if(document.getElementById("txName").value=='' || document.getElementById("txShortName").value=='' || document.getElementById("txSlug").value=='')
		{
			alert('Please fill in all required fields');
			/*$("#txName").focus();*/
			return false;
		}
		else
		{
			$.post('apps/rooms/xhr/action-add-rooms.php',$('#form_add_rooms').serialize(),function(response){
			if(response.success){
				$("#tblSlide").DataTable().draw();
				$("#dialog_add_rooms").modal('hide');
				$("#form_add_rooms")[0].reset();
				
			}else{
				fn.engine.alert("Alert",response.msg);
			}
		},'json');
		return false;
		}
	};
	
	

	
</script>
