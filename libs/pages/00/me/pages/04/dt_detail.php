<div class="col-md-12 mg-room-fecilities ">
    <h3 class="mg-sec-left-title l15">Highlight Features</h3>
    <div class="row bggray">
        <div class="col-md-12 nopad">
        <?php 
            $b=0;
            foreach(json_decode($room['features']) as $feat)
            {
                $sqlicon_feat = $dbc->Query("select * from icons where id=".$feat);
                $icon_feat = $dbc->Fetch($sqlicon_feat);
                echo '<div class="col-xs-6 col-md-4">';
                    echo '<ul class="bedr">';
                        echo '<li><img data-src="'.json_decode($icon_feat['icon'],true).'" class="micon lazy" alt="'.$icon_feat['name'].'"> '.$icon_feat['name'].'  </li>';
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
                echo '<div class="col-xs-6 col-md-4">';
                    echo '<ul class="bedr">';
                        echo '<li><img data-src="'.json_decode($icon_app['icon'],true).'" class="micon lazy" alt="'.$icon_app['name'].'"> '.$icon_app['name'].'  </li>';
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



<?php /*?> <div class="col-md-12 mg-room-fecilities ">
    <h2 class="mg-sec-left-title l15">Facilities </h2>
    <div class="row bggray" >
        <div class="col-md-12 nopad ">
            <?php 
                $a=0;
                if(json_decode($room['facilities'])=='')
                {
                    echo '&nbsp;&nbsp; -';
                }
                else
                {
                    foreach(json_decode($room['facilities']) as $fea)
                    {
                        //$icon_fea = $dbc->GetRecord("icons","*","id=".$fea);
                        $sqlicon_fea = $dbc->Query("select * from icons where id=".$fea);
                        $icon_fea = $dbc->Fetch($sqlicon_fea);
                        echo '<div class="col-xs-6 col-md-4">';
                        echo '<ul class="bedr">';
                        echo '<li><img src="'.json_decode($icon_fea['icon'],true).'" class="micon"> '.$icon_fea['name'].'  </li>';
                        echo '</ul>';
                        echo '</div>';
                        $a++;
                        if(($a%3)==0)
                        {
                            echo '</div><div class="col-md-12 nopad">';
                        }
                    }
                }
            ?>
        </div>  
    </div>
</div><?php */?>

<!--<div class="col-md-12">
    <br>
</div>-->



<!-- <div class="col-md-12">
    <br>
</div>-->





<?php 

?>
<?php /*?><pre>
<?php 
print_r($cate1);
?>
</pre>
<pre>
<?php 
print_r($cate2);
?>
</pre>
<pre>
<?php 
print_r($cate3);
?>
</pre>
<pre>
<?php 
print_r($cate4);
?>
</pre><?php */?>
