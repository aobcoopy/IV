<div class=" mg-contact-form-input rates_box">
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
				for($i=1;$i<=26;$i++)
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
    <div class="col-md-12 mg-room-fecilities " style="margin-top: 8px;"> <h4 class="mg-sec-left-title l15"><?php echo $vi_name[0];?> Rental  Rate</h4></div>
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
		 echo '<button class="tabbut fo15" onClick="show_price('.$op.',this)">'.$op.' Bedroom</button>';//<option value="'.$op.'">'.$op.' Bedroom</option>
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
			for($z=1;$z<=26;$z++)
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
        foreach($data as $valu)
        {
            /*$ex1 = explode("/",$valu['val1']);
			$ex2 = explode("/",$valu['val2']);
			$ex3 = explode("/",$valu['val3']);
			$ex4 = explode("/",$valu['val4']);
			$ex5 = explode("/",$valu['val5']);
			$ex6 = explode("/",$valu['val6']);
			$ex7 = explode("/",$valu['val7']);
			$ex8 = explode("/",$valu['val8']);
			$ex9 = explode("/",$valu['val9']);
			$ex10 = explode("/",$valu['val10']);
			$ex11 = explode("/",$valu['val11']);
			$ex12 = explode("/",$valu['val12']);
			$ex13 = explode("/",$valu['val13']);
			$ex14 = explode("/",$valu['val14']);
			$ex15 = explode("/",$valu['val15']);*/
			
			/*for($i=1;$i<=21;$i++)
			{
				$ex.$i = explode("/",$valu['val'.$i]);
			}*/
			
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
				for($i=1;$i<=26;$i++)
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

if( $pri['tax']!='' || $pri['vat']!='' || $pri['deposite']!='' || $service['deposit']!='' && $service['paid']!='' || $pri['tax_1']!='' || $pri['tax_2']!='' || $pri['tax_3']!='' || $pri['tax_4']!='' || $pri['tax_5']!='' || count($no)>0 )
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
        echo '<span style="font-family:pt;">- Refundable security deposit of '.$service['deposit'].' USD is required to be paid '.$service['paid'].' days before arrival by bank transfer</span>';
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


 //-- promotion
if($pri['p_discount']!='' && $pri['p_night']!='' && $pri['p_from']!='' && $pri['p_to']!='' ||
$pri['pr_discount']!='' && $pri['pr_free']!='' && $pri['pr_from']!='' && $pri['pr_to']!='' ||
$pri['ps_book']!='' && $pri['ps_pay']!='' && $pri['ps_applicetion']!='' && $pri['ps_from']!='' &&
$pri['ps_to']!='' ||  $pri['psp_offer']!='' && $pri['psp_fron']!='' && $pri['psp_to']!=''  )
{
    echo '<div class="col-md-12 mg-room-fecilities ">';
        echo '<h2 class="mg-sec-left-title l15">Promotion</h2>';
        echo '<div class="row bgblu">';
           echo '<div class="col-md-12 ">';
                echo '<ul class="bedr ">';
                    if($pri['p_discount']!='' && $pri['p_night']!='' && $pri['p_from']!='' && $pri['p_to']!='')
                    {
                        echo '<li class="fo15"><img src="../../files/check.png" width="20" class="chks"> Enjoy '.$pri['p_discount'].'% discount for min '.$pri['p_night'].' nights booking for travel period between '.months($pri['p_from']).' to '.months($pri['p_to']).'.</li>';
                    }
					
					if($pri['p_discount_1']!='' && $pri['p_night_1']!='' && $pri['p_from_1']!='' && $pri['p_to_1']!='')
                    {
                        echo '<li class="fo15"><img src="../../files/check.png" width="20" class="chks"> Enjoy '.$pri['p_discount_1'].'% discount for min '.$pri['p_night_1'].' nights booking for travel period between '.months($pri['p_from_1']).' to '.months($pri['p_to_1']).'.</li>';
                    }
					
					if($pri['p_discount_2']!='' && $pri['p_night_2']!='' && $pri['p_from_2']!='' && $pri['p_to_2']!='')
                    {
                        echo '<li class="fo15"><img src="../../files/check.png" width="20" class="chks"> Enjoy '.$pri['p_discount_2'].'% discount for min '.$pri['p_night_2'].' nights booking for travel period between '.months($pri['p_from_2']).' to '.months($pri['p_to_2']).'.</li>';
                    }
                        
                    if($pri['pr_discount']!='' && $pri['pr_free']!='' && $pri['pr_from']!='0000-00-00' && $pri['pr_to']!='0000-00-00')
                    {
                        echo '<li class="fo15"><img src="../../files/check.png" width="20" class="chks"> Enjoy '.$pri['pr_discount'].'% discount and FREE '.months($pri['pr_free']).' , for booking stay between '.months($pri['pr_from']).' to '.months($pri['pr_to']).'.</li>';
                    }
                    
                    if($pri['ps_book']!='' && $pri['ps_pay']!='' && $pri['ps_applicetion']!='' && $pri['ps_from']!='0000-00-00' && $pri['ps_to']!='0000-00-00')
                    {
                        echo '<li class="fo15"><img src="../../files/check.png" width="20" class="chks">  Stay/book '.$pri['ps_book'].' nights and pay '.$pri['ps_pay'].' nights. This promotion is applicable to '.$pri['ps_applicetion'].' villa occupancy booking travelling between '.months($pri['ps_from']).' to '.months($pri['ps_to']).'.</li>';
                    }
                        
                    if($pri['psp_offer']!=''  && $pri['psp_fron']!='0000-00-00' && $pri['psp_to']!='0000-00-00')
                    {
                        echo '<li class="fo15"><img src="../../files/check.png" width="20" class="chks"> Special offer FREE '.$pri['psp_offer'].' for booking stay between '.months($pri['psp_fron']).' to '.months($pri['psp_to']).'.</li>';
                    }
					
					
					
					if($stay['ps_book_4']!='' && $stay['ps_pay_4']!='' && $stay['ps_applicetion_4']!='' && $stay['ps_from_4_1']!='' && $stay['ps_to_4_1']!='')
                    {
                        echo '<li class="fo15"><img src="../../files/check.png" width="20" class="chks">  Stay/book '.$stay['ps_book_4'].' nights and pay '.$stay['ps_pay_4'].' nights. This promotion is applicable to '.$stay['ps_applicetion_4'].' villa occupancy booking travelling between '.months($stay['ps_from_4_1']).' to '.months($stay['ps_to_4_1']);
						if($stay['ps_from_4_2'] && $stay['ps_to_4_2'])
						{
							echo  ' and '.months($stay['ps_from_4_2']).' to '.months($stay['ps_to_4_2']);
						}
						echo '.</li>';
                    }
					
					
					if($stay['ps_book_5']!='' && $stay['ps_pay_5']!='' && $stay['ps_applicetion_5']!='' && $stay['ps_from_5_1']!='' && $stay['ps_to_5_1']!='')
                    {
                        echo '<li class="fo15"><img src="../../files/check.png" width="20" class="chks">  Stay/book '.$stay['ps_book_5'].' nights and pay '.$stay['ps_pay_5'].' nights. This promotion is applicable to '.$stay['ps_applicetion_5'].' villa occupancy booking travelling between '.months($stay['ps_from_5_1']).' to '.months($stay['ps_to_5_1']);
						if($stay['ps_from_5_2'] && $stay['ps_to_5_2'])
						{
							echo  ' and '.months($stay['ps_from_5_2']).' to '.months($stay['ps_to_5_2']);
						}
						echo '.</li>';
                    }
					
					
					if($stay['ps_book_6']!='' && $stay['ps_pay_6']!='' && $stay['ps_applicetion_6']!='' && $stay['ps_from_6_1']!='' && $stay['ps_to_6_1']!='')
                    {
                        echo '<li class="fo15"><img src="../../files/check.png" width="20" class="chks">  Stay/book '.$stay['ps_book_6'].' nights and pay '.$stay['ps_pay_6'].' nights. This promotion is applicable to '.$stay['ps_applicetion_6'].' villa occupancy booking travelling between '.months($stay['ps_from_6_1']).' to '.months($stay['ps_to_6_1']);
						if($stay['ps_from_6_2'] && $stay['ps_to_6_2'])
						{
							echo  ' and '.months($stay['ps_from_6_2']).' to '.months($stay['ps_to_6_2']);
						}
						echo '.</li>';
                    }
					
					
					if($stay['ps_book_7']!='' && $stay['ps_pay_7']!='' && $stay['ps_applicetion_7']!='' && $stay['ps_from_7_1']!='' && $stay['ps_to_7_1']!='')
                    {
                        echo '<li class="fo15"><img src="../../files/check.png" width="20" class="chks">  Stay/book '.$stay['ps_book_7'].' nights and pay '.$stay['ps_pay_7'].' nights. This promotion is applicable to '.$stay['ps_applicetion_7'].' villa occupancy booking travelling between '.months($stay['ps_from_7_1']).' to '.months($stay['ps_to_7_1']);
						if($stay['ps_from_7_2'] && $stay['ps_to_7_2'])
						{
							echo  ' and '.months($stay['ps_from_7_2']).' to '.months($stay['ps_to_7_2']);
						}
						echo '.</li>';
                    }
					
                    echo '</ul>';
                    echo ' <span class="tremark">Remark:Availability and conditions apply, please inquire with reservation. Promotion is only valid to new reservation after the start of the promotion. Not valid with any other discount and promotions combined.</span>';
            echo '</div>';
        echo '</div>';
    echo '</div><br><br>';
}
//-- promotion



//-- discount
 if($pri['early_percent']!='' && $pri['early_day']!='' || $pri['last_percent']!='' )
 {
     echo '<div class="col-md-12 mg-room-fecilities ">';
        echo '<h2 class="mg-sec-left-title l15">Discount</h2>';
        echo '<div class="row bggold ">';
           echo '<div class="col-md-12 ">';
                 echo '<ul  class="bedr">';
                if($pri['early_percent']!='' && $pri['early_day']!='')
                {
                    echo '<li class="fo15"><img src="../../files/check.png" width="20" class="chk"> Early bird enjoys '.$pri['early_percent'].'% discount when booking '.$pri['early_day'].' days in advance.</li>';
                }
                    
                if($pri['last_percent']!='' || $pri['last_date']!='0000-00-00')
                {
                    echo '<li class="fo15"><img src="../../files/check.png" width="20" class="chk"> Last minute bookings enjoy '.$pri['last_percent'].'% discount when checking in before '.$pri['last_date'].' days</li>';//months($pri['last_date'])
                }
				
				if($dbc->HasRecord("discounts","property=".$_REQUEST['id']))
				{
					$dis = $dbc->GetRecord("discounts","*","property=".$_REQUEST['id']);
				
					if($dis['early_1']!='' && $dis['early_2']!='')
					{
						echo '<li class="fo15"><img src="../../files/check.png" width="20" class="chk"> Early bird enjoys '.$dis['early_1'].'% discount when booking '.$dis['early_2'].' days in advance.</li>';
					}
					
					if($dis['last_1']!='' && $dis['last_2']!='')
					{
						echo '<li class="fo15"><img src="../../files/check.png" width="20" class="chk"> Last minute bookings enjoy '.$dis['last_1'].'% discount when checking in before '.$dis['last_2'].' days.</li>';
					}
					
					if($dis['long_1']!='' && $dis['long_2']!='')
					{
						echo '<li class="fo15"><img src="../../files/check.png" width="20" class="chk"> Receive  '.$dis['long_1'].'%  if villa is booked for over '.$dis['long_2'].' Days.</li>';
					}
					
					if($dis['long_3']!='' && $dis['long_4']!='')
					{
						echo '<li class="fo15"><img src="../../files/check.png" width="20" class="chk"> Receive  '.$dis['long_3'].'%  if villa is booked for over '.$dis['long_4'].' Days.</li>';
					}
					
					
                }    
				
                echo '</ul>';
            echo '</div>';
        echo '</div>';
    echo '</div>';
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
                