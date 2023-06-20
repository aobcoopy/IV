<?php /*?><script src="<?php echo $url_link;?>libs/js/jquery-3.1.1.min.js"></script><?php */?>
<div class="det_cover">
<div class="wbar2" style="overflow:auto;"></div>
<div class="mg-book-now web992 bookdet">
    <div class="container">
        <div class="row">
        <div class="bardet">
            <div class="col-md-2" ><?php /*?>onClick="openinig();"<?php */?>
            	<div class="mob">
				<a class="navbar-brand" href="/">
                    <?php /*?><i class="fa fa-angle-left hico"></i><?php */?>
                    <img id="_logo6" itemprop="logo"  src="<?php echo $url_link;?>libs/images/logo.png" class="imglogo mologo" height="50" alt="Inspiring Villas logo modet"></a>
                </div>
                <div class="web">
               <a class="navbar-brand alogo detlogo" href="/"><img id="_logo6" itemprop="logo"  src="<?php echo $url_link;?>libs/images/logo.png" class="imglogo " height="50" alt="Inspiring Villas logo"></a>
                </div>
                    
                <?php /*?><h3 class="mg-bn-title tsearch"><center>Search Villas <span class="mg-bn-big">For rates & availability</span></center></h3>
                <center><i class="fa fa-angle-down ffd" aria-hidden="true" style="color:#fff; font-size:20px;"></i></center><?php */?>
            </div>
            <div class="col-md-9 ccc2">
                <div class="mg-bn-forms det_form">
                    <form id="forn_search">
                        <div class="row">
                            <div class="col-md-3 col-sm-12 col-xs-12 "><?php //echo '-->>'.$_REQUEST['des'].'|---|'.$room['destination'].'<<--';?>
                                    <select id="cbbDestination" name="cbbDestination" onChange="load_subdestination(this);" class="cbbdes2 cs-select cs-skin-elastic ">
                                        <option value="all"  <?php echo isset($room['destination'])?'':'selected';?>>All Destinations </option>
                                        <?php 
                                        $sql_destinations = $dbc->Query("select * from destinations where parent is null and status > 0 AND num_properties > 0 order by name asc");
                                        while($r_destinations = $dbc->Fetch($sql_destinations))
                                        {
                                            $act = ($room['destination']==$r_destinations['id'])?'selected':'';
                                            echo '<option value="'.$r_destinations['id'].'"'.$act.'>'.$r_destinations['name'].'</option>';
                                        }
                                        ?>
                                    </select>
                                    <script>
                                    $(document).ready(function(e) {
                                        $(".cbbdes2").attr("onClick","load_subdestination($(this).children('.cs-options').children('ul').children('li.cs-selected').attr('data-value')),check_rooms('forn_search')");
										//$(".cbbSub").attr("onBlur","check_beach_blur($(this).children('.cs-options').children('ul').children('li.cs-selected').attr('data-value'))");
										$(".cbbSub").attr("onClick","check_rooms('forn_search')");
										
										setTimeout(function(){
											autoloaf();
										},800);
                                    });
                                    </script>
                            </div>
                            <div class="col-md-3 col-sm-12 col-xs-12">
                               <select name="cbbSub" id="cbbSub" class="cbbSub suboption cs-select cs-skin-elastic fixscroll" >
                               		<option value="all|all" class="oldd">All Areas</option>
                               	<?php 
								$ssub = $dbc->Query("select * from destinations where parent is not null and status > 0 AND num_properties > 0 order by name asc");
								while($lin = $dbc->Fetch($ssub))
								{
									$d_name = explode(",",$lin['name']);
									echo '<option value="'.$lin['id']."|".$lin['parent'].'"  class="oldd hidden">'.$d_name[0].'</option>';
								}
								?>
                               </select>
                            </div>
                            <div class="col-md-3 col-sm-12 col-xs-12">
                                <?php /*?><div class="row">
                                    <div class="col-md-12 col-sm-12 col-xs-12  "><?php */?>
                                        <select name="cbbRoom" id="cbbRoom" class="cs-select cs-skin-elastic fixscroll2 cRooms">
                                            <option value="all"  <?php echo !isset($_REQUEST['room'])?'selected':'';?>>All Bedrooms </option>
                                            <?php
											$s_r = $dbc->Query("select * from bedroom where status > 0 order by sort asc");
											while($room_bed = $dbc->Fetch($s_r))
											{
												$selc = ($_REQUEST['room']==$room_bed['id'])?'selected':'';
												echo '<option value="'.$room_bed['id'].'" '.$selc.'>'.$room_bed['name'].'</option>';
											}
											?>
                                        </select>
                                   <?php /*?> </div>
                                </div><?php */?>
                            </div>
                            <div class="col-md-2 padd">
                                <button type="button" id="bt_search_1" onClick="searching1()" class="btn btn-main btn-block text_up fonn">Search Villas</button>
                            </div>
                            <div class="col-md-1 nopad992">
                                <a href="/recently"><button type="button"   class="btn btn-contact text_up fonn butrec1" style="margin-left: 80px !important;">
                                    <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAGAAAABgCAYAAADimHc4AAAABHNCSVQICAgIfAhkiAAAAAlwSFlzAAAF7wAABe8BgGK9nAAAABl0RVh0U29mdHdhcmUAd3d3Lmlua3NjYXBlLm9yZ5vuPBoAAAOsSURBVHic7dzPi1V1GMfxz3Ey0/yBQZj4AwtpMZAQgaCkUIiucpXb9F+oCKJVPzb9BRHkJjfTrkxbDJli0CaQVrkZw2JA0Y0uXE027xb3yFxuc+Z+z7nfc55zp88L7uZyz/c8z/M5986cc8+MZGZmZmZmZmZmZmZmZraeFZNsDLDqokUx0bp91Ua/G5qXYzk4gGAOIJgDCOYAgjmAYA4gmAMI9lR0ASmADZJelXRc0mFJs5L2jbxsUdJNSb9Kui7pt6IoVj1xWjeokHH93cBnwF9V+1rDbeBTYHfGelrttzcFAbPABWCpweBHLZVrzfa1394UBDwHfAk8zjD4UX8DXwA7+9LvxHIVBBTAOeB+9rH/1z3gLFD7AlqufrPJURCwB7iafczjXQX2dN3vqNDL0cBJSV9LeiFxl/clfS9pXtINSQ/L53dKek3SKUmnJT2fuN5dSe8URXElsd5+XX5vekQw+Mj5CPgn4UhdBi4DbwAzQ2scBz4oH8eGnp8B3gR+KLcd5zHwIQkfSU37bU2TgoBNwDcJgwH4FnhlZPsdwI+rvHYe2D7y2kPAxcR9zQGbcvfbqroFAduAnxKGcRt4q2KNy2tsd7Fim9PAnwn7vQJsy9Vv6+oUBGwGriUM4QKwtWKNIwnbH67Ydmu59jjXgM2T9tuJ1IKAjcClMY0vA++N2d/7CQN8N2GNcT8bLgEbm/ZbR1cX42YkrXpUDVmWtNRBLUvlvtbyjAY191udIwJ4Fvg54QiO/gi6DmyZtN9O1C0I/xDOq0lBTP5r6Hbgu4rX+tfQlILIcyJ2jJUTsdeHnveJWI3tTwJ3E4b0xD3gK+Bt4EXg6fLxEnAGOE+9C3p3gBNd9ZtdjoIYnNnO1RhaLnPAjq77zSpXQfhydDO5C8JfyPSjIGAX8DnwKMPgHwIfA7v62m9vC2LwpfwnwM0Gg/+9HHyvv5Sfmr8PAF7W4AuXo1q5LeXJx8kDrdyW8ouk+aIoFlqoIXu/UxNAH7TRr++MC+YAgjmAYA4gmAMI5gCCOYBgDiBYK3+gEXp9ZMr4HRDMAQRzAMEcQDAHEGwqLxuvp8vgfgcEcwDBHEAwBxDMAQRzAMEcQDAHEKyXAQAHgcW6d6KtcZfcInCwyx6mHrAf+CP5RsRqt4D90f1MpTKEWxMOf/Q/a1kdwL6GIXj4uTQIwcPPrUYIHn5bEkJY8PBbVoawUDH8vdH1/S8Ae0dC8PC7NhSChx8FOAAciK7DzMzMzMzMzFL9C3cQs9Jy3THjAAAAAElFTkSuQmCC" width="35px" class="icPhonee"><?php /*?><img src="/upload/recent.png" width="35px" class="icPhone1" /><?php */?>
                                    </button></a>                            
                                 <a href="/contact"><button type="button"   class="btn btn-contact text_up fonn" style="margin-left: 80px !important;">
                                    <img src="data:image/svg+xml;utf8;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iaXNvLTg4NTktMSI/Pgo8IS0tIEdlbmVyYXRvcjogQWRvYmUgSWxsdXN0cmF0b3IgMTYuMC4wLCBTVkcgRXhwb3J0IFBsdWctSW4gLiBTVkcgVmVyc2lvbjogNi4wMCBCdWlsZCAwKSAgLS0+CjwhRE9DVFlQRSBzdmcgUFVCTElDICItLy9XM0MvL0RURCBTVkcgMS4xLy9FTiIgImh0dHA6Ly93d3cudzMub3JnL0dyYXBoaWNzL1NWRy8xLjEvRFREL3N2ZzExLmR0ZCI+CjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB4bWxuczp4bGluaz0iaHR0cDovL3d3dy53My5vcmcvMTk5OS94bGluayIgdmVyc2lvbj0iMS4xIiBpZD0iQ2FwYV8xIiB4PSIwcHgiIHk9IjBweCIgd2lkdGg9IjMycHgiIGhlaWdodD0iMzJweCIgdmlld0JveD0iMCAwIDUxMiA1MTIiIHN0eWxlPSJlbmFibGUtYmFja2dyb3VuZDpuZXcgMCAwIDUxMiA1MTI7IiB4bWw6c3BhY2U9InByZXNlcnZlIj4KPGc+Cgk8cGF0aCBkPSJNMjU2LDMyYzEyMy41LDAsMjI0LDEwMC41LDIyNCwyMjRTMzc5LjUsNDgwLDI1Niw0ODBTMzIsMzc5LjUsMzIsMjU2UzEzMi41LDMyLDI1NiwzMiBNMjU2LDBDMTE0LjYyNSwwLDAsMTE0LjYyNSwwLDI1NiAgIHMxMTQuNjI1LDI1NiwyNTYsMjU2czI1Ni0xMTQuNjI1LDI1Ni0yNTZTMzk3LjM3NSwwLDI1NiwwTDI1NiwweiBNMzk4LjcxOSwzNDEuNTk0bC0xLjQzOC00LjM3NSAgIGMtMy4zNzUtMTAuMDYyLTE0LjUtMjAuNTYyLTI0Ljc1LTIzLjM3NUwzMzQuNjg4LDMwMy41Yy0xMC4yNS0yLjc4MS0yNC44NzUsMC45NjktMzIuNDA1LDguNWwtMTMuNjg4LDEzLjY4OCAgIGMtNDkuNzUtMTMuNDY5LTg4Ljc4MS01Mi41LTEwMi4yMTktMTAyLjI1bDEzLjY4OC0xMy42ODhjNy41LTcuNSwxMS4yNS0yMi4xMjUsOC40NjktMzIuNDA2TDE5OC4yMTksMTM5LjUgICBjLTIuNzgxLTEwLjI1LTEzLjM0NC0yMS4zNzUtMjMuNDA2LTI0Ljc1bC00LjMxMy0xLjQzOGMtMTAuMDk0LTMuMzc1LTI0LjUsMC4wMzEtMzIsNy41NjNsLTIwLjUsMjAuNSAgIGMtMy42NTYsMy42MjUtNiwxNC4wMzEtNiwxNC4wNjNjLTAuNjg4LDY1LjA2MywyNC44MTMsMTI3LjcxOSw3MC44MTMsMTczLjc1YzQ1Ljg3NSw0NS44NzUsMTA4LjMxMyw3MS4zNDUsMTczLjE1Niw3MC43ODEgICBjMC4zNDQsMCwxMS4wNjMtMi4yODEsMTQuNzE5LTUuOTM4bDIwLjUtMjAuNUMzOTguNjg4LDM2Ni4wNjIsNDAyLjA2MiwzNTEuNjU2LDM5OC43MTksMzQxLjU5NHoiIGZpbGw9IiNGRkZGRkYiLz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8L3N2Zz4K" class="icPhone" />
                                    </button></a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
