<a href="?app=properties">
<div class="widget widget-success widget-item-icon" onclick="location.href='pages-messages.html';">
    <div class="widget-item-left">
        <span class="fa fa-home"></span>
    </div>
    <div class="widget-data">
        <div class="widget-int num-count"><?php echo $dbc->GetCount("properties","status > 0");?></div>
        <div class="widget-title">All Villas</div>
        <div class="widget-subtitle">In your Website</div>
    </div>     
    <!--<div class="widget-controls">  
        <a href="#" class="widget-control-right widget-remove" data-toggle="tooltip" data-placement="top" title="Remove Widget"><span class="fa fa-times"></span></a>
    </div>-->
</div>
</a>

