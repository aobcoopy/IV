<div class=" mg-contact-form-input rates_box top20">
	<?php
    function months($data)
    {
        $y = substr($data,0,4);
        $m = substr($data,5,2);
        $d = substr($data,8,2);
        switch($m)
        {
            case'01':  $month = 'Jan';break;
            case'02':  $month = 'Feb';break;
            case'03':  $month = 'Mar';break;
            case'04':  $month = 'Apr';break;
            case'05':  $month = 'May';break;
            case'06':  $month = 'Jun';break;
            case'07':  $month = 'Jul';break;
            case'08':  $month = 'Aug';break;
            case'09':  $month = 'Sep';break;
            case'10':  $month = 'Oct';break;
            case'11':  $month = 'Nov';break;
            case'12':  $month = 'Dec';break;
        }
        return  $d.'-'.$month .'-'.$y;
    }
    if($dbc->HasRecord("pricing","property=".$_REQUEST['id']))
    {
        $pri = $dbc->GetRecord("pricing","*","property=".$_REQUEST['id']);
    }
        ?>
</div>

<?php 
	$opt = array();
	$aa=0;
		if($dbc->HasRecord("pricing","property=".$_REQUEST['id']))
		{
			//$prop = $dbc->GetRecord("pricing","*","property=".$_REQUEST['id']);
			$sqlprop = $dbc->Query("select * from pricing where property=".$_REQUEST['id']);
			$prop = $dbc->Fetch($sqlprop);
			$data = json_decode($prop['val'],true);
			$stay = json_decode($prop['stay'],true);
			foreach($data as $valu)
			{
				for($i=1;$i<=28;$i++)
				{
					if($valu['val'.$i]!='')
					{
						//echo "8";
						if($aa==0)
						{
							array_push($opt,$i);
						}
					}
				}
				$aa++;
			}
		}
		
		/*echo '<pre>';
		print_r ($opt);
		echo '</pre>';*/
?>
<div class="table-responsives">
    <div id="rental_rate" class="col-md-12 mg-room-fecilities rental_rate" style="margin-top: 8px;"> <h4 class="mg-sec-left-title l15"><?php echo $vi_name[0];?> Rental  Rate</h4></div>
 <?php
$ii=0;
$va = 0;
//print_r($opt);
foreach($opt as $op)
{
	if($ii==0)
	{
		 $va = $op;
		 echo '<button class="tabbut acct fo15" onClick="show_price('.$op.',this)">'.$op.' Bedroom</button>';//<option value="'.$op.'" class="first">'.$op.' Bedroom</option>
	}
	else
	{
		if($op==27)
		{
			$op_name='Weekend';
		}
		elseif($op==28)
		{
			$op_name='Weekday';
		}
		else
		{
			$op_name = $op.' Bedrooms';
		}
		 echo '<button class="tabbut fo15" onClick="show_price('.$op.',this)">'.$op_name.'</button>';//<option value="'.$op.'">'.$op.' Bedroom</option>
	}
   $ii++;
}
?>

