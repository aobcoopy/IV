<script type="text/javascript" src="apps/faq/app.js"></script>

<?php
	include_once "apps/faq/include/me.class.php";
	$my = new meClass;
	$view = isset($_REQUEST['view'])?$_REQUEST['view']:"faq";
?>
	<?php
		$my->PageHeader($view);
		$my->PageTabPanel($view);
	?>
	
	<div class="page-content-wrap page-tabs-item active">
		<div class="row">
		<?php
			switch($view){
				case "faq":
					include_once "apps/faq/view/page.faq.table.php";
									
					if($os->allow('faq','add'))
					include_once "apps/faq/control/controller.faq.add.php";
								
					if($os->allow('faq','edit'))
					include_once "apps/faq/control/controller.faq.change.php";
								
					if($os->allow('faq','edit'))
					//include_once "apps/faq/control/controller.faq.permission.php";
									
					if($os->allow('faq','delete'))
					include_once "apps/faq/control/controller.faq.remove.php";
				
					if($os->allow('faq','edit'))
					//include_once "apps/faq/control/controller.faq.export.php";
				break;
			}
		?>
		</div>  
	</div>