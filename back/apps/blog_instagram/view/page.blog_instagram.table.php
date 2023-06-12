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
for($i=0;$i<6;$i++)
{
	$post = $arr_post[$i];
	$access_token = '367335174001704|18e0f23556f5b787b311a9ac1642eb57'; //{your-app_id}|{your-app_secret}
	
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
	echo '<a href="https://www.instagram.com/p/'.$post.'" target="_blank">';
		echo '<div class="col-xs-6 col-sm-4 col-md-2 nopad igfoot">';
			echo '<div class="cov_foot">';
				echo '<img class="cov_foot_img" src="'.$img.'" width="100%" alt="">';
			echo '</div>';
		echo '</div>';
	echo '</a>';
}
?>
<br><br>
<div class="col-md-12">
	<div class="panel panel-default">
		<div id="panel-heading-group" class="panel-heading">
	        <h3 class="panel-title">IG Photo</h3>
	    </div>
	    <div class="panel-body">
	        
        <form id="ig_form">
        <input type="hidden" id="txtID" name="txtID" value="1">
        	<div class="col-md-12">
                <div class="form-group col-md-6">
                    <label for="exampleInputEmail1">Instagram Post Link 1</label>
                    <input type="text" class="form-control" id="tx_ig_1" name="tx_ig_1" placeholder="https://www.instagram.com/p/CN5CWlmBDzu/" value="<?php echo $ig['0'];?>">
                </div>
                <div class="form-group col-md-6">
                    <img src="" alt="">
                </div>
            </div>
            
            <div class="col-md-12">
                <div class="form-group col-md-6">
                    <label for="exampleInputEmail1">Instagram Post Link 2</label>
                    <input type="text" class="form-control" id="tx_ig_2" name="tx_ig_2" placeholder="https://www.instagram.com/p/CN5CWlmBDzu/"  value="<?php echo $ig['1'];?>">
                </div>
                <div class="form-group col-md-6">
                    <img src="" alt="">
                </div>
            </div>
            
            <div class="col-md-12">
                <div class="form-group col-md-6">
                    <label for="exampleInputEmail1">Instagram Post Link 3</label>
                    <input type="text" class="form-control" id="tx_ig_3" name="tx_ig_3" placeholder="https://www.instagram.com/p/CN5CWlmBDzu/"  value="<?php echo $ig['2'];?>">
                </div>
                <div class="form-group col-md-6">
                    <img src="" alt="">
                </div>
            </div>
            
            <div class="col-md-12">
                <div class="form-group col-md-6">
                    <label for="exampleInputEmail1">Instagram Post Link 4</label>
                    <input type="text" class="form-control" id="tx_ig_4" name="tx_ig_4" placeholder="https://www.instagram.com/p/CN5CWlmBDzu/" value="<?php echo $ig['3'];?>">
                </div>
                <div class="form-group col-md-6">
                    <img src="" alt="">
                </div>
            </div>
            
            <div class="col-md-12">
                <div class="form-group col-md-6">
                    <label for="exampleInputEmail1">Instagram Post Link 5</label>
                    <input type="text" class="form-control" id="tx_ig_5" name="tx_ig_5" placeholder="https://www.instagram.com/p/CN5CWlmBDzu/"  value="<?php echo $ig['4'];?>">
                </div>
                <div class="form-group col-md-6">
                    <img src="" alt="">
                </div>
            </div>
            
            <div class="col-md-12">
                <div class="form-group col-md-6">
                    <label for="exampleInputEmail1">Instagram Post Link 6</label>
                    <input type="text" class="form-control" id="tx_ig_6" name="tx_ig_6" placeholder="https://www.instagram.com/p/CN5CWlmBDzu/"  value="<?php echo $ig['5'];?>">
                </div>
                <div class="form-group col-md-6">
                    <img src="" alt="">
                </div>
            </div>
        </form>

	    </div>
	</div>
</div>
<script>
  $(function() {
	$("#panel-heading-group").append('<button id="btnSavesort" type="button" onclick="fn.app.blog_instagram.blog_instagram.saveig()" class="btn btn-primary pull-right">Save</button>');
	$( "#tblSlide" ).children().sortable();
	$( "#tblSlide " ).disableSelection();
  });


fn.app.blog_instagram.blog_instagram.sort = function(id) {
	var data = {
		tables : []			
	};
	var io=1;
	$("#tblSlide tbody tr").each(function(index, element) {
		data.tables.push({
				id : $(this).find("input[name=tid]").val(),
				sort : io
			});
			io++;
	});
	
	
	$.ajax({
		url:"apps/blog_instagram/xhr/action-save-sort.php",
		type:"POST",
		dataType:"json"	,
		data:data,
		success: function(response){
			$("#tblSlide").DataTable().draw();
			window.location.reload();
		}
	});   
};

fn.app.blog_instagram.blog_instagram.saveig = function(id) {
	$.ajax({
		url:"apps/blog_instagram/xhr/action-save-ig.php",
		type:"POST",
		dataType:"json"	,
		data:$("#ig_form").serialize(),
		success: function(response){
			window.location.reload();
		}
	});   
};
</script>




