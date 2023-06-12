<?php

?>
<div class="widget widget-info widget-carousel">
	<div class="owl-carousel" id="owl-example">
		<!--<div>
			<div class="widget-title">Total Visitors</div>                                                                        
                <div class="widget-subtitle">27/08/2015 15:23</div>
                <div class="widget-int">3,548</div>
		</div>-->
        
        <div>                              
            <div class="widget-title">Photo</div>
            <div class="widget-subtitle">Villas<?php // echo $_SERVER['DOCUMENT_ROOT'];?></div>
            <div class="widget-int">
			
			<?php 
				//$dir = "/images/";
				
				$dir = $_SERVER['DOCUMENT_ROOT']."/upload/property/";
				//// Sort in ascending order - this is default
//				$a = scandir($dir);
//				
//				// Sort in descending order
//				$b = scandir($dir,1);
//				$i=0;
//				foreach($a as $photo)
//				{
//					$i++;	
//				}
//				echo $i;
								/*print_r($a);
				print_r($b);*/

				$directory = $dir;
				$filecount = 0;
				$files = glob($directory . "*");
				if ($files){
				 $filecount = count($files);
				}
				echo "There were $filecount files";
            ?>
            	<!--<button type="button" class="btn btn-warning" onClick="fn.app.dashboard.clear_photo()">Clear</button>-->
            </div>
        </div>
       
       <!-- <div>                               
			<div class="widget-title">New</div>
			<div class="widget-subtitle">Visitors</div>
			<div class="widget-int">1,977</div>
		</div>-->
	</div>
	<!--<div class="widget-controls">  
		<a href="#" class="widget-control-right widget-remove" data-toggle="tooltip" data-placement="top" title="Remove Widget"><span class="fa fa-times"></span></a>
	</div> -->                            
</div> 