<script type="text/javascript" src="apps/icongroup/app.js"></script>

<?php
	include_once "apps/icongroup/include/me.class.php";
	$my = new meClass;
	$view = isset($_REQUEST['view'])?$_REQUEST['view']:"icongroup";
?>
	<?php
		$my->PageHeader($view);
		$my->PageTabPanel($view);
	?>
	
	<div class="page-content-wrap page-tabs-item active">
		<div class="row">
		<?php
			switch($view){
				case "icongroup":
					include_once "apps/icongroup/view/page.icongroup.table.php";
									
					if($os->allow('icongroup','add'))
					include_once "apps/icongroup/control/controller.icongroup.add.php";
								
					if($os->allow('icongroup','edit'))
					include_once "apps/icongroup/control/controller.icongroup.change.php";
					
					if($os->allow('icongroup','delete'))
					include_once "apps/icongroup/control/controller.icongroup.remove.php";
								
					//if($os->allow('icongroup','edit'))
					//include_once "apps/icongroup/control/controller.icongroup.permission.php";
				
					//if($os->allow('icongroup','edit'))
					//include_once "apps/icongroup/control/controller.icongroup.export.php";
				break;
			}
		?>
		</div>  
	</div>
    