 <div class="col-md-12 mg-room-fecilities " style="    margin-top: -10px;">
    <h3 class="mg-sec-left-title l15">Bedrooms </h3>
    <div class="row bggray">
        <div class="col-md-12 nopad">
        <?php 
            $b=0;
            foreach(json_decode($room['bedfac']) as $bedr)
            {
                $sqlicon_bed = $dbc->Query("select * from icons where id=".$bedr);
                $icon_bed = $dbc->Fetch($sqlicon_bed);
				
				$ex1 = explode("photo",json_decode($icon_bed['icon'],true));
				$ex_name = explode("_",$ex1[1]);
				$svg = explode(".",$ex_name[1]);
				
                echo '<div class="col-xs-6 col-md-4">';
                    echo '<ul class="bedr">';
                        //echo '<li><img data-src="'.json_decode($icon_bed['icon'],true).'" class="micon lazy" alt="'.$icon_bed['name'].'"> '.$icon_bed['name'].'  </li>';
						$ar_new = array('2617','2009','2004');
						if(in_array($icon_bed['id'],$ar_new))
						{
							//echo '<image xlink:href="' .  S3_BUCKET_URL .''.json_decode($fes_r['icon_bed'],true).'"  width="30" height="30" />';
							echo '<li class="fo15"><image  data-src="' . S3_BUCKET_URL . ''.json_decode($icon_bed['icon'],true).'" alt="'.$icon_bed['name'].'"  class="micon lazy" style="width: 34px !important;height: 32px;margin-left: -5px;" /> '.$icon_bed['name'].'</li>';
						}
						else
						{
							if($icon_bed['created']>date("2019-01-01"))
							{
								echo '<li class="fo15"><image  data-src="' . S3_BUCKET_URL . ''.json_decode($icon_bed['icon'],true).'" alt="'.$icon_bed['name'].'"  class="micon lazy" style="width: 34px !important;height: 32px;margin-left: -5px;" /> '.$icon_bed['name'].'</li>';
							}
							else
							{
								echo '<li class="fo15"><image  data-src="' . S3_BUCKET_URL . '/upload/icons/'.$svg[0].'.svg" alt="'.$icon_bed['name'].'"  class="micon lazy" style="width: 34px !important;height: 32px;margin-left: -5px;" /> '.$icon_bed['name'].'</li>';
							}
							//echo '<li class="fo15"><image  data-src="' . S3_BUCKET_URL . '/upload/icons/'.$svg[0].'.svg" alt="'.$icon_bed['name'].'"  class="micon lazy" style="width: 34px !important;height: 32px;margin-left: -5px;" /> '.$icon_bed['name'].'</li>';
						}
						
                    echo '</ul>';
                echo '</div>';
                $b++;
                if(($b%3)==0)
                {
                    echo '</div><div class="col-md-12 nopad">';
                }
            }
        ?>
        </div>
    </div>
</div> 

