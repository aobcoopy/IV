<script type="text/javascript" src="apps/chat_group/app.js"></script>

<?php
	include_once "apps/chat_group/include/me.class.php";
	$my = new meClass;
	$view = isset($_REQUEST['view'])?$_REQUEST['view']:"chat_group";
?>
	<?php
		$my->PageHeader($view);
		$my->PageTabPanel($view);
	?>
	
	<div class="page-content-wrap page-tabs-item active">
		<div class="row">
		<?php
			switch($view){
				case "chat_group":
					include_once "apps/chat_group/view/page.chat_group.table.php";
									
					if($os->allow('chat_group','add'))
					include_once "apps/chat_group/control/controller.chat_group.add.php";
								
					if($os->allow('chat_group','edit'))
					include_once "apps/chat_group/control/controller.chat_group.change.php";
								
					if($os->allow('chat_group','edit'))
					//include_once "apps/chat_group/control/controller.chat_group.permission.php";
									
					if($os->allow('chat_group','delete'))
					include_once "apps/chat_group/control/controller.chat_group.remove.php";
				
					if($os->allow('chat_group','edit'))
					//include_once "apps/chat_group/control/controller.chat_group.export.php";
				break;
			}
		?>
		</div>  
	</div>