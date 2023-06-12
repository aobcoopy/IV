<script type="text/javascript" src="apps/log/app.js"></script>

<?php
	include_once "apps/log/include/me.class.php";
	$my = new meClass;
	$view = isset($_REQUEST['view'])?$_REQUEST['view']:"table";
?>
	<?php
		$my->PageHeader($view);
		$my->PageTabPanel($view);
	?>
	
	<div class="page-content-wrap page-tabs-item active">
		<div class="row">
		<?php
			switch($view){
				case "table":
					include_once "apps/log/view/page.log.table.php";
					include_once "apps/log/control/controller.log.export.php";
					include_once "apps/log/control/controller.log.view.php";
					break;
				case "timeline":
					include_once "apps/log/view/page.log.timeline.php";
					break;
			}
		?>
		</div>  
	</div>