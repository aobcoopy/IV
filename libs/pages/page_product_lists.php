<meta name="robots" content="noindex">
<?php
$id = $_REQUEST['id'];//base64_decode($_REQUEST['id']);//echo $id;
if(isset($_SESSION['auth']['user_id']))
{
	$actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
	?>
    <!--<div class="container top50"><br><br>
        <div class="col-12 text-center">
            <button type="button" class="btn btn-primary btn_back" onClick="goback()"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button>
            <input type="text" class="tx_my_link" value="<?php echo $actual_link;?>">
            <button type="button" class="btn btn-success " onClick="copylink()"><i class="fa  fa-clipboard" aria-hidden="true"></i> Copy Link</button>
        </div>
    </div>-->
    
    <!--<button type="button" class="btn btn-success btn_back" onClick="view_form()"><i class="fa fa-search" aria-hidden="true"></i> View</button>-->
    <script>
	function goback()
	{
		window.history.back();
	}
	
	function view_form()
	{
		window.location = '/view-villaform-<?php echo $_REQUEST['id'];?>.html';
	}
	
	function copylink()
	{
		$(".tx_my_link").select();
		document.execCommand("copy");
	}
	</script>
	<?php
}
?>


<style>
.form-control {
    border-radius: 1px;
    margin-bottom: 20px;
    border-color: #ced4d7;
    padding: 5px 8px !important;
    height: auto;
    box-shadow: none;
    color: #4b565b;
}
.badge {
    display: inline-block;
    min-width: 10px;
    padding: 3px 7px;
    font-size: 12px;
    font-weight: 700;
    line-height: 1;
    color: #fff;
    text-align: center;
    white-space: nowrap;
    vertical-align: middle;
    background-color: #f05542;
    border-radius: 10px;
}
.alert-warning {
    border-color: #0b2646;
    background-color: #617b99;
    color: #0b2646;
}
.alert-warning h1, .alert-warning h2, .alert-warning h3, .alert-warning h4, .alert-warning h5, .alert-warning h6 {
    color: #0b2646;
    margin-top: 0;
}
.alert-success h1, .alert-success h2, .alert-success h3, .alert-success h4, .alert-success h5, .alert-success h6 {
    color: #0b2646;
    margin-top: 0;
}
.alert-success {
    border-color: #0b2646;
    background-color: #c3d4e8;
    color: #0b2646;
}

body
{
	background: #E5E5E5;
}
.back_form
{
	background:white;
	box-shadow:0px 0px 5px #b7b7b7;
	padding:20px 20px 20px 20px;
	font-size:18px;
}
.btn_back
{
	width:100px;
	z-index:10;
	position:relative;
}
.vf_title
{
	font-weight:bold;
	font-size:22px;
}
.vt_undl
{
	text-decoration:underline;
}
.vf_title_sub
{
	margin-left:50px;
}
.inp
{
	width:100%;
}
.cok,.tok
{
	color:#3bcc39;
	display:none;
}
.cno,.tno
{
	color:#369000;
	display:none;
}
input,textarea
{
	border:1px solid #a7a7a7 !important;
	padding:5px 5px;
	background:#e5e5e5;
}
input:focus,textarea:focus
{
	border:1px solid #a7a7a7 !important;
	padding:5px 5px;
	background:#fff;
}
.chkbtn
{
	position:fixed;
	bottom:0;
	left:50%;
	transform:translateX(-50%);
	margin-bottom:15px;
}
</style>

<br>
<br>
<br>
<?php
	
	if($dbc->HasRecord("villa_form_mapping","id = '".$id."'"))
	{
		$form = $dbc->GetRecord("villa_form_mapping","*","id = '".$id."'");
		$form_id = $form['id'];
		
		$villa_form = $dbc->GetRecord("villa_form","*","id = '".$form['villaform_id']."'");
			
		$data = $dbc->GetRecord("properties","*","id='".$villa_form['property']."'");
		$vil_name = explode("|",$data['name']);
		
		$spl = $dbc->GetRecord("shopping_list","*","villa_form_mapping = '".$form_id."'");
		
	}
	else
	{
		$villa_form = '';
		$data = '';
		$vil_name = '';
		$form = '';
		$form_id = '';
		$spl = '';
	}
		
