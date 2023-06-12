<div class="modal fade" id="dialog_add_product" data-backdrop="static">
  	<div class="modal-dialog">
		<form id="form_add_product" class="form-horizontal" role="form" onsubmit="fn.app.product.product.add();return false;">
    	<div class="modal-content">
      		<div class="modal-header">
        		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4>Add Product</h4>
      		</div>
		    <div class="modal-body">
				<div class="form-group">
					<label for="txtName" class="col-sm-2 control-label">Code</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="txtCode" name="txtCode"  placeholder="Code"><!--maxlength="27"-->
					</div>
				</div><div class="form-group">
					<label for="txtName" class="col-sm-2 control-label">Name</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="txtName" name="txtName"  placeholder="Name"><!--maxlength="27"-->
					</div>
				</div>
                <div class="form-group">
					<label for="txtName" class="col-sm-2 control-label">Brief</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="txtBrief" name="txtBrief" placeholder="Brief"><!--maxlength="110" -->
					</div>
				</div>
                <div class="form-group">
					<label for="txtName" class="col-sm-2 control-label">Detail</label>
					<div class="col-sm-10">
						<textarea type="text" class="form-control" id="txtDetail" name="txtDetail" rows="10" placeholder="Detail"></textarea>
					</div>
				</div>
                <div class="form-group">
					<label for="txtName" class="col-sm-2 control-label">Price</label>
					<div class="col-sm-10">
						<input type="number" class="form-control" id="txtPrice" name="txtPrice"  min="0" placeholder="0.00">
					</div>
				</div>
                <div class="form-group">
					<label for="txtName" class="col-sm-2 control-label">Discount</label>
					<div class="col-sm-10">
						<input type="number" class="form-control" id="txtDiscount" name="txtDiscount"  min="0" placeholder="0.00">
					</div>
				</div>
                <div class="form-group">
					<label for="txtName" class="col-sm-2 control-label">Amount</label>
					<div class="col-sm-10">
						<input type="number" class="form-control" id="txtAmount" name="txtAmount"  min="0" placeholder="0">
					</div>
				</div>
                <div class="form-group">
					<label for="txtName" class="col-sm-2 control-label">Category</label>
					<div class="col-sm-10">
                    	<select name="category" id="category" class="form-control">
                        	<option value="NULL">Choose category</option>
                        <?php 
						$sql = $dbc->Query("select * from categories where parent is null");
						while($row = $dbc->Fetch($sql))
						{
							echo '<option value="'.$row['id'].'">'.$row['name'].'</option>';
						}
						?>
                        </select>
						
					</div>
				</div>
                <div class="form-group">
					<label for="txtName" class="col-sm-2 control-label">Subcategory</label>
					<div class="col-sm-10">
                    	<select name="subcategory" id="subcategory" class="form-control">
                        	<option value="NULL">Choose Subcategory</option>
                       
                        </select>
					</div>
				</div>
                
                <div class="form-group">
					<label for="txtName" class="col-sm-2 control-label">Tag</label>
					<div class="col-sm-10">
						<select name="Tag" id="Tag" class="form-control">
                        	<option value="1">Normal</option>
                            <option value="2">Promotion</option>
                            <option value="3">Best Seller</option>
                        </select>
					</div>
				</div>
                <div class="form-group">
					<label for="txtName" class="col-sm-2 control-label">Photo</label>
					<div class="col-sm-8">
						<input type="text" class="form-control" id="parth" name="parth" readonly>
					</div>
                    <div class="col-sm-1">
						<button type="button" id="upload" class="btn btn-info"><i class="fa fa-picture-o" aria-hidden="true"></i></button>
					</div>
				</div>
                <div class="form-group">
					<label for="txtName" class="col-sm-2 control-label"></label>
                    <div class="col-sm-5">
                    	<img  class="loads" src="../../../../upload/loading (1).gif" width="50" style="display:none" >
						<img id="thumbnail" src="../../../../upload/thumb.jpg" width="100%">
					</div>
				</div>
		    </div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				<button type="submit" class="btn btn-primary">Save</button>
			</div>
	  	</div><!-- /.modal-content -->
		</form>
        
        <form class="form form-horizontal" id="myFrom" method="post" action="apps/product/xhr/action-up-photo.php?idc=<?php echo $con['id'];?>"  role="form" enctype="multipart/form-data">
            <div class="form-group">
                <label class="col-sm-2 control-label"></label>
                <div class="col-sm-8">
                    <input id="file_upload" style="display:none" name="upfile" type="file" >
                    <button class="btn btn-primary pull-right" id="multi-post" style="display:none;">up</button>
                </div>
            </div>    
       </form>
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<script tyle="text/javascript">
	$(document).ready(function(e) {
        /*$.ajax({
			url:"apps/product/xhr/action-load-subcategory.php",
			type:"POST",
			dataType:"html",
			data:{cate:$("#category").val()},
			success: function(result){
				$("#subcategory").append(result);
			}
		});*/
		
		$("#category").change(function(e) {
			$("#subcategory").children().remove();
            $.ajax({
				url:"apps/product/xhr/action-load-subcategory.php",
				type:"POST",
				dataType:"html",
				data:{cate:$("#category").val()},
				success: function(result){
					$("#subcategory").append(result);
				}
			});
        });
    });
</script>
<script>
$(document).ready(function(e) {
	 $("#upload").on("click",function(e){
        $("#file_upload").show().click().hide();
        e.preventDefault();
    });
	$("#file_upload").on("change",function(e){

        var files = this.files
        showThumbnail(files)  
		$("#multi-post").click();  
		$(".loads").show();    
		
    });
	function showThumbnail(files){

        $("#thumbnail").html("");
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

	$("#myFrom").submit(function(e)
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
						$("#parth").val(data);
						$(".loads").hide(0);
						$("#thumbnail").attr('src','../../../../upload/not.jpg');
						$("#unlik").show();
					}
					else
					{
						$("#parth").val(data);
						$(".loads").hide(0);
						$("#thumbnail").attr('src',data);
						$("#unlik").show();
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
	
	$("#multi-post").click(function()
	{
			$("#myFrom").submit(function(e){ 
				console.log(e);
            });
	});

});
</script>
