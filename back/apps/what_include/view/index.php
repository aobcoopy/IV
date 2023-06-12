<script type="text/javascript" src="apps/what_include/app.js"></script>

<?php
	include_once "apps/what_include/include/me.class.php";
	$my = new meClass;
	$view = isset($_REQUEST['view'])?$_REQUEST['view']:"what_include";
?>
	<?php
		$my->PageHeader($view);
		$my->PageTabPanel($view);
	?>
	
	<div class="page-content-wrap page-tabs-item active">
		<div class="row">
		<?php
			switch($view){
				case "what_include":
					include_once "apps/what_include/view/page.what_include.table.php";
									
					if($os->allow('what_include','add'))
					include_once "apps/what_include/control/controller.what_include.add.php";
								
					if($os->allow('what_include','edit'))
					include_once "apps/what_include/control/controller.what_include.change.php";
					
					if($os->allow('what_include','delete'))
					include_once "apps/what_include/control/controller.what_include.remove.php";
								
					//if($os->allow('what_include','edit'))
					//include_once "apps/what_include/control/controller.what_include.permission.php";
				
					//if($os->allow('what_include','edit'))
					//include_once "apps/what_include/control/controller.what_include.export.php";
				break;
			}
		?>
		</div>  
	</div>
    