<script type="text/javascript" src="apps/product/app.js"></script>

<?php
	include_once "apps/product/include/me.class.php";
	$my = new meClass;
	$view = isset($_REQUEST['view'])?$_REQUEST['view']:"product";
?>
	<?php
		$my->PageHeader($view);
		$my->PageTabPanel($view);
	?>
	
	<div class="page-content-wrap page-tabs-item active">
		<div class="row">
		<?php
			switch($view){
				case "product":
					include_once "apps/product/view/page.product.table.php";
									
					if($os->allow('product','add'))
					include_once "apps/product/control/controller.product.add.php";
								
					if($os->allow('product','edit'))
					include_once "apps/product/control/controller.product.change.php";
					
					if($os->allow('product','delete'))
					include_once "apps/product/control/controller.product.remove.php";
								
					//if($os->allow('product','edit'))
					//include_once "apps/product/control/controller.product.permission.php";
				
					//if($os->allow('product','edit'))
					//include_once "apps/product/control/controller.product.export.php";
				break;
			}
		?>
		</div>  
	</div>