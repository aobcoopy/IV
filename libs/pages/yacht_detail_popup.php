<div class="popback" onClick="closepopup();"></div>
<div class="popbox">
	<i class="fa fa-times close_icon pull-right f20" aria-hidden="true" onClick="closepopup();"></i>
    <div class="row nopad">
    	
        <div class="col-sm-12 mob">
        	<div class="p_name text-center"></div>
                        
            

            <div id="mega-sliders" class="carousel slide top48" data-ride="carousel">
              <div class="carousel-inner">
                 <?php
				 for($i=1;$i<=7;$i++)
				{
					$act = ($i==1)?'active ':'';
					?>
					<div class="item text-center center-block <?php echo $act;?>">
						<img class="sl_img_<?php echo $i;?>" alt="inspiringvillas cover" width="100%" >
					</div>
					<?php
				}
					
                ?>
              </div>
              
              <!--<a class="left carousel-control" href="#mega-sliders" role="button" data-slide="prev"><i class="fa fa-angle-left"></i></a>
              <a class="right carousel-control" href="#mega-sliders" role="button" data-slide="next"><i class="fa fa-angle-right"></i></a>-->
                
              <a class="left carousel-control" href="#mega-sliders" role="button" data-slide="prev"><i class="fa fa-angle-left"></i></a>
              <a class="right carousel-control" href="#mega-sliders" role="button" data-slide="next"><i class="fa fa-angle-right"></i></a>
            </div>
            
            
            <div class=" col-sm-12 top20 nopad cov_box_pricelist">
                <div class="col-sm-12 nopad">
                    <div class="price_list row scrollbar" id="style-3"></div>
                </div>
            </div>
            
            <div class="col-sm-12 nopad mob">
                <div class="box_description">
                    <div class="high_light text-center"></div>
                    <div class="show_des"></div>
                    <div class="d_corner ctl"></div>
                    <div class="d_corner ctr"></div>
                    <div class="d_corner cbl"></div>
                    <div class="d_corner cbr"></div>
                </div>
            </div>
        
        </div>
    
        <div class="col-sm-4 t_t222 web">
            <img class="p_img_1" width="100%">
            <img class="p_img_2 top20" width="100%">
            <img class="p_img_3 top20" width="100%">
        </div>
        
        <div class="col-sm-8 web nopad t_t111 pl15">
        	<div class="p_name text-center"></div>
            <div class="rows col-sm-12 nopad cov_box_pricelist">
            	<div class="col-sm-12">
                	<div class="price_list row scrollbar" id="style-3"></div>
                </div>
            </div>
            
            
            <div class="col-sm-12 nopad top10 t_t112" style="z-index:10;position:relative;">
            	<div class="col-sm-7 t_t222"><img class="p_img_4" width="100%"></div>
                <div class="col-sm-4 t_t122"><img class="p_img_5" width="100%" style=""></div>
            </div>
            
            <div class="col-sm-12 nopad t_t222" style="margin-top: -20px;z-index:1;position:relative;" >
            	<div class="col-sm-4"><img class="p_img_6 ol_bt" width="100%" ></div>
                <div class="col-sm-7"><img class="p_img_7" width="100%"></div>
            </div>
            
            
        </div>
        
        <div class="col-sm-12  web">
        	<div class="box_description">
            	<div class="high_light text-center"></div>
            	<div class="show_des"></div>
            	<div class="d_corner ctl"></div>
                <div class="d_corner ctr"></div>
                <div class="d_corner cbl"></div>
                <div class="d_corner cbr"></div>
            </div>
        </div>
        <div class="col-sm-12 text-center">
            <img src="../../upload/slogo.png" alt="" width="100px" class="text-center">
        </div>
    </div>
    
</div>


<script>
function closepopup()
{
	$(".popback").fadeOut(300);
	$(".popbox").fadeOut(300);
}
function open_popup_old(id)
{
	$(".popback").fadeIn(300);
	$(".popbox").fadeIn(300);
	$(".p_img_1,.sl_img_1").attr('src','');
	$(".p_img_2,.sl_img_2").attr('src','');
	$(".p_img_3,.sl_img_3").attr('src','');
	$(".p_img_4,.sl_img_4").attr('src','');
	$(".p_img_5,.sl_img_5").attr('src','');
	$(".p_img_6,.sl_img_6").attr('src','');
	$(".p_img_7,.sl_img_7").attr('src','');
			
	$.ajax({
		url:"<?php echo $url_link;?>libs/actions/load-yacht-detail.php",
		type:"POST",
		dataType:"json",
		data:{id:id},
		success: function(res){
			$(".p_name").html(res.name);
			$(".show_des").html(res.descript);
			$(".p_img_1,.sl_img_1").attr('src',res.photo_1);
			$(".p_img_2,.sl_img_2").attr('src',res.photo_2);
			$(".p_img_3,.sl_img_3").attr('src',res.photo_3);
			$(".p_img_4,.sl_img_4").attr('src',res.photo_4);
			$(".p_img_5,.sl_img_5").attr('src',res.photo_5);
			$(".p_img_6,.sl_img_6").attr('src',res.photo_6);
			$(".p_img_7,.sl_img_7").attr('src',res.photo_7);
			
			$(".price_list").children().remove();
			var i=0;
			var z = '';
			for (i in res.pricelist)
			{
				z+= '<div class="col-sm-12 nopads text-center">';
					z+= '<div class="p_box col-sm-4 text-center">';
						z+= '<div class="p_box_inside col-sm-12 text-center">';
							z+= '<div class="p_dot tl"></div>';
							z+= '<div class="p_dot tr"></div>';
							z+= '<div class="p_dot bl"></div>';
							z+= '<div class="p_dot br"></div>';
							z+= res.pricelist[i]['tx_1'];
						z+= '</div>';
					z+= '</div>';
					z+= '<div class="p_box col-sm-4 text-center">';
						z+= '<div class="p_box_inside col-sm-12 text-center">';
							z+= '<div class="p_dot tl"></div>';
							z+= '<div class="p_dot tr"></div>';
							z+= '<div class="p_dot bl"></div>';
							z+= '<div class="p_dot br"></div>';
							z+= res.pricelist[i]['tx_2'];
						z+= '</div>';
					z+= '</div>';
					z+= '<div class="p_box col-sm-4 text-center">';
						z+= '<div class="p_box_inside col-sm-12 text-center">';
							z+= '<div class="p_dot tl"></div>';
							z+= '<div class="p_dot tr"></div>';
							z+= '<div class="p_dot bl"></div>';
							z+= '<div class="p_dot br"></div>';
							z+= res.pricelist[i]['tx_3'];
						z+= '</div>';
					z+= '</div>';
				z+= '</div>';
			}
			$(".price_list").append(z);
			
			$(".high_light").children().remove();
			var x=0;
			var z = '';
			for (x in res.highlight)
			{
				z+= '<div class="box_hl">';
					z+= '<div class="h_dot"></div>';
					z+= res.highlight[x];
				z+= '</div>';
			}
			$(".high_light").append(z);
		}
	});
}
</script>

<style>
.popbox
{
	background: <?php echo $bg_pop;?> !important;
	background-position: 50% 50% !important; 
}
.cpoint
{
	cursor:pointer;
}
.mh
{
	max-height: 350px;
}
</style>