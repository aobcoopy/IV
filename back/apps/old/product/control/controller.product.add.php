<?php
	include_once "apps/product/view/dialog.product.add.php";
?>
<script style="text/javascript">

	
	fn.app.product.product.add = function(){
		if(document.getElementById("txtName").value=='')
		{
			alert('Please fill ypur data');
			$("#txtName").focus();
			return false;
		}
		else if(document.getElementById("txtBrief").value=='')
		{
			alert('Please fill ypur data');
			$("#txtBrief").focus();
			return false;
		}
		else if(document.getElementById("txtDetail").value=='')
		{
			alert('Please fill ypur data');
			$("#txtDetail").focus();
			return false;
		}
		else if(document.getElementById("txtPrice").value=='')
		{
			alert('Please fill ypur data');
			$("#txtPrice").focus();
			return false;
		}
		else if(document.getElementById("txtAmount").value=='')
		{
			alert('Please fill ypur data');
			$("#txtAmount").focus();
			return false;
		}
		else if(document.getElementById("category").value=='NULL')
		{
			alert('Please fill ypur data');
			$("#category").focus();
			return false;
		}
		else if(document.getElementById("Tag").value=='')
		{
			alert('Please fill ypur data');
			$("#Tag").focus();
			return false;
		}
		else if(document.getElementById("parth").value=='')
		{
			alert('Please fill ypur data');
			$("#upload").click();
			return false;
		}
		else
		{
			$.post('apps/product/xhr/action-add-product.php',$('#form_add_product').serialize(),function(response){
			if(response.success){
				$("#tblGroup").DataTable().draw();
				$("#dialog_add_product").modal('hide');
				$("#form_add_product")[0].reset();
				$("input").val('');
				$("#thumbnail").attr('src','');
			}else{
				fn.engine.alert("Alert",response.msg);
			}
		},'json');
		return false;
		}
	};

	$("#panel-heading-group").append('<button id="btnAddGroup" type="button" class="btn btn-primary pull-right">Add</button>');
	$("#btnAddGroup").click(function(){
		$("#dialog_add_product").modal('show');
	});
	$('#dialog_add_product').on('shown.bs.modal', function () {
		$("#txtName").focus();
	});
</script>
