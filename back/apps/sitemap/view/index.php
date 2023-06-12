<?php
	include_once "apps/sitemap/include/me.class.php";
	$my = new meClass;
	$view = isset($_REQUEST['view'])?$_REQUEST['view']:"create_sitemap";
?>
	<?php
		$my->PageHeader($view);
		$my->PageTabPanel($view);
	?>
	
	<div class="page-content-wrap page-tabs-item active">
		<div class="row">
		<?php
			switch($view){
                case "create_sitemap":
                    include_once "apps/sitemap/view/create_sitemap.php";
                break;                    

			}
		?>
		</div>  
	</div>
    