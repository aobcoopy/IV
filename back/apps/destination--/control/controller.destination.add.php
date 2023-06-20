<?php
	include_once "apps/destination/view/dialog.destination.add.php";
?>
<script style="text/javascript">

	$("#panel-heading-group").append('<button id="btnAddGroup" type="button" class="btn btn-primary pull-right">Add</button>');
	$("#btnAddGroup").click(function(){
		$("#dialog_add_destination").modal('show');
	});
	$('#dialog_add_destination').on('shown.bs.modal', function () {
		$("#txtName").focus();
	});
	
	
	fn.app.destination.destination.add = function(){
		if(document.getElementById("txName").value=='' || document.getElementById("txSlug").value=='' || document.getElementById("txCountry_edit").value=='' )
		{   
			alert('Please fill in all required fields');
			/*$("#txName").focus();*/
			return false;
		}
		else
		{
			$.post('apps/destination/xhr/action-add-destination.php',$('#form_add_destination').serialize(),function(response){
			if(response.success){
				$("#tblSlide").DataTable().draw();
				$("#dialog_add_destination").modal('hide');
				$("#form_add_destination")[0].reset();
				
			}else{
				fn.engine.alert("Alert",response.msg);
			}
		},'json');
		return false;
		}
	};
	
	

	
</script>
