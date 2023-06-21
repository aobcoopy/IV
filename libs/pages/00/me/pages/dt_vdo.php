<?php
	$vdo = base64_decode($room['vdo'],true);
	if($vdo!='')
	{
        // $vdo may be a Vimeo ID, or a Youtube/Vimeo URL
        if (strpos($vdo, 'http') !== false) $videoURL = base64_decode($room['vdo'],true);
        else $videoURL = "https://player.vimeo.com/video/" . base64_decode($room['vdo'],true);
        
        $maxVideoWidth = "500";
        
?>
		<div class="col-md-12 nopad mg-room-fecilities ">
			<h2 class="mg-sec-left-title vdos" style="margin-left:-15px;">Video</h2>
			<div class="row" style="max-width: <?php echo $maxVideoWidth; ?>px;margin-bottom:10px;">
                <style>.embed-container { position: relative; padding-bottom: 56.25%; height: 0; overflow: hidden; max-width: 100%; } .embed-container iframe, .embed-container object, .embed-container embed { position: absolute; top: 0; left: 0; width: 100%; height: 100%; }</style><div class='embed-container'><iframe src='<?php echo $videoURL ?>' frameborder='0' allowfullscreen></iframe></div>
			</div>
		</div>
		<?php
	}
?>