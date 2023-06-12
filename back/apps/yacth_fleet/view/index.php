<script type="text/javascript" src="apps/yacth_fleet/app.js"></script>

<?php
	include_once "apps/yacth_fleet/include/me.class.php";
	$my = new meClass;
	$view = isset($_REQUEST['view'])?$_REQUEST['view']:"yacth_fleet";
?>
	<?php
		$my->PageHeader($view);
		$my->PageTabPanel($view);
	?>
	
	<div class="page-content-wrap page-tabs-item active">
		<div class="row">
		<?php
			switch($view){
				case "yacth_fleet":
					include_once "apps/yacth_fleet/view/page.yacth_fleet.table.php";
									
					if($os->allow('yacth_fleet','add'))
					include_once "apps/yacth_fleet/control/controller.yacth_fleet.add.php";
								
					if($os->allow('yacth_fleet','edit'))
					include_once "apps/yacth_fleet/control/controller.yacth_fleet.change.php";
					
					if($os->allow('yacth_fleet','delete'))
					include_once "apps/yacth_fleet/control/controller.yacth_fleet.remove.php";
								
					//if($os->allow('yacth_fleet','edit'))
					//include_once "apps/yacth_fleet/control/controller.yacth_fleet.permission.php";
				
					//if($os->allow('yacth_fleet','edit'))
					//include_once "apps/yacth_fleet/control/controller.yacth_fleet.export.php";
				break;
			}
		?>
		</div>  
	</div>
    