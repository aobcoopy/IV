<script type="text/javascript" src="apps/yacth/app.js"></script>

<?php
	include_once "apps/yacth/include/me.class.php";
	$my = new meClass;
	$view = isset($_REQUEST['view'])?$_REQUEST['view']:"yacth";
?>
	<?php
		$my->PageHeader($view);
		$my->PageTabPanel($view);
	?>
	
	<div class="page-content-wrap page-tabs-item active">
		<div class="row">
		<?php
			switch($view){
				case "yacth":
					include_once "apps/yacth/view/page.yacth.table.php";
									
					if($os->allow('yacth','add'))
					include_once "apps/yacth/control/controller.yacth.add.php";
								
					if($os->allow('yacth','edit'))
					include_once "apps/yacth/control/controller.yacth.change.php";
					
					if($os->allow('yacth','delete'))
					include_once "apps/yacth/control/controller.yacth.remove.php";
								
					//if($os->allow('yacth','edit'))
					//include_once "apps/yacth/control/controller.yacth.permission.php";
				
					//if($os->allow('yacth','edit'))
					//include_once "apps/yacth/control/controller.yacth.export.php";
				break;
			}
		?>
		</div>  
	</div>
    