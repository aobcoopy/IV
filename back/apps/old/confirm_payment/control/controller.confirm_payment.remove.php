<?php
	include_once "apps/confirm_payment/view/dialog.confirm_payment.remove.php";
?>
<script style="text/javascript">
	
	fn.app.confirm_payment.confirm_payment.remove = function(){
		
		$('#dialog_remove_group').modal('show');
		var item_selected = $("#tblGroup").data("selected");
		
		if(item_selected.length > 0){
			$("#dialog_remove_group .btnConfirm").show();
			$("#dialog_remove_group .lblOutput").html(item_selected.join());
		}else{
			$("#dialog_remove_group .lblOutput").html("No Data Selected");
			$("#dialog_remove_group .btnConfirm").hide();
		}
	};
	
	
	$("#panel-heading-group").append('<button id="btnRemoveGroup" type="button" class="btn btn-danger pull-right">Remove</button>');
	$("#btnRemoveGroup").click(function(){
		fn.app.confirm_payment.confirm_payment.remove();
	});
	
	
	$("#dialog_remove_group .btnCancel").click(function(){
		$('#dialog_remove_group').modal('hide');
	});
	$("#dialog_remove_group .btnConfirm").click(function(){
		var item_selected = $("#tblGroup").data("selected");
		$.post('apps/confirm_payment/xhr/action-remove-confirm_payment.php',{items:item_selected},function(response){
			$("#tblGroup").data("selected",[]);
			$("#tblGroup").DataTable().draw();
			$('#dialog_remove_group').modal('hide');
		});
	});

</script>
