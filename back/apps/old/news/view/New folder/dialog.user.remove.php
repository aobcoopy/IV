<?php
	
?>
<div class="modal fade" id="dialog_remove_user" data-backdrop="static">
  	<div class="modal-dialog">
    	<div class="modal-content">
      		<div class="modal-header">
        		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4>Are you sure to remove the following ID!</h4>
      		</div>
		    <div class="modal-body">
				<p class="lblOutput"></p>
		    </div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
				<button type="submit" class="btn btn-danger btnConfirm">Remove</button>
			</div>
	  	</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<script tyle="text/javascript">

$(function(){
	var func = function(){
		
		$('#dialog_remove_user').modal('show');
		var item_selected = $("#tblUser").data("selected");
		
		if(item_selected.length > 0){
			$("#dialog_remove_user .btnConfirm").show();
			$("#dialog_remove_user .lblOutput").html(item_selected.join());
		}else{
			$("#dialog_remove_user .lblOutput").html("No Data Selected");
			$("#dialog_remove_user .btnConfirm").hide();
		}
	};
	$.extend(fn.app.accctrl.user,{remove:func});
	
	$("#accctrl_user .itoolbar").append('<button id="btnRemoveUser" type="button" class="btn btn-danger">Remove</button>');
	$("#btnRemoveUser").click(function(){
		fn.app.accctrl.user.remove();
	});
	
	
	$("#dialog_remove_user .btnCancel").click(function(){
		$('#dialog_remove_user').modal('hide');
	});
	$("#dialog_remove_user .btnConfirm").click(function(){
		var item_selected = $("#tblUser").data("selected");
		$.post('apps/accctrl/xhr/action-remove-user.php',{items:item_selected},function(response){
			$("#tblUser").data("selected",[]);
			$("#tblUser").DataTable().draw();
			$('#dialog_remove_user').modal('hide');
		});
	});
});	

</script>