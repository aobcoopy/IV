<?php
$parent_6 = "id ='".$_REQUEST['sub']."' ";
$cate_6 = "";
	
	//-- get beach name

$s_sql = $dbc->Query("select * from destinations where ".$parent_6." and status > 0");
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
$c_sql = $dbc->Query("select * from categories where ".$cate_6." status > 0");
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



				
				//$arr_link_6 = array();
				foreach($arr_beach_name as $abn)
				{
					foreach($arr_coll_name as $acn)
					{
						if(check_links_footer($destination,$abn['id'],0,$acn['id'])==true)
						{
							$alink = '<li class=""><a class="tb" href="/search-rent/'.destination_footer($destination).'/'.beach_footer($abn['id']).'/all-price/all-bedrooms/'.collection_footer($acn['id']).'/all-sort.html" >'.$acn['name'].' Villas '.$abn['name'].'</a></li>';
							//$alink = '<li class=""><a class="tb" href="/search-rent/'.destination_footer($destination).'/'.beach_footer($abn['id']).'/all-price/all-bedrooms/'.collection_footer($acn['id']).'/all-sort.html" >'.$acn['name'].' Villas '.$abn['name'].' '.destination_name($destination).'</a></li>';
							if(!in_array($alink,$arr_link_6))
							{
								array_push($arr_link_6,$alink);
								$xx6++;
							}
						}
					}
				}
				
				/*foreach($arr_beach_name as $abn)
				{
					foreach($arr_coll_name as $acn)
					{
						foreach($arr_bed as $abed)
						{
							if($acn['id']==4)
							{
								if(check_links_footer($destination,$abn['id'],$abed['id'],$acn['id'])==true)
								{
									$alink = '<li class="diy"><a class="tb" href="/search-rent/'.destination_footer($destination).'/'.beach_footer($abn['id']).'/all-price/'.bed_footer($abed['id']).'/'.collection_footer($acn['id']).'/all-sort.html" >'.$abed['name'].' '.$acn['name'].' Villas '.$abn['name'].'</a></li>';
									//$alink = '<li class=""><a class="tb" href="/search-rent/'.destination_footer($destination).'/'.beach_footer($abn['id']).'/all-price/'.bed_footer($abed['id']).'/'.collection_footer($acn['id']).'/all-sort.html" >'.$abed['name'].' '.$acn['name'].' Villas '.$abn['name'].' '.destination_name($destination).'</a></li>';
									if(!in_array($alink,$arr_link_6))
									{
										array_push($arr_link_6,$alink);
										$xx6++;
									}
								}
							}
						}
					}
				}*/

				foreach($arr_beach_name as $abn)
				{
					foreach($arr_bed as $abed)
					{
						if(check_links_footer($destination,$abn['id'],$abed['id'],0)==true)
						{
							$alink = '<li class=""><a class="tb" href="/search-rent/'.destination_footer($destination).'/'.beach_footer($abn['id']).'/all-price/'.bed_footer($abed['id']).'/all-collections/all-sort.html" >'.$abed['name'].' Villas '.$abn['name'].'</a></li>';
							//$alink = '<li class=""><a class="tb" href="/search-rent/'.destination_footer($destination).'/'.beach_footer($abn['id']).'/all-price/'.bed_footer($abed['id']).'/all-collections/all-sort.html" >'.$abed['name'].' Villas '.$abn['name'].' '.destination_name($destination).'</a></li>';
							if(!in_array($alink,$arr_link_6))
							{
								array_push($arr_link_6,$alink);
								$xx6++;
							}
						}
					}
				}
				
				
				/*if($_REQUEST['pri']=='2') //<1000
				{
                $alink = '<li class=""><a class="tb" href="/search-rent/'.destination_footer($destination).'/'.beach_footer($abn['id']).'/under-usd-1000/all-bedrooms/all-collections/all-sort.html" >< 1000USD '.$abn['name'].'  Villas, '.destination_name($destination).'  </a></li>';
				array_push($arr_link_6,$alink);
				$xx6++;
				}
				elseif($_REQUEST['pri']=='3') // >1000
				{
					$alink = '<li class=""><a class="tb" href="/search-rent/'.destination_footer($destination).'/'.beach_footer($abn['id']).'/over-usd-1000/all-bedrooms/all-collections/all-sort.html" >> 1000USD '.$abn['name'].'  Villas, '.destination_name($destination).' </a></li>';
				array_push($arr_link_6,$alink);
				$xx6++;
				}
				else
				{
					$alink = '<li class=""><a class="tb" href="/search-rent/'.destination_footer($destination).'/'.beach_footer($abn['id']).'/over-usd-1000/all-bedrooms/all-collections/all-sort.html" >> 1000USD '.$abn['name'].'  Villas, '.destination_name($destination).' </a></li>';
				array_push($arr_link_6,$alink);
				$xx6++;
                $alink = '<li class=""><a class="tb" href="/search-rent/'.destination_footer($destination).'/'.beach_footer($abn['id']).'/under-usd-1000/all-bedrooms/all-collections/all-sort.html" >< 1000USD '.$abn['name'].'  Villas, '.destination_name($destination).'  </a></li>';
				array_push($arr_link_6,$alink);
				$xx6++;
				}
				foreach($arr_beach_name as $abn)
				{
					if($abn['id']==$_REQUEST['sub'])
					{
						 $alink = '<li class=""><a class="tb" href="/search-rent/'.destination_footer($destination).'/'.beach_footer($_REQUEST['sub']).'/all-price/all-bedrooms/all-collections/all-sort.html" >'.$abn['name'].' Villas, '.destination_name($destination).'  </a></li>';
				array_push($arr_link_6,$alink);
				$xx6++;
					}
				
				
				}
*/

























