<?php
	
?>
<script tyle="text/javascript">
	fn.app.news.news.change = function(id) {
		$.ajax({
			url: "apps/news/view/dialog.news.edit.php",
			data: {id:id},
			type: "POST",
			dataType: "html",
			success: function(html){
				$("body").append(html);
			}	
		});
	};
	
	fn.app.news.news.save_change = function(){
		if(document.getElementById("txtName_edit").value=='')
		{
			alert('Please fill ypur data');
			$("#txtName_edit").focus();
			return false;
		}
		else if(document.getElementById("txtTitle_edit").value=='')
		{
			alert('Please fill ypur data');
			$("#txtTitle_edit").focus();
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
		else if(document.getElementById("parth_edit").value=='')
		{
			//alert('Please fill ypur data');
			$("#uploads").click();
			return false;
		}
		else
		{
			$.post('apps/news/xhr/action-edit-news.php',$('#form_editgroup').serialize(),function(response){
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
