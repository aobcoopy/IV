<script type="text/javascript" src="apps/wine_list/app.js"></script>

<?php
	include_once "apps/wine_list/include/me.class.php";
	$my = new meClass;
	$view = isset($_REQUEST['view'])?$_REQUEST['view']:"wine_list";
?>
	<?php
		$my->PageHeader($view);
		$my->PageTabPanel($view);
	?>
	
	<div class="page-content-wrap page-tabs-item active">
		<div class="row">
		<?php
			switch($view){
				case "wine_list":
					include_once "apps/wine_list/view/page.wine_list.table.php";
									
					if($os->allow('wine_list','add'))
					include_once "apps/wine_list/control/controller.wine_list.add.php";
								
					if($os->allow('wine_list','edit'))
					include_once "apps/wine_list/control/controller.wine_list.change.php";
					
					if($os->allow('wine_list','delete'))
					include_once "apps/wine_list/control/controller.wine_list.remove.php";
								
					//if($os->allow('wine_list','edit'))
					//include_once "apps/wine_list/control/controller.wine_list.permission.php";
				
					//if($os->allow('wine_list','edit'))
					//include_once "apps/wine_list/control/controller.wine_list.export.php";
				break;
			}
		?>
		</div>  
	</div>
    