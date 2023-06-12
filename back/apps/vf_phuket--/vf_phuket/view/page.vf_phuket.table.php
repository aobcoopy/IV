<div class="col-md-12">
	<div class="panel panel-default">
		<div id="panel-heading-group" class="panel-heading">
	        <h3 class="panel-title">Villa Form</h3>
            <input type="hidden" class="tx_desti" value="">
	    </div>
	    <div class="panel-body">
        
        <br><br>
        <div>
        
                  <!-- Nav tabs -->
                  <ul class="nav nav-tabs desnav" role="tablist">
                  <?php 
                  $i=0;
				  $ar_destination_list = [];
                  $sql_destinations = $dbc->Query("select * from destinations WHERE parent IS NULL and status > 0"); 
                  while($des = $dbc->Fetch($sql_destinations))
                  {
					  $des_slug = $des['id'];//str_replace(" ","_",$des['name']);
                      $act = ($i==0)?'active':'';
                      echo '<li role="presentation" class="'. $act.' li_des"><a href="#tab_'.$des_slug.'" aria-controls="tab_'.$des_slug.'" role="tab" data-toggle="tab">'.$des['name'].'</a>';
					  	echo '<input type="hidden" class="tx_inside_desti" value="'.$des_slug.'">';
					  echo '</li>';
                      $i++;
					  
					  $ar_destination_list[] = $des_slug;
                  }
                  ?>
                  </ul>
        
          <!-- Tab panes --><br>
          <div class="tab-content">
          	<?php 
			$x=0;
			foreach($ar_destination_list as $deslist)
			{
				$act = ($x==0)?'active':'';
				echo '<div role="tabpanel" class="tab-pane '.$act.'" id="tab_'.$deslist.'">';
						echo '<div class="table-responsive">';
							echo '<table id="tblSlide_'.$deslist.'" class="table table-striped table-bordered datatable tabb" style="width:100%">';
								echo '<thead>';
									echo '<tr>';
										echo '<th class="w10">';
											echo '<label class="label-checkbox">';
												echo '<input id="chk_group" type="checkbox"><span class="custom-checkbox"></span>';
											echo '</label>';
										echo '</th>';
										echo '<th class="tw">Villa name</th>';
										echo '<th>user</th>';
										echo '<th>Updated</th>';
										echo '<th class="w30">Action</th>';
									echo '</tr>';
								echo '</thead>';
								echo '<tbody>';
									
								echo '</tbody>';
							echo '</table>	';        
						echo '</div>';
				echo '</div>';
				$x++;
			}
			?>
          </div>
        
        </div>

	        
            
            
	    </div><!--panel-body-->
	</div>
</div>
<style>
.w10
{
	width:3% !important;
}
.w30
{
	width:20% !important;
}
.tw
{
	width:40% !important;
}
.tabb > tbody > tr > td
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
.ani
{
	transition:all 1s;
}
</style>
<script>
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

$(document).ready(function(e) {
    setTimeout(function(){$(".desnav").children(".active").click();},300);
	
});

$(function(){
$(".li_des").click(function(e) {
    var val = $(this).find('.tx_inside_desti').val();
	$(".tx_desti").val(val);
});
<?php 
$x=0;
foreach($ar_destination_list as $deslist_2)
{
	//echo $deslist_2;
	?>
	
		var ii = 1;
		$("#tblSlide_<?php echo $deslist_2;?>").data( "selected", [] );
		$("#tblSlide_<?php echo $deslist_2;?>").DataTable({
			"processing": true,
			"serverSide": true,
			"stateSave": true,
			"ajax": "apps/vf_phuket/store/store-vf_phuket.php?destination=<?php echo $deslist_2;?>",
			"aoColumns": [
				{ "bSortable": false},
				//{"bSort" : false, class:"rows", "sWidth":"60px"},
				{"bSortable": false, "sWidth":"500px"},
				//{"bSortable": false},
				/*{"bSortable": false},
				{"bSortable": false},*/
				{"bSortable": false , class:"text-center"},
				{"bSortable": false , class:"text-center" },
				//{"bSortable": false },
				{"bSortable": false }
			],
			//"order": [[ 1, "desc" ]],
			"createdRow": function ( row, data, index ) {
				var selected = false;
				var checked = "";
				if ( $.inArray(data.DT_RowId, $("#tblSlide_<?php echo $deslist_2;?>").data( "selected")) !== -1 ) {
					$(row).addClass('selected');
					selected = true;
				}
				var s = '';
				s += fn.engine.datatable.checkbox('chk_group',data[0],selected);
				s += "<br>"+data[0];
				$('td', row).eq(0).html(s).addClass("text-center");
				s = '';
				s += fn.engine.datatable.button('btn-default','fa-pencil','fn.app.vf_phuket.edit_form('+data[0]+')','Edit Form',' ');
				s += ' ';
				/*s += fn.engine.datatable.button('btn-info','fa-search','fn.app.vf_phuket.view_form('+data[0]+')','View Form',' ');
				s += ' ';*/
				s += fn.engine.datatable.button('btn-success','fa-plus','fn.app.vf_phuket.dialog_add_user('+data[0]+','+data[5]+')','Add Customer',' ');
				s += ' ';
				s += fn.engine.datatable.button('btn-warning bt_his','fa-history','fn.app.vf_phuket.customer_history('+data[0]+','+data[5]+')','Customer History',' '+data[7]+' Records');
				s += ' ';
				//s += fn.engine.datatable.button('btn-warning','fa-lock','fn.app.vf_phuket.group.permission('+data[0]+')');
				$('td', row).eq(4).html(s);
				
				
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
		fn.engine.datatable.add_selectable('tblSlide_<?php echo $deslist_2;?>','chk_group');
		
	
<?php
}
?>
});
</script>