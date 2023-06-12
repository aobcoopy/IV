<?php
	include_once "apps/spl_cate/view/dialog.spl_cate.remove.php";
?>
<script style="text/javascript">
	
	fn.app.spl_cate.spl_cate.remove = function(){
		
		$('#dialog_remove_group').modal('show');
		var item_selected = $("#tblSlide").data("selected");
		
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
		fn.app.spl_cate.spl_cate.remove();
	});
	
	
	$("#dialog_remove_group .btnCancel").click(function(){
		$('#dialog_remove_group').modal('hide');
	});
	$("#dialog_remove_group .btnConfirm").click(function(){
		var item_selected = $("#tblSlide").data("selected");
		$.post('apps/spl_cate/xhr/action-remove-spl_cate.php',{items:item_selected},function(response){
			$("#tblSlide").data("selected",[]);
			$("#tblSlide").DataTable().draw();
			$('#dialog_remove_group').modal('hide');
		});
	});

</script>
