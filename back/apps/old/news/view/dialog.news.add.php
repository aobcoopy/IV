<div class="modal fade" id="dialog_add_news" data-backdrop="static">
  	<div class="modal-dialog">
		<form id="form_add_news" class="form-horizontal" role="form" onsubmit="fn.app.news.news.add();return false;">
    	<div class="modal-content">
      		<div class="modal-header">
        		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4>Add News and Promtions</h4>
      		</div>
		    <div class="modal-body">
				<div class="form-group">
					<label for="txtName" class="col-sm-2 control-label">Name</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="txtName" name="txtName" maxlength="50" placeholder="Name">
					</div>
				</div>
                <div class="form-group">
					<label for="txtName" class="col-sm-2 control-label">Title</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="txtTitle" name="txtTitle" maxlength="50" placeholder="Title">
					</div>
				</div>
                <div class="form-group">
					<label for="txtName" class="col-sm-2 control-label">Brief</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="txtBrief" name="txtBrief" maxlength="313" placeholder="Brief">
					</div>
				</div>
                <div class="form-group">
					<label for="txtName" class="col-sm-2 control-label">Detail</label>
					<div class="col-sm-10">
						<textarea type="text" class="form-control" id="txtDetail" name="txtDetail" placeholder="Detail"></textarea>
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
						<img id="thumbnail" src="../../../../upload/news.jpg" width="100%">
					</div>
				</div>
                
                <!--photo----------------------------------------------------------------------------->
                <div class="form-group">
                    <label for="txtName" class="col-sm-2 control-label">Pohoto</label>
                    <!--<div class="col-sm-8">
                        <input type="text" class="form-control" id="tx_photo" name="tx_photo" readonly>
                    </div>-->
                    <div class="col-sm-1">
                        <button type="button" id="upload_photo" onClick="upload_photos()" class="btn btn-info"><i class="fa fa-picture-o" aria-hidden="true"></i></button>
                    </div>
                </div>
                <div class="form-group">
                    <label for="txtName" class="col-sm-2 control-label"></label>
                     <div class="col-sm-3 thu">
                        <img  class="loads_photo" src="../../../../upload/loading (1).gif" width="50" style="display:none" >
                    </div>
                   
                </div>
                <div class="my_phot">
                </div>
                <!--photo----------------------------------------------------------------------------->



		    </div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				<button type="submit" class="btn btn-primary">Save</button>
			</div>
	  	</div><!-- /.modal-content -->
		</form>
        
        <form class="form form-horizontal" id="myFrom" method="post" action="apps/news/xhr/action-up-photo.php?idc=<?php echo $con['id'];?>"  role="form" enctype="multipart/form-data">
            <div class="form-group">
                <label class="col-sm-2 control-label"></label>
                <div class="col-sm-8">
                    <input id="file_upload" style="display:none" name="upfile" type="file" >
                    <button class="btn btn-primary pull-right" id="multi-post" style="display:none;">up</button>
                </div>
            </div>    
       </form>
       
       <!--photo----------------------------------------------------------------------------->
       <form class="form form-horizontal" id="myFrom_photo" method="post" action="apps/news/xhr/action-up-photo-detail.php"  role="form" enctype="multipart/form-data">
            <div class="form-group">
                <label class="col-sm-2 control-label"></label>
                <div class="col-sm-8">
                    <input id="file_upload_photo" style="display:none" name="upfile" type="file" >
                    <button class="btn btn-primary pull-right" id="multi_post_photo" style="display:none;">up</button>
                </div>
            </div>    
       </form>
       <!--photo----------------------------------------------------------------------------->


	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<script tyle="text/javascript">
	$(document).ready(function(e) {
        /*$.ajax({
			url:"apps/news/xhr/action-load-subcategory.php",
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
				url:"apps/news/xhr/action-load-subcategory.php",
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
	//function showThumbnail(files){
//
//        $("#thumbnail").html("");
//        for(var i=0;i<files.length;i++){
//            var file = files[i]
//            var imageType = /image.*/
//            if(!file.type.match(imageType)){
//                //     console.log("Not an Image");
//                continue;
//            }
//
//            var image = document.createElement("img");
//            var thumbnail = document.getElementById("thumbnail");
//            image.file = file;
//            thumbnail.appendChild(image)
//
//            var reader = new FileReader()
//            reader.onload = (function(aImg){
//                return function(e){
//                    aImg.src = e.target.result;
//                };
//            }(image))
//
//            var ret = reader.readAsDataURL(file);
//            var canvas = document.createElement("canvas");
//            ctx = canvas.getContext("2d");
//            image.onload= function(){
//                ctx.drawImage(image,50,50)
//            }
//        } // end for loop
//
//    } // end showThumbnail
	
   
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
						$("#thumbnail").attr('src','../../../../upload/news_not.jpg');
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


<script>
//------logo--------------------------------------------------------------------------------------------
var my_from;
var button;
var btn_up;
var parth;
var file_upload;
var thumbnail;

//------photo--------------------------------------------------------------------------------------------
var a=0;
function upload_photos()
{
	 my_from = "#myFrom_photo";
	 button = "#upload_photo";
	 btn_up = "#multi_post_photo";
	 parth = "#tx_photo";
	 file_upload = "#file_upload_photo";
	 thumbnail = "#thumbnail_photo";
	 
	 $(file_upload).show().click().hide();
	// e.preventDefault();
		
		$(file_upload).unbind();
		$(file_upload).on("change",function(e){
			var files = this.files
			//showThumbnail(files)  
			$(btn_up).click();  
			//$(".loads_photo").show();    
		});
	
	
		$(my_from).submit(function(e)
		{
		
			var formObj = $(this);
			var formURL = formObj.attr("action");
		
		
			if(window.FormData !== undefined)  // for HTML5 browsers
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
							//$(parth).val(data);
							$(".loads_photo").hide(0);
							//$(thumbnail).attr('src','../../../../upload/banner_not.jpg');
						}
						else
						{
							add_phot(data);
							console.log(data);
						}
							
					},
					error: function(jqXHR, textStatus, errorThrown) 
					{
						//$("#multi-msg").html('<pre><code class="prettyprint">AJAX Request Failed<br/> textStatus='+textStatus+', errorThrown='+errorThrown+'</code></pre>');
					} 	        
			   });
			   
				e.preventDefault();
				e.unbind();
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
					$("#multi-msg").html('<pre><code>'+data+'</code></pre>');
					
				});
		   }
	});
	$(btn_up).click(function()
	{
		$(my_from).submit(function(e){ 
			//console.log(e);
		});
	});


}
//------photo--------------------------------------------------------------------------------------------


