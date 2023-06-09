<?php /*ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);*/
?>
<div class="mg-page-titles motop"><!--parallax-->
<?php 
if(isset($_REQUEST['cate']))
{
	$cover = $dbc->GetRecord("categories","*","id = '".$_REQUEST['cate']."' AND status > 0");
	$photo_cover = json_decode($cover['cover'],true);
	if($cover['cover']=='')
	{
		?>
     <div class="container-fluid nopad">
        <div class="row" >
        </div>
    </div>
	<?php
	}
	else
	{
		?>
    <div class="container-fluid nopad" >
    <?php 
	if(isset($_REQUEST['cate']) && isset($_REQUEST['des']) || isset($_REQUEST['sub']) || isset($_REQUEST['pri']) || isset($_REQUEST['room']))
	{
	}
	else
	{
		?><img src="<?php echo imagePath($photo_cover);?>" alt="" width="100%" class="motops mt-90"><?php
	}
	?>
        <div class="row" >
        </div>
    </div>
    <?php
	}
}
else
{
	?>
     <div class="container-fluid nopad" >
        <div class="row" >
        </div>
    </div>
	<?php
}
?>
</div>
<?php
function tag($id)
{
	global $dbc;
	if($id !='0')
	{
		$tags = $dbc->GetRecord("tags","*","id=".$id);
		return '<button class="btn_tag"><i class="fa fa-tag" aria-hidden="true" style="color: #f05b46;"></i> &nbsp;&nbsp;'.$tags['name'].'</button>';
	}
	else
	{
	}
}

//function slide_photo($photo,$i)
//{
//	global $dbc;
//	$photo_name = $dbc->GetRecord("properties","*","id='".$i."'");
//	$name = explode("|",$photo_name['name']);
//	echo '<img itemprop="image" src="'.$photo[0]['img'].'"  alt="'.str_ireplace(' ','-',$name[0]).'"class="img-responsive">';
//}
?>
<style>
.mg-page-title{padding-top:0px;padding-bottom:50px;padding-left:0px;background-image:url(<?php echo $photo_cover;?>);background-repeat:no-repeat;background-position-x:50% !important}.mg-available-rooms{padding:0px 0}p{margin-bottom:10px}.mg-gallery-page,.mg-page{padding:0px 0px 0px 0px;margin-top:-80px}.mg-available-rooms img{margin-bottom:0px}.btn.focus,.btn:focus,.btn:hover{color:#fff;text-decoration:none}@media screen and (max-width: 768px){.mg-available-rooms .mg-avl-room-title{margin-top:5px;margin-bottom:5px;padding-bottom:4px;border-bottom:1px solid #dbdbda}}@media screen and (min-width: 768px) and (max-width: 992px){.mg-available-rooms .mg-avl-room-title{margin-top:6px;margin-bottom:5px;padding-bottom:4px;border-bottom:1px solid #dbdbda}}@media screen and (min-width: 992px){.mg-available-rooms .mg-avl-room-title{margin-top:-4px;margin-bottom:5px;padding-bottom:4px;border-bottom:1px solid #dbdbda}}.bto{margin-top:-21px}@media screen and (max-width: 662px){.mt-90{margin-top:0px;margin-bottom:-22px}}@media screen and (min-width: 662px){.mt-90{margin-top:-90px}}.mg-available-rooms .mg-avl-room-title span{color:#000;float:none}</style>