?>



<div class="container-fluid back_form">
	<div class="col-12 nopad">
    	<img src="../../upload/v_form1.png" width="100%">
    </div>
	<div class="rows">
		<br>
    	<div class="col-md-12 text-center">
			<h1><strong>In - Villa Provisioning List</strong></h1>
			<h4>Please fill out completely and either e-mail back We will do everything in our power to fulfill your requests. Remember this is an Island and not everything is always available.<br>
				There is a place at the end to put in special requests. </h4>
		</div>
		<br><br>
    
    <?php //echo $_REQUEST['id'];?>
    <div class="row top30">
		
		<div class="col-md-8 col-md-offset-2 ">
			<div class="panel panel-info">
				<div class="panel-heading">Information</div>
				<div class="panel-body">

				<form id="form_info" name="form_info">
					<input type="hidden" name="FID" id="FID" value="<?php echo $form['villaform_id'];?>">
					<input type="hidden" name="SPL_ID" id="SPL_ID" value="<?php echo $spl['id'];?>">
					<input type="hidden" name="villa_form_mapping" id="villa_form_mapping" value="<?php echo $form_id;?>">
				  <div class="form-group col-md-6">
					<label for="exampleInputEmail1">Name</label>
					<input type="text" class="form-control" id="txt_name" name="txt_name"  value="<?php echo $spl['name'];?>">
				  </div>
				  <div class="form-group col-md-6">
					<label for="exampleInputPassword1">Arrival Date</label>
					<input type="date" class="form-control" id="txt_avd" name="txt_avd" value="<?php echo $spl['arrival_date'];?>">
				  </div>
				<div class="col-md-12"></div>
				 <div class="form-group col-md-6">
					<label for="exampleInputEmail1">Number of people in party</label>
					<input type="number" class="form-control" id="txt_nop" name="txt_nop"  value="<?php echo $spl['adult'];?>">
				  </div>
				  <div class="form-group col-md-6">
					<label for="exampleInputPassword1">Arrival Time</label>
					<input type="time" class="form-control" id="txt_avt" name="txt_avt" value="<?php echo $spl['arrival_time'];?>">
				  </div>

				 <div class="form-group col-md-6">
					<label for="exampleInputEmail1">Villa Name</label>
					<input type="text" class="form-control" id="txt_vname" name="txt_vname" value="<?php echo $vil_name[0];?>" readonly>
				  </div>
				  <div class="form-group col-md-6">
					<label for="exampleInputPassword1">Check Out</label>
					<input type="date" class="form-control" id="txt_co" name="txt_co" value="<?php echo $spl['check_out'];?>">
				  </div>

					<?php $display = ($spl['status']==1)?'hidden':'';?>
				  <button type="button" onClick="save_info();" class="btn btn-primary <?php echo $display;?>">Save</button>
					<span class="icon">
						<i class="fa fa-check cok cok03" aria-hidden="true"></i> <span class="tok tok03"></span>
						<i class="fa fa-check cno cno03" aria-hidden="true"></i> <span class="tno tno03"></span>
					</span>
				</form>

				</div>
			</div>
		</div>
		
		<script>
		function alert_text(inp)
		{
			alert("Please fill your data");
			$(inp).focus();
			return false;
		}	
		function save_info()
		{
			if($("#txt_name").val()=='')
			{
				alert_text("#txt_name");
			}
			else if($("#txt_avd").val()=='')
			{
				alert_text("#txt_avd");
			}
			else if($("#txt_nop").val()=='')
			{
				alert_text("#txt_nop");
			}
			else if($("#txt_avt").val()=='')
			{
				alert_text("#txt_avt");
			}
			else if($("#txt_co").val()=='')
			{
				alert_text("#txt_co");
			}
			else
			{
				$.ajax({
					url:"libs/action_form/save_product_list_info.php",
					type:"POST",
					dataType:"json",
					data:$("#form_info").serialize(),
					success: function(res){
						if(res.status==true)
						{
							$(".cok03").fadeIn(300);
							$(".cno03,.tno03").hide();
							$(".chkbtn").removeAttr('disabled',false);
						}
						else
						{
							$(".cno03,.tno03").fadeIn(300);
							$(".tno03").html(res.msg);
							$(".cok03").hide();
						}
					}
				});
			}
		}
		</script>
		
		
    <?php
	if($spl['status']==1)
	{
		echo '<div class="col-md-12">';
		
		echo '<div class="table-responsive">';
			echo '<table class="table table-striped table-bordered">';
					echo '<thead>';
						echo '<tr>';
							echo '<th>#</th>';
							echo '<th>Name</th>';
							echo '<th>Unit</th>';
							echo '<th>Price (THB)</th>';
							echo '<th width="100">Amount</th>';
							echo '<th width="100">Total</th>';
						echo '</tr>';
					echo '</thead>';
					echo '<tbody>';
		
		
		$sql = $dbc->Query("select * from shopping_list_items where shopping_list = '".$spl['id']."' ");
		$jj=0;
		while($row = $dbc->Fetch($sql))
		{
					$total = $dbc->GetCount("shopping_list_items","shopping_list = '".$spl['id']."'");
					if($total>0)
					{			
						$sql_1 = $dbc->Query("select * from spl_items where status > 0 and id = '".$row['item']."' order by name asc");
						
						while($line = $dbc->Fetch($sql_1))
						{
							$jj++;
							$tt = $row['amount']*$row['price'];
							$ttnet += $row['amount']*$row['price'];
							$ttamt += $row['amount'];
							echo '<tr>';
								echo '<td>'.$jj.'</td>';
								echo '<td>'.$line['name'].'</td>';
								echo '<td>'.$line['unit'].'/'.$line['unit_type'].'</td>';
								echo '<td class="text-right">'.$line['price'].'</td>';

								$unit = $line['unit'].'/'.$line['unit_type'];
								echo '<td class="text-center">'.$row['amount'].'</td>';
							
								echo '<td class="text-right">';
									echo number_format($tt);
								echo '</td>';
							echo '</tr>';
						}
					}
					else
					{
						echo '<tr>';
							echo '<td class="text-center" colspan="6">No Data</td>';
						echo '</tr>';
					}
					
		}
					echo '</tbody>';
					echo '<tfoot>';
						echo '<tr>';
							echo '<td class="text-left" colspan="4"><strong>Total</strong></td>';
							echo '<td class="text-center" ><strong>'.$ttamt.'</strong></td>';
							echo '<td class="text-right" ><strong>'.number_format($ttnet).'</strong></td>';
						echo '</tr>';
					echo '</tfoot>';
				echo '</table>';
				echo '</div>';
		echo '</div>';
	}
	else
	{
		$sql= $dbc->Query('select * from spl_category where status > 0 order by name asc');
		while($row = $dbc->Fetch($sql))
		{
			echo '<div class="col-md-6">';
				echo '<div class="panel panel-info">';
					echo '<div class="panel-heading">'.$row['name'].'</div>';
					echo '<div class="panel-body pnbd">';

						echo '<div class="table-responsive">';
						echo '<table class="table table-striped table-bordered">';
								echo '<thead>';
									echo '<tr>';
										echo '<th>#</th>';
										echo '<th>Name</th>';
										echo '<th>Unit</th>';
										echo '<th>Price (THB)</th>';
										echo '<th width="100">Amount</th>';
										echo '<th width="100">Total</th>';
									echo '</tr>';
								echo '</thead>';
								echo '<tbody>';


								$total = $dbc->GetCount("spl_items","category = '".$row['id']."'");
								if($total>0)
								{			
									$sql_1 = $dbc->Query("select * from spl_items where status > 0 and category = '".$row['id']."' order by name asc");
									$ii=0;
									while($line = $dbc->Fetch($sql_1))
									{
										$ii++;
										echo '<tr>';



											echo '<td>'.$ii.'</td>';
											echo '<td>'.$line['name'].'</td>';
											echo '<td>'.$line['unit'].'/'.$line['unit_type'].'</td>';
											echo '<td class="text-right">'.$line['price'].'</td>';

											$unit = $line['unit'].'/'.$line['unit_type'];
											echo '<td>';
												echo '<input class=" tx_name" name="tx_name" type="hidden" value="'.$line['name'].'">';
												echo '<input class=" tx_unit" name="tx_unit" type="hidden" value="'.$unit.'">';
												echo '<input class=" tx_id_cate" name="tx_id_cate" type="hidden" value="'.$row['id'].'">';
												echo '<input class=" tx_id_item" name="tx_id_item" type="hidden" value="'.$line['id'].'">';
												echo '<input class="tx_pri" name="tx_pri" type="hidden" value="'.$line['price'].'" value="0">';
												echo '<input class="tx_amt" onChange="calculate(this),sum(this);" min="0" type="number" name="tx_amt" id="" value="0">';
											echo '</td>';

											echo '<td class="text-right">';
												echo '<input class=" totals_2" name="totals_2" type="hidden" value="0">';
												echo '<span class="totals "></span>';
											echo '</td>';
										echo '</tr>';
									}
								}
								else
								{
									echo '<tr>';
										echo '<td class="text-center" colspan="6">No Data</td>';
									echo '</tr>';
								}
								echo '</tbody>';
							echo '</table>';
							echo '</div>';

						echo 'Total <input class="tx_tt pull-right text-right" type="text" value="0" readonly>';

					echo '</div>';
				echo '</div>';
			echo '</div>';
		}
	}
	
	?>
    	
    </div>
	
	<?php $enabled = ($spl['id']!='')?'':'disabled'; $display = ($spl['status']==1)?'hidden':'';?>
    <button type="button" onClick="check_out();" class="chkbtn btn btn-primary btn-lg text-center center-block <?php echo $display;?>" <?php echo $enabled;?>  data-target="static">Check Out</button>
    </div><!--end row-->
    <br><br><br>
