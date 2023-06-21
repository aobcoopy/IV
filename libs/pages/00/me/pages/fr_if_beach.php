<?php
	$beach='';
	if(isset($_REQUEST['sub']))
	if($_REQUEST['sub']!='null')
	{
		if($_REQUEST['sub']=='all')//all price
		{
			$beach="";
		}
		else// > 1000
		{
			$beach="AND subdestination = '".$_REQUEST['sub']."'";
		}
	}
	else
	{
		$beach="";
	}
?>