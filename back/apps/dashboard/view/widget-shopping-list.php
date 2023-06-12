<a href="?app=spl_items">
<div class="widget widget-danger widget-item-icon" onclick="location.href='?app=spl_items';">
    <div class="widget-item-left">
        <span class="fa  fa-shopping-cart"></span>
    </div>
    <div class="widget-data">
        <div class="widget-int num-count"><?php echo $dbc->GetCount("spl_items"," status >= 0");?></div>
        <div class="widget-title">Shopping lists</div>
        <div class="widget-subtitle">View</div>
    </div>     
    <!--<div class="widget-controls">  
        <a href="#" class="widget-control-right widget-remove" data-toggle="tooltip" data-placement="top" title="Remove Widget"><span class="fa fa-times"></span></a>
    </div>-->
</div>
</a>