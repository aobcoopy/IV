<script type="text/javascript" src="apps/yacth_prefer_program/app.js"></script>

<?php
	include_once "apps/yacth_prefer_program/include/me.class.php";
	$my = new meClass;
	$view = isset($_REQUEST['view'])?$_REQUEST['view']:"yacth_prefer_program";
?>
	<?php
		$my->PageHeader($view);
		$my->PageTabPanel($view);
	?>
	
	<div class="page-content-wrap page-tabs-item active">
		<div class="row">
		<?php
			switch($view){
				case "yacth_prefer_program":
					include_once "apps/yacth_prefer_program/view/page.yacth_prefer_program.table.php";
									
					if($os->allow('yacth_prefer_program','add'))
					include_once "apps/yacth_prefer_program/control/controller.yacth_prefer_program.add.php";
								
					if($os->allow('yacth_prefer_program','edit'))
					include_once "apps/yacth_prefer_program/control/controller.yacth_prefer_program.change.php";
					
					if($os->allow('yacth_prefer_program','delete'))
					include_once "apps/yacth_prefer_program/control/controller.yacth_prefer_program.remove.php";
								
					//if($os->allow('yacth_prefer_program','edit'))
					//include_once "apps/yacth_prefer_program/control/controller.yacth_prefer_program.permission.php";
				
					//if($os->allow('yacth_prefer_program','edit'))
					//include_once "apps/yacth_prefer_program/control/controller.yacth_prefer_program.export.php";
				break;
			}
		?>
		</div>  
	</div>
    