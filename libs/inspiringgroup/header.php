<nav class="mynav">
	<a href="https://www.inspiringvillas.com"><img src="/libs/inspiringgroup/upload/icon.png" class="logo web" alt=""></a>
    <a href="https://www.inspiringvillas.com"><img src="/libs/inspiringgroup/upload/icon2.png" class="logo mob" alt=""></a>
    
    <div class="t_lang" onClick="chang_lang();"><span class="material-symbols-outlined  ">translate</span></div>
    <div class="ham" onClick="menu('0');"><i class="fa-solid fa-xmark" style="display:none;"></i><i class="fa-solid fa-bars"></i></div>
    
	<a href="https://www.inspiringvillas.com"><button class="topbut"><span class="en">Contact Us</span> <span class="chi">联系我们</span></button></a>
</nav>

<div class="box_menu">
	<ul class="topmenu">
    	<li><a href="https://www.inspiringvillas.com/"><span class="en">Luxury Villas</span> <span class="chi">高端别墅</span></a></li>
        <li><a href="http://inspiring-experiences.com/"><span class="en">Experiences</span> <span class="chi">经验</span></a></li>
        <li><a href="http://inspiringyachting.com/"><span class="en">Yachts</span> <span class="chi">游艇</span></a></li>
        <li><a href="https://www.inspiringvillas.com/aboutus"><span class="en">About</span> <span class="chi">关于我们</span></a></li>
        <li><a href="https://qalia.org/"><span class="en">Ethical Tourism</span> <span class="chi">民俗观光</span></a></li>
        <li><a href="https://www.inspiringvillas.com/blog"><span class="en">Blog & Lifestyle</span> <span class="chi">博客</span></a></li>
        <li><a href="https://www.inspiringvillas.com/contact"><span class="en">Contact</span> <span class="chi">联系</span></a></li>
    </ul>
</div>

<script>
var lang=0;
function chang_lang()
{
	if(lang==0)
	{
		lang=1;
		$(".en").hide();
		$(".chi").show();
	}
	else
	{
		lang=0;
		$(".chi").hide();
		$(".en").show();
	}
}

var val=0;
function menu()
{
	if(val==0)
	{
		val=1;
		$('.box_menu').addClass('slide_down');
		$('.box_menu').removeClass('slide_up');
		$(".fa-bars").hide();
		$(".fa-xmark").show();
	}
	else
	{
		val=0;
		$('.box_menu').removeClass('slide_down');
		$('.box_menu').addClass('slide_up');
		$(".fa-xmark").hide();
		$(".fa-bars").show();
	}
	//alert(val);
}
</script>
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />











