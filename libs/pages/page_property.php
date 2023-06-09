<?php             
if(!isset($_SESSION['view']) || $_SESSION['view']==NULL)
{
	$_SESSION['view'] = 'list';
}
else
{
}

    include "libs/pages/fr_head.php";
    include "libs/pages/search_forrent.php";
    include_once "inc/functions.inc.php";
       
    // search exclusion/inclusion
    $searchChannels = $_REQUEST['des'] . "|" . $_REQUEST['sub'] . "|"  .$_REQUEST['room'] . "|" . $_REQUEST['cate'];
    $exclusionInclusionRule = " AND (LOCATE('" . $searchChannels . "', properties.exclude_from_search)=0 OR properties.exclude_from_search IS NULL)";
    $exclusionInclusionRule .= ") OR properties.status > 0 AND LOCATE('" . $searchChannels . "', properties.include_in_search)>0";  
    
    //$sortByMostPopular = " LOCATE('" . $searchChannels . "', include_in_search) desc,";
    $sortByMostPopular = " FIELD(include_in_search, '" . $searchChannels . "') desc,";
    
    // only show Thailand villas for "all" searches
    if( $_REQUEST['des'] == "all") $thailandFilter = "destinations.parent IN (" . destinationIDs_forCountry($dbc, 2) . ") AND ";
    else $thailandFilter = "";    
    
    //$_REQUEST['cbbActualbed'] = 15;
    
    //deactivate rules
    //$exclusionInclusionRule = " )";    
    //$exclusionInclusionRule = "";
