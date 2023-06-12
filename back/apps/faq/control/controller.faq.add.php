<?php
	include_once "apps/faq/view/dialog.faq.add.php";
?>
<script style="text/javascript">

	
	fn.app.faq.faq.add = function(){
		if(document.getElementById("txtName").value=='')
		{
			alert('Please fill ypur data');
			$("#txtName").focus();
			return false;
		}
		else
		{
			$.post('apps/faq/xhr/action-add-faq.php',$('#form_add_faq').serialize(),function(response){
			if(response.success){
				$("#tblGroup").DataTable().draw();
				$("#dialog_add_faq").modal('hide');
				$("#form_add_faq")[0].reset();
			}else{
				fn.engine.alert("Alert",response.msg);
			}
		},'json');
		return false;
		}
	};

	$("#panel-heading-group").append('<button id="btnAddGroup" type="button" class="btn btn-primary pull-right">Add</button>');
	$("#btnAddGroup").click(function(){
		$("#dialog_add_faq").modal('show');
	});
	$('#dialog_add_faq').on('shown.bs.modal', function () {
		$("#txtName").focus();
	});
</script>
