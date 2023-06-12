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
	//echo '----------'.$_REQUEST['idrate'];
	?>
    <table id="tblSlide_rate" style="width:100%" class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>#</th>
                <th>Title</th>
                <th>Name</th>
                <th>Message</th>
                <th>Rate</th>
                <th>Date</th>
                <th>action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $photo = $dbc->Query("select * from rating where property=".$_REQUEST['idrate']);
            while($line = $dbc->Fetch($photo))
            {
                echo '<tr>';
                    echo '<td><button class="btn btn-danger" onclick="fn.app.properties.properties.remove_rate('.$line['id'].',this)"><i class="fa fa-minus" aria-hidden="true"></i></button></td>';
                    echo '<td>'.$line['title'].'</td>';
					echo '<td>'.$line['name'].'</td>';
                    echo '<td>'.base64_decode($line['text'],true).'</td>';
                    echo '<td>'.$line['rate'].'</td>';
                    echo '<td width="100">'.$dbc->date_type($line['days']).'</td>';
					echo '<td><button class="btn btn-warning" onclick="fn.app.properties.properties.edit_detail_rate('.$line['id'].',this)"><i class="fa fa-pencil" aria-hidden="true"></i></button></td>';
                echo '</tr>';
            }
            ?>
            
        </tbody>
    </table>
    <?php
	/*$photo = $dbc->Query("select * from rating where property=".$_REQUEST['id']);
	while($line = $dbc->Fetch($photo))
	{
		echo '<tr>';
			echo '<td><button class="btn btn-danger" onclick="fn.app.properties.properties.remove_rate('.$line['id'].')"><i class="fa fa-minus" aria-hidden="true"></i></button></td>';
			echo '<td>'.$line['name'].'</td>';
			echo '<td>'.base64_decode($line['text'],true).'</td>';
			echo '<td>'.$line['rate'].'</td>';
			echo '<td>'.$line['created'].'</td>';
		echo '</tr>';
	}
	
	$dbc->Close();*/
?>