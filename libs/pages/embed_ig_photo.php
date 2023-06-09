<?php
$data = $dbc->GetRecord("blog_ig_photo","*","id=1");
$ig = json_decode($data['photo'],true);
$ig_photo = array();
foreach($ig as  $link)
{
	$ex = explode("p/",$link);	
	$path = str_replace("/","",$ex[1]);
	array_push($ig_photo,$path);
}

$arr_post = $ig_photo;//array('CP3O8ojLbn5','CPk9_tyLRj2','CPdPmB8ro1y','CPVpw9_lqES','CPIYEWQLSNY','CN5CWlmBDzu');
//$arr_post = array('CP3O8ojLbn5','CPk9_tyLRj2','CPdPmB8ro1y','CPVpw9_lqES','CPIYEWQLSNY','CN5CWlmBDzu');

for($i=0;$i<6;$i++)
{
	$post = $arr_post[$i];
	$access_token = '367335174001704|18e0f23556f5b787b311a9ac1642eb57'; //{your-app_id}|{your-app_secret}
	
	//$access_token = '322375449395829|b72d7c7722f36fae7b892088ee5d6ab2';

	$curl = curl_init();
	curl_setopt_array($curl, array(
	  CURLOPT_URL => "https://graph.facebook.com/v10.0/instagram_oembed?url=https://www.instagram.com/p/".$post."&maxwidth=640&fields=thumbnail_url%2Cauthor_name%2Cprovider_name%2Cprovider_url%20&access_token=".$access_token."",
	  CURLOPT_RETURNTRANSFER => true,
	  CURLOPT_ENCODING => "",
	  CURLOPT_MAXREDIRS => 10,
	  CURLOPT_TIMEOUT => 30,
	  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
	  CURLOPT_CUSTOMREQUEST => "GET",
	  CURLOPT_HTTPHEADER => array(
		"cache-control: no-cache",
		"postman-token: 2aec2144-75f4-8bf6-01d9-852056b14bcd"
	  ),
	));
	
	$response = curl_exec($curl);
	$decode = json_decode($response,true);
	$err = curl_error($curl);
	
	curl_close($curl);
	
	if ($err) {
	  echo "cURL Error #:" . $err;
	} else {
	  //echo $response;
	  $img = $decode['thumbnail_url'];
	 //echo '<br><br><br><br><br><br>';
	  
	}//echo '-*--'.$decode['thumbnail_url'];
	/*echo '<a href="https://www.instagram.com/p/'.$post.'" target="_blank">';
		echo '<div class="col-xs-6 col-sm-4 col-md-2 nopad igfoot">';
			echo '<div class="cov_foot">';
				echo '<img class="cov_foot_img" src="'.$img.'" width="100%" alt="">';
			echo '</div>';
		echo '</div>';
	echo '</a>';*/
	if($page == 'block_single')
	{
		echo '<a class="" href="https://www.instagram.com/p/'.$post.'" target="_blank"><img src="'.$img.'" alt="" class="img-fluid"></a>'; //bootstap 4
		//echo '<a class="" href="https://www.instagram.com/p/'.$post.'"><div class="col-md-4 "><img src="'.$img.'" width="100%" alt="" class=""></div></a>';
	}
	else
	{
		echo '<a href="https://www.instagram.com/p/'.$post.'" target="_blank">';
			echo '<div class="cov_foot_box" style="background:url('.$img.')">';
				//echo '<img class="cov_foot_img1" src="'.$img.'" width="100%" alt="">';
			echo '</div>';
		echo '</a>';
	}
	
}
?>
