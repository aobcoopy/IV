<script type="text/javascript" src="apps/accctrl/app.js"></script>

<?php
	include_once "apps/accctrl/include/me.class.php";
	$my = new meClass;
	$view = isset($_REQUEST['view'])?$_REQUEST['view']:"group";
?>
	<?php
		$my->PageHeader($view);
		$my->PageTabPanel($view);
	?>
	
	<div class="page-content-wrap page-tabs-item active">
		<div class="row">
		<?php
			switch($view){
				case "group":
					include_once "apps/accctrl/view/page.group.table.php";
									
					if($os->allow('accctrl','add'))
					include_once "apps/accctrl/control/controller.group.add.php";
								
					if($os->allow('accctrl','edit'))
					include_once "apps/accctrl/control/controller.group.change.php";
								
					if($os->allow('accctrl','edit'))
					include_once "apps/accctrl/control/controller.group.permission.php";
									
					if($os->allow('accctrl','delete'))
					include_once "apps/accctrl/control/controller.group.remove.php";
				
					if($os->allow('accctrl','edit'))
					include_once "apps/accctrl/control/controller.group.export.php";
					break;
				case "user":
					include_once "apps/accctrl/view/page.user.table.php";
					
					if($os->allow('accctrl','add'))
					include_once "apps/accctrl/control/controller.user.add.php";
				
					if($os->allow('accctrl','edit'))
					include_once "apps/accctrl/control/controller.user.change.php";
				
					if($os->allow('accctrl','delete'))
					include_once "apps/accctrl/control/controller.user.remove.php";
					break;
			}
		?>
		</div>  
	</div>