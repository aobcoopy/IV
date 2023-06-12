<?php
	include_once "apps/tag/view/dialog.tag.add.php";
?>
<script style="text/javascript">

	$("#panel-heading-group").append('<button id="btnAddGroup" type="button" class="btn btn-primary pull-right">Add</button>');
	$("#btnAddGroup").click(function(){
		$("#dialog_add_tag").modal('show');
	});
	$('#dialog_add_tag').on('shown.bs.modal', function () {
		$("#txtName").focus();
	});
	
	
	fn.app.tag.tag.add = function(){
		if(document.getElementById("txName").value=='')
		{
			alert('Please fill ypur data');
			$("#txName").focus();
			return false;
		}
		else
		{
			$.post('apps/tag/xhr/action-add-tag.php',$('#form_add_tag').serialize(),function(response){
			if(response.success){
				$("#tblSlide").DataTable().draw();
				$("#dialog_add_tag").modal('hide');
				$("#form_add_tag")[0].reset();
				
			}else{
				fn.engine.alert("Alert",response.msg);
			}
		},'json');
		return false;
		}
	};
	
	

	
</script>
