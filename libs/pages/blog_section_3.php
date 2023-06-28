<div class="col-lg-9">
<div class="blog-list clearfix">
    <div class="section-title">
        <h3 class="color-green"><a href="blog-category-01.html" title=""  style="background:<?php echo $bc_row['color'];?> !important;"><?php echo $bc_row['name'];?></a></h3>
    </div><!-- end title -->

	<?php 
	$z=0;
	$sql_blog = $dbc->Query("select * from blogs where status > 0 and (heightlight = 0 or heightlight IS NULL) and category = '".$bc_row['id']."' order by sort asc");
	while($row_blog = $dbc->Fetch($sql_blog))
	{
		$photo = imagePath('/'.json_decode($row_blog['photo_sq'],true));
		$urll = "/blog/" . strtolower(str_replace(" ", "-", $row_blog['name']) ) . ".html";
		?>
        <div class="blog-box row">
            <div class="col-md-4">
                <div class="post-media">
                    <a href="<?php echo $urll;?>" title="">
                        <img src="<?php echo $photo;?>" alt="" class="img-fluid">
                        <div class="hovereffect"></div>
                    </a>
                </div><!-- end media -->
            </div><!-- end col -->
    
            <div class="blog-meta big-meta col-md-8">
                <h4><a href="<?php echo $urll;?>" title=""><?php echo $row_blog['name'];?></a></h4>
                <p><?php echo base64_decode($row_blog['brief']);?></p>
                <small><a href="blog-category-01.html" title=""><?php echo $bc_row['name'];?></a></small>
                <small><?php echo dateType2($row_blog['day']);?></small>
                <small>by <?php echo $row_blog['byname'];?></small>
            </div><!-- end meta -->
        </div><!-- end blog-box -->
    
        <hr class="invis">
    
		<?php
		$z++;
	}
	?>
    

    
</div><!-- end blog-list -->

<hr class="invis">
</div><!-- end col -->                      
                        
     <?php /*?>                   
    <div class="blog-box row">
        <div class="col-md-4">
            <div class="post-media">
                <a href="block-single.html" title="">
                    <img src="../../upload/b6.jpg" alt="" class="img-fluid">
                    <div class="hovereffect"></div>
                </a>
            </div><!-- end media -->
        </div><!-- end col -->

        <div class="blog-meta big-meta col-md-8">
            <h4><a href="block-single.html" title="">Let's make an introduction to the glorious world of history</a></h4>
            <p>Aenean interdum arcu blandit, vehicula magna non, placerat elit. Mauris et pharetratortor. Suspendissea sodales urna. In at augue elit. Vivamus enim nibh, maximus ac felis nec, maximus tempor odio.</p>
            <small><a href="blog-category-01.html" title="">Travel</a></small>
            <small><a href="block-single.html" title="">20 July, 2017</a></small>
            <small><a href="blog-author.html" title="">by Samanta</a></small>
        </div><!-- end meta -->
    </div><!-- end blog-box -->

    <hr class="invis">

    <div class="blog-box row">
        <div class="col-md-4">
            <div class="post-media">
                <a href="block-single.html" title="">
                    <img src="../../upload/b6.jpg" alt="" class="img-fluid">
                    <div class="hovereffect"></div>
                </a>
            </div><!-- end media -->
        </div><!-- end col -->

        <div class="blog-meta big-meta col-md-8">
            <h4><a href="block-single.html" title="">Did you see the most beautiful sea in the world?</a></h4>
            <p>Aenean interdum arcu blandit, vehicula magna non, placerat elit. Mauris et pharetratortor. Suspendissea sodales urna. In at augue elit. Vivamus enim nibh, maximus ac felis nec, maximus tempor odio.</p>
            <small><a href="blog-category-01.html" title="">Travel</a></small>
            <small><a href="block-single.html" title="">19 July, 2017</a></small>
            <small><a href="blog-author.html" title="">by Jackie</a></small>
        </div><!-- end meta -->
    </div><!-- end blog-box -->

<?php */?>