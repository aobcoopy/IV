<?php
	include_once "apps/comment/view/dialog.comment.add.php";
?>
<script style="text/javascript">

	$("#panel-heading-group").append('<button id="btnAddGroup" type="button" class="btn btn-primary pull-right">Add</button>');
	$("#btnAddGroup").click(function(){
		$("#dialog_add_comment").modal('show');
	});
	$('#dialog_add_comment').on('shown.bs.modal', function () {
		$("#txtName").focus();
	});
	
	
	fn.app.comment.comment.add = function(){
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
			$.post('apps/comment/xhr/action-add-comment.php',$('#form_add_comment').serialize(),function(response){
			if(response.success){
				$("#tblSlide").DataTable().draw();
				$("#dialog_add_comment").modal('hide');
				$("#form_add_comment")[0].reset();
				
			}else{
				fn.engine.alert("Alert",response.msg);
			}
		},'json');
		return false;
		}
	};
	
	

	
</script>
