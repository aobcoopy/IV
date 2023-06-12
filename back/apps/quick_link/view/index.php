<script type="text/javascript" src="apps/quick_link/app.js"></script>

<?php
	include_once "apps/quick_link/include/me.class.php";
	$my = new meClass;
	$view = isset($_REQUEST['view'])?$_REQUEST['view']:"quick_link";
?>
	<?php
		$my->PageHeader($view);
		$my->PageTabPanel($view);
	?>
	
	<div class="page-content-wrap page-tabs-item active">
		<div class="row">
		<?php
			switch($view){
				case "quick_link":
					include_once "apps/quick_link/view/page.quick_link.table.php";
									
					if($os->allow('quick_link','add'))
					include_once "apps/quick_link/control/controller.quick_link.add.php";
								
					if($os->allow('quick_link','edit'))
					include_once "apps/quick_link/control/controller.quick_link.change.php";
					
					if($os->allow('quick_link','delete'))
					include_once "apps/quick_link/control/controller.quick_link.remove.php";
								
					//if($os->allow('quick_link','edit'))
					//include_once "apps/quick_link/control/controller.quick_link.permission.php";
				
					//if($os->allow('quick_link','edit'))
					//include_once "apps/quick_link/control/controller.quick_link.export.php";
				break;
			}
		?>
		</div>  
	</div>
    