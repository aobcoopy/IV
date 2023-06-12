<div class="col-md-12">
	<div class="panel panel-default">
		<div id="panel-heading-group" class="panel-heading">
	        <h3 class="panel-title">Comment</h3>
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
                            <!--<th>icon</th>-->
                            <th>name</th>
                            <th>email</th>
                            <th>Villa name</th>
	                        <th>user</th>
                            <th>approve status</th>
                            <th>Updated</th>
                            <!--<th>Status</th>-->
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
  height:50px !important; 
  width:auto;
  cursor:move;
}
.immg
{
	height:50px !important;
}
#tblSlide tbody tr 
{
	height:50px;
}
</style>
<script>
  $(function() {
	//$("#panel-heading-group").append('<button id="btnSavesort" type="button" onclick="fn.app.comment.comment.sort()" class="btn btn-info pull-right">Save Sort</button>');
	//$( "#tblSlide" ).children().sortable();
	//$( "#tblSlide " ).disableSelection();
  });


fn.app.comment.comment.sort = function(id) {
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
		url:"apps/comment/xhr/action-save-sort.php",
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
		"ajax": "apps/comment/store/store-comment.php",
		"aoColumns": [
			{ "bSortable": false},
			//{"bSort" : false, class:"rows", "sWidth":"60px"},
			{"bSortable": false},
			{"bSortable": false },
			{"bSortable": false},
			{"bSortable": false},
			{"bSortable": false , class:"text-center"},
			{"bSortable": false , class:"text-center" },
			//{"bSortable": false },
			{"bSortable": false }
		],
		//"order": [[ 1, "desc" ]],
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
			s += fn.engine.datatable.button('btn-info','fa-search','fn.app.comment.comment.change('+data[0]+')','Edit',' ');
			s += ' ';
			if(data[5]!=1)
			{
				s += fn.engine.datatable.button('btn-success','fa-check','fn.app.comment.comment.approve('+data[0]+')','Approve',' ');
				s += ' ';
			}
			else
			{
				s += fn.engine.datatable.button('btn-danger','fa-remove','fn.app.comment.comment.disapprove('+data[0]+')','Disapprove',' ');
				s += ' ';
			}
			//s += fn.engine.datatable.button('btn-warning','fa-lock','fn.app.comment.group.permission('+data[0]+')');
			$('td', row).eq(7).html(s);
			
			
			<?php /*?>var a = '';
			a += fn.engine.datatable.button('btn-warning','fa-search','fn.app.comment.comment.villa_list_view('+data[0]+')','Villa List',' ');
			$('td', row).eq(5).html(a);<?php */?>
			
			var p='';
			p+= '<img src="'+data[8]+'" class="immg"><br>';
			p+= '<input type="hidden" name="tid" value="'+data[0]+'">';
			p+= '<input type="hidden" name="sor" value="'+ii+'">';
			p+= data[1];
			$('td', row).eq(1).html(p);
			ii ++;
			
			var v = '';
				v+= data[3];
				v+= '<br><a target="blank_" href="../'+data[9]+'.html"<button class="btn btn-info"><i class="fa fa-link"></i></button> ';
			$('td', row).eq(3).html(v);
			
			var a = '';
			if(data[5]==1)
			{
				a += '<span style="color:green"><strong><i class="fa fa-check"></i><br>Approved</strong></span>';
			}
			else
			{
				a += '<span style="color:orange"><strong><i class="fa fa-info"></i><br>Waiting for approved</strong></span>';
			}
			$('td', row).eq(5).html(a);
			//var a = '';
//			if(data[6]==1){
//				a +='<div class="switch">';
//				a +='<input id="cmn-toggle-'+data[0]+'" class="cmn-toggle cmn-toggle-round" checked type="checkbox" onClick="fn.app.edit.change_status('+data[0]+',this)">';
//				a += '<label for="cmn-toggle-'+data[0]+'"></label>';
//				a += '</div>'; 
//			}else {
//				a +='<div class="switch">';
//				a +='<input id="cmn-toggle-'+data[0]+'" class="cmn-toggle cmn-toggle-round" type="checkbox" onClick="fn.app.edit.change_status('+data[0]+',this)">';
//				a += ' <label for="cmn-toggle-'+data[0]+'"></label>';
//				a += '</div>';
//			}
//			$('td', row).eq(6).html(a);
		}
	});
	fn.engine.datatable.add_selectable('tblSlide','chk_group');
	
});
</script>