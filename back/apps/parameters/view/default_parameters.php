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
    
    function showForm($dbc)
    {
        
        $arrayUrlStructure = getDefaultSlugStructureForChannel($dbc);
        
        
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
  
//-->
</script>

<div class="col-md-12">
<?php if( !isset($_REQUEST['option']) ){ ?>
    <div style="font-size: 16px; font-weight: bold; padding: 0 0 30px 3px;">
        <span style="color: #585858;">This is the URL rule that is used <span style="text-decoration: underline;">by default</span><br>for search result pages on Inspiringvillas.com.<br>You can change the setting below:</span>
    </div>
<?php } ?>
    <div style="clear:both;"></div>

<div style="padding: 0 0 3px 3px;">

<form name="saveFilter" action="/back/?app=parameters&view=default_parameters" method="POST">
                       
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

        <input type="text" class="form-control" id="sort" name="title" value="Destination" style="width: 120px; background: #F9F9F9; color: #555;" readonly>
              

</div>
        
<div class="form-group">

        <!-- switch START -->
        <div style="float: left; padding: 2px 15px 0 0;">
            <div class="onoffswitch" style="float: left;">
                <input type="checkbox" name="arrayUrlStructure[NEIGHBORHOOD]" class="onoffswitch-checkbox" id="subdestinationSwitch" value="par"<?php if( $arrayUrlStructure['NEIGHBORHOOD'] == 'par') echo " checked" ?>> 
                <label class="onoffswitch-label" for="subdestinationSwitch">
                    <span class="onoffswitch-inner"></span>
                    <span class="onoffswitch-switch"></span>
                </label>
            </div>
        </div>    
        <!-- switch END -->

        <input type="text" class="form-control" id="sort" name="title" value="Sub-Destination" style="width: 120px; background: #F9F9F9; color: #555;" readonly>

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

        <input type="text" class="form-control" id="sort" name="title" value="Price" style="width: 120px; background: #F9F9F9; color: #555;" readonly>

</div>
       
<div class="form-group">

        <!-- switch START -->
        <div style="float: left; padding: 2px 15px 0 0;">
            <div class="onoffswitch" style="float: left;">
                <input type="checkbox" name="arrayUrlStructure[ROOMS]" class="onoffswitch-checkbox" id="bedroomSwitch" value="par"<?php if( $arrayUrlStructure['ROOMS'] == 'par') echo " checked" ?>>
                <label class="onoffswitch-label" for="bedroomSwitch">
                    <span class="onoffswitch-inner"></span>
                    <span class="onoffswitch-switch"></span>
                </label>
            </div>
        </div>    
        <!-- switch END -->

        <input type="text" class="form-control" id="sort" name="title" value="Bedrooms" style="width: 120px; background: #F9F9F9; color: #555;" readonly>

</div>
        
<div class="form-group">

        <!-- switch START -->
        <div style="float: left; padding: 2px 15px 0 0;">
            <div class="onoffswitch" style="float: left;">
                <input type="checkbox" name="arrayUrlStructure[COLLECTION]" class="onoffswitch-checkbox" id="collectionSwitch" value="par"<?php if( $arrayUrlStructure['COLLECTION'] == 'par') echo " checked" ?>>
                <label class="onoffswitch-label" for="collectionSwitch">
                    <span class="onoffswitch-inner"></span>
                    <span class="onoffswitch-switch"></span>
                </label>
            </div>
        </div>    
        <!-- switch END -->

        <input type="text" class="form-control" id="sort" name="title" value="Collections" style="width: 120px; background: #F9F9F9; color: #555;" readonly>

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
        
        <input type="text" class="form-control" id="sort" name="title" value="Sort" style="width: 120px; background: #F9F9F9; color: #555;" readonly>
        
</div>
 
<div style="clear:both; height: 10px;"></div> 

    <input value="Click here to update the default URL rule" type="submit" name="submit" id="sendButton" class="buttonGreen center" title="Click here to update the default URL rule"></div><br>

<input name="option" value="update" type="hidden">

</form>

</div>

<div style="clear:both; height: 10px;"></div>
<?php

    }  
    
    function addOne($count)
    {
        
        if( $count == 0) $num = 0;
        else $num++;
        
        return $num;
    } 
    
    function updateDefaultParameterRule($dbc)
    {

        $sql_parameter_rules = $dbc->Query("select * from parameter_rules where id = '1'"); 
        $numParameterRules = $dbc->Getnum($sql_parameter_rules);   

        if( $numParameterRules == 0 || $numParameterRules > 1 ){
            
?>
<div class="col-md-12">

    <div style="font-size: large; font-weight: bold; color: #E72318; padding: 0 0 30px 3px;">ERROR 521784</div>

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
        
            $dbc->Update("parameter_rules", $data,"id='1'");            
            
?>
<div class="col-md-12">

    <div style="font-size: large; font-weight: bold; color: #E72318; padding: 0 0 30px 3px;">The DEFAULT  parameter rule has been successfully updated!</div>

</div>
<?php  
            
        } 
        
    }      
    
    switch($_REQUEST['option'])
    {

        case "update":    
        
        updateDefaultParameterRule($dbc);

        showForm($dbc);

        break;

        
        default:
    
        showForm($dbc);

        break;

    } 
    // end switch
        
?>