<table id="tb" class="tb table table-bordered table-striped fo15" width="100%" border="1">
    <thead>
        <tr>
            <th>Period Dates</th>
            <th class="text-center weeb" align="center">Min Night Stay</th>
            <?php
			for($z=1;$z<=28;$z++)
			{
				echo '<th class="t'.$z.' tbp text-center" align="center"> Price Per Night (USD)</th>';
			}
			?>
           <?php /*?> <th class="t1 tbp text-center" align="center"> Price Per Night (USD)</th>
            <th class="t2 tbp text-center" align="center"> Price Per Night (USD)</th>
            <th class="t3 tbp text-center" align="center"> Price Per Night (USD)</th>
            <th class="t4 tbp text-center" align="center"> Price Per Night (USD)</th>
            <th class="t5 tbp text-center" align="center"> Price Per Night (USD)</th>
            <th class="t6 tbp text-center" align="center"> Price Per Night (USD)</th>
            <th class="t7 tbp text-center" align="center"> Price Per Night (USD)</th>
            <th class="t8 tbp text-center" align="center"> Price Per Night (USD)</th>
            <th class="t9 tbp text-center" align="center"> Price Per Night (USD)</th>
            <th class="t10 tbp text-center" align="center"> Price Per Night (USD)</th>
            <th class="t11 tbp text-center" align="center"> Price Per Night (USD)</th><?php */?>
        </tr>
    </thead>
    <tbody>
    <?php 
    if($dbc->HasRecord("pricing","property=".$_REQUEST['id']))
    {
        //$properties = $dbc->GetRecord("pricing","*","property=".$_REQUEST['id']);
        $sqlproperties = $dbc->Query("select * from pricing where property=".$_REQUEST['id']);
        $properties = $dbc->Fetch($sqlproperties);
        $data = json_decode($properties['val'],true);
		/*
		//echo '<pre>';
		$new_data = array();
		//$ii=1;
		foreach($data as $valuu)
        {
			$nd = array(
				"date1" => $valuu['date1'],
				"date2" => $valuu['date2'],
				"night" => $valuu['night'],
				"val1" => str_replace("+","",$valuu['val1']),
				"val2" => str_replace("+","",$valuu['val2']),
				"val3" => str_replace("+","",$valuu['val3']),
				"val4" => str_replace("+","",$valuu['val4']),
				"val5" => str_replace("+","",$valuu['val5']),
				"val6" => str_replace("+","",$valuu['val6']),
				"val7" => str_replace("+","",$valuu['val7']),
				"val8" => str_replace("+","",$valuu['val8']),
				"val9" => str_replace("+","",$valuu['val9']),
				"val10" => str_replace("+","",$valuu['val10']),
				"val11" => str_replace("+","",$valuu['val11']),
				"val12" => str_replace("+","",$valuu['val12']),
				"val13" => str_replace("+","",$valuu['val13']),
				"val14" => str_replace("+","",$valuu['val14']),
				"val15" => str_replace("+","",$valuu['val15']),
				"val16" => str_replace("+","",$valuu['val16']),
				"val17" => str_replace("+","",$valuu['val17']),
				"val18" => str_replace("+","",$valuu['val18']),
				"val19" => str_replace("+","",$valuu['val19']),
				"val20" => str_replace("+","",$valuu['val20']),
				"val21" => str_replace("+","",$valuu['val21']),
				"val22" => str_replace("+","",$valuu['val22']),
				"val23" => str_replace("+","",$valuu['val23']),
				"val24" => str_replace("+","",$valuu['val24']),
				"val25" => str_replace("+","",$valuu['val25']),
				"val26" => str_replace("+","",$valuu['val26']),
				"val27" => str_replace("+","",$valuu['val27']),
				"val28" => str_replace("+","",$valuu['val28']),
			);
			array_push($new_data,$nd);
			$ii++;
		}
		
		$data = $new_data;

		foreach($opt as $op)
		{
			//echo '--'.$op;
			$keys = array_column($data, 'val'.$op);
    		array_multisort($keys, SORT_DESC, $data);
		}*/
		
        foreach($data as $valu)
        {
			
            echo '<tr>
                <td  class="fo15">'.months($valu['date1']).' - '.months($valu['date2']).'</td>';
                echo '<td class="text-center weeb fo15">'.$valu['night'].'</td>';
                /*echo '<td class="t1 tbp text-center">';echo ($valu['val1']!='')?number_format($valu['val1']).$ex1[1]:' 0 ';echo ' </td>';
                echo '<td class="t2 tbp text-center">';echo ($valu['val2']!='')?number_format($valu['val2']).$ex2[1]:' 0 ';echo ' </td>';
                echo '<td class="t3 tbp text-center">';echo ($valu['val3']!='')?number_format($valu['val3']).$ex3[1]:' 0 ';echo ' </td>';
                echo '<td class="t4 tbp text-center">';echo ($valu['val4']!='')?number_format($valu['val4']).$ex4[1]:' 0 ';echo ' </td>';
                echo '<td class="t5 tbp text-center">';echo ($valu['val5']!='')?number_format($valu['val5']).$ex5[1]:' 0 ';echo ' </td>';
                echo '<td class="t6 tbp text-center">';echo ($valu['val6']!='')?number_format($valu['val6']).$ex6[1]:' 0 ';echo ' </td>';
                echo '<td class="t7 tbp text-center">';echo ($valu['val7']!='')?number_format($valu['val7']).$ex7[1]:' 0 ';echo ' </td>';
                echo '<td class="t8 tbp text-center">';echo ($valu['val8']!='')?number_format($valu['val8']).$ex8[1]:' 0 ';echo ' </td>';
                echo '<td class="t9 tbp text-center">';echo ($valu['val9']!='')?number_format($valu['val9']).$ex9[1]:' 0 ';echo ' </td>';
                echo '<td class="t10 tbp text-center">';echo ($valu['val10']!='')?number_format($valu['val10']).$ex10[1]:' 0 ';echo ' </td>';
                echo '<td class="t11 tbp text-center">';echo ($valu['val11']!='')?number_format($valu['val11']).$ex11[1]:' 0 ';echo ' </td>';
				echo '<td class="t12 tbp text-center">';echo ($valu['val12']!='')?number_format($valu['val12']).$ex12[1]:' 0 ';echo ' </td>';
				echo '<td class="t13 tbp text-center">';echo ($valu['val13']!='')?number_format($valu['val13']).$ex13[1]:' 0 ';echo ' </td>';
				echo '<td class="t14 tbp text-center">';echo ($valu['val14']!='')?number_format($valu['val14']).$ex14[1]:' 0 ';echo ' </td>';
				echo '<td class="t15 tbp text-center">';echo ($valu['val15']!='')?number_format($valu['val15']).$ex15[1]:' 0 ';echo ' </td>';*/
				for($i=1;$i<=28;$i++)
				{
					if(strchr($valu['val'.$i],"++"))
					{
						$exs = explode("+",$valu['val'.$i]);
						echo '<td class="t'.$i.' tbp text-center fo15">';echo ($valu['val'.$i]!='')?number_format($valu['val'.$i]).'':' 0 ';echo ' </td>';
						//echo '<td class="t'.$i.' tbp text-center fo15">';echo ($valu['val'.$i]!='')?number_format($valu['val'.$i]).'++':' 0 ';echo ' </td>';
					}
					elseif(strchr($valu['val'.$i],"+"))
					{
						$exs = explode("+",$valu['val'.$i]);
						echo '<td class="t'.$i.' tbp text-center fo15">';echo ($valu['val'.$i]!='')?number_format($valu['val'.$i]).'':' 0 ';echo ' </td>';
						//echo '<td class="t'.$i.' tbp text-center fo15">';echo ($valu['val'.$i]!='')?number_format($valu['val'.$i]).'+':' 0 ';echo ' </td>';
					}
					else
					{
						$exs = explode("+",$valu['val'.$i]);
						echo '<td class="t'.$i.' tbp text-center fo15">';echo ($valu['val'.$i]!='')?number_format($valu['val'.$i]):' 0 ';echo ' </td>';
					}
				}
            echo '</tr>';
        }
    }
    
    ?>
    </tbody>
</table>

<?php
$service = json_decode($pri['service'],true);
$no = json_decode($pri['note'],true);

if( $pri['tax']!='' || $pri['vat']!='' || $pri['deposite']!='' || $service['deposit']!='' && $service['paid']!='' || $service['deposit_2']!='' || $pri['tax_1']!='' || $pri['tax_2']!='' || $pri['tax_3']!='' || $pri['tax_4']!='' || $pri['tax_5']!='' || count($no)>0 )
{
	echo '<span style="font-family:pr;"><strong>Note:</strong> </span><br>';
}
?>

