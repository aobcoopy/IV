<div class="col-md-12">
    <div class="panel panel-default">
        <div id="panel-heading-group" class="panel-heading">
            <h3 class="panel-title">Properties</h3>
        </div>
        <div class="panel-body">
        <br><br>
        
         <!-- Nav tabs -->
         
        <ul class="nav nav-tabs" role="tablist">         
			<?php
            $countDestinations = 0;
            $arrayDestinations_name_slug_id = [];
            $sql_destinations = $dbc->Query("select * from destinations WHERE parent IS NULL"); 
            while($result_destinations = $dbc->Fetch($sql_destinations))
            {
                $countDestinations++;
                $arrayDestinations_name_slug_id[] = array($result_destinations['name'], $result_destinations['slug'], $result_destinations['id']);
            ?>
                <li role="presentation" id="tab_<?php echo $result_destinations['slug'];?>" class="<?php if($countDestinations == 1) echo "active" ?>">
                    <a href="#<?php echo $result_destinations['slug'] ?>" aria-controls="<?php echo $result_destinations['slug'] ?>" role="tab" data-toggle="tab">
                        <?php echo $result_destinations['name'] ?>
                    </a>
                </li>
            <?php            
            } 
            ?>         
        </ul>
        
            <!-- Tab panes -->
            <div class="tab-content">
            
            <!--<pre>-->
            	<?php //print_r($arrayDestinations_name_slug_id);?>
            <!--</pre>-->
			<?php
			$countTabs = 0;
			foreach ($arrayDestinations_name_slug_id as $array_Name_Slug_id)
			{
				$destination_id = $array_Name_Slug_id[2];
				$countTabs++;
				//echo $destination_id.'<<<';
			?>        
            
                        
                
                
                <div role="tabpanel" class="tab-pane<?php if($countTabs == 1) echo " active" ?>" id="<?php echo $array_Name_Slug_id[1] ?>"><br>
                
                
                
                
                        <!-- NEW -->
                        <div class="row">
                            <div class="col-md-12">
                                <label for="txtName" class="col-sm-2 control-label text-right">Beach</label>
                                <div class="col-md-6">
                                    <select name="cbbFilter_<?php echo $countTabs;?>" id="cbbFilter_<?php echo $countTabs;?>" class="form-control">
                                        <option value="all|<?php echo $array_Name_Slug_id[1];?>">all</option>
                                        <?php 
                                        $sql_destinations_filter = $dbc->Query("select * from destinations WHERE parent = '".$destination_id."' ORDER BY name asc"); 
                                        while($result_destinations_filter = $dbc->Fetch($sql_destinations_filter))
                                        {
                                            $beach_id = $result_destinations_filter['id'];
                                            $act = (isset($_REQUEST['beach']) && $_REQUEST['beach']==$beach_id)?'selected':'';
                                            $beach_name = $result_destinations_filter['name'];
                                            ?><option value="<?php echo $beach_id.'|'.$array_Name_Slug_id[1];?>" <?php echo $act;?>><?php echo $beach_name;?></option>
                                            
                                        <?php            
                                        } 
                                        ?>     
                                    </select>
                                </div>
                                
                            
                            </div><br><br><br>
                        </div>
                        <!-- NEW -->
                        
                        
                        
                    <div class="table-responsive">
                        <table id="tblSlide<?php if($countTabs > 1) echo "_" . $countTabs ?>" class="tblSlide_<?php echo $countTabs ?> table table-striped table-bordered datatable">
                            <thead>
                                <tr>
                                    <th>
                                        <label class="label-checkbox">
                                            <input id="chk_group" type="checkbox"><span class="custom-checkbox"></span>
                                        </label>
                                    </th>
                                    <th class="photo_tab">Photo</th>
                                    <th>name</th>
                                    <th>brief</th>
                                    <th>destination</th>
                                    <th>subdestination</th>
                                    <th>user</th>
                                    <th>Updated</th>
                                    <th>Status</th>
                                    <th>heightlight</th>
                                    
                                    <!--<th>Sort</th>-->
                                    <th>popup</th>
                                    <th>top search</th>
                                    <th class="actii">Action</th>
                                    <th>Promotion</th>
                                </tr>
                            </thead>
                            <tbody>
                                
                            </tbody>
                        </table>            
                    </div>
                </div>
			<?php
			}
            ?>
            </div>
        </div>
    </div>
