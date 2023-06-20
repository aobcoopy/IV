<style>
.box_chat
{
	    position: fixed;
    bottom: 0;
    right: 0;
    margin-right: -53px;
    background: #f05b46;
    width: 90px;
    height: 40px;
    margin-bottom: 130px;
    padding: 10px;
    font-size: 20px;
    border-top-left-radius: 5px;
    border-bottom-left-radius: 5px;
    cursor: pointer;
    transition: all 0.3s;
    /* border: 1px solid red; */
    box-shadow: 0px 0px 3px #000;
    color: #fff;
}
.box_chat:hover
{
	/*transform:scale(1.3);*/
	margin-right: 0px;
}
@media screen and (max-width:768px)
{
	.box_message
	{
		position:fixed;
		right:0;
		top:0;
		bottom:0;
		width:100%;
		background:#e6e6e6;
		z-index:1000;
		padding:10px;
		box-shadow:0px 0px 15px #000;
		display:none;
		margin-right:0px;
	}
	.bcw
	{
		display:none;
	}
	.in_box_chat
	{
		position:absolute;
		bottom:0;
		width:100%;
		padding-right: 20px;
   		margin-bottom: 10px;
	}
}
@media screen and (min-width:768px)
{
	.box_message
	{
		position:fixed;
		right:0;
		top:0;
		bottom:0;
		width:400px;
		background:#e6e6e6;
		z-index:1000;
		padding:10px;
		box-shadow:0px 0px 10px #111;
		margin-right:-410px;
	}
	.bcm
	{
		display:none;
	}
	.in_box_chat
	{
		position:absolute;
		bottom:0;
		width:380px;
		margin-bottom: 10px;
	}
}
.box_message
{
	/*display:none;*/
}
.tx 
{
	margin-top:15px;
	width: 100%;
    padding: 6px;
	border:none;
}
.cicon
{
	text-align:center;
	font-size:50px;
}
.c_title
{
	font-size:20px;
	text-align:center;
}
.in_box_message
{
	background:#ffffff00;
	margin-top:15px;
	padding-right: 5px;
}
.in_title
{
	background:#ff000000;
	margin-top:15px;
	font-weight:bold;
	width: 100%;
}
.in_message
{
	background:white;
	padding:5px;
	width: auto;
    display: inline-block;
    /*min-width: 160px;*/
}
.in_right
{
	text-align:right;
	float: right;
}
.in_user
{
	background:#b3cdef !important;
}
.list-group {
    padding-left: 0;
    margin-bottom: 0px;
}
.in_box_message
{
	overflow-y:auto;
	height:65%;
	display:none;
}
.bt_mclose
{
	font-size:25px;
	cursor:pointer;
	width: 80px;
}
.bt_chat
{
	width:100%;
	margin-top:15px;
	padding:8px;
	background:#f05b46;
	border:none;
	color:#fff;
	transition:all 0.3s;
}
.bt_chat:hover
{
	background:#112845;
}

