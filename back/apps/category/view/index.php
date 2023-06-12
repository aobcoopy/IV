<script type="text/javascript" src="apps/category/app.js"></script>

<?php
	include_once "apps/category/include/me.class.php";
	$my = new meClass;
	$view = isset($_REQUEST['view'])?$_REQUEST['view']:"category";
?>
	<?php
		$my->PageHeader($view);
		$my->PageTabPanel($view);
	?>
	
	<div class="page-content-wrap page-tabs-item active">
		<div class="row">
		<?php
			switch($view){
				case "category":
					include_once "apps/category/view/page.category.table.php";
									
					if($os->allow('category','add'))
					include_once "apps/category/control/controller.category.add.php";
								
					if($os->allow('category','edit'))
					include_once "apps/category/control/controller.category.change.php";
					
					if($os->allow('category','delete'))
					include_once "apps/category/control/controller.category.remove.php";
								
					//if($os->allow('category','edit'))
					//include_once "apps/category/control/controller.category.permission.php";
				
					//if($os->allow('category','edit'))
					//include_once "apps/category/control/controller.category.export.php";
				break;
			}
		?>
		</div>  
	</div>
    