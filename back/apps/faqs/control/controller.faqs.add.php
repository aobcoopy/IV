<?php
	include_once "apps/faqs/view/dialog.faqs.add.php";
?>
<script style="text/javascript">

	
	fn.app.faqs.faqs.add = function(){
		if(document.getElementById("txtTitle").value=='')
		{
			alert('Please fill ypur data');
			$("#txtTitle").focus();
			return false;
		}
		else if(document.getElementById("txtName").value=='NULL')
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
			$.post('apps/faqs/xhr/action-add-faqs.php',$('#form_add_faqs').serialize(),function(response){
			if(response.success){
				$("#tblGroup").DataTable().draw();
				$("#dialog_add_faqs").modal('hide');
				$("#form_add_faqs")[0].reset();
			}else{
				fn.engine.alert("Alert",response.msg);
			}
		},'json');
		return false;
		}
	};

	$("#panel-heading-group").append('<button id="btnAddGroup" type="button" class="btn btn-primary pull-right">Add</button>');
	$("#btnAddGroup").click(function(){
		$("#dialog_add_faqs").modal('show');
	});
	$('#dialog_add_faqs').on('shown.bs.modal', function () {
		$("#txtName").focus();
	});
</script>
