<div class="col-md-12">
	<div class="panel panel-default">
		<div id="panel-heading-group" class="panel-heading">
	        <h3 class="panel-title">News and Promotions</h3>
	    </div>
	    <div class="panel-body">
	        <div class="table-responsive">
	            <table id="tblGroup" class="table table-striped table-bordered datatable">
	                <thead>
	                    <tr>
	                        <th>
								<label class="label-checkbox">
									<input id="chk_group" type="checkbox"><span class="custom-checkbox"></span>
								</label>
							</th>
                            <th>Photo</th>
                            <th>Name</th>
                            <th>title</th>
                            <th>brief</th>
                            <th>User</th>
	                        <th>Updated</th>
                            <th>Status</th>
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
	$("#tblGroup").data( "selected", [] );
	$("#tblGroup").DataTable({
		"processing": true,
		"serverSide": true,
		"ajax": "apps/news/store/store-news.php",
		"aoColumns": [
			{ "bSortable": false},
			{"bSort" : true},
			{"bSortable": true},
			{"bSortable": true},
			{"bSortable": false },
			{"bSortable": false },
			{"bSortable": false },
			{"bSortable": false },
			{"bSortable": false }
		],
		//"order": [[ 0, "desc" ]],
		"createdRow": function ( row, data, index ) {
			var selected = false;
			var checked = "";
			if ( $.inArray(data.DT_RowId, $("#tblGroup").data( "selected")) !== -1 ) {
                $(row).addClass('selected');
				selected = true;
            }
			var s = '';
			s += fn.engine.datatable.checkbox('chk_group',data[0],selected);
			$('td', row).eq(0).html(s).addClass("text-center");
			s = '';
			s += fn.engine.datatable.button('btn-default','fa-pencil','fn.app.news.news.change('+data[0]+')');
			s += ' ';
			//s += fn.engine.datatable.button('btn-warning','fa-lock','fn.app.news.group.permission('+data[0]+')');
			$('td', row).eq(8).html(s);
			
			
			
			
			var p='';
			p+= '<img src="'+data[1]+'" width="100%">';
			$('td', row).eq(1).html(p);
			
			var a = '';
			if(data[7]==1){
				a +='<div class="switch">';
				a +='<input id="cmn-toggle-'+data[0]+'" class="cmn-toggle cmn-toggle-round" checked type="checkbox" onClick="fn.app.edit.change_status('+data[0]+',this)">';
				a += '<label for="cmn-toggle-'+data[0]+'"></label>';
				a += '</div>'; 
			}else {
				a +='<div class="switch">';
				a +='<input id="cmn-toggle-'+data[0]+'" class="cmn-toggle cmn-toggle-round" type="checkbox" onClick="fn.app.edit.change_status('+data[0]+',this)">';
				a += ' <label for="cmn-toggle-'+data[0]+'"></label>';
				a += '</div>';
			}
			$('td', row).eq(7).html(a);
		}
	});
	fn.engine.datatable.add_selectable('tblGroup','chk_group');
	
});
</script>