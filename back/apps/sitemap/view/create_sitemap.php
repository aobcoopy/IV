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
    
    function showForm($dbc){
        
        $sql_additional_urls = $dbc->Query("SELECT add_url from sitemap WHERE id = '1'");
        list($add_url) = $dbc->Fetch($sql_additional_urls);        
        
?>
<div class="col-md-12">

    <div class="col-md-12" style="border-style: double; border-color: #E72318; max-width: 400px; padding: 5px; text-align: center; margin-bottom: 15px;">
        <div style="font-weight: bold;">The sitemap currently includes all Villas and additionally all URLs listed in the box below.<br>You can add, edit and delete the additional URLs in the box. <br>One URL per line.</div>
    </div> 

    <form name="saveFilter" action="/back/?app=sitemap" method="POST">
    
    <div style="clear:both; height: 10px;"></div>

    <div style="font-size: 11px;"><textarea name="add_url" style="width: 800px; height: 100px;"><?php echo $add_url; ?></textarea>
    </div>

    <div style="clear:both;"></div>

<div style="padding: 0 0 3px 3px;">
                       
<div class="form-group">
 
    <div style="clear:both; height: 10px;"></div> 

    <div class="col-md-12" style="border-style: double; border-color: #E72318; max-width: 400px; padding: 5px; text-align: center; margin-top: 20px;">
        <div style="font-weight: bold;"><div id="printURL" title="<?php echo _URL_LINK.$searchResult_URL ?>">Check the current sitemap in a new window: '<span style="text-decoration: underline;"><a href="<?php echo _URL_LINK.$searchResult_URL . "sitemap.xml" ?>" target="blank"><?php echo _URL_LINK.$searchResult_URL . "sitemap.xml" ?></a></span>'<br></div><br>
        <input value="Click here to update the sitemap" type="submit" name="submit" id="sendButton" class="buttonGreen center" title="Click here to update the sitemap"></div><br>
    </div>

    <input name="option" value="update" type="hidden">

    </form>

</div>

<div style="clear:both; height: 10px;"></div>


<div style="font-weight: bold; text-align: center; max-width: 400px; color: #000080; padding: 20px 0 3px 0;">OR</div>

<div style="clear:both;"></div>

<form name="deleteParameterRule" action="/back/?app=sitemap" method="POST">

    <div class="col-md-12" style="border-style: double; border-color: #E72318; max-width: 400px; padding: 30px; text-align: center; margin-top: 20px;">
        <input value="Delete the sitemap from the server" type="submit" name="submit" id="sendButton" class="buttonBlue center" title="Delete the sitemap from the server"><br>
    </div>

    <input name="option" value="delete" type="hidden">

</form>

<div style="clear:both;"></div>                

<?

    }    
    
    function updateSitemap($dbc)
    {

        $sql_sitemap = $dbc->Query("select * from sitemap where id = '1'"); 
        $numParameterRules = $dbc->Getnum($sql_sitemap);   
            
        $countSlugs = 0;

        $data = array(
            "add_url" => $_POST['add_url'],
            "#updated_at" => "NOW()"
        );        
    
        $dbc->Update("sitemap", $data,"id='1'"); 
        
        //$url_link = "http://" . $_SERVER['SERVER_NAME'] . "/";
        $url_link = "https://www.inspiringvillas.com/";
        
        $newSitemap .= '<?xml version=\'1.0\' encoding=\'UTF-8\'?>';
        $newSitemap .= "\n";
        $newSitemap .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" 
        xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" 
        xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9 
        http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd">';
        $newSitemap .= "\n";
        
        $sql_additional_urls = $dbc->Query("SELECT add_url from sitemap WHERE id = '1'");
        list($add_url) = $dbc->Fetch($sql_additional_urls);
        
        $arrayURLs = explode("\n", $add_url);
        
        foreach ($arrayURLs as $url) {
            
            if( $url != ""){
                
            $newSitemap .= "    <url>
            <loc>" . $url . "</loc>
            <lastmod>" . date('c', time()) . "</lastmod>
            <priority>0.8</priority>                
            <changefreq>weekly</changefreq>\n    </url>\n";
        
            }
        
        } 
/*
        $sql_property_urls = $dbc->Query("SELECT properties.id FROM properties
                    LEFT JOIN destinations ON properties.subdestination = destinations.id AND properties.subdestination = destinations.id
                    WHERE properties.status > 0 AND destinations.status > 0                     
                    GROUP BY properties.id ORDER BY properties.ht_link");
*/
        $sql_property_urls = "SELECT
                    properties.id AS id,
                    properties.ht_link AS ht_link,   
                    properties.status,
                    properties.destination AS destination,
                    properties.subdestination AS subdestination,
                    properties.destination,
                    properties.subdestination
                  FROM
                        properties 
                    LEFT JOIN 
                        destinations 
                            ON properties.subdestination = destinations.id  
                    WHERE properties.status > 0 AND destinations.status > 0 GROUP BY properties.id ORDER BY properties.ht_link";


        
        //$sql_property_urls = $dbc->Query("SELECT * from properties WHERE status = '1'");
        $sql_property_urls = $dbc->Query($sql_property_urls);
                
        while($row = $dbc->Fetch($sql_property_urls))
        {
            $newSitemap .= "    <url>
            <loc>" . $url_link . str_replace(" ", "", $row['ht_link']) . ".html</loc>
            <lastmod>" . date('c', time()) . "</lastmod>
            <priority>0.8</priority>                
            <changefreq>weekly</changefreq>\n    </url>\n";
        
        } 
        
        $newSitemap .= "</urlset>";
        
        $file = '../sitemap.xml';
        file_put_contents($file, $newSitemap);    
            
?>
<div class="col-md-12">

    <div style="font-size: large; font-weight: bold; color: #E72318; padding: 0 0 30px 3px;">The sitemap has been successfully updated!</div>

</div>
<?php  
            
    } 
    
    function deleteSitemap($dbc)
    {

        $file = '../sitemap.xml';
        unlink($file);     
            
?>
<div class="col-md-12">

    <div style="font-size: large; font-weight: bold; color: #E72318; padding: 0 0 30px 3px;">The sitemap has been successfully deleted!</div>

</div>
<?php  
            
    }    
    
    switch($_REQUEST['option'])
    {

        case "update":  
        
            updateSitemap($dbc);

            showForm($dbc);

        break;
        

        case "delete":  
        
            deleteSitemap($dbc);

            showForm($dbc);

        break;

        
        default:
    
            showForm($dbc);

        break;

    } 
    // end switch
        
?>