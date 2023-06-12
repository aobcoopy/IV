<?php
	include_once "apps/category/view/dialog.category.add.php";
?>
<script style="text/javascript">

	
	fn.app.category.category.add = function(){
		if(document.getElementById("txtName").value=='')
		{
			alert('Please fill ypur data');
			$("#txtName").focus();
			return false;
		}
		else
		{
			$.post('apps/category/xhr/action-add-category.php',$('#form_add_category').serialize(),function(response){
			if(response.success){
				$("#tblGroup").DataTable().draw();
				$("#dialog_add_category").modal('hide');
				$("#form_add_category")[0].reset();
			}else{
				fn.engine.alert("Alert",response.msg);
			}
		},'json');
		return false;
		}
	};

	$("#panel-heading-group").append('<button id="btnAddGroup" type="button" class="btn btn-primary pull-right">Add</button>');
	$("#btnAddGroup").click(function(){
		$("#dialog_add_category").modal('show');
	});
	$('#dialog_add_category').on('shown.bs.modal', function () {
		$("#txtName").focus();
	});
</script>
