<?php
	include_once "apps/agent/view/dialog.agent.remove.php";
?>
<script style="text/javascript">
	
	fn.app.agent.agent.removein = function(){
		$('#dialog_remove_group_in').modal('show');
		var item_selected = $("#tblSlide").data("selected");
		
		if(item_selected.length > 0){
			$("#dialog_remove_group_in .btnConfirm").show();
			$("#dialog_remove_group_in .lblOutput").html(item_selected.join());
		}else{
			$("#dialog_remove_group_in .lblOutput").html("No Data Selected");
			$("#dialog_remove_group_in .btnConfirm").hide();
		}
	};
	
	
	$("#panel-heading-group").append('<button id="btnRemoveGroup" type="button" class="btn btn-danger pull-right">Remove</button>');
	$("#btnRemoveGroup").click(function(){
		fn.app.agent.agent.removein();
	});
	
	
	$("#dialog_remove_group_in .btnCancel").click(function(){
		$('#dialog_remove_group_in').modal('hide');
	});
	$("#dialog_remove_group_in .btnConfirm").click(function(){
		var item_selected = $("#tblSlide").data("selected");
		$.post('apps/agent/xhr/action-remove-agent.php',{items:item_selected},function(response){
			$("#tblSlide").data("selected",[]);
			$("#tblSlide").DataTable().draw();
			$('#dialog_remove_group_in').modal('hide');
		});
	});

</script>
