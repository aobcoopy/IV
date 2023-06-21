<!--<div class="col-md-3 col-sm-6 col-xs-12">
            	 <ul class="menulinkfooter tb">-->
				 <?php
$parent = "parent IS NOT NULL";
$cate = "";
//-- get beach name

$s_sql = $dbc->Query("select * from destinations where ".$parent." and status > 0");
while($line = $dbc->Fetch($s_sql))
{
	$bea_name = explode(",",$line['name']);
	$arr_beach_name_1[] = array(
		'id'=> $line['id'],
		'name'=> $bea_name[0],
		'parent'=> $line['parent']
	);
}
//-- get beach name

//-- get collection name
$c_sql = $dbc->Query("select * from categories where ".$cate." status > 0");
while($line_c = $dbc->Fetch($c_sql))
{
	$col_name = explode(" V",$line_c['name']);
	$arr_coll_name_2[] = array(
		'id'=> $line_c['id'],
		'name'=> $col_name[0]
	);
}
//-- get collection name



//$repeat_2 = array();


foreach($arr_beach_name_1 as $abn)
{
	foreach($arr_bed as $abed)
	{
		if($_REQUEST['room']==$abed['id'])
		{
			if($abn['parent']=='')
			{
				if(check_links_footer(0,0,$abed['id'],0)==true)
				{}
					$alink = '<li class=""><a class="tb" href="/search-rent/'.destination_footer($abn['id']).'/'.beach_footer($abn['id']).'/all-price/'.bed_footer($abed['id']).'/all-collections/all-sort.html" >'.$abed['name'].' Villas '.$abn['name'].' '.destination_name(0).'</a></li>';
					if(!in_array($alink,$arr_link_2))
					{
						//$alink = '<li class="diy"><a class="tb" href="/search-rent/'.destination_footer($abn['id']).'/'.beach_footer($abn['id']).'/all-price/'.bed_footer($abed['id']).'/all-collections/all-sort.html" >'.$abed['name'].' '.$abn['name'].' Villas, '.destination_name(0).'</a></li>';
						array_push($arr_link_2,$alink);
						$xx2++;
					}
				//}
			}
			else
			{
				if(check_links_footer($abn['parent'],$abn['id'],$abed['id'],0)==true)
				{
					$alink = '<li class=""><a class="tb" href="/search-rent/'.destination_footer($abn['parent']).'/'.beach_footer($abn['id']).'/all-price/'.bed_footer($abed['id']).'/all-collections/all-sort.html" >'.$abed['name'].' Villas '.$abn['name'].' '.destination_name($abn['parent']).'</a></li>';
					if(!in_array($alink,$arr_link_2))
					{
						//$alink = '<li class="diy"><a class="tb" href="/search-rent/'.destination_footer($abn['parent']).'/'.beach_footer($abn['id']).'/all-price/'.bed_footer($abed['id']).'/all-collections/all-sort.html" >'.$abed['name'].' '.$abn['name'].' Villas, '.destination_name($abn['parent']).'</a></li>';
						array_push($arr_link_2,$alink);
						$xx2++;
					}
				}
			}
		}
	}
}




foreach($arr_coll_name_2 as $acn)
{
	$alink = '<li class=""><a class="tb" href="/search-rent/thailand/'.beach_footer(0).'/all-price/all-bedrooms/'.collection_footer($acn['id']).'/all-sort.html" >'.$acn['name'].' Villas Thailand</a></li>';
	
	if(!in_array($alink,$arr_link_2))
	{
		//$alink = '<li class="diy"><a class="tb" href="/search-rent/thailand/'.beach_footer(0).'/all-price/all-bedrooms/'.collection_footer($acn['id']).'/all-sort.html" >'.$acn['name'].' Thailand Villas</a></li>';
		array_push($arr_link_2,$alink);
		$xx2++;
	}
}

