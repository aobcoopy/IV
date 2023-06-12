<?php
	include_once "apps/villa_form/view/dialog.villa_form.add.php";
?>
<script style="text/javascript">

	$("#panel-heading-group").append('<button id="btnAddGroup" type="button" class="btn btn-primary pull-right">Add</button>');
	$("#btnAddGroup").click(function(){
		$("#dialog_add_villa_form").modal('show');
	});
	$('#dialog_add_villa_form').on('shown.bs.modal', function () {
		$("#txtName").focus();
	});
	
	
	fn.app.villa_form.villa_form.add = function(){
		if(document.getElementById("txName").value=='')
		{
			alert('Please fill ypur data');
			$("#txName").focus();
			return false;
		}
		else if(document.getElementById("txContact_Person").value=='')
		{
			alert('Please fill ypur data');
			$("#txContact_Person").focus();
			return false;
		}
		else
		{
			$.post('apps/villa_form/xhr/action-add-villa_form.php',$('#form_add_villa_form').serialize(),function(response){
			if(response.success){
				$("#tblSlide").DataTable().draw();
				$("#dialog_add_villa_form").modal('hide');
				$("#form_add_villa_form")[0].reset();
				
			}else{
				fn.engine.alert("Alert",response.msg);
			}
		},'json');
		return false;
		}
	};
	
	

	
</script>
