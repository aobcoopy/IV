<div class="popback" onClick="closepopup();"></div>
<div class="popbox">
	<i class="fa fa-times close_icon pull-right f20" aria-hidden="true" onClick="closepopup();"></i>
    <div class="row nopad">
    	
        <div class="col-sm-12 ">
        	<div class="p_name text-center"></div>
                        
            

            <!--<div id="mega-sliders" class="carousel slide top48" data-ride="carousel">
              <div class="carousel-inner">
                 <?php
				 for($i=1;$i<=2;$i++)
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
              
                
              <a class="left carousel-control" href="#mega-sliders" role="button" data-slide="prev"><i class="fa fa-angle-left"></i></a>
              <a class="right carousel-control" href="#mega-sliders" role="button" data-slide="next"><i class="fa fa-angle-right"></i></a>
            </div>-->
            
            
            
        
        </div>
    
        <div class="col-sm-11 t_t222 " style="margin-bottom:15px;">
            <img class="p_img_1" width="100%">
        </div>
        <div class="col-sm-1 t_t222 ">
            <div class="row  t_t11">
            	<div class="col-xs-4 col-sm-12 center-block t_t21"><img class="share_icon center-block" src="../../upload/email.png" width="30"></div>
                <div class="col-xs-4 col-sm-12 center-block t_t31"><img class="share_icon center-block" src="../../upload/line.png" width="30"></div>
                <div class="col-xs-4 col-sm-12 center-block t_t41"><img class="share_icon center-block" src="../../upload/whatsapp1.png" width="30"></div>
            </div>
            
            
        </div>
        <div class="col-sm-12 t_t222 ">
            <a href="#" class="dl_hires" target="_blank"><button class="but_hires">Download</button></a>
        </div>
        
        
        
        
        <!--<div class="col-sm-12 text-center">
            <img src="../../upload/slogo.png" alt="" width="100px" class="text-center">
        </div>-->
    </div>
    
</div>


<script>
function closepopup()
{
	$(".popback").fadeOut(300);
	$(".popbox").fadeOut(300);
}
function open_popup_2(id)
{
	$(".popback").fadeIn(300);
	$(".popbox").fadeIn(300);
	$(".p_img_1,.sl_img_1").attr('src','');
	$(".dl_hires").attr('href','#');
			
	$.ajax({
		url:"<?php echo $url_link;?>libs/actions/load-yacht-detail.php",
		type:"POST",
		dataType:"json",
		data:{id:id},
		success: function(res){
			$(".p_name").html(res.name);
			$(".show_des").html(res.descript);
			$(".p_img_1,.sl_img_1").attr('src',res.photo_8);
			$(".dl_hires").attr('href',res.photo_9);
		}
	});
}
</script>

<style>
.share_icon
{
	margin-bottom:5px;
}
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
.but_hires
{
	position:relative;
	left:50%;
	transform:translateX(-50%);
	background:#112945;
	color:#fff;
	border:none;
	padding:5px 20px;
    margin-top:15px;
}
</style>