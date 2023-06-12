<?php
	include_once "apps/metatag_search/include/me.class.php";
	$my = new meClass;
	$view = isset($_REQUEST['view'])?$_REQUEST['view']:"add_metatags";
?>
	<?php
		$my->PageHeader($view);
		$my->PageTabPanel($view);
	?>
	
	<div class="page-content-wrap page-tabs-item active">
		<div class="row">
		<?php
			switch($view){
                case "add_metatags":
                    include_once "apps/metatag_search/view/add_metatags.php";
                    
                break;                    
				
                case "show_metatags":					
					include_once "apps/metatag_search/view/show_metatags.php";

				break; 
			}
		?>
		</div>  
	</div>
    