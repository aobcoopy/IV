<?php
	session_start();
	$_SESSION['b_name'] = $_REQUEST['sess'];
	echo json_encode($_SESSION['b_name']);
	?>