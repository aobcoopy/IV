var vf_phuket = {
	vf_phuket : {
		add : fn.noaccess,
		change : fn.noaccess,
		save_change : fn.noaccess,
		removein : fn.noaccess,
		permission : fn.noaccess,
		save_permission : fn.noaccess,
	},
	view_form:function(me){
		var encode = btoa(me);//$(me).parent().find('.tx_encode').val();
		window.location = '../view-villaform-'+encode+'.html';
	},
	edit_form:function(id){
		var encode = btoa(id);//$(id).parent().find('.tx_encode').val();
		window.open('../villaformadmin-'+encode+'.html', '_blank');
	},
	edit_customer_form:function(me){
		var encode = $(me).parent().find('.tx_encode').val();
		window.open('../villaform-'+encode+'.html', '_blank');
	},
	view_customer_form:function(me){
		var encode = $(me).parent().find('.tx_encode').val();
		window.open('../view-villaform-'+encode+'.html', '_blank');
	},
	copy_customer_link : function(me){
		/*$(".tx_link").select();
		document.execCommand("copy");*/
		var encode = $(me).parent().find('.tx_encode').val();
		window.open('../villaform-customer-'+encode+'.html', '_blank');
	},
	edit_customer_detail : function(id){
		$.ajax({
			url: "apps/vf_phuket/view/dialog.edit.user.data.php",
			data: {id:id},
			type: "POST",
			dataType: "html",
			success: function(html){
				$("body").append(html);
			}	
		});
	},
	save_edit_customer_data : function(){
		$.ajax({
			url: "apps/vf_phuket/xhr/action-save-edit-user-data.php",
			data: $("#form_ed_customer_data").serialize(),
			type: "POST",
			dataType: "json",
			success: function(res){
				if(res.status==true)
				{
					$("#dialog_edit_group").modal('hide');
					$(".table").DataTable().draw();	
				}
				else
				{
					fn.engine.alert("Alert",res.msg);
					return false;
				}
			}	
		});
	},
	customer_duplicate : function(id){
		$.ajax({
				url: "apps/vf_phuket/xhr/action-duplicate-customer-data.php",
				data: {id:id},
				type: "POST",
				dataType: "json",
				success: function(res){
					if(res.status==true)
					{
						$(".table").DataTable().draw();	
						setTimeout(function(){
							setTimeout(function(){
								$('tbody tr#'+res.id+' td').css({"background": "#FFD2D2"});
							},500);	
							setTimeout(function(){
								$('tbody tr#'+res.id+' td').css({"background": ""});
							},2000);
							
						},300);
					}
					else
					{
						fn.engine.alert("Alert",res.msg);
						return false;
					}
				}
		});
	},
	remove_customer : function(id){
		var Delconf = confirm('Are you sure to REMOVE !');
		if(Delconf==false)
		{
			return false;
		}
		else
		{
			$.ajax({
					url: "apps/vf_phuket/xhr/action-remove-customer-data.php",
					data: {id:id},
					type: "POST",
					dataType: "json",
					success: function(res){
						if(res.status==true)
						{
							$(".table").DataTable().draw();	
							/*setTimeout(function(){
								setTimeout(function(){
									$('tbody tr#'+res.id+' td').css({"background": "#FFD2D2"});
								},500);	
								setTimeout(function(){
									$('tbody tr#'+res.id+' td').css({"background": ""});
								},2000);
								
							},300);*/
						}
						else
						{
							fn.engine.alert("Alert",res.msg);
							return false;
						}
					}
			});
		}
	}
};

var edit = {
	change_status:function(id){
		$.ajax({
				url: "apps/vf_phuket/xhr/action-change-status.php",
				type: "POST",
				dataType:"json",
				data: {id:id},
				success : function(response)
				{
					if(response.success){
						$("#tblSlide").DataTable().draw();
					}else{
						//fn.engine.alert("Alert",response.msg);
					}
				}
		});
	}
};

$.extend(fn.app,{vf_phuket:vf_phuket,edit:edit});