<?php
$slide = json_decode($room['bedroom_photo'],true);
$vi_name_1 = explode("|",$room['name']);
if(count($slide)>0)
{?>
	<div class="col-md-12 mg-room-fecilities Reviews" >
		<h6 class="mg-sec-left-title l15" style="margin-top: 25px;margin-bottom: 20px;">Bedroom Photos</h6>
		<div class="row bggray1">
		   <div class="col-md-12 nopad">
           	
            	<?php
				if($room['bedroom_description']!='')
				{
					?><div class="gob f16" style="line-height: 1.8 !important;    margin-top: -25px;"><?php echo $room['bedroom_description'];?></div><?php
				}
				?>

			   <div class="col-md-12 nopad slidetop top211 " style="margin-top: 0px;margin-bottom: 10px;" >
               
               		<div class="col-md-12 nopad" onClick="open_pop_bedroom_photo();">
                    <?php
					$a=0;
					foreach($slide as $img)
					{
						if($a==0)
						{
							?>
                            <div class="col-md-6 col-sm-12 col-xs-12 nopad">
                                <?php echo '<img data-src="'.imagePath($img['img']).'" itemprop=" photo" width="100%" alt="'.$vi_name_1[0].$img['name'].'" class="lazy pcover">';//?>
                            </div>
                    		<?php
						}
						elseif($a==1)
						{
							?>
                            <div class="col-md-6 col-sm-3 col-xs-3 nopad">
                                <?php echo '<img data-src="'.imagePath($img['img']).'" itemprop=" photo" width="100%" alt="'.$vi_name_1[0].$img['name'].'" class="lazy pcover">';//?>
                            </div>
                    		<?php
						}
						elseif($a>4)
						{
						}
						else
						{
							?>
							<div class="col-md-4 col-sm-3  col-xs-3 nopad">
								<?php echo '<img data-src="'.imagePath($img['img']).'" itemprop=" photo" width="100%" alt="'.$vi_name_1[0].$img['name'].'" class="lazy pcover">';//?>
                            </div>
							<?php
						}
						$a++;
					}
					?>
                    	<?php /*?><div class="col-md-6 col-sm-12 col-xs-12 nopad">
                    		<?php echo '<img src="'.$slide[0]['img'].'" width="100%" alt="'.$vi_name_1[0].$img['name'].'" class="lazy pcover">';//;?>
                    	</div>
                        <div class="col-md-6 col-sm-3  col-xs-3 nopad">
                    		<?php echo '<img src="'.$slide[1]['img'].'" width="100%" alt="'.$vi_name_1[0].$img['name'].'" class="lazy pcover">';//;?>
                    	</div>
                    	<div class="col-md-4 col-sm-3  col-xs-3 nopad">
                    		<?php echo '<img src="'.$slide[2]['img'].'" width="100%" alt="'.$vi_name_1[0].$img['name'].'" class="lazy pcover">';//;?>
                    	</div>
                        <div class="col-md-4 col-sm-3  col-xs-3 nopad">
                    		<?php echo '<img src="'.$slide[3]['img'].'" width="100%" alt="'.$vi_name_1[0].$img['name'].'" class="lazy pcover">';//;?>
                    	</div>
                        <div class="col-md-4 col-sm-3  col-xs-3 nopad">
                    		<?php echo '<img src="'.$slide[4]['img'].'" width="100%" alt="'.$vi_name_1[0].$img['name'].'" class="lazy pcover">';//;?>
                    	</div><?php */?>
                    </div>
                    
					<?php /*?><div class="mg-gallery-container">
						<div id="mega-slider-2" class="carousel slide " data-ride="carousel" onClick="open_pop_bedroom_photo();">
							<!-- Indicators -->
							<ol class="carousel-indicators">
								<?php 
							
						   /* $aa=0;
							foreach($slide as $img)
							{
								if($aa<=1)
								{
									$act = ($aa==0)?'active':'';
									echo '<li data-target="#mega-slider-2" data-slide-to="'.$aa.'" class="'.$act.'"></li>';
								}
								$aa++;
							}*-/
							?>
							</ol>
					
							<!-- Wrapper for slides -->
							<div class="carousel-inner spho" role="listbox">
							<div class="coverb"  onClick="open_pop_bedroom_photo();"><?php /*?>data-toggle="modal" data-target=".bs-example-modal-lgs"<?php *-/?>
								<div class="tview1">SEE MORE PHOTOS</div>
							</div>
							<?php 
							//$slide = json_decode($room['photo'],true);
							
							$a=0;
							foreach($slide as $img)
							{
								$ac = ($a==0)?'active beactive':'';
								if($a<=1)
								{
								//echo '<li data-toggle="modal" data-target=".bs-example-modal-lgs"><img src="'.$img['img'].'" alt="Partner Logo" width="100%">'.tag($room['tag']).'</li>';
								echo '<div class="item '.$ac.' " >';
									echo '<img itemprop="image" src="'.$img['img'].'" width="100%" alt="'.$vi_name_1[0].$img['name'].'">';//
								echo '</div>';
								}
								$a++;
							}
							?>
							</div>
					
							<?php /*?> Controls 
							<a class="left carousel-control" href="#mega-slider-2" role="button" data-slide="prev">
							</a>
							<a class="right carousel-control" href="#mega-slider-2" role="button" data-slide="next">
							</a><?php *-/?>
						</div>
				
					</div><?php */?>
				</div>
		   
		   </div>
	   </div>
   </div>
	<?php
}
?>
<style>
.tview1 {
    color: rgb(240, 91, 70);
    position: absolute;
    z-index: 1;
    bottom: 0;
    margin-left: 15px;
    margin-bottom: 15px;
    opacity: 1;
    transition: all 0.3s !important;
}
.coverb_2{width:100%;height:100%;background:rgba(0, 0, 0, 0.53);position:absolute;z-index:150;transition:all 0.3s !important;}
.coverb_2{transition:all 0.3s !important;}
.pcover
{
	border:1px solid #fff;
	cursor:pointer;
}
</style>	
