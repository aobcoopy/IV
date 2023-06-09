<script>
var hash = window.location.hash;
if(hash=='preview')
{
	//alert(hash);
	var x = document.createElement("META");
	x.setAttribute("name", "robots");
	x.setAttribute("content", "noindex");
	document.head.appendChild(x);
}
else
{
}
var x = document.createElement("META");
	x.setAttribute("name", "robots");
	x.setAttribute("content", "noindex");
	document.head.appendChild(x);
</script>
<link href="libs/css/yacht.css" rel="stylesheet" type="text/css">

<br><br>

<br><br><br class="web"><br class="web">


<div class="col-md-12 nopad bottom50">
			<center>
				<h1 class="mtop255" style="    text-transform: uppercase;margin-bottom: 20px;" > INTERESTED IN ONE OF YOUR RECENTLY VIEWED YACHT?</h1>
			</center>
		</div>
		
		<div class="container nopad1 t_t11 yacht_content">
			<?php //unset($_SESSION['recent_yacht']);
			if(count($_SESSION['recent_yacht'])>0)
			{
				krsort($_SESSION['recent_yacht']);
				foreach($_SESSION['recent_yacht'] as $yacht)
				{
					$row = $dbc->GetRecord("yacht","*","id = '".$yacht."'");
					//print_r($_SESSION['recent_yacht']);
					include "yacht_list_view.php";
				}
				
			}
			else
			{
				?>
                <!--<div class="col-md-12 nopad bottom50">
                    <center>
                        <h1 class="mtop255" style="    text-transform: uppercase;margin-bottom: 20px;" > INTERESTED IN ONE OF YOUR RECENTLY VIEWED YACHT?</h1>
                    </center>
                </div>-->
                <?php
                echo '<div class="text-center"><img src="../../..//upload/notfound.png" width="20%"></div>';
			}
			?>
</div>
<?php 
include "yacht_contact_popup.php";
include "yacht_detail_popup2.php";
?>
