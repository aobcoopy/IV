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
.googleButton{
    height: 30px;
    width: 89px;
    background: url(/../img/googlelogo.png) no-repeat;
    cursor:pointer;
    border: none;
}
</style>

<?php   

    function listAllParameterRules($dbc)
    {
        
        $sql_parameters = $dbc->Query("select * from parameter_rules WHERE id != '1'"); 
        $numberParameterRules = $dbc->Getnum($sql_parameters);   
        
?>            
<div class="col-md-12">

    <div style="font-weight: bold; color: #000080; padding: 0 0 5px 3px;"><?php if( $numberParameterRules > 0 ){ ?>List of all Parameter Rules<?php } else echo "No Parameter Rules found!"; ?></div>
    <div style="color: #000080; padding: 0 0 20px 3px;">Click the <span style="font-weight: 600;">Google Logo</span> to check how Google crawls the URL <br>(setup in Webmaster Tools: "<span style="text-decoration: underline;">URLs with this parameter should not be crawled by Googlebot</span>")</div>
            
<?php  

        while( $parameter_rules = $dbc->Fetch($sql_parameters) )        
        {
            
            $channelString = $parameter_rules['destination_value'] . "|" . $parameter_rules['neighborhood_value'] . "|" . $parameter_rules['bedroom_value'] . "|" . $parameter_rules['collection_value'];             
            $arrayUrlStructure = array(
        
                "ID" => $parameter_rules['id'],
                "REGION" => $parameter_rules['region_variable'],
                "NEIGHBORHOOD" => $parameter_rules['neighborhood_variable'],
                "PRICE" => $parameter_rules['price_variable'],
                "ROOMS" => $parameter_rules['rooms_variable'],
                "COLLECTION" => $parameter_rules['collection_variable'],
                "SORT" => $parameter_rules['sort_variable']   
            ); 
            
            $searchResult_URL = URL_builder_for_parameters($dbc, $channelString, $arrayUrlStructure); 
            
?>

        <input type="button" name="button" title="View as Google: <?php echo _URL_LINK.preg_replace('/\\?.*/', '', $searchResult_URL) ?>" onclick="window.open('<?php echo _URL_LINK.preg_replace('/\\?.*/', '', $searchResult_URL) ?>')" class="googleButton"/>
        <div style="clear:both; height: 5px;"></div>
        
        <div style="margin-left: 5px; width: 100%; height: 36px;">
            
            <div style="float: left;"><button id="btnRemoveGroup" type="submit" class="btn btn-danger pull-right" form="deleteParameterRule_<?php echo $parameter_rules['id'] ?>">Remove</button></div>
            <div style="line-height: 14px; float: left;  border-style: solid; border-width: thin; padding: 5px; margin: 2px 5px 5px 5px;"><span style="text-decoration: underline;" title="<?php echo _URL_LINK.$searchResult_URL ?>"><a href="<?php echo _URL_LINK.$searchResult_URL ?>" target="blank"><?php echo _URL_LINK.$searchResult_URL ?></a></span> </div>
            
            <form name="deleteParameterRule_<?php echo $parameter_rules['id'] ?>" id="deleteParameterRule_<?php echo $parameter_rules['id'] ?>" action="/back/?app=parameters&view=show_parameters" method="POST">
                <input name="option" value="delete" type="hidden">
                <input name="parameterRuleID" value="<?php echo $parameter_rules['id'] ?>" type="hidden">
            </form>            
        </div>
        
        <div style="clear:both; height: 15px;"></div>

<?php            
        
        }
        
?>
</div>
<?php              
        
    }      
    
    switch($_REQUEST['option'])
    {
        case "delete":
        
        $dbc->Delete("parameter_rules","id=" . $_POST['parameterRuleID']);
        
      
?>            
<div class="col-md-12">

    <div style="font-size: large; font-weight: bold; color: #E72318; padding: 0 0 30px 3px;">Parameter rule has successfully been deleted!</div>

</div>            
            
<?php

        listAllParameterRules($dbc);

        break;

        
        default:
    
?>

<div class="col-md-12">

<?php
    
        listAllParameterRules($dbc);
    
?>

<div style="clear:both;"></div>                

</div>

<?php

        break;

    } 
    // end switch
        
?>