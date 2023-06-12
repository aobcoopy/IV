<?php
	include_once "apps/properties/view/dialog.properties.remove.php";
?>
<script style="text/javascript">
	
	fn.app.properties.properties.remove = function(){
		var item_selected =[];
		$('table').find("tr.selected").each(function(index){
			item_selected.push($(this).attr('id'));
		});
		//console.log(arr);
		$('#dialog_remove_group').modal('show');
		//var item_selected = $("#tblSlide").data("selected");
		
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
		fn.app.properties.properties.remove();
	});
	
	
	$("#dialog_remove_group .btnCancel").click(function(){
		$('#dialog_remove_group').modal('hide');
	});
	$("#dialog_remove_group .btnConfirm").click(function(){
		//var item_selected = $("#tblSlide").data("selected");
		//Edit by parinyimz 20190818
		var item_selected =[];
		$('table').find("tr.selected").each(function(index){
			item_selected.push($(this).attr('id'));
		});
		//console.log(item_selected);
		$.post('apps/properties/xhr/action-remove-properties.php',{items:item_selected},function(response){
			$("#tblSlide").data("selected",[]);
			$("#tblSlide").DataTable().draw();
			$('#dialog_remove_group').modal('hide');
			location.reload();
		});
	});
	
	
	
	fn.app.properties.properties.remove_rate = function(id,me){
		var Delconf = confirm('คุณต้องการลบใช่หรือไม่ !');
		if(Delconf==false)
			{
				return false;
			}
			else
			{
				$(me).parent().parent().remove();
				$.post('apps/properties/xhr/action-remove-rate.php',{id:id},function(response){
					//$("#tblSlide_rate").data("selected",[]);
					//$("#tblSlide_rate").DataTable().draw();
					//$('#dialog_view_rate').modal('hide');
					
				});
			}		

		
	};
	
	

</script>
