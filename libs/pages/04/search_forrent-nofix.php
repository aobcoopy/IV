<?php
if(!isset($_REQUEST['des']))
{
	$fix_bar = "stick_bar";
	$fix_bar2 = "";
}
else
{
	$fix_bar = "fix_bar";
	$fix_bar2 = "fix_bar2";
	$blank = "blank";
}                             
?>
<script>
var dess = '<?php echo !isset($_REQUEST['des'])?'0':'1';?>';
$(document).ready(function(e) {
	if(dess==0)
	{
		$(window).scroll(function () {
			//var mybar = $(".header ").offset().top+538;
			if($(window).width()>976)
			{
				if ($(this).scrollTop() > 481) 
				{
					$(".stick_bar").css({"top":"0","position":"fixed","width":"100%","z-index":"100","top":"70px"});
					$(".mg-bn-forms").css({"padding":"36px 0px"}); 
					$(".mg-book-now").css({"height":"100px"});
					$(".mg-bn-title").css({"margin-top": "28px"});
				}
				else
				{
					$(".stick_bar").css({"top":"","position":"relative","height":"90px"});
					$(".mg-book-now").css({"height":"90px"});
					$(".mg-bn-title").css({"margin-top": "19px"});
					$(".mg-bn-forms").css({"padding":"28px 0px"}); 
				}
			}
		});
	}
});
</script>
<form id="forn_search_rent">
<div class="wbar"></div>
<div class="mg-saerch-room <?php echo $fix_bar;?> mybar">
    <div class="mg-book-now ">
        <div class="container">
            <div class="row ">
            	
                <div class="col-md-2" ><?php /*?>onClick="openinig();"<?php */?>
                
                	<?php /*?><div class="mob">
					<?php 
                    if($pa=="forrent")
                    {
                        ?><a class="navbar-brand" href="/search-rent/thailand/all-beach/all-price/all-bedrooms/all-collections/all-sort.html">
                        <!--<i class="fa fa-angle-left hico"></i>-->
                        <img id="_logo6" itemprop="logo"  src="<?php echo $url_link;?>libs/images/logo.png" class="imglogo mologo" height="50" alt="Inspiring Villas logo"></a><?php
                    }
                    else
                    {
                        ?><a   class="navbar-brand" href="/"><img id="_logo6"   src="<?php echo $url_link;?>libs/images/logo.png" class="imglogo" height="50" alt="Inspiring Villas logo"></a><?php
                    }
                    ?>
                    </div><?php */?>
                    <div class="web992">
                    <?php 
                    if($pa=="forrent")
                    {
                        ?><a   class="navbar-brand alogo" href="/"><img id="_logo6"  src="<?php echo $url_link;?>libs/images/logo.png" class="imglogo aaa" height="50" alt="Inspiring Villas logo"></a><?php
                    }
                    else
                    {
                        ?><a class="navbar-brand" href="/"><img id="_logo6" itemprop="logo"  src="<?php echo $url_link;?>libs/images/logo.png" class="imglogo" height="50" alt="Inspiring Villas logo"></a><?php
                    }
                    ?>
                    </div>
                
                   <?php /*?> <h2 class="mg-bn-title tsearch"><center>Search 
                 Villas <span class="mg-bn-big btext2">For rates & availability</span></center></h2><?php */?>
                </div>
                <div class="col-md-9 ccc2">
                    <div class="mg-bn-forms mg2 pding992" >
                        
                            <div class="row">
                                <div class="col-md-3 col-sm-12 col-xs-12"> 
                                        <select id="cbbDestination" name="cbbDestination" onChange="load_subdestination(this);" class="cbbdes2 cs-select cs-skin-elastic cbbo">
                                            <option value="all"  <?php echo isset($_REQUEST['des'])?'':'selected';?>>All Destinations </option>
                                            <?php 
											$sql_destinations = $dbc->Query("select * from destinations where parent is null and status > 0 AND num_properties > 0 order by name asc");
											while($r_destinations = $dbc->Fetch($sql_destinations))
											{
												$act = ($_REQUEST['des']==$r_destinations['id'])?'selected':'';
												echo '<option value="'.$r_destinations['id'].'"'.$act.'>'.$r_destinations['name'].'</option>';
											}
											?>
                                        </select>
                                        <script>
										$(document).ready(function(e) {
											var c_beach = '<?php echo $_REQUEST['sub'];?>';
											var c_room = '<?php echo $_REQUEST['room'];?>';
											
											if(c_beach=='all')
											{
												$(".cbbSub").children('.cs-placeholder').html('All Areas <label class="optin">- Optional</label>');;
											}
											
											if(c_room=='all')
											{
												$(".cRooms").children('.cs-placeholder').html('All Bedrooms <label class="optin">- Optional</label>');
											}
											
                                            $(".cbbdes2").attr("onClick","load_subdestination($(this).children('.cs-options').children('ul').children('li.cs-selected')),check_rooms('forn_search_rent'),check_cate('forn_search_rent','des')");
											$(".cbbSub").attr("onClick","check_rooms('forn_search_rent'),check_cate('forn_search_rent','beach')");
											$(".cRooms").attr("onClick","check_cate('forn_search_rent')");
											
											$(".cbbSub").children('.cs-options').children('ul').children('li').each(function(index, element) {
												var str = $(this).attr('data-value');
												var n_str = str.split("|");
												if(n_str[0]=='all')
												{
													$(this).addClass(n_str[1]);
													$(this).attr('data-value',n_str[0]);
												}
												else
												{
													$(this).addClass(n_str[1]+" ali");
													$(this).attr('data-value',n_str[0]);
												}
												
											});
	
											$("#cbbSub").children().each(function(index, element) {
												var str2 = $(this).val();
												var n2_str = str2.split("|");
												if(n2_str[0]=='all')
												{
													$(this).val(n2_str[0]);//.attr('data-value',n2_str[0]);
												}
												else
												{
													$(this).val(n2_str[0]);
												}
											});
                                        });
                                        function load_subdestination(me)
										{
											$(".ali").removeClass('cs-selected');
											$(".cbbSub").children('.cs-placeholder').text('');
											var tx = '<span class="optin">- Optional</span>';
											$(".cbbSub").children('.cs-placeholder').html('All Areas <label class="optin">- Optional</label>');
											$("#cbbSub").val('all');
											
											if($("#cbbDestination").val()=='all')
											{
												$(".suboption").children('.cs-options').css({"height":"auto"});
												$(".suboption").children('.cs-options').children('ul').children('li.ali').addClass('hidden');
											}
											else
											{
												if($(window).width()<976)
												{
													$(".suboption").children('.cs-options').css({"height":"165px"});
												}
												else
												{
													$(".suboption").children('.cs-options').css({"height":"300px"});
												}
												
												$(".suboption").children('.cs-options').removeClass('hidden');
												//var sb = $(me);
												var str = $(me).attr('data-value');
												var n_str = str.split("|");
												//alert(n_str[0]);
												
												
												$(".suboption").children('.cs-options').children('ul').children('li.all').addClass('cs-selected');
												$(".suboption").children('.cs-options').children('ul').children('li.ali').addClass('hidden');
												$(".suboption").children('.cs-options').children('ul').children('li.'+n_str[0]).removeClass('hidden');
											}
										}
                                        </script>
                                </div>
                                <div class="col-md-3 col-sm-12 col-xs-12">
                                <?php //echo $_REQUEST['sub'];?>
                                    <select name="cbbSub" id="cbbSub" class="cbbSub suboption  cs-select cs-skin-elastic fixscroll" >
                                        <option value="all|all" class="oldd" >All Areas <div class="optin">- Optional</div></option>
										<?php 
                                        $ssub = $dbc->Query("select * from destinations where parent is not null and status > 0 AND num_properties > 0 order by name asc");
                                        while($lin = $dbc->Fetch($ssub))
                                        {
											$subact = ($_REQUEST['sub']==$lin['id'])?'selected':'';
                                            echo '<option value="'.$lin['id'].'|'.$lin['parent'].'" '.$subact.'  class="oldd '.$lin['parent'].'">'.$lin['name'].'</option>';
                                        }
                                        ?>
                                   </select> 
									<script>
										$(document).ready(function(e) {
											//alert($("#cbbDestination").val());
											if($("#cbbDestination").val()=='all')
											{
												$(".suboption").children('.cs-options').children('ul').children('li.ali').addClass('hidden');
												$(".suboption").children('.cs-options').css({"height":"auto"});
												$('.fixscroll.cs-active .cs-options').css({"height":"0px"});
											}
											else
											{
												if($(window).width()<976)
												{
													$(".suboption").children('.cs-options').css({"height":"165px"});
												}
												else
												{
													$(".suboption").children('.cs-options').css({"height":"300px"});
												}
											}
											
											
											if($("#cbbDestination").val()=='all')
											{
												$(".suboption").children('.cs-options').css({"height":"auto"});
												$(".suboption").children('.cs-options').children('ul').children('li.ali').addClass('hidden');
											}
											else
											{
												if($(window).width()<976)
												{
													$(".suboption").children('.cs-options').css({"height":"165px"});
												}
												else
												{
													$(".suboption").children('.cs-options').css({"height":"300px"});
												}
												
												$(".suboption").children('.cs-options').removeClass('hidden');
												
												$(".suboption").children('.cs-options').children('ul').children('li.all').addClass('cs-selected');
												$(".suboption").children('.cs-options').children('ul').children('li.ali').addClass('hidden');
												$(".suboption").children('.cs-options').children('ul').children('li.'+$("#cbbDestination").val()).removeClass('hidden');
											}
										});
                                    </script>
                                </div>
                                <div class="col-md-3 col-sm-12 col-xs-12">
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12 col-xs-12  ">
                                            <select name="cbbRoom" id="cbbRoom" class="cs-select cs-skin-elastic fixscroll2 cbbo cRooms">
                                            	<option value="all"  <?php echo !isset($_REQUEST['room'])?'selected':'';?> >All Bedrooms <div class="optin">- Optional</div></option>
                                            	<?php
												$s_r = $dbc->Query("select * from bedroom where status > 0 order by sort asc");
												while($room_bed = $dbc->Fetch($s_r))
												{
													$selc = ($_REQUEST['room']==$room_bed['id'])?'selected':'';
													echo '<option value="'.$room_bed['id'].'" '.$selc.'>'.$room_bed['name'].'</option>';
												}
												?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-2 padd nopad992">
                                    <button type="button" id="bt_search" onClick="searching1()" class="btn btn-main btn-block text_up fonn">Search Villas</button>
                                </div>
                                <div class="col-md-1 nopad992 web992">
                                    <a href="/recently"><button type="button"   class="btn btn-contact text_up fonn butrec1" style="margin-left: 80px !important;">
                                    <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAGAAAABgCAYAAADimHc4AAAABHNCSVQICAgIfAhkiAAAAAlwSFlzAAAF7wAABe8BgGK9nAAAABl0RVh0U29mdHdhcmUAd3d3Lmlua3NjYXBlLm9yZ5vuPBoAAAOsSURBVHic7dzPi1V1GMfxz3Ey0/yBQZj4AwtpMZAQgaCkUIiucpXb9F+oCKJVPzb9BRHkJjfTrkxbDJli0CaQVrkZw2JA0Y0uXE027xb3yFxuc+Z+z7nfc55zp88L7uZyz/c8z/M5986cc8+MZGZmZmZmZmZmZmZmZraeFZNsDLDqokUx0bp91Ua/G5qXYzk4gGAOIJgDCOYAgjmAYA4gmAMI9lR0ASmADZJelXRc0mFJs5L2jbxsUdJNSb9Kui7pt6IoVj1xWjeokHH93cBnwF9V+1rDbeBTYHfGelrttzcFAbPABWCpweBHLZVrzfa1394UBDwHfAk8zjD4UX8DXwA7+9LvxHIVBBTAOeB+9rH/1z3gLFD7AlqufrPJURCwB7iafczjXQX2dN3vqNDL0cBJSV9LeiFxl/clfS9pXtINSQ/L53dKek3SKUmnJT2fuN5dSe8URXElsd5+XX5vekQw+Mj5CPgn4UhdBi4DbwAzQ2scBz4oH8eGnp8B3gR+KLcd5zHwIQkfSU37bU2TgoBNwDcJgwH4FnhlZPsdwI+rvHYe2D7y2kPAxcR9zQGbcvfbqroFAduAnxKGcRt4q2KNy2tsd7Fim9PAnwn7vQJsy9Vv6+oUBGwGriUM4QKwtWKNIwnbH67Ydmu59jjXgM2T9tuJ1IKAjcClMY0vA++N2d/7CQN8N2GNcT8bLgEbm/ZbR1cX42YkrXpUDVmWtNRBLUvlvtbyjAY191udIwJ4Fvg54QiO/gi6DmyZtN9O1C0I/xDOq0lBTP5r6Hbgu4rX+tfQlILIcyJ2jJUTsdeHnveJWI3tTwJ3E4b0xD3gK+Bt4EXg6fLxEnAGOE+9C3p3gBNd9ZtdjoIYnNnO1RhaLnPAjq77zSpXQfhydDO5C8JfyPSjIGAX8DnwKMPgHwIfA7v62m9vC2LwpfwnwM0Gg/+9HHyvv5Sfmr8PAF7W4AuXo1q5LeXJx8kDrdyW8ouk+aIoFlqoIXu/UxNAH7TRr++MC+YAgjmAYA4gmAMI5gCCOYBgDiBYK3+gEXp9ZMr4HRDMAQRzAMEcQDAHEGwqLxuvp8vgfgcEcwDBHEAwBxDMAQRzAMEcQDAHEKyXAQAHgcW6d6KtcZfcInCwyx6mHrAf+CP5RsRqt4D90f1MpTKEWxMOf/Q/a1kdwL6GIXj4uTQIwcPPrUYIHn5bEkJY8PBbVoawUDH8vdH1/S8Ae0dC8PC7NhSChx8FOAAciK7DzMzMzMzMzFL9C3cQs9Jy3THjAAAAAElFTkSuQmCC" width="35px" class="icPhonee">
                                   <?php /*?><img src="/upload/recent.png" width="35px" class="icPhonee" /><?php */?>
                                    </button></a>                                
                                    <a href="/contact"><button type="button"   class="btn btn-contact text_up fonn" style="margin-left: 80px !important;">
                                    <img src="data:image/svg+xml;utf8;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iaXNvLTg4NTktMSI/Pgo8IS0tIEdlbmVyYXRvcjogQWRvYmUgSWxsdXN0cmF0b3IgMTYuMC4wLCBTVkcgRXhwb3J0IFBsdWctSW4gLiBTVkcgVmVyc2lvbjogNi4wMCBCdWlsZCAwKSAgLS0+CjwhRE9DVFlQRSBzdmcgUFVCTElDICItLy9XM0MvL0RURCBTVkcgMS4xLy9FTiIgImh0dHA6Ly93d3cudzMub3JnL0dyYXBoaWNzL1NWRy8xLjEvRFREL3N2ZzExLmR0ZCI+CjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB4bWxuczp4bGluaz0iaHR0cDovL3d3dy53My5vcmcvMTk5OS94bGluayIgdmVyc2lvbj0iMS4xIiBpZD0iQ2FwYV8xIiB4PSIwcHgiIHk9IjBweCIgd2lkdGg9IjMycHgiIGhlaWdodD0iMzJweCIgdmlld0JveD0iMCAwIDUxMiA1MTIiIHN0eWxlPSJlbmFibGUtYmFja2dyb3VuZDpuZXcgMCAwIDUxMiA1MTI7IiB4bWw6c3BhY2U9InByZXNlcnZlIj4KPGc+Cgk8cGF0aCBkPSJNMjU2LDMyYzEyMy41LDAsMjI0LDEwMC41LDIyNCwyMjRTMzc5LjUsNDgwLDI1Niw0ODBTMzIsMzc5LjUsMzIsMjU2UzEzMi41LDMyLDI1NiwzMiBNMjU2LDBDMTE0LjYyNSwwLDAsMTE0LjYyNSwwLDI1NiAgIHMxMTQuNjI1LDI1NiwyNTYsMjU2czI1Ni0xMTQuNjI1LDI1Ni0yNTZTMzk3LjM3NSwwLDI1NiwwTDI1NiwweiBNMzk4LjcxOSwzNDEuNTk0bC0xLjQzOC00LjM3NSAgIGMtMy4zNzUtMTAuMDYyLTE0LjUtMjAuNTYyLTI0Ljc1LTIzLjM3NUwzMzQuNjg4LDMwMy41Yy0xMC4yNS0yLjc4MS0yNC44NzUsMC45NjktMzIuNDA1LDguNWwtMTMuNjg4LDEzLjY4OCAgIGMtNDkuNzUtMTMuNDY5LTg4Ljc4MS01Mi41LTEwMi4yMTktMTAyLjI1bDEzLjY4OC0xMy42ODhjNy41LTcuNSwxMS4yNS0yMi4xMjUsOC40NjktMzIuNDA2TDE5OC4yMTksMTM5LjUgICBjLTIuNzgxLTEwLjI1LTEzLjM0NC0yMS4zNzUtMjMuNDA2LTI0Ljc1bC00LjMxMy0xLjQzOGMtMTAuMDk0LTMuMzc1LTI0LjUsMC4wMzEtMzIsNy41NjNsLTIwLjUsMjAuNSAgIGMtMy42NTYsMy42MjUtNiwxNC4wMzEtNiwxNC4wNjNjLTAuNjg4LDY1LjA2MywyNC44MTMsMTI3LjcxOSw3MC44MTMsMTczLjc1YzQ1Ljg3NSw0NS44NzUsMTA4LjMxMyw3MS4zNDUsMTczLjE1Niw3MC43ODEgICBjMC4zNDQsMCwxMS4wNjMtMi4yODEsMTQuNzE5LTUuOTM4bDIwLjUtMjAuNUMzOTguNjg4LDM2Ni4wNjIsNDAyLjA2MiwzNTEuNjU2LDM5OC43MTksMzQxLjU5NHoiIGZpbGw9IiNGRkZGRkYiLz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8L3N2Zz4K" class="icPhone" />
                                    </button></a>
                                </div>
                            </div>
                            
                            <input type="hidden" id="tx_sort" name="tx_sort">
                            <input type="hidden" id="t_view" name="t_view" >
                            <input type="hidden" id="view" name="view" value="<?php echo $_SESSION['view'];?>">
                            <input type="hidden" id="textH2" name="textH2" value="<?php echo $textH2;?>" >
                            <input type="hidden" id="t_Collection" name="t_Collection"  value="<?php echo isset($_REQUEST['cate'])?$_REQUEST['cate']:'0';?>">
                            <input type="hidden" id="cbbSub_sort" name="cbbSub_sort" value="<?php echo isset($_REQUEST['sub'])?$_REQUEST['sub']:'all';?>">
                        	<?php /*?><input type="text" id="txt_coll" name="txt_coll" value="<?php //echo isset($_SESSION['coll'])?$_SESSION['coll']:'';?>"><?php */?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php //des=all & sub=83 & pri=all & room=all & cate=6 & sort=all
