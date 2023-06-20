<!--<div class="col-md-3 col-sm-6 col-xs-12">
<ul class="menulinkfooter tb">-->
<?php
$parent = "parent ='".$_REQUEST['des']."' ";
$cate_re = "id = '".$_REQUEST['cate']."' and";
					 
//$parent = "parent ='".$_REQUEST['des']."' ";
//$cate_re = "";//"id = '".$_REQUEST['cate']."' and";//
//-- get beach name

$s_sql = $dbc->Query("select * from destinations where ".$parent." and status > 0");
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



foreach($arr_coll_name_re as $acn)
{
	$alink = '<li class=""><a class="tb" href="/search-rent/'.destination_footer($destination).'/'.beach_footer($abn['id']).'/all-price/all-bedrooms/'.collection_footer($acn['id']).'/all-sort.html" >'.$acn['name'].' '.destination_name($destination).' Villas</a></li>';
	if(!in_array($alink,$arr_link_9))
	{
		array_push($arr_link_9,$alink);
		$xx9++;
	}
}

foreach($arr_coll_name_re as $acn)
{
	foreach($arr_bed as $abed)
	{
		$alink = '<li class=""><a class="tb" href="/search-rent/'.destination_footer($destination).'/'.beach_footer($abn['id']).'/all-price/'.bed_footer($abed['id']).'/'.collection_footer($acn['id']).'/all-sort.html" >'.$abed['name'].' '.$acn['name'].' '.destination_name($destination).' Villas</a></li>';//'.$acn['name'].' 
		if(!in_array($alink,$arr_link_9))
		{
			array_push($arr_link_9,$alink);
			$xx9++;
		}
	}
}

foreach($arr_bed as $abed)
{
	$alink = '<li class=""><a class="tb" href="/search-rent/'.destination_footer($destination).'/'.beach_footer($abn['id']).'/all-price/'.bed_footer($abed['id']).'/all-collections/all-sort.html" >'.$abed['name'].' '.destination_name($destination).' Villas</a></li>';
	if(!in_array($alink,$arr_link_9))
	{
		array_push($arr_link_9,$alink);
		$xx9++;
	}
}

$alink = '<li class=""><a class="tb" href="/search-rent/'.destination_footer($destination).'/'.beach_footer(0).'/all-price/all-bedrooms/'.collection_footer(0).'/all-sort.html" >'.destination_name($destination).' Villas</a></li>';
if(!in_array($alink,$arr_link_9))
	{
		array_push($arr_link_9,$alink);
		$xx9++;
	}


				
				
				


?>