foreach($arr_bed as $abed)
{
	if($_REQUEST['room']!=$abed['id'])
	{
		$alink = '<li class=""><a class="tb" href="/search-rent/thailand/'.beach_footer(0).'/all-price/'.bed_footer($abed['id']).'/'.collection_footer(0).'/all-sort.html" >'.$abed['name'].' Villas Thailand</a></li>';

		if(!in_array($alink,$arr_link_2))
		{
			//$alink = '<li class="diy"><a class="tb" href="/search-rent/thailand/'.beach_footer(0).'/all-price/'.bed_footer($abed['id']).'/'.collection_footer($acn['id']).'/all-sort.html" >'.$abed['name'].' '.$acn['name'].' Thailand Villas</a></li>';
			array_push($arr_link_2,$alink);
			$xx2++;
		}	
	}
	
}
	
/*foreach($arr_coll_name as $acn)
{
	foreach($arr_bed as $abed)
	{
		if($_REQUEST['room']==$abed['id'])
		{}
		$alink = '<li class=""><a class="tb" href="/search-rent/thailand/'.beach_footer($abn['id']).'/all-price/'.bed_footer($abed['id']).'/'.collection_footer($acn['id']).'/all-sort.html" >'.$abed['name'].' '.$acn['name'].' Thailand Villas</a></li>';
	
		if(!in_array($alink,$arr_link_2))
		{
			//$alink = '<li class="diy"><a class="tb" href="/search-rent/thailand/'.beach_footer($abn['id']).'/all-price/'.bed_footer($abed['id']).'/'.collection_footer($acn['id']).'/all-sort.html" >'.$abed['name'].' '.$acn['name'].' Thailand Villas</a></li>';
			array_push($arr_link_2,$alink);
			$xx2++;
		}
		//array_push($arr_link_2,$alink);
		//array_push($repeat_2,$blink);
		
	}
}
*/
foreach($arr_bed as $abed)
{
	if($_REQUEST['room']==$abed['id'])
	{
		$alink = '<li class=""><a class="tb" href="/search-rent/thailand/'.beach_footer(0).'/all-price/'.bed_footer($abed['id']).'/all-collections/all-sort.html" >'.$abed['name'].' Thailand Villas</a></li>';
		
		if(!in_array($alink,$arr_link_2))
		{
			array_push($arr_link_2,$alink);
			$xx2++;
		}
		
		$alink = '<li class=""><a class="tb" href="/search-rent/'.destination_footer(38).'/'.beach_footer(0).'/all-price/'.bed_footer($abed['id']).'/all-collections/all-sort.html" >'.$abed['name'].' '.destination_name(38).' Villas</a></li>';
		
		if(!in_array($alink,$arr_link_2))
		{
			//$alink = '<li class="diy"><a class="tb" href="/search-rent/'.destination_footer(38).'/'.beach_footer($abn['id']).'/all-price/'.bed_footer($abed['id']).'/all-collections/all-sort.html" >'.$abed['name'].' '.destination_name(38).' Villas</a></li>';
			array_push($arr_link_2,$alink);
			$xx2++;
		}
		
		
		$alink = '<li class=""><a class="tb" href="/search-rent/'.destination_footer(39).'/'.beach_footer(0).'/all-price/'.bed_footer($abed['id']).'/all-collections/all-sort.html" >'.$abed['name'].' '.destination_name(39).' Villas</a></li>';
		
		if(!in_array($alink,$arr_link_2))
		{
			//$alink = '<li class="diy"><a class="tb" href="/search-rent/'.destination_footer(39).'/'.beach_footer($abn['id']).'/all-price/'.bed_footer($abed['id']).'/all-collections/all-sort.html" >'.$abed['name'].' '.destination_name(38).' Villas</a></li>';
			array_push($arr_link_2,$alink);
			$xx2++;
		}
	}	
	
}

	$alink = '<li class=""><a class="tb" href="/search-rent/thailand/'.beach_footer(0).'/all-price/'.bed_footer(0).'/all-collections/all-sort.html" >Thailand Villas</a></li>';
		
	if(!in_array($alink,$arr_link_2))
	{
		array_push($arr_link_2,$alink);
		$xx2++;
	}
	
	
	
?>