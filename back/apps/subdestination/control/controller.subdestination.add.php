<?php
	include_once "apps/subdestination/view/dialog.subdestination.add.php";
?>
<script style="text/javascript">

	$("#panel-heading-group").append('<button id="btnAddGroup" type="button" class="btn btn-primary pull-right">Add</button>');
	$("#btnAddGroup").click(function(){
		$("#dialog_add_subdestination").modal('show');
	});
	$('#dialog_add_subdestination').on('shown.bs.modal', function () {
		$("#txtName").focus();
	});
	
	
	fn.app.subdestination.subdestination.add = function(){
		if(document.getElementById("txName").value=='' || document.getElementById("txSlug").value=='' )
		{
			alert('Please fill in all required fields');
			/*$("#txName").focus();*/
			return false;
		}
		else
		{
			$.post('apps/subdestination/xhr/action-add-subdestination.php',$('#form_add_subdestination').serialize(),function(response){
			if(response.success){
				$("#tblSlide").DataTable().draw();
				$("#dialog_add_subdestination").modal('hide');
				$("#form_add_subdestination")[0].reset();
				
			}else{
				fn.engine.alert("Alert",response.msg);
			}
		},'json');
		return false;
		}
	};
	
	

	
</script>
