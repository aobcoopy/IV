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
	
	$udata = array(
		'#status' => 1
	);
	$dbc->Update("chat_history",$udata,"room = '".$_REQUEST['id']."'");
	
	$dt_admin= $dbc->GetRecord("users","*","id=".$_SESSION['auth']['user_id']);
	$dt_user= $dbc->GetRecord("chat_rooms","*","id=".$_REQUEST['id']);
	?>
    
    <div class="panel panel-info">
        <div class="panel-heading">Chat from <button class="btn btn-info"><?php echo $dt_user['name'];?></button>	</div>
        <div class="panel-body">
            <div class="inbody">
            
                <div class="detail">
					<?php
                    $sql = $dbc->Query("select * from chat_history where room = '".$_REQUEST['id']."'");
                    while($row = $dbc->Fetch($sql))
                    {
                        $user = $dbc->GetRecord("users","*","id=".$_SESSION['auth']['user_id']);
                        //@$time = date("H:i:s",$row['created']);
						
						$today = date("Y-m-d");
						$da = substr($row['created'],0,10);
						if($da==$today)
						{
							$date = dateToday($row['created']);
						}
						else
						{
							$date = dateType($row['created']);
						}
						
						
										
                        echo '<div class="col-md-12">';
                        if($row['user']=='')
                        {
							echo "<div class=\"cover_chat\">";
                                echo "<p><strong>".$row['name']."</strong> : ".$row['message']."</p>";
                                
                            echo "</div>";
							echo "<p>".$date."</p>";
                            /*echo "<div class=\"cover_chat_ad text-right pull-right\">";
                                echo "<p>".$row['message']."<strong> : IV Team - ".$row['name']."</strong></p>";
                               // echo "<p>".$row['message']."</p> ";
                            echo "</div>";*/
                        }
                        else
                        {
							$readsta = ($row['status']==1)?"<span class=\"read_sta\"><i class=\"fa fa-check\" aria-hidden=\"true\"></i></span>":"";
							
							echo "<div class=\"cover_chat_ad text-right pull-right\">";
                                echo "<p>".$row['message']."<strong> : ".$row['name']."</strong></p>";
                               // echo "<p>".$row['message']."</p> ";
                            echo "</div>";
							
							echo "<p class=\"text-right2 text-right \">".$date."  ".$readsta."</p>";
							
                            /*echo "<div class=\"cover_chat\">";
                                echo "<p><strong>ผู้ใช้งาน</strong> : ".$row['message']."</p>";
                               // echo "<p>".$row['message']."</p>";
                            echo "</div>";*/
                        }
                        echo '</div>';
                    }
                    ?>
                </div>
                
            </div>
            
        </div>
        <div class="panel-footer">
        	<form id="my_chat">
                <input type="hidden" name="txroom" value="<?php echo $_REQUEST['id'];?>">
                <input type="hidden" name="tx_adname" value="<?php echo $dt_admin['name'];?>">
                <textarea name="tx_chat" id="tx_chat" cols="30" rows="3" style="width:100%" placeholder="Message"></textarea>
                <button type="button" id="btn_sent" class="btn-sent hidden" onClick="sent_text()">ส่ง</button>
            </form>
        </div>
    </div>
    

<script>
$(document).ready(function(e) {
	$('.detail,.inbody').animate({scrollTop: +50000}, 100);
    $("#tx_chat").keypress(function(event) {
		if (event.which == 13) {
			event.preventDefault();
			$('#btn_sent').focus().click();
			$("#tx_chat").val('');
			$('.detail,.inbody').animate({scrollTop: +50000}, 100);
		}
	});
	/*setInterval(function(){
		$.ajax({
				url:"apps/online_chat/xhr/action-load-chat-his.php",
				type:"POST",
				dataType:"html",
				data:{id:<?php echo $_REQUEST['id'];?>},
				success: function(res){
					$(".detail").html(res);
					$('.detail,.inbody').animate({scrollTop: +5000000}, 100);
					
				}
			});
	},2000);*/
	
	$("#tx_chat").keydown(function(e) {
        $.ajax({
				url:"apps/online_chat/xhr/action-load-chat-his.php",
				type:"POST",
				dataType:"html",
				data:{id:<?php echo $_REQUEST['id'];?>},
				success: function(res){
					$(".detail").html(res);
					$('.detail,.inbody').animate({scrollTop: +5000000}, 100);
					
				}
			});
    });
	
	$("#tx_chat").click(function(e) {
		$.ajax({
			url:"apps/online_chat/xhr/action-read-chat.php",
			type:"POST",
			dataType:"html",
			data:$("#my_chat").serialize(),
			success: function(res){
				$.ajax({
					url:"apps/online_chat/xhr/action-load-chat-his.php",
					type:"POST",
					dataType:"html",
					data:{id:<?php echo $_REQUEST['id'];?>},
					success: function(res){
						$(".detail").html(res);
						$('.detail,.inbody').animate({scrollTop: +50000}, 100);
						$("#tx_chat").focus();
					}
				});
			}
		});
	});
});

function sent_text()
{
	$.ajax({
		url:"apps/online_chat/xhr/action-save-chat.php",
		type:"POST",
		dataType:"html",
		data:$("#my_chat").serialize(),
		success: function(res){
			$.ajax({
				url:"apps/online_chat/xhr/action-load-chat-his.php",
				type:"POST",
				dataType:"html",
				data:{id:<?php echo $_REQUEST['id'];?>},
				success: function(res){
					$(".detail").html(res);
					$('.detail,.inbody').animate({scrollTop: +50000}, 100);
					$("#tx_chat").focus();
				}
			});
		}
	});
	
}
</script>
<?php 
function dateToday($data)
{
	$y = substr($data,0,4);
	$m = substr($data,5,2);
	$d = substr($data,8,2);
	$time = substr($data,10,10);
	switch($m)
	{
		case'01':  $month = 'Jan';break;
		case'02':  $month = 'Feb';break;
		case'03':  $month = 'Mar';break;
		case'04':  $month = 'Apr';break;
		case'05':  $month = 'May';break;
		case'06':  $month = 'Jun';break;
		case'07':  $month = 'Jul';break;
		case'08':  $month = 'Aug';break;
		case'09':  $month = 'Sep';break;
		case'10':  $month = 'Oct';break;
		case'11':  $month = 'Nov';break;
		case'12':  $month = 'Dec';break;
	}
	return  'Today '.$time;
}
function dateType($data)
{
	$y = substr($data,0,4);
	$m = substr($data,5,2);
	$d = substr($data,8,2);
	$time = substr($data,10,10);
	switch($m)
	{
		case'01':  $month = 'Jan';break;
		case'02':  $month = 'Feb';break;
		case'03':  $month = 'Mar';break;
		case'04':  $month = 'Apr';break;
		case'05':  $month = 'May';break;
		case'06':  $month = 'Jun';break;
		case'07':  $month = 'Jul';break;
		case'08':  $month = 'Aug';break;
		case'09':  $month = 'Sep';break;
		case'10':  $month = 'Oct';break;
		case'11':  $month = 'Nov';break;
		case'12':  $month = 'Dec';break;
	}
	return  $d.' '.$month .' '.$y.' -'.$time;
}
?>