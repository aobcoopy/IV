<?php
	include_once "apps/quick_link/view/dialog.quick_link.add.php";
?>
<script style="text/javascript">

	$("#panel-heading-group").append('<button id="btnAddGroup" type="button" class="btn btn-primary pull-right">Add</button>');
	$("#btnAddGroup").click(function(){
		$("#dialog_add_quick_link").modal('show');
	});
	$('#dialog_add_quick_link').on('shown.bs.modal', function () {
		$("#txtName").focus();
	});
	
	
	fn.app.quick_link.quick_link.add = function(){
		if(document.getElementById("txUrl").value=='')
		{
			alert('Please fill in all required fields');
			/*$("#txName").focus();*/
			return false;
		}
		else
		{
			$.post('apps/quick_link/xhr/action-add-quick_link.php',$('#form_add_quick_link').serialize(),function(response){
			if(response.success){
				$("#tblSlide").DataTable().draw();
				$("#dialog_add_quick_link").modal('hide');
				$("#form_add_quick_link")[0].reset();
				$("#txText").val('');
				
			}else{
				fn.engine.alert("Alert",response.msg);
			}
		},'json');
		return false;
		}
	};
	
	

	
</script>
