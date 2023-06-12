<script>
	$(document).ready(function(e) {
       $( 'textarea.editor' ).ckeditor();
    });
</script>
<div class="modal fade" id="dialog_add_testimonial" data-backdrop="static">
  	<div class="modal-dialog modal-lg" >
		<form id="form_add_testimonial" class="form-horizontal" role="form" onsubmit="fn.app.testimonial.testimonial.add();return false;">
    	<div class="modal-content">
      		<div class="modal-header">
        		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4>Add testimonial</h4>
      		</div>
		    <div class="modal-body">
            <br><br>
            <!--<div>-->

                <!-- Nav tabs -->
               <!-- <ul class="nav nav-tabs" role="tablist">
                    <li role="presentation" class="active"><a href="#Information" aria-controls="Information" role="tab" data-toggle="tab">Information</a></li>
                    <li role="presentation"><a href="#Photo" aria-controls="Photo" role="tab" data-toggle="tab">Photo</a></li>
                </ul>-->

  				<!-- Tab panes -->
                <!--<div class="tab-content"><br>
                    <div role="tabpanel" class="tab-pane active" id="Information">-->
                    	<div class="col-md-12">
                        	<div class="form-group">
                                <label for="txtName" class="col-sm-2 control-label">Name</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="txName" name="txName" >
                                </div>
                            </div>
                            <!--<div class="form-group">
                                <label for="txtName" class="col-sm-2 control-label">Brief</label>
                                <div class="col-sm-10">
                                    <textarea type="text" class="form-control" id="txBrief" name="txBrief" ></textarea>
                                </div>
                            </div>-->
                            <!--<div class="form-group">
                                <label for="txtName" class="col-sm-2 control-label">Short Description</label>
                                <div class="col-sm-10">
                                    <textarea type="text" class="form-control" id="txShort" name="txShort" ></textarea>
                                </div>
                            </div>-->
                            <div class="form-group">
                                <label for="txtName" class="col-sm-2 control-label">Detail</label>
                                <div class="col-sm-10">
                                    <textarea type="text" class="form-control editor" id="txDetail" name="txDetail" ></textarea>
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
                    <!--</div>-->
                    <!--<div role="tabpanel" class="tab-pane" id="Photo">
                    	<div class="col-md-12">
                        	<div class="form-group">
                                <label class="col-sm-2 control-label">Photo</label>
                                <div class="col-sm-10">
                                    <button type="button" class="btn btn-primary" onClick="fn.app.testimonial.testimonial.upload_photo()">Upload</button>
                                </div>
                            </div>
                            <div class="thumbs_photo">
                                
                            </div>
                        </div>
                    </div>-->
                    
                <!--</div>-->

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
            <button type="button" id="btn_upp" onClick="fn.app.testimonial.testimonial.upload_photo_file()">UP</button>
        </form>
        
        <!--<form id="form_add_pdf" class="hidden">
            <input id="f_pdf" name="file" type="file">
            <button type="button" id="btn_upp_pdf" onClick="fn.app.testimonial.testimonial.upload_pdf_file()">UP</button>
        </form>-->
        
        
       
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->
