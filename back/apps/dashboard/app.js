var dashboard = {
	clear_photo:function()
	{
		var Delconf = confirm('Are you sure to move photo !');
		if(Delconf==false)
		{
			return false;
		}
		else
		{
			$.post('apps/dashboard/xhr/action-move-photo.php','',function(response){
				if(response.success){
					
				}
				else
				{
					return false;
				}
			});
		}
	}
};

$.extend(fn.app,{dashboard:dashboard});