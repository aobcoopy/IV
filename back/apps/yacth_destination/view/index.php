<script type="text/javascript" src="apps/yacth_destination/app.js"></script>

<?php
	include_once "apps/yacth_destination/include/me.class.php";
	$my = new meClass;
	$view = isset($_REQUEST['view'])?$_REQUEST['view']:"yacth_destination";
?>
	<?php
		$my->PageHeader($view);
		$my->PageTabPanel($view);
	?>
	
	<div class="page-content-wrap page-tabs-item active">
		<div class="row">
		<?php
			switch($view){
				case "yacth_destination":
					include_once "apps/yacth_destination/view/page.yacth_destination.table.php";
									
					if($os->allow('yacth_destination','add'))
					include_once "apps/yacth_destination/control/controller.yacth_destination.add.php";
								
					if($os->allow('yacth_destination','edit'))
					include_once "apps/yacth_destination/control/controller.yacth_destination.change.php";
					
					if($os->allow('yacth_destination','delete'))
					include_once "apps/yacth_destination/control/controller.yacth_destination.remove.php";
								
					//if($os->allow('yacth_destination','edit'))
					//include_once "apps/yacth_destination/control/controller.yacth_destination.permission.php";
				
					//if($os->allow('yacth_destination','edit'))
					//include_once "apps/yacth_destination/control/controller.yacth_destination.export.php";
				break;
			}
		?>
		</div>  
	</div>
    