<style>
.favorite
{
	position: fixed;
    bottom: 0;
    background: #eeeeee;
    right: 0;
    padding: 11px 10px 10px 10px;
    margin-bottom: 180px;
    font-size: 18px;
    border-top-left-radius: 5px;
    border-bottom-left-radius: 5px;
    height: 40px;
    cursor: pointer;
    color: #ff0047;
    transition: all 0.3s;
    box-shadow: 0px 0px 3px #00000075;
	margin-right: -1px;
}
.favorite:hover
{
	background:#ff0047;
	color:#ffffff;
}
.boc_favorite
{
	position:fixed;
	top:50%;
	left:50%;
	background:rgba(210, 210, 210, 0.8);
	padding:30px;
	text-align:center;
	border-radius:5px;
	width:200px;
	transform:translateX(-50%) translateY(-50%);
	z-index:1010;
	display:none;
}
.icon_fav
{
	font-size:100px;
	color:#fb376e;
	margin-bottom:15px;

}
.but_favorite
{
	background:#ff000000;
	border:1px solid #fb376e;
	border-radius:5px;
	width:100%;
	color:#fb376e;
	font-size:18px;
	transition:all 0.3s;
}
.but_favorite:hover
{
	background:#fb376e;
	border:1px solid #fb376e;
	color:#ffffff;
}
.bgfav
{
	position:fixed;
	left:0;
	top:0;
	bottom:0;
	right:0;
	background:#cecece00;
	z-index:99;
	display:none;
}
</style>
<div class="favorite" onClick="open_pop_fav(this);">
	<?php //echo $_SESSION['favorite'].'<<<';
	//foreach($_SESSION['favorite'] as $sessidfav)
	$room_ids = $_REQUEST['id'];
    if(in_array($room_ids,$_SESSION['favorite']))
	{
		echo '<i class="fa fa-heart fav_icon" aria-hidden="true"></i>';
	}
	else
	{
		echo '<i class="fa fa-heart-o fav_icon" aria-hidden="true"></i>';
	}
	?>
	
</div>

<div class="bgfav"></div>
<div class="boc_favorite">
	<div class="icon_fav"><i class="fa fa-heart big_fav" aria-hidden="true"></i></div>
    <div class="fav_text"></div>
    <a href="/favorite"><button class="but_favorite">View</button></a>
</div>
<script>
$(document).ready(function(e) {
    $(".bgfav").click(function(e) {
        $(".bgfav,.boc_favorite").fadeOut(300);
    });
});
function open_pop_fav(me)
{
	$.ajax({
		url:"<?php echo $url_link;?>libs/action_chat/action-save-favorite.php",
		type:"POST",
		dataType:"json"	,
		data:{id:<?php echo $room_id;?>},
		success: function(res){
			if(res.status==true)
			{
				$('.fav_icon').removeClass('fa-heart-o');
				$('.fav_icon').addClass('fa-heart');
				$(".bgfav,.boc_favorite").fadeIn(300);
			}
			else
			{
				$('.big_fav').removeClass('fa-heart');
				$('.big_fav').addClass('fa-info');
				$(".bgfav,.boc_favorite").fadeIn(300);
				$(".fav_text").text(res.msg);
			}
		}
	});
}
</script>