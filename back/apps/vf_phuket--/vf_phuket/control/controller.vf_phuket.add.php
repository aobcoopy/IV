<?php
	//include_once "apps/vf_phuket/view/dialog.vf_phuket.add.php";
?>
<script style="text/javascript">

	$("#panel-heading-group").append('<button id="btnAddGroup" type="button" class="btn btn-primary pull-right" onClick="fn.app.vf_phuket.dialog_add_villa(this)">Add</button>');
	$("#btnAddGroup").click(function(){
		$("#dialog_add_vf_phuket").modal('show');
	});
	$('#dialog_add_vf_phuket').on('shown.bs.modal', function () {
		$("#txtName").focus();
	});
	
	fn.app.vf_phuket.dialog_add_villa = function(me,vid){
		var villaid = $(me).parent().find('.tx_desti').val();
		$.ajax({
			url: "apps/vf_phuket/view/dialog.vf_phuket.add.php",
			data: {vid:villaid},
			type: "POST",
			dataType: "html",
			success: function(html){
				$("body").append(html);
			}	
		});
	};

	fn.app.vf_phuket.vf_phuket.add = function(){
		if(document.getElementById("txName").value=='')
		{
			alert('Please fill ypur data');
			$("#txName").focus();
			return false;
		}
		else if(document.getElementById("txContact_Person").value=='')
		{
			alert('Please fill ypur data');
			$("#txContact_Person").focus();
			return false;
		}
		else
		{
			$.post('apps/vf_phuket/xhr/action-add-vf_phuket.php',$('#form_add_vf_phuket').serialize(),function(response){
			if(response.success){
				$("#tblSlide").DataTable().draw();
				$("#dialog_add_vf_phuket").modal('hide');
				$("#form_add_vf_phuket")[0].reset();
				
			}else{
				fn.engine.alert("Alert",response.msg);
			}
		},'json');
		return false;
		}
	};
	
	
	

	
</script>