</div>
</div>
<script>
function searching1() {
	$.ajax({
		url: "<?php echo $url_link;?>libs/actions/check-link.php",
		type: "POST",
		dataType: "html",
		data: $("#forn_search").serialize(),
		success: function (res) {
			window.location = "<?php echo $url_link;?>" + res;
		}
	});
}
var sel_text = '';

function load_subdestination(me) {
	$(".ali").removeClass('cs-selected');
	$(".cbbSub").children('.cs-placeholder').text('');
	//$(".cbbSub").children('.cs-placeholder').text('All Areas');
	$(".cbbSub").children('.cs-placeholder').html('All Areas <label class="optin">- Optional</label>');;
	
	$("#cbbSub").val('all');
	
	
	if ($("#cbbDestination").val() == 'all') {
		$(".suboption").children('.cs-options').css({
			"height": "auto"
		});
		$(".suboption").children('.cs-options').children('ul').children('li.ali').addClass('hidden');
		
	} else {
		if ($(window).width() < 976) {
			$(".suboption").children('.cs-options').css({
				"height": "auto"
			});
		} else {
			$(".suboption").children('.cs-options').css({
				"height": "auto"
			});
		}
		$(".suboption").children('.cs-options').removeClass('hidden');
		var str = $(me).attr('data-value');
		console.log($(me).attr('data-value'));
		$(".suboption").children('.cs-options').children('ul').children('li.all').addClass('cs-selected');
		$(".suboption").children('.cs-options').children('ul').children('li.ali').addClass('hidden');
		$(".suboption").children('.cs-options').children('ul').children('li.' + me).removeClass('hidden');
	}
}
$(document).ready(function (e) {
	var c_beach = '<?php echo isset($_REQUEST['sub'])?$_REQUEST['sub']:'all';?>';
	var c_room = '<?php echo isset($_REQUEST['room'])?$_REQUEST['room']:'all';?>';
	
	if(c_beach=='all')
	{
		$(".cbbSub").children('.cs-placeholder').html('All Areas <label class="optin">- Optional</label>');;
	}
	
	if(c_room=='all')
	{
		$(".cRooms").children('.cs-placeholder').html('All Bedrooms <label class="optin">- Optional</label>');
	}
	
	
	$(".cbbSub").children('.cs-options').children('ul').children('li').each(function (index, element) {
		var str = $(this).attr('data-value');
		var n_str = str.split("|");
		if (n_str[0] == 'all') {
			$(this).addClass(n_str[1]);
			$(this).attr('data-value', n_str[0]);
		} else {
			$(this).addClass(n_str[1] + " ali");
			$(this).attr('data-value', n_str[0]);
		}
	});
	$("#cbbSub").children().each(function (index, element) {
		var str2 = $(this).val();
		var n2_str = str2.split("|");
		if (n2_str[0] == 'all') {
			$(this).val(n2_str[0]);
		} else {
			$(this).val(n2_str[0]);
		}
	});
	if ($("#cbbDestination").val() == 'all') {
		$(".suboption").children('.cs-options').children('ul').children('li.ali').addClass('hidden');
		$(".suboption").children('.cs-options').css({
			"height": "auto"
		});
		$('.fixscroll.cs-active .cs-options').css({
			"height": "0px"
		});
	} else {
		if ($(window).width() < 976) {
			$(".suboption").children('.cs-options').css({
				"height": "auto"
			});
		} else {
			$(".suboption").children('.cs-options').css({
				"height": "auto"
			});
		}
	}
	
	
});

