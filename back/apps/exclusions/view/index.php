<!--<script type="text/javascript" src="apps/exclusions/app.js"></script>-->

<?php
	include_once "apps/exclusions/include/me.class.php";
	$my = new meClass;
	$view = isset($_REQUEST['view'])?$_REQUEST['view']:"add_exclusions";
?>
	<?php
		$my->PageHeader($view);
		$my->PageTabPanel($view);
	?>
	
	<div class="page-content-wrap page-tabs-item active">
		<div class="row">
		<?php
			switch($view){
                case "add_exclusions":
                    include_once "apps/exclusions/view/add_exclusions.php";
                    
                break;                    
				
                case "show_exclusions":					
					include_once "apps/exclusions/view/show_exclusions.php";

				break;
			}
		?>
		</div>  
	</div>
    