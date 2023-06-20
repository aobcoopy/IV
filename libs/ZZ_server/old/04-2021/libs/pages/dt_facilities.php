<div class="col-md-12 mg-room-fecilities ">
    <h3 class="mg-sec-left-title l15">Facilities</h3>
    <div class="row bggray">
        <div class="col-md-12 nopad">
            <?php 
            $c=0;
            foreach(json_decode($room['appliances']) as $appl)
            {
                //$icon_app = $dbc->GetRecord("icons","*","id=".$appl);
                $sqlicon_app = $dbc->Query("select * from icons where id=".$appl);
                $icon_app = $dbc->Fetch($sqlicon_app);
				
				$ex1 = explode("photo",json_decode($icon_app['icon'],true));
				$ex_name = explode("_",$ex1[1]);
				$svg = explode(".",$ex_name[1]);
               // print_r(S3_BUCKET_URL);
                echo '<div class="col-xs-6 col-md-4">';
                    echo '<ul class="bedr">';
                        //echo '<li><img data-src="'.json_decode($icon_app['icon'],true).'" class="micon lazy" alt="'.$icon_app['name'].'"> '.$icon_app['name'].'  </li>';
						$ar_new = array('2001','2003','2002','2005','2008','2007','2006');
						if(in_array($icon_app['id'],$ar_new))
						{
							//echo '<image xlink:href="' .  S3_BUCKET_URL .''.json_decode($fes_r['icon_bed'],true).'"  width="30" height="30" />';
							echo '<li class="fo15"><image  data-src="' . S3_BUCKET_URL . ''.json_decode($icon_app['icon'],true).'" alt="'.$icon_app['name'].'"  class="micon lazy" style="width: 34px !important;height: 32px;margin-left: -5px;" /> '.$icon_app['name'].'</li>';
						}
						else
						{
							if($icon_app['created']>date("2019-01-01"))
							{
								echo '<li class="fo15"><image  data-src="' . S3_BUCKET_URL . ''.json_decode($icon_app['icon'],true).'" alt="'.$icon_app['name'].'"  class="micon lazy" style="width: 34px !important;height: 32px;margin-left: -5px;" /> '.$icon_app['name'].'</li>';
							}
							else
							{
								echo '<li class="fo15"><image  data-src="' . S3_BUCKET_URL . '/upload/icons/'.$svg[0].'.svg" alt="'.$icon_app['name'].'"  class="micon lazy" style="width: 34px !important;height: 32px;margin-left: -5px;" /> '.$icon_app['name'].'</li>';
							}
							
						}
						
						//echo '<li  class="fo15"><image  data-src="' . S3_BUCKET_URL . '/upload/icons/'.$svg[0].'.svg" alt="'.$icon_app['name'].'"  class="micon lazy" style="width: 34px !important;height: 32px;margin-left: -5px;" /> '.$icon_app['name'].'</li>';
                    echo '</ul>';
                echo '</div>';
                $c++;
                if(($c%3)==0)
                {
                    echo '</div><div class="col-md-12 nopad">';
                }
            }
            ?>
        </div>
    </div>
</div>
