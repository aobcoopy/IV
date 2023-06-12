<script type="text/javascript" src="apps/blog_instagram/app.js"></script>
<!--<script src="http://cdn.ckeditor.com/4.6.2/standard-all/ckeditor.js"></script>-->
<?php
	include_once "apps/blog_instagram/include/me.class.php";
	$my = new meClass;
	$view = isset($_REQUEST['view'])?$_REQUEST['view']:"blog_instagram";
?>
	<?php
		$my->PageHeader($view);
		$my->PageTabPanel($view);
	?>
	
	<div class="page-content-wrap page-tabs-item active">
		<div class="row">
		<?php
			switch($view){
				case "blog_instagram":
					include_once "apps/blog_instagram/view/page.blog_instagram.table.php";
									
					if($os->allow('blog_instagram','add'))
					include_once "apps/blog_instagram/control/controller.blog_instagram.add.php";
								
					//if($os->allow('blog_instagram','edit'))
//					include_once "apps/blog_instagram/control/controller.blog_instagram.change.php";
//					
//					if($os->allow('blog_instagram','delete'))
//					include_once "apps/blog_instagram/control/controller.blog_instagram.remove.php";
								
					//if($os->allow('blog_instagram','edit'))
					//include_once "apps/blog_instagram/control/controller.blog_instagram.permission.php";
				
					//if($os->allow('blog_instagram','edit'))
					//include_once "apps/blog_instagram/control/controller.blog_instagram.export.php";
				break;
			}
		?>
		</div>  
	</div>
    