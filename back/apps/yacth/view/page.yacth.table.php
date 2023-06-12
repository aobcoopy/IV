<div class="col-md-12">
	<div class="panel panel-default">
		<div id="panel-heading-group" class="panel-heading">
	        <h3 class="panel-title">Yacht</h3>
			<a href="/yacht" target="_blank"><button class="btn btn-success">Preview Page</button></a>
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
                            <th>photo</th>
                            <th>name</th>
                            <th>price</th>
                            <th>bedroom</th>
                            <th>maximum</th>
                            <th>destination</th>
                            <th>Type</th>
                            <th>Sailing Route</th>
                            <th>user</th>
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
<style>
.rows img
{
  height:80px !important; 
  width:auto;
  cursor:move;
}

#tblSlide tbody tr 
{
	height:80px;
}
.i_remove
{
  position:absolute;
  right:0;
  top:0;
  margin-top:10px;
  margin-right:25px;
  cursor:pointer;
}
</style>
<script>
 /* $(function() {
	$("#panel-heading-group").append('<button id="btnSavesort" type="button" onclick="fn.app.yacth.yacth.sort()" class="btn btn-info pull-right">Save Sort</button>');
	$( "#tblSlide" ).children().sortable();
	$( "#tblSlide " ).disableSelection();
  });*/


fn.app.yacth.yacth.sort = function(id) {
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
		url:"apps/yacth/xhr/action-save-sort.php",
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
		"ajax": "apps/yacth/store/store-yacth.php",
		"aoColumns": [
			{ "bSortable": false},
			{"bSort" : false, class:"rows"},
			{"bSortable": false},
            {"bSortable": false},
			{"bSortable": false},
            {"bSortable": false},
			{"bSortable": false},
            {"bSortable": false},
			{"bSortable": false},
			{"bSortable": false},
			{"bSortable": false},
			{"bSortable": false},
			{"bSortable": false}
		],
		//"order": [[ 0, "desc" ]],
		 "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
		 iDisplayLength: -1,
		"createdRow": function ( row, data, index ) {
			var selected = false;
			var checked = "";
			if ( $.inArray(data.DT_RowId, $("#tblSlide").data( "selected")) !== -1 ) {
                $(row).addClass('selected');
				selected = true;
            }
			var s = '';
			s += fn.engine.datatable.checkbox('chk_group',data[0],selected);
			s += '<br>';
			s += data[0];
			$('td', row).eq(0).html(s).addClass("text-center");
			s = '';
			s += fn.engine.datatable.button('btn-default','fa-pencil','fn.app.yacth.yacth.change('+data[0]+')','Edit');
			s += ' ';
			s += fn.engine.datatable.button('btn-info','fa-photo','fn.app.yacth.yacth.dialog_photo('+data[0]+')','Cover');
			s += ' ';
			s += fn.engine.datatable.button('btn-danger','fa-th','fn.app.yacth.yacth.dialog_inside_photo2('+data[0]+')','Photo');
			s += ' ';
			s += fn.engine.datatable.button('btn-info','fa-link','fn.app.yacth.yacth.preview('+data[0]+')','Preview',' Preview');
			/*s += fn.engine.datatable.button('btn-danger','fa-th','fn.app.yacth.yacth.dialog_inside_photo('+data[0]+')','Photo');
			s += ' ';*/
			/*s += fn.engine.datatable.button('btn-warning','fa-list','fn.app.yacth.yacth.dialog_pricelist('+data[0]+')','Price List');
			s += ' ';*/
			//s += fn.engine.datatable.button('btn-warning','fa-lock','fn.app.yacth.group.permission('+data[0]+')');
			$('td', row).eq(12).html(s);
			
			
			
			
			
			
			var p='';
			if(data[1]!='')
			{
				p+= '<img src="../../../../'+data[1]+'" width="100%">';
			}
			else
			{
				p+= '<img src="../../../../upload/photo.jpg" width="100%">';
			}
			p+= '<input type="hidden" name="tid" value="'+data[0]+'">';
			p+= '<input type="hidden" name="sor" value="'+ii+'">';
			$('td', row).eq(1).html(p);
			ii ++;
			
			var a = '';
			if(data[11]==1){
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
			$('td', row).eq(11).html(a);
			
			/*var a = '';
			if(data[10]==1){
				a +='<div class="switch">';
				a +='<input id="cmn-toggle-'+data[0]+'-v" class="cmn-toggle cmn-toggle-round" checked type="checkbox" onClick="fn.app.edit.change_v_status('+data[0]+',this)">';
				a += '<label for="cmn-toggle-'+data[0]+'-v"></label>';
				a += '</div>'; 
			}else {
				a +='<div class="switch">';
				a +='<input id="cmn-toggle-'+data[0]+'-v" class="cmn-toggle cmn-toggle-round" type="checkbox" onClick="fn.app.edit.change_v_status('+data[0]+',this)">';
				a += ' <label for="cmn-toggle-'+data[0]+'-v"></label>';
				a += '</div>';
			}
			$('td', row).eq(10).html(a);*/
		}
	});
	fn.engine.datatable.add_selectable('tblSlide','chk_group');
	
});
</script>