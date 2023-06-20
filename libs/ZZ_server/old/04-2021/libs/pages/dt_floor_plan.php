<?php 
	$bed = json_decode($room['plan'],true);
	if($bed!='')
	{ 
		$flp_photo = json_decode($room['plan'],true);
		//echo $flp_photo;
		 if(is_array($flp_photo))
		 {
			 if($flp_photo[0]!='')
			 {
				 ?><?php //echo '>>'.$flp_photo[0];//imagePath();?>
                 <div class="col-md-12 mg-room-fecilities bedrooms" style="margin-top: 12px;">
            
                    <h5 class="mg-sec-left-title l15">Floor Plan</h5>
                    <div class="row ">
                       <div class="col-md-12 nopad">
                            <img data-src="<?php echo $flp_photo[0];//imagePath();?>" alt="<?php echo $vi_name[0];?>Floor Plan" width="100%" data-toggle="modal" data-target="#myModal_floor" onClick="vire_floor()" class="pointer lazy">
                        </div>
                    </div>
                </div>
			 <?php
			 }
			 else
			 {
				// echo '0000000000000';
			 }
			 
		 }
		 else
		 {
			 ?>
             <div class="col-md-12 mg-room-fecilities bedrooms" style="margin-top: 12px;">
    	
                <h5 class="mg-sec-left-title l15">Floor Plan</h5>
                <div class="row ">
                   <div class="col-md-12 nopad">
                         <img data-src="<?php echo imagePath($flp_photo);?>" alt="<?php echo $vi_name[0];?>Floor Plan" width="100%" data-toggle="modal" data-target="#myModal_floor" onClick="vire_floor()" class="pointer lazy">
                    </div>
                </div>
            </div>
			 <?php
		 }
	?>
	
    
	<?php
	}
?>
<script>
function vire_floor(img)
{
	//$(".c_floorpaln").attr('src',img);
}
</script>

<div class="modal fade " id="myModal_floor" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
  <div class="modal-dialog modal-md mfloor" role="document"  data-scroll-scope="force" >
    <div class="modal-content cont">
      <div class="modal-header modal-h">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Floor Plan</h4>
      </div>
      <div class="modal-body">
		  <!--<img class="c_floorpaln" width="100%">-->
          
            <div id="carousel-fl-plan" class="carousel slide" data-ride="carousel">
                <!-- Indicators -->
                <ol class="carousel-indicators my_dot">
                <?php for($zz=0;$zz<count($flp_photo);$zz++)
				{
					$ac = ($zz==0)?'active':'';
					echo '<li data-target="#carousel-fl-plan" data-slide-to="'.$zz.'" class="'.$ac.'"></li>';
				}
				
				?>
                </ol>
                
                <!-- Wrapper for slides -->
                <div class="carousel-inner" role="listbox">
                <?php 
				if(is_array($flp_photo))
				{
					$x=0;
					foreach($flp_photo as $fl_img)
					{
						$selc = ($x==0)?'active':'';
						echo '<div class="item '.$selc.'">';
							echo '<img src="'.$fl_img.'" width="100%" alt="...">';
						echo '</div>';
						$x++;
					}
				}
				else
				{
					$x=0;
					$selc = ($x==0)?'active':'';
					echo '<div class="item '.$selc.'">';
						echo '<img src="'.imagePath($flp_photo).'" width="100%" alt="...">';
					echo '</div>';
				}
				?>
                </div>
                
                <!-- Controls -->
                <a class="left carousel-control" href="#carousel-fl-plan" role="button" data-slide="prev">
                    <i class="fa fa-angle-left"></i>               
                </a>
                <a class="right carousel-control" href="#carousel-fl-plan" role="button" data-slide="next">
                    <i class="fa fa-angle-right"></i>
                </a>
            </div>
            
          
	  </div>
    </div>
  </div>
</div>
<style>
.my_dot > li
{
	background:#969696;
	border-color:#969696;
}
.my_dot > li.active
{
	background:#e6e6e6;
	border-color:#969696;
}
/*.my_dot
{
	background:#3300ff00;
	width:auto;
	height:35px;
	transform:translateX(50%);
	border:2px solid #969696;
	left:50%;
	position:absolute;
	border-radius:25px;
	padding:6px 8px 0px 8px !important;
	bottom:0;
}*/
</style>