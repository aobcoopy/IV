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
</style>

<?php   

    function listAllInclusionsForProperty($propertyID)
    {
        
        $propertyName_Exclusions_InclusionsFromID_Array = propertyName_Exclusions_InclusionsFromID($propertyID);  
        $propertyName = $propertyName_Exclusions_InclusionsFromID_Array[0];
        $inclusions = $propertyName_Exclusions_InclusionsFromID_Array[2];
        $includeArray = explode(";", $inclusions);
         
?>            
<div class="col-md-12">

    <div style="font-weight: bold; color: #000080; padding: 0 0 3px 3px;"><?php if( $inclusions != "" ){ ?>List of all 'most popular' rules for '<?php echo rtrim($propertyName, " ") ?>'<?php } else echo "No inclusion found for this property!"; ?></div>
        
<?php

        $countInclusions = 0;
        
        if( $inclusions != "" ){
          
            foreach ($includeArray as $inclusionString) {

                $countInclusions++;
                $channel = explode("|", $inclusionString);

                echo '        <div style="float: left; margin: 5px;">' . "\n            "; 
                echo '<form name="deleteInclusion" action="/back/?app=inclusions" method="POST">' . "\n            "; 
                echo "<br>Rule #" . $countInclusions . "<br>\n            "; 
                
                if( $channel[0] == "all") $destinationChannel = 'All Destinations';
                else $destinationChannel =  destination_name_slug($channel[0])[0];
                
                if( $channel[1] == "all") $subdestinationChannel = 'All Areas';
                else $subdestinationChannel =  subdestination_name_slug($channel[1])[0];
                
                echo '<div style="padding-left: 3px; border-style: solid; border-width: thin; width: 130px;  background-color: #E0E0E0;">' . $destinationChannel . '</div>' . "\n            "; 
                echo '<div style="padding-left: 3px; border-style: solid; border-width: thin; width: 130px;  background-color: #E0E0E0;">' . $subdestinationChannel . '</div>' . "\n            "; 
                echo '<div style="padding-left: 3px; border-style: solid; border-width: thin; width: 130px;  background-color: #E0E0E0;">' . bedroomNameFromID($channel[2]) . '</div>' . "\n            "; 
                echo '<div style="padding-left: 3px; margin-bottom: 5px; border-style: solid; border-width: thin; width: 130px;  background-color: #E0E0E0;">' . collectionNameFromID($channel[3]) . '</div>' . "\n\n            "; 
                
                echo '<input name="inclusionString" value="' . $inclusionString . '" type="hidden">' . "\n            ";            
                echo '<input name="propertyID" value="' . $propertyID . '" type="hidden">' . "\n            ";            
                //echo '<input name="app" value="inclusions" type="hidden">' . "\n            ";            
                echo '<input name="option" value="delete" type="hidden">' . "\n            ";            
                echo '<input name="dataset" value="' . $countInclusions . '" type="hidden">' . "\n            ";            

                echo '<input value="Delete rule # ' . $countInclusions . '" type="submit" name="submit" id="deleteInclusionSubmit" class="buttonGreen center" title="Delete rule # ' . $countInclusions . '">' . "\n"; 
                
                echo '            </form>' . "\n";
                echo '        </div>' . "\n"; 

            }
        }
            
        echo '<div style="clear:both; line-height: 20px;"></div>';
             
?>

<form name="addMoreInclusions" action="/back/?app=inclusions" method="POST">

    <div class="col-md-12" style="border-style: double; border-color: #E72318; max-width: 400px; padding: 30px; text-align: center; margin-top: 20px;">
        <input value="Add <?php if( $inclusions != "" ) echo "more "; ?>'most popular' rules to this property" type="submit" name="submit" id="sendButton" class="buttonGreen center" title="Add <?php if( $inclusions != "" ) echo "more "; ?>'most popular' rule to this property"></div><br>
    </div>

    <!--<input name="app" value="inclusions" type="hidden">-->
    <input name="propertyID" value="<?php echo $_REQUEST['propertyID'] ?>" type="hidden">

</form>

</div>            
            
<?php        
        
    } 
    
    function updateInclusionColumn_Add($inclusionString, $propertyID)
    {
        global $dbc;
        
        // read current entries
        $sql_properties = $dbc->Query("select include_in_search from properties where id = '" . $propertyID . "'");    
        list($include_in_search) = $dbc->Fetch($sql_properties);
        
        $includeArray = [];
        $includeArray = explode(";", $include_in_search);
        $includeArray[] = $inclusionString;
        
        $includeArray = array_unique($includeArray);
        $newInclusionString = ltrim( implode(";", $includeArray), ";" );
        
        $data = array(
            'include_in_search' => $newInclusionString,
            '#updated' => "NOW()"
        );        
        
        $dbc->Update("properties", $data,"id=" . $propertyID);
        
    }      
    
    function updateInclusionColumn_Remove($inclusionString, $propertyID)
    {
        global $dbc;
       
        // read current entries
        $sql_properties = $dbc->Query("select include_in_search from properties where id = '" . $propertyID . "'");    
        list($include_in_search) = $dbc->Fetch($sql_properties);
        
        $includeArray = [];
        $includeArray = explode(";", $include_in_search);
        
        // remove string from array
        if (($key = array_search($inclusionString, $includeArray)) !== false) {
            unset($includeArray[$key]);
        }        
        
        $newInclusionString = implode(";", $includeArray);
        
        if($newInclusionString == ""){
        
            $sql = "UPDATE properties SET include_in_search = NULL, updated=NOW() WHERE id=" . $propertyID;
            $dbc->Query($sql);
            
        } else {
            
            $data = array(
                'include_in_search' => $newInclusionString,
                '#updated' => "NOW()"
            );        
            
            $dbc->Update("properties", $data,"id=" . $propertyID);            
            
        }
        

        
    }      
    
    switch($_REQUEST['option'])
    {
        case "insert":
        
        $inclusionString = $_REQUEST['des'] . "|" . $_REQUEST['sub'] . "|" . $_REQUEST['room'] . "|" . $_REQUEST['cate'];
        
        updateInclusionColumn_Add($inclusionString, $_REQUEST['propertyID']);
      
?>            
<div class="col-md-12">

    <div style="font-size: large; font-weight: bold; color: #E72318; padding: 0 0 30px 3px;">A 'most popular' rule has successfully been added to this property!</div>

</div>            
            
<?php

        listAllInclusionsForProperty($_REQUEST['propertyID']);

        break;
        
        case "delete":
        
        updateInclusionColumn_Remove($_REQUEST['inclusionString'], $_REQUEST['propertyID']);
        
?>            
<div class="col-md-12">

    <div style="font-size: large; font-weight: bold; color: #E72318; padding: 0 0 30px 3px;">'Most popular' rule has successfully been deleted from this property!</div>

</div>            
<?php        
        
        listAllInclusionsForProperty($_REQUEST['propertyID']);
        
        break;
        
        default:
   
    
?>
<script language="JavaScript">
<!--
  
    function selectVilla(propertyID)
    {
        window.location.href = "/back/?app=inclusions&propertyID=" + propertyID;
    } 

    function showDestination(destination, propertyID) 
    {
      //document.getElementById('printDestination').innerHTML = destination.options[destination.selectedIndex].text;
      window.location.href = "/back/?app=inclusions&propertyID=" + propertyID + "&des=" + destination.options[destination.selectedIndex].value;
    }  

    function showSubdestination(subdestination) 
    {
      document.getElementById('printSubdestination').innerHTML = subdestination.options[subdestination.selectedIndex].text;
    }  

    function showRooms(rooms) 
    {
      document.getElementById('printRooms').innerHTML = rooms.options[rooms.selectedIndex].text;
    }  

    function showCollections(collection) 
    {
      document.getElementById('printCollections').innerHTML = collection.options[collection.selectedIndex].text;
    }  
  
//-->
</script>

<div class="col-md-12">
<div style="font-weight: bold; color: #000080; padding: 0 0 3px 3px;">Choose Villa:</div>
<div class="form-group">
        <select name="show_villas" id="show_villas" class="form-control" onchange="selectVilla(this.value);" style="max-width: 400px; height: 34px; border:0.1em solid #000080;">
            <option value="">choose villa to be included in 'most popular'</option>
<?php 

        $sql_property = $dbc->Query("select * from properties where status = '1' ORDER BY name");
        
        while($r_property = $dbc->Fetch($sql_property))
        {
            $actt = ( isset($_REQUEST['propertyID']) && $_REQUEST['propertyID'] == $r_property['id'])?' selected':'';
            echo '<option value="'.$r_property['id'].'"'.$actt.'>'.$r_property['name'].'</option>'."\n            ";
        }
?>
           
        </select>
</div>

<?php 

        if( isset($_REQUEST['propertyID']) && $_REQUEST['propertyID'] != "" ) { 
            
    
        $sql_property = $dbc->Query("select * from properties where id = '" .$_REQUEST['propertyID'] . "'");    
        $property = $dbc->Fetch($sql_property);
        
        $arr = explode("|", $property['name'], 2);
        $propertyName = $arr[0]; 
        
?>
<div class="col-md-12" style="border-style: double; border-color: #E72318; max-width: 400px; padding: 5px; text-align: center; margin-bottom: 15px;">
    <div style="font-weight: bold;">Now select a <span style="text-decoration: underline;">channel combination</span> from below.<br><span style="text-decoration: underline;"><?php echo $propertyName ?></span> will show <span style="text-decoration: underline;">at the top of search results</span> for the following selection.</div>
</div>

<div style="clear:both;"></div>

<form name="saveFilter" action="/back/?app=inclusions" method="POST">
                
<?php               
        
        $sql_destinations = $dbc->Query("select id, name from destinations where id = '" . $property['destination'] . "'");    
        list($destination_id, $destination_name) = $dbc->Fetch($sql_destinations);        
        
        echo "<br><div class=\"col-md-12\" style=\"font-weight: 600; padding: 0 0 3px 3px;\">Selected property:<span style=\"padding-left:15px; font-size: large; color: #000080\">" . $propertyName . "</span></div>";
        
        echo '<div style="clear:both;"></div>';
        
        echo "<br><div style=\"padding: 0 0 3px 3px;\">Belongs to <span style=\"font-weight: 600;\">Region '" . $destination_name . "'</span>";
        
        $sql_subdestinations = $dbc->Query("select id, slug from destinations where id = '" . $property['subdestination'] . "'");    
        list($subdestination_id, $subdestination_slug) = $dbc->Fetch($sql_subdestinations);            
        
        echo " in the <span style=\"font-weight: 600;\">'" . ucwords( str_replace("-", " ", $subdestination_slug) ) . "' Neighborhood</span>.</div>";  
        
        // Bedrooms
        $sql_rooms = $dbc->Query("select * from property_room where property = '" .$_REQUEST['propertyID'] . "'");    
        $number_rooms = mysqli_num_rows($sql_rooms);
        if ( $number_rooms > 1 ) $appRooms = "Categories";
        else $appRooms = "Category";
        
        echo "<div style=\"padding: 0 0 3px 3px;\">The villa is listed in $number_rooms <span style=\"font-weight: 600;\">Room " . $appRooms . "</span>";
        
        // Collections
        $sql_category = $dbc->Query("select * from property_cate where property = '" .$_REQUEST['propertyID'] . "'");    
        $number_categories = mysqli_num_rows($sql_category);
        if ( $number_categories > 1 || $number_categories == 0 ) $appCollection = "s";
        else $appCollection = "";
        
        echo " and is part of <span  style=\"font-weight: 600;\">$number_categories Collection" . $appCollection . "</span>.</div>";  
        
        echo "<div style=\"padding: 10px 0 25px 3px;\">Listing <span style=\"font-weight: 600; text-decoration: underline;\">all available features</span> (throughout the website) below:</div>";      
        
?>        
<div class="form-group">

        <select name="des" id="des" class="form-control" style="width: 200px;" onChange="showDestination(this, <?php echo $_REQUEST['propertyID'] ?>);">
            <option value="all">All Destinations</option>                                                            
<?php 

        if( isset($_REQUEST['des']) && $_REQUEST['des'] != "") $new_destination_id = $_REQUEST['des'];
        
        $sql_destinations = $dbc->Query("select * from destinations where parent IS NULL AND status = '1' ORDER BY name"); 
        
        while($destination = $dbc->Fetch($sql_destinations))        
        {
            if( !isset($_REQUEST['des']) || $_REQUEST['des'] == "") $actt = ( isset($destination_id) && $destination_id == $destination['id'])?' selected':'';
            else  $actt = ( $_REQUEST['des'] == $destination['id'])?' selected':'';
            
            $destination_star = ( isset($destination_id) && $destination_id == $destination['id'])?' *':'';
            echo '<option value="'.$destination['id'].'"'.$actt.'>'.$destination['name'].$destination_star.'</option>'."\n            ";
        }
                
?>
        </select>

</div>
        
<div class="form-group">

        <select name="sub" id="sub" class="form-control" style="width: 200px;" onChange="showSubdestination(this);">
            <option value="all">All Areas</option>
<?php 
        
        if( isset($destination_id) && (!isset($_REQUEST['des']) || $_REQUEST['des'] == "") ) $sql_subdestinations = $dbc->Query("select * from destinations where parent = '" . $destination_id . "' AND status = '1' ORDER BY name"); 
        else $sql_subdestinations = $dbc->Query("select * from destinations where parent = '" . $_REQUEST['des'] . "' AND status = '1' ORDER BY name"); 
        
        while($subdestination = $dbc->Fetch($sql_subdestinations))        
        {   
            $actt = ( isset($subdestination_id) && $subdestination_id == $subdestination['id'])?' selected':'';
            $subdestination_star = ( isset($subdestination_id) && $subdestination_id == $subdestination['id'])?' *':'';
            echo '<option value="'.$subdestination['id'].'"'.$actt.'>'.ucwords( str_replace("-", " ", $subdestination['slug']) ).$subdestination_star.'</option>'."\n            ";
        }
                
?>
        </select>

</div>
       
<div class="form-group">

        <select name="room" id="room" class="form-control" style="width: 200px;" onChange="showRooms(this);">
            <option value="all">All Bedrooms</option>
<?php                      

            $sql_rooms = $dbc->Query("select * from property_room where property = '" .$_REQUEST['propertyID'] . "'"); 
            
            $bedroomIdArray = [];
            
            while($room = $dbc->Fetch($sql_rooms))
            {
                     
                $sql_room_list = $dbc->Query("select id from bedroom where id = '" .$room['room'] . "'");    
                list($bedroomID) = $dbc->Fetch($sql_room_list);                 
                
                $bedroomIdArray[] = $bedroomID;
                
            }
 
            $sql_rooms = $dbc->Query("select * from bedroom WHERE status = '1' ORDER BY name"); 
            
            while($room = $dbc->Fetch($sql_rooms))
            {                                     
                $bedroom_star = ( in_array($room['id'], $bedroomIdArray))?' *':'';                
                echo '<option value="'.$room['id'].'">'.$room['name'].' '.$bedroom_star.'</option>'."\n            ";
            }   
                
?>
           
        </select>

</div>
        
<div class="form-group">

        <select name="cate" id="cate" class="form-control" style="width: 200px;" onChange="showCollections(this);">
            <option value="0">All Villa Types</option>
<?php 

            $sql_category = $dbc->Query("select * from property_cate where property = '" .$_REQUEST['propertyID'] . "'");
            
            $collectionIdArray = [];
            
            while($category = $dbc->Fetch($sql_category))
            {
                     
                $sql_category_list = $dbc->Query("select id from categories where id = '" .$category['caategory'] . "'");    
                list($categoryID) = $dbc->Fetch($sql_category_list);                 
                
                $collectionIdArray[] = $categoryID;
                
            }
            
            

            $sql_category = $dbc->Query("select * from categories WHERE status = '1'");
            
            while($category = $dbc->Fetch($sql_category))
            {
                $category_star = ( in_array($category['id'], $collectionIdArray))?' *':'';
                echo '<option value="'.$category['id'].'">'.$category['brief'].' '.$category_star.'</option>'."\n            ";
            }
?>
           
        </select>

</div> 

<div style="clear:both;"></div>
Features marked with * are assigned to the property
<div style="clear:both;"></div>

<div class="col-md-12" style="border-style: double; border-color: #E72318; max-width: 400px; padding: 5px; text-align: center; margin-top: 20px;">
    <div style="font-weight: bold;">This property will show at the top of results if search filters are set to '<span style="text-decoration: underline;"><script language="JavaScript">document.write(des.options[des.selectedIndex].text)</script>/<span id="printSubdestination" style="white-space: nowrap;"><script language="JavaScript">document.write(sub.options[sub.selectedIndex].text)</script></span>/<span id="printRooms" style="white-space: nowrap;">All Bedrooms</span>/<span id="printCollections" style="white-space: nowrap;">All Villa Types</span></span>'<br><br>
    <input value="Click here to save this rule" tabindex="48" type="submit" name="submit" id="sendButton" class="buttonGreen center" title="Click here to save this rule"></div><br>
</div>

<!--<input name="app" value="inclusions" type="hidden">-->
<input name="option" value="insert" type="hidden">
<input name="propertyID" value="<?php echo $_REQUEST['propertyID'] ?>" type="hidden">

</form>

<div style="clear:both;"></div>

<?php
                                                     
        $property_Name_Exclusions_Inclusions_Array = propertyName_Exclusions_InclusionsFromID($_REQUEST['propertyID']);
        $inclusions = $property_Name_Exclusions_Inclusions_Array[2];

        if( $inclusions != "" ){    
?>

<div style="font-weight: bold; text-align: center; max-width: 400px; color: #000080; padding: 20px 0 3px 0;">OR</div>

<div style="clear:both;"></div>

<form name="addMoreInclusions" action="/back/?app=inclusions&view=show_inclusions" method="POST">

    <div class="col-md-12" style="border-style: double; border-color: #E72318; max-width: 400px; padding: 30px; text-align: center; margin-top: 20px;">
        <input value="List and delete a rule for this property" type="submit" name="submit" id="sendButton" class="buttonBlue center" title="List and delete a rule for this property"></div><br>
    </div>

    <!--<input name="app" value="inclusions" type="hidden">-->
    <!--<input name="view" value="show_inclusions" type="hidden">-->
    <input name="propertyID" value="<?php echo $_REQUEST['propertyID'] ?>" type="hidden">

</form>

<div style="clear:both;"></div>                

<?

        }            
    }
    
?>

</div>

<?php

    break;

    } 
    // end switch
        
?>