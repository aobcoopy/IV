<?php /*?><script>
 window.fbAsyncInit = function() {
    FB.init({
      appId      : '367335174001704',
      xfbml      : true,
      version    : 'v3.2'
    });
  };
  
(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "https://connect.facebook.net/en_US/sdk/xfbml.customerchat.js";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));
</script>


<div class="fb-customerchat" page_id="383101798707551" style="margin-right:50px;"></div><!-- theme_color="#F05A46"--><!--271642549618114-->
<style>
.fb_dialog
{
	right: 60pt !important;
}

</style><?php */?>

<!-- Load Facebook SDK for JavaScript -->
      <div id="fb-root"></div>
      <script>
        window.fbAsyncInit = function() {
          FB.init({
            xfbml            : true,
            version          : 'v9.0'
          });
        };

        (function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = 'https://connect.facebook.net/en_US/sdk/xfbml.customerchat.js';
        fjs.parentNode.insertBefore(js, fjs);
      }(document, 'script', 'facebook-jssdk'));</script>

      <!-- Your Chat Plugin code -->
      <div class="fb-customerchat" attribution=setup_tool  page_id="383101798707551" theme_color="#F25A46"></div>