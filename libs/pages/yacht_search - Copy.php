<link href="libs/css/yacht.css" rel="stylesheet" type="text/css">
<div class="box_yacht_filter">
	<div class="container ">
        <div class="row">
    
            <div class="col-sm-12 col-md-4 col-lg-3 col-sm-12 col-xs-12 hidden-xs hidden-sm  t_t44"><!---->
                <h3 class="tsearch_yacht"><center>Search Yacht <br><span class="mg-bn-big">For rates & availability</span></center></h3>
            </div>
            <div class="col-sm-12 col-md-8 col-lg-9 ">
                <div class="row1">
                    <div class="col-md-3 col-sm-12 col-xs-12 t_t13 nopad_768">
                    	<select id="cbbYachtDestination" name="cbbYachtDestination" onChange="load_type(this),file_marina(this);" class="cbb_yacht sel_yacht top71">
                            <option value="all_all"  <?php echo isset($_REQUEST['desti'])?'':'selected';?>>All Destinations </option>
                            <?php 
                            $sql_destination = $dbc->Query("select * from yacth_destination where status > 0 and fleet_type IS NULL order by name asc");
                            while($des = $dbc->Fetch($sql_destination))
                            {
								$desti = isset($_REQUEST['desti'])?$_REQUEST['desti']:'all_all';
								if($desti!='all_all'){
									$get_des = $dbc->GetRecord("yacth_destination","*","slug = '".$desti."'");
									$all_data_des = $get_des['id'].'_'.$get_des['slug'];
								}else{$get_des='';}
								
								$act = ($_REQUEST['desti']==$des['slug'])?'selected':'';
                                echo '<option value="'.$des['id'].'_'.$des['slug'].'" '.$act.'>'.$des['name'].'</option>';
                            }
                            ?>
                        </select>
                        <?php /*?><select id="cbbYachtDestination" name="cbbYachtDestination" onChange="load_type(this);" class="cbb_yacht cs-select cs-skin-elastic top71">
                            <option value="all"  <?php echo isset($_REQUEST['des'])?'':'selected';?>>All Destinations </option>
                            <?php 
                            $sql_destination = $dbc->Query("select * from yacth_destination where status > 0 and fleet_type IS NULL order by name asc");
                            while($des = $dbc->Fetch($sql_destination))
                            {
                                echo '<option value="'.$des['slug'].'">'.$des['name'].'</option>';
                            }
                            ?>
                        </select><?php */?>
                       <?php /*?> <script>
						$(document).ready(function(e) {
							$(".cbb_yacht").attr("onClick","load_type($(this).children('.cs-options').children('ul').children('li.cs-selected').attr('data-value'))");//
							//$(".cbbSub").attr("onClick","check_rooms('forn_search')");
						});
						</script><?php */?>
                    </div>
                    <div class="col-md-3 col-sm-12 col-xs-12 t_t23 nopad_768">
                        <select id="cbbMarina" name="cbbMarina" onChange="load_subdestination(this);" class="cbb_marina sel_yacht  top7">
                            <option value="all"  <?php echo isset($_REQUEST['mar'])?'':'selected';?>>All Marina location - optional  </option>
                            <?php 
                            $sql_marina = $dbc->Query("select * from yacth_marina where status > 0 order by name asc");
                            while($marina = $dbc->Fetch($sql_marina))
                            {
								$act = ($_REQUEST['type']==$marina['slug'])?'selected':'';
                                echo '<option class="mar '.$marina['destination'].'" value="'.$marina['slug'].'" '.$act.'>'.$marina['name'].'</option>';
                            }
                            ?>
                        </select>
                    </div>
                    <div class="col-md-3 col-sm-12 col-xs-12 t_t23 nopad_768">
                        <select id="cbbType" name="cbbType" onChange="load_subdestination(this);" class="cbb_type sel_yacht  top7">
                            <option value="all"  <?php echo isset($_REQUEST['des'])?'':'selected';?>>All Type of Yacht  </option>
                            <?php 
                            $sql_destination = $dbc->Query("select * from yacth_destination where status > 0 and fleet_type IS NOT NULL order by name asc");
                            while($des = $dbc->Fetch($sql_destination))
                            {
								$act = ($_REQUEST['type']==$des['slug'])?'selected':'';
                                echo '<option value="'.$des['slug'].'" '.$act.'>'.$des['name'].'</option>';
                            }
                            ?>
                        </select>
                    </div>
                    <!--<div class="col-md-3 col-sm-12 col-xs-12 t_t33 nopad_768">
                        <select id="cbbPrice" name="cbbPrice" onChange="load_subdestination(this);" class="cbbdes2 sel_yacht  top7">
                            <option value="all"  <?php echo isset($_REQUEST['price'])?'':'selected';?>>All Price Range</option>
                            <option value="under-1000USD" <?php echo ($_REQUEST['price']=='under-1000USD')?'selected':'';?>>Under 1,000USD</option>
                            <option value="1000-2000USD" <?php echo ($_REQUEST['price']=='1000-2000USD')?'selected':'';?>>1,000USD-2,000USD</option>
                            <option value="2000-3000USD" <?php echo ($_REQUEST['price']=='2000-3000USD')?'selected':'';?>>2,000USD-3,000USD</option>
                            <option value="4000-5000USD" <?php echo ($_REQUEST['price']=='4000-5000USD')?'selected':'';?>>4,000USD-5,000USD</option>
                            <option value="above-5000USD" <?php echo ($_REQUEST['price']=='above-5000USD')?'selected':'';?>>Above 5,000USD</option>
                        </select>
                    </div>-->
                    <div class="col-md-2 col-sm-12 col-xs-12 nopad992 nopad_768">
                        <button type="button" id="bt_search_1" onClick="searching_yacht()" class="btn btn-main btn-block-1 text_up fonn top7">Search yacht</button>
                        <div class="exch" onClick="exchange(this);"><img src="../../upload/money-exchange1.png" width="20" alt=""></div>
                    </div>
                </div>
            </div>
        
        </div>    
    </div>
