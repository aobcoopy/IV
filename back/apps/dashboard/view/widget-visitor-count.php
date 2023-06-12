<?php

?>
<a href="?app=booking"><div class="widget widget-default widget-carousel">
	<div class="owl-carousel" id="owl-example">
		<!--<div>
			<div class="widget-title">Total Visitors</div>                                                                        
                <div class="widget-subtitle">27/08/2015 15:23</div>
                <div class="widget-int">3,548</div>
		</div>-->
        
        <div>                              
            <div class="widget-title">Booking</div>
            <div class="widget-subtitle">Visitors</div>
            <div class="widget-int"><?php echo $dbc->GetCount("contact_us","property IS NOT NULL AND status = 0");?></div>
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
</div> </a>