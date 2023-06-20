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
				
				$ex1 = explode("photo",json_decode($icon_feat['icon'],true));
				$ex_name = explode("_",$ex1[1]);
				$svg = explode(".",$ex_name[1]);
										
                echo '<div class="col-xs-6 col-md-4 ">';
                    echo '<ul class="bedr">';
                        //echo '<li><img data-src="'.json_decode($icon_feat['icon'],true).'" class="micon lazy" alt="'.$icon_feat['name'].'"> '.$icon_feat['name'].'  </li>';
						echo '<li class="fo15"><image  data-src="' . S3_BUCKET_URL . '/upload/icons/'.$svg[0].'.svg" alt="'.$icon_feat['name'].'"  class="micon lazy" style="width: 34px !important;height: 32px;margin-left: -5px;" /> '.$icon_feat['name'].'</li>';
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
