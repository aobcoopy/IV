<?php
    include_once "apps/properties/view/dialog.properties.add.php";
    ?>
<script style="text/javascript">

$("#panel-heading-group").append('<button id="btnAddGroup" type="button" class="btn btn-primary pull-right">Add</button>');
$("#btnAddGroup").click(function(){
                        $("#dialog_add_properties").modal('show');
                        //fn.app.properties.properties.form_add();
                        });
$('#dialog_add_properties').on('shown.bs.modal', function () {
                               $("#txtName").focus();
                               });

//fn.app.properties.properties.form_add = function(id) {
//        $.ajax({
//            url: "apps/properties/view/dialog.properties.add.php",
//            data: {},
//            type: "POST",
//            dataType: "html",
//            success: function(html){
//                $("body").append(html);
//                $("#dialog_add_properties").modal('show');
//            }
//        });
//    };

fn.app.properties.properties.add = function(){
    if(document.getElementById("txName").value=='')
    {
        alert('Please fill ypur data');
        $("#txName").focus();
        return false;
    }
    /*else if(document.getElementById("txt_photo").value=='')
     {
     alert('Please fill ypur data');
     $("#txt_photo").click();
     return false;
     }*/
    else
    {
        /*var results = format_photo($("#txName").val());
        if(results == false){
            alert('Please check data format ex;Baan Banyan | 4-6 Bedroom Villa - Kamala Beach, Phuket');
            $("#txName").focus();
            return false;
        }else{*/
            $.post('apps/properties/xhr/action-add-properties.php',$('#form_add_properties').serialize(),function(response){
                   if(response.success){
                   $("#tblSlide").DataTable().draw();
                   $("#dialog_add_properties").modal('hide');
                   $("#form_add_properties")[0].reset();
                   $("#path_photo").val('');
                   $("#txt_photo").val('');
                   $(".phos").attr('src','');
                   $(".bc").hide();
                   $(".thumbs").children().remove();
                   window.location.reload();
                   //$("#thumbnail").attr('src','../../../../upload/properties.jpg');
                   }else{
                   fn.engine.alert("Alert",response.msg);
                   }
                   },'json');
            return false;
        /*}*/
    }
};

function format_photo(name){
    //console.log(name);
    //TXT1
    name = name.toLowerCase();
   // console.log(name);
    var tmp_name_1 = name.split('|');
   // console.log('1='+tmp_name_1);
    if(tmp_name_1[1]== undefined){
        return false;
     }
    var arr =/([,.*+?^=!:${}()|\[\]\/\\])/;
    var txt_1 =tmp_name_1[0].replace(arr,"");
    var txt_1 =txt_1.split(" ").join("-");
    //TXT2
    //var txt_2 = tmp_name_1[1].split('villa -');
	var txt_2 = tmp_name_1[1].split('-');
   // console.log('2='+txt_2);
     if(txt_2[1]== undefined){
         return false;
     }
    var txt_2 = txt_2[1].split(',');
    //TXT 3
    var txt_3 = txt_2[1].split(" ").join("");
    //console.log('3='+txt_3);
     if(txt_3 == undefined){
         return false;
     }
    txt_2 =txt_2[0].trim();
    txt_2 =txt_2.split(" ").join("-");
    var sum_txt = txt_1+"-"+txt_2+"-"+txt_3;
     //console.log('4='+sum_txt);
    return true;
}













fn.app.properties.properties.popup_photo = function(id) {
    $.ajax({
           url: "apps/properties/view/dialog.properties.edit.photo.php",
           data: {id:id},
           type: "POST",
           dataType: "html",
           success: function(html){
           $("body").append(html);
           }
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
           $("#tblSlide").DataTable().draw();
           $("#dialog_edit_pricing").modal(config_modal);
           //$("#thumbnail_edit").attr('src','../../../../upload/properties.jpg');
           }else{
           fn.engine.alert("Alert",response.msg);
           }
           }
           },'json');
    
}



//--------------upload floor plan
var file_upload_plan = "#f_Photo_plan";

fn.app.properties.properties.upload_photo_plan = function(){
    $(".mybutt").attr('disabled',true);
    $(file_upload_plan).click();
    $(file_upload_plan).unbind();
    
    $(file_upload_plan).on("change",function(e){
                           var files = this.files
                           $("#btn_upp_plan").click();
                           });
};

