<?php
	include_once "apps/invoice/view/dialog.invoice.add.php";
?>
<script style="text/javascript">

	$("#panel-heading-group").append('<button id="btnAddGroup" type="button" class="btn btn-primary pull-right">Add</button>');
	$("#btnAddGroup").click(function(){
		$("#dialog_add_invoice").modal('show');
	});
	$('#dialog_add_invoice').on('shown.bs.modal', function () {
		$("#txtName").focus();
	});
	
	
	fn.app.invoice.invoice.add = function(){
		if(document.getElementById("txName").value=='')
		{
			alert('Please fill ypur data');
			$("#txName").focus();
			return false;
		}
		else if(document.getElementById("tx_in").value=='')
		{
			alert('Please fill ypur data');
			$("#tx_in").focus();
			return false;
		}
		else if(document.getElementById("tx_out").value=='')
		{
			alert('Please fill ypur data');
			$("#tx_out").focus();
			return false;
		}
		else if(document.getElementById("tx_guest").value=='')
		{
			alert('Please fill ypur data');
			$("#tx_guest").focus();
			return false;
		}
		else if(document.getElementById("tx_price").value=='')
		{
			alert('Please fill ypur data');
			$("#tx_price").focus();
			return false;
		}
		else if(document.getElementById("tx_ref").value=='')
		{
			alert('Please fill ypur data');
			$("#tx_ref").focus();
			return false;
		}
		else
		{
			$.post('apps/invoice/xhr/action-add-invoice.php',$('#form_add_invoice').serialize(),function(response){
			if(response.success){
				$("#tblSlide").DataTable().draw();
				$("#dialog_add_invoice").modal('hide');
				$("#form_add_invoice")[0].reset();
				
			}else{
				fn.engine.alert("Alert",response.msg);
			}
		},'json');
		return false;
		}
	};
	
	

	
</script>
