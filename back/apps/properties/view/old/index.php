<script type="text/javascript" src="apps/properties/app.js"></script>

<?php
	include_once "apps/properties/include/me.class.php";
	$my = new meClass;
	$view = isset($_REQUEST['view'])?$_REQUEST['view']:"properties";
?>
	<?php
		$my->PageHeader($view);
		$my->PageTabPanel($view);
	?>
	
	<div class="page-content-wrap page-tabs-item active">
		<div class="row">
		<?php
			switch($view){
				case "properties":
					include_once "apps/properties/view/page.properties.table.php";
									
					if($os->allow('properties','add'))
					include_once "apps/properties/control/controller.properties.add.php";
								
					if($os->allow('properties','edit'))
					include_once "apps/properties/control/controller.properties.change.php";
					
					if($os->allow('properties','delete'))
					include_once "apps/properties/control/controller.properties.remove.php";
								
					//if($os->allow('properties','edit'))
					//include_once "apps/properties/control/controller.properties.permission.php";
				
					//if($os->allow('properties','edit'))
					//include_once "apps/properties/control/controller.properties.export.php";
				break;
			}
		?>
		</div>  
	</div>
    