</div>


<div class="second_search_filter_bar"> 
    <div class="container-fluid filterb graybar <?php echo $fix_bar2;?> <?php echo $view;?>"> <?php //echo '--------'.$_REQUEST['cate'];?>
        <div class="container ">
            <div class="row">
                <div class="col-md-2">
                
                </div>
                <div class="col-md-9 col-xs-12 left25" style="padding-top: 10px;">
                    <div class="ztop">
                        <div class="col-md-4 col-xs-4 col-sm-4">
                            <select name="cbbCollection" id="cbbCollection" class="pull-right form-control cbbox ontop">
                                <option value="0" class="0"<?php echo isset($_REQUEST['des']) ? '' : ' selected'; ?>>All Villa Type</option>
                                <?php villa_types_filter_options($dbc); ?>
                            </select> 
                        </div>
                        
                        <div class="col-md-4 col-xs-4 col-sm-4">
                            <select name="bedroomRangeFilter" id="bedroomRangeFilter" class="pull-right form-control cbbox ontop">
                                <option value="all"<?php echo !isset($_REQUEST['room']) ? ' selected' : ''; ?> >All Bedroom</option>
                                <?php bedroom_range_filter_options($dbc); ?>
                            </select> 
                        </div>
                        
                        <div class="col-md-4 col-xs-4 col-sm-4">
                            <select name="cbbSort" id="cbbSort" class="pull-right form-control cbbox ontop">
                                <option value="price|asc">Price(Min-Max)</option>
                                <option value="price|desc">Price(Max-Min)</option>                             
                            </select>
                            <input type="hidden" name="starts" id="starts" >
                            <input type="hidden" name="stoped" id="stoped" >
                            <input type="hidden" name="txs" id="txs" value="0" >
                        </div>
                    </div>
                </div>
            </div>
            
            <?php /*?><div class="row">
                <div class="col-md-2 ">
                
                </div>
                <div class="col-md-9 left25" style="padding-top: 10px;">
                    <div class="ztop">
                        <div class="col-md-4 col-xs-4 col-sm-4 ">
                            <select name="cbbCollection" id="cbbCollection" class="pull-right form-control cbbox ontop">
                                <option value="0" class="0"  <?php echo isset($_REQUEST['des'])?'':'selected';?>>All Villa Types </option>
                                 <?php 
                                $sql_cate = $dbc->Query("select * from categories where status > 0");
                                while($r_ate = $dbc->Fetch($sql_cate))
                                {
                                    $act = ($_REQUEST['cate']==$r_ate['id'])?'selected':'';
                                    $cname = explode("-",$r_ate['name']);
                                    echo '<option value="'.$r_ate['id'].'"'.$act.' class="'.$r_ate['id'].' cca">'.$cname[0].'</option>';
                                }
                                ?>
                            </select> 
                        </div>
                        <div class="col-md-4 col-xs-4 col-sm-4 ">
                            <select name="cbbSort" id="cbbSort" class="pull-right form-control cbbox ontop" >
                                <option value="price|asc">Price (Min - Max)</option>
                                <option value="price|desc">Price (Max - Min)</option> 
                                <option value="actualbed|asc">Bedrooms (Min - Max)</option>
                                <option value="actualbed|desc">Bedrooms (Max - Min)</option>
                                
                            </select>
                            <input type="hidden" name="starts" id="starts" >
                            <input type="hidden" name="stoped" id="stoped" >
                            <input type="hidden" name="txs" id="txs" value="0" >
                        </div>
                        <div class="col-md-4 col-xs-4 col-sm-4 ">
                            <select name="cbbPromotion" id="cbbPromotion" class="pull-right form-control cbbox ontop" >
                                <option value="0">Choose Option</option>
                                <option value="price|asc">Promotion</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div><?php */?>
            
        </div>
        
            
    </div><br><br>
