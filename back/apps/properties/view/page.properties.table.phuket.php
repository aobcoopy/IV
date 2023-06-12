<div class="col-md-12">
	<div class="panel panel-default">
		<div id="panel-heading-group" class="panel-heading">
	        <h3 class="panel-title">Properties</h3>
	    </div>
	    <div class="panel-body">
        <br><br>
        
         <!-- Nav tabs -->
        <ul class="nav nav-tabs" role="tablist">
            <li role="presentation" class="active"><a href="#Phuket" aria-controls="Phuket" role="tab" data-toggle="tab">Phuket</a></li>
        </ul>
        
        <!-- Tab panes -->
        <div class="tab-content">
            <div role="tabpanel" class="tab-pane active" id="Phuket"><br>
            	<div class="table-responsive">
                    <table id="tblSlide" class="tblSlide_1 table table-striped table-bordered datatable">
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
                                <th>destination</th>
                                <th>subdestination</th>
                                <th>user</th>
                                <th>Updated</th>
                                <th>Status</th>
                                
                                <!--<th>Sort</th>-->
                                <th>popup</th>
                                <th>heightlight</th>
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
	</div>
</div>
<style>
.rows img
{
  height:100px !important; 
  width:auto;
  cursor:move;
}

.tblSlide_1 tbody tr ,.imgas,#tblSlide tbody tr 
{
	height:100px !important;
}
.table > thead > tr > th, .table > tbody > tr > th, .table > tfoot > tr > th, .table > thead > tr > td, .table > tbody > tr > td, .table > tfoot > tr > td {
    border-color: transparent;
    padding: 5px 5px;
    background: #F0F4F9;
    color: #656C78;
    font-size: 13px;
}
</style>
<script>
  //$(function() {
//	//$("#panel-heading-group").append('<button id="btnSavesort" type="button" onclick="fn.app.properties.properties.sort()" class="btn btn-info pull-right">Save Sort</button>');
//	$( "tblSlide_1" ).children().sortable();
//	$( "tblSlide_1 " ).disableSelection();
//	
//	$( ".phof" ).sortable();
//	$( ".phof" ).disableSelection();
//  });


//fn.app.properties.properties.sort = function(id) {
//	var data = {
//		tables : []			
//	};
//	var io=1;
//	$("tblSlide_1 tbody tr").each(function(index, element) {
//		data.tables.push({
//				id : $(this).find("input[name=tid]").val(),
//				sort : io
//			});
//			io++;
//	});
//	
//	
//	$.ajax({
//		url:"apps/properties/xhr/action-save-sort.php",
//		type:"POST",
//		dataType:"json"	,
//		data:data,
//		success: function(response){
//			$("tblSlide_1").DataTable().draw();
//			//window.location.reload();
//		}
//	});   
//};





