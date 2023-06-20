 <?php 
    if(count(json_decode($room['address_map'],true))<=0)
    {
    }
    else
    {
        ?>
        
        <div class="col-md-12 mg-room-fecilities ">
            <h3 class="mg-sec-left-title l15">Travel Time</h3>
            <div class="row">
                <?php 
                    foreach(json_decode($room['address_map']) as $appl)
                    {
                        //$icon_app = $dbc->GetRecord("icons","*","id=".$appl);
                        $sqlicon_app = $dbc->Query("select * from icons where id=".$appl);
                        $icon_app = $dbc->Fetch($sqlicon_app);
                        echo '<div class="col-xs-6 col-md-6">';
                            echo '<ul class="bedr">';
                                echo '<li  class="fo15"> '.$icon_app['name'].'  </li>';
                            echo '</ul>';
                        echo '</div>';
						
						if($icon_app['la']!='' && $icon_app['ln']!='')
						{
							$icnmap = $icon_app['iconmap'];
							$expo = explode("/",$icnmap);
							$expo_2 = explode(".",$expo[6]);
							$iname = $expo_2[0];
					
							$arr_loca[] = array(
								'la' => $icon_app['la'],
								'ln' => $icon_app['ln'],
								'icon' => $iname,
								'name' =>$icon_app['name']
							);
						}
                        
                    }
                ?>
            </div>
        </div>
        <?php
    }
	
	/*echo '<pre>';
	print_r($arr_loca);
	echo '</pre>';*/
	
	/*$ar_icon = array();
	for($i=0;$i<28;$i++)
	{
		$arr_pic = ["Adventure","airport","Aquarium","beach","boat","buddha","cam","canyon","castle","Crocodile","Farm","golf","hospital","museum","Office","Restaurants","rocks","shopping","sport","town","Transport","Walking_Street","Water_Park","waterfall","water_rollerball","water_ski","yacht","zoo"];
		array_push(
			$ar_icon[] = array(
				'name' => $arr_pic[$i],
				'icon' => '../../../../upload/map/ok/'.$arr_pic[$i].'.png'
			),$ar_icon
		);
	}*/
	
	/*echo '<pre>';
	print_r($ar_icon);
	echo '</pre>';*/
	
	
	include "libs/pages/dt_map.php";
?>