<?php 


    if( $pri['tax']!='')
    {
        //echo 'Currency: USD - Rate subject to '.$pri['tax'].'% service charge, taxes, etc';
        echo '<span style="font-family:pt;">- Rate is subject to '.$pri['tax'].'% service charge, taxes.</span><br>';
    }
	
	if( $pri['vat']!='')
    {
        //echo 'Currency: USD - Rate subject to '.$pri['tax'].'% service charge, taxes, etc';
        echo '<span style="font-family:pt;">- Rate is subject to '.$pri['vat'].'% service charge and tax.</span><br>';
    }//Rate is subject to ....% Service Charge and Tax
    
    if( $pri['deposite']!='')
    {
        //echo ' Refundable security deposit of $ '.$pri['deposite'].' USD is required in any currency upon check-in';
        echo '<span style="font-family:pt;">- Refundable security deposit of $'.$pri['deposite'].' USD is required in any currency upon check-in</span><br>';
    }
	
	
	if($service['deposit']!='' && $service['paid']!='')
    {
        //echo ' Refundable security deposit of $ '.$pri['deposite'].' USD is required in any currency upon check-in';
        echo '<span style="font-family:pt;">- Refundable security deposit of '.$service['deposit'].' USD is required to be paid '.$service['paid'].' days before arrival by bank transfer</span><br>';
    }
	
	if($service['deposit_2']!='' )
    {
        //echo ' Refundable security deposit of ________ USD is required to be paid on arrival date.';
        echo '<span style="font-family:pt;">- Refundable security deposit of '.$service['deposit_2'].' USD is required to be paid on arrival date.</span><br>';
    }
	
	if( $pri['tax_1']!='')
    {
        //echo 'Currency: USD - Rate subject to '.$pri['tax'].'% service charge, taxes, etc';
        echo '<span style="font-family:pt;">- Rate is subject to '.$pri['tax_1'].'%  service charge & tax.</span><br>';
    }
	
	if( $pri['tax_2']!='')
    {
        //echo 'Currency: USD - Rate subject to '.$pri['tax'].'% service charge, taxes, etc';
        echo '<span style="font-family:pt;">- Rate is subject to '.$pri['tax_2'].'% service charge & government tax.</span><br>';
    }
	
	if( $pri['tax_3']!='')
    {
        //echo 'Currency: USD - Rate subject to '.$pri['tax'].'% service charge, taxes, etc';
        echo '<span style="font-family:pt;">- Rate is subject to '.$pri['tax_3'].'% service charge.</span><br>';
    }
	
	if( $pri['tax_4']!='')
    {
        //echo 'Currency: USD - Rate subject to '.$pri['tax'].'% service charge, taxes, etc';
        echo '<span style="font-family:pt;">- Rate is subject to '.$pri['tax_4'].'% tax.</span><br>';
    }
	
	if( $pri['tax_5']!='')
    {
        //echo 'Currency: USD - Rate subject to '.$pri['tax'].'% service charge, taxes, etc';
        echo '<span style="font-family:pt;">- Rate is subject to '.$pri['tax_5'].'% vat.</span><br>';
    }
	
	
	if(count($no)>0 || $no!='')
    {
		foreach($no as $note)
		{
			 echo '<span style="font-family:pt;">- '.$note.'</span><br>';
		}
	}
?>

<?php
//------check promotion show status -----------------
$Da_today = date("Y-m-d");
$show_pro = false;

