<div class="page-content-wrap">
	<div class="row">
		<div class="col-md-3">
			<div class="panel panel-default">
				<div class="panel-body profile" style="background: url('libs/assets/images/gallery/music-4.jpg') center center no-repeat;">
					<div class="profile-image">
						<img class="img-responsive" src="<?php echo $avatar;?>" alt="<?php echo $user['name'];?>"/>
					</div>
					<div class="profile-data">
						<div class="profile-data-name"><?php echo $user['name'];?></div>
						<div class="profile-data-title" style="color: #FFF;"><?php echo $contact['name']." ".$contact['surname'];?></div>
					</div>
					
				</div>
				<div class="panel-body">     
					<div class="row">
						<div class="col-md-6">
							<a href="?app=profile&view=edit_profile" class="btn btn-info btn-rounded btn-block"><span class="fa fa-pencil"></span> Edit Profile</a>
						</div>
						<div class="col-md-6">
							<a class="btn btn-primary btn-rounded btn-block" data-toggle="modal" data-target="#modal_change_password"><span class="fa fa-key"></span> Change Password</a>
						</div>
					</div>
				</div>
				<div class="panel-body list-group border-bottom">
					<a href="#" class="list-group-item active"><span class="fa fa-bar-chart-o"></span> Activity</a>
					<a href="#" class="list-group-item"><span class="fa fa-coffee"></span> Groups <span class="badge badge-default">18</span></a>                                
					<a href="#" class="list-group-item"><span class="fa fa-users"></span> Friends <span class="badge badge-danger">+7</span></a>
				</div>
				<div class="panel-body">
					<h4 class="text-title">Team</h4>
					<div class="row">
					<?php
						$sql = "SELECT 
								users.id,
								contacts.name as name,
								users.name as username,
								contacts.surname as surname,
								contacts.avatar as avatar
							FROM users 
							LEFT JOIN contacts ON users.contact = contacts.id
							WHERE users.gid = ".$_SESSION['auth']['group_id'];
						$rst = $dbc->Query($sql);
						while($person = $dbc->Fetch($rst)){
							echo '<div class="col-md-4 col-xs-4">';
								echo '<a href="#" class="friend">';
									if($person['avatar']==""){
										echo '<img src="libs/assets/images/users/no-image.jpg"/>';
									}else{
										echo '<img src="'.$person['avatar'].'"/>';
									}
								
									if($_SESSION['auth']['user_id']==$person['id']){
										echo '<span>Me</span>';
									}else{
										echo '<span>'.$person['username'].'</span>';
									}
								echo '</a>';
							echo '</div>';
						}
					?>
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-9">
			<div class="timeline timeline-right">
				<div class="timeline-item timeline-main">
					<div class="timeline-date">Today</div>
				</div>
				<?php
					$sql = "SELECT * FROM logs WHERE log_user =$user[id] AND DATE(log_datetime) = CURDATE()";
					$rst = $dbc->Query($sql);
					while($log = $dbc->Fetch($rst)){
						$log_datetime = strtotime($log['log_datetime']);
						echo '<div class="timeline-item timeline-item-right">';
							echo '<div class="timeline-item-info">'.date("H:i",$log_datetime).'</div>';
							echo '<div class="timeline-item-icon"><span class="fa fa-info-circle"></span></div> ';
							echo '<div class="timeline-item-content">';
								echo '<div class="timeline-heading padding-bottom-0">';
									echo '<img src="'.$avatar.'"/> <a href="#">'.$user['name'].'</a> '.$log['log_location'];
								echo '</div>';
								echo '<div class="timeline-body">';
								echo '<i>';
									echo '</a>'.$log['log_action'].' : '.$log['log_value'];
									echo '<pre>';
										var_dump($log['log_data']);
									echo '</pre>';
								echo '</i>';
								echo '</div>';
							echo '</div>';
						echo '</div>';
					}
				?>
				
				<div class="timeline-item timeline-main">
					<div class="timeline-date">Yesterday</div>
				</div>
				<?php
					$sql = "SELECT * FROM logs WHERE log_user =$user[id] AND DATE(log_datetime) < CURDATE()";
					$rst = $dbc->Query($sql);
					while($log = $dbc->Fetch($rst)){
						$log_datetime = strtotime($log['log_datetime']);
						echo '<div class="timeline-item timeline-item-right">';
							echo '<div class="timeline-item-info">'.date("H:i",$log_datetime).'</div>';
							echo '<div class="timeline-item-icon"><span class="fa fa-info-circle"></span></div> ';
							echo '<div class="timeline-item-content">';
								echo '<div class="timeline-heading padding-bottom-0">';
									echo '<img src="'.$avatar.'"/> <a href="#">'.$user['name'].'</a> '.$log['log_location'];
								echo '</div>';
								echo '<div class="timeline-body">';
								echo '<i>';
									echo '</a>'.$log['log_action'].' : '.$log['log_value'];
									echo '<pre>';
										var_dump($log['log_data']);
									echo '</pre>';
								echo '</i>';
								echo '</div>';
							echo '</div>';
						echo '</div>';
					}
				?>
				<div class="timeline-item timeline-main">
					<div class="timeline-date"><a href="#"><span class="fa fa-ellipsis-h"></span></a></div>
				</div>
			</div>
			<!-- END TIMELINE -->                                            
		</div>    
	</div>
</div>