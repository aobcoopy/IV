<?php
$review = isset($_GET['review'])?'yes':'no';
//echo base64_encode($review);
//echo $nu_rate;
function dateType3($data)
{
	$y = substr($data,0,4);
	$m = substr($data,5,2);
	$d = substr($data,8,2);
	switch($m)
	{
		case'01':  $month = 'Jan';break;
		case'02':  $month = 'Feb';break;
		case'03':  $month = 'Mar';break;
		case'04':  $month = 'Apr';break;
		case'05':  $month = 'May';break;
		case'06':  $month = 'Jun';break;
		case'07':  $month = 'Jul';break;
		case'08':  $month = 'Aug';break;
		case'09':  $month = 'Sep';break;
		case'10':  $month = 'Oct';break;
		case'11':  $month = 'Nov';break;
		case'12':  $month = 'Dec';break;
	}
	return  $month .'  '.$y;
}

?>
<style>
#revv
{
	padding-bottom: 20px;
}
/*.rating-gly-star {
    font-family: 'Glyphicons Halflings' !important;
    padding-left: 2px;
}
.rating-container .rating-stars {
    position: absolute;
    left: 0;
    top: 0;
    white-space: nowrap;
    overflow: hidden;
    color: #fde16d;
    transition: all 0.25s ease-out;
    -o-transition: all 0.25s ease-out;
    -moz-transition: all 0.25s ease-out;
    -webkit-transition: all 0.25s ease-out;
	 font-family: 'Glyphicons Halflings' !important;
	height: 40px;
}*/
.stars
{
	font-size:50px;
	color:#dddddd;
	cursor:pointer;
}
.star_act
{
	color:#FFC107;
}
.stars > .fa
{
	margin-right:-10px;
	cursor:pointer;
}
.rev_pop
{
	width:100%;
	background-color:#d3a260;
	color:#fff;
}
</style>
<script src="https://apis.google.com/js/platform.js" async defer></script>
<meta name="google-signin-client_id" content="589883918007-q11adbahcm7s8no0ug3au5q4686ern46.apps.googleusercontent.com">
<!--<link rel="stylesheet" type="text/css" id="theme" href="../../libs/css/star-rating.css"/>-->

<script>
$(document).ready(function(e) {
    var rev = '<?php echo $review;?>';
	if(rev=='yes')
	{
		$(".rev_pop").click();
	}
});

</script>


<div  class="col-md-12 mg-room-fecilities " style="margin-top: 5px;">
<?php
if($xx<=0)
{
	?><h6 class="mg-sec-left-title l15" style="margin-top:15px;"><?php echo $vi_name[0];?> <?php //echo $nu_rate;?> Reviews</h6><?php
}
?>

</div>

<?php /*session_start();
$sess = session_id(); */
//echo $sess;
/*if($sess=='34dsnc209la4agtm9s6v7snio3' || $sess=='c82shotatf9k6hsp9uru93fohd' || $sess=='5m72qf4ovqick2lef59c8m5h77')
{*/
	?>
<button type="button" class="btn btn-defalt rev_pop top50" data-toggle="modal" data-target="#myModal_review" style="margin:auto;display:block;">
  Write a Review