function autoloaf()
{
	var room = '<?php echo $room['destination'];?>';
	$(".ali").removeClass('cs-selected');
	$(".cbbSub").children('.cs-placeholder').text('');
	//$(".cbbSub").children('.cs-placeholder').text('All Areas');
	$(".cbbSub").children('.cs-placeholder').html('All Areas <label class="optin">- Optional</label>');;
	
	$("#cbbSub").val('all');
	
	
	if (room == 'all') {
		$(".suboption").children('.cs-options').css({
			"height": "auto"
		});
		$(".suboption").children('.cs-options').children('ul').children('li.ali').addClass('hidden');
		
	} else {
		if ($(window).width() < 976) {
			$(".suboption").children('.cs-options').css({
				"height": "auto"
			});
		} else {
			$(".suboption").children('.cs-options').css({
				"height": "auto"
			});
		}
		$(".suboption").children('.cs-options').removeClass('hidden');
		//var str = $(room).attr('data-value');
		console.log($(room).attr('data-value'));
		$(".suboption").children('.cs-options').children('ul').children('li.all').addClass('cs-selected');
		$(".suboption").children('.cs-options').children('ul').children('li.ali').addClass('hidden');
		$(".suboption").children('.cs-options').children('ul').children('li.' + room).removeClass('hidden');
	}
}
</script>