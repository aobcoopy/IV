<script type="text/javascript" src="apps/transfer/app.js"></script>
<!--<script src="http://cdn.ckeditor.com/4.6.2/standard-all/ckeditor.js"></script>-->
<?php
	include_once "apps/transfer/include/me.class.php";
	$my = new meClass;
	$view = isset($_REQUEST['view'])?$_REQUEST['view']:"transfer";
?>
	<?php
		$my->PageHeader($view);
		$my->PageTabPanel($view);
	?>
	
	<div class="page-content-wrap page-tabs-item active">
		<div class="row">
		<?php
			switch($view){
				case "transfer":
					include_once "apps/transfer/view/page.transfer.table.php";
									
					if($os->allow('transfer','add'))
					include_once "apps/transfer/control/controller.transfer.add.php";
								
					//if($os->allow('transfer','edit'))
//					include_once "apps/transfer/control/controller.transfer.change.php";
//					
//					if($os->allow('transfer','delete'))
//					include_once "apps/transfer/control/controller.transfer.remove.php";
								
					//if($os->allow('transfer','edit'))
					//include_once "apps/transfer/control/controller.transfer.permission.php";
				
					//if($os->allow('transfer','edit'))
					//include_once "apps/transfer/control/controller.transfer.export.php";
				break;
			}
		?>
		</div>  
	</div>
    