<?php
	include_once "apps/testimonial/view/dialog.testimonial.remove.php";
?>
<script style="text/javascript">
	
	fn.app.testimonial.testimonial.remove = function(){
		
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
		fn.app.testimonial.testimonial.remove();
	});
	
	
	$("#dialog_remove_group .btnCancel").click(function(){
		$('#dialog_remove_group').modal('hide');
	});
	$("#dialog_remove_group .btnConfirm").click(function(){
		var item_selected = $("#tblSlide").data("selected");
		$.post('apps/testimonial/xhr/action-remove-testimonial.php',{items:item_selected},function(response){
			$("#tblSlide").data("selected",[]);
			$("#tblSlide").DataTable().draw();
			$('#dialog_remove_group').modal('hide');
		});
	});

</script>
