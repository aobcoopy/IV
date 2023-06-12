<?php
	session_start();
	include_once "../../../config/define.php";
	include_once "../../../libs/class/db.php";
	
	@ini_set('display_errors',DEBUG_MODE?1:0);
	date_default_timezone_set(DEFAULT_TIMEZONE);
	
	$dbc = new dbc;
	$dbc->Connect();


	$aColumns = array(
		'vfmp.id',
		'p.name',
		//'vfmp.dear_name',
		'vfmp.cus_name',
		'vfmp.invoice',
		'vfmp.links',
		'vfmp.created',
		'vfmp.id',
		'p.id',
		'vfmp.links',
		'vfmp.links'//villaform_id
	);
	$sIndexColumn = "vfmp.id";
	
	$sTable = "villa_form_mapping AS vfmp 
	LEFT JOIN properties AS p ON vfmp.villa = p.id";
	$sLimit = "";
	
	if ( isset( $_REQUEST['start'] ) && $_REQUEST['length'] != '-1' ){
		$sLimit = "LIMIT ".$dbc->Escape_String( $_REQUEST['start'] ).", ".
		$dbc->Escape_String( $_REQUEST['length'] );
	}

	if ( isset( $_REQUEST['order'] ) ){
		$sOrder = "ORDER BY  ";
		for ( $i=0 ; $i<count( $_REQUEST['order'] ) ; $i++ ){
			if($_REQUEST['columns'][intval($_REQUEST['order'][$i]['column'])]['orderable']=="true"){
				
				$sOrder .= $aColumns[ intval( $_REQUEST['order'][$i]['column'] ) ]."
				 	".$dbc->Escape_String( $_REQUEST['order'][$i]['dir'] ) .", ";
			}
		}
		
		$sOrder = substr_replace( $sOrder, "", -2 );
		if ( $sOrder == "ORDER BY" ){
			$sOrder = "";
		}
	}
	$sOrder = " ORDER BY vfmp.id DESC";


	$sWhere = "";
	if ( $_REQUEST['search']['value'] != "" ){
		$sWhere = "WHERE vfmp.status >=0 AND (";//---------where option
		for ( $i=0 ; $i<count($aColumns) ; $i++ ){
			$sWhere .= $aColumns[$i]." LIKE '%".$dbc->Escape_String( $_REQUEST['search']['value'] )."%' OR ";
		}
		$sWhere = substr_replace( $sWhere, "", -3 );
		$sWhere .= ')';
	}
	else
	{
		$sWhere .="WHERE vfmp.status >=0 ";//---------where option
	}
	
	
	
	
	if ( isset($_REQUEST['filter'])){
		if ( $sWhere == "" ){
			$sWhere = "WHERE ";
		}else{
			$sWhere .= " AND ";
		}
		$sWhere .= $_REQUEST['filter']." ";
	}
	
	$sQuery = "
		SELECT SQL_CALC_FOUND_ROWS ".str_replace(" , ", " ", implode(", ", $aColumns))."
		FROM   $sTable
		$sWhere
		$sOrder
		$sLimit
	";
	
	$rResult = $dbc->Query($sQuery) or die(mysql_error());
	
	/* Data set length after filtering */
	$sQuery = "
		SELECT FOUND_ROWS()
	";
	$rResultFilterTotal = $dbc->Query( $sQuery) or die(mysql_error());
	$aResultFilterTotal = $dbc->Fetch($rResultFilterTotal);
	$iFilteredTotal = $aResultFilterTotal[0];
	
	/* Total data set length */
	$sQuery = "
		SELECT COUNT(".$sIndexColumn.")
		FROM   $sTable
	";
	$rResultTotal = $dbc->Query( $sQuery)  or die(mysql_error());
	$aResultTotal = $dbc->Fetch($rResultTotal);
	$iTotal = $aResultTotal[0];
	
	
	/*
	 * Output
	 */
	$output = array(
		"iTotalRecords" => $iTotal,
		"iTotalDisplayRecords" => $iFilteredTotal,
		"aaData" => array()
	);
	
	while ( $aRow = $dbc->Fetch( $rResult ) ){
		$row = array();
		for ( $i=0 ; $i<count($aColumns) ; $i++ ){
			if($i==5)
			{
				$y = substr($aRow[$i],0,4);
				$m = substr($aRow[$i],5,2);
				$d = substr($aRow[$i],8,2);
				$t = substr($aRow[$i],10,10);
				switch($m)
				{
					case'01': $mm = 'Jan';break;
					case'02': $mm =  'Feb';break;
					case'03': $mm =  'Mar';break;
					case'04': $mm =  'Apr';break;
					case'05': $mm =  'May';break;
					case'06': $mm =  'Jun';break;
					case'07': $mm =  'Jul';break;
					case'08': $mm =  'Aug';break;
					case'09': $mm =  'Sep';break;
					case'10': $mm =  'Oct';break;
					case'11': $mm =  'Nov';break;
					case'12': $mm =  'Dec';break;
				}
				$row[] = $d.' / '.$mm.' / '.$y.' - '.$t;
			}
			elseif($i==4)
			{
				$link = $aRow[$i];
				$actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]";
				$f_link = $actual_link.'/villaform-customer-'.$link.'.html';
				$row[] = '<a href="'.$f_link.'" >'.$f_link.'</a>' ;//target="_blank"
			}
			elseif($i==9)
			{
				$link = $aRow[$i];
				$actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]";
				$f_link = $actual_link.'/villaform-customer-'.$link.'.html';
				$row[] = $f_link;
			}
			else
			{
				$row[] = $aRow[$i];
			}
			
			if($i==0)$row["DT_RowId"] = $aRow[$i];
			
		}
		$output['aaData'][] = $row;
	}
	
	echo json_encode( $output );
	
	$dbc->Close();

?>





