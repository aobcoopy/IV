<?php
	session_start();
	include_once "../../../config/define.php";
	include_once "../../../libs/class/db.php";
	
	@ini_set('display_errors',DEBUG_MODE?1:0);
	date_default_timezone_set(DEFAULT_TIMEZONE);
	
	$dbc = new dbc;
	$dbc->Connect();
	
	$product = $dbc->GetRecord("products","*","id=".$_REQUEST['id']);
	$detail = $dbc->GetRecord("product_derail","*","product=".$_REQUEST['id']);
	$photo = json_decode($product['photo'],true);
?>
<div class="modal fade" id="dialog_edit_group" data-backdrop="static">
  	<div class="modal-dialog">
		<form id="form_editgroup" class="form-horizontal" role="form" onsubmit="fn.app.product.product.save_change();return false;">
		<input type="hidden" name="txtID" value="<?php echo $product['id'];?>">
    	<div class="modal-content">
      		<div class="modal-header">
        		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4>Edit Product</h4>
      		</div>
		    <div class="modal-body">
            	<div class="form-group">
					<label for="txtName" class="col-sm-2 control-label">Code</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="txtCode_edit" name="txtCode_edit" value="<?php echo $product['code'];?>" placeholder=" Code"><!-- maxlength="27"-->
					</div>
				</div>
                <div class="form-group">
					<label for="txtName" class="col-sm-2 control-label">Name</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="txtName_edit" name="txtName_edit" value="<?php echo $product['name'];?>" placeholder=" Name"><!-- maxlength="27"-->
					</div>
				</div>
                <div class="form-group">
					<label for="txtName" class="col-sm-2 control-label">Brief</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="txtBrief_edit" name="txtBrief_edit"  value="<?php echo $detail['brief'];?>" placeholder="Brief"><!--maxlength="110"-->
					</div>
				</div>
                <div class="form-group">
					<label for="txtName" class="col-sm-2 control-label">Detail</label>
					<div class="col-sm-10">
						<textarea type="text" class="form-control" id="txtDetail_edit" name="txtDetail_edit" rows="10"  placeholder="Detail"><?php echo $detail['detail'];?></textarea>
					</div>
				</div>
                <div class="form-group">
					<label for="txtName" class="col-sm-2 control-label">Price</label>
					<div class="col-sm-10">
						<input type="number" class="form-control" id="txtPrice_edit" name="txtPrice_edit"  value="<?php echo $product['price'];?>" min="0" placeholder="0.00">
					</div>
				</div>
                <div class="form-group">
					<label for="txtName" class="col-sm-2 control-label">Discount</label>
					<div class="col-sm-10">
						<input type="number" class="form-control" id="txtDiscount_edit" name="txtDiscount_edit" value="<?php echo $product['discount'];?>" min="0" max="<?php echo $product['price'];?>" placeholder="0.00">
					</div>
				</div>
                <div class="form-group">
					<label for="txtName" class="col-sm-2 control-label">Amount</label>
					<div class="col-sm-10">
						<input type="number" class="form-control" id="txtAmount_edit" name="txtAmount_edit" value="<?php echo $product['amount'];?>" min="0" placeholder="0">
					</div>
				</div>
                <div class="form-group">
					<label for="txtName" class="col-sm-2 control-label">Category</label>
					<div class="col-sm-10">
                    	<select name="category_edit" id="category_edit" class="form-control">
                        	<option value="NULL">Choose category</option>
                        <?php 
						$sql = $dbc->Query("select * from categories where parent is null");
						while($row = $dbc->Fetch($sql))
						{
							$cate_select = ($row['id']==$product['category'])?'selected':'';
							echo '<option value="'.$row['id'].'" '.$cate_select.'>'.$row['name'].'</option>';
						}
						?>
                        </select>
					</div>
				</div>
                <div class="form-group">
					<label for="txtName" class="col-sm-2 control-label">Subcategory</label>
					<div class="col-sm-10">
                    	<select name="subcategory_edit" id="subcategory_edit" class="form-control">
                             <?php 
							$sql_sub = $dbc->Query("select * from categories where id = '".$product['subcategory']."'");
							while($row_s = $dbc->Fetch($sql_sub))
							{
								$sub_select = '';//($row_s['id']==$product['subcategory'])?'selected':'';
								echo '<option value="'.$row_s['id'].'" '.$sub_select.'>'.$row_s['name'].'</option>';
							}
							?>
                        </select>
					</div>
				</div>
                <div class="form-group">
					<label for="txtName" class="col-sm-2 control-label">Tag</label>
					<div class="col-sm-10">
						<select name="Tag_edit" id="Tag_edit" class="form-control">
                        	<option value="1" <?php echo ($product['tag']=='1')?'selected':'';?>>Normal</option>
                            <option value="2" <?php echo ($product['tag']=='2')?'selected':'';?>>Promotion</option>
                            <option value="3" <?php echo ($product['tag']=='3')?'selected':'';?>>Best Seller</option>
                        </select>
					</div>
				</div>
                <div class="form-group">
					<label for="txtName" class="col-sm-2 control-label">Photo</label>
					<div class="col-sm-8">
						<input type="text" class="form-control" id="parth_edit" name="parth_edit" value="<?php echo $photo;?>" readonly>
					</div>
                    <div class="col-sm-1">
						<button type="button" id="uploads" class="btn btn-info"><i class="fa fa-picture-o" aria-hidden="true"></i></button>
					</div>
				</div>
                <div class="form-group">
					<label for="txtName" class="col-sm-2 control-label"></label>
                    <div class="col-sm-5">
                    	<img  class="loads" src="../../../../upload/loading (1).gif" width="50" style="display:none" >
						<img id="thumbnail_edit" src="<?php echo $photo;?>" width="100%">
					</div>
				</div>
		    </div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				<button type="submit" class="btn btn-primary">Save</button>
			</div>
	  	</div><!-- /.modal-content -->
		</form>
        
        <form class="form form-horizontal" id="myFrom_edit" method="post" action="apps/product/xhr/action-up-photo.php"  role="form" enctype="multipart/form-data">
            <div class="form-group">
                <label class="col-sm-2 control-label"></label>
                <div class="col-sm-8">
                    <input id="file_upload_edit" style="display:none" name="upfile" type="file" >
                    <button class="btn btn-primary pull-right" id="multi_post_edit" style="display:none;">up</button>
                </div>
            </div>    
       </form>
       
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<script>

