<script type="text/javascript" src="apps/comment/app.js"></script>

<?php
	include_once "apps/comment/include/me.class.php";
	$my = new meClass;
	$view = isset($_REQUEST['view'])?$_REQUEST['view']:"comment";
?>
	<?php
		$my->PageHeader($view);
		$my->PageTabPanel($view);
	?>
	
	<div class="page-content-wrap page-tabs-item active">
		<div class="row">
		<?php
			switch($view){
				case "comment":
					include_once "apps/comment/view/page.comment.table.php";
									
					/*if($os->allow('comment','add'))
					include_once "apps/comment/control/controller.comment.add.php";*/
								
					if($os->allow('comment','edit'))
					include_once "apps/comment/control/controller.comment.change.php";
					
					if($os->allow('comment','delete'))
					include_once "apps/comment/control/controller.comment.remove.php";
								
					//if($os->allow('comment','edit'))
					//include_once "apps/comment/control/controller.comment.permission.php";
				
					//if($os->allow('comment','edit'))
					//include_once "apps/comment/control/controller.comment.export.php";
				break;
			}
		?>
		</div>  
	</div>
    