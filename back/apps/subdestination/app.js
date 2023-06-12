var subdestination = {
	subdestination : {
		add : fn.noaccess,
		change : fn.noaccess,
		save_change : fn.noaccess,
		remove : fn.noaccess,
		permission : fn.noaccess,
		save_permission : fn.noaccess,
		upload_photo : fn.noaccess,
		upload_photo_file : fn.noaccess,
		upload_photo_edit : fn.noaccess,
		upload_photo_file_edit : fn.noaccess,
		remove_photo_edit : fn.noaccess,
	},
	
};

var edit = {
	change_status:function(id,me,vale){
		
		var vname = $(me).parent('.switch').find('.txn').val();
		var txtx;
		if(vale==1){txtx="Close";}else{txtx="Open";}
		var Delconf = confirm('Do you want to \n'+txtx+' '+vname+'?');
		if(Delconf==false)
		{
			$("#tblSlide").DataTable().draw();
			return false;
		}
		else
		{
			$.ajax({
				url: "apps/subdestination/xhr/action-change-status.php",
				type: "POST",
				dataType:"json",
				data: {id:id},
				success : function(response)
				{$("#tblSlide").DataTable().draw();
					if(response.success==true){
						
						$.ajax({
							//url: "https://www.inspiringvillas.com/libs/action_notifications/alert_sub_status_on_off.php",
							url: "../../libs/action_notifications/alert_sub_status_on_off.php",
							type: "POST",
							data: {
								vname: response.vname,
								vstatus: response.status,
								vuser: response.user
								},
							dataType: "json",
							success: function(json){
								
							}
						});
						
					}else{
						//fn.engine.alert("Alert",response.msg);
					}
				}
			});
		}		
	}
};

$.extend(fn.app,{subdestination:subdestination,edit:edit});