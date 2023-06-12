
<script>
	$(document).ready(function(e) {
       $( 'textarea.editor' ).ckeditor();
	   $("#txName").blur(function(e) {
			if($("#txName").val()=='')
			{
			   $("#cke_41").hide()
			}
			else
			{
			   $("#cke_41").show();
			   $.ajax({
					url:"apps/blog/xhr/created_session.php",
					type:"POST",
					dataType:"json",
					data:{sess:$("#txName").val()},
					success: function(res){
						//alert(res);
					}
			   });
			}
			
		});  
		 
    });
	//CKEDITOR.replace( 'txDetail', {
//  height: 300,
//  filebrowserUploadUrl: "apps/blog/upload.php"
// });
</script>

<div class="modal fade" id="dialog_add_blog" data-backdrop="static">
  	<div class="modal-dialog modal-lg" >
		<form id="form_add_blog" class="form-horizontal" role="form" onsubmit="fn.app.blog.blog.add();return false;">
    	<div class="modal-content">
      		<div class="modal-header">
        		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4>Add blog</h4><?php //echo $_SESSION['b_name'];?>
      		</div>
		    <div class="modal-body">
            <br><br>
            <!--<div>-->

                <!-- Nav tabs -->
                <ul class="nav nav-tabs" role="tablist">
                    <li role="presentation" class="active"><a href="#Information" aria-controls="Information" role="tab" data-toggle="tab">Information</a></li>
                    <!--<li role="presentation"><a href="#Detail" aria-controls="Detail" role="tab" data-toggle="tab">Detail</a></li>-->
                    <li role="presentation"><a href="#Photo" aria-controls="Photo" role="tab" data-toggle="tab">Cover Photo</a></li>
                </ul>

  				<!-- Tab panes -->
                <div class="tab-content"><br>
                    <div role="tabpanel" class="tab-pane active" id="Information">
                    
                   
                
                    
                    	<div class="col-md-12">
                        	<div class="form-group">
                                <label for="txtName" class="col-sm-2 control-label">Name (Title,H1)</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="txName" name="txName" >
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="txtName" class="col-sm-2 control-label">Snippet</label>
                                <div class="col-sm-10">
                                    <textarea type="text" class="form-control" id="txSnippet" name="txSnippet" ></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="txtName" class="col-sm-2 control-label">Brief (Meta Description)</label>
                                <div class="col-sm-10">
                                    <textarea type="text" class="form-control" id="txBrief" name="txBrief" ></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="txtName" class="col-sm-2 control-label">Detail</label>
                                <div class="col-sm-10 ">
                                    <textarea type="textarea" class="form-control editor" id="txDetail" name="txDetail" ></textarea>
                                </div>
                            </div>
                            <!--<div class="form-group">
                                <label for="txtName" class="col-sm-2 control-label">Short Description</label>
                                <div class="col-sm-10">
                                    <textarea type="text" class="form-control" id="txShort" name="txShort" ></textarea>
                                </div>
                            </div>-->
                            
                            <div class="form-group">
                                <label for="txtName" class="col-sm-2 control-label">Sign</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="txSign" name="txSign" >
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="txtName" class="col-sm-2 control-label">Date</label>
                                <div class="col-sm-10">
                                    <input type="date" class="form-control" id="txDate" name="txDate">
                                </div>
                            </div>
                            <!--<div class="form-group">
                                <label for="txtName" class="col-sm-2 control-label">Category</label>
                                <div class="col-sm-10">
                                    <select name="cbbCate" id="cbbCate" class="form-control">
                                        <option value="">Choose category</option>
                                        <?php 
                                        $sql_cate = $dbc->Query("select * from categories where status > 0");
                                        while($r_cate = $dbc->Fetch($sql_cate))
                                        {
                                            echo '<option value="'.$r_cate['id'].'">'.$r_cate['name'].'</option>';
                                        }
                                        ?>
                                    </select>
                                   
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="txtName" class="col-sm-2 control-label">Latitude</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="txLatitude" name="txLatitude" >
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="txtName" class="col-sm-2 control-label">Longtitude</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="txLongtitude" name="txLongtitude" >
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="txtName" class="col-sm-2 control-label">Price</label>
                                <div class="col-sm-10">
                                    <input type="number" class="form-control" id="txPrice" name="txPrice" >
                                </div>
                            </div>-->
                        </div>
                    </div>
                    <div role="tabpanel" class="tab-pane" id="Photo">
                    	<div class="col-md-12">
                        	<div class="form-group">
                                <label class="col-sm-2 control-label">Photo</label>
                                <div class="col-sm-10">
                                    <button type="button" class="btn btn-primary" onClick="fn.app.blog.blog.upload_photo()">Upload</button>
                                    <font color="#ff0000"> 735 x 300 px</font>
                                </div>
                            </div>
                            <div class="thumbs_photo">
                                
                            </div>
                        </div>
                    </div>
                    
                </div>

