<script type="text/javascript" src="apps/profile/app.js"></script>
<?php
	include_once "apps/profile/include/me.class.php";
	$my = new meClass;
	$view = isset($_REQUEST['view'])?$_REQUEST['view']:"main";
	
	$user = $dbc->GetRecord("users","*","id=".$_SESSION['auth']['user_id']);
	$contact = $dbc->GetRecord("contacts","*","id=".$user['contact']);
	$address = $dbc->GetRecord("address","*","contact=".$contact['id']);
	$setting = json_decode($user['setting'],true);
	
	if($contact['avatar']==""){
		$avatar = "libs/assets/images/users/no-image.jpg";
	}else{
		$avatar = $contact['avatar'];
	}

	$my->PageHeader($view);

	if($view=="main"){
		include_once "apps/profile/view/page.profile.main.php";
	}else{
		include_once "apps/profile/view/page.profile.edit_page.php";
	}
?>