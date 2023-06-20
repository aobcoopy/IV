<?php /*?><div class="container  <?php echo $collection_only;?>"><?php */?><?php //echo $brr;?>
    <?php /*?><div class="col-sm-12 col-md-6 nopad"><?php */?>
    <?php /*?><div class="col-md-3 col-sm-6 col-xs-12">
         <ul class="menulinkfooter tb"><?php */?>
    <?php
    //echo $case.'<br>';
    
    $y=1;
    
    $arr_link_12 = array();
    
    $blink_2 = array();
    
   /* if($_REQUEST['des']=='all' && $_REQUEST['sub']=='all' && $_REQUEST['room']=='all' && $_REQUEST['cate']!='0')
    {*/
       // $case = "yesssssssssssssssssssssssssssssss---12 ok new";
        $xx12=1;
        
       /* foreach($arr_coll_name as $acn)
        {
            $alink = '<li class=""><a class="tb" href="/search-rent/'.destination_footer(0).'/'.beach_footer(0).'/all-price/'.bed_footer($_REQUEST['room']).'/'.collection_footer($_REQUEST['cate']).'/all-sort.html" >'.$acn['name'].' Thailand Villas</a></li>';
            array_push($arr_link_12,$alink);
            $xx12++;
        }*/
        
            
            
        ////foreach($arr_bed as $abed)
////        {
////            /*if($_REQUEST['room']==$abed['id'])
////            {*/
////                $alink = '<li class="diy"><a class="tb" href="/search-rent/'.destination_footer(0).'/'.beach_footer(0).'/all-price/'.bed_footer($abed['id']).'/'.collection_footer($_REQUEST['cate']).'/all-sort.html" >'.$abed['name'].' '.collection_footer_name($_REQUEST['cate']).' Thailand Villas</a></li>';
////                array_push($arr_link_12,$alink);
////                $xx12++;
////                /*$alink = '<li class=""><a class="tb" href="/search-rent/'.destination_footer(38).'/'.beach_footer(0).'/all-price/'.bed_footer($abed['id']).'/'.collection_footer($_REQUEST['cate']).'/all-sort.html" >'.$abed['name'].' '.collection_footer_name($_REQUEST['cate']).' Phuket Villas</a></li>';
////                array_push($arr_link_12,$alink);
////                $exr11++;
////                $alink = '<li class=""><a class="tb" href="/search-rent/'.destination_footer(39).'/'.beach_footer(0).'/all-price/'.bed_footer($abed['id']).'/'.collection_footer($_REQUEST['cate']).'/all-sort.html" >'.$abed['name'].' '.collection_footer_name($_REQUEST['cate']).' Koh Samui Villas</a></li>';
////                array_push($arr_link_12,$alink);
////                $exr11++;*/
////            /*}*/
////        }
        
            $alink = '<li class=""><a class="tb" href="/search-rent/'.destination_footer(0).'/'.beach_footer(0).'/over-usd-1000/'.bed_footer($_REQUEST['room']).'/'.collection_footer($_REQUEST['cate']).'/all-sort.html" >> 1000USD '.collection_footer_name($_REQUEST['cate']).' Thailand Villas</a></li>';
            array_push($arr_link_12,$alink);
            $xx12++;
            
            $alink = '<li class=""><a class="tb" href="/search-rent/'.destination_footer(0).'/'.beach_footer(0).'/under-usd-1000/'.bed_footer($_REQUEST['room']).'/'.collection_footer($_REQUEST['cate']).'/all-sort.html" >< 1000USD '.collection_footer_name($_REQUEST['cate']).' Thailand Villas</a></li>';
            array_push($arr_link_12,$alink);
            $xx12++;
        
        ////include "libs/pages/footer_region_13.php";
        
        $exr12 = $xx12/4;
        
        $yy_12=1;
        
        foreach($arr_link_12 as $Ylink)
        {
            //echo $Ylink;
            
            if(($yy_12%ceil($exr12))==0)
            {
                //echo '</ul>';
//                echo '</div>';
//                echo '<div class="col-md-3 col-sm-6 col-xs-12">';
//                echo '<ul class="menulinkfooter tb">';
            }
            $yy_12++;
        }
   /* }*/
    ?>
   
       
        <?php /*?></ul>
    </div><?php */?>
    
    <?php /*?></div><?php */?>
<?php /*?></div><?php */?>