<a href="?app=comment">
<div class="widget widget-primary widget-item-icon" onclick="location.href='pages-messages.html';">
    <div class="widget-item-left">
        <span class="fa fa-commenting-o"></span>
    </div>
    <div class="widget-data">
        <div class="widget-int num-count"><?php echo $dbc->GetCount("rating","customer IS NOT NULL and approve IS NULL");?></div>
        <div class="widget-title">New Comment</div>
        <div class="widget-subtitle">Villa Comment</div>
    </div>     
    <!--<div class="widget-controls">  
        <a href="#" class="widget-control-right widget-remove" data-toggle="tooltip" data-placement="top" title="Remove Widget"><span class="fa fa-times"></span></a>
    </div>-->
</div>
</a>