.bt_minimize
{
	font-size:25px;
	position:absolute;
	right:0;
	top:0;
	margin-top:10px;
	margin-right:10px;
	cursor:pointer;
	background:#ff000000;
	padding:0px 0px 5px 25px;
	z-index:1000;
}
.wid100
{
	width:100% !important;
	float: left;
}
.in_date
{
	font-size:12px;
	color:#9e9e9e;
}
.noti
{
	width:auto;
	background:#e22f2f;
	font-size:15px;
	color:#fff;
	text-align:center;
	cursor:pointer;
}
.notimini
{
	margin-right:80px !important;
	margin-top:8px;
	position:absolute;
	top:0;
	right:0;
	padding:0px 5px;
	border-radius:300px;
	animation-name: scales;
    animation-duration: 0.5s;
    transform:scale(1);
    animation-iteration-count: infinite;
    background:red !important;
}
@keyframes scales {
	0%   {transform:scale(1);background:red;}
	50% {transform:scale(1.2);background:#112845;}
	100% {transform:scale(1);background:red;}
}
.read_sta
{
	color:#00bd00;
	background:#ff000000;
	font-size:10px;
	margin-left: 5px;
}
</style>

<div class="box_chat bcm" onClick="open_chat_m();">
	<i class="fa fa-comments" aria-hidden="true"></i> Chat <div class="noti notimini"></div>
</div>
<div class="box_chat bcw" onClick="open_chat();">
	<i class="fa fa-comments" aria-hidden="true"></i> Chat <div class="noti notimini"></div>
</div>

<div class="box_message">
	<input type="hidden" id="tx_sess_name" name="tx_sess_name" class="tx" value="<?php echo isset($_SESSION['chat']['name'])?$_SESSION['chat']['name']:'';?>">
    <input type="hidden" id="tx_sess_email" name="tx_sess_email" class="tx" value="<?php echo isset($_SESSION['chat']['email'])?$_SESSION['chat']['email']:'';?>">
	<div class="bt_mclose bcw" onClick="close_chat();"><i class="fa fa-times" aria-hidden="true"></i></div>
    <div class="bt_mclose bcm" onClick="close_chat_m();"><i class="fa fa-times" aria-hidden="true"></i></div>
    
    <div class="bt_minimize bcw" onClick="minimize();"><i class="fa fa-compress" aria-hidden="true"></i></div>
    <div class="bt_minimize bcm" onClick="minimize_m();"><i class="fa fa-compress" aria-hidden="true"></i></div>
    <?php //echo '>>>'.$_SESSION['chat']['name'];?>
	<div class="cicon"><i class="fa fa-comments" aria-hidden="true"></i></div>
	<div class="c_title">Chat message</div>
    <div class="formchat">
	<form id="chat">
    	<input type="text" id="tx_c_name" name="tx_c_name" class="tx" placeholder="Name*">
        <input type="text" id="tx_c_email" name="tx_c_email" class="tx" placeholder="E-mail*" onKeyUp="lower_text_c(this)">
        <button class="bt_chat" type="button" onClick="start_chat();">Start Chat</button>
    </form>
    
    
    </div>
    <div class="in_box_message">
    	<div class="in_title in_left">IV Team</div>
        <div class="in_message in_left">
        	<ul class="list-group">          
				<?php
                $c_sql = $dbc->Query("select * from messages where status > 0 order by message asc");
                while($c_text = $dbc->Fetch($c_sql))
                {
					$mid = $c_text['id'];
                    echo '<button type="button" class="list-group-item" onClick="load_text('.$mid.');">'.$c_text['message'].'</button>';
                }
                ?>
        	</ul>
        </div>
        
        <div class="his_chat"></div>
        
        <div class="in_box_chat">
        	<div class="noti"></div>
            <input type="hidden" id="tx_mess" name="tx_mess" class="tx" placeholder="Message">
        	<form id="chat_message">
            	<input type="hidden" id="txIDRoom" name="txIDRoom" value="<?php echo $_SESSION['chat']['room'];?>">
                <textarea id="tx_text" name="tx_text" class="tx" placeholder="Message"></textarea>
                <button class="bt_chat" type="button" onClick="send_chat();">Send <i class="fa fa-paper-plane" aria-hidden="true"></i></button>
            </form>
        </div>
        
    </div>
</div>



<!-- START PRELOADS -->
<audio id="audio-alert" src="libs/audio/alert.mp3" preload="auto"></audio>
<audio id="audio-fail" src="libs/audio/fail.mp3" preload="auto"></audio>
<!-- END PRELOADS -->	
        
        
<script>
var sess_name = '<?php echo isset($_SESSION['chat']['name'])?$_SESSION['chat']['name']:'';?>';
var sess_email = '<?php echo isset($_SESSION['chat']['email'])?$_SESSION['chat']['email']:'';?>';
var chk_mess;
$(document).ready(function(){
    $(window).resize(function(){
        if($(window).width()<760)
		{
			$(".box_message").hide();
			$(".box_message").css({"margin-right":"0px"});
		}
		else
		{
			$(".box_message").show();
			$(".box_message").css({"margin-right":"-410px"});
		}
    });
	
	if(sess_name!='' && sess_email!='')
	{
		$(".formchat").hide();
		$(".in_box_message").show(300);
		chk_mess = setInterval(function(){check_mesage();},5000);
	}
	else
	{
		$(".formchat").show();
		$(".in_box_message").hide();
	}
	
	$("#tx_text").keypress(function(event) {
		if (event.which == 13) {
			event.preventDefault();
			send_chat_enter();
			$("#tx_text").val('');
			$("#tx_text").focus();
			}
    });
	
	$("#tx_text").keydown(function(e) {
        //load_chat_history($("#txIDRoom").val());
    });
	
	
		
	$("#tx_text").click(function(e) {
		load_chat_history($("#txIDRoom").val());
		read_chat($("#txIDRoom").val());
		$('.in_box_message').animate({scrollTop: +50000}, 100);
		//setInterval(function(){
//			load_chat_history($("#txIDRoom").val());
//			$('.in_box_message').animate({scrollTop: +50000}, 100);
//		},5000);
        
    });
	
	$(".noti").click(function(e) {
        $("#tx_text").focus();
    });
	
	
});

//chk_mess = setInterval(function(){check_mesage();},5000);
	
	/*setInterval(function(){
		clearTimeout(chk_mess);
	},5500);*/
	
	
function lower_text_c(str)
{
	var text = $(str).val();
	var res = text.toLowerCase();
	$(str).val(res);
}

function line_noti(mess)
{
	$.ajax({
		url:"<?php echo $url_link;?>libs/action_chat/action-line-noti.php",
		type:"POST",
		dataType:"json",
		data:{
			name:$("#tx_sess_name").val(),
			email:$("#tx_sess_email").val(),
			mess:$("#tx_mess").val(),
			room:$("#txIDRoom").val(),
		},
		success: function(respo){
			
		}
	});
}

function check_read(mess)
{
	setTimeout(function(){
		$.ajax({
			url:"<?php echo $url_link;?>libs/action_chat/action-read.php",
			type:"POST",
			dataType:"json",
			data:{
				name:$("#tx_sess_name").val(),
				email:$("#tx_sess_email").val(),
				mess:$("#tx_mess").val(),
				room:$("#txIDRoom").val(),
			},
			success: function(respo){
				if(respo==true)
				{
					line_noti();
				}
				else
				{
				}
			}
		});
	},5000);
}

function send_chat()
{
	if($("#tx_text").val()=='')
	{
		alert("Please fill your text");
		$("#tx_text").focus();
		return false;
	}
	else
	{
		$("#tx_mess").val($("#tx_text").val());
		$.ajax({
			url:"<?php echo $url_link;?>libs/action_chat/action-send-chat.php",
			type:"POST",
			dataType:"json",
			data:$("#chat_message").serialize(),
			success: function(respo){
				if(respo.status==true)
				{
					
					check_read();
					$("#tx_text").val('');
					load_chat_history($("#txIDRoom").val());
					$('.in_box_message').animate({scrollTop: +50000}, 100);
					check_mesage();
					
				}
				else
				{
				}
			}
		});
	}
}
function read_chat()
{
	$.ajax({
			url:"<?php echo $url_link;?>libs/action_chat/action-view-chat.php",
			type:"POST",
			dataType:"json",
			data:$("#chat_message").serialize(),
			success: function(respo){
				if(respo.status==true)
				{
					$("#tx_text").val('');
					load_chat_history($("#txIDRoom").val());
					$('.in_box_message').animate({scrollTop: +50000}, 100);
					check_mesage();
				}
				else
				{
				}
			}
		});
}

function send_chat_enter()
{
	$("#tx_mess").val($("#tx_text").val());
		$.ajax({
			url:"<?php echo $url_link;?>libs/action_chat/action-send-chat.php",
			type:"POST",
			dataType:"json",
			data:$("#chat_message").serialize(),
			success: function(respo){
				if(respo.status==true)
				{
					
					check_read();//$("#tx_text").val()
					$("#tx_text").val('');
					load_chat_history($("#txIDRoom").val());
					$('.in_box_message').animate({scrollTop: +50000}, 100);
					check_mesage();
					
				}
				else
				{
				}
			}
		});
	
}

function playAudio(file){
    if(file === 'alert')
        document.getElementById('audio-alert').play();

    if(file === 'fail')
        document.getElementById('audio-fail').play();    
}

function check_mesage()
{
	$.ajax({
		url:"<?php echo $url_link;?>libs/action_chat/action-count-message.php",
		type:"POST",
		dataType:"json",
		data:{id:$("#txIDRoom").val()},
		success: function(respo){
			if(respo.msg)
			{
				$(".noti").html(respo.msg);
				$(".noti").show();
				playAudio('alert');
			}
			else
			{
				$(".noti").hide(respo.msg);
			}
			
		}
	});
}

function load_chat_history(id)
{
	var ms ='';
	$(".his_chat").children().remove();
	$.ajax({
		url:"<?php echo $url_link;?>libs/action_chat/action-load-history-message.php",
		type:"POST",
		dataType:"json",
		data:{id:id},
		success: function(respo){
			//console.log(respo);
			for (i in respo)
			{
				if(respo[i]['user']!='0')
				{
					
					ms += '<div class="wid100">';
						ms += '<div class="in_title in_left wid100">'+respo[i]['name']+'</div>';
						ms += '<div class="in_message in_left ">'+respo[i]['text']+'</div>';
						ms += '<div class="in_date in_left wid100">'+respo[i]['date'];
						if(respo[i]['status']==1)
						{
							//ms += '<span class="read_sta"><i class="fa fa-check" aria-hidden="true"></i></span></div>';
							ms += '</div>';
						}
						else
						{
							ms += '</div>';
						}
						
					ms += '</div>';
				}
				else
				{
					ms += '<div class="wid100">';
						ms += '<div class="in_title in_right wid100">'+respo[i]['name']+'</div>';
						ms += '<div class="in_message in_right in_user">'+respo[i]['text']+'</div>';
						ms += '<div class="in_date in_right wid100">'+respo[i]['date'];
						if(respo[i]['status']==1)
						{
							ms += '<span class="read_sta"><i class="fa fa-check" aria-hidden="true"></i></span></div>';
						}
						else
						{
							ms += '</div>';
						}
						
					ms += '</div>';
				}
				
			}
			
			$(".his_chat").append(ms);
		}
	});
}

function start_chat()
{
	if($("#tx_c_name").val()=='')
	{
		alert("Please fill your name");
		$("#tx_c_name").focus();
		return false;
	}
	else if($("#tx_c_email").val()=='')
	{
		alert("Please fill your email");
		$("#tx_c_email").focus();
		return false;
	}
	else
	{
		$.ajax({
			url:"<?php echo $url_link;?>libs/action_chat/action-start-chat.php",
			type:"POST",
			dataType:"json",
			data:$("#chat").serialize(),
			success: function(respo){
				if(respo.status==true)
				{
					$(".formchat").hide();
					$(".in_box_message").show(300);
					$("#txIDRoom").val(respo.idroom);
					load_chat_history(respo.idroom);
					$('.in_box_message').animate({scrollTop: +50000}, 100);
					$("#tx_sess_name").val(respo.s_name);
					$("#tx_sess_email").val(respo.s_email);
					chk_mess = setInterval(function(){check_mesage();},5000);
				}
				else
				{
				}
			}
		});
	}
}

function delete_session()
{
	$.ajax({
			url:"<?php echo $url_link;?>libs/action_chat/action-stop-chat.php",
			type:"POST",
			dataType:"json",
			data:{name:$("#tx_sess_name").val(),email:$("#tx_sess_email").val()},
			success: function(respo){
				if(respo.status==true)
				{
					$(".formchat").show();
					$(".in_box_message").hide();
					clearTimeout(chk_mess);
				}
				else
				{
				}
			}
		});
}

function open_chat()
{
	$(".box_message").animate({marginRight:"0px"},300);
	load_chat_history($("#txIDRoom").val());
	$('.in_box_message').animate({scrollTop: +50000}, 100);
}
function close_chat()
{
	$(".box_message").animate({marginRight:"-410px"},300);
	delete_session();
	clearInterval(chk_mess);
}
function minimize()
{
	$(".box_message").animate({marginRight:"-410px"},300);
}

function open_chat_m()
{
	$(".box_message").fadeIn(300);	
	load_chat_history($("#txIDRoom").val());
	$('.in_box_message').animate({scrollTop: +50000}, 100);
}
function close_chat_m()
{
	$(".box_message").fadeOut(300);
	delete_session();
	clearInterval(chk_mess);
}
function minimize_m()
{
	$(".box_message").fadeOut(300);
}

function load_text(id)
{
	//alert(id);
	var ms ='';
	$.ajax({
		url:"<?php echo $url_link;?>libs/action_chat/action-load-auto-message.php",
		type:"POST",
		dataType:"json",
		data:{id:id},
		success: function(respo){
			ms += '<div class="wid100">';
				ms += '<div class="in_title in_left wid100">IV Team</div>';
				ms += '<div class="in_message in_left">';
				ms += '<b>Q : '+respo.question+'</b>';
				ms += '<br/>';
				ms += 'A : '+respo.msg;
				ms += '</div>';
			ms += '</div>';
			$(".in_box_message").append(ms);
			//load_chat_history($("#txIDRoom").val());
			$('.in_box_message').animate({scrollTop: +50000}, 100);
			/*if(respo.status==true)
			{
				ms += '<div class="in_title in_left">Aob</div>';
        		ms += '<div class="in_message in_left">'+respo.msg+'</div>';
			}
			else
			{
				ms+='noooooooooooo';
			}*/
			
		}
	});
	
}
</script>