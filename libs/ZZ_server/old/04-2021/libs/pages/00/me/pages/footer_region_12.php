<!--<div class="col-md-3 col-sm-6 col-xs-12">
            	 <ul class="menulinkfooter tb">-->
				 <?php
$parent = "parent IS NOT NULL";
$cate_re = "";//"id = '".$_REQUEST['cate']."' and";//
//-- get beach name

$s_sql = $dbc->Query("select * from destinations where ".$parent." and status > 0");
while($line = $dbc->Fetch($s_sql))
{
	$bea_name = explode(",",$line['name']);
	$arr_beach_name_12[] = array(
		'id'=> $line['id'],
		'name'=> $bea_name[0],
		'parent'=> $line['parent']
	);
}
//-- get beach name

//-- get collection name
$c_sql = $dbc->Query("select * from categories where ".$cate_re." status > 0");
while($line_c = $dbc->Fetch($c_sql))
{
	$col_name = explode(" V",$line_c['name']);
	$arr_coll_name_re[] = array(
		'id'=> $line_c['id'],
		'name'=> $col_name[0]
	);
}
//-- get collection name



//$repeat_2 = array();



foreach($arr_coll_name_re as $acn)
{
	if(check_links_footer(0,0,0,$acn['id'])==true)
	{
		$alink = '<li class=""><a class="tb" href="/search-rent/thailand/'.beach_footer(0).'/all-price/all-bedrooms/'.collection_footer($acn['id']).'/all-sort.html" >'.$acn['name'].' Villas Thailand</a></li>';
		if(!in_array($alink,$arr_link_12))
		{
			//$alink = '<li class="diy"><a class="tb" href="/search-rent/thailand/'.beach_footer($abn['id']).'/all-price/all-bedrooms/'.collection_footer($acn['id']).'/all-sort.html" >'.$acn['name'].' Thailand Villas</a></li>';
			array_push($arr_link_12,$alink);
			$xx12++;
		}
	}
}





foreach($arr_beach_name_12 as $abn)
{
	foreach($arr_coll_name_re as $acn)
	{
		if($_REQUEST['cate']==$acn['id'])
		{
			
			if($abn['parent']=='')
			{
				if(check_links_footer($abn['id'],$abn['id'],0,$acn['id'])==true)
				{
					$alink = '<li class=""><a class="tb" href="/search-rent/'.destination_footer($abn['id']).'/'.beach_footer($abn['id']).'/all-price/'.bed_footer(0).'/'.collection_footer($acn['id']).'/all-sort.html" >'.$acn['name'].' Villas '.$abn['name'].' '.destination_name(0).'</a></li>';
					if(!in_array($alink,$arr_link_12))
					{
						//$alink = '<li class="diy"><a class="tb" href="/search-rent/'.destination_footer($abn['id']).'/'.beach_footer($abn['id']).'/all-price/'.bed_footer(0).'/'.collection_footer($acn['id']).'/all-sort.html" >'.$acn['name'].' '.$abn['name'].' Villas, '.destination_name(0).'</a></li>';
						array_push($arr_link_12,$alink);
						$xx12++;
					}
				}
			}
			else
			{
				if(check_links_footer($abn['parent'],$abn['id'],0,$acn['id'])==true)
				{
					$alink = '<li class=""><a class="tb" href="/search-rent/'.destination_footer($abn['parent']).'/'.beach_footer($abn['id']).'/all-price/'.bed_footer(0).'/'.collection_footer($acn['id']).'/all-sort.html" >'.$acn['name'].' Villas '.$abn['name'].' '.destination_name($abn['parent']).'</a></li>';
					if(!in_array($alink,$arr_link_12))
					{
						//$alink = '<li class="diy"><a class="tb" href="/search-rent/'.destination_footer($abn['parent']).'/'.beach_footer($abn['id']).'/all-price/'.bed_footer(0).'/'.collection_footer($acn['id']).'/all-sort.html" >'.$acn['name'].' '.$abn['name'].' Villas, '.destination_name($abn['parent']).'</a></li>';
						array_push($arr_link_12,$alink);
						$xx12++;
					}
				}
			}
		}
	}
}

