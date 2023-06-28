<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
    <div class="section-title">
        <h3 class="color-aqua"><a href="blog-category-01.html" title=""  style="background:<?php echo $bc_row['color'];?> !important;"><?php echo $bc_row['name'];?></a></h3>
    </div><!-- end title -->
	
    
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        
        	<?php 
			$sql_blog = $dbc->Query("select * from blogs where status > 0 and (heightlight = 0 or heightlight IS NULL) and category = '".$bc_row['id']."' order by sort asc");
			while($row_blog = $dbc->Fetch($sql_blog))
			{
				$photo = imagePath('/'.json_decode($row_blog['photo_width'],true));
				$urll = "/blog/" . strtolower(str_replace(" ", "-", $row_blog['name']) ) . ".html";
				?>
                <div class="blog-box">
                    <div class="post-media">
                        <a href="<?php echo $urll;?>" title="">
                            <img src="<?php echo $photo;?>" alt="" class="img-fluid">
                            <div class="hovereffect">
                                <span></span>
                            </div><!-- end hover -->
                        </a>
                    </div><!-- end media -->
                    <div class="blog-meta big-meta">
                        <h4><a href="<?php echo $urll;?>" title=""><?php echo $row_blog['name'];?></a></h4>
                        <p><?php echo base64_decode($row_blog['brief']);?></p>
                        <small><a href="blog-category-01.html" title=""><?php echo $bc_row['name'];?></a></small>
                        <small><?php echo dateType2($row_blog['day']);?></small>
                        <small>by <?php echo $row_blog['byname'];?></small>
                    </div><!-- end meta -->
                </div><!-- end blog-box -->
    
                <hr class="invis">
                <?php
			}
			?>
            

            <?php /*?><div class="blog-box">
                <div class="post-media">
                    <a href="block-single.html" title="">
                        <img src="../../upload/b4.jpg" alt="" class="img-fluid">
                        <div class="hovereffect">
                            <span></span>
                        </div><!-- end hover -->
                    </a>
                </div><!-- end media -->
                <div class="blog-meta big-meta">
                    <h4><a href="block-single.html" title="">I have a desert visit this summer</a></h4>
                    <p>Aenean interdum arcu blandit, vehicula magna non, placerat elit. Mauris et pharetratortor. Suspendissea sodales urna. In at augue elit. Vivamus enim nibh, maximus ac felis nec, maximus tempor odio.</p>
                    <small><a href="blog-category-01.html" title="">Lifestyle</a></small>
                    <small><a href="block-single.html" title="">22 July, 2017</a></small>
                    <small><a href="blog-author.html" title="">by Martines</a></small>
                </div><!-- end meta -->
            </div><!-- end blog-box --><?php */?>
            
            
            
        </div><!-- end col -->
    </div><!-- end row -->
</div><!-- end col -->