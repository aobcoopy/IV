<script type="text/javascript" src="apps/blog/app.js"></script>
<!--<script src="http://cdn.ckeditor.com/4.6.2/standard-all/ckeditor.js"></script>-->
<?php
	include_once "apps/blog/include/me.class.php";
	$my = new meClass;
	$view = isset($_REQUEST['view'])?$_REQUEST['view']:"blog";
?>
	<?php
		$my->PageHeader($view);
		$my->PageTabPanel($view);
	?>
	
	<div class="page-content-wrap page-tabs-item active">
		<div class="row">
		<?php
			switch($view){
				case "blog":
					include_once "apps/blog/view/page.blog.table.php";
									
					if($os->allow('blog','add'))
					include_once "apps/blog/control/controller.blog.add.php";
								
					if($os->allow('blog','edit'))
					include_once "apps/blog/control/controller.blog.change.php";
					
					if($os->allow('blog','delete'))
					include_once "apps/blog/control/controller.blog.remove.php";
								
					//if($os->allow('blog','edit'))
					//include_once "apps/blog/control/controller.blog.permission.php";
				
					//if($os->allow('blog','edit'))
					//include_once "apps/blog/control/controller.blog.export.php";
				break;
			}
		?>
		</div>  
	</div>
    