function add_phot(datas)
{
	var img='';
	
	img+='<div class="col-md-6  addedPic" >';
		img+='<img  src="'+datas+'"  width="150" class="image_photos">';
		img+='<input type="hidden" class="form-control vals" value="'+datas+'"  name="t_photo[]">';
		img+='&nbsp; <button type="button" class="btn btn-xs btn-danger"  onClick="unlink_me(this)">Remove</button>';
	img+='</div>';
	$(".my_phot").append(img);
	
	/*var j=0;
	$(".thu .addedPic").each(function(index, element) {
		j++;
	});*/
	
	//alert(j);
	/*if(j>11)
	{
		alert("Limit 12 photos");
		$("#btn_photo").attr('disabled',true);
		return false;
	}*/
}

function unlink_me(me,data)
{
	var a = $(me).parent().find('input[class=vals]').val();
	$.ajax({
		url: 'apps/news/xhr/action-unlink-photo.php',
		type: 'POST',
		data:  {id:data},
		success: function(){
		}
	});
	$(me).parent().remove();
	
}

function showThumbnail(files)
{
	$(thumbnail).html("");
	for(var i=0;i<files.length;i++)
	{
		var file = files[i]
		var imageType = /image.*/
		if(!file.type.match(imageType))
		{
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




</script>