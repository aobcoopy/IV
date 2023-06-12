<style type="text/css">
.buttonGreen{
    font-family:Arial, Helvetica, sans-serif;  
    line-height: 14px; 
    font-size: 12px;
    font-weight: bold;
    color: #008000;        
    cursor: pointer;
    padding: 5px 5px 5px 5px; 
    border:2px solid #008000;
    -moz-border-radius: 5px;
    border-radius: 5px;
    -webkit-box-shadow: 1px 1px 2px 0px rgba(50, 50, 50, 0.75);
    -moz-box-shadow:    1px 1px 2px 0px rgba(50, 50, 50, 0.75);
    box-shadow:         1px 1px 2px 0px rgba(50, 50, 50, 0.75);    
}
.buttonGreen:hover {
    margin: 1px 9px -1px 0px;
    -webkit-box-shadow: 0px 0px 0px 0px rgba(50, 50, 50, 0.75);
    -moz-box-shadow:    0px 0px 0px 0px rgba(50, 50, 50, 0.75);
    box-shadow:         0px 0px 0px 0px rgba(50, 50, 50, 0.75); 
} 
.buttonGreen.left {
    float:left;
    text-align: left;
    margin-left: 10px;
}
.buttonGreen.right {
    float:right;
    text-align: right;
    margin-right: 10px;
}
.buttonGreen.center {
  margin-left: auto ;
  margin-right: auto ;
}
.buttonBlue{
    font-family:Arial, Helvetica, sans-serif;  
    line-height: 14px; 
    font-size: 12px;
    font-weight: bold; 
    color: #000080;        
    cursor: pointer;
    padding: 5px 5px 5px 5px; 
    border:2px solid #000080;
    -moz-border-radius: 5px;
    border-radius: 5px;
    -webkit-box-shadow: 1px 1px 2px 0px rgba(50, 50, 50, 0.75);
    -moz-box-shadow:    1px 1px 2px 0px rgba(50, 50, 50, 0.75);
    box-shadow:         1px 1px 2px 0px rgba(50, 50, 50, 0.75);    
}
.buttonBlue:hover {
    margin: 1px 9px -1px 0px;
    -webkit-box-shadow: 0px 0px 0px 0px rgba(50, 50, 50, 0.75);
    -moz-box-shadow:    0px 0px 0px 0px rgba(50, 50, 50, 0.75);

    box-shadow:         0px 0px 0px 0px rgba(50, 50, 50, 0.75); 
} 
.buttonBlue.left {
    float:left;
    text-align: left;
    margin-left: 10px;
}
.buttonBlue.right {
    float:right;
    text-align: right;
    margin-right: 10px;
}
.buttonBlue.center {
  margin-left: auto ;
  margin-right: auto ;
}

/* Checkbox Switch START */  
    .onoffswitch {
        position: relative; width: 85px;
        -webkit-user-select:none; -moz-user-select:none; -ms-user-select: none;
    }
    .onoffswitch-checkbox {
        display: none;
    }
    .onoffswitch-label {
        display: block; overflow: hidden; cursor: pointer;
        border: 2px solid #999999; border-radius: 5px;
    }
    .onoffswitch-inner {
        display: block; width: 200%; margin-left: -100%;
        transition: margin 0.3s ease-in 0s;
    }
    .onoffswitch-inner:before, .onoffswitch-inner:after {
        display: block; float: left; width: 50%; height: 24px; padding: 0; line-height: 24px;
        font-size: 10px; color: white; font-family: Trebuchet, Arial, sans-serif; font-weight: bold;
        box-sizing: border-box;
    }
    .onoffswitch-inner:before {
        content: "parameter";
        padding-left: 5px;
        background-color: #34A7C1; color: #FFFFFF;
    }
    .onoffswitch-inner:after {
        content: "slug";
        padding-right: 20px;
        background-color: #AFEB6F; color: #000000;
        text-align: right;
    }
    .onoffswitch-switch {
        display: block; width: 18px; margin: 3px;
        background: #FFFFFF;
        position: absolute; top: -5px; bottom: 0;
        right: 57px;
        border: 2px solid #999999; border-radius: 5px;
        transition: all 0.3s ease-in 0s; 
    }
    .onoffswitch-checkbox:checked + .onoffswitch-label .onoffswitch-inner {
        margin-left: 0;
    }
    .onoffswitch-checkbox:checked + .onoffswitch-label .onoffswitch-switch {
        right: 0px; 
    }
