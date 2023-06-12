<script type="text/javascript" src="apps/feature/app.js"></script>

<?php
	include_once "apps/feature/include/me.class.php";
	$my = new meClass;
	$view = isset($_REQUEST['view'])?$_REQUEST['view']:"feature";
?>
	<?php
		$my->PageHeader($view);
		$my->PageTabPanel($view);
	?>
	
	<div class="page-content-wrap page-tabs-item active">
		<div class="row">
		<?php
			switch($view){
				case "feature":
					include_once "apps/feature/view/page.feature.table.php";
									
					if($os->allow('feature','add'))
					include_once "apps/feature/control/controller.feature.add.php";
								
					if($os->allow('feature','edit'))
					include_once "apps/feature/control/controller.feature.change.php";
					
					if($os->allow('feature','delete'))
					include_once "apps/feature/control/controller.feature.remove.php";
								
					//if($os->allow('feature','edit'))
					//include_once "apps/feature/control/controller.feature.permission.php";
				
					//if($os->allow('feature','edit'))
					//include_once "apps/feature/control/controller.feature.export.php";
				break;
			}
		?>
		</div>  
	</div>
    