if(!isset($_REQUEST['des']) && !isset($_REQUEST['sub']) && !isset($_REQUEST['pri']) && !isset($_REQUEST['room']))
{
	$view = "hidden";
	//$view = "";
}
else
{
	$view = "";
}
?>
<div class="container-fluid filterb graybar <?php echo $fix_bar2;?> <?php echo $view;?>"> <?php //echo '--------'.$_REQUEST['cate'];?>
	<div class="container " >
    	<div class="row">
        	<div class="col-md-2 ">
            
            </div>
            <div class="col-md-9 left25" style="padding-top: 10px;">
            	<div class="ztop">
                    <div class="col-md-6 col-xs-6 col-sm-6 ">
                        <select name="cbbCollection" id="cbbCollection" class="pull-right form-control cbbox ontop">
                            <option value="0" class="0"  <?php echo isset($_REQUEST['des'])?'':'selected';?>>All Villa Types </option>
                             <?php 
                            $sql_cate = $dbc->Query("select * from categories where status > 0 order by sort asc");
                            while($r_ate = $dbc->Fetch($sql_cate))
                            {
                                $act = ($_REQUEST['cate']==$r_ate['id'])?'selected':'';
                                $cname = explode("-",$r_ate['name']);
								if($r_ate['id']==5)
								{
									$lname = " > 14";
								}
								else
								{
									$lname = "";
								}
                                echo '<option value="'.$r_ate['id'].'"'.$act.' class="'.$r_ate['id'].' cca">'.$cname[0].' '.$lname.'</option>';
                            }
                            ?>
                        </select> 
                    </div>
                    <div class="col-md-3 col-xs-6 col-sm-3 ">
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
                    <div class="col-md-3 col-xs-3 col-sm-3 web">
                        
                        <div class="pull-right btform" style="    margin-top: -9px;">
                            <span class=""><strong>View</strong></span>
                            <button type="button" class="btnna" onClick="grid_view('grid')">
                                <img src="<?php echo $url_link;?>files/square.png" width="25" style="margin-top: 4px;"><!--<i class="fa fa-th-large" aria-hidden="true" ></i>-->
                            </button>
                           
                            <button type="button" class="btnna"  onClick="grid_view('list')" style="margin-top: -4px;">
                                <img src="<?php echo $url_link;?>files/list.png" width="27" style="margin-top: 4px;    margin-left: -10px;"><!--<i class="fa fa-th-list" aria-hidden="true" ></i>-->
                            </button>
                        </div>
                        <div class="pull-right tview">
                            
                        </div>
                        
                    </div>
                    <?php /*?><div class="col-md-4 col-xs-4 col-sm-4 ">
                        <select name="cbbPromotion" id="cbbPromotion" class="pull-right form-control cbbox ontop" >
                            <option value="0">Choose Option</option>
                            <option value="price|asc">Promotion</option>
                        </select>
                    </div><?php */?>
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
</form>
<br><br>
<div class="<?php echo $blank;?>" style="background: white;"></div>
<style>
.h1, .h2, .h3, h1, h2, h3 {
    margin-top: 0px;
    margin-bottom: 10px;
}
</style>
<script> 
function grid_view(viewed)
{
	window.location.hash = viewed;
	
	$.ajax({
		url:"<?php echo $url_link;?>libs/actions/change-session-view.php",
		type:"POST",
		dataType:"html",
		data:{view:viewed},
		success: function(res){
			window.location.reload();
		}
	});
}
function searching1()
{
    $("#cbbCollection").val('0');
	$.ajax({
		url:"<?php echo $url_link;?>libs/actions/check-link.php",
		type:"POST",
		dataType:"html",
		data:$("#forn_search_rent").serialize(),
		success: function(res){
            //alert(res);
            //alert('<?php echo isset($_REQUEST['cbbArrayActualBedrooms'])?$_REQUEST['cbbArrayActualBedrooms']:''; ?>');
			window.location = "<?php echo $url_link;?>"+res;
		}
	});
<?php /*?>	var des = $("#cbbDestination").val();
	var subd = $("#cbbSub").val();
	var pri = $("#cbbPrice").val();
	var room = $("#cbbRoom").val();
	window.location = "<?php echo $url_link;?>search-forrent/"+des+"/"+subd+"/"+pri+"/"+room+"/list.html";
<?php */?>}
function searching2()
{
	//$("#cbbCollection").val('0');
	$.ajax({
		url:"<?php echo $url_link;?>libs/actions/check-link.php",
		type:"POST",
		dataType:"html",
		data:$("#forn_search_rent").serialize(),
		success: function(res){
			window.location = "<?php echo $url_link;?>"+res;
		}
	});
}

