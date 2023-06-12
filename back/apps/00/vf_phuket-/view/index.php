<script type="text/javascript" src="apps/vf_phuket/app.js"></script>

<?php
	include_once "apps/vf_phuket/include/me.class.php";
	$my = new meClass;
	$view = isset($_REQUEST['view'])?$_REQUEST['view']:"vf_phuket";
?>
	<?php
		$my->PageHeader($view);
		$my->PageTabPanel($view);
	?>
	
	<div class="page-content-wrap page-tabs-item active">
		<div class="row">
		<?php
			switch($view){
				case "vf_phuket":
					include_once "apps/vf_phuket/view/page.vf_phuket.table.php";
									
					if($os->allow('vf_phuket','add'))
					include_once "apps/vf_phuket/control/controller.vf_phuket.add.php";
					
					if($os->allow('vf_phuket','delete'))
					include_once "apps/vf_phuket/control/controller.vf_phuket.remove.php";
								
					if($os->allow('vf_phuket','edit'))
					include_once "apps/vf_phuket/control/controller.vf_phuket.edit.php";
					
					
								
					//if($os->allow('vf_phuket','edit'))
					//include_once "apps/vf_phuket/control/controller.vf_phuket.permission.php";
				
					//if($os->allow('vf_phuket','edit'))
					//include_once "apps/vf_phuket/control/controller.vf_phuket.export.php";
				break;
				case "customer":
					include_once "apps/vf_phuket/view/page.customer.table.php";
				break;
			}
		?>
		</div>  
	</div>
    
    