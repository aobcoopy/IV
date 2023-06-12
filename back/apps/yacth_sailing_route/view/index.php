<script type="text/javascript" src="apps/yacth_sailing_route/app.js"></script>

<?php
	include_once "apps/yacth_sailing_route/include/me.class.php";
	$my = new meClass;
	$view = isset($_REQUEST['view'])?$_REQUEST['view']:"yacth_sailing_route";
?>
	<?php
		$my->PageHeader($view);
		$my->PageTabPanel($view);
	?>
	
	<div class="page-content-wrap page-tabs-item active">
		<div class="row">
		<?php
			switch($view){
				case "yacth_sailing_route":
					include_once "apps/yacth_sailing_route/view/page.yacth_sailing_route.table.php";
									
					if($os->allow('yacth_sailing_route','add'))
					include_once "apps/yacth_sailing_route/control/controller.yacth_sailing_route.add.php";
								
					if($os->allow('yacth_sailing_route','edit'))
					include_once "apps/yacth_sailing_route/control/controller.yacth_sailing_route.change.php";
					
					if($os->allow('yacth_sailing_route','delete'))
					include_once "apps/yacth_sailing_route/control/controller.yacth_sailing_route.remove.php";
								
					//if($os->allow('yacth_sailing_route','edit'))
					//include_once "apps/yacth_sailing_route/control/controller.yacth_sailing_route.permission.php";
				
					//if($os->allow('yacth_sailing_route','edit'))
					//include_once "apps/yacth_sailing_route/control/controller.yacth_sailing_route.export.php";
				break;
			}
		?>
		</div>  
	</div>
    