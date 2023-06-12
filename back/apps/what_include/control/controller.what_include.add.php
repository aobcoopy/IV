<?php
	include_once "apps/what_include/view/dialog.what_include.add.php";
?>
<script style="text/javascript">

	$("#panel-heading-group").append('<button id="btnAddGroup" type="button" class="btn btn-primary pull-right">Add</button>');
	$("#btnAddGroup").click(function(){
		$("#dialog_add_what_include").modal('show');
	});
	$('#dialog_add_what_include').on('shown.bs.modal', function () {
		$("#txtName").focus();
	});
	
	
	fn.app.what_include.what_include.add = function(){
		if(document.getElementById("txName").value=='')
		{
			alert('Please fill ypur data');
			$("#txName").focus();
			return false;
		}
		else
		{
			$.post('apps/what_include/xhr/action-add-what_include.php',$('#form_add_what_include').serialize(),function(response){
			if(response.success){
				$("#tblSlide").DataTable().draw();
				$("#dialog_add_what_include").modal('hide');
				$("#form_add_what_include")[0].reset();
				
			}else{
				fn.engine.alert("Alert",response.msg);
			}
		},'json');
		return false;
		}
	};
	
	

	
</script>
