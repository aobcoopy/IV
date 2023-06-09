<?php
    
  /* This file is not used anymore */  
    
?>
<?php /*?><div class="container-fluid bgwh"><?php */?>
<div class="container">
<div class="row">
<?php    

    $dest = $_REQUEST['des'];
    $beachs = $_REQUEST['sub'];
    $collec = $_REQUEST['cate'];
    $bedroom = $_REQUEST['room']; 
    

    //echo "/?page=forrent&des=" . $_REQUEST['des'] . "&sub=" . $_REQUEST['sub'] . "&pri=" . $_REQUEST['pri'] . "&room=" . $_REQUEST['room'] . "&cate=" . $_REQUEST['cate'] . "&sort=all<br><br>";
    //echo _COUNTRY_ID . ", ".$_REQUEST['des'].", ".$_REQUEST['sub'].", ".$_REQUEST['pri'].", ".$_REQUEST['room'].", ".$_REQUEST['cate'].", 'price|asc'<br><br>";
    
    //display_breadcrumbs(_COUNTRY_NAME, _COUNTRY_ID, $_REQUEST['des'], $_REQUEST['sub'], $_REQUEST['room'], $_REQUEST['cate'], $_REQUEST['pri'], 'price|asc', $num);
    
?>



<?php

//die( URL_builder(_COUNTRY_ID, $_REQUEST['des'], $_REQUEST['sub'], 'all-prices', $_REQUEST['room'], $_REQUEST['cate'], 'price|asc') );
//die;

