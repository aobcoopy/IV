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
	$arr_beach_name_11[] = array(
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

//-- get collection name
$c_sql_11 = $dbc->Query("select * from categories where  status > 0");
while($line_c_11 = $dbc->Fetch($c_sql_11))
{
	$col_name_11 = explode(" V",$line_c_11['name']);
	$arr_coll_name_11[] = array(
		'id'=> $line_c_11['id'],
		'name'=> $col_name_11[0]
	);
}
//-- get collection name


//$repeat_2 = array();



foreach($arr_coll_name_re as $acn)
{
	if(check_links_footer(0,0,0,$acn['id'])==true)
	{
		$alink = '<li class=""><a class="tb" href="/search-rent/thailand/'.beach_footer(0).'/all-price/all-bedrooms/'.collection_footer($acn['id']).'/all-sort.html" >'.$acn['name'].' Villas Thailand</a></li>';
		
		if(!in_array($alink,$arr_link_11))
		{
			array_push($arr_link_11,$alink);
			$xx11++;
		}
	}
}

/*foreach($arr_coll_name_re as $acn)
{
	foreach($arr_bed as $abed)
	{
		$alink = '<li class=""><a class="tb" href="/search-rent/thailand/'.beach_footer($abn['id']).'/all-price/'.bed_footer($abed['id']).'/'.collection_footer($acn['id']).'/all-sort.html" >'.$abed['name'].' '.$acn['name'].' Thailand Villas</a></li>';
	
		if(!in_array($alink,$arr_link_11))
		{
			array_push($arr_link_11,$alink);
			$xx11++;
		}
		//array_push($arr_link_11,$alink);
		//array_push($repeat_2,$blink);
		
	}
}*/


//foreach($arr_beach_name_11 as $abn)
//{
//	foreach($arr_bed as $abed)
//	{
//		if($_REQUEST['room']==$abed['id'])
//		{
//			if(check_links_footer($abn['parent'],$abn['id'],$abed['id'],$_REQUEST['cate'])==true)
//			{
//				/*if($_REQUEST['cate']!=5)
//				{*/
//					$alink = '<li class="diy"><a class="tb" href="/search-rent/'.destination_footer($abn['parent']).'/'.beach_footer($abn['id']).'/all-price/'.bed_footer($abed['id']).'/'.collection_footer($_REQUEST['cate']).'/all-sort.html" >'.$abed['name'].' '.collection_footer_name($_REQUEST['cate']).' Villas '.$abn['name'].' '.destination_name($abn['parent']).'</a></li>';
//					if(!in_array($alink,$arr_link_11))
//					{
//						//$alink = '<li class="diy"><a class="tb" href="/search-rent/'.destination_footer($abn['parent']).'/'.beach_footer($abn['id']).'/all-price/'.bed_footer($abed['id']).'/'.collection_footer($_REQUEST['cate']).'/all-sort.html" >'.$abed['name'].' '.collection_footer_name($_REQUEST['cate']).' '.$abn['name'].' Villas, '.destination_name($abn['parent']).'</a></li>';
//						array_push($arr_link_11,$alink);
//						$xx11++;
//					}
//				/*}*/
//			}
//			
//		}
//	}
//}







foreach($arr_bed as $abed)
{
	if(check_links_footer(0,0,$abed['id'],0)==true)
	{
		$alink = '<li class=""><a class="tb" href="/search-rent/thailand/'.beach_footer(0).'/all-price/'.bed_footer($abed['id']).'/all-collections/all-sort.html" >'.$abed['name'].' Villas Thailand</a></li>';
		
		if(!in_array($alink,$arr_link_11))
		{
			array_push($arr_link_11,$alink);
			$xx11++;
		}	
	}
	
	
	//array_push($arr_link_11,$alink);
	//array_push($repeat_2,$blink);
	
}

	$alink = '<li class=""><a class="tb" href="/search-rent/thailand/'.beach_footer(0).'/all-price/'.bed_footer(0).'/all-collections/all-sort.html" >Thailand Villas</a></li>';

	if(!in_array($alink,$arr_link_11))
	{
		array_push($arr_link_11,$alink);
		$xx11++;
	}
	
	//array_push($arr_link_11,$alink);
	//array_push($repeat_2,$blink);
	
if($_REQUEST['des']=='all')
{
	$alink = '<li class=""><a class="tb" href="/search-rent/'.destination_footer(38).'/'.beach_footer(0).'/all-price/'.bed_footer(0).'/'.collection_footer($_REQUEST['cate']).'/all-sort.html" >'.collection_footer_name($_REQUEST['cate']).' Villas '.destination_name(38).'</a></li>';
	if(!in_array($alink,$arr_link_11))
	{
		//$alink = '<li class="diy"><a class="tb" href="/search-rent/'.destination_footer(38).'/'.beach_footer(0).'/all-price/'.bed_footer(0).'/'.collection_footer($_REQUEST['cate']).'/all-sort.html" >'.collection_footer_name($_REQUEST['cate']).' '.destination_name(38).' Villas</a></li>';
		array_push($arr_link_11,$alink);
		$xx11++;
	}
	
	$alink = '<li class=""><a class="tb" href="/search-rent/'.destination_footer(39).'/'.beach_footer(0).'/all-price/'.bed_footer(0).'/'.collection_footer($_REQUEST['cate']).'/all-sort.html" >'.collection_footer_name($_REQUEST['cate']).' Villas '.destination_name(39).'</a></li>';
	if(!in_array($alink,$arr_link_11))
	{
		//$alink = '<li class="diy"><a class="tb" href="/search-rent/'.destination_footer(39).'/'.beach_footer(0).'/all-price/'.bed_footer(0).'/'.collection_footer($_REQUEST['cate']).'/all-sort.html" >'.collection_footer_name($_REQUEST['cate']).' '.destination_name(39).' Villas</a></li>';
		array_push($arr_link_11,$alink);
		$xx11++;
	}

}
else
{
	$alink = '<li class=""><a class="tb" href="/search-rent/'.destination_footer($_REQUEST['des']).'/'.beach_footer(0).'/all-price/'.bed_footer(0).'/'.collection_footer($_REQUEST['cate']).'/all-sort.html" >'.collection_footer_name($_REQUEST['cate']).' Villas '.destination_name($_REQUEST['des']).'</a></li>';
	if(!in_array($alink,$arr_link_11))
	{
		$alink = '<li class=""><a class="tb" href="/search-rent/'.destination_footer($_REQUEST['des']).'/'.beach_footer(0).'/all-price/'.bed_footer(0).'/'.collection_footer($_REQUEST['cate']).'/all-sort.html" >'.collection_footer_name($_REQUEST['cate']).' Villas '.destination_name($_REQUEST['des']).'</a></li>';
		array_push($arr_link_11,$alink);
		$xx11++;
	}
}


foreach($arr_coll_name_11 as $acn_11)
{
	if($acn_11['id']!=5)
	{
		if(check_links_footer(38,0,$_REQUEST['room'],$acn_11['id'])==true)
		{
			$alink = '<li class=""><a class="tb" href="/search-rent/'.destination_footer(38).'/'.beach_footer(0).'/all-price/'.bed_footer($_REQUEST['room']).'/'.collection_footer($acn_11['id']).'/all-sort.html" >'.bed_footer_name($_REQUEST['room']).' '.collection_footer_name($acn_11['id']).' Villas '.destination_name(38).'</a></li>';
		
			if(!in_array($alink,$arr_link_11))
			{
				array_push($arr_link_11,$alink);
				$xx11++;
			}	
		}
	}
	
	
	if($acn_11['id']!=5)
	{
		if(check_links_footer(39,0,$_REQUEST['room'],$acn_11['id'])==true)
		{
			$alink = '<li class=""><a class="tb" href="/search-rent/'.destination_footer(39).'/'.beach_footer(0).'/all-price/'.bed_footer($_REQUEST['room']).'/'.collection_footer($acn_11['id']).'/all-sort.html" >'.bed_footer_name($_REQUEST['room']).' '.collection_footer_name($acn_11['id']).' Villas '.destination_name(39).'</a></li>';
		
			if(!in_array($alink,$arr_link_11))
			{
				array_push($arr_link_11,$alink);
				$xx11++;
			}
		}
	}
	
}


foreach($arr_beach_name_11 as $abn)
{
	foreach($arr_coll_name_11 as $acn)
	{
		if($acn['id']==$_REQUEST['cate'])
		{
			if(check_links_footer($abn['parent'],$abn['id'],0,$acn['id'])==true)
			{
				$alink = '<li class=""><a class="tb" href="/search-rent/'.destination_footer($abn['parent']).'/'.beach_footer($abn['id']).'/all-price/all-bedrooms/'.collection_footer($acn['id']).'/all-sort.html" >'.$acn['name'].' Villas '.$abn['name'].' '.destination_name($abn['parent']).'</a></li>';
				if(!in_array($alink,$arr_link_11))
				{
					array_push($arr_link_11,$alink);
					$xx11++;
				}
			}
		}
	}
}

?>