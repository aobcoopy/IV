<script type="text/javascript" src="apps/yacth_charter/app.js"></script>

<?php
	include_once "apps/yacth_charter/include/me.class.php";
	$my = new meClass;
	$view = isset($_REQUEST['view'])?$_REQUEST['view']:"yacth_charter";
?>
	<?php
		$my->PageHeader($view);
		$my->PageTabPanel($view);
	?>
	
	<div class="page-content-wrap page-tabs-item active">
		<div class="row">
		<?php
			switch($view){
				case "yacth_charter":
					include_once "apps/yacth_charter/view/page.yacth_charter.table.php";
									
					if($os->allow('yacth_charter','add'))
					include_once "apps/yacth_charter/control/controller.yacth_charter.add.php";
								
					if($os->allow('yacth_charter','edit'))
					include_once "apps/yacth_charter/control/controller.yacth_charter.change.php";
					
					if($os->allow('yacth_charter','delete'))
					include_once "apps/yacth_charter/control/controller.yacth_charter.remove.php";
								
					//if($os->allow('yacth_charter','edit'))
					//include_once "apps/yacth_charter/control/controller.yacth_charter.permission.php";
				
					//if($os->allow('yacth_charter','edit'))
					//include_once "apps/yacth_charter/control/controller.yacth_charter.export.php";
				break;
			}
		?>
		</div>  
	</div>
    