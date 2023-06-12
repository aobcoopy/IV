<?php
	include_once "apps/subcategory/view/dialog.subcategory.add.php";
?>
<script style="text/javascript">

	
	fn.app.subcategory.subcategory.add = function(){
		if(document.getElementById("txtName").value=='')
		{
			alert('Please fill ypur data');
			$("#txtName").focus();
			return false;
		}
		else if(document.getElementById("parent").value=='NULL')
		{
			alert('Please fill ypur data');
			$("#parent").focus();
			return false;
		}
		else
		{
			$.post('apps/subcategory/xhr/action-add-subcategory.php',$('#form_add_subcategory').serialize(),function(response){
			if(response.success){
				$("#tblGroup").DataTable().draw();
				$("#dialog_add_subcategory").modal('hide');
				$("#form_add_subcategory")[0].reset();
			}else{
				fn.engine.alert("Alert",response.msg);
			}
		},'json');
		return false;
		}
	};

	$("#panel-heading-group").append('<button id="btnAddGroup" type="button" class="btn btn-primary pull-right">Add</button>');
	$("#btnAddGroup").click(function(){
		$("#dialog_add_subcategory").modal('show');
	});
	$('#dialog_add_subcategory').on('shown.bs.modal', function () {
		$("#txtName").focus();
	});
</script>
