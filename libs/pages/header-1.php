<?php 
//unset($_SESSION['recent']);
if(isset($_SESSION['recent'])){}
else
{
	$_SESSION['recent'] = array();
}
?>

<div class="preloader"></div>
    <header class="header transp stickys  sticky-on"> <!-- available class for header: .sticky .center-content .transp -->
        <nav class="navbar navbar-inverse">
            <div class="container">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="/"><img id="_logo6" itemprop="logo"  src="<?php echo $url_link;?>libs/images/logo.png" class="imglogo" height="150" alt="Inspiring Villas logo"></a>
                </div>
                <!-- Collect the nav links, forms, and other content for toggling -->
                <style>
/*.dropbtn {
    background-color: #4CAF50;
    color: white;
    padding: 16px;
    font-size: 16px;
    border: none;
    cursor: pointer;
}*/

/*.dropdown {
    position: relative;
    display: inline-block;
}*/

.dropdown-content {
    display: none;
    position: absolute;
    background-color:none;/* #f9f9f9*/
    min-width: 200px !important;
    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
    z-index: 1;
}

.dropdown-content a {
    color: black;
    padding: 12px 16px;
    text-decoration: none;
    display: block;
}

.dropdown-content a:hover {background-color: #D3A267; color:#fff}

.dropdown:hover .dropdown-content {
    display: block;
}

.dropdown:hover .dropbtn {
    background-color: #3e8e41;
}
</style>
<?php $pa = $_REQUEST['page'];?>
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav navbar-right">
                        <!--<li class="<?php echo($pa=='home')?'active':'';?>"><a href="?page=home">Home</a></li>-->
  <!--                      <li>Vill
                        	<div class="dropdown">
  <button class="dropbtn">Dropdown</button>
  <div class="dropdown-content">
    <a href="#">Link 1</a>
    <a href="#">Link 2</a>
    <a href="#">Link 3</a>
  </div>
</div>-->

                        </li>
                        <!--<div class="dropdown">-->
                        <!--<li class="<?php echo($pa=='villas')?'active':'';?> "><a href="/collections">Villa Collections</a>-->
                        <?php /*?><div class="dropdown-content pull-left">dropbtn dropdown
                        <?php 
						$sql_cate_f = $dbc->Query("select * from categories where status > 0 order by sort asc");
						while($r_cate_f = $dbc->Fetch($sql_cate_f))
						{
							echo '<a href="?page=forrent&cate='.$r_cate_f['id'].'" class="text-left" >'.$r_cate_f['name'].' </a>';
						}
						?>
                           <!-- <a href="#">Link 1</a>
                            <a href="#">Link 2</a>
                            <a href="#">Link 3</a>-->
                        </div><?php */?>
                        </li>
                        <!--</div>-->
                        
                        <li class="<?php echo($pa=='service')?'active':'';?>"><a href="/our-service">Our Services</a></li> 
                        <li class="<?php echo($pa=='forrent')?'active':'';?>"><a href="/search-rent/thailand/all-beach/all-price/all-bedrooms/all-collections/all-sort.html">For Rent</a></li><!--/for-rent-->
                        <li class="<?php echo($pa=='blog')?'active':'';?>"><a href="/blog">Blog & Lifestyle</a></li>
                        <li class="<?php echo($pa=='faq')?'active':'';?>"><a href="/faq">FAQ</a></li>
                        <li class="<?php echo($pa=='contact')?'active':'';?>"><a href="/contact">Contact</a></li>
                    </ul>
                </div><!-- /.navbar-collapse -->
            </div><!-- /.container-fluid -->
        </nav>
    </header>
  <script>
//var page = '<?php echo $page;?>';
//var idp = '<?php echo $_REQUEST['id'];?>';
var urll = '<?php echo $_SERVER['REQUEST_URI'];?>';
$(document).ready(function(e) {
	//alert(urll);
    if(urll=='blog/top-10-phuket-luxury-villas.html' )
	{
		window.location = 'https://www.inspiringvillas.com/blog/the-10-best-phuket-luxury-villas.html';
	}
});
</script>  
<?php 

function dateType($data)
{
	$y = substr($data,0,4);
	$m = substr($data,5,2);
	$d = substr($data,8,2);
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
	return  $d.'  '.$month .', '.$y;
}
function day($data)
{
	$d = substr($data,8,2);
	return  $d;
}
function month($data)
{
	$m = substr($data,5,2);
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
	return  $month;
}

function string_len($text,$amount)
{
	if(strlen($text)>$amount)
	{
		return substr($text,0,$amount).'...';
	}
	else
	{
		return $text;
	}
}


function switchcase($val)
{
	switch($val)
	{
		case "2":
			return "Party Villa - Phuket, Koh Samui, Thailand";
		break;
		case "3":
			return "Family Villas - Phuket, Koh Samui, Thailand";
		break;
		case "4":
			return "Seaview Villas - Phuket, Koh Samui, Thailand";
		break;
		case "5":
			return "Large Group Villas - Phuket, Koh Samui, Thailand";
		break;
		case "6":
			return "Beachfront Villas - Phuket, Koh Samui, Thailand";
		break;
		case "8":
			return "Wedding Villas - Phuket, Koh Samui, Thailand";
		break;
		default:
	}
}

function switchcase_sort($val)
{
	switch($val)
	{
		case "2":
			return "Party Villa";
		break;
		case "3":
			return "Family Villas";
		break;
		case "4":
			return "Seaview Villas";
		break;
		case "5":
			return "Large Group Villas";
		break;
		case "6":
			return "Beachfront Villas";
		break;
		case "8":
			return "Wedding Villas";
		break;
		default:
	}
}

?>
<script>
var r=true;
function openinig()
{
	if($(window).width()>976)
	{
	}
	else
	{
		if(r==true)
		{
			$(".ccc").slideDown(400);
			$(".mg-book-now").animate({"height":"100%"},function(){
				//$(".mg-book-now").slideDown(300);
			});	
			$(".ffd").css({"transform":"rotate(180deg)"});
			r=false;
		}
		else
		{
			$(".ccc").slideUp(400);
			$(".mg-book-now").animate({"height":"90px"});
			$(".ffd").css({"transform":"rotate(0deg)"});	
			/*$(".mg-book-now").slideUp(300,function(){
				
			});*/
			r=true;
		}
	}
	/*$(".mg-book-now").animate({height:'100%'},500,function(){
		$(this).slideDown(300);	
	});*/
	
}

var pa = '<?php echo $_REQUEST['page'];?>';
//var
$(document).ready(function(e) {
	setTimeout(function(){
		if(pa=='forrent')
		{
			check_rooms_first('forn_search_rent');
			check_cate('forn_search_rent');
		}
		else
		{
			check_rooms_first('forn_search');
		}
	},800);
    
	
});

function check_rooms_first(forms)
{
	$(".cRooms").children('.cs-options').children('ul').children('li').each(function(index, element) {
		var str_1 = $(this).attr('data-value');
		var n_str_1 = str_1.split("|");
		$(this).addClass('roomlist');
		
		if(str_1=='all')
		{
		}
		else
		{
			$(this).addClass('r_list hidden');
		}
		
	});
											
	$.ajax({
		url:"<?php echo $url_link;?>libs/actions/check-room.php",
		type:"POST",
		dataType:"json",
		data:$("#"+forms).serialize(),
		success: function(res){
			//alert(res);
			//console.log(res);
			//res.sort();
			//console.log('');
			for(i in res)
			{
				//console.log(res[i]);
				$(".cRooms").children('.cs-options').children('ul').children('li').each(function(index, element) {
					var str_1R = $(this).attr('data-value');
					if(str_1R==res[i])
					{
						$(this).removeClass('hidden');
					}
				});
			}
		}
	});
}

function check_rooms(forms)
{
	$(".cRooms").removeClass('cs-selected');
	$(".cRooms").children('.cs-placeholder').text('');
	$(".cRooms").children('.cs-placeholder').html('All Bedrooms <label class="optin">Optional</label>');
	$("#cbbRoom").val('all');
	
	$(".cRooms").children('.cs-options').children('ul').children('li').each(function(index, element) {
		var str_1 = $(this).attr('data-value');
		var n_str_1 = str_1.split("|");
		$(this).addClass('roomlist');
		
		if(str_1=='all')
		{
		}
		else
		{
			$(this).addClass('r_list hidden');
		}
		
	});
											
	$.ajax({
		url:"<?php echo $url_link;?>libs/actions/check-room.php",
		type:"POST",
		dataType:"json",
		data:$("#"+forms).serialize(),
		success: function(res){
			//alert(res);
			//console.log(res);
			//res.sort();
			console.log('');
			for(i in res)
			{
				//console.log(res[i]);
				$(".cRooms").children('.cs-options').children('ul').children('li').each(function(index, element) {
					var str_1R = $(this).attr('data-value');
					if(str_1R==res[i])
					{
						$(this).removeClass('hidden');
					}
				});
			}
		}
	});
	
	//$("#bt_search").focus();
	//$("#cbbDestination").focus();
	
	
}

var catego = '<?php echo $_REQUEST['cate'];?>';
var tiigg = 0;
var tiigg_2 = 0;
function check_cate(forms,opts)
{
	if(opts=='des')
	{
		//alert(tiigg);
		if(tiigg==1)
		{
			tiigg=0;
		}
		else
		{
			tiigg=1;
			
			var sa='';
			
			$("#cbbCollection").children('.cca').remove();
			//$("#cbbCollection").children().remove();
			$.ajax({
				url:"<?php echo $url_link;?>libs/actions/check-collection.php",
				type:"POST",
				dataType:"json",
				data:$("#"+forms).serialize(),
				success: function(cat){
					////$("#cbbCollection").children().css({"display":"none"});
					//sa+='<option value="0">ALL Collections</option>';
					$("#cbbCollection").children('.cca').remove();
					for(i in cat)
					{
						////$("#cbbCollection").find('.0').css({"display":"block"});//.removeClass('hidden');
		////				$("#cbbCollection").find('.'+cat[i]).css({"display":"block"});//.removeClass('hidden');
						//s+='<option value="'+cat[i]+'">'+cat[i]+'</option>';
						if(catego==cat[i]['id'])
						{
							sa+='<option value="'+cat[i]['id']+'" selected class="'+cat[i]['id']+' cca">'+cat[i]['name']+'</option>';
						}
						else
						{
							sa+='<option value="'+cat[i]['id']+'" class="'+cat[i]['id']+' cca">'+cat[i]['name']+'</option>';
						}
						
					}
					$("#cbbCollection").append(sa);
					catego=0;
					/*if(catego!='0')
					{
						alert(1);
						$("#cbbCollection").children('.'+catego).focus();//.css({"background":"red"});
					}
					else
					{
						alert(0);
					}
					alert(catego);*/
					//console.log(cat);
				}
			});
		}
	}
	else
	{
		//alert(tiigg_2);
		if(tiigg_2==1)
		{
			tiigg_2=0;
		}
		else
		{
			tiigg_2=1;
			
			var sa='';
			
			$("#cbbCollection").children('.cca').remove();
			//$("#cbbCollection").children().remove();
			$.ajax({
				url:"<?php echo $url_link;?>libs/actions/check-collection.php",
				type:"POST",
				dataType:"json",
				data:$("#"+forms).serialize(),
				success: function(cat){
					////$("#cbbCollection").children().css({"display":"none"});
					//sa+='<option value="0">ALL Collections</option>';
					$("#cbbCollection").children('.cca').remove();
					for(i in cat)
					{
						////$("#cbbCollection").find('.0').css({"display":"block"});//.removeClass('hidden');
		////				$("#cbbCollection").find('.'+cat[i]).css({"display":"block"});//.removeClass('hidden');
						//s+='<option value="'+cat[i]+'">'+cat[i]+'</option>';
						if(catego==cat[i]['id'])
						{
							sa+='<option value="'+cat[i]['id']+'" selected class="'+cat[i]['id']+' cca">'+cat[i]['name']+'</option>';
						}
						else
						{
							sa+='<option value="'+cat[i]['id']+'" class="'+cat[i]['id']+' cca">'+cat[i]['name']+'</option>';
						}
						
					}
					$("#cbbCollection").append(sa);
					catego=0;
					/*if(catego!='0')
					{
						alert(1);
						$("#cbbCollection").children('.'+catego).focus();//.css({"background":"red"});
					}
					else
					{
						alert(0);
					}
					alert(catego);*/
					//console.log(cat);
				}
			});
		}

	}
	
	
}

</script>


<script>
$(document).ready(function(){

	// hide #back-top first
	$("#top").hide();
	
	// fade in #back-top
	$(function () {
		$(window).scroll(function () {
			if ($(this).scrollTop() > 100) {
				$('#top').fadeIn();
			} else {
				$('#top').fadeOut();
			}
		});

		// scroll body to 0px on click
		$('#top').click(function () {
			$('body,html').animate({
				scrollTop: 0
			}, 800);
			return false;
		});
	});

});
</script>
<button id="top" class="up"><i class="fa fa-angle-up" aria-hidden="true"></i></button>