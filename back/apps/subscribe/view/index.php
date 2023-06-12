<script type="text/javascript" src="apps/subscribe/app.js"></script>

<?php
	include_once "apps/subscribe/include/me.class.php";
	$my = new meClass;
	$view = isset($_REQUEST['view'])?$_REQUEST['view']:"subscribe";
?>
	<?php
		$my->PageHeader($view);
		$my->PageTabPanel($view);
	?>
	
	<div class="page-content-wrap page-tabs-item active">
		<div class="row">
		<?php
			switch($view){
				case "subscribe":
					include_once "apps/subscribe/view/page.subscribe.table.php";
									
					//if($os->allow('subscribe','add'))
					//include_once "apps/subscribe/control/controller.subscribe.add.php";
								
					if($os->allow('subscribe','view'))
					include_once "apps/subscribe/control/controller.subscribe.view.php";
					
					if($os->allow('subscribe','delete'))
					include_once "apps/subscribe/control/controller.subscribe.remove.php";
								
					//if($os->allow('subscribe','edit'))
					//include_once "apps/subscribe/control/controller.subscribe.permission.php";
				
					//if($os->allow('subscribe','edit'))
					//include_once "apps/subscribe/control/controller.subscribe.export.php";
				break;
			}
		?>
		</div>  
	</div>