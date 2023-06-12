<script type="text/javascript" src="apps/spl_cate/app.js"></script>

<?php
	include_once "apps/spl_cate/include/me.class.php";
	$my = new meClass;
	$view = isset($_REQUEST['view'])?$_REQUEST['view']:"spl_cate";
?>
	<?php
		$my->PageHeader($view);
		$my->PageTabPanel($view);
	?>
	
	<div class="page-content-wrap page-tabs-item active">
		<div class="row">
		<?php
			switch($view){
				case "spl_cate":
					include_once "apps/spl_cate/view/page.spl_cate.table.php";
									
					if($os->allow('spl_cate','add'))
					include_once "apps/spl_cate/control/controller.spl_cate.add.php";
								
					if($os->allow('spl_cate','edit'))
					include_once "apps/spl_cate/control/controller.spl_cate.change.php";
					
					if($os->allow('spl_cate','delete'))
					include_once "apps/spl_cate/control/controller.spl_cate.remove.php";
								
					//if($os->allow('spl_cate','edit'))
					//include_once "apps/spl_cate/control/controller.spl_cate.permission.php";
				
					//if($os->allow('spl_cate','edit'))
					//include_once "apps/spl_cate/control/controller.spl_cate.export.php";
				break;
			}
		?>
		</div>  
	</div>
    