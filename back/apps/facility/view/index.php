<script type="text/javascript" src="apps/facility/app.js"></script>

<?php
	include_once "apps/facility/include/me.class.php";
	$my = new meClass;
	$view = isset($_REQUEST['view'])?$_REQUEST['view']:"facility";
?>
	<?php
		$my->PageHeader($view);
		$my->PageTabPanel($view);
	?>
	
	<div class="page-content-wrap page-tabs-item active">
		<div class="row">
		<?php
			switch($view){
				case "facility":
					include_once "apps/facility/view/page.facility.table.php";
									
					if($os->allow('facility','add'))
					include_once "apps/facility/control/controller.facility.add.php";
								
					if($os->allow('facility','edit'))
					include_once "apps/facility/control/controller.facility.change.php";
					
					if($os->allow('facility','delete'))
					include_once "apps/facility/control/controller.facility.remove.php";
								
					//if($os->allow('facility','edit'))
					//include_once "apps/facility/control/controller.facility.permission.php";
				
					//if($os->allow('facility','edit'))
					//include_once "apps/facility/control/controller.facility.export.php";
				break;
			}
		?>
		</div>  
	</div>
    