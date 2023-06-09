 <?php
 $ggc = base64_decode($room['ggc'],true);
 $path = $url_link."libs/pages/ggcld.css";
 if($ggc!='')
 {
	 $ex = explode("src=",$ggc);
	 $ex1 = explode(">",$ex[1]);
	 $src = str_replace('"','',$ex1[0]);
	 ?>
    <div class="col-md-12 mg-room-fecilities " style="    margin-top: -10px;">
      	<h3 class="mg-sec-left-title l15 top30">Availability </h3>
        <div class="row bggraya">
          <div class="col-12 cald nopad">
               
               <script type="text/javascript" src="<?php echo $src.'?css='.$path?>"></script>
			   <?php //echo $ggc;?>
                
            </div>
        </div>
    </div> 
	 <?php
 }
 // include 'google calendar.php';
  //$path = "https://www.inspiringvillas.com/libs/pages/ggcld.css";
  
 ?>
<!--<script type="text/javascript" src="https://www.availabilitycalendar.com/embed-js/CztEKOywH5ypU4ZBn9s8/en-0-0-1-1-0-0-0-0-0-0-0-1-0/?css=<?php echo $path;?>"></script>
--> <link href="ggcld.css" rel="stylesheet" type="text/css">
 
 
 
 <!--<script>
setTimeout(function(){
	$("iframe").addClass("ggcalendar").css({"width":"100%","border":"0px"});
},300);
</script>-->