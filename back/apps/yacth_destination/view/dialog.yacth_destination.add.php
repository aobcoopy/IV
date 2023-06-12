<div class="modal fade" id="dialog_add_yacth_destination" data-backdrop="static">
  	<div class="modal-dialog">
		<form id="form_add_yacth_destination" class="form-horizontal" role="form" onsubmit="fn.app.yacth_destination.yacth_destination.add();return false;">
    	<div class="modal-content">
      		<div class="modal-header">
        		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4>Add </h4>
      		</div>
		    <div class="modal-body">
                <div class="form-group">
                    <label for="txtName" class="col-sm-2 control-label">Name</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="txTitle" name="txTitle" onKeyUp="set_link(this,'#tx_link');">
                    </div>
                </div>
                <div class="form-group">
                    <label for="txtName" class="col-sm-2 control-label">link name</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="tx_link" name="tx_link" readonly>
                    </div>
                </div>
		    </div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				<button type="submit" class="btn btn-primary">Save</button>
			</div>
	  	</div><!-- /.modal-content -->
		</form>
        
        
        

<?php /*?>        <form id="form_add_photo" class="hidden">
            <!--<input name="txtID" value="<?php echo $brand['id']?>" type="hidden">-->
            <input id="f_Photo" name="file" type="file">
            <button type="button" id="btn_upp" onClick="fn.app.yacth_destination.yacth_destination.upload_photo_file()">UP</button>
        </form>
        <form id="form_add_photo_cover" class="hidden">
            <!--<input name="txtID" value="<?php echo $brand['id']?>" type="hidden">-->
            <input id="f_Photo_cover" name="file" type="file">
            <button type="button" id="btn_upp_cover" onClick="fn.app.yacth_destination.yacth_destination.upload_photo_file_cover()">UP</button>
        </form>
<?php */?>        
       
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<script>
function set_link(me,tbox)
{
	var str = $(me).val();
	var res = str.replaceAll(",","");
	var fin = res.replaceAll(" ","-");
	$(tbox).val(fin.toLowerCase());
}
</script>