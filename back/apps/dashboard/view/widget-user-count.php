<?php
	//$line = $dbc->GetRecord("users","COUNT(id)","1");
?>
<a href="/back/?app=online_chat">
<div class="widget widget-danger widget-item-icon" onclick="location.href='?app=accctrl&view=user';">
	<div class="widget-item-left">
		<span class="fa fa-comments"></span>
	</div>
	<div class="widget-data">
		<div class="widget-int num-count"><?php echo $dbc->GetCount("chat_history","status=0");?></div>
		<div class="widget-title">Messages</div>
		<div class="widget-subtitle">Online Chats</div>
	</div>
	<!--<div class="widget-controls">
		<a href="#" class="widget-control-right widget-remove" data-toggle="tooltip" data-placement="top" title="Remove Widget"><span class="fa fa-times"></span></a>
	</div>  -->                          
</div>     
</a>