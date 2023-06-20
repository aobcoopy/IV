<?php
	$Room='';
	
	//echo '**************'.$_REQUEST['room'];
	//echo '<pre>'.$_REQUEST['room'].'</pre>';
	if(isset($_REQUEST['room']))
	{
		
		//$ex_room = explode("-",$_REQUEST['room']);
		if($_REQUEST['room']!='null')
		{
			/*$br = $dbc->GetRecord("bedroom","*","id= '".$_REQUEST['room']."' status > 0 ");
			$room = $br['id'];*/
			if($_REQUEST['room']=='all')
			{
				$Room="";
			}
			/*elseif($_REQUEST['room']=='more')
			{
				$Room="AND actualbed > 10 ";
			}*/
			else
			{
				$arr_room = array();
				$sql_room = $dbc->Query("select * from property_room where room = '".$_REQUEST['room']."' ");
				while($r_room = $dbc->Fetch($sql_room))
				{
					//echo '******'.$cate_r['property'];
					if($dbc->HasRecord("properties","id= '".$r_room['property']."' AND status > 0"))
					{
						array_push($arr_room,$r_room['property']);
					}
					
				}
		
				/*switch($_REQUEST['room'])
				{
					case "1" :
						$Room="AND actualbed BETWEEN 1 AND 4 ";
					break;
					case "2" :
						$Room="AND actualbed BETWEEN 5 AND 7 ";
					break;
					case "3" :
						$Room="AND actualbed BETWEEN 8 AND 10 ";
					break;
					case "4" :
						$Room="AND actualbed > 10 ";
					break;
					default:
						$Room="";
				}*/
				//$Room="AND actualbed BETWEEN ".$ex_room[0]." AND ".$ex_room[1]." ";
			}
		}
		else
		{
			$Room="";
		}
	}
	else
	{
		$Room="";
	}
	
	/*echo '<pre>';
		print_r($arr_room);
	echo '</pre>';*/
?>