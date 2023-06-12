<div class="col-md-12">
	<div class="panel panel-default">
		<div id="panel-heading-group" class="panel-heading">
	        <h3 class="panel-title">Chat Message</h3>
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
	                        <th>Message</th>
                            <th>Answer</th>
	                        <th>Created</th>
	                        <th>Updated</th>
                            <th>status</th>
                            <th>user</th>
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

  $(function() {
	//$("#panel-heading-group").append('<button id="btnSavesort" type="button" onclick="fn.app.chat_group.chat_group.sort()" class="btn btn-info pull-right">Save Sort</button>');
	/*$( "#tblGroup" ).children().sortable();
	$( "#tblGroup " ).disableSelection();
	
	$( ".phof" ).sortable();
	$( ".phof" ).disableSelection();*/
  });


fn.app.chat_group.chat_group.sort = function(id) {
	var data = {
		tables : []			
	};
	var io=1;
	$("#tblGroup tbody tr").each(function(index, element) {
		data.tables.push({
				id : $(this).find("input[name=tid]").val(),
				sort : io
			});
			io++;
	});
	
	
	$.ajax({
		url:"apps/chat_group/xhr/action-save-sort.php",
		type:"POST",
		dataType:"json"	,
		data:data,
		success: function(response){
			$("#tblGroup").DataTable().draw();
			window.location.reload();
		}
	});   
};


$(function(){
	var ii = 1;
	$("#tblGroup").data( "selected", [] );
	$("#tblGroup").DataTable({
		"processing": true,
		"serverSide": true,
		//"ajax": "apps/chat_group/store/store-chat_group.php",
		"ajax": {
            "url": "apps/chat_group/store/store-chat_group.php",
            "type": "POST"
        },
		"aoColumns": [
			{ "bSortable": false},
			{"bSort" : true},
			{"bSortable": true},
			{"bSortable": true},
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
			s += fn.engine.datatable.button('btn-default','fa-pencil','fn.app.chat_group.chat_group.change('+data[0]+')');
			s += ' ';
			//s += fn.engine.datatable.button('btn-warning','fa-lock','fn.app.chat_group.group.permission('+data[0]+')');
			$('td', row).eq(7).html(s);
			
			var p='';
			
				p+= data[1];
				p+= '<input type="hidden" name="tid" value="'+data[0]+'">';
				p+= '<input type="hidden" name="sor" value="'+ii+'">';
				$('td', row).eq(1).html(p);
				ii ++;
			
			
			var a = '';
			if(data[5]==1){
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
			$('td', row).eq(5).html(a);
		}
	});
	fn.engine.datatable.add_selectable('tblGroup','chk_group');
	
});
</script>