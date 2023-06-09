<?php
$parent_10 = "parent ='".$_REQUEST['des']."' ";
$cate_10 = "";
	
	//-- get beach name

$s_sql = $dbc->Query("select * from destinations where ".$parent_10." and status > 0");
while($line = $dbc->Fetch($s_sql))
{
	$bea_name = explode(",",$line['name']);
	$arr_beach_name[] = array(
		'id'=> $line['id'],
		'name'=> $bea_name[0],
		'parent'=> $line['parent']
	);
}
//-- get beach name

//-- get collection name
$c_sql = $dbc->Query("select * from categories where ".$cate_10." status > 0");
while($line_c = $dbc->Fetch($c_sql))
{
	$col_name = explode(" V",$line_c['name']);
	$arr_coll_name[] = array(
		'id'=> $line_c['id'],
		'name'=> $col_name[0]
	);
}
//-- get collection name


//$noBed = array('0','1-4','5-7','8-10','>10');
$noBed = array('0','2,3,4','5,6,7','8,9,10>');
for($ii=1;$ii<=3;$ii++)
{
	$arr_bed_2[] = array(
		'id' => $ii,
		'name' => $noBed[$ii].' bedrooms'
	);
}



foreach($arr_coll_name as $acn)
{
	if(check_links_footer($destination,0,0,$acn['id'])==true)
	{
		$alink = '<li class=""><a class="tb" href="/search-rent/'.destination_footer($destination).'/'.beach_footer(0).'/all-price/all-bedrooms/'.collection_footer($acn['id']).'/all-sort.html" >'.$acn['name'].' Villas '.destination_name($destination).'</a></li>';
		if(!in_array($alink,$arr_link_10))
		{
			array_push($arr_link_10,$alink);
			$xx10++;
		}
	}
}


foreach($arr_bed_2 as $abed)
{
	if(check_links_footer($destination,0,$abed['id'],0)==true)
	{
		$alink = '<li class=""><a class="tb" href="/search-rent/'.destination_footer($destination).'/'.beach_footer(0).'/all-price/'.bed_footer($abed['id']).'/all-collections/all-sort.html" >'.$abed['name'].' Villas '.destination_name($destination).'</a></li>';
		if(!in_array($alink,$arr_link_10))
		{
			array_push($arr_link_10,$alink);
			$xx10++;
		}
	}
}

$alink = '<li class=""><a class="tb" href="/search-rent/'.destination_footer($destination).'/'.beach_footer(0).'/all-price/all-bedrooms/'.collection_footer(0).'/all-sort.html" >'.destination_name($destination).' Villas</a></li>';
if(!in_array($alink,$arr_link_10))
	{
		array_push($arr_link_10,$alink);
		$xx10++;
	}


/*if($_REQUEST['pri']=='2') //<1000
{
	$alink = '<li class=""><a class="tb" href="/search-rent/'.destination_footer($destination).'/all-beach/under-usd-1000/all-bedrooms/all-collections/all-sort.html" >< 1000USD Villas '.destination_name($destination).'</a></li>';
	if(!in_array($alink,$arr_link_10))
	{
		array_push($arr_link_10,$alink);
		$xx10++;
	}
}
elseif($_REQUEST['pri']=='3') // >1000
{
	$alink = '<li class=""><a class="tb" href="/search-rent/'.destination_footer($destination).'/all-beach/over-usd-1000/all-bedrooms/all-collections/all-sort.html" >> 1000USD Villas '.destination_name($destination).'</a></li>';
	if(!in_array($alink,$arr_link_10))
	{
		array_push($arr_link_10,$alink);
		$xx10++;
	}
}
else
{
	$alink = '<li class=""><a class="tb" href="/search-rent/'.destination_footer($destination).'/all-beach/over-usd-1000/all-bedrooms/all-collections/all-sort.html" >> 1000USD Villas '.destination_name($destination).'</a></li>';
	if(!in_array($alink,$arr_link_10))
	{
		array_push($arr_link_10,$alink);
		$xx10++;
	}
	$alink = '<li class=""><a class="tb" href="/search-rent/'.destination_footer($destination).'/all-beach/under-usd-1000/all-bedrooms/all-collections/all-sort.html" >< 1000USD Villas '.destination_name($destination).'</a></li>';
	if(!in_array($alink,$arr_link_10))
	{
		array_push($arr_link_10,$alink);
		$xx10++;
	}
}*/



?>