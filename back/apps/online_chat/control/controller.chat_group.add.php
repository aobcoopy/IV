<?php
	include_once "apps/chat_group/view/dialog.chat_group.add.php";
?>
<script style="text/javascript">

	
	fn.app.chat_group.chat_group.add = function(){
		if(document.getElementById("tx_Question").value=='')
		{
			alert('Please fill ypur data');
			$("#tx_Question").focus();
			return false;
		}
		else if(document.getElementById("tx_Answer").value=='')
		{
			alert('Please fill ypur data');
			$("#tx_Answer").focus();
			return false;
		}
		else
		{
			$.post('apps/chat_group/xhr/action-add-chat_group.php',$('#form_add_chat_group').serialize(),function(response){
			if(response.success){
				$("#tblGroup").DataTable().draw();
				$("#dialog_add_chat_group").modal('hide');
				$("#form_add_chat_group")[0].reset();
			}else{
				fn.engine.alert("Alert",response.msg);
			}
		},'json');
		return false;
		}
	};

	$("#panel-heading-group").append('<button id="btnAddGroup" type="button" class="btn btn-primary pull-right">Add</button>');
	$("#btnAddGroup").click(function(){
		$("#dialog_add_chat_group").modal('show');
	});
	$('#dialog_add_chat_group').on('shown.bs.modal', function () {
		$("#txtName").focus();
	});
</script>
