<script type="text/javascript" src="apps/dashboard/app.js"></script>
<ul class="breadcrumb">
	<li><a href="#">Home</a></li>					
	<li class="active">Dashboard</li>
</ul>
<div class="page-content-wrap">
	<div class="row">
    	<div class="col-md-12">
            <div class="col-md-6">
            <?php
                include_once "apps/dashboard/view/widget-villa.php";
            ?>
            </div>
            <div class="col-md-6">
            <?php
                include_once "apps/dashboard/view/widget-clock.php";
            ?>
            </div>
        </div>
        <div class="col-md-12">
        	<div class="text-center" style="font-size:30px;">Exchange Rate</div>
            <div class="col-md-6">
            <?php
                include_once "apps/dashboard/view/widget-us.php";
            ?>
            </div>
            <div class="col-md-6">
            <?php
                include_once "apps/dashboard/view/widget-thb.php";
            ?>
            </div>
            <br><br><br>
        </div>
		<div class="col-md-12">
        	<div class="text-center" style="font-size:30px;">Shortcuts</div>
            <div class="col-md-3">
            <?php
                include_once "apps/dashboard/view/widget-quick-link.php";
            ?>
            </div>
            <div class="col-md-3">
            <?php
                include_once "apps/dashboard/view/widget-villa-comment.php";
            ?>
            </div> 
            <div class="col-md-3">
			<?php
                include_once "apps/dashboard/view/widget-message-count.php";
            ?>
            </div>
            <div class="col-md-3">
            <?php
				include_once "apps/dashboard/view/widget-addressmap.php";
                // เอาออกชั่วคราว include_once "apps/dashboard/view/widget-user-count.php";
            ?>
            </div>
        </div>
        
        <div class="col-md-12">
        	<div class="col-md-3">
            <?php
                include_once "apps/dashboard/view/widget-vf_phuket.php";
            ?>
            </div>
            <div class="col-md-3">
            <?php
                //include_once "apps/dashboard/view/widget-villa_form.php";
				include_once "apps/dashboard/view/widget-subdestinations.php";
            ?>
            </div> 
            <div class="col-md-3">
            <?php
               // เอาออกชั่วคราว include_once "apps/dashboard/view/widget-autochat.php";
			   include_once "apps/dashboard/view/widget-category.php";
            ?>
            </div> 
            <div class="col-md-3">
            <?php
                 include_once "apps/dashboard/view/widget-yacht.php";
            ?>
            </div> 
       	</div>
        
        <div class="col-md-12">
        	<div class="col-md-3">
            <?php
                include_once "apps/dashboard/view/widget-destinations.php";
            ?>
            </div>
            <div class="col-md-3">
            <?php
                
            ?>
            </div> 
            <div class="col-md-3">
            <?php
                
            ?>
            </div> 
            <div class="col-md-3">
            <?php
               
            ?>
            </div> 
       	</div>
        
        <div class="col-md-12">
        	
            <div class="panel panel-danger">
                <div class="panel-heading"><strong>Remark</strong></div>
                <div class="panel-body">
                    <strong>Auto Remove / Year Transfer</strong>
                    <br>Text Mode - Compatible with text format is Ex.11 Feb 2021 - 17 Feb 2021
                    
                </div>
            </div>
            
            <!-- เอาออกชั่วคราว <div class="col-md-6">
                <div class="text-center" style="font-size:30px;">Auto Remove Rental Rate Soon</div>
                <h4 class="text-center">Auto delete at 00:00</h4><br>
                <img src="../../../../upload/loading.gif" width="50" alt="" class="text-center center-block aLoad2">
                <div class="show_remove"></div>
                <?php
                    //include_once "apps/dashboard/view/widget-auto-remove.php";
                ?>
            </div>  เอาออกชั่วคราว  --> 
            <div class="col-md-12">
            	<a href="?app=transfer"><button type="button" class="btn btn-warning pull-right" onClick="">Transfer Page</button></a>
                <div class="text-center" style="font-size:30px;">Transfer Villa Rental Rate</div>
                
                <h4 class="text-center">Transfer villa rental rate to the next year</h4>
                	
                	<img src="../../../../upload/loading.gif" width="50" alt="" class="text-center center-block aLoad">
                    <div class="box_transfer"></div>
                <?php
                    //include_once "apps/dashboard/view/widget-transfer-year.php";
                ?>
            </div>
        </div>
        
        
		
		
       
       
		
        
		
        
		<?php
		//if($dbc->HasRecord("users","id = '".$_SESSION['auth']['user_id']."' and super >0"))
