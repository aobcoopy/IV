<script type="text/javascript" src="apps/yacth_marina/app.js"></script>

<?php
	include_once "apps/yacth_marina/include/me.class.php";
	$my = new meClass;
	$view = isset($_REQUEST['view'])?$_REQUEST['view']:"yacth_marina";
?>
	<?php
		$my->PageHeader($view);
		$my->PageTabPanel($view);
	?>
	
	<div class="page-content-wrap page-tabs-item active">
		<div class="row">
		<?php
			switch($view){
				case "yacth_marina":
					include_once "apps/yacth_marina/view/page.yacth_marina.table.php";
									
					if($os->allow('yacth_marina','add'))
					include_once "apps/yacth_marina/control/controller.yacth_marina.add.php";
								
					if($os->allow('yacth_marina','edit'))
					include_once "apps/yacth_marina/control/controller.yacth_marina.change.php";
					
					if($os->allow('yacth_marina','delete'))
					include_once "apps/yacth_marina/control/controller.yacth_marina.remove.php";
								
					//if($os->allow('yacth_marina','edit'))
					//include_once "apps/yacth_marina/control/controller.yacth_marina.permission.php";
				
					//if($os->allow('yacth_marina','edit'))
					//include_once "apps/yacth_marina/control/controller.yacth_marina.export.php";
				break;
			}
		?>
		</div>  
	</div>
    