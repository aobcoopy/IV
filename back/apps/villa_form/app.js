var villa_form = {
	villa_form : {
		add : fn.noaccess,
		change : fn.noaccess,
		save_change : fn.noaccess,
		removein : fn.noaccess,
		permission : fn.noaccess,
		save_permission : fn.noaccess,
	},
	view_form:function(me){
		var encode = me;//btoa(me);//$(me).parent().find('.tx_encode').val();
		window.location = encode;//'../view-villaform-'+encode+'.html';
	},
	edit_form:function(id){
		var encode = id;//btoa(id);//$(id).parent().find('.tx_encode').val();
		window.location = '../villaform-'+encode+'.html';
	},
	/*view_form:function(id){
		window.location = '../view-villaform-'+id+'.html';
	},
	edit_form:function(id){
		window.location = '../villaform-'+id+'.html';
	}*/
};

var edit = {
	change_status:function(id){
		$.ajax({
				url: "apps/villa_form/xhr/action-change-status.php",
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

$.extend(fn.app,{villa_form:villa_form,edit:edit});