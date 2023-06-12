<script type="text/javascript" src="apps/testimonial/app.js"></script>

<?php
	include_once "apps/testimonial/include/me.class.php";
	$my = new meClass;
	$view = isset($_REQUEST['view'])?$_REQUEST['view']:"testimonial";
?>
	<?php
		$my->PageHeader($view);
		$my->PageTabPanel($view);
	?>
	
	<div class="page-content-wrap page-tabs-item active">
		<div class="row">
		<?php
			switch($view){
				case "testimonial":
					include_once "apps/testimonial/view/page.testimonial.table.php";
									
					if($os->allow('testimonial','add'))
					include_once "apps/testimonial/control/controller.testimonial.add.php";
								
					if($os->allow('testimonial','edit'))
					include_once "apps/testimonial/control/controller.testimonial.change.php";
					
					if($os->allow('testimonial','delete'))
					include_once "apps/testimonial/control/controller.testimonial.remove.php";
								
					//if($os->allow('testimonial','edit'))
					//include_once "apps/testimonial/control/controller.testimonial.permission.php";
				
					//if($os->allow('testimonial','edit'))
					//include_once "apps/testimonial/control/controller.testimonial.export.php";
				break;
			}
		?>
		</div>  
	</div>
    