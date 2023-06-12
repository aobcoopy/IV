<?php
	
?>
<script tyle="text/javascript">
$(function(){
	fn.app.log.view = function(id) {
		$.ajax({
			url: "apps/log/view/dialog.log.view.php",
			data: {id:id},
			type: "POST",
			dataType: "html",
			success: function(html){
				$("body").append(html);
			}
		});
	};
});	
</script>
