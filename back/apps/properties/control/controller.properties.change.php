<script tyle="text/javascript">
	fn.app.properties.properties.promotions = function(id,status,me) {
		var input = $(me).parent().parent().find('.tx_pro_exp_date').val();
		var val = $(me).parent().parent().find('.tx_status').val();
			if(val==0)
			{
				if(input=='')
				{
					fn.engine.alert("Alert","Please enter expiration date!");
					$("#tblSlide").DataTable().ajax.reload(null,false);
					$(me).parent().parent().find('.tx_pro_exp_date').focus();
					return false;
				}
				else
				{
					$.ajax({
						url: "apps/properties/xhr/action-change-status-promotions.php",
						type: "POST",
						dataType:"json",
						data: {id:id,exp_date:input},
						success : function(response)
						{//$("#tblSlide").DataTable().draw();
							if(response.status==true){
								$(me).parent().parent().find('.tx_status').val(response.val);
								$("#tblSlide").DataTable().ajax.reload(null,false);
							}else{
								//fn.engine.alert("Alert",response.msg);
							}
						}
					});
				}
			}
			else
			{
				$.ajax({
					url: "apps/properties/xhr/action-change-status-promotions.php",
					type: "POST",
					dataType:"json",
					data: {id:id,exp_date:0},
					success : function(response)
					{//$("#tblSlide").DataTable().draw();
						if(response.status==true){
							$(me).parent().parent().find('.tx_status').val(response.val);
							$("#tblSlide").DataTable().ajax.reload(null,false);
						}else{
							//fn.engine.alert("Alert",response.msg);
						}
					}
				});
			}
	};
	
	
	
	
	fn.app.properties.properties.ggcalendar = function(id) {
		$.ajax({
			url: "apps/properties/view/dialog.properties.googlecalender.php",
			data: {id:id},
			type: "POST",
			dataType: "html",
			success: function(html){
				$("body").append(html);
			}	
		});
	};
	
	fn.app.properties.properties.icons_list = function(id) {
		$.ajax({
			url: "apps/properties/view/dialog.properties.icons_list.php",
			data: {id:id},
			type: "POST",
			dataType: "html",
			success: function(html){
				$("body").append(html);
			}	
		});
	};
	
	fn.app.properties.properties.ht = function(id) {
		$.ajax({
			url: "apps/properties/view/dialog.properties.ht.php",
			data: {id:id},
			type: "POST",
			dataType: "html",
			success: function(html){
				$("body").append(html);
			}	
		});
	};
	
	fn.app.properties.properties.listing = function(id) {
		$.ajax({
			url: "apps/properties/view/dialog.properties.listing.php",
			data: {id:id},
			type: "POST",
			dataType: "html",
			success: function(html){
				$("body").append(html);
			}	
		});
	};
	
	fn.app.properties.properties.meta = function(id) {
		$.ajax({
			url: "apps/properties/view/dialog.properties.meta.php",
			data: {id:id},
			type: "POST",
			dataType: "html",
			success: function(html){
				$("body").append(html);
			}	
		});
	};
	
	fn.app.properties.properties.saveggc = function(id){
		$.ajax({
			url: "apps/properties/xhr/action-save-googlecalendar.php",
			data: $("#form_edit_ggc").serialize(),
			type: "POST",
			dataType: "json",
			success: function(response){
				if(response.success){
					$("#tblSlide").DataTable().ajax.reload(null,false);
					$("#dialog_add_ggc").modal('hide');
				}else{
					fn.engine.alert("Alert",response.msg);
				}
			}	
		});
	};
	
	fn.app.properties.properties.save_meta = function(id){
		$.ajax({
			url: "apps/properties/xhr/action-meta-properties.php",
			data: $("#form_edit_meta").serialize(),
			type: "POST",
			dataType: "json",
			success: function(response){
				if(response.success){
					$("#tblSlide").DataTable().ajax.reload(null,false);
					$("#dialog_add_meta").modal('hide');
				}else{
					fn.engine.alert("Alert",response.msg);
				}
			}	
		});
	};


	fn.app.properties.properties.email = function(id) {
		$.ajax({
			url: "apps/properties/view/dialog.properties.email.php",
			data: {id:id},
			type: "POST",
			dataType: "html",
			success: function(html){
				$("body").append(html);
			}	
		});
	};
	
	fn.app.properties.properties.save_email = function(id){
		$.ajax({
			url: "apps/properties/xhr/action-email-properties.php",
			data: $("#form_edit_email").serialize(),
			type: "POST",
			dataType: "json",
			success: function(response){
				if(response.success){
					$("#tblSlide").DataTable().ajax.reload(null,false);
					$("#dialog_edit_email").modal('hide');
				}else{
					fn.engine.alert("Alert",response.msg);
				}
			}	
		});
	};



	fn.app.properties.properties.bed = function(id) {
		$.ajax({
			url: "apps/properties/view/dialog.properties.bed.php",
			data: {id:id},
			type: "POST",
			dataType: "html",
			success: function(html){
				$("body").append(html);
			}	
		});
	};
	
	fn.app.properties.properties.transfer_year = function(pid){
		var Delconf = confirm('Are you sure to Transfer !');
			if(Delconf==false)
			{
				return false;
			}
			else
			{
				$.ajax({
					url: "apps/properties/xhr/action-transfer-year.php",
					data: {id:pid},
					type: "POST",
					dataType: "json",
					success: function(res){
						if(res.status==true)
						{
							$("#dialog_edit_pricing").modal('hide');
							setTimeout(function(){
								fn.app.properties.properties.popup_pricing(pid);
							},500);
						}
						else
						{
							fn.engine.alert("Alert",res.msg);
						}
					}	
				});
				
				
			}
	}
	
	fn.app.properties.properties.addbed = function(){
		var s = '';
			s+= '<div class="form-group groups">';
				s+= '<div class="col-sm-1">';
					s+= '<button type="button" class="btn btn-danger" onClick="$(this).parent().parent().remove();"><i class="fa fa-minus" aria-hidden="true"></i></button>';
				s+= '</div>';
				s+= '<label for="txtName" class="col-sm-1 control-label">Title</label>';
				s+= '<div class="col-sm-4">';
					s+= '<input type="text" class="form-control" id="t_Title" name="t_Title" >';
				s+= '</div>';
				s+= '<label for="txtName" class="col-sm-1 control-label">Detail</label>';
				s+= '<div class="col-sm-5">';
					s+= '<input type="text" class="form-control" id="t_Detail" name="t_Detail" >';
				s+= '</div>';
			s+= '</div>';
			
			
			$(".tbed").append(s);
	};
	
	fn.app.properties.properties.save_bed = function(){
		var data = {
				txtID : $("#txtID").val(),
				val : []
			};
		
		$(".tbed").children().each(function() {
			data.val.push({
				title : $(this).find("input[name=t_Title]").val(),
				detail : $(this).find("input[name=t_Detail]").val()
			});
        });


			$.post('apps/properties/xhr/action-edit-bed.php',data,function(response){
				if(response.success){
					//$("#tblSlide").DataTable().draw();
					$("#dialog_add_bed").modal('hide');
					//$("#thumbnail_edit").attr('src','../../../../upload/properties.jpg');
				}else{
					//fn.engine.alert("Alert",response.msg);
				}
			},'json');
			return false;
	};
	
	fn.app.properties.properties.change = function(id) {
		$.ajax({
			url: "apps/properties/view/dialog.properties.edit.php",
			data: {id:id},
			type: "POST",
			dataType: "html",
			success: function(html){
				$("body").append(html);
			}	
		});
	};
	
	
	fn.app.properties.properties.check = function(id) {
		$.ajax({
			url: "apps/properties/view/dialog.properties.edit.check.php",
			data: {id:id},
			type: "POST",
			dataType: "html",
			success: function(html){
				$("body").append(html);
			}	
		});
	};
	
	
	fn.app.properties.properties.rate = function(id) {
		$.ajax({
			url: "apps/properties/view/dialog.properties.rate.php",
			data: {id:id},
			type: "POST",
			dataType: "html",
			success: function(html){
				$("body").append(html);
			}	
		});
	};
	
	fn.app.properties.properties.viewrate = function(id) {
		$.ajax({
			url: "apps/properties/view/dialog.properties.viewrate.php",
			data: {idrate:id},
			type: "POST",
			dataType: "html",
			success: function(html){
				$("body").append(html);
				
				$("#dialog_add_rate,#dialog_edit_rate_detail").modal('hide');
			}	
		});
	};
	
	
	fn.app.properties.properties.edit_detail_rate = function(id) {
		$.ajax({
			url: "apps/properties/view/dialog.properties.edit_rating.php",
			data: {id:id},
			type: "POST",
			dataType: "html",
			success: function(html){
				$("#dialog_view_rate").modal('hide');
				$("body").append(html);
			}	
		});
	};
	
	
	fn.app.properties.properties.save_rate = function(){
		/*if(document.getElementById("txt_photo_e").value=='')
		{
			//alert('Please fill ypur data');
			$("#btup").click();
			return false;
		}
		else
		{*/
			$.post('apps/properties/xhr/action-edit-rate.php',$('#form_edit_rate').serialize(),function(response){
				if(response.success){
					//$("#tblSlide").DataTable().draw();
					$("#dialog_add_rate").modal('hide');
					fn.app.properties.properties.viewrate(response.property);
					//$("#thumbnail_edit").attr('src','../../../../upload/properties.jpg');
				}else{
					//fn.engine.alert("Alert",response.msg);
				}
			},'json');
			return false;
		/*}*/
		
	};
	
	fn.app.properties.properties.save_edit_rate = function(){
		/*if(document.getElementById("txt_photo_e").value=='')
		{
			//alert('Please fill ypur data');
			$("#btup").click();
			return false;
		}
		else
		{*/
			$.post('apps/properties/xhr/action-edit-rate-detail.php',$('#form_edit_rate_detail').serialize(),function(response){
				if(response.success){
					//$("#tblSlide").DataTable().draw();
					$("#dialog_edit_rate_detail").modal('hide');
					fn.app.properties.properties.viewrate(response.property);
					//$("#thumbnail_edit").attr('src','../../../../upload/properties.jpg');
				}else{
					//fn.engine.alert("Alert",response.msg);
				}
			},'json');
			return false;
			
		/*}*/
		
	};
	
	
	
	fn.app.properties.properties.addwiic_main = function(posi,tname){
		var z='';
			z+=  '<div class="row">';
				z+=  '<div class="col-sm-8">';
					z+=  '<input type="text" class="form-control" name="'+tname+'[]">';
				z+=  '</div> ';
				z+=  '<div class="col-sm-2">';
					z+=  '<button type="button" class="btn btn-danger" onClick="$(this).parent().parent().remove();"><i class="fa fa-remove"></i></button>';
				z+=  '</div> <br> ';
			z+= '</div> '; 
			
		$("."+posi).append(z);
	}
	
	fn.app.properties.properties.save_change = function(){
		/*if(document.getElementById("txt_photo_e").value=='')
		{
			//alert('Please fill ypur data');
			$("#btup").click();
			return false;
		}
		else
		{*/
			$.post('apps/properties/xhr/action-edit-properties.php',$('#form_edit_property').serialize(),function(response){
				if(response.success){
					//$("#tblSlide").DataTable().draw();
					$("#dialog_edit_group").modal('hide');
					$("#tblSlide").Datatable().ajax.reload(null,false);
					
					//$("#thumbnail_edit").attr('src','../../../../upload/properties.jpg');
				}else{
					//fn.engine.alert("Alert",response.msg);
				}
			},'json');
			return false;
		/*}*/
		
	};
	
	
	fn.app.properties.properties.save_change_check = function(){
			$.post('apps/properties/xhr/action-edit-properties-check.php',$('#form_edit_property_check').serialize(),function(response){
				$("#tblSlide").DataTable().draw();
				$("#dialog_edit_group").modal('hide');
				
				//if(response.success){
//					$("#tblSlide").DataTable().draw();
//					$("#dialog_edit_group").modal('hide');
//					//$("#thumbnail_edit").attr('src','../../../../upload/properties.jpg');
//				}else{
//					//fn.engine.alert("Alert",response.msg);
//				}
			});
	};
	
	
	fn.app.properties.properties.save_photo_book = function(show){
		var config_modal =(show=='show')?'show':'hide';
		var datas = {
			txtID : $("#txtID").val(),
			photo : []
		};
		$(".pho").each(function() {
			datas.photo.push({
				photo : $(this).find("input[name=txt_photo]").val(),
				name : $(this).find("input[name=txt_photo_name]").val(),
			});
		});
		$.ajax({
			url:"apps/properties/xhr/action-photo-properties.php",
			type:"POST",
			dataType:"json",
			data:{datas:datas},
			success: function(res){
				if(res.success){
					//$("#tblSlide").DataTable().draw();
					//$("#tblSlide").DataTable().ajax.reload(null,false);
					$("#dialog_edit_pricing").modal(config_modal);
					if(config_modal == 'hide'){
						//location.reload();
						$("#tblSlide").Datatable().ajax.reload(null,false);
					}
					//$("#thumbnail_edit").attr('src','../../../../upload/properties.jpg');
				}else{
					fn.engine.alert("Alert",response.msg);
				}
			}
		},'json');
			
	}

	var file_upload_edit = "#f_Photo_edit";
	fn.app.properties.properties.upload_photo_edit = function(){
		$(file_upload_edit).click();
		$(file_upload_edit).unbind();
		
		$(file_upload_edit).on("change",function(e){
			var files = this.files
			$("#btn_upp2").click();    
		});
	};
	
	fn.app.properties.properties.upload_photo_file_edit = function(){
		var data = new FormData($("#form_add_photo")[0]);$(".mybutt").attr('disabled',false);
		var format_photo_name =$('#format_photo_name').val();
		var s = '';
		//console.log(format_photo_name);
		//Edit by Parinyimz 20190812
		fn.app.properties.properties.remove_photo_edit();
		var url = 'apps/properties/xhr/action-up-photo.php?format_photo_name='+format_photo_name;
		jQuery.ajax({
			url: url,
			data: data,
			cache: false,
			contentType: false,
			processData: false,
			type: 'POST',
			dataType: 'json',
			success: function(response){
				if(response.success){
					//console.log(response.path);
					//$(".thumbs_photo").children('.pho').remove();
						s += '<div class="col-md-2 pho new_upload_photo">';
							s += '<input type="hidden" class="paths" name="path_photo" value="'+response.path+'">';
							s += '<input type="hidden" name="txt_photo" value="'+response.path+'">';
							s += '<img src="<?php echo S3_BUCKET_URL ?>'+response.path+'"  width="100%" class="img-thumbnail pho">';
							s += '<input type="text" name="txt_photo_name" class="form-control">';
							s += '<button type="button" class="btn btn-danger delete_only_one" style="width:100%" onclick="fn.app.properties.properties.remove_photo_edit(this);">';
								s += '<i class="fa fa-times" aria-hidden="true"></i>';
								s += '<input type="hidden" class="paths" name="path_photo" value="'+response.path+'">';
							s += '</button>';
						s += '</div>';
					//s += '</div>';
					$(".thumbs_photo").append(s);
					
					/*$("#path_photo").val(response.path);
					$("#txt_photo").val(response.path);
					$(".phos").attr('src',response.path);
					$(".bc").show();*/
					/*$("#tblbrand").DataTable().draw();
					$("#dialog_edit_icon").modal('hide');*/
					$("#form_add_photo").val('');
					fn.app.properties.properties.save_photo_book('show');
				}else{
					alert(response.msg);
					$(".mybutt").attr('disabled',false);
				}$(".mybutt").attr('disabled',false);	
			}
		});
	};
	
	fn.app.properties.properties.remove_photo_edit = function(me){
		var path = $(me).parent().find('.paths').val();
		var url ='inc/delete_photo.php?path='+path;
		$.ajax({
			type: "GET",
			url: url,
			dataType: "json",
			success : function(data){
				if(data.success == '200'){
					$(me).parent().remove();
					fn.app.properties.properties.save_photo_book('show');	
				}
			}
		});
	};
	
	//---------------------pdf-----------
	var file_upload_pdf_edit = "#f_pdf_edit";

	fn.app.properties.properties.upload_pdf_edit = function(){
		$(file_upload_pdf_edit).click();
		$(file_upload_pdf_edit).unbind();
		
		$(file_upload_pdf_edit).on("change",function(e){
			var files = this.files
			$("#btn_upp_pdf_edit").click();    
		});
	};
	
	fn.app.properties.properties.upload_pdf_file_edit = function(){
		var data = new FormData($("#form_add_pdf_edit")[0]);
		var s = '';
		jQuery.ajax({
			url: 'apps/properties/xhr/action-up-pdf.php',
			data: data,
			cache: false,
			contentType: false,
			processData: false,
			type: 'POST',
			dataType: 'json',
			success: function(response){
				if(response.success){
					$("#txpdf_e").val(response.path);
					$("#path_photo_e").val(response.path);
					$("#txt_photo_e").val(response.path);
					//$(".phos").attr('src',response.path);
					$(".bc_e").show();
					/*$("#tblbrand").DataTable().draw();
					$("#dialog_edit_icon").modal('hide');*/
				}else{
					fn.engine.alert("Alert",response.msg);
				}	
			}
		});
	};
	
	fn.app.properties.properties.remove_pdf_edit = function(me){
		var file_path = $(me).parent().find('.paths').val();
		//alert(file_path);
		$.ajax({
			url:"apps/properties/xhr/action-remove-photo.php",
			type:"POST",
			dataType:"json",
			data:{path:file_path},
			success: function(resp){
				if(resp.status==true)
				{
					$("#path_photo_e").val('');
					$("#txpdf_e").val('');
					$("#txt_photo_e").val('');
					//$(".phos").attr('src','');
					$(".bc_e").hide();
					fn.engine.alert("Alert",response.msg);
				}
				else
				{
					fn.engine.alert("Alert",response.msg);
				}
				
			}
		});
	};
	
	
	
	
	
	
	
	fn.app.properties.properties.popup_pricing = function(id) {
		$.ajax({
			url: "apps/properties/view/dialog.properties.edit.pricing.php",
			data: {id:id},
			type: "POST",
			dataType: "html",
			success: function(html){
				$("body").append(html);
			}	
		});
	};
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	fn.app.properties.properties.check_type_date_format = function(me)
	{
		var text = $(me).val();
		/*var alltext = text.split("-");
		var front_text = alltext[0].split(" ");
		var frle = front_text.length;
		var back_text = alltext[1].split(" ");
		var bkle = back_text.length;*/

		var final = text.split(" ");
		var show = '';
		var transfer = 0;
		if(final.length==7)//(frle==3 && bkle==3)//
		{
			//console.log(final[0]+'-'+final[1]+'-'+final[2]+'-'+final[3]+'-'+final[4]+'-'+final[5]+'-'+final[6]);
			show = '<span style="color:green"><i class="fa fa-check" aria-hidden="true"></i> Support</span>';
			transfer = 1;
		}
		else
		{
			show = '<span style="color:red"><i class="fa fa-exclamation-triangle" aria-hidden="true"></i> Not Support go to Remark<br>Ex.11 Feb 2021 - 17 Feb 2021</span>';
			transfer = 0;
		}
		
		if($(me).prop("type")=='text')
		{
			$(me).parent().find('.txnoti').html(show);
		}
		else
		{
			transfer = 1;
		}
		
		if(transfer==0)
		{
			$(".but_transfer").attr('disabled',true);
		}
		else
		{
			$(".but_transfer").attr('disabled',false);
		}
		//alert(final+'-------'+final.length);
	}
	
	fn.app.properties.properties.Change_to_text = function(me){
		if($(me).is(':checked')==true)
		{
			$(me).parent().parent().find("input[id=tx_date1]").prop('type','text');
			$(me).parent().parent().find("input[id=tx_date1]").attr('placeholder','11 Feb 2021 - 17 Feb 2021');
			$(me).parent().parent().find("input[id=tx_date2]").attr('disabled',true);
			$(me).parent().find("input[id=chk_text_val]").val(1);
			$(me).parent().parent().find(".txnoti").show();
		}
		else
		{
			$(me).parent().parent().find("input[id=tx_date1]").prop('type','date');
			$(me).parent().parent().find("input[id=tx_date2]").attr('disabled',false);
			$(me).parent().find("input[id=chk_text_val]").val(0);
			$(me).parent().parent().find(".txnoti").hide();
		}
		
	};
	
	fn.app.properties.properties.addtb = function(){
			var z = '';
			z+= '<tr>';
				//z+= '<td></td>';
				
				z+=  '<td>';
					z+=  '<input type="checkbox" id="chk_text" name="chk_text"  onClick="fn.app.properties.properties.Change_to_text(this);"> Text';
					z+=  '<input type="hidden" id="chk_text_val" name="chk_text_val" value="0">';
				z+=  '</td>';
												
				z+= '<td><input type="date" class="form-control" onKeyUp="fn.app.properties.properties.check_type_date_format(this);" onBlur="fn.app.properties.properties.check_type_date_format(this);"  id="tx_date1" name="tx_date1"  >';
				z+= '<span class="txnoti" style="">-</span>';
				z+= '</td>';
				z+= '<td><input type="date" class="form-control" id="tx_date2" name="tx_date2"  ></td>';
				z+= '<td><input type="number" class="form-control" id="tx_night" name="tx_night"  ></td>';
				for(i=1;i<=28;i++)
				{
					z+= '<td><input type="text" class="form-control" id="tx_val" name="tx_val'+i+'"  ></td>';
				}
				z+= '<td><button class="btn btn-danger" onclick="$(this).parent().parent().remove();"><i class="fa fa-times" aria-hidden="true"></i></abutton></td>';
			z+= '</tr>';
			$(".tb tbody").append(z);
		
	};
	fn.app.properties.properties.Duplicate = function(me){
			var z = '';
			var day_1 = $(me).parent().parent().find("#tx_date1").val();
			var day_2 = $(me).parent().parent().find("#tx_date2").val();
			var tx_night = $(me).parent().parent().find("#tx_night").val();
			z+= '<tr>';
				//z+= '<td></td>';//<button type="button" class="btn btn-warning" onclick="fn.app.properties.properties.Duplicate();"><i class="fa fa-clone" aria-hidden="true"></i></abutton>
				
				z+=  '<td>';
					z+=  '<input type="checkbox" id="chk_text" name="chk_text"  onClick="fn.app.properties.properties.Change_to_text(this);"> Text';
					z+=  '<input type="hidden" id="chk_text_val" name="chk_text_val" value="0">';
				z+=  '</td>';
				
				z+= '<td><input type="date" class="form-control" onBlur="fn.app.properties.properties.check_type_date_format(this);"  id="tx_date1" name="tx_date1" value="'+day_1+'">';
					z+= '<span class="txnoti" style="">-</span>';
				z+= '</td>';
				z+= '<td><input type="date" class="form-control" id="tx_date2" name="tx_date2" value="'+day_2+'"  ></td>';
				z+= '<td><input type="number" class="form-control" id="tx_night" name="tx_night" value="'+tx_night+'"></td>';
				for(i=1;i<=28;i++)
				{
					var tx_val = $(me).parent().parent().find("input[name=tx_val"+i+"]").val();
					z+= '<td><input type="text" class="form-control" id="tx_val" name="tx_val'+i+'" value="'+tx_val+'"></td>';
				}
				z+= '<td><button class="btn btn-danger" onclick="$(this).parent().parent().remove();"><i class="fa fa-times" aria-hidden="true"></i></abutton></td>';
			z+= '</tr>';
			z+= $(this).parent().parent().html();
			$(".tb tbody").append(z);
		
	};
	
	fn.app.properties.properties.add_note = function(){ 
		var a = '';
		a +='<div class="form-group">';
			a +='<div class="col-sm-6">';
				a +='<input type="text" class="form-control" id="tx_note" name="tx_note" placeholder="Note">';
			a +='</div>';
			a +='<div class="col-sm-3">';
				a +='<input type="date" class="form-control" id="tx_note_exp" name="tx_note_exp">';
			a +='</div>';
			a +='<div class="col-sm-2">';
				a +='<button type="button" class="btn btn-danger" onClick="$(this).parent().parent().remove();"><i class="fa fa-remove" aria-hidden="true"></i></button>	';
			a +='</div>';
		a +='</div>';
		
		$(".u-note").append(a);
	};
	
	
	fn.app.properties.properties.save_table_pricing = function(){
		var datas = {
			txtID : $("#txtID").val(),
			txTax : $("#txTax").val(),
			ra_exchange : $("input[name=ra_exchange]:checked").val(),
			tx_auto_remove : $("input[name=tx_auto_remove]").val(),
			
			txDeposite : $("#txDeposite").val(),
			
			early_percent : $("#early_percent").val(),
			early_day : $("#early_day").val(),
			last_percent : $("#last_percent").val(),
			last_date : $("#last_date").val(),
			
			early_1 : $("#early_1").val(),
			early_2 : $("#early_2").val(),
			last_1 : $("#last_1").val(),
			last_2 : $("#last_2").val(),
			long_1 : $("#long_1").val(),
			long_2 : $("#long_2").val(),
			long_3 : $("#long_3").val(),
			long_4 : $("#long_4").val(),
			
			dis_exp_1 : $("#dis_exp_1").val(),
			dis_exp_2 : $("#dis_exp_2").val(),
			dis_exp_3 : $("#dis_exp_3").val(),
			dis_exp_4 : $("#dis_exp_4").val(),
			dis_exp_5 : $("#dis_exp_5").val(),
			dis_exp_6 : $("#dis_exp_6").val(),
			dis_exp_7 : $("#dis_exp_7").val(),
			dis_exp_8 : $("#dis_exp_8").val(),
			dis_exp_9 : $("#dis_exp_9").val(),
			
			early_3 : $("#early_3").val(),
			early_date_3 : $("#early_date_3").val(),
			early_4 : $("#early_4").val(),
			early_date_4 : $("#early_date_4").val(),
			early_5 : $("#early_5").val(),
			early_date_5 : $("#early_date_5").val(),
			
			
			p_discount : $("#p_discount").val(),
			p_night : $("#p_night").val(),
			p_from : $("#p_from").val(),
			p_to : $("#p_to").val(),
			
			p_discount_1 : $("#p_discount_1").val(),
			p_night_1 : $("#p_night_1").val(),
			p_from_1 : $("#p_from_1").val(),
			p_to_1 : $("#p_to_1").val(),
			
			p_discount_2 : $("#p_discount_2").val(),
			p_night_2 : $("#p_night_2").val(),
			p_from_2 : $("#p_from_2").val(),
			p_to_2 : $("#p_to_2").val(),
			
			
			
			
			pr_discount : $("#pr_discount").val(),
			pr_free : $("#pr_free").val(),
			pr_from : $("#pr_from").val(),
			pr_to : $("#pr_to").val(),
			
			
			
			ps_book : $("#ps_book").val(),
			ps_pay : $("#ps_pay").val(),
			ps_applicetion : $("#ps_applicetion").val(),
			ps_from : $("#ps_from").val(),
			ps_to : $("#ps_to").val(),
			
			psp_offer : $("#psp_offer").val(),
			psp_fron : $("#psp_fron").val(),
			psp_to : $("#psp_to").val(),
			
			s_deposit : $("#s_deposit").val(),
			
			s_deposit_2 : $("#s_deposit_2").val(),
			
			s_paid : $("#s_paid").val(),
			txVat : $("#txVat").val(),
			
			tax_1 : $("#tax_1").val(),
			tax_2 : $("#tax_2").val(),
			tax_3 : $("#tax_3").val(),
			tax_4 : $("#tax_4").val(),
			tax_5 : $("#tax_5").val(),
			
			pro_exp_1 : $("#pro_exp_1").val(),
			pro_exp_2 : $("#pro_exp_2").val(),
			pro_exp_3 : $("#pro_exp_3").val(),
			pro_exp_4 : $("#pro_exp_4").val(),
			pro_exp_5 : $("#pro_exp_5").val(),
			pro_exp_6 : $("#pro_exp_6").val(),
			pro_exp_7 : $("#pro_exp_7").val(),
			pro_exp_8 : $("#pro_exp_8").val(),
			pro_exp_9 : $("#pro_exp_9").val(),
			pro_exp_10 : $("#pro_exp_10").val(),
			pro_exp_11 : $("#pro_exp_11").val(),
			pro_exp_12 : $("#pro_exp_12").val(),
			pro_exp_13 : $("#pro_exp_13").val(),
			pro_exp_14 : $("#pro_exp_14").val(),
			pro_exp_15 : $("#pro_exp_15").val(),
			pro_exp_16 : $("#pro_exp_16").val(),
			
			pro_rm_1 : $("#pro_rm_1").val(),
			pro_rm_2 : $("#pro_rm_2").val(),
			pro_rm_3 : $("#pro_rm_3").val(),
			pro_rm_4 : $("#pro_rm_4").val(),
			pro_rm_5 : $("#pro_rm_5").val(),
			pro_rm_6 : $("#pro_rm_6").val(),
			pro_rm_7 : $("#pro_rm_7").val(),
			pro_rm_8 : $("#pro_rm_8").val(),
			pro_rm_9 : $("#pro_rm_9").val(),
			pro_rm_10 : $("#pro_rm_10").val(),
			pro_rm_11 : $("#pro_rm_11").val(),
			pro_rm_12 : $("#pro_rm_12").val(),
			pro_rm_13 : $("#pro_rm_13").val(),
			pro_rm_14 : $("#pro_rm_14").val(),
			pro_rm_15 : $("#pro_rm_15").val(),
			pro_rm_16 : $("#pro_rm_16").val(),
			
			pr_discount_15 : $("#pr_discount_15").val(),
			pr_from_15 : $("#pr_from_15").val(),
			pr_to_15 : $("#pr_to_15").val(),
			
			pr_discount_16 : $("#pr_discount_16").val(),
			pr_from_16 : $("#pr_from_16").val(),
			pr_to_16 : $("#pr_to_16").val(),
			no_price : $("#tx_no_price").val(),
						
			va : [],
			stay : [],
			notes : []
		};
		
		$(".tb tbody tr").each(function() {
			datas.va.push({
				date1 : $(this).find("input[name=tx_date1]").val(),
				date2 : $(this).find("input[name=tx_date2]").val(),
				night : $(this).find("input[name=tx_night]").val(),
				val1 : $(this).find("input[name=tx_val1]").val(),
				val2 : $(this).find("input[name=tx_val2]").val(),
				val3 : $(this).find("input[name=tx_val3]").val(),
				val4 : $(this).find("input[name=tx_val4]").val(),
				val5 : $(this).find("input[name=tx_val5]").val(),
				val6 : $(this).find("input[name=tx_val6]").val(),
				val7 : $(this).find("input[name=tx_val7]").val(),
				val8 : $(this).find("input[name=tx_val8]").val(),
				val9 : $(this).find("input[name=tx_val9]").val(),
				val10 : $(this).find("input[name=tx_val10]").val(),
				val11 : $(this).find("input[name=tx_val11]").val(),
				val12 : $(this).find("input[name=tx_val12]").val(),
				val13 : $(this).find("input[name=tx_val13]").val(),
				val14 : $(this).find("input[name=tx_val14]").val(),
				val15 : $(this).find("input[name=tx_val15]").val(),
				val16 : $(this).find("input[name=tx_val16]").val(),
				val17 : $(this).find("input[name=tx_val17]").val(),
				val18 : $(this).find("input[name=tx_val18]").val(),
				val19 : $(this).find("input[name=tx_val19]").val(),
				val20 : $(this).find("input[name=tx_val20]").val(),
				val21 : $(this).find("input[name=tx_val21]").val(),
				val22 : $(this).find("input[name=tx_val22]").val(),
				val23 : $(this).find("input[name=tx_val23]").val(),
				val24 : $(this).find("input[name=tx_val24]").val(),
				val25 : $(this).find("input[name=tx_val25]").val(),
				val26 : $(this).find("input[name=tx_val26]").val(),
				val27 : $(this).find("input[name=tx_val27]").val(),
				val28 : $(this).find("input[name=tx_val28]").val(),
				chk_text_val : $(this).find("input[name=chk_text_val]").val(),
				
				
			});
        });
		
		$(".u-note").children().each(function() {
			datas.notes.push({
				notes : $(this).find("input[name=tx_note]").val(),
				note_exp : $(this).find("input[name=tx_note_exp]").val(),
			});
        });
		//$(".tb tbody tr").each(function() {
			datas.stay.push({
				ps_book_4 : $("#ps_book_4").val(),
				ps_pay_4 : $("#ps_pay_4").val(),
				ps_applicetion_4 : $("#ps_applicetion_4").val(),
				ps_from_4_1 : $("#ps_from_4_1").val(),
				ps_to_4_1 : $("#ps_to_4_1").val(),
				ps_from_4_2 : $("#ps_from_4_2").val(),
				ps_to_4_2 : $("#ps_to_4_2").val(),
				
				ps_book_5 : $("#ps_book_5").val(),
				ps_pay_5 : $("#ps_pay_5").val(),
				ps_applicetion_5 : $("#ps_applicetion_5").val(),
				ps_from_5_1 : $("#ps_from_5_1").val(),
				ps_to_5_1 : $("#ps_to_5_1").val(),
				ps_from_5_2 : $("#ps_from_5_2").val(),
				ps_to_5_2 : $("#ps_to_5_2").val(),
				
				ps_book_6 : $("#ps_book_6").val(),
				ps_pay_6 : $("#ps_pay_6").val(),
				ps_applicetion_6 : $("#ps_applicetion_6").val(),
				ps_from_6_1 : $("#ps_from_6_1").val(),
				ps_to_6_1 : $("#ps_to_6_1").val(),
				ps_from_6_2 : $("#ps_from_6_2").val(),
				ps_to_6_2 : $("#ps_to_6_2").val(),
				
				ps_book_7 : $("#ps_book_7").val(),
				ps_pay_7 : $("#ps_pay_7").val(),
				ps_applicetion_7 : $("#ps_applicetion_7").val(),
				ps_from_7_1 : $("#ps_from_7_1").val(),
				ps_to_7_1 : $("#ps_to_7_1").val(),
				ps_from_7_2 : $("#ps_from_7_2").val(),
				ps_to_7_2 : $("#ps_to_7_2").val(),
				
				stay_10_1 : $("#stay_10_1").val(),
				stay_10_2 : $("#stay_10_2").val(),
				stay_10_3 : $("#stay_10_3").val(),
				stay_10_4 : $("#stay_10_4").val(),
				
				stay_11_1 : $("#stay_11_1").val(),
				stay_11_2 : $("#stay_11_2").val(),
				stay_11_3 : $("#stay_11_3").val(),
				stay_11_4 : $("#stay_11_4").val(),
				stay_11_5 : $("#stay_11_5").val(),
				
				stay_12_1 : $("#stay_12_1").val(),
				stay_12_2 : $("#stay_12_2").val(),
				stay_12_3 : $("#stay_12_3").val(),
				stay_12_4 : $("#stay_12_4").val(),
				stay_12_5 : $("#stay_12_5").val(),
				
				stay_13_1 : $("#stay_13_1").val(),
				stay_13_2 : $("#stay_13_2").val(),
				stay_13_3 : $("#stay_13_3").val(),
				stay_13_4 : $("#stay_13_4").val(),
				stay_13_5 : $("#stay_13_5").val(),
				
			});
        //});
		
		$.ajax({
			url:"apps/properties/xhr/action-pricing-properties.php",
			type:"POST",
			dataType:"json",
			data:{datas:datas},
			success: function(res){
				if(res.success==true){
					$("#dialog_edit_pricing").modal('hide');
					$(".table").DataTable().draw();
					
					//$("#thumbnail_edit").attr('src','../../../../upload/properties.jpg');
				}else{
					fn.engine.noti("Alert",res.msg,'reload',5);
					
					//fn.engine.alert("Alert","Please enter expiration date!");
				}
			}
		},'json');
			
		
	};
	
	