<!--</div>-->

            	
                
                
		    </div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				<button type="submit" class="btn btn-primary">Save</button>
			</div>
	  	</div><!-- /.modal-content -->
		</form>
        
        
        
		<form id="form_add_photo" class="hidden">
            <input id="f_Photo" name="file" type="file">
            <button type="button" id="btn_upp" onClick="fn.app.blog.blog.upload_photo_file()">UP</button>
        </form>
        
        <form id="form_add_photo_detail" class="hidden">
            <input id="fd_Photo" name="file_detail" type="file">
            <button type="button" id="btn_upp_detail" onClick="fn.app.blog.blog.upload_photo_detail_file()">UP</button>
        </form>
        <!--<form id="form_add_pdf" class="hidden">
            <input id="f_pdf" name="file" type="file">
            <button type="button" id="btn_upp_pdf" onClick="fn.app.blog.blog.upload_pdf_file()">UP</button>
        </form>-->
        
        
       
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->


<!--<script src="../back/apps/blog/ckeditor5.js"></script>-->




<?php /*?><script src="https://cdn.ckeditor.com/ckeditor5/16.0.0/classic/ckeditor.js"></script>
 <script>
                       ClassicEditor
    .create( document.querySelector( '.editor' ), {
        image: {
             //plugins: [ EasyImage, ... ],
			 toolbar: [ 'imageUpload','imageTextAlternative', '|', 'imageStyle:alignLeft', 'imageStyle:full', 'imageStyle:alignRight' ],

            styles: [
                // This option is equal to a situation where no style is applied.
                'full',

                // This represents an image aligned to the left.
                'alignLeft',

                // This represents an image aligned to the right.
                'alignRight'
            ]
        }
    } );
	
	
	//editor.execute( 'imageInsert', { source:  [
//        'https://media.inspiringvillas.com/prd/upload/blog/recommended-villas-for-groups-and-large-families1573375023.jpg',
//        'https://media.inspiringvillas.com/prd/upload/blog/recommended-villas-for-groups-and-large-families1573375023.jpg'
//    ] } );
                </script><?php */?>
<script>
function add_more()
{
	var z='';
	z+='<div class="col-md-12 bdp">';
		z+='<div class="form-group">';
			z+='<label for="txtName" class="col-sm-2 control-label">Detail</label>';
			z+='<div class="col-sm-10 ">';
				z+='<textarea type="textarea" class="form-control editor" id="txDetail" name="txDetail" ></textarea>';
			z+='</div>';
		z+='</div>';
		z+='<div class="form-group">';
			z+='<label class="col-sm-2 control-label">Photo</label>';
			z+='<div class="col-sm-10">';
				z+='<button type="button" class="btn btn-primary" onClick="fn.app.blog.blog.upload_photo_detail()">Upload</button>';
				z+='<font color="#ff0000"> 735 x 300 px</font>';
				z+='<input type="text" class="form-control paths" id="tx_photo_detail" name="tx_photo_detail">';
				z+='<img src=""  width="100%" class=" phos">';
				z+='<button type="button" class="btn btn-danger bc" style="width:100%; display:none" onclick="fn.app.blog.blog.remove_photo(this);">';
					z+='<i class="fa fa-times" aria-hidden="true"></i>';
				z+='</button>';
			z+='</div>';
		z+='</div>';
	z+='</div>';
	$(".b_det").append(z);
}
</script>
