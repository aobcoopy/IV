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
</style>

<?php   

    function listAllExclusionsForProperty($propertyID)
    {
        
        $property_Name_Exclusions_Inclusions_Array = propertyName_Exclusions_InclusionsFromID($propertyID);
        $propertyName = $property_Name_Exclusions_Inclusions_Array[0];
        $exclusions = $property_Name_Exclusions_Inclusions_Array[1];
        $excludeArray = explode(";", $exclusions);
        
?>            
<div class="col-md-12">

    <div style="font-weight: bold; color: #000080; padding: 0 0 3px 3px;"><?php if( $exclusions != "" ){ ?>List of all exclusions for '<?php echo rtrim($propertyName, " ") ?>'<?php } else echo "No exclusion found for this property!"; ?></div>
        
<?php

        $countExclusions = 0;
        
        if( $exclusions != "" ){
            
            foreach ($excludeArray as $exclusionString) {

                $countExclusions++;
                $channel = explode("|", $exclusionString);

                echo '        <div style="float: left; margin: 5px;">' . "\n            "; 
                echo '<form name="deleteExclusion" action="/back/?app=exclusions" method="POST">' . "\n            "; 
                echo "<br>Exclusion #" . $countExclusions . "<br>\n            "; 
                
                if( $channel[0] == "all") $destinationChannel = 'All Destinations';
                else $destinationChannel =  destination_name_slug($channel[0])[0];
                
                if( $channel[1] == "all") $subdestinationChannel = 'All Areas';
                else $subdestinationChannel =  subdestination_name_slug($channel[1])[0];
                
                echo '<div style="padding-left: 3px; border-style: solid; border-width: thin; width: 130px;  background-color: #E0E0E0;">' . $destinationChannel . '</div>' . "\n            "; 
                echo '<div style="padding-left: 3px; border-style: solid; border-width: thin; width: 130px;  background-color: #E0E0E0;">' . $subdestinationChannel . '</div>' . "\n            "; 
                echo '<div style="padding-left: 3px; border-style: solid; border-width: thin; width: 130px;  background-color: #E0E0E0;">' . bedroomNameFromID($channel[2]) . '</div>' . "\n            "; 
                echo '<div style="padding-left: 3px; margin-bottom: 5px; border-style: solid; border-width: thin; width: 130px;  background-color: #E0E0E0;">' . collectionNameFromID($channel[3]) . '</div>' . "\n\n            "; 
                
                echo '<input name="exclusionString" value="' . $exclusionString . '" type="hidden">' . "\n            ";            
                echo '<input name="propertyID" value="' . $propertyID . '" type="hidden">' . "\n            ";            
                //echo '<input name="app" value="exclusions" type="hidden">' . "\n            ";            
                echo '<input name="option" value="delete" type="hidden">' . "\n            ";            
                echo '<input name="dataset" value="' . $countExclusions . '" type="hidden">' . "\n            ";            

                echo '<input value="Delete exclusion # ' . $countExclusions . '" type="submit" name="submit" id="deleteExclusionSubmit" class="buttonGreen center" title="Delete exclusion # ' . $countExclusions . '">' . "\n"; 
                
                echo '            </form>' . "\n";
                echo '        </div>' . "\n"; 

            }
        }
            
        echo '<div style="clear:both; line-height: 20px;"></div>';
             
?>
<form name="addMoreExclusions" action="/back/?app=exclusions" method="POST">

    <div class="col-md-12" style="border-style: double; border-color: #E72318; max-width: 400px; padding: 30px; text-align: center; margin-top: 20px;">
        <input value="Add <?php if( $exclusions != "" ) echo "more"; ?> exclusions to this property" type="submit" name="submit" id="sendButton" class="buttonGreen center" title="Add<?php if( $exclusions != "" ) echo "more"; ?> exclusions to this property"></div><br>
    </div>

    <!--<input name="app" value="exclusions" type="hidden">-->
    <input name="propertyID" value="<?php echo $_REQUEST['propertyID'] ?>" type="hidden">

</form>

</div>            
            
<?php        
        
    } 
    
    function updateExclusionColumn_Add($exclusionString, $propertyID)
    {
        global $dbc;
        
        // read current entries
        $sql_properties = $dbc->Query("select exclude_from_search from properties where id = '" . $propertyID . "'");    
        list($exclude_from_search) = $dbc->Fetch($sql_properties);
        
        $excludeArray = [];
        $excludeArray = explode(";", $exclude_from_search);
        $excludeArray[] = $exclusionString;
        
        $excludeArray = array_unique($excludeArray);
        $newExclusionString = ltrim( implode(";", $excludeArray), ";" );
        
        $data = array(
            'exclude_from_search' => $newExclusionString,
            '#updated' => "NOW()"
        );        
        
        $dbc->Update("properties", $data,"id=" . $propertyID);
        
    }      
    
    function updateExclusionColumn_Remove($exclusionString, $propertyID)
    {
        global $dbc;
       
        // read current entries
        $sql_properties = $dbc->Query("select exclude_from_search from properties where id = '" . $propertyID . "'");    
        list($exclude_from_search) = $dbc->Fetch($sql_properties);
        
        $excludeArray = [];
        $excludeArray = explode(";", $exclude_from_search);
        
        // remove string from array
        if (($key = array_search($exclusionString, $excludeArray)) !== false) {
            unset($excludeArray[$key]);
        }        
        
        $newExclusionString = implode(";", $excludeArray);
        
        if($newExclusionString == ""){
        
            $sql = "UPDATE properties SET exclude_from_search = NULL, updated=NOW() WHERE id=" . $propertyID;
            $dbc->Query($sql);
            
        } else {
            
            $data = array(
                'exclude_from_search' => $newExclusionString,
                '#updated' => "NOW()"
            );        
            
            $dbc->Update("properties", $data,"id=" . $propertyID);           
            
        }        
        

        
    }      
    
    switch($_REQUEST['option'])
    {
        case "insert":
        
        $exclusionString = $_REQUEST['des'] . "|" . $_REQUEST['sub'] . "|" . $_REQUEST['room'] . "|" . $_REQUEST['cate'];
        
        updateExclusionColumn_Add($exclusionString, $_REQUEST['propertyID']);
      
?>            
<div class="col-md-12">

    <div style="font-size: large; font-weight: bold; color: #E72318; padding: 0 0 30px 3px;">Exclusion has successfully been added to this property!</div>

</div>            
            
<?php

        listAllExclusionsForProperty($_REQUEST['propertyID']);

        break;
        
        case "delete":
        
        updateExclusionColumn_Remove($_REQUEST['exclusionString'], $_REQUEST['propertyID']);
        
        listAllExclusionsForProperty($_REQUEST['propertyID']);
        
        echo "<br><br><br>delete " . $_REQUEST['exclusionString'];
        echo "<br>from column 'exclude_from_search' at propertyID " . $_REQUEST['propertyID'];
        
        break;
        
        default:
    
?>
<script language="JavaScript">
<!--
  
    function listVillaExclusions(propertyID)
    {
        window.location.href = "/back/?app=exclusions&view=show_exclusions&propertyID=" + propertyID;
    }

    function showDestination(destination) 
    {
      document.getElementById('printDestination').innerHTML = destination.options[destination.selectedIndex].text;
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
<div style="font-weight: bold; color: #000080; padding: 0 0 3px 3px;">Select Villa:</div>
<div class="form-group">
        <select name="show_villas" id="show_villas" class="form-control" onchange="listVillaExclusions(this.value);" style="max-width: 400px; height: 34px; border:0.1em solid #000080;">
            <option value="">select a villa to list its exclusions</option>
<?php 

    $sql_property = $dbc->Query("select * from properties where status = '1' AND exclude_from_search IS NOT NULL AND exclude_from_search > '' ORDER BY name");
    while($r_property = $dbc->Fetch($sql_property))
    {
        $actt = ( isset($_REQUEST['propertyID']) && $_REQUEST['propertyID'] == $r_property['id'])?' selected':'';
        echo '<option value="'.$r_property['id'].'"'.$actt.'>'.$r_property['name'].'</option>'."\n            ";

    }
?>
           
        </select>
</div>

<?php if( isset($_REQUEST['propertyID']) && $_REQUEST['propertyID'] != "" ) { ?>
<div class="col-md-12" style="border-style: double; border-color: #E72318; max-width: 400px; padding: 5px; text-align: center; margin-bottom: 15px;">
    <div style="font-weight: bold;">You can delete search exclusions below</div>
</div>
                
<?php 

    listAllExclusionsForProperty($_REQUEST['propertyID']);

} 

?>

<div style="clear:both;"></div>                

</div>

<?php

    break;

    } 
    // end switch
        
?>