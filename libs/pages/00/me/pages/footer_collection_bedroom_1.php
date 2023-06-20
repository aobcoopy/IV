<?php
$parent_1 = "";//"parent ='".$_REQUEST['des']."' ";
$cate_1 = "";
	
	//-- get beach name

$s_sql = $dbc->Query("select * from destinations where ".$parent_1."  status > 0");
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
$c_sql = $dbc->Query("select * from categories where ".$cate_1." status > 0");
while($line_c = $dbc->Fetch($c_sql))
{
	$col_name = explode(" V",$line_c['name']);
	$arr_coll_name_1[] = array(
		'id'=> $line_c['id'],
		'name'=> $col_name[0]
	);
}
//-- get collection name


//$noBed = array('0','1-4','5-7','8-10','>10');
$noBed = array('0','2,3,4','5,6,7','8,9,10>');
for($ii=1;$ii<=3;$ii++)
{
	$arr_bed_1[] = array(
		'id' => $ii,
		'name' => $noBed[$ii].' bedrooms'
	);
}

//print_r($arr_beach_name_1);

foreach($arr_beach_name_1 as $abn)
{
	if($abn['parent']=='')
	{
		if(check_links_footer(0,0,0,0)==true)
		{
			$alink = '<li class=""><a class="tb" href="/search-rent/'.destination_footer($abn['id']).'/'.beach_footer($abn['id']).'/all-price/all-bedrooms/all-collections/all-sort.html" >'.$abn['name'].' Villas '.destination_name(0).'</a></li>';
			array_push($arr_link,$alink);
			$xx1++;
		}
	}
	else
	{
		if(check_links_footer(0,$abn['id'],0,0)==true)
		{
			$alink = '<li class=""><a class="tb" href="/search-rent/'.destination_footer($abn['parent']).'/'.beach_footer($abn['id']).'/all-price/all-bedrooms/all-collections/all-sort.html" >'.$abn['name'].' Villas '.destination_name($abn['parent']).'</a></li>';
			array_push($arr_link,$alink);
			$xx1++;
		}
	}
	
	

}



/*$alink = '<li class=""><a class="tb" href="/search-rent/'.destination_footer($destination).'/'.beach_footer(0).'/all-price/all-bedrooms/'.collection_footer(0).'/all-sort.html" >'.destination_name($destination).' Villas****</a></li>';
array_push($arr_link,$alink);
$xx1++;*/





?>