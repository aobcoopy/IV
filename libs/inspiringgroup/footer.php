<div class="container-fluid footer padtop100">
	<div class="container">
	<div class="row">
    	<div class="col-12 text-center">
			<ul class="menufooter">
            	<li><a href="https://www.inspiringvillas.com"><span class="en">Luxury Villas</span> <span class="chi">高端别墅</span></a></li>
                <li><a href="http://inspiring-experiences.com/"><span class="en">Experiences</span> <span class="chi">经验</span></a></li>
                <li><a href="http://inspiringyachting.com/"><span class="en">Yachts</span> <span class="chi">游艇</span></a></li>
                <li><a href="/aboutus"><span class="en">About</span> <span class="chi">关于我们</span></a></li>
                <li><a href=""><span class="en">Ethical Tourism</span> <span class="chi">民俗观光</span></a></li>
                <li><a href="/blog"><span class="en">Blogs</span> <span class="chi">博客</span></a></li>
                <li><a href="/contact"><span class="en">Contact</span> <span class="chi">联系</span></a></li>
                <li><a href="/privacy"><span class="en">Privacy Policy</span> <span class="chi">隐私政策</span></a></li>
            </ul>
            
            <ul class="menufooter_social">
            	<li><a href=""><i class="fa-brands fa-facebook-f"></i></a></li>
                <li><a href=""><i class="fa-brands fa-instagram"></i></a></li>
                <li><a href=""><i class="fa-brands fa-twitter"></i></a></li>
                <li><a href=""><i class="fa-brands fa-linkedin"></i></a></li>
            </ul>
            
            <ul class="menufooter_copy">
            	<li><a href="">© 2022 A. Luxury Hotel. All rights reserved.</a></li>
                <!--<li><a href="">Privacy Policy</a></li>
                <li><a href="">Terms of Service</a></li>
                <li><a href="">Cookies Settings</a></li>-->
            </ul>
            
        </div>
    </div>
    </div>
</div>


<button id="m_top" class="b_top"><i class="fa fa-arrow-circle-up" aria-hidden="true"></i></button>

<script>
$(document).ready(function(){

	// hide #back-top first
	$("#m_top").hide();
	
	// fade in #back-top
	$(function () {
		$(window).scroll(function () {
			if ($(this).scrollTop() > 100) {
				$('#m_top').fadeIn(300);
			} else {
				$('#m_top').fadeOut(300);
			}
		});

		// scroll body to 0px on click
		
	});
	$('#m_top').click(function () {
				$('html').animate({
					scrollTop: 0
				}, 800);
				return false;
			});
	});
</script>