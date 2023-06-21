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
                echo '<div class="col-xs-6 col-md-4">';
                    echo '<ul class="bedr">';
                        echo '<li><img data-src="'.json_decode($icon_bed['icon'],true).'" class="micon lazy" alt="'.$icon_bed['name'].'"> '.$icon_bed['name'].'  </li>';
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

