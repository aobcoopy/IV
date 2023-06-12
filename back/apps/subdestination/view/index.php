<script type="text/javascript" src="apps/subdestination/app.js"></script>

<?php
	include_once "apps/subdestination/include/me.class.php";
	$my = new meClass;
	$view = isset($_REQUEST['view'])?$_REQUEST['view']:"subdestination";
?>
	<?php
		$my->PageHeader($view);
		$my->PageTabPanel($view);
	?>
	
	<div class="page-content-wrap page-tabs-item active">
		<div class="row">
		<?php
			switch($view){
				case "subdestination":
					include_once "apps/subdestination/view/page.subdestination.table.php";
									
					if($os->allow('subdestination','add'))
					include_once "apps/subdestination/control/controller.subdestination.add.php";
								
					if($os->allow('subdestination','edit'))
					include_once "apps/subdestination/control/controller.subdestination.change.php";
					
					if($os->allow('subdestination','delete'))
					include_once "apps/subdestination/control/controller.subdestination.remove.php";
								
					//if($os->allow('subdestination','edit'))
					//include_once "apps/subdestination/control/controller.subdestination.permission.php";
				
					//if($os->allow('subdestination','edit'))
					//include_once "apps/subdestination/control/controller.subdestination.export.php";
				break;
			}
		?>
		</div>  
	</div>
    