echo '<ol class="breadcrumb" style="background: white;">';
	if($dest=='all' && $dest!='') // Thailand Villas
	{
		if($bedroom!='all')
		{
			if($collec!='0')
			{
				$bread_link = "/search-rent/".destination_name_slug($dest)[1]."/".beach_bread(0)."/all-price/".bed_bread(0)."/".collection_bread(0)."/all-sort.html";
				echo '<li class=""><a href="'.$bread_link.'">Thailand Villas 11</a></li>';
				
				$bread_link = "/search-rent/".destination_name_slug($dest)[1]."/".beach_bread(0)."/all-price/".bed_bread($bedroom)."/".collection_bread(0)."/all-sort.html";
				echo '<li class=""><a href="'.$bread_link.'">'.bed_bread_name_noall($bedroom).' Thailand</a></li>';
				
				$bread_link = "/search-rent/".destination_name_slug($dest)[1]."/".beach_bread(0)."/all-price/".bed_bread(0)."/".collection_bread($collec)."/all-sort.html";
				echo '<li class="active"><a href="'.$bread_link.'">'.collection_bread_name_noall($collec).' Villa Thailand <span class="bnum">('.$num.')</span></a></li>';
			}
			else
			{
				$bread_link = "/search-rent/".destination_name_slug($dest)[1]."/".beach_bread(0)."/all-price/".bed_bread(0)."/".collection_bread(0)."/all-sort.html";
				echo '<li class=""><a href="'.$bread_link.'">Thailand Villas 22</a></li>';
				
				$bread_link = "/search-rent/".destination_name_slug($dest)[1]."/".beach_bread(0)."/all-price/".bed_bread($bedroom)."/".collection_bread(0)."/all-sort.html";
				echo '<li class="active"><a href="'.$bread_link.'">'.bed_bread_name_noall($bedroom).' Villa '.des_bread_name($dest).' <span class="bnum">('.$num.')</span></a></li>';
			}
		}
		else
		{
			if($collec!='0')
			{
				$bread_link = "/search-rent/".destination_name_slug(0)[1]."/".beach_bread(0)."/all-price/".bed_bread(0)."/".collection_bread(0)."/all-sort.html";
				echo '<li><a href="'.$bread_link.'">Thailand Villas 33</a></li>';
			
				$bread_link = "/search-rent/".destination_name_slug(0)[1]."/".beach_bread(0)."/all-price/".bed_bread(0)."/".collection_bread($collec)."/all-sort.html";
				echo '<li class="active"><a href="'.$bread_link.'">'.collection_bread_name_noall($collec).' Villa Thailand <span class="bnum">('.$num.')</span></a></li>';
			}
			else
			{
				$bread_link = "/search-rent/".destination_name_slug(0)[1]."/".beach_bread(0)."/all-price/".bed_bread($bedroom)."/".collection_bread($collec)."/all-sort.html";
				echo '<li class="active"><a href="'.$bread_link.'">Thailand Villas 44<span class="bnum">('.$num.')</span></a></li>';
			}
		}
		//<button class="bread_no">'.$count_destination.'</button>  '.bed_bread_name_noall($bedroom).' '.collection_bread_name_noall($collec).
	}
	elseif($dest!='all' && $dest!='')
	{
		if($bedroom!='all')
		{
			if($collec!='0')
			{
				$bread_link = "/search-rent/".destination_name_slug(0)[1]."/".beach_bread(0)."/all-price/".bed_bread(0)."/".collection_bread(0)."/all-sort.html";
				echo '<li><a href="'.$bread_link.'">Thailand Villas</a></li>';
				
				$bread_link = "/search-rent/".destination_name_slug($dest)[1]."/".beach_bread(0)."/all-price/".bed_bread(0)."/".collection_bread(0)."/all-sort.html";
				echo '<li><a href="'.$bread_link.'">'.des_bread_name($dest).' Villas</a></li>';
				
				$bread_link = "/search-rent/".destination_name_slug($dest)[1]."/".beach_bread(0)."/all-price/".bed_bread($bedroom)."/".collection_bread(0)."/all-sort.html";
				echo '<li class="active"><a href="'.$bread_link.'">'.bed_bread_name_noall($bedroom).' Villas '.des_bread_name($dest).' <span class="bnum">('.$num.')</span></a></li>';
				
				if($beachs!='all' && $beachs!='')
				{
					$beach_sql = $dbc->GetRecord("destinations","*","id ='".$beachs."'  and status > 0");
					$beac_name = explode(",",$beach_sql['name']);
					$bread_link = "/search-rent/".destination_name_slug($dest)[1]."/".beach_bread($beachs)."/all-price/".bed_bread(0)."/".collection_bread($collec)."/all-sort.html";
					//echo '<li class="active"><a href="'.$bread_link.'">'.collection_bread_name_noall($collec).' Villa '.str_replace("Beach","",$beac_name[0]).'-----------------</a></li>';
				}
				else
				{
					$bread_link = "/search-rent/".destination_name_slug($dest)[1]."/".beach_bread($beachs)."/all-price/".bed_bread(0)."/".collection_bread($collec)."/all-sort.html";
					//echo '<li class="active"><a href="'.$bread_link.'">'.collection_bread_name_noall($collec).' Villa '.des_bread_name($dest).'******</a></li>';
				}
			}
			else // no choice
			{
				$bread_link = "/search-rent/".destination_name_slug(0)[1]."/".beach_bread(0)."/all-price/".bed_bread(0)."/".collection_bread(0)."/all-sort.html";
				echo '<li><a href="'.$bread_link.'">Thailand Villas 66</a></li>';
				
				$bread_link = "/search-rent/".destination_name_slug($dest)[1]."/".beach_bread(0)."/all-price/".bed_bread(0)."/".collection_bread(0)."/all-sort.html";
				echo '<li><a href="'.$bread_link.'">'.des_bread_name($dest).' Villas</a></li>';
				
				$bread_link = "/search-rent/".destination_name_slug($dest)[1]."/".beach_bread($beachs)."/all-price/".bed_bread($bedroom)."/".collection_bread(0)."/all-sort.html";
				echo '<li class="active" ><a href="'.$bread_link.'">'.bed_bread_name_noall($bedroom).' Villas '.des_bread_name($dest).' <span class="bnum">('.$num.')</span></a></li>';
			}
		}
		else
		{
			$bread_link = "/search-rent/".destination_name_slug(0)[1]."/".beach_bread(0)."/all-price/".bed_bread(0)."/".collection_bread(0)."/all-sort.html";
			echo '<li><a href="'.$bread_link.'">Thailand Villas 77</a></li>';

			if($beachs!='all' && $beachs!='') 
			{
				$beach_sql = $dbc->GetRecord("destinations","*","id ='".$beachs."'  and status > 0");
				$beac_name = explode(",",$beach_sql['name']);
				
				if($bedroom!='all') //-------
				{
					//$bread_link = "/search-rent/".des_bread($dest)."/".beach_bread(0)."/all-price/".bed_bread(0)."/".collection_bread(0)."/all-sort.html";
//					echo '<li><a href="'.$bread_link.'">All Search '.des_bread_name($dest).' 111-1</a></li>';
//					
//					$bread_link = "/search-rent/".des_bread($dest)."/".beach_bread($beachs)."/all-price/".bed_bread(0)."/".collection_bread(0)."/all-sort.html";
//					echo '<li class="active"><a href="'.$bread_link.'">'.str_replace("Beach","",$beac_name[0]).' Villa '.des_bread_name($dest).' 111-1</a></li>';
				}
				else
				{
					if($collec!='0')
					{
						$bread_link = "/search-rent/".destination_name_slug($dest)[1]."/".beach_bread(0)."/all-price/".bed_bread(0)."/".collection_bread(0)."/all-sort.html";
						echo '<li><a href="'.$bread_link.'">'.des_bread_name($dest).' Villas</a></li>';
						
						$bread_link = "/search-rent/".destination_name_slug($dest)[1]."/".beach_bread($beachs)."/all-price/".bed_bread(0)."/".collection_bread(0)."/all-sort.html";
						echo '<li class="active"><a href="'.$bread_link.'">'.str_replace("Beach","",$beac_name[0]).' Beach <span class="bnum">('.$num.')</span></a></li>';//'.des_bread_name($dest).'
						
						$bread_link = "/search-rent/".destination_name_slug($dest)[1]."/".beach_bread(0)."/all-price/".bed_bread(0)."/".collection_bread($collec)."/all-sort.html";
						//echo '<li class="active"><a href="'.$bread_link.'">'.collection_bread_name_noall($collec).' Villas '.des_bread_name($dest).'--------------------------</a></li>';

					}
					else
					{
						$bread_link = "/search-rent/".destination_name_slug($dest)[1]."/".beach_bread(0)."/all-price/".bed_bread(0)."/".collection_bread(0)."/all-sort.html";
						echo '<li><a href="'.$bread_link.'">'.des_bread_name($dest).' Villas</a></li>';
						
						$bread_link = "/search-rent/".destination_name_slug($dest)[1]."/".beach_bread($beachs)."/all-price/".bed_bread(0)."/".collection_bread(0)."/all-sort.html";
						echo '<li class="active"><a href="'.$bread_link.'">'.str_replace("Beach","",$beac_name[0]).' Beach <span class="bnum">('.$num.')</span></a></li>';//'.des_bread_name($dest).'
					}
					
				}
				
			}
			else
			{
				$bread_link = "/search-rent/".destination_name_slug($dest)[1]."/".beach_bread(0)."/all-price/".bed_bread(0)."/".collection_bread(0)."/all-sort.html";
				echo '<li class="active"><a href="'.$bread_link.'">'.des_bread_name($dest).' Villas <span class="bnum">('.$num.')</span></a></li>';//All Search 
			}
		}
	}

echo '</ol>';
?>
</div>
</div>