//----1
if($pri['p_discount']!='' && $pri['p_night']!='' && $pri['p_from']!='' && $pri['p_to']!='')
{
	$exp_dates = $pri['pro_exp_1'];
	if($exp_dates>=$Da_today && $exp_dates!='0000-00-00' && $exp_dates!='')
	{
		$show_pro=true;
	}
}
//----2
if($pri['p_discount_1']!='' && $pri['p_night_1']!='' && $pri['p_from_1']!='' && $pri['p_to_1']!='')
{
	$exp_dates = $pri['pro_exp_2'];
	if($exp_dates>=$Da_today && $exp_dates!='0000-00-00' && $exp_dates!='')
	{
		$show_pro=true;
	}
}
//----3
if($pri['p_discount_2']!='' && $pri['p_night_2']!='' && $pri['p_from_2']!='' && $pri['p_to_2']!='')
{
	$exp_dates = $pri['pro_exp_3'];
	if($exp_dates>=$Da_today && $exp_dates!='0000-00-00' && $exp_dates!='')
	{
		$show_pro=true;
	}
}
//----4    
if($pri['pr_discount']!='' && $pri['pr_free']!='' && $pri['pr_from']!='0000-00-00' && $pri['pr_to']!='0000-00-00')
{
	$exp_dates = $pri['pro_exp_4'];
	if($exp_dates>=$Da_today && $exp_dates!='0000-00-00' && $exp_dates!='')
	{
		$show_pro=true;
	}
}
//----5
if($pri['ps_book']!='' && $pri['ps_pay']!='' && $pri['ps_applicetion']!='' && $pri['ps_from']!='0000-00-00' && $pri['ps_to']!='0000-00-00')
{
	$exp_dates = $pri['pro_exp_5'];
	if($exp_dates>=$Da_today && $exp_dates!='0000-00-00' && $exp_dates!='')
	{
		$show_pro=true;
	}
}
//----6
if($stay['ps_book_4']!='' && $stay['ps_pay_4']!='' && $stay['ps_applicetion_4']!='' && $stay['ps_from_4_1']!='' && $stay['ps_to_4_1']!='')
{
	$exp_dates = $pri['pro_exp_6'];
	if($exp_dates>=$Da_today && $exp_dates!='0000-00-00' && $exp_dates!='')
	{
		$show_pro=true;
	}
}
//----7
if($stay['ps_book_5']!='' && $stay['ps_pay_5']!='' && $stay['ps_applicetion_5']!='' && $stay['ps_from_5_1']!='' && $stay['ps_to_5_1']!='')
{
	$exp_dates = $pri['pro_exp_7'];
	if($exp_dates>=$Da_today && $exp_dates!='0000-00-00' && $exp_dates!='')
	{
		$show_pro=true;
	}
}
//----8
if($stay['ps_book_6']!='' && $stay['ps_pay_6']!='' && $stay['ps_applicetion_6']!='' && $stay['ps_from_6_1']!='' && $stay['ps_to_6_1']!='')
{
	$exp_dates = $pri['pro_exp_8'];
	if($exp_dates>=$Da_today && $exp_dates!='0000-00-00' && $exp_dates!='')
	{
		$show_pro=true;
	}
}
//----9
if($stay['ps_book_7']!='' && $stay['ps_pay_7']!='' && $stay['ps_applicetion_7']!='' && $stay['ps_from_7_1']!='' && $stay['ps_to_7_1']!='')
{
	$exp_dates = $pri['pro_exp_9'];
	if($exp_dates>=$Da_today && $exp_dates!='0000-00-00' && $exp_dates!='')
	{
		$show_pro=true;
	}
}
//----10
if($stay['stay_10_1']!='' && $stay['stay_10_2']!='' && $stay['stay_10_3']!='' && $stay['stay_10_4']!='')
{
	$exp_dates = $pri['pro_exp_10'];
	if($exp_dates>=$Da_today && $exp_dates!='0000-00-00' && $exp_dates!='')
	{
		$show_pro=true;
	}
}
//----11
if($stay['stay_11_1']!='' && $stay['stay_11_2']!='' && $stay['stay_11_3']!='' && $stay['stay_11_4']!='')
{
	$exp_dates = $pri['pro_exp_11'];
	if($exp_dates>=$Da_today && $exp_dates!='0000-00-00' && $exp_dates!='')
	{
		$show_pro=true;
	}
}
//----12
if($stay['stay_12_1']!='' && $stay['stay_12_2']!='' && $stay['stay_12_3']!='' && $stay['stay_12_4']!='')
{
	$exp_dates = $pri['pro_exp_12'];
	if($exp_dates>=$Da_today && $exp_dates!='0000-00-00' && $exp_dates!='')
	{
		$show_pro=true;
	}
}
//----13
if($stay['stay_13_1']!='' && $stay['stay_13_2']!='' && $stay['stay_13_3']!='' && $stay['stay_13_4']!='')
{
	$exp_dates = $pri['pro_exp_13'];
	if($exp_dates>=$Da_today && $exp_dates!='0000-00-00' && $exp_dates!='')
	{
		$show_pro=true;
	}
}
//----14  
if($pri['psp_offer']!=''  && $pri['psp_fron']!='0000-00-00' && $pri['psp_to']!='0000-00-00')
{
	$exp_dates = $pri['pro_exp_14'];
	if($exp_dates>=$Da_today && $exp_dates!='0000-00-00' && $exp_dates!='')
	{
		$show_pro=true;
	}
}
//------check promotion show status -----------------


 //-- promotion
