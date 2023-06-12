<div class="col-md-12">
	<div class="panel panel-default">
		<div id="panel-heading-log" class="panel-heading">
	        <h3 class="panel-title">Log Table</h3>
	    </div>
	    <div class="panel-body">
	        <div class="table-responsive">
	            <table id="tblLog" class="table table-striped table-bordered datatable">
	                <thead>
	                    <tr>
	                        <th>ID</th>
	                        <th>Datetime</th>
	                        <th>User</th>
	                        <th>Action</th>
	                        <th>Value</th>
	                        <th>Location</th>
							<th>Action</th>
	                    </tr>
	                </thead>
	                <tbody>
	                    
	                </tbody>
	            </table>	        
	        </div>
	    </div>
	</div>
</div>
<script>
$(function(){
	//$("#tblLog").data( "selected", [] );
	$("#tblLog").DataTable({
		"processing": true,
		"serverSide": true,
		"ajax": "apps/log/store/store-log.php",
		"aoColumns": [
			{ "bSortable": false},
			{"bSort" : true},
			{"bSortable": true},
			{"bSortable": true},
			{"bSortable": false },
			{"bSortable": false },
			{"bSortable": false }
		],
		"order": [[ 1, "desc" ]],
		"createdRow": function ( row, data, index ) {
			var s = '';
			/*
			var selected = false;
			var checked = "";
			if ( $.inArray(data.DT_RowId, $("#tblLog").data( "selected")) !== -1 ) {
                $(row).addClass('selected');
				selected = true;
            }
			var s = '';
			s += fn.engine.datatable.checkbox('chk_log',data[0],selected);
			$('td', row).eq(0).html(s).addClass("text-center");
			*/
			
			s += fn.engine.datatable.button('btn-info','fa-search','fn.app.log.view('+data[0]+')');
			$('td', row).eq(6).html(s);
		}
	});
	//fn.engine.datatable.add_selectable('tblLog','chk_log');
	
});
</script>