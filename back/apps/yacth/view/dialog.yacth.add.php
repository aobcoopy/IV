<div class="modal fade" id="dialog_add_yacth" data-backdrop="static">
  	<div class="modal-dialog modal-lg" >
		<form id="form_add_yacth" class="form-horizontal" role="form" onsubmit="fn.app.yacth.yacth.add();return false;">
    	<div class="modal-content">
      		<div class="modal-header">
        		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4>Add </h4>
      		</div>
		    <div class="modal-body">
            
            <br><br><br>
            
                <div>
                    
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs" role="tablist">
                        <li role="presentation" class="active"><a href="#home_1" aria-controls="home_1" role="tab" data-toggle="tab">Information</a></li>
                        <li role="presentation"><a href="#profile_1" aria-controls="profile_1" role="tab" data-toggle="tab">Prefered Program</a></li>
                        <li role="presentation"><a href="#messages_1" aria-controls="messages_1" role="tab" data-toggle="tab">Prefered Time</a></li>
                    </ul>
                    
                    <!-- Tab panes -->
                    <div class="tab-content"><br>
                        <div role="tabpanel" class="tab-pane active" id="home_1">
                        	
                            <div class="form-group">
                                <label for="txtName" class="col-sm-2 control-label">Name</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="txTitle" name="txTitle" >
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="txtName" class="col-sm-2 control-label">Short Description</label>
                                <div class="col-sm-10">
                                    <textarea type="text" class="form-control " id="txDetail" name="txDetail" ></textarea>
                                </div>
                            </div>
                            <!--<div class="form-group">
                                <label for="txtName" class="col-sm-2 control-label">Highlight</label>
                                <div class="col-sm-2">
                                    <button type="button" class="btn btn-info" onClick="fn.app.yacth.yacth.highlight('all_highlight_add');"><i class="fa fa-plus"></i></button>
                                </div>
                                <div class="all_highlight_add col-sm-10 col-sm-offset-2" style="margin-top:15px;">
                                </div>
                            </div>-->
                            <!--<div class="form-group">
                                <label for="txtName" class="col-sm-2 control-label">Description</label>
                                <div class="col-sm-10">
                                    <textarea type="text" class="form-control editor" id="txDescription" name="txDescription" ></textarea>
                                </div>
                            </div>-->
                            <div class="form-group">
                                <label for="txtName" class="col-sm-2 control-label">Price</label>
                                <div class="col-sm-4">
                                    <input type="number" min="0" class="form-control" id="txPrice" name="txPrice" >
                                </div>
                                <label for="txtName" class="col-sm-2 control-label">Hours</label>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control" id="txHours" name="txHours">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="txtName" class="col-sm-2 control-label">Bedroom</label>
                                <div class="col-sm-10">
                                    <input  type="number" min="0" class="form-control" id="txBedroom" name="txBedroom" >
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="txtName" class="col-sm-2 control-label">Guest Maximum</label>
                                <div class="col-sm-10">
                                    <input  type="number" min="0" class="form-control" id="txGuest" name="txGuest" >
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="txtName" class="col-sm-2 control-label">Destination</label>
                                <div class="col-sm-10">
                                    <select name="cbb_destination" id="cbb_destination" class="form-control" onChange="fill_list(this);">
                                        <?php
                                        $sql = $dbc->Query("select * from yacth_destination where status > 0 and fleet_type IS NULL order  by name asc");
                                        while($line = $dbc->Fetch($sql))
                                        {
                                            echo '<option value="'.$line['id'].'">'.$line['name'].'</option>';	
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <script>
                            function fill_list(me)
							{
								var val = $(me).val();
								$("#cbb_marina_1").val(0);
								$("#cbb_marina_1").children('.mari').hide();
								$("#cbb_marina_1").children('.'+val).show();
							}
                            </script>
                            <div class="form-group">
                                <label for="txtName" class="col-sm-2 control-label">Marina Location</label>
                                <div class="col-sm-10">
                                    <select name="cbb_marina_1" id="cbb_marina_1" class="form-control">
                                    	<option value="0">Choose Marina Location</option>
                                        <?php
                                        $sql = $dbc->Query("select * from yacth_marina where status > 0  order  by name asc");
                                        while($line = $dbc->Fetch($sql))
                                        {
                                            $act = ($line['id']==$yacth['marina'])?'selected':'';
                                            echo '<option class="mari '.$line['destination'].'" value="'.$line['id'].'" '.$act.'>'.$line['name'].'</option>';	
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="txtName" class="col-sm-2 control-label">Type of charter</label>
                                <br>
                                <div class="col-sm-10">
                                		<div class="checkbox-inline1 col-md-4">
                                            <label>
                                                <input type="radio" name="tx_tochar_1" value="0" checked> No
                                            </label>
                                        </div>
                                        <?php
                                        //$prefer = json_decode($yacth['type_of_charter'],true);
                                        $sql = $dbc->Query("select * from yacth_charter where status > 0 order by name asc");
                                        while($line = $dbc->Fetch($sql))
                                        {
											$act = ($line['id']==$yacth['type_of_charter'])?'checked':'';
                                            echo '<div class="checkbox-inline1 col-md-4">';
                                                echo '<label>';
                                                    echo '<input type="radio" name="tx_tochar_1" value="'.$line['id'].'" '.$act.'> '.$line['name'].'';
                                                echo '</label>';
                                            echo '</div>';
                                        }
                                        ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="txtName" class="col-sm-2 control-label">Type of Yacht</label>
                                <div class="col-sm-2">
                                    <input type="number" min="0" step="0.1" class="form-control" id="txNoTOY" name="txNoTOY">
                                </div>
                                <div class="col-sm-8">
                                    <select name="cbb_fleet" id="cbb_fleet" class="form-control">
                                        <?php
                                        $sql = $dbc->Query("select * from yacth_destination where status > 0 and fleet_type IS NOT NULL order by name asc");
                                        while($line = $dbc->Fetch($sql))
                                        {
                                            echo '<option value="'.$line['id'].'">'.$line['name'].'</option>';	
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="txtName" class="col-sm-2 control-label">Sailing Route</label>
                                <div class="col-sm-10">
                                    <select name="cbb_sr" id="cbb_sr" class="form-control">
                                        <?php
                                        $sql = $dbc->Query("select * from yacth_sailing_route where status > 0 order by name asc");
                                        while($line = $dbc->Fetch($sql))
                                        {
                                            echo '<option value="'.$line['id'].'">'.$line['name'].'</option>';	
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="txtName" class="col-sm-2 control-label">Tag</label>
                                <div class="col-sm-10">
                                    <input  type="text" class="form-control" id="txTag" name="txTag" >
                                </div>
                            </div>
                
                        </div>
                        <div role="tabpanel" class="tab-pane" id="profile_1">
                        	<a href="?app=yacth_prefer_program"><button class="btn btn-info" type="button">Add More</button></a>
                            <div class="form-group">
                                <!--<label for="txtName" class="col-sm-2 control-label">Prefered Program</label>-->
                                <br>
                                <div class="col-sm-10">
                                        <?php
                                        $sql = $dbc->Query("select * from yacth_prefer_program where status > 0 order by name asc");
                                        while($line = $dbc->Fetch($sql))
                                        {
                                            echo '<div class=" checkbox-inline1 col-md-6">';
                                                echo '<label>';
                                                    echo '<input type="checkbox" name="tx_prefer[]" value="'.$line['id'].'" > '.$line['name'].'';
                                                echo '</label>';
                                            echo '</div>';
                                        }
                                        ?>
                                        
                                </div>
                            </div>
                
                        </div>
                        <div role="tabpanel" class="tab-pane" id="messages_1">
                        	<a href="?app=yacth_prefer_time"><button class="btn btn-info" type="button">Add More</button></a>
                            <div class="form-group">
                                <!--<label for="txtName" class="col-sm-2 control-label">Prefered Time</label>-->
                                <br>
                                
                                <div class="col-sm-10">
                                        <?php
                                        $sql_time = $dbc->Query("select * from yacth_prefer_time where status > 0 order by name asc");
                                        while($line_time = $dbc->Fetch($sql_time))
                                        {
                                            echo '<div class=" checkbox-inline1 col-md-4">';
                                                echo '<label>';
                                                    echo '<input type="checkbox" name="tx_prefer_time[]" value="'.$line_time['id'].'" > '.$line_time['name'].'';
                                                echo '</label>';
                                            echo '</div>';
                                        }
                                        ?>
                                        
                                </div>
                            </div>
                
                        </div>
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
            <button type="button" id="btn_upp" onClick="fn.app.yacth.yacth.upload_photo_file()">UP</button>
        </form>
        <form id="form_add_photo_cover" class="hidden">
            <!--<input name="txtID" value="<?php echo $brand['id']?>" type="hidden">-->
            <input id="f_Photo_cover" name="file" type="file">
            <button type="button" id="btn_upp_cover" onClick="fn.app.yacth.yacth.upload_photo_file_cover()">UP</button>
        </form>
<?php */?>        
       
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<script>
	$(document).ready(function(e) {
		$("#cbb_destination").change();
       $( 'textarea.editor' ).ckeditor();
    });
</script>