</div>
<style>
.photo_tab
{
	width:215px !important;
}
.actii
{
    width:160px !important;
}
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
.table
{
	width:100% !important;
}
.dataTables_info
{
	width:50%;
}
.bgy
{
	background:#FFEED3 !important;
	border: 1px solid #fea223 !important;
    color: #e58500 !important;
}
.bgred
{
	background:#FFE8E8 !important;
	border: 1px solid #ffa8a8 !important;
    color: #d91c1c !important;
}
</style>
<script>
$(function(){
    var ii = 1;
	
	
<?php
$countSlides = 0;
foreach ($arrayDestinations_name_slug_id as $array_Name_Slug_id)
{ 
    $countSlides++;
	
	//--- NEW ------
	if($_REQUEST['dest'] == $array_Name_Slug_id[1])
	{
		if(isset($_REQUEST['beach']) && $_REQUEST['beach']!='all')
		{
			$condition = "&beach=".$_REQUEST['beach'];
		}
		else
		{
			$condition = "&beach=all";
		}
	}
	else
	{
		$condition = "&beach=all";
	}
	
	//echo '>>>'.$array_Name_Slug_id[1];
	
?>    
	$("#cbbFilter_<?php echo $countSlides;?>").change(function(e) {
		var vall = $(this).val();
		var res = vall.split("|");
		if(res[1]!='undefined' || res[1]=='')
		{
			var dest = '&dest='+res[1];
		}
		else
		{
			var dest = '&dest=phuket';
		}
        window.location = '/back/?app=properties&beach='+res[0]+dest;
		
    });
	
	
	$(document).ready(function(e) {
		setTimeout(function(){
			$("li#tab_<?php echo $_REQUEST['dest'];?>").children().click();
		},800);
        
    });
	//--- NEW ------
	
    $("#tblSlide<?php if($countSlides > 1) echo "_" . $countSlides ?>").data( "selected", [] );
    $("#tblSlide<?php if($countSlides > 1) echo "_" . $countSlides ?>").DataTable({
            
        "processing": true,
        "serverSide": true,
        "stateSave": true,
        "ajax": "apps/properties/store/store-properties-all-regions.php?destinationID=<?php echo $array_Name_Slug_id[2].$condition;?>",  //--- NEW ------
        "aoColumns": [
            { "bSortable": false},
            {"bSort" : false, class:"rows", width:"215px"},
            {"bSortable": false, class:"hidden"},
            {"bSortable": false, class:"hidden-xs" ,swidth:"262px"},
            {"bSortable": true},
            {"bSortable": true},
            {"bSortable": false},
            {"bSortable": false },
            {"bSortable": false , class:"text-center" },
            {"bSortable": false , class:"text-center" },
            {"bSortable": false , class:"text-center" },
            {"bSortable": false },
            {"bSortable": false ,width:"391px"},
			{"bSortable": false }
        ],
        //"order": [[ 7, "desc" ]],
        "lengthMenu": [[20, 35, 50, -1], [20, 35, 50, "All"]],
        "createdRow": function ( row, data, index ) {
            var selected = false;
            var checked = "";
            if ( $.inArray(data.DT_RowId, $("#tblSlide<?php if($countSlides > 1) echo "_" . $countSlides ?>").data( "selected")) !== -1 ) {
                $(row).addClass('selected');
                selected = true;
            }
            var s = '';
            s += fn.engine.datatable.checkbox('chk_group',data[0],selected);
            s += '<br>'+data[0];
			
			var tred = '';
			if(data[16]==1)
			{
				tred = ' bgred';
			}
			
			var bgyellow = '';
			if(data[17]==1)
			{
				bgyellow = ' bgy';
			}
			
            $('td', row).eq(0).html(s).addClass("text-center");
			for(i=0;i<=13;i++)
			{
				$('td',row).eq(i).addClass(tred+' '+bgyellow);
			}
			
			
			s = '';
			s += fn.engine.datatable.button('btn-info','fa-pencil','fn.app.properties.properties.change('+data[0]+')','Edit',' ');
			s += ' ';
			s += fn.engine.datatable.button('btn-info','fa-check-square-o','fn.app.properties.properties.check('+data[0]+')','Facilities',' ');
			s += ' ';
			s += fn.engine.datatable.button('btn-info','fa-calendar','fn.app.properties.properties.popup_pricing('+data[0]+')','Pricing',' ');
			s += ' ';
			s += fn.engine.datatable.button('btn-info','fa-calendar-plus-o','fn.app.properties.properties.ggcalendar('+data[0]+')','Google Calendar','');
			
			s += '<br>';
			var col = 'btn-warning';
			var ico = '';
			if(data[18]>25)
			{
				col = 'btn-danger';
				ico = '<i class="fa fa-exclamation-triangle" aria-hidden="true"></i>';
			}
			else
			{
			}
			s += fn.engine.datatable.button(''+col+'','fa-picture-o','fn.app.properties.properties.popup_photo('+data[0]+')','Photo',' '+ico+''+data[18]+'p ');
			s += ' ';
			s += fn.engine.datatable.button('btn-warning','fa-bed','fn.app.properties.properties.popup_photo_bedroom('+data[0]+')','Bedroom Photo',' ');
			s += ' ';
			s += fn.engine.datatable.button('btn-warning','fa-camera ','fn.app.properties.properties.popup_cover('+data[0]+')','Cover',' ');
			s += ' ';
			s += '<br>';
			
			s += fn.engine.datatable.button('btn-danger','fa-bed','fn.app.properties.properties.bed('+data[0]+')','Bedroom Configuration',' ');
			s += ' ';
			s += fn.engine.datatable.button('btn-danger','fa-map-signs','fn.app.properties.properties.meta('+data[0]+')','Meta','');
			s += ' ';
			s += fn.engine.datatable.button('btn-danger','fa-object-group','fn.app.properties.properties.plan('+data[0]+')','Floor Plan','');
			s += ' ';
			s += '<br>';
			
			s += fn.engine.datatable.button('btn-success','fa-star ','fn.app.properties.properties.rate('+data[0]+')','Rating',' ');
			s += ' ';
			s += fn.engine.datatable.button('btn-primary','fa-envelope','fn.app.properties.properties.email('+data[0]+')','Email','');
			s += ' ';
			s += fn.engine.datatable.button('btn-default','fa-search','fn.app.properties.properties.listing('+data[0]+')','View Villa Link','');
			
			<?php 
			//if($dbc->HasRecord("users","id = '".$_SESSION['auth']['user_id']."'"))
//			{
//				$us = $dbc->GetRecord("users","*","id = '".$_SESSION['auth']['user_id']."'");
//				if($us['super']=='1')
//				{
//					?>
//					s += '<br>';
//					s += ' ';
//					s += fn.engine.datatable.button('btn-default','fa-link','fn.app.properties.properties.ht('+data[0]+')','HTACCESS link','');
//					/*s += ' ';
//					s += fn.engine.datatable.button('btn-info','fa-calendar-plus-o','fn.app.properties.properties.ggcalendar('+data[0]+')','Google Calendar','');*/
//					/*s += ' ';
//					s += fn.engine.datatable.button('btn-warning','fa-bed','fn.app.properties.properties.popup_photo_bedroom('+data[0]+')','Bedroom Photo',' ');*/
//					<?php
//				}
//			}
			?>
			
			$('td', row).eq(12).html(s);
            
            
            
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
				//p+= '<button type="button" class="btn btn-sm btn-info ">'+data[18]+'Pics </button>';
                p+= '<img src="'+data[1]['img']+'" width="100%" class="imgas img-thumbnail"><br>';
                <?php 
                //if($dbc->HasRecord("users","id = '".$_SESSION['auth']['user_id']."'"))
//                {
//                    $us = $dbc->GetRecord("users","*","id = '".$_SESSION['auth']['user_id']."'");
//                    if($us['super']=='1')
//                    {
//                    ?>
//                //p+= '<button type="button" class="btn btn-xs btn-danger">'+data[14]+'</button><br>';
//                    <?php
//                    }
//                }
                ?>
				var xx = '';
				p+= '';
				if(data[16]==1)
				{
					 p+= '<button type="button" class="btn btn-sm btn-danger btn-block">Price Table Not Showing</button>';
				}
				
				
				if(data[17]==1)
				{
					 p+= '<button type="button" class="btn btn-sm btn-warning btn-block">price min max THB empty</button>';
				}
				
				/*else
				{
					 p+= '';
				}*/
				
                ii ++;
            }
            $('td', row).eq(1).html(p);
            
            var strn = data[2];
			var resn = strn.split("|");
            
            var a = '';
            if(data[8]==1){
                a +='<div class="switch">';
				a += '<input type="hidden" class="txn" value="'+resn[0]+'">';
                a +='<input id="cmn-toggle-'+data[0]+'" class="cmn-toggle cmn-toggle-round" checked type="checkbox" onClick="fn.app.edit.change_status('+data[0]+',this,'+data[8]+')">';
                a += '<label for="cmn-toggle-'+data[0]+'"></label>';
                a += '</div>'; 
            }else {
                a +='<div class="switch">';
				a += '<input type="hidden" class="txn" value="'+resn[0]+'">';
                a +='<input id="cmn-toggle-'+data[0]+'" class="cmn-toggle cmn-toggle-round" type="checkbox" onClick="fn.app.edit.change_status('+data[0]+',this,'+data[8]+')">';
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
            
            a = '';
            if(data[11]==1){
                a +='<div class="switch">';
                a +='<input id="cmn-toggle-top'+data[0]+'" class="cmn-toggle cmn-toggle-round" checked type="checkbox" onClick="fn.app.edit.top_search('+data[0]+',this)">';
                a += '<label for="cmn-toggle-top'+data[0]+'"></label>';
                a += '</div>'; 
                //a += fn.engine.datatable.button('btn-success','fa-picture-o','fn.app.properties.properties.popup_photo_heightlight('+data[0]+')');
            }else {
                a +='<div class="switch">';
                a +='<input id="cmn-toggle-top'+data[0]+'" class="cmn-toggle cmn-toggle-round" type="checkbox" onClick="fn.app.edit.top_search('+data[0]+',this)">';
                a += ' <label for="cmn-toggle-top'+data[0]+'"></label>';
                a += '</div>';
            }
            $('td', row).eq(11).html(a);
			
			a = '';
            if(data[13]==1){
                a +='<div class="switch">';
                a +='<input id="cmn-toggle-pro'+data[0]+'" class="cmn-toggle cmn-toggle-round" checked type="checkbox" onClick="fn.app.properties.properties.promotions('+data[0]+','+data[13]+',this)">';
                a += '<label for="cmn-toggle-pro'+data[0]+'"></label>';
                a += '</div>'; 
				a += '<div class="well well-sm text-center"><i class="fa fa-exclamation-triangle" aria-hidden="true"></i><br>Expire date <br> '+data[15]+'</div>';
				a += '<input type="hidden" class="form-control tx_status" id="tx_status" name="tx_status" value="'+data[13]+'">';
                //a += fn.engine.datatable.button('btn-success','fa-picture-o','fn.app.properties.properties.popup_photo_heightlight('+data[0]+')');
            }else {
                a +='<div class="switch">';
                a +='<input id="cmn-toggle-pro'+data[0]+'" class="cmn-toggle cmn-toggle-round" type="checkbox" onClick="fn.app.properties.properties.promotions('+data[0]+','+data[13]+',this)">';
                a += ' <label for="cmn-toggle-pro'+data[0]+'"></label>';
                a += '</div>';
				a += '<input type="date" class="form-control tx_pro_exp_date" id="tx_pro_exp_date" name="tx_pro_exp_date" value="'+data[15]+'">';
				a += '<input type="hidden" class="form-control tx_status" id="tx_status" name="tx_status" value="'+data[13]+'">';
            }
            $('td', row).eq(13).html(a);
        }
    });
    fn.engine.datatable.add_selectable('tblSlide<?php if($countSlides > 1) echo "_" . $countSlides ?>','chk_group');
<?php } ?>    
});
</script>