<!--<script type="text/javascript" src="apps/chat_group/app.js"></script>-->
<style>
.inbody
{
  height:500px;
  overflow-y:auto;
}

.cover_chat {
    background: #f1f1f1;
    width: auto;
    display: inline-block;
    padding: 10px 10px 0px 10px;
    margin-top: 8px;
    margin-bottom: 8px;
    border-radius: 0px;
}
.cover_chat_ad
{
    background: #ffe0e3;
    color: #ad0202;
    width: auto;
    display: inline-block;
    padding: 10px 10px 0px 10px;
    margin-top: 8px;
    margin-bottom: 8px;
}
.text-right2 {
    text-align: right;
    display: inline-block;
    width: 100%;
}
.read_sta
{
	color:#00bd00;
	background:#ff000000;
	font-size:10px;
	margin-left: 5px;
}
@media screen and (max-width:992px)
{
	.list-group
	{
		height: 140px;
		overflow-y: auto;
	}
}
@media screen and (min-width:992px)
{
	.list-group
	{
		height: 600px;
		overflow-y: auto;
	}
}
</style>
<?php $room = $_REQUEST['room'];?>
<div class="page-content-wrap page-tabs-item active">
    <div class="row">	<br><br>
    	<div class="col-md-12">
        	<div class="col-md-4">
                <div class="list-group">
                <?php 
				
				?>
                </div>
            </div>
            <div class="col-md-8">
            
            	<div class="c_detail"></div>
                
                
                
            </div>
        </div>
    </div>  
</div>

<!-- START PRELOADS -->
<audio id="audio-alert" src="../../../libs/audio/alert.mp3" preload="auto"></audio>
<audio id="audio-fail" src="../../../../libs/audio/fail.mp3" preload="auto"></audio>
<!-- END PRELOADS -->	
        
<script>
var rid = '<?php echo ($room!='')?$room:'';?>';
$(document).ready(function(e) {
   $( '.list-group li' ).click(function(e) {
	   $( '.list-group li' ).removeClass('act');
		$(this).addClass('act');
	});
	

	$.ajax({
			url:"apps/online_chat/xhr/action-load-room.php",
			type:"POST",
			dataType:"html",
			//data:{id:id},
			success: function(res){
				$(".list-group").html(res);
			}
		});
		
	setInterval(function(){
		$.ajax({
			url:"apps/online_chat/xhr/action-load-room.php",
			type:"POST",
			dataType:"html",
			//data:{id:id},
			success: function(res){
				$(".list-group").html(res);
			}
		});
		check_chat();
	},5000);
	
	if(rid!='')
	{
		$.ajax({
			url:"apps/online_chat/xhr/action-load-chat.php",
			type:"POST",
			dataType:"html",
			data:{id:rid},
			success: function(res){
				$(".c_detail").html(res);
				$('.show_name').animate({scrollTop: +5000}, 100);
			}
		});
	}
	
});

function playAudio2(file){
    if(file === 'alert')
        document.getElementById('audio-alert').play();

    if(file === 'fail')
        document.getElementById('audio-fail').play();    
}

function check_chat()
{
	$.ajax({
		url:"apps/online_chat/xhr/action-check-chat.php",
		type:"POST",
		dataType:"html",
		//data:{id:id},
		success: function(res){
			if(res>0)
			{
				//playAudio('alert');
			}
		}
	});
}

function load_chat(id)
{
	$.ajax({
		url:"apps/online_chat/xhr/action-load-chat.php",
		type:"POST",
		dataType:"html",
		data:{id:id},
		success: function(res){
			$(".c_detail").html(res);
			$('.show_name').animate({scrollTop: +5000}, 100);
		}
	});
}
</script>