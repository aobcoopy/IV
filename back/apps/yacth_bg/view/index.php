<script type="text/javascript" src="apps/yacth_bg/app.js"></script>

<?php
	include_once "apps/yacth_bg/include/me.class.php";
	$my = new meClass;
	$view = isset($_REQUEST['view'])?$_REQUEST['view']:"yacth_bg";
?>
	<?php
		$my->PageHeader($view);
		$my->PageTabPanel($view);
	?>
	
	<div class="page-content-wrap page-tabs-item active">
		<div class="row">
		<?php
			switch($view){
				case "yacth_bg":
					include_once "apps/yacth_bg/view/page.yacth_cover.php";
					include_once "apps/yacth_bg/control/controller.cover.add.php";
				break;
			}
		?>
		</div>  
	</div>
    