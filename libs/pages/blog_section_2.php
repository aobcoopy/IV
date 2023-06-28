<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
    <div class="section-title">
        <h3 class="color-pink" ><a href="blog-category-01.html" style="background:<?php echo $bc_row['color'];?> !important;" title=""><?php echo $bc_row['name'];?></a></h3>
    </div><!-- end title -->
    <div class="row">
   
        
        <?php 
		$z=0;
		$sql_blog = $dbc->Query("select * from blogs where status > 0 and (heightlight = 0 or heightlight IS NULL) and category = '".$bc_row['id']."' order by sort asc");
		while($row_blog = $dbc->Fetch($sql_blog))
		{
			$photo = imagePath('/'.json_decode($row_blog['photo_high'],true));
			$urll = "/blog/" . strtolower(str_replace(" ", "-", $row_blog['name']) ) . ".html";
			?>
            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
			<div class="blog-box">
                <div class="post-media">
                    <a href="<?php echo $urll;?>" title="">
                        <img src="<?php echo $photo;?>" alt="" class="img-fluid">
                        <div class="hovereffect">
                            <span></span>
                        </div><!-- end hover -->
                    </a>
                </div><!-- end media -->
                <div class="blog-meta">
                    <h4><a href="<?php echo $urll;?>" title=""><?php echo $row_blog['name'];?></a></h4>
                    <small><a href="blog-category-01.html" title=""><?php echo $bc_row['name'];?></a></small>
                    <small><?php echo dateType2($row_blog['day']);?></small>
                </div><!-- end meta -->
            </div><!-- end blog-box -->

            <hr class="invis">
            </div><!-- end col -->
			<?php
			if(($z%2)==0)
			{
				//echo '</div><!-- end col -->';
				//echo '<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">';
				$z=0;
			}
			$z++;
		}
		?>
            

        

        
        
        
    </div><!-- end row -->
</div><!-- end col -->
                    
                    
   
   
   
   
  <?php /*?> <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
            <div class="blog-box">
                <div class="post-media">
                    <a href="block-single.html" title="">
                        <img src="../../upload/b5.jpg" alt="" class="img-fluid">
                        <div class="hovereffect">
                            <span></span>
                        </div><!-- end hover -->
                    </a>
                </div><!-- end media -->
                <div class="blog-meta">
                    <h4><a href="block-single.html" title="">This year's fashionable long beard</a></h4>
                    <small><a href="blog-category-01.html" title="">Fashion</a>, <a href="blog-category-01.html" title="">Man</a></small>
                    <small><a href="blog-category-01.html" title="">08 July, 2017</a></small>
                </div><!-- end meta -->
            </div><!-- end blog-box -->

            <hr class="invis">

            <div class="blog-box">
                <div class="post-media">
                    <a href="block-single.html" title="">
                        <img src="../../upload/b5.jpg" alt="" class="img-fluid">
                        <div class="hovereffect">
                            <span></span>
                        </div><!-- end hover -->
                    </a>
                </div><!-- end media -->
                <div class="blog-meta">
                    <h4><a href="block-single.html" title="">How to be more cool with clothing</a></h4>
                    <small><a href="blog-category-01.html" title="">Fashion</a>, <a href="blog-category-01.html" title="">Style</a></small>
                    <small><a href="blog-category-01.html" title="">04 July, 2017</a></small>
                </div><!-- end meta -->
            </div><!-- end blog-box -->
        </div><!-- end col -->              <?php */?>   
                    
                    
                    
                    
