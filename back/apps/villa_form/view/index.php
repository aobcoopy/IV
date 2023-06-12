<script type="text/javascript" src="apps/villa_form/app.js"></script>

<?php
	include_once "apps/villa_form/include/me.class.php";
	$my = new meClass;
	$view = isset($_REQUEST['view'])?$_REQUEST['view']:"villa_form";
?>
	<?php
		$my->PageHeader($view);
		$my->PageTabPanel($view);
	?>
	
	<div class="page-content-wrap page-tabs-item active">
		<div class="row">
		<?php
			switch($view){
				case "villa_form":
					include_once "apps/villa_form/view/page.villa_form.table.php";
									
					/*if($os->allow('villa_form','add'))
					include_once "apps/villa_form/control/controller.villa_form.add.php";
								
					if($os->allow('villa_form','edit'))
					include_once "apps/villa_form/control/controller.villa_form.change.php";
					
					if($os->allow('villa_form','delete'))
					include_once "apps/villa_form/control/controller.villa_form.remove.php";*/
								
					//if($os->allow('villa_form','edit'))
					//include_once "apps/villa_form/control/controller.villa_form.permission.php";
				
					//if($os->allow('villa_form','edit'))
					//include_once "apps/villa_form/control/controller.villa_form.export.php";
				break;
			}
		?>
		</div>  
	</div>
    