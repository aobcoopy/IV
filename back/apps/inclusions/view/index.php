<?php
	include_once "apps/inclusions/include/me.class.php";
	$my = new meClass;
	$view = isset($_REQUEST['view'])?$_REQUEST['view']:"add_inclusions";
?>
	<?php
		$my->PageHeader($view);
		$my->PageTabPanel($view);
	?>
	
	<div class="page-content-wrap page-tabs-item active">
		<div class="row">
		<?php
			switch($view){
                case "add_inclusions":
                    //include_once "apps/inclusions/view/deleteme.php";
                    include_once "apps/inclusions/view/add_inclusions.php";
                break;                    
				
                case "show_inclusions":					
		    include_once "apps/inclusions/view/show_inclusions.php";

		break; 
			}
		?>
		</div>  
	</div>
    