<script type="text/javascript" src="apps/booking/app.js"></script>

<?php
	include_once "apps/booking/include/me.class.php";
	$my = new meClass;
	$view = isset($_REQUEST['view'])?$_REQUEST['view']:"booking";
?>
	<?php
		$my->PageHeader($view);
		$my->PageTabPanel($view);
	?>
	
	<div class="page-content-wrap page-tabs-item active">
		<div class="row">
		<?php
			switch($view){
				case "booking":
					include_once "apps/booking/view/page.booking.table.php";
									
					//if($os->allow('booking','add'))
					//include_once "apps/booking/control/controller.booking.add.php";
								
					if($os->allow('booking','view'))
					include_once "apps/booking/control/controller.booking.view.php";
					
					if($os->allow('booking','delete'))
					include_once "apps/booking/control/controller.booking.remove.php";
								
					//if($os->allow('booking','edit'))
					//include_once "apps/booking/control/controller.booking.permission.php";
				
					//if($os->allow('booking','edit'))
					//include_once "apps/booking/control/controller.booking.export.php";
				break;
			}
		?>
		</div>  
	</div>