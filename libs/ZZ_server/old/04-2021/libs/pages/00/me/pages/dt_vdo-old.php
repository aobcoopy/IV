<?php
	$vdo = base64_decode($room['vdo'],true);
	if($vdo!='')
	{
		?>
		<div class="col-md-12 nopad mg-room-fecilities ">
			<h2 class="mg-sec-left-title vdos" style="margin-left:-15px;">Video</h2>
			<div class="row">


				<iframe class="i_vdo" src="https://player.vimeo.com/video/<?php echo base64_decode($room['vdo'],true);?>?color=ffffff&title=0&byline=0&portrait=0" width="100%"  frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe><!--height="360"-->
				
			</div>
		</div>
		<?php
	}
?>