fn.app.properties.properties.upload_photo_plan = function(){
    var data = new FormData($("#form_add_photo_plan")[0]);
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
                $(".floor_plan_add").attr('src','<?php echo S3_BUCKET_URL ?>'+response.path);
                $("#txplan").val(response.path);
                }else{
                fn.engine.alert("Alert",response.msg);
                }
                }
                });
};








//----------------upload photo gallery
var file_upload = "#f_Photo";

fn.app.properties.properties.upload_photo = function(){
    $(".mybutt").attr('disabled',true);
    $(file_upload).click();
    $(file_upload).unbind();
    $(file_upload).on("change",function(e){
                      var files = this.files
                      $("#btn_upp").click();
                      });
};

fn.app.properties.properties.upload_photo_file = function(){
    //console.log('upload_photo_file');
    var data = new FormData($("#form_add_photo")[0]);$(".mybutt").attr('disabled',false);
    var format_photo_name =$('#format_photo_name').val();
    var s = '';
    //console.log(format_photo_name);
    //Edit by Parinyimz 20190812
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
                s += '<button type="button" class="btn btn-danger delete_only_one" style="width:100%" onclick="fn.app.properties.properties.remove_photo_file(this);">';
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
					//$("#tblSlide").Datatable().ajax.reload(null,false);
                }else{
                alert(response.msg);
                $(".mybutt").attr('disabled',false);
                }$(".mybutt").attr('disabled',false);
                }
                });
};

/*fn.app.properties.properties.remove_photo_file = function(me){
 var file_path = $(me).parent().find('.paths').val();
 //alert(file_path);
 $(me).parent().remove();
 //var url = 'inc/format_photo?file_path='+file_path;
 //console.log(url);
 $.ajax({
 url:url,
 type:"GET",
 dataType:"json",
 //data:{path:file_path},
 success: function(resp){
 if(resp.status==true){
 $(me).parent().remove();
 fn.engine.alert("Alert",response.msg);
 }else{
 fn.engine.alert("Alert",response.msg);
 }
 }
 });
 };*/
//Edit by parinyimz 20180813
fn.app.properties.properties.remove_photo_file = function(me){
    
    //if($(me).attr('class') == "btn btn-danger delete_only_one"){// delete only one
    //console.log($(me).attr('class'));
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
    /*}else if($(me).attr('class') == "btn btn-default delete_tmp_photo" || $(me).attr('class') == "close delete_tmp_photo"){
     $(".new_upload_photo").each(function() {
     var path = $(this).find("input[name=txt_photo]").val();
     var url ='inc/delete_photo.php?path='+path;
     $.ajax({
     type: "GET",
     url: url,
     dataType: "json",
     success : function(data){
     if(data.success == '200'){
     $(me).parent().remove();
     }
     }
     });
     });
     }*/
};




//---------------------pdf-----------
var file_upload_pdf = "#f_pdf";

fn.app.properties.properties.upload_pdf = function(){
    $(file_upload_pdf).click();
    $(file_upload_pdf).unbind();
    
    $(file_upload_pdf).on("change",function(e){
                          var files = this.files
                          $("#btn_upp_pdf").click();
                          });
};

fn.app.properties.properties.upload_pdf_file = function(){
    var data = new FormData($("#form_add_pdf")[0]);
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
                $("#txpdf").val(response.path);
                $("#path_photo").val(response.path);
                $("#txt_photo").val(response.path);
                $(".phos").attr('src',response.path);
                $(".bc").show();
                /*$("#tblbrand").DataTable().draw();
                 $("#dialog_edit_icon").modal('hide');*/
                }else{
                fn.engine.alert("Alert",response.msg);
                }
                }
                });
};

fn.app.properties.properties.remove_photo = function(me){
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
           $("#path_photo").val('');
           $("#txpdf").val('');
           $("#txt_photo").val('');
           $(".phos").attr('src','');
           $(".bc").hide();
           fn.engine.alert("Alert",response.msg);
           }
           else
           {
           fn.engine.alert("Alert",response.msg);
           }
           
           }
           });
};


function loadsubdes_add(me)
{
    $("#form_add_properties #cbbsubDestination").children().remove();
    $.ajax({
           url: "apps/properties/xhr/action-load-subdestination.php",
           data: {id:$(me).val()},
           type: "POST",
           dataType: "html",
           success: function(html){
           $("#form_add_properties #cbbsubDestination").append(html);
           }
           });
}

</script>


