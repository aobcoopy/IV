<div class="col-md-12">
	<div class="panel panel-default">
		<div id="panel-heading-user" class="panel-heading">
	        <h3 class="panel-title">User</h3>
	    </div>
	    <div class="panel-body">
	        <div class="table-responsive">
	            <table id="tblUser" class="table table-striped table-bordered datatable">
	                <thead>
	                    <tr>
	                        <th>
								<label class="label-checkbox">
									<input id="chk_user" type="checkbox"><span class="custom-checkbox"></span>
								</label>
							</th>
							<th class="text-center">Fullname</th>
							<th class="text-center">Email</th>
							<th class="text-center">Mobile</th>
							<th class="text-center">User</th>
							<th class="text-center">Group</th>
							<th class="text-center">Status</th>
							<th class="text-center">Last Login</th>
							<th class="text-center">Action</th>
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
	$("#tblUser").data( "selected", [] );
	$("#tblUser").DataTable({
		"processing": true,
		"serverSide": true,
		"ajax": "apps/accctrl/store/store-user.php",
		"aoColumns": [
			{ "bSortable": false , "sWidth": "30px"},
			{"bSort" : true},
			{"bSortable": true},
			{"bSortable": true},
			{"bSortable": true},
			{"bSortable": true},
			{"bSortable": true},
			{"bSortable": true},
			{"bSortable": false , "sWidth": "50px" }
		],
		"order": [[ 1, "desc" ]],
		"createdRow": function ( row, data, index ) {
			var selected = false;
			var checked = "";
			if ( $.inArray(data.DT_RowId, $("#tblUser").data( "selected")) !== -1 ) {
                $(row).addClass('selected');
				selected = true;
            }
			var s = '';
			s += fn.engine.datatable.checkbox('chk_user',data[0],selected);
			$('td', row).eq(0).html(s).addClass("text-center");
			s = '';
			s += fn.engine.datatable.button('btn-default','fa-pencil','fn.app.accctrl.user.change('+data[0]+')');
			$('td', row).eq(8).html(s);
		}
	});
	fn.engine.datatable.add_selectable('tblUser','chk_user');
	
});
</script>