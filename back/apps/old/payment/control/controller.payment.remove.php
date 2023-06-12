<?php
	include_once "apps/news/view/dialog.news.remove.php";
?>
<script style="text/javascript">
	
	fn.app.news.news.remove = function(){
		
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
		fn.app.news.news.remove();
	});
	
	
	$("#dialog_remove_group .btnCancel").click(function(){
		$('#dialog_remove_group').modal('hide');
	});
	$("#dialog_remove_group .btnConfirm").click(function(){
		var item_selected = $("#tblGroup").data("selected");
		$.post('apps/news/xhr/action-remove-news.php',{items:item_selected},function(response){
			$("#tblGroup").data("selected",[]);
			$("#tblGroup").DataTable().draw();
			$('#dialog_remove_group').modal('hide');
		});
	});

</script>
