<script type="text/javascript" src="apps/orders/app.js"></script>

<?php
	include_once "apps/orders/include/me.class.php";
	$my = new meClass;
	$view = isset($_REQUEST['view'])?$_REQUEST['view']:"orders";
?>
	<?php
		$my->PageHeader($view);
		$my->PageTabPanel($view);
	?>
	
	<div class="page-content-wrap page-tabs-item active">
		<div class="row">
		<?php
			switch($view){
				case "orders":
					include_once "apps/orders/view/page.orders.table.php";
									
					//if($os->allow('orders','add'))
					//include_once "apps/orders/control/controller.orders.add.php";
								
					if($os->allow('orders','edit'))
					include_once "apps/orders/control/controller.orders.change.php";
					//
					if($os->allow('orders','delete'))
					include_once "apps/orders/control/controller.orders.remove.php";
								
					//if($os->allow('orders','edit'))
					//include_once "apps/orders/control/controller.orders.permission.php";
				
					//if($os->allow('orders','edit'))
					//include_once "apps/orders/control/controller.orders.export.php";
				break;
			}
		?>
		</div>  
	</div>