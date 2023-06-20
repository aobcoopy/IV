<script type="text/javascript" src="apps/destination/app.js"></script>

<?php
	include_once "apps/destination/include/me.class.php";
	$my = new meClass;
	$view = isset($_REQUEST['view'])?$_REQUEST['view']:"destination";
?>
	<?php
		$my->PageHeader($view);
		$my->PageTabPanel($view);
	?>
	
	<div class="page-content-wrap page-tabs-item active">
		<div class="row">
		<?php
			switch($view){
				case "destination":
					include_once "apps/destination/view/page.destination.table.php";
									
					if($os->allow('destination','add'))
					include_once "apps/destination/control/controller.destination.add.php";
								
					if($os->allow('destination','edit'))
					include_once "apps/destination/control/controller.destination.change.php";
					
					if($os->allow('destination','delete'))
					include_once "apps/destination/control/controller.destination.remove.php";
								
					//if($os->allow('destination','edit'))
					//include_once "apps/destination/control/controller.destination.permission.php";
				
					//if($os->allow('destination','edit'))
					//include_once "apps/destination/control/controller.destination.export.php";
				break;
			}
		?>
		</div>  
	</div>
    