//		{
//			echo '<div class="col-md-3">';
//			include_once "apps/dashboard/view/widget-clear-photo.php";
//			echo '</div>';
//		}
			
		?>
		
        
	</div>
</div>	
<script>
$(document).ready(function(e) {
	//setTimeout(function(){
		fn.app.dashboard.load_transfer();
		/////////fn.app.dashboard.check_remove_data(); เอาออกชั่วคราว
	//},1000);
    
});

fn.app.dashboard.del_remove_data = function()
{
	var Delconf = confirm('Are you sure to Delete! ');
	if(Delconf==false)
	{
		return false;
	}
	else
	{
		$(".aLoad2").show();
		$.ajax({
			url: "apps/dashboard/xhr/action-del-data-auto-remove.php",
			data: {},
			type: "POST",
			dataType: "json",
			success: function(res){
				fn.app.dashboard.load_auto_remove();
			}	
		});
	}
}

fn.app.dashboard.check_remove_data = function()
{
	$(".aLoad2").show();
	$.ajax({
		url: "apps/dashboard/xhr/action-check-data-auto-remove.php",
		data: {},
		type: "POST",
		dataType: "json",
		success: function(res){
			fn.app.dashboard.load_auto_remove();
		}	
	});
}
fn.app.dashboard.load_auto_remove = function()
{
	$.ajax({
		url: "apps/dashboard/view/widget-auto-remove.php",
		data: {},
		type: "POST",
		dataType: "html",
		success: function(res){
			$(".show_remove").html(res);
			$(".aLoad2").hide();
		}	
	});
}

fn.app.dashboard.load_transfer = function()
{
	$.ajax({
		url: "apps/dashboard/view/widget-transfer-year.php",
		data: {},
		type: "POST",
		dataType: "html",
		success: function(res){
			$(".box_transfer").html(res);
			$(".aLoad").hide();
		}	
	});
}


fn.app.dashboard.transfer_year = function(me,pid){
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
			$(".aLoad").show();
			$.ajax({
				url: "apps/dashboard/xhr/action-transfer-year.php",
				data: {id:pid},
				type: "POST",
				dataType: "json",
				success: function(res){
					if(res.status==true)
					{
						//$(".aLoad").hide();
						fn.app.dashboard.load_transfer();
					}
					else
					{
						fn.engine.alert("Alert",res.msg);
					}
				}	
			});
		}
}
</script>

<style>
.panel-success1>.panel-heading {
    color: #3c763d;
    background-color: #dff0d8 !important;
    border-color: #d6e9c6;
}
.panel-warning1>.panel-heading {
    color: #8a6d3b;
    background-color: #fcf8e3 !important;
    border-color: #faebcc;
}
.panel-danger1>.panel-heading {
    color: #a94442;
    background-color: #f2dede !important;
    border-color: #ebccd1;
}
.alert-warning1 {
    color: #8a6d3b;
    background-color: #fcf8e3 !important;
    border-color: #faebcc;
}
.alert-success1 {
    color: #3c763d;
    background-color: #dff0d8 !important;
    border-color: #d6e9c6;
}
.panel-danger>.panel-heading {
    color: #a94442;
    background-color: #f2dede !important;
    border-color: #ebccd1;
}
.panel-warning>.panel-heading {
    color: #8a6d3b;
    background-color: #fcf8e3 !important;
    border-color: #faebcc;
}
</style>



