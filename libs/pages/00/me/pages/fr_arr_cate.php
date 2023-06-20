<?php
	$arr_cate = array();
	if(isset($_REQUEST['cate']))
	{
		$sql_cate = $dbc->Query("select * from property_cate where caategory = '".$_REQUEST['cate']."' ");
		while($cate_r = $dbc->Fetch($sql_cate))
		{
			//echo '******'.$cate_r['property'];
			if($dbc->HasRecord("properties","id= '".$cate_r['property']."' AND status > 0"))
			{
				array_push($arr_cate,$cate_r['property']);
			}
			
		}
	}

//echo '<pre>';
//print_r($arr_cate);
//echo '</pre>';

?>