<?php
if($des!=110 && $des!=100)
{
	// show only if destination and subdestination are puplished
	if( checkDestinationStatus($des) == 1 && checkSubdestinationStatus($beach['id']) == 1 )
	{
		?>
		<div class="container-fluid topfoot webss mt501" style="margin-top: 23px;">
			<div class="container  <?php echo $detail;?>"><br>
				<div class="col-sm-12 col-md-12 nopad">
					<div class="col-md-12 col-sm-12 col-xs-12 text-center">
                    	<h6 class="mg-sec-left-title l15" style="margin-top:15px;">Explore villas in the same categories</h6>
						<ul class="menulinkfooter tb">
						<?php
						$loops = $zz/3; $yy=1;
						
						foreach($array_link as $Ylink)
						{
							echo $Ylink;
							
							if(($yy%ceil($loops))==0)
							{
								echo '</ul>';
								echo '</div>';
								echo '<div class="col-md-12 col-sm-12 col-xs-12">';
								echo '<ul class="menulinkfooter tb">';
							}
							$yy++;
						}
		?>
								<!-- beach_namw-->
						</ul>
					</div>
				 </div>   
			</div> 
		</div>   
		<?php 
	} 
	else
	{
		?>
		<div class="container-fluid topfoot webss mt501" style="margin-top: 23px;"><?php /*?>style="margin-top: 136px;"<?php */?>
			<div class="container  <?php echo $detail;?>"><br>
				<div class="col-sm-12 col-md-12 nopad">
					<div class="col-md-12 col-sm-12 col-xs-12 text-center">
						<ul class="menulinkfooter tb">
						
						</ul>
					</div>
				 </div>   
			</div> 
		</div>   
		<?php
		
	}
}
else
{
	?>
	<div class="container-fluid topfoot- webss- mt501-" >
		<div class="container  ">
			<div class="col-sm-12 col-md-12 nopad">
				<div class="col-md-12 col-sm-12 col-xs-12 text-center">
					<ul class="menulinkfooter tb">
					</ul>
				</div>
			 </div>   
		</div> 
	</div>   
	<?php
}
?>
<div class="container">
	<?php 
		include 'libs/pages/dt_recently.php';
		include 'libs/pages/dt_recently_mobile.php';
    ?>
</div> <?php //echo '-----'.$_REQUEST['id'];?>
<div class="container-fluid  webss padtop50 new_foot mt50 bg_map">
</div>


<?php
if($des!=110 && $des!=100)
{
	?>
    <div class="container">
        <div class="col-md-12 nopad top41">
            <h2 class=" mb f30 tg top text-center"><strong>Unique Experiences - Holiday Villa Rental</strong></h2>
        </div>  
    
        <div class="col-md-12 nopad top21">
            <div class="col-md-12 top10">
                <h2 class=" mb f18 top text-center"><strong><a class="tg cdf" >Browse all <a class="blu" href="/search-rent/thailand/all-beach/all-price/all-bedrooms/all-collections/all-sort.html">Thailand Villa Rentals</a> or Explore more destinations below</a></strong></h2>
                
                <div class="col-md-12 nopad  top30 text-left f18 blu molihi tfhp"> 
                    <a href="/search-rent/thailand-phuket/all-beach/all-price/all-bedrooms/all-collections/all-sort.html"><strong>Phuket</strong></a>
                </div>
                <div class="col-md-12 nopad top20 text-left f18 blu molihi tfp"> 
                    <a href="/search-rent/thailand-phuket/kamala-beach/all-price/all-bedrooms/all-collections/all-sort.html">Kamala</a> - 
                    <a href="/search-rent/thailand-phuket/bang-tao-beach/all-price/all-bedrooms/all-collections/all-sort.html">Bang Tao</a> - 
                    <a href="/search-rent/thailand-phuket/kata-beach/all-price/all-bedrooms/all-collections/all-sort.html">Kata</a> - 
                    <a href="/search-rent/thailand-phuket/surin-beach/all-price/all-bedrooms/all-collections/all-sort.html">Surin</a> - 
                    <a href="/search-rent/thailand-phuket/nai-harn/all-price/all-bedrooms/all-collections/all-sort.html">Nai Harn</a> - 
                    <a href="/search-rent/thailand-phuket/cape-yamu/all-price/all-bedrooms/all-collections/all-sort.html">Cape Yamu</a> - 
                    <a href="/search-rent/thailand-phuket/layan-beach/all-price/all-bedrooms/all-collections/all-sort.html">Layan</a> -
                    <a href="/search-rent/thailand-phuket/cape-panwa-beach/all-price/all-bedrooms/all-collections/all-sort.html">Cape Panwa</a> -
                    <a href="/search-rent/thailand-phuket/ao-yon-bay/all-price/all-bedrooms/all-collections/all-sort.html">Ao Yon</a> -
                    <a href="/search-rent/thailand-phuket/patong/all-price/all-bedrooms/all-collections/all-sort.html">Patong </a> 
                </div>
                <div class="col-md-12 nopad  top20 text-left f18 blu molihi tfhk"> 
                    <a href="/search-rent/thailand-koh-samui/all-beach/all-price/all-bedrooms/all-collections/all-sort.html"><strong>Koh Samui</strong></a>
                </div>
                <div class="col-md-12 nopad top21 text-left f18 blu molihi tfk"> 
                    <a href="/search-rent/thailand-koh-samui/bophut-beach/all-price/all-bedrooms/all-collections/all-sort.html">Bophut</a> -
                    
                    <a href="/search-rent/thailand-koh-samui/maenam-beach/all-price/all-bedrooms/all-collections/all-sort.html">Maenam</a> - 
                    <a href="/search-rent/thailand-koh-samui/lipa-noi-beach/all-price/all-bedrooms/all-collections/all-sort.html">Lipa Noi</a> -
                    <a href="/search-rent/thailand-koh-samui/chaweng-beach/all-price/all-bedrooms/all-collections/all-sort.html">Chaweng Noi</a> -
                    
                    <a href="/search-rent/thailand-koh-samui/taling-ngam-beach/all-price/all-bedrooms/all-collections/all-sort.html">Taling Ngam</a> -
                    <a href="/search-rent/thailand-koh-samui/bangrak-beach/all-price/all-bedrooms/all-collections/all-sort.html">Bangrak</a> -
                    <a href="/search-rent/thailand-koh-samui/lamai-beach/all-price/all-bedrooms/all-collections/all-sort.html">Lamai</a> -
                    <a href="/search-rent/thailand-koh-samui/choeng-mon-beach/all-price/all-bedrooms/all-collections/all-sort.html">Choeng Mon</a> 
                </div>
            </div>
        </div>
    </div> 
<?php
}
?>
