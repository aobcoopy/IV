<style>
	.videoWrapper {
		position: relative;
		padding-bottom: 56.25%; /* 16:9 */
		padding-top: 0px;
		height: 0;
	}
	.videoWrapper iframe {
		position: absolute;
		top: 0;
		left: 0;
		width: 100%;
		height: 100%;
	}
</style>
<div class="videoWrapper">
<?php
$des = $_REQUEST['id'];
if($des=='38')
{
	$link = "https://www.youtube.com/embed/thYFZCib_bw?rel=0&autoplay=1";
}
elseif($des=='39')
{
	$link = "https://www.youtube.com/embed/xEp1CrtH7MM?rel=0&autoplay=1";
}
elseif($des=='all')
{
	$link = "https://www.youtube.com/embed/eTdWjkMsW0I?rel=0&autoplay=1";
}
?>
	<iframe width="560" height="315" src="<?php echo $link;?>" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
    <!--<iframe id="existing-iframe-example" width="560" src="https://www.youtube.com/embed/m07jIwYVZk8?rel=0&amp;controls=0&amp;showinfo=0&autoplay=1 " frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>-->
</div>

