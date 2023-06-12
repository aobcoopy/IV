<script type="text/javascript" src="apps/news/app.js"></script>

<?php
	include_once "apps/news/include/me.class.php";
	$my = new meClass;
	$view = isset($_REQUEST['view'])?$_REQUEST['view']:"news";
?>
	<?php
		$my->PageHeader($view);
		$my->PageTabPanel($view);
	?>
	
	<div class="page-content-wrap page-tabs-item active">
		<div class="row">
		<?php
			switch($view){
				case "news":
					include_once "apps/news/view/page.news.table.php";
									
					if($os->allow('news','add'))
					include_once "apps/news/control/controller.news.add.php";
								
					if($os->allow('news','edit'))
					include_once "apps/news/control/controller.news.change.php";
					
					if($os->allow('news','delete'))
					include_once "apps/news/control/controller.news.remove.php";
								
					//if($os->allow('news','edit'))
					//include_once "apps/news/control/controller.news.permission.php";
				
					//if($os->allow('news','edit'))
					//include_once "apps/news/control/controller.news.export.php";
				break;
			}
		?>
		</div>  
	</div>