</div>


<!-- Modal -->
<div class="modal fade" id="myprolist" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" >
  <div class="modal-dialog modal-lg" role="document" >
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Summary</h4>
      </div>
      <div class="modal-body">
        <div class="list"></div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary btn_sav" disabled onClick="save_product_list();">Save</button>
      </div>
    </div>
  </div>
</div>

<input type="hidden" name="FID" id="FID" value="<?php echo $form['villaform_id'];?>">
<input type="hidden" name="SPL_ID" id="SPL_ID" value="<?php echo $spl['id'];?>">

<script>
function save_product_list()
{
	var datas = {
        FID : $("#FID").val(),
		SPL_ID : $("#SPL_ID").val(),
        tables : []
    };
    $(".table tbody tr").each(function() {
		var amt = $(this).find("input[name=tx_amt]").val();
		if(amt>0)
		{
			datas.tables.push({
				name : $(this).find("input[name=tx_name]").val(),
				unit : $(this).find("input[name=tx_unit]").val(),
				cate : $(this).find("input[name=tx_id_cate]").val(),
				items : $(this).find("input[name=tx_id_item]").val(),
				amount : $(this).find("input[name=tx_amt]").val(),
				price : $(this).find("input[name=tx_pri]").val(),
				totals : $(this).find("input[name=totals_2]").val(),
			});
		}
		//console.log(datas);
	});
	
	$.ajax({
           url:"libs/action_form/save_product_list_items.php",
           type:"POST",
           dataType:"json",
           data:{datas:datas},
           success: function(res){
			   if(res.status==true){
			   		window.location.reload();
				   //$("#tblSlide").DataTable().draw();
				   //$("#dialog_edit_pricing").modal(config_modal);
			   }else{
			   		alert('Please try again');
				   //fn.engine.alert("Alert",response.msg);
			   }
           }
    },'json');

	//$("#chkout tbody tr").each(function() {
//		var amt = $(this).find("input[name=tx_amt]").val();
//		if(amt>0)
//		{
//			datas.tables.push({
//				name : $(this).find("input[name=tx_name]").val(),
//				unit : $(this).find("input[name=tx_unit]").val(),
//				cate : $(this).find("input[name=tx_id_cate]").val(),
//				items : $(this).find("input[name=tx_id_item]").val(),
//				amount : $(this).find("input[name=tx_amt]").val(),
//				price : $(this).find("input[name=tx_pri]").val(),
//				totals : $(this).find("input[name=totals_2]").val(),
//			});
//		}
//		console.log(datas);
//	});
}
function check_out()
{
	var datas = {
        //txtID : $("#txtID").val(),
        tables : []
    };
    $(".table tbody tr").each(function() {
		var amt = $(this).find("input[name=tx_amt]").val();
		if(amt>0)
		{
			datas.tables.push({
				name : $(this).find("input[name=tx_name]").val(),
				unit : $(this).find("input[name=tx_unit]").val(),
				cate : $(this).find("input[name=tx_id_cate]").val(),
				items : $(this).find("input[name=tx_id_item]").val(),
				amount : $(this).find("input[name=tx_amt]").val(),
				price : $(this).find("input[name=tx_pri]").val(),
				totals : $(this).find("input[name=totals_2]").val(),
			});
		}
		//console.log(datas);
	});
	
	var z = '';
	z += '<table id="chkout" class="table table-striped table-bordered">';
		z += '<thead>';
			z += '<tr>';
				z += '<th>#</th>';
				z += '<th>Name</th>';
				z += '<th>Unit</th>';
				z += '<th>Price (THB)</th>';
				z += '<th width="100">Amount</th>';
				z += '<th width="100">Total</th>';
			z += '</tr>';
		z += '</thead>';
		z += '<tbody>';
		var j=0;
		var tota = 0;
	if(datas['tables'].length > 0)
	{
		for(var i=0 ;i < datas['tables'].length;i++)
		{
			j++;
			z += '<tr>';
				z += '<td>'+j+'</td>';
				z += '<td>'+datas['tables'][i]['name']+'</td>';
				z += '<td>'+datas['tables'][i]['unit']+'</td>';
				z += '<td class="text-right">'+datas['tables'][i]['price']+'</td>';
				z += '<td class="text-center">'+datas['tables'][i]['amount']+'</td>';
				z += '<td class="text-right">'+datas['tables'][i]['totals']+'</td>';
			z += '</tr>';
			tota += parseInt(datas['tables'][i]['totals']);
		}
		$(".btn_sav").removeAttr('disabled');
	}
	else
	{
		z += '<tr>';
				z += '<td colspan="6">No Data</td>';
			z += '</tr>';
			$(".btn_sav").attr('disabled',true);
	}
		z += '</tbody>';
		z += '<tfoot>';
			z += '<tr>';
				z += '<td colspan="5">Total</td>';
				z += '<td class="text-right">'+tota+'</td>';
			z += '</tr>';
		z += '</tfoot>';
	z += '</table>';
	$('.list').html(z);	
	
	$("#myprolist").modal({backdrop: "static"});	 
	$("#myprolist").modal('show');  
//	$.ajax({
//           url:"apps/properties/xhr/action-photo-properties.php",
//           type:"POST",
//           dataType:"json",
//           data:{datas:datas},
//           success: function(res){
//			   if(res.success){
//				   $("#tblSlide").DataTable().draw();
//				   $("#dialog_edit_pricing").modal(config_modal);
//			   }else{
//				   fn.engine.alert("Alert",response.msg);
//			   }
//           }
//    },'json');
}

function sum(me)
{
	var i=0;
	var toot = 0;
	$(me).parent().parent().parent().children().each(function(index, element) {
		var p = parseInt($(this).find('.totals_2').val());
        toot += parseInt(p);
		i++;
		console.log(toot+'---'+p+'---'+i);
		
    });
	$(me).parent().parent().parent().parent().parent().parent('.pnbd').find('.tx_tt').val( parseInt(toot));
}

function calculate(me)
{
	var price = $(me).parent().find('.tx_pri').val();
	var net = parseInt(0);
	net = parseInt($(me).val())*parseInt(price);
	$(me).parent().parent().find('.totals').text(net);
	$(me).parent().parent().find('.totals_2').val(net);
	//setTimeout(function(){
		//sum(me);
	//},500);
}
</script>


















