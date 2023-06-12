<script type="text/javascript" src="apps/blog_category/app.js"></script>

<?php
	include_once "apps/blog_category/include/me.class.php";
	$my = new meClass;
	$view = isset($_REQUEST['view'])?$_REQUEST['view']:"blog_category";
?>
	<?php
		$my->PageHeader($view);
		$my->PageTabPanel($view);
	?>
	
	<div class="page-content-wrap page-tabs-item active">
		<div class="row">
		<?php
			switch($view){
				case "blog_category":
					include_once "apps/blog_category/view/page.blog_category.table.php";
									
					if($os->allow('blog_category','add'))
					include_once "apps/blog_category/control/controller.blog_category.add.php";
								
					if($os->allow('blog_category','edit'))
					include_once "apps/blog_category/control/controller.blog_category.change.php";
					
					if($os->allow('blog_category','delete'))
					include_once "apps/blog_category/control/controller.blog_category.remove.php";
								
					//if($os->allow('blog_category','edit'))
					//include_once "apps/blog_category/control/controller.blog_category.permission.php";
				
					//if($os->allow('blog_category','edit'))
					//include_once "apps/blog_category/control/controller.blog_category.export.php";
				break;
			}
		?>
		</div>  
	</div>
    