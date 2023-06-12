<div class="col-md-12">
	<div class="panel panel-default">
		<div id="panel-heading-group" class="panel-heading">
	        <h3 class="panel-title">Bedroom</h3>
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
                            <th>icon</th>
                            <th>name</th>
                            <th>group</th>
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
  height:50px !important; 
  width:auto;
  cursor:move;
}

#tblSlide tbody tr 
{
	height:50px;
}
</style>
<script>
  $(function() {
	//$("#panel-heading-group").append('<button id="btnSavesort" type="button" onclick="fn.app.bedroom.bedroom.sort()" class="btn btn-info pull-right">Save Sort</button>');
	//$( "#tblSlide" ).children().sortable();
	//$( "#tblSlide " ).disableSelection();
  });


fn.app.bedroom.bedroom.sort = function(id) {
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
		url:"apps/bedroom/xhr/action-save-sort.php",
		type:"POST",
		dataType:"json"	,
		data:data,
		success: function(response){
			$("#tblSlide").DataTable().draw();
			window.location.reload();
		}
	});   
};

fn.app.change_group = function(me,id){
	$(me).parent().find('.inside_cbb').children().remove();
	var z = '';
		z+= '<select multiple  class="form-control" id="selGroup_e" name="selGroup_e"  onChange="fn.app.edit.change_group2(this,'+id+');" style="width:200px;">';
			<?php
			$sql = $dbc->Query("select * from icon_group where status > 0 and igroup = 5");
			while($row = $dbc->Fetch($sql))
			{
				$sele = ($feature['icon_group']==$row['id'])?'selected':'';
				//echo '<option value="'.$row['id'].'" '.$sele.'>'.$row['name'].'</option>';
				?>z+= '<option value="<?php echo $row['id'];?>" <?php echo $sele;?>><?php echo $row['name'];?></option>';<?php
			}
			?>
		z+= '</select>';
	$(me).parent().find('.inside_cbb').append(z);					
}

fn.app.edit.change_group2 = function(me,id){
		//alert(id+'----'+$(me).val());
		$.ajax({
				url: "apps/bedroom/xhr/action-change-group.php",
				type: "POST",
				dataType:"json",
				data: {id:id,cbb:$(me).val()},
				success : function(response)
				{
					if(response.success){
						//$("#tblSlide").DataTable().draw();
						$("#tblSlide").DataTable().ajax.reload(null,false);


					}else{
						//fn.engine.alert("Alert",response.msg);
					}
				}
		});
	}


$(function(){
	var ii = 1;
	$("#tblSlide").data( "selected", [] );
	$("#tblSlide").DataTable({
		"processing": true,
		"serverSide": true,
		"stateSave": true,
		"ajax": "apps/bedroom/store/store-bedroom.php",
		"aoColumns": [
			{ "bSortable": false},
			{"bSort" : false, class:"rows", "sWidth":"60px"},
			{"bSortable": false},
			{"bSortable": false },
			{"bSortable": false },
			{"bSortable": false , class:"text-center" },
			{"bSortable": false },
			{"bSortable": false }
		],
		//"order": [[ 0, "desc" ]],
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
			s += fn.engine.datatable.button('btn-default','fa-pencil','fn.app.bedroom.bedroom.change('+data[0]+')');
			s += ' ';
			//s += fn.engine.datatable.button('btn-warning','fa-lock','fn.app.bedroom.group.permission('+data[0]+')');
			$('td', row).eq(7).html(s);
			
			
			var p='';
			p+= '<img src="'+data[1]+'" width="50">';
			p+= '<input type="hidden" name="tid" value="'+data[0]+'">';
			p+= '<input type="hidden" name="sor" value="'+ii+'">';
			$('td', row).eq(1).html(p);
			ii ++;
			
			
			var z='';
			z+= '<input type="hidden" name="tid" value="'+data[0]+'">';
			z+= data[3]+'<br>';
			z+= '<button type="button" onClick="fn.app.change_group(this,'+data[0]+');";><i class="fa fa-chevron-down" aria-hidden="true"></i></button>';
			z+= '<div class="inside_cbb"></div>';
			$('td', row).eq(3).html(z);
			
			
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