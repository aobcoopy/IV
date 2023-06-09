<?php
    session_start();
    include_once "../../config/define.php";
    include_once "../class/db.php";
    include_once "../class/minerva.php"; 
    include_once "../../inc/functions.inc.php"; 
    
    @ini_set('display_errors',DEBUG_MODE?1:0);
    date_default_timezone_set(DEFAULT_TIMEZONE);
    
    $dbc = new dbc;
    $dbc->Connect();
    $os = new minerva($dbc);
    $textH2 = isset($_REQUEST['textH2'])?$_REQUEST['textH2']:'';
    $starts = $_REQUEST['starts'];
    $new_starts = $_REQUEST['starts'];
    $zzx = $starts;    
    $_REQUEST['view'] = isset($_REQUEST['view'])?$_REQUEST['view']:'';
	
    // search exclusion/inclusion
    $searchChannels = $_REQUEST['cbbDestination'] . "|" . $_REQUEST['cbbSub'] . "|"  .$_REQUEST['cbbRoom'] . "|" . $_REQUEST['cbbCollection'];
    //$exclusionInclusionRule = " AND (properties.exclude_from_search NOT LIKE '%" . $searchChannels . "%' OR properties.exclude_from_search IS NULL)";
    //$exclusionInclusionRule .= " ) OR properties.include_in_search LIKE '%" . $searchChannels . "%') "; 
    $exclusionInclusionRule = " AND (LOCATE('" . $searchChannels . "', properties.exclude_from_search)=0 OR properties.exclude_from_search IS NULL)";
    $exclusionInclusionRule .= " ) OR LOCATE('" . $searchChannels . "', properties.include_in_search)>0 ) ";  
    
    //$sortByMostPopular = "LOCATE('" . $searchChannels . "', include_in_search) desc"; 
    $sortByMostPopular = " FIELD(include_in_search, '" . $searchChannels . "') desc";  
         
    // only show Thailand villas for "all" searches
    if( $_REQUEST['cbbDestination'] == "all") $thailandFilter = "destinations.parent IN (" . destinationIDs_forCountry($dbc, 2) . ") AND ";
    else $thailandFilter = ""; 
    
    // deactivate inclusion rule
    //$exclusionInclusionRule = " )";

	$padd = "";
	$padd_1 = "";
	$paddbutt ="";
	
	if($_REQUEST['view']!='')
	{
		$v = explode("#",$_REQUEST['view']);
		$view = $_REQUEST['view'];//$v[1];
	}
	else
	{
		$view = 'list';
	}
	//echo '>>>>>'.$view;
	
	$zzx = $starts;
    
    //echo $_REQUEST['cbbDestination'];
    $Destination='';
    if(isset($_REQUEST['cbbDestination']))
    {
        if($_REQUEST['cbbDestination']!='all')
        {
            $Destination="properties.destination = '".$_REQUEST['cbbDestination']."' ";
        }
        else
        {
            $Destination="properties.destination  BETWEEN '38' AND '39' ";
        }
    }
    
    $SubDes='';
    if(isset($_REQUEST['cbbSub']))
    if($_REQUEST['cbbSub']!='all')
    {
        $SubDes="AND properties.subdestination = '".$_REQUEST['cbbSub']."' ";
    }
    else
    {
        $SubDes="";
    }
    
    
    
    
    $Room='';
    if(isset($_REQUEST['cbbRoom']))
    //$ex_room = explode("-",$_REQUEST['cbbRoom']);
    if($_REQUEST['cbbRoom']=='all')
    {
        $Room="";
    }
    else
    {
        if($_REQUEST['cbbRoom']==3 )
        {
            $Room = "AND property_room.room  BETWEEN '3' AND '4' ";
        }
        else
        {
            $Room = "AND property_room.room = '".$_REQUEST['cbbRoom']."'";
        }
    }
    
    $Collection='';
    if(isset($_REQUEST['cbbCollection']) && $_REQUEST['cbbCollection']!=0)
    {
        $Collection = "AND property_cate.caategory = '".$_REQUEST['cbbCollection']."'  ";
    }
    else
    {
        $Collection = '';
    }

    $ActualBedrooms = "";
    if(isset($_REQUEST['cbbActualbed']) && $_REQUEST['cbbActualbed'] != "")
    {
        $ActualBedrooms = "AND properties.actualbed = ".$_REQUEST['cbbActualbed']." ";
    }    

    
    $link_url = $_REQUEST['link_url'];
    $ar_link = array(
        
        '/search-rent/thailand/all-beach/all-price/8-10-bedrooms/all-collections/all-sort.html',
        
        '/search-rent/thailand/all-beach/all-price/all-bedrooms/wedding-villas/all-sort.html',
        '/search-rent/thailand/all-beach/all-price/all-bedrooms/larger-group-villas/all-sort.html',
        '/search-rent/thailand/all-beach/all-price/all-bedrooms/seaview-villas/all-sort.html',
    );
    $ar_link_1_1 = array(
        '/search-rent/thailand/all-beach/all-price/5-7-bedrooms/all-collections/all-sort.html',
    );
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
        '/search-rent/thailand-phuket/all-beach/all-price/1-4-bedrooms/all-collections/all-sort.html',
    );    
    $ar_link_7 = array(
        '/search-rent/thailand-phuket/all-beach/all-price/all-bedrooms/beachfront-villas/all-sort.html',
    );
    $ar_link_8 = array(
        '/search-rent/thailand-phuket/all-beach/all-price/all-bedrooms/wedding-villas/all-sort.html',
        '/search-rent/thailand-phuket/all-beach/all-price/all-bedrooms/seaview-villas/all-sort.html',
    );
    $ar_link_9 = array(
        '/search-rent/thailand-phuket/all-beach/all-price/all-bedrooms/all-collections/all-sort.html',
    );
    $ar_link_10 = array(
        '/search-rent/thailand-koh-samui/all-beach/all-price/all-bedrooms/wedding-villas/all-sort.html',
    );
    $ar_link_11 = array(
        '/search-rent/thailand/all-beach/all-price/all-bedrooms/beachfront-villas/all-sort.html',
    );
    $ar_link_12 = array(
        '/search-rent/thailand/all-beach/all-price/1-4-bedrooms/all-collections/all-sort.html',
    );
    
                                
    if(in_array($link_url,$ar_link))
    {
        $starts += 5;
        //echo 'YESSSSSS';
    }
    elseif(in_array($link_url,$ar_link_1_1))
    {
        $starts += 10;
        //echo 'YESSSSSS___2';
    }
    elseif(in_array($link_url,$ar_link_2))
    {
        $starts +=  1;
        //echo 'YESSSSSS___2';
    }
    elseif(in_array($link_url,$ar_link_3))
    {
        $starts += 12;
    }
    elseif(in_array($link_url,$ar_link_4))
    {
        $starts += 16;
    }
    elseif(in_array($link_url,$ar_link_5))
    {
        $starts += 20;
    }
    elseif(in_array($link_url,$ar_link_6))
    {
        $starts += 2;
    }
    elseif(in_array($link_url,$ar_link_7))
    {
        $starts += 2;
    }
    elseif(in_array($link_url,$ar_link_8))
    {
        $starts += 1;
    }
    elseif(in_array($link_url,$ar_link_9))
    {
        $starts += 1;
    }
    elseif(in_array($link_url,$ar_link_10))
    {
        $starts += 1;
    }
    elseif(in_array($link_url,$ar_link_11))
    {
        $starts += 6;
        //echo 'YESSSSSS';
    }
    elseif(in_array($link_url,$ar_link_12))
    {
        $starts += 6;
        //echo 'YESSSSSS';
    }
    else
    {
        //echo 'NOOOOOOOOOOOOOOOOOOOOOOOOO';
        //$starts = "0";
    }    
    
    if($link_url == '/search-rent/thailand/all-beach/all-price/5-7-bedrooms/all-collections/all-sort.html')
    {
        $in_list = "AND properties.id NOT IN (19)";
    }
    elseif($link_url == '/search-rent/thailand-phuket/all-beach/all-price/all-bedrooms/larger-group-villas/all-sort.html')
    {
        //$in_list = "AND properties.id NOT IN (63)";
    }
    else
    {
        $in_list = "";
    }
    
    
    $sorted='';
    if($_REQUEST['cbbSort']!='0' )
    {
        $ex_s = explode("|",$_REQUEST['cbbSort']);
        
        /*if($ex_s[0]=='tag')
        {
            $sorted = "AND tag = ".$ex_s[1]." ";
        }
        else
        {
            $sorted = "ORDER BY ".$ex_s[0]." ".$ex_s[1]." ";
        }*/
        
        if($_REQUEST['cbbSort']!='0'  || $_REQUEST['cbbSort']!='')
        {
            //$ex = explode("|",$_REQUEST['cbbSort']);
            
            if( $ex_s[0]." ".$ex_s[1] == "price asc") $sorted = "ORDER BY " . $sortByMostPopular . ", ".$ex_s[0]." ".$ex_s[1]." limit ".$new_starts.",5 ";
            else $sorted = "ORDER BY ".$ex_s[0]." ".$ex_s[1]." limit ".$new_starts.",5 ";
        }
        else
        {
            $sorted = "";
        }
    }
    else
    {
        $sorted = "";
    }

    
    
    //echo '>>>>>>>>>>>'.$_REQUEST['cbbSort'].'<<<<<<<<<<<<<br>';
