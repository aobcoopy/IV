<?php
	include_once "apps/agent/view/dialog.agent.add.php";
?>
<script style="text/javascript">

	$("#panel-heading-group").append('<button id="btnAddGroup" type="button" class="btn btn-primary pull-right">Add</button>');
	$("#btnAddGroup").click(function(){
		$("#dialog_add_agent").modal('show');
	});
	$('#dialog_add_agent').on('shown.bs.modal', function () {
		$("#txtName").focus();
	});
	
	
	fn.app.agent.agent.add = function(){
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
			$.post('apps/agent/xhr/action-add-agent.php',$('#form_add_agent').serialize(),function(response){
			if(response.success){
				$("#tblSlide").DataTable().draw();
				$("#dialog_add_agent").modal('hide');
				$("#form_add_agent")[0].reset();
				
			}else{
				fn.engine.alert("Alert",response.msg);
			}
		},'json');
		return false;
		}
	};
	
	

	
</script>
