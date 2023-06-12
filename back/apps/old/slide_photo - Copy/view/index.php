<script type="text/javascript" src="apps/slide_photo/app.js"></script>

<?php
	include_once "apps/slide_photo/include/me.class.php";
	$my = new meClass;
	$view = isset($_REQUEST['view'])?$_REQUEST['view']:"slide_photo";
?>
	<?php
		$my->PageHeader($view);
		$my->PageTabPanel($view);
	?>
	
	<div class="page-content-wrap page-tabs-item active">
		<div class="row">
		<?php
			switch($view){
				case "slide_photo":
					include_once "apps/slide_photo/view/page.slide_photo.table.php";
									
					if($os->allow('slide_photo','add'))
					include_once "apps/slide_photo/control/controller.slide_photo.add.php";
								
					/*if($os->allow('slide_photo','edit'))
					include_once "apps/slide_photo/control/controller.slide_photo.change.php";
					
					if($os->allow('slide_photo','delete'))
					include_once "apps/slide_photo/control/controller.slide_photo.remove.php";*/
								
					//if($os->allow('slide_photo','edit'))
					//include_once "apps/slide_photo/control/controller.slide_photo.permission.php";
				
					//if($os->allow('slide_photo','edit'))
					//include_once "apps/slide_photo/control/controller.slide_photo.export.php";
				break;
			}
		?>
		</div>  
	</div>
    