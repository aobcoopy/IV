<?php 
	$opt = array();
	$aa=0;
		if($dbc->HasRecord("pricing","property=".$_REQUEST['id']))
		{
			//$prop = $dbc->GetRecord("pricing","*","property=".$_REQUEST['id']);
			$sqlprop = $dbc->Query("select * from pricing where property=".$_REQUEST['id']);
			$prop = $dbc->Fetch($sqlprop);
			$data = json_decode($prop['val'],true);
			foreach($data as $valu)
			{
				if($valu['val1']!='')
				{
					//echo "1";
					if($aa==0)
					{
						array_push($opt,"1");
					}
				}
				if($valu['val2']!='')
				{
					//echo "2";
					if($aa==0)
					{
						array_push($opt,"2");
					}
				}
				if($valu['val3']!='')
				{
					//echo "3";
					if($aa==0)
					{
						array_push($opt,"3");
					}
				}
				if($valu['val4']!='')
				{
					//echo "4";
					if($aa==0)
					{
						array_push($opt,"4");
					}
				}
				if($valu['val5']!='')
				{
					//echo "5";
					if($aa==0)
					{
						array_push($opt,"5");
					}
				}
				if($valu['val6']!='')
				{
					//echo "6";
					if($aa==0)
					{
						array_push($opt,"6");
					}
				}
				if($valu['val7']!='')
				{
					//echo "7";
					if($aa==0)
					{
						array_push($opt,"7");
					}
				}
				if($valu['val8']!='')
				{
					//echo "8";
					if($aa==0)
					{
						array_push($opt,"8");
					}
				}
				if($valu['val9']!='')
				{
					//echo "8";
					if($aa==0)
					{
						array_push($opt,"9");
					}
				}
				if($valu['val10']!='')
				{
					//echo "8";
					if($aa==0)
					{
						array_push($opt,"10");
					}
				}
				if($valu['val11']!='')
				{
					//echo "8";
					if($aa==0)
					{
						array_push($opt,"11");
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
    <div class="col-md-12 mg-room-fecilities " style="margin-top: -15px;"> <h2 class="mg-sec-left-title l15">Rental  Rate</h2></div>
 <?php
$ii=0;
$va = 0;
//print_r($opt);
foreach($opt as $op)
{
	if($ii==0)
	{
		 $va = $op;
		 echo '<button class="tabbut acct" onClick="show_price('.$op.',this)">'.$op.' Bedroom</button>';//<option value="'.$op.'" class="first">'.$op.' Bedroom</option>
	}
	else
	{
		 echo '<button class="tabbut" onClick="show_price('.$op.',this)">'.$op.' Bedroom</button>';//<option value="'.$op.'">'.$op.' Bedroom</option>
	}
   $ii++;
}
?>

<table id="tb" class="tb table table-bordered table-striped" width="100%" border="1">
    <thead>
        <tr>
            <th>Period Dates</th>
            <th class="text-center weeb" align="center">Min Night Stay</th>
            <?php
			for($z=1;$z<=15;$z++)
			{
				echo '<th class="t'.$z.' tbp text-center" align="center"> Price Per Night (USD)</th>';
			}
			?>
           <!-- <th class="t1 tbp text-center" align="center"> Price Per Night (USD)</th>
            <th class="t2 tbp text-center" align="center"> Price Per Night (USD)</th>
            <th class="t3 tbp text-center" align="center"> Price Per Night (USD)</th>
            <th class="t4 tbp text-center" align="center"> Price Per Night (USD)</th>
            <th class="t5 tbp text-center" align="center"> Price Per Night (USD)</th>
            <th class="t6 tbp text-center" align="center"> Price Per Night (USD)</th>
            <th class="t7 tbp text-center" align="center"> Price Per Night (USD)</th>
            <th class="t8 tbp text-center" align="center"> Price Per Night (USD)</th>
            <th class="t9 tbp text-center" align="center"> Price Per Night (USD)</th>
            <th class="t10 tbp text-center" align="center"> Price Per Night (USD)</th>
            <th class="t11 tbp text-center" align="center"> Price Per Night (USD)</th>-->
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
        foreach($data as $valu)
        {
            
            echo '<tr>
                <td>'.months($valu['date1']).' - '.months($valu['date2']).'</td>';
                echo '<td class="text-center weeb">'.$valu['night'].'</td>';
                echo '<td class="t1 tbp text-center">';echo ($valu['val1']!='')?$valu['val1']:' 0 ';echo ' </td>';
                echo '<td class="t2 tbp text-center">';echo ($valu['val2']!='')?$valu['val2']:' 0 ';echo ' </td>';
                echo '<td class="t3 tbp text-center">';echo ($valu['val3']!='')?$valu['val3']:' 0 ';echo ' </td>';
                echo '<td class="t4 tbp text-center">';echo ($valu['val4']!='')?$valu['val4']:' 0 ';echo ' </td>';
                echo '<td class="t5 tbp text-center">';echo ($valu['val5']!='')?$valu['val5']:' 0 ';echo ' </td>';
                echo '<td class="t6 tbp text-center">';echo ($valu['val6']!='')?$valu['val6']:' 0 ';echo ' </td>';
                echo '<td class="t7 tbp text-center">';echo ($valu['val7']!='')?$valu['val7']:' 0 ';echo ' </td>';
                echo '<td class="t8 tbp text-center">';echo ($valu['val8']!='')?$valu['val8']:' 0 ';echo ' </td>';
                echo '<td class="t9 tbp text-center">';echo ($valu['val9']!='')?$valu['val9']:' 0 ';echo ' </td>';
                echo '<td class="t10 tbp text-center">';echo ($valu['val10']!='')?$valu['val10']:' 0 ';echo ' </td>';
                echo '<td class="t11 tbp text-center">';echo ($valu['val11']!='')?$valu['val11']:' 0 ';echo ' </td>';
				echo '<td class="t12 tbp text-center">';echo ($valu['val12']!='')?$valu['val12']:' 0 ';echo ' </td>';
				echo '<td class="t13 tbp text-center">';echo ($valu['val13']!='')?$valu['val13']:' 0 ';echo ' </td>';
				echo '<td class="t14 tbp text-center">';echo ($valu['val14']!='')?$valu['val14']:' 0 ';echo ' </td>';
				echo '<td class="t15 tbp text-center">';echo ($valu['val15']!='')?$valu['val15']:' 0 ';echo ' </td>';
            echo '</tr>';
        }
    }
    
    ?>
    </tbody>
</table>

<span style="font-family:pr;"><strong>Note:</strong> </span><br>
<?php 
    if( $pri['tax']!='')
    {
        //echo 'Currency: USD - Rate subject to '.$pri['tax'].'% service charge, taxes, etc';
        echo '<span style="font-family:pt;">- Rate subject to '.$pri['tax'].' % service charge, taxes, etc.</span><br>';
    }
    
    if( $pri['deposite']!='')
    {
        //echo ' Refundable security deposit of $ '.$pri['deposite'].' USD is required in any currency upon check-in';
        echo '<span style="font-family:pt;">- Refundable security deposit of $'.$pri['deposite'].' USD is required in any currency upon check-in</span><br>';
    }
	
	$service = json_decode($pri['service'],true);
	if( $service!='')
    {
        //echo ' Refundable security deposit of $ '.$pri['deposite'].' USD is required in any currency upon check-in';
        echo '<span style="font-family:pt;">- Refundable security deposit of '.$service['deposit'].' USD is required to be paid '.$service['paid'].' days before arrival by bank transfer</span>';
    }
?>

<?php
//-- discount
 if($pri['early_percent']!='' && $pri['early_day']!='' || $pri['last_percent']!='' )
 {
     echo '<div class="col-md-12 mg-room-fecilities ">';
        echo '<h2 class="mg-sec-left-title l15">Discount</h2>';
        echo '<div class="rows ">';
           echo '<div class="col-md-12 ">';
                 echo '<ul  class="bedr">';
                if($pri['early_percent']!='' && $pri['early_day']!='')
                {
                    echo '<li><img src="../../files/check.png" width="20" class="chk"> Early bird enjoys '.$pri['early_percent'].' % discount when booking '.$pri['early_day'].' days in advance.</li>';
                }
                    
                if($pri['last_percent']!='' || $pri['last_date']!='0000-00-00')
                {
                    echo '<li><img src="../../files/check.png" width="20" class="chk"> Last minute bookings enjoy '.$pri['last_percent'].' % discount when checking in before '.$pri['last_date'].' days</li>';//months($pri['last_date'])
                }
                    
                echo '</ul>';
            echo '</div>';
        echo '</div>';
    echo '</div>';
 }
 //-- discount

 //-- promotion
if($pri['p_discount']!='' && $pri['p_night']!='' && $pri['p_from']!='' && $pri['p_to']!='' ||
$pri['pr_discount']!='' && $pri['pr_free']!='' && $pri['pr_from']!='' && $pri['pr_to']!='' ||
$pri['ps_book']!='' && $pri['ps_pay']!='' && $pri['ps_applicetion']!='' && $pri['ps_from']!='' &&
$pri['ps_to']!='' ||  $pri['psp_offer']!='' && $pri['psp_fron']!='' && $pri['psp_to']!=''  )
{  
    echo '<div class="col-md-12 mg-room-fecilities ">';
        echo '<h2 class="mg-sec-left-title l15">Promotion</h2>';
        echo '<div class="rows ">';
           echo '<div class="col-md-12 ">';
                echo '<ul class="bedr">';
                    if($pri['p_discount']!='' && $pri['p_night']!='' && $pri['p_from']!='' && $pri['p_to']!='')
                    {
                        echo '<li><img src="../../files/check.png" width="20" class="chk"> Get/Enjoy/Receive '.$pri['p_discount'].' % discount for min '.$pri['p_night'].' nights booking for travel period between '.months($pri['p_from']).' to '.months($pri['p_to']).'.</li>';
                    }
                        
                    if($pri['pr_discount']!='' && $pri['pr_free']!='' && $pri['pr_from']!='0000-00-00' && $pri['pr_to']!='0000-00-00')
                    {
                        echo '<li><img src="../../files/check.png" width="20" class="chk"> Get/Enjoy/Receive '.$pri['pr_discount'].' % discount and FREE '.months($pri['pr_free']).' , for booking stay between '.months($pri['pr_from']).' to '.months($pri['pr_to']).'.</li>';
                    }
                    
                    if($pri['ps_book']!='' && $pri['ps_pay']!='' && $pri['ps_applicetion']!='' && $pri['ps_from']!='0000-00-00' && $pri['ps_to']!='0000-00-00')
                    {
                        echo '<li><img src="../../files/check.png" width="20" class="chk">  Stay/book '.$pri['ps_book'].' nights and pay '.$pri['ps_pay'].' nights. This promotion is applicable to '.$pri['ps_applicetion'].' villa occupancy booking travelling between '.months($pri['ps_from']).' to '.months($pri['ps_to']).'.</li>';
                    }
                        
                    if($pri['psp_offer']!=''  && $pri['psp_fron']!='0000-00-00' && $pri['psp_to']!='0000-00-00')
                    {
                        echo '<li><img src="../../files/check.png" width="20" class="chk"> Special offer FREE '.$pri['psp_offer'].' for booking stay between '.months($pri['psp_fron']).' to '.months($pri['psp_to']).'.</li>';
                    }
                    
                    echo '</ul>';
                    echo ' <span class="tremark">Remark:Availability and conditions apply, please inquire with reservation. Promotion is only valid to new reservation after the start of the promotion. Not valid with any other discount and promotions combined.</span>';
            echo '</div>';
        echo '</div>';
    echo '</div><br><br>';
}
//-- promotion
 ?>
</div>
                