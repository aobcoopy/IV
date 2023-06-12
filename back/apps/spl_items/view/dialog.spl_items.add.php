<div class="modal fade" id="dialog_add_spl_items" data-backdrop="static">
  	<div class="modal-dialog">
		<form id="form_add_spl_items" class="form-horizontal" role="form" onsubmit="fn.app.spl_items.spl_items.add();return false;">
    	<div class="modal-content">
      		<div class="modal-header">
        		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4>Add item</h4>
      		</div>
		    <div class="modal-body">
            <div class="form-group">
                    <label for="txtName" class="col-sm-2 control-label">Name</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="tx_name" name="tx_name" >
                    </div>
                </div>
                <div class="form-group">
                    <label for="txtName" class="col-sm-2 control-label">Unit</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" id="tx_unit" name="tx_unit" placeholder="830ml." onclick="fn.app.spl_items.sel(this);" onblur="fn.app.spl_items.matches(this,'tx_unit_type');">
                    </div>
                    
                    <div class="col-sm-4">
                        <label class="sr-only" for="exampleInputAmount"></label>
                        <div class="input-group">
                            <div class="input-group-addon">/</div>
                            <input type="text" class="form-control" id="tx_unit_type" name="tx_unit_type" placeholder="bottle">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="txtName" class="col-sm-2 control-label">Price</label>
                    <div class="col-sm-10">
                        <input type="number" class="form-control" id="tx_price" name="tx_price" placeholder="0.00"  onclick="fn.app.spl_items.sel(this);">
                    </div>
                </div>
                <div class="form-group">
                    <label for="txtName" class="col-sm-2 control-label">Category</label>
                    <div class="col-sm-10">
                        <select name="cbb_cate" id="cbb_cate" class="form-control" >
                        <?php 
                        $sql = $dbc->Query("select * from spl_category where status > 0 order by name asc");
                        while($row = $dbc->Fetch($sql))
                        {
                            echo '<option value="'.$row['id'].'">'.$row['name'].'</option>';
                        }
                        ?>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="txtName" class="col-sm-2 control-label"></label>
                    <div class="col-sm-10">
                    <div class="btn btns suc btn-success " style="display:none ;" role="alert"><i class="fa fa-check" aria-hidden="true"></i> <span class="msg"></span></div>
                    <div class="btn btns dng btn-danger " style="display:none ;" role="alert"><i class="fa fa-times" aria-hidden="true"></i> <span class="msg"></span></div>
                    </div>
                </div>
		    </div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				<button type="submit" class="btn btn-primary">Save</button>
			</div>
	  	</div><!-- /.modal-content -->
		</form>
        
        
        

        <form id="form_add_photo" class="hidden">
            <!--<input name="txtID" value="<?php echo $brand['id']?>" type="hidden">-->
            <input id="f_Photo" name="file" type="file">
            <button type="button" id="btn_upp" onClick="fn.app.spl_items.spl_items.upload_photo_file()">UP</button>
        </form>
        <form id="form_add_photo_cover" class="hidden">
            <!--<input name="txtID" value="<?php echo $brand['id']?>" type="hidden">-->
            <input id="f_Photo_cover" name="file" type="file">
            <button type="button" id="btn_upp_cover" onClick="fn.app.spl_items.spl_items.upload_photo_file_cover()">UP</button>
        </form>
        
       
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->
