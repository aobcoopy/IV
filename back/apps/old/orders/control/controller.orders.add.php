<?php
	include_once "apps/news/view/dialog.news.add.php";
?>
<script style="text/javascript">

	
	fn.app.news.news.add = function(){
		if(document.getElementById("txtName").value=='')
		{
			alert('Please fill ypur data');
			$("#txtName").focus();
			return false;
		}
		else if(document.getElementById("txtTitle").value=='')
		{
			alert('Please fill ypur data');
			$("#txtTitle").focus();
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
		else if(document.getElementById("parth").value=='')
		{
			alert('Please fill ypur data');
			$("#upload").click();
			return false;
		}
		else
		{
			$.post('apps/news/xhr/action-add-news.php',$('#form_add_news').serialize(),function(response){
			if(response.success){
				$("#tblGroup").DataTable().draw();
				$("#dialog_add_news").modal('hide');
				$("#form_add_news")[0].reset();
				$("#thumbnail").attr('src','../../../../upload/news.jpg');
			}else{
				fn.engine.alert("Alert",response.msg);
			}
		},'json');
		return false;
		}
	};

	$("#panel-heading-group").append('<button id="btnAddGroup" type="button" class="btn btn-primary pull-right">Add</button>');
	$("#btnAddGroup").click(function(){
		$("#dialog_add_news").modal('show');
	});
	$('#dialog_add_news').on('shown.bs.modal', function () {
		$("#txtName").focus();
	});
</script>
