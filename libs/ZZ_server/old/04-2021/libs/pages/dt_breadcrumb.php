<style>
.breadcrumb {
    padding: 8px 15px 8px 0px;
    margin-bottom: 20px;
    list-style: none;
    background-color: #f5f5f500;
    border-radius: 0px;
    border-bottom: 1px solid #eeeeee;
    /* font-size: 12px; */
    margin-top: 15px;
    /* overflow-x: auto; */
    /* width: 320px; */
}
@media screen and (max-width:768px)
{
    .mob_bc
    {
        margin-top:37px !important;
    }
}
</style>
<?php

echo '<div class="c_cover">';
echo '<div class="is_c_cover">';
	echo '<ol class="breadcrumb breadcrumb_2 mob_bc" style="margin-top: 23px;">';
		$home_link = "/";
		
        // New function! URL variables:          ($countryID, $destinationID, $parentDestinationID, $priceID, $bedroomsID, $collectionID, $sortBy) 
        // e.g. showing everything for Thailand: (2, 'all-regions', 'all-beaches', 'all-prices', 'all-bedrooms', 'all-collections', 'price|asc')
        $bread_link_thai = URL_builder(_COUNTRY_ID, 'all-regions', 'all-areas', 'all-bedrooms', 'all-collections', 'all-prices', 'price|asc', $arrayUrlVariables); 
		echo '<li><a href="'.$bread_link_thai.'">Thailand Villas</a></li>';
		$bread_link_beach = URL_builder(_COUNTRY_ID, $room['destination'], 'all-areas', 'all-bedrooms', 'all-collections', 'all-prices', 'price|asc', $arrayUrlVariables); 
		echo '<li><a href="'.$bread_link_beach.'">'.des_bread_name($room['destination']).' Villas</a></li>';
		$bread_link = $bread_link_beach = URL_builder(_COUNTRY_ID, $room['destination'], $room['subdestination'], 'all-bedrooms', 'all-collections', 'all-prices', 'price|asc', $arrayUrlVariables); 
		$beach = $dbc->GetRecord("destinations","*","id='".$room['subdestination']."'");
		$ex_beachname = explode(",",$beach['name']);
		echo '<li class="active"><a href="'.$bread_link.'">'.$ex_beachname[0].' '.$room['subdestination'].'</a></li>';
		
		$ex_name = explode("|",$room['name']);
	echo '</ol>';
echo '</div>';
echo '</div>';

?>