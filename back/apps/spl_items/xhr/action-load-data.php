<?php
	session_start();
	include_once "../../../config/define.php";
	include_once "../../../libs/class/db.php";
	include_once "../../../libs/class/minerva.php";
	
	@ini_set('display_errors',DEBUG_MODE?1:0);
	date_default_timezone_set(DEFAULT_TIMEZONE);
	
	$dbc = new dbc;
	$dbc->Connect();
	$os = new minerva($dbc);
	
	
		$sql = $dbc->Query("select * from spl_category where status > 0 order by name asc");
		while($row = $dbc->Fetch($sql))
		{
			echo '<div class="col-sm-6">';
			echo '<div class="panel panel-success">';
					echo '<div class="panel-heading">'.$row['name'].'</div>';
					echo '<div class="panel-body">';

						echo '<table class="table table-striped table-bordered">';
							echo '<thead>';
								echo '<tr>';
									echo '<th>#</th>';
									echo '<th>Name</th>';
									echo '<th>Unit</th>';
									echo '<th>Price (THB)</th>';
									echo '<th width="100">Action</th>';
									echo '<th width="100">Status</th>';
								echo '</tr>';
							echo '</thead>';
							echo '<tbody>';
								
							$ii=0;
							$sql_2 = $dbc->Query("select * from spl_items where category = '".$row['id']."'");
							$total = $dbc->GetCount("spl_items","category = '".$row['id']."'");
							if($total>0)
							{

								
								while($line = $dbc->Fetch($sql_2))
								{
									$ii++;
									//echo '- '.$line['name'].'<br>';
									echo '<tr>';
										echo '<td>'.$ii.'</td>';
										echo '<td>'.$line['name'].'</td>';
										echo '<td>'.$line['unit'].'/'.$line['unit_type'].'</td>';
										echo '<td class="text-right">'.$line['price'].'</td>';
										echo '<td>
										<button class="btn btn-default btn-xs" onClick="fn.app.spl_items.spl_items.change('.$line['id'].');"><i class="fa fa-pencil" aria-hidden="true"></i></button> 
										<button class="btn btn-danger btn-xs" onClick="fn.app.spl_items.del('.$line['id'].');"><i class="fa fa-times" aria-hidden="true"></i></button>';
										echo '<td>';
										if($line['status']==0)
										{
											echo '<div class="switch">';
												echo '<input id="cmn-toggle-'.$line['id'].'" class="cmn-toggle cmn-toggle-round"  type="checkbox" onClick="fn.app.edit.change_status('.$line['id'].',this)">';
												echo '<label for="cmn-toggle-'.$line['id'].'"></label>';
											echo '</div>';
										}
										else
										{
											echo '<div class="switch">';
												echo '<input id="cmn-toggle-'.$line['id'].'" class="cmn-toggle cmn-toggle-round" checked type="checkbox" onClick="fn.app.edit.change_status('.$line['id'].',this)">';
												echo '<label for="cmn-toggle-'.$line['id'].'"></label>';
											echo '</div>';
										}
										
										echo '</td>';
									echo '</tr>';
								}
							}
							else
							{
								echo '<tr>';
									echo '<td class="text-center" colspan="6">No Data</td>';
								echo '</tr>';
							}
							echo '</tbody>';
						echo '</table>';

					echo '</div>';
				echo '</div>';
			echo '</div>';
			
		}
		

		
	
	$dbc->Close();
?>