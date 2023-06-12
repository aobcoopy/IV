<script type="text/javascript" src="apps/contact/app.js"></script>

<?php
	include_once "apps/contact/include/me.class.php";
	$my = new meClass;
	$view = isset($_REQUEST['view'])?$_REQUEST['view']:"contact";
?>
	<?php
		$my->PageHeader($view);
		$my->PageTabPanel($view);
	?>
	
	<div class="page-content-wrap page-tabs-item active">
		<div class="row">
		<?php
			switch($view){
				case "contact":
					include_once "apps/contact/view/page.contact.table.php";
									
					//if($os->allow('contact','add'))
					//include_once "apps/contact/control/controller.contact.add.php";
								
					if($os->allow('contact','view'))
					include_once "apps/contact/control/controller.contact.view.php";
					
					if($os->allow('contact','delete'))
					include_once "apps/contact/control/controller.contact.remove.php";
								
					//if($os->allow('contact','edit'))
					//include_once "apps/contact/control/controller.contact.permission.php";
				
					//if($os->allow('contact','edit'))
					//include_once "apps/contact/control/controller.contact.export.php";
				break;
			}
		?>
		</div>  
	</div>