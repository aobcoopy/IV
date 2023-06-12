<script type="text/javascript" src="apps/invoice/app.js"></script>

<?php
	include_once "apps/invoice/include/me.class.php";
	$my = new meClass;
	$view = isset($_REQUEST['view'])?$_REQUEST['view']:"invoice";
?>
	<?php
		$my->PageHeader($view);
		$my->PageTabPanel($view);
	?>
	
	<div class="page-content-wrap page-tabs-item active">
		<div class="row">
		<?php
			switch($view){
				case "invoice":
					include_once "apps/invoice/view/page.invoice.table.php";
									
					if($os->allow('invoice','add'))
					include_once "apps/invoice/control/controller.invoice.add.php";
								
					if($os->allow('invoice','edit'))
					include_once "apps/invoice/control/controller.invoice.change.php";
					
					if($os->allow('invoice','delete'))
					include_once "apps/invoice/control/controller.invoice.remove.php";
								
					//if($os->allow('invoice','edit'))
					//include_once "apps/invoice/control/controller.invoice.permission.php";
				
					//if($os->allow('invoice','edit'))
					//include_once "apps/invoice/control/controller.invoice.export.php";
				break;
			}
		?>
		</div>  
	</div>
    