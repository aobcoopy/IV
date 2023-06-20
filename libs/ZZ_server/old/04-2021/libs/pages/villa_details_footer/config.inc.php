<div class="container-fluid new_foot1 webss padtop501">
	<div class="row">
<?php

    $destination = $dbc->GetRecord("destinations","*","id='" . $prop['destination'] . "'");
    $region = $destination['slug'];

    if( file_exists( dirname(__FILE__) . "/" . $region . ".inc.php") ) include_once( dirname(__FILE__) . "/" .$region . ".inc.php" );
    else include "general.inc.php";

?>
	</div>
</div>
<div style="height: 20px;"></div>