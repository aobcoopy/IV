<?php 
	$bed = json_decode($room['plan'],true);
	if($bed!='')
	{ 
		$flp_photo = json_decode($room['plan'],true);
	?>
	<div class="col-md-12 mg-room-fecilities bedrooms" style="margin-top: 12px;">
    	
		<h5 class="mg-sec-left-title l15">Floor Plan</h5>
		<?php /*?><button class="fplan pull-right" data-toggle="modal" data-target="#myModal_floor" onClick="vire_floor('<?php echo json_decode($room['plan'],true);?>')">
					<div class="inb f18t">View Floor Plan</div>
				</button><?php */?>
		<div class="row ">
		   <div class="col-md-12 nopad">
				 <?php /*?><img data-src="<?php echo $flp_photo;?>" alt="<?php echo $vi_name[0];?>Floor Plan" width="100%" data-toggle="modal" data-target="#myModal_floor" onClick="vire_floor('<?php echo imagePath($flp_photo);?>')" class="pointer lazy"><?php */?>
                 <img data-src="<?php echo imagePath($flp_photo);?>" alt="<?php echo $vi_name[0];?>Floor Plan" width="100%" data-toggle="modal" data-target="#myModal_floor" onClick="vire_floor('<?php echo imagePath($flp_photo);?>')" class="pointer lazy">
			</div>
		</div>
	</div>
	<?PHP
	  }
?>
<script>
function vire_floor(img)
{
	$(".c_floorpaln").attr('src',img);
}
</script>

<div class="modal fade " id="myModal_floor" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
  <div class="modal-dialog modal-md mfloor" role="document"  data-scroll-scope="force" >
    <div class="modal-content cont">
      <div class="modal-header modal-h">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Floor Plan</h4>
      </div>
      <div class="modal-body">
		  <img class="c_floorpaln" width="100%">
	  </div>
    </div>
  </div>
</div>