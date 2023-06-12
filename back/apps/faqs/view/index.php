<script type="text/javascript" src="apps/faqs/app.js"></script>

<?php
	include_once "apps/faqs/include/me.class.php";
	$my = new meClass;
	$view = isset($_REQUEST['view'])?$_REQUEST['view']:"faqs";
?>
	<?php
		$my->PageHeader($view);
		$my->PageTabPanel($view);
	?>
	
	<div class="page-content-wrap page-tabs-item active">
		<div class="row">
		<?php
			switch($view){
				case "faqs":
					include_once "apps/faqs/view/page.faqs.table.php";
									
					if($os->allow('faqs','add'))
					include_once "apps/faqs/control/controller.faqs.add.php";
								
					if($os->allow('faqs','edit'))
					include_once "apps/faqs/control/controller.faqs.change.php";
								
					if($os->allow('faqs','edit'))
					//include_once "apps/faqs/control/controller.category.permission.php";
									
					if($os->allow('faqs','delete'))
					include_once "apps/faqs/control/controller.faqs.remove.php";
				
					if($os->allow('faqs','edit'))
					//include_once "apps/faqs/control/controller.category.export.php";
				break;
			}
		?>
		</div>  
	</div>