/*
foreach($arr_coll_name as $acn)
{
	$alink = '<li class=""><a class="tb" href="/search-rent/'.destination_footer($destination).'/'.beach_footer(0).'/all-price/all-bedrooms/'.collection_footer($acn['id']).'/all-sort.html" >'.$acn['name'].' '.destination_name($destination).' Villas</a></li>';
	if(!in_array($alink,$arr_link_6))
	{
		array_push($arr_link_6,$alink);
		$xx6++;
	}
	
}


foreach($arr_bed_2 as $abed)
{
	$alink = '<li class=""><a class="tb" href="/search-rent/'.destination_footer($destination).'/'.beach_footer(0).'/all-price/'.bed_footer($abed['id']).'/all-collections/all-sort.html" >'.$abed['name'].' '.destination_name($destination).' Villas</a></li>';
	if(!in_array($alink,$arr_link_6))
	{
		array_push($arr_link_6,$alink);
		$xx6++;
	}
}

$alink = '<li class=""><a class="tb" href="/search-rent/'.destination_footer($destination).'/'.beach_footer(0).'/all-price/all-bedrooms/'.collection_footer(0).'/all-sort.html" >'.destination_name($destination).' Villas</a></li>';
if(!in_array($alink,$arr_link_6))
	{
		array_push($arr_link_6,$alink);
		$xx6++;
	}


if($_REQUEST['pri']=='2') //<1000
{
	$alink = '<li class=""><a class="tb" href="/search-rent/'.destination_footer($destination).'/all-beach/under-usd-1000/all-bedrooms/all-collections/all-sort.html" >< 1000USD '.destination_name($destination).' Villas</a></li>';
	if(!in_array($alink,$arr_link_6))
	{
		array_push($arr_link_6,$alink);
		$xx6++;
	}
}
elseif($_REQUEST['pri']=='3') // >1000
{
	$alink = '<li class=""><a class="tb" href="/search-rent/'.destination_footer($destination).'/all-beach/over-usd-1000/all-bedrooms/all-collections/all-sort.html" >> 1000USD '.destination_name($destination).' Villas</a></li>';
	if(!in_array($alink,$arr_link_6))
	{
		array_push($arr_link_6,$alink);
		$xx6++;
	}
}
else
{
	$alink = '<li class=""><a class="tb" href="/search-rent/'.destination_footer($destination).'/all-beach/over-usd-1000/all-bedrooms/all-collections/all-sort.html" >> 1000USD '.destination_name($destination).' Villas</a></li>';
	if(!in_array($alink,$arr_link_6))
	{
		array_push($arr_link_6,$alink);
		$xx6++;
	}
	$alink = '<li class=""><a class="tb" href="/search-rent/'.destination_footer($destination).'/all-beach/under-usd-1000/all-bedrooms/all-collections/all-sort.html" >< 1000USD '.destination_name($destination).' Villas</a></li>';
	if(!in_array($alink,$arr_link_6))
	{
		array_push($arr_link_6,$alink);
		$xx6++;
	}
}
*/


?>