//--------------bedroom photo
	fn.app.properties.properties.popup_photo_bedroom = function(id) {
		$.ajax({
			url: "apps/properties/view/dialog.properties.edit.photo_bedroom.php",
			data: {id:id},
			type: "POST",
			dataType: "html",
			success: function(html){
				$("body").append(html);
			}	
		});
	};
	
	
	var file_upload_bedroom = "#f_bedroom_photo";

	fn.app.properties.properties.upload_bedroom_photo = function(){
		//$(".mybutt_bed").attr('disabled',true);
		$(file_upload_bedroom).click();
		$(file_upload_bedroom).unbind();
		
		$(file_upload_bedroom).on("change",function(e){
			var files = this.files
			$("#btn_upp_bedroom_photo").click();    
		});
	};
	
	fn.app.properties.properties.upload_bedroom_photo_file = function(){ 
		var data = new FormData($("#form_add_bedroom_photo")[0]);
		var s = '';
		jQuery.ajax({
			url: 'apps/properties/xhr/action-up-bedroom-photo.php',
			data: data,
			cache: false,
			contentType: false,
			processData: false,
			type: 'POST',
			dataType: 'json',
			success: function(response){
				if(response.success){
					
					//$(".thumbs_photo").children('.pho').remove();
						s += '<div class="col-md-2 pho">';
							s += '<input type="hidden" class="paths" name="path_photo" value="'+response.path+'">';
							s += '<input type="hidden" name="txt_photo" value="'+response.path+'">';
							s += '<img src="<?php echo S3_BUCKET_URL ?>'+response.path+'"  width="100%" class="img-thumbnail pho">';
							s += '<input type="text" name="txt_photo_name" class="form-control">';
							s += '<button type="button" class="btn btn-danger" style="width:100%" onclick="fn.app.properties.properties.remove_bedroom_photo_file(this);">';
								s += '<i class="fa fa-times" aria-hidden="true"></i>';
								s += '<input type="hidden" class="paths" name="path_photo" value="'+response.path+'">';
							s += '</button>';
						s += '</div>';
					//s += '</div>';
					$(".thumbs_photo").append(s);
					//$(".mybutt_bed").attr('disabled',false);
					/*$("#path_photo").val(response.path);
					$("#txt_photo").val(response.path);
					$(".phos").attr('src',response.path);
					$(".bc").show();*/
					/*$("#tblbrand").DataTable().draw();
					$("#dialog_edit_icon").modal('hide');*/
				}else{
					fn.engine.alert("Alert",response.msg);
				}
				//$(".mybutt_bed").attr('disabled',false);	
			}
		});
	};
	
	fn.app.properties.properties.remove_bedroom_photo_file = function(me){
		var file_path = $(me).parent().find('.paths').val();
		//alert(file_path);
		$(me).parent().remove();
		/*$.ajax({
			url:"apps/properties/xhr/action-remove-photo.php",
			type:"POST",
			dataType:"json",
			data:{path:file_path},
			success: function(resp){
				if(resp.status==true)
				{
					$(me).parent().remove();
					fn.engine.alert("Alert",response.msg);
				}
				else
				{
					fn.engine.alert("Alert",response.msg);
				}
				
			}
		});*/
	};
	
	
	//-------------------------old
	//fn.app.properties.properties.save_bedroom_photo = function(){
