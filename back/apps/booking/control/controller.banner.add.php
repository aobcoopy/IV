<?php
	include_once "apps/banner/view/dialog.banner.add.php";
?>
<script style="text/javascript">

	
	fn.app.banner.banner.add = function(){
		if(document.getElementById("parth").value=='')
		{
			alert('Please fill ypur data');
			$("#upload").click();
			return false;
		}
		else
		{
			$.post('apps/banner/xhr/action-add-banner.php',$('#form_add_banner').serialize(),function(response){
			if(response.success){
				$("#tblGroup").DataTable().draw();
				$("#dialog_add_banner").modal('hide');
				$("#form_add_banner")[0].reset();
				$("#thumbnail").attr('src','../../../../upload/banner.jpg');
			}else{
				fn.engine.alert("Alert",response.msg);
			}
		},'json');
		return false;
		}
	};

	$("#panel-heading-group").append('<button id="btnAddGroup" type="button" class="btn btn-primary pull-right">Add</button>');
	$("#btnAddGroup").click(function(){
		$("#dialog_add_banner").modal('show');
	});
	$('#dialog_add_banner').on('shown.bs.modal', function () {
		$("#txtName").focus();
	});
</script>
