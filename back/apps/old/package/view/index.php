<script type="text/javascript" src="apps/package/app.js"></script>

<?php
	include_once "apps/package/include/me.class.php";
	$my = new meClass;
	$view = isset($_REQUEST['view'])?$_REQUEST['view']:"package";
?>
	<?php
		$my->PageHeader($view);
		$my->PageTabPanel($view);
	?>
	
	<div class="page-content-wrap page-tabs-item active">
		<div class="row">
		<?php
			switch($view){
				case "package":
					include_once "apps/package/view/page.package.table.php";
									
					//if($os->allow('package','add'))
					//include_once "apps/package/control/controller.package.add.php";
								
					if($os->allow('package','edit'))
					include_once "apps/package/control/controller.package.change.php";
					//
					//if($os->allow('package','delete'))
					//include_once "apps/package/control/controller.package.remove.php";
								
					//if($os->allow('package','edit'))
					//include_once "apps/package/control/controller.package.permission.php";
				
					//if($os->allow('package','edit'))
					//include_once "apps/package/control/controller.package.export.php";
				break;
			}
		?>
		</div>  
	</div>