<script type="text/javascript" src="apps/confirm_payment/app.js"></script>

<?php
	include_once "apps/confirm_payment/include/me.class.php";
	$my = new meClass;
	$view = isset($_REQUEST['view'])?$_REQUEST['view']:"confirm_payment";
?>
	<?php
		$my->PageHeader($view);
		$my->PageTabPanel($view);
	?>
	
	<div class="page-content-wrap page-tabs-item active">
		<div class="row">
		<?php
			switch($view){
				case "confirm_payment":
					include_once "apps/confirm_payment/view/page.confirm_payment.table.php";
									
					//if($os->allow('confirm_payment','add'))
					//include_once "apps/confirm_payment/control/controller.confirm_payment.add.php";
								
					if($os->allow('confirm_payment','edit'))
					include_once "apps/confirm_payment/control/controller.confirm_payment.change.php";
					//
					if($os->allow('confirm_payment','delete'))
					include_once "apps/confirm_payment/control/controller.confirm_payment.remove.php";
								
					//if($os->allow('confirm_payment','edit'))
					//include_once "apps/confirm_payment/control/controller.confirm_payment.permission.php";
				
					//if($os->allow('confirm_payment','edit'))
					//include_once "apps/confirm_payment/control/controller.confirm_payment.export.php";
				break;
			}
		?>
		</div>  
	</div>