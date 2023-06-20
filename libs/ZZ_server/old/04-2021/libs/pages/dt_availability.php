 <?php
 $ggc = base64_decode($room['ggc'],true);
 if($ggc!='')
 {
	 ?>
	 	<div class="col-md-12 mg-room-fecilities " style="    margin-top: -10px;">
    <h3 class="mg-sec-left-title l15 top30">Availability </h3>
    <div class="row bggraya">
        <div class="col-12 rows">
           
           <?php echo $ggc;?>
            
        </div>
    </div>
</div> 

<script>
setTimeout(function(){
	$("iframe").addClass("ggcalendar").css({"width":"100%"});
},300);
</script>
	 <?php
 }
 ?>