</div>

<input type="hidden" class="txexch" value="0">
<?php //echo '---'.$_REQUEST['desti'].'---'.$_REQUEST['type'].'---'.$_REQUEST['price'];?>
<script>
var vall = 0;
function exchange(me)
{
	$(me).children('img').addClass('rotate-hor-center');
	if(vall==0)
	{
		$(".mn_price").addClass('hidden');
		$(".usd").removeClass('hidden');
		vall = 1;
		$(".txexch").val(1);
	}
	else
	{
		$(".mn_price").addClass('hidden');
		$(".thb").removeClass('hidden');
		vall = 0;
		$(".txexch").val(0);
	}
	setTimeout(function(){
		$(me).children('img').removeClass('rotate-hor-center');
	},600);
}

$(document).ready(function(e) {
    setTimeout(function(){
		var z = '<option value="all">All Type of Yacht</option>';
		$(".cbb_type").children('option').remove();
		$(".cbb_type").append(z);
		var val = $("#cbbYachtDestination").val();
		var vallu = val.split("_");
		var desti = vallu[0];
		$.ajax({
			url: "<?php echo $url_link;?>libs/actions/load-yacht-type.php",
			type: "POST",
			dataType: "html",
			data: {id:desti,type:'<?php echo isset($_REQUEST['type'])?$_REQUEST['type']:'';?>'},
			success: function (res) {
				$(".cbb_type").append(res);
			}
		});
	},100);
});

function file_marina(me)
{
	var val = $(me).val().split('_');
	//alert(val[0]);
	if(val[0]=='all')
	{
		$("#cbbMarina").children('.mar').show();
	}
	else
	{
		$("#cbbMarina").val('all');
		$("#cbbMarina").children('.mar').hide();
		$("#cbbMarina").children('.'+val[0]).show();
	}
}

function load_type(me)
{
	//alert(me);
	var z = '<option value="all">All Type of Yacht</option>';
	$(".cbb_type").children('option').remove();
	$(".cbb_type").append(z);
	var val = $(me).val();
	val.split("_");
	$.ajax({
		url: "<?php echo $url_link;?>libs/actions/load-yacht-type.php",
		type: "POST",
		dataType: "html",
		data: {id:val[0]},
		success: function (res) {
			$(".cbb_type").append(res);
            //alert(res);
            //window.location = "/";
            
			//window.location = "<?php echo $url_link;?>" + res;
		}
	});
}

function searching_yacht()
{
	var vall = $("#cbbYachtDestination").val();
	var vallu = vall.split("_");
	var desti = vallu[1];
	var type = $("#cbbType").val();
	var price = $("#cbbPrice").val();
	window.location = "<?php echo $url_link;?>search-yacht_"+desti+'_'+type+'_'+price+'.html';//+'-'+type+'-'+price+'.html';
}
</script>