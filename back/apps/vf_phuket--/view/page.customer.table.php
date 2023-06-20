<?php
$villa = $dbc->GetRecord("properties","*","id='".$_REQUEST['vid']."'");
$ex = explode("|",$villa['name']);
$v_name = $ex[0].' Customer Histories';
?><div class="col-md-12">
	<div class="panel panel-default">
		<div id="panel-heading-group" class="panel-heading">
	        <h3 class="panel-title"><?php echo $v_name;?></h3>
            <button class="btn btn-primary" onClick="goback();">Back</button>
	    </div>
	    <div class="panel-body">
	        <div class="table-responsive">
	            <table id="tblSlide" class="table table-striped table-bordered datatable ">
	                <thead>
	                    <tr>
	                        <th>
								<label class="label-checkbox">
									<input id="chk_group" type="checkbox"><span class="custom-checkbox"></span>
								</label>
							</th>
                            <th>Customer</th>
                            <th>Invoice</th>
	                        <th>user</th>
                            <th>Date</th>
							<th>Action</th>
	                    </tr>
	                </thead>
	                <tbody>
	                    
	                </tbody>
	            </table>	        
	        </div>
            
            
	    </div><!--panel-body-->
	</div>
</div>
<style>
.table > tbody > tr > td
{
	padding:10px 3px !important;
	transition:all 1s;
}
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
function goback()
{
	window.history.back();
}
//  $(function() {
//	//$("#panel-heading-group").append('<button id="btnSavesort" type="button" onclick="fn.app.vf_phuket.vf_phuket.sort()" class="btn btn-info pull-right">Save Sort</button>');
//	//$( "#tblSlide" ).children().sortable();
//	//$( "#tblSlide " ).disableSelection();
//  });
//
//
//fn.app.vf_phuket.vf_phuket.sort = function(id) {
//	var data = {
//		tables : []			
//	};
//	var io=1;
//	$("#tblSlide tbody tr").each(function(index, element) {
//		data.tables.push({
//				id : $(this).find("input[name=tid]").val(),
//				sort : io
//			});
//			io++;
//	});
//	
//	
//	$.ajax({
//		url:"apps/vf_phuket/xhr/action-save-sort.php",
//		type:"POST",
//		dataType:"json"	,
//		data:data,
//		success: function(response){
//			$("#tblSlide").DataTable().draw();
//			window.location.reload();
//		}
//	});   
//};
//




$(function(){
	var ii = 1;
	$("#tblSlide").data( "selected", [] );
	$("#tblSlide").DataTable({
		"processing": true,
		"serverSide": true,
		"ajax": "apps/vf_phuket/store/store-customer-data.php?pid=<?php echo $_REQUEST['vid'];?>",
		"aoColumns": [
			{ "bSortable": false},
			//{"bSort" : false, class:"rows", "sWidth":"60px"},
			{"bSortable": false},
			//{"bSortable": false},
			{"bSortable": false},
			{"bSortable": false},
			{"bSortable": false , class:"text-center"},
			//{"bSortable": false , class:"text-center" },
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
			s += "<br>"+data[0];
			$('td', row).eq(0).html(s).addClass("text-center");
			
			var encode = data[6];//btoa(data[6]);
			s = '';
			s += fn.engine.datatable.button('btn-default','fa-pencil','fn.app.vf_phuket.edit_customer_detail('+data[0]+',this)','Edit',' Edit ');
			s += ' ';
			s += '<input type="hidden" class="tx_encode" value="'+encode+'">';
			s += fn.engine.datatable.button('btn-danger','fa-pencil-square-o','fn.app.vf_phuket.edit_customer_form(this)','Edit Form Detail',' Edit Form Detail');
			s += ' ';
			
			s += fn.engine.datatable.button('btn-info','fa-search','fn.app.vf_phuket.view_customer_form(this)','View Form',' View Form');
			s += ' ';
			//s += '<input type="text" class="tx_link" value="../villaform-customer-'+encode+'.html">';
			s += fn.engine.datatable.button('btn-success','fa-clipboard','fn.app.vf_phuket.copy_customer_link(this)','Customer Link',' Customer Link');
			s += ' ';
			s += fn.engine.datatable.button('btn-danger','fa-remove','fn.app.vf_phuket.remove_customer('+data[0]+')','Remove',' Remove');
			s += ' ';
			if(data[7]==0)
			{
				s += fn.engine.datatable.button('btn-warning','fa-files-o','fn.app.vf_phuket.customer_duplicate('+data[0]+')','Duplicate',' Duplicate');
			}
			/*
			s += fn.engine.datatable.button('btn-default','fa-pencil','fn.app.vf_phuket.edit_customer_form(this)','Edit Form',' ');
			s += ' ';
			s += fn.engine.datatable.button('btn-info','fa-search','fn.app.vf_phuket.view_customer_form(this)','View Form',' ');
			s += ' ';
			//s += '<input type="text" class="tx_link" value="../villaform-customer-'+encode+'.html">';
			s += fn.engine.datatable.button('btn-success','fa-clipboard','fn.app.vf_phuket.copy_customer_link(this)','Customer Link',' ');
			s += ' ';
			s += fn.engine.datatable.button('btn-danger','fa-remove','fn.app.vf_phuket.remove_customer('+data[0]+')','Remove',' ');
			s += ' ';
			if(data[7]==0)
			{
				s += fn.engine.datatable.button('btn-warning','fa-files-o','fn.app.vf_phuket.customer_duplicate('+data[0]+')','Duplicate',' ');
			}*/
			/*s += ' ';*/
			//s += fn.engine.datatable.button('btn-warning','fa-lock','fn.app.vf_phuket.group.permission('+data[0]+')');
			$('td', row).eq(5).html(s);
			
			
			//var a = '';
//			a += fn.engine.datatable.button('btn-warning','fa-search','fn.app.vf_phuket.vf_phuket.villa_list_view('+data[0]+')','Villa List',' ');
//			a += fn.engine.datatable.button('btn-warning','fa-search','fn.app.vf_phuket.vf_phuket.villa_list_view('+data[0]+')','Villa List',' ');
//			$('td', row).eq(5).html(a);
			
			/*var p='';
			p+= '<img src="'+data[1]+'" class="immg">';
			p+= '<input type="hidden" name="tid" value="'+data[0]+'">';
			p+= '<input type="hidden" name="sor" value="'+ii+'">';
			$('td', row).eq(1).html(p);
			ii ++;*/
			
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