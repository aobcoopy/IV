<?php
	session_start();
	include_once "../../../config/define.php";
	include_once "../../../libs/class/db.php";
	
	@ini_set('display_errors',DEBUG_MODE?1:0);
	date_default_timezone_set(DEFAULT_TIMEZONE);
	
	$dbc = new dbc;
	$dbc->Connect();
	
?> 
<div class="modal fade" id="dialog_view_rate" data-backdrop="static">
  	<div class="modal-dialog  " style="width:100%;"> 
		
    	<div class="modal-content">
      		<div class="modal-header">
        		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4>Rating</h4>
      		</div>
            <div class="modal-body">
                <div class="table-responsive">
                    <div class="tb"></div>
                </div>
            </div>
			<div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			</div>
	  	</div><!-- /.modal-content -->
		
        
       
       
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<script tyle="text/javascript">
$(function(){
	$.ajax({
		url: "apps/properties/xhr/action-load_rating.php",
		data: {idrate:<?php echo $_REQUEST['idrate']; ?>},
		type: "POST",
		dataType: "html",
		success: function(html){
			//$("body").append(html);
			$(".tb").html(html);
		}	
	});
		
	$("#tblSlide_rate").DataTable();
	/*$("#tblSlide_rate").DataTable({
			
		"processing": true,
		"serverSide": true,
		"ajax": "apps/properties/store/store-rating.php?idrate=<?php echo $_REQUEST['idrate'];?>",
		"aoColumns": [
			{ "bSortable": false},
			{"bSort" : false, class:"rows"},
			{"bSortable": false},
			{"bSortable": false},
			{"bSortable": false}
		],
		//"order": [[ 7, "desc" ]],
		"createdRow": function ( row, data, index ) {
			
			var s = '';
			s += fn.engine.datatable.button('btn-danger','fa-minus','fn.app.properties.properties.remove_rate('+data[0]+')');
			$('td', row).eq(0).html(s);
		}
	});*/
	
	
	$('#dialog_view_rate').on('shown.bs.modal', function () {
		//$("#txtName").focus();
	});
	$("#dialog_view_rate").on("hidden.bs.modal",function(){
		//$(this).remove();
	});
	setTimeout(function(){
		$("#dialog_view_rate").modal('show');
	},500);
	
});	

	
</script>
