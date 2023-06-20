<?php 

//krsort($_SESSION['recent']);

echo '<div class="recent web recently_web">';
	echo '<h4><strong>Recently Viewed</strong></h4>';
if(isset($_SESSION['recent']))
{
	//foreach($_SESSION['recent'] as $idv)
//	{
//		$rec = $dbc->GetRecord("properties","*","id='".$idv."' ");
//		$v_name = explode("|",$rec['name']);
//		$v_photo = json_decode($rec['photo'],true);
//		echo '<div class="media">';
//			echo '<div class="media-left">';
//				echo '<a href="/'.$rec['ht_link'].'.html">';
//					echo '<img class="media-object lazy1" src="'.$v_photo[0]['img'].'" alt="'.$v_name[0].'" width="150">';
//				echo '</a>';
//			echo '</div>';
//			echo '<div class="media-body text_bottom">';
//				echo '<h4 class="media-heading">'.$v_name[0].'</h4>';
//				echo base64_decode($rec['brief'],true);
//			echo '</div>';
//		echo '</div>';
//	}

?>
<div id="hl-sliders-1" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <?php /*?><ol class="carousel-indicators">
        <li data-target="#hl-sliders" data-slide-to="0" class="active"></li>
        <li data-target="#hl-sliders" data-slide-to="1"></li>
        <li data-target="#hl-sliders" data-slide-to="2"></li>
    </ol><?php */?>
    
    <!-- Wrapper for slides -->
    <div class="carousel-inner" role="listbox">
    	<div class="item active">
		<?php 
        $zxzx = 0;
        foreach($_SESSION['recent'] as $idv)
        {
            //echo '-----------'.$zxzx;
            $rec = $dbc->GetRecord("properties","*","id='".$idv."' ");
            $v_name = explode("|",$rec['name']);
            $v_photo = json_decode($rec['photo'],true);
            
            //$acctt = ($zxzx==0)?'active':'';
			echo '<div class="col-md-4">';
				echo '<a href="/'.$rec['ht_link'].'.html">';
					echo '<img src="'.$v_photo[0]['img'].'" width="100%">';
					echo '<div class="carousel-caption2 pad10 tb">';
						echo '<b>'.$v_name[0].'</b><br>';
						echo base64_decode($rec['brief'],true);
						//echo $inside_ls['bedroom'].'<br>';
						//echo $inside_ls['price'].'<br>';
					echo '</div>';
				echo '</a>';
            echo '</div>';
			
			$zxzx++;
			
            if(($zxzx%3)==0)
            {
				
				if($zxzx<5)
				{
						echo '</div>';
					echo '<div class="item ">';
				}
            }
            else
            {
				//echo '</div>';
            }
           
        }
		//echo '--'.$zxzx;
        ?>
    
        </div>
        
    </div>
    <?php
	if($zxzx>3)
	{
		?>
    <!-- Controls -->
    <a class="left carousel-control caro l0-" href="#hl-sliders-1" role="button" data-slide="prev"><i class="fa fa-angle-left" style="color:#fff;"></i></a>
    <a class="right carousel-control caro r0-" href="#hl-sliders-1" role="button" data-slide="next"><i class="fa fa-angle-right" style="color:#fff;"></i></a>
    <?php
	}
	?>
</div>
<?php
	
}
echo '</div>';
/*echo '<pre>';
	print_r($_SESSION['recent']);
echo '</pre>';*/
?>

<style>
.text_bottom{vertical-align:bottom;display:table-cell}.media .media-body .media-heading{font-size:17px;line-height:18px;color:#16262e}.media .media-object{border-radius:0}.media .media-body{position:relative;width:100%;font-size:12px;line-height:15px !important}
</style>

<?php /*?><pre>
<?php
	print_r($_SESSION['recent']);
?>
</pre><?php */?>