if($pri['p_discount']!='' && $pri['p_night']!='' && $pri['p_from']!='' && $pri['p_to']!='' ||
$pri['pr_discount']!='' && $pri['pr_free']!='' && $pri['pr_from']!='' && $pri['pr_to']!='' ||
$pri['ps_book']!='' && $pri['ps_pay']!='' && $pri['ps_applicetion']!='' && $pri['ps_from']!='' && $pri['ps_to']!='' ||  
$pri['psp_offer']!='' && $pri['psp_fron']!='' && $pri['psp_to']!=''  )/*&&
(
$pri['pro_exp_1']>=$Da_today && $pri['pro_exp_1']!='0000-00-00' && $pri['pro_exp_1']!='' ||
$pri['pro_exp_2']>=$Da_today && $pri['pro_exp_2']!='0000-00-00' && $pri['pro_exp_2']!='' ||
$pri['pro_exp_3']>=$Da_today && $pri['pro_exp_3']!='0000-00-00' && $pri['pro_exp_3']!='' ||
$pri['pro_exp_4']>=$Da_today && $pri['pro_exp_4']!='0000-00-00' && $pri['pro_exp_4']!='' ||
$pri['pro_exp_5']>=$Da_today && $pri['pro_exp_5']!='0000-00-00' && $pri['pro_exp_5']!='' ||
$pri['pro_exp_6']>=$Da_today && $pri['pro_exp_6']!='0000-00-00' && $pri['pro_exp_6']!='' ||
$pri['pro_exp_7']>=$Da_today && $pri['pro_exp_7']!='0000-00-00' && $pri['pro_exp_7']!='' ||
$pri['pro_exp_8']>=$Da_today && $pri['pro_exp_8']!='0000-00-00' && $pri['pro_exp_8']!='' ||
$pri['pro_exp_9']>=$Da_today && $pri['pro_exp_9']!='0000-00-00' && $pri['pro_exp_9']!='' ||
$pri['pro_exp_10']>=$Da_today && $pri['pro_exp_10']!='0000-00-00' && $pri['pro_exp_10']!='')*/
{
	if($show_pro==true)
	{
    echo '<div class="col-md-12 mg-room-fecilities ">';
        echo '<h2 class="mg-sec-left-title l15 top20">Promotion</h2>';
        echo '<div class="row bgblu">';
           echo '<div class="col-md-12 ">';
                echo '<ul class="bedr ">';
					//----1
                    if($pri['p_discount']!='' && $pri['p_night']!='' && $pri['p_from']!='' && $pri['p_to']!='')
                    {
						$exp_dates = $pri['pro_exp_1'];
						if($exp_dates>=$Da_today && $exp_dates!='0000-00-00' && $exp_dates!='')
						{
							$pro = '';
							$pro.= '<li class="fo15"><img src="../../files/check.png" width="20" class="chks"> ';
							$pro.= 'Receive '.$pri['p_discount'].'% discount for min '.$pri['p_night'].' nights booking for travel period between '.months($pri['p_from']).' to '.months($pri['p_to']);
							$pro.= '.</li>';
							echo $pro;
						}
                    }
					//----2
					if($pri['p_discount_1']!='' && $pri['p_night_1']!='' && $pri['p_from_1']!='' && $pri['p_to_1']!='')
                    {
						$exp_dates = $pri['pro_exp_2'];
						if($exp_dates>=$Da_today && $exp_dates!='0000-00-00' && $exp_dates!='')
						{
							$pro = '';
							$pro.= '<li class="fo15"><img src="../../files/check.png" width="20" class="chks"> ';
							$pro.= 'Receive '.$pri['p_discount_1'].'% discount for min '.$pri['p_night_1'].' nights booking for travel period between '.months($pri['p_from_1']).' to '.months($pri['p_to_1']);
							$pro.= '.</li>';
							echo $pro;
						}
                    }
					//----3
					if($pri['p_discount_2']!='' && $pri['p_night_2']!='' && $pri['p_from_2']!='' && $pri['p_to_2']!='')
                    {
						$exp_dates = $pri['pro_exp_3'];
						if($exp_dates>=$Da_today && $exp_dates!='0000-00-00' && $exp_dates!='')
						{
							$pro = '';
							$pro.= '<li class="fo15"><img src="../../files/check.png" width="20" class="chks"> ';
							$pro.= 'Receive '.$pri['p_discount_2'].'% discount for min '.$pri['p_night_2'].' nights booking for travel period between '.months($pri['p_from_2']).' to '.months($pri['p_to_2']);
							$pro.= '.</li>';
							echo $pro;
						}
                    }
                    //----4    
                    if($pri['pr_discount']!=''  && $pri['pr_from']!='0000-00-00' && $pri['pr_to']!='0000-00-00')//&& $pri['pr_free']!=''
                    {
						$exp_dates = $pri['pro_exp_4'];
						if($exp_dates>=$Da_today && $exp_dates!='0000-00-00' && $exp_dates!='')
						{
							$pro = '';
							$pro.= '<li class="fo15"><img src="../../files/check.png" width="20" class="chks"> ';
							$pro.= 'Receive '.$pri['pr_discount'].'% discount, and FREE r/t transfer, for travel period between '.months($pri['pr_from']).' to '.months($pri['pr_to']);
							$pro.= '.</li>';
							echo $pro;
						}
                    }
                    //----5
                    if($pri['ps_book']!='' && $pri['ps_pay']!='' && $pri['ps_applicetion']!='' && $pri['ps_from']!='0000-00-00' && $pri['ps_to']!='0000-00-00')
                    {
						$exp_dates = $pri['pro_exp_5'];
						if($exp_dates>=$Da_today && $exp_dates!='0000-00-00' && $exp_dates!='')
						{
							$pro = '';
							$pro.= '<li class="fo15"><img src="../../files/check.png" width="20" class="chks"> ';
							$pro.= 'Stay/book '.$pri['ps_book'].' nights and pay '.$pri['ps_pay'].' nights. This promotion applies to '.$pri['ps_applicetion'].' villa occupancy booking, staying period by '.months($pri['ps_from']).' to '.months($pri['ps_to']);
							$pro.= '.</li>';
							echo $pro;
						}
                    }
					//----6
					if($stay['ps_book_4']!='' && $stay['ps_pay_4']!='' && $stay['ps_applicetion_4']!='' && $stay['ps_from_4_1']!='' && $stay['ps_to_4_1']!='')
                    {
                        $exp_dates = $pri['pro_exp_6'];
						if($exp_dates>=$Da_today && $exp_dates!='0000-00-00' && $exp_dates!='')
						{
							$pro = '';
							$pro.= '<li class="fo15"><img src="../../files/check.png" width="20" class="chks"> ';
							$pro.= 'Stay/book '.$stay['ps_book_4'].' nights and pay '.$stay['ps_pay_4'].' nights. This promotion applies to '.$stay['ps_applicetion_4'].' villa occupancy booking, staying period by '.months($stay['ps_from_4_1']).' to '.months($stay['ps_to_4_1']);
							$pro.= '.</li>';
							echo $pro;
							
							/*echo '<li class="fo15"><img src="../../files/check.png" width="20" class="chks">  Stay/book '.$stay['ps_book_4'].' nights and pay '.$stay['ps_pay_4'].' nights. This promotion is applicable to '.$stay['ps_applicetion_4'].' villa occupancy booking travelling between '.months($stay['ps_from_4_1']).' to '.months($stay['ps_to_4_1']);
							if($stay['ps_from_4_2'] && $stay['ps_to_4_2'])
							{
								echo  ' and '.months($stay['ps_from_4_2']).' to '.months($stay['ps_to_4_2']);
							}
							echo '.</li>';*/
						}
                    }
					
					//----7
					if($stay['ps_book_5']!='' && $stay['ps_pay_5']!='' && $stay['ps_applicetion_5']!='' && $stay['ps_from_5_1']!='' && $stay['ps_to_5_1']!='')
                    {
						$exp_dates = $pri['pro_exp_7'];
						if($exp_dates>=$Da_today && $exp_dates!='0000-00-00' && $exp_dates!='')
						{
							$pro = '';
							$pro.= '<li class="fo15"><img src="../../files/check.png" width="20" class="chks"> ';
							$pro.= 'Stay/book '.$stay['ps_book_5'].' nights and pay '.$stay['ps_pay_5'].' nights. This promotion applies to '.$stay['ps_applicetion_5'].' villa occupancy booking, staying period by '.months($stay['ps_from_5_1']).' to '.months($stay['ps_to_5_1']);
							$pro.= '.</li>';
							echo $pro;
							
							/*echo '<li class="fo15"><img src="../../files/check.png" width="20" class="chks">  Stay/book '.$stay['ps_book_5'].' nights and pay '.$stay['ps_pay_5'].' nights. This promotion is applicable to '.$stay['ps_applicetion_5'].' villa occupancy booking travelling between '.months($stay['ps_from_5_1']).' to '.months($stay['ps_to_5_1']);
							if($stay['ps_from_5_2'] && $stay['ps_to_5_2'])
							{
								echo  ' and '.months($stay['ps_from_5_2']).' to '.months($stay['ps_to_5_2']);
							}
							echo '.</li>';*/
						}
                    }
					
					//----8
					if($stay['ps_book_6']!='' && $stay['ps_pay_6']!='' && $stay['ps_applicetion_6']!='' && $stay['ps_from_6_1']!='' )//&& $stay['ps_to_6_1']!=''
                    {
						$exp_dates = $pri['pro_exp_8'];
						if($exp_dates>=$Da_today && $exp_dates!='0000-00-00' && $exp_dates!='')
						{
							$pro = '';
							$pro.= '<li class="fo15"><img src="../../files/check.png" width="20" class="chks"> ';
							$pro.= 'Stay/book '.$stay['ps_book_6'].' nights and pay for '.$stay['ps_pay_6'].' nights. This promotion applies to '.$stay['ps_applicetion_6'].' villa occupancy booking, staying period no later than '.months($stay['ps_from_6_1']).' (This excludes holiday and weekend)';// to '.months($stay['ps_to_6_1']).'
							$pro.= '.</li>';
							echo $pro;
							

							/*echo '<li class="fo15"><img src="../../files/check.png" width="20" class="chks">  Stay/book '.$stay['ps_book_6'].' nights and pay '.$stay['ps_pay_6'].' nights. This promotion is applicable to '.$stay['ps_applicetion_6'].' villa occupancy booking travelling between '.months($stay['ps_from_6_1']).' to '.months($stay['ps_to_6_1']);
							if($stay['ps_from_6_2'] && $stay['ps_to_6_2'])
							{
								echo  ' and '.months($stay['ps_from_6_2']).' to '.months($stay['ps_to_6_2']);
							}
						echo '.</li>';*/
						}
                    }
					
					//----9
					if($stay['ps_book_7']!='' && $stay['ps_pay_7']!='' && $stay['ps_applicetion_7']!='' && $stay['ps_from_7_1']!='' )//&& $stay['ps_to_7_1']!=''
                    {
						$exp_dates = $pri['pro_exp_9'];
						if($exp_dates>=$Da_today && $exp_dates!='0000-00-00' && $exp_dates!='')
						{
							$pro = '';
							$pro.= '<li class="fo15"><img src="../../files/check.png" width="20" class="chks"> ';
							$pro.= 'Stay/book '.$stay['ps_book_7'].' nights and pay for '.$stay['ps_pay_7'].' nights. This promotion applies to '.$stay['ps_applicetion_7'].' villa occupancy booking, staying period no later than '.months($stay['ps_from_7_1']).' (This excludes holiday and weekend)';// to '.months($stay['ps_to_6_1']).'
							$pro.= '.</li>';
							echo $pro;
							
							/*echo '<li class="fo15"><img src="../../files/check.png" width="20" class="chks">  Stay/book '.$stay['ps_book_7'].' nights and pay '.$stay['ps_pay_7'].' nights. This promotion is applicable to '.$stay['ps_applicetion_7'].' villa occupancy booking travelling between '.months($stay['ps_from_7_1']).' to '.months($stay['ps_to_7_1']);
							if($stay['ps_from_7_2'] && $stay['ps_to_7_2'])
							{
								echo  ' and '.months($stay['ps_from_7_2']).' to '.months($stay['ps_to_7_2']);
							}
							echo '.</li>';*/
						}
                    }
					
					//----10
					if($stay['stay_10_1']!='' && $stay['stay_10_2']!='' && $stay['stay_10_3']!='' && $stay['stay_10_4']!='' )//&& $stay['ps_to_7_1']!=''
                    {
						$exp_dates = $pri['pro_exp_10'];
						if($exp_dates>=$Da_today && $exp_dates!='0000-00-00' && $exp_dates!='')
						{
							$pro = '';
							$pro.= '<li class="fo15"><img src="../../files/check.png" width="20" class="chks"> ';
							$pro.= 'Stay/book '.$stay['stay_10_1'].' nights and pay for '.$stay['stay_10_2'].' nights. This promotion applies to '.$stay['stay_10_3'].' villa occupancy booking, staying period no later than '.months($stay['stay_10_4']).' (This excludes holiday and weekend)';// to '.months($stay['ps_to_6_1']).'
							$pro.= '.</li>';
							echo $pro;
						}
                    }
					
					//----11
					if($stay['stay_11_1']!='' && $stay['stay_11_2']!='' && $stay['stay_11_3']!='' && $stay['stay_11_4']!='' )//&& $stay['ps_to_7_1']!=''
                    {
						$exp_dates = $pri['pro_exp_11'];
						if($exp_dates>=$Da_today && $exp_dates!='0000-00-00' && $exp_dates!='')
						{
							$pro = '';
							$pro.= '<li class="fo15"><img src="../../files/check.png" width="20" class="chks"> ';
							$pro.= 'Stay/book '.$stay['stay_11_1'].' nights and pay '.$stay['stay_11_2'].' nights. This promotion applies to '.$stay['stay_11_3'].' bedroom occupancy booking, staying period by '.months($stay['stay_11_4']).'. Book by '.months($stay['stay_11_5']);// to '.months($stay['ps_to_6_1']).'
							$pro.= '.</li>';
							echo $pro;
						}
                    }
					
					//----12
					if($stay['stay_12_1']!='' && $stay['stay_12_2']!='' && $stay['stay_12_3']!='' && $stay['stay_12_4']!='' && $stay['stay_12_5']!='')//&& $stay['ps_to_7_1']!=''
                    {
						$exp_dates = $pri['pro_exp_12'];
						if($exp_dates>=$Da_today && $exp_dates!='0000-00-00' && $exp_dates!='')
						{
							$pro = '';
							$pro.= '<li class="fo15"><img src="../../files/check.png" width="20" class="chks"> ';
							$pro.= 'Stay/book '.$stay['stay_12_1'].' nights and pay '.$stay['stay_12_2'].' nights. This promotion applies to '.$stay['stay_12_3'].' bedroom occupancy booking, staying period by '.months($stay['stay_12_4']).'. Book by '.months($stay['stay_12_5']);// to '.months($stay['ps_to_6_1']).'
							$pro.= '.</li>';
							echo $pro;
						}
                    }
					
					//----13
					if($stay['stay_13_1']!='' && $stay['stay_13_2']!='' && $stay['stay_13_3']!='' && $stay['stay_13_4']!='' && $stay['stay_13_5']!='')//&& $stay['ps_to_7_1']!=''
                    {
						$exp_dates = $pri['pro_exp_13'];
						if($exp_dates>=$Da_today && $exp_dates!='0000-00-00' && $exp_dates!='')
						{
							$pro = '';
							$pro.= '<li class="fo15"><img src="../../files/check.png" width="20" class="chks"> ';
							$pro.= 'Stay/book '.$stay['stay_13_1'].' nights and pay '.$stay['stay_13_2'].' nights. This promotion applies to '.$stay['stay_13_3'].' bedroom occupancy booking, staying period by '.months($stay['stay_13_4']).'. Book by '.months($stay['stay_13_5']);// to '.months($stay['ps_to_6_1']).'
							$pro.= '.</li>';
							echo $pro;
						}
                    }
					
					//----14  
                    if($pri['psp_offer']!=''  && $pri['psp_fron']!='0000-00-00' && $pri['psp_to']!='0000-00-00')
                    {
						$exp_dates = $pri['pro_exp_14'];
						if($exp_dates>=$Da_today && $exp_dates!='0000-00-00' && $exp_dates!='')
						{
							$pro = '';
							$pro.= '<li class="fo15"><img src="../../files/check.png" width="20" class="chks"> ';
							$pro.= 'Special offer FREE '.$pri['psp_offer'].' for staying period by '.months($pri['psp_fron']).'. Book by '.months($pri['psp_to']);// to '.months($stay['ps_to_6_1']).'
							$pro.= '.</li>';
							echo $pro;
							
                       // echo '<li class="fo15"><img src="../../files/check.png" width="20" class="chks"> Special offer FREE '.$pri['psp_offer'].' for booking stay between '.months($pri['psp_fron']).' to '.months($pri['psp_to']).'.</li>';
						}
                    }
					
                    echo '</ul>';
                    echo ' <span class="tremark">Remark:Availability and conditions apply, please inquire with reservation. Promotion is only valid to new reservation after the start of the promotion. Not valid with any other discount and promotions combined.</span>';
            echo '</div>';
        echo '</div>';
    echo '</div>';
	}
}
//-- promotion



