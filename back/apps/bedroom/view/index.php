<script type="text/javascript" src="apps/bedroom/app.js"></script>

<?php
	include_once "apps/bedroom/include/me.class.php";
	$my = new meClass;
	$view = isset($_REQUEST['view'])?$_REQUEST['view']:"bedroom";
?>
	<?php
		$my->PageHeader($view);
		$my->PageTabPanel($view);
	?>
	
	<div class="page-content-wrap page-tabs-item active">
		<div class="row">
		<?php
			switch($view){
				case "bedroom":
					include_once "apps/bedroom/view/page.bedroom.table.php";
									
					if($os->allow('bedroom','add'))
					include_once "apps/bedroom/control/controller.bedroom.add.php";
								
					if($os->allow('bedroom','edit'))
					include_once "apps/bedroom/control/controller.bedroom.change.php";
					
					if($os->allow('bedroom','delete'))
					include_once "apps/bedroom/control/controller.bedroom.remove.php";
								
					//if($os->allow('bedroom','edit'))
					//include_once "apps/bedroom/control/controller.bedroom.permission.php";
				
					//if($os->allow('bedroom','edit'))
					//include_once "apps/bedroom/control/controller.bedroom.export.php";
				break;
			}
		?>
		</div>  
	</div>
    