$alink = '<li class=""><a class="tb" href="/search-rent/'.destination_footer(38).'/'.beach_footer(0).'/all-price/'.bed_footer(0).'/'.collection_footer($_REQUEST['cate']).'/all-sort.html" >'.collection_footer_name($_REQUEST['cate']).' Villas '.destination_name(38).'</a></li>';
if(!in_array($alink,$arr_link_12))
{
	//$alink = '<li class="diy"><a class="tb" href="/search-rent/'.destination_footer(38).'/'.beach_footer(0).'/all-price/'.bed_footer(0).'/'.collection_footer($_REQUEST['cate']).'/all-sort.html" >'.collection_footer_name($_REQUEST['cate']).' '.destination_name(38).' Villas</a></li>';
	array_push($arr_link_12,$alink);
	$xx12++;
}

$alink = '<li class=""><a class="tb" href="/search-rent/'.destination_footer(39).'/'.beach_footer(0).'/all-price/'.bed_footer(0).'/'.collection_footer($_REQUEST['cate']).'/all-sort.html" >'.collection_footer_name($_REQUEST['cate']).' Villas '.destination_name(39).'</a></li>';
if(!in_array($alink,$arr_link_12))
{
	//$alink = '<li class="diy"><a class="tb" href="/search-rent/'.destination_footer(39).'/'.beach_footer(0).'/all-price/'.bed_footer(0).'/'.collection_footer($_REQUEST['cate']).'/all-sort.html" >'.collection_footer_name($_REQUEST['cate']).' '.destination_name(39).' Villas</a></li>';
	array_push($arr_link_12,$alink);
	$xx12++;
}





foreach($arr_bed as $abed)
{
	if(check_links_footer(0,0,$abed['id'],0)==true)
	{
		$alink = '<li class=""><a class="tb" href="/search-rent/thailand/'.beach_footer(0).'/all-price/'.bed_footer($abed['id']).'/all-collections/all-sort.html" >'.$abed['name'].' Villas Thailand</a></li>';
		
		if(!in_array($alink,$arr_link_12))
		{
			array_push($arr_link_12,$alink);
			$xx12++;
		}	
	}
	
	
	//array_push($arr_link_12,$alink);
	//array_push($repeat_2,$blink);
	
}

	$alink = '<li class=""><a class="tb" href="/search-rent/thailand/'.beach_footer(0).'/all-price/'.bed_footer(0).'/all-collections/all-sort.html" >Thailand Villas</a></li>';

	if(!in_array($alink,$arr_link_12))
	{
		array_push($arr_link_12,$alink);
		$xx12++;
	}
	
	//array_push($arr_link_12,$alink);
	//array_push($repeat_2,$blink);
	

//if($_REQUEST['pri']=='2') //<1000
//{
//	/*$alink = '<li class=""><a class="tb" href="/search-rent/thailand/all-beach/under-usd-1000/all-bedrooms/all-collections/all-sort.html" >< 1000USD Villas, Thailand </a></li>';
//	array_push($arr_link_12,$alink);
//	$xx12++;*/
//}
//elseif($_REQUEST['pri']=='3') // >1000
//{
//	/*$alink = '<li class=""><a class="tb" href="/search-rent/thailand/all-beach/over-usd-1000/all-bedrooms/all-collections/all-sort.html" > > 1000USD Villas, Thailand</a></li>';
//	array_push($arr_link_12,$alink);
//	$xx12++;*/
//}
//else
//{
//	/*$alink = '<li class=""><a class="tb" href="/search-rent/thailand/all-beach/over-usd-1000/all-bedrooms/all-collections/all-sort.html" >> 1000USD Villas, Thailand </a></li>';
//	array_push($arr_link_12,$alink);
//	array_push($repeat_2,$alink);
//	$xx12++;
//	$alink = '<li class=""><a class="tb" href="/search-rent/thailand/all-beach/under-usd-1000/all-bedrooms/all-collections/all-sort.html" >< 1000USD Villas, Thailand </a></li>';
//	array_push($arr_link_12,$alink);
//	array_push($repeat_2,$alink);
//	$xx12++;*/
//}
//


?>