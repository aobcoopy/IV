<script type="text/javascript" src="apps/yacth_prefer_time/app.js"></script>

<?php
	include_once "apps/yacth_prefer_time/include/me.class.php";
	$my = new meClass;
	$view = isset($_REQUEST['view'])?$_REQUEST['view']:"yacth_prefer_time";
?>
	<?php
		$my->PageHeader($view);
		$my->PageTabPanel($view);
	?>
	
	<div class="page-content-wrap page-tabs-item active">
		<div class="row">
		<?php
			switch($view){
				case "yacth_prefer_time":
					include_once "apps/yacth_prefer_time/view/page.yacth_prefer_time.table.php";
									
					if($os->allow('yacth_prefer_time','add'))
					include_once "apps/yacth_prefer_time/control/controller.yacth_prefer_time.add.php";
								
					if($os->allow('yacth_prefer_time','edit'))
					include_once "apps/yacth_prefer_time/control/controller.yacth_prefer_time.change.php";
					
					if($os->allow('yacth_prefer_time','delete'))
					include_once "apps/yacth_prefer_time/control/controller.yacth_prefer_time.remove.php";
								
					//if($os->allow('yacth_prefer_time','edit'))
					//include_once "apps/yacth_prefer_time/control/controller.yacth_prefer_time.permission.php";
				
					//if($os->allow('yacth_prefer_time','edit'))
					//include_once "apps/yacth_prefer_time/control/controller.yacth_prefer_time.export.php";
				break;
			}
		?>
		</div>  
	</div>
    