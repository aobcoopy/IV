<script type="text/javascript" src="apps/subcategory/app.js"></script>

<?php
	include_once "apps/subcategory/include/me.class.php";
	$my = new meClass;
	$view = isset($_REQUEST['view'])?$_REQUEST['view']:"subcategory";
?>
	<?php
		$my->PageHeader($view);
		$my->PageTabPanel($view);
	?>
	
	<div class="page-content-wrap page-tabs-item active">
		<div class="row">
		<?php
			switch($view){
				case "subcategory":
					include_once "apps/subcategory/view/page.subcategory.table.php";
									
					if($os->allow('subcategory','add'))
					include_once "apps/subcategory/control/controller.subcategory.add.php";
								
					if($os->allow('subcategory','edit'))
					include_once "apps/subcategory/control/controller.subcategory.change.php";
								
					if($os->allow('subcategory','edit'))
					//include_once "apps/subcategory/control/controller.category.permission.php";
									
					if($os->allow('subcategory','delete'))
					include_once "apps/subcategory/control/controller.subcategory.remove.php";
				
					if($os->allow('subcategory','edit'))
					//include_once "apps/subcategory/control/controller.category.export.php";
				break;
			}
		?>
		</div>  
	</div>