$(document).ready(function(e) {
	$("#category_edit").change(function(e) {
		$("#subcategory_edit").children().remove();
		$.ajax({
			url:"apps/product/xhr/action-load-subcategory.php",
			type:"POST",
			dataType:"html",
			data:{cate:$("#category_edit").val()},
			success: function(result){
				$("#subcategory_edit").append(result);
			}
		});
	});
});
	
var my_from = "#myFrom_edit";
var button = "#uploads";
var btn_up = "#multi_post_edit";
var parth = "#parth_edit";
var file_upload = "#file_upload_edit";
var thumbnail = "#thumbnail_edit";

	$(document).ready(function(e) {
	 $(button).on("click",function(e){
        $(file_upload).show().click().hide();
        e.preventDefault();
    });
	$(file_upload).on("change",function(e){

        var files = this.files
        showThumbnail(files)  
		$(btn_up).click();  
		$(".loads").show();    
		
    });
	function showThumbnail(files){

        $(thumbnail).html("");
        for(var i=0;i<files.length;i++){
            var file = files[i]
            var imageType = /image.*/
            if(!file.type.match(imageType)){
                //     console.log("Not an Image");
                continue;
            }

            var image = document.createElement("img");
            var thumbnail = document.getElementById("thumbnail");
            image.file = file;
            thumbnail.appendChild(image)

            var reader = new FileReader()
            reader.onload = (function(aImg){
                return function(e){
                    aImg.src = e.target.result;
                };
            }(image))

            var ret = reader.readAsDataURL(file);
            var canvas = document.createElement("canvas");
            ctx = canvas.getContext("2d");
            image.onload= function(){
                ctx.drawImage(image,50,50)
            }
        } // end for loop

    } // end showThumbnail
	
   
    function getDoc(frame) {
     var doc = null;
     
     // IE8 cascading access check
     try {
         if (frame.contentWindow) {
             doc = frame.contentWindow.document;
         }
     } catch(err) {
     }

     if (doc) { // successful getting content
         return doc;
     }

     try { // simply checking may throw in ie8 under ssl or mismatched protocol
         doc = frame.contentDocument ? frame.contentDocument : frame.document;
     } catch(err) {
         // last attempt
         doc = frame.document;
     }
     return doc;
 }

	$(my_from).submit(function(e)
	{
			$("#multi-msg").html("<img src='loading.gif'/>");
	
		var formObj = $(this);
		var formURL = formObj.attr("action");
	
	if(window.FormData !== undefined)  // for HTML5 browsers
	//	if(false)
		{
	
			var formData = new FormData(this);
			$.ajax({
				url: formURL,
				type: 'POST',
				data:  formData,
				mimeType:"multipart/form-data",
				contentType: false,
				cache: false,
				processData:false,
				success: function(data, textStatus, jqXHR)
				{
					if(data=='file is not supported')
					{
						$(parth).val(data);
						$(".loads").hide(0);
						$(thumbnail).attr('src','../../../../upload/not.jpg');
						//$("#unlik").show();
					}
					else
					{
						$(parth).val(data);
						$(".loads").hide(0);
						$(thumbnail).attr('src',data);
						//$("#unlik").show();
					}
						
				},
				error: function(jqXHR, textStatus, errorThrown) 
				{
					$("#multi-msg").html('<pre><code class="prettyprint">AJAX Request Failed<br/> textStatus='+textStatus+', errorThrown='+errorThrown+'</code></pre>');
				} 	        
		   });
			e.preventDefault();
			//e.unbind();
					
			
	   }
	   else  //for olden browsers
		{
			//generate a random id
			var  iframeId = 'unique' + (new Date().getTime());
	
			//create an empty iframe
			var iframe = $('<iframe src="javascript:false;" name="'+iframeId+'" />');
	
			//hide it
			iframe.hide();
	
			//set form target to iframe
			formObj.attr('target',iframeId);
	
			//Add iframe to body
			iframe.appendTo('body');
			iframe.load(function(e)
			{
				var doc = getDoc(iframe[0]);
				var docRoot = doc.body ? doc.body : doc.documentElement;
				var data = docRoot.innerHTML;
				//$("#multi-msg").html('<pre><code>'+data+'</code></pre>');
				
			});
		
		}
	
	});
	
	$(btn_up).click(function()
	{
			$(my_from).submit(function(e){ 
				console.log(e);
            });
	});

});
</script>


<script tyle="text/javascript">
$(function(){
	$('#dialog_edit_group').on('shown.bs.modal', function () {
		$("#txtName").focus();
	});
	$("#dialog_edit_group").on("hidden.bs.modal",function(){
		$(this).remove();
	});
	$("#dialog_edit_group").modal('show');
});	

	
</script>

