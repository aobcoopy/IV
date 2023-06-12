<?php
	include_once "apps/parameters/include/me.class.php";
	$my = new meClass;
	$view = isset($_REQUEST['view'])?$_REQUEST['view']:"add_parameters";
?>
	<?php
		$my->PageHeader($view);
		$my->PageTabPanel($view);
	?>
	
	<div class="page-content-wrap page-tabs-item active">
		<div class="row">
		<?php
			switch($view){
                case "add_parameters":
                    include_once "apps/parameters/view/add_parameters.php";
                    
                break;                    
                
                case "show_parameters":                    
                    include_once "apps/parameters/view/show_parameters.php";

                break;	
                			
                case "default_parameters":					
					include_once "apps/parameters/view/default_parameters.php";

				break; 
			}
		?>
		</div>  
	</div>
    