//-- discount
$dis_dat = false;
if($dbc->HasRecord("discounts","property=".$_REQUEST['id']))
{
	$dis = $dbc->GetRecord("discounts","*","property=".$_REQUEST['id']);
	$dis_dat=true;
}

$show_dis=false;
if(($pri['early_percent']!='' && $pri['early_day']!='') && ($dis['dis_exp_1']=='' || $dis['dis_exp_1']=='0000-00-00' || $dis['dis_exp_1']>=$Da_today))
{
	$show_dis=true;$nn=1;
}

if(($dis['early_1']!='' && $dis['early_2']!='') && ($dis['dis_exp_2']=='' || $dis['dis_exp_2']=='0000-00-00' || $dis['dis_exp_2']>=$Da_today))
{
	$show_dis=true;$nn=2;
}

if(($dis['early_1']!='' && $dis['early_2']!='') && ($dis['dis_exp_3']=='' || $dis['dis_exp_3']=='0000-00-00' || $dis['dis_exp_3']>=$Da_today))
{
	$show_dis=true;$nn=3;
}

if(($dis['last_1']!='' && $dis['last_2']!='') && ($dis['dis_exp_4']=='' || $dis['dis_exp_4']=='0000-00-00' || $dis['dis_exp_4']>=$Da_today))
{
	$show_dis=true;$nn=4;
}