$(function(){
	var ii = 1;
	$("#tblSlide").data( "selected", [] );
	$("#tblSlide").DataTable({
			
		"processing": true,
		"serverSide": true,
		"stateSave": true,
		"ajax": "apps/properties/store/store-properties-phuket.php",
		"aoColumns": [
			{ "bSortable": false},
			{"bSort" : false, class:"rows"},
			{"bSortable": false, class:"hidden"},
			{"bSortable": false, class:"hidden-xs" ,swidth:"262px"},
			{"bSortable": true},
			{"bSortable": true},
			{"bSortable": false},
			{"bSortable": false },
			{"bSortable": false , class:"text-center" },
			{"bSortable": false , class:"text-center" },
			{"bSortable": false },
			{"bSortable": false ,width:"391px"}
		],
		//"order": [[ 7, "desc" ]],
		"lengthMenu": [[20, 35, 50, -1], [20, 35, 50, "All"]],
		"createdRow": function ( row, data, index ) {
			var selected = false;
			var checked = "";
			if ( $.inArray(data.DT_RowId, $("#tblSlide").data( "selected")) !== -1 ) {
                $(row).addClass('selected');
				selected = true;
            }
			var s = '';
			s += fn.engine.datatable.checkbox('chk_group',data[0],selected);
			s += '<br>'+data[0];
			
			$('td', row).eq(0).html(s).addClass("text-center");
			s = '';
			s += fn.engine.datatable.button('btn-info','fa-pencil','fn.app.properties.properties.change('+data[0]+')','Edit',' ');
			s += ' ';
			s += fn.engine.datatable.button('btn-info','fa-check-square-o','fn.app.properties.properties.check('+data[0]+')','Facilities',' ');
			s += ' ';
			s += fn.engine.datatable.button('btn-info','fa-calendar','fn.app.properties.properties.popup_pricing('+data[0]+')','Pricing',' ');
			s += ' ';
			s += '<br>';
			s += fn.engine.datatable.button('btn-warning','fa-picture-o','fn.app.properties.properties.popup_photo('+data[0]+')','Photo',' ');
			s += ' ';
			s += fn.engine.datatable.button('btn-success','fa-camera ','fn.app.properties.properties.popup_cover('+data[0]+')','Cover',' ');
			s += ' ';
			s += fn.engine.datatable.button('btn-success','fa-star ','fn.app.properties.properties.rate('+data[0]+')','Rating',' ');
			s += ' ';
			s += '<br>';
			s += fn.engine.datatable.button('btn-danger','fa-bed','fn.app.properties.properties.bed('+data[0]+')','Bed',' ');
			s += ' ';
			s += fn.engine.datatable.button('btn-danger','fa-map-signs','fn.app.properties.properties.meta('+data[0]+')','Meta','');
			s += ' ';
			s += fn.engine.datatable.button('btn-danger','fa-object-group','fn.app.properties.properties.plan('+data[0]+')','Floor Plan','');
			s += '<br>';
			s += ' ';
			s += fn.engine.datatable.button('btn-primary','fa-envelope','fn.app.properties.properties.email('+data[0]+')','Email','');
			<?php 
			if($dbc->HasRecord("users","id = '".$_SESSION['auth']['user_id']."'"))
			{
				$us = $dbc->GetRecord("users","*","id = '".$_SESSION['auth']['user_id']."'");
				if($us['super']=='1')
				{
					?>
					s += '<br>';
					s += ' ';
					s += fn.engine.datatable.button('btn-default','fa-link','fn.app.properties.properties.ht('+data[0]+')','HTACCESS link','');
					s += ' ';
					s += fn.engine.datatable.button('btn-default','fa-search','fn.app.properties.properties.listing('+data[0]+')','View Listing','');
					<?php
				}
			}
			?>
			
			$('td', row).eq(11).html(s);
			
			
			
			var p='';
			//console.log(data[1]);
			if(data[1]=='0')
			{
				p+= '';
				$('td', row).eq(1).html(p);
			}
			else
			{
				p+= data[2]+'<br>';
				p+= '<input type="hidden" name="tid" value="'+data[0]+'">';
				p+= '<input type="hidden" name="sor" value="'+ii+'">';
				p+= '<img src="'+data[1]['img']+'" width="100%" class="imgas">';
				
				ii ++;
			}
			$('td', row).eq(1).html(p);
			
			
			
			var a = '';
			if(data[8]==1){
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
			$('td', row).eq(8).html(a);
			
			a = '';
			if(data[9]==1){
				a +='<div class="switch">';
				a +='<input id="cmn-toggle-h'+data[0]+'" class="cmn-toggle cmn-toggle-round" checked type="checkbox" onClick="fn.app.edit.change_status_heightkight('+data[0]+',this)">';
				a += '<label for="cmn-toggle-h'+data[0]+'"></label>';
				a += '</div>'; 
				a += fn.engine.datatable.button('btn-success','fa-picture-o','fn.app.properties.properties.popup_photo_heightlight('+data[0]+')');
			}else {
				a +='<div class="switch">';
				a +='<input id="cmn-toggle-h'+data[0]+'" class="cmn-toggle cmn-toggle-round" type="checkbox" onClick="fn.app.edit.change_status_heightkight('+data[0]+',this)">';
				a += ' <label for="cmn-toggle-h'+data[0]+'"></label>';
				a += '</div>';
			}
			$('td', row).eq(9).html(a);
			
			a = '';
			if(data[10]==1){
				a +='<div class="switch">';
				a +='<input id="cmn-toggle-pop'+data[0]+'" class="cmn-toggle cmn-toggle-round" checked type="checkbox" onClick="fn.app.edit.popup_dia('+data[0]+',this)">';
				a += '<label for="cmn-toggle-pop'+data[0]+'"></label>';
				a += '</div>'; 
				//a += fn.engine.datatable.button('btn-success','fa-picture-o','fn.app.properties.properties.popup_photo_heightlight('+data[0]+')');
			}else {
				a +='<div class="switch">';
				a +='<input id="cmn-toggle-pop'+data[0]+'" class="cmn-toggle cmn-toggle-round" type="checkbox" onClick="fn.app.edit.popup_dia('+data[0]+',this)">';
				a += ' <label for="cmn-toggle-pop'+data[0]+'"></label>';
				a += '</div>';
			}
			$('td', row).eq(10).html(a);
		}
	});
	fn.engine.datatable.add_selectable('tblSlide','chk_group');
	
});
</script>