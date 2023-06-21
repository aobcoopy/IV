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
                                echo '<li> '.$icon_app['name'].'  </li>';
                            echo '</ul>';
                        echo '</div>';
                        
                    }
                ?>
            </div>
        </div>
        <?php
    }
?>