if(($dis['long_1']!='' && $dis['long_2']!='') && ($dis['dis_exp_5']=='' || $dis['dis_exp_5']=='0000-00-00' || $dis['dis_exp_5']>=$Da_today))
{
	$show_dis=true;$nn=5;
}

if(($dis['long_3']!='' && $dis['long_4']!='') && ($dis['dis_exp_6']=='' || $dis['dis_exp_6']=='0000-00-00' || $dis['dis_exp_6']>=$Da_today))
{
	$show_dis=true;$nn=6;
}

if(($dis['early_3']!='' && $dis['early_date_3']!='') && ($dis['dis_exp_7']=='' || $dis['dis_exp_7']=='0000-00-00' || $dis['dis_exp_7']>=$Da_today))
{
	$show_dis=true;
	$nn=7;
}

if(($dis['early_4']!='' && $dis['early_date_4']!='') && ($dis['dis_exp_8']=='' || $dis['dis_exp_8']=='0000-00-00' || $dis['dis_exp_8']>=$Da_today))
{
	$show_dis=true;
	$nn=8;
}

if(($dis['early_5']!='' && $dis['early_date_5']!='') && ($dis['dis_exp_9']=='' || $dis['dis_exp_9']=='0000-00-00' || $dis['dis_exp_9']>=$Da_today))
{
	$show_dis=true;
	$nn=9;
}


