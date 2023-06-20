<?php
$sql_1 = $dbc->Query("select * from properties   where status > 0 ".$Destination." ".$beach." ".$price."  ORDER BY price asc  ");//".$Room."
$az = 0;
$xx = 0;
$yy = 0;
while($row_1 =  $dbc->Fetch($sql_1))
{
	if(in_array($row_1['id'],$arr_cate))
	{
		if(in_array($row_1['id'],$arr_room))
		{
			$az++;
		}
		else
		{
			$xx++;
		}
	}
	else
	{
		if(in_array($row_1['id'],$arr_room))
		{
			$yy++;
		}
		
	}
}
/*echo '<pre>';
	echo 'room = '.$_REQUEST['room'].'---'.count($arr_room);
echo '</pre>';*/


/*if(count($arr_cate)<1 && isset($_REQUEST['cate']))
{
	echo '<center><font size="+5" color="#f05b46"><img src="/upload/notfound.png" width="200"></font><br><br><font size="+2" color="#112845">Not Found Please try again</font></center>';
}
else
{
}*/

	if(isset($_REQUEST['cate']) && $_REQUEST['cate']!=0)//&& $_REQUEST['cate']!=0 && $_REQUEST['room']!='all'
	{
		if(count($arr_room)>0 )// && $_REQUEST['room']!='all'
		{
			if(isset($_REQUEST['room']) )//&& $_REQUEST['cate']!=0
			{
				if($az<=0)
				{
					echo '<center><font size="+5" color="#f05b46"><img src="/upload/notfound.png" width="200"></font><br><br><font size="+2" color="#112845">Not Found Please try again </font></center>';
				}
				else
				{
					echo '
					<div class="col-xs-12 col-sm-12 col-md-12 aab nopad">
					<div  style="margin-left:0px;">
					<h4 class="f16 ilb" style="font-family: pt !important;">Displaying '.$az.'</h4> <h3 class="f16 ilb" style="font-family: pt !important;">hand-picked villas in your search for </h3>
					<h2 style="margin-top: 0px;    margin-left: -2px;">'.$textH2.'</h2>
					<br>
					</div>
					</div>';
					/*echo '
					<div class="col-xs-12 col-sm-12 col-md-12 aab">
					<div  style="margin-left:15px;">
					<h2 style="margin-top: -25px;">'.$textH2.'</h2>
					<h4 style="font-family: pt !important;">Displaying '.$az.' hand-picked villas in your search for </h4>
					<br>
					</div>
					</div>';*/
				}
			}
			else
			{
				echo '
				<div class="col-xs-12 col-sm-12 col-md-12 aab nopad">
				<div  style="margin-left:0px;">
				<h4 class="f16 ilb" style="font-family: pt !important;">Displaying '.count($arr_room).'</h4> <h3 class="f16 ilb" style="font-family: pt !important;">hand-picked villas in your search for </h3>
				<h2 style="margin-top: 0px;    margin-left: -2px;">'.$textH2.'</h2>
				<br>
				</div>
				</div>';
				/*echo '
				<div class="col-xs-12 col-sm-12 col-md-12 aab">
				<div  style="margin-left:15px;">
				<h2 style="margin-top: -25px;">'.$textH2.'</h2>
				<h4 style="font-family: pt !important;">Displaying '.count($arr_room).' hand-picked villas in your search for </h4>
				<br>
				</div>
				</div>';*/
			}
			
		}
		else
		{
			if($xx<=0)
			{
				echo '<center><font size="+5" color="#f05b46"><img src="/upload/notfound.png" width="200"></font><br><br><font size="+2" color="#112845">Not Found Please try again </font></center>';
			}
			else
			{
				echo '
				<div class="col-xs-12 col-sm-12 col-md-12 aab nopad">
				<div  style="margin-left:0px;">
				<h4 class="f16 ilb" style="font-family: pt !important;">Displaying '.$xx.'</h4> <h3 class="f16 ilb" style="font-family: pt !important;">hand-picked villas in your search for </h3>
				
				<h2 style="margin-top: 0px;    margin-left: -2px;">'.$textH2.'</h2>
				<br>
				</div>
				</div>';
				/*echo '
				<div class="col-xs-12 col-sm-12 col-md-12 aab">
				<div  style="margin-left:15px;">
				<h2 style="margin-top: -25px;">'.$textH2.'</h2>
				<h4 style="font-family: pt !important;">Displaying '.$xx.' hand-picked villas in your search for </h4>
				<br>
				</div>
				</div>';*/
			}
		}
		
	}
	else
	{
		//echo '<pre>y--1</pre>';
		if(count($arr_room)>0)
		{
			//echo '<pre>y--2</pre>';
			if(isset($_REQUEST['room']) )//&& $_REQUEST['cate']!=0
			{
				//echo '<pre>y--3</pre>';
				if($yy<=0)
				{
					//echo '<pre>y--4</pre>';
					echo '<center><font size="+5" color="#f05b46"><img src="/upload/notfound.png" width="200"></font><br><br><font size="+2" color="#112845">Not Found Please try again </font></center>';
				}
				else
				{
					//echo '<pre>y--5</pre>';
					echo '
					<div class="col-xs-12 col-sm-12 col-md-12 aab nopad">
					<div  style="margin-left:0px;">
					<h4 class="f16 ilb" style="font-family: pt !important;">Displaying '.$yy.'</h4> <h3 class="f16 ilb" style="font-family: pt !important;">hand-picked villas in your search for </h3>
					<h2 style="margin-top: 0px;    margin-left: -2px;">'.$textH2.'</h2>
					<br>
					</div>
					</div>';
					/*echo '
					<div class="col-xs-12 col-sm-12 col-md-12 aab">
					<div  style="margin-left:15px;">
					<h2 style="margin-top: -25px;">'.$textH2.'</h2>
					<h4 style="font-family: pt !important;">Displaying '.$yy.' hand-picked villas in your search for </h4>
					<br>
					</div>
					</div>';*/
				}
			}
			else
			{
				echo '
				<div class="col-xs-12 col-sm-12 col-md-12 aab nopad">
				<div  style="margin-left:0px;">
				<h4 class="f16 ilb" style="font-family: pt !important;">Displaying '.count($arr_room).'</h4> <h3 class="f16 ilb" style="font-family: pt !important;">hand-picked villas in your search for </h3>
				
				<h2 style="margin-top: 0px;    margin-left: -2px;">'.$textH2.'</h2>
				<br>
				</div>
				</div>';
				/*echo '
				<div class="col-xs-12 col-sm-12 col-md-12 aab">
				<div  style="margin-left:15px;">
				<h2 style="margin-top: -25px;">'.$textH2.'</h2>
				<h4 style="font-family: pt !important;">Displaying '.count($arr_room).' hand-picked villas in your search for </h4>
				<br>
				</div>
				</div>';*/
			}
		}
		else
		{
			echo '
			<div class="col-xs-12 col-sm-12 col-md-12 aab nopad">
			<div  style="margin-left:0px;">
			<h4 class="f16 ilb" style="font-family: pt !important;">Displaying '.$num.'</h4> <h3 class="f16 ilb" style="font-family: pt !important;">hand-picked villas in your search for </h3>
			<h2 style="margin-top: 0px;    margin-left: -2px;">'.$textH2.'</h2>
			<br>
			</div>
			</div>';
		}
		
	}
	
		  
/*	if($num<=0)
	{
		echo '<center><font size="+5" color="#f05b46"><img src="/upload/notfound.png" width="200"></font><br><br><font size="+2" color="#112845">Not Found Please try again 88888</font></center>';
	}*/
	
	?>