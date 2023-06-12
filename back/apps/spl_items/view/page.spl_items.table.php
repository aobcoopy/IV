<div class="col-md-12">
	<div class="panel panel-default">
		<div id="panel-heading-group" class="panel-heading">
	        <h3 class="panel-title">Product items</h3>
	    </div>
	    <div class="panel-body">
			<div class="loaded" style="display:none;"><img src="../../upload/loading.gif" width="50" class="center-block" alt="">
			<br>
		Loading...	</div>
			<div class="show_datas"></div>

		

	    </div>
	</div>
</div>
<style>
.loaded
{
  position:absolute;
  z-index:20;
  background:#00000099;
  width:100%;
  height:100%;
  padding-top:50px;
  text-align: center;
  color: #FFF;
}
.rows img
{
  height:80px !important; 
  width:auto;
  cursor:move;
}
.table tbody tr td,.table thead tr th
{
	padding: 5px;
}

#tblSlide tbody tr 
{
	height:80px;
}
</style>
<script>
/*  $(function() {
	$("#panel-heading-group").append('<button id="btnSavesort" type="button" onclick="fn.app.spl_items.spl_items.sort()" class="btn btn-info pull-right">Save Sort</button>');
	$( "#tblSlide" ).children().sortable();
	$( "#tblSlide " ).disableSelection();
  });*/

  fn.app.spl_items.spl_items.load_data = function()
  {
	$(".loaded").show();
	$.ajax({
		url:"apps/spl_items/xhr/action-load-data.php",
		type:"POST",
		dataType:"html"	,
		data:{},
		success: function(response){
			$(".loaded").hide();
			$('.show_datas').html(response);
		}
	});   
  }

fn.app.spl_items.spl_items.sort = function(id) {
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
		url:"apps/spl_items/xhr/action-save-sort.php",
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
	fn.app.spl_items.spl_items.load_data();
	// var ii = 1;
	// $("#tblSlide").data( "selected", [] );
	// $("#tblSlide").DataTable({
	// 	"processing": true,
	// 	"serverSide": true,
	// 	"ajax": "apps/spl_items/store/store-spl_items.php",
	// 	"aoColumns": [
	// 		{ "bSortable": false},
	// 		{"bSort" : false, class:"rows"},
	// 		{"bSortable": false},
    //         {"bSortable": false},
	// 		{"bSort": true},
	// 		{"bSortable": false},
	// 		{"bSortable": false},
	// 		{"bSortable": false},
	// 		{"bSortable": false }
	// 	],
	// 	//"order": [[ 0, "desc" ]],
	// 	 "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
	// 	 iDisplayLength: -1,
	// 	"createdRow": function ( row, data, index ) {
	// 		var selected = false;
	// 		var checked = "";
	// 		if ( $.inArray(data.DT_RowId, $("#tblSlide").data( "selected")) !== -1 ) {
    //             $(row).addClass('selected');
	// 			selected = true;
    //         }
	// 		var s = '';
	// 		s += fn.engine.datatable.checkbox('chk_group',data[0],selected);
	// 		s += '<br>';
	// 		s += data[0];
	// 		$('td', row).eq(0).html(s).addClass("text-center");
	// 		s = '';
	// 		s += fn.engine.datatable.button('btn-default','fa-pencil','fn.app.spl_items.spl_items.change('+data[0]+')');
	// 		s += ' ';
	// 		//s += fn.engine.datatable.button('btn-warning','fa-lock','fn.app.spl_items.group.permission('+data[0]+')');
	// 		$('td', row).eq(8).html(s);
			
			
			
			
			
			
	// 		/*var p='';
	// 		p+= '<img src="'+data[1]+'" width="100%">';
	// 		p+= '<input type="hidden" name="tid" value="'+data[0]+'">';
	// 		p+= '<input type="hidden" name="sor" value="'+ii+'">';
	// 		$('td', row).eq(1).html(p);
	// 		ii ++;*/
			
	// 		var a = '';
	// 		if(data[7]==1){
	// 			a +='<div class="switch">';
	// 			a +='<input id="cmn-toggle-'+data[0]+'" class="cmn-toggle cmn-toggle-round" checked type="checkbox" onClick="fn.app.edit.change_status('+data[0]+',this)">';
	// 			a += '<label for="cmn-toggle-'+data[0]+'"></label>';
	// 			a += '</div>'; 
	// 		}else {
	// 			a +='<div class="switch">';
	// 			a +='<input id="cmn-toggle-'+data[0]+'" class="cmn-toggle cmn-toggle-round" type="checkbox" onClick="fn.app.edit.change_status('+data[0]+',this)">';
	// 			a += ' <label for="cmn-toggle-'+data[0]+'"></label>';
	// 			a += '</div>';
	// 		}
	// 		$('td', row).eq(7).html(a);
			
	// 		/*var a = '';
	// 		if(data[10]==1){
	// 			a +='<div class="switch">';
	// 			a +='<input id="cmn-toggle-'+data[0]+'-v" class="cmn-toggle cmn-toggle-round" checked type="checkbox" onClick="fn.app.edit.change_v_status('+data[0]+',this)">';
	// 			a += '<label for="cmn-toggle-'+data[0]+'-v"></label>';
	// 			a += '</div>'; 
	// 		}else {
	// 			a +='<div class="switch">';
	// 			a +='<input id="cmn-toggle-'+data[0]+'-v" class="cmn-toggle cmn-toggle-round" type="checkbox" onClick="fn.app.edit.change_v_status('+data[0]+',this)">';
	// 			a += ' <label for="cmn-toggle-'+data[0]+'-v"></label>';
	// 			a += '</div>';
	// 		}
	// 		$('td', row).eq(10).html(a);*/
	// 	}
	// });
	// fn.engine.datatable.add_selectable('tblSlide','chk_group');
	
});
</script>