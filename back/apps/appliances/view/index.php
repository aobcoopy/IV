<script type="text/javascript" src="apps/appliances/app.js"></script>

<?php
	include_once "apps/appliances/include/me.class.php";
	$my = new meClass;
	$view = isset($_REQUEST['view'])?$_REQUEST['view']:"appliances";
?>
	<?php
		$my->PageHeader($view);
		$my->PageTabPanel($view);
	?>
	
	<div class="page-content-wrap page-tabs-item active">
		<div class="row">
		<?php
			switch($view){
				case "appliances":
					include_once "apps/appliances/view/page.appliances.table.php";
									
					if($os->allow('appliances','add'))
					include_once "apps/appliances/control/controller.appliances.add.php";
								
					if($os->allow('appliances','edit'))
					include_once "apps/appliances/control/controller.appliances.change.php";
					
					if($os->allow('appliances','delete'))
					include_once "apps/appliances/control/controller.appliances.remove.php";
								
					//if($os->allow('appliances','edit'))
					//include_once "apps/appliances/control/controller.appliances.permission.php";
				
					//if($os->allow('appliances','edit'))
					//include_once "apps/appliances/control/controller.appliances.export.php";
				break;
			}
		?>
		</div>  
	</div>
    