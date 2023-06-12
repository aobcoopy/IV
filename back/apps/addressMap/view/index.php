<script type="text/javascript" src="apps/addressMap/app.js"></script>
<!--<script defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBL4iy_QqditYvmqAYsZ2UP-kVUQm3uFNs&callback=initMap"></script>-->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBL4iy_QqditYvmqAYsZ2UP-kVUQm3uFNs&libraries=places&callback=initAutocomplete" async defer></script> 
<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false"></script>


<?php
	include_once "apps/addressMap/include/me.class.php";
	$my = new meClass;
	$view = isset($_REQUEST['view'])?$_REQUEST['view']:"addressMap";
?>
	<?php
		$my->PageHeader($view);
		$my->PageTabPanel($view);
	?>
	
	<div class="page-content-wrap page-tabs-item active">
		<div class="row">
		<?php
			switch($view){
				case "addressMap":
					include_once "apps/addressMap/view/page.addressMap.table.php";
									
					if($os->allow('addressMap','add'))
					include_once "apps/addressMap/control/controller.addressMap.add.php";
								
					if($os->allow('addressMap','edit'))
					include_once "apps/addressMap/control/controller.addressMap.change.php";
					
					if($os->allow('addressMap','delete'))
					include_once "apps/addressMap/control/controller.addressMap.remove.php";
								
					//if($os->allow('addressMap','edit'))
					//include_once "apps/addressMap/control/controller.addressMap.permission.php";
				
					//if($os->allow('addressMap','edit'))
					//include_once "apps/addressMap/control/controller.addressMap.export.php";
				break;
			}
		?>
		</div>  
	</div>

 
   