<div class="col-md-12">
	<div class="panel panel-default">
		<div id="panel-heading-log" class="panel-heading">
	        <h3 class="panel-title">Log Table</h3>
	    </div>
	    <div class="panel-body">
	        <div class="timeline timeline-right">
				<div class="timeline-item timeline-main">
					<div class="timeline-date">Today</div>
				</div>
				<?php
					$sql = "
						SELECT 
							logs.log_datetime as log_datetime,
							logs.log_location as log_location,
							logs.log_action as log_action,
							logs.log_value as log_value,
							logs.log_data as log_data,
							users.name as username,
							contacts.avatar as avatar
						FROM logs
						LEFT JOIN users ON logs.log_user = users.id
						LEFT JOIN contacts ON users.contact = contacts.id
						WHERE DATE(logs.log_datetime) = CURDATE()";
					$rst = $dbc->Query($sql);
					while($log = $dbc->Fetch($rst)){
						$log_datetime = strtotime($log['log_datetime']);
						if($log['avatar']==""){
							$avatar = "libs/assets/images/users/no-image.jpg";
						}else{
							$avatar = $log['avatar'];
						}
						echo '<div class="timeline-item timeline-item-right">';
							echo '<div class="timeline-item-info">'.date("H:i",$log_datetime).'</div>';
							echo '<div class="timeline-item-icon"><span class="fa fa-info-circle"></span></div> ';
							echo '<div class="timeline-item-content">';
								echo '<div class="timeline-heading padding-bottom-0">';
									echo '<img src="'.$avatar.'"/> <a href="#">'.$log['username'].'</a> '.$log['log_location'];
								echo '</div>';
								echo '<div class="timeline-body">';
								echo '<i>';
									echo '</a>'.$log['log_action'].' : '.$log['log_value'];
									echo '<pre>';
										var_dump(json_decode($log['log_data'],true));
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
					$sql = "
						SELECT 
							logs.log_datetime as log_datetime,
							logs.log_location as log_location,
							logs.log_action as log_action,
							logs.log_value as log_value,
							logs.log_data as log_data,
							users.name as username,
							contacts.avatar as avatar
						FROM logs
						LEFT JOIN users ON logs.log_user = users.id
						LEFT JOIN contacts ON users.contact = contacts.id
						WHERE DATE(logs.log_datetime) < CURDATE()";
					$rst = $dbc->Query($sql);
					while($log = $dbc->Fetch($rst)){
						$log_datetime = strtotime($log['log_datetime']);
						if($log['avatar']==""){
							$avatar = "libs/assets/images/users/no-image.jpg";
						}else{
							$avatar = $log['avatar'];
						}
						echo '<div class="timeline-item timeline-item-right">';
							echo '<div class="timeline-item-info">'.date("H:i",$log_datetime).'</div>';
							echo '<div class="timeline-item-icon"><span class="fa fa-info-circle"></span></div> ';
							echo '<div class="timeline-item-content">';
								echo '<div class="timeline-heading padding-bottom-0">';
									echo '<img src="'.$avatar.'"/> <a href="#">'.$log['username'].'</a> '.$log['log_location'];
								echo '</div>';
								echo '<div class="timeline-body">';
								echo '<i>';
									echo '</a>'.$log['log_action'].' : '.$log['log_value'];
									echo '<pre>';
										var_dump(json_decode($log['log_data'],true));
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
	    </div>
	</div>
</div>