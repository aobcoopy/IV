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


    
    function showForm($dbc, $channelString){
        
        if( $channelString != ""){
            
            $channelArray = explode("|", $channelString);
            
            $_REQUEST['des'] = $channelArray[0];
            $subdestination_id = $channelArray[1];
            $roomID = $channelArray[2];
            $categoryID = $channelArray[3];
            
        }
        
        
?>
<script language="JavaScript">
<!--
  
    var count = "170";
    
    function limiter(){
                          
        var tex = document.saveFilter.description.value;
        var len = tex.length;
        
        if(len > count){
                tex = tex.substring(0,count);
                document.saveFilter.description.value =tex;
                return false;
        }
        
        document.saveFilter.limit.value = count-len;
    }
    
    function validateForm() {
        
        var title = document.forms["saveFilter"]["title"].value;
        var description = document.forms["saveFilter"]["description"].value;
        var h1 = document.forms["saveFilter"]["h1"].value;
        var h2 = document.forms["saveFilter"]["h2"].value;
    
        var message = '';
    
        if (title == "" || description == "" || h1 == "" || h2 == "") {
            
            if(title == "") message += "Title, "; 
            if(description == "") message += "Description, "; 
            if(h1 == "") message += "H1, "; 
            if(h2 == "") message += "H2, "; 
            
            var newMessage = message.replace(" ", ", ");
            
            alert(message.replace(/\,([^\,]*)$/,'$1') + "must be filled out");
            return false;
        
        }
    }    

    function showDestination(destination) 
    {
      window.location.href = "/back/?app=metatag_search&des=" + destination.options[destination.selectedIndex].value;
    }  

    function showSubdestination(subdestination, destination) 
    {
      window.location.href = "/back/?app=metatag_search&des=" + destination + "&sub=" + subdestination.options[subdestination.selectedIndex].value;
    }  

    function showRooms(rooms, destination, subdestination) 
    {
      window.location.href = "/back/?app=metatag_search&des=" + destination + "&sub=" + subdestination + "&room=" + rooms.options[rooms.selectedIndex].value;
    }  

    function showCollections(cate, destination, subdestination, rooms) 
    {
      window.location.href = "/back/?app=metatag_search&des=" + destination + "&sub=" + subdestination + "&room=" + rooms + "&cate=" + cate.options[cate.selectedIndex].value;
    }  
  
//-->
</script>

<div class="col-md-12">

    <div class="col-md-12" style="border-style: double; border-color: #E72318; max-width: 400px; padding: 5px; text-align: center; margin-bottom: 15px;">
        <div style="font-weight: bold;">Select a <span style="text-decoration: underline;">channel combination</span> from below and enter the metatags that are supposed to show with this search result.</div>
    </div>

<div style="clear:both;"></div>

<div style="padding: 0 0 3px 3px;">
<form name="saveFilter" action="/back/?app=metatag_search" onsubmit="return validateForm()" method="POST">
                       
<div class="form-group">

        <select name="des" id="des" class="form-control" style="width: 200px;" onChange="showDestination(this);">
            <option value="all">All Destinations</option>                                                            
<?php 

        $sql_destinations = $dbc->Query("select * from destinations where parent IS NULL AND status = '1' AND num_properties > 0 ORDER BY name"); 
        
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

        <select name="sub" id="sub" class="form-control" style="width: 200px;" onChange="showSubdestination(this, '<?php echo $_REQUEST['des'] ?>');">
            <option value="all">All Areas</option>
<?php 
        
        if( isset($destination_id) && (!isset($_REQUEST['des']) || $_REQUEST['des'] == "") ) $sql_subdestinations = $dbc->Query("select * from destinations where parent = '" . $destination_id . "' AND status = '1' ORDER BY name"); 
        else $sql_subdestinations = $dbc->Query("select * from destinations where parent = '" . $_REQUEST['des'] . "' AND status = '1' ORDER BY name"); 
        
        while($subdestination = $dbc->Fetch($sql_subdestinations))        
        {   
            $actt = ( isset($subdestination_id) && $subdestination_id == $subdestination['id'])?' selected':'';
            echo '<option value="'.$subdestination['id'].'"'.$actt.'>'.ucwords( str_replace("-", " ", $subdestination['slug']) ).'</option>'."\n            ";
        }
                
?>
        </select>

</div>
       
<div class="form-group">

        <select name="room" id="room" class="form-control" style="width: 200px;" onChange="showRooms(this, '<?php echo $_REQUEST['des'] ?>', '<?php echo $_REQUEST['sub'] ?>');">
            <option value="all">All Bedrooms</option>
<?php                      

            $destination = "";
            $subdestination = "";
            $bedroomIdArray = [];
            
            //if( (isset($_REQUEST['des']) && $_REQUEST['des'] != 'all') || $_REQUEST['des'] == 'all' || $_REQUEST['sub'] != 'all')
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
                AND properties.`status` > 0
            ");
           
            while($row = $dbc->Fetch($sql_rooms))
            {
                if(!in_array($row['room'],$bedroomIdArray))
                {
                    array_push($bedroomIdArray,$row['room']);
                }
            }
            sort($bedroomIdArray); 
 
            $sql_allrooms = $dbc->Query("select * from bedroom WHERE status = '1' ORDER BY name"); 
            
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
                ".$destination." ".$subdestination." ".$bedrooms."
                AND properties.`status` > 0
                AND categories.`status` > 0
            ");
            
           
            while($row = $dbc->Fetch($sql_collection))
            {
                
                if(!in_array($row['room'],$collectionIdArray))
                {
                    array_push($collectionIdArray, $row['collection_id'] ) ;
                }                
            }
            ksort($collectionIdArray);                    

            $sql_category = $dbc->Query("select * from categories WHERE status = '1'");
            
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

<?php
     
    $sql_metatags = $dbc->Query("select * from metatag_search WHERE channels = '" . getChannelString() . "'"); 
    $metatags = $dbc->Fetch($sql_metatags);
    $numberMetatagEntries = $dbc->Getnum($sql_metatags);    
     
?> 

<div style="clear:both;"></div>

<div class="form-group">
    <label for="title" class="col-sm-2 control-label">Title</label>
    <div class="col-sm-10">
        <input type="text" class="form-control" id="title" name="title" value="<?php echo $metatags['title'] ?>">
    </div>
</div>
                            
<div style="clear:both; height: 10px;"></div>                            

<div class="form-group">
    <label for="description" class="col-sm-2 control-label">Description</label>
    <div class="col-sm-10">
        <textarea type="text" class="form-control" id="description" name="description" onKeyUp=limiter()><?php echo $metatags['description'] ?></textarea>
        <div  style="margin-top: -10px;">
            <script type="text/javascript">
            document.write("<br /><input type='text' name='limit' size='4' readonly value='<?php if(strlen($metatags['description']) > 0) echo (170 - strlen($metatags['description'])); else echo "\"+count+\""; ?>'> <font size='-2'> characters left for description</font>");
            </script>                                    
        </div>            
    </div>
</div>

<div style="clear:both; height: 10px;"></div> 

<div class="form-group">
    <label for="h1" class="col-sm-2 control-label">H1</label>
    <div class="col-sm-10">
        <input type="text" class="form-control" id="h1" name="h1" value="<?php echo $metatags['h1'] ?>">
    </div>
</div>

<div style="clear:both; height: 10px;"></div>

<div class="form-group">
    <label for="h2" class="col-sm-2 control-label">H2</label>
    <div class="col-sm-10">
        <input type="text" class="form-control" id="h2" name="h2" value="<?php echo $metatags['h2'] ?>">
    </div>
</div> 
<div style="clear:both; height: 10px;"></div> 

<div class="col-md-12" style="border-style: double; border-color: #E72318; max-width: 400px; padding: 5px; text-align: center; margin-top: 20px;">
    <div style="font-weight: bold;">These metatags will be used if search filters are set to '<span style="text-decoration: underline;"><script language="JavaScript">document.write(des.options[des.selectedIndex].text)</script>/<span id="printSubdestination" style="white-space: nowrap;"><script language="JavaScript">document.write(sub.options[sub.selectedIndex].text)</script></span>/<span id="printRooms" style="white-space: nowrap;"><script language="JavaScript">document.write(room.options[room.selectedIndex].text)</script></span>/<span id="printCollections" style="white-space: nowrap;"><script language="JavaScript">document.write(cate.options[cate.selectedIndex].text)</script></span></span>'<br><br>
    <input value="Click here to save metatags" type="submit" name="submit" id="sendButton" class="buttonGreen center" title="Click here to save metatags"></div><br>
</div>

<input name="option" value="insert" type="hidden">

</form>

</div>

<div style="clear:both; height: 10px;"></div>

<?php

        if( $numberMetatagEntries == 1 ){    
            
?>

<div style="font-weight: bold; text-align: center; max-width: 400px; color: #000080; padding: 20px 0 3px 0;">OR</div>

<div style="clear:both;"></div>

<form name="deleteMetatags" action="/back/?app=metatag_search&view=show_metatags" method="POST">

    <div class="col-md-12" style="border-style: double; border-color: #E72318; max-width: 400px; padding: 30px; text-align: center; margin-top: 20px;">
        <input value="Delete metatags for this channel combination" type="submit" name="submit" id="sendButton" class="buttonBlue center" title="Delete metatags for this channel combination"></div><br>
    </div>

    <input name="option" value="delete" type="hidden">
    <input name="metatagID" value="<?php echo $metatags['id'] ?>" type="hidden">

</form>

<div style="clear:both;"></div>                

<?

        }   

    }   
    
    function updateMetatagSearch($channelString)
    {
        global $dbc;
        
        // read current entries
        //die("select * from metatag_search where channels = '" . $channelString . "'");
        $sql_metatag_search = $dbc->Query("select * from metatag_search where channels = '" . $channelString . "'"); 
        $numMetatagEntries = $dbc->Getnum($sql_metatag_search);   
        //list($include_in_search) = $dbc->Fetch($sql_properties);
        if( $numMetatagEntries == 0 ){
            
            $dbc->Insert("metatag_search",array(
                "channels" => $channelString,
                "title" => addslashes($_POST['title']),
                "description" => addslashes($_POST['description']),
                "h1" => addslashes($_POST['h1']),
                "h2" => addslashes($_POST['h2']),
                "#updated" => "NOW()"
            )); 
            
?>
<div class="col-md-12">

    <div style="font-size: large; font-weight: bold; color: #E72318; padding: 0 0 30px 3px;">Metatags have been successfully added!</div>

</div>
<?php                       
               
        } elseif( $numMetatagEntries == 1 ){ 

            $data = array(
                "channels" => $channelString,
                "title" => addslashes($_POST['title']),
                "description" => addslashes($_POST['description']),
                "h1" => addslashes($_POST['h1']),
                "h2" => addslashes($_POST['h2']),
                "#updated" => "NOW()"
            );        
        
            $dbc->Update("metatag_search", $data,"channels='" . $channelString . "'");            
            
?>
<div class="col-md-12">

    <div style="font-size: large; font-weight: bold; color: #E72318; padding: 0 0 30px 3px;">Metatags have been successfully updated!</div>

</div>
<?php  
            
        } elseif( $numMetatagEntries > 1 ) die("ERROR 5789");
        
    }      
    
    switch($_REQUEST['option'])
    {
        case "insert":
        
        $channelString = $_REQUEST['des'] . "|" . $_REQUEST['sub'] . "|" . $_REQUEST['room'] . "|" . $_REQUEST['cate'];
        
        updateMetatagSearch($channelString);

        showForm($dbc, $channelString);

        break;

        
        default:
    
        showForm($dbc, '');

        break;

    } 
    // end switch
        
?>