function searching3()
{
    $.ajax({
        url:"<?php echo $url_link;?>libs/actions/check-link.php",
        type:"POST",
        dataType:"html",
        data:$("#forn_search_rent").serialize(),
        success: function(res){
            //alert('hey there\n\n\n' + res);
            window.location = "<?php echo $url_link;?>"+res;
        }
    });
}

function searching(va)
{
	$("#cbbCollection").val('0');
	var des = $("#cbbDestination").val();
	var subd = $("#cbbSub").val();
	var pri = $("#cbbPrice").val();
	var room = $("#cbbRoom").val();
	var view = $("#t_view").val();
	var coll = $("#cbbCollection").val();
    var sort = $("#cbbSort").val();
	var sort = $("#cbbActualbed").val();
	
	window.location = "<?php echo $url_link;?>search-forrent/"+des+"/"+subd+"/"+pri+"/"+room+"/"+view+".html";
}

function viewsType(view)
{
	$("#t_view").val(view);
	$(".loadd").show();
	$(".roomold").hide(0);
	$("#tx_sort").val($("#cbbSort").val());
	$.ajax({
		url:"<?php echo $url_link;?>libs/actions/action-load-property.php",
		type:"POST",
		dataType:"html"	,
		data:$("#forn_search_rent").serialize(),
		success: function(res){
			$(".loadd").hide();
			$(".rooms").html(res);
		}
	});
}
$(document).ready(function(e) {
	$(".cbbo").click(function(e) {
    });
	var viewer = '<?php echo isset($_REQUEST['view'])?$_REQUEST['view']:'';?>';
	if(viewer!='')
	{
		//searching();
	}
	
	var des = '<?php echo isset($_REQUEST['des'])?$_REQUEST['des']:'';?>';
	if(des=='all')
	{
		//searching();
	}
    
    $("#cbbCollection").change(function(e) {
        searching2();
    });	
    
	$("#cbbActualbed").change(function(e) {
		searching3();
	});
});

</script>

