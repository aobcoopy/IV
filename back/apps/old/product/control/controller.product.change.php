<?php
	
?>
<script tyle="text/javascript">
	fn.app.product.product.change = function(id) {
		$.ajax({
			url: "apps/product/view/dialog.product.edit.php",
			data: {id:id},
			type: "POST",
			dataType: "html",
			success: function(html){
				$("body").append(html);
			}	
		});
	};
	
	fn.app.product.product.save_change = function(){
		if(document.getElementById("txtName_edit").value=='')
		{
			alert('Please fill ypur data');
			$("#txtName_edit").focus();
			return false;
		}
		else if(document.getElementById("txtBrief_edit").value=='')
		{
			alert('Please fill ypur data');
			$("#txtBrief_edit").focus();
			return false;
		}
		else if(document.getElementById("txtDetail_edit").value=='')
		{
			alert('Please fill ypur data');
			$("#txtDetail_edit").focus();
			return false;
		}
		else if(document.getElementById("txtPrice_edit").value=='')
		{
			alert('Please fill ypur data');
			$("#txtPrice_edit").focus();
			return false;
		}
		else if(document.getElementById("txtAmount_edit").value=='')
		{
			alert('Please fill ypur data');
			$("#txtAmount_edit").focus();
			return false;
		}
		else if(document.getElementById("category_edit").value=='NULL')
		{
			alert('Please fill ypur data');
			$("#category").focus();
			return false;
		}
		else if(document.getElementById("Tag_edit").value=='')
		{
			alert('Please fill ypur data');
			$("#Tag_edit").focus();
			return false;
		}
		else if(document.getElementById("parth_edit").value=='')
		{
			//alert('Please fill ypur data');
			$("#uploads").click();
			return false;
		}
		else
		{
			$.post('apps/product/xhr/action-edit-product.php',$('#form_editgroup').serialize(),function(response){
				if(response.success){
					$("#tblGroup").DataTable().draw();
					$("#dialog_edit_group").modal('hide');
				}else{
					fn.engine.alert("Alert",response.msg);
				}
			},'json');
			return false;
		}
		
	};
</script>
