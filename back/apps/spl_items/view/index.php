<script type="text/javascript" src="apps/spl_items/app.js"></script>

<?php
	include_once "apps/spl_items/include/me.class.php";
	$my = new meClass;
	$view = isset($_REQUEST['view'])?$_REQUEST['view']:"spl_items";
?>
	<?php
		$my->PageHeader($view);
		$my->PageTabPanel($view);
	?>
	
	<div class="page-content-wrap page-tabs-item active">
		<div class="row">
		<?php
			switch($view){
				case "spl_items":
					include_once "apps/spl_items/view/page.spl_items.table.php";
									
					if($os->allow('spl_items','add'))
					include_once "apps/spl_items/control/controller.spl_items.add.php";
								
					if($os->allow('spl_items','edit'))
					include_once "apps/spl_items/control/controller.spl_items.change.php";
					
					if($os->allow('spl_items','delete'))
					include_once "apps/spl_items/control/controller.spl_items.remove.php";
								
					//if($os->allow('spl_items','edit'))
					//include_once "apps/spl_items/control/controller.spl_items.permission.php";
				
					//if($os->allow('spl_items','edit'))
					//include_once "apps/spl_items/control/controller.spl_items.export.php";
				break;
			}
		?>
		</div>  
	</div>
    