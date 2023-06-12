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

    function listAllMetatags($dbc)
    {
        
        $sql_metatags = $dbc->Query("select * from metatag_search"); 
        $numberMetatagEntries = $dbc->Getnum($sql_metatags);   
        
?>            
<div class="col-md-12">

    <div style="font-weight: bold; color: #000080; padding: 0 0 20px 3px;"><?php if( $numberMetatagEntries > 0 ){ ?>List of all Search Page Metatags<?php } else echo "No Search Page Metatags found!"; ?></div>
            
<?php  

        while( $metatags = $dbc->Fetch($sql_metatags) )        
        {
            
?>
        <div style="margin-left: 5px; width: 500px; height: 36px;">
            <span style="margin: 0 15px 0 15px; line-height: 30px;"><?php echo channelString_to_Names($dbc, $metatags['channels']) ?> </span>
            
            <button id="btnAddGroup" type="submit" class="btn btn-primary pull-left" form="editMetatags_<?php echo $metatags['id'] ?>">Edit</button>
            <button id="btnRemoveGroup" type="submit" class="btn btn-danger pull-right" form="deleteMetatags_<?php echo $metatags['id'] ?>">Remove</button>
            
            <form name="editMetatags_<?php echo $metatags['id'] ?>" id="editMetatags_<?php echo $metatags['id'] ?>" action="/back/?app=metatag_search&view=show_metatags" method="POST">
                <input name="option" value="edit" type="hidden">
                <input name="metatagID" value="<?php echo $metatags['id'] ?>" type="hidden">
            </form> 
            
            <form name="deleteMetatags_<?php echo $metatags['channels'] ?>" id="deleteMetatags_<?php echo $metatags['id'] ?>" action="/back/?app=metatag_search&view=show_metatags" method="POST">
                <input name="option" value="delete" type="hidden">
                <input name="metatagID" value="<?php echo $metatags['id'] ?>" type="hidden">
            </form>            
        </div>
        <div style="clear:both;"></div>
<?php            
        
        }
        
?>
</div>
<?php              
        
    }      
    
    switch($_REQUEST['option'])
    {
        case "delete":
        
        $dbc->Delete("metatag_search","id=" . $_POST['metatagID']);
        
      
?>            
<div class="col-md-12">

    <div style="font-size: large; font-weight: bold; color: #E72318; padding: 0 0 30px 3px;">Metatags have successfully been deleted!</div>

</div>            
            
<?php

        listAllMetatags($dbc);

        break;
        
        
        case "edit":
        
        $sql_metatags = $dbc->Query("select * from metatag_search WHERE id = '" . $_POST['metatagID'] . "'"); 
        $metatags = $dbc->Fetch($sql_metatags);
        
?>
<style type="text/css">
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
<script language="JavaScript">
<!--
  
    var count = "170";
    
    function limiter(){
                          
        var tex = document.updateFilter.description.value;
        var len = tex.length;
        
        if(len > count){
                tex = tex.substring(0,count);
                document.updateFilter.description.value =tex;
                return false;
        }
        
        document.updateFilter.limit.value = count-len;
    }
    
    function validateForm() {
        
        var title = document.forms["updateFilter"]["title"].value;
        var description = document.forms["updateFilter"]["description"].value;
        var h1 = document.forms["updateFilter"]["h1"].value;
        var h2 = document.forms["updateFilter"]["h2"].value;
        
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

  
//-->
</script>
<div class="col-md-12">

<div style="clear:both;"></div>

<form name="updateFilter" action="/back/?app=metatag_search&view=show_metatags" onsubmit="return validateForm()" method="POST">

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
    <div style="font-weight: bold;">These metatags will be used if search filters are set to<br>'<span style="text-decoration: underline;"><?php echo channelString_to_Names($dbc, $metatags['channels']) ?></span>'<br><br>
    <input value="Click here to update metatags" type="submit" name="submit" id="sendButton" class="buttonGreen center" title="Click here to update metatags"></div><br>
</div>

<input name="option" value="update_exec" type="hidden">
<input name="metatagID" value="<?php echo $metatags['id'] ?>" type="hidden">
<input name="channelString" value="<?php echo $metatags['channels'] ?>" type="hidden">

</form>

</div>

<div style="clear:both; height: 10px;"></div>

<div class="col-md-12">

<div style="font-weight: bold; text-align: center; max-width: 400px; color: #000080; padding: 20px 0 3px 0;">OR</div>

<div style="clear:both;"></div>

<form name="deleteMetatags" action="/back/?app=metatag_search&view=show_metatags" method="POST">

    <div class="col-md-12" style="border-style: double; border-color: #E72318; max-width: 400px; padding: 30px; text-align: center; margin-top: 20px;">
        <input value="Delete metatags for this channel combination" type="submit" name="submit" id="sendButton" class="buttonBlue center" title="Delete metatags for this channel combination"><br>
    </div>

    <input name="option" value="delete" type="hidden">
    <input name="metatagID" value="<?php echo $metatags['id'] ?>" type="hidden">

</form>

</div>

<div style="clear:both;"></div> 

<div style="clear:both; height: 10px;"></div>
<?php        
        
        
        break;
        
        
        case "update_exec":
        
        $data = array(
            "channels" => $_POST['channelString'],
            "title" => addslashes($_POST['title']),
            "description" => addslashes($_POST['description']),
            "h1" => addslashes($_POST['h1']),
            "h2" => addslashes($_POST['h2']),
            "#updated" => "NOW()"
        );        
    
        $dbc->Update("metatag_search", $data,"id='" . $_POST['metatagID'] . "'");          
        
?>
<div class="col-md-12">

    <div style="font-size: large; font-weight: bold; color: #E72318; padding: 0 0 30px 3px;">Metatags have been successfully updated (ID = <?php echo $_POST['metatagID'] ?>)</div>

</div>
<?php
        
        listAllMetatags($dbc);
        
        break;
        
        default:
    
?>

<div class="col-md-12">

<?php
    
        listAllMetatags($dbc);
    
?>

<div style="clear:both;"></div>                

</div>

<?php

        break;

    } 
    // end switch
        
?>