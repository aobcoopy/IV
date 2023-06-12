<script type="text/javascript" src="apps/yacth_cover/app.js"></script>

<?php
	include_once "apps/yacth_cover/include/me.class.php";
	$my = new meClass;
	$view = isset($_REQUEST['view'])?$_REQUEST['view']:"yacth_cover";
?>
	<?php
		$my->PageHeader($view);
		$my->PageTabPanel($view);
	?>
	
	<div class="page-content-wrap page-tabs-item active">
		<div class="row">
		<?php
			switch($view){
				case "yacth_cover":
					include_once "apps/yacth_cover/view/page.yacth_cover.php";
					include_once "apps/yacth_cover/control/controller.cover.add.php";
				break;
			}
		?>
		</div>  
	</div>
    