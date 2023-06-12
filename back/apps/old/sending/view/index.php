<script type="text/javascript" src="apps/sending/app.js"></script>

<?php
	include_once "apps/sending/include/me.class.php";
	$my = new meClass;
	$view = isset($_REQUEST['view'])?$_REQUEST['view']:"sending";
?>
	<?php
		$my->PageHeader($view);
		$my->PageTabPanel($view);
	?>
	
	<div class="page-content-wrap page-tabs-item active">
		<div class="row">
		<?php
			switch($view){
				case "sending":
					include_once "apps/sending/view/page.sending.table.php";
									
					//if($os->allow('sending','add'))
					//include_once "apps/sending/control/controller.sending.add.php";
								
					if($os->allow('sending','edit'))
					include_once "apps/sending/control/controller.sending.change.php";
					//
					//if($os->allow('sending','delete'))
					//include_once "apps/sending/control/controller.sending.remove.php";
								
					//if($os->allow('sending','edit'))
					//include_once "apps/sending/control/controller.sending.permission.php";
				
					//if($os->allow('sending','edit'))
					//include_once "apps/sending/control/controller.sending.export.php";
				break;
			}
		?>
		</div>  
	</div>