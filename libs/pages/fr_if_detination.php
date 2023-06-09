<?php
	$Destination='';
	if(isset($_REQUEST['des']))
	if($_REQUEST['des']!='null')
	{
		if($_REQUEST['des']=='all')//all price
		{
			$Destination="";
		}
		else// > 1000
		{
			$Destination="AND destination = '".$_REQUEST['des']."'";
		}
	}
	else
	{
		$Destination="";
	}
?>