</button>
<?php
/*}*/
?>
<!-- Modal -->
<div class="modal fade" id="myModal_review" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" data-backdrop="static">
  <div class="modal-dialog" role="document">
    <div class="modal-content" >
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true" style="color: black;">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Write a review</h4>
      </div>
      <div class="modal-body">
			
            <div class="disision">
            	<button class="fbbut" data-button-type="continue_with" onClick="Login();">
                    <div class="fb-login-button" data-size="large" data-button-type="continue_with" data-layout="default" data-auto-logout-link="false" data-use-continue-as="true" data-width=""></div>
                </button>
               
                <button class="fbbut" >
                    <div id="my-signin2" style="display: inherit;margin-top:15px;" ></div>
                </button>
                
            </div>
            <div class="sec_box" style="display:none;">
            	<form id="form_cus">
                <input type="hidden" name="txtIDRoom" value="<?php echo $room['id'];?>">
                <input type="hidden" id="txtIDFace" name="txtIDFace" value="<?php echo $room['id'];?>">
                    <div class="form-group">
                        
                        <!--<input id="input-4" name="input-4" class="rating rating-loading" data-step="1" data-show-clear="false" data-show-caption="true" >-->
                        <div class="stars">
                            <i class="fa fa-star f1 fs" aria-hidden="true" onClick="star_rating(1);"><input type="hidden" class="sta" value="1"></i>
                            <i class="fa fa-star f2 fs" aria-hidden="true" onClick="star_rating(2);"><input type="hidden" class="sta" value="2"></i>
                            <i class="fa fa-star f3 fs" aria-hidden="true" onClick="star_rating(3);"><input type="hidden" class="sta" value="3"></i>
                            <i class="fa fa-star f4 fs" aria-hidden="true" onClick="star_rating(4);"><input type="hidden" class="sta" value="4"></i>
                            <i class="fa fa-star f5 fs" aria-hidden="true" onClick="star_rating(5);"><input type="hidden" class="sta" value="5"></i>
                        </div>
                         <input type="hidden" class="form-control fcm" id="txt_rating" name="txt_rating">
                    </div>
                    <script>
                    function star_rating(vall)
					{
						//alert(vall);
						$(".fs").removeClass("star_act");
						for(i=1;i<=vall;i++)
						{
							$(".f"+i).addClass("star_act");	
						}
						$("#txt_rating").val(vall);
					}
                    </script>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Name</label>
                        <input type="text" class="form-control fcm" id="txt_name" name="txt_name">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Email</label>
                        <input type="text" class="form-control fcm" id="txt_Email" name="txt_Email">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Comment</label>
                        <textarea type="text" class="form-control fcm" id="txt_Comment" name="txt_Comment"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">User Photo</label>
                            <img id="face_img" src=""  class="phos" style="height:50px;"><br>
                            <!--<img id="face_img" src="//graph.facebook.com/10216119104241378/picture" style="height:50px;">-->
                            <input type="hidden" name="txt_photo" id="txt_photo"  class="fcm">
                            <!--<button type="button" class="btn btn-primary" onClick="upload_photo()">Upload Photo</button>
                            <br>
                            <input type="hidden" name="txt_photo" id="txt_photo"  class="fcm"><br>
                            <img src=""  width="100%" class=" phos">
                            <button type="button" class="btn btn-danger bc" style="width:100%; display:none" onclick="remove_photo(this);">
                                <i class="fa fa-times" aria-hidden="true"></i>
                            </button>-->
                            
                    </div> 
                         
                      
                </form>
            </div>
                
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="bsends btn btn-primary hidden" onClick="send_comment();">Submit</button>
      </div>
    </div>
  </div>
</div>



<form id="form_add_photo" class="hidden" style="display:none;">
    <input id="f_Photo" name="file" type="file">
    <button type="button" id="btn_upp" onClick="upload_photo_file()">UP</button>
</form>
        



<?php /*?><div id="pos_my_reviews" class="col-md-12 mg-room-fecilities pos_my_reviews Reviews my_review">
    <h6 class="mg-sec-left-title l15" style="margin-top:15px;">Write Reviews</h6>
    <div class="row bggray">
    	<div class="cover_all_rv_box col-md-12">
		
           
           
           
            
            
            
            
            
        </div>    
    </div>
</div><?php */?>



<!--<div class="g-signin2" data-onsuccess="onSignIn"></div>-->

<script>
function onSuccess(googleUser) {
      console.log('Logged in as: ' + googleUser.getBasicProfile().getName());
	   var profile = googleUser.getBasicProfile();
	  console.log('ID: ' + profile.getId()); // Do not send to your backend! Use an ID token instead.
	  console.log('Name: ' + profile.getName());
	  console.log('Image URL: ' + profile.getImageUrl());
	  console.log('Email: ' + profile.getEmail()); // This is null if the 'email' scope is not present.
	  
	  $("#txt_name").val(profile.getName());
	  $("#txt_Email").val(profile.getEmail());
	  $("#txt_photo").val(profile.getImageUrl());
	  $("#face_img").attr('src',profile.getImageUrl());
	  $(".bsends").removeClass('hidden');
	  
	  $(".disision").hide();
	  $(".sec_box").show();
	  //$("#myModal_review").modal('hide');
    }
    function onFailure(error) {
      console.log(error);
    }
    function renderButton() {
      gapi.signin2.render('my-signin2', {
        'scope': 'profile email',
        'width': 267,
        'height': 38,
        'longtitle': true,
        'theme': 'dark',
        'onsuccess': onSuccess,
        'onfailure': onFailure
      });
    }
	
function signOut() {
	var auth2 = gapi.auth2.getAuthInstance();
	auth2.signOut().then(function () {
		console.log('User signed out.');
	});
}
</script>
<script src="https://apis.google.com/js/platform.js?onload=renderButton" async defer></script>
<!--id : <input type="text" id="id"><br>
name : <input type="text" id="name"><br>
<img id="face_img" src="" style="height:40px;">-->
<style>
.fb-login-button
{
	z-index:-1;
}
.fbbut
{
	background:none;
	border:none;
	outline:none;
	cursor:pointer;
	z-index:20;
	width: 100%;
}
.fcm
{
	background-color:#eeeeee;
	border-bottom:1px solid #f05b46 !important;
	/*border:1px solid !important*/
}
.disision
{
	z-index: 1100;
    position: relative;
}
</style>

<input type="hidden" id="txrev" name="txrev" value="1">









<script>
window.fbAsyncInit = function () {
  FB.init({
    appId: '367335174001704',
    status: true,
    cookie: true,
    xfbml: true,
	version : 'v3.0'
  });
};

