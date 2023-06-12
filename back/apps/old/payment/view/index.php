<script type="text/javascript" src="apps/payment/app.js"></script>

<?php
	include_once "apps/payment/include/me.class.php";
	$my = new meClass;
	$view = isset($_REQUEST['view'])?$_REQUEST['view']:"payment";
?>
	<?php
		$my->PageHeader($view);
		$my->PageTabPanel($view);
	?>
	
	<div class="page-content-wrap page-tabs-item active">
		<div class="row">
		<?php
			switch($view){
				case "payment":
					include_once "apps/payment/view/page.payment.table.php";
									
					//if($os->allow('payment','add'))
					//include_once "apps/payment/control/controller.payment.add.php";
								
					if($os->allow('payment','edit'))
					include_once "apps/payment/control/controller.payment.change.php";
					//
					//if($os->allow('payment','delete'))
					//include_once "apps/payment/control/controller.payment.remove.php";
								
					//if($os->allow('payment','edit'))
					//include_once "apps/payment/control/controller.payment.permission.php";
				
					//if($os->allow('payment','edit'))
					//include_once "apps/payment/control/controller.payment.export.php";
				break;
			}
		?>
		</div>  
	</div>