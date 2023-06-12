<div class="col-md-12">
	<div class="panel panel-default">
		<div id="panel-heading-group" class="panel-heading">
	        <h3 class="panel-title">Confirm Payment</h3>
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
                            <th>code</th>
                            <th>date</th>
                            <th>time</th>
                            <th>amount</th>
                            <th>photo</th>
                            <th>detail</th>
	                        <th>comment</th>
                            <th>bank</th>
                            <th>update</th>
                            <th>status</th>
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
		"ajax": "apps/confirm_payment/store/store-confirm_payment.php",
		"aoColumns": [
			{ "bSortable": false},
			{"bSort" : true},
			{"bSortable": true},
			{"bSortable": true},
			{"bSortable": false },
			{"bSortable": false },
			{"bSortable": false },
			{"bSortable": false },
			{"bSortable": false },
			{"bSortable": false },
			{"bSortable": false },
			{"bSortable": false }
		],
		"order": [[ 1, "desc" ]],
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
			s += fn.engine.datatable.button('btn-default','fa-search','fn.app.confirm_payment.confirm_payment.change('+data[0]+')');
			s += ' ';
			s += fn.engine.datatable.button('btn-info','fa-check-square-o ','fn.app.confirm_payment.confirm_payment.save_change('+data[0]+')');
			$('td', row).eq(11).html(s);
			
			
			var t='';
			if(data[10]==1)
			{
				t += '<button class="btn btn-xs btn-success"><i class="fa fa-check" aria-hidden="true"></i> CHecked</button>';
			}
			else
			{
				t += '<button class="btn btn-xs btn-warning"><i class="fa fa-clock-o" aria-hidden="true"></i> Pending</button>';
			}
			$('td', row).eq(10).html(t);
			
			var ph='';
				ph += '<img src="'+data[5]+'" width="100%">';
			$('td', row).eq(5).html(ph);
			
			
			var ic='';
			if(data[8]=='kasikorn')
			{
				ic += '<center><img src="../../../../upload/bank/kbank.png" width="50"></center><br>';
				ic += '<center>'+data[8]+'</center>';
			}
			else if(data[8]=='bangkok')
			{
				ic += '<center><img src="../../../../upload/bank/bkk.png" width="50"></center><br>';
				ic += '<center>'+data[8]+'</center>';
			}
			else if(data[8]=='scb')
			{
				ic += '<center><img src="../../../../upload/bank/scb.png" width="50"></center><br>';
				ic += '<center>'+data[8]+'</center>';
			}
			else if(data[8]=='krungsri')
			{
				ic += '<center><img src="../../../../upload/bank/krungsri.png" width="50"></center><br>';
				ic += '<center>'+data[8]+'</center>';
			}
			else if(data[8]=='ktb')
			{
				ic += '<center><img src="../../../../upload/bank/ktb.png" width="50"></center><br>';
				ic += '<center>'+data[8]+'</center>';
			}
			$('td', row).eq(8).html(ic);
			
			
			/*var p='';
			p+= '<img src="'+data[1]+'" width="100%">';
			$('td', row).eq(1).html(p);
			*/
			var a = '';
			if(data[10]==1){
				a +='<div class="switch">';
				a +='<input id="cmn-toggle-'+data[0]+'" class="cmn-toggle cmn-toggle-round" checked type="checkbox" onClick="fn.app.edit.change_status('+data[0]+',this)">';
				a += '<label for="cmn-toggle-'+data[0]+'"></label>';
				a += '</div>'; 
				a += '<center>'+fn.engine.datatable.button('btn-default','fa-search','fn.app.confirm_payment.confirm_payment.change('+data[0]+')')+'</center>';
			}else {
				a +='<div class="switch">';
				a +='<input id="cmn-toggle-'+data[0]+'" class="cmn-toggle cmn-toggle-round" type="checkbox" onClick="fn.app.edit.change_status('+data[0]+',this)">';
				a += ' <label for="cmn-toggle-'+data[0]+'"></label>';
				a += '</div>';
				a += '<center>'+fn.engine.datatable.button('btn-default','fa-search','fn.app.confirm_payment.confirm_payment.change('+data[0]+')')+'</center>';
			}
			$('td', row).eq(11).html(a);
		}
	});
	fn.engine.datatable.add_selectable('tblGroup','chk_group');
	
});
</script>