?>
<style type="text/css">
@media screen and (max-width: 662px){.web,.webs{display:none}.mg-book-now{height:90px;margin-top:71px}#cbbSort{width:100%}}@media screen and (minx-width: 662px) and (max-width: 992px){.web,.webs{display:none}.mg-book-now{height:90px;margin-top:71px}#cbbSort{width:100%}}@media screen and (min-width: 992px){.mobi,.ffd{display:none}}.fpr{font-family:pr !important}body{background:#fff}
.tbrand {
    position: absolute;
    z-index: -1;
    top: 0;
    color: #ffffff;
}
</style>
         

<div class="mg-page">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 nopad">
                <div class="mg-booking-form">
                    <div class="tab-content">
                        <div role="tabpanel" class="tab-pane fade in active" id="select-room">
                           
                            <div class="mg-available-rooms">
                            	<?php /*?><div style="height: 50px;"></div><?php */?>
                                <?php 
                                include "libs/pages/fr_if_detination.php";
                                include "libs/pages/fr_if_beach.php";
                                include "libs/pages/fr_if_price.php";
                                //include "libs/pages/fr_if_room.php";
                                //include "libs/pages/fr_arr_cate.php";
                                $sql_room = '';
								$in_list = '';
								$paddbutt = '';   
								    
                                        $arr_map = array();
                                        if(isset($_REQUEST['room']) && $_REQUEST['room']!='all')
                                        {
                                            $sql_room = "INNER JOIN property_room ON properties.id = property_room.property";
                                            if($_REQUEST['room']==3 || $_REQUEST['room']==4)
                                            {
                                                $w_room = "AND property_room.room  BETWEEN 3 AND 4 ";
                                            }
                                            else
                                            {
                                                $w_room = "AND property_room.room = '".$_REQUEST['room']."' ";
                                            }
                                        }
                                        else
                                        {
                                            $w_room = "";
                                        }

                                        if(isset($_REQUEST['cate']))
                                        {
                                            if($_REQUEST['cate']!=0)
                                            {

                                                $w_cate = "AND property_cate.caategory = '".$_REQUEST['cate']."' ";
                                            }
                                            else
                                            {
                                                $w_cate = "";
                                            }
                                        }
                               
                                
                                $link_url = $_SERVER['REQUEST_URI'];
                                $ar_link = array(
                                    
                                    '/search-rent/thailand/all-beach/all-price/8-10-bedrooms/all-collections/all-sort.html',
                                    
                                    '/search-rent/thailand/all-beach/all-price/all-bedrooms/wedding-villas/all-sort.html',
                                    '/search-rent/thailand/all-beach/all-price/all-bedrooms/larger-group-villas/all-sort.html',
                                    '/search-rent/thailand/all-beach/all-price/all-bedrooms/seaview-villas/all-sort.html',
                                );//'/search-rent/thailand/all-beach/all-price/all-bedrooms/all-collections/all-sort.html',
                                $ar_link_2 = array(
                                    '/search-rent/thailand-koh-samui/all-beach/all-price/all-bedrooms/all-collections/all-sort.html',
                                );
                                $ar_link_3 = array(
                                    '/search-rent/thailand/all-beach/all-price/all-bedrooms/all-collections/all-sort.html',
                                );
                                $ar_link_4 = array(
                                    '/search-rent/thailand-koh-samui/all-beach/all-price/1-4-bedrooms/all-collections/all-sort.html',
                                );
                                $ar_link_5 = array(
                                    '/search-rent/thailand-koh-samui/all-beach/all-price/all-bedrooms/seaview-villas/all-sort.html',
                                );
                                $ar_link_6 = array(
                                    '/search-rent/thailand/all-beach/all-price/5-7-bedrooms/all-collections/all-sort.html',
                                );
                                $ar_link_7 = array(
                                    '/search-rent/thailand/all-beach/all-price/all-bedrooms/beachfront-villas/all-sort.html',
                                );
                                $ar_link_8 = array(
                                    '/search-rent/thailand/all-beach/all-price/1-4-bedrooms/all-collections/all-sort.html',
                                );
                                
                                if(in_array($link_url,$ar_link))
                                {
                                    $limit = "5,5";
                                    //echo 'YESSSSSS';
                                }
                                elseif(in_array($link_url,$ar_link_2))
                                {
                                    $limit = "0,5";
                                    //echo 'YESSSSSS___2';
                                }
                                elseif(in_array($link_url,$ar_link_3))
                                {
                                    //$limit = "10,5";
                                    $limit = "10,5";
                                    //$limit = "5,5";
                                    //echo 'YESSSSSS___3';
                                }
                                elseif(in_array($link_url,$ar_link_4))
                                {
                                    $limit = "15,5";
                                    //$limit = "5,5";
                                    //echo 'YESSSSSS___4';
                                }
                                elseif(in_array($link_url,$ar_link_5))
                                {
                                    $limit = "20,5";
                                    //$limit = "5,5";
                                    //echo 'YESSSSSS___4';
                                }
                                elseif(in_array($link_url,$ar_link_6))
                                {
                                    $limit = "5,5";
                                    //echo 'YESSSSSS';
                                }
                                elseif(in_array($link_url,$ar_link_7))
                                {
                                    $limit = "5,5";
                                    //echo 'YESSSSSS';
                                }
                                elseif(in_array($link_url,$ar_link_8))
                                {
                                    $limit = "5,5";
                                    //echo 'YESSSSSS';
                                }
                                else
                                {
                                    //echo 'nooooo';
                                    $limit = "0,5";
                                }
                                
                                if($link_url == '/search-rent/thailand-phuket/all-beach/all-price/all-bedrooms/beachfront-villas/all-sort.html')
                                {
                                    $in_list = "AND properties.id NOT IN (155, 160)";
                                }
                                elseif($link_url == '/search-rent/thailand-phuket/all-beach/all-price/1-4-bedrooms/all-collections/all-sort.html')
                                {
                                    $in_list = "AND properties.id NOT IN (150, 239)";
                                }
                                elseif($link_url == '/search-rent/thailand/all-beach/all-price/5-7-bedrooms/all-collections/all-sort.html')//---
                                {
                                    $in_list = "AND properties.id NOT IN (197, 349 ,18 ,149 ,94, 19)";
                                }
                                elseif($link_url == '/search-rent/thailand/all-beach/all-price/all-bedrooms/all-collections/all-sort.html')
                                {
                                    $in_list = "AND properties.id NOT IN (150,253)";
                                }
                                elseif($link_url == '/search-rent/thailand-phuket/all-beach/all-price/all-bedrooms/wedding-villas/all-sort.html')
                                {
                                    $in_list = "AND properties.id NOT IN (18)";
                                }
                                elseif($link_url == '/search-rent/thailand-phuket/all-beach/all-price/all-bedrooms/seaview-villas/all-sort.html')
                                {
                                    $in_list = "AND properties.id NOT IN (18)";
                                }
                                elseif($link_url == '/search-rent/thailand-phuket/all-beach/all-price/all-bedrooms/all-collections/all-sort.html')
                                {
                                    $in_list = "AND properties.id NOT IN (404)";
                                }
                                elseif($link_url == '/search-rent/thailand-koh-samui/all-beach/all-price/all-bedrooms/all-collections/all-sort.html')
                                {
                                    $in_list = "AND properties.id NOT IN (258)";
                                }
                                elseif($link_url == '/search-rent/thailand/all-beach/all-price/all-bedrooms/beachfront-villas/all-sort.html')
                                {
                                    $in_list = "AND properties.id NOT IN (210)";
                                }
                                elseif($link_url == '/search-rent/thailand-koh-samui/all-beach/all-price/all-bedrooms/wedding-villas/all-sort.html')
                                {
                                    $in_list = "AND properties.id NOT IN (115)";
                                }
                                elseif($link_url == '/search-rent/thailand/all-beach/all-price/1-4-bedrooms/all-collections/all-sort.html')
                                {
                                    $in_list = "AND properties.id NOT IN (259)";
                                }
                                elseif($link_url == '/search-rent/thailand-koh-samui/all-beach/all-price/1-4-bedrooms/all-collections/all-sort.html')
                                {
                                    $in_list = "AND properties.id NOT IN (201)";
                                }
                                //echo $in_list;
                                        
                                $sql__1 = $dbc->Query("SELECT properties.id AS id,properties.`name`,properties.brief,
                                            properties.short_det,properties.photo,properties.features,properties.price,
                                            properties.status,properties.destination AS destination,properties.bedroom,
                                            properties.tag,properties.price_range,properties.actualbed,properties.ht_link,
                                            properties.subdestination,properties.pmin,properties.pmax,property_cate.caategory,properties.adults AS adults,
                                            categories.name AS cname,properties.cate_icon AS cate_icon, destinations.name AS dname
                                            FROM properties ".$sql_room."
                                            LEFT JOIN property_cate ON properties.id = property_cate.property
                                            LEFT JOIN categories ON properties.cate_icon = categories.id
                                            LEFT JOIN destinations ON properties.subdestination = destinations.id
                                            WHERE " . $thailandFilter . "(properties.status > 0 AND destinations.status > 0 ".$Destination." ".$beach." ".$price." ".$w_room." ".$w_cate." ".$in_list."
                                            " . $exclusionInclusionRule . "                                            
                                            GROUP BY properties.id ORDER BY price asc,topsearch desc
                                        ");
                                        
                                $num = $dbc->Getnum($sql__1);
                                
                                $arrayActualBedrooms = [];
                                
                                while($row =  $dbc->Fetch($sql__1))
                                {
                                    
                                    $arrayActualBedrooms[] = $row['actualbed'];
                                    
                                }
                                
                                $arrayActualBedrooms = array_unique($arrayActualBedrooms);
                                sort($arrayActualBedrooms);  
                                
/*                                $_SESSION['stringActualBedrooms'] = implode(",", $arrayActualBedrooms);
                                
                                die($_SESSION['stringActualBedrooms']);  */
                                
                                if( $num == 0 ) threeOone('/');

                                if(!isset($_REQUEST['des'])){}
                                else
                                {
                                    display_breadcrumbs($_REQUEST['des'], $_REQUEST['sub'], $_REQUEST['room'], $_REQUEST['cate'], $_REQUEST['pri'], 'price|asc', $num);
                                    //include "libs/pages/fr_breadcrumb.php";
                                }
                                
                                include "libs/pages/fr_H1.php";
                                include "libs/pages/fr_quicklink_v1.php";
                                    
                                $query = "SELECT
                                            properties.id AS id,
                                            properties.`name`,
                                            properties.exclude_from_search,
                                            properties.include_in_search,
                                            properties.brief,
                                            properties.short_det,
                                            properties.photo,
                                            properties.features,
                                            properties.price,
                                            properties.status,
                                            properties.destination AS destination,
                                            properties.bedroom,
                                            properties.tag,
                                            properties.price_range,
                                            properties.actualbed,
                                            properties.ht_link,
                                            properties.subdestination,
                                            properties.pmin,
                                            properties.pmax,
											properties.discount,
                                            property_cate.caategory,
                                            properties.adults AS adults,
                                            categories.name AS cname,
                                            properties.cate_icon AS cate_icon,
                                            destinations.name AS dname,
                                            properties.bedroom_range AS bedroom_range,
											properties.tag_exp AS tag_exp,
											properties.pmin_th AS pmin_th,
											properties.pmax_th AS pmax_th,
                                            properties.pro_exp AS pro_exp
                                          FROM
                                                properties ".$sql_room." 
                                            LEFT JOIN 
                                                property_cate 
                                                    ON properties.id = property_cate.property
                                            LEFT JOIN 
                                                categories 
                                                    ON properties.cate_icon = categories.id
                                            LEFT JOIN 
                                                destinations 
                                                    ON properties.subdestination = destinations.id
                                            WHERE " . $thailandFilter . "(properties.status > 0 AND destinations.status > 0 ".$Destination." ".$beach." ".$price." ".$w_room." ".$w_cate." ".$in_list . $exclusionInclusionRule . "  GROUP BY properties.id ORDER BY" . $sortByMostPopular . " price asc limit 5 ";
                                            
                                // for test purposes:
                                // WHERE LOCATE('all|all|all|0', properties.include_in_search)> 0  GROUP BY properties.id ORDER BY" . $sortByMostPopular . " price asc limit 1,5 ";
                                //die($query);
                                
                                $sql = $dbc->Query($query);//room = 1 AND    caategory = 4   
/*                                                                                       
                                $sql = $dbc->Query("SELECT properties.id AS id,properties.`name`,properties.exclude_from_search,properties.include_in_search,properties.brief,properties.short_det,properties.photo,properties.features,properties.price,properties.status,properties.destination AS destination,properties.bedroom,properties.tag,properties.price_range,properties.actualbed,properties.ht_link,properties.subdestination,properties.pmin,properties.pmax,property_cate.caategory,properties.adults AS adults,categories.name AS cname,properties.cate_icon AS cate_icon,destinations.name AS dname,properties.bedroom_range AS bedroom_range
                                    FROM properties ".$sql_room."
                                    LEFT JOIN property_cate ON properties.id = property_cate.property
                                    LEFT JOIN categories ON properties.cate_icon = categories.id
                                    LEFT JOIN destinations ON properties.subdestination = destinations.id
                                    WHERE (properties.status > 0 ".$Destination." ".$beach." ".$price." ".$w_room." ".$w_cate." ".$in_list."" . $exclusionInclusionRule . " GROUP BY properties.id ORDER BY" . $sortByMostPopular . " price asc limit $limit ");//room = 1 AND    caategory = 4                                
*/                                
?>
                                <?php /*?><div class="container-fluid bgwh"><?php */?>
                                <div class="container">
                                <div class="row">
                                <div class="mg-avl-rooms col-md-12 col-sm-12 col-xs-12 mt101 top20">
                                        <?php /*?><div class="col-xs-12 col-sm-12 col-md-12 aab nopad">
                                            <div  style="margin-left:0px;">
                                                <?php
                                                $a=0;
                                                if($a=='123456789')
                                                {
                                                    ?><h4 class="f16 ilb fpr" >Displaying <?php echo $num;?></h4> 
                                                    <h3 class="f16 ilb fpr" >hand-picked villas in your search for </h3><?php
                                                }?>
                                                
                                                <h2 class="f188" style="margin-top: 0px;    margin-left: -2px; display:none;"><?php echo $textH2;?></h2>
                                                <br>
                                            </div>
                                        </div><?php */?>
                                     <div class="roomold">   
                                     <?php 
                                         $ar_photo = array();
                                        $ar_url = array();
                                        $view = $_SESSION['view'];//$_REQUEST['view'];
                                        $zz = 1;
                                        $zz_2 = 1;
										$c=1;
										$padd = "";
										$padd_1 = "";
										
										$arr_tag_id = array();
										$sql_tags = $dbc->Query("select * from tags where status > 0");
										while($l_tag = $dbc->Fetch($sql_tags))
										{
											array_push($arr_tag_id,$l_tag['id']);
										}

                                        while($row =  $dbc->Fetch($sql))
                                        {
                                            if($row['tag']!=0)
                                            {
                                                $tag = $dbc->GetRecord("tags","*","id = '".$row['tag']."' ");
                                                $tag_name = $tag['name'];
                                            }
                                            
                                            $name = explode("|",$row['name']);
                                            $photo = json_decode($row['photo'],true);
                                            $row['ht_link'] = str_replace(" ", "", $row['ht_link']);
                                            
                                            //$icon_cate = array('beach','team','sea','wedding');
                                            
                                            $catename = explode("-",$row['cname']);
                                            switch($row['cate_icon'])
                                            {
                                                case"4":
                                                    $icon_cate = "beach";
                                                    $icon_name = "Seaview Villa";
                                                break;
                                                case"5":
                                                    $icon_cate = "largegroup";
                                                    $icon_name = "Large Group Villa";
                                                break;
                                                case"6":
                                                    $icon_cate = "seas";
                                                    $icon_name = "Beachfront Villa";
                                                break;
                                                case"8":
                                                    $icon_cate = "wedding";
                                                    $icon_name = "Wedding Villa";
                                                break;
                                                case"9":
                                                    $icon_cate = "house";
                                                    $icon_name = "Garden Villa";
                                                break;
                                                case"10":
                                                    $icon_cate = "house";
                                                    $icon_name = "Tropical Villa";
                                                break;
                                                default:
                                                    $icon_cate = "";
                                                    $icon_name = "";
                                            }
                                            
                                            if(strstr($row['dname'],'Beach'))
                                            {
                                                $split = explode(",",$row['dname']);// แบ่งข้อความโดชใช้ ,
                                                $locations = str_ireplace('Beach','',$split[0]);// แทนที่ข้อความ
                                                
                                                $nost = strrpos($locations," ")."<br>";// หาตำแหน่งสุดท้าย
                                                //echo $row['dname']."<br>";// แสดงข้อความเต็ม
                                                //echo substr_replace($locations,",",$nost);// แสดงข้อความที่ถูกตัดออก
                                                $full_location = substr_replace($locations,",",$nost).$split[1];
                                            }
                                            elseif(strstr($row['dname'],'Bay'))
                                            {
                                                $split = explode(",",$row['dname']);// แบ่งข้อความโดชใช้ ,
                                                $locations = str_ireplace('Bay','',$split[0]);// แทนที่ข้อความ
                                                
                                                $nost = strrpos($locations," ")."<br>";// หาตำแหน่งสุดท้าย
                                                //echo $row['dname']."<br>";// แสดงข้อความเต็ม
                                                //echo substr_replace($locations,",",$nost);// แสดงข้อความที่ถูกตัดออก
                                                $full_location = substr_replace($locations,",",$nost).$split[1];
                                            }
                                            elseif(strstr($row['dname'],'Bophut'))
                                            {
                                                //echo $row['dname']."<br>";// แสดงข้อความเต็ม
                                                $full_location = $row['dname'];
                                            }
                                            else
                                            {
                                                //echo $row['dname']."<br>";// แสดงข้อความเต็ม
                                                $full_location = $row['dname'];
                                            }
                                            
											$destina = explode(",",$row['dname']);

											$villa_location = $full_location;//$locations.','.$destina[1];
											
											
                                                if($zz_2=='1' || $zz_2=='6' || $zz_2=='8' || $zz_2=='10' || $zz_2=='12')
                                                {
                                                    $padd_1 = "padmob";//style='padding-bottom: 30px;'
                                                    $cate_bot = "padmob";
                                                }
                                                elseif($zz_2=='3')
                                                {
                                                    $padd = "style='padding-bottom: 36px;'";
                                                    $padd_1 = "padmob";
                                                }
                                                elseif($zz_2=='5')
                                                {
                                                    $paddbutt = "padbutt";
                                                }
                                                else
                                                {
                                                    $padd = "";
                                                    $padd_1 = "";
                                                }
                                            
                                            
                                            
                                            $zz_2++;
                                            
                                            if($view=='grid')
                                            {
												include "page_property_grid.php";
                                            }
                                            else
                                            {
												include "page_property_list.php";
                                            }
                                        
                                        
                                        if($zz==3)
                                        {
                                            //if($_REQUEST['des']=='38')
//                                            {
//                                                $texts = "Discover Phuket ";
//                                            }
//                                            elseif($_REQUEST['des']=='39')
//                                            {
//                                                $texts = "Discover Koh Samui";
//                                            }
//                                            else
//                                            {
//                                                $texts = "Discover Thailand";
//                                            }
//                                            
//                                            if($_REQUEST['des']==38)
//                                            {
//                                                $img_vdo = "Phuket";
//                                            }
//                                            elseif($_REQUEST['des']==39)
//                                            {
//                                                $img_vdo = "Koh_Samui";
//                                            }
//                                            else
//                                            {
//                                                $img_vdo = "pall";
//                                            }
                                            ?><?php /*?>VDOOOOOOO<?php */?>
                                            <?php /*?><div class=" web">    
                                                <div class="col-md-12 pal nopad mb55">
                                                    <div class="col-md-12  nopad">
                                                        <div class="filters"></div>
                                                        <div class="text-center ttmain"><?php echo $texts;?></div>
                                                        <div class="ttsub text-center"></div>
                                                        <i class="fa fa-play-circle" onClick="popu('<?php echo $_REQUEST['des'];?>')"></i>
                                                        <div class="imggs">
                                                            <img class="lazy" data-src="<?php echo $url_link;?>upload/<?php echo $img_vdo;?>.jpg" width="100%" class="vdo_cov">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class=" mob">
                                                <div class="col-md-12 pal nopad pmob mb50">
                                                    <div class="col-md-12 cinside nopad">
                                                        <div class="filters2"></div>
                                                        <div class="text-center ttmain"><?php echo $texts;?></div>
                                                        <div class="ttsub text-center"></div>
                                                        <i class="fa fa-play-circle" onClick="popu('<?php echo $_REQUEST['des'];?>')"></i>
                                                        <div class="imggs">
                                                            <img class="lazy" data-src="<?php echo $url_link;?>upload/<?php echo $img_vdo;?>2.jpg" width="100%" class="vdo_cov">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div><?php */?>
                                            <?php
                                            
                                        }
                                        //echo $zz;
                                        
										
										
										
										
										if($view=='grid')
										{
											if($zz=='3' || $zz=='6' || $zz=='10')
											{
												echo '<div class="col-md-12"><div class="villa_boxs_mini- photo_banner web"><a href="/contact" ><img src="/upload/search/1111.jpg" width="100%" alt="CONCIERGE OFFER"> </a></div></div>';
												echo '<div class="villa_boxs_mini photo_banner mob"><a href="/contact" ><img src="/upload/search/mm111.jpg" width="100%" alt="CONCIERGE OFFER"> </a></div>';
											}
											if($zz=='6' || $zz=='8' || $zz=='12')
											{
												echo '<div class="col-md-12"><div class="villa_boxs_mini- photo_banner web"><img src="/upload/search/2222.jpg" width="100%" alt="EXCURISON PROMOTION"></div></div>';
												echo '<div class="villa_boxs_mini photo_banner mob "><img src="/upload/search/mm22.jpg" width="100%" alt="EXCURISON PROMOTION"></div>';
											}
										}
										else
										{
											if($zz=='5' )
											{
												/*echo '<div class="villa_boxs_mini photo_banner web"><a href="/contact#viewform" ><img src="/upload/search/11111.jpg" width="100%" alt="CONCIERGE OFFER"></a></div>';
												echo '<div class="villa_boxs_mini photo_banner mob"><a href="/contact#viewform" ><img src="/upload/search/mm111.jpg" width="100%" alt="CONCIERGE OFFER"></a></div>';*/
												echo '<div class="villa_boxs_mini web"><button class="bad clicking tupper"><strong>receive $150 off any excursion booking during your villa stay with us*</strong></button></div>';	
												echo '<div class="villa_boxs_mini photo_banner mob"><img src="/upload/search/mm111.jpg" width="100%" alt="CONCIERGE OFFER"></div>';
												//echo '<div class="villa_boxs_mini photo_banner mob"><a href="/contact#viewform" ><img src="/upload/search/mm111.jpg" width="100%" alt="CONCIERGE OFFER"></a></div>'; เอาลิงค์ออก
												//echo '<div class="villa_boxs_mini"><a href="/contact" ><button class="bad clicking tupper"><strong>receive $150 off any excursion booking during your villa stay with us*</strong></button></a></div>';
											}
											if($zz=='6' || $zz=='12' || $zz=='18')
											{
												echo '<div class="villa_boxs_mini photo_banner web "><img src="/upload/search/22222.jpg" width="100%" alt="EXCURISON PROMOTION"></div>';
												echo '<div class="villa_boxs_mini photo_banner mob "><img src="/upload/search/mm22.jpg" width="100%" alt="EXCURISON PROMOTION"></div>';
												
												//echo '<div class="villa_boxs_mini"><a href="/contact"><button class="bad adblu clicking"><strong>LET US FIND THE VILLA OPTIONS FOR YOU  - CONCIERGE SERVICE AVAILABLE</strong> <strong class="tred">- Click Here!</strong></button></a></div>';
											}
										}
										
										
                                        $zz++;    
                                       }
                                       
                                       $all_photo = json_encode($ar_photo);
                                       $all_urls = json_encode($ar_url);//$ar_url;//
                                       //echo '<pre>';
//                                       print_r($ar_photo);
//                                       echo '</pre>';
//                                       echo $all_photo; 

                                       //echo '<pre>';
//                                       print_r($ar_url);
//                                       echo '</pre>';
//                                       echo $all_urls;
                                    ?>
                                    
                                    <?php
                                        if($view=='grid')
                                            {
												?><div class="col-xs-12 col-sm-6 col-md-4 web box_loadmore ">
                                        	<div class="col-md-12 gr_load text-center">
                                                <img src="data:image/svg+xml;utf8;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iaXNvLTg4NTktMSI/Pgo8IS0tIEdlbmVyYXRvcjogQWRvYmUgSWxsdXN0cmF0b3IgMTguMC4wLCBTVkcgRXhwb3J0IFBsdWctSW4gLiBTVkcgVmVyc2lvbjogNi4wMCBCdWlsZCAwKSAgLS0+CjwhRE9DVFlQRSBzdmcgUFVCTElDICItLy9XM0MvL0RURCBTVkcgMS4xLy9FTiIgImh0dHA6Ly93d3cudzMub3JnL0dyYXBoaWNzL1NWRy8xLjEvRFREL3N2ZzExLmR0ZCI+CjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB4bWxuczp4bGluaz0iaHR0cDovL3d3dy53My5vcmcvMTk5OS94bGluayIgdmVyc2lvbj0iMS4xIiBpZD0iQ2FwYV8xIiB4PSIwcHgiIHk9IjBweCIgdmlld0JveD0iMCAwIDIxNC4zNjcgMjE0LjM2NyIgc3R5bGU9ImVuYWJsZS1iYWNrZ3JvdW5kOm5ldyAwIDAgMjE0LjM2NyAyMTQuMzY3OyIgeG1sOnNwYWNlPSJwcmVzZXJ2ZSIgd2lkdGg9IjUxMnB4IiBoZWlnaHQ9IjUxMnB4Ij4KPHBhdGggZD0iTTIwMi40MDMsOTUuMjJjMCw0Ni4zMTItMzMuMjM3LDg1LjAwMi03Ny4xMDksOTMuNDg0djI1LjY2M2wtNjkuNzYtNDBsNjkuNzYtNDB2MjMuNDk0ICBjMjcuMTc2LTcuODcsNDcuMTA5LTMyLjk2NCw0Ny4xMDktNjIuNjQyYzAtMzUuOTYyLTI5LjI1OC02NS4yMi02NS4yMi02NS4yMnMtNjUuMjIsMjkuMjU4LTY1LjIyLDY1LjIyICBjMCw5LjY4NiwyLjA2OCwxOS4wMDEsNi4xNDgsMjcuNjg4bC0yNy4xNTQsMTIuNzU0Yy01Ljk2OC0xMi43MDctOC45OTQtMjYuMzEzLTguOTk0LTQwLjQ0MUMxMS45NjQsNDIuNzE2LDU0LjY4LDAsMTA3LjE4NCwwICBTMjAyLjQwMyw0Mi43MTYsMjAyLjQwMyw5NS4yMnoiIGZpbGw9IiMwMDAwMDAiLz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPC9zdmc+Cg==" alt="load more" width="50" style="    margin-bottom: 10px;" alt="Load More inspiring villa" />
                                                <br>
                                                Load More...
                                            </div>
                                        </div>
                                        <?php
											}?>
                                            
                                            <div class="col-xs-12 col-sm-6 col-md-4 mob box_loadmore">
                                                <div class="col-md-12 gr_load_mob text-center">
                                                	<i class="fa fa-arrow-down f30"></i>
                                                    <br>
                                                    LOAD MORE...
                                                </div>
                                            </div>
                                    </div>
                                    
                                    	<div class="rooms " style="padding-top: 0px;"></div><!--ใช้งาน--> <!--col-md-12 col-sm-12 col-xs-12 padtop400 mtop01-->
                                        <div class="loadd" style="display:none;">
                                            <img src="<?php echo S3_BUCKET_URL ?>/upload/loading.gif" width="50" alt="Loading inspiring villa"><br>Loading..
                                        </div>
                                    
                                    
                                </div>
                                </div><?php /*?>row<?php */?>
                                </div><?php /*?>container<?php */?>
                                <?php /*?></div><?php */?><?php /*?>container<?php */?>
                                
                                <?php /*?><div class="container-fluid bgwh"><?php */?>
                                <div class="container">
                                    <div class="row">
                                       
                                    </div>
                                </div>
                                <?php /*?></div><?php */?>
                                
                            </div><?php /*?>mg-available-rooms<?php */?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div><br><br>
</div>


<div class="bgu bgu1"></div>
<div class="show_u"><i class="fa fa-times cloo" ></i>
    <div class="youtube"></div>
</div>

<div class=" bgu2"></div>
<div class="end_boxes">
    <i class="fa fa-times cloos pull-right" ></i>
    <div class="vi_box"></div>
</div>
<!-- มาร์กอัป JSON-LD ที่สร้างขึ้นโดยโปรแกรมช่วยมาร์กอัปข้อมูลที่มีโครงสร้างของ Google -->

<?php /*?><script type="application/ld+json">
{
  "@context" : "http://schema.org",
  "@type" : "Product",
  "image" : <?php echo $all_photo;?>
}
</script><?php */?>
<?php /*?>[ "https://www.inspiringvillas.com/upload/property//photo_1507877080.png", "https://www.inspiringvillas.com/upload/property//photo_1505371848.png", "https://www.inspiringvillas.com/upload/property//photo_1520
584996.jpg", "https://www.inspiringvillas.com/upload/property//photo_1529642020.jpg", "https://www.inspiringvillas.com/upload/property//photo_1522905719.jpg" ]<?php */?>


<?php /*?><pre>
<?php print_r($all_urls);?>
</pre>
<?php */?>


<?php $asd = json_decode($all_urls,true);
$c_all_url = count($ar_url);
$i_count = 1;

?>
<?php /*?><pre><?php
foreach($asd as $aa)
{
    echo '{';
    echo '"@type" : "'.$aa['@type'].'",<br>';
    echo '"name" : "'.$aa['name'].'",<br>';
    echo '"image" : "'.$aa['image'].'",<br>';
    echo '"position" : "'.$aa['position'].'",<br>';
    echo '"url" : "'.$aa['url'].'",<br>';
    echo '"author" : {
        "@type" : "'.$aa['author']['@type'].'",
        "name" : "'.$aa['author']['name'].'"}<br>';
    
    
    if($c_all_url == $i_count)
    {
        echo '}';
    }
    else
    {
        echo '},';
    }
    echo '<br>';
    $i_count++;
}
?>
</pre>    
<?php */?>
<?php /*?><script type="application/ld+json">
{
    <?php 
    foreach($asd as $aa)
    {
        echo '{';
        echo '"@type" : "'.$aa['@type'].'",';
        echo '"name" : "'.$aa['name'].'",';
        echo '"image" : "'.$aa['image'].'",';
        echo '"position" : "'.$aa['position'].'",';
        echo '"url" : "'.$aa['url'].'",';
        //echo '"author" : {
//            "@type" : "'.$aa['author']['@type'].'",
//            "name" : "'.$aa['author']['name'].'"}';
        
        
        if($c_all_url == $i_count)
        {
            echo '}';
        }
        else
        {
            echo '},';
        }
        //echo '<br>';
        $i_count++;
    }
    
    ?>
}
</script><?php */?>

<?php /*?>---------------used---------------------
<script type="application/ld+json">
{
  "@context":"http://schema.org",
  "@type":"ItemList",
  "itemListElement":[
      <?php 
    foreach($asd as $aa)
    {
        echo '{';
        echo '"@type" : "'.$aa['@type'].'",';
        echo '"name" : "'.$aa['name'].'",';
        echo '"image" : [';
			$i_z=0;
			foreach($aa['image'] as $aa_photo)
			{
				echo '"';
				echo $aa_photo;
				if($i_z<4)
				{
					$i_z++;
					echo '",';					
				}
				else
				{
					echo '"';
				}
				
			}
			echo '],';
		//echo '"image" : "'.$aa['image'].'",';
        echo '"position" : "'.$aa['position'].'",';
        echo '"url" : "'.$aa['url'].'"';
        //echo '"author" : "'.$aa['author'].'"';
        
        
        if($c_all_url == $i_count)
        {
            echo '}';
        }
        else
        {
            echo '},';
        }
        $i_count++;
    }
    ?>
  ]
}
</script>
>---------------used---------------------
<?php */?>

<?php /*?><script type="application/ld+json">
{
  "@context":"http://schema.org",
  "@type":"ItemList",
  "itemListElement":<?php echo $all_urls;?>
}
</script><?php */?>
<script language="JavaScript">
function pop_enquiry(id,name)
{
    $(".vi_name").html(name);
    
    $.ajax({
        url:"<?php echo $url_link;?>libs/actions/fr_enquire.php",
        type:"POST",
        dataType:"html",
        data:{id:id,name:name,pages:"forrent"},
        success: function(res){
            $(".vi_box").html(res);
            $(".bgu2").fadeIn(200,function(){
                $(".end_boxes").fadeIn(300);
            });
        }
    });
}

function popu(id)
{
    $.ajax({
        url:"<?php echo $url_link;?>libs/pages/youtube.php",
        type:"POST",
        dataType:"html"    ,
        data:{id:id},
        success: function(res){
            $(".youtube").html(res);
            $(".bgu1").fadeIn(300,function(){
                $(".show_u").fadeIn(300);
            });
        }
    });
}
$(document).ready(function(e) {
    $(".bgu1,.cloo").click(function(e) {
        $(".bgu1").fadeOut(300);
        $(".show_u").fadeOut(300);
        $(".youtube").html('');
    });
     $(".cloos").click(function(e) {
        $(".bgu2,.end_boxes").fadeOut(300);
    });
});

var des = '<?php echo isset($_REQUEST['des'])?$_REQUEST['des']:'all';?>';
var beach = '<?php echo isset($_REQUEST['sub'])?$_REQUEST['sub']:'all';?>';
var price = '<?php echo isset($_REQUEST['pri'])?$_REQUEST['pri']:'all';?>';
var cate = '<?php echo isset($_REQUEST['cate'])?$_REQUEST['cate']:'0';?>';
var room = '<?php echo isset($_REQUEST['room'])?$_REQUEST['room']:'all';?>';
var b_rooms = '<?php echo isset($_REQUEST['room'])?$_REQUEST['room']:'';?>';
var link_url = '<?php echo $_SERVER['REQUEST_URI'];;?>';
var tigg = true;
var starts = 5;
var stoped = '<?php echo $num;?>';
var my_footers;
 
$(document).ready(function(e) {
    
    $("#starts").val(5);
    $("#stoped").val(stoped);
    
    $("#cbbSort").change(function(e) {
        $(".mt10").css({"margin-bottom":"0px"});
        $("#starts").val(0);
        tigg = true;
        starts = 5;
        $(".loadd").fadeIn();
        $(".roomold").hide(0);
        $("#tx_sort").val($(this).val());
        
        $('body,html').animate({
            scrollTop: 0
        }, 800);
        
        $(".mtop01").addClass('mtop0');
            
            
        $.ajax({
            url:"<?php echo $url_link;?>libs/actions/action-load-property.php",
            type:"POST",
            dataType:"html"    ,
            data:$("#forn_search_rent").serialize(),
            success: function(res){
                $(".loadd").fadeOut();
                $(".rooms").html(res);
            }
        });
    });
    
    
    $(window).scroll(function () {
        if($(window).width()<976)
        {
            my_footers = $(".my_footers").offset().top-550;
        }
        else
        {
            my_footers = $(".my_footers").offset().top-850;
        }
        
        if ($(this).scrollTop() > my_footers) 
        {
            
            if(tigg==true)
            {
                //alert(starts);
                tigg = false;
				$(".gr_load_mob").css({"display":"none"});
                $(".loadd").show();
                $.ajax({
                    url:"<?php echo $url_link;?>libs/actions/action-load-property.php",
                    type:"POST",
                    dataType:"html",
                    data:{cbbDestination:des,cbbSub:beach,pri:price,starts:starts,cbbRoom:room,cbbCollection:cate,bedroomRangeFilter:b_rooms,cbbSort:$("#cbbSort").val(),txs:$("#txs").val(),link_url:link_url,view:$("#view").val()},
					//data:{cbbDestination:des,cbbSub:beach,pri:price,starts:starts,cbbRoom:room,cbbCollection:cate,cbbActualbed:b_rooms,cbbSort:$("#cbbSort").val(),txs:$("#txs").val(),link_url:link_url},
                    success: function(res){
                        $(".loadd").css({"display":"none"});
                        $(".rooms").append(res);
                        $(".box_loadmore").css({"display":"none"});
                        
                        if(starts<=stoped)
                        {
                            starts+=5;
                            tigg = true;
                            $("#starts").val(starts);
                        }
                        else
                        {
                            starts=stoped;
                            $("#starts").val(starts);
                            tigg = false;
                            $(".loadd").css({"display":"none"});
                        }
                        
                    }
                });
            }
            
            
        }
        else
        {
            
        }
    });
});
$(document).ready(function(e) {
    $(".lazy").lazyload();
});

<?php /*?>$(document).ready(function(e) {
   
    $(".slide").swipe({
    
      swipe: function(event, direction, distance, duration, fingerCount, fingerData) {
    
        if (direction == 'left') $(this).carousel('next');
        if (direction == 'right') $(this).carousel('prev');
    
      },
      allowPageScroll:"vertical"
    
    });
});
<?php */?>
//-->
</script>

<?php
//---- google remarketing
if($_REQUEST['des']=='all' && $_REQUEST['sub']=='all' && $_REQUEST['pri']=='all' && $_REQUEST['room']=='all')
{
    include "libs/pages/google_remarketing.php";
}
elseif($_REQUEST['des']=='38' && $_REQUEST['sub']=='all' && $_REQUEST['pri']=='all' && $_REQUEST['room']=='all')
{
    include "libs/pages/google_remarketing.php";
}
elseif($_REQUEST['des']=='39' && $_REQUEST['sub']=='all' && $_REQUEST['pri']=='all' && $_REQUEST['room']=='all')
{
    include "libs/pages/google_remarketing.php";
}
//---- google remarketing


?>

<!-- This site is converting visitors into subscribers and customers with OptinMonster - https://optinmonster.com-->
<script type="text/javascript" src="https://a.optmnstr.com/app/js/api.min.js" data-account="41772" data-user="36782" async></script>
<!-- / OptinMonster -->
<style>
@media screen and (min-width:385px) and (max-width:768px)
{
	.tx_discount_old
  {
  	font-size: 12px !important;
  }
}
</style>
