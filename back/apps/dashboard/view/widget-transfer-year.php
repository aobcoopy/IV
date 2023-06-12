<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
<?php
include_once "../../../config/define.php";
	include_once "../../../libs/class/db.php";
	include_once "../../../libs/class/minerva.php";
	
	@ini_set('display_errors',DEBUG_MODE?1:0);
	date_default_timezone_set(DEFAULT_TIMEZONE);
	
	$dbc = new dbc;
	$dbc->Connect();
	$os = new minerva($dbc);
	
$sql = $dbc->Query("select 
	properties.id AS idp,
    properties.`name`,
    pricing.val,
    pricing.updated,
    pricing.transfer_year,
	properties.ht_link
from properties 
INNER JOIN pricing ON properties.id = pricing.property 
where  properties.status > 0 order by name asc");
$today = date("2018-m-d");
$today = date("Y-m-d");
$this_year = date("Y");
//$this_year = '20250';
$z=0;
while($row = $dbc->Fetch($sql))
{
	if($row['transfer_year']>=$this_year)
    {
    }
    else
    {
        if($row['updated']>='2020-11-30')
        {
            $data = json_decode(base64_decode($row['val']),true);
        }
        else
        {
            $data = json_decode($row['val'],true);
        }
		
        $total_data = count($data);
		
		$color = ($data[0]['chk_text_val']==1)?'danger':'warning';
		if($total_data==0){$color='default';}
        echo '<div class="panel panel-'.$color.'">';
            echo '<div class="panel-heading" role="tab" id="headingOne">';
                echo '<h4 class="panel-title">';
                    echo '<a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse_'.$z.'" aria-expanded="true" aria-controls="collapse_'.$z.'">';
                        echo $row['idp'].' '.$row['name'];
                    echo '</a>';
                echo '</h4>';
                //echo '<input type"text" id="tx_year" name="tx_year">';
				if($total_data>0)
				{
                	echo '<button type="button" class="btn btn-warning pull-right" onClick="fn.app.dashboard.transfer_year(this,'.$row['idp'].');">Transfer</button>';
				}
				else
				{
					echo '<button type="button" class="btn btn-default pull-right" ><i class="fa fa-exclamation-triangle" aria-hidden="true"></i> No Data</button>';
				}
				echo '<a href="../'.$row['ht_link'].'.html" target="_blank"><button type="button" class="btn btn-success pull-right">View</button></a>';
            echo '</div>';
            echo '<div id="collapse_'.$z.'" class="panel-collapse collapse " role="tabpanel" aria-labelledby="headingOne">';
                echo '<div class="panel-body">';
                        echo '<h3>Rental Rate </h3>';//<span class="label label-warning">New</span>
						$x=0;
                        foreach($data as $val)
                        {
							if($val['chk_text_val']==1)
							{
								if($x==0)echo '<div class="alert alert-danger" role="alert" style="padding:5px;"><strong><i class="fa fa-exclamation-triangle" aria-hidden="true"></i> The data is text type, may not support 100% transfer function.
Please make sure before continuing.</strong></div>';
								$vname = $val['date1'];
							}
							else
							{
								$vname = $val['date1'].' - '.$val['date2'];
							}
								echo '<h3><span class="label label-info">';
									echo $vname.'<br>';
								echo '</span></h3> ';
								for($i=1;$i<=28;$i++)
								{
									if($val['val'.$i.'']!='')
									{
										echo ' <span class="label label-default">';
											echo ' - '.$i.' Bedroom '.$val['val'.$i.''].'';
										echo '</span>';
									}
								}
                           
                            echo '<br><br>';
							$x++;
                        }
                echo '</div>';
            echo '</div>';
        echo '</div>';
        
        
        //echo $row['id'].'--'.$row['name'].'<br>';
        
        $z++;
    }
}
if($z==0)
{
	echo '<div class="alert alert-default" role="alert"><i class="fa fa-exclamation-circle" aria-hidden="true"></i> No data</div>';
}
?>

  
</div>
