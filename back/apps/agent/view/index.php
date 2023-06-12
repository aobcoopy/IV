<script type="text/javascript" src="apps/agent/app.js"></script>

<?php
	include_once "apps/agent/include/me.class.php";
	$my = new meClass;
	$view = isset($_REQUEST['view'])?$_REQUEST['view']:"agent";
?>
	<?php
		$my->PageHeader($view);
		$my->PageTabPanel($view);
	?>
	
	<div class="page-content-wrap page-tabs-item active">
		<div class="row">
		<?php
			switch($view){
				case "agent":
					include_once "apps/agent/view/page.agent.table.php";
									
					if($os->allow('agent','add'))
					include_once "apps/agent/control/controller.agent.add.php";
								
					if($os->allow('agent','edit'))
					include_once "apps/agent/control/controller.agent.change.php";
					
					if($os->allow('agent','delete'))
					include_once "apps/agent/control/controller.agent.remove.php";
								
					//if($os->allow('agent','edit'))
					//include_once "apps/agent/control/controller.agent.permission.php";
				
					//if($os->allow('agent','edit'))
					//include_once "apps/agent/control/controller.agent.export.php";
				break;
			}
		?>
		</div>  
	</div>
    