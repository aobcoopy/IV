<?php
	$price='';
	if(isset($_REQUEST['pri']))
	if($_REQUEST['pri']!='null')
	{
		if($_REQUEST['pri']=='all')//all price
		{
			$price="";
		}
		elseif($_REQUEST['pri']=='2')// < 1000
		{
			$price="AND price < 1000";
		}
		else// > 1000
		{
			$price="AND price > 1000";
		}
		
	}
	else
	{
		$price="";
	}
?>