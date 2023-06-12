<script type="text/javascript" src="apps/cover/app.js"></script>

<?php
	include_once "apps/cover/include/me.class.php";
	$my = new meClass;
	$view = isset($_REQUEST['view'])?$_REQUEST['view']:"cover";
?>
	<?php
		$my->PageHeader($view);
		$my->PageTabPanel($view);
	?>
	
	<div class="page-content-wrap page-tabs-item active">
		<div class="row">
		<?php
			switch($view){
				case "cover":
					include_once "apps/cover/view/page.cover.table.php";
									
					if($os->allow('cover','add'))
					include_once "apps/cover/control/controller.cover.add.php";
								
					if($os->allow('cover','edit'))
					include_once "apps/cover/control/controller.cover.change.php";
					
					if($os->allow('cover','delete'))
					include_once "apps/cover/control/controller.cover.remove.php";
								
					//if($os->allow('cover','edit'))
					//include_once "apps/cover/control/controller.cover.permission.php";
				
					//if($os->allow('cover','edit'))
					//include_once "apps/cover/control/controller.cover.export.php";
				break;
			}
		?>
		</div>  
	</div>
    