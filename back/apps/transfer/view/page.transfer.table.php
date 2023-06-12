<?php
include_once "../../../config/define.php";
include_once "../../../libs/class/db.php";
include_once "../../../libs/class/minerva.php";

@ini_set('display_errors',DEBUG_MODE?1:0);
date_default_timezone_set(DEFAULT_TIMEZONE);

$dbc = new dbc;
$dbc->Connect();
$os = new minerva($dbc);
?>
<div class="col-md-12">
    <div class="panel panel-danger">
        <div class="panel-heading"><strong>Remark</strong></div>
        <div class="panel-body">
            <strong>Auto Remove / Year Transfer</strong>
            <br>Text Mode - Compatible with text format is Ex.11 Feb 2021 - 17 Feb 2021
            
        </div>
    </div>
</div>
<div class="col-md-6">
	<div class="panel panel-warning">
		<div id="panel-heading-group panel-warning" class="panel-heading">
	        <h3 class="panel-title">Ready to Transfer <strong><i class="fa fa-exclamation-triangle" aria-hidden="true"></i> Please check the information after pressing transfer.</strong></h3>
           <!-- <button type="button" class="btn btn-warning pull-right" onClick="fn.app.transfer.transfer_all();">Transfer All</button>-->
	    </div>
	    <div class="panel-body">
        	<h3 style="float:left;">Data is Type <span class="label label-warning">Date</span></h3>
            <h3> Data is Type <span class="label label-danger">TEXT</span></h3>
	       <img src="../../../../upload/loading.gif" width="50" alt="" class="text-center center-block aLoad">
           <div class="page_ready_transfer"></div>

	    </div>
	</div>
</div>


<div class="col-md-6">
	<div class="panel panel-success">
		<div id="panel-heading-group" class="panel-heading">
	        <h3 class="panel-title">Transfer Success <strong> <i class="fa fa-exclamation-triangle" aria-hidden="true"></i> Shows only all updated information for the year <?php echo date("Y")+1;?>.</strong></h3>
            <!--<button type="button" class="btn btn-danger pull-right" onClick="fn.app.transfer.reverse_all();">Reverse All</button>-->
	    </div>
	    <div class="panel-body">
	        <img src="../../../../upload/loading.gif" width="50" alt="" class="text-center center-block aLoad2">
            <div class="page_success_transfer"></div>
            

	    </div>
	</div>
</div>



<script>
$(document).ready(function(e) {
	//setTimeout(function(){
		fn.app.transfer.load_ready_transfer();
		fn.app.transfer.load_success_transfer();
	//},1000);
    
});
fn.app.transfer.load_ready_transfer = function()
{
	$(".aLoad").show();
	$.ajax({
		url: "apps/transfer/view/page.ready.transfer.php",
		data: {},
		type: "POST",
		dataType: "html",
		success: function(res){
			$(".page_ready_transfer").html(res);
			$(".aLoad").hide();
		}	
	});
}
fn.app.transfer.load_success_transfer = function()
{
	$(".aLoad2").show();
	$.ajax({
		url: "apps/transfer/view/page.success.transfer.php",
		data: {},
		type: "POST",
		dataType: "html",
		success: function(res){
			$(".page_success_transfer").html(res);
			$(".aLoad2").hide();
		}	
	});
}

fn.app.transfer.transfer_year = function(me,pid){
	/*var z='';
	z+='<input type"text" id="tx_year" name="tx_year">';
	$(me).parent().append(z);*/
	
  	/*var d = new Date();
    var n = d.getFullYear();
	var Delconf = prompt('Are you sure to Transfer! Fill a year below',n);*/
	var Delconf = confirm('Are you sure to Transfer! ');
		if(Delconf==false)
		{
			return false;
		}
		else
		{
			$(".aLoad,.aLoad2").show();
			$.ajax({
				url: "apps/transfer/xhr/action-transfer-year.php",
				data: {id:pid},
				type: "POST",
				dataType: "json",
				success: function(res){
					if(res.status==true)
					{
						fn.app.transfer.load_ready_transfer();
						fn.app.transfer.load_success_transfer();
					}
					else
					{
						fn.engine.alert("Alert",res.msg);
					}
				}	
			});
		}
}

fn.app.transfer.transfer_all = function()
{
	var Delconf = confirm('Are you sure to Transfer! ');
		if(Delconf==false)
		{
			return false;
		}
		else
		{
			$(".aLoad,.aLoad2").show();
			$.ajax({
				url: "apps/transfer/xhr/action-transfer-all.php",
				data: $("#form_ar").serialize(),
				type: "POST",
				dataType: "html",
				success: function(res){
						fn.app.transfer.load_ready_transfer();
						fn.app.transfer.load_success_transfer();
				}	
			});
		}
}

fn.app.transfer.reverse_all = function()
{
	var Delconf = confirm('Are you sure to Reverse! ');
		if(Delconf==false)
		{
			return false;
		}
		else
		{
			$(".aLoad,.aLoad2").show();
			$.ajax({
				url: "apps/transfer/xhr/action-reverse-all.php",
				data: $("#form_ar_reverse").serialize(),
				type: "POST",
				dataType: "html",
				success: function(res){
						fn.app.transfer.load_ready_transfer();
						fn.app.transfer.load_success_transfer();
				}	
			});
		}
}

fn.app.transfer.reverse = function(me,pid){
	var Delconf = confirm('Are you sure to Reverse! ');
		if(Delconf==false)
		{
			return false;
		}
		else
		{
			$(".aLoad,.aLoad2").show();
			$.ajax({
				url: "apps/transfer/xhr/action-reverse-year.php",
				data: {id:pid},
				type: "POST",
				dataType: "json",
				success: function(res){
					if(res.status==true)
					{
						fn.app.transfer.load_ready_transfer();
						fn.app.transfer.load_success_transfer();
					}
					else
					{
						fn.engine.alert("Alert",res.msg);
					}
				}	
			});
		}
}

  /*$(function() {
	$("#panel-heading-group").append('<button id="btnSavesort" type="button" onclick="fn.app.blog_instagram.blog_instagram.saveig()" class="btn btn-primary pull-right">Save</button>');
	$( "#tblSlide" ).children().sortable();
	$( "#tblSlide " ).disableSelection();
  });
*/


</script>


<style>
.panel-success>.panel-heading {
    color: #3c763d;
    background-color: #dff0d8 !important;
    border-color: #d6e9c6;
}
.panel-warning>.panel-heading {
    color: #8a6d3b;
    background-color: #fcf8e3 !important;
    border-color: #faebcc;
}
.alert-warning {
    color: #8a6d3b;
    background-color: #fcf8e3 !important;
    border-color: #faebcc;
}
.alert-success {
    color: #3c763d;
    background-color: #dff0d8 !important;
    border-color: #d6e9c6;
}
.panel-danger>.panel-heading {
    color: #a94442;
    background-color: #f2dede !important;
    border-color: #ebccd1;
}
.panel-info>.panel-heading {
    color: #31708f;
    background-color: #d9edf7 !important;
    border-color: #bce8f1;
}
</style>