//		var datas = {
//			txtID : $("#txtID").val(),
//			photo : []
//		};
//		$(".pho").each(function() {
//			datas.photo.push({
//				photo : $(this).find("input[name=txt_photo]").val(),
//				name : $(this).find("input[name=txt_photo_name]").val(),
//			});
//        });
//		
//		$.ajax({
//			url:"apps/properties/xhr/action-bedroom-photo-properties.php",
//			type:"POST",
//			dataType:"json",
//			data:{datas:datas},
//			success: function(res){
//				if(res.success){
//					$("#tblSlide").DataTable().draw();
//					$("#dialog_edit_pricing").modal('hide');
//					//$("#thumbnail_edit").attr('src','../../../../upload/properties.jpg');
//				}else{
//					fn.engine.alert("Alert",response.msg);
//				}
//			}
//		},'json');
//			
//	}
	//-------------------------old
	
	fn.app.properties.properties.save_bedroom_photo = function(){
		var datas = {
			txtID : $("#txtID").val(),
            txb_det : $("#txb_det").val(),
			photo : []
		};
		$(".pho_2").each(function() {
			datas.photo.push({
					photo : $(this).find("input[name=txt_photo]").val(),
					name : $(this).find("input[name=txt_photo_name]").val(),
				});
				//console.log(1);
			/*if($(this).find('[name="bedroom_chk"]:checked').size() == 1)
			{
				datas.photo.push({
					photo : $(this).find("input[name=txt_photo]").val(),
					name : $(this).find("input[name=txt_photo_name]").val(),
				});
				console.log(1);
			}
			else
			{
				
				console.log(2);
			}*/
			
        });
		
		$.ajax({
			url:"apps/properties/xhr/action-bedroom-photo-properties.php",
			type:"POST",
			dataType:"json",
			data:{datas:datas},
			success: function(res){
				if(res.success){
					//$("#tblSlide").DataTable().draw();
					
					$("#dialog_edit_pricing").modal('hide');
					//$("#tblSlide").Datatable().ajax.reload(null,false);
					$("#tblSlide").DataTable().ajax.reload(null,false);
					//$("#thumbnail_edit").attr('src','../../../../upload/properties.jpg');
				}else{
					fn.engine.alert("Alert",response.msg);
				}
			}
		},'json');
			
	}
	//--------------bedroom photo	
	
	
	
	//------------ heightkight photo property
	fn.app.properties.properties.popup_photo_heightlight = function(id) {
		$.ajax({
			url: "apps/properties/view/dialog.properties.change.photo.heightlight.php",
			data: {id:id},
			type: "POST",
			dataType: "html",
			success: function(html){
				$("body").append(html);
			}	
		});
	};
	
	var file_upload_long = "#f_long";

	fn.app.properties.properties.upload_long = function(){
		$(file_upload_long).click();
		$(file_upload_long).unbind();
		
		$(file_upload_long).on("change",function(e){
			var files = this.files
			$("#btn_upp_long").click();    
		});
	};
	
	var file_upload_short = "#f_short";

	fn.app.properties.properties.upload_short = function(){
		$(file_upload_short).click();
		$(file_upload_short).unbind();
		
		$(file_upload_short).on("change",function(e){
			var files = this.files
			$("#btn_upp_short").click();    
		});
	};
	
	fn.app.properties.properties.upload_long_file = function(){
		var data = new FormData($("#form_add_hl_long")[0]);
		var s = '';
		jQuery.ajax({
			url: 'apps/properties/xhr/action-up-photo.php',
			data: data,
			cache: false,
			contentType: false,
			processData: false,
			type: 'POST',
			dataType: 'json',
			success: function(response){
				if(response.success){
					$("#tx_long").val(response.path);
					$("#long").attr('src','<?php echo S3_BUCKET_URL ?>'+response.path);
					$(".bc").show();
					/*$("#tblbrand").DataTable().draw();
					$("#dialog_edit_icon").modal('hide');*/
				}else{
					fn.engine.alert("Alert",response.msg);
				}	
			}
		});
	};
	
	fn.app.properties.properties.upload_short_file = function(){
		var data = new FormData($("#form_add_hl_short")[0]);
		var s = '';
		jQuery.ajax({
			url: 'apps/properties/xhr/action-up-photo.php',
			data: data,
			cache: false,
			contentType: false,
			processData: false,
			type: 'POST',
			dataType: 'json',
			success: function(response){
				if(response.success){
					$("#tx_short").val(response.path);
					$("#short").attr('src','<?php echo S3_BUCKET_URL ?>'+response.path);
					$(".bc").show();
					/*$("#tblbrand").DataTable().draw();
					$("#dialog_edit_icon").modal('hide');*/
				}else{
					fn.engine.alert("Alert",response.msg);
				}	
			}
		});
	};
	
	fn.app.properties.properties.save_photo_book_heightlight = function(){
			$.post('apps/properties/xhr/action-update-photo-heightlight.php',$('#form_edit_property_photo_heightlight').serialize(),function(response){
				if(response.success){
					$("#tblSlide").DataTable().draw();
					$("#dialog_edit_pricing").modal('hide');
					//$("#thumbnail_edit").attr('src','../../../../upload/properties.jpg');
				}else{
					//fn.engine.alert("Alert",response.msg);
				}
			},'json');
			return false;
	};
	//------------ heightkight photo property
	
	
	
	
	
	//------------ cover photo
	fn.app.properties.properties.popup_cover = function(id) {
		$.ajax({
			url: "apps/properties/view/dialog.properties.cover.php",
			data: {id:id},
			type: "POST",
			dataType: "html",
			success: function(html){
				$("body").append(html);
			}	
		});
	};
	
	var file_upload_cover = "#f_cover";

	fn.app.properties.properties.upload_cover = function(){
		$(file_upload_cover).click();
		$(file_upload_cover).unbind();
		
		$(file_upload_cover).on("change",function(e){
			var files = this.files
			$("#btn_upp_cover").click();    
		});
	};
	
	
	
	fn.app.properties.properties.upload_cover_file = function(){
		var data = new FormData($("#form_add_cover")[0]);
		var format_photo_name =$('#format_photo_name').val();
		var s = '';
		//Edit by Parinyimz 20190812
		fn.app.properties.properties.remove_photo_file('cover');
		var url = 'apps/properties/xhr/action-up-photo.php?format_photo_name='+format_photo_name;
		jQuery.ajax({
			url: url,
			data: data,
			cache: false,
			contentType: false,
			processData: false,
			type: 'POST',
			dataType: 'json',
			success: function(response){
				if(response.success){
					$("#tx_cover").val(response.path);
					$("#imgcover").attr('src','<?php echo S3_BUCKET_URL ?>'+response.path);
					$(".bc").show();
					/*$("#tblbrand").DataTable().draw();
					$("#dialog_edit_icon").modal('hide');*/
					fn.app.properties.properties.save_photo_cover('show');
				}else{
					fn.engine.alert("Alert",response.msg);
				}	
			}
		});
	};
	
	
	fn.app.properties.properties.save_photo_cover = function(modal){
		 var modal =(modal == 'show')? modal:'hide';
			$.post('apps/properties/xhr/action-update-photo-cover.php',$('#form_edit_cover').serialize(),function(response){
				if(response.success){
					$("#tblSlide").DataTable().draw();
					$("#dialog_edit_pricing").modal(modal);
					//$("#thumbnail_edit").attr('src','../../../../upload/properties.jpg');
				}else{
					//fn.engine.alert("Alert",response.msg);
				}
			},'json');
			return false;
	};
	//Edit by parinyimz 20180814
	fn.app.properties.properties.remove_photo_file = function(name){
			var path =(name == 'cover')? $("#tx_cover").val().split("/upload"):$("#tx_floor").val().split("/upload");
			//console.log(path);
			var url ='inc/delete_photo.php?path=/upload'+path[1];
			//console.log(url);
			$.ajax({
				type: "GET",
				url: url,
				dataType: "json",
				success : function(data){
					if(data.success == '200'){	
					}
				}
			});	
	};
	//------------ cover photo
	
	
	
	
	function loadsubdes(me)
	{
		$("#form_edit_property #cbbsubDestination").children().remove();
		$.ajax({
			url: "apps/properties/xhr/action-load-subdestination.php",
			data: {id:$(me).val()},
			type: "POST",
			dataType: "html",
			success: function(html){
				$("#form_edit_property #cbbsubDestination").append(html);
			}	
		});
	}
	
	
	//------------ floor plan photo
	fn.app.properties.properties.plan = function(id) {
		$.ajax({
			url: "apps/properties/view/dialog.properties.floor_plan.php",
			data: {id:id},
			type: "POST",
			dataType: "html",
			success: function(html){
				$("body").append(html);
			}	
		});
	};
	
	var file_upload_floor = "#f_floor";

	fn.app.properties.properties.upload_floor = function(){
		$(file_upload_floor).click();
		$(file_upload_floor).unbind();
		
		$(file_upload_floor).on("change",function(e){
			var files = this.files
			$("#btn_upp_floor").click();    
		});
	};
	
	
	
	fn.app.properties.properties.upload_floor_file = function(){
		var data = new FormData($("#form_add_floor")[0]);
		var format_photo_name =$('#format_photo_name').val();
		var s = '';
		//Edit by Parinyimz 20190812
		fn.app.properties.properties.remove_photo_file('floor');
		var url = 'apps/properties/xhr/action-up-photo.php?format_photo_name='+format_photo_name;
		//console.log(url);
		jQuery.ajax({
			url: url,
			data: data,
			cache: false,
			contentType: false,
			processData: false,
			type: 'POST',
			dataType: 'json',
			success: function(response){
				if(response.success){
					//$("#tx_floor,#tx_floor2").val(response.path);
					//$("#img_floor").attr('src','<?php echo S3_BUCKET_URL ?>'+response.path);
					//$(".bc").show();
					//(".but_remove").show();
					
					var z='';
					z+='<div class="col-md-4 top15">';
						z+='<img src="'+'<?php echo S3_BUCKET_URL ?>'+response.path+'" id="img_floor" width="100%"><br>';
						z+='<input type="hidden" id="tx_floor" name="tx_floor[]" class="form-control" value="'+'<?php echo S3_BUCKET_URL ?>'+response.path+'"><br>';
						z+='<button type="button" class="btn btn-danger but_remove" style="width:100%;<?php echo $sh1;?>" onClick="remove_fl_photo(this)"><i class="fa fa-times" aria-hidden="true"></i></button>';
					z+='</div>';
					$(".box_pho").append(z);
					$("#f_floor").val('');
					/*$("#tblbrand").DataTable().draw();
					$("#dialog_edit_icon").modal('hide');*/
					fn.app.properties.properties.save_photo_floor('show');
				}else{
					fn.engine.alert("Alert",response.msg);
				}	
			}
		});
	};
	
	
	fn.app.properties.properties.save_photo_floor = function(modal){
		var modal =(modal == 'show')? modal:'hide';
			$.post('apps/properties/xhr/action-update-photo-floor.php',$('#form_edit_floor').serialize(),function(response){
				if(response.success){
					$("#tblSlide").DataTable().draw();
					$("#dialog_edit_pricing").modal(modal);
					//$("#thumbnail_edit").attr('src','../../../../upload/properties.jpg');
				}else{
					//fn.engine.alert("Alert",response.msg);
				}
			},'json');
			return false;
	};
	//------------ floor plan photo
</script>
