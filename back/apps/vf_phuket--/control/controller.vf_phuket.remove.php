<?php
	include_once "apps/vf_phuket/view/dialog.vf_phuket.remove.php";
?>
<script style="text/javascript">
	
	fn.app.vf_phuket.vf_phuket.removein = function(){
		var item_selected =[];
		$('table').find("tr.selected").each(function(index){
			item_selected.push($(this).attr('id'));
		});
		
		$('#dialog_remove_group_in').modal('show');
		//var item_selected = $("#tblSlide").data("selected");
		
		if(item_selected.length > 0){
			$("#dialog_remove_group_in .btnConfirm").show();
			$("#dialog_remove_group_in .lblOutput").html(item_selected.join());
		}else{
			$("#dialog_remove_group_in .lblOutput").html("No Data Selected");
			$("#dialog_remove_group_in .btnConfirm").hide();
		}
	};
	
	
	$("#panel-heading-group").append('<button id="btnRemoveGroup" type="button" class="btn btn-danger pull-right">Remove</button>');
	$("#btnRemoveGroup").click(function(){
		fn.app.vf_phuket.vf_phuket.removein();
	});
	
	
	$("#dialog_remove_group_in .btnCancel").click(function(){
		$('#dialog_remove_group_in').modal('hide');
	});
	$("#dialog_remove_group_in .btnConfirm").click(function(){
		var item_selected =[];
		$('table').find("tr.selected").each(function(index){
			item_selected.push($(this).attr('id'));
		});
		//console.log(item_selected);
		$.post('apps/vf_phuket/xhr/action-remove-vf_phuket.php',{items:item_selected},function(response){
			$(".table").data("selected",[]);
			$(".table").DataTable().draw();
			$('#dialog_remove_group_in').modal('hide');
			//location.reload();
		});
		
		/*var item_selected = $("#tblSlide").data("selected");
		$.post('apps/vf_phuket/xhr/action-remove-vf_phuket.php',{items:item_selected},function(response){
			$("#tblSlide").data("selected",[]);
			$("#tblSlide").DataTable().draw();
			$('#dialog_remove_group_in').modal('hide');
		});*/
	});

</script>
