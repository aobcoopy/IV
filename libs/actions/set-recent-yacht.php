<?php
	session_start();
	$yacht_id = $_REQUEST['id'];
	if(!in_array($yacht_id,$_SESSION['recent_yacht']))
	{
		array_push($_SESSION['recent_yacht'],$yacht_id);
	}
	echo json_encode(true);
?>