<script type="text/javascript" src="apps/yacth_icon/app.js"></script>

<?php
	include_once "apps/yacth_icon/include/me.class.php";
	$my = new meClass;
	$view = isset($_REQUEST['view'])?$_REQUEST['view']:"yacth_icon";
?>
	<?php
		$my->PageHeader($view);
		$my->PageTabPanel($view);
	?>
	
	<div class="page-content-wrap page-tabs-item active">
		<div class="row">
		<?php
			switch($view){
				case "yacth_icon":
					include_once "apps/yacth_icon/view/page.yacth_icon.table.php";
									
					if($os->allow('yacth_icon','add'))
					include_once "apps/yacth_icon/control/controller.yacth_icon.add.php";
								
					if($os->allow('yacth_icon','edit'))
					include_once "apps/yacth_icon/control/controller.yacth_icon.change.php";
					
					if($os->allow('yacth_icon','delete'))
					include_once "apps/yacth_icon/control/controller.yacth_icon.remove.php";
								
					//if($os->allow('yacth_icon','edit'))
					//include_once "apps/yacth_icon/control/controller.yacth_icon.permission.php";
				
					//if($os->allow('yacth_icon','edit'))
					//include_once "apps/yacth_icon/control/controller.yacth_icon.export.php";
				break;
			}
		?>
		</div>  
	</div>
    