(function (doc) {
  var js;
  var id = 'facebook-jssdk';
  var ref = doc.getElementsByTagName('script')[0];
  if (doc.getElementById(id)) {
    return;
  }
  js = doc.createElement('script');
  js.id = id;
  js.async = true;
  js.src = "//connect.facebook.net/en_US/all.js";
  ref.parentNode.insertBefore(js, ref);
}(document));

function Login() {
  FB.login(function (response) {
    if (response.authResponse) {
		//alert(1);
		FB.api('/me', function(response) {
			console.log(JSON.stringify(response));
			
			$("#face_img").attr('src','//graph.facebook.com/'+response.id+'/picture');
			$("#txt_photo").val('//graph.facebook.com/'+response.id+'/picture');
			$("#id,#txtIDFace").val(response.id);
			$("#name,#txt_name").val(response.name);
			$(".bsends").removeClass('hidden');
			$(".fbbut").hide();
			$(".disision").hide();
	  		$(".sec_box").show();
			
			/*$.ajax({
					type: "POST",
					dataType:"html",
					url: "libs/xhr/action-login-facebook.php",
					data: {
						id : response.id,
						txname : response.first_name,
						txlast : response.last_name,
						txemail : response.email,
						gender : response.gender
						},
					success : function(json)
					{
						if(json.success==true)
						{
							window.location = '?pid=16';
						}else
						{
							window.location = '?pid=1';
						}
					}
			});*/
		});
      // some code here
     //};
    } else {
      alert("Login attempt failed!");
    }
  }, { scope: 'public_profile,email' });//,user_photos,publish_actions

}

function logout()
{
	FB.logout(function(response) {
	   console.log(response);
	 });

}
</script>







<style>
.bsend	
{
	background:#d3a260;
	width:100%;
	border:none;
	color:#fff;
	padding:8px;
}
</style>

<script>
function chktx(ipu)
{
	alert("Please fill your data");
	$("#"+ipu).focus();
	return false;
}

function send_comment()
{
	if($("#txt_rating").val()=='')
	{
		chktx('txt_rating');
	}
	else if($("#txt_name").val()=='')
	{
		chktx('txt_name');
	}
	else if($("#txt_Email").val()=='')
	{
		chktx('txt_Email');
	}
	else if($("#txt_Comment").val()=='')
	{
		chktx('txt_Comment');
	}
	else if($("#txt_photo").val()=='')
	{
		chktx('txt_Comment');
		upload_photo();
	}
	else
	{
		$.ajax({
			url:"<?php echo $url_link;?>libs/action_chat/save_comment.php",
			type:"POST",
			dataType:"json",
			data:$("#form_cus").serialize(),
			success: function(res){
				if(res.status == true)
				{
					alert(res.msg);
					$(".fcm").val('');
					$(".phos").attr('src','');
					$(".bc").hide();
					$("#txt_photo").val('');
					$(".fbbut").show();
					$(".bsends").addClass('hidden');
					$("#myModal_review").modal('hide');
					
					$(".disision").show();
	  				$(".sec_box").hide();
					$("#txt_rating").val('');
					$(".fs").removeClass("star_act");
					signOut();
				}
				else
				{
					
				}
			}
		});
	}
	
}

$(function(){
	var file_upload = "#f_Photo";

	upload_photo = function(){
		$(file_upload).click();
		$(file_upload).unbind();
		
		$(file_upload).on("change",function(e){
			var files = this.files
			$("#btn_upp").click();    
		});
	};	
	
	upload_photo_file = function(){
		var data = new FormData($("#form_add_photo")[0]);
		var s = '';
		jQuery.ajax({
			url: '<?php echo $url_link;?>libs/action_chat/up_photo.php',
			data: data,
			cache: false,
			contentType: false,
			processData: false,
			type: 'POST',
			dataType: 'json',
			success: function(response){
				if(response.success){
					$("#txt_photo").val(response.path);
					$(".phos").attr('src',response.path);
					$(".bc").show();
					$("#f_Photo").val('');
					/*$("#tblbrand").DataTable().draw();
					$("#dialog_edit_icon").modal('hide');*/
				}else{
					//fn.engine.alert("Alert",response.msg);
				}	
			}
		});
	};
	
	remove_photo = function(me){
		var file_path = $(me).parent().find('.paths').val();
		//alert(file_path);
		$.ajax({
			url:"<?php echo $url_link;?>libs/action_chat/remove_photo.php",
			type:"POST",
			dataType:"json",
			data:{path:file_path},
			success: function(resp){
				if(resp.status==true)
				{
					$("#path_photo").val('');
					$("#txt_photo").val('');
					$(".phos").attr('src','');
					$(".bc").hide();
					$("#f_Photo").val('');
					//fn.engine.alert("Alert",response.msg);
				}
				else
				{
					//fn.engine.alert("Alert",response.msg);
				}
				
			}
		});
	};
	
	
});
</script>

<?php 
/*$sess = session_id(); 
if($sess=='34dsnc209la4agtm9s6v7snio3')
{
	include "page_messenger_chat.php";
}*/
?>