/* Checkbox Switch END */
</style>
<?php
    
    function showForm($dbc){
        
        $channelString = getChannelString();        
        
        if( $channelString != ""){
            
            $channelArray = explode("|", $channelString);
            
            $_REQUEST['des'] = $channelArray[0];
            $subdestination_id = $channelArray[1];
            $roomID = $channelArray[2];
            $categoryID = $channelArray[3];
            
        }
        
        $arrayThisChannel_UrlVariables = getSlugStructureForChannel($dbc, $channelString);
        
        if( is_array($arrayThisChannel_UrlVariables) ){
            
            $arrayUrlStructure = $arrayThisChannel_UrlVariables;
            $defaultUrlStructure = 0;
            
        } else { 
            
            $arrayUrlStructure = getDefaultSlugStructure($dbc);
            $defaultUrlStructure = 1;
            
        }    
        
?>
<script language="JavaScript">
<!--

    function showDestination(destination) 
    {
      window.location.href = "/back/?app=parameters&des=" + destination.options[destination.selectedIndex].value;
    }  

    function showSubdestination(subdestination, destination) 
    {
      window.location.href = "/back/?app=parameters&des=" + destination + "&sub=" + subdestination.options[subdestination.selectedIndex].value;
    }  

    function showRooms(rooms, destination, subdestination) 
    {
      window.location.href = "/back/?app=parameters&des=" + destination + "&sub=" + subdestination + "&room=" + rooms.options[rooms.selectedIndex].value;
    }  

    function showCollections(cate, destination, subdestination, rooms) 
    {
      window.location.href = "/back/?app=parameters&des=" + destination + "&sub=" + subdestination + "&room=" + rooms + "&cate=" + cate.options[cate.selectedIndex].value;
    } 
    
    function hideURL() {
     
        var x = document.getElementById("printURL");

        if (x.style.display !== "none") {

            x.style.display = "none";
            
        }
    }
  
//-->
</script>

<div class="col-md-12">

    <div class="col-md-12" style="border-style: double; border-color: #E72318; max-width: 400px; padding: 5px; text-align: center; margin-bottom: 15px;">
        <div style="font-weight: bold;">Select a <span style="text-decoration: underline;">channel combination</span> from below and set up a rule that defines how the variables are passed on for this particular search page.<div style="clear:both; height: 12px;"></div><span style="text-decoration: underline;">Neighborhood, Bedroom, Collection & Sort Variables</span><br>can be sent by <br><span style="text-decoration: underline;">URL slug</span> or <span style="text-decoration: underline;">parameter</span>.</div>
    </div> 

    <div style="clear:both; height: 10px;"></div>

    <div style="font-size: 16px; font-weight: bold; padding: 0 0 30px 3px;">
<?php if( $defaultUrlStructure == 0 ){ ?><span style="color: #FF8080;">This channel combination is currently using the following rule</span><?php } elseif( $defaultUrlStructure == 1 ){ ?><span style="color: #808000;">This channel combination is using the <span style="text-decoration: underline;">default URL rule</span>.<br>You can define an individual rule here:</span><?php } ?>
    </div>

    <div style="clear:both;"></div>

<div style="padding: 0 0 3px 3px;">

<form name="saveFilter" action="/back/?app=parameters" method="POST">
                       
<div class="form-group">

        <!-- switch START -->
        <div style="float: left; padding: 2px 15px 0 0;" title="cannot be changed" onclick="alert('Destinations can only use slugs')">
            <div class="onoffswitch" style="float: left;">
                <!--<input type="checkbox" name="destinationSwitch" class="onoffswitch-checkbox" id="destinationSwitch" checked>-->
                <label class="onoffswitch-label" for="destinationSwitch">
                    <span class="onoffswitch-inner"></span>
                    <span class="onoffswitch-switch"></span>
                </label>
            </div>
        </div>    
        <!-- switch END --> 

        <select name="des" id="des" class="form-control" style="width: 200px;" onChange="showDestination(this);">
            <option value="all">All Destinations</option>                                                            
<?php 

        $sql_destinations = $dbc->Query("select * from destinations where parent IS NULL ORDER BY name"); 
        
        while($destination = $dbc->Fetch($sql_destinations))        
        {
            if( !isset($_REQUEST['des']) || $_REQUEST['des'] == "") $actt = ( isset($destination_id) && $destination_id == $destination['id'])?' selected':'';
            else  $actt = ( $_REQUEST['des'] == $destination['id'])?' selected':'';
            
            echo '<option value="'.$destination['id'].'"'.$actt.'>'.$destination['name'].'</option>'."\n            ";
        }
        
        if( isset($_REQUEST['sub']) && $_REQUEST['sub'] != "" && $_REQUEST['sub'] != "all" ) $subdestination_id = $_REQUEST['sub'];
        else $subdestination_id = "";
                
?>
        </select>
              

</div>
        
<div class="form-group">

        <!-- switch START -->
        <div style="float: left; padding: 2px 15px 0 0;">
            <div class="onoffswitch" style="float: left;">
                <input type="checkbox" name="arrayUrlStructure[NEIGHBORHOOD]" class="onoffswitch-checkbox" id="subdestinationSwitch" value="par"<?php if( $arrayUrlStructure['NEIGHBORHOOD'] == 'par') echo " checked" ?>> 
                <label class="onoffswitch-label" for="subdestinationSwitch" onclick="hideURL()">
                    <span class="onoffswitch-inner"></span>
                    <span class="onoffswitch-switch"></span>
                </label>
            </div>
        </div>    
        <!-- switch END -->

        <select name="sub" id="sub" class="form-control" style="width: 200px;" onChange="showSubdestination(this, '<?php echo $_REQUEST['des'] ?>');">
            <option value="all">All Areas</option>
<?php 
        
        if( isset($destination_id) && (!isset($_REQUEST['des']) || $_REQUEST['des'] == "") ) $sql_subdestinations = $dbc->Query("select * from destinations where parent = '" . $destination_id . "' ORDER BY name"); 
        else $sql_subdestinations = $dbc->Query("select * from destinations where parent = '" . $_REQUEST['des'] . "' ORDER BY name"); 
        
        while($subdestination = $dbc->Fetch($sql_subdestinations))        
        {   
            $actt = ( isset($subdestination_id) && $subdestination_id == $subdestination['id'])?' selected':'';
            echo '<option value="'.$subdestination['id'].'"'.$actt.'>'.ucwords( str_replace("-", " ", $subdestination['slug']) ).'</option>'."\n            ";
        }
                
?>
        </select>

</div>

        
<div class="form-group">

        <!-- switch START -->
        <div style="float: left; padding: 2px 15px 0 0;">
            <div class="onoffswitch" style="float: left;">
                <input type="checkbox" name="arrayUrlStructure[PRICE]" class="onoffswitch-checkbox" id="priceSwitch" value="par"<?php if( $arrayUrlStructure['PRICE'] == 'par') echo " checked" ?>> 
                <label class="onoffswitch-label" for="priceSwitch">
                    <span class="onoffswitch-inner"></span>
                    <span class="onoffswitch-switch"></span>
                </label>
            </div>
        </div>    
        <!-- switch END -->

        <input type="text" class="form-control" id="sort" name="title" value="Price" style="width: 200px; background: #F9F9F9; color: #555;" readonly>

</div>

       
<div class="form-group">

        <!-- switch START -->
        <div style="float: left; padding: 2px 15px 0 0;">
            <div class="onoffswitch" style="float: left;">
                <input type="checkbox" name="arrayUrlStructure[ROOMS]" class="onoffswitch-checkbox" id="bedroomSwitch" value="par"<?php if( $arrayUrlStructure['ROOMS'] == 'par') echo " checked" ?>>
                <label class="onoffswitch-label" for="bedroomSwitch" onclick="hideURL()">
                    <span class="onoffswitch-inner"></span>
                    <span class="onoffswitch-switch"></span>
                </label>
            </div>
        </div>    
        <!-- switch END -->

        <select name="room" id="room" class="form-control" style="width: 200px;" onChange="showRooms(this, '<?php echo $_REQUEST['des'] ?>', '<?php echo $_REQUEST['sub'] ?>');">
            <option value="all">All Bedrooms</option>
<?php                      

            $destination = "";
            $subdestination = "";
            $bedroomIdArray = [];
            
            if( isset($_REQUEST['des']) && $_REQUEST['des'] != 'all' && $_REQUEST['des'] != '')
            {
                $destination = "WHERE properties.destination = '".$_REQUEST['des']."'";
            }
            
            if( isset($_REQUEST['sub']) && $_REQUEST['sub'] != 'all' && $_REQUEST['sub'] != '')
            {
                $subdestination = "AND properties.subdestination = '".$_REQUEST['sub']."'";
            }           
 
            $sql_rooms =$dbc->Query("SELECT
                properties.id AS id,
                properties.`name` AS `name`,
                properties.destination AS des,
                properties.subdestination AS sub,
                property_room.room AS room
                FROM
                properties
                LEFT JOIN property_room ON properties.id = property_room.property
                ".$destination." ".$subdestination."
                /*AND properties.`status` > 0*/
            ");
           
            while($row = $dbc->Fetch($sql_rooms))
            {
                if(!in_array($row['room'],$bedroomIdArray))
                {
                    array_push($bedroomIdArray,$row['room']);
                }
            }
            sort($bedroomIdArray); 
 
            $sql_allrooms = $dbc->Query("select * from bedroom ORDER BY name"); 
            
            while($room = $dbc->Fetch($sql_allrooms))
            {   
                if( in_array($room['id'], $bedroomIdArray)){
                    
                    $actt = ( isset($_REQUEST['room']) && $_REQUEST['room'] == $room['id'])?' selected':'';                                  
                    echo '<option value="'.$room['id'].'"'.$actt.'>'.$room['name'].'</option>'."\n            ";
                }
            }   
                
?>
           
        </select>

</div>
        
<div class="form-group">

        <!-- switch START -->
        <div style="float: left; padding: 2px 15px 0 0;">
            <div class="onoffswitch" style="float: left;">
                <input type="checkbox" name="arrayUrlStructure[COLLECTION]" class="onoffswitch-checkbox" id="collectionSwitch" value="par"<?php if( $arrayUrlStructure['COLLECTION'] == 'par') echo " checked" ?>>
                <label class="onoffswitch-label" for="collectionSwitch" onclick="hideURL()">
                    <span class="onoffswitch-inner"></span>
                    <span class="onoffswitch-switch"></span>
                </label>
            </div>
        </div>    
        <!-- switch END -->

        <select name="cate" id="cate" class="form-control" style="width: 200px;" onChange="showCollections(this, '<?php echo $_REQUEST['des'] ?>', '<?php echo $_REQUEST['sub'] ?>', '<?php echo $_REQUEST['room'] ?>');">
            <option value="0">All Villa Types</option>
<?php 

            $bedrooms = "";
            $collectionIdArray = [];
            $collectionIdArray_chk = [];
            
            
            if( isset($_REQUEST['room']) && $_REQUEST['room'] != 'all' && $_REQUEST['des'] != '' && $_REQUEST['sub'] != '' )
            {
                $bedrooms = "AND property_room.room = '".$_REQUEST['room']."'";
            }              
            
            $sql_collection = $dbc->Query("SELECT
                properties.id,
                properties.`name` AS `name`,
                property_cate.caategory AS cate,
                property_room.room AS room,
                properties.destination AS des,
                properties.subdestination AS subdes,
                categories.`brief` AS collection_name,
                categories.`id` AS collection_id,
                categories.`status` AS cstatus,
                categories.`sort` 
                FROM
                properties
                INNER JOIN property_cate ON properties.id = property_cate.property
                INNER JOIN property_room ON properties.id = property_room.property
                INNER JOIN categories ON property_cate.caategory = categories.id
                /*".$destination." ".$subdestination." ".$bedrooms."*/
/*                AND properties.`status` > 0
                AND categories.`status` > 0*/
            ");           
           
            while($row = $dbc->Fetch($sql_collection))
            {
                
                if(!in_array($row['room'],$collectionIdArray))
                {
                    array_push($collectionIdArray, $row['collection_id'] ) ;
                }                
            }
            ksort($collectionIdArray);                    
 
            $sql_category = $dbc->Query("select * from categories");
            
            while($category = $dbc->Fetch($sql_category))
            {
                if( in_array($category['id'], $collectionIdArray)){
                    
                    $actt = ( isset($_REQUEST['cate']) && $_REQUEST['cate'] == $category['id'])?' selected':''; 
                    echo '<option value="'.$category['id'].'"'.$actt.'>'.$category['brief'].'</option>'."\n            ";
                }
            }
?>
           
        </select>

</div>

<div class="form-group">

        <!-- switch START -->
        <div style="float: left; padding: 2px 15px 0 0;">
            <div class="onoffswitch" style="float: left;">
                <input type="checkbox" name="arrayUrlStructure[SORT]" class="onoffswitch-checkbox" id="sortSwitch" value="par"<?php if( $arrayUrlStructure['SORT'] == 'par') echo " checked" ?>>
                <label class="onoffswitch-label" for="sortSwitch" >
                    <span class="onoffswitch-inner"></span>
                    <span class="onoffswitch-switch"></span>
                </label>
            </div>
        </div>   
        <!-- switch END -->
        
        <input type="text" class="form-control" id="sort" name="title" value="Sort" style="width: 200px; background: #F9F9F9; color: #555;" readonly>
        
</div>

<?php
    
    //$searchResult_URL = variables_to_URL($dbc, $channelString, $arrayUrlStructure);
    $searchResult_URL = URL_builder_for_parameters($dbc, $channelString, $arrayUrlStructure);
    
?>
 
<div style="clear:both; height: 10px;"></div> 

<div class="col-md-12" style="border-style: double; border-color: #E72318; max-width: 400px; padding: 5px; text-align: center; margin-top: 20px;">
    <?php if( $defaultUrlStructure == 0 ) { ?><div style="font-weight: bold;"><div id="printURL" title="<?php echo _URL_LINK.$searchResult_URL ?>">The URL for this search page is set to '<span style="text-decoration: underline;"><a href="<?php echo _URL_LINK.$searchResult_URL ?>" target="blank"><?php echo _URL_LINK.$searchResult_URL ?></a></span>'<br></div><br><?php } ?>
    <input value="Click here to <?php if( $defaultUrlStructure == 0 ) echo "update"; else echo "save"; ?> this parameter rule" type="submit" name="submit" id="sendButton" class="buttonGreen center" title="Click here to <?php if( $defaultUrlStructure == 0 ) echo "update"; else echo "save"; ?> this parameter rule"></div><br>
</div>

<?php if( isset($arrayUrlStructure['ID']) ){ ?>
<input name="parameterRuleID" value="<?php echo $arrayUrlStructure['ID'] ?>" type="hidden">
<input name="option" value="update" type="hidden">
<?php } else { ?>
<input name="option" value="insert" type="hidden">
<?php } ?>

</form>

</div>

<div style="clear:both; height: 10px;"></div>

<?php

        if( $defaultUrlStructure == 0 ){    
            
?>

<div style="font-weight: bold; text-align: center; max-width: 400px; color: #000080; padding: 20px 0 3px 0;">OR</div>

<div style="clear:both;"></div>

<form name="deleteParameterRule" action="/back/?app=parameters&view=show_parameters" method="POST">

    <div class="col-md-12" style="border-style: double; border-color: #E72318; max-width: 400px; padding: 30px; text-align: center; margin-top: 20px;">
        <input value="Delete the URL rule for this channel combination" type="submit" name="submit" id="sendButton" class="buttonBlue center" title="Delete the URL rule for this channel combination"></div><br>
    </div>

    <input name="option" value="delete" type="hidden">
    <input name="parameterRuleID" value="<?php echo $arrayUrlStructure['ID'] ?>" type="hidden">

</form>

<div style="clear:both;"></div>                

<?

        }   

    }  
    
    function addOne($count)
    {
        
        if( $count == 0) $num = 0;
        else $num++;
        
        return $num;
    } 
    
    function insertParameterRules($dbc, $channelString)
    {

        $channelValues = explode("|", $channelString);
        
        $destination_value = " destination_value = '" . $channelValues[0] . "'";
        $neighborhood_value = " neighborhood_value = '" . $channelValues[1] . "'";
        $bedroom_value = " bedroom_value = '" . $channelValues[2] . "'";
        $collection_value = " collection_value = '" . $channelValues[3] . "'";         
        
        $sql_parameter_rules = $dbc->Query("SELECT * FROM parameter_rules WHERE " . $destination_value . " AND  " . $neighborhood_value . " AND  " . $bedroom_value . " AND  " . $collection_value . " AND id != '1'"); 
        $numParameterRules = $dbc->Getnum($sql_parameter_rules); 

        if( $numParameterRules == 0 ){
            
            $countSlugs = 0;
            
            // region is always slug, sort is always parameter
            $data = array(
                "country_value" => "0",
                "destination_value" => $channelValues[0],
                "neighborhood_value" => $channelValues[1],
                "price_value" => 'all',
                "bedroom_value" => $channelValues[2],
                "collection_value" => $channelValues[3],
                "sort_value" => 0,
                "region_variable" => $countSlugs++,
                "neighborhood_variable" => $_POST['arrayUrlStructure']['NEIGHBORHOOD'] == "par" ? 'par' : $countSlugs++,
                "price_variable" => $_POST['arrayUrlStructure']['PRICE'] == "par" ? 'par' : $countSlugs++,
                "rooms_variable" => $_POST['arrayUrlStructure']['ROOMS'] == "par" ? 'par' : $countSlugs++,
                "collection_variable" => $_POST['arrayUrlStructure']['COLLECTION'] == "par" ? 'par' : $countSlugs++,
                "sort_variable" => $_POST['arrayUrlStructure']['SORT'] == "par" ? 'par' : $countSlugs++,
                "#created_at" => "NOW()"
            ); 
            
            $dbc->Insert("parameter_rules", $data,"id='" . $_POST['parameterRuleID'] . "'");            
            
?>
<div class="col-md-12">

    <div style="font-size: large; font-weight: bold; color: #E72318; padding: 0 0 30px 3px;">A parameter rule has been successfully added!</div>

</div>

<?php  
            
        } elseif( $numParameterRules > 0 ) die("ERROR 32578");
        
    }    
    
    function updateParameterRules($dbc)
    {

        $sql_parameter_rules = $dbc->Query("select * from parameter_rules where id = '" . $_POST['parameterRuleID'] . "'"); 
        $numParameterRules = $dbc->Getnum($sql_parameter_rules);   

        if( $numParameterRules == 0 || $numParameterRules > 1 ){
            
?>
<div class="col-md-12">

    <div style="font-size: large; font-weight: bold; color: #E72318; padding: 0 0 30px 3px;">ERROR 521783</div>

</div>
<?php                       
               
        } elseif( $numParameterRules == 1 ){ 
            
            $countSlugs = 0;

            // region is always slug, sort is always parameter
            $data = array(
                "region_variable" => $countSlugs++,
                "neighborhood_variable" => $_POST['arrayUrlStructure']['NEIGHBORHOOD'] == "par" ? 'par' : $countSlugs++,
                "price_variable" => $_POST['arrayUrlStructure']['PRICE'] == "par" ? 'par' : $countSlugs++,
                "rooms_variable" => $_POST['arrayUrlStructure']['ROOMS'] == "par" ? 'par' : $countSlugs++,
                "collection_variable" => $_POST['arrayUrlStructure']['COLLECTION'] == "par" ? 'par' : $countSlugs++,
                "sort_variable" => $_POST['arrayUrlStructure']['SORT'] == "par" ? 'par' : $countSlugs++,
                "#updated_at" => "NOW()"
            );        
        
            $dbc->Update("parameter_rules", $data,"id='" . $_POST['parameterRuleID'] . "'");            
            
?>
<div class="col-md-12">

    <div style="font-size: large; font-weight: bold; color: #E72318; padding: 0 0 30px 3px;">The parameter rule has been successfully updated!</div>

</div>
<?php  
            
        } 
        
    }      
    
    switch($_REQUEST['option'])
    {
        case "insert":
        
        $channelString = $_REQUEST['des'] . "|" . $_REQUEST['sub'] . "|" . $_REQUEST['room'] . "|" . $_REQUEST['cate'];
        
        insertParameterRules($dbc, $channelString);

        showForm($dbc);

        break;
        

        case "update":    
        
        updateParameterRules($dbc);

        showForm($dbc);

        break;

        
        default:
    
        showForm($dbc);

        break;

    } 
    // end switch
        
?>