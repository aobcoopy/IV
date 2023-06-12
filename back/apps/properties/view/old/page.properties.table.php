<div class="col-md-12">
	<div class="panel panel-default">
		<div id="panel-heading-group" class="panel-heading">
	        <h3 class="panel-title">Properties</h3>
	    </div>
	    <div class="panel-body">
	        <div class="table-responsive">
	            <table id="tblSlide" class="table table-striped table-bordered datatable">
	                <thead>
	                    <tr>
	                        <th>
								<label class="label-checkbox">
									<input id="chk_group" type="checkbox"><span class="custom-checkbox"></span>
								</label>
							</th>
                            <th>Photo</th>
                            <th>name</th>
                            <th>brief</th>
	                        <th>user</th>
                            <th>Updated</th>
                            <th>Status</th>
                            <th>Sort</th>
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
<style>
.rows img
{
  height:200px !important; 
  width:auto;
  cursor:move;
}

#tblSlide tbody tr 
{
	height:200px;
}
</style>
<script>
  $(function() {
	$("#panel-heading-group").append('<button id="btnSavesort" type="button" onclick="fn.app.properties.properties.sort()" class="btn btn-info pull-right">Save Sort</button>');
	$( "#tblSlide" ).children().sortable();
	$( "#tblSlide " ).disableSelection();
	
	$( ".phof" ).sortable();
	$( ".phof" ).disableSelection();
  });


fn.app.properties.properties.sort = function(id) {
	var data = {
		tables : []			
	};
	var io=1;
	$("#tblSlide tbody tr").each(function(index, element) {
		data.tables.push({
				id : $(this).find("input[name=tid]").val(),
				sort : io
			});
			io++;
	});
	
	
	$.ajax({
		url:"apps/properties/xhr/action-save-sort.php",
		type:"POST",
		dataType:"json"	,
		data:data,
		success: function(response){
			$("#tblSlide").DataTable().draw();
			window.location.reload();
		}
	});   
};





$(function(){
	var ii = 1;
	$("#tblSlide").data( "selected", [] );
	$("#tblSlide").DataTable({
		"processing": true,
		"serverSide": true,
		"ajax": "apps/properties/store/store-properties.php",
		"aoColumns": [
			{ "bSortable": false},
			{"bSort" : false, class:"rows"},
			{"bSortable": false},
			{"bSortable": false},
			{"bSortable": false},
			{"bSortable": false },
			{"bSortable": false , class:"text-center" },
			{"bSortable": false },
			{"bSortable": false }
		],
		//"order": [[ 7, "desc" ]],
		"createdRow": function ( row, data, index ) {
			var selected = false;
			var checked = "";
			if ( $.inArray(data.DT_RowId, $("#tblSlide").data( "selected")) !== -1 ) {
                $(row).addClass('selected');
				selected = true;
            }
			var s = '';
			s += fn.engine.datatable.checkbox('chk_group',data[0],selected);
			$('td', row).eq(0).html(s).addClass("text-center");
			s = '';
			s += fn.engine.datatable.button('btn-default','fa-pencil','fn.app.properties.properties.change('+data[0]+')');
			s += ' ';
			s += fn.engine.datatable.button('btn-info','fa-check-square-o','fn.app.properties.properties.check('+data[0]+')');
			s += ' ';
			s += fn.engine.datatable.button('btn-warning','fa-calendar','fn.app.properties.properties.popup_pricing('+data[0]+')');
			s += ' ';
			s += fn.engine.datatable.button('btn-success','fa-picture-o','fn.app.properties.properties.popup_photo('+data[0]+')');s
			$('td', row).eq(8).html(s);
			
			
			
			var p='';
			console.log(data[1]);
			if(data[1]=='0')
			{
				p+= '';
				$('td', row).eq(1).html(p);
			}
			else
			{
				p+= '<img src="'+data[1]['img']+'" width="100%">';
				p+= '<input type="hidden" name="tid" value="'+data[0]+'">';
				p+= '<input type="hidden" name="sor" value="'+ii+'">';
				$('td', row).eq(1).html(p);
				ii ++;
			}
			
			
			
			
			var a = '';
			if(data[6]==1){
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
			$('td', row).eq(6).html(a);
		}
	});
	fn.engine.datatable.add_selectable('tblSlide','chk_group');
	
});
</script>