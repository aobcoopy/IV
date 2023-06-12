<script type="text/javascript" src="apps/tag/app.js"></script>

<?php
	include_once "apps/tag/include/me.class.php";
	$my = new meClass;
	$view = isset($_REQUEST['view'])?$_REQUEST['view']:"tag";
?>
	<?php
		$my->PageHeader($view);
		$my->PageTabPanel($view);
	?>
	
	<div class="page-content-wrap page-tabs-item active">
		<div class="row">
		<?php
			switch($view){
				case "tag":
					include_once "apps/tag/view/page.tag.table.php";
									
					if($os->allow('tag','add'))
					include_once "apps/tag/control/controller.tag.add.php";
								
					if($os->allow('tag','edit'))
					include_once "apps/tag/control/controller.tag.change.php";
					
					if($os->allow('tag','delete'))
					include_once "apps/tag/control/controller.tag.remove.php";
								
					//if($os->allow('tag','edit'))
					//include_once "apps/tag/control/controller.tag.permission.php";
				
					//if($os->allow('tag','edit'))
					//include_once "apps/tag/control/controller.tag.export.php";
				break;
			}
		?>
		</div>  
	</div>
    