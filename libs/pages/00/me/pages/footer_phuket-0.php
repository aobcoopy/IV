<?php
if($show_phuket == '')
{
	//echo "11111111111---show_phuket";
?>
 <div class="container <?php echo $show_phuket.' '.$f_foot;?>">
 		<?php 
		if($_REQUEST['cate']!=6)
		{
				if($_SERVER['REQUEST_URI']=='/search-rent/thailand-phuket/all-beach/all-price/5-7-bedrooms/all-collections/all-sort.html')
				{
					?>
                    <h2 class=" mb f30 top"><strong><a class="tg cdf" >Where are the Best 5,6,7 Bedroom Villas in Phuket?</a></strong></h2>
                    <div class="col-md-12 nopad top41">
                        <table class="table table-bordered table-striped ttb" width="100%%" border="1">
                            <thead>
                                <tr>
                                    <th>Phuket Location</th>
                                    <th>Price From</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                    <h3 class="f14 th3">
                                        <a href="/search-rent/thailand-phuket/kamala-beach/all-price/all-bedrooms/all-collections/all-sort.html" class="blu">Kamala <?php //echo $f_villas;?></a>
                                    </h3>
                                    </td>
                                    <td>$995</td>
                                </tr>
                                <tr>
                                    <td>
                                    <h3 class="f14 th3">
                                        <a href="/search-rent/thailand-phuket/layan-beach/all-price/all-bedrooms/all-collections/all-sort.html" class="blu">Layan <?php //echo $f_villas;?></a>
                                    </h3>
                                    </td>
                                    <td>$690</td>
                                </tr>
                                <tr>
                                    <td>
                                    <h3 class="f14 th3">
                                        <a href="/search-rent/thailand-phuket/surin-beach/all-price/all-bedrooms/all-collections/all-sort.html" class="blu">Surin <?php //echo $f_villas;?></a>
                                    </h3>
                                    </td>
                                    <td>$590</td>
                                </tr>
                                <tr>
                                    <td>
                                    <h3 class="f14 th3">
                                        <a class="blu" href="/search-rent/thailand-phuket/nai-harn/all-price/all-bedrooms/all-collections/all-sort.html">Nai Harn <?php //echo $f_villas;?></a>
                                    </h3>
                                    </td>
                                    <td>$590</td>
                                </tr>
                                <tr>
                                    <td>
                                    <h3 class="f14 th3">
                                        <a class="blu" href="/search-rent/thailand-phuket/ao-yon-bay/all-price/all-bedrooms/all-collections/all-sort.html">Ao Yon <?php //echo $f_villas;?></a>
                                    </h3>
                                    </td>
                                    <td>$765</td>
                                </tr>
                                <tr>
                                    <td>
                                    <h3 class="f14 th3">
                                        <a class="blu" href="/search-rent/thailand-phuket/cape-yamu/all-price/all-bedrooms/all-collections/all-sort.html">Cape Yamu <?php //echo $f_villas;?></a>
                                    </h3>
                                    </td>
                                    <td>$657</td>
                                </tr>
                                
                            </tbody>
                        </table>
                    </div>
					<?php
				}
				elseif($_SERVER['REQUEST_URI']=='/search-rent/thailand-phuket/all-beach/all-price/8-10-bedrooms/all-collections/all-sort.html')
				{
					
					?>
                    <h2 class=" mb f30 top"><strong><a class="tg cdf" >Where are the Best 8,9,10> Bedroom Villas in Phuket?</a></strong></h2>
                    <div class="col-md-12 nopad top41">
                        <table class="table table-bordered table-striped ttb" width="100%%" border="1">
                            <thead>
                                <tr>
                                    <th>Phuket Location</th>
                                    <th>Price From</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                    <h3 class="f14 th3">
                                        <a href="/search-rent/thailand-phuket/kamala-beach/all-price/all-bedrooms/all-collections/all-sort.html" class="blu">Kamala <?php //echo $f_villas;?></a>
                                    </h3>
                                    </td>
                                    <td>$1,250</td>
                                </tr>
                                <tr>
                                    <td>
                                    <h3 class="f14 th3">
                                        <a href="/search-rent/thailand-phuket/surin-beach/all-price/all-bedrooms/all-collections/all-sort.html" class="blu">Surin <?php //echo $f_villas;?></a>
                                    </h3>
                                    </td>
                                    <td>$1,220</td>
                                </tr>
                                <tr>
                                    <td>
                                    <h3 class="f14 th3">
                                        <a class="blu" href="/search-rent/thailand-phuket/nai-harn/all-price/all-bedrooms/all-collections/all-sort.html">Nai Harn <?php //echo $f_villas;?></a>
                                    </h3>
                                    </td>
                                    <td>$590</td>
                                </tr>
                                <tr>
                                    <td>
                                    <h3 class="f14 th3">
                                        <a class="blu" href="/search-rent/thailand-phuket/bang-tao-beach/all-price/all-bedrooms/all-collections/all-sort.html">Bang Tao <?php //echo $f_villas;?></a>
                                    </h3>
                                    </td>
                                    <td>$1,695</td>
                                </tr>
                                
                            </tbody>
                        </table>
                    </div>
                    
				<?php
				}
				?>
                
              <?php
			  
			  $link_url_mkt = $_SERVER['REQUEST_URI'];
			  $ar_url_link_mkt = array(
			  '/search-rent/thailand-phuket/all-beach/all-price/1-4-bedrooms/all-collections/all-sort.html',
			  '/search-rent/thailand-phuket/all-beach/all-price/5-7-bedrooms/all-collections/all-sort.html',
			  '/search-rent/thailand-phuket/all-beach/all-price/8-10-bedrooms/all-collections/all-sort.html');
			  if(in_array($link_url_mkt,$ar_url_link_mkt))
			  {
			  }
			  else
			  {
				  ?><h2 class=" mb f30"><strong><a class="tg cdf" >Discover Luxury Villas in Phuket</a></strong></h2>
				  <div class="col-md-12 nopad top41 f18">
                    Phuket Luxury Villas make a great holiday option. Offering you your own private villa holiday space, private pool, staff, chef and all modern facilities like your own fitness, cinema and games rooms, as well as spa, steam and sauna rooms.
                </div>
				  <?php
			  }
			  ?>
			 
             
		 <?php
		}
		else
		{
			
            $link_url_footer = $_SERVER['REQUEST_URI'];
			if($link_url_footer == '/search-rent/thailand-phuket/all-beach/all-price/all-bedrooms/beachfront-villas/all-sort.html')
			{
				$f_villas = "";
			}
			else
			{
				$f_villas = "Villas";
			}
			?>
			 <h2 class=" mb f30 top"><strong><a class="tg cdf" >Discover the Best Beachfront Villas in Phuket</a></strong></h2>
             
              <div class="col-md-12 nopad top21">
            <table class="table table-bordered table-striped ttb" width="629px" border="1">
                <thead>
                    <tr>
                        <th>Beachfront Villa Locations</th>
                        <th>Price From</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>
                        <h3 class="f14 th3">
                            <a href="/search-rent/thailand-phuket/kamala-beach/all-price/all-bedrooms/all-collections/all-sort.html" class="blu">Kamala <?php echo $f_villas;?></a>
                        </h3>
                        </td>
                        <td>$995</td>
                    </tr>
                    <tr>
                        <td>
                        <h3 class="f14 th3">
                            <a class="blu" href="/search-rent/thailand-phuket/nai-harn/all-price/all-bedrooms/all-collections/all-sort.html">Nai Harn <?php echo $f_villas;?></a>
                        </h3>
                        </td>
                        <td>$1,950</td>
                    </tr>
                    <tr>
                        <td>
                        <h3 class="f14 th3">
                            <a class="blu" href="/search-rent/thailand-phuket/ao-yon-bay/all-price/all-bedrooms/all-collections/all-sort.html">Ao Yon <?php echo $f_villas;?></a>
                        </h3>
                        </td>
                        <td>$765</td>
                    </tr>
                    <tr>
                        <td>
                        <h3 class="f14 th3">
                            <a class="blu" href="/search-rent/thailand-phuket/cape-yamu/all-price/all-bedrooms/all-collections/all-sort.html">Cape Yamu <?php echo $f_villas;?></a>
                        </h3>
                        </td>
                        <td>$657</td>
                    </tr>
                </tbody>
            </table>
            <br><br>
            </div>
            
           
			 <h2 class=" mb f30"><strong><a class="tg cdf" >Luxury Beachfront Villas in Phuket </a></strong></h2>
             <div class="col-md-12 nopad top41 f18">
                Let’s introduce you to how to find and rent the best villas on the beach in Phuket.<br>
But first some quick advice about beachfront villas here.<br><br>

<?php /*?>There are not many villas actually on the beach in Phuket. Just a few.<?php */?>
There are not many beachfront villas in Phuket. Just a few.<br>
Some on adorable private coves with clear water just below their pool decks.<br>
And if that is what you are looking for then you have come to the right place and we list them all on this page for you. Maybe you haven’t decided where to go yet, if so then it could help to check out the <a href="/search-rent/thailand-koh-samui/all-beach/all-price/all-bedrooms/beachfront-villas/all-sort.html" class="blu">many beach villas in Koh Samui</a>.
<br><br>

However it is possible you mean that you wish to rent a villa on a beach area but not necessarily directly on the beach.<br>
Maybe in the hills just above the beach with panoramic views and private surroundings.<br>
On our site these villas are listed as seaview villas.<br>
So just change the collections selection at the top of this page or scroll down for a list of the best beaches in <a href="/search-rent/thailand-phuket/all-beach/all-price/all-bedrooms/all-collections/all-sort.html" class="blu">Phuket</a> with villas, if you know where you want to go.
            </div>
			<?php
		}
		?>
        
        <?php 
		if($_SERVER['REQUEST_URI']== '/search-rent/thailand-phuket/all-beach/all-price/8-10-bedrooms/all-collections/all-sort.html')
		{
			?>
            <div class="col-md-12 nopad top41">
            <h4 class=" mb f22 top"><strong><a class="tg cdf" >How does villa rental work in Phuket</a></strong></h4>
                <div class="col-md-12 nopad top21 f18">
                    There are a large range of <a href="/search-rent/thailand-phuket/all-beach/all-price/all-bedrooms/all-collections/all-sort.html" class="blu">Phuket luxury villas for rent</a>. Even if a villa is large with eight bedrooms they will offer you to use less bedrooms and pay less per night. So you can often rent a larger villa with staff and all its amenities but only use a few bedrooms and pay much less per night.
    Prices vary between seasons and are highest over the peak season of Christmas and New year.
    
                </div>
            </div>
            <?php
		}
		else
		{
			 $link_url_mkt = $_SERVER['REQUEST_URI'];
			  $ar_url_link_mkt = array(
			  '/search-rent/thailand-phuket/all-beach/all-price/1-4-bedrooms/all-collections/all-sort.html',
			  );//'/search-rent/thailand-phuket/all-beach/all-price/5-7-bedrooms/all-collections/all-sort.html',
//			  '/search-rent/thailand-phuket/all-beach/all-price/8-10-bedrooms/all-collections/all-sort.html'
			  if($_SERVER['REQUEST_URI']=='/search-rent/thailand-phuket/all-beach/all-price/1-4-bedrooms/all-collections/all-sort.html')
			  {
			  }
			  else
			  {
				  ?>
				  <div class="col-md-12 nopad top41">
                    <h4 class=" mb f22 top"><strong><a class="tg cdf" >How does villa rental work in Phuket</a></strong></h4>
                        <div class="col-md-12 nopad top21 f18">
                            There are a large range of villas for rent. Even if a villa is large with eight bedrooms they will offer you to use less bedrooms and pay less per night. So you can often rent a larger villa with staff and all its amenities but only use a few bedrooms and pay much less per night.
            Prices vary between seasons and are highest over the peak season of Christmas and New year in Thailand.
            
                        </div>
                    </div>
				  <?php
			  }
			  
			?>
            
            <?php
		}
		?>
        
        
        <?php 
		if($_REQUEST['cate']!=6)
		{
			
			$link_url_mkt = $_SERVER['REQUEST_URI'];
			  $ar_url_link_mkt = array(
			  '/search-rent/thailand-phuket/all-beach/all-price/1-4-bedrooms/all-collections/all-sort.html',
			  '/search-rent/thailand-phuket/all-beach/all-price/5-7-bedrooms/all-collections/all-sort.html',
			  '/search-rent/thailand-phuket/all-beach/all-price/8-10-bedrooms/all-collections/all-sort.html');//
			  if(in_array($link_url_mkt,$ar_url_link_mkt))
			  {
			  }
			  else
			  {
				  ?>
                  <div class="col-md-12 nopad top41">
                    <h4 class=" mb f30 top"><strong><a class="tg cdf" >Phuket Luxury Villas </a></strong></h4><?php /*?>Phuket Luxury Villas<?php */?>
                        <div class="col-md-12 nopad top21 f18">
                            There are a range of <a href="/search-rent/thailand-phuket/all-beach/all-price/all-bedrooms/all-collections/all-sort.html" class="blu">private villas for rent in Phuket</a> which are able to accommodate different group sizes.<br><br>
                             But first a little advice.<br>
            A villa can have a different number of bedrooms to your group requirements.<br>
            Often they will allow you to use a specific number of bedrooms at a different price.<br>
            You still get to use all the villa amenities.<br><br>
            
            We show the bedroom ranges they allow you to open in our search results.<br>
            Then all you have to do is go to the bottom of our villa details pages to find out the different pricing.<br><br>
            
            And don’t worry, you won’t miss an opportunity - we list our villas in all the bedroom ranges that they accommodate.<br>
            So all you have to do is choose the number of bedrooms you need below and you will see all the villas available to your group.<br>
                        </div>
                    </div>
				  <?php
			  }
		?>
        
        
        
        
        <div class="col-md-12 nopad top10">
            <div class="col-md-12 nopad top21 f18">
                But first a little advice.
A villa can have a different number of bedrooms to your group requirements.<br>
Often they will allow you to use a specific number of bedrooms at a different price.<br>
You still get to use all the villa amenities.<br><br>

We show the bedroom ranges they allow you to open in our search results.<br>
Then all you have to do is go to the bottom of our villa details pages to find out the different pricing.<br><br>

And don’t worry, you won’t miss an opportunity - we list our villas in all the bedroom ranges that they accommodate.<br>
So all you have to do is choose the number of bedrooms you need below and you will see all the villas available to your group.

            </div>
            
        </div>
        
        <div class="col-md-12 nopad top41">
        <h4 class=" mb f22 top"><strong><a class="tg cdf" ><a class="blu" href="/search-rent/thailand-phuket/all-beach/all-price/1-4-bedrooms/all-collections/all-sort.html">Phuket villas with 2,3,4 bedrooms</a></a></strong></h4>
            <div class="col-md-12 nopad top21 f18">
                These villas make for a great family villa holiday in Phuket.
            </div>
            <div class="col-md-12 nopad top21 f18">
                The most common category is <a class="blu" href="/search-rent/thailand-phuket/all-beach/all-price/5-7-bedrooms/all-collections/all-sort.html" ><strong>5,6,7 bedroom villas Phuket</strong></a> offering the largest flexibility in group numbers. Remember that these villas may allow you to use less bedrooms and pay less too. Nearly all have a cinema, games and fitness room.
            </div>
        </div>
        
        <div class="col-md-12 nopad top41">
        <h4 class=" mb f22 top"><strong><a class="tg cdf" ><a class="blu" href="/search-rent/thailand-phuket/all-beach/all-price/8-10-bedrooms/all-collections/all-sort.html">8,9,10 > bedroom villas Phuket</a></a></strong></h4>
            <div class="col-md-12 nopad top21 f18">
                Finally there are the large luxury villas with expansive space and amenities. These 8,9,10 > bedroom villas offer large spaces with many different indoor and outdoor areas for large groups.
            </div>
        </div>
        <?php
		}
		else
		{
		}?>
		<?php
		if($_REQUEST['room']=='all')
		{
			if($_REQUEST['cate']!=6)
			{
				?>
				<div class="col-md-12 nopad top41">
                <h4 class=" mb f22 top"><strong><a class="tg cdf" >Villas with full-time chef</a></strong></h4>
                    <div class="col-md-12 nopad top21 f18">
                        One of the biggest attractions of renting your own villa is the level of service and attention.<br>
                        There will be a villa manager to tend to your every need.<br>
                        Shopping, transportation, excursion or restaurant bookings. They are your personal concierge.<br>
                        Then there is the housekeeping staff and your personal full-time chef in most villas.Daily breakfast is usually included, if you want to have a barbecue or luncheon at the villa then all you have to do is ask them to make the arrangements.
                    </div>
                </div>
				<?php
			}
		}
		?>
        <div class="col-md-12 nopad top41">
        <h4 class=" mb f30 top"><strong><a class="tg cdf" >What type of Villas are for rent</a></strong></h4> <?php /*?>What type of Phuket Luxury Villas are for rent<?php */?>
            <div class="col-md-12 nopad top21 f18">
                There are two main options
            </div>
        </div>
        
        <div class="col-md-12 nopad  f18">
            <div class="col-md-12 nopad ">
                1.<strong><a href="/search-rent/thailand-phuket/all-beach/all-price/all-bedrooms/seaview-villas/all-sort.html" class="blu">Phuket Seaview villas</a></strong> are nestled in the hills above its many beautiful beaches offering complete privacy and panoramic views over the turquoise waters of the Andaman sea.
            </div>
            <?php
			if($_SERVER['REQUEST_URI']=='/search-rent/thailand-phuket/all-beach/all-price/all-bedrooms/all-collections/all-sort.html')
			{
				?>
				<div class="col-md-12 nopad top41">
                2.<a class="blu" href="/search-rent/thailand-phuket/all-beach/all-price/all-bedrooms/beachfront-villas/all-sort.html"><strong>Phuket beachfront villas</strong></a> offer direct access to enjoy the sea and beach surrounds. Unlike <a href="/search-rent/thailand-koh-samui/all-beach/all-price/all-bedrooms/all-collections/all-sort.html" class="blu">Koh Samui</a> there are not many of these beach villas in Phuket and so forward planning is needed to secure availability.
            </div>
			<?php
			}
			else
			{
				?>
				<div class="col-md-12 nopad top41">
                2.How about a luxury <a class="blu" href="/search-rent/thailand-phuket/all-beach/all-price/all-bedrooms/beachfront-villas/all-sort.html">villa in Phuket on the beach</a>, offering direct access to enjoy the sea and beach surrounds. Unlike Koh Samui there are not many of these villas in Phuket and so forward planning is needed to secure availability. If you haven’t decided where you would like to visit yet then you could check out all the <a href="/search-rent/thailand/all-beach/all-price/all-bedrooms/beachfront-villas/all-sort.html" class="blu">beachfront villas in Thailand</a>.
                
            </div>
			<?php
			}
			?>
           
            
            <div class="col-md-12 nopad top41">
                There are also Phuket Villas to suit all groups for your next villa vacation.
            </div>
            <?php 
			if($_REQUEST['cate']!=6)
			{
			?>
            <div class="col-md-12 nopad top41">
                3.<a class="blu" href="/search-rent/thailand-phuket/all-beach/all-price/all-bedrooms/wedding-villas/all-sort.html"><strong>Wedding Villas Phuket</strong></a><br>
There are many large beautiful properties that can be the wedding villa for your special day.We can liaise with wedding planners to make sure all goes to plan.

            </div>
            <div class="col-md-12 nopad top41">
                4.There are even very large individual villas or multiple properties next to each other which can be rented out together making them perfect <a class="blu" href="/search-rent/thailand-phuket/all-beach/all-price/all-bedrooms/larger-group-villas/all-sort.html"><strong>phuket villas for large groups</strong></a> or corporate events.
            </div>
            <?php }else{}?>
        </div>
         <?php 
			if($_REQUEST['cate']!=6)
			{
				if($_REQUEST['room']=='all')
				{
					?>
                
                <div class="col-md-12 nopad top41">
				<h4 class=" mb f30 top"><strong><a class="tg cdf" >2019 Villa Cost Survey</a></strong></h4>
				</div>
				
				<div class="col-md-12 nopad top41">
				<?php /*?><h4 class=" mb f22 top"><strong><a class="tg cdf" >Luxury Villas Phuket Cost </a></strong></h4><?php */?>
					<div class="col-md-12 nopad top21 f18">
						As the Villa marketing company with the widest choice of luxury villas in Phuket we have analysed our 2018 data.<br>

                        This has enabled us to release this up-to-date survey of the average cost of renting a villa in Phuket to give a guide for 2019.<br>
                        
                        These are statistical averages and of course you can find great low season deals on villas or rent the most expensive & luxurious villa on the island.<br>
                        
                        And time of year will change the cost due to the difference between peak, high and low seasons.<br>
                        
                        We present here the average cost by analysing our data across all villa sizes over the last year.<br>
                        
                        The average Phuket villa cost per room is $230++ a night, accommodating two people<br>
                        
                        So the average cost is USD$115 a night per person in the group.<br>
                        
                        For our many Australian customers this exchanges to AUD$160 as of December 2018
					</div>
				</div>
                
                <?php /*?><div class="col-md-12 nopad top41">
				<h4 class=" mb f22 top"><strong><a class="tg cdf" >Who is staying at Luxury Villas in Phuket?</a></strong></h4>
					<div class="col-md-12 nopad top21 f18">
						We provide luxury villa rentals for individuals, corporates and events.<br>

                        Whether it be a family holiday, celebration trip, group travel, wedding or corporate retreat.<br>
                        
                        Australia is our largest market for individuals, families and groups travelling to Phuket villas.<br>
                        
                        The direct flights from all around Australia are relatively short and affordable.<br>
                        
                        Many residents and corporates of Singapore and Hong Kong visit Phuket.<br>
                        
                        It offers quick and easy flight connections for shorter breaks.<br>
                        
                        The visitors from the UAE enjoy the more comfortable weather throughout the whole year outside of the high seasons.

					</div>
				</div><?php */?>
                
                
                    
                    
				<div class="col-md-12 nopad top41">
				<h4 class=" mb f30 top"><strong><a class="tg cdf" >FAQs</a></strong></h4>
				</div>
				
				<div class="col-md-12 nopad top41">
				<h4 class=" mb f22 top"><strong><a class="tg cdf" >1. Do villas require a minimum number of nights booking</a></strong></h4>
					<div class="col-md-12 nopad top21 f18">
						Most villas ask for a minimum number of nights stay to be able to make any booking.<br>
		This is typically 3 nights throughout the year although in high season this can increase to 5 or 7, and even 10 nights in peak season. At the bottom of our villa details pages we show the minimum nights required at the different times of the year.
					</div>
				</div>
				
				<div class="col-md-12 nopad top41">
				<h4 class=" mb f22 top"><strong><a class="tg cdf" >2. What time is check-in and check-out</a></strong></h4>
					<div class="col-md-12 nopad top21 f18">
						Private villas work similarly to hotels so the check-in is usually in the afternoon and check-out is by late morning or midday. Each villa is different so please ask us.
					</div>
				</div>
				
				<div class="col-md-12 nopad top41">
				<h4 class=" mb f22 top"><strong><a class="tg cdf" >3. How do I book</a></strong></h4>
					<div class="col-md-12 nopad top21 f18">
						All our inquiries through the website go direct to the Owner. Once you make an inquiry our concierge service will contact you to work through your plans and provide a full range of villa options available.
					</div>
				</div>
                
                <div class="col-md-12 nopad top41">
				<h4 class=" mb f22 top"><strong><a class="tg cdf" >4. Can I rent a specifc number of bedrooms</a></strong></h4>
					<div class="col-md-12 nopad top21 f18">
						Yes, luxury villas offer you the flexibility to rent different numbers of bedrooms at different prices.<br>
And you still get to use the entire villa and its facilities plus the service of all the staff.
					</div>
				</div>
                
                <div class="col-md-12 nopad top41">
				<h4 class=" mb f22 top"><strong><a class="tg cdf" >5. Are children allowed</a></strong></h4>
					<div class="col-md-12 nopad top21 f18">
						Yes, private villas allow children, they make great playgrounds to keep the kids occupied with games and cinema rooms plus<br>
lovely outdoor areas & pool decks.Every group profile is different so please contact us by inquiring on the villa that interests you<br>
most and we will provide you a list of all the available villas that have a bedroom configuration that works best for your group and requirements. 
					</div>
				</div>
                
                <div class="col-md-12 nopad top41">
				<h4 class=" mb f22 top"><strong><a class="tg cdf" >6. How do I organise group excursions & transport</a></strong></h4>
					<div class="col-md-12 nopad top21 f18">
						The villa manager is there to take care of your needs during your stay and so a restaurant booking or transport to the beach<br>
can be organised easily. If you are interested in private excursions such as a yacht charter or transport always on standby <br>
for your stay then please discuss your requirements with us so that we can provide you with the best possible options.<br>
We are here to make your luxury villa holiday in Phuket as convenient and easy as possible.
					</div>
				</div>
                
                <div class="col-md-12 nopad top41">
				<h4 class=" mb f22 top"><strong><a class="tg cdf" >7. How far in advance can i book</a></strong></h4>
					<div class="col-md-12 nopad top21 f18">
						If you are interested in choosing from a few villas that match your group requirements then planning early is necessary.<br>
Often people book luxury villas for the next year at the end of their stay and all villas are booked early in the year for the Christmas and New Year periods.<br>
Planning and booking well in advance will give you the most villas to choose from.
					</div>
				</div>
        <?php 	}
		}else{
		?>
        
        <div class="col-md-12 nopad top41">
        <h4 class=" mb f30 top"><strong><a class="tg cdf" >2019 Phuket Beachfront Villa Cost Survey</a></strong></h4>
            <div class="col-md-12 nopad top21 f18">
                Phuket does not offer many villas directly on the beach, those available offer beautiful choices of location and villa.<br>
                Enjoying a private beach just steps away from your bedroom and pool deck demands higher prices than the average Phuket villa.<br>
                In 2018 the average rental value of one room in a beachfront villa was USD$379++ per night<br>
                At USD$189.50++ per person per night Phuket Beachfront villas are the most expensive category of luxury villa rental in Thailand.<br>
                In Australian dollars this equates to AUD$263++ pp each night as of December 2018.<br>
                This cost greatly increases in high and peak seasons and is dependent on the setting, location and premium of the villa itself.<br>
                Tax ++ in Thailand is 17.7%   
            </div>
        </div>
        
        <div class="col-md-12 nopad top41">
        <h4 class=" mb f30 top"><strong><a class="tg cdf" >FAQs</a></strong></h4>
        </div>
        
        <?php /*?><div class="col-md-12 nopad top41">
        <h4 class=" mb f22 top"><strong><a class="tg cdf" >1. What is a beachfront villa1111111111111111</a></strong></h4>
            <div class="col-md-12 nopad top21 f18">
               A beachfront villa has direct access from the villa grounds to the beach. Often the villa will have a garden with a pool area leading directly to the beach. Please note there are many more beach villas in Koh Samui than there are in Phuket. Mostly the villas in Phuket are in the hills behind the beach or on clifftops above.
            </div>
        </div><?php */?>
        
        <div class="col-md-12 nopad top41">
        <h4 class=" mb f22 top"><strong><a class="tg cdf" >1. Where can I find the best villas on the beach in Phuket</a></strong></h4>
            <div class="col-md-12 nopad top21 f18">
                Right here is the answer. We represent all the very best villas and other agents have to rent them through us so if you would like to rent a beachfront villa in Phuket direct from the owner then Inspiring Villas is the place to do this.
            </div>
        </div>
        
        <div class="col-md-12 nopad top41">
        <h4 class=" mb f22 top"><strong><a class="tg cdf" >2. What time is check-in and check-out</a></strong></h4>
            <div class="col-md-12 nopad top21 f18">
                Private villas work similarly to hotels so the check-in is usually in the afternoon and check-out is by midday. Each villa is different so please ask us.
            </div>
        </div>
        
        <div class="col-md-12 nopad top41">
        <h4 class=" mb f22 top"><strong><a class="tg cdf" >3. How do I book</a></strong></h4>
            <div class="col-md-12 nopad top21 f18">
                All our inquiries through the website go direct to the Owner. Once you make an inquiry our concierge service will contact you to work through your plans and provide a full range of villa options available.
            </div>
        </div>
        <?php
        }?>
         <?php 
		if($_REQUEST['cate']==6)
		{
		?>
         <?php /*?><div class="col-md-12 nopad top21">
            <h4 class=" mb f22 top"><strong><a class="tg cdf" >Could this be the best beachfront villa in Phuket</a></strong></h4>
            <div class="col-md-12 nopad top21 f18">
                We think so. <a href="/luxury-villas/villa-thousand-hills/nai-harn-phuket-thailand.html" class="blu">Villa Thousand Hills</a> beside Nai Harn beach allows you to open between 2 and 9 bedrooms, sleeps up to 22 and is just a few steps to one of the best snorkeling beaches on the island. This modern villa just completed in 2017 comes with all the facilities you could need, and provides a multi-van for free airport transfers and daily complimentary use during your stay.

            </div>
        </div><?php */?>
        <?php }else{}?>
        
        	<?php
				if($_SERVER['REQUEST_URI']=='/search-rent/thailand-phuket/all-beach/all-price/1-4-bedrooms/all-collections/all-sort.html')
				{
					
					?>
        		<?php /*?><div class="col-md-12 nopad top41">
					<h4 class=" mb f30 top"><strong><a class="tg cdf" >2019 Phuket Villa Cost Survey</a></strong></h4>
				</div>
				
				<div class="col-md-12 nopad top41">
				<h4 class=" mb f22 top"><strong><a class="tg cdf" >4 Bedroom Villa Phuket cost </a></strong></h4>
					<div class="col-md-12 nopad top21 f18">
						Being the villa marketing company with the widest choice of 2, 3 and 4 bedroom villas in Phuket, we have analysed our data for this survey.<br>
                        We present here the average cost by analysing our data across 2018 to give a guide for the 2019 villa rental cost.<br>
                        The average 4 bedroom Phuket villa cost is $990++ a night.<br>
                        Meaning the average cost is USD$248 a room each night or $124 a night per person.<br>
                        For our many Australian visitors this is AUD$172 a night per person to stay.<br>
                        Of course you can find low season deals and high season luxury, this is the market average to use as a benchmark for 2019.
					</div>
				</div><?php */?>
                <?php
				}
				?>
        
        
        <?php /*?><div class="col-md-12 nopad top41">
        <h4 class=" mb f30 top"><strong><a class="tg cdf" >What to do in Phuket?</a></strong></h4>
            <div class="col-md-12 nopad top21 f18">
                Phuket is a large island with beautiful beaches and surrounded by many beautiful islands scattered in the Andaman sea. There is a great choice of restaurants, spas, beach clubs and so many activities and excursions to enjoy. Golf courses, Marinas, Island boat trips, yacht charters, sailing, water sports and more.<br><br>

          </div>
        </div><?php */?>
        <?php 
		if($_REQUEST['cate']!=6)
		{
		?>
       <?php /*?> <div class="col-md-12 nopad top21">
        <h4 class=" mb f22 top"><strong><a class="tg cdf" >Food & Drink</a></strong></h4>
            <div class="col-md-12 nopad top21 f18">
                Phuket is renowned for its food, ranging from delicious street food to its popular established restaurants. Especially Phuket Town with some of the oldest restaurants serving their Thai cuisine. Or try out the great Malay food in one of the many shophouses here. You can find great dining options everywhere on Phuket, even in the hills there is sure to be a restaurant nearby or you can rely on your full-time chef in the villa.
            </div>
        </div><?php */?>
        <?php }else{}?>
        
        <?php /*?><div class="col-md-12 nopad top21">
        <h4 class=" mb f22 top"><strong><a class="tg cdf" >Island Tours</a></strong></h4>
            <div class="col-md-12 nopad top21 f18">
                There is so much to do in Phuket if you want to get out of the villa and explore. The most popular excursions are on the water. There are day trips or you can charter a yacht and do exactly as you please. The rocky Phi Phi islands are close enough to reach by speed boat. Some boats carry kayaks to explore the narrow channels of the small islands in Phang Nga bay. Wherever you go the towering islands and clear water on their untouched beaches is sure to amaze. 
            </div>
        </div><?php */?>
        <?php 
		if($_REQUEST['cate']!=6)
		{
		?>
   		<?php /*?><div class="col-md-12 nopad top41">
        <h4 class=" mb f30 top"><strong><a class="tg cdf" >What are the best villas for golfing holidays in Phuket</a></strong></h4>
            <div class="col-md-12 nopad top21 f18">
                A private villa for a golf holiday in Phuket is a great way to stay and all transportation & arrangements can be made for you. We have the best luxury villas for a Phuket golf holiday. 
            </div>
        </div><?php */?>
        <?php }else{}?>
        
       <?php /*?> <div class="col-md-12 nopad top41">
        <h4 class=" mb f30 top"><strong><a class="tg cdf" >When to go to Phuket</a></strong></h4>
            <div class="col-md-12 nopad top21 f18">
                With its tropical climate the high season is warm and dry from November until April. Monsoon rains come mid May through October.
Rainy season can mean just an afternoon shower and offer cooler days and nights. Stay periods in Phuket are spread out with year round facilities
and ease of access via the international airport.<br><br><br>

            </div>
        </div><?php */?>
        		<?php
				if($_SERVER['REQUEST_URI']=='/search-rent/thailand-phuket/all-beach/all-price/5-7-bedrooms/all-collections/all-sort.html')
				{
					?>
                   <?php /*?> <h4 class=" mb f30 top"><strong><a class="tg cdf" >Discover the Best 5,6,7 Bedroom Villas in Phuket</a></strong></h4>
                    <div class="col-md-12 nopad top41">
                        <table class="table table-bordered table-striped ttb" width="100%%" border="1">
                            <thead>
                                <tr>
                                    <th>Phuket Location</th>
                                    <th>Price From</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                    <h3 class="f14 th3">
                                        <a href="/search-rent/thailand-phuket/kamala-beach/all-price/all-bedrooms/all-collections/all-sort.html" class="blu">Kamala <?php //echo $f_villas;?></a>
                                    </h3>
                                    </td>
                                    <td>$995</td>
                                </tr>
                                <tr>
                                    <td>
                                    <h3 class="f14 th3">
                                        <a href="/search-rent/thailand-phuket/layan-beach/all-price/all-bedrooms/all-collections/all-sort.html" class="blu">Layan <?php //echo $f_villas;?></a>
                                    </h3>
                                    </td>
                                    <td>$690</td>
                                </tr>
                                <tr>
                                    <td>
                                    <h3 class="f14 th3">
                                        <a href="/search-rent/thailand-phuket/surin-beach/all-price/all-bedrooms/all-collections/all-sort.html" class="blu">Surin <?php //echo $f_villas;?></a>
                                    </h3>
                                    </td>
                                    <td>$590</td>
                                </tr>
                                <tr>
                                    <td>
                                    <h3 class="f14 th3">
                                        <a class="blu" href="/search-rent/thailand-phuket/nai-harn/all-price/all-bedrooms/all-collections/all-sort.html">Nai Harn <?php //echo $f_villas;?></a>
                                    </h3>
                                    </td>
                                    <td>$590</td>
                                </tr>
                                <tr>
                                    <td>
                                    <h3 class="f14 th3">
                                        <a class="blu" href="/search-rent/thailand-phuket/ao-yon-bay/all-price/all-bedrooms/all-collections/all-sort.html">Ao Yon <?php //echo $f_villas;?></a>
                                    </h3>
                                    </td>
                                    <td>$765</td>
                                </tr>
                                <tr>
                                    <td>
                                    <h3 class="f14 th3">
                                        <a class="blu" href="/search-rent/thailand-phuket/cape-yamu/all-price/all-bedrooms/all-collections/all-sort.html">Cape Yamu <?php //echo $f_villas;?></a>
                                    </h3>
                                    </td>
                                    <td>$657</td>
                                </tr>
                                
                            </tbody>
                        </table>
                    </div><?php */?>
					<?php
				}
				elseif($_SERVER['REQUEST_URI']=='/search-rent/thailand-phuket/all-beach/all-price/8-10-bedrooms/all-collections/all-sort.html')
				{
					
					?>
                    <?php /*?><h4 class=" mb f30 top"><strong><a class="tg cdf" >Discover the Best 8,9,10> Bedroom Villas in Phuket</a></strong></h4>
                    <div class="col-md-12 nopad top41">
                        <table class="table table-bordered table-striped ttb" width="100%%" border="1">
                            <thead>
                                <tr>
                                    <th>Phuket Location</th>
                                    <th>Price From</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                    <h3 class="f14 th3">
                                        <a href="/search-rent/thailand-phuket/kamala-beach/all-price/all-bedrooms/all-collections/all-sort.html" class="blu">Kamala <?php //echo $f_villas;?></a>
                                    </h3>
                                    </td>
                                    <td>$1,250</td>
                                </tr>
                                <tr>
                                    <td>
                                    <h3 class="f14 th3">
                                        <a href="/search-rent/thailand-phuket/surin-beach/all-price/all-bedrooms/all-collections/all-sort.html" class="blu">Surin <?php //echo $f_villas;?></a>
                                    </h3>
                                    </td>
                                    <td>$1,220</td>
                                </tr>
                                <tr>
                                    <td>
                                    <h3 class="f14 th3">
                                        <a class="blu" href="/search-rent/thailand-phuket/nai-harn/all-price/all-bedrooms/all-collections/all-sort.html">Nai Harn <?php //echo $f_villas;?></a>
                                    </h3>
                                    </td>
                                    <td>$590</td>
                                </tr>
                                <tr>
                                    <td>
                                    <h3 class="f14 th3">
                                        <a class="blu" href="/search-rent/thailand-phuket/bang-tao-beach/all-price/all-bedrooms/all-collections/all-sort.html">Bang Tao <?php //echo $f_villas;?></a>
                                    </h3>
                                    </td>
                                    <td>$1,695</td>
                                </tr>
                                
                            </tbody>
                        </table>
                    </div>
                    <?php */?>
                    
                    
                    
                    
                    
					<?php /*?><div class="col-md-12 nopad top41">
                    <h4 class=" mb f30 top"><strong><a class="tg cdf" >Most Popular 8,9,10> Bedroom Villas in Phuket</a></strong></h4>
                        <div class="col-md-12 nopad top21 f18">
                           
                        </div>
                    </div>
                     
                    <div itemscope itemtype="http://schema.org/Product" class="col-md-12 nopad top21">
                    <h4 class=" mb f22 top"><strong><a class="tg cdf" >1. <a href="/luxury-villas/villa-aye/kamala-phuket-thailand.html" class="blu">Villa Aye </span></a> <span class="tg">in Kamala</span></a></strong></h4>
                        <div class="col-md-12 nopad top21 f18">
                            <strong>Perched on a hilltop with infinity pool up high, stunning panoramic views and manicured lawns.</strong><br>
The social spaces indoors flow into each other to create one big communal floor in the villa overlooking the Andaman sea. Sleeps up to 16 guests.

                        </div>
                    </div>
                    
                    <div itemscope itemtype="http://schema.org/Product" class="col-md-12 nopad top21">
                    <h4 class=" mb f22 top"><strong><a class="tg cdf" >2. <a href="/luxury-villas/villa-yin-yang/kamala-beach-phuket-thailand.html" class="blu"><span itemprop="name">Villa Yin & Villa Yang</span></a> <span class="tg">in Kamala</span></a></strong></h4>
                        <div class="col-md-12 nopad top21 f18">
                           Two stylish & private villas ontop of the cliff next to each other in Kamala.
                        </div>
                    </div>
                    
                    <div itemscope itemtype="http://schema.org/Product" class="col-md-12 nopad top21">
                    <h4 class=" mb f22 top"><strong><a class="tg cdf" >3. <a href="/luxury-villas/villa-sawarin/cape-yamu-phuket-thailand.html" class="blu"><span itemprop="name">Villa Sawarin</span></a> <span class="tg">in Cape Yamu</span></a></strong></h4>
                        <div class="col-md-12 nopad top21 f18">
                            This beachfront villa estate has something for everybody in your group.<br>
                            With enormous grounds leading to its own private beach and all facilities imaginable across the different floors of the villa.<br>
                            A roof top pool and sky deck is the focal point of outdoor activities here.
                        </div>
                    </div>
                    
                    <div itemscope itemtype="http://schema.org/Product" class="col-md-12 nopad top21">
                    <h4 class=" mb f22 top"><strong><a class="tg cdf" >4. <a href="/luxury-villas/villa-thousand-hills/nai-harn-phuket-thailand.html" class="blu"><span itemprop="name">Villa Thousand Hills</span></a> <span class="tg">in Nai Harn</span></a></strong></h4>
                        <div class="col-md-12 nopad top21 f18">
                            Just above the beach in Nai Harn is this brand new villa which has different annexes available for guests so groups can enjoy themselves in separate areas or come together in the large communal areas of the main indoor and outdoor level<br>
Sleeps 22 guests.
                        </div>
                    </div>
                    
                    <div itemscope itemtype="http://schema.org/Product" class="col-md-12 nopad top21">
                    <h4 class=" mb f22 top"><strong><a class="tg cdf" >5. <a href="/luxury-villas/villa-beyond-namaste/bangtao-beach-phuket-thailand.html" class="blu"><span itemprop="name">Villa Beyond Namaste</span></a> <span class="tg">in Bangtao</span></a></strong></h4>
                        <div class="col-md-12 nopad top21 f18">
                            
                            On a hilltop above the beach these villas combine together to offer good spaces to accommodate<br>
                            up to 26 guests.
                        </div>
                    </div><?php */?>
                    
                   <?php /*?> <div itemscope itemtype="http://schema.org/Product" class="col-md-12 nopad top21">
                    <h4 class=" mb f22 top"><strong><a class="tg cdf" >6. <a href="/luxury-villas/vertigo-villa-amonteera/surin-phuket-thailand.html" class="blu"><span itemprop="name">Villa Amonteera</span></a> <span class="tg">in Surin</span></a></strong></h4>
                        <div class="col-md-12 nopad top21 f18">
                            Above Surin beach sits this very modern villa offering comforts and superb amenities.<br>
                            Sleeps up to 22 guests.
                        </div>
                    </div><?php */?>
                    
                    <?php /*?><div itemscope itemtype="http://schema.org/Product" class="col-md-12 nopad top21">
                    <h4 class=" mb f22 top"><strong><a class="tg cdf" >6. <a href="/luxury-villas/vertigo-villa-zavier/surin-phuket-thailand.html" class="blu"><span itemprop="name">Villa Zavier</span></a> <span class="tg">in Surin</span></a></strong></h4>
                        <div class="col-md-12 nopad top21 f18">
                            On the hillside above the beach luxury and amenities is what this villa is all about for up to 16 guests - games, cinema, bowling, fitness, putting green - and views to take your breath away from the spaces flowing into each other form inside to outdoors.
                        </div>
                    </div>
                    
                    <div itemscope itemtype="http://schema.org/Product" class="col-md-12 nopad top21">
                    <h4 class=" mb f22 top"><strong><a class="tg cdf" >7. <a href="/luxury-villas/villa-baan-amandeha/ao-yon-bay-phuket-thailand.html" class="blu"><span itemprop="name">Villa Baan Amandeha</span></a> <span class="tg">in Ao Yon</span></a></strong></h4>
                        <div class="col-md-12 nopad top21 f18">
                            This huge beachfront villa is made for a large group to spend time together.<br>
                            Right on the beach with a sunken outdoor lounge area beside the pool, outdoor bar, jacuzzi, sauna and steam room.<br>
                            There is one price so for the best value come as 20 people and it will make your next great villa vacation.
                        </div>
                    </div><?php */?>
				<?php
				}
				?>
        <?php 
		if($_REQUEST['room']=='all')
		{
			if($_REQUEST['cate']!=6)
			{
		?>
        <div class="col-md-12 nopad top41">
        <h4 class=" mb f30 top"><strong><a class="tg cdf" >How can I find the best villas in Phuket</a></strong></h4> <?php /*?>How can I find the best luxury villas in Phuket<?php */?>
            <div class="col-md-12 nopad top21 f18">
                <?php /*?>Well right here is where you can find them. We represent all the best villas and they come with every amenity you can imagine.
Whether you want a playground with a bowling alley and putting green or you are looking for a private luxury retreat we have it all.
Just get ready to have the best time on your next holiday.<?php */?>
				Well right here is where you can find them. We represent all the best villas in Phuket and they come with every amenity you can imagine. Whether you want a playground villa with a bowling alley and putting green or you are looking for a private luxury retreat we have it all. Just get ready to have the best time on your next villa vacation in Phuket.
            </div>
        </div>
        
        <div class="col-md-12 nopad top41">
        <h4 class=" mb f30 top"><strong><a class="tg cdf" >Where can i find a place to search all of the villas for rent </a></strong></h4>
            <div class="col-md-12 nopad top21 f18">
              Well you are here so you have found it. We offer all of Phuket’s best private villa rentals.<br>
You can sort them by number of bedrooms, location, price and type.<br>
This should help you make the search for your next trip as easy as possible.<br>
And by the way, they really are incredible luxury villas.


<?php /*?> Well you are here so you have found it. We offer all of Phuket’s best villas.<br>
You can sort them by number of bedrooms, location, price and type.<br>
This should help you make the search for your next trip as easy as possible.<br>
And by the way, they are incredible villas. So start searching for your next vacation here.<?php */?>
            </div>
        </div>
        
        
        <div class="col-md-12 nopad top41">
        <h4 class=" mb f30 top"><strong><a class="tg cdf" >How do I find the best villas in Phuket for our group requirements</a></strong></h4> <?php /*?>How do I find the best luxury villas in Phuket for our group requirements<?php */?>
            <div class="col-md-12 nopad top21 f18">
            Just leave that to us.<br>
Our concierge staff will be happy to learn about your preferences and group profile and provide a list of the very best luxury villas in Phuket.<br>
This will save you lots of time and research as we will only present the villas for rent that suit and are available.

            </div>
        </div>
        
        <?php
          }else{}?>
        <div class="col-md-12 nopad top41">
        <?php 
		if($_REQUEST['cate']!=6)
		{
			$link_url_footer = $_SERVER['REQUEST_URI'];
			if($link_url_footer == '/search-rent/thailand-phuket/all-beach/all-price/all-bedrooms/all-collections/all-sort.html')
			{
				$f_villas = "";
			}
			else
			{
				$f_villas = "Villas";
			}
		?>
			 <h2 class=" mb f30 top"><strong><a class="tg cdf" >Discover the Best Villas in Phuket</a></strong></h2> <?php /*?>Popular Luxury Villa locations Phuket<?php */?>
             
             <div class="col-md-12 nopad top21">
            <table class="table table-bordered table-striped ttb" width="629px" border="1" >
                <thead>
                    <tr>
                        <th>Phuket location</th>
                        <th>Price From</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>
                        <h3 class="f14 th3">
                            <a href="/search-rent/thailand-phuket/kamala-beach/all-price/all-bedrooms/all-collections/all-sort.html" class="blu">Kamala <?php echo $f_villas;?></a>
                        </h3>
                        </td>
                        <td>$995</td>
                    </tr>
                    <tr>
                        <td>
                        <h3 class="f14 th3">
                            <a href="/search-rent/thailand-phuket/layan-beach/all-price/all-bedrooms/all-collections/all-sort.html" class="blu">Layan <?php echo $f_villas;?></a>
                        </h3>
                        </td>
                        <td>$690</td>
                    </tr>
                    <?php /*?><tr>
                        <td>
                        <h3 class="f14 th3">
                            <a href="/search-rent/thailand-phuket/bang-tao-beach/all-price/all-bedrooms/all-collections/all-sort.html" class="blu">Bang Tao <?php echo $f_villas;?></a>
                        </h3>
                        </td>
                        <td>$500</td>
                    </tr><?php */?>
                    <tr>
                        <td>
                        <h3 class="f14 th3">
                            <a href="/search-rent/thailand-phuket/surin-beach/all-price/all-bedrooms/all-collections/all-sort.html" class="blu">Surin <?php echo $f_villas;?></a>
                        </h3>
                        </td>
                        <td>$590</td>
                    </tr>
                    <?php /*?><tr>
                        <td>
                        <h3 class="f14 th3">
                            <a class="blu" href="/search-rent/thailand-phuket/kata-beach/all-price/all-bedrooms/all-collections/all-sort.html">Kata <?php echo $f_villas;?></a>
                        </h3>
                        </td>
                        <td>$675</td>
                    </tr><?php */?>
                    <tr>
                        <td>
                        <h3 class="f14 th3">
                            <a class="blu" href="/search-rent/thailand-phuket/nai-harn/all-price/all-bedrooms/all-collections/all-sort.html">Nai Harn <?php echo $f_villas;?></a>
                        </h3>
                        </td>
                        <td>$590</td>
                    </tr>
                    <tr>
                        <td>
                        <h3 class="f14 th3">
                            <a class="blu" href="/search-rent/thailand-phuket/ao-yon-bay/all-price/all-bedrooms/all-collections/all-sort.html">Ao Yon <?php echo $f_villas;?></a>
                        </h3>
                        </td>
                        <td>$765</td>
                    </tr>
                    <tr>
                        <td>
                        <h3 class="f14 th3">
                            <a class="blu" href="/search-rent/thailand-phuket/cape-yamu/all-price/all-bedrooms/all-collections/all-sort.html">Cape Yamu <?php echo $f_villas;?></a>
                        </h3>
                        </td>
                        <td>$657</td>
                    </tr>
                </tbody>
            </table>
            <div class="col-md-12 nopad  f18">
                There are very popular beaches on the west coast with many beautiful luxury villas in Phuket.<br><br>
            </div>
            </div>
		 <?php
		}
		else
		{
			$link_url_footer = $_SERVER['REQUEST_URI'];
			if($link_url_footer == '/search-rent/thailand-phuket/all-beach/all-price/all-bedrooms/beachfront-villas/all-sort.html')
			{
				$f_villas = "";
			}
			else
			{
				$f_villas = "Villas";
			}
			?>
			 <?php /*?><h2 class=" mb f30 top"><strong><a class="tg cdf" >Discover the Best Beachfront Villas in Phuket</a></strong></h2>
             
              <div class="col-md-12 nopad top21">
            <table class="table table-bordered table-striped ttb" width="629px" border="1">
                <thead>
                    <tr>
                        <th>Beachfront Villa Locations</th>
                        <th>Price From</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>
                        <h3 class="f14 th3">
                            <a href="/search-rent/thailand-phuket/kamala-beach/all-price/all-bedrooms/all-collections/all-sort.html" class="blu">Kamala <?php echo $f_villas;?></a>
                        </h3>
                        </td>
                        <td>$995</td>
                    </tr>
                    <tr>
                        <td>
                        <h3 class="f14 th3">
                            <a class="blu" href="/search-rent/thailand-phuket/nai-harn/all-price/all-bedrooms/all-collections/all-sort.html">Nai Harn <?php echo $f_villas;?></a>
                        </h3>
                        </td>
                        <td>$1,950</td>
                    </tr>
                    <tr>
                        <td>
                        <h3 class="f14 th3">
                            <a class="blu" href="/search-rent/thailand-phuket/ao-yon-bay/all-price/all-bedrooms/all-collections/all-sort.html">Ao Yon <?php echo $f_villas;?></a>
                        </h3>
                        </td>
                        <td>$765</td>
                    </tr>
                    <tr>
                        <td>
                        <h3 class="f14 th3">
                            <a class="blu" href="/search-rent/thailand-phuket/cape-yamu/all-price/all-bedrooms/all-collections/all-sort.html">Cape Yamu <?php echo $f_villas;?></a>
                        </h3>
                        </td>
                        <td>$657</td>
                    </tr>
                </tbody>
            </table><br><br>
            </div><?php */?>
            
           <?php /*?> <div class="col-md-12 nopad  f18">
                There are some very popular beaches along the coastline with many beautiful luxury beachfront villas in Phuket.<br><br>
            </div><?php */?>
			<?php
		}
		?>
            
        </div>
        
        <?php 
		if($_REQUEST['cate']!=6)
		{
		?>
        <div itemscope itemtype="http://schema.org/Product" class="col-md-12 nopad top41">
        <h4 class=" mb f22 "><strong><a class="tg cdf" >1. <a class="blu" href="/search-rent/thailand-phuket/kamala-beach/all-price/all-bedrooms/all-collections/all-sort.html"><span itemprop="name">Kamala Villas</span></a></a></strong></h4>
            <div itemprop="description" class="col-md-12 nopad top21 f18">
                A popular destination with beach dining and shopping and not far from the main entertainment district Patong. The newly opened Cafe Del Mar beach club is located here. Kamala’s luxury villas are nestled in the hills above the beach.
            </div>
        </div>
        
        <div itemscope itemtype="http://schema.org/Product" class="col-md-12 nopad top21" style="margin-top: 40px;">
        <h4 class=" mb f22 top"><strong><a class="tg cdf" >2. <a class="blu" href="/search-rent/thailand-phuket/layan-beach/all-price/all-bedrooms/all-collections/all-sort.html"><span itemprop="name">Layan Villas</span></a></a></strong></h4>
            <div  class="col-md-12 nopad top21 f18"><?php /*?>itemprop="description"<?php */?>
                A quiet beach just north of Laguna and its Golf club. Villas sit on top of the cliff and in the hills above the beach.
            </div>
        </div>
        
        <div itemscope itemtype="http://schema.org/Product" class="col-md-12 nopad top21">
        <h4 class=" mb f22 top"><strong><a class="tg cdf" >3. <a class="blu" href="/search-rent/thailand-phuket/surin-beach/all-price/all-bedrooms/all-collections/all-sort.html"><span itemprop="name">Surin Villas</span></a></a></strong></h4>
            <div  class="col-md-12 nopad top21 f18">
                Surin is known as 'Millionaire’s Row' with it’s many top end resorts and luxury villas. The private villas sit on prime spots on top of the hill overlooking the white sand and turquoise waters below.
            </div>
        </div>
        
        
        <div itemscope itemtype="http://schema.org/Product" class="col-md-12 nopad top21">
        <h4 class=" mb f22 top"><strong><a class="tg cdf" >4. <a class="blu" href="/search-rent/thailand-phuket/nai-harn/all-price/all-bedrooms/all-collections/all-sort.html"><span itemprop="name">Nai Harn Villas</span></a></a></strong></h4>
            <div itemprop="description" class="col-md-12 nopad top21 f18">
                Ao Sane beach is directly beside Nai harn. Imagine that you could rent the only villa nestled in a bay’s hill, with a few steps leading down to the beach. The beach is known to be one of the safest and best beaches for swimming and snorkelling on the island.<br>
Possibly one of the most private villas in Phuket, explore 9 bedroom Villa Thousand Hills which sleeps up to 22.

            </div>
        </div>
        
        <div itemscope itemtype="http://schema.org/Product" class="col-md-12 nopad top21">
        <h4 class=" mb f22 top"><strong><a class="tg cdf" >5. <a class="blu" href="/search-rent/thailand-phuket/ao-yon-bay/all-price/all-bedrooms/all-collections/all-sort.html"><span itemprop="name">Ao Yon Villas</span></a></a></strong></h4>
            <div itemprop="description" class="col-md-12 nopad top21 f18">
                A piece of old Thailand in this secluded & quiet bay in Phuket's south. There are only a few villas here but possibly the best on the island.

            </div>
        </div>
        
        <div itemscope itemtype="http://schema.org/Product" class="col-md-12 nopad top21">
        <h4 class=" mb f22 top"><strong><a class="tg cdf" >6. <a class="blu" href="/search-rent/thailand-phuket/cape-yamu/all-price/all-bedrooms/all-collections/all-sort.html"><span itemprop="name">Cape Yamu Villas</span></a></a></strong></h4>
            <div itemprop="description" class="col-md-12 nopad top21 f18">
                On the east of the island looking out to Phang Nga, the villas for rent are super luxury and beachfront.
            </div>
        </div>
         <?php
		}
		else
		{
			?>
            <?php /*?><div itemscope itemtype="http://schema.org/Product" class="col-md-12 nopad top41">
        <h4 class=" mb f22 "><strong><a class="tg cdf" >1. <a class="blu" href="/search-rent/thailand-phuket/kamala-beach/all-price/all-bedrooms/all-collections/all-sort.html"><span itemprop="name">Kamala Villas</span></a></a></strong></h4>
            <div itemprop="description" class="col-md-12 nopad top21 f18">
                A popular destination with beach dining and shopping and not far from the main entertainment district Patong. The newly opened Cafe Del Mar beach club is located here. Kamala’s luxury villas are nestled in the hills above the beach.
            </div>
        </div>
                
        <div itemscope itemtype="http://schema.org/Product" class="col-md-12 nopad top21">
        <h4 class=" mb f22 top"><strong><a class="tg cdf" >2. <a class="blu" href="/search-rent/thailand-phuket/nai-harn/all-price/all-bedrooms/all-collections/all-sort.html"><span itemprop="name">Nai Harn Villas</span></a></a></strong></h4>
            <div itemprop="description" class="col-md-12 nopad top21 f18">
                Ao Sane beach is directly beside Nai harn. Imagine that you could rent the only villa nestled in a bay’s hill, with a few steps leading down to the beach. The beach is known to be one of the safest and best beaches for swimming and snorkelling on the island.<br>
Possibly one of the most private beachfront villas in Phuket, explore 9 bedroom Villa Thousand Hills which sleeps up to 22.

            </div>
        </div>
        
        <div itemscope itemtype="http://schema.org/Product" class="col-md-12 nopad top21">
        <h4 class=" mb f22 top"><strong><a class="tg cdf" >3. <a class="blu" href="/search-rent/thailand-phuket/ao-yon-bay/all-price/all-bedrooms/all-collections/all-sort.html"><span itemprop="name">Ao Yon Villas</span></a></a></strong></h4>
            <div itemprop="description" class="col-md-12 nopad top21 f18">
                A piece of old Thailand in this secluded & quiet bay in Phuket's south. There are only a few villas here but possibly the best on the island.

            </div>
        </div>
        
        <div itemscope itemtype="http://schema.org/Product" class="col-md-12 nopad top21">
        <h4 class=" mb f22 top"><strong><a class="tg cdf" >4. <a class="blu" href="/search-rent/thailand-phuket/cape-yamu/all-price/all-bedrooms/all-collections/all-sort.html"><span itemprop="name">Cape Yamu Villas</span></a></a></strong></h4>
            <div itemprop="description" class="col-md-12 nopad top21 f18">
                On the east of the island looking out to Phnag Nga, the villas for rent here are the most luxury Phuket beachfront villas on the entire island.
            </div>
        </div><?php */?>
        <?php
		}
		?>
        
			<?php
            if($_REQUEST['cate']==6)
            {?>
            <?php
			}
            else
            {?>
            <?php /*?><div class="col-md-12 nopad top21">
            <h4 class=" mb f22 top"><strong><a class="tg cdf" >Surin Villas Top Pick</a></strong></h4>
                <div class="col-md-12 nopad top21 f18">
                    Possibly the most luxurious Villa in Phuket is the 6 bedroom luxury <a class="blu" href="/luxury-villas/villa-chan-grajang/surin-phuket-thailand.html"><strong>Villa Chan Grajang</strong></a><br><br><br>
                </div>
            </div><?php */?>
            <?php
            }
		}
		else
		{
			?>
			<div class="col-md-12 nopad top21">
                <div class="col-md-12 nopad top21 f18">
                </div>
            </div>
			<?php
		}?>
    </div> 
<?php
}
else
{
	//echo "000000000---show_phuket";
}
?>