//$show_dis=true;
//echo '--',$show_dis.'--'.$nn;
 if($pri['early_percent']!='' && $pri['early_day']!='' || $pri['last_percent']!='' )
 {
	if($show_dis==true)
	{
     echo '<div class="col-md-12 mg-room-fecilities ">';
        echo '<h2 class="mg-sec-left-title l15 top20">Discount</h2>';
        echo '<div class="row bggold ">';
           echo '<div class="col-md-12 ">';
                 echo '<ul  class="bedr">';
                if(($pri['early_percent']!='' && $pri['early_day']!='') && ($dis['dis_exp_1']>=$Da_today || $dis['dis_exp_1']=='0000-00-00' || $dis['dis_exp_1']==''))// 
                {
                    echo '<li class="fo15"><img src="../../files/check.png" width="20" class="chk"> Early bird enjoys '.$pri['early_percent'].'% discount when booking '.$pri['early_day'].' days in advance.</li>';
                }
                    
                if(($pri['last_percent']!='' && $pri['last_date']!='') && ($dis['dis_exp_2']>=$Da_today || $dis['dis_exp_2']=='0000-00-00' || $dis['dis_exp_2']==''))// 
                {
                    echo '<li class="fo15"><img src="../../files/check.png" width="20" class="chk"> Last minute bookings enjoy '.$pri['last_percent'].'% discount when checking in before '.$pri['last_date'].' days</li>';//months($pri['last_date'])
                }
				
				if($dis_dat==true)
				{
					if(($dis['early_1']!='' && $dis['early_2']!='') && ($dis['dis_exp_3']>=$Da_today || $dis['dis_exp_3']=='0000-00-00' || $dis['dis_exp_3']==''))// 
					{
						echo '<li class="fo15"><img src="../../files/check.png" width="20" class="chk"> Early bird enjoys '.$dis['early_1'].'% discount when booking '.$dis['early_2'].' days in advance.</li>';
					}
					
					if(($dis['last_1']!='' && $dis['last_2']!='') && ($dis['dis_exp_4']>=$Da_today || $dis['dis_exp_4']=='0000-00-00' || $dis['dis_exp_4']==''))// 
					{
						echo '<li class="fo15"><img src="../../files/check.png" width="20" class="chk"> Last minute bookings enjoy '.$dis['last_1'].'% discount when checking in before '.$dis['last_2'].' days.</li>';
					}
					
					if(($dis['long_1']!='' && $dis['long_2']!='') && ($dis['dis_exp_5']>=$Da_today || $dis['dis_exp_5']=='0000-00-00' || $dis['dis_exp_5']==''))// 
					{
						echo '<li class="fo15"><img src="../../files/check.png" width="20" class="chk"> Receive  '.$dis['long_1'].'%  if villa is booked for over '.$dis['long_2'].' Days.</li>';
					}
					
					if(($dis['long_3']!='' && $dis['long_4']!='') && ($dis['dis_exp_6']>=$Da_today || $dis['dis_exp_6']=='0000-00-00' || $dis['dis_exp_6']==''))// 
					{
						echo '<li class="fo15"><img src="../../files/check.png" width="20" class="chk"> Receive  '.$dis['long_3'].'%  if villa is booked for over '.$dis['long_4'].' Days.</li>';
					}
					
					//------new-------------
					if(($dis['early_3']!='' && $dis['early_date_3']!='') && ($dis['dis_exp_7']>=$Da_today || $dis['dis_exp_7']=='0000-00-00' || $dis['dis_exp_7']==''))// 
					{
						echo '<li class="fo15"><img src="../../files/check.png" width="20" class="chk"> Early bird enjoys '.$dis['early_3'].'% discount when booking '.$dis['early_date_3'].' days in advance.</li>';
					}
					
					if(($dis['early_4']!='' && $dis['early_date_4']!='') && ($dis['dis_exp_8']>=$Da_today || $dis['dis_exp_8']=='0000-00-00' || $dis['dis_exp_8']==''))//
					{
						echo '<li class="fo15"><img src="../../files/check.png" width="20" class="chk"> Early bird enjoys '.$dis['early_4'].'% discount when booking '.$dis['early_date_4'].' days in advance.</li>';
					}
					
					if(($dis['early_5']!='' && $dis['early_date_5']!='') && ($dis['dis_exp_9']>=$Da_today || $dis['dis_exp_9']=='0000-00-00' || $dis['dis_exp_9']==''))//
					{
						echo '<li class="fo15"><img src="../../files/check.png" width="20" class="chk"> Early bird enjoys '.$dis['early_5'].'% discount when booking '.$dis['early_date_5'].' days in advance.</li>';
					}
					//------new-------------
					
                }    
				
                echo '</ul>';
            echo '</div>';
        echo '</div>';
    echo '</div>';
	 }
 }
 //-- discount
 
 ?>
</div>

<script>
$(document).ready(function(e) {
	//$('#input-4').rating({displayOnly: true, step: 0.5});
	$(".tbp").hide();
	$("#cbbPrice").change();
	var tb = $(".first").val();
	$(".t"+tb).show();
	
    $("#cbbPrice").change(function(e) {
        var vals = $(this).val();
		$(".tbp").hide();
		$(".t"+vals).show();
		//alert(vals);
    });
	show_price_first('<?php echo $va;?>',this);
});

function show_price_first(vals,me)
{
	$(me).addClass('acct');
	$(".tbp").hide();
	$(".t"+vals).show();
}

function show_price(vals,me)
{
	$(".tabbut").removeClass('acct');
	$(me).addClass('acct');
	$(".tbp").hide();
	$(".t"+vals).show();
}
</script>
                