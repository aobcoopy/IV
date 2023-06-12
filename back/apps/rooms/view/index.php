<script type="text/javascript" src="apps/rooms/app.js"></script>

<?php
	include_once "apps/rooms/include/me.class.php";
	$my = new meClass;
	$view = isset($_REQUEST['view'])?$_REQUEST['view']:"rooms";
?>
	<?php
		$my->PageHeader($view);
		$my->PageTabPanel($view);
	?>
	
	<div class="page-content-wrap page-tabs-item active">
		<div class="row">
		<?php
			switch($view){
				case "rooms":
					include_once "apps/rooms/view/page.rooms.table.php";
									
					if($os->allow('rooms','add'))
					include_once "apps/rooms/control/controller.rooms.add.php";
								
					if($os->allow('rooms','edit'))
					include_once "apps/rooms/control/controller.rooms.change.php";
					
					if($os->allow('rooms','delete'))
					include_once "apps/rooms/control/controller.rooms.remove.php";
								
					//if($os->allow('rooms','edit'))
					//include_once "apps/rooms/control/controller.rooms.permission.php";
				
					//if($os->allow('rooms','edit'))
					//include_once "apps/rooms/control/controller.rooms.export.php";
				break;
			}
		?>
		</div>  
	</div>
    