<?php
	include "libs/iface/dialog_change_avatar.php";
?>
<script type="text/javascript" src="libs/js/plugins/bootstrap/bootstrap-file-input.js"></script>
<div class="page-title">
	<h2><span class="fa fa-cogs"></span> Edit Profile</h2>
</div>

<div class="page-content-wrap">
	<div class="row">
		<div class="col-md-12">
			<div class="alert alert-warning" role="alert">
				<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
				<strong>Important!</strong> Main feature of this page is "Change photo" function. Press button "Change photo" and try to use this awesome feature.
			</div>      
		</div>
	</div>     
	
	<div class="row">  
		<div class="col-md-3 col-sm-4 col-xs-5">
			<form action="#" class="form-horizontal">
				<div class="panel panel-default">
					<div class="panel-body">
						<h3><span class="fa fa-user"></span> <?php echo $user['name'];?></h3>
						<p><?php echo $contact['name'].' '.$contact['surname'];?></p>
						<div class="text-center" id="user_image">
							<img src="<?php echo $avatar;?>" class="img-thumbnail"/>
						</div>                                    
					</div>
					<div class="panel-body form-group-separated">
						<div class="form-group">
							<div class="col-md-12 col-xs-12">
								<a href="#" class="btn btn-primary btn-block btn-rounded" data-toggle="modal" data-target="#modal_change_photo">Change Photo</a>
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-3 col-xs-5 control-label">#ID</label>
							<div class="col-md-9 col-xs-7">
								<input type="text" value="<?php echo $user['id'];?>" class="form-control" disabled/>
							</div>
						</div>
						
						<div class="form-group">
							<label class="col-md-3 col-xs-5 control-label">Login</label>
							<div class="col-md-9 col-xs-7">
								<input type="text" value="<?php echo $user['name'];?>" class="form-control"/>
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-3 col-xs-5 control-label">E-mail</label>
							<div class="col-md-9 col-xs-7">
								<input type="text" value="<?php echo $contact['email'];?>" class="form-control"/>
							</div>
						</div>
						<div class="form-group">
							<div class="col-md-12 col-xs-12">
								<a href="#" class="btn btn-danger btn-block btn-rounded" data-toggle="modal" data-target="#modal_change_password">Change password</a>
							</div>
						</div>     
					</div>
				</div>
			</form>
		</div>
		
		<div class="col-md-6 col-sm-8 col-xs-7">
			<form action="#" class="form-horizontal">
				<div class="panel panel-default">
					<div class="panel-body">
						<h3><span class="fa fa-pencil"></span> Profile</h3>
						<p>Your can change your profile here.</p>
					</div>
					<div class="panel-body form-group-separated">
						<div class="form-group">
							<label class="col-md-3 col-xs-5 control-label">First Name</label>
							<div class="col-md-9 col-xs-7">
								<input type="text" value="<?php echo $contact['name'];?>" class="form-control"/>
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-3 col-xs-5 control-label">Last Name</label>
							<div class="col-md-9 col-xs-7">
								<input type="text" value="<?php echo $contact['surname'];?>" class="form-control"/>
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-3 col-xs-5 control-label">Mobile</label>
							<div class="col-md-9 col-xs-7">
								<input type="text" value="<?php echo $contact['mobile'];?>" class="form-control"/>
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-3 col-xs-5 control-label">Phone</label>
							<div class="col-md-9 col-xs-7">
								<input type="text" value="<?php echo $contact['phone'];?>" class="form-control"/>
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-3 col-xs-5 control-label">Nickname</label>
							<div class="col-md-9 col-xs-7">
								<input type="text" value="<?php echo $contact['email'];?>" class="form-control"/>
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-3 col-xs-5 control-label">Nickname</label>
							<div class="col-md-9 col-xs-7">
								<input type="text" value="<?php echo $contact['nickname'];?>" class="form-control"/>
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-3 col-xs-5 control-label">Address</label>
							<div class="col-md-9 col-xs-7">
								<input type="text" value="<?php echo $address['address'];?>" class="form-control"/>
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-3 col-xs-5 control-label">Country</label>
							<div class="col-md-9 col-xs-7">
								<select id="cbbCountry" name="cbbCountry" class="form-control">
								<?php
									$sql= "SELECT * FROM countries";
									$rst = $dbc->Query($sql);
									while($line = $dbc->Fetch($rst)){
										$selected = $line['id']==$address['country']?" selected":"";
										echo "<option value='$line[id]'$selected>$line[name]</option>";
									}
								?>
								</select>
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-3 col-xs-5 control-label">Province</label>
							<div class="col-md-9 col-xs-7">
								<select id="cbbProvince" name="cbbProvince" class="form-control">
								<?php
									$sql= "SELECT * FROM cities WHERE country =  ".$address['country'];
									$rst = $dbc->Query($sql);
									while($line = $dbc->Fetch($rst)){
										$selected = $line['id']==$address['city']?" selected":"";
										echo "<option value='$line[id]'$selected>$line[name]</option>";
									}
								?>
								</select>
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-3 col-xs-5 control-label">District</label>
							<div class="col-md-9 col-xs-7">
								<select id="cbbDistrict" name="cbbDistrict" class="form-control">
								<?php
									$sql= "SELECT * FROM districts WHERE city =  ".$address['city'];
									$rst = $dbc->Query($sql);
									while($line = $dbc->Fetch($rst)){
										$selected = $line['id']==$address['district']?" selected":"";
										echo "<option value='$line[id]'$selected>$line[name]</option>";
									}
								?>
								</select>
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-3 col-xs-5 control-label">Subdistrict</label>
							<div class="col-md-9 col-xs-7">
								<select id="cbbSubdistrict" name="cbbSubdistrict" class="form-control">
								<?php
									$sql= "SELECT * FROM subdistricts WHERE district =  ".$address['district'];
									$rst = $dbc->Query($sql);
									while($line = $dbc->Fetch($rst)){
										$selected = $line['id']==$address['subdistrict']?" selected":"";
										echo "<option value='$line[id]'$selected>$line[name]</option>";
									}
								?>
								</select>
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-3 col-xs-5 control-label">Postal</label>
							<div class="col-md-9 col-xs-7">
								<input type="text" value="<?php echo $address['postal'];?>" class="form-control"/>
							</div>
						</div>
	
						<div class="form-group">
						<label class="col-md-3 col-xs-5 control-label">About me</label>
							<div class="col-md-9 col-xs-7">
								<textarea class="form-control" rows="5">I'm realy great web developer. Godlike with internet...</textarea>
							</div>
						</div>     
						<div class="form-group">
							<div class="col-md-12 col-xs-5">
								<button class="btn btn-primary btn-rounded pull-right">Save</button>
							</div>
						</div>
					</div>
				</div>
			</form>
		</div>
		<div class="col-md-3">
			<div class="panel panel-default form-horizontal">
				<div class="panel-body">
					<h3><span class="fa fa-info-circle"></span> Quick Info</h3>
					<p>User Information</p>
				</div>
				<div class="panel-body form-group-separated">                                    
					<div class="form-group">
						<label class="col-md-4 col-xs-5 control-label">Last visit</label>
						<div class="col-md-8 col-xs-7 line-height-30">
						<?php
							$last_login = strtotime($user['last_login']);
							echo date("H:i d/m/Y",$last_login);
						?>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-4 col-xs-5 control-label">Registration</label>
						<div class="col-md-8 col-xs-7 line-height-30">
						<?php
							$created = strtotime($user['created']);
							echo date("H:i d/m/Y",$created);
						?>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-4 col-xs-5 control-label">Modification</label>
						<div class="col-md-8 col-xs-7 line-height-30">
						<?php
							$updated = strtotime($user['updated']);
							echo date("H:i d/m/Y",$updated);
						?>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-4 col-xs-5 control-label">Birthday</label>
						<div class="col-md-8 col-xs-7 line-height-30">
						<?php
							$birthday = strtotime($contact['created']);
							echo date("d/m/Y",$birthday);
						?>
						</div>
					</div>
				</div>      
			</div>
                            
			<div class="panel panel-default">
                                <div class="panel-body">
                                    <h3><span class="fa fa-cog"></span> Settings</h3>
                                    <p>Sample of settings block</p>
                                </div>
                                <div class="panel-body form-horizontal form-group-separated">                                    
                                    <div class="form-group">
                                        <label class="col-md-6 col-xs-6 control-label">Notifications</label>
                                        <div class="col-md-6 col-xs-6">
                                            <label class="switch">
                                                <input type="checkbox" checked value="1"/>
                                                <span></span>
                                            </label>
                                        </div>
                                    </div>                                    
                                    <div class="form-group">
                                        <label class="col-md-6 col-xs-6 control-label">Mailing</label>
                                        <div class="col-md-6 col-xs-6">
                                            <label class="switch">
                                                <input type="checkbox" checked value="1"/>
                                                <span></span>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-6 col-xs-6 control-label">Priority</label>
                                        <div class="col-md-6 col-xs-6">
                                            <label class="switch">
                                                <input type="checkbox" value="0"/>
                                                <span></span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
			</div>
        </div>
	</div>
</div>