//    echo '>>>>>>>>>>>'.$sorted.'<<<<<<<<<<<<<br>';
    
    $sql = "SELECT
                properties.id,
                properties.`name` AS pname,
                properties.exclude_from_search,
                properties.include_in_search,                
                properties.destination AS destination,
                properties.subdestination AS beach,
                destinations.`name` AS dname,
                property_room.room AS room,
                property_cate.caategory AS cate,
                categories.`name` AS cname,
                properties.actualbed,
                properties.`status`,
                properties.price,
                properties.pmin,
                properties.pmax,
                properties.price_range,
                properties.ht_link,
                properties.brief,
                properties.short_det,
                properties.detail,
                properties.photo,
                properties.tag,
                properties.adults AS adults,
                properties.cate_icon AS cate_icon,
				properties.discount,
                properties.bedroom_range AS bedroom_range,
				properties.tag_exp AS tag_exp,
				properties.pmin_th AS pmin_th,
				properties.pmax_th AS pmax_th,
                properties.pro_exp AS pro_exp
                
            FROM
            properties
                LEFT JOIN property_cate ON properties.id = property_cate.property
                LEFT JOIN property_room ON properties.id = property_room.property
                LEFT JOIN destinations ON properties.subdestination = destinations.id
                LEFT JOIN categories ON property_cate.caategory = categories.id
            WHERE " . $thailandFilter . "( (
                ".$Destination."
                ".$SubDes."
                ".$Room."
                ".$Collection."
                ".$ActualBedrooms."
                 ".$in_list."
                " . $exclusionInclusionRule . "                 
                AND properties.`status` > 0
                AND destinations.status > 0
                GROUP BY
                properties.id
                ".$sorted."    ";
                
                
    $Qry = $dbc->Query($sql);

    
    $counts=0;
    if($counts==0)
    {?>
        <?php /*?><br>
        <center>
            <font size="+5" color="#f05b46"><img src="/upload/notfound.png" width="200"></font><br><br>
            <font size="+2" color="#112845">Not Found Please try again</font>
        </center><?php */?>
        <?php
    }
    
    
    //$_REQUEST['txs'];    
    $x=0;    
	$zz=0;                    
    while($row = $dbc->Fetch($Qry))
    {
        if($row['tag']!=0)
        {
            $tag = $dbc->GetRecord("tags","*","id = '".$row['tag']."' ");
            $tag_name = $tag['name'];
        }
        else
        {
            $tag_name ='';
        }
        $photo = json_decode($row['photo'],true);
        /*$laa = $row['latitude'];
        $loo = $row['longtitude'];
        $amap = array(
            'la' => $row['latitude'],
            'lo' => $row['longtitude']
        );
        array_push($arr_map,$amap);*/
		
        $name = explode("|",$row['pname']);
        
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
        
        //echo $row['dname']."<br>";// แสดงข้อความเต็ม
        
        
        
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
                                            
        
        $x++;
        $ft = "";//($x==1)?'ftt':'';
        
        $zzx++;
        
        if($zzx=='1' ||  $zzx=='6' || $zzx=='8' || $zzx=='11' || $zzx=='13')
        {
            $padd = "";//style='padding-bottom: 40px;'
        }
        else
        {
            $padd = "";
        }
        
        if($photo[0]['name']=='')
        {
            $img_tag = $name[0];
        }
        else
        {
            $img_tag = $name[0].'- '.$photo[0]['name'];
        }
        
		
		$arr_tag_id = array();
		$sql_tags = $dbc->Query("select * from tags where status > 0");
		while($l_tag = $dbc->Fetch($sql_tags))
		{
			array_push($arr_tag_id,$l_tag['id']);
		}
		
		
		if($view=='grid')
		{
			include "libs/pages/page_property_grid.php";
		}
		else
		{
			include "../pages/page_property_list.php";
		}



		if($view=='grid')
		{
			if($zzx=='3' || $zzx=='9' || $zzx=='15')
			{
				echo '<div class="col-md-12"><div class="villa_boxs_mini- photo_banner web"><a href="/contact" ><img src="/upload/search/1111.jpg" width="100%" alt="CONCIERGE OFFER"> </a></div></div>';
				echo '<div class="villa_boxs_mini photo_banner mob"><a href="/contact" ><img src="/upload/search/mm111.jpg" width="100%" alt="CONCIERGE OFFER"> </a></div>';
				
				//echo '<div class="col-md-12"><a href="/contact" ><button class="bad clicking tupper"><strong>receive $150 off any excursion booking during your villa stay with us*</strong></button></a></div>';
			}
			if($zzx=='6' || $zzx=='12' || $zzx=='18')
			{
				echo '<div class="col-md-12"><div class="villa_boxs_mini- photo_banner web"><img src="/upload/search/2222.jpg" width="100%" alt="EXCURISON PROMOTION"></div></div>';
				echo '<div class="villa_boxs_mini photo_banner mob "><img src="/upload/search/mm22.jpg" width="100%" alt="EXCURISON PROMOTION"></div>';
				//echo '<div class="col-md-12"><a href="/contact"><button class="bad adblu clicking"><strong>LET US FIND THE VILLA OPTIONS FOR YOU  - CONCIERGE SERVICE AVAILABLE</strong><strong class="tred"> - Click Here!</strong></button></a></div>';
			}
		}
		else
		{
			if($zzx=='8' )//|| $zzx=='18' || $zzx=='28' || $zzx=='38'
			{
				if($row['destination']==110 || $row['destination']==100)
				{
					//-----Nolink
					/*echo '<div class="villa_boxs_mini photo_banner web"><img src="/upload/search/11111.jpg" width="100%" alt="CONCIERGE OFFER"></div>';
					echo '<div class="villa_boxs_mini photo_banner photo_banner_mob mob"><img src="/upload/search/mm111.jpg" width="100%" alt="CONCIERGE OFFER"></div>';*/
				
					echo '<div class="villa_boxs_mini ">';
						echo '<div class="villa_boxs_mini_2">';
							echo '<ul class="ads_ul">';
								echo '<li><img data-src="'.$url_link.'upload/fa-check.png" class="lazy"> Best Price Guaranteed </li>';
								echo '<li><img data-src="'.$url_link.'upload/fa-check.png" class="lazy"> $150 Excursion Credit Gift</li>';
								echo '<li><img data-src="'.$url_link.'upload/fa-check.png" class="lazy"> No Booking Fees</li>';
							echo '</ul>';
						echo '</div>';
					echo '</div>';
				}
				else
				{
					//-----Nolink
					/*echo '<div class="villa_boxs_mini photo_banner web "><img src="/upload/search/22222.jpg" width="100%" alt="EXCURISON PROMOTION"></div>';
					echo '<div class="villa_boxs_mini photo_banner photo_banner_mob mob "><img src="/upload/search/mm22.jpg" width="100%" alt="EXCURISON PROMOTION"></div>';*/
					
					/*echo '<div class="villa_boxs_mini ">';
						echo '<div class="villa_boxs_mini_2">';
							echo '<ul class="ads_ul">';
								echo '<li><img data-src="'.$url_link.'upload/fa-check.png" class="lazy"> Best Price Guaranteed </li>';
								echo '<li><img data-src="'.$url_link.'upload/fa-check.png" class="lazy"> $150 Excursion Credit Gift</li>';
								echo '<li><img data-src="'.$url_link.'upload/fa-check.png" class="lazy"> No Booking Fees</li>';
							echo '</ul>';
						echo '</div>';
					echo '</div>';*/
					
					echo '<div class="villa_boxs_mini web">';
						echo '<div class="villa_boxs_mini_2">';
							echo '<ul class="ads_ul">';
								echo '<li><img src="/upload/fa-check.png" > Best Price Guaranteed </li>';
								echo '<li><img src="/upload/fa-check.png" > $150 Excursion Credit Gift</li>';
								echo '<li><img src="/upload/fa-check.png" > No Booking Fees</li>';
							echo '</ul>';
						echo '</div>';
					echo '</div>';
					echo '<div class="villa_boxs_mini photo_banner photo_banner_mob mob "><img src="/upload/search/mm22.jpg" width="100%" alt="EXCURISON PROMOTION"></div>';
												
					//-----link
					/*echo '<div class="villa_boxs_mini photo_banner web "><a href="/contact#viewform" ><img src="/upload/search/22222.jpg" width="100%" alt="EXCURISON PROMOTION"></a></div>';
					echo '<div class="villa_boxs_mini photo_banner photo_banner_mob mob "><a href="/contact#viewform" ><img src="/upload/search/mm22.jpg" width="100%" alt="EXCURISON PROMOTION"></a></div>';*/
				}
				//echo '<div class="villa_boxs_mini"><a href="/contact"><button class="bad adblu clicking"><strong>LET US FIND THE VILLA OPTIONS FOR YOU  - CONCIERGE SERVICE AVAILABLE</strong> <strong class="tred">- Click Here!</strong></button></a></div>';
			}
			elseif($zzx=='12')
			{
				
				$url_link = '/';
				if($_REQUEST['cbbDestination']==38)
				{
					$img_vdo = "Phuket";
					$texts = "Discover Phuket ";
				}
				elseif($_REQUEST['cbbDestination']==39)
				{
					$img_vdo = "Koh_Samui";
					$texts = "Discover Koh Samui";
				}
				else
				{
					$texts = "Discover Thailand";
					$img_vdo = "pall";
				}
				//echo $img_vdo.'---'.$url_link;
				
				?>
				<?php /*?><div class="container tvdo tvdo_2">
				<div class=" web">    
					<div class="col-md-12 pal nopad ">
						<div class="col-md-12  nopad">
							<div class="filters"></div>
							<div class="text-center ttmain"><?php echo $texts;?></div>
							<div class="ttsub text-center"></div>
							<i class="fa fa-play-circle" onClick="popu('<?php echo $_REQUEST['cbbDestination'];?>')"></i>
							<div class="imggs">
								<img class="lazy" data-src="<?php echo $url_link;?>upload/<?php echo $img_vdo;?>.jpg" width="100%" class="vdo_cov">
							</div>
						</div>
					</div>
				</div>
				<div class=" mob">
					<div class="col-md-12 pal nopad pmob ">
						<div class="col-md-12 cinside nopad">
							<div class="filters2"></div>
							<div class="text-center ttmain"><?php echo $texts;?></div>
							<div class="ttsub text-center"></div>
							<i class="fa fa-play-circle" onClick="popu('<?php echo $_REQUEST['cbbDestination'];?>')"></i>
							<div class="imggs">
								<img class="lazy" data-src="<?php echo $url_link;?>upload/<?php echo $img_vdo;?>2.jpg" width="100%" class="vdo_cov">
							</div>
						</div>
					</div>
				</div>
				</div><?php */?>
				<?php
			}
		}    
		
		
		           
    }
		
		
		
		
		
		
		
    
    
    
    
    
    
    
//    $price='';
//    if(isset($_REQUEST['cbbPrice']))
//    if($_REQUEST['cbbPrice']!='all')
//    {
//        if($_REQUEST['cbbPrice']=='1')//all price
//        {
//            $price="";
//        }
//        elseif($_REQUEST['cbbPrice']=='2')// < 1000
//        {
//            $price="AND price < 1000";
//        }
//        else// > 1000
//        {
//            $price="AND price > 1000";
//        }
//        
//    }
//    else
//    {
//        $price="";
//    }
    
    
    
    
//    $view = '';
//    if(isset($_REQUEST['t_view']))
//    {
//        $view = $_REQUEST['t_view'];
//    }
    
    
    
    
    

        
        
        
        //$num1 = count($prop_villa);
//        if(count($arr_room_load)>0)
//        {
//            echo '
//            <div class="col-xs-12 col-sm-12 col-md-12 aab nopad">
//            <div  style="margin-left:0px;">
//            <h4 class="f16 ilb" style="font-family: pt !important;">Displaying '.$u.'</h4> <h2 class="f16 ilb" style="font-family: pt !important;">hand-picked villas in your search for </h2>
//            <h2 style="margin-top: 0px;    margin-left: -2px;">'.$textH2.'</h2>
//            <br>
//            </div>
//            </div>';
//            //echo '<div style="margin-left:15px;"><h2 style="margin-top: -25px;">'.$textH2.'</h2>
//             // <h4 style="    font-family: pt !important;">Displaying '.$u.'  hand picked villas in your search </h4><br></div>';
//        }
//        else
//        {
//            
//                //echo '<div style="margin-left:15px;"><h2 style="margin-top: -25px;">'.$textH2.' </h2>
//              //<h4 style="    font-family: pt !important;">Displaying '.$nn.'  hand picked villas in your search </h4><br></div>';
//        }
        
              
        
              
                        
    
    

    
function slide_photo($photo,$i)
{
    //echo '***************'.$photo[0]['img'];
    echo '<div id="caro-'.$i.'" class="carousel slide" data-ride="carousel" data-interval="false">';
        echo '<!-- Indicators -->';
        echo '<ol class="carousel-indicators">';
        for($a=0;$a<count($photo);$a++)
        {
            $acc = ($a==0)?'active':'';
            if($a<=2)
            {
                echo '<li data-target="#caro-'.$i.'" data-slide-to="'.$a.'" class="'.$acc.'"></li>';
            }
        }
        echo '</ol>';
        
        echo '<!-- Wrapper for slides -->';
        echo '<div class="carousel-inner" role="listbox">';
        $b=0;
            foreach($photo as $img)
            {
                //echo '***************'.$img['img'];
                $actt = ($b==0)?'active':'';
                if($b<=2)
                {
                    echo '<div class="item '.$actt.'">';
                        echo '<img src="'.imagePath($img['img']).'" alt="" class="img-responsive">';
                    echo '</div>';
                }
                
                $b++;
                
            }
        echo '</div>';
        
        echo '<!-- Controls -->';
        echo '<a class="left carousel-control" href="#caro-'.$i.'" role="button" data-slide="prev">';
        echo '</a>';
        echo '<a class="right carousel-control" href="#caro-'.$i.'" role="button" data-slide="next">';
        echo '</a>';
    echo '</div>';
}

    
    
 function string_len($text,$amount)
{
    if(strlen($text)>$amount)
    {
        return substr($text,0,$amount).'...';
    }
    else
    {
        return $text;
    }
}
?>
<script>
$(document).ready(function(e) {
    $(".lazy").lazyload();
});
</script>

<style>
@media screen and (max-width:768px)
{
	.tvdo_2
	{
		/*background:red;*/
		padding:0;
		width:100%;
		float:left;
		margin-bottom:70px;
		margin-top:0px;
	}
}
@media screen and (min-width:768px) and (max-width:992px)
{
	.tvdo_2
	{
		/*background:red;*/
		padding:0;
		width:720px;
		float:left;
		margin-bottom:45px;
		margin-top:0px;
	}
}
@media screen and (min-width:992px) and (max-width:1200px)
{
	.tvdo_2
	{
		/*background:red;*/
		padding:0;
		width:905px;
		float:left;
		margin-bottom:45px;
		margin-top:10px;
	}
}
@media screen and (min-width:1200px)
{
	.tvdo_2
	{
		/*background:red;*/
		padding:0;
		width:1105px;
		float:left;
		margin-bottom:45px;
		margin-top:0px;
	}
}
</style>