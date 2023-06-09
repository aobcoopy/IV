<?php session_start();?>
<br><br><br><br><br>
<div class="container">
	<div class="row">
		<div class="inside_data_recently"></div>
        
    </div>
</div>
<script>
$(document).ready(function(e) {
	$.ajax({
		url:"<?php echo $url_link;?>libs/actions/check-recently.php",
		type:"POST",
		dataType:"html",
		data:{},
		success: function(res){
			$(".inside_data_recently").html(res);
		}
	});
    setTimeout(function(){
		//window.location.reload();
	},500);
});

</script>